@extends('web.user.shop.index')

@section('title', $shop->shop_name. ' Dashboard')

@section('shop_content')

    <style>
        .form-control:disabled {background-color: EEEEEE;}
    </style>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h4 class="page-header"><i class="fa fa-dashboard"></i> Dashboard <small id="editBtn" class="pull-right theme-link cursor-pointer" title="Edit Basic Information" data-toggle="tooltip" data-placement="top"><i class="fa fa-edit"></i> Edit</small></h4>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data">

                            @csrf

                            <!-- row -->
                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="row">
                                        
                                        <div class="col-sm-6">
                                            <div class="row form-group{{ $errors->has('shop_name') ? ' has-error' : '' }}">
                                                <label for="shop_name" class="col-sm-12 control-label">Shop Name</label>
                                                <div class="col-sm-12">
                                                    <input id="shop_name" type="text" class="form-control" shop_name="application_shop_name" value="{{ $shop->shop_name }}" required="true">
                                                    @if ($errors->has('shop_name'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="row form-group{{ $errors->has('type') ? ' has-error' : '' }}">
                                                <label for="type" class="col-sm-12 control-label">Type</label>
                                                <div class="col-sm-12">
                                                    <input id="type" type="text" class="form-control" type="application_type" value="{{ $shop->type }}" required="true">
                                                    @if ($errors->has('type'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                    </div>    
                                </div>

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