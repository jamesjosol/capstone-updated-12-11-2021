@extends('layouts.app')

@section('content')
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
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3 form-group @error('email') has-error @enderror">
                                    {!! Form::label('email','Email Address',[],false) !!}
                                    {!! Form::text('email', $email ?? old('email'), ['class'=>($errors->has('email') ? 'form-control is-invalid' : 'form-control'), 'id'=>'email','required' => '']) !!}
                                    <span class="errspan" id="errspan">{{ $errors->first('email') }}</span>
                                </div>

                                <div class="mb-3 form-group @error('password') has-error @enderror">
                                    {!! Form::label('password', 'New Password',[],false) !!}
                                    {!! Form::password('password', ['class'=>($errors->has('password') ? 'form-control is-invalid' : 'form-control'),'required' => '']) !!}
                                    <span class="errspan" id="errspan">{{ $errors->first('password') }}</span>
                                </div>

                                <div class="mb-3 form-group @error('password_confirmation') has-error @enderror">
                                    {!! Form::label('password_confirmation', 'Confirm Password',[],false) !!}
                                    {!! Form::password('password_confirmation', ['class'=>($errors->has('password_confirmation') ? 'form-control is-invalid' : 'form-control'),'required' => '']) !!}
                                    <span class="errspan" id="errspan">{{ $errors->first('password_confirmation') }}</span>
                                </div>

                                <div class="form-group m-0">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Reset Password
                                    </button>
                                </div>
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div> --}}

                        
                        {{-- <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
