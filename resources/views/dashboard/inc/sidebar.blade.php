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
        <li>
            <a data-toggle="collapse" href="#submenu" type="button">
                <i class="fa fa-circle-o"></i> Categorization
            </a>
            <ul class="list-group bg-dark text-light collapse {{ $route->getName() == 'dashboard.groups.index' || $route->getName() == 'dashboard.categories.index' || $route->getName() == 'dashboard.subcategories.index' ? 'show' : '' }}" id="submenu">
                <li class="list-group-item bg-dark text-light">
                    <a href="{{ route('dashboard.groups.index') }}" class="{{ $route->getName() == 'dashboard.groups.index' ? 'active' : '' }}"><i class="fa fa-list"></i> Groups</a>
                </li>
                <li class="list-group-item bg-dark text-light">
                    <a href="{{ route('dashboard.categories.index') }}" class="{{ $route->getName() == 'dashboard.categories.index' ? 'active' : '' }}"><i class="fa fa-list"></i> Categories</a>
                </li>
                <li class="list-group-item bg-dark text-light">
                    <a href="{{ route('dashboard.subcategories.index') }}" class="{{ $route->getName() == 'dashboard.subcategories.index' ? 'active' : '' }}"><i class="fa fa-list"></i> Subcategories</a>
                </li>
            </ul>
        </li>
    </ul>
</div>