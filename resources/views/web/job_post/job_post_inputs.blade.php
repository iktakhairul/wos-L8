@extends('web.job_post.index')
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
{{--                @if ($errors->any())--}}
{{--                    @foreach ($errors->all() as $error)--}}
{{--                        <small class="text-danger">{{ $error }}</small><br>--}}
{{--                    @endforeach--}}
{{--                @endif--}}
                <form class="form-horizontal" role="form" method="POST" action="{{ !empty($editRow) ? route('jobs.job-posts.update', $editRow->id) : route('jobs.job-posts.store') }}" enctype="multipart/form-data">
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
                            @if($errors->has('service_category_id'))
                                <small class="text-danger">{{ $errors->first('service_category_id') }}</small>
                            @endif
                        </div>
                        <div class="col-md-2 text-md-right">
                            <label for="title" class="pt-2">Job Post Title<small class="text-danger">*</small></label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ !empty($editRow) ? $editRow->title : old('title') }}" placeholder="Job Post Title" required autofocus="">
                            @if($errors->has('title'))
                                <small class="text-danger">{{ $errors->first('title') }}</small>
                            @endif
                        </div>
                    </div>
                    {{--Row--}}
                    <div class="form-row form-group">
                        <div class="col-md-2 text-md-right">
                            <label for="required_persons" class="pt-2">Required Person<small class="text-danger">*</small></label>
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control @error('required_persons') is-invalid @enderror" id="required_persons" name="required_persons" value="{{ !empty($editRow) ? $editRow->required_persons : old('required_persons') }}" placeholder="05" required="">
                            @if($errors->has('required_persons'))
                                <small class="text-danger">{{ $errors->first('required_persons') }}</small>
                            @endif
                        </div>
                        <div class="col-md-2 text-md-right">
                            <label for="budget" class="pt-2">Budget<small class="text-danger">*</small> (in BDT)</label>
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control @error('budget') is-invalid @enderror" id="budget" name="budget" value="{{ !empty($editRow->budget) ? $editRow->budget : old('budget') }}" placeholder="Job Budget in BDT" required="">
                            @if($errors->has('budget'))
                                <small class="text-danger">{{ $errors->first('budget') }}</small>
                            @endif
                        </div>
                    </div>
                    {{--Row--}}
                    <div class="form-row form-group">
                        <div class="col-md-2 text-md-right">
                            <label for="start_datetime" class="pt-2">Start Date Time<small class="text-danger">*</small></label>
                        </div>
                        <div class="col-md-4">
                            <input class="form-control @error('start_datetime') is-invalid @enderror" type="datetime-local" id="start_datetime" name="start_datetime" data-date-format="dd-mm-yyyy" required="">
                            @if($errors->has('start_datetime'))
                                <small class="text-danger">{{ $errors->first('start_datetime') }}</small>
                            @endif
                        </div>
                        <div class="col-md-2 text-md-right">
                            <label for="end_datetime" class="pt-2">End Date Time</label>
                        </div>
                        <div class="col-md-4">
                            <input class="form-control @error('end_datetime') is-invalid @enderror" type="datetime-local" id="end_datetime" name="end_datetime" data-date-format="dd-mm-yyyy">
                            @if($errors->has('end_datetime'))
                                <small class="text-danger">{{ $errors->first('end_datetime') }}</small>
                            @endif
                        </div>

                    </div>
                    {{--Row--}}
                    <div class="form-row form-group">
                        <div class="col-md-2 text-md-right">
                            <label for="tag-input1" class="pt-2">Tags (Fixed)</label>
                        </div>
                        <div class="col-md-10">
                            @if(!empty($editRow))
                                <div class="mb-3 mt-2">
                                    @foreach(explode(',',$editRow->tags) as $tag)
                                        <span class="bg-gray p-2 rounded-pill" class="">{{ $tag }}</span>
                                    @endforeach
                                </div>
                            @else
                                <input type="text" id="tag-input1" class="@error('tags') is-invalid @enderror" name="tags">
                                @if($errors->has('tags'))
                                    <small class="text-danger">{{ $errors->first('tags') }}</small>
                                @endif
                            @endif
                        </div>
                    </div>
                    {{--Row--}}
                    <div class="form-row form-group">
                        <div class="col-md-6 text-md-center">
                            <label for="description" class="pt-2">Job Description<small class="text-danger">*</small></label>
                            @include('dashboard.input_helpers.description')
                        </div>
                        <div class="col-md-6 text-md-center">
                            <label for="map-search" class="pt-2">Job Location<small class="text-danger">*</small></label><br>
                            <input name="address" id="map-search" value="{{ !empty($editRow->address) ? $editRow->address : old('address')}}" class="form-control @error('address') is-invalid @enderror" type="text" placeholder="Write Address Or Search Here" required>
                            @if($errors->has('address'))
                                <small class="text-danger">{{ $errors->first('address') }}</small>
                            @endif
                            <input name="latitude" id="my_latitude" type="text" class="latitude form-control" value="{{ !empty($editRow->latitude) ? $editRow->latitude : old('latitude')}}" hidden>
                            @if($errors->has('latitude'))
                                <small class="text-danger">{{ $errors->first('latitude') }}</small>
                            @endif
                            <input name="longitude" id="my_longitude" type="text" class="longitude form-control" value="{{ !empty($editRow->longitude) ? $editRow->longitude : old('longitude')}}" hidden>
                            @if($errors->has('longitude'))
                                <small class="text-danger">{{ $errors->first('longitude') }}</small>
                            @endif
                            <div class="row">
                                <div class="col-md-6">
                                    <input name="city" id="my-city" type="text" class="reg-input-city form-control job-post-input-city" placeholder="City" value="{{ !empty($editRow->city) ? $editRow->city : old('city')}}">
                                    @if($errors->has('city'))
                                        <small class="text-danger">{{ $errors->first('city') }}</small>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <input name="country" id="country" type="text" class="form-control job-post-input-country" placeholder="Country" value="{{ !empty($editRow->country) ? $editRow->country : old('country')}}">
                                    @if($errors->has('country'))
                                        <small class="text-danger">{{ $errors->first('country') }}</small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group text-md-left">
                                    <small class="form-text text-muted">Drug the marker and select understandable address.
                                        <a class="float-right" data-toggle="collapse" href="#collapseMapHelp" role="button" aria-expanded="false" aria-controls="collapseExample">Help<i class="fa fa-angle-down fa-sm ml-1"></i></a>
                                        <span class="float-right mr-2">Refresh Map</span>
                                    <span class="spinner-grow spinner-grow-sm text-info float-right"></span>
                                </small>
                                <small class="form-text text-muted collapse" id="collapseMapHelp">
                                    1. You can create post without map loading. Just input address, city and county properly.<br>
                                    2. If map is not loaded correctly, Please turn on location service or Refresh Map.<br>
                                    3. Check your browsers URL box's <i class="fa-solid fa-location-dot"></i> location icon and Allow Location Access.<br>
                                    4. Drug the red marker to get readable address.<br>
                                    5. You can search address after google map loaded.
                                    <a href="https://support.google.com/maps/answer/2839911?"> Need More Help?</a>
                                </small>
                                <div id="map-canvas" style="min-height: 270px; width: 100%"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row form-group">
                        <div class="col-md-2">
                            <div class="form-group">
                                <div class="form-check">
                                    <div>
                                        <input class="form-check-input" type="radio" name="job_type" id="local" value="local" @if(!empty($editRow->type) && $editRow->type == 'local') checked @elseif(empty($editRow->type)) checked @endif>
                                        <label class="form-check-label" for="local">Local</label>
                                    </div>
                                    <div>
                                        <input class="form-check-input" type="radio" name="job_type" value="global" id="global" @if(!empty($editRow->type) && $editRow->type == 'global') checked @endif>
                                        <label class="form-check-label" for="global">Global</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" checked="" required="">
                                    <span class="custom-control-label pt-1"> I am agree with <a href="#">terms and conditions</a></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-2 text-right">
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
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdYfJuhWZhTogK9jkxR4S0tgFP8_gyQaM&libraries=places&callback=initialize"></script>
<script src="{{ asset('web/google-map/map.js') }}"></script>

@endpush
