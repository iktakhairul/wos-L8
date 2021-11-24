@extends('web.index')

@section('web_content')
    <section class="section-conten padding-y" style="min-height:84vh">

        <div class="card mx-auto" style="max-width: 380px; margin-top:100px;">
            <div class="card-body">
                <h4 class="card-title mb-4">Sign in</h4>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address" autofocus>
                        @if($errors->has('email'))
                            <small class="text-danger">{{ $errors->first('email') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" placeholder="Password"  required autocomplete="current-password">

                        @if($errors->has('password'))
                            <small class="text-danger">{{ $errors->first('password') }}</small>
                        @endif
                    </div>

                    <div class="form-group">
                        @if (Route::has('password.request'))
                            <a class="float-right" href="{{ route('password.request') }}">
                                {{ __('Forgot Password?') }}
                            </a>
                        @endif
                        <label class="float-left custom-control custom-checkbox"> <input type="checkbox"
                                class="custom-control-input" checked="" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <div class="custom-control-label"> {{ __('Remember Me') }} </div>
                        </label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block"> Login </button>
                    </div>
                </form>
            </div>
        </div>

        <p class="text-center mt-4">Don't have account? <a href="{{ route('register') }}">Sign up</a></p>
        <br><br>



    </section>
@endsection
