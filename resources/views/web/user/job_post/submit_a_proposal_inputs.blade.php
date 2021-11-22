@extends('web.user.job_post.index')
@section('title', 'Submit A Proposal')

@push('styles')
    <link href="{{ asset('plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endpush

@section('job_post_content')

<div class="row">
    <div class="container">
        <h4>Submit Proposal To Job Post Owner</h4>
        <div class="card mx-auto">

            <div class="row">
                <div class="col-12">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <h2>{{ $job_post->title ?? ''}}</h2>
                                        </div>
                                        <div class="col-sm-3 text-right">
                                            <a class="mr-4" href="{{ route('jobs.find-jobs') }}"><i class="fa fa-lg fa-arrow-left"></i></a>
                                            <a class="" data-toggle="collapse" href="#collapseMyJobInfo{{$job_post->id}}" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fa fa-angle-down fa-lg"></i></a>
                                        </div>
                                    </div>
                                    <h5>Service Category: {{ $job_post->service_category->name ?? ''}}, Budget: {{ $job_post->budget ?? '' }}<img src="{{ asset('/web/images/icons/taka.jpg') }}" alt=""></h5>
                                    <p class="font-weight-bold">Job Duration: ({{$job_post->start_datetime ?? ''}} - {{$job_post->end_datetime ?? ''}})</p>
                                    <p><i class="fa-solid fa-location-dot mr-2"></i>{{$job_post->address ?? ''}}</p>

                                    <div class="collapse" id="collapseMyJobInfo{{$job_post->id}}">
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
                                        <hr>
                                    </div>
                                    <h4>Write Proposal</h4>
                                    <br>
                                    @if(empty($own_response))
                                        <form class="form-horizontal" role="form" method="POST" action="{{ !empty($editRow) ? route('jobs.job-post-responses.update', $editRow->id) : route('jobs.job-post-responses.store') }}" enctype="multipart/form-data">
                                            @csrf
                                            @if(!empty($editRow))
                                                {{ method_field('PATCH') }}
                                            @endif

                                            <input type="text" class="hide" hidden name="service_category_id" value="{{ !empty($job_post) ? $job_post->service_category_id : '' }}">
                                            <input type="text" class="hide" hidden name="job_post_id" value="{{ !empty($job_post) ? $job_post->id : '' }}">

                                            {{--Row--}}
                                            <div class="form-row form-group">
                                                <div class="col-md-3 text-md-right">
                                                    <label for="description" class="pt-2">Description<small class="text-danger">*</small></label>
                                                </div>
                                                <div class="col-md-9">
                                                    <textarea class="form-control" id="description" name="description" placeholder="Write you job description for workers." required="" autofocus="">{{ !empty($editRow) ? $editRow->description : old('description') }}</textarea>
                                                </div>
                                            </div>
                                            {{--Row--}}
                                            <div class="form-row form-group">
                                                <div class="col-md-3 text-md-right">
                                                    <label for="demanded_budget" class="pt-2">Demanded Budget<small class="text-danger">*</small> (in BDT)</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="number" class="form-control" id="demanded_budget" name="demanded_budget" value="{{ !empty($editRow) ? $editRow->demanded_budget : old('budget') }}" placeholder="Job Demanded Budget In BDT" required="">
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
                                                    <button type="submit" class="btn btn-primary">Submit Proposal</button>
                                                </div>
                                            </div>
                                            {{--End Row--}}
                                        </form>
                                    @else
                                        <p>You submitted a proposal.</p>
                                    @endif
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@push('scripts')
<script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
@endpush
