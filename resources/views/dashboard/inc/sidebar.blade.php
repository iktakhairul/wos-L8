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
            <a href="{{ route('dashboard.service-categories.index') }}" class="{{ $route->getName() == 'dashboard.service-categories.index' ? 'active' : '' }}"><i class="fa fa-list-alt"></i> Service Categories</a>

            {{--User Reports--}}
            <a data-toggle="collapse" href="#report_submenu" type="button"><i class="fa fa-minus-circle"></i> User Reports</a>
            <ul class="list-group ml-4 collapse {{ $route->getName() == 'dashboard.reports.job-post-reports' || $route->getName() == 'dashboard.reports.job-owner-reports' || $route->getName() == 'dashboard.reports.job-worker-reports' ? 'show' : '' }}" id="report_submenu">
                <li class=>
                    <a class="{{ $route->getName() == 'dashboard.reports.job-post-reports' ? 'active' : '' }}" href="{{ route('dashboard.reports.job-post-reports') }}"><i class="fa fa-info mr-2"></i> Job Post</a>
                </li>
                <li>
                    <a class="{{ $route->getName() == 'dashboard.reports.job-owner-reports' ? 'active' : '' }}" href="{{ route('dashboard.reports.job-owner-reports') }}"><i class="fa fa-info mr-2"></i> Job Owner</a>
                </li>
                <li>
                    <a class="{{ $route->getName() == 'dashboard.reports.job-worker-reports' ? 'active' : '' }}" href="{{ route('dashboard.reports.job-worker-reports') }}"><i class="fa fa-info mr-2"></i> Worker</a>
                </li>
            </ul>

        </li>
    </ul>
</div>
