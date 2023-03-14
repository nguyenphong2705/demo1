@extends('layouts.app')

@section('content')

<div class="container loginbg">
    <div class="row justify-content-center">
        <div class="col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 col-xs-12 login-box">
            <div class="login-title d-flex justify-content-center">
                <span class="text-center">BlogDev</span>
            </div>
            <form method="POST" action="{{ route('login') }}" class="login-login-form">
                @csrf
                <fieldset class="login-input-container">
                    <div class="login-input-item">
                        <input id="email" type="email"
                            class="login-user-input-email login-user-input @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                            placeholder="Your Email Address">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </fieldset>
                <fieldset class="login-input-container">
                    <div class="login-input-item">
                        <input id="password" type="password"
                            class="login-user-input-password login-user-input @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password" placeholder="Enter Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </fieldset>
                <fieldset class="login-login-button-container">
                    <button class="login-login-button">Log in</button>
                </fieldset>
            </form>
            <div class="login-link-container">
                @if (Route::has('password.request'))
                <a class="login-link" href="{{ route('password.request') }}">Recover password</a>
                @endif
                <div class="login-right-links">
                    <span class="login-info-text">Don't have an account yet?</span>
                    <a class="login-create-account-link login-link" href="{{ route('register') }}">Register Now</a>
                </div>
            </div>

            <div class="login-third-party-login">
                <p class="login-info-text text-center">- OR USING EMAIL -</p>
                <!-- <p class="login-button-info-text login-info-text text-center">EASILY USING</p> -->
                <fieldset class="login-button-container">
                    <div class="col-md-6 col-sm-6 col-xs-6 float-start">
                        <button class="login-facebook login-button">
                            <span class="header-sprite login-fb-logo"></span>
                            <a class="btn btn-link" href="{{ route('auth.facebook') }}">
                                {{ __('Facebook') }}
                            </a>
                            <!-- react-text: 78 -->
                            <!-- /react-text -->
                        </button>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 float-start">
                        <button class="login-google login-button" id="gPlusLogin">
                            <span class="header-sprite login-gplus-logo"></span>
                            <a class="btn btn-link" href="{{ route('auth.google') }}">
                                {{ __('Google') }}
                            </a>
                            <!-- react-text: 81 -->
                            <!-- /react-text -->
                        </button>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</div>

@endsection