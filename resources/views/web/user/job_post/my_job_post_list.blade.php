@extends('web.user.job_post.index')
@section('title', 'Job Post List')

@push('styles')

@endpush

@section('job_post_content')

<div class="row">
    <div class="container">
        <h4 class="mt-2">
            My Job Post List
            <a class="btn btn-sm btn-outline-info pull-right" href="{{ route('jobs.job-posts.create') }}">Create Job Post</a>
        </h4>
        <div class="row">
            <div class="col-12">
                <ul class="list-group">
                    @if(count($job_posts) > 0)
                        @foreach($job_posts as $key => $index)
                        <li class="list-group-item mb-2">
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <h2>{{ $index->title ?? ''}}</h2>
                                        </div>
                                        @if(!empty($my_orders->firstWhere('job_post_id', $index->id)))
                                            <div class="col-sm-1 text-right">
                                                <a class="" data-toggle="collapse" href="#collapseMyJobInfo{{$index->id}}" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-angle-down fa-lg"></i></a>
                                            </div>
                                        @else
                                            <div class="col-sm-2 text-right">
                                                <a href="{{ route('jobs.job-posts.edit', $index->id) }}"><i class="fa fa-edit fa-lg"></i></a>
                                                <a class="ml-2" data-toggle="collapse" href="#collapseMyJobInfo{{$index->id}}" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-angle-down fa-lg"></i></a>
                                            </div>
                                        @endif
                                    </div>
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
                                                    <span class="bg-gray p-2 rounded-pill" class="">{{ $tag }}</span>
                                                @endforeach
                                            </div>
                                        @else
                                            <p>{{ $index->tags ?? 'No tags found!'}}</p>
                                        @endif
                                    </div>

                                    @if(!empty($index->job_responses))
                                        @if(count($index->job_responses) > 0)
                                            <a href="" class=""><p class="font-weight-bold">Available Offers - [{{ count($index->job_responses) }}]</p></a>
                                            @foreach($index->job_responses as $key => $job_response)
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

                                                                        @if($my_orders->firstWhere('job_response_id', $job_response->id) && $job_response->status === '1.confirm_order')
                                                                            <p>Status: <span class="text-success">Order Confirmed</span>, Check My Job Timeline
{{--                                                                            @if($index->job_timeline->where('job_post_id', $index->id)->where('job_response_id', $job_response->id)->first()['status'] === '1.place_order')--}}
{{--                                                                                <a href="{{ route('jobs.job-post-responses.cancel-order', $job_response->id) }}" class="btn btn-sm btn-outline-info" onclick="return confirm('Would you like to cancel this order to {{$job_response->user->name}} ?')">Cancel Order</a>--}}
{{--                                                                            @endif--}}
                                                                            </p>
                                                                        @elseif($my_orders->firstWhere('job_response_id', $job_response->id) && $job_response->status === '0.canceled_order')
                                                                            <a href="" class="btn btn-sm btn-outline-info active">Order Canceled</a>
                                                                            <a href="{{ route('jobs.job-post-responses.reconfirm-proposal', $job_response->id) }}" class="btn btn-sm btn-outline-primary">Reconfirm Proposal</a>
                                                                        @else
                                                                            <a href="{{ route('jobs.job-post-responses.confirm-proposal', $job_response->id) }}" class="btn btn-sm btn-outline-primary">Confirm Proposal</a>
                                                                        @endif
                                                                    </div>
                                                                </figure>
                                                            </div>
                                                            <div class="col-sm-1">
                                                                <p>SL: {{$key+1}}
                                                                    <a class="float-right" data-toggle="collapse" href="#collapseJobResponseInfo{{$job_response->id}}" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-angle-down fa-lg"></i></a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="collapse" id="collapseJobResponseInfo{{$job_response->id}}">
                                                            <hr>
                                                            <p><i class="fa-solid fa-location-dot"></i>
                                                                {{ $job_response->user->user_profile->present_address ?? '' }},
                                                                {{ $job_response->user->user_profile->present_thana->name ?? ''}},
                                                                {{ $job_response->user->user_profile->present_district->name ?? 'User profile not found!' }},
                                                                {{ $job_response->user->user_profile->present_division->name ?? ''}},
                                                                {{ $job_response->user->user_profile->present_postal_code ?? ''}}
                                                            </p>
                                                            <p class="font-weight-bold">Description</p>
                                                            <div class="mb-2">{!!html_entity_decode($job_response->description)!!}</div>
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
                    {!! $job_posts->links() !!}
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
