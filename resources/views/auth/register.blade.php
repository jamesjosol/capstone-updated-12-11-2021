@section('mytitle', '| Register')

@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3" id="card">
            <br>
            <div class="title">
                <img src="../img/headerlogo.png" alt="" class="headerlogo">
                <div class="regheader">
                    <h1>SALUS INSTITUTE OF TECHNOLOGY, INC.</h1>
                    <p>CABULIJAN, TUBIGON, BOHOL</p>
                </div>
            </div>
            <div class="card mb-5 ml-auto mr-auto" id="regcard">
                <div class="card-body">
                    <div class="col-md-12">
                        <h2 style="text-align:center;">
                            Student Registration form
                        </h2><br>
                        {!! Form::open(['url'=>'/register', 'method'=>'post']) !!}
                            
                            @include('items._reg-user-form')
                            
                            <button type="submit"  onclick="btnload()" class="btn btn-success regbtn" id="actionBtn">Register</button>
                            
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
