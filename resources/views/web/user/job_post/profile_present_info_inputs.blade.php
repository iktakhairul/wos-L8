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
        <h4>Present Address And Information</h4>
        <div class="card mx-auto">

            <article class="card-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('profile.update-present-info') }}">
                    @csrf
                    <div class="form-row form-group">
                        <div class="col-md-2 text-md-right">
                            <label for="present_division_id" class="pt-2">Present Division<small class="text-danger">*</small></label>
                        </div>
                        <div class="col-md-4">
                            <select id="present_division_id" name="present_division_id" class="form-control select2" required="">
                                @if(count($divisions) > 0)
                                    @foreach($divisions as $division)
                                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-md-2 text-md-right">
                            <label for="present_district_id" class="pt-2">Present District<small class="text-danger">*</small></label>
                        </div>
                        <div class="col-md-4">
                            <select id="present_district_id" name="present_district_id" class="form-control select2" required="">
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
                            <label for="present_thana_id" class="pt-2">Present Thana<small class="text-danger">*</small></label>
                        </div>
                        <div class="col-md-4">
                            <select id="present_thana_id" name="present_thana_id" class="form-control select2" required="">
                                @if(count($thanas) > 0)
                                    @foreach($thanas as $thana)
                                        <option value="{{ $thana->id }}">{{ $thana->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-md-2 text-md-right">
                            <label for="present_postal_code" class="pt-2">Present Postal Code<small class="text-danger">*</small></label>
                        </div>
                        <div class="col-md-4">
                            <input type="number" class="form-control" id="present_postal_code" name="present_postal_code" value="{{ !empty($editRow) ? $editRow->permanent_postal_code : old('postal_code') }}"  placeholder="1205" required="">
                        </div>
                    </div>
                    {{--Row--}}
                    <div class="form-row form-group">
                        <div class="col-md-2 text-md-right">
                            <label for="present_address" class="pt-2">Present Job Address<small class="text-danger">*</small></label>
                        </div>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="present_address" name="present_address" value="{{ !empty($editRow) ? $editRow->present_address : old('address') }}"  placeholder="Job Address" required="">
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

        $('#present_division_id').change(function(){
            var divisionId = parseInt($(this).val());
            var district_reset = '';
            if($(this).val() != ''){
                $.each(districts, function(d, district){
                    if(parseInt(district['division_id']) == divisionId){
                        district_reset = district_reset + '<option value="'+district['id']+'">'+district['name']+'</option>';
                    }
                });
                $('#present_district_id').html('');
                $('#present_district_id').html(district_reset);
                $('#present_district_id').val('').trigger('change');
            }
        });

        $('#present_district_id').change(function(){
            var districtId = parseInt($(this).val());
            var thana_reset = '';
            if($(this).val() != ''){
                $.each(thanas, function(t, thana){
                    if(parseInt(thana['district_id']) == districtId){
                        thana_reset = thana_reset + '<option value="'+thana['id']+'">'+thana['name']+'</option>';
                    }
                });
                $('#present_thana_id').html('');
                $('#present_thana_id').html(thana_reset);
                $('#present_thana_id').val('').trigger('change');
            }
        });

    });
</script>

@endpush
