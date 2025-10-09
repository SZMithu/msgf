<x-default-layout>

<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" /> -->
     <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"> -->

    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script> -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
    <style>
      .note-toolbar.card-header {
        padding-right: 450px !important;
        }
    </style>

    @section('title')
        General-Setting
    @endsection


        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Layout-->
        <div><h1>General Setting</h1></div>
        <div class="d-flex flex-column flex-lg-row">
            <!--begin::Sidebar-->

    <form class="row g-3" action="{{route('update.setting')}}" method="post" enctype="multipart/form-data">
        @csrf
       
 
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Phone</label>
    <input type="text" class="form-control" id="mobile" name="phone" value="{{$form->phone}}">
    <input type="hidden" class="form-control" id="form1" name="form" value="form1">
  </div>

  <div class="col-md-6">
    <label for="inputCity" class="form-label">Form Notification Email</label>
    <input type="email" class="form-control" id="email" name="email" value="{{$form->email}}">
  </div>

  <div class="col-md-6">
    <label for="inputCity" class="form-label">Form Notificatios CC Emails </label>
    <textarea type="text" class="form-control" id="cc_email" name="cc_email" placeholder="Please enter CC Email">{{$form->cc_email}}</textarea>
  </div>

  <div class="col-md-6">
    <label for="inputCity" class="form-label">Logo</label>
    <input type="file" class="form-control" accept="/image" id="logo" name="logo">
    <img alt="Logo" src="{{url('storage/app/logo/')}}{{'/'.$form->logo}}" class="h-100px w-200px app-sidebar-logo-default mt-4">  
</div>
<div class="col-md-6">
    <input type="checkbox" id="authorize" name="authorised" value="1" @if($form->authorised == 1) checked @endif >
    <label for="authorize" class="form-label">Enable phone</label><br>
    <input type="checkbox"  id="phoneterms" name="phone_terms" value="1" @if($form->phone_terms == 1) checked @endif >
    <label for="phoneterms"  class="form-label">Phone terms</label><br> 
    <input type="checkbox"  id="enableterms" name="enableterms" value="1" @if($form->enableterms == 1) checked @endif >
    <label for="enableterms"  class="form-label">Enable terms</label>

  </div>

  
 

  <div class="col-12 mb-15">
    <button type="submit" class="btn btn-primary">Update</button>
  </div>
</form>
           
        </div>
        <!--end::Layout-->
    </div>
    <!--end::Content container-->
<!-- PREQUALIFICATION FORM -->
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Layout-->
        <div><h1>Website Pages</h1></div>
        <div class="d-flex flex-column flex-lg-row">
            <!--begin::Sidebar-->

    <form class="row g-3" action="{{route('update.setting')}}" method="post" enctype="multipart/form-data" class="form-data">
        @csrf
        <input type="hidden" class="form-control" id="form" name="form" value="form2">

  <div class="col-md-12">
    <label for="inputEmail41" class="form-label">Form 1 Text</label>
    <textarea type="text" class="form-control summernote" id="inputEmail41" name="form1">{!!$form->form_1!!}</textarea>
  </div>

  <div class="col-md-12">
    <label for="inputEmail42" class="form-label">Form 2 Text</label>
    <textarea type="text" class="form-control summernote" id="inputEmail42" name="form2">{!!$form->form_2!!}</textarea>
  </div>

  <div class="col-md-12">
    <label for="inputEmail43" class="form-label">Terms & Conditions</label>
    <textarea type="text" class="form-control summernote" id="inputEmail43" name="terms">{!!$form->terms!!}</textarea>
  </div>

  <div class="col-md-12">
    <label for="inputEmail44" class="form-label">Privacy Policy</label>
    <textarea type="text" class="form-control summernote"  id="inputEmail44" name="policy">{!!$form->policy!!}</textarea>
  </div>
  <div class="col-12 mb-3">
    <button type="submit" class="btn btn-primary">Update</button>
  </div>

  <!-- <div class="summernote"></div> -->
</form>
           
        </div>
        <!--end::Layout-->
    </div>
    <!--end::Content container-->




    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script> -->
<script>
$('.summernote').summernote({
            placeholder: '',
            // value: templateData,
            tabsize: 2,
            height: 100,
            toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
        });

        
</script>
    

</x-default-layout>
