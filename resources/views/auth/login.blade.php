@section('mytitle', '| Login')

@extends('layouts.app')

@section('content')

@include('component.info_msg')

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <br>
            <div class="card" style="margin-left:auto; margin-right:auto;" id="card">
                <div class="card-header">
                    <img src="../img/headerlogo.png" alt="" class="headerlogo">
                    <div class="header">
                        <h1>SALUS INSTITUTE OF TECHNOLOGY, INC.</h1>
                        <p>CABULIJAN, TUBIGON, BOHOL</p>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-8 offset-md-2">
                        {!! Form::open(['url'=>'/login', 'method'=>'post']) !!}

                            <div class="mb-3 form-group @error('username') has-error @enderror">
                                {!! Form::label('username','Username',[],false) !!}
                                {!! Form::text('username', null, ['class'=>($errors->has('username') ? 'form-control is-invalid' : 'form-control'), 'id'=>'username']) !!}
                                <span class="errspan" id="errspan">{{ $errors->first('username') }}</span>
                            </div>

                            <a class="float-right text-primary" href="{{ route('password.request') }}">forgot password?</a><br>

                            <div class="mb-3 form-group @error('password') has-error @enderror">
                                {!! Form::label('password', 'Password',[],false) !!}
                                {!! Form::password('password', ['class'=>($errors->has('password') ? 'form-control is-invalid' : 'form-control')]) !!}
                                <span class="errspan" id="errspan">{{ $errors->first('password') }}</span>
                            </div>

                            <div class="mb-3 form-check">
                                {{-- {!! Form::checkbox('remember', 'remember', ['class'=>'form-check-input']) !!}
                                {!! Form::label('remember', 'Remember username',['class'=>'form-check-label'],false) !!} --}}
                                <input type="checkbox" name="remember" value="remember" class="form-check-input" id="remember">
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>

                            <button type="submit" onclick="btnload()" class="btn btn-primary regbtn" id="actionBtn">Login</button>

                            <p style="margin-top:1rem;">Don't have an account yet?</p>
                            <p style="margin-top:-1rem;">Click <a href="/register">Register</a></p>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
