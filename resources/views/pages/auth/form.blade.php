 
  
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
pre.brush\:html {
    display: table;
    margin: auto;
}
button.action.btn {
    margin-top: 22px;
    margin-right: 20px;
}
label {
    font-size: 3rem !important;
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
.formFieldRequired{
	display: none;
}
</style>
<x-auth-layout>

    <!--begin::Form-->
    <form class="form w-100" id="multistep-form" action="{{ route('form') }}" method="post">
        @csrf
        <!--begin::Heading-->
        <div class="text-center mb-11">
            <!--begin::Title-->
            <h1 class="text-gray-900 fw-bolder mb-3 heading">
                PREQUALIFICATION FORM
            </h1>
            <!--end::Title-->

            <!--begin::Subtitle-->
            <div class="text-gray-500 fw-semibold fs-6">
                Funding Expert
            </div>
            <!--end::Subtitle--->
        </div>
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
    	    <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="step well">
			
                                       
                                        <div class="col-md-12">
                                            <label for="amt">How much money do you need?</label>
                                            <select class="form-select" id="amt" name="amt" required>
                                                <option value="$10,000 - $29,999">$10,000 - $29,999</option>
                                                <option value="$30,000 - $49,999">$30,000 - $49,999</option>
                                                <option value="$50,000 - $74,999">$50,000 - $74,999</option>
                                                <option value="$75,000 - $99,999">$75,000 - $99,999</option>
                                                <option value="$100,000 - $249,999">$100,000 - $249,999</option>
                                                <option value="$250,000 - $499,999">$250,000 - $499,999</option>
                                                <option value="$500,000 - $1,000,000">$500,000 - $1,000,000</option>
                                                <option value="More than $1,000,000">More than $1,000,000</option>
                                            </select>
                                        </div>
			</div>
			
            <div class="step well">
			<div class="col-md-12">
                     <label for="purpose">Whats the money for?</label>
                     <select class="form-select" id="purpose" name="purpose" required>
                         <option value="Working Capital">Working Capital</option>
                         <option value="Debt Consolidation">Debt Consolidation</option>
                         <option value="Purchase Equipment">Purchase Equipment</option>
                         <option value="Purchase Inventory">Purchase Inventory</option>
                         <option value="Business Acquisition">Business Acquisition</option>
                         <option value="Build Business Credit">Build Business Credit</option>
                         <option value="Other">Other</option>
                     </select>
                 </div>
			</div>
			
            <div class="step well">
			 <div class="col-md-12">
                                            <label for="average">What is your average revenue for the last 3 months?</label>
                                            <select class="form-select" id="average" name="average" required>
                                                <option value="Less than $5,000">Less than $5,000</option>
                                                <option value="$5,000 - $9,999">$5,000 - $9,999</option>
                                                <option value="$10,000 - $19,999">$10,000 - $19,999</option>
                                                <option value="$20,000 - $29,999">$20,000 - $29,999</option>
                                                <option value="$30,000 - $39,999">$30,000 - $39,999</option>
                                                <option value="$40,000 - $49,999">$40,000 - $49,999</option>
                                                <option value="$50,000 - $74,999">$50,000 - $74,999</option>
                                                <option value="$75,000 - $99,999">$75,000 - $99,999</option>
                                                <option value="$100,000 - $249,999">$100,000 - $249,999</option>
                                                <option value="$250,000 - $500,000">$250,000 - $500,000</option>
                                                <option value="More than $500,000">More than $500,000</option>
                                            </select>
                                        </div>
			</div>
			
            <div class="step well">
			<div class="col-md-12">
                                            <label for="time">How much time are you in business?</label>
                                            <select class="form-select" id="time" name="time" required>
                                                <option value="1 Year or More">1 Year or More</option>
                                                <option value="More than 6 Months">More than 6 Months</option>
                                                <option value="New Business">New Business</option>
                                            </select>
                                        </div>
			</div>
			
            <div class="step well">
			
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
			
			</div>
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
											   <option value="AL">Alabama</option>
    <option value="AK">Alaska</option>
    <option value="AS">American Samoa</option>
    <option value="AZ">Arizona</option>
    <option value="AR">Arkansas</option>
    <option value="UM-81">Baker Island</option>
    <option value="CA">California</option>
    <option value="CO">Colorado</option>
    <option value="CT">Connecticut</option>
    <option value="DE">Delaware</option>
    <option value="DC">District of Columbia</option>
    <option value="FL">Florida</option>
    <option value="GA">Georgia</option>
    <option value="GU">Guam</option>
    <option value="HI">Hawaii</option>
    <option value="UM-84">Howland Island</option>
    <option value="ID">Idaho</option>
    <option value="IL">Illinois</option>
    <option value="IN">Indiana</option>
    <option value="IA">Iowa</option>
    <option value="UM-86">Jarvis Island</option>
    <option value="UM-67">Johnston Atoll</option>
    <option value="KS">Kansas</option>
    <option value="KY">Kentucky</option>
    <option value="UM-89">Kingman Reef</option>
    <option value="LA">Louisiana</option>
    <option value="ME">Maine</option>
    <option value="MD">Maryland</option>
    <option value="MA">Massachusetts</option>
    <option value="MI">Michigan</option>
    <option value="UM-71">Midway Atoll</option>
    <option value="MN">Minnesota</option>
    <option value="MS">Mississippi</option>
    <option value="MO">Missouri</option>
    <option value="MT">Montana</option>
    <option value="UM-76">Navassa Island</option>
    <option value="NE">Nebraska</option>
    <option value="NV">Nevada</option>
    <option value="NH">New Hampshire</option>
    <option value="NJ">New Jersey</option>
    <option value="NM">New Mexico</option>
    <option value="NY">New York</option>
    <option value="NC">North Carolina</option>
    <option value="ND">North Dakota</option>
    <option value="MP">Northern Mariana Islands</option>
    <option value="OH">Ohio</option>
    <option value="OK">Oklahoma</option>
    <option value="OR">Oregon</option>
    <option value="UM-95">Palmyra Atoll</option>
    <option value="PA">Pennsylvania</option>
    <option value="PR">Puerto Rico</option>
    <option value="RI">Rhode Island</option>
    <option value="SC">South Carolina</option>
    <option value="SD">South Dakota</option>
    <option value="TN">Tennessee</option>
    <option value="TX">Texas</option>
    <option value="UM">United States Minor Outlying Islands</option>
    <option value="VI">United States Virgin Islands</option>
    <option value="UT">Utah</option>
    <option value="VT">Vermont</option>
    <option value="VA">Virginia</option>
    <option value="UM-79">Wake Island</option>
    <option value="WA">Washington</option>
    <option value="WV">West Virginia</option>
    <option value="WI">Wisconsin</option>
    <option value="WY">Wyoming</option>
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
			
									<div class="col-md-12">
                                            <!--label for="f_name" class="form-label">First Name</label--><br>
                                            <input class="form-control bg-transparent" type="text" name="f_name" id="f_name" placeholder="First Name*" required>
                                        </div> 
                                        <div class="col-md-12">
                                            <!--label for="l_name" class="form-label">Last Name</label--><br>
                                            <input class="form-control bg-transparent" type="text" name="l_name" id="l_name" placeholder="Last Name*" required>
                                        </div>
                                        <div class="col-md-12">
                                            <!--label for="email" class="form-label">Email</label--><br>
                                            <input class="form-control bg-transparent" type="email" name="email" id="email" placeholder="Email*" required>
                                        </div>
 
                                           <div class="col-md-12">
                                            <!--label for="phone" class="form-label">Phone</label--><br>
                                            <input class="form-control bg-transparent" type="text" name="phone" id="phone" placeholder="Phone*" required maxlength="12" minlength="12" pattern="[0-9]*" inputmode="numeric">
                                        </div>
                                       
			
			</div>
           
            <pre class="brush:html"><button class="action back btn btn-md btn-primary" type="button">Previous</button>
            <button class="action next btn btn-md btn-primary" type="button">Next</button>
            <button class="action submit btn btn-md btn-primary" type="submit" >Submit</button>
        </div>
	</div>
</div>
</form>
    <!--end::Form-->

</x-auth-layout>
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
			if(current==5){
				var b_name=$('#b_name').val();
				if(b_name ==''){
					$('#b_name_error').empty().append('Please enter business name');
				}else{
					$('#b_name_error').empty();
			widget.show(); 			
            widget.not(':eq('+(current++)+')').hide();
  	        setProgress(current);
				}
			}else if(current==7){
				var b_name=$('#business_type').val();
				if(b_name ==''){
					$('#business_type_error').empty().append('Please select business type');
				}else{
					$('#business_type_error').empty();
			widget.show(); 			
            widget.not(':eq('+(current++)+')').hide();
  	        setProgress(current);
				}
			}else if(current==8){
				var b_name=$('#state').val();
				if(b_name ==''){
					$('#state_error').empty().append('Please select state');
				}else{
					$('#state_error').empty();
			widget.show(); 			
            widget.not(':eq('+(current++)+')').hide();
  	        setProgress(current);
				}
			}else if(current==9){
				var b_name=$('#business-industry').val();
				if(b_name ==''){
					$('#business_industry_error').empty().append('Please select business industry');
				}else{
					$('#business_industry_error').empty();
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
           // html: '<img src="https://i.gifer.com/ZKZg.gif" style="width: 50px; height: 50px;">',
            allowOutsideClick: false,
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading();
            }
        }).then((result) => {
           form.submit();
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
</script>


