@extends('web.user.job_post.index')
@section('title', 'Create Job Post')

@push('styles')
    <link href="{{ asset('plugins/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('web/tag-input/tag.css') }}" rel="stylesheet" />
@endpush

@section('job_post_content')

@php $divisions = divisions() @endphp
@php $districts = districts() @endphp
@php $thanas = thanas() @endphp

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
                            <label for="division_id" class="pt-2">Division<small class="text-danger">*</small></label>
                        </div>
                        <div class="col-md-4">
                            <select id="division_id" name="division_id" class="form-control select2" required="">
                                @if(count($divisions) > 0)
                                    @foreach($divisions as $division)
                                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-md-2 text-md-right">
                            <label for="district_id" class="pt-2">District<small class="text-danger">*</small></label>
                        </div>
                        <div class="col-md-4">
                            <select id="district_id" name="district_id" class="form-control select2" required="">
                                @if(count($districts) > 0)
                                    @foreach($districts as $district)
                                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    {{--Row--}}
                    <div class="form-row form-group">
                        <div class="col-md-2 text-md-right">
                            <label for="thana_id" class="pt-2">Thana<small class="text-danger">*</small></label>
                        </div>
                        <div class="col-md-4">
                            <select id="thana_id" name="thana_id" class="form-control select2" required="">
                                @if(count($thanas) > 0)
                                    @foreach($thanas as $thana)
                                        <option value="{{ $thana->id }}">{{ $thana->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-md-2 text-md-right">
                            <label for="postal_code" class="pt-2">Postal Code<small class="text-danger">*</small></label>
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" id="postal_code" name="postal_code" value="{{ !empty($editRow) ? $editRow->postal_code : old('postal_code') }}"  placeholder="1205" required="">
                        </div>
                    </div>
                    {{--Row--}}
                    <div class="form-row form-group">
                        <div class="col-md-2 text-md-right">
                            <label for="address" class="pt-2">Job Address<small class="text-danger">*</small></label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="address" name="address" value="{{ !empty($editRow) ? $editRow->address : old('address') }}"  placeholder="Job Address" required="">
                        </div>
                    </div>
                    {{--Row--}}
                    <div class="form-row form-group">
                        <div class="col-md-2 text-md-right">
                            <label for="map_location" class="pt-2">Map Location</label>
                        </div>
                        <div class="col-md-10">
                            <textarea class="form-control" id="map_location" name="map_location" placeholder="paste your embed map here from google map">{{ !empty($editRow) ? $editRow->map_location : old('map_location') }}</textarea>
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
<script>
    $(document).ready(function(){
        var divisions = {!! json_encode($divisions) !!};
        var districts = {!! json_encode($districts) !!};
        var thanas = {!! json_encode($thanas) !!};

        $('.infoDiv').hide();
        $('.businessType').prop('checked',false);
        $('.shopType').prop('checked',false);
        $('.businessType').change(function(){
            $('.infoDiv').hide();
            $('#'+$(this).val()+'InfoDiv').show();
        });

        var contactNumberInput = '<div class="row"><div class="col-md-9 mt-2"><input type="tel" class="form-control quantity_class" id="shop_contact_numbers" name="shop_contact_numbers[]" placeholder="01XXXXXXXXX" required=""></div><div class="col-md-3 mt-2 pt-2"><button type="button" onclick="$(this).parent().parent().remove()" class="btn btn-sm btn-danger"> X </button></div></div>';

        $('#addBtn').click(function(){
            $('.contactNumberInputs').append(contactNumberInput);
        });

        $('#same_as_business_name').change(function(){
            $('#shop_name').val('');
            if($(this).prop('checked'))
            {
                $('#shop_name').prop('required',false);
                $('#shop_name').prop('disabled',true);
            }else{
                $('#shop_name').prop('required',true);
                $('#shop_name').prop('disabled',false);
            }
        });

        $('.select2').select2({
            placeholder: "Select One",
            allowClear: true
        });

        $('.select2').val('').trigger('change');

        $('#division_id').change(function(){
            var divisionId = parseInt($(this).val());
            var district_reset = '';
            if($(this).val() != ''){
                $.each(districts, function(d, district){
                    if(parseInt(district['division_id']) == divisionId){
                        district_reset = district_reset + '<option value="'+district['id']+'">'+district['name']+'</option>';
                    }
                });
                $('#district_id').html('');
                $('#district_id').html(district_reset);
                $('#district_id').val('').trigger('change');
            }
        });

        $('#district_id').change(function(){
            var districtId = parseInt($(this).val());
            var thana_reset = '';
            if($(this).val() != ''){
                $.each(thanas, function(t, thana){
                    if(parseInt(thana['district_id']) == districtId){
                        thana_reset = thana_reset + '<option value="'+thana['id']+'">'+thana['name']+'</option>';
                    }
                });
                $('#thana_id').html('');
                $('#thana_id').html(thana_reset);
                $('#thana_id').val('').trigger('change');
            }
        });

    });
</script>

@endpush
