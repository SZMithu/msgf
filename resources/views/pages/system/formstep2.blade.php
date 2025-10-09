@include('layout.master')
@include('layout.header')
<!--begin::Card-->
<div class="outer">
<div class="container">
	<div class="row">
	   <div class="card1 card-flush w-lg-850px py-5">
		<div class="text-center mb-11">
			<!--begin::Title-->
			<h1 class="text-gray-900 fw-bolder mb-3 heading form-heading-first">
				<!-- Business Qualification Form -->
				{!!$title->form_2!!}
			</h1>

			<h1 class="text-gray-900 fw-bolder mb-3 heading form-heading-second">
			Pre-Approved Form
			</h1>
			<!--end::Title-->

			<!--begin::Subtitle-->
			<!--div class="text-gray-500 fw-semibold fs-6">
				Funding Expert
			</div-->
			
		</div>
			<div class="progress">
				<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0"
							aria-valuemax="100"></div>
			</div>
			</div>
			</div>
			</div>
					
<div class="card card-flush w-lg-850px py-5">
    <!--begin::Card body-->
    <div class="card-body">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:400,500"
      rel="stylesheet"
    />
       <link rel="stylesheet" href="https://app.msfg.finance/assets/plugins/global/plugins.bundle.css">
            <link rel="stylesheet" href="https://app.msfg.finance/assets/css/style.bundle.css">
        <!--begin::Page bg image-->
        <style>
        body {
            justify-content: center;
			align-items: center;
			  display: block;
            }
	
		.outer {
			margin-top: 30px;
			margin-bottom: 0;
		}
		button.btn.btn-danger.dnd-file-upload-widget-remove-file-button {
    margin-top: 4px;
}
    button.btn.btn-danger.dnd-file-upload-widget-remove-file-button {
    padding: 6px 14px !important;
}        
.ant-col {
    background: #9493e775;
    padding: 7px 12px;
    border-radius: 5px;
}
 .card1{
	 display: block;
	 margin: auto;
 }  
        </style>
		<style>
pre.brush\:html {
    /* display: table; */
    /* margin: auto; */
    overflow: hidden;
}

	button.action.btn {
		margin-top: 22px;
		margin-right: 20px;
	}

	label {
		font-size: 1.1rem !important;
		padding-top: 15px;
	}

	@media (min-width: 992px) {
		.w-lg-500px {
			width: 600px !important;
		}
	}
	.red-text {
    color: red; 
}
.progress, .progress-stacked {
    --bs-progress-height: 2.5rem !important;
}
.progress-bar.progress-bar-striped.active {
    font-size: 15px;
    font-weight: 600;
}
.progress, .progress-stacked {
    --bs-progress-bar-bg: #8180E3 !important;
}
.drop_zone {
  border: 2px dashed #cccccc;
  border-radius: 4px;
  padding: 15px;
  height: 120px;
  transition: background-color .1s linear .1s;
  text-align: center;
  position: relative;
}

.drop_zone.dragover {
  background-color: #F5F5F5;
}

.drop_zone > span {
  color: #CCCCD3;
  font-size: 12pt;
  text-align: center;
  display: block;
  margin-bottom: 5px;
  z-index: -1;
  pointer-events: none;
}

.drop_zone > label {
  background: #EEE;
}

.drop_zone > label > input {
  display: none;
}

.glyphicon-refresh-animate {
    -animation: spin .7s infinite linear;
    -webkit-animation: spin2 .7s infinite linear;
}

@-webkit-keyframes spin2 {
    from { -webkit-transform: rotate(0deg);}
    to { -webkit-transform: rotate(360deg);}
}

@keyframes spin {
    from { transform: scale(1) rotate(0deg);}
    to { transform: scale(1) rotate(360deg);}
}

button.btn.btn-danger.dnd-file-upload-widget-remove-file-button {
    font-size: 10;
}
.progress, .progress-stacked {
    --bs-progress-height: 2.5rem !important;
}
.progress-bar.progress-bar-striped.active {
    font-size: 15px;
    font-weight: 600;
}

.text-500.fw-bold.fs-6 {
    margin-top: 15px;
    margin-bottom: 12px;
}
.card{
	margin: auto;
}
button.action.btn.btn-md.btn-primary {
    background: #22b04d !important;
	border: none;
    font-size: 17px;
    font-weight: 700;
    background: #8180e0;
    color: #fff;
    height: 55px;
    text-align: center;
    padding: 20px 46.1px;
    display: inline-block;
    line-height: .8; 
    letter-spacing: 0;
    position: relative;
    border-radius: 3px;
    z-index: 1;
    cursor: pointer;
    outline: none;
    transition: all 0.4s ease-out;
    -moz-transition: all 0.4s ease-out;
    -webkit-transition: all 0.4s ease-out;
    -ms-transition: all 0.4s ease-out;
    -o-transition: all 0.4s ease-out;
}
button.action.back.btn.btn-md.btn-primary {
    background: #b5b2b2 !important;
}
button.action.btn.btn-md.btn-primary:hover {
    background: #8180e0 !important;
}
.text-primary a {
    color: #8180e0 !important;
}
.heading{
	font-size:2.75rem;
}
button#save {
    background: #8180e3;
    color: #fff;
    border: none;
	padding: 10px 20px;
}
button#clear {
    padding: 10px 20px;
    border: none;
}

/* form item */



.form-item{
  position: relative;
  margin-bottom: 15px

  

}
.form-item input{
	
  display: block;
  height: 67px;
  background: transparent;
  transition: all .3s ease;
  padding: 0 15px;
  font-size: 2rem;
  
}
.form-item input {
  border-color: #8180E3
}
.form-item select {
  border-color: #8180E3
     
 
}
.form-item label{
  position: absolute;
  cursor: text;
  z-index: 2;
  top: -5px;
  left: 10px;
  font-size: 13px !important;
  background: #fff;
  padding: 0 10px;
  color: #8180E3;
  transition: all .3s ease
}
.form-item input:focus + label,
.form-item input:valid + label{
  font-size: 11px;
  top: -5px;
}
.form-item select:focus + label,
.form-item select:valid + label{
  font-size: 11px;
  top: -5px ;
}

.form-item input:valid + label{
  font-size: 11px;
  top: -5px !important;
}
.form-item input:focus + label{
  color: #8180E3;
}

*,
*:focus{outline: none;}

.ant-space {
    display: flex;
    justify-content: end;
    /* margin-top: 4px; */
}

.credit-score-info {
    display: flex;
    justify-content: center;
    margin-top: 15px;
}

b {
    color: #8180E3;
    cursor: pointer;
}

.day, .month, .year {
      margin-right:3px; 
    }
	
	button.action.back {
    float: left;
    margin-top: 18px;
    background: none;
    border: none;
    color: #8180e3;
    font-size: 18px;
    font-weight: 550;
}
i.fas.fa-arrow-left {
    font-size: 15px;
    color: #8180e3;
    margin-right: -4px;
}
button.action.submit.btn.btn-md.btn-primary {
    /* width: 100%;
    float: left; */

	width: 50%;
    margin-left: auto;
    margin-right: auto;
    display: block;
}
/* button.action.next.btn.btn-md.btn-primary {
    width: 100%;
    float: left;
} */



button.action.next.btn.btn-md.btn-primary {
    width: 50%;
    margin-left: auto;
    margin-right: auto;
    display: block;
}

.canva-btn {
    margin-left: 41%;
    padding-inline: 0px;
    width: 10p;
}

p.signature-msg {
    text-align: center;
}

</style>



        <!--end::Page bg image-->

        	<form class="form w-100" novalidate="novalidate" id="multistep-form" data-kt-redirect-url="" action="" enctype='multipart/form-data'>
		@csrf
		<!--begin::Heading-->
		
	
			<div class="row">
				<div class="col-md-12 ">
					<div class="ant-space" style="display: flex;text-align-last: end;gap: 8px;"><div class="ant-space-item" style=""><img src="https://app.msfg.finance/storage/secure-icon.svg" alt="Padlock"></div><div class="ant-space-item">Secure</div></div>
					<div class="step well">
						<div class="text-500 fw-bold fs-6">
							Business Information
						</div>
						<div class="row">
							<input type="text" name="u_id" value="{{ $data->uid}}" hidden >
							
  
							<div class="col-md-6 col-sm-12">
						<div class="form-item">
						<input type="text" class="form-control bg-transparent" name="company_name"
									id="company_name" value="<?php echo !empty($data->company_name) ? $data->company_name : $form['b_name']; ?>">
									<label for="company_name"> Company Name<span class="red-text">*</span> </label>
									<span class="red-text" id="company_name_error"></span>

							</div>
							</div>
							<div class="col-md-6 col-sm-12">
							<div class="form-item">
								
								<input type="text" class="form-control bg-transparent" name="dba" id="dba" value="{{$data->dba}}">
								<label for="amt"> DBA
								</label>
							</div>
							</div>
							<div class="col-md-6 col-sm-12">
														<div class="form-item">

								<input type="text" class="form-control bg-transparent" name="fedral_taxid"
									id="fedral_taxid" value="<?php echo !empty($data->ein) ? $form['ein'] :$data->fedral_taxid; ?>" maxlength="10">
										<label for="amt">Federal Tax Id<span class="red-text">*</span>
								</label>
									<span class="red-text" id="fedral_taxid_error"></span>


							</div>
							</div>
							<div class="col-md-6 col-sm-12">
								
								<!--select class="form-select" id="purpose" name="purpose" required>
								<option value="" selected="selected">Select Company Type</option>
								
	
								<option value="LLC">LLC</option>
								<option value="Sole Proprietorship">Sole Proprietorship</option>
								<option value="Partnership">Partnership</option>
								<option value="Corporation">Corporation</option>
								<option value="S Corporation">S Corporation</option>
								</select-->
								<div class="form-item">
								<select class="form-select" id="purpose" name="purpose" required>
								<option value="" selected="selected">Select Company Type</option>
								
								@foreach ($typess as $company)
									<option value="{{ $company->name }}">{{ $company->name }}</option>
								@endforeach
							</select>
							
								<label for="amt">
									Company Type<span class="red-text">*</span>
								</label>
							
								<span class="red-text" id="purpose_error"></span>

							</div>
							</div>
							<div class="col-md-6 col-sm-12">
								<div class="form-item">
									
									<input type="text" class="form-control bg-transparent" name="industry_des"
										id="industry_des" value="{{$data->industry_des}}">
										<label for="amt">
										Industry Description
									</label>
										<span class="red-text" id="industry_des_error"></span>


								</div>
							</div>
							<div class="col-md-6 col-sm-12">
							<div class="form-item">
								
								
								<input type="text" class="form-control bg-transparent" name="bussiness_phone"
									id="bussiness_phone" maxlength="12" minlength="12" pattern="[0-9]*" inputmode="numeric" value="{{$data->bussiness_phone}}">
									<label for="amt">
									Business Phone<span class="red-text">*</span>
								</label>
									<span class="red-text" id="bussiness_phone_error"></span>


							</div>
							</div>
							<!-- <div class="col-md-6 col-sm-12">
								<label for="amt">Fax</label>
								<input type="text" class="form-control bg-transparent" name="fax" id="fax"
									placeholder="Fax">
									

							</div> -->
							<!-- <div class="col-md-6 col-sm-12">
								<div class="form-item">
								
								<input type="text" class="form-control bg-transparent" name="bussines_startDate"
									id="bussines_startDate" onfocus="(this.type='date')" onblur="(this.type='text')"
									value="{{$data->bussines_startDate}}"
									>
									<label for="amt">
									Business Start Date<span class="red-text">*</span>
								</label>
									<span class="red-text" id="bussines_startDate_error"></span>


							</div> 
							</div> -->

							<div class="col-md-3 col-sm-12">
								<div class="form-item">
								<select class="form-select" name="month" id="month">
									<option value="01">Jan</option>
									<option value="02">Feb</option>
									<option value="03">March</option>
									<option value="04">Apr</option>
									<option value="05">May</option>
									<option value="06">June</option>
									<option value="07">July</option>
									<option value="08">Aug</option>
									<option value="09">Sep</option>
									<option value="10">Oct</option>
									<option value="11">Nov</option>
									<option value="12">Dec</option>
								
								</select>
							
								<label for="month">
									Business Start Month<span class="red-text">*</span>
								</label>

							</div>
							</div><div class="col-md-3 col-sm-12">
								<div class="form-item">
								<input type="text" class="form-control bg-transparent" name="year"
									id="year" maxlength="4" minlength="4"  value="" onkeypress="return isNumberKey(event)">
									<label for="year" >
									Year<span class="red-text">*</span>
								</label>

									<span class="red-text" id="year_error"></span>

							</div>
							</div>

						</div>
						<div class="text-500 fw-bold fs-6">
							Business Address
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="form-item">
									
									<input type="text" class="form-control bg-transparent" name="Street" id="Street" value="{{$data->Street}}">
										<label for="city">
										Street<span class="red-text">*</span>
									</label>
										<span class="red-text" id="Street_error"></span>

								</div>
							</div>
							<div class="col-md-6 col-sm-12">
							<div class="form-item">
								
								<input type="text" class="form-control bg-transparent" name="city" id="city"  value="{{$data->city}}">
									<label for="city">
									City<span class="red-text">*</span>
								</label>
									<span class="red-text" id="city_error"></span>

							</div>
							</div>

							<div class="col-md-6 col-sm-12">
							<div class="form-item">
								
								<select class="form-select" name="state" id="state">
								<option value="" selected="selected">Select State</option>
    <option value="Alabama">Alabama</option>
    <option value="Alaska">Alaska</option>
    <option value="American Samoa">American Samoa</option>
    <option value="Arizona">Arizona</option>
    <option value="Arkansas">Arkansas</option>
    <option value="Baker Island">Baker Island</option>
    <option value="California">California</option>
    <option value="Colorado">Colorado</option>
    <option value="CT">Connecticut</option>
    <option value="Connecticut">Delaware</option>
    <option value="District of Columbia">District of Columbia</option>
    <option value="Florida">Florida</option>
    <option value="Georgia">Georgia</option>
    <option value="Guam">Guam</option>
    <option value="Hawaii">Hawaii</option>
    <option value="Howland Island">Howland Island</option>
    <option value="Idaho">Idaho</option>
    <option value="Illinois">Illinois</option>
    <option value="Indiana">Indiana</option>
    <option value="Iowa">Iowa</option>
    <option value="Jarvis Island">Jarvis Island</option>
    <option value="Johnston Atoll">Johnston Atoll</option>
    <option value="Kansas">Kansas</option>
    <option value="Kentucky">Kentucky</option>
    <option value="Kingman Reef">Kingman Reef</option>
    <option value="Louisiana">Louisiana</option>
    <option value="Maine">Maine</option>
    <option value="Maryland">Maryland</option>
    <option value="Massachusetts">Massachusetts</option>
    <option value="Michigan">Michigan</option>
    <option value="Midway Atoll">Midway Atoll</option>
    <option value="Minnesota">Minnesota</option>
    <option value="Mississippi">Mississippi</option>
    <option value="Missouri">Missouri</option>
    <option value="Montana">Montana</option>
    <option value="Navassa Island">Navassa Island</option>
    <option value="Nebraska">Nebraska</option>
    <option value="Nevada">Nevada</option>
    <option value="New Hampshire">New Hampshire</option>
    <option value="New Jersey">New Jersey</option>
    <option value="New Mexico">New Mexico</option>
    <option value="New York">New York</option>
    <option value="North Carolina">North Carolina</option>
    <option value="North Dakota">North Dakota</option>
    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
    <option value="Ohio">Ohio</option>
    <option value="Oklahoma">Oklahoma</option>
    <option value="Oregon">Oregon</option>
    <option value="Palmyra Atoll">Palmyra Atoll</option>
    <option value="Pennsylvania">Pennsylvania</option>
    <option value="Puerto Rico">Puerto Rico</option>
    <option value="Rhode Island">Rhode Island</option>
    <option value="South Carolina">South Carolina</option>
    <option value="South Dakota">South Dakota</option>
    <option value="Tennessee">Tennessee</option>
    <option value="Texas">Texas</option>
    <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
    <option value="United States Virgin Islands">United States Virgin Islands</option>
    <option value="Utah">Utah</option>
    <option value="Vermont">Vermont</option>
    <option value="Virginia">Virginia</option>
    <option value="Wake Island">Wake Island</option>
    <option value="Washington">Washington</option>
    <option value="West Virginia">West Virginia</option>
    <option value="Wisconsin">Wisconsin</option>
    <option value="Wyoming">Wyoming</option>
    </select>
								<label for="state">
									State<span class="red-text">*</span>
								</label>
								<span class="red-text" id="state_error"></span>

							</div>
							</div>

							<div class="col-md-6 col-sm-12">
															<div class="form-item">

								<input type="text" class="form-control bg-transparent" name="postal" id="postal"
								 onkeypress="return isNumberKey(event)" value="{{$data->postal}}">
									<label for="postal">
									Postal Code<span class="red-text">*</span>
								</label>
									<span class="red-text" id="postal_error"></span>

							</div>
							</div>

							<!-- <div class="col-md-6 col-sm-12">
							<div class="form-item">
								
								<select class="form-select" name="country" id="country">
									<option value="">Select Country</option>
									<option value="US" selected>United States</option>
									
								</select>
								<label for="country">
									Country<span class="red-text">*</span> 
								</label>
								<span class="red-text" id="country_error"></span>

							</div>
							</div> -->
						</div>
					</div>

					<div class="step well">
						<div class="text-500 fw-bold fs-6">
						Primary Owner Information
						</div> 
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="form-item">
								<select class="form-select" name="title" id="title">
									<option value="">Select Owner Type</option>
									<option value="Chief Executive Officer (CEO)">Chief Executive Officer (CEO)</option>
									<option value="Chief Operating Officer (COO)">Chief Operating Officer (COO)</option>
									<option value="Chief Financial Officer (CFO)">Chief Financial Officer (CFO)</option>
									<option value="Chief Technology Officer (CTO)">Chief Technology Officer (CTO)</option>
									<option value="Chief Marketing Officer (CMO)">Chief Marketing Officer (CMO)</option>
									<option value="Chief Information Officer (CIO)">Chief Information Officer (CIO)</option>
									<option value="Chief Human Resources Officer (CHRO)">Chief Human Resources Officer (CHRO)</option>
									<option value="Founder">Founder</option>
									<option value="President">President</option>
									<option value="Managing Director">Managing Director</option>
									<option value="Other">Other</option>
								</select>
							
								<!-- <input type="text" class="form-control bg-transparent" name="title" id="title" value="{{$data->title}}"> -->
										<label for="title">
										Business Owner Title<span class="red-text">*</span>
								</label>
									<span class="red-text" id="title_error"></span>

							</div>
							</div>

							<div class="col-md-6 col-sm-12">
							<div class="form-item">
								
								<input type="text" class="form-control bg-transparent" name="firstname" id="firstname"
								 value="<?php echo !empty($data->firstname) ? $data->firstname : $form['f_name']; ?>" >
									<label for="firstname">
									First Name<span class="red-text">*</span> 
								</label>
									<span class="red-text" id="firstname_error"></span>

							</div>
							</div>

							<div class="col-md-6 col-sm-12">
							<div class="form-item">
								
								<input type="text" class="form-control bg-transparent" name="lastname" id="lastname" value="<?php echo !empty($data->lastname) ? $data->lastname : $form['l_name']; ?>">
									<label for="lastname">
									Last Name<span class="red-text">*</span>
								</label>
									<span class="red-text" id="lastname_error"></span>

							</div>
							</div>

							<div class="col-md-6 col-sm-12">
							<div class="form-item">
							
								<input type="tel" class="form-control bg-transparent" name="phone" id="phone"
									 onkeypress="return isNumberKey(event)" value="<?php echo !empty($data->phone) ? $data->phone : $form['phone']; ?>" maxlength="12">
										<label for="phone">
									Phone Number<span class="red-text">*</span>
								</label>
									<span class="red-text" id="phone_error"></span>

							</div>
							</div>

							<div class="col-md-6 col-sm-12">
							<div class="form-item">
								
								<input type="email" class="form-control bg-transparent" name="email" id="email"
									 value="<?php echo !empty($data->email) ? $data->email : $form['email']; ?>">
									<label for="email">
									 Email<span class="red-text">*</span>
								</label>
									<span class="red-text" id="email_error"></span>

							</div>
							</div>
							<div class="col-md-6 col-sm-12">
							<div class="form-item">
								
								<input type="text" class="form-control bg-transparent" name="ssn" id="ssn"
									 onkeypress="return isNumberKey(event)" maxlength="11" minlength="11" value="{{$data->bussiness_phone}}">
									<label for="ssn">
										Social Security Number<span class="red-text">*</span>
									</label>
								<span class="red-text" id="ssn_error"></span>

							</div>
							</div>

							<div class="col-md-6 col-sm-12">
							<div class="form-item">
							
								<input type="text" class="form-control bg-transparent"  id="dob" 
								value="{{$data->dob}}">
      							<label for="dob">
									Date of Birth<span class="red-text">*</span>
								</label>

								<span class="red-text" id="dob_error" style="float: left;"></span>

							</div>
							</div>

							<div class="col-md-6 col-sm-12">
							<div class="form-item">
								
								<input type="text" class="form-control bg-transparent ownershipPer" name="ownership" id="ownership"
									 value="{{$data->ownership}}" maxlength="4"  onkeypress="return isNumberKey(event)">
									<label for="ownership">
									Percent Ownership<span class="red-text">*</span>
								</label>
									<span class="red-text" id="ownership_error"></span>

							</div>
							</div>

							<!-- <div class="col-md-6 col-sm-12">
							<div class="form-item">
								
								<select class="form-select" name="owner_title" id="owner_title">
									<option value="">Select Owner Type</option>
									<option value="Chief Executive Officer (CEO)">Chief Executive Officer (CEO)</option>
									<option value="Chief Operating Officer (COO)">Chief Operating Officer (COO)</option>
									<option value="Chief Financial Officer (CFO)">Chief Financial Officer (CFO)</option>
									<option value="Chief Technology Officer (CTO)">Chief Technology Officer (CTO)</option>
									<option value="Chief Marketing Officer (CMO)">Chief Marketing Officer (CMO)</option>
									<option value="Chief Information Officer (CIO)">Chief Information Officer (CIO)</option>
									<option value="Chief Human Resources Officer (CHRO)">Chief Human Resources Officer (CHRO)</option>
									<option value="Founder">Founder</option>
									<option value="President">President</option>
									<option value="Managing Director">Managing Director</option>
									<option value="Other">Other</option>
								</select>
								<label for="owner_title">
								Business Owner Title<span class="red-text">*</span>
								</label>
								<span class="red-text" id="owner_title_error"></span>

							</div>
							</div> -->
						</div>
						<div class="text-500 fw-bold fs-6">
						Primary Owner Address
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="form-item">

								<input type="text" class="form-control bg-transparent" name="Street2" id="Street2"
									 value="{{$data->Street2}}">
									
								<label for="city">
									 Street<span class="red-text">*</span> 
								</label>
									<span class="red-text" id="Street2_error"></span>

							</div>
							</div>
							<div class="col-md-6 col-sm-12">
							<div class="form-item">
								
								<input type="text" class="form-control bg-transparent" name="city2" id="city2"
									 value="{{$data->city2}}">
									<label for="city">
									 City<span class="red-text">*</span>
								</label>
									<span class="red-text" id="city2_error"></span>

							</div>
							</div>

							<div class="col-md-6 col-sm-12">
							<div class="form-item">
							
								<select class="form-select" name="state2" id="state2">
								<option value="" selected="selected">Select State</option>
    <option value="Alabama">Alabama</option>
    <option value="Alaska">Alaska</option>
    <option value="American Samoa">American Samoa</option>
    <option value="Arizona">Arizona</option>
    <option value="Arkansas">Arkansas</option>
    <option value="Baker Island">Baker Island</option>
    <option value="California">California</option>
    <option value="Colorado">Colorado</option>
    <option value="CT">Connecticut</option>
    <option value="Connecticut">Delaware</option>
    <option value="District of Columbia">District of Columbia</option>
    <option value="Florida">Florida</option>
    <option value="Georgia">Georgia</option>
    <option value="Guam">Guam</option>
    <option value="Hawaii">Hawaii</option>
    <option value="Howland Island">Howland Island</option>
    <option value="Idaho">Idaho</option>
    <option value="Illinois">Illinois</option>
    <option value="Indiana">Indiana</option>
    <option value="Iowa">Iowa</option>
    <option value="Jarvis Island">Jarvis Island</option>
    <option value="Johnston Atoll">Johnston Atoll</option>
    <option value="Kansas">Kansas</option>
    <option value="Kentucky">Kentucky</option>
    <option value="Kingman Reef">Kingman Reef</option>
    <option value="Louisiana">Louisiana</option>
    <option value="Maine">Maine</option>
    <option value="Maryland">Maryland</option>
    <option value="Massachusetts">Massachusetts</option>
    <option value="Michigan">Michigan</option>
    <option value="Midway Atoll">Midway Atoll</option>
    <option value="Minnesota">Minnesota</option>
    <option value="Mississippi">Mississippi</option>
    <option value="Missouri">Missouri</option>
    <option value="Montana">Montana</option>
    <option value="Navassa Island">Navassa Island</option>
    <option value="Nebraska">Nebraska</option>
    <option value="Nevada">Nevada</option>
    <option value="New Hampshire">New Hampshire</option>
    <option value="New Jersey">New Jersey</option>
    <option value="New Mexico">New Mexico</option>
    <option value="New York">New York</option>
    <option value="North Carolina">North Carolina</option>
    <option value="North Dakota">North Dakota</option>
    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
    <option value="Ohio">Ohio</option>
    <option value="Oklahoma">Oklahoma</option>
    <option value="Oregon">Oregon</option>
    <option value="Palmyra Atoll">Palmyra Atoll</option>
    <option value="Pennsylvania">Pennsylvania</option>
    <option value="Puerto Rico">Puerto Rico</option>
    <option value="Rhode Island">Rhode Island</option>
    <option value="South Carolina">South Carolina</option>
    <option value="South Dakota">South Dakota</option>
    <option value="Tennessee">Tennessee</option>
    <option value="Texas">Texas</option>
    <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
    <option value="United States Virgin Islands">United States Virgin Islands</option>
    <option value="Utah">Utah</option>
    <option value="Vermont">Vermont</option>
    <option value="Virginia">Virginia</option>
    <option value="Wake Island">Wake Island</option>
    <option value="Washington">Washington</option>
    <option value="West Virginia">West Virginia</option>
    <option value="Wisconsin">Wisconsin</option>
    <option value="Wyoming">Wyoming</option>
    </select>
									<label for="state">
									     State<span class="red-text">*</span>
								</label>
								<span class="red-text" id="state2_error"></span>

							</div>
							</div>

							<div class="col-md-6 col-sm-12">
							<div class="form-item">
								
								<input type="text" class="form-control bg-transparent" name="postal2" id="postal2"
									 maxlength="8" minlength="3" pattern="[0-9]*" inputmode="numeric" value="{{$data->postal2}}">
									<label for="postal">
									 Postal Code <span class="red-text">*</span>
								</label>
									<span class="red-text" id="postal2_error"></span>

							</div>
							</div>

							<!-- <div class="col-md-6 col-sm-12">
							<div class="form-item">
								
								<select class="form-select" name="country2" id="country2">
									<option value="">Select Country</option>
									<option value="US" selected>United States</option>

								</select>
								<label for="country">
									 Country<span class="red-text">*</span>
								</label>
								<span class="red-text" id="country2_error"></span>

							</div>
							</div> -->
						</div>
					</div>

					<div class="step well">
						<div class="text-500 fw-bold fs-6">
							Underwriting Information
						</div>
						<div class="row">
							<!-- <div class="col-md-12">
								<label for="loan_type">Type of Loan</label>
								<select class="form-control bg-transparent" name="loan_type" id="loan_type">
									<option value="">Select Loan Type</option>
									<option value="Business">Business Loan</option>
									<option value="Personal">Personal Loan</option>
								</select>
							</div> -->

							<div class="col-md-12">
								<div class="form-item">
									
									<select class="form-select" name="location_ownership"
										id="location_ownership">
										<option value="">Please select</option>
										<option value="Rented">Rented</option>
										<option value="Owned with Mortgage">Owned with Mortgage</option>
										<option value="Fully Owned">Fully Owned</option>
									</select>
									<label for="location_ownership">
										Is Business Location Owned or Rented?
									</label>
									<span class="red-text" id="location_ownership_error"></span>

								</div>
							</div>

							<!-- <div class="col-md-12">
								<label for="owned_details">If owned, specify details</label>
								<select class="form-control bg-transparent" name="owned_details" id="owned_details">
									<option value="">Select Option</option>
									<option value="Fully Owned">Fully Owned</option>
									<option value="Mortgaged">Mortgaged</option>
								</select>
							</div> -->

							<div class="col-md-6 col-sm-12">
							<div class="form-item">
								
								<input type="text" class="form-control bg-transparent" name="gross_sales"
									id="gross_sales" value="{{$data->gross_sales}}" onkeypress="return isNumberKey(event)" maxlength="11">
									<label for="gross_sales">
										Gross Annual Sales
									</label>
									<span class="red-text" id="gross_sales_error"></span>

							</div>
							</div>

							<div class="col-md-6 col-sm-12">
							<div class="form-item">
							
								<input type="text" class="form-control bg-transparent" name="avg_bank_balance"
									id="avg_bank_balance" value="{{$data->avg_bank_balance}}" maxlength="8" onkeypress="return isNumberKey(event)">
										<label for="avg_bank_balance">
									 Average Bank Balance
								</label>
									<span class="red-text" id="avg_bank_balance_error"></span>

							</div>
							</div>

							<!-- <div class="col-md-6 col-sm-12">
							<div class="form-item">
									
									<select class="form-select" name="requested_amount"
										id="requested_amount1">
										<option value="">Please Select</option>
									<option value="$10,000-$50,000">$10,000-$50,000</option>
									<option value="$50,000-$100,000">$50,000-$100,000</option>
									<option value="$100,000-$200,000">$100,000-$200,000</option>
									<option value="$200,000-$500,000">$200,000-$500,000</option>
									<option value="$500,000+">$500,000+</option>
									</select>
									<label for="requested_amount1">
									Requested Funding Amount
									</label>
									<span class="red-text" id="requested_amount1_error"></span>
								</div>
							</div> -->

							<div class="col-md-6 col-sm-12">
							<div class="form-item">
							
								<input type="text" class="form-control bg-transparent" name="requested_amount"
									id="requested_amount"  onkeypress="return isNumberKey(event)" value="" >
										<label for="requested_amount">
										Requested Funding Amount
								</label>
								<span class="red-text" id="requested_amount_error"></span>

							</div>
							</div>

							


							<div class="col-md-6 col-sm-12">
							<div class="form-item">
							
								<input type="text" class="form-control bg-transparent" name="term_length"
									id="term_length" maxlength="3" onkeypress="return isNumberKey(event)" >
										<label for="term_length">
									Requested Term Length in Month
								</label>
							</div>
							</div>
					@if($title->authorised ==1)
							<div class="col-md-6 col-sm-12">
							<div class="form-item">
							
								<input type="text" class="form-control bg-transparent" name="extra_phone"
									id="extra_phone" maxlength="12" onkeypress="return isNumberKey(event)" value="{{$data->extra_phone}}" >
										<label for="extra_phone">
									Best phone number to reach you at?
								</label>
								<span class="red-text" id="extra_phone_error"></span>

							</div>
							</div>
						@endif
							<!-- <div class="col-md-6 col-sm-12">
								<label>
									<input type="checkbox" name="existing_loan" id="existing_loan">
									Existing Working
								</label>
							</div> -->




						</div>
							<div class="row">
							<div class="col-md-12">
								<label>
									<input type="checkbox" name="enable_statement" id="enable_statement" onclick="get_statement()">
									</label>
									&nbsp; Do you want to upload bank statements? 
								

							</div>
							


						</div>
						<div class="bank_statement" id="bank_statement"  hidden>
						<div class="text-500 fw-bold fs-6">
						    
						<p>Please attach 3 months of bank statements. (Pdf files)</p>
						</div>
						<!-- <div class="row">
							<p>Please attach 4 months of bank statements.</p>
							<div class="col-md-6 col-sm-12">
								<label>
									Attach file
									<input type="file" class="form-control-file bg-transparent" name="bank_statements"
										id="bank_statements">
								</label>
							</div>
						</div> -->
						<div id="theWidget" class="dnd-file-upload-widget">
  <div class="form-group drop_zone">
    <span>Drag files here to attach</span>
    <span>or</span>
    <label class="btn btn-default">
      Select files
      <input type="file" multiple="" name="bank_statements[]" id="bank_statements" accept="application/pdf"/>
    </label>
  </div>

  <div class="files-container"></div>
  <div class="form-group text-center">
    <button class="btn btn-default dnd-file-upload-widget-upload-button hidden">
      
    </button>
    <span class="text-danger dnd-file-upload-widget-size-error hidden"></span>
  </div>
</div>
</div>
						<div class="text-500 fw-semibold fs-6">
							<!-- Credit Authorization -->
						</div>
						<div class="canva-box">
  <h2>Signature</h2>
<canvas id="canvas" width="300" height="150" style="background-color:#ffffff;border: 1px solid;margin-bottom: 11px; margin-left: 30%;"></canvas>
</div>
<div  class="canva-btn">
<button id="save" class="btn-md btn-primary" type="button">Save</button>
<button id="clear" type="button">Clear</button><br>
</div>
<p class="signature-msg"></p>
<input type="text" name="digital_signature" id="digital-sigunature" value="" hidden>
						

						@if($title->enableterms ==1)
						<div class="row">
							<div class="col-md-12">
								<label>
									<input type="checkbox" name="enableterms" id="enableterms">
									</label>
									&nbsp; By selecting is box and pressing the "Submit" button, you agree to receive automated text messages, including marketing messages, from Main Street Finance Group LLC. and agree to our <a  class="openModalBtnTerm"><b>Terms of Service</b></a> and <a class="openModalBtn"><b>Privacy Policy</b></a>. Consent is not a condition purchase. Message frequency will vary. Message and data rates may apply. Reply HELP help or STOP to cancel.
								
								<div id="enableterms_error" class="red-text"></div>

							</div>
							


						</div>
						@endif

						@if($title->phone_terms ==1)
						<div class="row">
							<div class="col-md-12">
								<label>
									<input type="checkbox" name="term_check" id="term_check">
									</label>
									&nbsp; By selecting is box and pressing the "Submit" button, you agree to receive phone calls end emails from Main Street Finance Group LLC. or parties representing Main Street Finance Group LLC and agree to our <a  class="openModalBtnTerm"><b>Terms of Service</b></a> and <a class="openModalBtn"><b>Privacy Policy</b></a>.
								
								<div id="phonecheck_error" class="red-text"></div>

							</div>
							


						</div>
						@endif
						</div>
					
            
				<pre class="brush:html">
				<button class="action next btn btn-md btn-primary" type="button">Next</button>
				
            <button class="action submit btn btn-md btn-primary" type="submit" >Submit</button>
			<button class="action back" type="button"><i class="fas fa-arrow-left"></i> Back</button>
        </div>
		<div class="credit-score-info"><div class="ant-col"><div class="ant-space ant-space-horizontal ant-space-align-center" style="gap: 8px;"><div class="ant-space-item" style=""><img src="https://app.msfg.finance/storage/info-icon.svg" alt=""></div><div class="ant-space-item">This application will not affect your credit score.</div></div></div></div>
	</div>

</form>
     
    </div>
    <!--end::Card body-->
</div>
</div>
<!--div style="height:60px;"></div-->
<!--end::Card-->
 <script src="https://app.msfg.finance/assets/plugins/global/plugins.bundle.js"></script>
    <script src="https://app.msfg.finance/assets/js/scripts.bundle.js"></script>
    <script src="https://app.msfg.finance/assets/js/widgets.bundle.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.createjs.com/easeljs-0.4.2.min.js"></script>


<script>




	$(document).ready(function () {
		
		var current = 1;

		widget = $(".step");
		btnnext = $(".next");
		btnback = $(".back");
		btnsubmit = $(".submit");

		// Init buttons and UI
		widget.not(':eq(0)').hide();
		hideButtons(current);
		setProgress(current);

		// Next button click action
		btnnext.click(function () {
			if (current < widget.length) {

				if(current == 0){
					formStep(1);

				}else{
					formStep(2);

				}
				if(current ==1){
					gotoTop();

					var first=firstform();
					if(first == true){
						insertform();

						widget.show();
				widget.not(':eq(' + (current++) + ')').hide();
				setProgress(current);
					}
				}else if(current ==2){
					gotoTop();

					var second=secondform();
					if(second == true){
						insertform();

						widget.show();
				widget.not(':eq(' + (current++) + ')').hide();
				setProgress(current);
					}

				}else{

				widget.show();
				widget.not(':eq(' + (current++) + ')').hide();
				setProgress(current);
				}
				//alert("I was called from btnNext");
			}
			hideButtons(current);
		});

		// Back button click action 	
		btnback.click(function () {
			if (current > 1) {
				current = current - 2;
				btnnext.trigger('click');
			}
			hideButtons(current);
		});
	});

	// Change progress bar action
	setProgress = function (currstep) {
		var percent = parseFloat(100 / widget.length) * currstep;
		percent = percent.toFixed();
		$(".progress-bar")
			.css("width", percent + "%")
			.html(percent + "%");
	}

	// Hide buttons according to the current step
	hideButtons = function (current) {
		var limit = parseInt(widget.length);

		$(".action").hide();

		if (current < limit) btnnext.show();
		if (current > 1) btnback.show();
		if (current == limit) { btnnext.hide(); btnsubmit.show(); }
	}


	function getPhone() {
    var phonecheck = '{{$title->phone_terms}}';
    if (phonecheck == 1) {
        var termCheckbox = document.getElementById('term_check');
        if (!termCheckbox.checked) {
            $('#phonecheck_error').empty().append('<span style="color:red;">Please agree to the terms and conditions</span>');
            return false;  // Return false if the checkbox is not checked
        } else {
            $('#phonecheck_error').empty();
            return true;   // Return true if the checkbox is checked
        }
    }
    return true;  // If phonecheck is not 1, assume no validation is needed
}

function getterm() {
    var enableterms = '{{$title->enableterms}}';
    if (enableterms == 1) {
        var enabletermsCheckbox = document.getElementById('enableterms');
        if (!enabletermsCheckbox.checked) {
            $('#enableterms_error').empty().append('<span style="color:red;">Please agree to the terms and conditions</span>');
            return false;  // Return false if the checkbox is not checked
        } else {
            $('#enableterms_error').empty();
            return true;   // Return true if the checkbox is checked
        }
    }
    return true;  // If enableterms is not 1, assume no validation is needed
}


	// form submit ajax 
    var uploadButton = document.querySelector('.dnd-file-upload-widget-upload-button');
    var agreeCheckbox = document.getElementById('authorize');
    
   

	var ImageLength=[];

	$('#multistep-form').on('submit', function (e) {
	    
	    
	    var statement = document.getElementById('enable_statement');
        if (statement.checked) {
	var ImgLength=ImageLength;
        } else {
        ImgLength=3;
}

		var signature=$('#digital-sigunature').val();
		if (signature =='') {
            event.preventDefault(); 
		$('.signature-msg').empty().append('<span style="color:red;">Please Add digital Signature</span>');

        }

		var gross_sales=$('#gross_sales').val();
		if (gross_sales =='') {
            event.preventDefault(); 
		$('#gross_sales_error').empty().append('<span style="color:red;">Please enter gross sale value</span>');

        }

		var avg_bank=$('#avg_bank_balance').val();
		if (avg_bank =='') {
            event.preventDefault(); 
			$('#avg_bank_balance_error').empty().append('<span style="color:red;">Please enter bank balance</span>');

        }
		var location_ownership=$('#location_ownership').val();

		if(location_ownership ==''){
			  $('#location_ownership_error').empty().append('Please select');
			}

		
		var requested_amount=$('#requested_amount').val();
		if (requested_amount =='') {

            event.preventDefault(); 
			$('#requested_amount_error').empty().append('<span style="color:red;">Please enter funding amount</span>');

        }else if(requested_amount.length <= 6 && requested_amount.replace(/\D/g, '') <= 5000){
            event.preventDefault(); 
			$('#requested_amount_error').empty().append('<span style="color:red;">Please enter  minimum amount 5001+ </span>');

			// alert(requested_amount.replace(/\D/g, ''));
		}
		// alert(requested_amount.replace(/\D/g, ''));
		// alert(requested_amount.length);
		var extra_phone=$('#extra_phone').val();
		if (extra_phone =='') {

		event.preventDefault(); 
		$('#extra_phone_error').empty().append('<span style="color:red;">Please enter phone number</span>');

		}
		

		


            // errorContainer.style.display = 'none'; 
			var terms=getterm();
			var phone=getPhone();
			if(ImgLength > 2 && signature !='' && phone ==true && terms ==true){
				// alert(phone);

					e.preventDefault();
		let form = $(this);
		uploadButton.click();
        // simulateButtonClick(uploadButton);

		btnback.attr('disabled',true);
		btnsubmit.attr('disabled',true);
		btnsubmit.text('Processing');


		$.ajax({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			method: 'POST',
			url: '{{ url('/step-second') }}',
			data: form.serialize(),
			success: function (response) {
				if (response && response.message=='image upload successfully') {	


			/* 		Swal.fire({
            title: 'Please wait...',
            html: '<img src="https://i.gifer.com/ZKZg.gif" style="width: 100px; height: 100px;">',
            allowOutsideClick: false,
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            // didOpen: () => {
            //     Swal.showLoading();
            // }
        }).then((result) => { */
			/* $.ajax({
			headers: { 'X-CSRF-TOKEN': '{{csrf_token()}}' },
			method: 'POST',
			url: '{{ url('/pdf-send') }}',
			data: {form_id:'{{ $data->uid}}'},
			success: function (response) {
				// window.location.href = "{{ URL::to('/form-submit') }}";
						}
			
		}); */
		/* setTimeout(function() {
            window.location.href = '{{ URL::to("/form-submit") }}';
        }, 15000); */ 
		//window.location.href = "{{ URL::to('/form-submit') }}";


      //  });

		
					// window.location.href = "{{ URL::to('/form-submit') }}";
        }else if(response && response.message=='update successfully'){
            var CHECKSTATE = document.getElementById('enable_statement');
        if (CHECKSTATE.checked) {
        } else {
          	 	 $.ajax({
			headers: { 'X-CSRF-TOKEN': '{{csrf_token()}}' },
			method: 'POST',
			url: '{{ url('/pdf-send') }}',
			data: {form_id:'{{ $data->uid}}'},
			success: function (response) {
				
				}
			});
		          	 window.location.href = "{{ URL::to('/form-submit') }}";
	
        }
            
            
        }			
			},
			error: function (data) {
			}
		});
	}else{

		if(ImageLength > 2){
			$('.dnd-file-upload-widget-size-error').empty();
			event.preventDefault();
		}else{

		$('.dnd-file-upload-widget-size-error').empty().append('Please upload minimum 3 Files.');
            event.preventDefault(); 
		}

	}
	// }
	

	});

	function insertform(){

		let form = $('#multistep-form');
					$.ajax({
						headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
						method: 'POST',
						url: '{{ url('/step-second') }}',
						data: form.serialize(),
						success: function (data) {


						},
						error: function (data) {
						}
					});

	}


	function validations() {
		let isValid = true;
		$('#multistep-form input[required]').each(function () {
			if ($(this).val() === '') {
				isValid = false;
				return false; 
			}
		});
		return isValid;
	}

		function firstform(){
			var company_name=$('#company_name').val();
					var dba=$('#dba').val();
					var fedral_taxid=$('#fedral_taxid').val();
					var purpose=$('#purpose').val();
					var industry_des=$('#industry_des').val();
					var bussiness_phone=$('#bussiness_phone').val();
					var fax=$('#fax').val();
					var bussines_startDate=$('#bussines_startDate').val();
					var Street=$('#Street').val();
					var city=$('#city').val();
					var state=$('#state').val();
					var postal=$('#postal').val();
					var year=$('#year').val();

					if (year === '') {
						$('#year_error').empty().append('Please enter year');
					} else if (year.length < 4) {
						$('#year_error').empty().append('Please enter valid year');
					} 

					if(company_name ==''){
						$('#company_name_error').empty().append('Please enter company name');
					}

					if(fedral_taxid ==''){
						$('#fedral_taxid_error').empty().append('Please enter fedral tax id');
					}

					if(purpose ==''){
						$('#purpose_error').empty().append('Please enter company type');
					}

					if(bussiness_phone ==''){
						$('#bussiness_phone_error').empty().append('Please enter bussiness phone');
					}else{

					if(bussiness_phone.length < 12){
						$('#bussiness_phone_error').empty().append('Your entry is too short.');
					}
				}
					
					if(bussiness_phone.length > 12){
						$('#bussiness_phone_error').empty().append('Please enter valid phone number');
					}

					// if(bussines_startDate ==''){
					// 	$('#bussines_startDate_error').empty().append('Please enter bussiness start date');
					// }

					if(Street ==''){
						$('#Street_error').empty().append('Please enter street');
					}

					if(city ==''){
						$('#city_error').empty().append('Please enter city');
					}
					if(state ==''){
						$('#state_error').empty().append('Please select state');
					}
					if(postal ==''){
						$('#postal_error').empty().append('Please enter postal');
					}

					// if(country ==''){
					// 	$('#country_error').empty().append('Please enter country');
					// }

					if( year !=='' && year.length == 4 && company_name !=='' && fedral_taxid !=='' && purpose!=='' && bussiness_phone !=='' && bussiness_phone.length == 12 &&  Street !=='' && city !=='' && postal !=='' && state !==''){
						gotoTop();
					return true;
					}

		return false;

		}
		function isValidEmail(email) {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }
		function secondform(){
			var title=$('#title').val();
					var firstname=$('#firstname').val();
					var lastname=$('#lastname').val();
					var phone=$('#phone').val();
					var email=$('#email').val();
					var ssn=$('#ssn').val();
					var dob=$('#dob').val();
					var ownership=$('#ownership').val();
					var Street2=$('#Street2').val();
					var city2=$('#city2').val();
					var state2=$('#state2').val();
					var postal2=$('#postal2').val();
					var location_ownership=$('#location_ownership').val();
					var owner_title=$('#owner_title').val();

					if(title ==''){
						$('#title_error').empty().append('Please select title');
					}

					if(firstname ==''){
						$('#firstname_error').empty().append('Please enter first name');
					}

					if(lastname ==''){
						$('#lastname_error').empty().append('Please enter last name');
					}

					if(phone ==''){
						$('#phone_error').empty().append('Please enter phone');
					}else{
					if(phone.length < 12){
						$('#phone_error').empty().append('Your entry is too short.');
					}
					if(phone.length > 12){
						$('#phone_error').empty().append('Please enter valid phone number');
					}
				}
					if(email ==''){
						$('#email_error').empty().append('Please enter email');
					}else if (!isValidEmail(email)) {
						// alert(isValidEmail(email));
            $('#email_error').text('Please enter a valid email');
        }

					if(Street2 ==''){
						$('#Street2_error').empty().append('Please enter street');
					}

					if(city2 ==''){
						$('#city2_error').empty().append('Please enter city');
					}
					if(state2 ==''){
						$('#state2_error').empty().append('Please select state');
					}

					// if(location_ownership ==''){
					// 	$('#location_ownership_error').empty().append('Please select');
					// }
					if(postal2 ==''){
						$('#postal2_error').empty().append('Please enter postal');
					}

				


					if(ssn ==''){
						$('#ssn_error').empty().append('Please enter social security number');
					}else if(ssn.length < 11){
						$('#ssn_error').empty().append('Your entry is too short.');


					}

					if (dob === '') {
					var day=$('.day').val();
					var month=$('.month').val();
					var year=$('.year').val();
					if(day ==''){
						$('#dob_error').empty().append('Please select date');
					}
					else if(month ==''){
						$('#dob_error').empty().append('Please select month');
					}
					else if(year ==''){
						$('#dob_error').empty().append('Please select year');
					}

                // $('#dob_error').empty().append('Please enter DOB');
            	} else {
                const age = calculateAge(dob);
                if (age < 18) {
                    $('#dob_error').empty().append('You must be at least 18 years old');
                	}
				}
					if(ownership ==''){
						$('#ownership_error').empty().append('Please enter ownership');
					}


					if(isValidEmail(email) == true && calculateAge(dob)>= 18 && ownership!=='' && dob !=='' && ssn !=='' && title !=='' && firstname !=='' && lastname!=='' && phone !=='' && phone.length == 12 && email !==''&& Street2 !=='' && city2 !=='' && postal2 !==''  && state2 !==''){
						gotoTop();
					return true;

					}



		return false;

		}


		function calculateAge(dob) {
            const birthDate = new Date(dob);
            const today = new Date();
            let age = today.getFullYear() - birthDate.getFullYear();
            const monthDifference = today.getMonth() - birthDate.getMonth();

            if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }

            return age;
        }
	


		$(document).ready(function () {
    $('input').keypress(function (event) {
            var inputId = $(this).attr('id');
			$('#'+inputId+'_error').empty();
    });
});

$(document).ready(function () {
	$('select').change(function () {
        var inputId = $(this).attr('id'); 
		// alert(inputId);
		$('#'+inputId+'_error').empty();
    });
});

$(document).ready(function () {
	$('input').change(function () {
        var inputId = $(this).attr('id'); 
		$('#'+inputId+'_error').empty();
    });
});
function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }

</script>
<script>
var DndFileUploadWidget = (function defineDndFileUploadWidget() {

/* public static fields */
DndFileUploadWidget.DEFAULT_MAX_ALLOWED_TOTAL_BYTES = 10 * 1024 * 1024;

function DndFileUploadWidget(widgetDom, uploadUrl, completeUrl, options) {
  this._widgetDom = widgetDom;
  this._uploadUrl = uploadUrl;
  this._completeUrl = completeUrl;
  this._csrfHeaderName = options && options.csrfHeaderName;
  this._csrfToken = options && options.csrfToken;
  this._maxAllowedTotalBytes = (options && options.maxAllowedTotalBytes) || DndFileUploadWidget.DEFAULT_MAX_ALLOWED_TOTAL_BYTES;

  var dropZone = this._dropZone = widgetDom.querySelector('.drop_zone');

  dropZone.addEventListener('drop', bind(this.drop_handler, this));
  dropZone.addEventListener('dragover', bind(this.dragover_handler, this));
  dropZone.addEventListener('dragleave', bind(this.dragleave_handler, this));
  dropZone.addEventListener('dragend', bind(this.dragend_handler, this));

  var labelInDropZone = dropZone.querySelector('label');
  labelInDropZone.addEventListener('drop', bind(this.drop_handler, this));
  labelInDropZone.addEventListener('dragover', bind(this.dragover_handler, this));
  labelInDropZone.addEventListener('dragleave', bind(this.dragleave_handler, this));
  labelInDropZone.addEventListener('dragend', bind(this.dragend_handler, this));

  var fileInputInDropZone = dropZone.querySelector('input[type="file"]');
  fileInputInDropZone.addEventListener('change', bind(this.fileSelected_handler, this));

  this.getUploadButton().addEventListener('click', bind(this.validateAndUpload, this));
}

/**
 * Public methods
 */
DndFileUploadWidget.prototype.drop_handler = function(ev) {
  console.log("drop");
  this._dropZone.classList.remove('dragover');
  ev.preventDefault();
  // If dropped items aren't files, reject them
  var dt = ev.dataTransfer;
  if (dt.items) {
	// Use DataTransferItemList interface to access the file(s)
	for (var i = 0; i < dt.items.length; i++) {
	  if (dt.items[i].kind === "file") {
		var f = dt.items[i].getAsFile();
		this.addFileUploadRow(f);
	  }
	}
  } else {
	// Use DataTransfer interface to access the file(s)
	for (var i = 0; i < dt.files.length; i++) {
	  var f = dt.files[i];
	  this.addFileUploadRow(f);
	}
  }
  this.validate();
};

// Turn off the browser's default drag and drop handler.
DndFileUploadWidget.prototype.dragover_handler = function(ev) {
  console.log("dragover");
  // Prevent default select and drag behavior
  ev.preventDefault();
  this._dropZone.classList.add('dragover');
};

DndFileUploadWidget.prototype.dragleave_handler = function(ev) {
  console.log("dragleave");
  this._dropZone.classList.remove('dragover');
};

DndFileUploadWidget.prototype.dragend_handler = function(ev) {
  console.log("draged");
  this._dropZone.classList.remove('dragover');
  // Remove all of the drag data
  var dt = ev.dataTransfer;
  if (dt.items) {
	for (var i = 0; i < dt.items.length; i++) {
	  dt.items.remove(i);
	}
  } else {
	ev.dataTransfer.clearData();
  }
};

DndFileUploadWidget.prototype.addFileUploadRow = function(file) {
    // Validate file type and size

	// alert(ImageLength);

	if (ImageLength > 2) {
        // alert('Only PDF files are allowed.');
		$('.dnd-file-upload-widget-size-error').empty().append('Please upload Maximum 3 Files.');
        return;
    }
    if (!file.name.toLowerCase().endsWith('.pdf')) {
        // alert('Only PDF files are allowed.');
		$('.dnd-file-upload-widget-size-error').empty().append('Files must be PDF.');
        return;
    }
    
    if (file.size > 2 * 1024 * 1024) { // 2 MB = 2 * 1024 * 1024 bytes
        // alert('File size must be less than 2 MB.');
		$('.dnd-file-upload-widget-size-error').empty().append('File size must be less than 2 MB.');

        return;
    }
	$('.dnd-file-upload-widget-size-error').empty();
    var filesContainer = this.getFilesContainer();
    var filename = file.name;
    var fileSize = file.size;
    var domString = `
        <div class="row form-group">
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <div class="text-left" style="line-height:32px">${filename}</div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <div style="line-height:32px">${humanReadableFileSize(fileSize)}</div>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-right">
                <button class="btn btn-danger dnd-file-upload-widget-remove-file-button">Remove</button>
            </div>
        </div>
    `;
    var parser = new DOMParser();
    var html = parser.parseFromString(domString, 'text/html');
    var fileUploadRow = html.body.firstChild;
    fileUploadRow.querySelector('button.dnd-file-upload-widget-remove-file-button')
        .addEventListener('click', bind(this.removeFileUploadRow, this));
    filesContainer.appendChild(fileUploadRow);
    fileUploadRow.file = file;
};


DndFileUploadWidget.prototype.removeFileUploadRow = function(ev) {
  var row = ev.target.parentNode.parentNode;
  row.parentNode.removeChild(row);
  this.validate();
};

DndFileUploadWidget.prototype.fileSelected_handler = function(event) {
  var fileList = event.target.files;
  for (var i = 0; i < fileList.length; i++) {
	var file = fileList[i];
	this.addFileUploadRow(file);
  }
  this.validate();
};

DndFileUploadWidget.prototype.validate = function() {
  var filesContainer = this.getFilesContainer();
  var totalSize = 0;
  var maxlength = 3;
  var fileUploadRows = filesContainer.children;
  if (fileUploadRows.length === 0) {
	this.getUploadButton().classList.add('hidden');
	this.getSizeErrorSpan().classList.add('hidden');
	return false;
  }

  for (var i = 0; i < fileUploadRows.length; i++) {
	ImageLength=fileUploadRows.length;
	var fileUploadRow = fileUploadRows[i];
	var file = fileUploadRow.file;
	totalSize += file.size;
  }

  if (totalSize <= this._maxAllowedTotalBytes) {
	this.getUploadButton().classList.remove('hidden');
	this.getSizeErrorSpan().classList.add('hidden');
	return true;
  } else {
	this.getUploadButton().classList.add('hidden');
	this.getSizeErrorSpan().classList.remove('hidden');
	this.getSizeErrorSpan().innerText = 'Total file size must not be greater than ' + humanReadableFileSize(this._maxAllowedTotalBytes) + '. Current: ' + humanReadableFileSize(totalSize);
	return false;
  }
};

DndFileUploadWidget.prototype.validateAndUpload = function() {
    if (!this.validate()) {
        return;
    }

    // Initialize SweetAlert2 popup for upload start
    Swal.fire({
        title: 'Uploading...',
        html: 'PDF FIles Uploading : <span id="progress-per">0%</span>',
        didOpen: () => {
            Swal.showLoading();
        }
    });

    // Prepare FormData
    var formData = new FormData();
    var userId = '{{ $data->uid }}';
    formData.append('u_id', userId);
    formData.append('_token', '{{ csrf_token() }}');

    // Append files to FormData
    var filesContainer = this.getFilesContainer();
    var fileUploadRows = filesContainer.children;
    for (var i = 0; i < fileUploadRows.length; i++) {
        var fileUploadRow = fileUploadRows[i];
        var file = fileUploadRow.file;
        formData.append('files[]', file, file.name);
    }

    // Perform AJAX upload
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        method: 'POST',
        url: '{{ url('/step-second') }}',
        data: formData,
        processData: false, // Important
        contentType: false, // Important
        xhr: function () {
            var xhr = new XMLHttpRequest();
            xhr.upload.addEventListener('progress', function (e) {
                if (e.lengthComputable) {
                    var percentComplete = Math.round((e.loaded / e.total) * 100);
					console.log(percentComplete);

                    $('#progress-per').html(percentComplete+'%');
                }
            }); 
            return xhr;
        },
        success: function (response) {
            if (response.message === 'image upload successfully') {
                // 			alert('data');

                Swal.fire({
                    icon: 'success',
                    title: 'Uploaded!',
                    text: 'Your files have been uploaded successfully.',
                    timer: 2000,
                    showConfirmButton: false
                }).then((result) => { 
			 $.ajax({
			headers: { 'X-CSRF-TOKEN': '{{csrf_token()}}' },
			method: 'POST',
			url: '{{ url('/pdf-send') }}',
			data: {form_id:'{{ $data->uid}}'},
			success: function (response) {
				
				}
			});
				// setTimeout(function() {
				window.location.href = '{{ URL::to("/form-submit") }}';
			// }, 1000); 
				});

            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'An error occurred while uploading your files.',
                });
            }
        },
        error: function () {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'An error occurred while uploading your files.',
            });
        }
    });
};

DndFileUploadWidget.prototype.enterLoadingState = function() {
  this.getUploadButton().classList.add('hidden');
  this.getUploadingButton().classList.remove('hidden');
  var removeButtons = this.getFilesContainer().querySelectorAll('button');
  for (var i = 0; i < removeButtons.length; i++) {
	removeButtons[i].disabled = true;
  }
};

DndFileUploadWidget.prototype.exitLoadingState = function() {
  this.getUploadButton().classList.remove('hidden');
  this.getUploadingButton().classList.add('hidden');
  var removeButtons = this.getFilesContainer().querySelectorAll('button');
  for (var i = 0; i < removeButtons.length; i++) {
	removeButtons[i].disabled = false;
  }
};

DndFileUploadWidget.prototype.queryWithinWidget = function(selectors) {
  return this._widgetDom.querySelector(selectors);
};

DndFileUploadWidget.prototype.getUploadButton = function() {
  return this.queryWithinWidget('.dnd-file-upload-widget-upload-button');
};

DndFileUploadWidget.prototype.getUploadingButton = function() {
  return this.queryWithinWidget('.dnd-file-upload-widget-uploading-button');
};

DndFileUploadWidget.prototype.getSizeErrorSpan = function() {
  return this.queryWithinWidget('.dnd-file-upload-widget-size-error');
};

DndFileUploadWidget.prototype.getFilesContainer = function() {
  return this.queryWithinWidget('.files-container');
};


/**
 * Private methods
 */
function humanReadableFileSize(b) {
  var u = 0, s = 1024;
  while (b >= s || -b >= s) {
	b /= s;
	u++;
  }
  return (u ? b.toFixed(1) + ' ' : b) + ' KMGTPEZY'[u] + 'iB';
}

function bind(func, scope) {
  return function () {
	func.apply(scope, arguments);
  }
}

return DndFileUploadWidget;
})();

(function useDndFileUploadWidget(){
var widgetDom = document.getElementById('theWidget');
var uploadUrl = '';
var completeUrl = '';
var options = {
  maxAllowedTotalBytes: 50 * 1024 * 1024, // 50MiB
  csrfHeaderName: '',
  csrfToken: ''
};

new DndFileUploadWidget(widgetDom, uploadUrl, completeUrl, options);
})();

function simulateButtonClick(button) {
        var event = new MouseEvent('click', {
            view: window,
            bubbles: true,
            cancelable: true
        });
        button.dispatchEvent(event);
    }
	



	// EIN field validation 
$('#fedral_taxid').on('input', function() { 
        var fedral_taxid = $(this).val().replace(/\D/g, ''); 
        if (fedral_taxid.length > 2) {
            fedral_taxid = fedral_taxid.replace(/(\d{2})(\d{1,7})/, '$1-$2'); 
        }
        $(this).val(fedral_taxid);
    });


var SelectState='<?php echo !empty($data->state) ? $data->state : $form['state']; ?>';
var SelectState2='<?php echo !empty($data->state2) ? $data->state2 : $form['state']; ?>';
var owner_title="<?php echo $data->owner_title; ?>";
businessType="<?php echo !empty($data->business_type) ? $data->business_type : $form['business_type']; ?>";
var titleValue='{{$data->title}}';
var currentMonth='{{date('m')}}';
var YearGet='{{ date('Y', strtotime($data->bussines_startDate)) }}';
var MonthsGet='{{ date('m', strtotime($data->bussines_startDate)) }}';
// alert(SelectState);


if(MonthsGet !==''){
	$('#month').val(MonthsGet);
}else{
	$('#month').val(currentMonth);

}

if(YearGet !==''){
	$('#year').val(YearGet);
}

if(titleValue !==''){
	$('#title').val(titleValue);
	// $('#state2').val(SelectState);
}
if(SelectState !==''){
	$('#state').val(SelectState);
	// $('#state2').val(SelectState);
}

if(SelectState2 !==''){
	// $('#state').val(SelectState);
	$('#state2').val(SelectState2);
}

if(businessType !==''){
	$('#purpose').val(businessType);
}

if(owner_title !==''){
	$('#owner_title').val(owner_title);
}

$('#bussiness_phone').on('input', function() {
        var phone = $(this).val().replace(/\D/g, '');
                if (phone.length > 3) {
                    phone = phone.replace(/(\d{3})(\d{1,3})(\d{1,4})/, '$1-$2-$3');
                } else if (phone.length > 6) {
                    phone = phone.replace(/(\d{3})(\d{3})(\d{1,4})/, '$1-$2-$3');
                }
                $(this).val(phone);
            });

			$('#ssn').on('input', function() {
				var ssn = $(this).val().replace(/\D/g, '');
    if (ssn.length > 3 && ssn.length <= 5) {
        ssn = ssn.replace(/(\d{3})(\d{1,2})/, '$1-$2');
    } else if (ssn.length > 5) {
        ssn = ssn.replace(/(\d{3})(\d{2})(\d{1,4})/, '$1-$2-$3');
    }
    $(this).val(ssn);
            });

			$('#phone').on('input', function() {
        var phone = $(this).val().replace(/\D/g, '');
                if (phone.length > 3) {
                    phone = phone.replace(/(\d{3})(\d{1,3})(\d{1,4})/, '$1-$2-$3');
                } else if (phone.length > 6) {
                    phone = phone.replace(/(\d{3})(\d{3})(\d{1,4})/, '$1-$2-$3');
                }
                $(this).val(phone);
            });

			function formatNumber(num) {
    // Convert the number to a string
    let str = num.toString();
    
    // Use a regular expression to insert commas every three digits
    // from the end of the string
    return str.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
}

			$('#requested_amount').on('input', function() {
            var amount = $(this).val().replace(/[^0-9.]/g, ''); 
            if (amount !== '') {
                amount = formatNumber(amount);
				$(this).val('$'+ amount);

            }
        });

		$('#gross_sales').on('input', function() {
            var amount = $(this).val().replace(/[^0-9.]/g, ''); 
            if (amount !== '') {
                amount = formatNumber(amount);
				$(this).val('$'+ amount);

            }
        });

		$('#avg_bank_balance').on('input', function() {
            var amount = $(this).val().replace(/[^0-9.]/g, ''); 
            if (amount !== '') {
                amount = formatNumber(amount);
				$(this).val('$'+ amount);

            }
        });

		$('#extra_phone').on('input', function() {
        var phone = $(this).val().replace(/\D/g, '');
                if (phone.length > 3) {
                    phone = phone.replace(/(\d{3})(\d{1,3})(\d{1,4})/, '$1-$2-$3');
                } else if (phone.length > 6) {
                    phone = phone.replace(/(\d{3})(\d{3})(\d{1,4})/, '$1-$2-$3');
                }
                $(this).val(phone);
            });

			document.addEventListener('DOMContentLoaded', () => {
    var inputs = document.querySelectorAll('.ownershipPer');

    inputs.forEach(input => {
        input.addEventListener('keydown', function(event) {
            var key = event.keyCode || event.charCode;
            
            // Check for Backspace or Delete key
            if (key === 8 || key === 46) {
                    var value = input.value;
                    
                    if (value.length > 1) {
                        value = value.slice(0, -1);
                    } 
                    
                    input.value = value;
                    
                    // alert(value);
               
            }
        });
    });
});




	$('#ownership').on('input', function() {
    var amount = $(this).val().replace(/[^a-zA-Z0-9\s]/g, ''); 
    if (amount === '') {
        $(this).val(''); // Clear the value if empty
    } else {
        var numericAmount = parseFloat(amount);
        if (numericAmount > 100) {
            numericAmount = 100; // Cap the value at 100%
        }
        $(this).val(numericAmount+'%'); // Add percentage sign
    }
	
});

</script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<script>
		var stage, s, r, g, c, canvas, isdown;
		function init() { 
		canvas = document.getElementById("canvas");
		stage = new Stage(canvas);
		
		isdown = false;
		
		g = new Graphics();
			g.setStrokeStyle(2).beginStroke("#000000");
		c = new Shape(g);
		
		c.alpha = 1;
		stage.addChild(c);
		
		s = new Shape();
		s.graphics.beginFill( "0000FF" );
		s.graphics.drawCircle( 0, 0, 1 );
			stage.addChild(s);
		
		stage.onMouseDown = function(mouseEvent) {
			isdown = true;
		}
			
		stage.onMouseUp = function(mouseEvent) {
			isdown = false;
		}
		
		Ticker.setFPS(60);
		Ticker.addListener(this);
		document.getElementById("save").onclick = Save;
		document.getElementById("clear").onclick = Clear;
		}

		window.tick = function() {
		s.x += (stage.mouseX - s.x) * .25;
		s.y += (stage.mouseY - s.y) * .25;
			
		if( isdown ) { 
			g.lineTo( s.x, s.y );  
		} else {
			g.moveTo( s.x, s.y );  
		}
		
		stage.update();
		}

		function Save(e) {
		scaleUp( canvas, 2 );
		}

		function scaleUp( c, scale ) {
		var newCanvas = $("<canvas>")
			.attr("width", c.width * scale)
			.attr("height", c.height * scale)[0];

		var ctx2 = newCanvas.getContext("2d");
		ctx2.imageSmoothingEnabled = false;
		ctx2.drawImage(c, 0, 0, newCanvas.width, newCanvas.height);
		
		var dataURL = newCanvas.toDataURL("image/png"); 
		var length = dataURL.length;

		// alert(length);
		if(length > 8000){

				$('#digital-sigunature').val(dataURL);
				$('.signature-msg').empty().append('<span style="color:green;">Sigunature Successfully Saved</span>');

		}else{
			$('.signature-msg').empty().append('<span style="color:red;">Invalid Sigunature </span>');

		}
		
		}

		function Clear(e) {
		g.clear();
		g.setStrokeStyle(2).beginStroke("#000000");
		$('#digital-sigunature').val('');
		$('.signature-msg').empty();

		}
		window.onload = init();

		

function gotoTop(){
		var btn123 = $('.next');
btn123.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});
}	
</script>

<script>

!function(a,b,c,d){"use strict";function e(b,c){return this.element=b,this.$element=a(b),this.config=a.extend({},g,c),this.internals={objectRefs:{}},this.init(),this}var f="dateDropdowns",g={defaultDate:null,defaultDateFormat:"yyyy-mm-dd",displayFormat:"dmy",submitFormat:"yyyy-mm-dd",minAge:0,maxAge:120,minYear:null,maxYear:null,submitFieldName:"date",wrapperClass:"date-dropdowns",dropdownClass:null,daySuffixes:!0,monthSuffixes:!0,monthFormat:"long",required:!1,dayLabel:"Day",monthLabel:"Month",yearLabel:"Year",monthLongValues:["January","February","March","April","May","June","July","August","September","October","November","December"],monthShortValues:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],initialDayMonthYearValues:["Day","Month","Year"],daySuffixValues:["st","nd","rd","th"]};a.extend(e.prototype,{init:function(){this.checkForDuplicateElement(),this.setInternalVariables(),this.setupMarkup(),this.buildDropdowns(),this.attachDropdowns(),this.bindChangeEvent(),this.config.defaultDate&&this.populateDefaultDate()},checkForDuplicateElement:function(){return!a('input[name="'+this.config.submitFieldName+'"]').length||(a.error("Duplicate element found"),!1)},setInternalVariables:function(){var a=new Date;this.internals.currentDay=a.getDate(),this.internals.currentMonth=a.getMonth()+1,this.internals.currentYear=a.getFullYear()},setupMarkup:function(){var b,c;if("input"===this.element.tagName.toLowerCase()){this.config.defaultDate||(this.config.defaultDate=this.element.value),c=this.$element.attr("type","hidden").wrap('<div class="'+this.config.wrapperClass+'"></div>');var d=this.config.submitFieldName!==g.submitFieldName,e=this.element.hasAttribute("name");e||d?d&&this.$element.attr("name",this.config.submitFieldName):this.$element.attr("name",g.submitFieldName),b=this.$element.parent()}else c=a("<input/>",{type:"hidden",name:this.config.submitFieldName}),this.$element.append(c).addClass(this.config.wrapperClass),b=this.$element;return this.internals.objectRefs.pluginWrapper=b,this.internals.objectRefs.hiddenField=c,!0},buildDropdowns:function(){var a,b,c;return e.message={day:this.config.initialDayMonthYearValues[0],month:this.config.initialDayMonthYearValues[1],year:this.config.initialDayMonthYearValues[2]},a=this.buildDayDropdown(),this.internals.objectRefs.dayDropdown=a,b=this.buildMonthDropdown(),this.internals.objectRefs.monthDropdown=b,c=this.buildYearDropdown(),this.internals.objectRefs.yearDropdown=c,!0},attachDropdowns:function(){var a=this.internals.objectRefs.pluginWrapper,b=this.internals.objectRefs.dayDropdown,c=this.internals.objectRefs.monthDropdown,d=this.internals.objectRefs.yearDropdown;switch(this.config.displayFormat){case"mdy":a.append(c,b,d);break;case"ymd":a.append(d,c,b);break;case"dmy":default:a.append(b,c,d)}return!0},bindChangeEvent:function(){var a=this.internals.objectRefs.dayDropdown,b=this.internals.objectRefs.monthDropdown,c=this.internals.objectRefs.yearDropdown,d=this,e=this.internals.objectRefs;e.pluginWrapper.on("change","select",function(){var f,g,h=a.val(),i=b.val(),j=c.val();return(f=d.checkDate(h,i,j))?(e.dayDropdown.addClass("invalid"),!1):("00"!==e.dayDropdown.val()&&e.dayDropdown.removeClass("invalid"),e.hiddenField.val(""),f||h*i*j===0||(g=d.formatSubmitDate(h,i,j),e.hiddenField.val(g)),void e.hiddenField.change())})},populateDefaultDate:function(){var a=this.config.defaultDate,b=[],c="",d="",e="";switch(this.config.defaultDateFormat){case"yyyy-mm-dd":default:b=a.split("-"),c=b[2],d=b[1],e=b[0];break;case"dd/mm/yyyy":b=a.split("/"),c=b[0],d=b[1],e=b[2];break;case"mm/dd/yyyy":b=a.split("/"),c=b[1],d=b[0],e=b[2];break;case"unix":b=new Date,b.setTime(1e3*a),c=b.getDate()+"",d=b.getMonth()+1+"",e=b.getFullYear(),c.length<2&&(c="0"+c),d.length<2&&(d="0"+d)}return this.internals.objectRefs.dayDropdown.val(c),this.internals.objectRefs.monthDropdown.val(d),this.internals.objectRefs.yearDropdown.val(e),this.internals.objectRefs.hiddenField.val(a),!0===this.checkDate(c,d,e)&&this.internals.objectRefs.dayDropdown.addClass("invalid"),!0},buildBaseDropdown:function(b){var c=b;return this.config.dropdownClass&&(c+=" "+this.config.dropdownClass),a("<select></select>",{class:c,name:this.config.submitFieldName+"_["+b+"]",required:this.config.required})},buildDayDropdown:function(){var a,b=this.buildBaseDropdown("day"),d=c.createElement("option");d.setAttribute("value",""),d.appendChild(c.createTextNode(this.config.dayLabel)),b.append(d);for(var e=1;e<10;e++)a=this.config.daySuffixes?e+this.getSuffix(e):"0"+e,d=c.createElement("option"),d.setAttribute("value","0"+e),d.appendChild(c.createTextNode(a)),b.append(d);for(var f=10;f<=31;f++)a=f,this.config.daySuffixes&&(a=f+this.getSuffix(f)),d=c.createElement("option"),d.setAttribute("value",f),d.appendChild(c.createTextNode(a)),b.append(d);return b},buildMonthDropdown:function(){var a=this.buildBaseDropdown("month"),b=c.createElement("option");b.setAttribute("value",""),b.appendChild(c.createTextNode(this.config.monthLabel)),a.append(b);for(var d=1;d<=12;d++){var e;switch(this.config.monthFormat){case"short":e=this.config.monthShortValues[d-1];break;case"long":e=this.config.monthLongValues[d-1];break;case"numeric":e=d,this.config.monthSuffixes&&(e+=this.getSuffix(d))}d<10&&(d="0"+d),b=c.createElement("option"),b.setAttribute("value",d),b.appendChild(c.createTextNode(e)),a.append(b)}return a},buildYearDropdown:function(){var a=this.config.minYear,b=this.config.maxYear,d=this.buildBaseDropdown("year"),e=c.createElement("option");e.setAttribute("value",""),e.appendChild(c.createTextNode(this.config.yearLabel)),d.append(e),a||(a=this.internals.currentYear-(this.config.maxAge+1)),b||(b=this.internals.currentYear-this.config.minAge);for(var f=b;f>=a;f--)e=c.createElement("option"),e.setAttribute("value",f),e.appendChild(c.createTextNode(f)),d.append(e);return d},getSuffix:function(a){var b="",c=this.config.daySuffixValues[0],d=this.config.daySuffixValues[1],e=this.config.daySuffixValues[2],f=this.config.daySuffixValues[3];switch(a%10){case 1:b=a%100===11?f:c;break;case 2:b=a%100===12?f:d;break;case 3:b=a%100===13?f:e;break;default:b="th"}return b},checkDate:function(a,b,c){var d;if("00"!==b){var e=new Date(c,b,0).getDate(),f=parseInt(a,10);d=this.updateDayOptions(e,f),d&&this.internals.objectRefs.hiddenField.val("")}return d},updateDayOptions:function(a,b){var d=parseInt(this.internals.objectRefs.dayDropdown.children(":last").val(),10),e="",f="",g=!1;if(d>a){for(;d>a;)this.internals.objectRefs.dayDropdown.children(":last").remove(),d--;b>a&&(g=!0)}else if(d<a)for(;d<a;){e=++d,f=e,this.config.daySuffixes&&(f+=this.getSuffix(d));var h=c.createElement("option");h.setAttribute("value",e),h.appendChild(c.createTextNode(f)),this.internals.objectRefs.dayDropdown.append(h)}return g},formatSubmitDate:function(a,b,c){var d,e;switch(this.config.submitFormat){case"unix":e=new Date,e.setDate(a),e.setMonth(b-1),e.setYear(c),d=Math.round(e.getTime()/1e3);break;default:d=this.config.submitFormat.replace("dd",a).replace("mm",b).replace("yyyy",c)}return d},destroy:function(){var a=this.config.wrapperClass;if(this.$element.hasClass(a))this.$element.empty();else{var b=this.$element.parent(),c=b.find("select");this.$element.unwrap(),c.remove()}}}),a.fn[f]=function(b){return this.each(function(){if("string"==typeof b){var c=Array.prototype.slice.call(arguments,1),d=a.data(this,"plugin_"+f);if("undefined"==typeof d)return a.error("Please initialize the plugin before calling this method."),!1;d[b].apply(d,c)}else a.data(this,"plugin_"+f)||a.data(this,"plugin_"+f,new e(this,b))}),this}}(jQuery,window,document);

/*inicializar*/
$(document).ready(function() {
 
  $("#dob").dateDropdowns({
    submitFieldName: 'dob',
    minAge: 18
  });


            
});

$(function() {
  $('.day, .month, .year').addClass('form-select');
  $('.day, .month, .year').css({
    width: '30%',
    float: 'left'
  });
});

// formStep(1);
	function formStep(step){

		if(step ==1){
			$('.form-heading-second').css('display','none');
			$('.form-heading-first').css('display','block');

		}else{
			$('.form-heading-second').css('display','block');
			$('.form-heading-first').css('display','none');

		}

	}

	

$(document).ready(function() {
	formStep(1);
    function parseRange(rangeStr) {
        var rangeParts = rangeStr.split('-');
        var min = parseFloat(rangeParts[0].replace(/[^0-9.]/g, ''));
        var max = rangeParts[1] ? parseFloat(rangeParts[1].replace(/[^0-9.]/g, '')) : Infinity;
        return { min: min, max: max };
    }

    function selectClosestOption(value) {
        var numericValue = parseFloat(value.replace(/[^0-9.]/g, ''));
        var closestOption = null;
        var closestRangeDiff = Infinity;

        $('#requested_amount1 option').each(function() {
            var optionText = $(this).text();
            var range = parseRange(optionText);
            if (numericValue >= range.min && numericValue <= range.max) {
                $(this).prop('selected', true);
                closestOption = $(this);
                return false; 
            }
        });
        return closestOption;
    }
	var requestAmt='{{$form['amt']}}';
	requested_amount='{{$data->requested_amount}}';
	if(requested_amount !=''){
		$('#requested_amount').val(requested_amount);
	}else{
		$('#requested_amount').val(requestAmt);

		// selectClosestOption(requestAmt);
	}
    // selectClosestOption(valueToMatch);

	// alert(requested_amount);
});



<!--id="bank_statement" enable_statement-->

function get_statement() {
        var enabletermsCheckbox = document.getElementById('enable_statement');
        if (enabletermsCheckbox.checked) {
           <!--alert('checked');-->
           $('#bank_statement').removeAttr('hidden');
        } else {
           $('#bank_statement').attr('hidden',true);
        }
 
}



</script>


	@include('layout.footer')

	