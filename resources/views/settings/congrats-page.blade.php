<x-default-layout>

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
    Congrats Page
    @endsection


      
<!-- PREQUALIFICATION FORM -->
    <!--begin::Content container-->
    <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Layout-->
        <!-- <div><h1>Congrats Pages</h1></div> -->
        <div class="d-flex flex-column flex-lg-row">
            <!--begin::Sidebar-->

    <form class="row g-3" action="{{route('update.congrats.setting')}}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" class="form-control" id="form" name="form" value="Congrats Pages">



  <div class="col-md-12">
    <label for="inputPassword4" class="form-label"><h5>Congrats Page Title</h5></label>
    <textarea type="text" class="form-control summernote" id="inputEmail4" name="congrats_title">{!!$form->congrats_title!!}</textarea>
  </div>

  <div class="col-md-12">
    <label for="inputPassword4" class="form-label"><h5>Thankyou Page Title</h5></label>
    <textarea type="text" class="form-control summernote" id="inputEmail4" name="thanks_title">{!!$form->thanks_title!!}</textarea>
  </div>

  <div class="col-md-12">
    <label for="inputEmail4" class="form-label"><h5>Email Text </h5>(Available keywords: {NAME} , {APPLICATION_LINK})</label>
    <textarea type="text" class="form-control summernote" id="email_text" name="email_text">{!!$form->email_text!!}</textarea>
  </div>

  <div class="col-md-12">
    <label for="inputEmail4" class="form-label"><h5>Thankyou Page Text</h5></label>
    <textarea type="text" class="form-control summernote"  id="thanks_text" name="thanks_text">{!!$form->thanks_text!!}</textarea>
  </div>

  <div class="col-md-12">
    <label for="inputEmail4" class="form-label"><h5>Thank you page for the bad leads</h5></label>
    <textarea type="text" class="form-control summernote"  id="thanks_bad" name="thanks_bad">{!!$form->thanks_bad!!}</textarea>
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
