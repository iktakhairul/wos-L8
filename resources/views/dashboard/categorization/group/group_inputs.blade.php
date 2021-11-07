@extends('dashboard.index')

@section('title', !empty($editRow) ? 'Edit ' . $editRow->name : 'Create Group')

@section('breadcrumbs')

    <li class="breadcrumb-item"><a href="{{ route('dashboard.groups.index') }}">Groups</a></li>
    <li class="breadcrumb-item active"><a href="#">Create Group</a></li>

@endsection

@section('dashboard_content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h4 class="page-header"><i class="fa fa-list"></i> Groups</h4>
            </div>
        </div>

        <hr class="heading-devider">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <form class="form-horizontal" role="form" method="POST" action="{{ !empty($editRow) ? route('dashboard.groups.update',$editRow->id) : route('dashboard.groups.store') }}" enctype="multipart/form-data">

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

    <script type="text/javascript">
        $(document).ready(function(){
            //
        });
    </script>

@endpush