@extends('dashboard.index')
@section('title','Dashboard')
@section('dashboard_content')

    <div class="container-fluid" style="min-height: 640px">

        <div class="text-center" style="margin-top: 25%">
            <h1>Welcome to {{ config('app.name') }}'s Dashboard</h1>

        </div>
    </div>

@endsection

@push('scripts')

    <script type="text/javascript">
        $(document).ready(function(){

        });
    </script>

@endpush
