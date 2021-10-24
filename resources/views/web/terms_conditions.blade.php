@extends('web.index')
@section('title', config('app.name') . ' - Terms & Conditions')
@section('web_content')

<main id="main">
    <section id="faq" class="faq">
        <div class="container">
            <div class="section-title">
                <div class="mb-3">
                    <a href="{{ route('home') }}">Home</a> / 
                    <span>Terms & Conditions</span>
                </div>
                <h1>Terms & Conditions</h1>
            </div>

            <hr>

            <div class="row">
                <div class="container">

                    @if($page)

                        @if($page->active_sections && count($page->active_sections) > 0)

                            <ul class="nav nav-pills justify-content-center">

                                @foreach($page->active_sections as $s => $section)

                                    @if($s < 8)

                                        <li class="nav-item">
                                            <a class="nav-link {{ $s == 0 ? 'active' : '' }} fw-500" data-toggle="pill" href="#sectionId_{{ $section->id }}">{{ str_replace('_', ' ', $section->name) }}</a>
                                        </li>

                                    @endif

                                @endforeach

                            </ul>

                            <div class="tab-content mt-3">

                                @foreach($page->active_sections as $d => $section)

                                    @if($d < 8)

                                        <div class="tab-pane {{ $d == 0 ? 'active' : '' }}" id="sectionId_{{ $section->id }}">

                                            <div class="row faq-item d-flex align-items-stretch">

                                                <div class="col-sm-12 text-center font-150 fw-500">{{ str_replace('-', ' ', $section->heading) }}</div>

                                            @foreach($section->active_text_contents as $s => $textContent)

                                                <div class="col-sm-12 bg-white">
                                                    <div class="row">
                                                        <h4><i class="fa fa-check-circle-o text-primary"> {{ $s+1}}</i>. {{ $textContent->title }}</h4>
                                                        {!! $textContent->description !!}
                                                    </div>
                                                </div>

                                            @endforeach

                                            @if($section->name == 'STAKEHOLDER')

                                                @if($stakeTerms)

                                                <div class="row mt-4">
                                                    <div class="container">
                                                        <div class="row text-justify">
                                                            <div class="col-sm-12 bg-white">
                                                                <div class="row">
                                                                    {!! $stakeTerms  !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                @endif

                                            @elseif($section->name == 'INVESTOR')

                                                @if($investTerms)

                                                <div class="row mt-4">
                                                    <div class="container">
                                                        <div class="row text-justify">
                                                            <div class="col-sm-12 bg-white">
                                                                <div class="row">
                                                                    {!! $investTerms  !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                @endif

                                            @else

                                                @if($loanTerms)

                                                <div class="row mt-4">
                                                    <div class="container">
                                                        <div class="row text-justify">
                                                            <div class="col-sm-12 bg-white">
                                                                <div class="row">
                                                                    {!! $loanTerms  !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                @endif

                                            @endif

                                            </div>
                                            
                                        </div>

                                    @endif

                                @endforeach
                                
                            </div>

                        @endif

                    @endif

                </div>
            </div>

        </div>
    </section>
</main>
<!-- End #main -->

@endsection
