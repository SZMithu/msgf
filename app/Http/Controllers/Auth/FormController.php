<?php

namespace App\Http\Controllers\Auth;

date_default_timezone_set('America/New_York'); 

use App\Models\FormSubmission;
use App\Models\FormSecond;
use App\Models\FormSetting;
use App\Models\Links;
use App\Models\Referral;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use App\Mail\FormEmail;
use App\Mail\AdminEmail;
use App\Mail\FirstForm;
use App\Services\PdfService;
use Dompdf\Dompdf;
use Dompdf\Options;
use Exception;

use App\Models\PhoneBurnerToken;


require_once(base_path('Libraries/PDFMerger/PDFMerger.php'));

use setasign\Fpdi\Fpdi;
use PDFMerger\PDFMerger;

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
    public function index($any=null){
        $update=Links::Where('links',$any)->first();
        $session=Session::get('url_links');
        if($session != $any){
            Session::forget('url_links');
        }
        if(!empty($any) && !empty($update) && empty($session)){
            Session::put('url_links', $any);
            $count=$update['hits'];
            $update->update(['hits'=>$count+1,]);
            $Referral=Referral::create(['referral_id'=>$update['id'],'form_id'=>0,'type'=>'Hit','server_info'=>json_encode($_SERVER),]);
        }
        $form=FormSetting::where('setting','General')->first();
        return view('pages/system.form1',compact('form'));
    } 
	
	public function submit($request){
        if (!$request) { abort(404); }

        // print_r($request); die;
        $forms=FormSubmission::Where('token',$request)->first();

        $form=FormSetting::where('setting','General')->first();

        if($forms['lead_type'] == 'Bad Lead'){ return view('pages.auth.thanksform-bad',compact('form')); }

        return view('pages.auth.thanksform',compact('form'));
    }

    public function applynow(Request $request){
        if (!$request->query('id')) { abort(404); }

        $title=FormSetting::where('setting','General')->first();
        $types = DB::table('types')->where('type','Company')->first();
        $typess = json_decode($types->value);
        $form=FormSubmission::Where('token',$request->query('id'))->first();
        $form2=FormSecond::select('form_info')->Where('u_id',$form->id)->first();
	
		   if(!empty($form2['form_info'])){ return redirect()->route('form'); }

          if($form['lead_type'] =="Bad Lead"){ return redirect()->route('form'); }

        //   print_r($form['lead_type']); die;
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
        ->where('form_submissions.token', $request->query('id'))
        ->first();
         return view('pages/system.formstep2',compact('form','data','typess','title'));
    }

 
   public function store(Request $request){
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
      // print_r('email issue'); die;
			abort(500);
			die;
		}
    // print_r('resolved'); die;

        $session=Session::get('url_links');
        $update=Links::Where('links',$session)->first();
        if(!empty($update) && !empty($session)){
            $count=$update['leads'];
            $update->update(['leads'=>$count+1,]);  
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
            'token'=>'',
            'server'=>'',
            'referral'=>'',
            'lead_type',
        ]);



        $score = $request->credit_score; 
        $creditScore = explode('-', $score);
        $creditScoreMin = (int) $creditScore[0]; 
    
        $average = $request->average; 
        $averageAmt = explode('-', $average);

        $averageAmtMin = (int) filter_var($averageAmt[0], FILTER_SANITIZE_NUMBER_INT); 
        if(isset($averageAmt[1])){
        $averageAmtMax = (int) filter_var($averageAmt[1], FILTER_SANITIZE_NUMBER_INT); 
        }else{
            $averageAmtMax = (int) filter_var(0, FILTER_SANITIZE_NUMBER_INT); 

        }



        $time = $request->time; 
        $timeFilter = (int) filter_var($time, FILTER_SANITIZE_NUMBER_INT); 
        // print_r($averageAmtMax); die;

        $leadType = '';
        // if ($average == 'Less than $5,000' && $timeFilter == 0) {
        if ($average == 'Less than $5,000') {
            $leadType = 'Bad Lead';

        } else if($average == 'Less than $5,000' && $timeFilter > 0){
            $leadType = 'Potential Lead';

        }else if ($creditScoreMin >= 550 && $averageAmtMin >= 10000 && $averageAmtMax <= 29000 && $timeFilter >= 1 && $timeFilter <= 5) {
            $leadType = 'Good Lead';
        } else if ($creditScoreMin >= 650 && $averageAmtMin >= 20000 && $timeFilter >= 2 && $timeFilter <= 5) {
            $leadType = 'Premium Lead';
        } else {
            $leadType = 'Potential Lead';
        }



        $validatedData['server']=json_encode($_SERVER);
        $validatedData['referral']=$session;
        $validatedData['lead_type']=$leadType;


        // print_r($validatedData); die;

        $formSubmission = FormSubmission::create($validatedData);
        if(!empty($update) && !empty($session)){
            $linkId=$update['id'];
            $Referral=Referral::create(['referral_id'=>$linkId,'form_id'=>$formSubmission['id'],'type'=>'Lead','server_info'=>json_encode($_SERVER),]);
        }

        Session::put('userform', $formSubmission['id']);
        $form=FormSetting::where('setting','General')->first();
        $email = $request->email;
        $name = $request->f_name; 



        if($leadType !='Bad Lead'){ $applicationLink = 'https://app.msfg.finance/applynow?id='.$request->token; }else{ $applicationLink = ''; }
    if($leadType !='Bad Lead'){
                $phoneburner=$this->phoneburner($formSubmission['id']);
                try {
               Mail::to($form->email)->send(new FirstForm($formSubmission['id'],$email,$leadType,$phoneburner));
              } catch (\Exception $e) {
                // print_r('Failed to send email111: ' . $e->getMessage()); die;
                
              }

        }


        // Mail::to($email)->send(new FormEmail($name,$applicationLink));
        try {
            if($leadType !='Bad Lead'){

            Mail::to($email)->send(new FormEmail($name, $applicationLink));
            }
        } catch (\Exception $e) {
            // print_r('Failed to send email1: ' . $e->getMessage()); die;
            
            return redirect()->route('submit',['id' => $request->token]);
          }
        // print_r('Failed to send email: ' . $e->getMessage());

        return redirect()->route('submit',['id' => $request->token]);
        // return response()->json(['message' => 'Submitted successfully']);
    }


    public function form_step_second(Request $request){
	   $update=FormSecond::Where('u_id',$request->u_id)->first();
       if(!empty($update)){
        $fileNames = [];
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $fileName = $file->getClientOriginalName();
                $file->storeAs('uploads', $fileName); 
                $fileNames[] = $fileName;
            }
        }
		
        $fileNamesString = implode(',', $fileNames);
        if(!empty($fileNamesString)){
            $update->update(['bank_statement'=>$fileNamesString,]);
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

        $data123=$this->phoneburnerSecond($request->u_id);
        // print_r($data123); die;

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

        $data123=$this->phoneburnerSecond($request->u_id);
        // print_r($data123); die;
        return response()->json(['message' => 'Submitted successfully']);
    }
    }

    function formSubmit(){
        $form=FormSetting::where('setting','General')->first();
        return view('pages.auth.thankspage',compact('form'));
    }

    public function pdf(Request $request){
        $id=$request->form_id;
        $data = DB::table('form_submissions')
        ->leftJoin('form_seconds', 'form_submissions.id', '=', 'form_seconds.u_id')
        ->select(
            'form_submissions.id as uid',
            'form_submissions.amt',
            'form_submissions.lead_type',
            'form_submissions.credit_score',
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
        
        
        if(!empty($data->bank_statement)){
        
        $fileNames = explode(',', $data->bank_statement); 
		 $carbonDate = Carbon::parse($data->dob);
        $formattedDOB = $carbonDate->format('d-m-Y');
        require_once public_path('dompdf/autoload.inc.php');
            $html = '<html><style>
            table, th, td {border:1px solid black; border-collapse: collapse; } .title-head{ width: 80%; display: flex; justify-content: space-between; } .clm{ width:30% } td{ padding:4px; } </style>
            <body>
            <div><img src="'.URL::to('/storage/app/msgf-logo.svg').'" alt="Logo" style="width:25%;"></div>
            <div style="width: 80%;display: flex; justify-content: space-between; margin-top: 2px;">
            <span style="font-size: 20px;">Prequalification Form </span> 
            </div><br>

            <table style="width:80%">
            <tr><td class="clm">Status:</td><td>'.$data->lead_type.'</td></tr>
            <tr><td class="clm">First Name:</td><td>'.$data->first_name.'</td></tr>
            <tr><td class="clm">Last name:</td><td>'.$data->last_name.'</td></tr>
            <tr><td class="clm">Email:</td><td>'.$data->first_email.'</td></tr>
            <tr><td class="clm">Phone Number:</td><td>'.$data->first_phone.'</td></tr>
            <tr><td class="clm">Business Name:</td><td>'.$data->bus_name.'</td></tr>
            <tr><td class="clm">Business Type:</td><td>'.$data->type.'</td></tr>
            <tr><td class="clm">Amount:</td><td>'.$data->amt.'</td></tr>
            <tr><td class="clm">EIN:</td><td>'.$data->ein.'</td></tr>
            <tr><td class="clm">Business Industry:</td><td>'.$data->industries.'</td></tr>
            <tr><td class="clm">Purpose:</td><td>'.$data->first_purpose.'</td></tr>
            <tr><td class="clm">Purpose:</td><td>'.$data->credit_score.'</td></tr>
            <tr><td class="clm">Average:</td><td>'.$data->average.'</td></tr>
            <tr><td class="clm">Time:</td><td>'.$data->time.'</td></tr>
            <tr><td class="clm">State:</td><td>'.$data->first_state.'</td></tr>
            </table><br>

            <div style="">
            <span style="font-size: 20px;">Business Qualification Form </span> 
            </div>
            <div style="margen-top:0px"><span><b>Business Information:</b> </span></div>
            <table style="width:80%">
            <tr><td class="clm">Company Name:</td><td>'.$data->company_name.'</td></tr>
            <tr><td class="clm">DBA:</td><td>'.$data->dba.'</td></tr>
            <tr><td class="clm">Fedral Tax Id.:</td><td>'.$data->fedral_taxid.'</td></tr>
            <tr><td class="clm">Company Type:</td><td>'.$data->purpose.'</td></tr>
            <tr><td class="clm">Industry Description:</td><td>'.$data->industry_des.'</td></tr>
            <tr><td class="clm">Business Phone :</td><td>'.$data->bussiness_phone.'</td></tr>
            <tr><td class="clm">Business Start Date:</td><td>'.$data->bussines_startDate.'</td></tr>
            </table> <br><div style="margen-top:3px">
            <span><b>Business Address</b> : </span> </div>
            <table style="width:80%">

            <tr><td class="clm">Street :</td><td>'.$data->Street.'</td></tr>
            <tr><td class="clm">City:</td><td>'.$data->city.'</td></tr>
            <tr><td class="clm">State :</td><td>'.$data->state.'</td></tr>
            <tr><td class="clm">Postal :</td><td>'.$data->postal.'</td></tr>
            <tr><td class="clm">Country :</td><td>'.$data->country.'</td></tr>
            </table><br>
            <div style="margen-top:1px"><span><b>Primary Owner Information :</b> </span>  </div>
            <table style="width:80%">

            <tr><td class="clm">Title:</td><td>'.$data->title.'</td></tr>
            <tr><td class="clm">First name:</td><td>'.$data->firstname.'</td></tr>
            <tr><td class="clm">Last name:</td><td>'.$data->lastname.'</td></tr>
            <tr><td class="clm">Phone:</td><td>'.$data->phone.'</td></tr>
            <tr><td class="clm">Email:</td><td>'.$data->email.'</td></tr>
            <tr><td class="clm">Social Security Number:</td><td>'.$data->ssn.'</td></tr>
            <tr><td class="clm">Date of Birth:</td><td>'.$formattedDOB.'</td></tr>
            <tr><td class="clm">Percent Ownership:</td><td>'.$data->ownership.'</td></tr>
            </table><br><div style="margen-top:1px">

            <span><b>Address : </b></span> </div>
            <table style="width:80%">
            <tr><td class="clm">Street:</td><td>'.$data->Street2.'</td></tr>
            <tr><td class="clm">City:</td><td>'.$data->city2.'</td></tr>
            <tr><td class="clm">State:</td><td>'.$data->state2.'</td></tr>
            <tr><td class="clm">Postal:</td><td>'.$data->postal2.'</td></tr>
            </table>

            <br><div style="margen-top:1px">
            <span><b>Underwriting Information :</b> </span> </div>
            <table style="width:80%">
            <tr><td class="clm">Gross Annual Sales:</td><td>'.$data->gross_sales.'</td></tr>
            <tr><td class="clm">Average Bank Balance:</td><td>'.$data->avg_bank_balance.'</td></tr>
            <tr><td class="clm">Requested Funding Amount:</td><td>'.$data->requested_amount.'</td></tr>
            </table><br>';
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
            <tr><td class="clm"> <div>
            <img  width="100px" class="signature" src="'.$data->digital_signature.'"/>
            <h3 style="margin-top: 0px; margin-bottom: 0px;"><u>'.$data->firstname.' '.$data->lastname.' </u></h3>
            </div></td>
            <td> <div style="margin-top: 19px;    margin-bottom: 0px;    font-size: 25px;">
            <h3 style="margin-top: 0px; margin-bottom: 0px;"><u>'.date('d/m/Y').' </u></h3>
            </div></td></tr></table></body></html>';
            
            // return view('pages/pdf',compact('html'));
            $options = new Options();
            $options->set('isRemoteEnabled', true);
            $dompdf = new \Dompdf\Dompdf($options);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();
            $pdfContent = $dompdf->output();
            $filenamecustom = 'form-Id' . $id . '.pdf';
            $filename = $filenamecustom;
            $path = storage_path('app/public/pdf/');
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }
            $filePath = $path . $filename;
            file_put_contents($filePath, $pdfContent);
            $urls = [
                'https://app.msfg.finance/storage/app/public/pdf/' . $filename,
                'https://app.msfg.finance/storage/app/uploads/' . $fileNames[0],
                'https://app.msfg.finance/storage/app/uploads/' . $fileNames[1],
                'https://app.msfg.finance/storage/app/uploads/' . $fileNames[2],
            ];

        $pdfRecord = FormSecond::where('u_id', $id)->first();
            if ($pdfRecord) {
                


                $pdfPathMain = storage_path('app/public/pdf/'. $filename);
                $pdfPath = storage_path('app/uploads/' . $fileNames[0]);
                $pdfPath1 = storage_path('app/uploads/' . $fileNames[1]);
                $pdfPath2 = storage_path('app/uploads/' . $fileNames[2]);
                $pdf = new PDFMerger;
                $pdf->addPDF($pdfPathMain, 'all');
                $pdf->addPDF($pdfPath, 'all');
                $pdf->addPDF($pdfPath1, 'all');
                $pdf->addPDF($pdfPath2, 'all');
                // $pdf->merge('file', $pdfPathMain); 
                $mergedFilePath = tempnam(sys_get_temp_dir(), 'merged_pdf_') . '.pdf';
                $pdf->merge('file', $mergedFilePath);
        

           
            $pdfContent = file_get_contents($mergedFilePath);
            $path = 'public/pdf';
            $filePath = $path . $mergedFilePath;
            Storage::put($filePath, $pdfContent);
            $pdfRecord->form_info = $mergedFilePath;
            $pdfRecord->save();

//third party burner Api Start
$token = PhoneBurnerToken::latest()->first();

$curl = curl_init();
  curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://www.phoneburner.com/rest/1/contacts/',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
  "id": "'.rand(1111,9999).$id.'",
  "first_name": "'.$data->first_name . '",
  "last_name": "' . $data->last_name.'",
  "phone": "'.$data->first_phone.'",
  "email": "'.$data->first_email.'",
  "company": "'.$data->company_name.'",
  "category_id": "65797524",
   "custom_fields": [
    {
      "name": "Full Name",
      "type": 1,
      "value": "'.$data->first_name . ' ' . $data->last_name.'"
    },
    {
      "name": "Company Name",
      "type": 1,
      "value": "'.$data->company_name .'"
    },
    {
      "name": "FILES LINK",
      "type": 1,
      "value": "https://app.msfg.finance/storage/app/uploads/'.$fileNames[0].',https://app.msfg.finance/storage/app/uploads/'.$fileNames[1].',https://app.msfg.finance/storage/app/uploads/'.$fileNames[2].'"
    },
    {
      "name": "Average Monthly Rev.",
      "type": 1,
      "value": "'.$data->average.'"
    },
    {
      "name": "Years in Business",
      "type": 1,
      "value": "'.$data->time.'"
    },
    {
      "name": "DOB",
      "type": 1,
      "value": "'.$formattedDOB.'"
    },
    {
      "name": "Website",
      "type": 1,
      "value": ""
    },
    {
      "name": "Date Created",
      "type": 1,
      "value": "'.date('Y-m-d').'"
    },
    {
      "name": "Status",
      "type": 1,
      "value": "Active"
    },
    {
      "name": "Loan Amount",
      "type": 1,
      "value": "'.$data->amt.'"
    },
    {
      "name": "User ID",
      "type": 1,
      "value": "'.$id.'"
    },
    {
      "name": "Funding amount",
      "type": 1,
      "value": "'.$data->requested_amount.'"
    },
    {
      "name": "Funding Date",
      "type": 1,
      "value": "'.date('Y-m-d').'"
    },
    {
      "name": "Receive Date",
      "type": 1,
      "value": ""
    },
    {
      "name": "Source",
      "type": 1,
      "value": "API"
    },
    {
      "name": "DBA",
      "type": 1,
      "value": "'.$data->dba.'"
    },
    {
      "name": "Gross Annual Sales",
      "type": 1,
      "value": "'.$data->gross_sales.'"
    },
    
    {
      "name": "Business Start Date",
      "type": 1,
      "value": "'.date('Y-m-d', strtotime($data->bussines_startDate)).'"
    },
    {
      "name": "Credit Score",
      "type": 1,
      "value": "'.$data->credit_score.'"
    },
    {
      "name": "Received Date",
      "type": 1,
      "value": ""
    },
    {
      "name": "Owner",
      "type": 1,
      "value": "'.$data->first_name . ' ' . $data->last_name.'"
    },
    {
      "name": "Contact Name",
      "type": 1,
      "value": "'.$data->first_name . ' ' . $data->last_name.'"
    },
    {
      "name": "Business Owner Title",
      "type": 1,
      "value": "'.$data->title.'"
    },
    {
      "name": "Employee Size",
      "type": 1,
      "value": ""
    },
    {
      "name": "filling day",
      "type": 1,
      "value": ""
    },
    {
      "name": "filling month",
      "type": 1,
      "value": ""
    },
    {
      "name": "Year",
      "type": 1,
      "value": "'.date('Y').'"
    },
    {
      "name": "Funding Company",
      "type": 1,
      "value": ""
    },
    {
      "name": "Date Last Modified",
      "type": 1,
      "value": ""
    },
    {
      "name": "Contact LAST NAME",
      "type": 1,
      "value": ""
    },
    {
      "name": "Sales Volume",
      "type": 1,
      "value": ""
    },
    {
      "name": "Second Party Name",
      "type": 1,
      "value": ""
    },
    {
      "name": "currently Working?",
      "type": 1,
      "value": ""
    },
    {
      "name": "Publisher ID",
      "type": 1,
      "value": ""
    },
    {
      "name": "Business Name",
      "type": 1,
      "value": "'.$data->bus_name.'"
    },
    {
      "name": "Mobile",
      "type": 1,
      "value": "'.$data->phone.'"
    },
    {
      "name": "Line Type",
      "type": 1,
      "value": "Mobile"
    },
    {
      "name": "carrier",
      "type": 1,
      "value": ""
    },
    {
      "name": "Monthly Revenue",
      "type": 1,
      "value": "'.$data->average.'"
    },
    {
      "name": "Contact First Name",
      "type": 1,
      "value": ""
    },
    {
      "name": "Tier",
      "type": 1,
      "value": ""
    },
    {
      "name": "Campaign Email",
      "type": 1,
      "value": "'.$data->first_email.'"
    }
  ]
}',


  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer '.$token->access_token,
    'Content-Type: application/json',
    'Cookie: SALT_SESS_DEV=5icrh365sj6gscpple149jsjt8p6fu84svr5d3oegvqe6l3nna84jr7dtusof3b8'
  ),
));

$response =curl_exec($curl);

curl_close($curl);

$responseArray = json_decode($response, true);

if ($responseArray['http_status'] == 201 && isset($responseArray['contacts']['contacts']['user_id'])) {
    // Extract the user_id
    $phoneburner = $responseArray['contacts']['contacts']['user_id'];
    echo "User ID: " . $phoneburner;
} else {
    echo "Error: Could not retrieve user_id.";
}


//third party burner Api End






            $form=FormSetting::where('setting','General')->first();
            Mail::to($form->email)->send(new AdminEmail('https://app.msfg.finance/storage/app/'.$path . $mergedFilePath,$id,$data->email,$phoneburner));
            unlink($mergedFilePath);
            return response()->json(['message' => 'PDF updated successfully']);
        }
        }else{
            
            
            $fileNames = explode(',', $data->bank_statement); 
		 $carbonDate = Carbon::parse($data->dob);
        $formattedDOB = $carbonDate->format('d-m-Y');
        require_once public_path('dompdf/autoload.inc.php');
            $html = '<html><style>
            table, th, td {border:1px solid black; border-collapse: collapse; } .title-head{ width: 80%; display: flex; justify-content: space-between; } .clm{ width:30% } td{ padding:4px; } </style>
            <body>
            <div><img src="'.URL::to('/storage/app/msgf-logo.svg').'" alt="Logo" style="width:25%;"></div>
            <div style="width: 80%;display: flex; justify-content: space-between; margin-top: 2px;">
            <span style="font-size: 20px;">Prequalification Form </span> 
            </div><br>

            <table style="width:80%">
            <tr><td class="clm">Status:</td><td>'.$data->lead_type.'</td></tr>
            <tr><td class="clm">First Name:</td><td>'.$data->first_name.'</td></tr>
            <tr><td class="clm">Last name:</td><td>'.$data->last_name.'</td></tr>
            <tr><td class="clm">Email:</td><td>'.$data->first_email.'</td></tr>
            <tr><td class="clm">Phone Number:</td><td>'.$data->first_phone.'</td></tr>
            <tr><td class="clm">Business Name:</td><td>'.$data->bus_name.'</td></tr>
            <tr><td class="clm">Business Type:</td><td>'.$data->type.'</td></tr>
            <tr><td class="clm">Amount:</td><td>'.$data->amt.'</td></tr>
            <tr><td class="clm">EIN:</td><td>'.$data->ein.'</td></tr>
            <tr><td class="clm">Business Industry:</td><td>'.$data->industries.'</td></tr>
            <tr><td class="clm">Purpose:</td><td>'.$data->first_purpose.'</td></tr>
            <tr><td class="clm">Purpose:</td><td>'.$data->credit_score.'</td></tr>
            <tr><td class="clm">Average:</td><td>'.$data->average.'</td></tr>
            <tr><td class="clm">Time:</td><td>'.$data->time.'</td></tr>
            <tr><td class="clm">State:</td><td>'.$data->first_state.'</td></tr>
            </table><br>

            <div style="">
            <span style="font-size: 20px;">Business Qualification Form </span> 
            </div>
            <div style="margen-top:0px"><span><b>Business Information:</b> </span></div>
            <table style="width:80%">
            <tr><td class="clm">Company Name:</td><td>'.$data->company_name.'</td></tr>
            <tr><td class="clm">DBA:</td><td>'.$data->dba.'</td></tr>
            <tr><td class="clm">Fedral Tax Id.:</td><td>'.$data->fedral_taxid.'</td></tr>
            <tr><td class="clm">Company Type:</td><td>'.$data->purpose.'</td></tr>
            <tr><td class="clm">Industry Description:</td><td>'.$data->industry_des.'</td></tr>
            <tr><td class="clm">Business Phone :</td><td>'.$data->bussiness_phone.'</td></tr>
            <tr><td class="clm">Business Start Date:</td><td>'.$data->bussines_startDate.'</td></tr>
            </table> <br><div style="margen-top:3px">
            <span><b>Business Address</b> : </span> </div>
            <table style="width:80%">

            <tr><td class="clm">Street :</td><td>'.$data->Street.'</td></tr>
            <tr><td class="clm">City:</td><td>'.$data->city.'</td></tr>
            <tr><td class="clm">State :</td><td>'.$data->state.'</td></tr>
            <tr><td class="clm">Postal :</td><td>'.$data->postal.'</td></tr>
            <tr><td class="clm">Country :</td><td>'.$data->country.'</td></tr>
            </table><br>
            <div style="margen-top:1px"><span><b>Primary Owner Information :</b> </span>  </div>
            <table style="width:80%">

            <tr><td class="clm">Title:</td><td>'.$data->title.'</td></tr>
            <tr><td class="clm">First name:</td><td>'.$data->firstname.'</td></tr>
            <tr><td class="clm">Last name:</td><td>'.$data->lastname.'</td></tr>
            <tr><td class="clm">Phone:</td><td>'.$data->phone.'</td></tr>
            <tr><td class="clm">Email:</td><td>'.$data->email.'</td></tr>
            <tr><td class="clm">Social Security Number:</td><td>'.$data->ssn.'</td></tr>
            <tr><td class="clm">Date of Birth:</td><td>'.$formattedDOB.'</td></tr>
            <tr><td class="clm">Percent Ownership:</td><td>'.$data->ownership.'</td></tr>
            </table><br><div style="margen-top:1px">

            <span><b>Address : </b></span> </div>
            <table style="width:80%">
            <tr><td class="clm">Street:</td><td>'.$data->Street2.'</td></tr>
            <tr><td class="clm">City:</td><td>'.$data->city2.'</td></tr>
            <tr><td class="clm">State:</td><td>'.$data->state2.'</td></tr>
            <tr><td class="clm">Postal:</td><td>'.$data->postal2.'</td></tr>
            </table>

            <br><div style="margen-top:1px">
            <span><b>Underwriting Information :</b> </span> </div>
            <table style="width:80%">
            <tr><td class="clm">Gross Annual Sales:</td><td>'.$data->gross_sales.'</td></tr>
            <tr><td class="clm">Average Bank Balance:</td><td>'.$data->avg_bank_balance.'</td></tr>
            <tr><td class="clm">Requested Funding Amount:</td><td>'.$data->requested_amount.'</td></tr>
            </table><br>';
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
            <tr><td class="clm"> <div>
            <img  width="100px" class="signature" src="'.$data->digital_signature.'"/>
            <h3 style="margin-top: 0px; margin-bottom: 0px;"><u>'.$data->firstname.' '.$data->lastname.' </u></h3>
            </div></td>
            <td> <div style="margin-top: 19px;    margin-bottom: 0px;    font-size: 25px;">
            <h3 style="margin-top: 0px; margin-bottom: 0px;"><u>'.date('d/m/Y').' </u></h3>
            </div></td></tr></table></body></html>';
            
            // return view('pages/pdf',compact('html'));
            $options = new Options();
            $options->set('isRemoteEnabled', true);
            $dompdf = new \Dompdf\Dompdf($options);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();
            $pdfContent = $dompdf->output();
            $filenamecustom = 'form-Id' . $id . '.pdf';
            $filename = $filenamecustom;
            $path = storage_path('app/public/pdf/');
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }
            $filePath = $path . $filename;
            file_put_contents($filePath, $pdfContent);

        $pdfRecord = FormSecond::where('u_id', $id)->first();
            if ($pdfRecord) {
                
          


                //Phone burner Api code Start
                $token = PhoneBurnerToken::latest()->first();
$curl = curl_init();
curl_setopt_array($curl, array(
CURLOPT_URL => 'https://www.phoneburner.com/rest/1/contacts/',
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => '',
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => 'POST',
CURLOPT_POSTFIELDS =>'{
"id": "'.rand(1111,9999).$id.'",
"first_name": "'.$data->first_name . '",
"last_name": "' . $data->last_name.'",
"phone": "'.$data->first_phone.'",
"email": "'.$data->first_email.'",
"company": "'.$data->company_name.'",
"category_id": "65797524",
 "custom_fields": [
  {
    "name": "Full Name",
    "type": 1,
    "value": "'.$data->first_name . ' ' . $data->last_name.'"
  },
  {
    "name": "Company Name",
    "type": 1,
    "value": "'.$data->company_name .'"
  },
  {
    "name": "FILES LINK",
    "type": 1,
    "value": ""
  },
  {
    "name": "Average Monthly Rev.",
    "type": 1,
    "value": "'.$data->average.'"
  },
  {
    "name": "Years in Business",
    "type": 1,
    "value": "'.$data->time.'"
  },
  {
    "name": "DOB",
    "type": 1,
    "value": "'.$formattedDOB.'"
  },
  {
    "name": "Website",
    "type": 1,
    "value": ""
  },
  {
    "name": "Date Created",
    "type": 1,
    "value": "'.date('Y-m-d').'"
  },
  {
    "name": "Status",
    "type": 1,
    "value": "Active"
  },
  {
    "name": "Loan Amount",
    "type": 1,
    "value": "'.$data->amt.'"
  },
  {
    "name": "User ID",
    "type": 1,
    "value": "'.$id.'"
  },
  {
    "name": "Funding amount",
    "type": 1,
    "value": "'.$data->requested_amount.'"
  },
  {
    "name": "Funding Date",
    "type": 1,
    "value": "'.date('Y-m-d').'"
  },
  {
    "name": "Receive Date",
    "type": 1,
    "value": ""
  },
  {
    "name": "Source",
    "type": 1,
    "value": "API"
  },
  {
    "name": "DBA",
    "type": 1,
    "value": "'.$data->dba.'"
  },
  {
    "name": "Gross Annual Sales",
    "type": 1,
    "value": "'.$data->gross_sales.'"
  },

  {
    "name": "Business Start Date",
    "type": 1,
    "value": "'.date('Y-m-d', strtotime($data->bussines_startDate)).'"
  },
  {
    "name": "Credit Score",
    "type": 1,
    "value": "'.$data->credit_score.'"
  },
  {
    "name": "Received Date",
    "type": 1,
    "value": ""
  },
  {
    "name": "Owner",
    "type": 1,
    "value": "'.$data->first_name . ' ' . $data->last_name.'"
  },
  {
    "name": "Contact Name",
    "type": 1,
    "value": "'.$data->first_name . ' ' . $data->last_name.'"
  },
  {
    "name": "Business Owner Title",
    "type": 1,
    "value": "'.$data->title.'"
  },
  {
    "name": "Employee Size",
    "type": 1,
    "value": ""
  },
  {
    "name": "filling day",
    "type": 1,
    "value": ""
  },
  {
    "name": "filling month",
    "type": 1,
    "value": ""
  },
  {
    "name": "Year",
    "type": 1,
    "value": "'.date('Y').'"
  },
  {
    "name": "Funding Company",
    "type": 1,
    "value": ""
  },
  {
    "name": "Date Last Modified",
    "type": 1,
    "value": ""
  },
  {
    "name": "Contact LAST NAME",
    "type": 1,
    "value": ""
  },
  {
    "name": "Sales Volume",
    "type": 1,
    "value": ""
  },
  {
    "name": "Second Party Name",
    "type": 1,
    "value": ""
  },
  {
    "name": "currently Working?",
    "type": 1,
    "value": ""
  },
  {
    "name": "Publisher ID",
    "type": 1,
    "value": ""
  },
  {
    "name": "Business Name",
    "type": 1,
    "value": "'.$data->bus_name.'"
  },
  {
    "name": "Mobile",
    "type": 1,
    "value": "'.$data->phone.'"
  },
  {
    "name": "Line Type",
    "type": 1,
    "value": "Mobile"
  },
  {
    "name": "carrier",
    "type": 1,
    "value": ""
  },
  {
    "name": "Monthly Revenue",
    "type": 1,
    "value": "'.$data->average.'"
  },
  {
    "name": "Contact First Name",
    "type": 1,
    "value": ""
  },
  {
    "name": "Tier",
    "type": 1,
    "value": ""
  },
  {
    "name": "Campaign Email",
    "type": 1,
    "value": "'.$data->first_email.'"
  }
  ,
   
  {
    "name": "Industry Description",
    "type": 1,
    "value": "'.$data->industry_des.'"
  }
  ,
   {
    "name": "Business Phone",
    "type": 1,
    "value": "'.$data->bussiness_phone.'"
  }
  ,
  {
    "name": "Federal Tax Id",
    "type": 1,
    "value": "'.$data->fedral_taxid.'"
  }
  ,
  {
    "name": "Business Address Street",
    "type": 1,
    "value": "'.$data->Street.'"
  }
  ,
  {
    "name": "Business Address City",
    "type": 1,
    "value": "'.$data->city.'"
  }
  ,
  {
    "name": "Business Address State",
    "type": 1,
    "value": "'.$data->state.'"
  }
  ,
  {
    "name": "Business Address Postal Code",
    "type": 1,
    "value": "'.$data->postal.'"
  },
    {
    "name": "Social Security Number",
    "type": 1,
    "value": "'.$data->ssn.'"
  },
    {
    "name": "Percent Ownership",
    "type": 1,
    "value": "'.$data->ownership.'"
  },
    {
    "name": "Primary Owner Address Street",
    "type": 1,
    "value": "'.$data->Street2.'"
  },  {
    "name": "Primary Owner Address City",
    "type": 1,
    "value": "'.$data->city2.'"
  },  {
    "name": "Primary Owner Address State",
    "type": 1,
    "value": "'.$data->state2.'"
  },  {
    "name": "Primary Owner Address Postal Code",
    "type": 1,
    "value": "'.$data->postal2.'"
  }, {
    "name": "Is Business Location Owned or Rented",
    "type": 1,
    "value": "'.$data->location_ownership.'"
  },  {
    "name": "Average Bank Balance",
    "type": 1,
    "value": "'.$data->avg_bank_balance.'"
  },   {
    "name": "Requested Term Length in Month",
    "type": 1,
    "value": "'.$data->term_length.'"
  },  {
    "name": "Best phone number to reach you at?",
    "type": 1,
    "value": "'.$data->extra_phone.'"
  },
  {
    "name": "Company Type",
    "type": 1,
    "value": "'.$data->purpose.'"
  }
]
}',
CURLOPT_HTTPHEADER => array(
  'Authorization: Bearer '.$token->access_token,
  'Content-Type: application/json',
  'Cookie: SALT_SESS_DEV=5icrh365sj6gscpple149jsjt8p6fu84svr5d3oegvqe6l3nna84jr7dtusof3b8'
),
));

$response =curl_exec($curl);

curl_close($curl);

$responseArray = json_decode($response, true);

if ($responseArray['http_status'] == 201 && isset($responseArray['contacts']['contacts']['user_id'])) {
    // Extract the user_id
    $phoneburner = $responseArray['contacts']['contacts']['user_id'];
    echo "User ID123: " . $phoneburner;
} else {
    echo "Error: Could not retrieve user_id.";
}
//Phone burner Api End


$pdfRecord->form_info = $filename;
$pdfRecord->save();
$form=FormSetting::where('setting','General')->first();
Mail::to($form->email)->send(new AdminEmail('https://app.msfg.finance/storage/app/public/pdf/' . $filename,$id,$data->email,$phoneburner));


            return response()->json(['message' => 'PDF updated successfully']);
        }
            
            
            
            
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
    

    public function first() {
        return view('emails.first-form');
    }



// Small update. Sorry, about the MSFG Bad lead, please change the filter so it will be all when its under 5K remove
// the filter for “how long in business…” and just to make sure, the user will get a thank you page after the form1 and
// not go to the form2.. It will be unqualified lead
// Also include new business too.. So its “5000 or less” OR “New Business”

    public function form_test() {

        $pdf = new PDFMerger;
        $pdfPath4 = storage_path('app/public/pdf/formId97.pdf');
        $pdfPath = storage_path('app/uploads/eStmt_2024-07-31.pdf');
        $pdfPath1 = storage_path('app/uploads/eStmt_2024-05-31 (2).pdf');
        $pdfPath2 = storage_path('app/uploads/eStmt_2024-06-28 (3).pdf');

        $pdf->addPDF($pdfPath, 'all');
        $pdf->addPDF($pdfPath1, 'all');
        $pdf->addPDF($pdfPath2, 'all');
        $pdf->merge('file', $pdfPath4); 
        // $pdf->merge('download', 'samplepdfs/dummy.pdf');
        $mergedFilePath = storage_path('app/public/pdf/merged_output-test.pdf');
        $pdf->merge('file', $mergedFilePath);
    
        $pdfContent = file_get_contents($mergedFilePath);
        $finalPath = 'public/pdf/merged_output-test.pdf';
        Storage::put($finalPath, $pdfContent);
        
        // support@msfg.finance
        // adirmargaliot@gmail.com
        // support@msfg.finance
    
    }


    function phoneburner($id=null){
        $data=FormSubmission::Where('id',$id)->first();



$token = PhoneBurnerToken::latest()->first();
$curl = curl_init();
curl_setopt_array($curl, array(
CURLOPT_URL => 'https://www.phoneburner.com/rest/1/contacts/',
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => '',
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => 'POST',
CURLOPT_POSTFIELDS =>'{
"id": "'.rand(1111,9999).$data->id.'",
"first_name": "'.$data->f_name . '",
"last_name": "' . $data->l_name.'",
"phone": "'.$data->phone.'",
"email": "'.$data->email.'",
"company": "'.$data->b_name.'",
"category_id": "65797524",
 "custom_fields": [
  {
    "name": "Full Name",
    "type": 1,
    "value": "'.$data->f_name . ' ' . $data->l_name.'"
  },
  {
    "name": "Company Name",
    "type": 1,
    "value": "'.$data->b_name .'"
  },
  {
    "name": "FILES LINK",
    "type": 1,
    "value": ""
  },
  {
    "name": "Average Monthly Rev.",
    "type": 1,
    "value": "'.$data->average.'"
  },
  {
    "name": "Years in Business",
    "type": 1,
    "value": "'.$data->time.'"
  },
  {
    "name": "DOB",
    "type": 1,
    "value": ""
  },
  {
    "name": "Website",
    "type": 1,
    "value": ""
  },
  {
    "name": "Date Created",
    "type": 1,
    "value": "'.date('Y-m-d').'"
  },
  {
    "name": "Status",
    "type": 1,
    "value": "Active"
  },
  {
    "name": "Loan Amount",
    "type": 1,
    "value": "'.$data->amt.'"
  },
  {
    "name": "User ID",
    "type": 1,
    "value": "'.$data->id.'"
  },
  {
    "name": "Funding amount",
    "type": 1,
    "value": "'.$data->amt.'"
  },
  {
    "name": "Funding Date",
    "type": 1,
    "value": "'.date('Y-m-d').'"
  },
  {
    "name": "Receive Date",
    "type": 1,
    "value": "'.date('Y-m-d').'"
  },
  {
    "name": "Source",
    "type": 1,
    "value": "API"
  },
  {
    "name": "DBA",
    "type": 1,
    "value": ""
  },
  {
    "name": "Gross Annual Sales",
    "type": 1,
    "value": ""
  },
  {
    "name": "Line of Business",
    "type": 1,
    "value": "'.$data->business_industry.'"
  },
  {
    "name": "Business Start Date",
    "type": 1,
    "value": ""
  },
  {
    "name": "Credit Score",
    "type": 1,
    "value": "'.$data->credit_score.'"
  },
  {
    "name": "Received Date",
    "type": 1,
    "value": "'.date('Y-m-d').'"
  },
  {
    "name": "Owner",
    "type": 1,
    "value": "'.$data->f_name . ' ' . $data->l_name.'"
  },
  {
    "name": "Contact Name",
    "type": 1,
    "value": "'.$data->f_name . ' ' . $data->l_name.'"
  },
  {
    "name": "Business Owner Title",
    "type": 1,
    "value": ""
  },
  {
    "name": "Employee Size",
    "type": 1,
    "value": ""
  },
  {
    "name": "filling day",
    "type": 1,
    "value": ""
  },
  {
    "name": "filling month",
    "type": 1,
    "value": ""
  },
  {
    "name": "Year",
    "type": 1,
    "value": "'.date('Y').'"
  },
  {
    "name": "Funding Company",
    "type": 1,
    "value": ""
  },
  {
    "name": "Date Last Modified",
    "type": 1,
    "value": ""
  },
  {
    "name": "Contact LAST NAME",
    "type": 1,
    "value": "'.$data->l_name . '"
  },
  {
    "name": "Sales Volume",
    "type": 1,
    "value": ""
  },
  {
    "name": "Second Party Name",
    "type": 1,
    "value": ""
  },
  {
    "name": "currently Working?",
    "type": 1,
    "value": ""
  },
  {
    "name": "Publisher ID",
    "type": 1,
    "value": ""
  },
  {
    "name": "Business Name",
    "type": 1,
    "value": "'.$data->b_name.'"
  },
  {
    "name": "Mobile",
    "type": 1,
    "value": "'.$data->phone.'"
  },
  {
    "name": "Line Type",
    "type": 1,
    "value": "Mobile"
  },
  {
    "name": "carrier",
    "type": 1,
    "value": ""
  },
  {
    "name": "Monthly Revenue",
    "type": 1,
    "value": "'.$data->average.'"
  },
  {
    "name": "Contact First Name",
    "type": 1,
    "value": "'.$data->f_name . '"
  },
  {
    "name": "Tier",
    "type": 1,
    "value": ""
  },
  {
    "name": "Campaign Email",
    "type": 1,
    "value": "'.$data->email.'"
  },
  {
    "name": "Purpose",
    "type": 1,
    "value": "'.$data->purpose.'"
  },
  {
    "name": "Company Type",
    "type": 1,
    "value": "'.$data->business_type.'"
  }
]
}',
CURLOPT_HTTPHEADER => array(
  'Authorization: Bearer '.$token->access_token,
  'Content-Type: application/json',
  'Cookie: SALT_SESS_DEV=5icrh365sj6gscpple149jsjt8p6fu84svr5d3oegvqe6l3nna84jr7dtusof3b8'
),
));

$response =curl_exec($curl);

curl_close($curl);

$responseArray = json_decode($response, true);

if ($responseArray['http_status'] == 201 && isset($responseArray['contacts']['contacts']['user_id'])){
    // Extract the user_id
    $phoneburner = $responseArray['contacts']['contacts']['user_id'];
    // echo "User ID: " . $phoneburner;
    return $phoneburner;
} else {
    return "Error: Could not retrieve user_id.";
}
    }


    function phoneburnerSecond($id=null){


      //  $data = FormSecond::where('u_id', $id)->first();
       $data = DB::table('form_submissions')
       ->leftJoin('form_seconds', 'form_submissions.id', '=', 'form_seconds.u_id')
       ->select(
           'form_submissions.id as uid',
           'form_submissions.amt',
           'form_submissions.lead_type',
           'form_submissions.credit_score',
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
            if ($data) {
                
          
              $carbonDate = Carbon::parse($data->dob);
              $formattedDOB = $carbonDate->format('d-m-Y');
      

                //Phone burner Api code Start
                $token = PhoneBurnerToken::latest()->first();
$curl = curl_init();
curl_setopt_array($curl, array(
CURLOPT_URL => 'https://www.phoneburner.com/rest/1/contacts/',
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => '',
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => 'POST',
CURLOPT_POSTFIELDS =>'{
"id": "'.rand(1111,9999).$id.'",
"first_name": "'.$data->first_name . '",
"last_name": "' . $data->last_name.'",
"phone": "'.$data->first_phone.'",
"email": "'.$data->first_email.'",
"company": "'.$data->company_name.'",
"category_id": "65797524",
 "custom_fields": [
  {
    "name": "Full Name",
    "type": 1,
    "value": "'.$data->first_name . ' ' . $data->last_name.'"
  },
  {
    "name": "Company Name",
    "type": 1,
    "value": "'.$data->company_name .'"
  },
  {
    "name": "FILES LINK",
    "type": 1,
    "value": ""
  },
  {
    "name": "Average Monthly Rev.",
    "type": 1,
    "value": "'.$data->average.'"
  },
  {
    "name": "Years in Business",
    "type": 1,
    "value": "'.$data->time.'"
  },
  {
    "name": "DOB",
    "type": 1,
    "value": "'.$formattedDOB.'"
  },
  {
    "name": "Website",
    "type": 1,
    "value": ""
  },
  {
    "name": "Date Created",
    "type": 1,
    "value": "'.date('Y-m-d').'"
  },
  {
    "name": "Status",
    "type": 1,
    "value": "Active"
  },
  {
    "name": "Loan Amount",
    "type": 1,
    "value": "'.$data->amt.'"
  },
  {
    "name": "User ID",
    "type": 1,
    "value": "'.$id.'"
  },
  {
    "name": "Funding amount",
    "type": 1,
    "value": "'.$data->requested_amount.'"
  },
  {
    "name": "Funding Date",
    "type": 1,
    "value": "'.date('Y-m-d').'"
  },
  {
    "name": "Receive Date",
    "type": 1,
    "value": "'.date('Y-m-d').'"
  },
  {
    "name": "Source",
    "type": 1,
    "value": "API"
  },
  {
    "name": "DBA",
    "type": 1,
    "value": "'.$data->dba.'"
  },
  {
    "name": "Gross Annual Sales",
    "type": 1,
    "value": "'.$data->gross_sales.'"
  },
 
 
  {
    "name": "Business Start Date",
    "type": 1,
    "value": "'.date('m-Y', strtotime($data->bussines_startDate)).'"
  },
  {
    "name": "Credit Score",
    "type": 1,
    "value": "'.$data->credit_score.'"
  },
  {
    "name": "Received Date",
    "type": 1,
    "value": "'.date('Y-m-d').'"
  },
  {
    "name": "Owner",
    "type": 1,
    "value": "'.$data->first_name . ' ' . $data->last_name.'"
  },
  {
    "name": "Contact Name",
    "type": 1,
    "value": "'.$data->first_name . ' ' . $data->last_name.'"
  },
  {
    "name": "Business Owner Title",
    "type": 1,
    "value": "'.$data->title.'"
  },
  {
    "name": "Employee Size",
    "type": 1,
    "value": ""
  },
  {
    "name": "filling day",
    "type": 1,
    "value": ""
  },
  {
    "name": "filling month",
    "type": 1,
    "value": ""
  },
  {
    "name": "Year",
    "type": 1,
    "value": "'.date('Y').'"
  },
  {
    "name": "Funding Company",
    "type": 1,
    "value": "'.$data->company_name.'"
  },
  {
    "name": "Date Last Modified",
    "type": 1,
    "value": "'.date('Y-m-d').'"
  },
  {
    "name": "Contact LAST NAME",
    "type": 1,
    "value": "' . $data->last_name.'"
  },
  {
    "name": "Sales Volume",
    "type": 1,
    "value": ""
  },
  {
    "name": "Second Party Name",
    "type": 1,
    "value": ""
  },
  {
    "name": "currently Working?",
    "type": 1,
    "value": ""
  },
  {
    "name": "Publisher ID",
    "type": 1,
    "value": ""
  },
  {
    "name": "Business Name",
    "type": 1,
    "value": "'.$data->bus_name.'"
  },
  {
    "name": "Mobile",
    "type": 1,
    "value": "'.$data->phone.'"
  },
  {
    "name": "Line Type",
    "type": 1,
    "value": "Mobile"
  },
  {
    "name": "carrier",
    "type": 1,
    "value": ""
  },
  {
    "name": "Monthly Revenue",
    "type": 1,
    "value": "'.$data->average.'"
  },
  {
    "name": "Contact First Name",
    "type": 1,
    "value": "'.$data->first_name . '"
  },
  {
    "name": "Tier",
    "type": 1,
    "value": ""
  },
  {
    "name": "Campaign Email",
    "type": 1,
    "value": "'.$data->first_email.'"
  }
 
  ,
  {
    "name": "Industry Description",
    "type": 1,
    "value": "'.$data->industry_des.'"
  }
  ,
   {
    "name": "Business Phone",
    "type": 1,
    "value": "'.$data->bussiness_phone.'"
  }
  ,
  {
    "name": "Federal Tax Id",
    "type": 1,
    "value": "'.$data->fedral_taxid.'"
  }
  ,
  {
    "name": "Business Address Street",
    "type": 1,
    "value": "'.$data->Street.'"
  }
  ,
  {
    "name": "Business Address City",
    "type": 1,
    "value": "'.$data->city.'"
  }
  ,
  {
    "name": "Business Address State",
    "type": 1,
    "value": "'.$data->state.'"
  }
  ,
  {
    "name": "Business Address Postal Code",
    "type": 1,
    "value": "'.$data->postal.'"
  },
    {
    "name": "Social Security Number",
    "type": 1,
    "value": "'.$data->ssn.'"
  },
    {
    "name": "Percent Ownership",
    "type": 1,
    "value": "'.$data->ownership.'"
  },
    {
    "name": "Primary Owner Address Street",
    "type": 1,
    "value": "'.$data->Street2.'"
  },  {
    "name": "Primary Owner Address City",
    "type": 1,
    "value": "'.$data->city2.'"
  },  {
    "name": "Primary Owner Address State",
    "type": 1,
    "value": "'.$data->state2.'"
  },  {
    "name": "Primary Owner Address Postal Code",
    "type": 1,
    "value": "'.$data->postal2.'"
  }
  ,  {
    "name": "Is Business Location Owned or Rented",
    "type": 1,
    "value": "'.$data->location_ownership.'"
  },  {
    "name": "Average Bank Balance",
    "type": 1,
    "value": "'.$data->avg_bank_balance.'"
  },   {
    "name": "Requested Term Length in Month",
    "type": 1,
    "value": "'.$data->term_length.'"
  },  {
    "name": "Best phone number to reach you at?",
    "type": 1,
    "value": "'.$data->extra_phone.'"
  },
  {
    "name": "Company Type",
    "type": 1,
    "value": "'.$data->purpose.'"
  }
]
}',
CURLOPT_HTTPHEADER => array(
  'Authorization: Bearer '.$token->access_token,
  'Content-Type: application/json',
  'Cookie: SALT_SESS_DEV=5icrh365sj6gscpple149jsjt8p6fu84svr5d3oegvqe6l3nna84jr7dtusof3b8'
),
));

$response =curl_exec($curl);

curl_close($curl);

$responseArray = json_decode($response, true);

if ($responseArray['http_status'] == 201 && isset($responseArray['contacts']['contacts']['user_id'])) {
    // Extract the user_id
    $phoneburner = $responseArray['contacts']['contacts']['user_id'];
    // echo "User ID123: " . $phoneburner;
} else {
    // echo "Error: Could not retrieve user_id.";
}
//Phone burner Api End

    }

  }
   
    
    
}