
@section('mytitle', '| Dashboard')

@extends('layouts.app')

<img src="{{asset('img/dashbg.png')}}" alt="" id="dashboardBG">

@section('content')
<div class="container">

    @include('component.user-sidebar')

    <div class="dashboard-content">
        <div class="text">
            
            <div class="container-fluid" id="usersdashboard">
                    
                <h1 class="mb-4" style="color:green; margin-top:5rem;">Dashboard | 1st Sem AY 2021-2022</h1>
                <hr>

                @include('items.users-dashboard-personalinfo')

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

