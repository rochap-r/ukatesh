@extends('administration.ui.app')
@section('title','Edition de l\'Evenement '.$event->title)
@push('style')
    {{-- CSS complementaires --}}
@endpush

@section('content')

    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title text-uppercase">
                        Edition: {{ $event->title }}
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="d-flex">
                        <a href="{{ route('admin.evenements.index') }}" class="btn btn-primary text-uppercase" >
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
                            Voir les événements
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form method="POST" action="{{ route('admin.evenements.update',$event) }}" id="addEvent" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9">
                        <div class="mb-3">
                            <label class="form-title">Titre d'événement</label>
                            <input type="text" class="form-control" id="form-title" name="title" placeholder="Saisissez le titre d'événement" value="{{ $event->title }}">
                            <span class="text-danger error-text title_error"></span>
                        </div>
                        <div class="mb-3">
                            <label class="content">Contenu d'événement </label>
                            <textarea class="ckeditor form-control" id="content" name="content" rows="40" placeholder="Contenu d'événement..">
                                {!! $event->content !!}
                        </textarea>
                            <span class="text-danger error-text content_error"></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="mb-3">
                            <div class="form-lieu">Lieu d'événement</div>
                            <input type="text" class="form-control" id="form-lieu" name="lieu" placeholder="Pas obligatoire" value="{{ $event->lieu??'' }}">
                        </div>
                        <div class="mb-3">
                            <div class="form-email">Adresse email</div>
                            <input type="text" class="form-control" id="form-email" name="email" placeholder="Pas obligatoire" value="{{ $event->email??'' }}">
                        </div>
                        <div class="mb-3">
                            <div class="form-tel">Tel événement</div>
                            <input type="text" class="form-control" id="form-tel" name="tel" placeholder="Pas obligatoire" value="{{ $event->tel??'' }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date</label>
                            <input class="form-control mb-2" name="dat_event" placeholder="Select a date" id="datepicker-default" value="{{ $event->dat_event }}">
                        </div>
                        <div class="mb-3">
                            <div class="form-image">Image d'événement</div>
                            <input type="file" class="form-control" id="form-image" name="image">
                            <span class="text-danger error-text image_error"></span>
                        </div>
                        <div class="image_holder mb-2" style="max-width: 250px;">
                            <img src="" alt="" class="img-thumbnail" id="image-previewer" data-ijabo-default-img="{{ $event->image?
                        (\Illuminate\Support\Str::startsWith($event->image->path,'placeholders/')?  asset('placeholders/post.png'): asset('storage/events/thumbnails/resized_'.$event->image->name))
                        : asset('placeholders/post.png') }}">
                        </div>
                        <div class="mb-3">
                            <div>
                                <label class="row">
                                    <span class="col {{ $event->approved ? 'text-success':'text-danger' }}">{{ $event->approved ? 'Evénement Approuvé':'Evén non Approuvé' }}</span>
                                    <span class="col-auto">
                                       <label class="form-check form-check-single form-switch">
                                         <input class="form-check-input" {{ $event->approved ? 'checked':'' }} type="checkbox" name="approved">
                                           <span class="text-danger error-text approved_error"></span>
                                       </label>
                                   </span>
                                </label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary"> Enregistrer l'événement</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
@push('script')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('administration/dist/libs/litepicker/dist/litepicker.js?1674944402') }}" defer></script>

    <script>
        let dated = '';

        document.addEventListener("DOMContentLoaded", function () {
            if (window.Litepicker) {
                const picker = new Litepicker({
                    element: document.getElementById('datepicker-default'),
                    buttonText: {
                        previousMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>`,
                        nextMonth: `<!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>`,
                    },
                });
                picker.setDate(new Date());

                picker.on('selected', (date1, date2) => {
                    dated = picker.getStartDate();
                });
            }
        })



        // @formatter:on
    </script>
    <script >
        $(function (){
            $('input[type="file"][name="image"]').ijaboViewer({
                preview:'#image-previewer',
                imageShape:'rectangular',
                allowedExtensions:['jpg','jpeg','png'],
                onErrorShape:function (message,element) {

                },
                onInvalidType:function (message,element) {

                }
            })
        });

        $('form#addEvent').on('submit',function (e) {
            e.preventDefault();
            toastr.remove();
            var content=CKEDITOR.instances.content.getData();
            var form=this;
            var frmdata=new FormData(form);
            frmdata.append('content',content);

            const date = dated;

            if(typeof date!=="string"){
                //jai une erreur ici et le form
                const year = date.getFullYear();
                const month = date.getMonth() + 1;
                const day = date.getDate();
                const dateString = `${year}-${month.toString().padStart(2, '0')}-${day.toString().padStart(2, '0')}`;

                frmdata.append('dat_event',dateString);
            }

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
                        CKEDITOR.instances.content.setData('');
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
