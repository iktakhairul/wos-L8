@extends('web.index')

@section('web_content')
    <section class="section-content padding-y">

        <div class="card mx-auto" style="max-width:520px; margin-top:40px;">
            <article class="card-body">
                <header class="mb-4">
                    <h4 class="card-title">Sign up</h4>
                </header>

                <form class="form-horizontal" role="form" method="POST" action="{{ route('auth.register') }}">
                    @csrf
                    <div class="form-row">
                        <div class="col form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Your Name">
                            @if($errors->has('name'))
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="user@gmail.com">
                        <small class="form-text text-muted">We'll never share your email without your need.</small>
                        @if($errors->has('email'))
                            <small class="text-danger">{{ $errors->first('email') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="contact_number">Contact Number</label>
                        <input type="text" name="contact_number" id="contact_number" class="form-control" placeholder="01712345678">
                        <small class="form-text text-muted">We'll never share your contact number without your need.</small>
                        @if($errors->has('contact_number'))
                            <small class="text-danger">{{ $errors->first('contact_number') }}</small>
                        @endif
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" minlength="8" required autocomplete="new-password" placeholder="Minimum 8 Characters" />
                            @if($errors->has('password'))
                                <small class="text-danger">{{ $errors->first('password') }}</small>
                            @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required autocomplete="new-password" minlength=8 placeholder="Minimum 8 Characters" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" checked="" required>
                            <div class="custom-control-label"> I am agree with <a href="#">terms and conditions</a> </div>
                        </label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block"> Register </button>
                    </div>
                </form>
            </article>
        </div>
        <p class="text-center mt-4 mb-4">Have an account? <a href="{{ route('login') }}">Log In</a></p>

    </section>
@endsection
