@extends('dashboard.index')
@section('title','Service Categories')

@section('breadcrumbs')

    <li class="breadcrumb-item active"><a href="#">Service Categories</a></li>

@endsection

@section('dashboard_content')

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <h4 class="page-header">
                <i class="fa fa-list"></i> Service Categories
                <span class="pull-right"><a href="{{ route('dashboard.service-categories.create') }}" class="btn btn-sm btn-info">Create</a></span>
            </h4>
        </div>
    </div>

    <hr class="heading-devider">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-sm table-striped table-hover table-bordered table-condensed" id="displayTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th style="width: 55px;">Sl</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Service Code</th>
                                    <th>Status</th>
                                    <th width="100">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(!empty($serviceCategories))
                                @foreach($serviceCategories as $k => $category)
                                <tr>
                                    <td>{{ $k+1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->service_code }}</td>
                                    <td class="text-{{ $category->status == 1 ? 'success' : 'danger' }}"><strong>{!! $category->status == 1 ? 'ACTIVE' : 'INACTIVE'  !!}</strong></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('dashboard.service-categories.edit', $category->id) }}" type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="EDIT {{ $category->name }}"><i class="fa fa-edit"></i></a>
                                            <form action="{{ route('dashboard.service-categories.destroy', $category->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="DELETE {{ $category->name }}" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@push('scripts')

<script type="text/javascript">
    $(document).ready(function(){
        // tooltip
        $('[data-toggle="tooltip"]').tooltip({
            trigger : 'hover'
        });
    });
</script>

@endpush
