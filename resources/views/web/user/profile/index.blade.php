@extends('web.index')

@section('web_content')
    <section class="section-pagetop bg-gray">
        <div class="container">
            <h2 class="title-page">My account</h2>
        </div>
    </section>
    <section class="section-content padding-y">
        <div class="container">

            <div class="row">
                @include('web.user.profile.inc.sidebar')
                <main class="col-md-9">
                    @yield('profile_content')
                </main>
            </div>

        </div>
    </section>

@endsection

@push('scripts')

    <script>
        $(document).ready(function() {
            //        
        });
    </script>

@endpush
