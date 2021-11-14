@extends('web.user.job_post.index')
@section('title', 'My Job Timeline')

@push('styles')

@endpush

@section('job_post_content')

<div class="row">
    <div class="container">
        <h4 class="mt-2">
            Pending Proposals
        </h4>

        <div class="row">
            <div class="col-12">
                <ul class="list-group">
                    @if(count($my_pending_proposals) > 0)
                        @foreach($my_pending_proposals as $key => $my_pending_proposal)
                        <li class="list-group-item mb-2">
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <h2>{{ $my_pending_proposal->job_post->title ?? ''}}</h2>
                                        </div>
                                        <div class="col-sm-1 text-right">
                                            <a class="" data-toggle="collapse" href="#collapseJobInfo{{$my_pending_proposal->job_post->id}}" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-angle-down fa-lg"></i></a>
                                        </div>
                                    </div>
                                    <p><i class="fa fa-user mr-2"></i>{{ $my_pending_proposal->job_post->user->name }}</p>
                                    <h5>Service Category: {{ $job_post->service_category->name ?? ''}}, Budget: {{ $my_pending_proposal->job_post->budget ?? '' }}<img src="{{ asset('/web/images/icons/taka.jpg') }}" alt=""></h5>
                                    <p class="font-weight-bold">Job Duration: ({{$my_pending_proposal->job_post->start_datetime ?? ''}} - {{$my_pending_proposal->job_post->end_datetime ?? ''}})</p>
                                    <p><i class="fa-solid fa-location-dot"></i>
                                        {{$my_pending_proposal->job_post->address ?? ''}},
                                        {{$my_pending_proposal->job_post->thana->name ?? ''}},
                                        {{$my_pending_proposal->job_post->district->name ?? ''}},
                                        {{$my_pending_proposal->job_post->division->name ?? ''}},
                                        {{$my_pending_proposal->job_post->postal_code ?? ''}}
                                    </p>

                                    <div class="collapse" id="collapseJobInfo{{$my_pending_proposal->job_post->id}}">
                                        <p class="font-weight-bold">Job Description</p>
                                        <div class="mb-2">{!!html_entity_decode($my_pending_proposal->job_post->description)!!}</div>
                                        <div class="photo-box">
                                            <img id="logo" src="{{ $my_pending_proposal->job_post->job_image ?? '' ? asset('img/'.$my_pending_proposal->job_post->logo) : asset('img/dummy.jpg') }}" alt="{{ 'Not Found!'}}" class="img-responsive img-thumbnail img-fluid" style="max-width: 120px;">
                                        </div>

                                        <p class="font-weight-bold mt-4">Tags</p>
                                        @if(!empty($my_pending_proposal->job_post->tags))
                                            <div class="mb-3">
                                                @foreach(explode(',',$my_pending_proposal->job_post->tags) as $tag)
                                                    <span class="bg-gray p-2 rounded-pill" class="">{{ $tag }}</span>
                                                @endforeach
                                            </div>
                                        @else
                                            <p>{{ $job_post->tags ?? 'No tags found!'}}</p>
                                        @endif
                                    </div>

                                    <a href="" class=""><p class="font-weight-bold">Placed Order To</p></a>
                                    @if(!empty($my_pending_proposal))
                                        <article class="card mt-2 mb-3">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <figure class="icontext">
                                                            <div class="icon">
                                                                <img class="rounded-circle img-sm border" src="{{ asset('web/images/avatars/avatar3.jpg') }}">
                                                            </div>
                                                            <div class="text">
                                                                <strong> {{ $my_pending_proposal->user->name ?? 'User not found!' }} </strong> <br>
                                                                <p class="mb-2"> {{ $my_pending_proposal->user->email ?? 'User not found!' }}</p>
                                                                <p class="mb-2"> Ratings:
                                                                    <span class="fa fa-star" style="color: orange;"></span>
                                                                    <span class="fa fa-star" style="color: orange;"></span>
                                                                    <span class="fa fa-star" style="color: orange;"></span>
                                                                    <span class="fa fa-star" style="color: orange;"></span>
                                                                    <span class="fa fa-star"></span>
                                                                </p>
                                                                @if($my_pending_proposal->status === 'active')
                                                                    <a href="{{ route('profile.job-post-responses.cancel-job-proposal', $my_pending_proposal->id) }}" class="btn btn-sm btn-outline-info" onclick="return confirm('Would you like to cancel this job proposal?')">Cancel Order</a>
                                                                @endif
                                                            </div>
                                                        </figure>
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <a class="float-right" data-toggle="collapse" href="#collapseJobResponseInfo{{$my_pending_proposal->id}}" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-angle-down fa-lg"></i></a>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="collapse" id="collapseJobResponseInfo{{$my_pending_proposal->id}}">
                                                    <p>
                                                        <i class="fa-solid fa-location-dot"></i>
                                                        {{ $my_pending_proposal->user->user_profile->present_address ?? '' }},
                                                        {{ $my_pending_proposal->user->user_profile->present_thana->name ?? ''}},
                                                        {{ $my_pending_proposal->user->user_profile->present_district->name ?? 'User profile not found!' }},
                                                        {{ $my_pending_proposal->user->user_profile->present_division->name ?? ''}},
                                                        {{ $my_pending_proposal->user->user_profile->present_postal_code ?? ''}}
                                                    </p>
                                                    <p>Contact: <span class="font-weight-bold">{{ !empty($my_pending_proposal->user->contact_number) ? $my_pending_proposal->user->contact_number : $my_pending_proposal->user->email }}</span></p>
                                                    <p class="font-weight-bold">Description</p>
                                                    <div class="mb-2">{!!html_entity_decode($my_pending_proposal->description)!!}</div>
                                                </div>

                                                <article class="card-group card-stat">
                                                    <figure class="card bg">
                                                        <div class="p-3">
                                                            <h4 class="title">{{ $my_pending_proposal->demanded_budget ?? '' }}</h4>
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
                    {!! $my_pending_proposals->links() !!}
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
