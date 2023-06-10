
@extends('ui.rank.auth.main')
@section('title', 'Adhésion à l\''.App\Models\GenConfig::find(1)->sitename)
@section('style')
    {{-- CSS complementaires --}}
@endsection

@section('content')

    {{-- logo header included --}}
    <x-login-header :title="'J\'adhére à cette '.siteInfos()->sitename" />
    <div class="mb-4 text-center">
        <h5>
            Avez-vous déjà un compte ?
            <br>
            <a href="{{ route('login') }}" class="text-primary"  >
                Connectez-vous!
            </a>
        </h5>
    </div>
    <form method="POST" class="my-login-validation mb-4" autocomplete="off" action="{{ route('register') }}">
        @csrf
        <div class="form-group">
            <label for="name">Votre nom</label>
            <input id="name" type="text" class="form-control" name="name" autofocus placeholder="Entrez le nom"
                   value="{{ old('name') }}">
            <span class="text-danger">
                @error('name')
                {{ $message }}
                @enderror
            </span>
        </div>

        <div class="form-group">
            <label for="fname">Votre Postnom</label>
            <input id="sname" type="text" class="form-control" name="sname" autofocus placeholder="Entrez le postnom"
                   value="{{ old('sname') }}">
            <span class="text-danger">
                @error('sname')
                {{ $message }}
                @enderror
            </span>
        </div>

        <div class="form-group">
            <label for="lname">Votre prénom</label>
            <input id="lname" type="text" class="form-control" name="lname" autofocus placeholder="Entrez le prenom"
                   value="{{ old('lname') }}">
            <span class="text-danger">
                @error('lname')
                {{ $message }}
                @enderror
            </span>
        </div>

        <div class="form-group">
            <label for="email">
                Adresse E-mail
            </label>
            <input id="email" type="email" class="form-control" name="email" placeholder="Entrez l'e-mail"
                   value="{{ old('email') }}">
            <span class="text-danger">
                @error('email')
                {{ $message }}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label for="email">
                Numéro Téléphone
            </label>
            <input id="phone" type="tel" class="form-control" name="phone" placeholder="Entrez le numéro téléphone"
                   value="{{ old('phone') }}">
            <span class="text-danger">
                @error('phone')
                {{ $message }}
                @enderror
            </span>
        </div>

        <div class="form-group">
            <label for="lname">Quel est votre genre?</label>
            <div class="form-control d-flex">
                <label class="form-check form-check-inline col-3">
                    <input class="form-check-input" type="radio" name="gender"
                           checked="" value="m" >
                    <span class="form-check-label">Homme</span>
                </label>
                <label class="form-check form-check-inline col-3">
                    <input class="form-check-input" type="radio" name="gender"
                           value="f">
                    <span class="form-check-label">Femme</span>
                </label>
                <label class="form-check form-check-inline col-6">
                    <input class="form-check-input" type="radio" name="gender"
                           value="p">
                    <span class="form-check-label">Personne morale</span>
                </label>
                <span class="text-danger">
                    @error('gender')
                    {{ $message }}
                    @enderror
                </span>
            </div>
        </div>

        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input id="password" type="password" class="form-control" name="password" data-eye
                   placeholder="Entrer le mot de passe">
            <span class="text-danger">
                @error('password')
                {{ $message }}
                @enderror
            </span>
        </div>
        <div class="form-group">
            <label for="password-confirm">Confirmez le mot de passe</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required data-eye
                   placeholder="Entrez le mot de passe de confirmation">
            <span class="text-danger">
                @error('password_confirmation')
                {{ $message }}
                @enderror
            </span>

        </div>

        <div class="form-group my-2">
            <button type="submit" class="btn btn-primary btn-block fw-bold">
                Je valide mon Adhésion
            </button>
        </div>
    </form>

@endsection
@section('script')
    {{-- JS complementaires --}}
@endsection
