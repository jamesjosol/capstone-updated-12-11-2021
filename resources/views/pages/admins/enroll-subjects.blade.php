@section('mytitle', '| Enrollment Form')
    
@extends('layouts.app')

@section('content')

<div class="wrapper">
	
    @include('component.sidebar')

    <div class="dashboard-content">
        <div class="text">
            <div class="container-fluid">
                <div class="row">
                <h1 class="mt-3 enrollment-title">Enrollment Page</h1>
                <p class="enrollment-desc">New Enrollment</p>
                <hr>
                    <div class="col-md-12">
                        @include('items.enroll-subjects-form')

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

        $(".selectpicker").select2({
            multiple:true
        });
    </script>

</div>
@endsection