// Initialize KTMenu
KTMenu.init();

 // DELETE CONFIRMATION
        $(document).on('click', '.deleteEmailButton', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Confirm Email Deletion',
                text: 'It will permanently delete this Email',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete',
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    var formData = new FormData();
                    formData.append("id", $(this).attr('id'));
                    $.ajax({
                        headers: { 'X-CSRF-TOKEN': window.csrfToken },
                        method: 'post',
                        url: '/mca_reports/scanned_emails/delete',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            if (data.status == 'success') {
                                Swal.fire('Email Deleted', 'Email has been successfully deleted', 'success');
                                LaravelDataTables['mca-scanned-emails-table'].ajax.reload();
                            } else {
                                Swal.fire('Delete Failed', 'There was an error while deleting this email', 'error');
                            }
                        },
                        error: function(data) {
                            Swal.fire({ type: 'error', title: 'Oops...', text: 'Something went wrong' })
                        }
                    })
                }
            })
        });

        // RESCAN EMAIL HANDLE
        $(document).on('click', '.reScanEmailButton', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Confirm Re Scan Email',
                text: 'It will delete this Report',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Re-scan',
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    var formData = new FormData();
                    formData.append("id", $(this).attr('id'));
                    $.ajax({
                        headers: { 'X-CSRF-TOKEN': window.csrfToken },
                        method: 'post',
                        url: '/mca_reports/scanned_emails/re-scan',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function (data) {
                            if (data.status == 'success') {
                                Swal.fire('Email Re-scanned', 'Email has been successfully re-scanned', 'success');
                                 LaravelDataTables['mca-scanned-emails-table'].ajax.reload();
                            } else {
                                Swal.fire('Email Scan Failed', 'There was an error while re scanning this email', 'error');
                            }
                        },
                        error: function(data) {
                        }
                    })
                }
            })
        });
