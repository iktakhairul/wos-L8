@extends('web.user.job_post.index')
@section('title', 'Find Jobs')

@push('styles')

@endpush

@section('job_post_content')

<div class="row">
    <div class="container">
            <h4 class="mt-2">
                Available Job Posts
                @if (request()->routeIs(['profile.find-jobs.service-category-filter']))
                    <a class="btn btn-sm btn-outline-info pull-right ml-2 @if (request()->routeIs(['profile.find-jobs'])) active @endif" href="{{ route('profile.find-jobs') }}">All Job Posts</a>
                @endif
                <div class="dropdown pull-right">
                    <a class="btn btn-sm btn-outline-info pull-right dropdown-toggle @if (request()->routeIs(['profile.find-jobs.service-category-filter'])) active @endif" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Service Category Filter</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        @if(!empty($service_categories))
                        @foreach($service_categories as $key => $service_category)
                                <a class="dropdown-item" href="{{ route('profile.find-jobs.service-category-filter', $service_category->id) }}">{{ $service_category->name ?? old('service_category') }}</a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </h4>

        <div class="row">
            <div class="col-12">
                <ul class="list-group">
                    @if(count($available_job_posts) > 0)
                        @foreach($available_job_posts as $key => $index)
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <h2>{{ $index->title ?? ''}}</h2>
                                        </div>
                                        <div class="col-sm-1 text-right">
                                            <a href="{{ route('profile.job-posts.edit', $index->id) }}"><i class="fa fa-edit fa-lg"></i></a>
                                        </div>
                                    </div>
                                    <h5>Service Category: {{ $index->service_category->name ?? ''}}, Budget: {{ $index->budget ?? '' }}<img src="{{ asset('/web/images/icons/taka.jpg') }}" alt=""></h5>
                                    <p class="font-weight-bold">Job Duration: ({{$index->start_datetime ?? ''}} - {{$index->end_datetime ?? ''}})</p>
                                    <p><i class="fa-solid fa-location-dot"></i>
                                        {{$index->address ?? ''}},
                                        {{$index->thana->name ?? ''}},
                                        {{$index->district->name ?? ''}},
                                        {{$index->division->name ?? ''}},
                                        {{$index->postal_code ?? ''}}
                                    </p>

                                    <p class="font-weight-bold">Job Description</p>
                                    <p>{{ $index->description ?? ''}}</p>
                                    <div class="photo-box">
                                        <img id="logo" src="{{ $index->job_image ?? '' ? asset('img/'.$index->logo) : asset('img/dummy.jpg') }}" alt="{{ 'Not Found!'}}" class="img-responsive img-thumbnail img-fluid" style="max-width: 120px;">
                                    </div>

                                    <p class="font-weight-bold mt-4">Tags</p>
                                    @if(!empty($index->tags))
                                        <div class="mb-3">
                                            @foreach(explode(',',$index->tags) as $tag)
                                                <span class="bg-gray p-2 rounded-pill" class="">{{ $tag }}</span>
                                            @endforeach
                                        </div>
                                    @else
                                        <p>{{ $index->tags ?? 'No tags found!'}}</p>
                                    @endif

                                    @if(!empty($index->job_responses))
                                        @if(count($index->job_responses) > 0)
                                            <a href="" class=""><p class="font-weight-bold">Available Offers - [{{ count($index->job_responses) }}]</p></a>
                                            @foreach($index->job_responses as $key => $job_response)
                                                <article class="card mt-2 mb-3">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col">
                                                                <figure class="icontext">
                                                                    <div class="text">
                                                                        <p class="font-weight-bold">User Type: {{ !empty($job_response->user->contact_number) ? 'Verified User' : 'Unverified User' }}</p>
                                                                        <p class="mb-2"> Ratings:
                                                                            <span class="fa fa-star" style="color: orange;"></span>
                                                                            <span class="fa fa-star" style="color: orange;"></span>
                                                                            <span class="fa fa-star" style="color: orange;"></span>
                                                                            <span class="fa fa-star" style="color: orange;"></span>
                                                                            <span class="fa fa-star"></span>
                                                                        </p>
                                                                    </div>
                                                                </figure>
                                                            </div>
                                                            <div class="col-sm-1">
                                                                <div>SL: {{$key+1}}</div>

                                                            </div>
                                                        </div>
                                                        <hr>

                                                        <p><i class="fa-solid fa-location-dot"></i> {{ $job_response->user->user_profile->present_address ?? '' }},
                                                            {{ $job_response->user->user_profile->present_thana->name ?? ''}},
                                                            {{ $job_response->user->user_profile->present_district->name ?? 'User profile not found!' }},
                                                            {{ $job_response->user->user_profile->present_division->name ?? ''}},
                                                            {{ $job_response->user->user_profile->present_postal_code ?? ''}}</p>

                                                        <article class="card-group card-stat">
                                                            <figure class="card bg">
                                                                <div class="p-3">
                                                                    <h4 class="title">{{ $job_response->demanded_budget ?? '' }}</h4>
                                                                    <span>Demanded Budget</span>
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
                                                                    <h4 class="title">75</h4>
                                                                    <span>Complete Orders</span>
                                                                </div>
                                                            </figure>
                                                        </article>
                                                    </div>
                                                </article>
                                            @endforeach

                                        @endif
                                    @else
                                        <div class="row ml-4 mb-2">
                                            <div class="col">
                                                <p>{{ 'Offer not found yet!' }}</p>
                                            </div>
                                        </div>
                                    @endif
                                    <br>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    @else
                        <li class="list-group-item">No Post Found</li>
                    @endif
                </ul>
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
