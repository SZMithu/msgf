@include('layout.master')
@include('layout.header')


<!--begin::Card-->

<div class="outer">

<div class="container">
	<div class="row">
        <div class="card1 card-flush w-lg-850px py-5">
    	   
<div class="text-center mb-11">
            <!--begin::Title-->
            <h1 class="text-gray-900 fw-bolder mb-3 heading">
                {!!$form->form_1!!}
                <!-- PREQUALIFICATION FORM -->
            </h1>
            <!--end::Title-->

            <!--begin::Subtitle-->
            <div class="text-gray-500 fw-semibold fs-6">
                Funding Expert
            </div>
            <!--end::Subtitle--->
        </div>
		 <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
        </div>
</div>

<div class="card card-flush w-lg-850px py-5">
    <!--begin::Card body-->
    <div class="card-body">
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
			margin-top: 6%;
			margin-bottom: 6%;
		}
		button.btn.btn-danger.dnd-file-upload-widget-remove-file-button {
    margin-top: 4px;
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
		
        <!--end::Page bg image-->

        
<style>
.form-item{
  position: relative;
  margin-bottom: 15px
}
.form-item input{
  display: block;
  width: 400px;
  height: 40px;
  background: transparent;
  border: solid 1px #ccc;
  transition: all .3s ease;
  padding: 0 15px
}
.form-item input:focus{
  border-color: blue
}
.form-item label{
  position: absolute;
  cursor: text;
  z-index: 2;
  top: 13px;
  left: 10px;
  font-size: 12px;
  font-weight: bold;
  background: #fff;
  padding: 0 10px;
  color: #999;
  transition: all .3s ease
}
.form-item input:focus + label,
.form-item input:valid + label{
  font-size: 11px;
  top: -5px
}
.form-item input:focus + label{
  color: blue
}


.form-control,.form-select {
    padding: 1rem 1rem;
    font-size: 1.4rem;
}
.formFieldRequired{
	display: none;
}

pre.brush\:html {
    /* display: table; */
    /* margin: auto; */
    overflow: hidden;
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
button.action.btn {
    margin-top: 22px;
    margin-right: 20px;
}
.progress {
    margin-bottom: 25px;
}
 label {
    font-size: 2rem !important;
    padding-top: 15px;
} 
@media (min-width: 992px) {
    .w-lg-500px {
        width: 600px !important;
    }
}

label.error {
    font-weight: normal;
    color: red;
    font-size: 15px !important;
    margin-top: -10px;
    margin-left: 10px;

}
span.error {
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
.card.card-flush.w-lg-850px.py-5 {
    display: block;
    margin: auto;
}



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
label.sublabel{
	    font-size: 14px !important;
    float: left;
    width: 100%;

}
.sublabel label.error {
    float: left;
    width: 100%;
}


#rangeBox{ /* carry complete  range box*/
    width:100%;
    height:100px;
    
    }
    #sliderBox{
    position:relative;
    top:0%;
    width:100%;  /*2x width*/
	text-align: center;
    }
    #slider {
    width: 100%;
	max-width: 500px;
	margin: auto;
}
   
    #inputRange{
    position:relative;
    font-size: large;
	max-width: 500px;
  margin: auto;
    }
    #inputRange::after{
    content:"";
    clear:both;
    display:block
    }
    #inputRange #min{
     width:40%;
    float:left;
     }   


     .price-range {
    display: flex;
    justify-content: space-between;
}

.radioAmount {
    font-size: l;
    font-size: xxx-large;
    color: #8180E3 !important;
	text-align: center;
	    font-weight: bold;
}


/* #sliderBox .error {
    display: none !important;
} */

#sliderBox label.error {
    display: none !important;
}

.slider-range {
            accent-color: #8180E3 !important;
        }

@media screen and (max-width:767px){
#slider {
  -webkit-appearance: none;
  height: 10px;
  background: #d3d3d3;
  outline: none;
  opacity: 0.7;
  -webkit-transition: .2s;
  transition: opacity .2s;
  border: 1px solid #333;
    border-radius: 10px;
}

#slider:hover {
  opacity: 1;
}

#slider::-webkit-slider-thumb {
  -webkit-appearance: none;
  appearance: none;
  width: 25px;
  height: 25px;
  background: #333;
  cursor: pointer;
  border-radius: 25px;
  border: 3px solid #fff;
  box-shadow: 0 0 20px #ccc;
}

#slider::-moz-range-thumb {
  width: 25px;
  height: 25px;
  background: #333;
  cursor: pointer;
  border-radius: 25px;
  border: 3px solid #fff;
  box-shadow: 0 0 20px #ccc;
}
   
    .slider-range{
    position:relative;
	max-width: 500px;
  margin: auto;
    }
    .slider-range::after{
    content:"";
    clear:both;
    display:block
    }
    .slider-range #min{
     width:40%;
    float:left;
     }   


    .price-range {
    display: flex;
    justify-content: space-between;
	margin-top: 20px;
	}
}
</style>


<style>
  .option-container {
    display: flex;
    gap: 10px;
  }

  .option {
    display: flex;
    align-items: center;
  }

  input[type="radio"] {
    display: none; /* Hide the actual radio buttons */
  }

  label .box-small {
    cursor: pointer;
    padding: 5px 10px;
    border: 2px solid #000;
    border-radius: 5px;
  }

  input[type="radio"]:checked + label .box-small {
    background-color: #f0f0f0; /* Example of highlighting the selected option */
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
</style>
	

     <form class="form w-100" id="multistep-form" action="{{ route('form') }}" method="post">
        @csrf
        <!--begin::Heading-->
        
        <!--begin::Heading-->

        
        <!--end::Login options-->

      

       
        <!--div class="fv-row mb-8">
           
            <input type="text" placeholder="Name" name="name" autocomplete="off" class="form-control bg-transparent"/>
           
        </div>

       
        <div class="fv-row mb-8">
         
            <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent"/>
        
        </div>

       
        <div class="fv-row mb-10">
            <div class="form-check form-check-custom form-check-solid form-check-inline">
                <input class="form-check-input" type="checkbox" name="toc" value="1"/>

                <label class="form-check-label fw-semibold text-gray-700 fs-6">
                    I Agree &

                    <a href="#" class="ms-1 link-primary">Terms and conditions</a>.
                </label>
            </div>
        </div>
        
        <div class="d-grid mb-10">
            <button type="submit" id="kt_sign_up_submit" class="btn btn-primary">
             Next
            </button>
        </div-->


    
	<div class="container">
	<div class="row">
        <div class="col-md-12 ">
    	    <!--div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
            </div-->
            <div class="ant-space" style="display: flex;text-align-last: end;gap: 8px;"><div class="ant-space-item" style=""><img src="https://app.msfg.finance/storage/secure-icon.svg" alt="Padlock"></div><div class="ant-space-item" onclick="loader()">Secure</div></div>

            <div class="step well">
			<!--div class="form-item">
    <input type="text" id="username" autocomplete="off" required value="test">
    <label for="username">Username</label>
  </div-->
			
                                       
                                        <div class="col-md-12">
                                            <label for="slider" class="form-label" style="width: 100%; text-align: center;">How much money do you need?</label>
                                            <!-- <select class="form-select" id="amt" name="amt" required>
                                                <option value="$10,000 - $29,999">$10,000 - $29,999</option>
                                                <option value="$30,000 - $49,999">$30,000 - $49,999</option>
                                                <option value="$50,000 - $74,999">$50,000 - $74,999</option>
                                                <option value="$75,000 - $99,999">$75,000 - $99,999</option>
                                                <option value="$100,000 - $249,999">$100,000 - $249,999</option>
                                                <option value="$250,000 - $499,999">$250,000 - $499,999</option>
                                                <option value="$500,000 - $1,000,000">$500,000 - $1,000,000</option>
                                                <option value="More than $1,000,000">More than $1,000,000</option>
                                            </select> -->
                                            
                                            <div id="rangeBox">    
                                            <div id="sliderBox">
                                                <div class="radioAmount">$0</div>

                                                <input type="range" id="slider" name="slider" class="slider-range" step="20000" min="10000" max="500000" value="10000">
                                                <input type="text" id="amt" name="amt" value="10000" hidden>
                                            </div>
                                            <div id="inputRange">
                                                <!-- <input type="number" step="5" min="0" max="50" placeholder="Min" id="min"  class="form-control"> -->
                                                 <div class="price-range">
                                                <div>$10,000</div>
                                                <div>$500,000+</div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                            
                                        </div>
			</div>
			
            <div class="step well">
			<div class="col-md-12">
                     <label for="purpose">Whats the money for?</label>
                     <select class="form-select" id="purpose" name="purpose" required>
                     <option value="" selected>Please Select</option>
                     <option value="Working Capital">Working Capital</option>
                     <option value="Debt Consolidation">Debt Consolidation</option>
                         <option value="Purchase Equipment">Purchase Equipment</option>
                         <option value="Purchase Inventory">Purchase Inventory</option>
                         <option value="Business Acquisition">Business Acquisition</option>
                      <option value="Build Business Credit">Build Business Credit</option>
                         <option value="Other">Other</option>
                     </select>
                     <span class="error" id="purpose_error"></span>

                 </div>
			</div>

 <!--“Good Lead filter” credit score from 600 to 550+-->
            <div class="step well">
			 <div class="col-md-12">
                                            <label for="average">What is your FICO credit Score?</label>
                                            <select class="form-select" id="credit_score" name="credit_score" required>
                                            <option selected value="">Please Select</option>
                                            <option value="800+ (Outstanding)">800+ (Outstanding)</option>
                                            <option value="720-799 (Excellence)">720-799 (Excellence)</option>
                                                <option value="680-719 (Great)">680-719 (Great)</option>
                                                <option value="650-679 (Good)">650-679 (Good)</option>
                                                <option value="600-649 (Ok)">600-649 (Ok)</option>
                                                <option value="510-550 (Not Good)">510-550 (Not Good)</option>
												<option value="Below 510 (Bad)">Below 510 (Bad)</option>
                                                <option value="Limited Credit History">Limited Credit History</option>
                                            </select>


                                    <!-- <div class="option-container">
                                        <div class="option">
                                        <input type="radio" id="option1" name="budget" value="Less than $5,000">
                                        <label for="option1" class="box-small">Less than $5,000</label>
                                        </div>
                                        <div class="option">
                                        <input type="radio" id="option2" name="budget" value="$5,000 - $9,999">
                                        <label for="option2" class="box-small">$5,000 - $9,999</label>
                                        </div>
                                        <div class="option">
                                        <input type="radio" id="option3" name="budget" value="$10,000 - $19,999">
                                        <label for="option3" class="box-small">$10,000 - $19,999</label>
                                        </div>
                                        <div class="option">
                                        <input type="radio" id="option4" name="budget" value="$20,000 - $29,999">
                                        <label for="option4" class="box-small">$20,000 - $29,999</label>
                                        </div>
                                    </div> -->

                                            <span class="error" id="credit_score_error"></span>

                                        </div>
			</div>
			<!--What is your average monthly revenue over the last 3 months?-->
            <div class="step well">
			 <div class="col-md-12">
                                            <label for="average">What is your average monthly revenue (Calculated from the Last 3 Months)</label>
                                            <select class="form-select" id="average" name="average" required>
                                            <option value="" selected>Please Select</option>
                                                <option value="Less than $5,000">Less than $5,000 / Month</option>
                                                <option value="$5,000 - $9,999">$5,000 - $9,999 / Month</option>
                                                <option value="$10,000 - $19,999">$10,000 - $19,999 / Month</option>
                                                <option value="$20,000 - $29,999">$20,000 - $29,999 / Month</option>
                                                <option value="$30,000 - $39,999">$30,000 - $39,999 / Month</option>
                                                <option value="$40,000 - $49,999">$40,000 - $49,999 / Month</option>
                                                <option value="$50,000 - $74,999">$50,000 - $74,999 / Month</option>
                                                <option value="$75,000 - $99,999">$75,000 - $99,999 / Month</option>
                                                <option value="$100,000 - $249,999">$100,000 - $249,999 / Month</option>
                                                <option value="$250,000 - $500,000">$250,000 - $500,000 / Month</option>
                                                <option value="More than $500,000">More than $500,000 / Month</option>
                                            </select>
                                            <span class="error" id="average_error"></span>

                                        </div>
			</div>
			
            <div class="step well">
			<div class="col-md-12">
                                            <label for="time">How much time are you in business?</label>
                                            <select class="form-select" id="time" name="time" required>
                                            <option value="">Please Select</option>
                                            <option value="5 Year or More">5 Year or More</option>
											<option value="4 Year or More">3 Year or More</option>
											<option value="1 Year or More">1 Year or More</option>
                                            <option value="More than 6 Months">More than 6 Months</option>
											<option value="New Business">New Business</option>
                                            </select>
                                            <span class="error" id="time_error"></span>

                                        </div>
			</div>
			
            <!-- <div class="step well">
			
				   <div class="col-md-12">
                                            <label for="b_name" class="form-label">Business Name</label>
                                            <input class="form-control bg-transparent" type="text" name="b_name" id="b_name" placeholder="Enter Business Name*">
											<span class="error" id="b_name_error"></span>
                                        </div>
			
			</div> 
            <div class="step well">
			
				  <div class="col-md-12">
                                           <label for="b_name" class="form-label">Provide your EIN, <i> if known</i> </label>
                                            <input class="form-control bg-transparent" type="text" name="ein" id="ein" placeholder="XX-XXXXXXX"  maxlength="10">
                                        </div>
			
			</div>-->
            <div class="step well">
			
				   <div class="col-md-12">
                                            <label for="business_type" class="form-label">Entity Type</label>
                                            <select class="form-select" id="business_type" name="business_type" required="" required>
                                                <option value="" selected="selected">Select Entity Type</option>
                                            <option value="LLC">LLC</option><option value="Sole Proprietorship">Sole Proprietorship</option><option value="Partnership">Partnership</option><option value="Corporation">Corporation</option><option value="S Corporation">S Corporation</option></select>
											<span class="error" id="business_type_error"></span>

                                        </div>
			
			</div>
            <div class="step well">
			
				   <div class="col-md-12">
    <label for="state" class="form-label">State</label>
    <select class="form-select" id="state" name="state" required="">
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
    <span class="error" id="state_error"></span>

    </div>
			
			</div>
            <div class="step well">
			
				   <div class="col-md-12">
                         <label for="business-industry" class="form-label">Line of Business</label>
									<select class="form-select" id="business-industry" name="business_industry" required="">
									   <option value="" selected="selected">Select Industry</option>
									   <option value="Accounting">Accounting</option>
									   <option value="Airlines/Aviation">Airlines/Aviation</option>
									   <option value="Alternative Dispute Resolution">Alternative Dispute Resolution</option>
									   <option value="Alternative Medicine">Alternative Medicine</option>
									   <option value="Animation">Animation</option>
									   <option value="Apparel &amp; Fashion">Apparel &amp; Fashion</option>
									   <option value="Architecture &amp; Planning">Architecture &amp; Planning</option>
									   <option value="Arts &amp; Crafts">Arts &amp; Crafts</option>
									   <option value="Automotive">Automotive</option>
									   <option value="Aviation &amp; Aerospace">Aviation &amp; Aerospace</option>
									   <option value="Banking">Banking</option>
									   <option value="Biotechnology">Biotechnology</option>
									   <option value="Broadcast Media">Broadcast Media</option>
									   <option value="Building Materials">Building Materials</option>
									   <option value="Business Supplies &amp; Equipment">Business Supplies &amp; Equipment</option>
									   <option value="Capital Markets">Capital Markets</option>
									   <option value="Chemicals">Chemicals</option>
									   <option value="Civic &amp; Social Organization">Civic &amp; Social Organization</option>
									   <option value="Civil Engineering">Civil Engineering</option>
									   <option value="Commercial Real Estate">Commercial Real Estate</option>
									   <option value="Computer &amp; Network Security">Computer &amp; Network Security</option>
									   <option value="Computer Games">Computer Games</option>
									   <option value="Computer Hardware">Computer Hardware</option>
									   <option value="Computer Networking">Computer Networking</option>
									   <option value="Computer Software">Computer Software</option>
									   <option value="Construction">Construction</option>
									   <option value="Consumer Electronics">Consumer Electronics</option>
									   <option value="Consumer Goods">Consumer Goods</option>
									   <option value="Consumer Services">Consumer Services</option>
									   <option value="Cosmetics">Cosmetics</option>
									   <option value="Dairy">Dairy</option>
									   <option value="Defense &amp; Space">Defense &amp; Space</option>
									   <option value="Design">Design</option>
									   <option value="Education Management">Education Management</option>
									   <option value="E-learning">E-learning</option>
									   <option value="Electrical &amp; Electronic Manufacturing">Electrical &amp; Electronic Manufacturing</option>
									   <option value="Entertainment">Entertainment</option>
									   <option value="Environmental Services">Environmental Services</option>
									   <option value="Events Services">Events Services</option>
									   <option value="Executive Office">Executive Office</option>
									   <option value="Facilities Services">Facilities Services</option>
									   <option value="Farming">Farming</option>
									   <option value="Financial Services">Financial Services</option>
									   <option value="Fine Art">Fine Art</option>
									   <option value="Fishery">Fishery</option>
									   <option value="Food &amp; Beverages">Food &amp; Beverages</option>
									   <option value="Food Production">Food Production</option>
									   <option value="Fundraising">Fundraising</option>
									   <option value="Furniture">Furniture</option>
									   <option value="Gambling &amp; Casinos">Gambling &amp; Casinos</option>
									   <option value="Glass, Ceramics &amp; Concrete">Glass, Ceramics &amp; Concrete</option>
									   <option value="Government Administration">Government Administration</option>
									   <option value="Government Relations">Government Relations</option>
									   <option value="Graphic Design">Graphic Design</option>
									   <option value="Health, Wellness &amp; Fitness">Health, Wellness &amp; Fitness</option>
									   <option value="Higher Education">Higher Education</option>
									   <option value="Hospital &amp; Health Care">Hospital &amp; Health Care</option>
									   <option value="Hospitality">Hospitality</option>
									   <option value="Human Resources">Human Resources</option>
									   <option value="Import &amp; Export">Import &amp; Export</option>
									   <option value="Individual &amp; Family Services">Individual &amp; Family Services</option>
									   <option value="Industrial Automation">Industrial Automation</option>
									   <option value="Information Services">Information Services</option>
									   <option value="Information Technology &amp; Services">Information Technology &amp; Services</option>
									   <option value="Insurance">Insurance</option>
									   <option value="International Affairs">International Affairs</option>
									   <option value="International Trade &amp; Development">International Trade &amp; Development</option>
									   <option value="Internet">Internet</option>
									   <option value="Investment Banking/Venture">Investment Banking/Venture</option>
									   <option value="Investment Management">Investment Management</option>
									   <option value="Judiciary">Judiciary</option>
									   <option value="Law Enforcement">Law Enforcement</option>
									   <option value="Law Practice">Law Practice</option>
									   <option value="Legal Services">Legal Services</option>
									   <option value="Legislative Office">Legislative Office</option>
									   <option value="Leisure &amp; Travel">Leisure &amp; Travel</option>
									   <option value="Libraries">Libraries</option>
									   <option value="Logistics &amp; Supply Chain">Logistics &amp; Supply Chain</option>
									   <option value="Luxury Goods &amp; Jewelry">Luxury Goods &amp; Jewelry</option>
									   <option value="Machinery">Machinery</option>
									   <option value="Management Consulting">Management Consulting</option>
									   <option value="Maritime">Maritime</option>
									   <option value="Marketing &amp; Advertising">Marketing &amp; Advertising</option>
									   <option value="Market Research">Market Research</option>
									   <option value="Mechanical or Industrial Engineering">Mechanical or Industrial Engineering</option>
									   <option value="Media Production">Media Production</option>
									   <option value="Medical Device">Medical Device</option>
									   <option value="Medical Practice">Medical Practice</option>
									   <option value="Mental Health Care">Mental Health Care</option>
									   <option value="Military">Military</option>
									   <option value="Mining &amp; Metals">Mining &amp; Metals</option>
									   <option value="Motion Pictures &amp; Film">Motion Pictures &amp; Film</option>
									   <option value="Museums &amp; Institutions">Museums &amp; Institutions</option>
									   <option value="Music">Music</option>
									   <option value="Nanotechnology">Nanotechnology</option>
									   <option value="Newspapers">Newspapers</option>
									   <option value="Nonprofit Organization Management">Nonprofit Organization Management</option>
									   <option value="Oil &amp; Energy">Oil &amp; Energy</option>
									   <option value="Online Publishing">Online Publishing</option>
									   <option value="Outsourcing/Offshoring">Outsourcing/Offshoring</option>
									   <option value="Package/Freight Delivery">Package/Freight Delivery</option>
									   <option value="Packaging &amp; Containers">Packaging &amp; Containers</option>
									   <option value="Paper &amp; Forest Products">Paper &amp; Forest Products</option>
									   <option value="Performing Arts">Performing Arts</option>
									   <option value="Pharmaceuticals">Pharmaceuticals</option>
									   <option value="Philanthropy">Philanthropy</option>
									   <option value="Photography">Photography</option>
									   <option value="Plastics">Plastics</option>
									   <option value="Political Organization">Political Organization</option>
									   <option value="Primary/Secondary">Primary/Secondary</option>
									   <option value="Printing">Printing</option>
									   <option value="Professional Training">Professional Training</option>
									   <option value="Program Development">Program Development</option>
									   <option value="Public Policy">Public Policy</option>
									   <option value="Public Relations">Public Relations</option>
									   <option value="Public Safety">Public Safety</option>
									   <option value="Publishing">Publishing</option>
									   <option value="Railroad Manufacture">Railroad Manufacture</option>
									   <option value="Ranching">Ranching</option>
									   <option value="Real Estate">Real Estate</option>
									   <option value="Recreational Facilities &amp; Services">Recreational Facilities &amp; Services</option>
									   <option value="Religious Institutions">Religious Institutions</option>
									   <option value="Renewables &amp; Environment">Renewables &amp; Environment</option>
									   <option value="Research">Research</option>
									   <option value="Restaurants">Restaurants</option>
									   <option value="Retail">Retail</option>
									   <option value="Security &amp; Investigations">Security &amp; Investigations</option>
									   <option value="Semiconductors">Semiconductors</option>
									   <option value="Shipbuilding">Shipbuilding</option>
									   <option value="Sporting Goods">Sporting Goods</option>
									   <option value="Sports">Sports</option>
									   <option value="Staffing &amp; Recruiting">Staffing &amp; Recruiting</option>
									   <option value="Supermarkets">Supermarkets</option>
									   <option value="Telecommunications">Telecommunications</option>
									   <option value="Textiles">Textiles</option>
									   <option value="Think Tanks">Think Tanks</option>
									   <option value="Tobacco">Tobacco</option>
									   <option value="Translation &amp; Localization">Translation &amp; Localization</option>
									   <option value="Transportation/Trucking/Railroad">Transportation/Trucking/Railroad</option>
									   <option value="Utilities">Utilities</option>
									   <option value="Venture Capital">Venture Capital</option>
									   <option value="Veterinary">Veterinary</option>
									   <option value="Warehousing">Warehousing</option>
									   <option value="Wholesale">Wholesale</option>
									   <option value="Wine &amp; Spirits">Wine &amp; Spirits</option>
									   <option value="Wireless">Wireless</option>
									   <option value="Writing &amp; Editing">Writing &amp; Editing</option>
									</select>
									<span class="error" id="business_industry_error"></span>

                                        </div>
			
			</div>
			
           
                                      <div class="step well"> 

                                      <?php
                                      
                                      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                      $charactersLength = strlen($characters);
                                      $randomString = '';
                                      $length=20;
                                      for ($i = 0; $i < $length; $i++) {
                                          $randomString .= $characters[rand(0, $charactersLength - 1)];
                                      }
                                  
                                    //   echo $randomString;
                                      
                                      ?>
                                            <input class="form-control bg-transparent" type="text" name="token" id="token" value="{{ $randomString}}" hidden>
			
									<div class="col-md-12">
                                            <!--label for="f_name" class="form-label">First Name</label--><br>
                                            <input class="form-control bg-transparent" type="text" name="f_name" id="f_name" placeholder="First Name*" required>
                                        </div> 
                                        <div class="col-md-12">
                                            <!--label for="l_name" class="form-label">Last Name</label--><br>
                                            <input class="form-control bg-transparent" type="text" name="l_name" id="l_name" placeholder="Last Name*" required>
                                        </div>

                                        <div class="col-md-12">
                                            <!--label for="l_name" class="form-label">Last Name</label--><br>
                                            <input class="form-control bg-transparent" type="text" name="b_name" id="b_name" placeholder="Business Name*" required>
                                        </div>
                                        <div class="col-md-12">
                                            <!--label for="email" class="form-label">Email</label--><br>
                                            <input class="form-control bg-transparent" type="email" name="email" id="email" placeholder="Email*" required>
                                        </div>

                                            <input class="formFieldRequired" type="text" name="PhoneNumber" id="PhoneNumber" placeholder="PhoneNumber*" required maxlength="12" minlength="12" pattern="[0-9]*" inputmode="numeric">
									
										
                                        <div class="col-md-12">
                                            <!--label for="phone" class="form-label">Phone</label--><br>
                                            <input class="form-control bg-transparent" type="text" name="phone" id="phone" placeholder="Phone*" required maxlength="12" minlength="12" pattern="[0-9]*" inputmode="numeric">
                                        </div>
  
										
						@if($form->phone_terms ==1)
						<div class="row">
							<div class="col-md-12">
								<label class="sublabel">
									<input type="checkbox" name="term_check" id="term_check"> 
									
									&nbsp; By selecting is box and pressing the "Submit" button, you agree to receive phone calls end emails from Main Street Finance Group LLC. or parties representing Main Street Finance Group LLC and agree to our <a  class="openModalBtnTerm">Terms of Service</a> and <a class="openModalBtn">Privacy Policy</a>.
								</label>
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
</div>
</form>
    </div>
    <!--end::Card body-->
</div>
</div>
<!-- <div style="height:60px;"></div> -->
<!--end::Card-->
 <script src="https://app.msfg.finance/assets/plugins/global/plugins.bundle.js"></script>
    <script src="https://app.msfg.finance/assets/js/scripts.bundle.js"></script>
    <script src="https://app.msfg.finance/assets/js/widgets.bundle.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.createjs.com/easeljs-0.4.2.min.js"></script>

<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.0/jquery.validate.min.js"></script>
<script>
$(document).ready(function(){
  var current = 1;
	
	widget      = $(".step");
	btnnext     = $(".next");
	btnback     = $(".back"); 
	btnsubmit   = $(".submit");

	// Init buttons and UI
	widget.not(':eq(0)').hide();
	hideButtons(current);
	setProgress(current);

	// Next button click action
	btnnext.click(function(){
		// alert(widget.length);
	    if(current < widget.length) { 
            // alert(current);
			// if(current==6){
			// 	var b_name=$('#b_name').val();
			// 	if(b_name ==''){
			// 		$('#b_name_error').empty().append('Please enter business name');
			// 	}else{
			// 		$('#b_name_error').empty();
			// widget.show(); 			
            // widget.not(':eq('+(current++)+')').hide();
  	        // setProgress(current);
			// 	}
			// }else
             if(current==6){
				var b_name=$('#business_type').val();
				if(b_name ==''){
					$('#business_type_error').empty().append('Please select business type');
				}else{
					$('#business_type_error').empty();
			widget.show(); 			
            widget.not(':eq('+(current++)+')').hide();
  	        setProgress(current);
				}
			}else if(current==7){
				var b_name=$('#state').val();
				if(b_name ==''){
					$('#state_error').empty().append('Please select state');
				}else{
					$('#state_error').empty();
			widget.show(); 			
            widget.not(':eq('+(current++)+')').hide();
  	        setProgress(current);
				}
			}else if(current==8){
				var b_name=$('#business-industry').val();
				if(b_name ==''){
					$('#business_industry_error').empty().append('Please select business industry');
				}else{
					$('#business_industry_error').empty();
			widget.show(); 			
            widget.not(':eq('+(current++)+')').hide();
  	        setProgress(current);
				}
			}else if(current==3){
                var credit_score=$('#credit_score').val();
				if(credit_score ==''){
					$('#credit_score_error').empty().append('Please select credit score');
				}else{
					$('#credit_score_error').empty();
			widget.show(); 			
            widget.not(':eq('+(current++)+')').hide();
  	        setProgress(current);
                }
            }else if(current==5){
                var time=$('#time').val();
				if(time ==''){
					$('#time_error').empty().append('Please select time are you in business');
				}else{
					$('#time_error').empty();
			widget.show(); 			
            widget.not(':eq('+(current++)+')').hide();
  	        setProgress(current);
                }

            
            }else if(current==2){
                var purpose=$('#purpose').val();
				if(purpose ==''){
					$('#purpose_error').empty().append('Please select money');
				}else{
					$('#purpose_error').empty();
			widget.show(); 			
            widget.not(':eq('+(current++)+')').hide();
  	        setProgress(current);
                }

            
            }else if(current==4){
                var average=$('#average').val();
				if(average ==''){
					$('#average_error').empty().append('Please select average revenue');
				}else{
					$('#average_error').empty();
			widget.show(); 			
            widget.not(':eq('+(current++)+')').hide();
  	        setProgress(current);
                }

            
            }else{			
            widget.show(); 			
            widget.not(':eq('+(current++)+')').hide();
  	        setProgress(current); 
			}
            //alert("I was called from btnNext");
        } 		
       hideButtons(current); 	
   });
   
  // Back button click action 	
  btnback.click(function(){ 		
      if(current > 1){
		    current = current - 2;
		    btnnext.trigger('click');
	    }
        hideButtons(current);
    });		
});

// Change progress bar action
setProgress = function(currstep){
	var percent = parseFloat(100 / widget.length) * currstep;
	percent = percent.toFixed();
	$(".progress-bar")
        .css("width",percent+"%")
        .html(percent+"%");		
}

// Hide buttons according to the current step
hideButtons = function(current){
	var limit = parseInt(widget.length); 

	$(".action").hide();

	if(current < limit) btnnext.show(); 	
  if(current > 1) btnback.show();
	if(current == limit) { btnnext.hide(); btnsubmit.show(); }
}
/* function getPhone() {
    var phonecheck = '{{$form->phone_terms}}';
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
} */

$(document).ready(function() {
    // Handle form submission
  /*   $('#multistep-form').submit(function(event) {
        // Prevent default form submission
        event.preventDefault();

        // Show Swal loading message
        Swal.fire({
            title: 'Loading...',
            html: '<img src="https://i.gifer.com/ZKZg.gif" style="width: 50px; height: 50px;">',
            allowOutsideClick: false,
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading();
            }
        }).then((result) => {
            $('form#multistep-form').off('submit').submit();
        });
    }); */
});
// form submit ajax 

// 	 	$('#multistep-form').on('submit', function(e) {
// alert('HEHEHEHE');
// 			e.preventDefault();
// 			let form = $(this);
			
			
// 			axios({
//   method: 'post',
//   url: 'https://app.msfg.finance/form/',
//   headers: {
//     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
//     'Content-Type': 'application/x-www-form-urlencoded'  // Adjust content type if needed
//   },
//   data: form.serialize()  // Ensure form data is correctly serialized
// })
// .then(function (response) {
//   console.log(response.data);
//   alert('Inserted');
// })
// .catch(function (error) {
//   //console.error('Error:', error);
//   alert('Error');
// });

			
	
// 		}); 
		
	/* 	function validations() {
    let isValid = true;
    $('#multistep-form input[required]').each(function() {
        if ($(this).val() === '') {
            isValid = false;
            return false;
        }
    });
    return isValid;
} */





/* 
$('#multistep-form').on('submit', function(e) {
    e.preventDefault();
    let form = $(this);
    let errorMessages = $('#error-messages');
    errorMessages.html(''); // Clear previous error messages

    if (validations()) {
        // Perform AJAX request
        $.ajax({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            method: 'POST',
            url: '{{ url('url') }}',
            data: form.serialize(),
            success: function(data) {
                if (data['status'] == 'success') {
                    console.log(data);
                    let editor = document.getElementById(id);
                    editor.innerHTML = '';
                }
            },
            error: function(data) {
                console.log(data);
            }
        });
    } else {
        errorMessages.html('<div class="alert alert-danger">Please fill in all required fields.</div>');
    }
});

function validations() {
    let isValid = true;
    $('#multistep-form input[required]').each(function() {
        if ($(this).val() === '') {
            isValid = false;
            return false; 
        }
    });
    return isValid;
} */


$(document).ready(function () {
    $("#multistep-form").validate({
        rules: {
            "f_name": {
                required: true,
            },
			"l_name": {
                required: true,
            },
            "slider": {
                required: false,
            },

            "checkbox": {
                required: true,
            },
			"term_check": {
                required: true,
            },
             "b_name": {
                required: true,
            },
            "email": {
                required: true,
                email: true
            },
			"phone": {
                required: true,
				minlength: 12,
				maxlength: 12, 
				// number:true,
            },
        },
        messages: {
            "f_name": {
                required: "Please enter a first name"
            },
			"l_name": {
                required: "Please enter a last name"
            },
            "b_name": {
                required: "Please enter business name"
            },

            "checkbox": {
                required: " Please agree to the terms and conditions "
            },
            "term_check": {
                required: " Please agree to the phone terms  "
            },
            "email": {
                required: "Please enter an email",
                email: "Email is invalid"
            },
			"phone": {
                required: "Please enter phone number",
                minlength: "Your entry is too short.",
                maxlength: "Please enter maximum 10 digits",
				number: "Please enter a valid phone number"

            }
        },
        submitHandler: function (form) {
			Swal.fire({
            title: 'Please wait...',
            html: '<img src="https://i.gifer.com/ZKZg.gif" style="width: 100px; height: 100px;">',
            allowOutsideClick: false,
            showConfirmButton: false,
            timer: 2000,
            timerProgressBar: true,
            didOpen: () => {
                form.submit();
                // Swal.showLoading();
            }
        }).then((result) => {
          // form.submit();
        });
			
        }
    });


// EIN field validation 
$('#ein').on('input', function() {
        var ein = $(this).val().replace(/\D/g, '');
        if (ein.length > 2) {
            ein = ein.replace(/(\d{2})(\d{1,7})/, '$1-$2'); 
        }
        $(this).val(ein);
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
});

$(document).ready(function () {
	$('select').change(function () {
        var inputId = $(this).attr('id'); 
		// alert(inputId);
        // if(inputId == 'amt'){
        btnnext.click();
        // }

        $('#'+inputId+'_error').empty('');
    });
});



</script>
<script>
var slider = document.getElementById("slider");
var priceRange = document.querySelector(".radioAmount");
function updatePriceRange() {
    var sliderValue = slider.value;
    var displayText = formatPrice(sliderValue);
    priceRange.textContent = displayText;
    $('#amt').val(displayText);
}


function formatNumber(num) {
    // Convert the number to a string
    let str = num.toString();
    
    // Use a regular expression to insert commas every three digits
    // from the end of the string
    return str.replace(/\B(?=(\d{3})+(?!\d))/g, ',');
}

function formatPrice(value) {
    if (value < 490000) {
        var val=formatNumber(value);
        // alert(val);

        return "$" + val;
    } else {
        return "$500,000+";
    }
}
slider.addEventListener("input", updatePriceRange);
updatePriceRange();



// function loader(){
//     alert('test')
//     Swal.fire({
//             title: 'Please wait...',
//             html: '<img src="https://i.gifer.com/ZKZg.gif" style="width: 150px; height: 150px;">',
//             allowOutsideClick: false,
//             showConfirmButton: false,
//             timer: 5000,
//             timerProgressBar: true,
//         });
// }

var btn123 = $('.next');
btn123.on('click', function(e) {
  e.preventDefault();
  $('html, body').animate({scrollTop:0}, '300');
});

</script>




@include('layout.footer')

