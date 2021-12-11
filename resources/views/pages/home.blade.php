@extends('layouts.app')

@section('content')
    <div>
        <img src="{{asset('img/BodyBG-min.png')}}" alt="" class="bg">

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="titless">
                    <h1 class="Landingtitle">SALUS INSTITUTE OF TECHNOLOGY</h1>
                    <h5 class="Landingsubtitle">ONLINE ENROLLMENT SYSTEM</h5>
                    <p class="SY">S.Y. {{ \App\Models\SchoolYear::CurrentYear() }}</p>
                </div>

                <div class="text-center"> 
                    <a href="/login" type="submit" class="btn btn-info ">Enroll Now</a>
                </div>
                
            </div>
        </div>
    </div>
@endsection
