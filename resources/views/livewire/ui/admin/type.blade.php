<div>
    {{-- Stop trying to control. --}}

    <div class="row ">
        <div class="card mb-2">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs my-1">
                    <h4>Tous les Types d'images</h4>
                    <li class="nav-item ms-auto">
                        <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#type_modal">
                            <!-- Download SVG icon from http://tabler-icons.io/i/settings -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 5l0 14"></path>
                                <path d="M5 12l14 0"></path>
                            </svg>
                            Nouveau Type
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead class="table-light">
                        <tr>
                            <th>N° Type</th>
                            <th>Nom du Type</th>
                            <th>NB d'Images</th>
                            <th class="w-1">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($types as $type)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="ms-2">
                                            <h6 class="mb-0 font-14">N° {{ $type->id }}</h6>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $type->name }}</td>

                                <td>{{ $type->galeries_count }} Image(s)</td>

                                <td>
                                    <div class="d-flex order-actions">
                                        <a href="#" class="btn btn-primary" wire:click.prevent='editType({{ $type->id }})'>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                                                <path d="M13.5 6.5l4 4"></path>
                                            </svg>
                                            editer
                                        </a>
                                        <a href="#" wire:click.prevent="deleteType({{ $type->id }})"  class="ms-3 btn btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M4 7l16 0"></path>
                                                <path d="M10 11l0 6"></path>
                                                <path d="M14 11l0 6"></path>
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                            </svg>
                                            effacer
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4"><span class="text-danger">Aucun Role disponible</span></td>
                            </tr>
                        @endforelse
                        <tr>
                            <td colspan="4">
                                <div class="d-block mt-2">
                                    {{ $types->links('livewire::bootstrap') }}
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- model de creation et mise à jour des status !-->
    <div wire:ignore.self class="modal modal-blur fade" id="type_modal" tabindex="-1" aria-hidden="true" style="display: none;"
         data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="modal-content" method="POST"
                  @if($updateTypeMode) wire:submit.prevent='updateType()' @else wire:submit.prevent='addType()' @endif >

                <div class="modal-header">
                    <h5 class="modal-title">{{ $updateTypeMode? "Mise à jour du Type ".$name."":'Création d\'un nouveau Type' }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @csrf

                    @if($updateTypeMode===true)

                        <input type="hidden" wire:model='selected_id'>
                    @endif

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="border border-3 p-4 rounded">
                                <div class="mb-3">
                                    <label for="inputProductTitle" class="form-label">Nom du Type</label>
                                    <input type="text" name="name"  class="form-control" id="inputProductTitle" placeholder="Tapez le titre du status" wire:model="name">
                                    <span class="text-danger"> @error('name'){{ $message }}@enderror </span>
                                </div>
                            </div>
                        </div>
                    </div><!--end row-->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-primary">{{ $updateTypeMode? 'Mettre à jour':'Enregistrer' }}</button>
                </div>
            </form>
        </div>
    </div>

</div>
