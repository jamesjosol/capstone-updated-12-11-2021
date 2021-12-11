<div class="row">
    <div class="col-md-12">

        <h1 class="">Dashboard</h1>

        <div class="card mt-3">
            <div class="card-header" style="height: auto;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group justify-content-between"> 
                            <div class="col-md-9 float-start">
                                <div class="row">
                                    <div class="col-md-1">
                                        <img src="{{asset('img/headerlogo.png')}}" alt="" style="width:90px; height:90px; margin-left:-20px;">
                                    </div>
                                    <div class="col-md-11 dashhead" style="margin-top: 10px;">
                                        <h3>SALUS INSTITUTE OF TECHNOLOGY</h3>
                                        <h5>ONLINE ENROLLMENT SYSTEM</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 float-end">
                                <h2 class="status">Status: <span style="color: green">{{ $enroll->status }}</span></h2>
                            </div>
                        </div>
                    </div>
                    
                </div>

            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Name: <span style="color: rgb(61, 133, 61)">{{auth()->user()->student()->first()->firstName}} {{substr(auth()->user()->student()->first()->middleName, 0, 1)}}. {{auth()->user()->student()->first()->lastName}}</span></h5>
                    </div>
                    <div class="col-md-6">
                        <h5>Level: <span style="color: rgb(61, 133, 61)">{{ App\Models\Level::getLevel($enroll->level_id)->level }}</span></h5>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <h5>Tracks: <span style="color: rgb(61, 133, 61)">{{ $enroll->track ?? 'N/A' }}</span></h5>
                    </div>
                    <div class="col-md-6">
                        <h5>Strand: <span style="color: rgb(61, 133, 61)">{{ $enroll->strand ?? 'N/A' }}</span></h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-md-4">
                <div class="card mt-4" style="width: auto;">
                    <img class="card-img-top" src="{{asset('img/pending.gif')}}">
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mt-4" style="width: auto;">
                    <div class="card-body">
                      <p class="card-text" style="color: black; font-size:15px;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation 
                        ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse 
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt 
                        mollit anim id est laborum. <br><br>

                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="row mb-5">
            <h3>Current Status:</h3>
            <div class="col-md-4">
                <div class="card mt-2" style="width: auto;">
                    <div class="card-header" style="height: 40px;">
                        Finance
                    </div>
                    <div class="card-body">
                        <h5 class="card-title" style="color: red;">Under Processing.....</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mt-2" style="width: auto;">
                    <div class="card-header" style="height: 40px;">
                        Registrar
                    </div>
                    <div class="card-body">
                        <h5 class="card-title" style="color: red;">Under Processing.....</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>