@extends('web.user.job_post.index')
@section('title', 'My Job Timeline')

@push('styles')

@endpush

@section('job_post_content')

<div class="row">
    <div class="container">
        <h4 class="mt-2">
            My Job Timeline
        </h4>

        <div class="row">
            <div class="col-12">
                <ul class="list-group">
                    @if(count($my_active_job_posts) > 0)
                        @foreach($my_active_job_posts as $key => $job_post)
                        <li class="list-group-item mb-2">
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <h2>{{ $job_post->title ?? ''}}</h2>
                                        </div>
                                        <div class="col-sm-1 text-right">
                                            <a class="" data-toggle="collapse" href="#collapseJobInfo{{$job_post->id}}" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-angle-down fa-lg"></i></a>
                                        </div>
                                    </div>

                                    <h5>Service Category: {{ $job_post->service_category->name ?? ''}}, Budget: {{ $job_post->budget ?? '' }}<img src="{{ asset('/web/images/icons/taka.jpg') }}" alt=""></h5>
                                    <p class="font-weight-bold">Job Duration: ({{$job_post->start_datetime ?? ''}} - {{$job_post->end_datetime ?? ''}})</p>
                                    <p><i class="fa-solid fa-location-dot"></i>
                                        {{$job_post->address ?? ''}},
                                        {{$job_post->thana->name ?? ''}},
                                        {{$job_post->district->name ?? ''}},
                                        {{$job_post->division->name ?? ''}},
                                        {{$job_post->postal_code ?? ''}}
                                    </p>

                                    <div class="collapse" id="collapseJobInfo{{$job_post->id}}">
                                        <p class="font-weight-bold">Job Description</p>
                                        <div class="mb-2">{!!html_entity_decode($job_post->description)!!}</div>
                                        <div class="photo-box">
                                            <img id="logo" src="{{ $job_post->job_image ?? '' ? asset('img/'.$job_post->logo) : asset('img/dummy.jpg') }}" alt="{{ 'Not Found!'}}" class="img-responsive img-thumbnail img-fluid" style="max-width: 120px;">
                                        </div>

                                        <p class="font-weight-bold mt-4">Tags</p>
                                        @if(!empty($job_post->tags))
                                            <div class="mb-3">
                                                @foreach(explode(',',$job_post->tags) as $tag)
                                                    <span class="bg-gray p-2 rounded-pill" class="">{{ $tag }}</span>
                                                @endforeach
                                            </div>
                                        @else
                                            <p>{{ $job_post->tags ?? 'No tags found!'}}</p>
                                        @endif
                                    </div>

                                    <a href="" class=""><p class="font-weight-bold">Placed Order To</p></a>
                                    @if(count($job_post->job_responses) > 0)
                                        @foreach($job_post->job_responses as $key => $job_response)
                                            @foreach($job_post->job_timeline as $job_timeline)
                                                @if( $job_timeline->status !== 'complete' && $job_timeline->job_response_id === $job_response->id)
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
                                                                            <p>Status:
                                                                                @if($job_timeline->status === '1.place_order')
                                                                                    <span class="text-success">Placed Order</span>
                                                                                    <a href="{{ route('profile.job-timelines.cancel-work-to-worker', $job_timeline->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Would you like to cancel this work?')">Cancel Order</a>
                                                                                @elseif($job_timeline->status === '2.start_working')
                                                                                    <span class="text-success">Work Started</span>
                                                                                    <a href="{{ route('profile.job-timelines.cancel-work-to-worker', $job_timeline->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Would you like to cancel this work?')">Cancel Order</a>
                                                                                @elseif($job_timeline->status === '3.work_done')
                                                                                    <span class="text-success">Work Done</span>
                                                                                    <a href="{{ route('profile.job-timelines.cancel-work-to-worker', $job_timeline->id) }}" class="btn btn-sm btn-outline-info" onclick="return confirm('Would you like to cancel this work?')">Pay For Work</a>
                                                                                @elseif($job_timeline->status === '4.ask_for_payment')
                                                                                    <span class="text-success">Pay Now</span>
                                                                                    <a href="{{ route('profile.job-timelines.cancel-work-to-worker', $job_timeline->id) }}" class="btn btn-sm btn-success" onclick="return confirm('Would you like to cancel this work?')">Cancel Order</a>
                                                                                @endif
                                                                            </p>
                                                                        </div>
                                                                    </figure>
                                                                </div>
                                                                <div class="col-sm-1">
                                                                    <a class="float-right" data-toggle="collapse" href="#collapseJobResponseInfo{{$job_response->id}}" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-angle-down fa-lg"></i></a>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="collapse" id="collapseJobResponseInfo{{$job_response->id}}">
                                                                <p>
                                                                    <i class="fa-solid fa-location-dot"></i>
                                                                    {{ $job_response->user->user_profile->present_address ?? '' }},
                                                                    {{ $job_response->user->user_profile->present_thana->name ?? ''}},
                                                                    {{ $job_response->user->user_profile->present_district->name ?? 'User profile not found!' }},
                                                                    {{ $job_response->user->user_profile->present_division->name ?? ''}},
                                                                    {{ $job_response->user->user_profile->present_postal_code ?? ''}}
                                                                </p>
                                                                <p>Contact: <span class="font-weight-bold">{{ !empty($job_response->user->contact_number) ? $job_response->user->contact_number : $job_response->user->email }}</span></p>
                                                                <p class="font-weight-bold">Description</p>
                                                                <div class="mb-2">{!!html_entity_decode($job_response->description)!!}</div>
                                                                <p>Comments: {{ $job_timeline->comments }}</p>
                                                            </div>

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
                                                @endif
                                            @endforeach
                                        @endforeach
                                    @endif
                                    <br>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    @else
                        <li class="list-group-item">You have no active placed job post.</li>
                    @endif
                </ul>
                <div class="d-flex justify-content-center">
                    {!! $my_active_job_posts->links() !!}
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
