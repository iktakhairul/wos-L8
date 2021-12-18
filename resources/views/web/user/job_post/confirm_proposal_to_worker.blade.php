@extends('web.user.job_post.index')
@section('title', 'Confirm Proposal')

@push('styles')
    <link href="{{ asset('plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endpush

@section('job_post_content')

    <div class="row">
        <div class="container">
            <h4>Confirm Proposal</h4>
            @if(!empty($job_response))
            <div class="card mx-auto">
                <div class="row">
                    <div class="col-12">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <h2>{{ $job_response->job_post->title ?? ''}}</h2>
                                            </div>
                                            <div class="col-sm-3 text-right">
                                                <a class="mr-4" href="{{ route('jobs.find-jobs') }}"><i class="fa fa-lg fa-arrow-left"></i></a>
                                                <a class="" data-toggle="collapse" href="#collapseMyJobInfo{{$job_response->job_post->id}}" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-angle-down fa-lg"></i></a>
                                            </div>
                                        </div>
                                        <h5>Service Category: {{ $job_response->job_post->service_category->name ?? ''}}, Budget: {{ $job_response->job_post->budget ?? '' }}<img src="{{ asset('/web/images/icons/taka.jpg') }}" alt=""></h5>
                                        <p class="font-weight-bold">Job Duration: ({{$job_response->job_post->start_datetime ?? ''}} - {{$job_response->job_post->end_datetime ?? ''}})</p>
                                        <p><i class="fa-solid fa-location-dot"></i>
                                            {{$job_response->job_post->address ?? ''}},
                                            {{$job_response->job_post->thana->name ?? ''}},
                                            {{$job_response->job_post->district->name ?? ''}},
                                            {{$job_response->job_post->division->name ?? ''}},
                                            {{$job_response->job_post->postal_code ?? ''}}
                                        </p>
                                        <div class="collapse" id="collapseMyJobInfo{{$job_response->job_post->id}}">
                                            <p class="font-weight-bold">Job Description</p>
                                            <div class="mb-2">{!!html_entity_decode($job_response->job_post->description)!!}</div>
                                            <div class="photo-box">
                                                <img id="logo" src="{{ $job_response->job_post->job_image ?? '' ? asset('img/'.$job_response->job_post->logo) : asset('img/dummy.jpg') }}" alt="{{ 'Not Found!'}}" class="img-responsive img-thumbnail img-fluid" style="max-width: 120px;">
                                            </div>

                                            <p class="font-weight-bold mt-4">Tags</p>
                                            @if(!empty($job_response->job_post->tags))
                                                <div class="mb-3">
                                                    @foreach(explode(',',$job_response->job_post->tags) as $tag)
                                                        <span class="bg-gray p-2 rounded-pill" class="">{{ $tag }}</span>
                                                    @endforeach
                                                </div>
                                            @else
                                                <p>{{ $job_response->job_post->tags ?? 'No tags found!'}}</p>
                                            @endif
                                            <hr>
                                        </div>
                                        <h4>Proposal Details</h4>
                                        <article class="card mt-2 mb-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <figure class="row icontext">
                                                            <div class="col-md-2 icon">
                                                                <img class="rounded-circle img-sm border" width="75px" alt="" src="{{ asset('web/images/avatars/avatar3.jpg') }}">
                                                            </div>
                                                            <div class="col-md-10 text">
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
                                                        <div>SL: {{1}}</div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <p><i class="fa-solid fa-location-dot"></i> {{ $job_response->user->user_profile->present_address ?? '' }},
                                                    {{ $job_response->user->user_profile->present_thana->name ?? ''}},
                                                    {{ $job_response->user->user_profile->present_district->name ?? 'User profile not found!' }},
                                                    {{ $job_response->user->user_profile->present_division->name ?? ''}},
                                                    {{ $job_response->user->user_profile->present_postal_code ?? ''}}</p>

                                                <p>Contact: <span class="font-weight-bold">{{ !empty($job_response->user->contact_number) ? $job_response->user->contact_number : $job_response->user->email }}</span></p>
                                                <p class="font-weight-bold">Description</p>
                                                <div class="mb-2">{!!html_entity_decode($job_response->description)!!}</div>

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
                                        <h4>To Worker</h4>
                                        @if(!empty($job_response))
                                            <div class="">
                                                <form class="form-horizontal" role="form" method="POST" action="{{ !empty($editRow) ? route('jobs.job-timelines.update', $editRow->id) : route('jobs.job-timelines.store') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    @if(!empty($editRow))
                                                        {{ method_field('PATCH') }}
                                                    @endif

                                                    <input type="text" class="hide" hidden name="job_post_id" value="{{ !empty($job_response->job_post) ? $job_response->job_post->id : '' }}">
                                                    <input type="text" class="hide" hidden name="job_response_id" value="{{ $job_response->id }}">
                                                    <input type="text" class="hide" hidden name="job_worker_user_id" value="{{ $job_response->user_id }}">

                                                    {{--Row--}}
                                                    <div class="form-row form-group">
                                                        <div class="col-md-3 text-md-right">
                                                            <label for="comments" class="pt-2">Comments To Worker<small class="text-danger">*</small></label>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <textarea class="form-control" id="comments" name="comments" placeholder="Comments for worker that worker need to know." required="" autofocus="">{{ !empty($editRow) ? $editRow->comments : old('comments') }}</textarea>
                                                        </div>
                                                    </div>
                                                    {{--Row--}}
                                                    <div class="form-row form-group">
                                                        <div class="col-md-3 text-md-right">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" checked="" required="">
                                                                    <div class="custom-control-label"> I am agree with <a href="#">terms and conditions</a></div>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5 text-right">
                                                            <button type="submit" class="btn btn-primary">Place Order</button>
                                                        </div>
                                                    </div>
                                                    {{--End Row--}}
                                                </form>
                                            </div>
                                        @else
                                            <p></p>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endif
        </div>

    </div>

@endsection

@push('scripts')
    <script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
@endpush
