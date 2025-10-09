<x-default-layout>

    @section('title')
        Server info
    @endsection
<style>

tbody.fs-6.fw-semibold.text-gray-600 tr td:nth-child(1) {
    width: 35%;
}
</style>


<?php 

// print_r(json_decode($forms->server)); die; 
$data=json_decode($forms->server);
// print_r($data); die;

?>
   <?php //print_r($forms); die; ?>

    <!--begin::Layout-->
    <!-- <div class="d-flex flex-column flex-lg-row">
        <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
            <div class="card mb-5 mb-xl-8">
                <div class="card-body">
                    
                       
                    <div class="d-flex flex-stack fs-4 py-3">
                        <div class="fw-bold rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details" role="button" aria-expanded="false" aria-controls="kt_user_view_details"><div class="card-title">
                               
                            </div>
                           
                        </div>
                        
                    </div>
                    
                    <div class="separator"></div>
                  
                    <div id="kt_user_view_details" class="collapse show">
                        <div class="pb-5 fs-6">
                            <div class="fw-bold mt-5">PHP SELF</div>
                            <div class="text-gray-600">
                                <a href="#" class="text-gray-600 text-hover-primary">
                                @if(isset($data->PHP_SELF))
                                {{$data->PHP_SELF}}
                                @endif
                            </a>
                            </div>

                            <div class="fw-bold mt-5">SCRIPT NAME</div>
                            <div class="text-gray-600">
                            @if(isset($data->SCRIPT_NAME))
                                {{$data->SCRIPT_NAME}}
                                @endif
                            </div>
                           
                           
                            <div class="fw-bold mt-5">SCRIPT FILENAME</div>
                            <div class="text-gray-600">
                                <a href="#" class="text-gray-600 text-hover-primary">

                                @if(isset($data->SCRIPT_FILENAME))
                                {{$data->SCRIPT_FILENAME}}
                                @endif
                                </a>
                            </div>
                            <div class="fw-bold mt-5">REQUEST URI</div>
                            <div class="text-gray-600">
                                <a href="#" class="text-gray-600 text-hover-primary"> @if(isset($data->REQUEST_URI))
                                {{$data->REQUEST_URI}}
                                @endif
                                </a>
                            </div>
                            <div class="fw-bold mt-5">REQUEST METHOD</div>
                            <div class="text-gray-600">
                                <a href="#" class="text-gray-600 text-hover-primary">@if(isset($data->REQUEST_METHOD)) {{$data->REQUEST_METHOD}} @endif</a>
                            </div>
                            <div class="fw-bold mt-5">HTTP USER AGENT</div>
                            <div class="text-gray-600">@if(isset($data->HTTP_USER_AGENT)) {{$data->HTTP_USER_AGENT}} @endif</div>

                            <div class="fw-bold mt-5">SERVER NAME </div>
                            <div class="text-gray-600">@if(isset($data->SERVER_NAME)) {{$data->SERVER_NAME}} @endif</div>

                            <div class="fw-bold mt-5">SERVER ADDR</div>
                            <div class="text-gray-600">@if(isset($data->SERVER_ADDR)) {{$data->SERVER_ADDR}} @endif</div>

                            <div class="fw-bold mt-5">SERVER PORT</div>
                            <div class="text-gray-600">@if(isset($data->SERVER_PORT)) {{$data->SERVER_PORT}} @endif</div>

                            <div class="fw-bold mt-5">REMOTE ADDR</div>
                            <div class="text-gray-600">@if(isset($data->REMOTE_ADDR)) {{$data->REMOTE_ADDR}} @endif</div>

                            <div class="fw-bold mt-5">ORIG PATH TRANSLATED </div>
                            <div class="text-gray-600">@if(isset($data->ORIG_PATH_TRANSLATED)) {{$data->ORIG_PATH_TRANSLATED}} @endif </div>

                            <div class="fw-bold mt-5">HTTP ACCEPT LANGUAGE </div>
                            <div class="text-gray-600">@if(isset($data->HTTP_ACCEPT_LANGUAGE)) {{$data->HTTP_ACCEPT_LANGUAGE}} @endif </div>


                            <div class="fw-bold mt-5">HTTP ACCEPT </div>
                            <div class="text-gray-600">@if(isset($data->HTTP_ACCEPT)) {{$data->HTTP_ACCEPT}} @endif </div>

                            <div class="fw-bold mt-5">HTTP REFERER </div>
                            <div class="text-gray-600">@if(isset($data->HTTP_REFERER)) {{$data->HTTP_REFERER}} @endif </div>

                            <div class="fw-bold mt-5">UNIQUE ID </div>
                            <div class="text-gray-600">@if(isset($data->UNIQUE_ID)) {{$data->UNIQUE_ID}} @endif </div>

                            <div class="fw-bold mt-5">TZ</div>
                            <div class="text-gray-600">@if(isset($data->TZ)) {{$data->TZ}} @endif </div>
                           
                          
                            
                        
                            </div>
                    </div>
                </div>
            </div>
        </div>
      
    </div> -->
    <?php
echo '<pre>';
print_r($data);
echo '</pre>';
?>
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
