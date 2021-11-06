@extends('web.user.shop.index')

@section('title', $shop->shop_name. ' Settings')

@php $groups = groups() @endphp

@section('shop_content')

    <style>
        .form-control:disabled {background-color: EEEEEE;}
    </style>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h4 class="page-header"><i class="fa fa-wrench"></i> Settings <small id="editBtn" class="pull-right theme-link cursor-pointer" title="Edit Basic Information" data-toggle="tooltip" data-placement="top"><i class="fa fa-edit"></i> Edit</small></h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data">

                            @csrf

                            <div class="row">
                                <div class="col-md-3">
                                    <ul class="list-group">
                                        <li class="list-group-item"><strong>Enable / Disable Features</strong></li>
                                        <li class="list-group-item">
                                            <div class="form-group mb-0">
                                                <label class="custom-control custom-checkbox mb-0"> <input type="checkbox" class="custom-control-input groupInput" name="shop_properties[]" value="nityodin_shop" checked="true" disabled="">
                                                    <div class="custom-control-label"> Nityodin Shop </div>
                                                </label>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="form-group mb-0">
                                                <label class="custom-control custom-checkbox mb-0"> <input type="checkbox" class="custom-control-input groupInput" name="shop_properties[]" value="shop_dashboard" checked="true" disabled="">
                                                    <div class="custom-control-label"> Shop Dashboard </div>
                                                </label>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="form-group mb-0">
                                                <label class="custom-control custom-checkbox mb-0"> <input type="checkbox" class="custom-control-input groupInput" name="shop_properties[]" value="shop_users" checked="true" disabled="">
                                                    <div class="custom-control-label"> Shop Users </div>
                                                </label>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="form-group mb-0">
                                                <label class="custom-control custom-checkbox mb-0"> <input type="checkbox" class="custom-control-input groupInput" name="shop_properties[]" value="product_inventory">
                                                    <div class="custom-control-label"> Product Inventory </div>
                                                </label>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="form-group mb-0">
                                                <label class="custom-control custom-checkbox mb-0"> <input type="checkbox" class="custom-control-input groupInput" name="shop_properties[]" value="stock_management">
                                                    <div class="custom-control-label"> Stock Management </div>
                                                </label>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="form-group mb-0">
                                                <label class="custom-control custom-checkbox mb-0"> <input type="checkbox" class="custom-control-input groupInput" name="shop_properties[]" value="discount_management">
                                                    <div class="custom-control-label"> Discount Management </div>
                                                </label>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="form-group mb-0">
                                                <label class="custom-control custom-checkbox mb-0"> <input type="checkbox" class="custom-control-input groupInput" name="shop_properties[]" value="coupon_management">
                                                    <div class="custom-control-label"> Coupon Management </div>
                                                </label>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="form-group mb-0">
                                                <label class="custom-control custom-checkbox mb-0"> <input type="checkbox" class="custom-control-input groupInput" name="shop_properties[]" value="manual_order">
                                                    <div class="custom-control-label"> Manual Order </div>
                                                </label>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="form-group mb-0">
                                                <label class="custom-control custom-checkbox mb-0"> <input type="checkbox" class="custom-control-input groupInput" name="shop_properties[]" value="reports">
                                                    <div class="custom-control-label"> Reports </div>
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="row">

                                
                                    @if(count($groups) > 0)

                                        @foreach($groups as $group)
                                        <div class="col-md-3">
                                            <div class="card">
                                                <div class="card-header">
                                                    <div class="form-group mb-0">
                                                        <label class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input groupInput" name="group[]" value="{{ $group->id }}">
                                                            <div class="custom-control-label"> {{ $group->name }} </div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="card-body">

                                                    @if(count($group->categories) > 0)

                                                        <ul class="list-group">
                                                            @foreach($group->categories as $category)
                                                            <li class="list-group-item ">
                                                                <div class="form-group">
                                                                    <label class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input groupInput" name="group[]" value="{{ $category->id }}">
                                                                        <div class="custom-control-label"> {{ $category->name }} </div>
                                                                    </label>
                                                                </div>

                                                                @if(count($category->subcategories) > 0)
                                                                    <ul class="list-group">

                                                                        @foreach($group->categories as $subcategory)
                                                                        
                                                                            <li class="">
                                                                                <div class="form-group">
                                                                                    <label class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input groupInput" name="group[]" value="{{ $subcategory->id }}">
                                                                                        <div class="custom-control-label"> {{ $subcategory->name }} </div>
                                                                                    </label>
                                                                                </div>
                                                                            </li>
                                                                        
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </li>
                                                            @endforeach
                                                        </ul>

                                                    @endif
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach                                            

                                    @endif
                                
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <span class="pull-right"><button id="updateBtn" class="btn btn-md btn-success" type="submit" disabled="true">Update</button></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

    <script type="text/javascript">
        $(document).ready(function(){
            var shop = {!! json_encode($shop) !!};
            var basePath = {!! json_encode(base_path()) !!};

            $('.form-control').prop('disabled',true);

            $('#editBtn').click(function(){
                if($('.form-control').prop('disabled'))
                {
                    $(this).html('');
                    $(this).html('<i class="fa fa-close"></i> Cancel');
                    $('.form-control').prop('disabled',false);
                    $('#updateBtn').prop('disabled',false);
                }else{
                    resetForm();
                    $(this).html('');
                    $(this).html('<i class="fa fa-edit"></i> Edit');
                    $('.form-control').prop('disabled',true);
                    $('#updateBtn').prop('disabled',true);
                }
            });

            function resetForm()
            {
                $('#shop_name').val(shop['shop_name']);
                $('#type').val(shop['type']);
                // $('#subtitle').val(appInfo['SUBTITLE']);
                // $('#address').val(appInfo['ADDRESS']);
                // $('#contact_no').val(appInfo['CONTACT_NO']);
                // $('#email').val(appInfo['EMAIL']);
                // $('#website').val(appInfo['WEBSITE']);
                // $('#details').val(appInfo['DETAILS']);
                // $('#map').val(appInfo['EMBED_MAP']);
                // $('#logo').val('');
                //$('#logo_preview').prop('src', basePath+'/img/'+appInfo['LOGO']);
            }
        });
    </script>

@endpush