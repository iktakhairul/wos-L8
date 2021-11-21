@extends('web.user.job_post.index')
@section('title', 'Update Present Info')

@push('styles')
    <link href="{{ asset('plugins/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/tag-input/tag.css') }}" rel="stylesheet" />
@endpush

@section('job_post_content')

<div class="row">
    <div class="container">
        <h4>Present Address And Information</h4>
        <div class="card mx-auto">

            <article class="card-body">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <small class="text-danger">{{ $error }}</small><br>
                        <small class="text-danger">{{ 'Drug The Marker And Point Your Location Please.' }}</small><br>
                    @endforeach
                @endif
                <form class="form-horizontal" role="form" method="POST" action="{{ route('profile.update-present-info') }}">
                    @csrf
                    <div class="form-row form-group">
                        <div class="col-md-12 text-md-left">
                            <label for="map-search" class="pt-2">Your Current Location<small class="text-danger">*</small></label><br>
                            <input name="address" id="map-search" value="{{ !empty($editRow->present_address) ? $editRow->present_address : old('address')}}" class="form-control @error('address') is-invalid @enderror" type="text" placeholder="Write Address Or Search Here" style="width: 100%" required>
                            <input name="latitude" id="my_latitude" type="text" class="latitude form-control" value="{{ !empty($editRow->present_latitude) ? $editRow->present_latitude : old('latitude')}}" hidden>
                            <input name="longitude" id="my_longitude" type="text" class="longitude form-control" value="{{ !empty($editRow->present_longitude) ? $editRow->present_longitude : old('longitude')}}" hidden>
                            <input name="city" id="my-city" type="text" class="reg-input-city form-control" placeholder="City" value="{{ !empty($editRow->present_city) ? $editRow->present_city : old('city')}}" hidden>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-group text-md-left">
                                    <small class="form-text text-muted">Drug the marker and select understandable address.
                                        <a class="float-right" data-toggle="collapse" href="#collapseMapHelp" role="button" aria-expanded="false" aria-controls="collapseExample">Help<i class="fa fa-angle-down fa-sm ml-1"></i></a>
                                        <span class="float-right mr-2">Refresh Map</span>
                                        <span class="spinner-grow spinner-grow-sm text-info float-right"></span>
                                    </small>
                                    <small class="form-text text-muted collapse" id="collapseMapHelp">
                                        1. If map is not loaded correctly, Please turn on location service or Refresh Map.<br>
                                        2. Check your browsers URL box's <i class="fa-solid fa-location-dot"></i> location icon and Allow Location Access.<br>
                                        3. Drug the red marker to get readable address.<br>
                                        4. You can search address after google map loaded.
                                        <a href="https://support.google.com/maps/answer/2839911?"> Need More Help?</a>
                                    </small>
                                    <div id="map-canvas" style="min-height: 450px; width: 100%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row form-group">
                        <div class="col-md-2 text-md-right">
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
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
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdYfJuhWZhTogK9jkxR4S0tgFP8_gyQaM&libraries=places&callback=initialize"></script>
    <script src="{{ asset('web/google-map/map.js') }}"></script>
@endpush
