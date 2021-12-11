@section('mytitle', '| About')

@extends('layouts.app')

<img src="../img/aboutbg.png" alt="" id="aboutbg">

@section('content')

    <div class="container">
        <div class="row offset-md-1">
            <div class="col-md-5 ">
                <img src="../img/aboutlogo.png" alt="" id="aboutlogo">
            </div>
            <div class="col-md-7">
                <div class="row" id="VM">
                    <div class="col-md-12">
                        <h1 class="vm-header">VISION</h1>
                        <p class="vm-p">Salus Institute of Technology is a family 
                        formed in the core values of the 
                        institution-the BAT-POTI: BUHAT 
                        (Work), AMPO (Pray), TOON (Study) 
                        through Punctuality, Orderliness, 
                        Timeframe and Interest.</p>
                    </div>
                    <div class="col-md-12">
                        <h1 class="vm-header" style="margin-top:4rem;">MISSION</h1>
                        <p class="vm-p">Salus Institute of Technology commits 
                        to Build a better institution for younger 
                        generation of law abiding citizen 
                        and Asses students’ spiritual growth to 
                        be God-fearing individuals. These will 
                        enable our students to Transcend from 
                        the others to be globally competitive in 
                        the means of academic excellence and 
                        technological skills.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection