<h1 class="text-uppercase mb-5" id="dashusers"><strong>Users card</strong> <i class="fa fa-users"></i></h1>

<div class="col-md-3">

    <div class="stat-card-admin">
        <div class="row">
            <div class="col">
                <div class="status-card">

                    <div class="stat-card__content">
                        <p class="text-uppercase md-1 text-muted">Admin</p>

                        <h1 class="total">{{ $admins }}</h1>
                    </div>
                    <div class="stat-card__icon--info">
                        <div class="stat-card__icon-circle">
                            <i class="fa fa-user"></i>
                        </div>
                    </div>

                </div>
            </div>        
        </div>
        <div class="row">
            <div class="col">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: {{$adminsBarWidth}}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{$adminsBarWidth}}%</div>
                </div>
            </div>        
        </div>

        <div class="clicktoview">
            <p>Click to View</p>
        </div>
    </div>

</div>

<div class="col-md-3">

    <div class="stat-card-staff">
        <div class="row">
            <div class="col">
                <div class="status-card">

                    <div class="stat-card__content">
                        <p class="text-uppercase md-1 text-muted">Staffs</p>

                        <h1 class="total">14</h1>
                    </div>
                    <div class="stat-card__icon--success">
                        <div class="stat-card__icon-circle">
                            <i class="fa fa-user"></i>
                        </div>
                    </div>

                </div>
            </div>        
        </div>
        <div class="row">
            <div class="col">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                </div>
            </div>        
        </div>

        <div class="clicktoview">
            <p>Click to View</p>
        </div>
    </div>

</div>

<div class="col-md-3">

    <div class="stat-card-teacher">
        <div class="row">
            <div class="col">
                <div class="status-card">

                    <div class="stat-card__content">
                        <p class="text-uppercase md-1 text-muted">Teachers</p>

                        <h1 class="total">30</h1>
                    </div>
                    <div class="stat-card__icon--warning">
                        <div class="stat-card__icon-circle">
                            <i class="fa fa-user"></i>
                        </div>
                    </div>

                </div>
            </div>        
        </div>
        <div class="row">
            <div class="col">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 55%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">55%</div>
                </div>
            </div>        
        </div>

        <div class="clicktoview">
            <p>Click to View</p>
        </div>
    </div>

</div>

<div class="col-md-3">

    <div class="stat-card-student">
        <div class="row">
            <div class="col">
                <div class="status-card">

                    <div class="stat-card__content">
                        <p class="text-uppercase md-1 text-muted">Students</p>

                        <h1 class="total">709</h1>
                    </div>
                    <div class="stat-card__icon--danger">
                        <div class="stat-card__icon-circle">
                            <i class="fa fa-user"></i>
                        </div>
                    </div>

                </div>
            </div>        
        </div>
        <div class="row">
            <div class="col">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 85%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">85%</div>
                </div>
            </div>        
        </div>

        <div class="clicktoview">
            <p>Click to View</p>
        </div>
    </div>

</div>