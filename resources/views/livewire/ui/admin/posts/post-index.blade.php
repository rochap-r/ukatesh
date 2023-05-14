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
                    <div class="d-flex">
                        <a href="{{ route('admin.posts.edit',$post->slug) }}" class="card-btn btn-info">Editer</a>
                        <a href="" wire:click.prevent="deletePost({{ $post->id }})" class="card-btn btn-info">Supprimer</a>
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
