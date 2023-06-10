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
@push('custom_css')
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBK_9tj9A9o-Evqveq-MArqTB9LgSPnxWo&callback=initMap&v=weekly"
        defer
    ></script>
    <style>
        #map {
            height: 400px; /* The height is 400 pixels */
            width: 100%; /* The width is the width of the web page */
        }

        /* Cibler toutes les divs avec class="" dans la div ayant comme class="row" */
        body{
            /* Ajouter le style souhaité ici */
            font-size: large !important;
        }

        /* Réaliser un media queries CSS des écrans des grandes tailles */
        @media screen and (min-width: 1024px) {
            /* Afficher les deux divs dans .row côte à côte sur les grands écrans */
            #galery-section .row > div,#about-section .row > div,#rank-section .row > div {
                width: 50%;
                float: left;
            }
        }


    </style>
@endpush
@section('content')
    <!--Start Banner Area-->

    <div class="banner-area">
        <div class="hero-slider2 owl-carousel owl-theme">
            @forelse($events as $event)
            <div class="slider-item " style="background-image:url({{ asset('storage/events/'.$event->image->name) }});">
                <div class="container-fluid">
                    <div class="slider-content" style="max-width: 1024px;!important;">
                        <h1>{{ $event->title }}</h1>
                        <p>
                            {!!  \Str::ucfirst(words($event->content,20)) !!}
                        </p>
                        <a href="{{ route('event.show',$event) }}" class="default-btn btn">Decouvrez plus!<i class="flaticon-next"></i></a>
                    </div>
                </div>
            </div>
            @empty
                <p class="text-danger">Aucun événement disponible</p>
            @endforelse
        </div>
    </div>
    <!--End Banner Area-->



    <!--Start Campus Information-->
    <div class="campus-information-area pt-50 pb-25">
        <div class="container">
            <div class="row">
                <div class="col-lg-6" data-aos="fade-right"
                     data-aos-easing="ease-in-sine" data-aos-duration="1300" data-aos-once="true">
                    <div class="campus-content">
                        <div class="health-care-content text-justify pt-3">
                            <a href="javascript:void(0)"><h3>Université Technologique Kanyik Tesh</h3></a>
                            <p>Ensemble avec vous, nous atteindrons le sommet et tout commencera par lorsque vous ferez de notre vision la vôtre!</p>
                        </div>
                        <div class="img">
                            <a href=javascript:void(0)"><img src="{{ asset(siteInfos()->getBg()) }}" alt="Image"></a>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="estemate-form">
                        <h2>Ukatesh Adresse Physique</h2>
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Campus Information-->

    <!--RANK Section-->
    <div class="ptb-50 bg-f4EEEA" id="rank-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="">
                    {!! rank()->aboutHome !!}
                    <a href="{{ route('rank.login') }}" class="btn btn-primary">j'adhère à la fondation Rank</a>
                </div>
                <div class="pt-2">
                    <img src="{{ asset(rank()->getLogo()) }}" alt="Logo de la fondation Rank" width="400" class="img-fluid">
                </div>
            </div>
        </div>

    </div>
    <!--End RANK Section-->

    <div class=" ptb-50 bg-f4EEEE" id="about-section">
        <div class="container">
            <div class="row">
                <div class="mb-2">
                    <h2>À propos de nous</h2>
                    <p>Nous sommes l'université technologique Kanyik Tesh, une université en cours de construction à Kolwezi en RDC qui va révolutionner avec sa politique d'enseignement. Nous proposons des formations techniques dans les domaines des mines, de la géologie, de la chimie, de la mécanique, de l'électricité, de l'électronique et de l'informatique.</p>
                    <p>Nous adoptons le système LMD basé sur plus de réalité pratique que théorique. Nous offrons un enseignement de qualité et reconnu, assuré par des enseignants qualifiés et expérimentés. Nous requérons le baccalauréat ou un diplôme équivalent pour accéder à nos formations, dont la durée varie selon le domaine et le niveau de diplôme.</p>
                    <a href="#" class="btn btn-primary">En savoir plus</a>
                </div>
                <div class="">
                    <img src="{{ asset(siteInfos()->getBg()) }}" alt="Université" class="img-fluid">
                </div>
            </div>
        </div>

        <div class="container py-5">
            <div class="row">
                <div class="">
                    <img src="{{ asset(siteInfos()->getBg()) }}" alt="Projets" class="img-fluid">
                </div>
                <div class="mt-2">
                    <h2>Nos projets futurs</h2>
                    <ul>
                        <li>Finaliser la construction du campus et l'équiper avec des infrastructures modernes et performantes.</li>
                        <li>Développer des partenariats avec des acteurs locaux et internationaux du monde académique, professionnel et social.</li>
                        <li>Lancer des programmes de recherche innovants et interdisciplinaires dans nos domaines de formation.</li>
                        <li>Renforcer l'accompagnement et l'insertion professionnelle de nos étudiants et diplômés.</li>
                        <li>Promouvoir la diversité et l'ouverture culturelle au sein de notre communauté universitaire.</li>
                    </ul>
                    <a href="#" class="btn btn-primary">En savoir plus</a>
                </div>
            </div>
        </div>

    </div>

    <!-- Section galerie-->
    <div class="ptb-50 bg-f4EEEE" id="galery-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Notre Galerie</h2>
                    <p>Nous sommes ravis de partager avec vous notre vision et notre passion pour l’éducation et la science.
                        Dans cette section, vous trouverez quelques images récentes sélectionnées de la galerie qui illustrent nos activités,
                        nos projets et notre campus en construction.
                        Vous pourrez voir à quoi ressemblera le résultat final de notre ambitieux programme de développement et d’innovation. Bonne visite!</p>
                    <a href="javascript:void(0)" class="btn btn-primary">Découvrez plus!</a>
                </div>
                <div class="col-md-6">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset(siteInfos()->getBg()) }}" alt="Ukatesh Campus 1" class="d-block w-100">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset(siteInfos()->getBg()) }}" alt="Ukatesh Campus 2" class="d-block w-100">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Section galerie-->




    <!-- article   -->
    <div class="lates-news-area ptb-100 bg-f4f6f9">
        <div class="container">
            <div class="section-title">
                <h2>Derniers Actualités</h2>
                <p>Retrouvez les derniers articles universitaires , ici.</p>
            </div>
            <div class="news-slider owl-carousel owl-theme owl-loaded owl-drag">
                <div class="owl-stage-outer">
                    <div class="owl-stage" style="transform: translate3d(-2904px, 0px, 0px); transition: all 1s ease 0s; width: 5445px;">
                        @foreach(LatestPosts() as $post)
                            <div class="owl-item cloned" style="width: 333px; margin-right: 30px;">
                                <div class="single-news-card style2">
                                    <div class="news-img">
                                        <a href="{{ route('blog.show',$post) }}"><img src="{{ asset('storage/posts/thumbnails/resized_'.$post->image->name) }}" alt="Image"></a>
                                    </div>
                                    <div class="news-content">
                                        <div class="list">
                                            <ul>
                                                <li><i class="flaticon-user"></i>Par <a href="{{ route('blog.show',$post) }}">{{ $post->author->lname }}</a></li>
                                                <li><i class="flaticon-tag"></i>{{ $post->category->name }}</li>
                                            </ul>
                                        </div>
                                        <a href="{{ route('blog.show',$post) }}"><h3>{{ \Illuminate\Support\Str::limit($post->title,50) }}</h3></a>
                                        <a href="{{ route('blog.show',$post) }}" class="read-more-btn">lire ...<i class="flaticon-next"></i></a>
                                        <span class="mx-5">
                                            {{ $post->created_at->isoFormat('D')}}-{{ \Str::ucfirst($post->created_at->isoFormat('MMM'))}}-
                                            {{ $post->created_at->isoFormat('Y')}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="owl-nav ">
                    <button type="button" role="presentation" class="owl-prev"><i class="ri-arrow-left-line"></i></button>
                    <button type="button" role="presentation" class="owl-next"><i class="ri-arrow-right-line"></i></button>
                </div>
                <div class="owl-dots d-none">
                    <button role="button" class="owl-dot"><span></span></button>
                    <button role="button" class="owl-dot"><span></span></button>
                    <button role="button" class="owl-dot active"><span></span></button>
                    <button role="button" class="owl-dot"><span></span></button>
                </div>
            </div>
        </div>
    </div>
    <!--End  article  -->
@endsection
@push('custom_js')

    <script !src="">
        // Initialize and add the map
        function initMap() {
            // The location of Uluru  ,
            const uluru = { lat: -10.711992, lng: 25.517761 };
            // The map, centered at Uluru
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 16,
                center: uluru,
            });
            map.setMapTypeId(google.maps.MapTypeId.SATELLITE);
            // The marker, positioned at Uluru
            const marker = new google.maps.Marker({
                position: uluru,
                map: map,
                label: "UKatesh",
                title: "Université Téchnologique Kanyik Tesh",
                draggable:false,
                animation:google.maps.Animation.DROP,
            });
            const infoWindow=new google.maps.InfoWindow({
                content: "<p>Bienvenue à l'Université Téchnologique Kanyik Tesh</p>"
            });
            infoWindow.open(map,marker);
        }


        window.initMap = initMap;
    </script>
@endpush

