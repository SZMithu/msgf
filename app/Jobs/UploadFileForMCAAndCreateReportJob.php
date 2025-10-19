<?php

namespace App\Jobs;

use App\Models\ErrorLog;
use App\Models\MCADocuments;
use Illuminate\Bus\Queueable;
use App\Models\MCAFileForAdmin;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;


class UploadFileForMCAAndCreateReportJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $timeout = 2400;
    private $batchId;
    private $api_key;
    public function __construct($batch_id)
    {
        $this->batchId = $batch_id;
        $this->api_key = config('services.openai.mca_key');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $files = MCADocuments::where('batch_id', $this->batchId)->get();
        $this->uploadFile($files);
    }
    private function uploadFile($files)
    {
        foreach ($files as $file) {
            $path = storage_path('app/email_attachments/' . $file->name);
            $filename = $file->name;
            // Upload each file to OpenAI
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->api_key,
            ])->timeout(120)
                ->attach(
                    'file',
                    file_get_contents($path),
                    $file->name
                )->post('https://api.openai.com/v1/files', [
                    'purpose' => 'assistants',
                ]);
            $fileData = $response->json();

            if (isset($fileData['id'])) {
                $pdf_fileIds_names[] = ['id' => $fileData['id'], 'name' => $file->name];
            } else {
                ErrorLog::create([
                    'batch_id' => $this->batchId,
                    'file_name' => $file->name,
                    'error_message' => isset($fileData['error']) ? json_encode($fileData['error']) : 'Unknown error during file upload'
                ]);
                return;
            }
        }

        foreach ($pdf_fileIds_names as $file) {
            $pdf_fileIds[] = $file['id'];
            if ($file['id'] !== null) {
                $response = $this->getFileInDetailsAndSave($file['id'], $file['name'], $this->batchId);
            }
        }
        $mca_file = new MCAFileForAdmin();
        $mca_file->file_id = json_encode($pdf_fileIds);
        $mca_file->batch_id = $this->batchId;
        $mca_file->status = 'In Process';
        $mca_file->save();
        MCAReportCreateJob::dispatch($this->batchId)->delay(now()->addMinutes(2));
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
            MCADocuments::where('name', $name)->where('batch_id', $batchId)->update([
                'file_id' => $fileId,
                'file_text' => $fileData,
            ]);
        } else {
            ErrorLog::create([
                'batch_id' => $batchId,
                'file_name' => $name,
                'error_message' => isset($response['error']) ? json_encode($response['error']) : 'Unknown error during fetching file details'
            ]);
        }
    }
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
}
