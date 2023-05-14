<div>
    {{-- The Master doesn't talk, he acts. --}}

    <form method="POST" wire:submit.prevent='updateMedia()'>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="facebook" class="form-control">Facebook</label>
                    <input type="text" id="facebook" placeholder="Votre lien de la page facebook"
                           class="form-control" wire:model='facebook'>
                    <span class="text-danger">@error('facebook'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="twitter" class="form-control">Twitter</label>
                    <input type="text" id="twitter" placeholder="Votre lien twitter...."
                           class="form-control" wire:model='twitter'>
                    <span class="text-danger">@error('twitter'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="youtube" class="form-control">Youtube</label>
                    <input type="text" id="youtube" placeholder="lien de votre chaine youtube...."
                           class="form-control" wire:model='youtube'>
                    <span class="text-danger">@error('youtube'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="linkedin" class="form-control">LinkedIn</label>
                    <input type="text" id="linkedin" placeholder="Votre lien LinkedIn...."
                           class="form-control" wire:model='linkedin'>
                    <span class="text-danger">@error('linkedin'){{$message}}@enderror</span>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer les Medias Sociaux</button>
    </form>

</div>
