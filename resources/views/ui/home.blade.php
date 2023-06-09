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
    <!--
        <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBK_9tj9A9o-Evqveq-MArqTB9LgSPnxWo&callback=initMap&v=weekly"
        defer
    ></script>
    -->
    <link rel="stylesheet" href="{{asset('assets/leaflet/leaflet.css')}}">

    <style>
        #map{
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
            <div id="slider-xxx" class="slider-item " style="height:776px!important; background-image:url({{ asset('storage/events/thumbnails/banner_'.$event->image->name) }});">
                <div class="container-fluid">
                    <div class="slider-content" style="max-width: 1024px;!important;">
                        <h1>{{ $event->title }}</h1>
                        <p>
                            {!!  \Str::ucfirst(words($event->content,50)) !!}
                        </p>
                        @if($event->readable)
                            <a href="{{ route('event.show',$event) }}" class="default-btn btn">Decouvrez plus!<i class="flaticon-next"></i></a>
                        @endif
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
                            <a href="javascript:void(0)"><h3>{{ siteInfos()->sitename }}</h3></a>
                            {!! siteInfos()->description !!}
                        </div>
                        <div class="img">
                            <a href="javascript:void(0)"><img src="{{ asset(siteInfos()->getBg()) }}" alt="Image"></a>
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
    <!-- About -->
    <div class=" ptb-50 bg-f4EEEE" id="about-section">
        <div class="container">
            <div class="row">
                <div class="mb-2">
                    {!! about()->about !!}
                    <a href="javascript:void(0)" class="btn btn-primary">En savoir plus</a>
                </div>
                <div class="">
                    <img src="{{ about()->aboutImg() }}" alt="Université" class="img-fluid">
                </div>
            </div>
        </div>


        <div class="container py-5">
            <div class="row">
                <div class="">
                    <img src="{{ about()->projectImg() }}" alt="Projets" class="img-fluid">
                </div>
                <div class="mt-2">
                    {!! about()->project !!}
                    <a href="javascript:void(0)" class="btn btn-primary">En savoir plus</a>
                </div>
            </div>
        </div>

    </div>
    <!-- About -->

    <!-- Section galerie-->

    <div class="ptb-50 bg-f4EEEE" id="galery-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    {!!  about()->galery !!}
                    <a href="{{ route('galery.index')}}" class="btn btn-primary">Découvrez plus!</a>
                </div>
                <div class="col-md-6">
                    
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @forelse(LatestGaleries() as $key => $galerie)
                        
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img src="{{ asset('storage/galeries/thumbnails/thumb_'.$galerie->name) }}" alt="{{ $galerie->title }}" class="d-block w-100">
                                </div>
                            @empty
                            <div class="carousel-item">
                                <span class="text-danger">aucune image disponible dans la galérie</span>    
                            </div>
                            @endforelse
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Précedent</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Suivant</span>
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
                <p class="lead">Retrouvez les derniers articles en tendance , ici.</p>
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

    <!--
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
                label: "Ukatesh",
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
    -->
    <script src="{{asset('assets/leaflet/leaflet.js')}}"></script>
    <script>
        function initMap() {
        // Définir les coordonnées pour le centre de la carte
        var centerLatLng = L.latLng(-10.711992, 25.517761);

        // Créer une instance de la carte Leaflet
        var map = L.map('map').setView(centerLatLng, 16);

        // Ajouter une couche de tuiles de Google Maps satellite à la carte
        var tileLayer = L.tileLayer('https://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains:['mt0','mt1','mt2','mt3']
        }).addTo(map);

        // Ajouter un écouteur d'événement pour l'événement load de la couche de tuiles
        tileLayer.on('load', function() {
            // Ajouter un marqueur pour le centre de la carte
            var marker = L.marker(centerLatLng, {
            title: "Université Téchnologique Kanyik Tesh",
            draggable: false
            }).addTo(map);

            // Ajouter une popup au marqueur avec des informations sur l'université
            marker.bindPopup("<p>Bienvenue à l'Université Téchnologique Kanyik Tesh</p>").openPopup();
        });
        }

        // Appeler la fonction initMap() lorsque la page est chargée
        window.addEventListener("load", initMap);
            </script>
@endpush
