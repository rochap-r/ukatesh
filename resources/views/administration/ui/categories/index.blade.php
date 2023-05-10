
@extends('administration.ui.app')
@section('title','Gestion de Catégories d\'Articles')
    @push('style')
        {{-- CSS complementaires --}}
    @endpush

    @section('content')
        <div class="page-header d-print-none">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Catégories d'Articles
                    </h2>
                    <hr>
                </div>
            </div>
        </div>
        @livewire('ui.admin.categories')
    @endsection
    @push('script')
        <script >
            window.addEventListener('hideCategoriesModal',function (e) {
                $('#categories_modal').modal('hide');
            });

            window.addEventListener('showEditCategoriesModal',function (e) {
                $('#categories_modal').modal('show');
            });

            //reunitialisation du form dans le modal
            $('#categories_modal').on('hidden.bs.modal',function (e) {
                Livewire.emit('resetForm');
            });

            window.addEventListener('deleteCategory',function (event){
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
                        Livewire.emit('deleteCategoryAction',event.detail.id);
                    }});
            })
        </script>
    @endpush
