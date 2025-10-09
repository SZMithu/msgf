<x-default-layout>

    @section('title')
    Tracking Links
    @endsection
<style>
    input.form-control.form-control {
        max-width: 500px;
        margin-left: 15px;
}
input.btn.btn-primary {
    margin-left: 2px;
}

</style>
    

    <div class="card">
        <!--begin::Card header-->
        <div class="card border-0 pt-12">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <form class="row g-3" action="{{route('update.tracking')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="d-flex align-items-center position-relative my-1">
                @if(isset($link->links) && !empty($link->links)) 
                
                <input type="text" name="id" value="{{ $link->id}}" hidden>
                
                @endif
                    <input type="text" required class="form-control form-control" placeholder="Add link" name="links" value="@if(isset($link->links) && !empty($link->links)) {{ $link->links}}@endif">
                    <div class="">
                    <input type="submit" value="@if(isset($link->links) && !empty($link->links)) {{ 'Update'}} @else {{ 'Add'}} @endif " class="btn btn-primary" onclick="addlinks();">
                
                </div>


                </div>
                </form>


                <!-- <div class="d-flex align-items-center position-relative my-1">
                    {!! getIcon('magnifier', 'fs-3 position-absolute ms-5') !!}
                    <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search entries" id="mySearchInput"/>
                    <div class="">
                    <input type="button" value="Delete" class="btn btn-primary" onclick="deleteForm();">
                
                </div>


                </div> -->

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
                window.LaravelDataTables['links-table'].search(this.value).draw();
            });
            document.addEventListener('livewire:init', function () {
                Livewire.on('success', function () {
                    $('#kt_modal_add_user').modal('hide');
                    window.LaravelDataTables['links-table'].ajax.reload();
                });
            });
            $('#kt_modal_add_user').on('hidden.bs.modal', function () {
                Livewire.dispatch('new_user');
            });

 
        </script>
    @endpush

</x-default-layout>
