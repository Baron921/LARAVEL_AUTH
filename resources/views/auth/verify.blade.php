@extends('layouts.app')

@section('content')
<div class="container py-2 d-flex flex-column min-vh-100 justify-content-center align-items-center">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <img src="{{asset('assets/images/email.png')}}" width="50" height="50">
                    <h3>{{ __('Vérifiez votre adresse mail') }}</h3>
                </div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                    <h5 class="mt-3"> {{ __('Bonjour') }} <strong> {{Auth::user()->name}} </strong>, </h5>
                    <p>
                        {{ __('Avant de continuer, veuillez consulter votre boîte mail afin de valider votre compte grâce au lien de vérification.') }}
                    </p>
                    <p>
                        {{ __('Si vous n\'aviez pas reçu le mail, cliquez sur le bouton en bas pour renvoyer.') }}
                    </p>
                    <form class="text-center py-2" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary px-1 m-0 align-baseline">{{ __('Renvoyer le mail') }}</button>
                    </form>
                </div>
                <div class=" text-center px-4">
                    <p>
                        {{ __('Accéder à votre dashboard en toute simplicité.') }}
                    </p>
                    <button class="btn btn-dark rounded-circle"> <i class="fa fa-facebook" aria-hidden="true"></i> </button>
                    <button class="btn btn-dark rounded-circle"> <i class="fa fa-twitter" aria-hidden="true"></i> </button>
                    <button class="btn btn-dark rounded-circle"> <i class="fa fa-linkedin" aria-hidden="true"></i> </button>
                    <p class="pt-3">Copyright &copy design by Baron </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
