@php $my_businesses = my_businesses() @endphp
<aside class="col-md-3">
    <nav class="list-group">
        <a class="list-group-item @if (request()->routeIs(['profile./'])) active @endif" href="{{ route('profile./') }}"> Account overview </a>
        <a class="list-group-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> Log out </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </nav>
</aside>
