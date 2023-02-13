@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <img src="{{asset('assets/images/pexels-cottonbro-studio-3585089.jpg')}}"
                 alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: right; margin-left: -12px">
        </div>
        <div class="col-md-6">
            <div class="car">
                <div class="card-header">
                    <p class="text-center"> {{ __('Login') }} </p>
                </div>

                <div class="car-boy">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-3 col-form-label">{{ __('auth.Email Address') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-3 col-form-label">{{ __('auth.Password') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('auth.Remember Me') }}
                                    </label>
                                    @if (Route::has('password.request'))
                                        <a class="float-end btn-link" href="{{ route('password.request') }}">
                                            {{ __('auth.FYP') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary px-5">
                                    {{ __('auth.Login') }}
                                </button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="text-center">
                                <p class=""> Vous n'avez pas de compte ? <a href="http://localhost:8000/register">S'inscrire</a> </p>
                            </div>
                        </div>

                        <div class="row mb-3 mx-2">
                            <div class="text-center">
                                <a href="{{route('facebook-auth')}}" class="btn btn-primary">
                                    <i class="fa fa-facebook px-1" aria-hidden="true"></i><strong>Login with FACEBOOK</strong>
                                </a>
                                <a href="{{route('google-auth')}}" class="btn btn-danger">
                                    <i class="fa fa-google" aria-hidden="true"></i> <strong>Login with GMAIL</strong>
                                </a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
