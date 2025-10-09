<x-default-layout>

<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" /> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet" />

    <!-- @section('title')
        General-Setting
    @endsection -->


        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-xxl">
        <!--begin::Layout-->
        <div><h1>Tracking Links</h1></div>
        <div class="d-flex flex-column flex-lg-row">
            <!--begin::Sidebar-->

    <form class="row g-3" action="{{route('update.tracking')}}" method="post" enctype="multipart/form-data">
        @csrf
       

  <div class="col-md-12">
    <label for="inputCity" class="form-label">Links</label>
    <input type="link" class="form-control" id="links" name="links" value="" required>
  </div>


  <div class="col-12 mb-15">
    <button type="submit" class="btn btn-primary">Update</button>
  </div>
</form>
           
        </div>
        <!--end::Layout-->
    </div>
    <!--end::Content container-->





    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>
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
