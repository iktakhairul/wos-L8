@extends('web.index')
@section('title', config('app.name') . ' - About Us')
@section('web_content')

<main id="main">
    <section id="faq" class="faq">
        <div class="container">
            <div class="section-title">
                <div class="mb-3">
                    <a href="{{ route('home') }}">Home</a> / 
                    <span>About Us</span>
                </div>
                <h1>About Us</h1>
            </div>

            <hr>

            @if($page)

                <div class="row d-flex align-items-stretch about-us">

                    @if($page->active_sections && count($page->active_sections) > 0)

                        @foreach($page->active_sections as $s => $section)

                            @if($section->type == 'article')

                                @foreach($section->active_text_contents as $s => $textContent)

                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-{{ $textContent->image ? '6' : '12' }} about-us-text">
                                                {!! $textContent->description !!}
                                            </div>
                                            @if($textContent->image)
                                                <div class="col-sm-6 about-us-text">
                                                    <img src="{{ asset('img_content/'.$textContent->image) }}" alt="about_us_symbol" class="img-fluid">
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                @endforeach

                            @elseif($section->type == 'groupContent')

                                @if(strtolower(getGroupContentType($section->property)) == 'text')

                                    @if($section->heading)
                                        <div class="col-12 mb-3 mt-3 text-center">
                                            <h3 class="theme-text2">{{ $section->heading }}</h3>
                                        </div>
                                    @endif

                                    @foreach($section->active_text_contents as $s => $textContent)

                                        <div class="col-sm-4 team-box">

                                            <div class="card">
                                                <img class="card-img-top" src="{{ asset('img_content/'.$textContent->image) }}" alt="{{ $textContent->title }}">
                                                <div class="card-body">
                                                    <h6 class="card-title">{{ $textContent->title }}</h6>
                                                    {!! $textContent->description !!}
                                                </div>
                                            </div>

                                        </div>

                                    @endforeach

                                @elseif(strtolower(getGroupContentType($section->property)) == 'image')

                                    @if($section->heading)
                                        <div class="col-12 mb-3 mt-5 text-center">
                                            <h3 class="theme-text2">{{ $section->heading }}</h3>
                                        </div>
                                    @endif

                                    @foreach($section->active_image_contents as $s => $imageContent)

                                        <div class="col-sm-4 mb-4">

                                            <div class="card">
                                                <img class="card-img-top" src="{{ asset('img_content/'.$imageContent->image) }}" alt="{{ $imageContent->title }}">
                                            </div>

                                        </div>

                                    @endforeach

                                @endif

                            @endif

                            <div class="col-12">
                                <hr class="heading-devider">
                            </div>

                        @endforeach

                    @endif

                </div>

            @endif

        </div>
    </section>
</main>
<!-- End #main -->

@endsection
