@extends('web.index')

@section('web_content')

    <section class="section-content pt-2">
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
