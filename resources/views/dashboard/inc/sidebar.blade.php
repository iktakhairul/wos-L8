@php $route = Route::current() @endphp
<div id="sidebar-wrapper" class="navBg bg-dark">
    <ul class="sidebar-nav">
        <li>
            <a class="{{ $route->getName() == 'dashboard./' ? 'active' : '' }}" href="{{ route('dashboard./') }}">
                <i class="fa fa-dashboard"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('home') }}" target="_blank">
                <i class="fa fa-home"></i> Home
            </a>
        </li>

        <li>
            <a class="{{ $route->getName() == 'dashboard.user.index' ? 'active' : '' }}" href="{{ route('dashboard.user.index') }}">
                <i class="fa fa-users"></i> Users
            </a>
        </li>
    </ul>
</div>