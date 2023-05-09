<!--Including main layouts-->
@extends('layouts.main')

@section('title','Authentification')
@section('meta')
    <!--balise meta ici-->
@endsection
@push('custom_css') @endpush
@section('content')
    <!--Start Page Banner-->
    <div class="page-banner-area bg-2" style="height:20px!important;">
        <div class="container">
            <div class="page-banner-content">
                <h1>Authentification</h1>
                <ul>
                    <li><a href="{{ route('home') }}">Accueil</a></li>
                    <li>Connexion</li>
                </ul>
            </div>
        </div>
    </div>
    <!--End Page Banner-->

    <!--login area-->
    <div class="login-area pt-100 pb-70">
        <div class="container">
            <div class="login">
                <h3>Ukatesh Authentification</h3>
                <form method="POST" class="my-login-validation mb-5" autocomplete="off" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Adresse e-mail</label>
                        <input id="email" type="email" class="form-control" name="email" value="" required autofocus
                               placeholder="Entrez l'e-mail">
                        <span class="text-danger">
                @error('email')
                            {{ $message }}
                            @enderror
            </span>
                    </div>

                    <div class="form-group">
                        <label for="password">Mot de passe
                            <a href="{{ route('password.request') }}" class="float-right">
                                Mot de passe oublié?
                            </a>
                        </label>
                        <input id="password" type="password" class="form-control" name="password" required data-eye
                               placeholder="Entrer le mot de passe" autocomplete="off">
                        <span class="text-danger">
                            @error('password')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="form-group">
                        <div class="custom-checkbox custom-control">
                            <input type="checkbox" name="remember" id="remember" class="custom-control-input">
                            <label for="remember" class="custom-control-label">Se souvenir de moi</label>
                        </div>
                    </div>

                    <div class="form-group m-0">
                        <button type="submit" class="btn btn-primary btn-block">
                            Connexion
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!--end login-->

@endsection
@push('custom_js')

@endpush
