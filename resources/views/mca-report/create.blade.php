<x-default-layout>

    @section('title')
        New Reports
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('mca.reports.new') }}
    @endsection
    @if (Session::has('error'))
    @push('scripts')
    <script>
        Swal.fire('Failed to upload files to OpenAI. Please check your API key and try again.', '', 'error');
    </script>
    @endpush
    @endif
    <div class="row">
        <div class="col-lg-8 col-md-12 col-xm-12" id="mainContainer">
            <div class="card overflow-hidden">
                <div class="card-header">
                    <h3 class="card-title">{{ __('Upload Files For MCA Report') }}</h3>
                </div>
                <div class="card-body text-center col-12 col-md-8 mx-auto">
                    <p class='text-warning'>Note: Upload pdf file</p>
                    <form action="{{route('mca.reports.save')}}" method="POST" enctype="multipart/form-data" id="createForm">
                        @csrf
                        <div class="col-sm-12">
                            <div class="select-file mb-4">
                                <input type="file" class="form-control" name="uploaded_files[]" multiple accept=".zip,.pdf">
                                <input type="hidden" name="Id" value="">
                                @if ($errors->has('uploaded_files'))
                                <p class="error text-danger mx-auto mb-0">{{ $errors->first('uploaded_files') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="input-box">
                                <h6 class="fs-11 mb-2 font-weight-semibold">{{ __('Add Prompt') }} <span class="text-muted">({{ __('Optional') }})</span><span class="float-right fs-4">Character <small class="charCount">0</small></span></h6>
                                <div class="form-group">
                                    <textarea rows="10" cols="10" type="text" class="form-control message" id="prompt" name="prompt" placeholder="{{ __('Additional prompts boost accuracy.') }}" maxlength="255"></textarea>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary mt-2 mx-auto">
                            Upload
                        </button>
                    </form>
                </div>
            </div>


        </div>
    </div>
    <div class="loading-overlay justify-content-center" id="loadingOverlay" style="display: none;">
        <div class="loading-content text-center my-auto">
            <object data='{{ URL::asset("assets/img/svgs/code.svg") }}' type="image/svg+xml" style="width:100px;"></object>
            <h4 class="text-dark fw-bold px-5">{{ __('Uploading file and creating assistant message to anlyze the file. This process may take up to a minute.') }}</h4>
        </div>
    </div>

    @push('scripts')
    <script src="{{URL::asset('assets/admin/plugins/sweetalert/sweetalert2.all.min.js')}}"></script>
    <script>
        $('#createForm').on('submit', function(e) {

            $("body").css({
                'position': 'relative'
            , });
            $("#loadingOverlay").css({
                'display': 'flex'
                , 'position': 'absolute'
                , 'width': '100vw'
                , 'height': '100vh'
                , 'justify-content': 'center'
                , 'align-items': 'center'
                , 'top': '0'
                , 'left': '0'
                , 'background-color': '#FFFFFF'
                , 'color': '#000000'
                , 'opacity': '1'
            , });
        })
        document.addEventListener('DOMContentLoaded', (event) => {
            const inputFields = document.getElementsByClassName('message');
            const charCounts = document.getElementsByClassName('charCount');
            const msgCounts = document.getElementsByClassName('msgCount');

            for (let i = 0; i < inputFields.length; i++) {
                const inputField = inputFields[i];
                const charCount = charCounts[i];

                inputField.addEventListener('input', () => {
                    const count = inputField.value.length;
                    charCount.textContent = `${count}`;
                });
            }
        });

    </script>
    @endpush
</x-default-layout>
