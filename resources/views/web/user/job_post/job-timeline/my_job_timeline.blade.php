@extends('web.user.job_post.index')
@section('title', 'Job Post List')

@push('styles')

@endpush

@section('job_post_content')

<div class="row">
    <div class="container">
        <h4 class="mt-2">
            My Active Jobs Timeline
        </h4>

        <div class="row">
            <div class="col-12">
                <ul class="list-group">
                    @if(count($my_active_orders) > 0)
                        @foreach($my_active_orders as $key => $index)
                        <li class="list-group-item mb-2">
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <h2>{{ $index->job_post->title ?? ''}}</h2>
                                        </div>
                                        <div class="col-sm-1 text-right">
                                            <a href="{{ route('profile.job-posts.edit', $index->id) }}"><i class="fa fa-edit fa-lg"></i></a>
                                        </div>
                                    </div>
                                    <h5>Service Category: {{ $index->job_post->service_category->name ?? ''}}, Budget: {{ $index->job_post->budget ?? '' }}<img src="{{ asset('/web/images/icons/taka.jpg') }}" alt=""></h5>
                                    <p class="font-weight-bold">Job Duration: ({{$index->job_post->start_datetime ?? ''}} - {{$index->job_post->end_datetime ?? ''}})</p>
                                    <p><i class="fa-solid fa-location-dot"></i>
                                        {{$index->job_post->address ?? ''}},
                                        {{$index->job_post->thana->name ?? ''}},
                                        {{$index->job_post->district->name ?? ''}},
                                        {{$index->job_post->division->name ?? ''}},
                                        {{$index->job_post->postal_code ?? ''}}
                                    </p>

                                    <p class="font-weight-bold">Job Description</p>
                                    <div class="mb-2">{!!html_entity_decode($index->job_post->description)!!}</div>
                                    <div class="photo-box">
                                        <img id="logo" src="{{ $index->job_post->job_image ?? '' ? asset('img/'.$index->job_post->logo) : asset('img/dummy.jpg') }}" alt="{{ 'Not Found!'}}" class="img-responsive img-thumbnail img-fluid" style="max-width: 120px;">
                                    </div>

                                    <p class="font-weight-bold mt-4">Tags</p>
                                    @if(!empty($index->job_post->tags))
                                        <div class="mb-3">
                                            @foreach(explode(',',$index->job_post->tags) as $tag)
                                                <span class="bg-gray p-2 rounded-pill" class="">{{ $tag }}</span>
                                            @endforeach
                                        </div>
                                    @else
                                        <p>{{ $index->job_post->tags ?? 'No tags found!'}}</p>
                                    @endif

                                    @if(!empty($index->job_post->job_responses))
                                        @if(count($index->job_post->job_responses) > 0)
                                            <a href="" class=""><p class="font-weight-bold">Available Offers - [{{ count($index->job_post->job_responses) }}]</p></a>
                                            @foreach($index->job_post->job_responses as $key => $job_response)
                                                <article class="card mt-2 mb-3">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col">
                                                                <figure class="icontext">
                                                                    <div class="icon">
                                                                        <img class="rounded-circle img-sm border" src="{{ asset('web/images/avatars/avatar3.jpg') }}">
                                                                    </div>
                                                                    <div class="text">
                                                                        <strong> {{ $job_response->user->name ?? 'User not found!' }} </strong> <br>
                                                                        <p class="mb-2"> {{ $job_response->user->email ?? 'User not found!' }}</p>
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

                                                        <p class="font-weight-bold">Description</p>
                                                        <div class="mb-2">{!!html_entity_decode($job_response->description)!!}</div>

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
                                                                    <h4 class="title">50</h4>
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
                <div class="d-flex justify-content-center">
                    {!! $my_active_orders->links() !!}
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
