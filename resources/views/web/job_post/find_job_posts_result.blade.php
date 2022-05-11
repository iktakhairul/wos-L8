@extends('web.job_post.index')
@section('title', 'Find Jobs')

@push('styles')

@endpush

@section('job_post_content')

<div class="row">
    <div class="container">
            <div class="row p-0">
                <div class="col-md-6">
                    <h4 class="mt-2">Available Job Posts</h4>
                </div>
                <div class="col-md-6 pt-2">
                    @if (request()->routeIs(['jobs.find-jobs.service-category-filter']))
                        <a class="btn btn-sm btn-outline-info pull-right ml-2 @if (request()->routeIs(['jobs.find-jobs'])) active @endif" href="{{ route('jobs.find-jobs') }}">All Job Posts</a>
                    @endif
                    <div class="dropdown float-right">
                        <a class="btn btn-sm btn-outline-info pull-right dropdown-toggle @if (request()->routeIs(['jobs.find-jobs.service-category-filter'])) active @endif" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Service Category Filter</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            @if(!empty($service_categories))
                                @foreach($service_categories as $key => $service_category)
                                    <a class="dropdown-item" href="{{ route('jobs.find-jobs.service-category-filter', $service_category->id) }}">{{ $service_category->name ?? old('service_category') }}</a>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="dropdown float-right mr-2">
                        <a class="btn btn-sm btn-outline-info pull-right dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Range</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            @if(!empty($profile['present_longitude']) && $profile['present_latitude'])
                                <a class="dropdown-item" href="{{ route('jobs.find-jobs', ['km' => 2]) }}">2 &#13218;</a>
                                <a class="dropdown-item" href="{{ route('jobs.find-jobs', ['km' => 5]) }}">5 &#13218;</a>
                                <a class="dropdown-item" href="{{ route('jobs.find-jobs', ['km' => 10]) }}">10 &#13218;</a>
                                <a class="dropdown-item" href="{{ route('jobs.find-jobs', ['km' => 50]) }}">50 &#13218;</a>
                            @endif
                            <a class="dropdown-item" href="{{ route('jobs.find-jobs.in-city') }}">In Your City</a>
                            <a class="dropdown-item" href="{{ route('jobs.find-jobs.in-country') }}">In Your Country</a>
                        </div>
                    </div>
                </div>
            </div>

        {{--Start Post Row--}}
        <div class="row pt-2">
            <div class="col-12">
                <ul class="list-group">
                    @if(count($available_job_posts) > 0 && $profile_status === true)
                        @foreach($available_job_posts as $key => $index)
                        <li class="list-group-item mb-2">
                            <div class="row">
                                <div class="col">

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="float-left job-post-title-div">
                                                <h2 class="text-success">{{ $index->title ?? ''}}</h2>
                                            </div>
                                            <div class="float-right job-proposal-btn">
                                                @if(!empty($own_responses) && !empty($own = $own_responses->firstWhere('job_post_id', '==', $index->id))  && $own->status !== '0.canceled_proposal')
                                                    <h6 class="text-primary float-left pt-2 pl-4 mr-3">Submitted</h6>
                                                    <a class="btn btn-outline-info" data-toggle="collapse" href="#collapseMyJobInfo{{$index->id}}" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-angle-down fa-lg"></i></a>
                                                @elseif(!empty($own_responses) && !empty($own = $own_responses->firstWhere('job_post_id', '==', $index->id)) && $own->status === '0.canceled_proposal')
                                                    <a class="btn btn-primary" href="{{ route('jobs.job-posts.resubmit-a-proposal', $own->id) }}" onclick="return confirm('Would you like to resubmit this job proposal?')">Resubmit Your Proposal</a>
                                                    <a class="btn btn-outline-info" data-toggle="collapse" href="#collapseMyJobInfo{{$index->id}}" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-angle-down fa-lg"></i></a>
                                                @else
                                                    <a class="btn btn-primary" href="{{ route('jobs.job-posts.submit-a-proposal', $index->id) }}">Submit A Proposal</a>
                                                    <a class="btn btn-outline-info" data-toggle="collapse" href="#collapseMyJobInfo{{$index->id}}" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-angle-down fa-lg"></i></a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <p><span class="text-info"><i class="fa fa-user mr-2"></i>{{ $index->user->name }}</span>, Required Persons: {{ $index->required_persons ?? '' }}</p>
                                    <h5>Service Category: {{ $index->service_category->name ?? ''}}, Budget: {{ $index->budget ?? '' }}<img src="{{ asset('/web/images/icons/taka.jpg') }}" alt=""></h5>
                                    <p class="font-weight-bold">Job Duration: ({{$index->start_datetime ?? ''}} - {{$index->end_datetime ?? ''}})</p>
                                    <p><i class="fa-solid fa-location-dot mr-2"></i>{{$index->address ?? ''}}</p>

                                    <div class="collapse" id="collapseMyJobInfo{{$index->id}}">
                                        <p class="font-weight-bold">Job Description</p>
                                        <div class="mb-2">{!!html_entity_decode($index->description)!!}</div>

                                        <div class="photo-box">
                                            <img id="logo" src="{{ $index->job_image ?? '' ? asset('img/'.$index->logo) : asset('img/dummy.jpg') }}" alt="{{ 'Not Found!'}}" class="img-responsive img-thumbnail img-fluid" style="max-width: 120px;">
                                        </div>

                                        <p class="font-weight-bold mt-4">Tags</p>
                                        @if(!empty($index->tags))
                                            <div class="mb-3">
                                                @foreach(explode(',',$index->tags) as $tag)
                                                    <span class="bg-gray p-2 rounded-pill">{{ $tag }}</span>
                                                @endforeach
                                            </div>
                                        @else
                                            <p>{{ $index->tags ?? 'No tags found!'}}</p>
                                        @endif
                                    </div>

                                    {{--Start Post Response--}}
                                    @if(!empty($index->job_responses))
                                        @if(count($index->job_responses) > 0)
                                            <a href="" class=""><p class="font-weight-bold">See Available Offers - [{{ count($index->job_responses) }}]</p></a>
                                            @foreach($index->job_responses as $key => $job_response)
                                                @if($job_response->status !== '0.canceled_proposal')
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
                                                                        <p>Demanded Budget: <span class="font-weight-bold">{{ $job_response->demanded_budget ?? '' }}</span><img src="{{ asset('/web/images/icons/taka.jpg') }}" alt="" style="height: 12px"></p>
                                                                    </div>
                                                                </figure>
                                                            </div>
                                                            <div class="col-sm-1">
                                                                <p>SL: {{$key+1}}
                                                                    <a class="float-right" data-toggle="collapse" href="#collapseJobResponseInfo{{$job_response->id}}" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-angle-down fa-lg"></i></a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="collapse" id="collapseJobResponseInfo{{$job_response->id}}">
                                                            <hr>
                                                            <p><i class="fa-solid fa-location-dot mr-2"></i> {{ $job_response->user->user_profile->present_address ?? '' }}

                                                            <article class="card-group card-stat">
                                                                <figure class="card bg">
                                                                    <div class="p-3">
                                                                        <h4 class="title">{{ $job_response->demanded_budget ?? '' }}<img src="{{ asset('/web/images/icons/taka.jpg') }}" alt=""></h4>
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
                                                    </div>
                                                </article>
                                                @endif
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
                                    {{--End Post Response--}}

                                </div>
                            </div>
                        </li>
                        @endforeach
                    @else
                        @if($profile_status === false)
                            <li class="list-group-item text-danger">
                                Please complete your profile if you want to work.
                                <a class="btn btn-sm btn-primary ml-2" href="{{ route('profile.profiles.edit-present-info', auth()->user()['id']) }}">Update Profile</a>
                            </li>

                        @else
                            <li class="list-group-item">No Post Found</li>
                        @endif
                    @endif
                </ul>
                @if(count($available_job_posts) > 0 )
                <div class="d-flex justify-content-center">
                    {!! $available_job_posts->links() !!}
                </div>
                @endif
            </div>
        </div>
        {{--End Post--}}

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
