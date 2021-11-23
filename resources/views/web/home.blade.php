@extends('web.index')
@section('title', config('app.name') . ' - Home')

@section('meta_keywords', config('app.name') . 'Home')

@push('styles')

@endpush

@section('web_content')


<div>
    <!-- ========================= SECTION PUBLIC WEB BODY ========================= -->
    @include('web.components.main-body-slider')
    @include('web.components.service-categories')
    @include('web.components.top-features-job')
{{--    @include('web.components.top-recent-jobs')--}}
    @include('web.components.top-employers')

</div>

@endsection

@push('scripts')

<script></script>

@endpush
