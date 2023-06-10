<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}

    <form method="POST" wire:submit.prevent='updateGenConfig()'>
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="sitename" class="form-label">Nom de l'organisation</label>
                    <input type="text" id="sitename" class="form-control" name="sitename" placeholder="Entrez le nom de l'université" wire:model='sitename'>
                    <span class="text-danger">@error('sitename'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="sigle" class="form-label">L'Abréviation de l'organisation</label>
                    <input type="text" id="sigle" class="form-control" name="sigle" placeholder="Entrez l'abréviation l'université" wire:model='sigle'>
                    <span class="text-danger">@error('sigle'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="email" class="form-label">email de Contact</label>
                    <input type="text" id="email" class="form-control" name="email" placeholder="Ukatesh email " wire:model='email'>
                    <span class="text-danger">@error('email'){{$message}}@enderror</span>
                </div>
            </div>


            <div class="col-md-6">
                <div class="mb-3">
                    <label for="phone" class="form-label">N° Téléphone</label>
                    <input type="text" id="phone" class="form-control" name="phone" placeholder="Ukatesh n° tel " wire:model='phone'>
                    <span class="text-danger">@error('phone'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="adress" class="form-label">Adresse Physique</label>
                    <input type="text" id="adress" class="form-control" name="adress" placeholder="Ukatesh adresse physique " wire:model='adress'>
                    <span class="text-danger">@error('adress'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="mb-3" wire:ignore>
                <label for="tinymce-mytextarea" class="form-label">Déscription du site</label>
                <textarea class="form-control" name="description" id="tinymce-mytextarea" cols="4" rows="4" wire:model='description'></textarea>
                <span class="text-danger">@error('description'){{$message}}@enderror</span>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrez les modifications</button>
        </div>
    </form>

</div>
