@section('mytitle', '| Dashboard')
    
@extends('layouts.app')

@section('content')

<div class="wrapper">
	<img src="{{asset('img/dashboard-bg.png')}}" alt="" class="bg">

    @include('component.user-sidebar')

    <div class="dashboard-content">
        <div class="text">
            <div class="container-fluid">
                <div class="row">
                <hr>
                    <div class="col-md-12">

                        @include('items.dashboard-status-approved-form')

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
        
    </script>

</div>
@endsection