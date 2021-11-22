extends('dashboard.index')
@section('title','Categories')

@section('breadcrumbs')

    <li class="breadcrumb-item active"><a href="#">Categories</a></li>

@endsection

@section('dashboard_content')

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <h4 class="page-header">
                <i class="fa fa-list"></i> Categories
                <span class="pull-right"><a href="{{ route('dashboard.categories.create') }}" class="btn btn-sm btn-info">Create</a></span>
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
                                    <th style="width: 55px;">
                                        Sl
                                    </th>
                                    <th>Group</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Serial No</th>
                                    <th style="max-width: 120px;">Details</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(!empty($categories))
                                @foreach($categories as $k => $category)
                                <tr>
                                    <td>
                                        {{ $k+1 }}
                                    </td>
                                    <td>{{ $category->group->name }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->category_code }}</td>
                                    <td>{{ $category->serial_no }}</td>
                                    <td style="max-width: 120px;">{!! $category->details !!}</td>
                                    <td>{{ $category->is_featured == true ? 'Yes' : 'No' }}</td>
                                    <td class="text-{{ $category->status == 1 ? 'success' : 'danger' }}"><strong>{!! $category->status == 1 ? 'ACTIVE' : 'INACTIVE'  !!}</strong></td>

                                    <td>
                                        <div class="btn-group">

                                            <a href="{{ route('dashboard.categories.edit',$category->id) }}" type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="EDIT {{ $category->name }}"><i class="fa fa-edit"></i></a>

                                            <a href="{{ route('dashboard.categories.destroy',$category->id) }}" type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="DELETE {{ $category->name }}"><i class="fa fa-trash"></i></a>

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
