
<div class="card" id="user-card">

    <div class="card-header" id="user-card-header">
        <a class="btn btn-outline-primary mb-2 float-end" href="{{route('admin.enrolees')}}"><i class='bx bx-arrow-back'></i> Back</a>
    </div>

    <div class="card-body" id="user-card-body">
        <div class="card-header" id="enrollment-header">
            <h1>Program</h1>
        </div>
        <div class="info mt-4">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <div class="mb-1">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" class="form-label"><strong> Student Name:</strong> <span style="color: green">{{$enrolee->student()->first()->firstName}} {{substr($enrolee->student()->first()->middleName, 0, 1)}}. {{$enrolee->student()->first()->lastName}}</span></label>
                                        <div class="col form-group" id="info">
                                            <label for="level" class="form-label"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-1">
                                <div class="row">
                                    <div class="col-md-7">
                                        <label for="" class="form-label">Level: <span style="color: green">{{$enrolee->level()->first()->level}}</span></label>
                                        <div class="col form-group" id="info">
                                            <label for="level" class="form-label"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="" class="form-label">Student Type: <span style="color: green">{{$enrolee->student_type}}</span></label>
                                        <div class="col form-group" id="info">
                                            <label for="student_type" class="form-label"></label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            @if ($enrolee->level()->first()->id > 4)
                            <div class="mb-1">
                                <div class="row">
                                    <div class="col-md-7">
                                        <label for="" class="form-label">Track: <span style="color: green">{{$enrolee->track ?? ''}}</span></label>
                                        <div class="col form-group" id="info">
                                            <label for="track" class="form-label"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="" class="form-label">Strand: <span style="color: green">{{$enrolee->track ?? ''}} </span></label>
                                        <div class="col form-group" id="info">
                                            <label for="strand" class="form-label"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>  

                </div>
            </div>
        </div>

        @if (isset($enrolee->requirement_images))
        <div class="card-header" id="enrollment-header">
            <h1>Documents</h1>
        </div>
        <div class="info mt-4">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="row">
                        <div class="col-md-12 mt-2">
                            <div class="mb-1">
                                <div class="row">
                                    <div class="col-md-7">
                                        <label for="" class="form-label">Title: <span style="color: green">{{$enrolee->title}}</span></label>
                                        <div class="col form-group" id="info">
                                            <label for="level" class="form-label"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="" class="form-label">Remarks: <span style="color: green">{{$enrolee->remarks}}</span></label>
                                        <div class="col form-group" id="info">
                                            <label for="student_type" class="form-label"></label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="mb-1">
                                <div class="row">
                                    <div class="col-md-7">
                                        <label for="" class="form-label">Submitted Requirements :</label>
                                        <div class="col form-group mt-2" id="info">
                                            @foreach(json_decode($enrolee->requirement_images) as $requiredFileImg)
                                                <img alt="Requirement Image" class="p-1 requirementImages" src='{{url("files/$requiredFileImg")}}' style="width: 100px; height:120px;"/>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
        @endif

        <div class="card-header" id="enrollment-header">
            <h1>Payments</h1>
        </div>
        <div class="info mt-4">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="row">
                        <div class="col-md-12 mt-2">

                            <div class="mb-1">
                                <div class="row">
                                    <div class="col-md-7">
                                        <label for="" class="form-label">Payment Channel: <span style="color: green">{{$enrolee->payment_channel}}</span></label>
                                        <div class="col form-group" id="info">
                                            <label for="level" class="form-label"></label>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="" class="form-label">Amount Paid: <span style="color: green">{{$enrolee->entrance_amount}}</span></label>
                                        <div class="col form-group" id="info">
                                            <label for="student_type" class="form-label"></label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="mb-1">
                                <div class="row">
                                    <div class="col-md-7">
                                        <label for="" class="form-label">Submitted Payments:</label>
                                        <div class="col form-group mt-2" id="info">
                                            <img src='{{url("files/$enrolee->payment_image")}}' alt="" style="width: 100px; height:120px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>

        <hr>

        <div class="form-group justify-content-between"> 
            <div class="col-md-2 float-end mt-1">
                <a class="btn btn-primary form-control" href="{{route('admin.setenrolee', ['enrolee' => "$enrolee->id"])}}">
                    <i class="fas fa-check"></i> Approve
                </a>
            </div>   
            <div class="col-md-2 float-start mt-1">
                <a href="" class="btn btn-danger form-control"><i class="fas fa-arrow-left"></i> Reject</a>
            </div>
        </div>
    </div>
</div>
