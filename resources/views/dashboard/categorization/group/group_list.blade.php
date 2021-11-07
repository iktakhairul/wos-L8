@extends('dashboard.index')

@section('title','Groups')

@section('breadcrumbs')

    <li class="breadcrumb-item active"><a href="#">Groups</a></li>

@endsection

@section('dashboard_content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h4 class="page-header"><i class="fa fa-list"></i> Groups <a href="{{ route('dashboard.groups.create') }}" class="btn btn-sm btn-outline-dark pull-right" title="Create Group" data-toggle="tooltip" data-placement="top"><i class="fa fa-plus"></i> Create</a></h4>
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
                                        <th>Name</th>
                                        <th>Code</th>
                                        <th>Serial No</th>
                                        <th>Details</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(!empty($groups))
                                    @foreach($groups as $k => $group)
                                    <tr>
                                        <td>{{ $k+1 }}</td>
                                        <td>{{ $group->name }}</td>
                                        <td>{{ $group->group_code }}</td>
                                        <td>{{ $group->serial_no }}</td>
                                        <td align="center">
                                            <button class="btn btn-sm btn-info detailsBtn" type="button" id="{{ $group->id }}" data-details="{!! $group->short_details !!}" data-name="{{ $group->name }}"><i class="fa fa-eye"></i> View</button>
                                        </td>
                                        <td class="text-{{ $group->status == 1 ? 'success' : 'danger' }}"><strong>{!! $group->status == 1 ? 'ACTIVE' : 'INACTIVE'  !!}</strong></td>

                                        <td>
                                            <div class="btn-group">
                                                
                                                <a href="{{ route('dashboard.groups.edit',$group->id) }}" type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="EDIT {{ $group->name }}"><i class="fa fa-edit"></i></a>

                                                <a href="{{ route('dashboard.groups.destroy',$group->id) }}" type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="DELETE {{ $group->name }}"><i class="fa fa-trash"></i></a>

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

    <div class="modal fade" id="detailsModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

    <script type="text/javascript">
        $(document).ready(function(){
            $('.detailsBtn').click(function(){
                var details = $(this).data('details');
                details = !details ? 'No details added' : details;
                var name = $(this).data('name');
                $('.modal-title').html(name);
                $('.modal-body').html(details);
                $('#detailsModal').modal('show');
            });
        });
    </script>

@endpush