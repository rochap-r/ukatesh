<div>
    {{-- The whole world belongs to you. --}}

    <form method="POST" wire:submit.prevent='updateConfig()'>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="email" class="form-label">email de Contact</label>
                    <input type="text" id="email" class="form-control" name="email" placeholder="Rank email " wire:model='email'>
                    <span class="text-danger">@error('email'){{$message}}@enderror</span>
                </div>
            </div>


            <div class="col-md-6">
                <div class="mb-3">
                    <label for="phone" class="form-label">N° Téléphone</label>
                    <input type="text" id="phone" class="form-control" name="tel" placeholder="Rank n° tel " wire:model='tel'>
                    <span class="text-danger">@error('tel'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="address" class="form-label">Adresse Physique</label>
                    <input type="text" id="address" class="form-control" name="address" placeholder="Rank adresse physique " wire:model='address'>
                    <span class="text-danger">@error('address'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="name" class="form-label">Section Présentation</label>
                    <input type="text" id="name" class="form-control" name="name" placeholder="Entrez le nom de la fondation" wire:model='name'>
                    <span class="text-danger">@error('name'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="mb-3" wire:ignore>
                <label for="tinymce-mytextarea" class="form-label">Texte de présentation</label>
                <textarea class="form-control" name="description" id="tinymce-mytextarea" cols="4" rows="4" wire:model='description'></textarea>
                <span class="text-danger">@error('description'){{$message}}@enderror</span>
            </div>

            <div class="col-md-12">
                <div class="mb-3">
                    <label for="name" class="form-label">Section 1</label>
                    <input type="text" id="visionTitle" class="form-control" name="visionTitle" placeholder="introduction à la section mission" wire:model='visionTitle'>
                    <span class="text-danger">@error('visionTitle'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="mb-3" wire:ignore>
                <label for="tinymce-visionContent" class="form-label">Texte Section 1</label>
                <textarea class="form-control" name="visionContent" id="tinymce-visionContent" cols="4" rows="4" wire:model='visionContent'></textarea>
                <span class="text-danger">@error('visionContent'){{$message}}@enderror</span>
            </div>

            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Section 2</label>
                    <input type="text" id="memberTitle" class="form-control" name="memberTitle" placeholder="introduction à la section membre" wire:model='memberTitle'>
                    <span class="text-danger">@error('visionTitle'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="mb-3" wire:ignore>
                <label for="tinymce-memberContent" class="form-label">Détails Introduction Membres</label>
                <textarea class="form-control" name="memberContent" id="tinymce-memberContent" cols="4" rows="4" wire:model='memberContent'></textarea>
                <span class="text-danger">@error('memberContent'){{$message}}@enderror</span>
            </div>

            <div class="col-md-12">
                <div class="mb-3">
                    <label for="name" class="form-label">Section 3</label>
                    <input type="text" id="visionTitle" class="form-control" name="visionTitle" placeholder="introduction à la section mission" wire:model='memberTitle'>
                    <span class="text-danger">@error('visionTitle'){{$message}}@enderror</span>
                </div>
            </div>
            <div class="mb-3" wire:ignore>
                <label for="tinymce-missionContent" class="form-label">Texte Section 3</label>
                <textarea class="form-control" name="missionContent" id="tinymce-missionContent" cols="4" rows="4" wire:model='missionContent'></textarea>
                <span class="text-danger">@error('missionContent'){{$message}}@enderror</span>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrez les modifications</button>
        </div>
    </form>

</div>
