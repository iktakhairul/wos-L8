@extends('web.job_post.index')
@section('title', 'My Work List')

@push('styles')

@endpush

@section('job_post_content')

<div class="row">
    <div class="container">
        <h4 class="mt-2">
            My Work List
        </h4>

        <div class="row">
            <div class="col-12">
                <ul class="list-group">
                    @if(count($my_active_works) > 0)
                        @foreach($my_active_works as $key => $my_active_work)
                        <li class="list-group-item mb-2">
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <h2>{{ $my_active_work->job_post->title ?? ''}}</h2>
                                        </div>
                                        <div class="col-sm-1 text-right">
                                            <a class="" data-toggle="collapse" href="#collapseJobInfo{{$my_active_work->job_post->id}}" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-angle-down fa-lg"></i></a>
                                        </div>
                                    </div>
                                    <p><span class="text-info"><i class="fa fa-user mr-2"></i>{{ $my_active_work->job_post->user->name ?? 'Job Owner' }}</span> - {{ $my_active_work->job_post->user->contact_number ?? $my_active_work->job_post->user->email }}</p>
                                    <h5>Service Category: {{ $my_active_work->job_post->service_category->name ?? ''}}, Budget: {{ $my_active_work->job_post->budget ?? '' }}<img src="{{ asset('/web/images/icons/taka.jpg') }}" alt=""></h5>
                                    <p class="font-weight-bold">Job Duration: ({{$my_active_work->job_post->start_datetime ?? ''}} - {{$my_active_work->job_post->end_datetime ?? ''}})</p>
                                    <p><i class="fa-solid fa-location-dot mr-2"></i>{{$my_active_work->job_post->address ?? ''}}</p>

                                    <div class="collapse" id="collapseJobInfo{{$my_active_work->job_post->id}}">
                                        <p class="font-weight-bold">Job Description</p>
                                        <div class="mb-2">{!!html_entity_decode($my_active_work->job_post->description)!!}</div>
                                        <div class="photo-box">
                                            <img id="logo" src="{{ $my_active_work->job_post->job_image ?? '' ? asset('img/'.$my_active_work->job_post->logo) : asset('img/dummy.jpg') }}" alt="{{ 'Not Found!'}}" class="img-responsive img-thumbnail img-fluid" style="max-width: 120px;">
                                        </div>

                                        <p class="font-weight-bold mt-4">Tags</p>
                                        @if(!empty($my_active_work->job_post->tags))
                                            <div class="mb-3">
                                                @foreach(explode(',',$my_active_work->job_post->tags) as $tag)
                                                    <span class="bg-gray p-2 rounded-pill" class="">{{ $tag }}</span>
                                                @endforeach
                                            </div>
                                        @else
                                            <p>{{ $my_active_work->job_post->tags ?? 'No tags found!'}}</p>
                                        @endif
                                    </div>

                                    <p class="font-weight-bold">My Proposal Details</p>
                                    @if(!empty($my_active_work))
                                        <article class="card mt-2 mb-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <figure class="row icontext">
                                                            <div class="col-md-2 icon">
                                                                <img class="rounded-circle img-sm border" width="75px" alt="" src="{{ asset('web/images/avatars/avatar3.jpg') }}">
                                                            </div>
                                                            <div class="col-md-10 text">
                                                                <strong> {{ $my_active_work->job_response->user->name ?? 'User not found!' }} </strong> <br>
                                                                <p class="mb-2"> {{ $my_active_work->job_response->user->email ?? 'User not found!' }}</p>
                                                                <p class="mb-2"> Ratings:
                                                                    <span class="fa fa-star" style="color: orange;"></span>
                                                                    <span class="fa fa-star" style="color: orange;"></span>
                                                                    <span class="fa fa-star" style="color: orange;"></span>
                                                                    <span class="fa fa-star" style="color: orange;"></span>
                                                                    <span class="fa fa-star"></span>
                                                                </p>
                                                                <p>Status:
                                                                    @if($my_active_work->status === '1.place_order')
                                                                        <span class="text-success">Placed Order</span>
                                                                        <a href="{{ route('jobs.job-timelines.start-working', $my_active_work->id) }}" class="btn btn-sm btn-success" onclick="return confirm('Are you sure that you are going to start working for the job - {{$my_active_work->job_post->title}}?')">Start Working</a>
                                                                    @elseif($my_active_work->status === '2.start_working')
                                                                        <span class="text-success">Working</span>
                                                                        <a href="{{ route('jobs.job-timelines.done-the-job', $my_active_work->id) }}" class="btn btn-sm btn-success" onclick="return confirm('Are you sure that you are done the job - {{$my_active_work->job_post->title}}?')">Work Done</a>
                                                                    @elseif($my_active_work->status === '3.work_done_from_worker')
                                                                        <span class="text-success">Work Done</span>, (Wait for confirmation from <span class="text-info">{{ $my_active_work->job_post->user->name ?? 'Job Owner' }}</span>)
                                                                    @elseif($my_active_work->status === '3.work_done_from_owner')
                                                                        <span class="text-success">Work Done</span>, (Wait for payment from <span class="text-info">{{ $my_active_work->job_post->user->name ?? 'Job Owner' }}</span> or direct contact to job owner: <span class="text-info">{{ $my_active_work->job_post->user->contact_number ?? $my_active_work->job_post->user->email }}</span>)
                                                                    @elseif($my_active_work->status === '4.payment_done_from_owner')
                                                                        <span class="text-success">Payment Done</span>
                                                                        <a href="{{ route('jobs.job-timelines.payment-confirmation-from-worker', $my_active_work->id) }}" class="btn btn-sm btn-success" onclick="return confirm('Are you sure that you already paid for - {{$my_active_work->job_post->title}}?')">Confirm Payment</a><br>
                                                                        (Please check your payment method that you gave to job owner <span class="text-info">{{ $my_active_work->job_post->user->name ?? 'Job Owner' }}</span>. If you aren't paid yet please contact to job owner: <span class="text-info">{{ $my_active_work->job_post->user->contact_number ?? $my_active_work->job_post->user->email }}</span>)
                                                                    @elseif($my_active_work->status === '4.payment_confirmed_by_worker')
                                                                        <span class="text-success">Payment Confirmed</span>, Please give rating to <span class="text-info">{{ $my_active_work->job_post->user->name ?? 'Job Owner' }}</span>.
                                                                        <a class="btn btn-sm btn-success" data-toggle="collapse" href="#collapseJobOwnerRating{{$my_active_work->id}}" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-angle-down mr-2"></i>Rating And Comments</a>
                                                                    @elseif(empty($my_active_work->user_ratings->where('job_timeline_id', $my_active_work->id)->where('type', 'job_owner')->first()))
                                                                        <span class="text-success">Payment Confirmed</span>, Please give rating to <span class="text-info">{{ $my_active_work->job_post->user->name ?? 'Job Owner' }}</span>.
                                                                        <a class="btn btn-sm btn-success" data-toggle="collapse" href="#collapseJobOwnerRating{{$my_active_work->id}}" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-angle-down mr-2"></i>Rating And Comments</a>
                                                                    @elseif(!empty($my_active_work->user_ratings->where('job_timeline_id', $my_active_work->id)->where('type', 'job_owner')->first()))
                                                                        <span class="text-success">Complete</span>
                                                                    @endif
                                                                </p>
                                                            </div>
                                                        </figure>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <a class="float-right" data-toggle="collapse" href="#collapseJobResponseInfo{{$my_active_work->id}}" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-angle-down fa-lg"></i></a>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="collapse" id="collapseJobOwnerRating{{$my_active_work->id}}">
                                                    <article class="card-body">
                                                        <p class="font-weight-bold">Ratings and Comments to <span class="text-info">{{ $my_active_work->job_post->user->name ?? 'Job Owner' }}
                                                        <form class="form-horizontal" role="form" method="POST" action="{{ route('jobs.job-timelines.ratings-and-comments-to-owner') }}">
                                                            @csrf
                                                            <input type="text" class="hide" hidden name="job_post_id" value="{{ $my_active_work->job_post->id }}">
                                                            <input type="text" class="hide" hidden name="job_timeline_id" value="{{ $my_active_work->id }}">
                                                            <input type="text" class="hide" hidden name="job_post_user_id" value="{{ $my_active_work->job_post->user->id }}">
                                                            {{--Row--}}
                                                            <div class="form-row form-group">
                                                                <div class="col-md-2 text-md-right">
                                                                    <label for="comments" class="pt-2">Comments<small class="text-danger">*</small></label>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <textarea class="form-control" id="comments" name="comments" placeholder="Write your work experience with {{ $my_active_work->job_post->user->name ?? 'Job Owner' }}." required="" autofocus="">{{ old('comments') }}</textarea>
                                                                </div>
                                                            </div>
                                                            {{--Row--}}
                                                            <div class="form-row form-group">
                                                                <div class="col-md-2 text-md-right">
                                                                    <label for="ratings" class="pt-2">Ratings<small class="text-danger">*</small></label>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <input type="text" class="form-control" id="ratings" name="ratings" value="{{ old('ratings') }}" placeholder="4.6" required="">
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </article>
                                                </div>
                                                <div class="collapse" id="collapseJobResponseInfo{{$my_active_work->id}}">
                                                    <p><i class="fa-solid fa-location-dot mr-2"></i>{{ $my_active_work->job_post->user->user_profile->present_address ?? 'Not Found' }}</p>
                                                    <p class="font-weight-bold">Description</p>
                                                    <div class="mb-2">{!!html_entity_decode($my_active_work->job_response->description)!!}</div>
                                                </div>

                                                <article class="card-group card-stat">
                                                    <figure class="card bg">
                                                        <div class="p-3">
                                                            <h4 class="title">{{ $my_active_work->job_response->demanded_budget ?? '' }}<img src="{{ asset('/web/images/icons/taka.jpg') }}" alt=""></h4>
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
                                    <br>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    @else
                        <li class="list-group-item">You have no active work right now. <a class="btn btn-success btn-sm" href="{{ route('jobs.find-jobs') }}">Find Jobs</a></li>
                    @endif
                </ul>
                <div class="d-flex justify-content-center">
                    {!! $my_active_works->links() !!}
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
