@extends('web.index')
@section('title', config('app.name') . ' - FAQ')
@section('web_content')

<main id="main">
    <section id="faq" class="faq">
        <div class="container">
            <div class="section-title">
                <div class="mb-3"><a href="{{ route('home') }}">Home</a> / <span>FAQ</span></div>
                <h1>FAQ</h1>
            </div>

            <hr>

            @if($page)

                <div class="row faq-item d-flex align-items-stretch">

                    @if($page->active_sections && count($page->active_sections) > 0)

                        @foreach($page->active_sections as $s => $section)

                            @if($section->type == 'msWord')

                                @foreach($section->active_text_contents as $s => $textContent)

                                    <div class="col-sm-12 bg-white">
                                        <div class="row">
                                            {!! $textContent->description !!}
                                        </div>
                                    </div>

                                @endforeach

                            @elseif($section->type == 'groupContent')

                                @if(strtolower(getGroupContentType($section->property)) == 'text')

                                    @foreach($section->active_text_contents as $s => $textContent)

                                        <div class="col-sm-12">
                                            <div class="row">
                                                <h4><i class="fa fa-check text-primary"></i> {{ $s+1 }}. {{ $textContent->title }}</h4>

                                                {!! $textContent->description !!}
                                            </div>
                                        </div>

                                    @endforeach                                    

                                @endif

                            @endif

                        @endforeach

                    @endif

                </div>

            @endif

        </div>
    </section>
</main>
<!-- End #main -->

@endsection