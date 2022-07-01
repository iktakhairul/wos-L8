@php $route = Route::current() @endphp
<div id="sidebar-wrapper" class="navBg bg-dark">
    <ul class="sidebar-nav">
        <li>
            <a href="{{ route('home') }}" target="_blank">
                <i class="fa fa-home"></i> Home
            </a>
        </li>
        <li>
            <a class="{{ $route->getName() == 'dashboard./' ? 'active' : '' }}" href="{{ route('dashboard./') }}">
                <i class="fa fa-users"></i> Dashboard
            </a>
        </li>
        <li>
            <a class="{{ $route->getName() == 'dashboard.users.index' ? 'active' : '' }}" href="{{ route('dashboard.users.index') }}">
                <i class="fa fa-users"></i> Users
            </a>
        </li>
        <li>
            <a class="{{ $route->getName() == 'dashboard.babies.index' ? 'active' : '' }}" href="{{ route('dashboard.babies.index') }}">
                <i class="fa fa-users"></i> Babies
            </a>
        </li>
    </ul>
</div>
