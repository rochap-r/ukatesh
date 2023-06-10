<div>
    {{-- Stop trying to control. --}}

    <form method="POST" wire:submit.prevent='updateCondition()'>
        <div class="row">

            <div class="mb-3" wire:ignore>
                <label for="tinymce-aboutHome" class="form-label">Présentation de la fondation sur l'accueil</label>
                <textarea class="form-control" name="aboutHome" id="tinymce-aboutHome" cols="4" rows="4" wire:model='aboutHome'></textarea>
                <span class="text-danger">@error('aboutHome'){{$message}}@enderror</span>
            </div>
            <div class="mb-3" wire:ignore>
                <label for="tinymce-condition" class="form-label">Conditions d'adhésion à la Fondation</label>
                <textarea class="form-control" name="conditions" id="tinymce-condition" cols="4" rows="4" wire:model='condition'></textarea>
                <span class="text-danger">@error('condition'){{$message}}@enderror</span>
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour les conditions d'adhésion à la fondation</button>
        </div>
    </form>

</div>
