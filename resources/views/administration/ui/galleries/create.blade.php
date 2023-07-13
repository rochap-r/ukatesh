@extends('administration.ui.app')
@section('title','Gestion des photos')
    @push('style')
        {{-- CSS complementaires --}}
    @endpush

    @section('content')
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title text-uppercase text-success">
                            Gallérie photos
                        </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="d-flex">
                            <a href="{{ route('admin.gallery.index') }}" class="btn btn-success" >
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 5l0 14"></path>
                                    <path d="M5 12l14 0"></path>
                                </svg>
                                Accueil
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Formulaire -->
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                  <form  id="upload-file-form"  enctype="multipart/form-data">
                    @csrf
                    <div class="image_holder mb-3 text-center">
                        <img src="" alt="" class="img-thumbnail" id="image-previewer" data-ijabo-default-img="">
                    </div>
                    <div class="form-group h2 mb-3">
                      <label for="categorySelect">Type d'image:</label>
                        <select class="form-control" id="categorySelect" name="type" id="form-type">
                            <option value="">-- Aucune selection --</option>
                            @foreach(\App\Models\Type::all() as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger error-text type_error"></span>
                    </div>
                    <div class="form-group h2 mb-3">
                      <label for="titleInput">Titre de l'image:</label>
                      <input type="text" class="form-control" id="titleInput" name="title">
                      <span class="text-danger error-text title_error"></span>
                    </div>
                    <div class="form-group h2 mb-3">
                      <label for="fileInput">Sélectionnez une  image:</label>
                      <input type="file" class="form-control-file" name="file" id="fileInput">
                      <span class="text-danger error-text file_error"></span>
                    </div>
                    <button type="submit" class="btn btn-success btn-lg">Envoyer</button>
                  </form>
                </div>
            </div>
        </div>
          
        <!-- Fin formulaire -->

            
    @endsection
    @push('script')
        {{-- JS complementaires --}}
        <script type="text/javascript">
            $(function (){
                $('input[type="file"][name="file"]').ijaboViewer({
                    preview:'#image-previewer',
                    imageShape:'rectangular',
                    allowedExtensions:['jpg','jpeg','png','webp'],
                    onErrorShape:function (message,element) {

                    },
                    onInvalidType:function (message,element) {

                    }
                })
            });

            $('#upload-file-form').on('submit', function(e) {
                e.preventDefault();
                toastr.remove();
                var form=this;
                const formData = new FormData(this);
            
                $.ajax({
                    url: "{{ route('admin.gallery.store') }}",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    dataType:'json',
                    contentType: false,
                    beforeSend:function () {
                    $(form).find('span.error-text').text('');
                    },
                    success:function (response) {
                    toastr.remove();
                        if(response.code===1){
                            $(form)[0].reset();
                            $('div.image_holder').html('');
                            toastr.success(response.msg);
                        }else{
                            toastr.error(response.msg);
                        }
                    },
                    error:function (response) {
                        toastr.remove();
                        $.each(response.responseJSON.errors,function (prefix,val) {
                            $(form).find('span.'+prefix+'_error').text(val[0]);
                        });
                    }
                });
            });

        </script>
    @endpush