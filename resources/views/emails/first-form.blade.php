<?php
use App\Models\FormSubmission;
// $id=293;
$form = FormSubmission::where('id', $id)->first();

?>
<html>
<head>
    <style>
        .logo-container {
            max-width: 10%;
        }
        .form-table {
            width: 50%;
            border-collapse: collapse;
        }
        .form-table td {
			width: 200px;
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .form-table .clm {
            text-align: left;
        }
    </style>
</head>
<body>
    <!-- <div class="logo-container">
        <img src="https://app.msfg.finance/storage/app/logo/msgf-logo%20(1).svg" alt="defaultImage">
    </div> -->
    <div>
        <h3 style="margin-bottom: -8px;">Prequalification Form</h3>
    </div>
    <br>
    <table class="form-table">
   <?php if(!empty($phoneburner)){ ?>
                 <tr>
                <td  class="clm">Phoneburner:</td>
                <td ><a href="https://www.phoneburner.com/cm/index#contact/{{$phoneburner}}">Link</a></td>
            </tr>
            <?php } ?>
	        <tr>
                <td  class="clm">Status:</td>
                <td >{{$form->lead_type}}</td>
            </tr>
             <tr>
                <td  class="clm">Referral Id:</td>
                <td >{{Session::get('url_links')}}</td>
            </tr>
            <tr>
                <td  class="clm">First Name:</td>
                <td >{{$form->f_name}}</td>
            </tr>
            <tr>
                <td  class="clm">Last name:</td>
                <td >{{$form->l_name}}</td>
            </tr>
            <tr>
                <td  class="clm">Email:</td>
                <td >{{$form->email}}</td>
            </tr>
            <tr>
                <td  class="clm">Phone Number:</td>
                <td >{{$form->phone}}</td>
            </tr>

            <tr>
                <td  class="clm">Business Name:</td>
                <td >{{$form->b_name}}</td>
            </tr>

            <tr>
                <td  class="clm">Business Type:</td>
                <td >{{$form->business_type}}</td>
            </tr>
            <tr>
                <td  class="clm">FICO credit Score:</td>
                <td >{{$form->credit_score}}</td>
            </tr>
            <tr>
                <td  class="clm">Amount Requested:</td>
                <td >{{$form->amt}}</td>
            </tr>
            <tr>
                <td  class="clm">Business Industry:</td>
                <td >{{$form->business_industry}}</td>
            </tr>

            <tr>
                <td  class="clm">Purpose:</td>
                <td >{{$form->purpose}}</td>
            </tr>

            <tr>
                <td  class="clm">Credit Score:</td>
                <td >{{$form->credit_score}}</td>
            </tr>

            <tr>
                <td  class="clm">Average Revenue 3 Months:</td>
                <td >{{$form->average}}</td>
            </tr>

            <tr>
                <td  class="clm">Time in Business:</td>
                <td >{{$form->time}}</td>
            </tr>

            <tr>
                <td  class="clm">Business State:</td>
                <td >{{$form->state}}</td>
            </tr>
            <tr>
                <td  class="clm">Lead Info Link:</td>
                <td ><a href="{{ url('/forms-show').'/'.$id}}">Click here</a></td>
            </tr>
        <!-- Include other form fields as necessary -->

    </table>
</body>
</html>
