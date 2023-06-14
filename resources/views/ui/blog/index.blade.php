<!--Including main layouts-->
@extends('layouts.main')

@section('title','Actualités Universitaires')
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

    <div class="page-banner-area" style="height:20px!important;background-image:url('{{ asset(siteInfos()->getBg()) }}')">
        <div class="container">
            <div class="page-banner-content">
                <h1>Nos dernières Actualités</h1>
                <ul>
                    <li><a href="{{ route('home') }}">{{ siteInfos()->sitename }}</a></li>
                    <li>Actualités</li>
                </ul>
            </div>
        </div>
    </div>

   <div class="container" style="margin-bottom: 40%;">

       <div class="latest-news-area pt-100 pb-70" >
           <div class="container">
               <div class="row">
                   <div class="col-lg-8">
                       <div class="latest-news-left-content pr-20" style="background-image:url({{ LatestPost()? asset('storage/posts/'.LatestPost()->image->name) :'' }}); height:450px;">
                           <div class="latest-news-simple-card">
                               <div class="news-content">
                                   <div class="list">
                                       <ul>
                                           <li><i class="flaticon-user"></i>Par <a href="javascript:void(0)">{{LatestPost()? LatestPost()->author->name:'' }}</a></li>
                                           <li><i class="flaticon-tag"></i><a href="{{ route('category.index',LatestPost()->category) }}">{{ LatestPost()->category->name }}</a></li>
                                       </ul>
                                   </div>
                                   <a href="{{ route('blog.show',LatestPost()) }}"><h3>{{ LatestPost()->title }}</h3></a>
                                   <a href="{{ route('blog.show',LatestPost()) }}" class="read-more-btn active">Lire plus...<i class="flaticon-next"></i></a>
                               </div>
                           </div>

                           <div class="latest-news-card-area">
                               <h3>Dernières Actualités</h3>
                               <div class="row">
                                   @forelse($posts as $post)
                                   <div class="col-lg-6 col-md-6">

                                       <div class="single-news-card">
                                           <div class="news-img">
                                               <a href="{{ route('blog.show',$post) }}"><img src="{{ asset('storage/posts/thumbnails/resized_'.$post->image->name) }}" alt="Image"></a>
                                           </div>
                                           <div class="news-content">
                                               <div class="list">
                                                   <ul>
                                                       <li><i class="flaticon-user"></i>Par <a href="javascript:void(0)">{{ $post->author->name }}</a></li>
                                                       <li><i class="flaticon-tag"></i><a href="{{ route('category.index',$post->category) }}">{{ $post->category->name }}</a></li>
                                                   </ul>
                                               </div>
                                               <a href="{{ route('blog.show',$post) }}"><h3>{{ \Illuminate\Support\Str::limit($post->title,30) }}</h3></a>
                                               <a href="{{ route('blog.show',$post) }}" class="read-more-btn">Lire plus...<i class="flaticon-next"></i></a>
                                           </div>
                                       </div>

                                   </div>
                                   @empty
                                       <div class="col-lg-4 col-md-6">
                                           <p class="text-danger lead"> Aucun Article disponible!</p>
                                       </div>
                                   @endforelse
                               </div>
                           </div>
                           <div class=" mb-5">
                               {{ $posts->links() }}
                           </div>
                       </div>
                   </div>
                   <div class="col-lg-4">
                       <div class="serch-content">
                           <h3>Recherche</h3>
                           <div class="form-group">
                               <input type="text" class="form-control" placeholder="Recherche...">
                               <button type="submit" class="src-btn">
                                   <i class="flaticon-search"></i>
                               </button>
                           </div>
                       </div>

                       <div class="category-list">
                           <h3>Categories</h3>
                           <ul>
                               @forelse(categories() as $categorie)
                               <li>
                                   <a href="{{ route('category.index',$categorie) }}">{{ $categorie->name }}<i class="ri-arrow-drop-right-fill"></i></a>
                               </li>
                               @empty
                                   <li>
                                       <a href="javascript:void(0)" class="text-danger">Aucune catégorie...</a>
                                   </li>
                               @endforelse
                           </ul>
                       </div>

                       <div class="related-post-area">
                           <h3>Articles Relatifs</h3>
                           @forelse(relatedPosts() as $post)
                           <div class="related-post-box">
                               <div class="related-post-content">
                                   <a href="{{ route('blog.show',$post) }}"><img src="{{ asset('storage/posts/thumbnails/resized_'.$post->image->name) }}" alt="Image"></a>
                                   <h4><a href="{{ route('blog.show',$post) }}">{{ \Illuminate\Support\Str::limit($post->title,60) }}</a></h4>
                                   <p><i class="flaticon-tag"></i> <a href="{{ route('category.index',$post->category) }}">{{ $post->category->name }}</a> </p>
                               </div>
                           </div>
                           @empty
                               <div class="related-post-box">
                                   <div class="related-post-content">
                                       <p class="text-danger">Aucun article ...</p>
                                   </div>
                               </div>
                           @endforelse
                       </div>
                   </div>
               </div>
           </div>
       </div>

   </div>

@endsection
@push('custom_js')

@endpush
