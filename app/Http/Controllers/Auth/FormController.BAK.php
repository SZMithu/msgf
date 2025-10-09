<?php

namespace App\Http\Controllers\Auth;
use App\Models\FormSubmission;
use App\Models\FormSecond;
use App\Models\FormSetting;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use App\Mail\FormEmail;
use App\Mail\AdminEmail;
use App\Mail\FirstForm;
use Illuminate\Support\Facades\Mail;
use App\Services\PdfService;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Exception;
require_once(base_path('Libraries/fpdf/fpdf.php'));
require_once(base_path('Libraries/fpdi/src/Fpdi.php'));
use setasign\Fpdi\Fpdi;



class FormController extends Controller
{

    protected $pdfService;
    public function __construct(PdfService $pdfService)
    {
        $this->pdfService = $pdfService;
    }
    /**
     * Display the password reset link request view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $form=FormSetting::where('setting','General')->first();

        return view('pages/system.form1',compact('form'));
    } 
	
	public function submit($request)
    {
        if (!$request) {
            abort(404);
        }

        $form=FormSetting::where('setting','General')->first();

        return view('pages.auth.thanksform',compact('form'));
    }

    public function applynow(Request $request)
    {
        if (!$request->query('id')) {
            abort(404);
        }


        $title=FormSetting::where('setting','General')->first();

        $types = DB::table('types')->where('type','Company')->first();
        $typess = json_decode($types->value);
        $form=FormSubmission::Where('id',base64_decode($request->query('id')))->first();
        $form2=FormSecond::select('form_info')->Where('u_id',base64_decode($request->query('id')))->first();
	
		   if(!empty($form2['form_info'])){
		       return redirect()->route('form');
		  }
        $data = DB::table('form_submissions')
        ->leftJoin('form_seconds', 'form_submissions.id', '=', 'form_seconds.u_id')
        ->select(
            'form_submissions.id as uid',
            'form_submissions.amt',
            'form_submissions.purpose',
            'form_submissions.average',
            'form_submissions.time',
            'form_submissions.b_name as bus_name',
            'form_submissions.ein',
            'form_submissions.business_type as type',
            'form_submissions.state as first_state',
            'form_submissions.business_industry as industries',
            'form_submissions.f_name as first_name',
            'form_submissions.l_name as last_name',
            'form_submissions.email as first_email',
            'form_submissions.phone as first_phone',
            'form_seconds.*'
        )
        ->where('form_submissions.id', base64_decode($request->query('id')))
        ->first();

         return view('pages/system.formstep2',compact('form','data','typess','title'));
    }

 
   public function store(Request $request)
    {
		//block  hacker bots... 
	
		if ($_SERVER["HTTPS"] != "on" or !empty($request["PhoneNumber"])) {
			$email = 'adirmargaliot@gmail.com';
			$message = "spam  prevent";
			$message .= 'PHP_SELF: ' . 			$_SERVER['PHP_SELF'] . "\n";
			$message .= 'SCRIPT_NAME: ' . 		$_SERVER['SCRIPT_NAME'] . "\n";
			$message .= 'SCRIPT_FILENAME: ' . 	$_SERVER['SCRIPT_FILENAME'] . "\n";
			$message .= 'REQUEST_URI: ' . 		$_SERVER['REQUEST_URI'] . "\n";
			$message .= 'REQUEST_METHOD: ' . 	$_SERVER['REQUEST_METHOD'] . "\n";
			$message .= 'QUERY_STRING: ' . 		$_SERVER['QUERY_STRING'] . "\n";
			$message .= 'HTTP_REFERER: ' . 		$_SERVER['HTTP_REFERER'] . "\n";
			$message .= 'HTTP_USER_AGENT: ' . 	$_SERVER['HTTP_USER_AGENT'] . "\n";
			$message .= 'SERVER_NAME: ' . 		$_SERVER['SERVER_NAME'] . "\n";
			$message .= 'SERVER_ADDR: ' . 		$_SERVER['SERVER_ADDR'] . "\n";
			$message .= 'SERVER_PORT: ' . 		$_SERVER['SERVER_PORT'] . "\n";
			$message .= 'REMOTE_ADDR: ' . 		$_SERVER['REMOTE_ADDR'] . "\n";
			$message .= 'REMOTE_PORT: ' . 		$_SERVER['REMOTE_PORT'] . "\n";
			$to_email = 'adirmargaliot@gmail.com'; // Replace with the	recipient's email address
			$subject = 'spam  prevent first from';
			$headers = "From: no-reply@msfg.finance\r\n";
			$headers .= "Reply-To: $email\r\n";
			// Send the email to adir to inspect the hackers 
			//mail($to_email, $subject, $message, $headers);
			abort(500);
			die;
		}
        $validatedData = $request->validate([
            'amt' => 'required',
            'purpose' => 'required',
            'average' => 'required',
            'time' => 'required',
            'b_name' => 'required',
            'ein' => '',
            'business_type' => 'required',
            'state' => 'required',
            'business_industry' => 'required',
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'credit_score'=>'',
        ]);

        $formSubmission = FormSubmission::create($validatedData);
        Session::put('userform', $formSubmission['id']);
        $form=FormSetting::where('setting','General')->first();
        $email = $request->email;
        $name = $request->f_name; 
        $applicationLink = 'https://app.msfg.finance/applynow?id='.base64_encode($formSubmission['id']);
        // print_r($form->email); die;
        Mail::to($form->email)->send(new FirstForm($formSubmission['id'],$email));
        // Mail::to($email)->send(new FormEmail($name,$applicationLink));
        try {
            Mail::to($email)->send(new FormEmail($name, $applicationLink));
        } catch (\Exception $e) {
            Log::error('Failed to send email: ' . $e->getMessage());
            return redirect()->route('submit',['id' => base64_encode($formSubmission['id'])]);
        }

        //sleep(2);
        return redirect()->route('submit',['id' => base64_encode($formSubmission['id'])]);
        // return response()->json(['message' => 'Submitted successfully']);
    }


    public function form_step_second(Request $request)
    {
       

	   //return response()->json(['message' => 'image upload successfully']); die;
	   $update=FormSecond::Where('u_id',$request->u_id)->first();
       if(!empty($update)){
        $fileNames = [];

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                // Store or process each file as needed
                $fileName = $file->getClientOriginalName();
                $file->storeAs('uploads', $fileName); 
                $fileNames[] = $fileName;

            }
        }
		
		

        $fileNamesString = implode(',', $fileNames);
        if(!empty($fileNamesString)){
            $update->update([
            'bank_statement'=>$fileNamesString,
            ]);
            return response()->json(['message' => 'image upload successfully']);

        }

        if ($request->has('extra_phone')) {
            $extra_phone = $request->extra_phone;
        } else {
            $extra_phone = 0;
        } 


$yearMonth = $request->year . '-' . str_pad($request->month, 2, '0', STR_PAD_LEFT); // Example format: '2024-07'

        $update->update([
            'company_name'=>$request->company_name,
            'dba'=>$request->dba,
            'fedral_taxid'=>$request->fedral_taxid,
            'purpose'=>$request->purpose,
            'industry_des'=>$request->industry_des,
            'bussiness_phone'=>$request->bussiness_phone,
            'fax'=>$request->fax,
            'bussines_startDate'=>$yearMonth,
            'Street'=>$request->Street,
            'city'=>$request->city,
            'state'=>$request->state,
            'postal'=>$request->postal,
            'country'=>$request->country,
            'title'=>$request->title,
            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'ssn'=>$request->ssn,
            'dob'=>$request->dob,
            'ownership'=>$request->ownership,
            'Street2'=>$request->Street2,
            'city2'=>$request->city2,
            'state2'=>$request->state2,
            'postal2'=>$request->postal2,
            'country2'=>$request->country2,
            'loan_type'=>$request->loan_type,
            'location_ownership'=>$request->location_ownership,
            'owned_details'=>$request->owned_details,
            'gross_sales'=>$request->gross_sales,
            'avg_bank_balance'=>$request->avg_bank_balance,
            'requested_amount'=>$request->requested_amount,
            'term_length'=>$request->term_length,
            'digital_signature'=>$request->digital_signature,
            'owner_title'=>$request->owner_title,
            'extra_phone'=>$extra_phone,

        ]);
       //$test= $this->pdf($request->u_id);
       //print_r($test); die;

        return response()->json(['message' => 'update successfully']);
		
		
       } else {

        $yearMonth = $request->year . '-' . str_pad($request->month, 2, '0', STR_PAD_LEFT); // Example format: '2024-07'

        $formSubmission = FormSecond::create([
            'u_id'=>$request->u_id,
            'company_name'=>$request->company_name,
            'dba'=>$request->dba,
            'fedral_taxid'=>$request->fedral_taxid,
            'purpose'=>$request->purpose,
            'industry_des'=>$request->industry_des,
            'bussiness_phone'=>$request->bussiness_phone,
            'fax'=>$request->fax,
            'bussines_startDate'=>$yearMonth,
            'Street'=>$request->Street,
            'city'=>$request->city,
            'state'=>$request->state,
            'postal'=>$request->postal,
            'country'=>$request->country,
        ]);

        return response()->json(['message' => 'Submitted successfully']);
    }
    }

    function formSubmit(){

        $form=FormSetting::where('setting','General')->first();

        return view('pages.auth.thankspage',compact('form'));
    }

   

    public function pdf(Request $request)
    // public function pdf()
    {
        // print_r($request->form_id); die;
        $id=$request->form_id;
    $data = DB::table('form_submissions')
    ->leftJoin('form_seconds', 'form_submissions.id', '=', 'form_seconds.u_id')
    ->select(
        'form_submissions.id as uid',
        'form_submissions.amt',
        'form_submissions.purpose as first_purpose',
        'form_submissions.average',
        'form_submissions.time',
        'form_submissions.b_name as bus_name',
        'form_submissions.ein',
        'form_submissions.business_type as type',
        'form_submissions.state as first_state',
        'form_submissions.business_industry as industries',
        'form_submissions.f_name as first_name',
        'form_submissions.l_name as last_name',
        'form_submissions.email as first_email',
        'form_submissions.phone as first_phone',
        'form_seconds.*'
    )
    ->where('form_submissions.id', $id)
    ->first();
        $fileNames = explode(',', $data->bank_statement); 
        // print_r($fileNames[0]); die;
		 $carbonDate = Carbon::parse($data->dob);

    // Format the date as DD-MM-YY
    $formattedDOB = $carbonDate->format('d-m-yy');

    $number = str_replace('$', '', $data->amt);
$numericAmount = (float)$number;
$formattedNumber = number_format($numericAmount);

if ($data->requested_amount == $data->amt) {
    $requestAmt = $formattedNumber;
} else {
    $requestAmt = $data->requested_amount;
}

// print_r($number); die;
	
        require_once public_path('dompdf/autoload.inc.php');
            $html = '<html>
                    <style>
        table, th, td {
        border:1px solid black;
        border-collapse: collapse;
        }
        .title-head{
            width: 80%;
            display: flex;
            justify-content: space-between;
        }
        .clm{
        width:30%
        }
        td{
        padding:4px;
        }
        </style>
                    <body>
        <div>
        <img src="'.URL::to('/storage/app/msgf-logo.svg').'" alt="Logo" style="width:25%;">
        </div>
        <div style="width: 80%;display: flex; justify-content: space-between; margin-top: 2px;">
        <span style="font-size: 20px;">Prequalification Form </span> 
        </div><br>
            <table style="width:80%">
            <tr>
                <td class="clm">First Name:</td>
                <td>'.$data->first_name.'</td>
            </tr>
            <tr>
                <td class="clm">Last name:</td>
                <td>'.$data->last_name.'</td>
            </tr>
            <tr>
                <td class="clm">Email:</td>
                <td>'.$data->first_email.'</td>
            </tr>
            <tr>
                <td class="clm">Phone Number:</td>
                <td>'.$data->first_phone.'</td>
            </tr>

            <tr>
                <td class="clm">Business Name:</td>
                <td>'.$data->bus_name.'</td>
            </tr>

            <tr>
                <td class="clm">Business Type:</td>
                <td>'.$data->type.'</td>
            </tr>

            <tr>
                <td class="clm">Amount:</td>
                <td>$'.$formattedNumber.'</td>
            </tr>
            <tr>
                <td class="clm">EIN:</td>
                <td>'.$data->ein.'</td>
            </tr>
            <tr>
                <td class="clm">Business Industry:</td>
                <td>'.$data->industries.'</td>
            </tr>

            <tr>
                <td class="clm">Purpose:</td>
                <td>'.$data->first_purpose.'</td>
            </tr>

            <tr>
                <td class="clm">Average:</td>
                <td>'.$data->average.'</td>
            </tr>

            <tr>
                <td class="clm">Time:</td>
                <td>'.$data->time.'</td>
            </tr>

            <tr>
                <td class="clm">State:</td>
                <td>'.$data->first_state.'</td>
            </tr>

            
            
            </table>
            <br>

            <div style="">
            <span style="font-size: 20px;">Business Qualification Form </span> 
            </div>

            <div style="margen-top:0px">
    <span><b>Business Information:</b> </span> 
    </div>
    <table style="width:80%">

    <tr>
        <td class="clm">Company Name:</td>
        <td>'.$data->company_name.'</td>
    </tr>
    <tr>
        <td class="clm">DBA:</td>
        <td>'.$data->dba.'</td>
    </tr>
    <tr>
        <td class="clm">Fedral Tax Id.:</td>
        <td>'.$data->fedral_taxid.'</td>
    </tr>
    <tr>
        <td class="clm">Company Type:</td>
        <td>'.$data->purpose.'</td>
    </tr>
    <tr>
        <td class="clm">Industry Description:</td>
        <td>'.$data->industry_des.'</td>
    </tr>
    <tr>
        <td class="clm">Business Phone :</td>
        <td>'.$data->bussiness_phone.'</td>
    </tr>
    <tr>
        <td class="clm">Business Start Date:</td>
        <td>'.$data->bussines_startDate.'</td>
    </tr>
    
    
    </table>
    <br>
    <div style="margen-top:3px">
    <span><b>Business Address</b> : </span> 
    </div>
    <table style="width:80%">

    <tr>
        <td class="clm">Street :</td>
        <td>'.$data->Street.'</td>
    </tr>
    <tr>
        <td class="clm">City:</td>
        <td>'.$data->city.'</td>
    </tr>
    <tr>
        <td class="clm">State :</td>
        <td>'.$data->state.'</td>
    </tr>
    <tr>
        <td class="clm">Postal :</td>
        <td>'.$data->postal.'</td>
    </tr>
    <tr>
        <td class="clm">Country :</td>
        <td>'.$data->country.'</td>
    </tr>
    
    
    </table>
    <br>

    <div style="margen-top:1px">
    <span><b>Primary Owner Information :</b> </span> 
    </div>
    <table style="width:80%">

    <tr>
        <td class="clm">Title:</td>
        <td>'.$data->title.'</td>
    </tr>
    <tr>
        <td class="clm">First name:</td>
        <td>'.$data->firstname.'</td>
    </tr>
    <tr>
        <td class="clm">Last name:</td>
        <td>'.$data->lastname.'</td>
    </tr>
    <tr>
        <td class="clm">Phone:</td>
        <td>'.$data->phone.'</td>
    </tr>
    <tr>
        <td class="clm">Email:</td>
        <td>'.$data->email.'</td>
    </tr>

    <tr>
        <td class="clm">Social Security Number:</td>
        <td>'.$data->ssn.'</td>
    </tr>

    <tr>
        <td class="clm">Date of Birth:</td>
        <td>'.$formattedDOB.'</td>
    </tr>


    <tr>
        <td class="clm">Percent Ownership:</td>
        <td>'.$data->ownership.'</td>
    </tr>
    
    </table>
    <br><div style="margen-top:1px">
    <span><b>Address : </b></span> 
    </div>
    <table style="width:80%">

    <tr>
        <td class="clm">Street:</td>
        <td>'.$data->Street2.'</td>
    </tr>
    <tr>
        <td class="clm">City:</td>
        <td>'.$data->city2.'</td>
    </tr>
    <tr>
        <td class="clm">State:</td>
        <td>'.$data->state2.'</td>
    </tr>
    <tr>
        <td class="clm">Postal:</td>
        <td>'.$data->postal2.'</td>
    </tr>

    </table>
    <br><div style="margen-top:1px">
    <span><b>Underwriting Information :</b> </span> 
    </div>
    <table style="width:80%">

    <tr>
        <td class="clm">Is Business Location Owned or Rented? :</td>
        <td>'.$data->location_ownership.'</td>
    </tr>
    <tr>
        <td class="clm">Gross Annual Sales:</td>
        <td>'.$data->gross_sales.'</td>
    </tr>
    <tr>
        <td class="clm">Average Bank Balance:</td>
        <td>'.$data->avg_bank_balance.'</td>
    </tr>
    <tr>
        <td class="clm">Requested Funding Amount:</td>
        <td>$'.$requestAmt.'</td>
    </tr>
    <tr>
        <td class="clm">Requested Term Length in Month:</td>
        <td>'.$data->term_length.'</td>
    </tr>

    </table>
    <br>';

            $html.='
            <p>By signing below, each of the above listed business and business owner/officer
            (individually and collectively, "you") authorize Main Street Finance Group LLC
            ("MSFG") and each of its representatives, successors, assigns and designees
            ("Recipients") that may be involved with or acquire commercial loans having daily
            repayment features or purchases of future receivables including Merchant Cash
            Advance transactions,including without limitation the application therefor
            (collectively, "Transactions") to obtain consumer or personal, business and
            investigative reports and other information about you, including credit card
            processor statements and bank statements, from one or more consumer reporting
            agencies, such as TransUnion, Experian and Equifax, and from other credit
            bureaus, banks, creditors and other third parties. You also authorize MSFG to
            transmit this application form, along with any of the foregoing information obtained
            in connection with this application, to any or all of the Recipients for the foregoing
            purposes. You also consent to the release, by any creditor or financial institution,
            of any information relating to any of you, to MSFG and to each of the Recipients,
            on its own behalf. You also authorize MSFG and each of its Recipients to contact
            you via text message, automated call or email message at the contact information
            listed above or via the contact information listed in our system.</p>


            <table style="width:80%; border: 0px !important;">

    <tr>
        <td class="clm"> <div>
           <img  width="100px" class="signature" src="'.$data->digital_signature.'"/>
            <h3 style="margin-top: 0px; margin-bottom: 0px;"><u>'.$data->firstname.' '.$data->lastname.' </u></h3>
            </div></td>
        <td> <div style="margin-top: 19px;    margin-bottom: 0px;    font-size: 25px;">
            <h3 style="margin-top: 0px; margin-bottom: 0px;"><u>'.date('d/m/Y').' </u></h3>
            </div></td>
    </tr>
    
    </table>
            
            </body>
            </html>';
            
            // return view('pages/pdf',compact('html'));
            $options = new Options();
            $options->set('isRemoteEnabled', true);

        $dompdf = new \Dompdf\Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $pdfContent = $dompdf->output();

// Define the filename and path
    $filenamecustom = 'form-Id' . $id . '.pdf';
    $filename = $filenamecustom;

    $path = storage_path('app/public/pdf/');
    if (!file_exists($path)) {
        mkdir($path, 0755, true);
    }

    $filePath = $path . $filename;
    file_put_contents($filePath, $pdfContent);
// print_r($fileNames); die;
    $urls = [
        'https://app.msfg.finance/storage/app/public/pdf/' . $filename,
        'https://app.msfg.finance/storage/app/uploads/' . $fileNames[0],
        'https://app.msfg.finance/storage/app/uploads/' . $fileNames[1],
        'https://app.msfg.finance/storage/app/uploads/' . $fileNames[2],
    ];

$pdfRecord = FormSecond::where('u_id', $id)->first();

    if ($pdfRecord) {
        $pdf = new Fpdi();

    foreach ($urls as $url) {
        try {
            $response = Http::get($url);

            if ($response->successful()) {
                $tempFilePath = tempnam(sys_get_temp_dir(), 'pdf_merge_1') . '.pdf';
                file_put_contents($tempFilePath, $response->body());

                $pageCount = $pdf->setSourceFile($tempFilePath);
                for ($pageNumber = 1; $pageNumber <= $pageCount; $pageNumber++) {
                    $template = $pdf->importPage($pageNumber);
                    $pdf->AddPage();
                    $pdf->useTemplate($template);
                }
                unlink($tempFilePath);
            } else {
                Log::error('Failed to fetch PDF from ' . $url . ': ' . $response->status());
            }
        } catch (\Exception $e) {
            Log::error('Exception while fetching PDF: ' . $e->getMessage());
        }
    }

        $mergedFilePath = tempnam(sys_get_temp_dir(), 'merged_pdf_') . '.pdf';
        $pdf->Output($mergedFilePath, 'F');
        $pdfContent = file_get_contents($mergedFilePath);

        $path = 'public/pdf';
        $filePath = $path . $mergedFilePath;
        Storage::put($filePath, $pdfContent);
        $pdfRecord->form_info = $mergedFilePath;
        $pdfRecord->save();
        // print_r($filePath); die;
        $form=FormSetting::where('setting','General')->first();

        Mail::to($form->email)->send(new AdminEmail('https://app.msfg.finance/storage/app/'.$path . $mergedFilePath,$id,$data->email));
        unlink($mergedFilePath);
        return response()->json(['message' => 'PDF updated successfully']);
       
    } 

    }


    public function mergeAndDownload()
    {
    $filePath='https://app.msfg.finance/storage/app/public/pdf/form-Id132.pdf';
    Mail::to(config('app.admin_email'))->send(new AdminEmail($filePath));

    }

    public function terms(){

        return view('settings.terms');
    }

    public function policy(){

        return view('settings.policy');
    }


    public function first(){
$name='data';
$applicationLink='dataa';
        return view('emails.admin');
        // return view('emails.form',compact('name','applicationLink'));
    }


    

}
