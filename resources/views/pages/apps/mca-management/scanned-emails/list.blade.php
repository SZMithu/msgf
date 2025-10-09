<x-default-layout>

    @section('title')
        MCA Scanned Emails
    @endsection

    @section('breadcrumbs')
        {{ Breadcrumbs::render('mca.reports.scanned.emails') }}
    @endsection

    <div class="card">
        <!-- Card Header -->
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <!-- Search Input -->
                <div class="d-flex align-items-center position-relative my-1">
                    {!! getIcon('magnifier', 'fs-3 position-absolute ms-5') !!}
                    <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-13" placeholder="Search reports" id="emailSearchInput"/>

                </div>
            </div>
             <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <!--begin::Add user-->
                    <a type="button" class="btn btn-primary" href="{{ route('mca.scan.email') }}">
                        {!! getIcon('plus', 'fs-2', '', 'i') !!}
                        Scan Now
                    </a>
                    <!--end::Add user-->
                </div>
                <!--end::Toolbar-->
            </div>
        </div>

        <!-- Card Body -->
        <div class="card-body py-4">
            <div class="table-responsive">
                {{ $dataTable->table(['class' => 'table align-middle table-row-dashed fs-6 gy-5', 'id' => 'mca-scanned-emails-table']) }}
            </div>
        </div>
    </div>

    @push('scripts')
        {{ $dataTable->scripts() }}
        <script>
            // Custom Search
            document.getElementById('emailSearchInput').addEventListener('keyup', function () {
                window.LaravelDataTables['mca-scanned-emails-table'].search(this.value).draw();
            });

            // Livewire event listener
            document.addEventListener('livewire:init', function () {
                Livewire.on('success', function () {
                    window.LaravelDataTables['mca-scanned-emails-table'].ajax.reload();
                });
            });

        </script>
    @endpush

</x-default-layout>
