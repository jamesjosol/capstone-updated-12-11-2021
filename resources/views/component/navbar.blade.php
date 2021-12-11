<nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background: #1C7947;">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="{{asset('/img/logo.png')}}" alt="" class="logo">
            <div class="name">
                <h1>SALUS INSTITUTE OF TECHNOLOGY, INC.</h1>
                <p>CABULIJAN, TUBIGON, BOHOL</p>
            </div>
            {{-- <div class="">
                {{\App\Models\SchoolYear::currentYear()}}
            </div> --}}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
            <form class="d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link box{{ Request::is('/') ? '-nav-item-active' : '' }}" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link box{{ Request::is('about') ? '-nav-item-active' : '' }}" href="{{ url('/about') }}">About Us</a>
                    </li>
                    @if (Request::is('/') || Request::is('about') ||  Request::is('login') || Request::is('register') || Request::is('password/reset') || Request::is('password/reset/*'))
                    
                        @if (auth()->check())
                            @if (auth()->user()->role == 1)
                                <li class="nav-item">
                                    <a class="nav-link box{{ Request::is('admin/dashboard') ? '-nav-item-active' : '' }}" href="{{ route('admin.dashboard') }}">Dashboard</a>
                                </li>
                            @elseif(auth()->user()->role == 2)
                                <li class="nav-item">
                                    <a class="nav-link box{{ Request::is('user/dashboard') ? '-nav-item-active' : '' }}" href="{{ route('user.dashboard') }}">Dashboard</a>
                                </li>
                            @endif
                        <li class="nav-item">
                            <a class="nav-link box" href="{{ route('logout') }}">Logout</a>
                        </li>
                    @else
                        <ul class="navbar-nav me-auto ml-auto">
                            <li class="nav-item">
                                <a class="nav-link box{{ Request::is('login') ? '-nav-item-active' : '' }}" href="/login">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link box{{ Request::is('register') ? '-nav-item-active' : '' }}" href="/register">Register</a>
                            </li>
                        </ul>
                    @endif
                @endif
                </ul>
            </form>
        </div>
    </div>
</nav>