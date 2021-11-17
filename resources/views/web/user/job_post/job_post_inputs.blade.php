@extends('web.user.job_post.index')
@section('title', 'Create Job Post')

@push('styles')
    <link href="{{ asset('plugins/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/tag-input/tag.css') }}" rel="stylesheet" />
@endpush

@section('job_post_content')

<div class="row">
    <div class="container">
        <h4>Create Job Post</h4>
        <div class="card mx-auto">

            <article class="card-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ !empty($editRow) ? route('profile.job-posts.update', $editRow->id) : route('profile.job-posts.store') }}" enctype="multipart/form-data">
                    @csrf
                    @if(!empty($editRow))
                        {{ method_field('PATCH') }}
                    @endif
                    {{--Row--}}
                    <div class="form-row form-group">
                        <div class="col-md-2 text-md-right">
                            <label for="service_category_id" class="pt-2">Service Category<small class="text-danger">*</small></label>
                        </div>
                        <div class="col-md-4">
                            <select class="form-control" name="service_category_id" id="service_category_id">
                                <option value="" disabled selected readonly="">Choose One</option>
                                @if (!empty($editRow->service_category_id))
                                    @foreach ($service_categories as $service_category_id)
                                        <option @if($editRow->service_category_id == $service_category_id->id) selected @endif value="{{$service_category_id->id}}">{{$service_category_id->name}}</option>
                                    @endforeach
                                @else
                                    @foreach($service_categories as $service_category_id)
                                        <option value="{{ $service_category_id->id }}"> {{ !empty($service_category_id->name) ? $service_category_id->name : 'Select Service Category' }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    {{--Row--}}
                    <div class="form-row form-group">
                        <div class="col-md-2 text-md-right">
                            <label for="title" class="pt-2">Job Post Title<small class="text-danger">*</small></label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="title" name="title" value="{{ !empty($editRow) ? $editRow->title : old('title') }}" placeholder="Job Post Title" required="" autofocus="">
                        </div>
                    </div>
                    {{--Row--}}
                    <div class="form-row form-group">
                        <div class="col-md-2 text-md-right">
                            <label for="description" class="pt-2">Job Description<small class="text-danger">*</small></label>
                        </div>
                        <div class="col-md-10">
                            @include('dashboard.input_helpers.description')
                        </div>
                    </div>
                    {{--Row--}}
                    <div class="form-row form-group">
                        <div class="col-md-2 text-md-right">
                            <label for="job_location" class="pt-2">Job Location<small class="text-danger">*</small></label>
                        </div>
{{--                        <label>Address: <input id="map-search" class="form-control" type="text" placeholder="Search Box" size="104"></label><br>--}}
{{--                        <label>Lat: <input type="text" class="latitude form-control"></label>--}}
{{--                        <label>Long: <input type="text" class="longitude form-control"></label>--}}
{{--                        <label>City <input type="text" class="reg-input-city form-control" placeholder="City"></label>--}}
                        <div class="col-md-10" style="min-height: 450px; max-height: 900px;">
                            <small class="form-text text-muted">If map is not loaded correctly, Please turn on location service.<a href="https://support.google.com/maps/answer/2839911?">Need Help?</a></small>
                            <div id="map-canvas" style="min-height: 430px;"></div>
                        </div>
                    </div>
                    {{--Row--}}
                    <div class="form-row form-group">
                        <div class="col-md-2 text-md-right">
                            <label for="start_datetime" class="pt-2">Start Date Time<small class="text-danger">*</small></label>
                        </div>
                        <div class="col-md-4">
                            <input class="form-control" type="datetime-local" id="start_datetime" name="start_datetime" data-date-format="dd-mm-yyyy" required="">
                        </div>
                        <div class="col-md-2 text-md-right">
                            <label for="end_datetime" class="pt-2">End Date Time</label>
                        </div>
                        <div class="col-md-4">
                            <input class="form-control" type="datetime-local" id="end_datetime" name="end_datetime" data-date-format="dd-mm-yyyy">
                        </div>
                    </div>
                    {{--Row--}}
                    <div class="form-row form-group">
                        <div class="col-md-2 text-md-right">
                            <label for="required_persons" class="pt-2">Required Person<small class="text-danger">*</small></label>
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" id="required_persons" name="required_persons" value="{{ !empty($editRow) ? $editRow->required_persons : old('required_persons') }}" placeholder="05" required="">
                        </div>
                        <div class="col-md-2 text-md-right">
                            <label for="budget" class="pt-2">Budget<small class="text-danger">*</small> (in BDT)</label>
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" id="budget" name="budget" value="{{ !empty($editRow) ? $editRow->budget : old('budget') }}" placeholder="Job Budget in BDT" required="">
                        </div>
                    </div>
                    {{--Row--}}
                    <div class="form-row form-group">
                        <div class="col-md-2 text-md-right">
                            <label for="tag-input1" class="pt-2">Tags (final)</label>
                        </div>
                        <div class="col-md-4">
                            @if(!empty($editRow))
                                <div class="mb-3">
                                    @foreach(explode(',',$editRow->tags) as $tag)
                                        <span class="bg-gray p-2 rounded-pill" class="">{{ $tag }}</span>
                                    @endforeach
                                </div>
                            @else
                                <input type="text" id="tag-input1" name="tags">
                            @endif
                        </div>
                    </div>
                    {{--Row--}}
                    <div class="form-row form-group">
                        <div class="col-md-2 text-md-right">
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" checked="" required="">
                                    <div class="custom-control-label"> I am agree with <a href="#">terms and conditions</a></div>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                    {{--End Row--}}

                </form>
            </article>

        </div>
    </div>

</div>

@endsection

@push('scripts')
<script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
<script src="{{ asset('web/tag-input/tag-helper.js') }}"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAPS_API_KEY')}}&libraries=places&callback=initialize"></script>
<script src="{{ asset('web/google-map/map.js') }}"></script>

@endpush
