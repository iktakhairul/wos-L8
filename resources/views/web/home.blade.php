@extends('web.index')
@section('title', config('app.name') . ' - Home')

@section('meta_keywords', config('app.name') . 'Home')

@push('styles')

@endpush

@section('web_content')

<!-- Register info -->
<div class="container-fluid mt-5 mb-5 pt-5 pb-5">
    <div class="row">
        <div class="container text-center">
            <p class="font-150">
                <strong>Borrow and Repay on your own terms. Effortless application. Takes 5 mins to apply.</strong>
            </p>
        </div>
        <div class="container bg-light">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">                            
                            <div class="row">
                                
                                <div class="col-lg-3 col-md-6 mb-3 mt-3">
                                    <div class="text-center">
                                        <strong class="d-block mb-3 font-md">1</strong>
                                        <h4 class="card-title theme-text">Register</h4>
                                        <p class="card-text">Sign up with your device</p>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6 mb-3 mt-3">
                                    <div class="text-center">
                                        <strong class="d-block mb-3 font-md">2</strong>
                                        <h4 class="card-title theme-text">Apply</h4>
                                        <p class="card-text">Fill in a few details</p>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6 mb-3 mt-3">
                                    <div class="text-center">
                                        <strong class="d-block mb-3 font-md">3</strong>
                                        <h4 class="card-title theme-text">Instant Approval</h4>
                                        <p class="card-text">Know your approve limit</p>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6 mb-3 mt-3">
                                    <div class="text-center">
                                        <strong class="d-block mb-3 font-md">4</strong>
                                        <h4 class="card-title theme-text">Get Your Cash</h4>
                                        <p class="card-text">Your cash is on the go</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //Register info -->

@endsection

@push('scripts')

<script>
    $(document).ready(function(){
        //        
    });
</script>

@endpush