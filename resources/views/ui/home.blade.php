<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/favicons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/favicons/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('assets/favicons/site.webmanifest')}}">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
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
    <title>Université Technologique Kanyik Tesh</title>
</head>
<body>
<!-- Start Preloader Area -->
<div class="preloader-area">
    <div class="spinner">
        <div class="inner">
            <div class="disc"></div>
            <div class="disc"></div>
            <div class="disc"></div>
        </div>
    </div>
</div>
<!-- End Preloader Area -->

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

<!-- Start Navbar Area -->
<div class="navbar-area nav-bg-2">
    <div class="mobile-responsive-nav">
        <div class="container">
            <div class="mobile-responsive-menu">
                <div class="logo">
                    <a href="/">
                        <img src="{{ asset('assets/favicons/logo.png') }}" class="main-logo" alt="logo">
                        <img src="{{ asset('assets/favicons/logo.png') }}"  class="white-logo" alt="logo">
                        <span class="label">Ukatesh</span>
                        <hr class="line-height">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="desktop-nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('assets/favicons/logo.png') }}"  class="main-logo" alt="logo">
                    <img src="{{ asset('assets/favicons/logo.png') }}"  class="white-logo" alt="logo">
                    <span class="label"> Ukatesh </span>
                    <hr class="line-height">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link dropdown-toggle active">
                                Acceuil
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link dropdown-toggle">
                                A propos d'Ukatesh
                            </a>

                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="javascript:void(0)" class="nav-link">Encours developpement</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link dropdown-toggle">
                                Galérie
                            </a>

                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="javascript:void(0)" class="nav-link"> Encours developpement </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link dropdown-toggle">
                                Actualités
                            </a>

                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="javascript:void(0)" class="nav-link"> Encours developpement </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link">Nous Contacter</a>
                        </li>
                    </ul>

                    <div class="others-options">
                        <div class="icon">
                            <i class="ri-menu-3-fill" data-bs-toggle="modal" data-bs-target="#sidebarModal"></i>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <div class="others-option-for-responsive">
        <div class="container">
            <div class="dot-menu">
                <div class="inner">
                    <div class="icon">
                        <i class="ri-menu-3-fill" data-bs-toggle="modal" data-bs-target="#sidebarModal"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Navbar Area -->

<!-- Sidebar Modal -->
<div class="sidebarModal modal right fade" id="sidebarModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal"><i class="ri-close-line"></i></button>

            <div class="modal-body">
                <a href=" {{ route('home') }}">
                    <img src="{{ asset('assets/favicons/logo.png')}}" width="50" class="main-logo" alt="logo">
                    <img src="{{ asset('assets/favicons/logo.png')}}" width="50" class="white-logo" alt="logo">
                    <span class="label">Ukatesh</span>
                    <hr class="line-height">
                </a>
                <div class="sidebar-content">
                    <h3>Apropos de nous</h3>
                    <p>
                        <b>ukatesh</b>, Université Téchnologique Kanyik Tesh,
                        est votre point de départ dans l'univers de l'innovation
                    </p>

                    <div class="sidebar-btn">
                        <a href="javascript:void(0)" class="default-btn">Entrons En Contact</a>
                    </div>
                </div>
                <div class="sidebar-contact-info">
                    <h3>Nos Informations de contact</h3>

                    <ul class="info-list">
                        <li><i class="ri-phone-fill"></i> <a href="tel:+243994589272">+243(0)99-458-9272</a></li>

                        <li><i class="ri-mail-line"></i><a href="mailto:contact@ukatesh.org">contact@ukatesh.org</a></li>

                        <li><i class="ri-map-pin-line"></i>54, Av/Du30/Juin, Q/Latin, KZI </li>
                    </ul>
                </div>
                <ul class="sidebar-social-list">
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
<!-- End Sidebar Modal -->

<!--Start Banner Area-->
<div class="banner-area">
    <div class="hero-slider2 owl-carousel owl-theme">
        <div class="slider-item banner-bg-4">
            <div class="container-fluid">
                <div class="slider-content">
                    <h1>Ukatesh Infrastructure</h1>
                    <p>
                        Nous sommes en cours construction et l'objectif est d'atteindre ce que vous avez en face de vous.
                    </p>
                    <a href="javascript:void(0)" class="default-btn btn">Decouvrez plus!<i class="flaticon-next"></i></a>
                </div>
            </div>
        </div>
        <div class="slider-item banner-bg-5">
            <div class="container-fluid">
                <div class="slider-content">
                    <h1>Ukatesh Vision</h1>
                    <p>
                        Nous fixons notre vision plus loin pour vous apporter une experience comme jamais vecue!
                    </p>
                    <a href="javascript:void(0)" class="default-btn btn">Decouvrez plus! <i class="flaticon-next"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Banner Area-->

<!--Start Campus Information-->
<div class="campus-information-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-6" data-aos="fade-right"
                 data-aos-easing="ease-in-sine" data-aos-duration="1300" data-aos-once="true">
                <div class="campus-content">
                    <div class="campus-title">
                        <h4> Ukatesh Organisation </h4>
                        <p>
                            Gardez votre mal en patience et revenez de temps en temps pour voir les mises.
                            <b>Dans peude temps nous reviendrons.</b>
                        </p>
                    </div>
                    <div class="list">
                        <div class="row">
                            <div class="col-lg-6">
                                <ul>
                                    <li>
                                        <i class="ri-check-fill"></i>
                                        <p>en cours develop...</p>
                                    </li>
                                    <li>
                                        <i class="ri-check-fill"></i>
                                        <p>en cours develop...</p>
                                    </li>
                                    <li>
                                        <i class="ri-check-fill"></i>
                                        <p>en cours develop...</p>
                                    </li>
                                    <li>
                                        <i class="ri-check-fill"></i>
                                        <p>en cours develop...</p>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul>
                                    <li>
                                        <i class="ri-check-fill"></i>
                                        <p>en cours develop...</p>
                                    </li>
                                    <li>
                                        <i class="ri-check-fill"></i>
                                        <p>en cours develop...</p>
                                    </li>
                                    <li>
                                        <i class="ri-check-fill"></i>
                                        <p>en cours develop...</p>
                                    </li>
                                    <li>
                                        <i class="ri-check-fill"></i>
                                        <p>en cours develop...</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="counter">
                        <div class="row">
                            <div class="col-lg-4 col-4">
                                <div class="counter-card">
                                    <h1>
                                        <span class="odometer" data-count="00"> 00</span>
                                        <span class="target"></span>
                                    </h1>
                                    <p> Personnels </p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-4">
                                <div class="counter-card">
                                    <h1>
                                        <span class="odometer" data-count="00">00</span>
                                        <span class="target heading-color"></span><span class="target"></span>
                                    </h1>
                                    <p>Etudiants </p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-4">
                                <div class="counter-card">
                                    <h1>
                                        <span class="odometer" data-count="00">00</span>
                                        <span class="target"></span>
                                    </h1>
                                    <p>facultés</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="javascript:void(0)" class="default-btn btn">Demarrons la discussion<i class="flaticon-next"></i></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="estemate-form">
                    <h4>Nous Contacter </h4>

                    <!-- Contact Message start -->
                    <div class="global-message info d-none"></div>
                    <!--End Contact Message-->
                    <form id="contactForm" method="POST" onsubmit="return false" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="fullname" class="form-control" required data-error="Please enter your name" placeholder="Votre nom complet">
                                    <div class="help-block with-errors error text-danger fullname"></div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-6">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" required data-error="Please enter your email" placeholder="Votre Adresse email">
                                    <div class="help-block with-errors error text-danger email"></div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="text" name="subject" class="form-control" placeholder="Votre Sujet">
                                    <div class="help-block with-errors error text-danger subject"></div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <textarea name="message" class="form-control" cols="30" rows="6" required data-error="Please enter your message" placeholder="saisissez votre message..."></textarea>
                                    <div class="help-block with-errors error text-danger message"></div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <button type="submit" id="send-message-btn" class="default-btn">Envoyer le message<span></span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Campus Information-->

<!-- coming Soon  -->
<div id="coming" class=" text-center">
    <h1 class="">Merci de nous avoir Visité</h1>
    <p class="text-success">
        Nous sommes en plein développement de cette plateforme!
        N'hésitez pas d'y revenir de temps en temps pour voir les mises à jour.
    </p>
    <h2>Encours développement.... </h2>
</div>
<!--End  coming Soon  -->

<!--Start Footer Area-->
<div class="footer-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="footer-logo-area">
                    <a href="{{ route('home') }}">
                        <img src="{{asset('assets/favicons/logo.png')}}" alt="Image">
                        <span class="label" style="font-size:2.8em;">Ukatesh</span>
                        <hr class="line-height">
                    </a>
                    <p>
                        L’Université Technologique Kanyik Tesh a été fondée par le visioneur Mr. <b>Chiyey Kanyik T</b>
                        en 2023, et inaugurée en 2025
                        pour le bien public. Par la suite, elle est reconnue mondialement
                    </p>
                    <div class="contact-list">
                        <ul class="d-flex my-1">
                            <li><a href="tel:+243994589272">+243(0)99-458-9272
                                </a></li>&nbsp;&nbsp;
                            <li><a href="mailto:contact@ukatesh.org">contact@ukatesh.org</a></li>
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
                                <a href="https://www.facebook.com" target="_blank"><i class="ri-facebook-fill"></i></a>
                            </li>
                            <li>
                                <a href="https://www.twitter.com" target="_blank"><i class="ri-twitter-fill"></i></a>
                            </li>
                            <li>
                                <a href="https://instagram.com/?lang=en" target="_blank"><i class="ri-instagram-line"></i></a>
                            </li>
                            <li>
                                <a href="https://linkedin.com/?lang=en" target="_blank"><i class="ri-linkedin-fill"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8">
                    <div class="copy">
                        <p>© <b>Ukatesh</b>  tous droits réservés, développé par <a href="index.html" target="_blank">Rochap</a></p>
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
<script>
    let clearData=(parent,elements)=>{
        elements.forEach(element=>{
            $(parent).find("[name='"+element+"']").val('');

        })
    }

    $(document).on('click','#send-message-btn',(e)=>{
        e.preventDefault()
        let $this=e.target;

        let crsf_token=$($this).parents("form").find("input[name='_token']").val()
        let fullname=$($this).parents("form").find("input[name='fullname']").val()
        let email=$($this).parents("form").find("input[name='email']").val()
        let subject=$($this).parents("form").find("input[name='subject']").val()
        let message=$($this).parents("form").find("textarea[name='message']").val()
        console.log(crsf_token);
        console.log(message);


        let formData= new FormData();
        formData.append('_token',crsf_token);
        formData.append('fullname',fullname);
        formData.append('email',email);
        formData.append('subject',subject);
        formData.append('message',message);

        $.ajax({
            url:"{{ route('contact.store') }}",
            data:formData,
            type:'POST',
            datatype:'JSON',
            processData:false,
            contentType:false,
            success: function (data) {
                //console.log(data)
                if(data.success){
                    $(".global-message").removeClass('d-none');
                    $(".global-message").addClass('alert alert-info');
                    $(".global-message").text(data.message);
                    clearData($($this).parents("form"),['fullname','email','subject','message']);
                    setTimeout( ()=>{
                        $('.global-message').fadeOut()
                    },5000)
                }
                else{
                    for(const error in data.errors)
                    {
                        $("div."+error).text(data.errors[error])
                    }
                }
            }
        })
    })
</script>
</body>
</html>
