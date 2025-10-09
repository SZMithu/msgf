<?php

namespace App\Http\Controllers\Apps;

use App\DataTables\FormDataTable;
use App\DataTables\LinkTable;
use App\DataTables\ReferralTable;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\FormSubmission;
use App\Models\FormSecond;
use App\Models\FormSetting;
use App\Models\Links;
use App\Models\Referral;

class FormManagementController extends Controller
{
    public function index(FormDataTable $dataTable){
        return $dataTable->render('pages/apps.form-management.forms.list');
    }

    public function show(Request $request){
        $setting=FormSetting::where('setting','General')->first();
        $forms = DB::table('form_submissions')
        ->leftJoin('form_seconds', 'form_submissions.id', '=', 'form_seconds.u_id')
        ->select(
            'form_submissions.id as uid',
            'form_submissions.amt',
            'form_submissions.lead_type',
            'form_submissions.credit_score',
            'form_submissions.purpose as formpurpose',
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
        ->where('form_submissions.id', $request->id)
        ->first();
        return view('pages/apps.form-management.forms.show', compact('forms','setting'));
    }

    public function leads(Request $request){
        $forms=FormSubmission::where('id',$request->id)->first();
        return view('pages/apps.form-management.forms.leads', compact('forms'));
    }

    public function deleteSelected(Request $request){
        $ids = $request->input('ids');
        FormSubmission::whereIn('id', $ids)->delete();
        FormSecond::whereIn('u_id', $ids)->delete();
        return response()->json(['success' => 'Selected forms deleted successfully.']);
    }

    function generalSetting(){
        $form=FormSetting::where('setting','General')->first();
        return view('settings.general-setting',compact('form'));
    }

    function websitePages(){
        return view('settings.note-pad');
    }

    function updateSetting(Request $request){
        $data=FormSetting::where('setting','General')->first();
        if(!empty($data)){
            if ($request->hasFile('logo')) {
                $file = $request->file('logo');
                $fileName = $file->getClientOriginalName();
                $file->storeAs('/logo', $fileName);

                $data->update(['logo'=>$fileName,]);
        }
        if ($request->has('authorised')) { $authorized = 1; } else { $authorized = 0; }
        if ($request->has('phone_terms')) { $phone_terms = 1; } else { $phone_terms = 0; }
        if ($request->has('enableterms')) { $enableterms = 1; } else { $enableterms = 0; }
        if($request->form =='form1'){
            $data->update(['phone'=>$request->phone,'email'=>$request->email,'cc_email'=>$request->cc_email,'phone_terms'=>$phone_terms,'authorised'=>$authorized,'enableterms'=>$enableterms,]);
        }else if($request->form =='form2'){
            $data->update(['form_1'=>$request->form1,'form_2'=>$request->form2,'terms'=>$request->terms,'policy'=>$request->policy,]);
        }
        return redirect()->to('general-setting');
        }
        $insert= new FormSetting;
        $insert->form_1=$request->form1;
        $insert->form_2=$request->form2;
        $insert->phone=$request->phone;
        $insert->terms=$request->terms;
        $insert->policy=$request->policy;
        $insert->logo=$request->logo;
        $insert->email=$request->email;
        $insert->cc_email=$request->cc_email;
        $insert->save();
        return view('settings.website-pages');
    }

    function congrats(){
        $form=FormSetting::where('setting','General')->first();
        return view('settings.congrats-page',compact('form'));
    }

    function updateCongrats(Request $request){
        $data=FormSetting::where('setting','General')->first();
            $data->update([
                'email_text'=>$request->email_text,'thanks_text'=>$request->thanks_text,'congrats_title'=>$request->congrats_title,'thanks_title'=>$request->thanks_title,'thanks_bad'=>$request->thanks_bad
            ]);
            return redirect()->to('congrats-setting');
    }

    function tracking(LinkTable $dataTable ,Request $request){
        $link='';
        if(isset($request->edit) && !empty($request->edit)){
            $link=Links::where('id',$request->edit)->first();
        }

        $links=Links::all();
        // print_r($links); die;

        return $dataTable->render('pages/apps.links-management.links.list',compact('link','links'));
    }

    function updatetracking(Request $request){
        if(isset($request->id) && !empty($request->id)){
            $link=Links::where('id',$request->id)->first();
            $link->update([
                'links'=>$request->links,
            ]);
        return redirect()->to('tracking-links');
        }
        $insert= new Links;
        $insert->links=$request->links;
        $insert->save();
        return redirect()->to('tracking-links');
    }

    public function linksdelete($id){
        $Links = Links::findOrFail($id);
        $Links->delete();
        return redirect()->to('tracking-links')->with('success', 'Links deleted successfully.');
    }

    function referrallinks(ReferralTable $dataTable ,Request $request,$id){
        $link='';
        if(isset($id)){
            $link=Referral::where('referral_id',$id)->first();
        }
        return $dataTable->render('pages/apps.referral-management.forms.list',compact('link'));
    }

    public function serverinfo(Request $request){
        $forms=Referral::where('id',$request->id)->first();
        return view('pages/apps.referral-management.forms.leads', compact('forms'));
    }

}
