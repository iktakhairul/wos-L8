@extends('web.index')
@section('title', config('app.name') . ' - Home')

@section('meta_keywords', config('app.name') . 'Home')

@push('styles')

@endpush

@section('web_content')


<div class="container">
    <!-- ========================= SECTION HERO ========================= -->
    @include('web.components.hero')

    <!-- ========================= SECTION HERO END// ========================= -->

    <!-- =============== SECTION DEAL =============== -->
    @include('web.components.deal')
    <!-- =============== SECTION DEAL // END =============== -->

    <!-- =============== SECTION 1 =============== -->
    @include('web.components.section1')
    <!-- =============== SECTION 1 END =============== -->

    <!-- =============== SECTION 2 =============== -->
    @include('web.components.section2')
    <!-- =============== SECTION 2 END =============== -->

    <!-- =============== SECTION REQUEST =============== -->
    @include('web.components.request')
    <!-- =============== SECTION REQUEST .//END =============== -->

    <!-- =============== SECTION ITEMS =============== -->
    @include('web.components.items')
    <!-- =============== SECTION ITEMS .//END =============== -->

    <!-- =============== SECTION SERVICES =============== -->
    @include('web.components.services')
    <!-- =============== SECTION SERVICES .//END =============== -->

    <!-- =============== SECTION REGION =============== -->
    @include('web.components.region')
    <!-- =============== SECTION REGION .//END =============== -->

    <article class="my-4">
        <img src="{{asset('web/images/banners/ad-sm.png')}}" class="w-100">
    </article>
</div>
<!-- container end.// -->


@include('web.components.subscribe')


@endsection

@push('scripts')

<script></script>

@endpush