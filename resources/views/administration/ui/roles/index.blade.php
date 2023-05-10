@extends('administration.ui.app')
@section('title', 'Gestion des roles utilisateurs')
    @push('style')
        {{-- CSS complementaires --}}
    @endpush

    @section('content')
        <div class="page-header d-print-none">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Roles d'utilisateurs
                    </h2>
                </div>
            </div>
        </div>
        @livewire('ui.admin.roles')

    @endsection
    @push('script')
    <script >
        window.addEventListener('hideRolesModal',function (e) {
            $('#roles_modal,#roles_update_modal').modal('hide');

        });

        window.addEventListener('showEditRolesModal',function (e) {
            $('#roles_update_modal').modal('show');
        });

        //reunitialisation du form dans le modal
        $('#roles_update_modal').on('hidden.bs.modal',function (e) {
            Livewire.emit('resetForm');
        });

        window.addEventListener('deleteRole',function (event){
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
                    Livewire.emit('deleteRoleAction',event.detail.id);
                }});
        })
    </script>
    @endpush
