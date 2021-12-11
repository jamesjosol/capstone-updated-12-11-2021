<div class="sidebar">
    <div class="logo-content">
        <div class="logo">
            <div class="logo-name">
                Dashboard
            </div>
        </div>
        {{-- <i class='bx bx-menu' id="btn-menu"></i> --}}
        <div id="btn-menu">
            <i class='bx bx-menu fa-hover-hidden'></i>
            <i class='bx bx-x fa-hover-show' style="display: none"></i>
        </div>
       
    </div>

    <ul class="nav-list">
        <li class="" style="display: none">
            <a>
                <i class='bx bx-search'></i>
                
            </a>
            
        </li>

        <li>
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
                <i class='bx bx-grid-alt'></i>
                <span class="links-name">Dashboard</span>
            </a>
            <span class="tooltip">Dashboard</span>
        </li>
        

        <li>
            <a href="{{ route('admin.enrolees') }}" class="{{ request()->is('admin/enrolees') ? 'active' : '' }}">
                <i class="fad fa-user-graduate"></i>
                <span class="links-name">Enrolees</span>
            </a>
            <span class="tooltip">Enrolees</span>
        </li>

        <li>
            <a href="{{ route('admin.users') }}" class="{{ request()->is('admin/users') ? 'active' : '' }}">
                <i class='fal fa-users'></i>
                <span class="links-name">Users</span>
            </a>
            <span class="tooltip">Users</span>
        </li>
        

        <li>
            <a href="{{ route('admin.students') }}" class="{{ request()->is('admin/students') ? 'active' : '' }}">
                <i class="fal fa-user-graduate"></i>
                <span class="links-name">Students</span>
            </a>
            <span class="tooltip">Students</span>
        </li>

        <li>
            <a href="{{ route('admin.teachers') }}" class="{{ request()->is('admin/teachers') ? 'active' : '' }}">
                <i class="fal fa-chalkboard-teacher"></i>
                <span class="links-name">Teachers</span>
            </a>
            <span class="tooltip">Teacher</span>
        </li>

        <li>
            <a href="{{ route('admin.subjects') }}" class="{{ request()->is('admin/subjects') ? 'active' : '' }}">
                <i class="fal fa-books"></i>
                <span class="links-name">Subjects</span>
            </a>
            <span class="tooltip">Subjects</span>
        </li>

        <li>
            <a href="{{ route('admin.sections') }}" class="{{ request()->is('admin/sections') ? 'active' : '' }}">
                <i class="fal fa-school"></i>
                <span class="links-name">Class Sections</span>
            </a>
            <span class="tooltip">Class Sections</span>
        </li>

        <li>
            <a href="{{ route('admin.classes') }}" class="{{ request()->is('admin/classes') ? 'active' : '' }}">
                <i class="fal fa-book-reader"></i>
                <span class="links-name">Classes</span>
            </a>
            <span class="tooltip">Classes</span>
        </li>

        <li>
            <a href="{{ route('admin.schoolyear') }}" class="{{ request()->is('admin/schoolyear') ? 'active' : '' }}">
                <i class='bx'>SY</i>
                <span class="links-name">SchoolYear</span>
            </a>
            <span class="tooltip">SchoolYear</span>
        </li>

        <li>
            <a href="">
                <i class='bx bx-home'></i>
                <span class="links-name">Home</span>
            </a>
            <span class="tooltip">Home</span>
        </li>
        

        {{-- <li class="logout-content fixed-bottom">
            <a href="">
                <i class='bx bx-info-circle'></i>
                <span class="links-name">About</span>
            </a>
            <span class="tooltip">About</span>
        </li> --}}

    </ul>

    <a class="logout-content fixed-bottom" href="{{ route('logout') }}">
        <div class="logout">
            <div class="logout-details">
                <div class="logout-name">Logout</div>
            </div>
            <i class='bx bx-log-out' id="logout"></i>
        </div>
    </a>
</div>