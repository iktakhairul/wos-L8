@php $route = Route::current() @endphp
<nav class="system-navbar">
    <div class="logo">
        <a href="{{route('/')}}" class="brand-link" style="width: 230px"><span class="brand-text font-weight-light"><b>Doc Pharma</b></span></a>
        <button class="dashboard-menu"><span></span><span></span><span></span></button>
    </div>

    <div class="logout nav-name-and-options">
        <a class="nav-link dropdown-toggle pt-1" data-toggle="dropdown" href="#">{{ auth()->user()['name'] }}</a>
        <div class="dropdown-menu dropdown-large border-0 shadow-lg">
            <a class=" ml-2" href="{{route('profile./')}}"><i class="mr-2 fa fa-wheelchair"></i>My Profile</a><br>
            <a class=" ml-2" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="mr-2 fa fa-sign-in"></i>Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>

    <div class="dash-nav">
        <div class="side-menu-links">
            <a class="sidebar-display-name {{ $route->getName() == 'profile./' ? 'active' : '' }}" href="{{route('profile./')}}"><i class="mr-2 fa fa-wheelchair" style="font-size: 20px"></i>{{ auth()->user()['name'] }}</a>
            <a class="{{ $route->getName() == 'test.system.dashboard' ? 'active' : '' }}"
               href="{{ $route->getName() == 'test.system.dashboard' ? '#' : route('test.system.dashboard') }}">
                <i class="fa fa-dashboard" style="font-size: 20px"></i>
                <span>Dashboard</span>
            </a>
            <a class="{{ $route->getName() == '/' ? 'active' : '' }}" href="{{ $route->getName() == '/' ? '#' : route('/') }}">
                <i class="fa fa-files-o" style="font-size: 20px"></i><span>My Active Prescriptions</span>
            </a>
            <a class="{{ $route->getName() == '/' ? 'active' : '' }}" href="{{ $route->getName() == '/' ? '#' : route('/') }}">
                <i class="fa fa-stethoscope" style="font-size: 20px"></i><span>My History</span>
            </a>
            <a class="md-display-hide ml-2 sidebar-logout-option" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="mr-2 fa fa-sign-in"></i>Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</nav>
