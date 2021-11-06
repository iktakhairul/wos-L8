@extends('web.user.profile.index')
@section('title', 'Create Business')

@push('styles')
    <link href="{{ asset('plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endpush

@section('profile_content')

@php $divisions = divisions() @endphp
@php $districts = districts() @endphp
@php $thanas = thanas() @endphp

<div class="row">
    <div class="container">
        <h4>Create Business</h4>
        <div class="card mx-auto">

            <article class="card-body">
                <form method="post" action="{{ route('profile.businesses.store') }}">
                    @csrf
                    <div class="form-row form-group">
                        <div class="col-md-2 text-md-right">
                            <label for="business_name" class="pt-2">Business Name<small class="text-danger">*</small></label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="business_name" name="business_name" placeholder="Business Name" required="" autofocus="">
                        </div>
                    </div>
                    <div class="form-row form-group">
                        <div class="col-md-2 text-md-right">
                            <label>Owner Type<small class="text-danger">*</small></label>
                        </div>
                        <div class="col-md-10">
                            <label class="custom-control custom-radio custom-control-inline">
                                <input class="custom-control-input ownerType" type="radio" name="owner_type" value="proprietorship">
                                <span class="custom-control-label"> PROPRIETORSHIP </span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input class="custom-control-input ownerType" type="radio" name="owner_type" value="partnership">
                                <span class="custom-control-label"> PARTNERSHIP </span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input class="custom-control-input ownerType" type="radio" name="owner_type" value="private">
                                <span class="custom-control-label"> PRIVATE </span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input class="custom-control-input ownerType" type="radio" name="owner_type" value="public">
                                <span class="custom-control-label"> PUBLIC </span>
                            </label>
                        </div>
                    </div>
                    <div class="form-row form-group">
                        <div class="col-md-2 text-md-right">
                            <label>Business Type<small class="text-danger">*</small></label>
                        </div>
                        <div class="col-md-4">
                            <label class="custom-control custom-radio custom-control-inline">
                                <input class="custom-control-input businessType" type="radio" name="business_type" value="shop">
                                <span class="custom-control-label"> SHOP </span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input class="custom-control-input businessType" type="radio" name="business_type" value="service" disabled="true">
                                <span class="custom-control-label"> SERVICE </span>
                            </label>
                        </div>
                    </div>
                    <div id="shopInfoDiv" class="infoDiv">
                        <div class="form-row form-group">
                            <div class="col-md-2 text-md-right">
                                <label for="shop_name" class="pt-2">Shop Name<small class="text-danger">*</small></label>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="shop_name" name="shop_name" placeholder="Business Name" required="">
                            </div>
                            <div class="col-md-6">
                                <div class="form-group pt-2">
                                    <label class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" name="same_as_business_name" id="same_as_business_name" value="yes">
                                        <div class="custom-control-label text-info"><strong>OR same as Business Name</strong></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row form-group">
                            <div class="col-md-2 text-md-right">
                                <label>Shop Type<small class="text-danger">*</small></label>
                            </div>
                            <div class="col-md-8">
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input shopType" type="radio" name="shop_type" value="shop">
                                    <span class="custom-control-label"> ONLINE </span>
                                </label>
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input shopType" type="radio" name="shop_type" value="service">
                                    <span class="custom-control-label"> OFFLINE </span>
                                </label>
                                <label class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input shopType" type="radio" name="shop_type" value="combined">
                                    <span class="custom-control-label"> COMBINED </span>
                                </label>
                            </div>
                        </div>
                        <div class="form-row form-group">
                            <div class="col-md-2 text-md-right">
                                <label for="shop_contact_numbers" class="pt-2">Contact Numbers<small class="text-danger">*</small></label>
                            </div>
                            <div class="col-md-4 contactNumberInputs">
                                <div class="row">
                                    <div class="col-md-9">
                                        <input type="tel" class="form-control quantity_class" id="shop_contact_numbers" name="shop_contact_numbers[]" placeholder="01XXXXXXXXX" required="">
                                    </div>
                                    <div class="col-md-3 pt-2">
                                        <button type="button" id="addBtn" class="btn btn-sm btn-info">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row form-group">
                            <div class="col-md-2 text-md-right">
                                <label for="shop_email" class="pt-2">Email</label>
                            </div>
                            <div class="col-md-4">
                                <input type="email" class="form-control" id="shop_email" name="shop_email" placeholder="business@email.com">
                            </div>
                        </div>
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
                                <input type="number" class="form-control" id="postal_code" name="postal_code" class="form-control" placeholder="1205" required=""></input>
                            </div>
                        </div>
                        <div class="form-row form-group">
                            <div class="col-md-2 text-md-right">
                                <label for="address" class="pt-2">Shop Address<small class="text-danger">*</small></label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="address" name="address" placeholder="Business Name" required="">
                            </div>
                        </div>
                        <div class="form-row form-group">
                            <div class="col-md-2 text-md-right">
                                <label for="map_location" class="pt-2">Map Location</label>
                            </div>
                            <div class="col-md-10">
                                <textarea class="form-control" id="map_location" name="map_location" placeholder="paste your embed map here from google map"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-row form-group">
                        <div class="col-md-2 text-md-right">
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" checked="" required="">
                                    <div class="custom-control-label"> I am agree with <a href="#">terms and contitions</a> </div>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                    
                </form>
            </article>

        </div>
    </div>

</div>

@endsection

@push('scripts')
<script src="{{ asset('plugins/select2/select2.min.js') }}"></script>
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