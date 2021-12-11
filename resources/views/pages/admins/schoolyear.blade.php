@section('mytitle', '| School Year')
    
@extends('layouts.app')

@section('content')

<div class="wrapper">
	
    @include('component.sidebar')
    @include('component.info_msg')
    <div class="dashboard-content">
        <div class="text">
            <div class="container-fluid">
                <div class="row p-3">
                    <h1 class="fw-light" id="dashusers"><i class="fad fa-calendar-alt"></i> School Year</h1>
                    <div class="col-md-4">

                        @include('items.schoolYrForm')

                    </div>
                    <div class="col-md-8 mt-5 p-5 card-table">

                        @include('items.schoolYrTable')

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('items.edit-schoolyear')
    @include('items.delete-schoolyear')

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
        $('#example').DataTable({
            responsive: true
        });
        $(document).on('click', '#example tbody tr button', function() {       
            $("#modaldata tbody tr").html("");
            $("#modaldata tbody tr").html($(this).closest("tr").html());
            $("#exampleModal").modal("show");
        });
        } );     
    </script>

</div>
@endsection