<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <form method="POST" wire:submit.prevent='updateAbout()'>
        <div class="row">

            <div class="mb-3" wire:ignore>
                <label for="tinymce-about" class="form-label">Description de la section à propos du site</label>
                <textarea class="form-control" name="about" id="tinymce-about" cols="4" rows="4" wire:model='about'></textarea>
                <span class="text-danger">@error('about'){{$message}}@enderror</span>
            </div>

            <div class="mb-3" wire:ignore>
                <label for="tinymce-project" class="form-label">Description de la section Projet du site</label>
                <textarea class="form-control" name="project" id="tinymce-project" cols="4" rows="4" wire:model='project'></textarea>
                <span class="text-danger">@error('project'){{$message}}@enderror</span>
            </div>

            <div class="mb-3" wire:ignore>
                <label for="tinymce-galery" class="form-label">Description de la section Gallérie</label>
                <textarea class="form-control" name="galery" id="tinymce-galery" cols="4" rows="4" wire:model='galery'></textarea>
                <span class="text-danger">@error('galery'){{$message}}@enderror</span>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrez les modifications</button>
        </div>
    </form>



</div>
