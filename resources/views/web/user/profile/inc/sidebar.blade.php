@php $my_businesses = my_businesses() @endphp
<aside class="col-md-3">
    <nav class="list-group">
        <a class="list-group-item @if (request()->routeIs(['profile./'])) active @endif" href="{{ route('profile./') }}"> Account overview </a>
        <a class="list-group-item @if (request()->routeIs(['profile.address'])) active @endif" href="{{ route('profile.address') }}"> My Address </a>
        <a class="list-group-item @if (request()->routeIs(['profile.orders'])) active @endif" href="{{ route('profile.orders') }}"> My Orders </a>
        <a class="list-group-item @if (request()->routeIs(['profile.wishlist'])) active @endif" href="{{ route('profile.wishlist') }}"> My wishlist </a>
        <a class="list-group-item @if (request()->routeIs(['profile.selling'])) active @endif" href="{{ route('profile.selling') }}"> My Selling Items
        </a>
        @if(!$my_businesses)
        <a class="list-group-item @if (request()->routeIs(['profile.businesses.create'])) active @endif" href="{{ route('profile.businesses.create') }}">Add
            Business</a>
        @else
        <a class="list-group-item @if (request()->routeIs(['profile.businesses.index'])) active @endif" href="{{ route('profile.businesses.index') }}">My
            Businesses</a>
        @endif
        <a class="list-group-item @if (request()->routeIs(['profile.setting'])) active @endif" href="{{ route('profile.setting') }}"> Settings </a>
        <a class="list-group-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();document.getElementById('logout-form').submit();"> Log out </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </nav>
</aside>
