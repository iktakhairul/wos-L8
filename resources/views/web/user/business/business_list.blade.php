@extends('web.user.profile.index')
@section('title', 'Business List')

@push('styles')

@endpush

@section('profile_content')

<div class="row">
    <div class="container">
        <h4>
            Business List
            <a class="btn btn-sm btn-outline-info pull-right" href="{{ route('profile.businesses.create') }}">Create Business</a>
        </h4>
        
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Business Name</th>
                            <th>Type</th>
                            <th>Dashboard</th>
                            <th>Website</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    @if(count($businesses) > 0)
                        <tbody>
                            @foreach($businesses as $b => $business)
                                <tr>
                                    <td>{{ $b+1 }}</td>
                                    <td>{{ $business->business_name }}</td>
                                    <td>{{ $business->business_type }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-info" href="{{ route('profile.shop./',['businessId' => $business->id, 'id' => $business->shop->id]) }}">Dashboard</a>
                                    </td>
                                    <td>{{ $business->business_email }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle" data-toggle="dropdown"></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('profile.businesses.show',$business->id) }}">Edit</a>
                                                <a class="dropdown-item" href="{{ route('profile.businesses.show',$business->id) }}">View</a>
                                                <a class="dropdown-item" href="{{ route('profile.businesses.show',$business->id) }}">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')

<script>
    $(document).ready(function(){
        //        
    });
</script>

@endpush