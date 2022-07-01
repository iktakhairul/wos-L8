@extends('dashboard.index')
@section('title','Babies')

@section('breadcrumbs')

    <li class="breadcrumb-item active"><a href="#">Babies</a></li>

@endsection

@section('dashboard_content')

<div class="container-fluid" style="min-height: 640px">

    <hr class="heading-devider">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="table-responsive">

                        <table class="table table-sm table-striped table-hover table-bordered table-condensed" id="displayTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th width="5%">Sl</th>
                                    <th>Name</th>
                                    <th width="20%">User</th>
                                    <th width="15%">Inseminate Date</th>
                                    <th width="10%">Blood Group</th>
                                    <th width="15%">Created At</th>
                                    <th width="5%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(!empty($babies))
                                @foreach($babies as $k => $item)
                                <tr>
                                    <td>{{ $k+1 }}</td>
                                    <td>{{ $item->name ?? ''}}</td>
                                    <td>{{ $item->user->name ?? '' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->inseminationDate)->format('F j, Y') ?? ''}}</td>
                                    <td>{{ $item->bloodGroup ?? '' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('F j, Y, g:i a') ?? ''}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <form action="{{ route('dashboard.babies.destroy', $item->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-secondary" data-placement="top" title="DELETE {{ $item->name }}" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
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

    });
</script>

@endpush
