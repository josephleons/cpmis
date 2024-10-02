<div class="navbar navbar-expand-lg bg-custom">
    <div class="container-fluid">
        <button class="btn btn-default text-white" onclick="openNav()">☰</button>
        <a class="navbar-brand text-white" href="{{ url('facility') }}">CPMIS</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto"> <!-- Use ms-auto to align the nav items to the right -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->username }} <i class="bi bi-three-dots-vertical"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                        <!-- dropdown-menu-end to align the dropdown to the end -->
                        {{-- <li><a class="dropdown-item " href="{{ url('profile') }}"><i class="bi bi-person-fill"></i>
                                Profile</a></li> --}}
                                <li><a class="dropdown-item" href="{{url('Auth/password')}}"><i class="bi bi-gear-fill"></i> Change Password</a></li>
                        <li><a class="dropdown-item" href="{{ url('logout') }}"><i
                            class="bi bi-box-arrow-right"></i>Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- The sidebar -->
<div id="mySidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    {{-- <a href="#"><i class="fas fa-users"></i> Manage Users</a> --}}
    <a class="collapse-link" data-bs-toggle="collapse" href="#projectSubmenu" role="button" aria-expanded="false"
        aria-controls="projectSubmenu">
        <i class="fas fa-project-diagram"></i> Projects
    </a>
    <div class="collapse" id="projectSubmenu">
        <a href="{{ url('project') }}" class="ms-4"><i class="fas fa-list"></i> Project List</a>
        <a href="{{ url('project/create') }}" class="ms-4"><i class="fas fa-plus-circle"></i> Add Project</a>
        <a href="{{url('facility/comment')}}" class="ms-4"><i class="fas fa-chart-pie"></i> View current Comments</a>
    </div>

    <a href="#"><i class="fas fa-money-check-alt"></i> Project Allocations</a>
    <a href="#"><i class="fas fa-envelope"></i>Help</a>
</div>

<script>
    function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
    }
</script>
