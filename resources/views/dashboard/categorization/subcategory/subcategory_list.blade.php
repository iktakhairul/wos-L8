@extends('dashboard.index')
@section('title','Subcategories')

@section('breadcrumbs')

    <li class="breadcrumb-item active"><a href="#">Subcategories</a></li>

@endsection

@section('dashboard_content')

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <h4 class="page-header">
                <i class="fa fa-list"></i> Subcategories
                <span class="pull-right"><a href="{{ route('dashboard.subcategories.create') }}" class="btn btn-sm btn-info">Create</a></span>
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
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Serial No</th>
                                    <th style="max-width: 120px;">Details</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(!empty($subcategories))
                                @foreach($subcategories as $k => $subcategory)
                                <tr>
                                    <td>
                                        {{ $k+1 }}
                                    </td>
                                    <td>{{ $subcategory->group->name }}</td>
                                    <td>{{ $subcategory->category->name }}</td>
                                    <td>{{ $subcategory->name }}</td>
                                    <td>{{ $subcategory->category_code }}</td>
                                    <td>{{ $subcategory->serial_no }}</td>
                                    <td style="max-width: 120px;">{!! $subcategory->details !!}</td>
                                    <td class="text-{{ $subcategory->status == 1 ? 'success' : 'danger' }}"><strong>{!! $subcategory->status == 1 ? 'ACTIVE' : 'INACTIVE'  !!}</strong></td>

                                    <td>
                                        <div class="btn-group">
                                            
                                            <a href="{{ route('dashboard.subcategories.edit',$subcategory->id) }}" type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="EDIT {{ $subcategory->name }}"><i class="fa fa-edit"></i></a>

                                            <a href="{{ route('dashboard.subcategories.destroy',$subcategory->id) }}" type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="DELETE {{ $subcategory->name }}"><i class="fa fa-trash"></i></a>

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
    });
</script>

@endpush