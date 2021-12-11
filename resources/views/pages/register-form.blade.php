@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3" id="card">
            <br>
            <div class="title">
                <img src="{{asset('img/headerlogo.png')}}" alt="" class="headerlogo">
                <div class="regheader">
                    <h1>SALUS INSTITUTE OF TECHNOLOGY, INC.</h1>
                    <p>CABULIJAN, TUBIGON, BOHOL</p>
                </div>
            </div>
            <div class="card mb-5 ml-auto mr-auto" id="regcard">
                <div class="card-body">
                    <div class="col-md-12">
                        <h2 style="text-align:center;">
                            User Registration form
                        </h2><br>
                        {!! Form::open(['url'=>'/register', 'method'=>'post']) !!}
                            <div class="mb-4">
                                <label for="email" class="form-label">Users Name</label>
                                <div class="row">
                                    <div class="col form-group @error('firstName') has-error @enderror">
                                        {!! Form::text('firstName', null, ['class'=>($errors->has('firstName') ? 'form-control is-invalid' : 'form-control'), 'placeholder'=>'First name']) !!}
                                    </div>
                                    <div class="col form-group @error('lastName') has-error @enderror">
                                        {!! Form::text('lastName', null, ['class'=>($errors->has('lastName') ? 'form-control is-invalid' : 'form-control'), 'placeholder'=>'Last name']) !!}
                                    </div>
                                    <div class="col form-group @error('middleName') has-error @enderror">
                                        {!! Form::text('middleName', null, ['class'=>($errors->has('middleName') ? 'form-control is-invalid' : 'form-control'), 'placeholder'=>'Middle name']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 form-group @error('username') has-error @enderror">
                                {!! Form::label('username','Username',[],false) !!}
                                {!! Form::text('username', null, ['class'=>($errors->has('username') ? 'form-control is-invalid' : 'form-control'), 'id'=>'username']) !!}
                                <span class="errspan" id="errspan">{{ $errors->first('username') }}</span>
                            </div>
                            <div class="mb-3 form-group @error('email') has-error @enderror">
                                {!! Form::label('email','Email',[],false) !!}
                                {!! Form::text('email', null, ['class'=>'form-control', 'id'=>'email']) !!}
                                <span class="errspan" id="errspan">{{ $errors->first('email') }}</span>
                            </div>
                            <div class="mb-3 form-group @error('password') has-error @enderror">
                                {!! Form::label('password', 'Password',[],false) !!}
                                {!! Form::password('password', ['class'=>'form-control']) !!}
                                <span class="errspan" id="errspan">{{ $errors->first('password') }}</span>
                            </div>
                            <div class="mb-3 form-group @error('password_confirmation') has-error @enderror">
                                {!! Form::label('password_confirmation', 'Confirm Password',[],false) !!}
                                {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
                                <span class="errspan" id="errspan">{{ $errors->first('password_confirmation') }}</span>
                                
                            </div>
                            <div class="mb-3 form-group">
                                {!! Form::label('contactNo', 'Mobile Number',[],false) !!}
                                {!! Form::number('contactNo', null, ['class'=>'form-control', 'placeholder'=>'example: 09123....']) !!}
                                <span class="errspan" id="errspan">{{ $errors->first('contactNo') }}</span>
                            </div>
                        
                            <button type="submit"  onclick="btnload()" class="btn btn-success regbtn" id="actionBtn">Register</button>
                            
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
