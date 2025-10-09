<x-default-layout>

    @section('title')
        Report View
    @endsection
    @section('breadcrumbs')
        {{ Breadcrumbs::render('mca.reports.show', $report) }}
    @endsection


	<div id="mainContainer">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-xm-12">
                <div class="card overflow-hidden">
                    <div class="card-header row">
                        <div class="col-lg-4 col-md-4 col-12">
                            <h3 class="card-title">{{ __('Report') }} ID: <span class="text-info">{{ $report->id }}</span></h3>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12">
                            <h6 class="font-weight-bold mb-1"><strong>{{ __('Created On') }}: </strong></h6>
                            <span class="s-14 font-italic text-muted">{{ date_format($report->created_at, 'd M Y H:i:s') }}</span>
                        </div>
                        <div class="col-lg-4 col-md-4 col-12">
                            <a href="" id="regenerateReport" class="btn btn-primary float-right">{{ __('Regenerate Report') }}</a>
                        </div>
                    </div>
                    <div class="card-body pt-5">
                        <div class="col-12 mt-2" id="reportForPdf">
                            {!!$report->report->response!!}
                        </div>

                        <!-- SAVE CHANGES ACTION BUTTON -->
                        <div class="border-0 mb-2 mt-8">
                            <a href="{{ route('report.download', $report->id) }}" class="btn btn-primary">{{ __('Download Report') }}</a>
                            <a href="{{ route('mca.reports') }}" class="btn btn-primary float-right">{{ __('Return') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<div class="loading-overlay justify-content-center" id="loadingOverlay" style="display: none;">
            <div class="loading-content text-center my-auto">
                <object data='{{ URL::asset("assets/img/svgs/code.svg") }}' type="image/svg+xml" style="width:100px;"></object>
                <h4 class="text-dark fw-bold px-5">{{ __('Regenerating MCA report. This process may take up to a minute.') }}</h4>
            </div>
       </div>
	</div>


@push('scripts')
<script src="{{URL::asset('assets/admin/plugins/sweetalert/sweetalert2.all.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $('#regenerateReport').on('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: '{{__('It will regenerate mca report. Do you wish to continue ?')}}'
                , icon: 'warning'
                , showCancelButton: true
                , confirmButtonText: '{{__('Yes ')}}'
                , reverseButtons: true

            }).then(res => {
                if (res.isConfirmed) {
                    $.ajax({
                        url: "{{ route('mca.reports.regenerate') }}"
                        , type: "POST"
                        , data: {
                            _token: "{{ csrf_token() }}"
                            , report_id: "{{ $report->id }}"
                        }
                        , beforeSend: function() {
                            $("#mainContainer").css({
                                'height': '950px'
                                , 'position': 'relative'
                                , 'overflow': 'hidden'
                            });
                            $("#loadingOverlay").css({
                                'display': 'flex'
                                , 'position': 'absolute'
                                , 'width': '100%'
                                , 'height': '950px'
                                , 'justify-content': 'center'
                                , 'align-items': 'center'
                                , 'top': '0'
                                , 'left': '0'
                                , 'background-color': '#FFFFFF'
                                , 'color': '#000000'
                                , 'opacity': '1'
                            , });
                        }
                    , }).done(function(data) {
                        if (data.status == 200) {
                            Swal.fire({
                                icon: "success"
                                , title: "Success!"
                                , text: data.message
                            , });
                            setTimeout(function() {
                                location.href = "{{ route('mca.reports') }}";
                            }, 2000);
                        } else {
                            Swal.fire({
                                icon: "error"
                                , title: "Error!"
                                , text: data.message
                            , });
                        }
                    }).fail(function(jqXHR, textStatus, errorThrown) {
                        Swal.fire({
                            icon: "error"
                            , title: "Error!"
                            , text: jqXHR.responseJSON.message
                        , });
                    });
                }
            })
        })
    })

</script>
@endpush
</x-default-layout>
