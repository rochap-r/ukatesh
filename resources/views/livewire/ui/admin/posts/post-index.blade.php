<div>
    {{-- Because she competes with no one, no one can compete with her. --}}

    <div class="row mb-2">
        <div class="col-md-3 mb-3">
            <label for="input" class="form-label">Recherche d'article par titre </label>
            <input type="text" id="input" class="form-control" placeholder="tapez un titre ici..." wire:model="search">
        </div>
        <div class="col-md-3 mb-3">
            <label for="select" class="form-label">Recherche par catégorie</label>
            <select id="select" class="form-select" wire:model="category">
                <option value="">-- selectionnez une catégorie --</option>
                @foreach(\App\Models\Category::whereHas('posts')->select('id','name')->get() as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3 mb-3">
            <label for="select" class="form-label">Recherche par Auteur</label>
            <select id="select" class="form-select" wire:model="author">
                <option value="">-- selectionnez l'auteur --</option>
                @foreach(\App\Models\User::whereHas('posts')->select('id','name')->get() as $auteur)
                    <option value="{{ $auteur->id }}">{{ $auteur->name }} {{ $auteur->fname }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3 mb-3">
            <label for="select" class="form-label">Ordonner de façon</label>
            <select id="select" class="form-select" wire:model="orderBy">
                <option value="desc"> DESCENDANTE </option>
                <option value="asc">ASCENDANTE</option>
            </select>
        </div>
    </div>

    <div class="row row-cards">
        @forelse($posts as $post)
            <div class="col-md-6 col-lg-3">
                <div class="card">
                    <img src="{{ $post->image?
                        (\Illuminate\Support\Str::startsWith($post->image->path,'placeholders/')?  asset('placeholders/post.png'): asset('storage/posts/thumbnails/resized_'.$post->image->name))
                        : asset('placeholders/post.png') }}" alt="" class="card-img-top">
                    <div class="card-body p-2">
                        <h3 class="m-0 mb-1">{{ $post->title }}</h3>
                    </div>
                    <div class="card-body p-2 text-center">

                                <h3 class="m-0 mb-1">
                                    @if($post->approved)
                                        <span class="badge badge-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                               <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                               <path d="M5 12l5 5l10 -10"></path>
                                            </svg>
                                        </span>
                                    @else
                                        <span class="badge badge-danger text-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-octagon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                               <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                               <path d="M9.103 2h5.794a3 3 0 0 1 2.122 .879l4.101 4.1a3 3 0 0 1 .88 2.125v5.794a3 3 0 0 1 -.879 2.122l-4.1 4.101a3 3 0 0 1 -2.123 .88h-5.795a3 3 0 0 1 -2.122 -.88l-4.101 -4.1a3 3 0 0 1 -.88 -2.124v-5.794a3 3 0 0 1 .879 -2.122l4.1 -4.101a3 3 0 0 1 2.125 -.88z"></path>
                                               <path d="M12 8v4"></path>
                                               <path d="M12 16h.01"></path>
                                            </svg>
                                        </span>
                                    @endif

                                        <span class="badge badge-default">{{ $post->created_at->isoFormat('D')}}-{{ \Str::ucfirst($post->created_at->isoFormat('MMM'))}}
                                        -{{ $post->created_at->isoFormat('Y')}}</span>
                                </h3>
                    </div>
                    <div class="d-flex">
                        @php
                        $class=$post->approved? "info": "warning";
                        @endphp
                        <a href="{{ route('admin.posts.edit',$post->slug) }}" class="card-btn btn-{{$class}}">Editer</a>
                        <a href="" wire:click.prevent="deletePost({{ $post->id }})" class="card-btn btn-{{$class}}">Supprimer</a>
                    </div>
                </div>
            </div>
        @empty
            <span class="text-danger">
                Aucun article n'est disponible!
            </span>
        @endforelse
        <div class="d-block mt-4">
            {{ $posts->links('livewire::bootstrap') }}
        </div>
    </div>

</div>
