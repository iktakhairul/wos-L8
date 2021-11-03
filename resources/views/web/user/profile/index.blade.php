@extends('web.index')

@section('web_content')

<div class="container-fluid mt-5 mb-5 pt-5 pb-5">
    <div class="row">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile./') }}">Profile</a>
                        </li>
                        If there is no business for this user, this below "Add Business" link will be displayed.
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile.business.create') }}">Add Business</a>
                        </li>
                        else there is one or more businesses for this user, this below "My Businesses" link will be displayed.
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('profile.business.index') }}">My Businesses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                    </ul>

                </div>
                <div class="col-md-10">
                    @yield('profile_content')
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script>
    $(document).ready(function(){
        //        
    });
</script>

@endpush