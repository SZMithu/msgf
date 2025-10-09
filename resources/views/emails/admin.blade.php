<?php
use App\Models\FormSubmission;
use App\Models\FormSecond;
// $id=293;
$form = FormSubmission::where('id', $id)->first();
$form2 = FormSecond::where('u_id', $id)->first();
// print_r($form2); die;


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
        <h3 style="">Prequalification Form</h3>
    </div>
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
                <td >{{$form->referral}}</td>
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
                <td  class="clm">Amount:</td>
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
                <td  class="clm">Average:</td>
                <td >{{$form->average}}</td>
            </tr>

            <tr>
                <td  class="clm">Time:</td>
                <td >{{$form->time}}</td>
            </tr>

            <tr>
                <td  class="clm">State:</td>
                <td >{{$form->state}}</td>
            </tr>
        <!-- Include other form fields as necessary -->
    </table>


    <div>
        <h3 style="">Business Qualification Form</h3>
    </div>
    <div>
        <h4 style="">Business Information</h4>
    </div>
    <table class="form-table">
    <tr>
                <td  class="clm">Company Name:</td>
                <td >{{$form2->company_name}}</td>
            </tr>
            <tr>
                <td  class="clm">DBA:</td>
                <td >{{$form2->dba}}</td>
            </tr>
            <tr>
                <td  class="clm">Federal Tax Id:</td>
                <td >{{$form2->fedral_taxid}}</td>
            </tr>
            <tr>
                <td  class="clm">Industry Description:</td>
                <td >{{$form2->industry_des}}</td>
            </tr>

            <tr>
                <td  class="clm">Company Type:</td>
                <td >{{$form2->purpose}}</td>
            </tr>

            <tr>
                <td  class="clm">Business Phone:</td>
                <td >{{$form2->bussiness_phone}}</td>
            </tr>

            <tr>
                <td  class="clm">Business Start Date:</td>
                <td >{{$form2->bussines_startDate}}</td>
            </tr>
        <!-- Include other form fields as necessary -->
    </table>

    <div>
        <h4 style="">Business Address</h4>
    </div>
    <table class="form-table">
    <tr>
                <td  class="clm">Street:</td>
                <td >{{$form2->Street}}</td>
            </tr>
            <tr>
                <td  class="clm">City:</td>
                <td >{{$form2->city}}</td>
            </tr>
            <tr>
                <td  class="clm">State:</td>
                <td >{{$form2->state}}</td>
            </tr>
            <tr>
                <td  class="clm">Postal Code:</td>
                <td >{{$form2->postal}}</td>
            </tr>

           
        <!-- Include other form fields as necessary -->
    </table>

    <div>
        <h4 style="">Primary Owner Information</h4>
    </div>
    <table class="form-table">
    <tr>
                <td  class="clm">Title:</td>
                <td >{{$form2->title}}</td>
            </tr>
            <tr>
                <td  class="clm">First Name:</td>
                <td >{{$form2->firstname}}</td>
            </tr>
            <tr>
                <td  class="clm">Last Name:</td>
                <td >{{$form2->lastname}}</td>
            </tr>
            <tr>
                <td  class="clm">Phone Number:</td>
                <td >{{$form2->phone}}</td>
            </tr>

            <tr>
                <td  class="clm">Email:</td>
                <td >{{$form2->email}}</td>
            </tr>

            <tr>
                <td  class="clm">Social Security Number:</td>
                <td >{{$form2->ssn}}</td>
            </tr>

            <tr>
                <td  class="clm">Date of Birth:</td>
                <td >{{$form2->dob}}</td>
            </tr>
            <tr>
                <td  class="clm">Percent Ownership	:</td>
                <td >{{$form2->ownership}}</td>
            </tr>
        <!-- Include other form fields as necessary -->
    </table>


    <div>
        <h4 style="">Address</h4>
    </div>
    <table class="form-table">
    <tr>
                <td  class="clm">Street:</td>
                <td >{{$form2->Street2}}</td>
            </tr>
            <tr>
                <td  class="clm">City:</td>
                <td >{{$form2->city2}}</td>
            </tr>
            <tr>
                <td  class="clm">State:</td>
                <td >{{$form2->state2}}</td>
            </tr>
            <tr>
                <td  class="clm">Postal Code:</td>
                <td >{{$form2->postal2}}</td>
            </tr>

            
        <!-- Include other form fields as necessary -->
    </table>

    <div>
        <h4 style="">Underwriting Information
        </h4>
    </div>
    <table class="form-table">
    <!-- <tr>
                <td  class="clm">Is Business Location Owned or Rented?:</td>
                <td >{{$form2->location_ownership}}</td>
            </tr> -->
            <tr>
                <td  class="clm">Gross Annual Sales:</td>
                <td >{{$form2->gross_sales}}</td>
            </tr>
            <tr>
                <td  class="clm">Average Bank Balance:</td>
                <td >{{$form2->avg_bank_balance}}</td>
            </tr>
            <tr>
                <td  class="clm">Requested Funding Amount:</td>
                <td >{{$form2->requested_amount}}</td>
            </tr>
            <!-- <tr>
                <td  class="clm">Requested Term Length in Month	:</td>
                <td >{{$form2->term_length}}</td>
            </tr> -->

            <tr>
                <td  class="clm">Lead Info Link:</td>
                <td ><a href="{{ url('/forms-show').'/'.$id}}">Click here</a></td>
            </tr>

        <!-- Include other form fields as necessary -->
    </table>
</body>
</html>
