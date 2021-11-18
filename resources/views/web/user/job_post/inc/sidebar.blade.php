@php $my_businesses = my_businesses() @endphp
<aside class="col-md-3">
    <nav class="list-group">
        <a class="list-group-item @if (request()->routeIs(['profile./'])) active @endif" href="{{ route('profile./') }}"> Account overview </a>
        <a class="list-group-item @if (request()->routeIs(['profile.address'])) active @endif" href="{{ route('profile.address') }}"> My Address </a>
        <a class="list-group-item @if (request()->routeIs(['profile.job-posts.index'])) active @endif" href="{{ route('profile.job-posts.index') }}"> My Job Posts </a>
        <a class="list-group-item @if (request()->routeIs(['profile.job-timelines.index'])) active @endif" href="{{ route('profile.job-timelines.index') }}"> My Job Timelines </a>
        @if(auth()->user()['complete_profile_status'] !== 'incomplete')
            <a class="list-group-item @if (request()->routeIs(['profile.pending-proposal.index'])) active @endif" href="{{ route('profile.pending-proposal.index') }}"> My Pending Job Proposals</a>
            <a class="list-group-item @if (request()->routeIs(['profile.my-works.index'])) active @endif" href="{{ route('profile.my-works.index') }}"> My Works</a>
{{--            <a class="list-group-item @if (request()->routeIs(['profile.my-works.show'])) active @endif" href="{{ route('profile.my-works.show', auth()->user()['id']) }}"> My Complete Works</a>--}}
        @endif
        <a class="list-group-item @if (request()->routeIs(['profile.setting'])) active @endif" href="{{ route('profile.setting') }}"> Settings </a>
        <a class="list-group-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();document.getElementById('logout-form').submit();"> Log out </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </nav>
</aside>
