<?php

namespace App\Http\Controllers\Apps\Mca;


use Dompdf\Options;
use App\Models\ErrorLog;
use App\Mail\MCAReportMail;
use App\Models\MCADocuments;
use Illuminate\Http\Request;
use App\Jobs\MCAFileDeleteJob;
use App\Traits\McaReportTrait;
use App\Models\MCAFileForAdmin;
use App\Jobs\MCAReportCreateJob;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\DataTables\MCAReportDataTable;
use App\Jobs\UploadFileForMCAAndCreateReportJob;



class MCAReportController extends Controller
{

    use McaReportTrait;
    /**
     * Display all MCA reports
     *
     * @return \Illuminate\Http\Response
     */

    private $api_key;
    public function __construct()
    {
        $this->api_key = config('services.openai.mca_key');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MCAReportDataTable $dataTable)
    {
        return $dataTable->render('pages/apps.mca-management.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mca-report.create');
    }

    /*
     * Make a http request to different endpoint
     *
     * @return respons as json
     */
    private function makeRequest($url, $method = 'get', $data = [])
    {
        $OPENAI_API_KEY =  $this->api_key;
        try {
            $response = Http::withHeaders([
                'OpenAI-Beta' => 'assistants=v2',
                'Authorization' => 'Bearer ' . $OPENAI_API_KEY,
            ])
                ->timeout(60)
                ->$method($url, $data);
            return $response->json();
        } catch (\Throwable $th) {
            return null;
        }
    }
    private function getFileInDetailsAndSave($fileId, $name, $batchId)
    {
        $url = 'https://api.openai.com/v1/responses';
        $method = 'post';
        $data = [
            "model" => "gpt-4.1",
            "input" => [
                [
                    "role" => "user",
                    "content" => [
                        [
                            "type" => "input_file",
                            "file_id" => $fileId
                        ],
                        [
                            "type" => "input_text",
                            "text" => "What is in the file?"
                        ]
                    ]
                ]
            ]
        ];
        $response = $this->makeRequest($url, $method, $data);
        if (isset($response['output'])) {
            $fileData = $response['output'][0]['content'][0]['text'];
            if ($name == '') {
                $url = "https://api.openai.com/v1/files/$fileId";
                $method = 'get';
                $data = [];
                $result = $this->makeRequest($url, $method, $data);
                $name = $result['filename'];
            }

            MCADocuments::create([
                'name' => $name,
                'file_id' => $fileId,
                'batch_id' => $batchId,
                'file_text' => $fileData,
            ]);
        }else{
            ErrorLog::create([
                'batch_id' => $batchId,
                'file_name' => $name,
                'error_message' => isset($response['error']) ? json_encode($response['error']) : 'Unknown error during fetching file details'
            ]);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        // Validate ZIP file
        $request->validate([
            'uploaded_files' => 'required|array|min:1',
            'uploaded_files.*' => 'file|max:20480|mimes:pdf',
            'prompt' => 'nullable|string',
        ]);

        $files = $request->file('uploaded_files');

        $batchId = uniqid('batch_', true);
        $OPENAI_API_KEY = $this->api_key;

        $pdf_fileIds = [];
        $pdf_fileIds_names = [];
        foreach ($files as $file) {
            $file_name = $file->getClientOriginalName();
            // Upload each file to OpenAI
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $OPENAI_API_KEY,
            ])->timeout(120)
                ->attach(
                    'file',
                    file_get_contents($file->path()),
                    $file->getClientOriginalName()
                )->post('https://api.openai.com/v1/files', [
                    'purpose' => 'assistants',
                ]);
            $fileData = $response->json();
            if (isset($fileData['id']))
                $pdf_fileIds_names[] = ['id' => $fileData['id'], 'name' => $file_name];
        }

        if(count($pdf_fileIds_names) < 1){
            return redirect()->back()->with('error', 'Failed to upload files to OpenAI. Please check your API key and try again.');
        }
        foreach ($pdf_fileIds_names as $file) {
            $pdf_fileIds[] = $file['id'];
            if ($file['id'] !== null) {
               $this->getFileInDetailsAndSave($file['id'], $file['name'], $batchId);
            }
        }
        $mca_file = new MCAFileForAdmin();
        $mca_file->file_id = json_encode($pdf_fileIds);
        $mca_file->batch_id = $batchId;
        $mca_file->status = 'In Process';
        $mca_file->save();
        MCAReportCreateJob::dispatch($batchId);

        return redirect()->route('mca.reports');
    }
    private function getStatusFromFinalDecisionSummary($summary)
    {
        $dom = new \DOMDocument();

        // Suppress warnings due to invalid HTML structure
        @$dom->loadHTML($summary);

        $h1Tags = $dom->getElementsByTagName('h1');

        if ($h1Tags->length > 0) {
            $h1Text = trim($h1Tags->item(0)->textContent);
            return $h1Text;
        }

        return null;
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = MCAFileForAdmin::findOrFail($id);

        if (!$report->report()->exists() || $report->is_regenerating === 1) {
            $this->saveUpdatedReport($id);
            if ($report->is_regenerating === 1) {
                $report->is_regenerating = 0;
                $report->save();
            }

            $report = MCAFileForAdmin::find($id);
        }

        return view('mca-report.show', compact('report'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        if ($request->ajax()) {
            $file = MCAFileForAdmin::find(request('id'));
            if ($file) {
                $files = json_decode($file->file_id);
                $vs_files = json_decode($file->vs_file_id);
                if ($files !== [] || $vs_files !== []) {
                    // MCAFileDeleteJob::dispatch($files, $vs_files, $file);
                }
                $file->delete();
                if ($file->report()->exists()) {
                    $file->report->delete();
                }
                return response()->json('success');
            } else {
                return response()->json('error');
            }
        }
    }

    /**
     * Regenerate Report
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function regenerateReport(Request $request)
    {
        $ID = $request->report_id;
        $file = MCAFileForAdmin::find($ID);
        
        $batchId = $file->batch_id;
        if ($batchId === null) {
            $batchId = uniqid('batch_', true);
            $file->batch_id = $batchId;
        }
        $files = json_decode($file->file_id);

        $file->company = null;
        $file->owner_name = null;
        $file->business_info = null;
        $file->owner_info = null;
        $file->credit_score = null;
        $file->business_type = null;
        $file->bs_summary = null;
        $file->od_summary = null;
        $file->cr_analysis = null;
        $file->rfad_check = null;
        $file->ga_criteria = null;
        $file->approved_amount = null;
        $file->approval_risk = null;
        $file->mr_assessment = null;
        $file->affordability_calculation = null;
        $file->dml_recommendation = null;
        $file->final_decision_summary = null;
        $file->status = 'Regenerating';
        $file->is_regenerating = 1;
        $file->file_info = null;
        $file->save();

        $file_with_text = MCADocuments::where('batch_id', $batchId)->get();


        if (count($file_with_text) < 1) {
            foreach ($files as $fileId) {
                $this->getFileInDetailsAndSave($fileId, '', $batchId);
            }
        }
        MCAReportCreateJob::dispatch($batchId);
        // UploadFileForMCAAndCreateReportJob::dispatch($batchId);

        $file->report()->delete();

        return response()->json(
            ['status' => 200, 'message' => 'Report will be regenerated in job queue!']
        );
    }
    /**
     * Change manualy approval status of mca report
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function manualApprove(Request $request)
    {
        $ID = $request->input('id');
        $text = $request->action;
        $file = MCAFileForAdmin::find($ID);

        $summary = $file->final_decision_summary;
        $file->final_decision_summary = $this->setStatusFromFinalDecisionSummary($summary, $text);
        $file->status = $text;
        $file->save();

        $this->saveUpdatedReport($ID);

        return response()->json(
            ['status' => 200, 'message' => $text]
        );
    }
    private function setStatusFromFinalDecisionSummary($summary, $text)
    {
        $dom = new \DOMDocument();
        @$dom->loadHTML($summary, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $xpath = new \DOMXPath($dom);

        $h1 = $xpath->query('//h1')->item(0);
        if ($h1) {
            $h1->textContent = $text;
            while ($h1->nextSibling) {
                $h1->parentNode->removeChild($h1->nextSibling);
            }
            $div = $xpath->query('//div[@class="section"]')->item(0);
            if ($div) {
                return $dom->saveHTML($div);
            }
        }
        return null;
    }

    /**
     * MCA Settings Page
     *
     * @param
     * @return  view
     */
    public function settings()
    {
        return view('mca-report.settings');
    }
    /**
     * MCA Settings Store
     *
     * @param Request $request
     * @return  view
     */
    public function settingsSave(Request $request)
    {
        $request->validate([
            'openai_key' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
            'email_report' => ['required', 'string'],
            'email_time' => ['required', 'string'],
            'enable_email_fetch' => ['required', 'sometimes'],
        ]);


        $apiKey = $request->input('openai_key');
        $email = $request->input('email');
        $password = $request->input('password');
        $email_report = $request->input('email_report');
        $email_fetch_timing = $request->input('email_time');

        $is_enable_email = 'OFF';
        if (array_key_exists('enable_email_fetch', $request->all())) {
            $is_enable_email = 'ON';
        }

        $this->storeConfiguration('OPENAI_MCA_API_KEY', $apiKey);
        $this->storeConfiguration('IMAP_USERNAME', $email);
        $this->storeConfiguration('IMAP_PASSWORD', $password);
        $this->storeConfiguration('EMAIL_FOR_MCA_REPORT', $email_report);
        $this->storeConfiguration('EMAIL_FOR_MCA_REPORT_FETCH_TIMING', $email_fetch_timing);
        $this->storeConfiguration('IMAP_ENABLE', $is_enable_email);

        $this->storeTiming($email_fetch_timing);

        return redirect()->back()->with('success', 'MCA Open Ai API Key saved successfully.');
    }
    /**
     * Record in .env file
     */

    private function storeConfiguration($key, $value)
    {
        $path = base_path('.env');

        if (!file_exists($path)) {
            return false;
        }

        $env = file_get_contents($path);
        $pattern = "/^{$key}=.*$/m";

        $escapedValue = strpos($value, ' ') !== false ? "'$value'" : $value;

        if (preg_match($pattern, $env)) {
            // Update existing key
            $env = preg_replace($pattern, "{$key}={$escapedValue}", $env);
        } else {
            // Append new key
            $env .= PHP_EOL . "{$key}={$escapedValue}";
        }

        file_put_contents($path, $env);

        return true;
    }
    private function storeTiming($email_fetch_timing)
    {
        $path = base_path('app/Console/Kernel.php');
        if (!file_exists($path)) {
            dd('Kernel.php file not found');
            return false;
        }
        $content = file_get_contents($path);

        // Match the line for the Create:mcareportfromemaildoc schedule
        $pattern = "/(\\\$schedule->command\\('Create:mcareportfromemaildoc'\\)->withoutOverlapping\\(\\)->)(.*?);/";

        // Build replacement line based on input timing
        $timingMethod = $email_fetch_timing . '()';

        if (!$timingMethod) {
            return false; // or handle invalid input
        }

        $replacement = "\$1$timingMethod;";

        // dd($pattern, $replacement, $timingMethod);
        $newContent = preg_replace($pattern, $replacement, $content);

        if ($newContent && $newContent !== $content) {
            file_put_contents($path, $newContent);
            return true;
        }

        return false;
    }
    /**
     * Send MVA report on Email
     */
    public function sendReportOnEmail($ID, Request $request)
    {
        // dd($request->all());
        $report = MCAFileForAdmin::find($ID);

        if (!$report || !$report->report) {
            return response()->json(['message' => 'Report not found'], 404);
        }

        $html = $report->report->response;

        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $dompdf = new \Dompdf\Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        // Save PDF temporarily
        $pdfPath = storage_path("app/temp/mca_report_{$ID}.pdf");
        file_put_contents($pdfPath, $dompdf->output());

        // Send the email
        Mail::to($request->email)->send(new MCAReportMail($pdfPath));

        // Optionally delete the file after sending
        unlink($pdfPath);

        return response()->json(['message' => 'Report sent successfully']);
    }

    public function testAuthentication()
    {
        $mca_file = MCAFileForAdmin::where('batch_id', 'batch_6859cef9650989.67233032')->first();

        $file_with_text = MCADocuments::where('batch_id', 'batch_6859cef9650989.67233032')->get();

        $file_text = '';
        foreach ($file_with_text as $file) {
            $file_text .= $file->file_text;
        }

        dd($file_text);
        $mca_file_authenticity = $this->getFileAuthenticity($file_text);

        dd($mca_file_authenticity);
    }
}
