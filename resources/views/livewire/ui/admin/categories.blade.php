<div>
    {{-- Because she competes with no one, no one can compete with her. --}}

    <div class="row ">
        <div class="card mb-2">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs my-1">
                    <h4>Tous les Catégories</h4>
                    <li class="nav-item ms-auto">
                        <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#categories_modal">
                            <!-- Download SVG icon from http://tabler-icons.io/i/settings -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 5l0 14"></path>
                                <path d="M5 12l14 0"></path>
                            </svg>
                            Nouvelle Catégorie
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-striped">
                        <thead>
                        <tr>
                            <th>N° Catégorie</th>
                            <th>Nom Catégorie</th>
                            <th>Articles Rélatifs</th>
                            <th class="w-1"> Opérations</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($categories as $categorie)
                            <tr>
                                <td>N° {{ $categorie->id }}</td>
                                <td class="text-muted">
                                    {{ $categorie->name }}
                                </td>
                                <td class="text-muted">
                                    {{ $categorie->posts_count }} Articles
                                </td>
                                <td>
                                    <div class="btn-group text-md">
                                        <a href="#" class="btn btn-md  btn-primary" wire:click.prevent='editCategory({{ $categorie->id }})'>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                                <path d="M13.5 6.5l4 4"></path>
                                            </svg>
                                            Editer
                                        </a>
                                        &nbsp;&nbsp;
                                        <a href="#" wire:click.prevent="deleteCategory({{ $categorie->id }})" class="btn btn-md  btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M4 7l16 0"></path>
                                                <path d="M10 11l0 6"></path>
                                                <path d="M14 11l0 6"></path>
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                            </svg>
                                            Effacer
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4"><span class="text-danger">Aucune Catégorie disponible</span></td>
                            </tr>
                        @endforelse
                        <tr>
                            <td colspan="4">
                                <div class="d-block mt-2">
                                    {{ $categories->links('livewire::bootstrap') }}
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- model de creation et mise à jour des categories !-->
    <div wire:ignore.self class="modal modal-blur fade" id="categories_modal" tabindex="-1" aria-hidden="true" style="display: none;"
         data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" method="POST"
                  @if($updateCategoryMode) wire:submit.prevent='updateCategory()' @else wire:submit.prevent='addCategory()' @endif >

                <div class="modal-header">
                    <h5 class="modal-title">{{ $updateCategoryMode? "Mise à jour de la catégorie ".$name."":'Création d\'une nouvelle catégorie' }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf

                    @if($updateCategoryMode===true)

                        <input type="hidden" wire:model='selected_id'>
                    @endif
                    <div class="mb-3">
                        <label class="form-label">Nom de la catégorie</label>
                        <input type="text" class="form-control" name="name" placeholder="Saisissez une nouvelle categorie" wire:model='name'>
                        <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">{{ $updateCategoryMode? 'Mettre à jour':'Enregistrer' }}</button>
                </div>
            </form>
        </div>
    </div>

</div>
