@extends('web.user.profile.index')
@section('title', 'Create Shop')

@push('styles')

@endpush

@section('profile_content')

<div class="row">
    <div class="container">        
        <div class="card mx-auto">

            <article class="card-body">
                <header class="mb-4">
                    <h4 class="card-title">Create Shop</h4>
                </header>
                <form>
                    <div class="form-row form-group">
                        <div class="col-md-2 text-md-right">
                            <label for="shop_name" class="pt-2">Business Name<small class="text-danger">*</small></label>
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" id="shop_name" name="shop_name" placeholder="Business Name" required="" autofocus="">
                        </div>
                        <div class="col-md-4">
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" checked="false">
                            <div class="custom-control-label">Or same as Business Name</div>
                        </label>
                        </div>
                    </div>
                    <div class="form-row form-group">
                        <div class="col-md-2 text-md-right">
                            <label for="business_name" class="pt-2">Contact Number<small class="text-danger">*</small></label>
                        </div>
                        <div class="col-md-4">
                            <input type="tel" class="form-control quantity_class" id="business_contact_number" name="business_contact_number" placeholder="01XXXXXXXXX" required="">
                        </div>
                        <div class="col-md-2 text-md-right">
                            <label for="business_email" class="pt-2">Email</label>
                        </div>
                        <div class="col-md-4">
                            <input type="email" class="form-control" id="business_email" name="business_email" placeholder="business@email.com" required="">
                        </div>
                    </div>
                    <div class="form-row form-group">
                        <div class="col-md-2 text-md-right">
                            <labelclass="pt-2">Owner Type<small class="text-danger">*</small></label>
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
                                <input class="custom-control-input businessType" type="radio" name="business_type" value="product">
                                <span class="custom-control-label"> PRODUCT </span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input class="custom-control-input businessType" type="radio" name="business_type" value="service" disabled="true">
                                <span class="custom-control-label"> SERVICE </span>
                            </label>
                        </div>
                    </div>

                    <div id="shopInfoDiv">
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
                                <label for="division_id" class="pt-2">Division<small class="text-danger">*</small></label>
                            </div>
                            <div class="col-md-4">
                                <select id="division_id" name="division_id" class="form-control" required="">
                                    <option> Choose...</option>
                                    <option>Uzbekistan</option>
                                    <option>Russia</option>
                                    <option selected="">United States</option>
                                    <option>India</option>
                                    <option>Afganistan</option>
                                </select>
                            </div>
                            <div class="col-md-2 text-md-right">
                                <label for="district_id" class="pt-2">District<small class="text-danger">*</small></label>
                            </div>
                            <div class="col-md-4">
                                <select id="district_id" name="district_id" class="form-control" required="">
                                    <option> Choose...</option>
                                    <option>Uzbekistan</option>
                                    <option>Russia</option>
                                    <option selected="">United States</option>
                                    <option>India</option>
                                    <option>Afganistan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row form-group">
                            <div class="col-md-2 text-md-right">
                                <label for="thana_id" class="pt-2">Thana<small class="text-danger">*</small></label>
                            </div>
                            <div class="col-md-4">
                                <select id="thana_id" name="thana_id" class="form-control" required="">
                                    <option> Choose...</option>
                                    <option>Uzbekistan</option>
                                    <option>Russia</option>
                                    <option selected="">United States</option>
                                    <option>India</option>
                                    <option>Afganistan</option>
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
                                <label for="shop_address" class="pt-2">Shop Address<small class="text-danger">*</small></label>
                            </div>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="shop_address" name="shop_address" placeholder="Business Name" required="">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input"
                                checked="">
                            <div class="custom-control-label"> I am agree with <a href="#">terms and contitions</a> </div>
                        </label>
                    </div>
                </form>
            </article>

        </div>
    </div>

</div>

@endsection

@push('scripts')

<script>
    $(document).ready(function(){
        $('#shopInfoDiv').hide();
        $('.businessType').change(function(){
            $('#shopInfoDiv').show();
        });
    });
</script>

@endpush