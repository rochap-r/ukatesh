<!--Including main layouts-->
@extends('layouts.main')

@section('title','Événements Universitaires')
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

    <div class="page-banner-area" style="background-image:url('{{ asset(siteInfos()->getBg()) }}')">
        <div class="container">
            <div class="page-banner-content">
                <h1>Les événements Universitaires</h1>
                <ul>
                    <li><a href="{{ route('home') }}">{{ siteInfos()->sigle }}</a></li>
                    <li>Événements</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="events-area pt-100 pb-70">
        <div class="container">
            <div class="row justify-content-center">
            @forelse($events as $event)
                <div class="col-lg-4 col-md-6">
                    <div class="single-events-card style-4">
                        <div class="events-image">
                            <a href="{{ route('event.show',$event) }}"><img src="{{ asset('storage/events/thumbnails/resized_'.$event->image->name) }}" alt="Image"></a>
                            <div class="date">
                                <span>{{ $event->dat_event }}</span>
                                <p class="text-uppercase">{{ $event->lieu??'site universitaire' }}</p>
                            </div>
                        </div>
                        <div class="events-content">
                            <div class="admin pt-1">
                                <p class="text-uppercase"><a href="{{ route('event.show',$event) }}"><i class="flaticon-student-with-graduation-cap"></i> {{\Str::ucfirst($event->author->lname) }}-{{ \Str::ucfirst($event->author->name) }}</a></p>
                            </div>
                            <a href="{{ route('event.show',$event) }}"><h3>{{ $event->title }}</h3></a>
                        </div>
                    </div>
                </div>
                @empty
                    <div class="col-lg-4 col-md-6">
                        <p class="text-danger lead"> Aucun événement disponible!</p>
                    </div>
            @endforelse

            </div>
            <div class="">
                {{ $events->links() }}
            </div>
        </div>
    </div>

@endsection
@push('custom_js')

@endpush

