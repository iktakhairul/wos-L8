@extends('dashboard.index')
@section('title', !empty($editRow) ? 'Edit ' . $editRow->name : 'Create Category')

@push('styles')
    <link href="{{ asset('plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endpush

@section('breadcrumbs')

    <li class="breadcrumb-item"><a href="{{ route('dashboard.categories.index') }}">Categories</a></li>
    <li class="breadcrumb-item active"><a href="#">{{ !empty($editRow) ? 'Edit ' . $editRow->name : 'Create Category' }}</a></li>

@endsection

@section('dashboard_content')

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <h4 class="page-header">
                <i class="fa fa-list"></i> {{ !empty($editRow) ? 'Edit ' . $editRow->name : 'Create Category' }}
                <span class="pull-right"><a href="{{ route('dashboard.categories.index') }}" class="btn btn-sm btn-info">See All</a></span>
            </h4>                    
        </div>
    </div>

    <hr class="heading-devider">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ !empty($editRow) ? route('dashboard.categories.update',$editRow->id) : route('dashboard.categories.store') }}" enctype="multipart/form-data">

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
                                                <option value="{{ $group->id }}" {{ !empty($edit_row) && $edit_row->group_id == $group->id ? 'selected' : ''}}>{{ $group->name }}</option>
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
                                @include('dashboard.input_helpers.status')
                            </div>
                        </div>
                        <!-- ./row -->
                        <!-- row -->
                        <div class="row">
                            <div class="col-sm-8">
                                @include('dashboard.input_helpers.details')
                            </div>
                        </div>
                        <!-- ./row -->
                        <!-- row -->
                        <div class="row">
                            <div class="col-sm-8 text-center">
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
        // $('#group_id').select2({
        //     placeholder: "Select Group",
        //     allowClear: true
        // });

        // let editRow = {!! json_encode($editRow)!!};

        // if(!editRow){
        //     $('#group_id').val('').trigger('change');
        // }
    });
</script>

@endpush