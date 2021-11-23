@php $my_businesses = my_businesses() @endphp
<aside class="col-md-3">
    <nav class="list-group">
        <a class="list-group-item @if (request()->routeIs(['profile./'])) active @endif" href="{{ route('profile./') }}">Profile Overview</a>
        <a class="list-group-item @if (request()->routeIs(['jobs.job-posts.index'])) active @endif" href="{{ route('jobs.job-posts.index') }}"> My Job Posts </a>
        <a class="list-group-item @if (request()->routeIs(['jobs.job-timelines.index'])) active @endif" href="{{ route('jobs.job-timelines.index') }}"> My Job Timelines </a>
        @if(auth()->user()['complete_profile_status'] !== 'incomplete')
            <a class="list-group-item @if (request()->routeIs(['jobs.pending-proposal.index'])) active @endif" href="{{ route('jobs.pending-proposal.index') }}"> My Pending Job Proposals</a>
            <a class="list-group-item @if (request()->routeIs(['jobs.my-works.index'])) active @endif" href="{{ route('jobs.my-works.index') }}"> My Works</a>
        @endif
        <a class="list-group-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> Log out </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </nav>
</aside>
