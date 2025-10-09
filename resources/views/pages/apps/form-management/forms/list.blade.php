<x-default-layout>

    @section('title')
        Form Entries
    @endsection

    

    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    {!! getIcon('magnifier', 'fs-3 position-absolute ms-5') !!}
                    <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search entries" id="mySearchInput"/>
                    <div class="">
                    <input type="button" value="Delete" class="btn btn-primary" onclick="deleteForm();">
                
                </div>


                </div>

                <!--end::Search-->
            </div>
            <!--begin::Card title-->

            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
               
                <!--end::Toolbar-->

                <!--begin::Modal-->
                <livewire:user.add-user-modal></livewire:user.add-user-modal>
                <!--end::Modal-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body py-4">
            <!--begin::Table-->
            <div class="table-responsive">
                {{ $dataTable->table() }}
            </div>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>


    

    @push('scripts')
        {{ $dataTable->scripts() }}
        <script>
            document.getElementById('mySearchInput').addEventListener('keyup', function () {
                window.LaravelDataTables['form-table'].search(this.value).draw();
            });
            document.addEventListener('livewire:init', function () {
                Livewire.on('success', function () {
                    $('#kt_modal_add_user').modal('hide');
                    window.LaravelDataTables['form-table'].ajax.reload();
                });
            });
            $('#kt_modal_add_user').on('hidden.bs.modal', function () {
                Livewire.dispatch('new_user');
            });


            function deleteForm(){

                var ids = [];
                $('input[name="form_ids[]"]:checked').each(function() {
                    ids.push($(this).val());
                });

                if (ids.length > 0) {
            if (confirm('Are you sure you want to delete the selected items?')) {
                $.ajax({
                    url: '{{ route("forms.deleteSelected") }}',
                    method: 'DELETE',
                    data: {
                        ids: ids,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // Reload the DataTable
                        $('#form-table').DataTable().ajax.reload();
                    }
                });
            }
        } else {
            alert('Please select at least one item to delete.');
        }
            }
        </script>
    @endpush

</x-default-layout>
