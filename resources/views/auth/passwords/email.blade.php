@extends('layouts.app')

@section('content')

@include('component.info_msg')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="title mt-5 forgotpasstitle">
                <img src="{{asset('img/headerlogo.png')}}" alt="" class="headerlogo">
                <div class="regheader">
                    <h1>SALUS INSTITUTE OF TECHNOLOGY, INC.</h1>
                    <p>CABULIJAN, TUBIGON, BOHOL</p>
                </div>
            </div>
    
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card forgotpass">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="card-title mb-3">Forgot Password</h4>
                                <div class="mb-3 form-group @error('email') has-error @enderror">
                                    {!! Form::label('email','Email Address',[],false) !!}
                                    {!! Form::text('email', null, ['class'=>($errors->has('email') ? 'form-control is-invalid' : 'form-control'), 'id'=>'email','required' => '']) !!}
                                    <span class="errspan" id="errspan">{{ $errors->first('email') }}</span>
                                </div>
        
                                <div class="form-group m-0">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Send Password Link
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
