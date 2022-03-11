@extends('layouts.app')
@section('title','login')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="form-wrapper">
                <div class="form-header ">
                    <h2>{{ __('Login') }}</h2>
                    
                </div>

                <div class="form-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="email" class="">{{ __('Email') }}</label>

                            <input id="email" type="email" class="custom_input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="password" class="">{{ __('Password') }}</label>

                            <div class="position-relative password_div" >
                                <div class="visible_Password_bg " style="z-index:-100px;"></div>
                                <input id="password" type="password" class="custom_input pe-5 @error('password') is-invalid @enderror " name="password" required autocomplete="current-password">
                                    <span class="fas fa-eye position-absolute toggle-password" ></span>
                            </div>

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-check d-flex align-items-center p-0 ">
                                <input class="form-check-input d-none" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span class="customCheckbox me-2">

                                </span>
                                <label class="form-check-label user-select-none" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        <div class=" mb-0">
                                <button type="submit" class="customBtn">
                                    {{ __('Login') }}
                                </button>
                                @if (Route::has('password.request'))
                                <a class="btn forgot-Pass-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection