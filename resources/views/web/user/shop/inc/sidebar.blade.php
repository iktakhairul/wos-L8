@php $route = Route::current() @endphp
<div id="sidebar-wrapper" class="navBg bg-dark">
    <ul class="sidebar-nav">
        <li>
            <a class="{{ $route->getName() == 'profile.shop./' ? 'active' : '' }}" href="{{ route('profile.shop./',['businessId' => $businessId, 'id' => $id]) }}">
                <i class="fa fa-dashboard"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('home') }}" target="_blank">
                <i class="fa fa-home"></i> Home
            </a>
        </li>
        <li>
            <a class="{{ $route->getName() == 'profile.shop.settings' ? 'active' : '' }}" href="{{ route('profile.shop.settings',['businessId' => $businessId, 'id' => $id]) }}">
                <i class="fa fa-wrench"></i> Settings
            </a>
        </li>
        <li>
            <a class="" href="">
                <i class="fa fa-cubes"></i> Products
            </a>
        </li>
        <li>
            <a class="" href="">
                <i class="fa fa-database"></i> Stocks
            </a>
        </li>
        <li>
            <a class="" href="">
                <i class="fa fa-glass"></i> Discounts
            </a>
        </li>
        <li>
            <a class="" href="">
                <i class="fa fa-magnet"></i> Coupons
            </a>
        </li>
        <li>
            <a class="" href="">
                <i class="fa fa-file-word-o"></i> Manual Order
            </a>
        </li>
        <li>
            <a class="" href="">
                <i class="fa fa-file-excel-o"></i> Reports
            </a>
        </li>
        <li>
            <a class="{{ $route->getName() == 'dashboard.user.index' ? 'active' : '' }}" href="{{ route('dashboard.user.index') }}">
                <i class="fa fa-users"></i> Users
            </a>
        </li>
    </ul>
</div>