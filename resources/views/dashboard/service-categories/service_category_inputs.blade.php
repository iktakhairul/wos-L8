@extends('dashboard.index')
@section('title', !empty($editRow) ? 'Edit ' . $editRow->name : 'Create Service Category')

@push('styles')
    <link href="{{ asset('plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endpush

@section('breadcrumbs')

    <li class="breadcrumb-item"><a href="{{ route('dashboard.service-categories.index') }}">Service Categories</a></li>
    <li class="breadcrumb-item active"><a href="#">{{ !empty($editRow) ? 'Edit ' . $editRow->name : 'Create Service Category' }}</a></li>

@endsection

@section('dashboard_content')

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <h4 class="page-header">
                <i class="fa fa-list"></i> {{ !empty($editRow) ? 'Edit ' . $editRow->name : 'Create Service Category' }}
                <span class="pull-right"><a href="{{ route('dashboard.service-categories.index') }}" class="btn btn-sm btn-info">See All</a></span>
            </h4>
        </div>
    </div>

    <hr class="heading-devider">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ !empty($editRow) ? route('dashboard.service-categories.update', $editRow->id) : route('dashboard.service-categories.store') }}" enctype="multipart/form-data">

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
                                @include('dashboard.input_helpers.service_code')
                            </div>
                        </div>
                        <!-- row -->
                        <div class="row">
                            <div class="col-sm-4">
                                @include('dashboard.input_helpers.status')
                            </div>
                            <div class="col-sm-4" style="padding-left: 2%">
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
