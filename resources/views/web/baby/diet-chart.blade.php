@extends('web.baby.index')
@section('title', config('app.name') . ' - Home')

@section('meta_keywords', config('app.name') . 'Home')

@push('styles')

@endpush

@section('test_content')


    <div>
        <!-- ========================= SECTION PUBLIC WEB BODY ========================= -->
        @include('web.baby.components.diet-chart')

    </div>

@endsection

@push('scripts')
    <script type="text/javascript">

    </script>
@endpush
