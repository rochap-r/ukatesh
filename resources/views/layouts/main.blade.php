<!DOCTYPE html>
<html lang="fr">
<head>
    <base href="/">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'Université Technologique Kanyik Tesh') </title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ siteInfos()->getAppleIcon18() }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ siteInfos()->getIcon48() }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ siteInfos()->getIcon16() }}">
    <link rel="manifest" href="{{asset('assets/favicons/site.webmanifest')}}">
    @yield('meta')



    <!--Bootstrap Css-->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <!--Meanmenu.css-->
    <link rel="stylesheet" href="{{asset('assets/css/meanmenu.css')}}">
    <!--Owl carousel-->
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <!--Owl Theme-->
    <link rel="stylesheet" href="{{asset('assets/css/owl.theme.default.min.css')}}">
    <!--Magnific-popup-->
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
    <!--Flaticon-->
    <link rel="stylesheet" href="{{asset('assets/css/flaticon.css')}}">
    <!--Remixicon-->
    <link rel="stylesheet" href="{{asset('assets/css/remixicon.css')}}">
    <!--Odometer-->
    <link rel="stylesheet" href="{{asset('assets/css/odometer.min.css')}}">
    <!--Aos css-->
    <link rel="stylesheet" href="{{asset('assets/css/aos.css')}}">
    <!--Style css-->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!--Dark css-->
    <link rel="stylesheet" href="{{asset('assets/css/dark.css')}}">
    <!--Responsive css-->
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <!--default style-->
    <link rel="stylesheet" href="{{asset('assets/ui/style.css')}}">
    <!-- Preloader css -->
    <link rel="stylesheet" href="{{asset('assets/ui/preloader.css')}}">
    @stack('custom_css')
</head>
<body class="loading">
<!-- Start Preloader Area -->
<div class="cssload-loader">
    Ukatesh.org
    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plane-arrival" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
        <path d="M15.157 11.81l4.83 1.295a2 2 0 1 1 -1.036 3.863l-14.489 -3.882l-1.345 -6.572l2.898 .776l1.414 2.45l2.898 .776l-.12 -7.279l2.898 .777l2.052 7.797z"></path>
        <path d="M3 21h18"></path>
    </svg>..
</div>
<!-- End Preloader Area -->
<main>
    <!--Strat Top Header Area-->
    <div class="top-header-area">
        <div class="container-fluid">
            <div id="head" class="row align-items-center">
                <div class="texte-anime-js">
                        <span class="phrase1">
                            Université technologique Kanyik Tesh, actuellement en cours de construction à Kolwezi, capitale mondiale du cobalt.
                        </span>
                </div>

                <div class="col-lg-7 col-md-7 col-sm-7">
                    <div class="header-left-content texte-anime-js">
                        <p class="text-white" style="font-size: .7em;display:inline-block!important;font-weight:600;">
                            Ukatesh, Innovation, Excellence et pragmatisme, notre leitmotiv.
                        </p>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5">
                    <div class="header-right-content">
                        <div class="list">
                            <ul>
                                <li>
                                    <a href="javascript:void(0)" target="_blank"><i class="flaticon-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" target="_blank"><i class="flaticon-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" target="_blank"><i class="flaticon-linkedin"></i></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" target="_blank"><i class="flaticon-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Top Header Area-->

    <!--including navbar-->
    @include('inc.navbar')
    <!--End navbar-->

    <!---->
    @yield('content')
    <!---->

    <!--Start Footer Area-->
    <div class="footer-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="footer-logo-area">
                        <a href="{{ route('home') }}">
                            <img src="{{asset('assets/favicons/logo.png')}}" alt="Image">
                            <span class="label" style="font-size:2.8em;">{{ siteInfos()->sitename }}</span>
                            <hr class="line-height">
                        </a>
                        <p>
                            L’Université Technologique Kanyik Tesh a été fondée par le visioneur Mr. <b>Chiyey Kanyik T</b>
                            en 2023, et inaugurée en 2025
                            pour le bien public. Par la suite, elle est reconnue mondialement
                        </p>
                        <div class="contact-list">
                            <ul class="d-flex my-1">
                                <li><a href="tel:+243819002615">+243(0)81-900-2615
                                    </a></li>&nbsp;&nbsp;
                                <li><a href="mailto:contact@ukatesh.org">info@ukatesh.org</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widjet">
                        <h3>Nos liens Utiles</h3>
                        <div class="list">
                            <ul>
                                <li><a href="javascript:void(0)">Accueil</a></li>
                                <li><a href="javascript:void(0)">Nos Contacts</a></li>
                                <li><a href="javascript:void(0)">Qui Sommes-nous?</a></li>
                                <li><a href="javascript:void(0)">Notre Gallérie</a></li>
                                <li><a href="javascript:void(0)">Actualités à la une</a></li>
                                <li><a href="javascript:void(0)">Nos Projets</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-widjet">
                        <h3>Organisations</h3>
                        <div class="list">
                            <ul>
                                <li><a href="javascript:void(0)">Organigramme</a></li>
                                <li><a href="javascript:void(0)">Administration</a></li>
                                <li><a href="javascript:void(0)">Sécurité du Campus</a></li>
                                <li><a href="javascript:void(0)">Aide financière</a></li>
                                <li><a href="javascript:void(0)">Infrastructures</a></li>
                                <li><a href="javascript:void(0)">Ressources Humaines</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <div class="footer-widjet">
                        <h3>Applications</h3>
                        <div class="list">
                            <ul>
                                <li><a href="javascript:void(0)">Bibliothèque</a></li>
                                <li><a href="javascript:void(0)">Emploi du temps</a></li>
                                <li><a href="javascript:void(0)">Postuler pour les admissions</a></li>
                                <li><a href="javascript:void(0)">Payer mes frais de scolarité</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shape">
                <img src="{{asset('assets/images/shape-1.png')}}" alt="Image">
            </div>
        </div>
    </div>
    <!-- End Footer Area-->

    <!--Start Copyright Area-->
    <div class="copyright-area">
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-lg-6 col-md-4">
                        <div class="social-content">
                            <ul>
                                <li><span>Nos réseaux sociaux</span></li>
                                <li>
                                    <a href="javascript:void(0)" target="_blank"><i class="ri-facebook-fill"></i></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" target="_blank"><i class="ri-twitter-fill"></i></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" target="_blank"><i class="ri-instagram-line"></i></a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)" target="_blank"><i class="ri-linkedin-fill"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-8">
                        <div class="copy">
                            <p>Copyright &copy; <script> document.write(new Date().getFullYear())</script>
                                <a href="." class="link-secondary"><b>{{ siteInfos()->sitename }}</b></a>.
                                Tous les droits sont réservés.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Copyright Area-->

    <!-- Start Go Top Area -->
    <div class="go-top">
        <i class="ri-arrow-up-s-line"></i>
        <i class="ri-arrow-up-s-line"></i>
    </div>
    <!-- End Go Top Area -->
</main>
<!--Anime js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
<!--Preloader -->
<script src="{{ asset('assets/js/preloader.js') }}"></script>
<!-- Jquery js -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<!-- Bootstrap bundle js -->
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<!-- Meanmenu js -->
<script src="{{asset('assets/js/jquery.meanmenu.js')}}"></script>
<!-- Owl Carosel js -->
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<!-- Owl Carosel Thumbs js -->
<script src="{{asset('assets/js/carousel-thumbs.min.js')}}"></script>
<!-- Magnific popup js -->
<script src="{{asset('assets/js/jquery.magnific-popup.js')}}"></script>
<!-- Aos js -->
<script src="{{asset('assets/js/aos.js')}}"></script>
<!-- Odometer js -->
<script src="{{asset('assets/js/odometer.min.js')}}"></script>
<!-- Appear js -->
<script src="{{asset('assets/js/appear.min.js')}}"></script>
<!-- Form Validator js -->
<script src="{{asset('assets/js/form-validator.min.js')}}"></script>
<!-- Contact Form Script js -->
<script src="{{asset('assets/js/contact-form-script.js')}}"></script>
<!-- Ajaxchimp js -->
<script src="{{asset('assets/js/ajaxchimp.min.js')}}"></script>
<!--Custom js-->
<script src="{{asset('assets/js/custom.js')}}"></script>
<script>
    const phrase1 = document.querySelector('.phrase1');

    anime({
        targets: phrase1,
        translateX: [window.innerWidth, -phrase1.offsetWidth],
        duration: 50000,
        loop: true,
        easing: 'linear'
    });

</script>

@stack('custom_js')
</body>
</html>
