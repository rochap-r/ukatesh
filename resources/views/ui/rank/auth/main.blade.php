<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Fondation Rank">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title', 'Authentification à la fondation Rank') </title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ \App\Models\GenConfig::find(1)->getAppleIcon18() }}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ \App\Models\GenConfig::find(1)->getIcon48() }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ \App\Models\GenConfig::find(1)->getIcon16() }}}">
    <link rel="manifest" href="{{ asset('assets/favicons/site.webmanifest') }}">

    <link href="{{ asset('administration/dist/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('administration/dist/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('administration/dist/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('administration/dist/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('administration/dist/css/demo.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('auth/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/my-login.css') }}">
    @stack('style')
</head>

<body class="my-login-page">
<script src="{{ asset('administration/dist/js/demo.min.js') }}" defer></script>
<section class="h-100">
    <div class="container h-100">
        <div class="row justify-content-md-center h-140">

                @yield('content')

        </div>
    </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('administration/dist/js/tabler.min.js') }}" defer></script>
<script src="{{ asset('administration/dist/js/demo.min.js') }}" defer></script>
<script src="{{ asset('auth/js/my-login.js') }}"></script>
@stack('script')
</body>

</html>

