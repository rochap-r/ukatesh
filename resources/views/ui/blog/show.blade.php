<!--Including main layouts-->
@extends('layouts.main')

@section('title',$post->title)
@section('meta')
    <!--balise meta ici-->
    <meta name="robots" content="index,follow,max-snippet:-1,max-image-preview:large, max-video-preview:-1"/>
    <meta name="title" content="{{ \Str::ucFirst($post->title) }}"/>
    <meta name="description" content="{{ \Str::ucFirst(words($post->description,120)) }}"/>
    <meta name="author" content="{{ $post->author->name }}"/>
    <link rel="canonical" href="{{ route('blog.show',$post) }}"/>
    <meta property="og:title" content="{{ \Str::ucFirst($post->title) }}"/>
    <meta property="og:type" content="article"/>
    <meta property="og:description" content="{{ \Str::ucFirst(words($post->description,120)) }}"/>
    <meta property="og:url" content="{{ route('blog.show',$post) }}"/>
    <meta property="og:image" content="{{ $post->image?
                                    (\Illuminate\Support\Str::startsWith($post->image->path,'placeholders/')?
                                    asset('placeholders/post.png'):
                                     asset('storage/posts/thumbnails/resized_'.$post->image->name))
                                    : asset('placeholders/post.png') }}"/>
    <meta name="twitter:domain" content="{{ \Illuminate\Support\Facades\Request::getHost() }}"/>
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:title" property="og:title" itemprop="name"  content="{{ \Str::ucFirst($post->title)}}"/>
    <meta name="twitter:description" property="og:description" itemprop="description"  content="{{ \Str::ucFirst(words($post->description,120)) }}"/>
    <meta name="twitter:image" content="{{ $post->image?
                                    (\Illuminate\Support\Str::startsWith($post->image->path,'placeholders/')?
                                    asset('placeholders/post.png'):
                                     asset('storage/posts/thumbnails/resized_'.$post->image->name))
                                    : asset('placeholders/post.png') }}"/>

    <meta name="keywords" content=" Enseignement, Formation, education">
@endsection
@section('content')

    <div class="page-banner-area" style="background-image:url('{{ asset(siteInfos()->getBg()) }}')">
        <div class="container">
            <div class="page-banner-content">
                <h1>{{ $post->title }}</h1>
                <ul>
                    <li><a href="{{ route('home') }}">{{ siteInfos()->sigle }}</a></li>
                    <li><a href="{{ route('blog.index') }}">Actualités</a></li>
                    <li>Détail</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="news-details-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="news-details">
                    <div class="news-simple-card">
                        <img src="{{ asset('storage/posts/'.$post->image->name) }}" alt="Image">

                        <div class="list">
                            <ul>
                                <li><i class="flaticon-user"></i>Par <a href="javascript:void(0)">{{ $post->author->lname }}-{{ $post->author->name }}</a></li>
                                <li><i class="flaticon-tag"></i>{{ $post->category->name }}</li>
                                <li>
                                    <svg xmlns="http://www.w3.org/2000/svg" style="color: #13BDF0;padding: 5px" class="icon icon-tabler icon-tabler-calendar-due" width="28" height="28" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path>
                                        <path d="M16 3v4"></path>
                                        <path d="M8 3v4"></path>
                                        <path d="M4 11h16"></path>
                                        <path d="M12 16m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                    </svg>

                                    {{ $post->created_at->isoFormat('D')}}-{{ \Str::ucfirst($post->created_at->isoFormat('MMM'))}}-
                                        {{ $post->created_at->isoFormat('Y')}}
                                </li>
                            </ul>
                        </div>
                        <h2>{{ $post->title }}</h2>
                        </div>

                        {!! $post->body !!}

                    <div class="comments">
                        <h3>Laissez vos commentaires</h3>
                        <div id="disqus_thread"></div>
                        <script>
                            /**
                             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */

                            var disqus_config = function () {
                            this.page.url ="{{ route('blog.show',$post) }}" ;  // Replace PAGE_URL with your page's canonical URL variable
                            this.page.identifier ="{{ $post->id }}" ; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                            };

                            (function() { // DON'T EDIT BELOW THIS LINE
                                var d = document, s = d.createElement('script');
                                s.src = 'https://ukatesh.disqus.com/embed.js';
                                s.setAttribute('data-timestamp', +new Date());
                                (d.head || d.body).appendChild(s);
                            })();
                        </script>
                        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
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
                    <h3>Articles Récents</h3>
                    @forelse(LatestPosts() as $post)
                        <div class="related-post-box">
                            <div class="related-post-content">
                                <a href="{{ route('blog.show',$post) }}"><img src="{{ asset('storage/posts/thumbnails/resized_'.$post->image->name) }}" alt="Image"></a>
                                <h4><a href="{{ route('blog.show',$post) }}">{{ \Illuminate\Support\Str::limit($post->title,60) }}</a></h4>
                                <p><i class="flaticon-tag"></i> {{ $post->category->name }}</p>
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
            url:"{{ route('blog.show',$post->slug) }}"
        });
    </script>
@endpush
