@extends('web.user.profile.index')
@section('title', $business->business_name. ' Details')

@push('styles')

@endpush

@section('profile_content')

<div class="row">
    <div class="container">
        <h4>{{ $business->business_name }}</h4>
        
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Business Name</th>
                            <th>Type</th>
                            <th>Contact Numbers</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    
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