<!--Including main layouts-->
@extends('layouts.main')

@section('title','Université Technologique Kanyik Tesh')
@section('meta')
    <!--balise meta ici-->
    <meta name="robots" content="index,follow"/>
    <meta name="title" content="{{ siteInfos()->sitename }}"/>
    <meta name="description" content="{{ siteInfos()->description }}"/>
    <meta name="author" content="{{ siteInfos()->sitename }}"/>
    <link rel="canonical" href="{{ \Illuminate\Support\Facades\Request::root() }}"/>
    <meta property="og:title" content="{{ siteInfos()->sitename }}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:description" content="{{ siteInfos()->description }}"/>
    <meta property="og:url" content="{{ \Illuminate\Support\Facades\Request::root() }}"/>
    <meta property="og:image" content="{{ siteInfos()->getLogo() }}"/>
    <meta name="twitter:domain" content="{{ \Illuminate\Support\Facades\Request::root() }}"/>
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:title" property="og:title" itemprop="name"  content="{{ siteInfos()->sitename }}"/>
    <meta name="twitter:description" property="og:description" itemprop="description"  content="{{ siteInfos()->description }}"/>
    <meta name="twitter:image" content="{{ siteInfos()->getLogo() }}"/>
@endsection
@push('custom_css') @endpush
@section('content')
    <!--Start Banner Area-->
    <div class="banner-area">
        <div class="hero-slider2 owl-carousel owl-theme">
            <div class="slider-item " style="background-image:url({{ asset('assets/images/img/bannier1.jpg') }});">
                <div class="container-fluid">
                    <div class="slider-content">
                        <h1>Ukatesh Infrastructure</h1>
                        <p>
                            Nous sommes en cours construction et l'objectif est d'atteindre cette vision.
                        </p>
                        <a href="javascript:void(0)" class="default-btn btn">Decouvrez plus!<i class="flaticon-next"></i></a>
                    </div>
                </div>
            </div>
            <div class="slider-item" style="background-image:url({{ asset('assets/images/img/bannier3.jpg') }});">
                <div class="container-fluid">
                    <div class="slider-content">
                        <h1>Ukatesh Infrastructure évolution</h1>
                        <p>
                            Là ou nous en sommes maintenant avec la construction
                        </p>
                        <a href="javascript:void(0)" class="default-btn btn">Decouvrez plus!<i class="flaticon-next"></i></a>
                    </div>
                </div>
            </div>
            <div class="slider-item" style="background-image:url({{ asset('assets/images/img/bannier2.jpg') }});">
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
            <div class="slider-item" style="background-image:url({{ asset('assets/images/img/bannier4.jpg') }});">
                <div class="container-fluid">
                    <div class="slider-content">
                        <h1>Ukatesh Vision</h1>
                        <p>
                            Lorsque les jalons furent posés sur le projet avec une grande ambition!
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
                                Prière de rester branché car le site est en cours de développement ainsi que l'<b>Université en cours d'implementation</b>.
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
                        <h4>En cous developpement...</h4>
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
@endsection
@push('custom_js') @endpush

