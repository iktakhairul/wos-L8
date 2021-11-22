@extends('dashboard.index')
@section('title', !empty($editRow) ? 'Edit ' . $editRow->name : 'Create Users')

@push('styles')
    <link href="{{ asset('plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endpush

@section('breadcrumbs')

    <li class="breadcrumb-item"><a href="{{ route('dashboard.users.index') }}">Users</a></li>
    <li class="breadcrumb-item active"><a href="#">{{ !empty($editRow) ? 'Edit ' . $editRow->name : 'Create Users' }}</a></li>

@endsection

@section('dashboard_content')

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <h4 class="page-header">
                <i class="fa fa-users"></i> {{ !empty($editRow) ? 'Edit ' . $editRow->name : 'Create Users' }}
                <span class="pull-right"><a href="{{ route('dashboard.users.index') }}" class="btn btn-sm btn-info">See All</a></span>
            </h4>
        </div>
    </div>

    <hr class="heading-devider">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ !empty($editRow) ? route('dashboard.users.update', $editRow->id) : route('dashboard.users.store') }}" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        @if(!empty($editRow))
                        {{ method_field('PATCH') }}
                        @endif
                        <!-- row -->
                        <div class="row">
                            <div class="col-sm-4">
                                @include('dashboard.input_helpers.name')
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-sm-12 control-label fw500">Email<i class="text-danger">*</i></label>
                                    <div class="col-sm-12">
                                        <input id="email" type="text" class="form-control" name="email" value="{{ !empty($editRow->email) ? $editRow->email : old('email') }}" autofocus placeholder="Email" required>
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('contact_number') ? ' has-error' : '' }}">
                                    <label for="contact_number" class="col-sm-12 control-label fw500">Contact Number<i class="text-danger">*</i></label>
                                    <div class="col-sm-12">
                                        <input id="contact_number" type="text" class="form-control" name="contact_number" value="{{ !empty($editRow->contact_number) ? $editRow->contact_number : old('contact_number') }}" autofocus placeholder="Contact Number" required>
                                        @if ($errors->has('contact_number'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('contact_number') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- row -->
                        <div class="row">
                            <div class="col-sm-4">
                                @include('dashboard.input_helpers.status')
                            </div>
                            <div class="col-sm-4" style="padding-left: 2.2%">
                                <button type="submit" class="btn btn-md btn-success">{{ !empty($editRow->id) ? 'Update' : 'Save' }}</button>
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
<script src="{{ asset('plugins/select2/select2.full.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){

    });
</script>

@endpush
