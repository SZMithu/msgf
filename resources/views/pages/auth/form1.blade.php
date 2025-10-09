
<style>
	pre.brush\:html {
		display: flex;
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
button.action.next.btn.btn-info {
    background: #8180e0;
}
</style>
<x-auth-layout>

	<!--begin::Form-->
	<form class="form w-100" novalidate="novalidate" id="multistep-form" data-kt-redirect-url="" action="" enctype='multipart/form-data'>
		@csrf
		<!--begin::Heading-->
		<div class="text-center mb-11">
			<!--begin::Title-->
			<h1 class="text-gray-900 fw-bolder mb-3">
				Business Qualification Form
			</h1>
			<!--end::Title-->

			<!--begin::Subtitle-->
			<!--div class="text-gray-500 fw-semibold fs-6">
				Funding Expert
			</div-->
			
		</div>
	
			<div class="row">
				<div class="col-md-12 ">
					<div class="progress">
						<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0"
							aria-valuemax="100"></div>
					</div>
					<div class="step well">
						<div class="text-gray-500 fw-semibold fs-6">
							Business Information
						</div>
						<div class="row">
							<input type="text" name="u_id" value="{{ base64_decode($_GET['id']);}}" hidden>
							<div class="col-md-6">
								<label for="amt">Company Name<span class="red-text">*</span></label>
								<input type="text" class="form-control bg-transparent" name="company_name"
									id="company_name" placeholder="Company Name">
									<span class="red-text" id="company_name_error"></span>

							</div>
							<div class="col-md-6">
								<label for="amt">DBA</label>
								<input type="text" class="form-control bg-transparent" name="dba" id="dba"
									placeholder="DBA">

							</div>
							<div class="col-md-6">
								<label for="amt">Federal Tax Id<span class="red-text">*</span></label>
								<input type="text" class="form-control bg-transparent" name="fedral_taxid"
									id="fedral_taxid" placeholder="Federal Tax Id">
									<span class="red-text" id="fedral_taxid_error"></span>


							</div>
							<div class="col-md-6">
								<label for="amt">Company Type<span class="red-text">*</span></label>
								<select class="form-select" id="purpose" name="purpose" required>
									<option value="">Select</option>
									<option value="Sole Proprietor">Sole Proprietor</option>
									<option value="Corporation">Corporation</option>
									<option value="LLC">LLC</option>
									<option value="Partnership">Partnership</option>

								</select>
								<span class="red-text" id="purpose_error"></span>

							</div>
							<div class="col-md-6">
								<label for="amt">Industry Description</label>
								<input type="text" class="form-control bg-transparent" name="industry_des"
									id="industry_des" placeholder="Industry Description">
									<span class="red-text" id="industry_des_error"></span>


							</div>
							<div class="col-md-6">
								<label for="amt">Business Phone<span class="red-text">*</span></label>
								<input type="number" class="form-control bg-transparent" name="bussiness_phone"
									id="bussiness_phone" placeholder="Business Phone">
									<span class="red-text" id="bussiness_phone_error"></span>


							</div>
							<div class="col-md-6">
								<label for="amt">Fax</label>
								<input type="text" class="form-control bg-transparent" name="fax" id="fax"
									placeholder="Fax">
									

							</div>
							<div class="col-md-6">
								<label for="amt">Business Start Date<span class="red-text">*</span></label>
								<input type="date" class="form-control bg-transparent" name="bussines_startDate"
									id="bussines_startDate" placeholder="Business Start Date">
									<span class="red-text" id="bussines_startDate_error"></span>


							</div>
						</div>
						<div class="text-500 fw-bold fs-6">
							Address
						</div>
						<div class="row">
							<div class="col-md-6">
								<label for="city">Street<span class="red-text">*</span></label>
								<input type="text" class="form-control bg-transparent" name="Street" id="Street"
									placeholder="Street">
									<span class="red-text" id="Street_error"></span>

							</div>
							<div class="col-md-6">
								<label for="city">City<span class="red-text">*</span></label>
								<input type="text" class="form-control bg-transparent" name="city" id="city"
									placeholder="City">
									<span class="red-text" id="city_error"></span>

							</div>

							<div class="col-md-6">
								<label for="state">State<span class="red-text">*</span></label>
								<select class="form-select" name="state" id="state">
								<option value="">Select state</option>
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
									<!-- Add more options as needed -->
								</select>
								<span class="red-text" id="state_error"></span>

							</div>

							<div class="col-md-6">
								<label for="postal">Postal Code<span class="red-text">*</span></label>
								<input type="text" class="form-control bg-transparent" name="postal" id="postal"
									placeholder="Postal Code" onkeypress="return isNumberKey(event)">
									<span class="red-text" id="postal_error"></span>

							</div>

							<div class="col-md-6">
								<label for="country">Country<span class="red-text">*</span></label>
								<select class="form-select" name="country" id="country">
									<option value="">Select Country</option>
									<option value="US">United States</option>
									<!-- <option value="CA">Canada</option> -->
									
									<!-- Add more options as needed -->
								</select>
								<span class="red-text" id="country_error"></span>

							</div>
						</div>
					</div>

					<div class="step well">
						<div class="text-gray-500 fw-semibold fs-6">
							Business Information
						</div>
						<div class="row">
							<div class="col-md-6">
								<label for="title">Title<span class="red-text">*</span></label>
								<input type="text" class="form-control bg-transparent" name="title" id="title"
									placeholder="Title">
									<span class="red-text" id="title_error"></span>

							</div>

							<div class="col-md-6">
								<label for="firstname">First Name<span class="red-text">*</span></label>
								<input type="text" class="form-control bg-transparent" name="firstname" id="firstname"
									placeholder="First Name">
									<span class="red-text" id="firstname_error"></span>

							</div>

							<div class="col-md-6">
								<label for="lastname">Last Name<span class="red-text">*</span></label>
								<input type="text" class="form-control bg-transparent" name="lastname" id="lastname"
									placeholder="Last Name">
									<span class="red-text" id="lastname_error"></span>

							</div>

							<div class="col-md-6">
								<label for="phone">Phone Number<span class="red-text">*</span></label>
								<input type="tel" class="form-control bg-transparent" name="phone" id="phone"
									placeholder="Phone Number" onkeypress="return isNumberKey(event)">
									<span class="red-text" id="phone_error"></span>

							</div>

							<div class="col-md-6">
								<label for="email">Email<span class="red-text">*</span></label>
								<input type="email" class="form-control bg-transparent" name="email" id="email"
									placeholder="Email">
									<span class="red-text" id="email_error"></span>

							</div>
							<div class="col-md-6">
								<label for="ssn">Social Security Number<span class="red-text">*</span></label>
								<input type="text" class="form-control bg-transparent" name="ssn" id="ssn"
									placeholder="Social Security Number">
									<span class="red-text" id="ssn_error"></span>

							</div>

							<div class="col-md-6">
								<label for="dob">Date of Birth<span class="red-text">*</span></label>
								<input type="date" class="form-control bg-transparent" name="dob" id="dob">
								<span class="red-text" id="dob_error"></span>

							</div>

							<div class="col-md-6">
								<label for="ownership">Percent Ownership<span class="red-text">*</span></label>
								<input type="number" class="form-control bg-transparent" name="ownership" id="ownership"
									placeholder="Percent Ownership">
									<span class="red-text" id="ownership_error"></span>

							</div>
						</div>
						<div class="text-gray-500 fw-semibold fs-6">
							Address
						</div>
						<div class="row">
							<div class="col-md-6">
								<label for="city">Street<span class="red-text">*</span></label>
								<input type="text" class="form-control bg-transparent" name="Street2" id="Street2"
									placeholder="Street">
									<span class="red-text" id="Street2_error"></span>

							</div>
							<div class="col-md-6">
								<label for="city">City<span class="red-text">*</span></label>
								<input type="text" class="form-control bg-transparent" name="city2" id="city2"
									placeholder="City">
									<span class="red-text" id="city2_error"></span>

							</div>

							<div class="col-md-6">
								<label for="state">State<span class="red-text">*</span></label>
								<select class="form-select" name="state2" id="state2">
									<option value="">Select State</option>
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
									<!-- Add more options as needed -->
								</select>
								<span class="red-text" id="state2_error"></span>

							</div>

							<div class="col-md-6">
								<label for="postal">Postal Code</label>
								<input type="text" class="form-control bg-transparent" name="postal2" id="postal2"
									placeholder="Postal Code">
									<span class="red-text" id="postal2_error"></span>

							</div>

							<div class="col-md-6">
								<label for="country">Country</label>
								<select class="form-select" name="country2" id="country2">
									<option value="">Select Country</option>
									<option value="US">United States</option>
									<!-- <option value="CA">Canada</option> -->

								</select>
								<span class="red-text" id="country2_error"></span>

							</div>
						</div>
					</div>

					<div class="step well">
						<div class="text-gray-500 fw-semibold fs-6">
							Underwriting Information
						</div>
						<div class="row">
							<div class="col-md-12">
								<label for="loan_type">Type of Loan</label>
								<select class="form-control bg-transparent" name="loan_type" id="loan_type">
									<option value="">Select Loan Type</option>
									<option value="Business">Business Loan</option>
									<option value="Personal">Personal Loan</option>
								</select>
							</div>

							<div class="col-md-12">
								<label for="location_ownership">Is Business Location Owned or Rented?</label>
								<select class="form-control bg-transparent" name="location_ownership"
									id="location_ownership">
									<option value="">Select Ownership</option>
									<option value="Owned">Owned</option>
									<option value="Rented">Rented</option>
								</select>
							</div>

							<div class="col-md-12">
								<label for="owned_details">If owned, specify details</label>
								<select class="form-control bg-transparent" name="owned_details" id="owned_details">
									<option value="">Select Option</option>
									<option value="Fully Owned">Fully Owned</option>
									<option value="Mortgaged">Mortgaged</option>
								</select>
							</div>

							<div class="col-md-6">
								<label for="gross_sales">Gross Annual Sales</label>
								<input type="number" class="form-control bg-transparent" name="gross_sales"
									id="gross_sales" placeholder="Gross Annual Sales">
							</div>

							<div class="col-md-6">
								<label for="avg_bank_balance">Average Bank Balance</label>
								<input type="number" class="form-control bg-transparent" name="avg_bank_balance"
									id="avg_bank_balance" placeholder="Average Bank Balance">
							</div>

							<div class="col-md-6">
								<label for="requested_amount">Requested Funding Amount</label>
								<input type="number" class="form-control bg-transparent" name="requested_amount"
									id="requested_amount" placeholder="Requested Funding Amount">
							</div>

							<div class="col-md-6">
								<label for="term_length">Requested Term Length (months)</label>
								<input type="number" class="form-control bg-transparent" name="term_length"
									id="term_length" placeholder="Requested Term Length">
							</div>

							<div class="col-md-6">
								<label>
									<input type="checkbox" name="existing_loan" id="existing_loan">
									Existing Working Capital Loan Balance?
								</label>
							</div>




						</div>
						<div class="text-gray-500 fw-semibold fs-6">
						<p>Please attach 4 months of bank statements.</p>
						</div>
						<!-- <div class="row">
							<p>Please attach 4 months of bank statements.</p>
							<div class="col-md-6">
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
      <input type="file" multiple="" name="bank_statements[]" id="bank_statements" />
    </label>
  </div>

  <div class="files-container"></div>
  <div class="form-group text-center">
    <button class="btn btn-default dnd-file-upload-widget-upload-button hidden">
      
    </button>
    <span class="text-danger dnd-file-upload-widget-size-error hidden"></span>
  </div>
</div>
						<div class="text-gray-500 fw-semibold fs-6">
							Credit Authorization
						</div>
						<div class="row">
							<div class="col-md-12">
								<label>
									<input type="checkbox" name="authorize" id="authorize">
									I Authorize
								</label>
								<div id="errorContainer" style="color: red; display: none;">Please agree to the terms and conditions</div>

							</div>
							<div class="col-md-12">
								<p>The Merchant and Owner(s)/Officer(s) identified above (individually, an “Applicant”) each represents, acknowledges and agreesthat (1) all information and documents provided to Better Business Funding, LLC. (“BBF”) including credit card processor statements are true, accurate and complete, (2) Applicant will immediately notify BBF of any change in such information or financial condition, (3) Applicant authorizes BBF to disclose all information and documentsthat BBF may obtain including credit reports to other persons or entities (collectively, "Assignees") that may be involved with or acquire commercial loans having daily repayment features and/or Merchant Cash Advance transactions, including without limitation the application therefor (collectively, "Transactions") and each Assignee is authorized to use such information and documents, and share such information and documents with other Assignees, in connection with potential Transactions, (4) eachAssignee will rely upon the accuracy and completeness of such information and documents, (5) BBF, Assignees, and each of their representatives, successors, assigns and designees (collectively, “Recipients”) are authorized to request and receive any investigative reports, credit reports, statements from creditors or financial institutions, verification of information, or any other information that a Recipient deems necessary, (6) Applicant waives and releases any claims against Recipients and any information-providers arising from any act or omissionrelating to the requesting, receiving or release of information, and (7) each Owner/Officer represents that he or she is authorized to sign this form on behalf of Merchant. The Merchant and Owner(s)/Officer(s) identified above agree to opt-in to receive marketing emails, facsimiles, and telemarketing as it relates to products and services offered by BBF.</p>
							</div>


						</div>
						</div>
						<pre class="brush:html"><button class="action back btn btn-info" type="button">Back</button>
            <button class="action next btn btn-info" type="button">Next</button>
            <button class="action submit btn btn-success" type="submit" >Submit</button>
        </div>
	</div>

</form>
    <!--end::Form-->

</x-auth-layout>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
				if(current ==1){
					var first=firstform();
					if(first == true){
						insertform();

						widget.show();
				widget.not(':eq(' + (current++) + ')').hide();
				setProgress(current);
					}
				}else if(current ==2){
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

	// form submit ajax 
    var uploadButton = document.querySelector('.dnd-file-upload-widget-upload-button');
    var agreeCheckbox = document.getElementById('authorize');


	$('#multistep-form').on('submit', function (e) {
		if (!agreeCheckbox.checked) {
            event.preventDefault(); // Prevent form submission
            errorContainer.style.display = 'block'; // Show error message
        } else {
            errorContainer.style.display = 'none'; // Hide error message if checkbox is checked
       
		e.preventDefault();
		let form = $(this);
        simulateButtonClick(uploadButton);

		$.ajax({
			headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			method: 'POST',
			url: '{{ url('/step-second') }}',
			data: form.serialize(),
			success: function (response) {
				if (response && response.message=='update successfully') {
					Swal.fire({
        title: "Submitted!",
        text: "Within 24 hours our underwriting team will review the deal and reach out to discuss",
        icon: "success",
        confirmButtonText: "OK",
    }).then((result) => {
        if (result.isConfirmed) {
            // Redirect or navigate to another part of your application
            window.location.href = '{{ url('/form') }}'; // Replace with your destination URL
        }
    });
        }
// 				if()
				
				// alert('inserted');

			},
			error: function (data) {
				// alert('Error');
			}
		});
	}

	});

	function insertform(){

		let form = $('#multistep-form');
					$.ajax({
						headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
						method: 'POST',
						url: '{{ url('/step-second') }}',
						data: form.serialize(),
						success: function (data) {

							// alert('inserted');

						},
						error: function (data) {
							// alert('Error');
						}
					});

	}


	function validations() {
		let isValid = true;
		$('#multistep-form input[required]').each(function () {
			if ($(this).val() === '') {
				isValid = false;
				return false; // Exit loop early if any field is empty
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
					var country=$('#country').val();

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
					}

					if(bussines_startDate ==''){
						$('#bussines_startDate_error').empty().append('Please enter bussiness start date');
					}

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

					if(country ==''){
						$('#country_error').empty().append('Please enter country');
					}

					if(company_name !=='' && fedral_taxid !=='' && purpose!=='' && bussiness_phone !=='' && bussines_startDate !==''&& Street !=='' && city !=='' && postal !=='' && country !=='' && state !==''){

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
					var country2=$('#country2').val();

					if(title ==''){
						$('#title_error').empty().append('Please enter title');
					}

					if(firstname ==''){
						$('#firstname_error').empty().append('Please enter first name');
					}

					if(lastname ==''){
						$('#lastname_error').empty().append('Please enter last name');
					}

					if(phone ==''){
						$('#phone_error').empty().append('Please enter phone');
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
					if(postal2 ==''){
						$('#postal2_error').empty().append('Please enter postal');
					}

					if(country2 ==''){
						$('#country2_error').empty().append('Please enter country');
					}

					if(ssn ==''){
						$('#ssn_error').empty().append('Please enter social security number');
					}
					if(dob ==''){
						$('#dob_error').empty().append('Please enter DOB');
					}
					if(ownership ==''){
						$('#ownership_error').empty().append('Please enter ownership');
					}


					if(isValidEmail(email) == true && ownership!=='' && dob !=='' && ssn !=='' && title !=='' && firstname !=='' && lastname!=='' && phone !=='' && email !==''&& Street2 !=='' && city2 !=='' && postal2 !=='' && country2 !=='' && state2 !==''){

					return true;

					}



		return false;

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

// Fired when the drag operation ends (signaling the drop has occurred or the drag has been canceled).
DndFileUploadWidget.prototype.dragend_handler = function(ev) {
  console.log("dragend");
  this._dropZone.classList.remove('dragover');
  // Remove all of the drag data
  var dt = ev.dataTransfer;
  if (dt.items) {
	// Use DataTransferItemList interface to remove the drag data
	for (var i = 0; i < dt.items.length; i++) {
	  dt.items.remove(i);
	}
  } else {
	// Use DataTransfer interface to remove the drag data
	ev.dataTransfer.clearData();
  }
};

DndFileUploadWidget.prototype.addFileUploadRow = function(file) {
  var filesContainer = this.getFilesContainer();
  var filename = file.name;
  var fileSize = file.size;
  var domString = '<div class="row form-group"> <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8"> <div class="text-left" style="line-height:32px">' + filename + '</div> </div> <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"> <div style="line-height:32px">' + humanReadableFileSize(fileSize) + '</div> </div> <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-right"> <button class="btn btn-danger dnd-file-upload-widget-remove-file-button"> Remove </button> </div> </div>'
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
  var fileUploadRows = filesContainer.children;
  if (fileUploadRows.length === 0) {
	this.getUploadButton().classList.add('hidden');
	this.getSizeErrorSpan().classList.add('hidden');
	return false;
  }

  for (var i = 0; i < fileUploadRows.length; i++) {
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
  var formData = new FormData();
  var userId='{{ base64_decode($_GET['id']);}}';
  formData.append('u_id', userId);

  var filesContainer = this.getFilesContainer();
  var fileUploadRows = filesContainer.children;
  for(var i = 0; i < fileUploadRows.length; i++) {
	var fileUploadRow = fileUploadRows[i];
	var file = fileUploadRow.file;
	formData.append('files[]', file, file.name);
  }

  var url ='{{ url('/step-second') }}';
  var xhr = new XMLHttpRequest();
  xhr.open("POST", url, true);
  xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
  var self = this;
  xhr.onload = function () {
	if (xhr.status === 200) {
	} else {
	  alert(xhr.statusText);
	  self.exitLoadingState();
	}
  };

  xhr.onerror = function () {
	alert(xhr.statusText);
	self.exitLoadingState();
  };

  if (this._csrfHeaderName && this._csrfToken) {
	xhr.setRequestHeader(this._csrfHeaderName , this._csrfToken);
  }

  xhr.send(formData);
  this.enterLoadingState();
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

	$('#bussiness_phone').on('input', function() {
        var phone = $(this).val().replace(/\D/g, '');
                if (phone.length > 3) {
                    phone = phone.replace(/(\d{3})(\d{1,3})(\d{1,4})/, '$1-$2-$3');
                } else if (phone.length > 6) {
                    phone = phone.replace(/(\d{3})(\d{3})(\d{1,4})/, '$1-$2-$3');
                }
                $(this).val(phone);
            });
</script>
