@extends('web.user.profile.index')
@section('title', 'Profile - ' . Auth::user()->name)

@push('styles')

@endpush

@section('profile_content')

    <article class="card mb-3">
        <div class="card-body">

            <figure class="icontext">
                <div class="icon">
                    <img class="rounded-circle img-sm border" src="{{ asset('web/images/avatars/avatar3.jpg') }}">
                </div>
                <div class="text">
                    <strong> Mr. Jackson Someone </strong> <br>
                    <p class="mb-2"> myloginname@gmail.com </p>
                    <a href="#" class="btn btn-light btn-sm">Edit</a>
                </div>
            </figure>
            <hr>
            <p>
                <i class="fa fa-map-marker text-muted"></i> &nbsp; My address:
                <br>
                Tashkent city, Street name, Building 123, House 321 &nbsp
                <a href="#" class="btn-link"> Edit</a>
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
    <article class="card  mb-3">
        <div class="card-body">
            <h5 class="card-title mb-4">Recent orders </h5>

            <div class="row">
                <div class="col-md-6">
                    <figure class="itemside  mb-3">
                        <div class="aside"><img src="{{ asset('web/images/items/1.jpg') }}"
                                class="border img-sm">
                        </div>
                        <figcaption class="info">
                            <time class="text-muted"><i class="fa fa-calendar-alt"></i>
                                12.09.2019</time>
                            <p>Great book name goes here </p>
                            <span class="text-success">Order confirmed </span>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-md-6">
                    <figure class="itemside  mb-3">
                        <div class="aside"><img src="{{ asset('web/images/items/2.jpg') }}"
                                class="border img-sm">
                        </div>
                        <figcaption class="info">
                            <time class="text-muted"><i class="fa fa-calendar-alt"></i>
                                12.09.2019</time>
                            <p>How to be rich</p>
                            <span class="text-success">Departured</span>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-md-6">
                    <figure class="itemside mb-3">
                        <div class="aside"><img src="{{ asset('web/images/items/3.jpg') }}" class="border img-sm">
                        </div>
                        <figcaption class="info">
                            <time class="text-muted"><i class="fa fa-calendar-alt"></i>
                                12.09.2019</time>
                            <p>Harry Potter book </p>
                            <span class="text-success">Shipped </span>
                        </figcaption>
                    </figure>
                </div>
            </div>

            <a href="#" class="btn btn-outline-primary btn-block"> See all orders <i class="fa fa-chevron-down"></i> </a>
        </div>
    </article>

@endsection

@push('scripts')

    <script>
    </script>

@endpush
