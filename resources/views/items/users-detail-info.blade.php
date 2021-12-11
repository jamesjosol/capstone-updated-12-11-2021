<div class="card" id="user-card">

    <div class="card-header" id="user-card-header">
        <a class="btn btn-outline-primary float-end" href="{{route('admin.users')}}" ><i class='bx bx-arrow-back'></i>Back</a>
    </div>
    <div class="card-body" id="user-card-body">

        <div class="title">
            <h1>USER'S DETAILS</h1>
        </div>
        
        <div class="info mt-4">
            <div class="row justify-content-center">
                <div class="col">
                    <div class="row">
                        <div class="col-md-10 offset-md-1 mt-4">

                            <div class="mb-5">
                                <div class="row" id="users-img">
                                    <div class="col-md-12">
                                        <div class="profile " id="userpp">
                                            @if ($user->profile_pic != null)
                                                <img src="{{asset("images/". $user->profile_pic)}}" id="users-profile">
                                            @else
                                                <img src="{{asset("img/pp.png")}}" id="users-profile">
                                            @endif
                                            <label for="username" class="form-label mt-2 text-center" id="username">{{$user->username}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
<br>
                            <div class="mb-1">
                                <div class="row" id="users-info">
                                    <div class="col-md-4">
                                        <label for="" class="form-label" id="info-title">First Name:</label>
                                        <div class="col form-group" id="info">
                                            <label for="firstName" class="form-label">{{$user->firstName}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label" id="info-title">Last Name:</label>
                                        <div class="col form-group" id="info">
                                            <label for="lastName" class="form-label">{{$user->lastName}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="form-label" id="info-title">Middle Name:</label>
                                        <div class="col form-group" id="info">
                                            <label for="middleName" class="form-label">{{$user->middleName}}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="mb-1">
                                <div class="row" id="users-info">
                                    <div class="col-md-7">
                                        <label for="" class="form-label" id="info-title">Email Address:</label>
                                        <div class="col form-group" id="info">
                                            <label for="email" class="form-label">{{$user->email}}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="" class="form-label" id="info-title">Contact Number:</label>
                                        <div class="col form-group" id="info">
                                            <label for="contactNo" class="form-label">{{$user->contactNo}}</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <hr>
                            <div class="mb-1">
                                <div class="row" id="users-info">
                                    
                                    <div class="col-md-7">
                                        <label for="" class="form-label" id="info-title">Role:</label>
                                        <div class="col form-group" id="info">
                                            <label for="role" class="form-label">{{ $user->role == 1 ? 'Administrator' : 'Normal' }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>  
                            <hr>
                            <div class="mb-1">
                                <div class="row " id="users-info">  
                                    <div class="col-md-7">
                                        <label for="" class="form-label" id="info-title">Email Verified:</label>
                                        <div class="col form-group" id="info">
                                            <label for="email_verified_at" class="form-label">{{ $user->email_verified_at != null ? date('F d, Y h:i:s A', strtotime($user->email_verified_at)) : 'Not verified.' }}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="" class="form-label" id="info-title">Account Date Created:</label>
                                        <div class="col form-group" id="info">
                                            <label for="" class="form-label">{{date('F d, Y h:i:s A', strtotime($user->created_at))}}</label>
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
