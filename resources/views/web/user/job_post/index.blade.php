@extends('web.index')

@section('web_content')
    <link href="{{ asset('web/css/job-post.css') }}" rel="stylesheet" />
    <section class="section-content pt-2" style="margin-bottom: 250px">
        <div class="container">

            <div class="row">
                @include('web.user.job_post.inc.sidebar')
                <main class="col-md-9">
                    @yield('job_post_content')
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
