<x-default-layout>

    <!-- PAGE HEADER -->
    @section('title')
        MCA Reports
    @endsection
    <!-- END PAGE HEADER -->
    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <div class="card-body pt-2">
                    <!-- BOX CONTENT -->
                    <div class="box-content">
                        <!-- SET DATATABLE -->
                        <table id='allReportsTable' class='table' width='100%'>
                            <thead>
                                <tr>
                                    <th>{{ __('ID') }}</th>
                                    <th>{{ __('Created Date') }}</th>
                                    <th width="1%">{{ __('Source') }}</th>
                                    <th>{{ __('Company') }}</th>
                                    <th>{{ __('Owner') }}</th>
                                    <th width="2%">{{ __('Business Type') }}</th>
                                    <th width="1%">{{ __('Credit Score') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Manual Approval') }}</th>
                                    <th>{{ __('Original Status') }}</th>
                                    <th>{{ __('Approval Amount') }}</th>
                                    <th>{{ __('Approval Risk') }}</th>
                                    <th>{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                        </table> <!-- END SET DATATABLE -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <!-- Data Tables JS -->
    <script src="{{URL::asset('assets/admin/plugins/datatable/datatables.min.js')}}"></script>
    <script src="{{URL::asset('assets/admin/plugins/sweetalert/sweetalert2.all.min.js')}}"></script>
    <script type="text/javascript">
        $(function() {

            "use strict";

            var table = $('#allReportsTable').DataTable({
                "lengthMenu": [
                    [25, 50, 100, -1]
                    , [25, 50, 100, "All"]
                ]
                , responsive: true
                , colReorder: true
                , "order": []
                , language: {
                    "emptyTable": "<div><img id='no-results-img' src='{{ URL::asset('img/files/no-notification.png') }}'><br>{{ __('You have not created any MCA Report yet') }}</div>"
                    , search: "<i class='fa fa-search search-icon'></i>"
                    , lengthMenu: '_MENU_ '
                    , paginate: {
                        first: '<i class="fa fa-angle-double-left"></i>'
                        , last: '<i class="fa fa-angle-double-right"></i>'
                        , previous: '<i class="fa fa-angle-left"></i>'
                        , next: '<i class="fa fa-angle-right"></i>'
                    }
                }
                , pagingType: 'full_numbers'
                , processing: true
                , serverSide: true
                , ajax: "{{ route('mca.reports') }}"
                , columns: [{
                        data: 'id'
                        , name: 'id'
                        , orderable: true
                        , searchable: true
                    }
                    , {
                        data: 'created-on'
                        , name: 'created-on'
                        , orderable: true
                        , searchable: true
                    }
                    , {
                        data: 'source'
                        , name: 'source'
                        , orderable: true
                        , searchable: true
                    }
                    , {
                        data: 'company'
                        , name: 'company'
                        , orderable: true
                        , searchable: true
                    }
                    , {
                        data: 'owner'
                        , name: 'owner'
                        , orderable: true
                        , searchable: true
                    }
                    , {
                        data: 'business type'
                        , name: 'business type'
                        , orderable: true
                        , searchable: true
                    }
                    , {
                        data: 'credit score'
                        , name: 'credit score'
                        , orderable: true
                        , searchable: true
                    }
                    , {
                        data: 'status'
                        , name: 'status'
                        , orderable: true
                        , searchable: true
                    }
                    , {
                        data: 'manual approval'
                        , name: 'manual approval'
                        , orderable: true
                        , searchable: true
                    }
                    , {
                        data: 'original status'
                        , name: 'original status'
                        , orderable: true
                        , searchable: true
                    }
                    , {
                        data: 'approval amount'
                        , name: 'approval amount'
                        , orderable: true
                        , searchable: true
                    }
                    , {
                        data: 'approval risk'
                        , name: 'approval risk'
                        , orderable: true
                        , searchable: true
                    }
                    , {
                        data: 'actions'
                        , name: 'actions'
                        , orderable: false
                        , searchable: false
                    }
                , ]
            });

            intervalId = setInterval(checkStatusesAfterReload, 50000);
        });

        // DELETE CONFIRMATION
        $(document).on('click', '.deleteReportButton', function(e) {

            e.preventDefault();

            Swal.fire({
                title: '{{ __('Confirm Report Deletion ') }}'
                , text: '{{ __('It will permanently delete this Report ') }}'
                , icon: 'warning'
                , showCancelButton: true
                , confirmButtonText: '{{ __('Delete ') }}'
                , reverseButtons: true
            , }).then((result) => {
                if (result.isConfirmed) {
                    var formData = new FormData();
                    formData.append("id", $(this).attr('id'));
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                        , method: 'post'
                        , url: '/mca_reports/delete'
                        , data: formData
                        , processData: false
                        , contentType: false
                        , success: function(data) {
                            if (data == 'success') {
                                Swal.fire('{{ __('Report Deleted ') }}', '{{ __('Report has been successfully deleted ') }}', 'success');
                                $("#allReportsTable").DataTable().ajax.reload();
                            } else {
                                Swal.fire('{{ __('Delete Failed ') }}', '{{ __('There was an error while deleting this report ') }}', 'error');
                            }
                        }
                        , error: function(data) {
                            Swal.fire({
                                type: 'error'
                                , title: 'Oops...'
                                , text: '{{ __("Something went wrong") }}!'
                            })
                        }
                    })
                }
            })
        });
        // Handle manual approval button click
        $(document).on('click', '.manualApproval', function(e) {
            e.preventDefault();
            var reportId = $(this).attr('id');
            var currentText = $(this).text().trim();
            var text = currentText.includes('Approved') ? 'Declined' : 'Approved';

            Swal.fire({
                title: 'Confirm Manual ' + text
                , text: 'Are you sure you want to ' + text + ' this report manually?'
                , icon: 'warning'
                , showCancelButton: true
                , confirmButtonText: text
                , reverseButtons: true
            , }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add CSRF token to headers
                        }
                        , type: "POST"
                        , url: '/mca_reports/manual_approval'
                        , data: {
                            id: reportId
                            , action: text
                        }
                        , success: function(data) {
                            if (data.status == 200) {
                                Swal.fire('Report ' + data.message, '{{ __('') }}', 'Success');
                                $("#allReportsTable").DataTable().ajax.reload();
                            } else {
                                Swal.fire('{{ __('Approval Failed ') }}', '{{ __('There was an error while approving this report ') }}', 'error');
                            }
                        }
                        , error: function(data) {
                            Swal.fire('Oops...', 'Something went wrong!', 'error')
                        }
                    })
                }
            })
        });

        let intervalId;

        function checkStatusesAfterReload() {
            $('#allReportsTable').DataTable().ajax.reload(() => {
                let hasInProcess = false;

                $('#allReportsTable tbody tr').each(function() {
                    let statusText = $(this).find('td').eq(7).text().trim().toLowerCase();

                    if (statusText === 'in process') {
                        hasInProcess = true;
                        return false; // Break loop
                    }
                });

                if (hasInProcess) {
                    // console.log("At least one report still in process.");
                } else {
                    // console.log("All statuses completed. Stopping interval.");
                    clearInterval(intervalId);
                }
            }, false); // Don't reset paging
        }

        // Handle manual approval button click+

        $(document).on('click', '.sendReportButton', function(e) {
            e.preventDefault();
            const reportId = $(this).attr('id');
            // console.log(reportId);
            // Ask user for email address
            const email = prompt("Please enter the recipient's email:");

            if (email && validateEmail(email)) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add CSRF token to headers
                    }
                    , type: "POST"
                    , url: '/report/send/' + reportId
                    , data: {
                        email: email
                    , }
                    , success: function(response) {
                        Swal.fire(response.message, '', 'success');
                    }
                    , error: function(xhr) {
                        Swal.fire('Failed to send the report', '', 'error');
                    }
                });
            } else {
                Swal.fire('Please enter a valid email address.', '', 'error');
            }
        });

        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        // Handle regenerate report button click
        $(document).on('click', '.regenerateReportButton', function(e) {
            e.preventDefault();
            var report_id = $(this).attr('id');
            console.log(report_id);
            Swal.fire({
                title: '{{__('It will regenerate mca report.Do you wish to continue ?')}}'
                , icon: 'warning'
                , showCancelButton: true
                , confirmButtonText: '{{__('Yes')}}'
                , reverseButtons: true

            }).then(res => {
                if (res.isConfirmed) {
                    $.ajax({
                        url: "{{ route('mca.reports.regenerate') }}"
                        , type: "POST"
                        , data: {
                            _token: "{{ csrf_token() }}"
                            , report_id: report_id
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

    </script>
    @endpush
</x-default-layout>
