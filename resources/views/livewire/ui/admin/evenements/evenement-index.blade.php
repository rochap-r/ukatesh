<div>
    {{-- Stop trying to control. --}}

        <div class="row mb-2">
            <div class="col-md-3 mb-3">
                <label for="input" class="form-label">Recherche d'article par titre </label>
                <input type="text" id="input" class="form-control" placeholder="tapez un titre ici..." wire:model="search">
            </div>
            <div class="col-md-3 mb-3">
                <label for="select" class="form-label">Recherche par Auteur</label>
                <select id="select" class="form-select" wire:model="author">
                    <option value="">-- selectionnez l'auteur --</option>
                    @foreach(\App\Models\User::whereHas('evenements')->select('id','name')->get() as $auteur)
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
            @forelse($events as $event)
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <img src="{{ $event->image?
                        (\Illuminate\Support\Str::startsWith($event->image->path,'placeholders/')?
                        asset('placeholders/post.png'): asset('storage/events/thumbnails/resized_'.$event->image->name))
                        : asset('placeholders/post.png') }}" alt="" class="card-img-top">
                        <div class="card-body p-2">
                            <h3 class="m-0 mb-1">{{ $event->title }}</h3>
                        </div>

                        <div class="card-body p-2 text-center">
                            <h3 class="m-0 mb-1">
                                @if($event->approved)
                                    <span class="badge badge-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                               <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                               <path d="M5 12l5 5l10 -10"></path>
                                            </svg>
                                        </span>
                                @else
                                    <span class="badge badge-danger text-danger">
                                           <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-backspace" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                               <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                               <path d="M20 6a1 1 0 0 1 1 1v10a1 1 0 0 1 -1 1h-11l-5 -5a1.5 1.5 0 0 1 0 -2l5 -5z"></path>
                                               <path d="M12 10l4 4m0 -4l-4 4"></path>
                                            </svg>
                                    </span>
                                @endif

                                <span class="badge badge-default">{{ $event->created_at->isoFormat('D')}}-{{ \Str::ucfirst($event->created_at->isoFormat('MMM'))}}
                                        -{{ $event->created_at->isoFormat('Y')}}</span>
                            </h3>
                        </div>

                        <div class="d-flex">
                            <a href="{{ route('admin.evenements.edit',$event->slug) }}" class="card-btn">Editer</a>
                            <a href="" wire:click.prevent="deleteEvent({{ $event->id }})" class="card-btn">Supprimer</a>
                        </div>
                    </div>
                </div>
            @empty
                <span class="text-danger">
                Aucun article n'est disponible!
            </span>
            @endforelse
            <div class="d-block mt-4">
                {{ $events->links('livewire::bootstrap') }}
            </div>
        </div>


</div>
