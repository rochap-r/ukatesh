@extends('administration.ui.app')
@section('title','Paramètres Fondation RANK')
@push('style')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.4.1/tinymce.min.js" integrity="sha512-in/06qQzsmVw+4UashY2Ta0TE3diKAm8D4aquSWAwVwsmm1wLJZnDRiM6e2lWhX+cSqJXWuodoqUq91LlTo1EA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush

    @section('content')

        <div class="row row-deck row-cards">
            <div class="row align-items-center">
                <div class="col">
                    <h2 class="page-title text-uppercase">
                        Edition fondation rank
                    </h2>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a href="#tabs-general" class="nav-link active" data-bs-toggle="tab" aria-selected="true" role="tab">Configuration</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#tabs-member" class="nav-link" data-bs-toggle="tab" aria-selected="false" tabindex="-1"
                               role="tab">Membres</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#tabs-condition" class="nav-link" data-bs-toggle="tab" aria-selected="false" tabindex="-1"
                               role="tab">Conditions</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a href="#tabs-logo" class="nav-link" data-bs-toggle="tab" aria-selected="false" tabindex="-1"
                               role="tab">Logo & Medias</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="tabs-general" role="tabpanel">
                            <h4>Vision</h4>
                            <div>
                               @livewire('ui.admin.ranks.config')
                            </div>
                        </div>

                        <div class="tab-pane fade" id="tabs-member" role="tabpanel">
                            <h4>Membres</h4>
                            <div>
                                @livewire('ui.admin.rank.member')
                            </div>
                        </div>

                        <div class="tab-pane fade active show" id="tabs-condition" role="tabpanel">
                            <div>
                                @livewire('ui.admin.rank.condition')
                            </div>
                        </div>
                        <div class="tab-pane fade active show" id="tabs-logo" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Changez le Logo de la fondation</h3>
                                    <div class="mb-2" style="max-width: 200px">
                                        <img src="" class="img-thumbnail" alt="" id="logo-image-preview"
                                             data-ijabo-default-img="{{ \App\Models\Rank::find(1)->getLogo() }}">
                                    </div>
                                    <div class="mb-2">
                                        <span class="text-danger">
                                            votre image de logo doit avoir comme dimensions : 120x120
                                        </span>
                                    </div>
                                    <form action="{{ route('admin.rank.changeLogo') }}" method="POST" id="changeLogo">
                                        @csrf
                                        <div class="mb-2">
                                            <input type="file" name="logo" class="form-control">
                                        </div>
                                        <button class="btn btn-primary">Changer le Logo</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
    @push('script')
        {{-- JS complementaires --}}
        <script>
            document.addEventListener("DOMContentLoaded", function () {
                let options = {
                    selector: '#tinymce-mytextarea,#tinymce-memberContent,#tinymce-missionContent,#tinymce-visionContent,#tinymce-condition,#tinymce-aboutHome',
                    height: 300,
                    menubar:'favs file edit  format',
                    statusbar: false,
                    plugins: [
                        'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor',
                    ],
                    toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
                        'bullist numlist outdent indent | link' +
                        'forecolor backcolor',
                    content_style: 'body { font-family: -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif; font-size: 14px; -webkit-font-smoothing: antialiased; }',
                    setup: function (editor) {
                        editor.on('change', function (e) {
                            let livewireInstance = Livewire.find(document.getElementById(editor.id).closest('[wire\\:id]').getAttribute('wire:id'));
                            if (editor.id === 'tinymce-mytextarea') {
                                livewireInstance.set('description', editor.getContent());
                            } else if (editor.id === 'tinymce-memberContent') {
                                livewireInstance.set('memberContent', editor.getContent());
                            } else if (editor.id === 'tinymce-missionContent') {
                                livewireInstance.set('missionContent', editor.getContent());
                            }else if (editor.id === 'tinymce-visionContent') {
                                livewireInstance.set('visionContent', editor.getContent());
                            }else if (editor.id === 'tinymce-condition') {
                                livewireInstance.set('condition', editor.getContent());
                            }else if (editor.id === 'tinymce-aboutHome') {
                                livewireInstance.set('aboutHome', editor.getContent());
                            }
                        });
                    }


                }
                if (localStorage.getItem("tablerTheme") === 'dark') {
                    options.skin = 'oxide-dark';
                    options.content_css = 'dark';
                }
                tinyMCE.init(options);
            })

            $('input[name="logo"]').ijaboViewer({
                preview: '#logo-image-preview',
                imageShape: 'square',
                allowedExtensions: ['jpg', 'jpeg', 'png'],
                onErrorShape: function(message, element) {
                    alert(message);
                },
                onInvalidType: function(message, element) {
                    alert(message);
                },
                onSuccess: function(message, element) {

                }
            });

            $('#changeLogo').submit(function(e) {
                e.preventDefault();
                var form = this;
                $.ajax({
                    url: $(form).attr('action'),
                    method: $(form).attr('method'),
                    data: new FormData(form),
                    processData: false,
                    dataType: 'json',
                    contentType: false,
                    beforeSend: function() {},
                    success: function(data) {
                        toastr.remove();
                        if (data.status == 1) {
                            toastr.success(data.msg);
                            $(form)[0].reset();
                            Livewire.emit('UpdateHeader');
                        } else {
                            toastr.error(data.msg)
                        }
                    }
                });
            })
        </script>

    @endpush

