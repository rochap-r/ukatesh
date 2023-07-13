<!--Including main layouts-->
@extends('layouts.main')

@section('title','Ukatesh Galérie Photos')
@section('meta')
    <!--balise meta ici-->
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

    <meta name="keywords" content=" Enseignement, Formation, education">
@endsection
@push('custom_css')
<style>
    .img-overlay {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      padding: 10px;
      background-color: rgba(0, 0, 0, 0.6);
      color: white;
    }

    .img-title {
      font-size: 1.5rem;
      font-weight: bold;
      color: #007bff;
    }
    .img-type {
      font-size: 1.2rem;
      color: #28a745;
    }
  </style>
@endpush
@section('content')

    <div class="page-banner-area " style="background-image:url('{{ asset(siteInfos()->getBg()) }}')">
        <div class="container">
            <div class="page-banner-content">
                <h1>Explorez notre Galérie des photos</h1>
                <ul>
                    <li><a href="{{ route('home') }}">{{ siteInfos()->sigle }}</a></li>
                    <li>Galérie Photos</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- galeries-->

    <div class="container my-4">
        <h1 class="py-2">Ukatesh Galérie d'images</h1>
        <div class="row">
          @forelse ($galeries as $galerie)
            <div class="col-md-6">
              <div class="card mb-4">
                <div style="position: relative;">
                  <img src="{{ asset('storage/galeries/thumbnails/thumb_'.$galerie->name) }}" class="card-img-top w-100" alt="{{ $galerie->title }}">
                  <div class="img-overlay">
                    <h5 class="img-type">{{ $galerie->type->name }}</h5>
                    <p class="img-title">{{ $galerie->title }}</p>
                  </div>
                </div>
              </div>
            </div>
            @if ($loop->iteration % 12 == 0)
              </div> <!-- fermer la rangée actuelle -->
              <div class="row">
                <div class="col">
                  {{ $galeries->links() }} <!-- afficher la pagination -->
                </div>
              </div>
              <div class="row">
            @endif
            @empty
            <div class="col-md-6">
                <div class="card mb-4">
                    <h3 class="text-danger lead">Aucune photo n'est disponible</h3>
                </div>
            </div>           
          @endforelse
        </div>
      </div>

    <!--End galeries-->


@endsection
@push('custom_js')
@endpush

