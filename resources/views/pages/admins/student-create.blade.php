@section('mytitle', '| Pesonal Info Form')

@extends('layouts.app')

@section('content')
@if(session('errors'))
        <div class="alert alert-warning mt-5" role="alert">
            <div class="container">
                Please input the following fields:
                <ul>
                    @foreach(session('errors')->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
<div class="container">

    @include('component.sidebar')

    <div class="dashboard-content">
        <div class="text">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="row">
                            <div class="col-md-10 offset-md-1 mt-4">
                                <h1 class="mb-5">Personal Information</h1>
                                {!! Form::open(["route" => "admin.students.create", 'method' => 'post', 'id' => 'personalinfo-form', 'enctype'=>"multipart/form-data"]) !!}
                                @include('items.user-personal-info-form')
                                {!! Form::close() !!}
                            </div>
                        </div>
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


        $(function(){
            $("#fileupload").change(function(event) {
                var x = URL.createObjectURL(event.target.files[0]);
                $("#upload-img").attr("src",x);
                console.log(event);
            });
        }) 
    </script>
    <script>
        @if(count($errors) > 0) 
            console.log($errors)
        @endif
    </script>
</div>
@endsection