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
                                    <p><i class="fa-solid fa-location-dot mr-2"></i>{{$job_post->address ?? ''}}</p>

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
                                                                            <p>Status:
                                                                                @if($job_timeline->status === '1.place_order')
                                                                                    <span class="text-success">Placed Order</span>
{{--                                                                                    <a href="{{ route('profile.job-timelines.cancel-work-to-worker', $job_timeline->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Would you like to cancel this work?')">Cancel Order</a>--}}
                                                                                @elseif($job_timeline->status === '2.start_working')
                                                                                    <span class="text-success">Working</span>
{{--                                                                                    <a href="{{ route('profile.job-timelines.cancel-work-to-worker', $job_timeline->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Would you like to cancel this work?')">Cancel Order</a>--}}
                                                                                @elseif($job_timeline->status === '3.work_done_from_worker')
                                                                                    <span class="text-success">Work Done</span>
                                                                                    <a href="{{ route('jobs.job-timelines.work-done-from-owner', $job_timeline->id) }}" class="btn btn-sm btn-outline-info active" onclick="return confirm('Are you sure that work is done - {{ $job_post->title }}?')">Mark As Done</a>
{{--                                                                                    <a href="{{ route('profile.job-timelines.cancel-work-to-worker', $job_timeline->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Would you like to cancel this work?')">Cancel Order</a>--}}
                                                                                @elseif($job_timeline->status === '3.work_done_from_owner')
                                                                                    <span class="text-success">Work Done</span>, Please pay for work to <span class="text-info">{{ $job_response->user->name ?? 'Job Worker' }}</span> and click on -
                                                                                    <a href="{{ route('jobs.job-timelines.payment-done-from-owner', $job_timeline->id) }}" class="btn btn-sm btn-outline-info">Payment Done</a>
                                                                                @elseif($job_timeline->status === '4.payment_done_from_owner')
                                                                                    <span class="text-success">Paid For Work</span>, (Wait for payment confirmation from worker: <span class="text-info">{{ $job_response->user->name ?? 'Job Worker' }}</span>)
                                                                                @elseif($job_timeline->status === '4.payment_confirmed_by_worker')
                                                                                    <span class="text-success">Payment Confirmed</span>, Please give rating to <span class="text-info">{{ $job_response->user->name ?? 'Job Worker' }}</span>.
                                                                                    <a class="btn btn-sm btn-success" data-toggle="collapse" href="#collapseWorkerRating{{$job_timeline->id}}" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-angle-down mr-2"></i>Rating And Comments</a>
                                                                                @elseif(empty($job_post->user_ratings->where('job_timeline_id', $job_timeline->id)->where('type', 'job_worker')->first()))
                                                                                    <span class="text-success">Payment Confirmed</span>, Please give rating to <span class="text-info">{{ $job_response->user->name ?? 'Job Worker' }}</span>.
                                                                                    <a class="btn btn-sm btn-success" data-toggle="collapse" href="#collapseWorkerRating{{$job_timeline->id}}" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-angle-down mr-2"></i>Rating And Comments</a>
                                                                                @elseif(!empty($job_post->user_ratings->where('job_timeline_id', $job_timeline->id)->where('type', 'job_worker')->first()))
                                                                                    <span class="text-success">Complete</span>
                                                                                @endif
                                                                            </p>
                                                                        </div>
                                                                    </figure>
                                                                </div>
                                                                <div class="col">
                                                                    <p>Contact: <span class="font-weight-bold">{{ !empty($job_response->user->contact_number) ? $job_response->user->contact_number : $job_response->user->email }}</span></p>
                                                                    <p class="mb-2"> Ratings:
                                                                        <span class="fa fa-star" style="color: orange;"></span>
                                                                        <span class="fa fa-star" style="color: orange;"></span>
                                                                        <span class="fa fa-star" style="color: orange;"></span>
                                                                        <span class="fa fa-star" style="color: orange;"></span>
                                                                        <span class="fa fa-star"></span>
                                                                    </p>
                                                                </div>
                                                                <div class="col-sm-1">
                                                                    <a class="float-right" data-toggle="collapse" href="#collapseJobResponseInfo{{$job_response->id}}" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-angle-down fa-lg"></i></a>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="collapse" id="collapseWorkerRating{{$job_timeline->id}}">
                                                                <article class="card-body">
                                                                    <p class="font-weight-bold">Ratings and Comments to <span class="text-info">{{ $job_response->user->name ?? 'Job Worker' }}
                                                                    <form class="form-horizontal" role="form" method="POST" action="{{ route('jobs.job-timelines.ratings-and-comments-to-worker') }}">
                                                                        @csrf
                                                                        <input type="text" class="hide" hidden name="job_post_id" value="{{ $job_post->id }}">
                                                                        <input type="text" class="hide" hidden name="job_timeline_id" value="{{ $job_timeline->id }}">
                                                                        <input type="text" class="hide" hidden name="job_worker_user_id" value="{{ $job_response->user->id }}">
                                                                        {{--Row--}}
                                                                        <div class="form-row form-group">
                                                                            <div class="col-md-2 text-md-right">
                                                                                <label for="comments" class="pt-2">Comments<small class="text-danger">*</small></label>
                                                                            </div>
                                                                            <div class="col-md-9">
                                                                                <textarea class="form-control" id="comments" name="comments" placeholder="Write your experience with {{ $job_response->user->name?? 'Job Worker' }}." required="" autofocus="">{{ old('comments') }}</textarea>
                                                                            </div>
                                                                        </div>
                                                                        {{--Row--}}
                                                                        <div class="form-row form-group">
                                                                            <div class="col-md-2 text-md-right">
                                                                                <label for="ratings" class="pt-2">Ratings<small class="text-danger">*</small></label>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <input type="text" class="form-control" id="ratings" name="ratings" value="{{ old('ratings') }}" placeholder="4.8" required="">
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </article>
                                                            </div>

                                                            <div class="collapse" id="collapseJobResponseInfo{{$job_response->id}}">
                                                                <p>
                                                                    <i class="fa-solid fa-location-dot"></i>
                                                                    {{ $job_response->user->user_profile->present_address ?? $job_response->user->user_profile->present_city. ',' . $job_response->user->user_profile->present_country }}
                                                                </p>
                                                                <p class="font-weight-bold">Description</p>
                                                                <div class="mb-2">{!!html_entity_decode($job_response->description)!!}</div>
                                                                <p>Comments: {{ $job_timeline->comments }}</p>
                                                            </div>

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
                        <li class="list-group-item">Your job timeline is empty right now.</li>
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
