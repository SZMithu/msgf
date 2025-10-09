// Initialize KTMenu
KTMenu.init();

// Add click event listener to delete buttons
document.querySelectorAll('[data-kt-action="delete_row"]').forEach(function (element) {
    element.addEventListener('click', function () {
        Swal.fire({
            text: 'Are you sure you want to remove?',
            icon: 'warning',
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            customClass: {
                confirmButton: 'btn btn-danger',
                cancelButton: 'btn btn-secondary',
            }
        }).then((result) => {
            if (result.isConfirmed) {
                   var formData = new FormData();
                    formData.append("id", this.getAttribute('data-kt-file-id'));
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': window.csrfToken,
                        }
                        , method: 'post'
                        , url: '/mca_reports/delete'
                        , data: formData
                        , processData: false
                        , contentType: false
                        , success: function(data) {
                            if (data == 'success') {
                                Swal.fire('Report Deleted ', 'Report has been successfully deleted ', 'success');
                                LaravelDataTables['mca-reports-table'].ajax.reload();
                            } else {
                                Swal.fire('Delete Failed ', 'There was an error while deleting this report ', 'error');
                            }
                        }
                        , error: function(data) {
                            Swal.fire({
                                type: 'error'
                                , title: 'Oops...'
                                , text: "Something went wrong"
                            })
                        },
                    })
            }
        });
    });
});

// Listen for 'success' event emitted by Livewire
Livewire.on('success', (message) => {
    // Reload the users-table datatable
    LaravelDataTables['mca-reports-table'].ajax.reload();
});

 // Handle regenerate report button click
$(document).on('click', '.regenerateReportButton', function(e) {
    e.preventDefault();
    var report_id = $(this).attr('id');
    console.log(report_id);
    Swal.fire({
        title: "It will regenerate mca report.Do you wish to continue ?"
        , icon: 'warning'
        , showCancelButton: true
        , confirmButtonText: "Yes"
        , reverseButtons: true

    }).then(res => {
        if (res.isConfirmed) {
            $.ajax({
                url: window.mcaRegenerateUrl,
                type: 'POST',
                data: {
                    _token: window.csrfToken,   // See below
                    report_id: report_id
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
                        LaravelDataTables['mca-reports-table'].ajax.reload();
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

 // Handle report send button click+
 $(document).on('click', '.sendReportButton', function(e) {
            e.preventDefault();
            const reportId = $(this).attr('id');
            // console.log(reportId);
            // Ask user for email address
            const email = prompt("Please enter the recipient's email:");

            if (email && validateEmail(email)) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': window.csrfToken,
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

// Handle manual approval button click
$(document).on('click', '.manualApproval', function(e) {
    e.preventDefault();
    var reportId = $(this).attr('id');
    var currentText = $(this).text().trim();
    var text = currentText.includes('Approved') ? 'Declined' : 'Approved';

    Swal.fire({
        title: 'Confirm Manual ' + text,
        text: 'Are you sure you want to '+ text +' this report manually?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: text,
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': window.csrfToken, // Add CSRF token to headers
                }
                , type: "POST"
                , url: '/mca_reports/manual_approval'
                , data: {
                    id: reportId,
                    action: text
                },
                success: function (data) {
                    if (data.status == 200) {
                        Swal.fire('Report '+ data.message, '', 'success');
                        LaravelDataTables['mca-reports-table'].ajax.reload();
                    } else {
                        Swal.fire('Approval Failed', 'There was an error while approving this report', 'error');
                    }
                },
                error: function(data) {
                    Swal.fire('Oops...','Something went wrong!', 'error')
                }
            })
        }
    })
});
