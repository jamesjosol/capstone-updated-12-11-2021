@section('mytitle', '| Dashboard')

@extends('layouts.app')

<img src="{{asset('img/dashbg.png')}}" alt="" id="dashboardBG">

@section('content')
<div class="container">

    @include('component.user-sidebar')

    <div class="dashboard-content">
        <div class="text">
            
            <div class="container-fluid">
                <div class="row">
                    <hr>
                    <div class="col-md-12">

                        @include('items.dashboard-status-pending-form')

                    </div>
                </div>
            </div> 
        </div>
    </div>

    <script>
        let btn = document.querySelector("#btn-menu");
        let sidebar = document.querySelector(".sidebar");
        let searchBtn = document.querySelector(".bx-search");

        btn.onclick = function(){
            sidebar.classList.toggle("active");
        }
        searchBtn.onclick = function(){
            sidebar.classList.toggle("active");
        }

        jQuery(document).ready(function($) {
        $('#example').DataTable();
        $(document).on('click', '#example tbody tr button', function() {       
            $("#modaldata tbody tr").html("");
            $("#modaldata tbody tr").html($(this).closest("tr").html());
            $("#exampleModal").modal("show");
        });
        } );        
    </script>
</div>
@endsection
