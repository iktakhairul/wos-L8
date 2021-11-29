@extends('web.index')

@section('web_content')
    <section class="section-content padding-y">

        <div class="card mx-auto" style="max-width:800px; margin-top:40px; margin-bottom: 12%">
            <article class="card-body">
                <header class="mb-4">
                    <h4 class="card-title">Sign up</h4>
                </header>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Account Email Address" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>
                    </div>
                </form>

            </article>
        </div>

    </section>
@endsection
