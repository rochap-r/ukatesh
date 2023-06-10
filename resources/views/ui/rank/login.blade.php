@extends('ui.rank.auth.main')
@section('title', 'Authentification')
@section('style')
    {{-- CSS complementaires --}}
@endsection

@section('content')
    <div class="card-wrapper">
        {{-- logo header included --}}
        <x-login-header :title="'Authentifiez-vous'" />
        <div class="mb-4 text-center">
            <h5>
                Vous ne vous êtes pas encore (adhéré) ?
                <a href="#" class="text-primary" data-bs-toggle="modal"  data-bs-target="#modal-souscribe" >
                    Adhérez à la fondation Rank!
                </a>
            </h5>
        </div>
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


        <div class="modal modal-blur fade" id="modal-souscribe" tabindex="-1" role="dialog" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-uppercase text-center">Conditions d'Adhésion à la {{ rank()->name }}</h5>
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                    </div>
                    <div class="modal-body px-4">

                        {{-- logo header included --}}
                        <div class="cardx fat ">
                            <div class="card-body">
                                <div class="text-center">
                                    <a href="{{ route('home') }}" class="navbar-brand navbar-brand-autodark">
                                        <img src="{{ rank()->getLogo() }}" alt="" height="100">
                                    </a>
                                </div>
                            </div>
                        </div>

                        {!! rank()->condition !!}

                        <div class="d-flex">
                            <button type="button" class="btn btn-danger me-auto" data-bs-dismiss="modal">Je refuse</button>
                            <a href="{{ route('rank.register') }}" class="btn btn-primary">J'accepte toutes les conditions</a>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <h5 class="text-uppercase leading-5 text-center col-md-12 text-primary">
                            {{ rank()->name }}
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection

