@extends('administration.ui.app')
@section('title',"Création d'un nouveau article")
@push('style')
    {{-- CSS complementaires --}}
@endpush

@section('content')

    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title text-uppercase">
                        Création d'un nouveau article
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="d-flex">
                        <a href="{{ route('admin.posts.index') }}" class="btn btn-info text-uppercase" >
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-list-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M3.5 5.5l1.5 1.5l2.5 -2.5"></path>
                                <path d="M3.5 11.5l1.5 1.5l2.5 -2.5"></path>
                                <path d="M3.5 17.5l1.5 1.5l2.5 -2.5"></path>
                                <path d="M11 6l9 0"></path>
                                <path d="M11 12l9 0"></path>
                                <path d="M11 18l9 0"></path>
                            </svg>
                            Voir les articles
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('admin.posts.add') }}" id="addPost" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <div class="mb-3">
                            <label class="form-title">Titre d'article</label>
                            <input type="text" class="form-control" id="form-title" name="title" placeholder="Saisissez le titre d'article">
                            <span class="text-danger error-text title_error"></span>
                        </div>
                        <div class="mb-3">
                            <label class="body">Contenu d'article </label>
                            <textarea class="ckeditor form-control" id="body" name="body" rows="30" placeholder="Contenu d'article..">
                        </textarea>
                            <span class="text-danger error-text body_error"></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <div class="form-category">Catégorie d'artilce</div>
                            <select class="form-control" name="category_id" id="form-category">
                                <option value="">-- non selection --</option>
                                @foreach(\App\Models\Category::all() as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <span class="text-danger error-text category_id_error"></span>
                        </div>
                        <div class="mb-3">
                            <div class="form-image">Image d'article</div>
                            <input type="file" class="form-control" id="form-image" name="image">
                            <span class="text-danger error-text image_error"></span>
                        </div>
                        <div class="image_holder mb-2" style="max-width: 250px;">
                            <img src="" alt="" class="img-thumbnail" id="image-previewer" data-ijabo-default-img="">
                        </div>
                        <div class="mb-3">
                            <div>
                                <label class="row">
                                    <span class="col">Article Approuvé</span>
                                    <span class="col-auto">
                                       <label class="form-check form-check-single form-switch">
                                         <input class="form-check-input" type="checkbox" name="approved">
                                           <span class="text-danger error-text approved_error"></span>
                                       </label>
                                   </span>
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info text-uppercase"> Enregistrer l'article</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
@push('script')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script >
        $(function (){
            $('input[type="file"][name="image"]').ijaboViewer({
                preview:'#image-previewer',
                imageShape:'rectangular',
                allowedExtensions:['jpg','jpeg','png','webp'],
                onErrorShape:function (message,element) {

                },
                onInvalidType:function (message,element) {

                }
            })
        });

        $('form#addPost').on('submit',function (e) {
            e.preventDefault();
            toastr.remove();
            var body=CKEDITOR.instances.body.getData();
            var form=this;
            var frmdata=new FormData(form);
            frmdata.append('body',body);

            $.ajax({
                url:$(form).attr('action'),
                method:$(form).attr('method'),
                data:frmdata,
                processData:false,
                dataType:'json',
                contentType:false,
                beforeSend:function () {
                    $(form).find('span.error-text').text('');
                },
                success:function (response) {
                    toastr.remove();
                    if(response.code===1){
                        $(form)[0].reset();
                        $('div.image_holder').html('');
                        CKEDITOR.instances.body.setData('');
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



