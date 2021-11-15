@extends('web.user.job_post.index')
@section('title', 'My Active Work List')

@push('styles')

@endpush

@section('job_post_content')

<div class="row">
    <div class="container">
        <h4 class="mt-2">
            My Active Work List
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
                                    <p><i class="fa fa-user mr-2"></i>{{ $my_active_work->job_post->user->name }}</p>
                                    <h5>Service Category: {{ $my_active_work->job_post->service_category->name ?? ''}}, Budget: {{ $my_active_work->job_post->budget ?? '' }}<img src="{{ asset('/web/images/icons/taka.jpg') }}" alt=""></h5>
                                    <p class="font-weight-bold">Job Duration: ({{$my_active_work->job_post->start_datetime ?? ''}} - {{$my_active_work->job_post->end_datetime ?? ''}})</p>
                                    <p><i class="fa-solid fa-location-dot"></i>
                                        {{$my_active_work->job_post->address ?? ''}},
                                        {{$my_active_work->job_post->thana->name ?? ''}},
                                        {{$my_active_work->job_post->district->name ?? ''}},
                                        {{$my_active_work->job_post->division->name ?? ''}},
                                        {{$my_active_work->job_post->postal_code ?? ''}}
                                    </p>

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
                                                        <figure class="icontext">
                                                            <div class="icon">
                                                                <img class="rounded-circle img-sm border" src="{{ asset('web/images/avatars/avatar3.jpg') }}">
                                                            </div>
                                                            <div class="text">
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
                                                                        <a href="{{ route('profile.job-timelines.start-working', $my_active_work->id) }}" class="btn btn-sm btn-success" onclick="return confirm('Are you sure that you are going to start working for the job - {{$my_active_work->job_post->title}}?')">Start Working</a>
                                                                    @elseif($my_active_work->status === '2.start_working')
                                                                        <span class="text-success">Work Started</span>
                                                                    @elseif($my_active_work->status === '3.work_done')
                                                                        <span class="text-success">Work Done</span>
                                                                        <a href="{{ route('profile.job-timelines.start-working', $my_active_work->id) }}" class="btn btn-sm btn-success" onclick="return confirm('Are you sure that you are going to start working for the job - {{$my_active_work->job_post->title}}?')">Ask For Payment</a>
                                                                    @endif
                                                                    <a href="{{ route('profile.job-timelines.cancel-work-to-job-owner', $my_active_work->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Would you like to cancel this work - {{$my_active_work->job_post->title}}?')">Cancel Work</a>
                                                                </p>
                                                            </div>
                                                        </figure>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <a class="float-right" data-toggle="collapse" href="#collapseJobResponseInfo{{$my_active_work->id}}" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-angle-down fa-lg"></i></a>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="collapse" id="collapseJobResponseInfo{{$my_active_work->id}}">
                                                    <p>
                                                        <i class="fa-solid fa-location-dot"></i>
                                                        {{ $my_active_work->user->user_profile->present_address ?? '' }},
                                                        {{ $my_active_work->user->user_profile->present_thana->name ?? ''}},
                                                        {{ $my_active_work->user->user_profile->present_district->name ?? 'User profile not found!' }},
                                                        {{ $my_active_work->user->user_profile->present_division->name ?? ''}},
                                                        {{ $my_active_work->user->user_profile->present_postal_code ?? ''}}
                                                    </p>
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
                        <li class="list-group-item">You have no active placed job post.</li>
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
