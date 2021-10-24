@extends('dashboard.index')

@section('title','Dashboard')

@section('dashboard_content')

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
                                            <div class="row form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label for="name" class="col-sm-12 control-label">App Name</label>
                                                <div class="col-sm-12">
                                                    <input id="name" type="text" class="form-control" name="application_name" value="{{ !empty($appInfo['application_name']) ? $appInfo['application_name'] : old('name') }}" placeholder="Application Name" required="true">
                                                    @if ($errors->has('name'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="row form-group{{ $errors->has('subtitle') ? ' has-error' : '' }}">
                                                <label for="subtitle" class="col-sm-12 control-label">Subtitle</label>
                                                <div class="col-sm-12">
                                                    <input id="subtitle" type="text" class="form-control" name="subtitle" value="{{ !empty($appInfo['subtitle']) ? $appInfo['subtitle'] : old('subtitle') }}" placeholder="Subtitle">
                                                    @if ($errors->has('subtitle'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('subtitle') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="row form-group{{ $errors->has('contact_no') ? ' has-error' : '' }}">
                                                <label for="contact_no" class="col-sm-12 control-label">Contact No</label>
                                                <div class="col-sm-12">
                                                    <input id="contact_no" type="tel" class="form-control quantity_class" name="contact_no" value="{{ !empty($appInfo['contact_no']) ? $appInfo['contact_no'] : old('contact_no') }}" placeholder="No Contact No Added" required="true">
                                                    @if ($errors->has('contact_no'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('contact_no') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="row form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label for="email" class="col-sm-12 control-label">Email</label>
                                                <div class="col-sm-12">
                                                    <input id="email" type="email" class="form-control" name="email" value="{{ !empty($appInfo['email']) ? $appInfo['email'] : old('email') }}" placeholder="No Email Added" required="true">
                                                    @if ($errors->has('email'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="row form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                                <label for="address" class="col-sm-12 control-label">Address</label>
                                                <div class="col-sm-12">
                                                    <textarea name="address" id="address" cols="1" rows="3" class="form-control" placeholder="Address">{!! !empty($appInfo['address']) ? strip_tags($appInfo['address']) : old('address') !!}</textarea>
                                                    @if ($errors->has('address'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('address') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="row form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                                                <label for="website" class="col-sm-12 control-label">Website</label>
                                                <div class="col-sm-12">
                                                    <input id="website" type="text" class="form-control" name="website" value="{{ !empty($appInfo['website']) ? $appInfo['website'] : old('website') }}" placeholder="No Website Added">
                                                    @if ($errors->has('website'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('website') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="row form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                                                <label for="logo" class="col-sm-12 control-label">Logo</label>
                                                <div class="col-sm-12">
                                                        
                                                    <input class="form-control" id="logo" type="file" accept=".jpg, .png, .gif" name="logo" onchange="readURL(this);">

                                                    <div class="row col-6 mt-3 mb-3">
                                                        <img id="logo_preview" src="{{ !empty($appInfo['logo']) ? asset('img/'.$appInfo['logo']) : asset('img/sample_logo.jpg') }}" alt="LOGO" class=" img-responsive img-thumbnail">
                                                    </div>
                                                    
                                                    <span id="logoUpdateWarning" class="text-danger hide"> * Update will delete the old Logo automatically</span>
                                                    
                                                    <script>
                                                        function readURL(input)
                                                        {
                                                            if (input.files && input.files[0])
                                                            {
                                                                var reader = new FileReader();
                                                                reader.onload = function (e)
                                                                {
                                                                    $('#logo_preview')
                                                                    .attr('src', e.target.result)
                                                                };
                                                                reader.readAsDataURL(input.files[0]);
                                                            }
                                                        }
                                                    </script>
                                                        
                                                    @if ($errors->has('logo'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('logo') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="row form-group{{ $errors->has('favicon') ? ' has-error' : '' }}">
                                                <label for="favicon" class="col-sm-12 control-label">favicon</label>
                                                <div class="col-sm-12">
                                                        
                                                    <input class="form-control" id="favicon" type="file" accept=".jpg, .png, .gif" name="favicon" onchange="readURL(this);">

                                                    <div class="row col-4 mt-3 mb-3">
                                                        <img id="favicon_preview" src="{{ !empty($appInfo['favicon']) ? asset('favicon/'.$appInfo['favicon']) : asset('img/sample_logo.jpg') }}" alt="FAVICON" class=" img-responsive img-thumbnail">
                                                    </div>
                                                    
                                                    <span id="faviconUpdateWarning" class="text-danger hide"> * Update will delete the old Logo automatically</span>
                                                    
                                                    <script>
                                                        function readURL(input)
                                                        {
                                                            if (input.files && input.files[0])
                                                            {
                                                                var reader = new FileReader();
                                                                reader.onload = function (e)
                                                                {
                                                                    $('#favicon_preview')
                                                                    .attr('src', e.target.result)
                                                                };
                                                                reader.readAsDataURL(input.files[0]);
                                                            }
                                                        }
                                                    </script>
                                                        
                                                    @if ($errors->has('favicon'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('favicon') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="row form-group{{ $errors->has('facebook_link') ? ' has-error' : '' }}">
                                                <label for="facebook_link" class="col-sm-12 control-label"><i class="fa fa-facebook text-info"></i> Facebook Link</label>
                                                <div class="col-sm-12">
                                                    <input id="facebook_link" type="text" class="form-control" name="facebook_link" value="{{ !empty($appInfo['facebook_link']) ? $appInfo['facebook_link'] : old('facebook_link') }}" placeholder="facebook_link">
                                                    @if ($errors->has('facebook_link'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('facebook_link') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="row form-group{{ $errors->has('youtube_link') ? ' has-error' : '' }}">
                                                <label for="youtube_link" class="col-sm-12 control-label"><i class="fa fa-youtube text-danger"></i> Youtube Link</label>
                                                <div class="col-sm-12">
                                                    <input id="youtube_link" type="text" class="form-control" name="youtube_link" value="{{ !empty($appInfo['youtube_link']) ? $appInfo['youtube_link'] : old('youtube_link') }}" placeholder="youtube_link">
                                                    @if ($errors->has('youtube_link'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('youtube_link') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                    </div>                                            

                                </div>

                                <div class="col-sm-6">
                                    <div class="row">
                                        
                                        <div class="col-sm-12">
                                            <div class="row form-group{{ $errors->has('details') ? ' has-error' : '' }}">
                                                <label for="details" class="col-sm-12 control-label">Details</label>
                                                <div class="col-sm-12">
                                                    <textarea name="details" id="details" cols="1" rows="5" class="form-control" placeholder="No Details Added">{{ !empty($appInfo['details']) ? $appInfo['details'] : old('details') }}</textarea>
                                                    @if ($errors->has('details'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('details') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            <div class="row form-group{{ $errors->has('map') ? ' has-error' : '' }}">
                                                <label for="map" class="col-sm-12 control-label">Map (Embeded google map)</label>
                                                <div class="col-sm-12">
                                                    <textarea name="embed_map" id="map" cols="1" rows="6" class="form-control" placeholder="paste here the embeded google map">{{ !empty($appInfo['embed_map']) ? $appInfo['embed_map'] : old('map') }}</textarea>
                                                    @if ($errors->has('map'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('map') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12">
                                            @if($appInfo && $appInfo['embed_map'])
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        {!! $appInfo['embed_map'] !!}
                                                    </div>
                                                </div>
                                            @endif
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
            var appInfo = {!! json_encode($appInfo) !!};
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
                $('#name').val(appInfo['APPLICATION_NAME']);
                $('#subtitle').val(appInfo['SUBTITLE']);
                $('#address').val(appInfo['ADDRESS']);
                $('#contact_no').val(appInfo['CONTACT_NO']);
                $('#email').val(appInfo['EMAIL']);
                $('#website').val(appInfo['WEBSITE']);
                $('#details').val(appInfo['DETAILS']);
                $('#map').val(appInfo['EMBED_MAP']);
                $('#logo').val('');
                //$('#logo_preview').prop('src', basePath+'/img/'+appInfo['LOGO']);
            }
        });
    </script>

@endpush