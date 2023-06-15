<!--Including main layouts-->
@extends('layouts.main')

@section('title',$event->title)
@section('meta')
    <!--balise meta ici-->
    <meta name="robots" content="index,follow,max-snippet:-1,max-image-preview:large, max-video-preview:-1"/>
    <meta name="title" content="{{ \Str::ucFirst($event->title) }}"/>
    <meta name="description" content="{{ \Str::ucFirst(words($event->description,120)) }}"/>
    <meta name="author" content="{{ $event->author->lname }}-{{ $event->author->name }}"/>
    <link rel="canonical" href="{{ route('event.show',$event) }}"/>
    <meta property="og:title" content="{{ \Str::ucFirst($event->title) }}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:description" content="{{ \Str::ucFirst(words($event->description,120)) }}"/>
    <meta property="og:url" content="{{ route('event.show',$event) }}"/>
    <meta property="og:image" content="{{ $event->image?
                                    (\Illuminate\Support\Str::startsWith($event->image->path,'placeholders/')?
                                    asset('placeholders/post.png'):
                                     asset('storage/events/thumbnails/resized_'.$event->image->name))
                                    : asset('placeholders/post.png') }}"/>
    <meta name="twitter:domain" content="{{ \Illuminate\Support\Facades\Request::getHost() }}"/>
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:title" property="og:title" itemprop="name"  content="{{ \Str::ucFirst($event->title)}}"/>
    <meta name="twitter:description" property="og:description" itemprop="description"  content="{{ \Str::ucFirst(words($event->description,120)) }}"/>
    <meta name="twitter:image" content="{{ $event->image?
                                    (\Illuminate\Support\Str::startsWith($event->image->path,'placeholders/')?
                                    asset('placeholders/post.png'):
                                     asset('storage/events/thumbnails/resized_'.$event->image->name))
                                    : asset('placeholders/post.png') }}"/>

    <meta name="keywords" content=" Enseignement, Formation, education">
@endsection
@section('content')

    <div class="page-banner-area " style="background-image:url('{{ asset(siteInfos()->getBg()) }}')">
        <div class="container">
            <div class="page-banner-content">
                <h1>{{ $event->title }}</h1>
                <ul>
                    <li><a href="{{ route('home') }}">{{ siteInfos()->sitename }}</a></li>
                    <li><a href="{{ route('event.index') }}">Événements</a></li>
                    <li>Détail</li>
                </ul>
            </div>
        </div>
    </div>

    <!--event section-->
    <div class="events-details-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="events-details-left-content pr-20">
                        <div class="events-image">
                            <img src="{{ asset('storage/events/'.$event->image->name) }}" alt="Image">
                        </div>

                        {!! $event->content !!}

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="about-lecturer pl-20">
                        <h3>Apropos de l'événement</h3>
                        <div class="row align-items-center">
                            <img src={{$event->image->name? asset('storage/events/thumbnails/resized_'.$event->image->name) :  asset(siteInfos()->getBg()) }} alt="Image">
                            <div class="address">
                                <h4>Organisé par : {{ siteInfos()->sitename }}</h4>
                                <div class="list">
                                    <ul>
                                        <li>{{ $event->lieu??siteInfos()->adress }}</li>
                                        <li><a href="tel:{{$event->tel??siteInfos()->phone}}">{{$event->tel??siteInfos()->phone}}</a></li>
                                        <li><a href="mailto:{{$event->email??siteInfos()->email}}">{{$event->email??siteInfos()->email}}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="social-content">
                            <ul>
                                <li>
                                    <a href="{{ siteInfos()->facebook }}" target="_blank"><i class="ri-facebook-fill"></i></a>
                                </li>
                                <li>
                                    <a href="{{ siteInfos()->twitter }}" target="_blank"><i class="ri-twitter-fill"></i></a>
                                </li>
                                <li>
                                    <a href="{{ siteInfos()->youtube }}" target="_blank"><i class="ri-youtube-line"></i></a>
                                </li>
                                <li>
                                    <a href="{{ siteInfos()->linkedin }}" target="_blank"><i class="ri-linkedin-fill"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="next-workshop pl-20">
                        <h3>Voulez-vous y participer, ci-dessous les infos</h3>
                        <div class="list">
                            <ul>
                                <li><span>Date :</span>{{ $event->dat_event }}</li>
                                <li><span>Organisateur :</span>{{ siteInfos()->sitename }}</li>
                                <li><span>Lieu :</span>{{ $event->lieu??siteInfos()->adress }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
@push('custom_css')
    <link rel="stylesheet" href="{{ asset('shareBtn/jquery.floating-social-share.min.css') }}">
@endpush
@push('custom_js')
    <script src="{{ asset('shareBtn/jquery.floating-social-share.min.js') }}"></script>
    <script>

        $('body').floatingSocialShare({
            buttons:[
                "facebook","linkedin","telegram","twitter","whatsapp"
            ],
            text:"partager via: ",
            url:"{{ route('event.show',$event->slug) }}"
        });
    </script>
@endpush

