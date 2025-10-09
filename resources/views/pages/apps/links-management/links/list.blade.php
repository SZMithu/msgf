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

input.form-control.filter {
    max-width: 149px;
}


.card-title {
    display: flex;
    justify-content: space-between;
}


/* Dropdown Button */
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

/* Dropdown Container */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content */
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

/* Dropdown Items */
.dropdown-content label {
    padding: 12px 16px;
    display: block;
    width: max-content;

}

/* Show the dropdown menu */
.dropdown:hover .dropdown-content {
    display: block;
}

/* Change the background color of dropdown items on hover */
.dropdown-content label:hover {
    background-color: #f1f1f1;
}
.form-control.links-btn {
    width: max-content;
    margin-right: 10px;
    margin-left: 10px;
}
select#links1 {
    margin-right: 5px;
}
form.row.g-3 {
    margin-right: 5px;
}
</style>

   
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card border-0 pt-12">
                    <div class="card-title">
                            <form class="row g-3" action="{{route('setting.tracking.links')}}" method="get" enctype="multipart/form-data">
                            <div class="d-flex align-items-center position-relative my-1">
                            <input type="date" class="form-control filter"  name="from" value="@if(isset($_GET['from']) && !empty($_GET['from'])){{$_GET['from']}}@endif">
                            <input type="date" class="form-control filter"  name="to" value="@if(isset($_GET['to']) && !empty($_GET['to'])){{$_GET['to']}}@endif">

                            <div class="dropdown">
                    <div class="form-control links-btn">Select Links</div>
                    <div class="dropdown-content">
                        @foreach($links as $linkData)
                        <label><input type="checkbox" class="my-checkbox" name="link[]" value="{{$linkData->id}}"> {{$linkData->links}}</label>
                        @endforeach
                        
                    </div>
                </div>
                <select class="form-control filter" id="links1" name="status" placeholder="test" >

                    <option value="">Select Status</option>
                    <option value="Bad Lead" @if(isset($_GET['status']) && $_GET['status']=='Bad Lead'){{'selected'}}@endif>Bad Lead</option>
                    <option value="Good Lead" @if(isset($_GET['status']) && $_GET['status']=='Good Lead'){{'selected'}}@endif>Good Lead</option>
                    <option value="Premium Lead" @if(isset($_GET['status']) && $_GET['status']=='Premium Lead'){{'selected'}}@endif>Premium Lead</option>
                    <option value="Potential Lead" @if(isset($_GET['status']) && $_GET['status']=='Potential Lead'){{'selected'}}@endif>Potential Lead</option>
                </select>

     
                <input type="submit" value="Filter" class="btn btn-primary" >
                </form>
                <a href="{{Route('setting.tracking.links')}}"><input type="button" value="Clear" class="btn btn-primary"></a>

                </div>
            <div class="card-title">
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

            </div>


                <!--Search-->

           

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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.style.display === 'block') {
                    openDropdown.style.display = 'none';
                }
            }
        }
    }
    // var linksVal = [6, 11, 13, 14]; 
    var linksVal = <?php if(isset($_GET['link'])){ print_r(json_encode($_GET['link'])); }else{ echo 0; } ?>; 

        $.each(linksVal, function(index, value) {
        $('input.my-checkbox[value="' + value + '"]').prop('checked', true);
    });

</script>

</x-default-layout>
