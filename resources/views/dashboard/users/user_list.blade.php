@extends('dashboard.index')
@section('title','Users')

@section('breadcrumbs')

    <li class="breadcrumb-item active"><a href="#">Users</a></li>

@endsection

@section('dashboard_content')

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <h4 class="page-header">
                <i class="fa fa-users"></i> Users
                <span class="pull-right"><a href="{{ route('dashboard.users.create') }}" class="btn btn-sm btn-info">Create</a></span>
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
                                    <th>Email</th>
                                    <th>Contact Number</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th width="100">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(!empty($users))
                                @foreach($users as $k => $user)
                                <tr>
                                    <td>{{ $k+1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->contact_number }}</td>
                                    <td>{{ $user->type }}</td>
                                    <td class="text-{{ $user->status === 'active' ? 'success' : 'danger' }}"><strong>{!! $user->status === 'active' ? 'ACTIVE' : 'INACTIVE'  !!}</strong></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('dashboard.users.update-status', $user->id) }}" class="btn btn-sm btn-secondary btn-{{ $user->status == 'active' ? 'info' : 'warning' }}" title="{{ $user->status == 'active' ? 'Deactivate ' : 'Activate ' }}" data-toggle="tooltip" data-placement="top"><i class="fa fa-{{ $user->status == 'active' ? 'check-square ' : 'ban' }}"></i></a>
                                            <a href="{{ route('dashboard.users.edit', $user->id) }}" type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="EDIT {{ $user->name }}"><i class="fa fa-edit"></i></a>
                                            <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="top" title="DELETE {{ $user->name }}" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
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
