@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="form-wrapper">
                <div class="form-header">
                    <h2>{{ __('Register') }}</h2>
                </div>

                <div class="form-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="name" class="">{{ __('Name') }}</label>

                            <input id="name" type="text" class="custom_input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="username" class="">{{ __('Username') }}</label>

                            <input id="username" type="text" class="custom_input @error('username') is-invalid @enderror" name="username" required autocomplete="username">

                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="form-group mb-3">
                            <label for="gender" class="">{{ __('Gender') }}</label>

                            <!-- <input id="username" type="text" class="custom_input  is-invalid " name="username"  required autocomplete="username" > -->
                            <!-- <input type="radio" name="gender" class="customRadio" id="male" value="male">Male -->
                            <div class="mt-2 d-flex">

                                <label for="male" class="customRadio_Div">
                                    <input type="radio" name="gender" id="male" value="male">
                                    <span class="customRadio"></span>
                                    <span>Male</span>
                                </label>
                                <label for="female" class="customRadio_Div">
                                    <input type="radio" name="gender" id="female" value="female">
                                    <span class="customRadio"></span>
                                    <span>Female</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" class="">{{ __('Email Address') }}</label>

                            <input id="email" type="email" class="custom_input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="">{{ __('Password') }}</label>

                            <input id="password" type="password" class="custom_input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>

                            <input id="password-confirm" type="password" class="custom_input" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class=" mb-0 d-flex justify-content-center">
                            <button type="submit" class="customBtn">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection