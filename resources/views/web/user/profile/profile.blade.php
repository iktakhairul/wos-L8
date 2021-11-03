@extends('web.user.profile.index')
@section('title', 'Profile - ' .Auth::user()->name)

@push('styles')

@endpush

@section('profile_content')

<div class="row">
    <div class="container">
        <h4>Profile</h4>
        <div class="card" style="width: 400px;">
            <img class="card-img-top" src="img_avatar1.png" alt="Card image" style="width: 100%;" />
            <div class="card-body">
                <h4 class="card-title">John Doe</h4>
                <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                <a href="#" class="btn btn-primary stretched-link">See Profile</a>
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