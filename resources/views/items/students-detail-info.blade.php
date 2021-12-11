<div class="card" id="user-card">

    <div class="card-header" id="user-card-header">
        <a class="btn btn-outline-primary mb-2" href="{{route('admin.students')}}"><i class='bx bx-arrow-back'></i> Back</a>
        <a class="btn btn-outline-success mb-2 float-end" href="{{route('admin.students.edit', ['student' => "$student->id"])}}"><i class="fas fa-pencil-alt"></i> Edit</a>
    </div>
    <div class="card-body" id="user-card-body">

        <div class="title">
            <h1>STUDENT DETAILS</h1>
        </div>
        
        <div class="info mt-4">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="row">
                        <div class="col-md-10 offset-md-1 mt-4">

                            <div class="mb-5">
                                <div class="row" id="pp-img">
                                    <div class="col-md-12">
                                        <div class="profile " id="pp">
                                            @if ($student->user->profile_pic != null)
                                                <img src="{{asset("images/". $student->user->profile_pic)}}" id="users-profile">
                                            @else
                                                <img src="{{asset("img/pp.png")}}" id="users-profile">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-1">
                                <div class="row">
                                    <div class="col-md-7">
                                        <label for="" class="form-label" id="info-title">Full Name:</label>
                                        <div class="col form-group" id="info">
                                            <label for="fullname" class="form-label">{{$student->lastName}}, {{$student->firstName}} {{$student->middleName}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="" class="form-label" id="info-title">Gender:</label>
                                        <div class="col form-group" id="info">
                                            <label for="gender" class="form-label">{{$student->gender}}</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <hr>
                            <div class="mb-1">
                                <div class="row">
                                    <div class="col-md-7">
                                        <label for="" class="form-label" id="info-title">Birth Date:</label>
                                        <div class="col form-group" id="info">
                                            <label for="birthDate" class="form-label">{{date('F d, Y', strtotime($student->birthDate))}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="" class="form-label" id="info-title">Birth Place:</label>
                                        <div class="col form-group" id="info">
                                            <label for="birthPlace" class="form-label">{{$student->birthPlace != null ? $student->birthPlace : '-'}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="mb-1">
                                <div class="row">
                                    
                                    <div class="col-md-7">
                                        <label for="" class="form-label" id="info-title">Address:</label>
                                        <div class="col form-group" id="info">
                                            <label for="" class="form-label">{{$student->barangay ?? '-'}}, {{$student->town ?? '-'}}, {{$student->province ?? '-'}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="" class="form-label" id="info-title">Civil Status:</label>
                                        <div class="col form-group" id="info">
                                            <label for="civilStatus" class="form-label">{{$student->civilStatus ?? '-'}}</label>
                                        </div>
                                    </div>
                                    

                                </div>
                            </div>  
                            <hr>
                            <div class="mb-1">
                                <div class="row">  
                                    <div class="col-md-7">
                                        <label for="" class="form-label" id="info-title">Nationality:</label>
                                        <div class="col form-group" id="info">
                                            <label for="nationality" class="form-label">{{$student->nationality ?? '-'}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="" class="form-label" id="info-title">Religion:</label>
                                        <div class="col form-group" id="info">
                                            <label for="religion" class="form-label">{{$student->religion ?? '-'}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            <hr>
                            <div class="mb-1">
                                <div class="row">
                                    <div class="col-md-7">
                                    <label for="father" class="form-label" id="info-title">Father:</label>
                                        <div class="col form-group" id="parent-info">
                                            <div class="row">
                                                <div class="col form-group">
                                                    <label for="fatherName" class="form-label">Name: {{$student->fatherName ?? '-'}}</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col form-group">
                                                    <label for="fatherOccup" class="form-label">Occupation: {{$student->fatherOccup ?? '-'}}</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col form-group">
                                                    <label for="fatherContact" class="form-label">Contact: {{$student->fatherContact ?? '-'}}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="mother" class="form-label" id="info-title">Mother:</label>
                                        <div class="col form-group" id="parent-info">    
                                            <div class="row">
                                                <div class="col form-group">
                                                    <label for="motherName" class="form-label">Name: {{$student->motherName ?? '-'}}</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col form-group">
                                                    <label for="motherOccup" class="form-label">Occupation: {{$student->motherOccup ?? '-'}}</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col form-group">
                                                    <label for="motherContact" class="form-label">Contact: {{$student->motherContact ?? '-'}}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            <hr>
                            <div class="mb-1">
                                <div class="row">
                                    <div class="col-md-7">
                                    <label for="guardian" class="form-label" id="info-title">Guardian:</label>
                                        <div class="col form-group" id="parent-info">
                                            <div class="row">
                                                <div class="col form-group">
                                                    <label for="guardianName" class="form-label">Name: {{$student->guardianName ?? '-'}}</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col form-group">
                                                    <label for="guardianContact" class="form-label">Contact: {{$student->guardianContact ?? '-'}}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>  
                            <hr>
                            <div class="mb-1">
                                <div class="row">
                                    <div class="col-md-7">
                                    <label for="" class="form-label" id="info-title">Grade level:</label>
                                        <div class="col form-group" id="parent-info">
                                            <div class="row">
                                                <div class="col form-group">
                                                    <label for="grade_LVL" class="form-label">{{$student->grade_LVL ?? '-'}}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="title mt-5">
            <h1>PREVIOUS SCHOOL DETAILS</h1>
        </div>
        
        <div class="info mt-1">
            <div class="row">
                <div class="col-md-10 offset-md-1 mt-4">
                    <div class="mb-1">
                        <div class="row">
                            <div class="col-md-7">
                            <label for="" class="form-label" id="info-title">Elementary:</label>
                                <div class="col form-group" id="parent-info">
                                    <div class="row">
                                        <div class="col form-group">
                                            <label for="elemSchool" class="form-label">School: {{$student->elemSchool ?? '-'}}</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col form-group">
                                            <label for="elemSchlAddr" class="form-label">Address: {{$student->elemSchlAddr ?? '-'}}</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col form-group">
                                            <label for="elemYrAttnd" class="form-label">Year: {{$student->elemYrAttnd ?? '-'}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>  

                    <div class="mb-1">
                        <div class="row">
                            <div class="col-md-7">
                            <label for="" class="form-label" id="info-title">Secondary:</label>
                                <div class="col form-group" id="parent-info">
                                    <div class="row">
                                        <div class="col form-group">
                                            <label for="secondarySchool" class="form-label">School: {{$student->secondarySchool ?? '-'}}</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col form-group">
                                            <label for="secondarySchlAddr" class="form-label">Address: {{$student->secondarySchlAddr ?? '-'}}</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col form-group">
                                            <label for="secondaryYrAttnd" class="form-label">Year: {{$student->secondaryYrAttnd ?? '-'}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
