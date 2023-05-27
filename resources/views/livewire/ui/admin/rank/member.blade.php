<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}

    <div>
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center mb-2">
                    <div class="col">
                        <h2 class="page-title">
                            Tous Les Utilisateurs
                        </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="d-flex">
                            <input type="search" class="form-control d-inline-block w-9 me-3"
                                   placeholder="Cherchez un membre" wire:model='search'>
                            <a href="javascript:void(0)" class="btn btn-primary">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 5l0 14"></path>
                                    <path d="M5 12l14 0"></path>
                                </svg>
                                Autres
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-xl">
            <div class="row row-cards mb-4">
                @forelse ($users as $user)
                    <div class="col-md-6 col-lg-3">
                        <div class="card">
                            <div class="card-body p-4 text-center">
                                    <span class="avatar avatar-xl mb-3 rounded"
                                          style="background-image: url({{ $user->image ?
                                    (\Illuminate\Support\Str::startsWith($user->image->path,'placeholders/')? asset($user->image->path) : asset('storage/' . $user->image->path))
                                    : asset('placeholders/picture.jpg') }})"></span>
                                <h3 class="m-0 mb-1"><a href="javascript:void(0)">{{ $user->name . ' ' . $user->sname }}</a>
                                </h3>
                                <div class="text-muted">{{ $user->email }}</div>
                                <div class="mt-3">
                                    <span class="badge bg-success-lt">{{ Str::ucfirst($user->typeUser? $user->typeUser->name : '') }}</span>
                                </div>
                                @if($user->posts_count)
                                    <div class="mt-3">
                                        <span class="badge bg-purple-lt">Auteur</span>
                                        <span class="badge bg-success-lt">{{ $user->posts_count }} Articles</span>
                                    </div>
                                @endif
                            </div>
                            <div class="d-flex">
                                <a href="#" wire:click.prevent='editUser({{ $user }})' class="card-btn">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit"
                                         width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                         stroke="currentColor" fill="none" stroke-linecap="round"
                                         stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                        <path
                                            d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z">
                                        </path>
                                        <path d="M16 5l3 3"></path>
                                    </svg>
                                    Editer
                                </a>
                                <a href="#" class="card-btn" wire:click.prevent='deleteUser({{ $user }})'>
                                    <!-- Download SVG icon from http://tabler-icons.io/i/phone -->
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="icon icon-tabler icon-tabler-trash" width="24" height="24"
                                         viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                         stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 7l16 0"></path>
                                        <path d="M10 11l0 6"></path>
                                        <path d="M14 11l0 6"></path>
                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                    </svg>
                                    Supprimer
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <span class="text-danger">Aucun Utilisateur n'est trouvé!</span>
                @endforelse
            </div>

            <div class="row mt-4">
                {{ $users->links('livewire::bootstrap') }}
            </div>



        </div>
    </div>

</div>
