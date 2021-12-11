@section('mytitle', '| Dashboard')
    
@extends('layouts.app')

@section('content')

<div class="wrapper">

    @include('component.user-sidebar')

    <div class="dashboard-content">
        <div class="text">
            <div class="container-fluid">
                <div class="row">
                    <h1 class="mt-3 enrollment-title">Enrollment Review Page</h1>
                    <hr>
                    <div class="col-md-12">
                        {!! Form::open(["route" => "user.review-enrollment.post", 'method' => 'post', 'id' => 'review-form',  'enctype'=>"multipart/form-data"]) !!}
                        @include('items.dashboard-review-enrollment-form')
                        {!! Form::close() !!}
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