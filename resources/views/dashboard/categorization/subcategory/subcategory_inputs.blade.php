@extends('dashboard.index')
@section('title', !empty($editRow) ? 'Edit ' . $editRow->name : 'Create Subcategory')

@push('styles')
    <link href="{{ asset('plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endpush

@section('breadcrumbs')

    <li class="breadcrumb-item"><a href="{{ route('dashboard.subcategories.index') }}">Subcategories</a></li>
    <li class="breadcrumb-item active"><a href="#">{{ !empty($editRow) ? 'Edit ' . $editRow->name : 'Create Subcategory' }}</a></li>

@endsection

@section('dashboard_content')

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <h4 class="page-header">
                <i class="fa fa-list"></i> {{ !empty($editRow) ? 'Edit ' . $editRow->name : 'Create Subcategory' }}
                <span class="pull-right"><a href="{{ route('dashboard.subcategories.index') }}" class="btn btn-sm btn-info">See All</a></span>
            </h4>                    
        </div>
    </div>

    <hr class="heading-devider">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ !empty($editRow) ? route('dashboard.subcategories.update',$editRow->id) : route('dashboard.subcategories.store') }}" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        @if(!empty($editRow))
                        {{ method_field('PATCH') }}
                        @endif

                        <!-- row -->
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('group_id') ? ' has-error' : '' }}">
                                    <label for="group_id" class="col-sm-4 control-label">Group<i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <select name="group_id" id="group_id" class="form-control" required="true">
                                            {{-- <option value=""></option> --}}
                                            @if(!empty($groups))
                                                @foreach($groups as $k => $group)
                                                <option value="{{ $group->id }}" {{ !empty($editRow) && $editRow->group_id == $group->id ? 'selected' : ''}}>{{ $group->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @if ($errors->has('group_id'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('group_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div id="categoryDiv" class="col-sm-4">
                                <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                    <label for="category_id" class="col-sm-4 control-label">Category</label>
                                    <div class="col-sm-8">
                                        <select name="category_id" id="category_id" class="form-control" required="true">
                                            {{-- <option value=""></option> --}}
                                            @if(!empty($categories))
                                                @foreach($categories as $k => $category)
                                                <option value="{{ $category->id }}" {{ !empty($editRow) && $editRow->category_id == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @if ($errors->has('category_id'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('category_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ./row -->

                        <!-- row -->
                        <div class="row">
                            <div class="col-sm-4">
                                @include('dashboard.input_helpers.name')
                            </div>
                            <div class="col-sm-4">
                                @include('dashboard.input_helpers.serial_no')
                            </div>
                        </div>
                        <!-- ./row -->
                        <!-- row -->
                        <div class="row">
                            <div class="col-sm-4">
                                @include('dashboard.input_helpers.image')
                            </div>
                            
                            <div class="col-sm-4">
                                @include('dashboard.input_helpers.image_shape')
                            </div>

                            @if(!empty($editRow->image))
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="old_image" class="col-sm-4 control-label">Old image</label>
                                    <div class="col-sm-8">
                                        <img src="{{ asset('img_category/'.$editRow->image) }}" alt="" class="img-responsive col-sm-12 mt-3">
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        <!-- ./row -->
                        <!-- row -->
                        <div class="row">
                            <div class="col-sm-4">
                                @include('dashboard.input_helpers.status')
                            </div>
                        </div>
                        <!-- ./row -->
                        <!-- row -->
                        <div class="row">
                            <div class="col-sm-12">
                                @include('dashboard.input_helpers.details')
                            </div>
                        </div>
                        <!-- ./row -->
                        <!-- row -->
                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-md btn-success">{{ !empty($editRow->id) ? 'Update' : 'Save' }}</button>
                            </div>
                        </div>
                        <!-- ./row -->
                    </form>

                </div>
            </div>
        </div>
    </div>
    
</div>

@endsection

@push('scripts')
<script src="{{ asset('plugins/select2/select2.full.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var groups = {!! json_encode($groups) !!};
        var categories = {!! json_encode($categories) !!};
        var groupCategories = '';
        var editRow = {!! json_encode($editRow)!!};

        // $('#group_id').select2({
        //     placeholder: "Select Group",
        //     allowClear: true
        // });

        // $('#category_id').select2({
        //     placeholder: "Select Category",
        //     allowClear: true
        // });

        $('#categoryDiv').hide();

        $('#group_id').change(function(){
            var groupId = $('#group_id').val();
            if(groupId){
                $('#category_id').html('');
                groupCategories = '';
                $.each(categories, function(i, category) {
                    if(category['group_id'] == groupId){
                        groupCategories += '<option value="' + category['id'] + '">' + category['name'] + '</option>';
                    }
                });
                $('#category_id').html(groupCategories);
                $('#category_id').val('').trigger('change');
                $('#categoryDiv').show();
            }else{
                $('#categoryDiv').hide();
            }
        });

        if(!editRow){
            $('#group_id').val('').trigger('change');
            $('#category_id').val('').trigger('change');
        }

        if(editRow['category_id']){
            $('#category_id').html('');
            groupCategories = '';
            $.each(categories, function(i, category) {
                if(category['group_id'] == editRow['group_id']){
                    groupCategories += category['id'] == editRow['category_id'] ? '<option value="' + category['id'] + '" selected>' + category['name'] + '</option>' : '<option value="' + category['id'] + '">' + category['name'] + '</option>';
                }
            });
            $('#category_id').html(groupCategories);
            $('#categoryDiv').show();
        }
    });
</script>

@endpush