@extends('administration.ui.app')
@section('title','Gestion des fonctions d\'Utilisateurs')
@push('style')
    {{-- CSS complementaires --}}
@endpush

@section('content')
    <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Fonctions d'Utilisateurs

                </h2>
            </div>
        </div>
    </div>
    @livewire('ui.admin.fonctions.fonction')

@endsection
@push('script')
    <script >
        window.addEventListener('hideFonctionModal',function (e) {
            $('#fonction_modal').modal('hide');
        });

        window.addEventListener('showEditFonctionModal',function (e) {
            $('#fonction_modal').modal('show');
        });

        //reunitialisation du form dans le modal
        $('#fonction_modal').on('hidden.bs.modal',function (e) {
            Livewire.emit('resetForm');
        });

        window.addEventListener('deleteFonction',function (event){
            swal.fire({
                title:event.detail.title,
                imageWidth:56,
                imageHeight:56,
                html:event.detail.html,
                showCloseButton:true,
                showCancelButton:true,
                cancelButtonText:'Annuler',
                confirmButton: 'Oui, Supprimer',
                cancelButtonColor:'#d33',
                confirmButtonColor:'#3085d6',
                width:500,
                allowOutsideClick:false
            }).then(function(result){
                if (result.value) {
                    Livewire.emit('deleteFonctionAction',event.detail.id);
                }});
        })
    </script>
@endpush


