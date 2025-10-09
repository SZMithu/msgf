<x-default-layout>

    @section('title')
        Form Entries
    @endsection
<style>

tbody.fs-6.fw-semibold.text-gray-600 tr td:nth-child(1) {
    width: 35%;
}
</style>
   <?php //print_r($forms); die; ?>

    <!--begin::Layout-->
    <div class="d-flex flex-column flex-lg-row">
        <!--begin::Sidebar-->
        <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
            <!--begin::Card-->
            <div class="card mb-5 mb-xl-8">
                <!--begin::Card body-->
                <div class="card-body">
                    
                       
                    <div class="d-flex flex-stack fs-4 py-3">
                        <div class="fw-bold rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details" role="button" aria-expanded="false" aria-controls="kt_user_view_details"><div class="card-title">
                                {!!$setting->form_1!!}
                               
                            </div>
                            <span class="ms-2 rotate-180">
                                <i class="ki-duotone ki-down fs-3"></i>
                            </span>
                        </div>
                        
                    </div>
                    
                    <!--end::Details toggle-->
                    <div class="separator"></div>
                    <!--begin::Details content-->
                  
                    <div id="kt_user_view_details" class="collapse show">
                        <div class="pb-5 fs-6">
                            <!--begin::Details item-->
                            <div class="fw-bold mt-5">Account ID</div>
                            <div class="text-gray-600">ID-{{$forms->uid}}</div>
                            <!--begin::Details item-->
                            <!--begin::Details item-->
                            <div class="fw-bold mt-5">Status</div>
                            <div class="text-gray-600">
                                <a href="#" class="text-gray-600 text-hover-primary">{{$forms->lead_type}}</a>
                            </div>

                            <div class="fw-bold mt-5">First Name</div>
                            <div class="text-gray-600">
                                <a href="#" class="text-gray-600 text-hover-primary">{{$forms->first_name}}</a>
                            </div>

                            <div class="fw-bold mt-5">Last Name</div>
                            <div class="text-gray-600">
                                <a href="#" class="text-gray-600 text-hover-primary">{{$forms->last_name}}</a>
                            </div>
                            <div class="fw-bold mt-5">Email</div>
                            <div class="text-gray-600">
                                <a href="#" class="text-gray-600 text-hover-primary">{{$forms->first_email}}</a>
                            </div>
                            <div class="fw-bold mt-5">Phone</div>
                            <div class="text-gray-600">
                                <a href="#" class="text-gray-600 text-hover-primary">{{$forms->first_phone}}</a>
                            </div>
                            <div class="fw-bold mt-5">Average</div>
                            <div class="text-gray-600">
                                <a href="#" class="text-gray-600 text-hover-primary">{{$forms->average}}</a>
                            </div>
                            <div class="fw-bold mt-5">Business Name </div>
                            <div class="text-gray-600">{{$forms->bus_name}}</div>
                            <div class="fw-bold mt-5">Purpose </div>
                            <div class="text-gray-600">{{$forms->formpurpose}}</div>
                            <div class="fw-bold mt-5">Credit Score </div>
                            <div class="text-gray-600">{{$forms->credit_score}}</div>
                            <div class="fw-bold mt-5">Amount</div>
                            <div class="text-gray-600">{{$forms->amt}}</div>

                            <div class="fw-bold mt-5">Duration</div>
                            <div class="text-gray-600">{{$forms->time}}</div>

                            <div class="fw-bold mt-5">Ownership </div>
                            <div class="text-gray-600">{{$forms->type}}</div>
                            <div class="fw-bold mt-5">Industries </div>
                            <div class="text-gray-600">{{$forms->industries}}</div>
                            <!-- <div class="fw-bold mt-5">EIN </div>
                            <div class="text-gray-600">{{$forms->ein}}</div> -->

                            <div class="fw-bold mt-5">State </div>
                            <div class="text-gray-600">{{$forms->first_state}}</div>
                            @if(!empty($forms->form_info))
                            <div class="fw-bold mt-5">Form Information (PDF) </div>
                            <!-- <div class="text-gray-600">{{$forms->form_info}}</div> -->

                            <a href="{{URL::to('/storage/app/public/pdf').'/'.$forms->form_info}}" target="_blank" download>
                            <i style="font-size:24px" class="fa">&#xf019;</i></a>
                                @endif
                            </div>
                    </div>
                    <!--end::Details content-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Sidebar-->
        <!--begin::Content-->
        <?php if(!empty($forms->id)){ ?>
        <div class="flex-lg-row-fluid ms-lg-15">
            
            <!--begin:::Tab content-->
            <div class="tab-content" id="myTabContent">
                <!--begin:::Tab pane-->
                
                <!--end:::Tab pane-->
                <!--begin:::Tab pane-->
                <div class="tab-pane fade show active" id="kt_user_view_overview_security" role="tabpanel">
                    <!--begin::Card-->
                    <div class="card pt-4 mb-6 mb-xl-9">
                        <!--begin::Card header-->
                        <div class="card-header border-0">
                            <!--begin::Card title-->
                            <div class="card-title">
                            <!-- {!!$setting->form_2!!} -->
                                <h2>Business Qualification Form
                                </h2>
                            </div>

                            
                            <!--end::Card title-->
                        </div>
                       
                        <div class="card-body pt-0 pb-5">
                        
                            <div class="table-responsive">
                            <div class="card-title">
                            <h5>Business Information
                                </h5>
                               
                            </div>
                                <table class="table align-middle table-row-dashed gy-5" id="kt_table_users_login_session">
                                    <tbody class="fs-6 fw-semibold text-gray-600">

                                        <tr>
                                            <td>Company Name</td>
                                            <td>{{$forms->company_name }}</td>
                                        </tr>

                                        <tr>
                                            <td>DBA</td>
                                            <td>{{$forms->dba}}</td>
                                        </tr>

                                        <tr>
                                            <td>Federal Tax Id</td>
                                            <td>{{$forms->fedral_taxid}}</td>
                                        </tr>
                                        <tr>
                                            <td>Industry Description</td>
                                            <td>{{$forms->industry_des}}</td>
                                        </tr>
                                        <tr>
                                            <td>Company Type</td>
                                            <td>{{$forms->purpose}}</td>
                                        </tr>
                                        <tr>
                                            <td>Business Phone</td>
                                            <td>{{$forms->bussiness_phone}}</td>
                                        </tr>
                                        <tr>
                                            <td>Business Start Date</td>
                                            <td>{{$forms->bussines_startDate}}</td>
                                        </tr>
                                        <tr>
                                            <td><h5>Business Address
                                            </h5></td>
                                        </tr>
                                        <tr>
                                            <td>Street</td>
                                            <td>{{$forms->Street}}</td>
                                        </tr>
                                        <tr>
                                            <td>City</td>
                                            <td>{{$forms->city}}</td>
                                        </tr>
                                        <tr>
                                            <td>State</td>
                                            <td>{{$forms->state}}</td>
                                        </tr>
                                        <tr>
                                            <td>Postal Code</td>
                                            <td>{{$forms->postal}}</td>
                                        </tr>
                                        

                                        <tr>
                                            <td><h5>Primary Owner Information
                                            </h5></td>
                                        </tr>
                                        <tr>
                                            <td>Title</td>
                                            <td>{{$forms->title}}</td>
                                        </tr>
                                        <tr>
                                            <td>First Name</td>
                                            <td>{{$forms->firstname}}</td>
                                        </tr>

                                        <tr>
                                            <td>Last Name</td>
                                            <td>{{$forms->lastname}}</td>
                                        </tr>
                                        <tr>
                                            <td>Phone Number</td>
                                            <td>{{$forms->phone}}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>{{$forms->email}}</td>
                                        </tr>
                                        <tr>
                                            <td>Social Security Number</td>
                                            <td>{{$forms->ssn}}</td>
                                        </tr>
                                        <tr>
                                            <td>Date of Birth</td>
                                            <td>{{$forms->dob}}</td>
                                        </tr>
                                        <tr>
                                            <td>Percent Ownership</td>
                                            <td>{{$forms->ownership}}</td>
                                        </tr>

                                        <!-- <tr>
                                            <td>Business Owner Title</td>
                                            <td>{{$forms->owner_title}}</td>
                                        </tr> -->

                                        <tr>
                                            <td><h5>Address
                                            </h5></td>
                                        </tr>
                                        <tr>
                                            <td>Street</td>
                                            <td>{{$forms->Street2}}</td>
                                        </tr>
                                        <tr>
                                            <td>City</td>
                                            <td>{{$forms->city2}}</td>
                                        </tr>
                                        <tr>
                                            <td>State</td>
                                            <td>{{$forms->state2}}</td>
                                        </tr>
                                        <tr>
                                            <td>Postal Code</td>
                                            <td>{{$forms->postal2}}</td>
                                        </tr>
                                        

                                        <tr>
                                            <td><h5>Underwriting Information
                                            </h5></td>
                                        </tr>
                                        <tr>
                                            <td>Is Business Location Owned or Rented?</td>
                                            <td>{{$forms->location_ownership}}</td>
                                        </tr>
                                        <tr>
                                            <td>Gross Annual Sales</td>
                                            <td>{{$forms->gross_sales}}</td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Average Bank Balance</td>
                                            <td>{{$forms->avg_bank_balance}}</td>
                                        </tr>
										 
                                        <tr>
                                            <td>Requested Funding Amount</td>
                                            <td>
                                            {{$forms->requested_amount}}
                                             
                                         </td>
                                        </tr>
                                        <tr>
                                            <td>Requested Term Length in Month</td>
                                            <td>{{$forms->term_length}}</td>
                                        </tr> 
                                        @if(!empty($forms->extra_phone) && $forms->extra_phone !=0)
                                        <tr>
                                            <td>Best phone number to reach you at?</td>
                                            <td>{{$forms->extra_phone}}</td>
                                        </tr>
                                        @endif

                                       
                                    <?php   $fileNames = explode(',', $forms->bank_statement); 

                                    ?>
                                       
                                        @if(isset($fileNames[0]) && !empty($fileNames[0]))
                                        <tr>
                                            <td>Bank Statement 1</td>
                                            <td>

                            <a href="{{URL::to('/storage/app/uploads').'/'.$fileNames[0]}}" target="_blank" download>
                            <i style="font-size:24px" class="fa">&#xf019;</i></a>
                            </td>
                                        </tr>
                                @endif

                                @if(isset($fileNames[1]))
                                        <tr>
                                            <td>Bank Statement 2</td>
                                            <td>

                            <a href="{{URL::to('/storage/app/uploads').'/'.$fileNames[1]}}" target="_blank" download>
                            <i style="font-size:24px" class="fa">&#xf019;</i></a>
                            </td>
                                        </tr>
                                @endif

                                @if(isset($fileNames[2]))
                                        <tr>
                                            <td>Bank Statement 3</td>
                                            <td>

                            <a href="{{URL::to('/storage/app/uploads').'/'.$fileNames[2]}}" target="_blank" download>
                            <i style="font-size:24px" class="fa">&#xf019;</i></a>
                            </td>
                                        </tr>
                                @endif
                                        
                                        
                                    </tbody>
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Table wrapper-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    
                    
                    <!--end::Card-->
                </div>
                <!--end:::Tab pane-->
                
            </div>
            <!--end:::Tab content-->
        </div>
        <?php } ?>
        <!--end::Content-->
    </div>
    <!--end::Layout-->
    <!--begin::Modals-->
    <!--begin::Modal - Update user details-->
    @include('pages/apps/form-management/forms/modals/_update-details')
    <!--end::Modal - Update user details-->
    <!--begin::Modal - Add schedule-->
    @include('pages/apps/user-management/users/modals/_add-schedule')
    <!--end::Modal - Add schedule-->
    <!--begin::Modal - Add one time password-->
    @include('pages/apps/user-management/users/modals/_add-one-time-password')
    <!--end::Modal - Add one time password-->
    <!--begin::Modal - Update email-->
    @include('pages/apps/user-management/users/modals/_update-email')
    <!--end::Modal - Update email-->
    <!--begin::Modal - Update password-->
    @include('pages/apps/user-management/users/modals/_update-password')
    <!--end::Modal - Update password-->
    <!--begin::Modal - Update role-->
    @include('pages/apps/user-management/users/modals/_update-role')
    <!--end::Modal - Update role-->
    <!--begin::Modal - Add auth app-->
    @include('pages/apps/user-management/users/modals/_add-auth-app')
    <!--end::Modal - Add auth app-->
    <!--begin::Modal - Add task-->
    @include('pages/apps/user-management/users/modals/_add-task')
    <!--end::Modal - Add task-->
    <!--end::Modals-->
</x-default-layout>
