@extends('web.user.profile.index')
@section('title', 'Profile - ' . Auth::user()->name)

@push('styles')

@endpush

@section('profile_content')

    <article class="card" style="margin-bottom: 222px">
        <div class="card-body">

            <figure class="icontext">
                <div class="icon">
                    <img class="rounded-circle img-sm border" src="{{ asset('web/images/avatars/avatar3.jpg') }}">
                </div>
                <div class="text">
                    <strong> {{ $user->name ?? 'Not Found'}} </strong> <br>
                    <p class="mb-2"> {{ $user->email ?? 'Not Found'}} </p>
                    <a href="#" class="btn btn-light btn-sm">Edit</a>
                </div>
            </figure>
            <hr>
            <p><i class="fa-solid fa-location-dot mr-2"></i>My address: {{ $user->profile->present_address ?? 'Not Found'}}
            </p>
            <article class="card-group card-stat">
                <figure class="card bg">
                    <div class="p-3">
                        <h4 class="title">38</h4>
                        <span>Orders</span>
                    </div>
                </figure>
                <figure class="card bg">
                    <div class="p-3">
                        <h4 class="title">5</h4>
                        <span>Wishlists</span>
                    </div>
                </figure>
                <figure class="card bg">
                    <div class="p-3">
                        <h4 class="title">12</h4>
                        <span>Awaiting delivery</span>
                    </div>
                </figure>
                <figure class="card bg">
                    <div class="p-3">
                        <h4 class="title">50</h4>
                        <span>Delivered items</span>
                    </div>
                </figure>
            </article>
        </div>
    </article>

@endsection

@push('scripts')

    <script>
    </script>

@endpush
