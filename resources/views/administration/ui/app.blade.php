<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <base href="/">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ siteInfos()->getAppleIcon18() }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ siteInfos()->getIcon48() }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ siteInfos()->getIcon16() }}">
    <link rel="manifest" href="{{asset('assets/favicons/site.webmanifest')}}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>@yield('title', 'Ukatesh Administration') </title>
    <!-- CSS files -->
    <link href="{{ asset('administration/dist/css/tabler.min.css?1674944402')}}" rel="stylesheet"/>
    <link href="{{ asset('administration/dist/css/tabler-flags.min.css?1674944402')}}" rel="stylesheet"/>
    <link href="{{ asset('administration/dist/css/tabler-payments.min.css?1674944402')}}" rel="stylesheet"/>
    <link href="{{ asset('administration/dist/css/tabler-vendors.min.css?1674944402')}}" rel="stylesheet"/>
    <link href="{{ asset('administration/dist/css/demo.min.css?1674944402')}}" rel="stylesheet"/>

    <!-- ijabo CSS pour le tostAlert -->
    <link href="{{ asset('administration/ijaboCropTool/ijabo.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('administration/ijaboCropTool/ijaboCropTool.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/ui/preloader.css') }}" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!--livewire style-->
    @livewireStyles
    <!--end livewire style-->

    <style>
        @import url('https://rsms.me/inter/inter.css');
        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }
        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
        #toast-container .toast-success {
            background: #28a745 !important;
        }

        #toast-container .toast-info {
            background: #17a2b8 !important;
        }

        #toast-container {
            font-weight: bold;
            font-size: 1.5rem;

        }

        #toast-container .toast-error {
            background: #dc3545 !important;
        }
    </style>
    @stack('style')
</head>
<body class="loading">
<script src="{{ asset('administration/dist/js/demo-theme.min.js?1674944402')}}"></script>
<!-- Start Preloader Area -->
<div class="cssload-loader">
    Ukatesh.org
</div>
<!-- End Preloader Area -->
<main>
    <div class="page">
    <div class="sticky-top">
        @include('administration.ui.header')
        @include('administration.ui.navbar')
    </div>
    <div class="page-wrapper">
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-deck row-cards">
                    @yield('content')
                </div>
            </div>
        </div>
        <!--end body-->
        <!--footer include-->
        @include('administration.ui.footer')
        <!--footer include-->
    </div>
</div>
</main>

<!--Preloader -->
<script src="{{ asset('assets/js/preloader.js') }}"></script>

<!-- ijabo JS et JQ pour le toastAlert -->
<script src="{{ asset('administration/ijaboCropTool/jquery-3.6.3.min.js') }}"></script>
<script src="{{ asset('administration/ijaboCropTool/ijabo.min.js') }}"></script>
<script src="{{ asset('administration/ijaboCropTool/ijaboCropTool.min.js') }}"></script>
<script src="{{ asset('administration/ijaboViewer/jquery.ijaboViewer.min.js') }}"></script>

<!-- Libs JS -->
<script src="{{ asset('administration/dist/libs/apexcharts/dist/apexcharts.min.js?1674944402')}}" defer></script>
<script src="{{ asset('administration/dist/libs/jsvectormap/dist/js/jsvectormap.min.js?1674944402')}}" defer></script>
<script src="{{ asset('administration/dist/libs/jsvectormap/dist/maps/world.js?1674944402')}}" defer></script>
<script src="{{ asset('administration/dist/libs/jsvectormap/dist/maps/world-merc.js?1674944402')}}" defer></script>
<!-- Tabler Core -->
<script src="{{ asset('administration/dist/js/tabler.min.js?1674944402')}}" defer></script>
<script src="{{ asset('administration/dist/js/demo.min.js?1674944402')}}" defer></script>


<!-- plugins JS -->
@stack('script')
<!--livewire-->
@livewireScripts
<!--livewire-->
<!-- ijabo JS et JQ pour le toastAlert -->
<script>
    window.addEventListener('showToastr', function(event) {
        toastr.remove()
        if (event.detail.type === 'info') {
            toastr.info(event.detail.message);
        } else if (event.detail.type === 'success') {
            toastr.success(event.detail.message);
        } else if (event.detail.type === 'error') {
            toastr.error(event.detail.message);
        } else if (event.detail.type === 'warning') {
            toastr.warning(event.detail.message);
        } else {
            return false;
        }

    });
</script>
</body>
</html>
