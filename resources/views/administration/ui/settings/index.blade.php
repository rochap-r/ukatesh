@extends('administration.ui.app')
@section('title','Ukatesh Paramètres Généraux')
@push('style')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.4.1/tinymce.min.js" integrity="sha512-in/06qQzsmVw+4UashY2Ta0TE3diKAm8D4aquSWAwVwsmm1wLJZnDRiM6e2lWhX+cSqJXWuodoqUq91LlTo1EA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush

@section('content')
    <div class="row align-items-center">
        <div class="col">
            <h2 class="page-title">
                Paramètres Généraux
            </h2>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <a href="#tabs-general" class="nav-link active" data-bs-toggle="tab" aria-selected="true"
                       role="tab">Paramètres Généraux</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="#tabs-logo" class="nav-link" data-bs-toggle="tab" aria-selected="false" tabindex="-1"
                       role="tab">Logo & Favicons</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="#tabs-media" class="nav-link" data-bs-toggle="tab" aria-selected="false" tabindex="-1"
                       role="tab">Medias Sociaux</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a href="#tabs-about" class="nav-link" data-bs-toggle="tab" aria-selected="false" tabindex="-1"
                       role="tab">Apropos d'Ukatesh</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane fade active show" id="tabs-general" role="tabpanel">
                    <h4>Paramètres Généraux</h4>
                    <div>
                        @livewire('ui.admin.settings.gen-config')
                    </div>
                </div>
                <div class="tab-pane fade" id="tabs-logo" role="tabpanel">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Changez le Logo du Site</h3>
                            <div class="mb-2" style="max-width: 200px">
                                <img src="" class="img-thumbnail" alt="" id="logo-image-preview"
                                     data-ijabo-default-img="{{ \App\Models\GenConfig::find(1)->getLogo() }}">
                            </div>
                            <div class="mb-2">
                                <span class="text-danger">
                                    votre image de logo doit avoir comme dimensions : 120x120
                                </span>
                            </div>
                            <form action="{{ route('admin.genConfig.changeLogo') }}" method="POST" id="changeLogo">
                                @csrf
                                <div class="mb-2">
                                    <input type="file" name="logo" class="form-control">
                                </div>
                                <button class="btn btn-primary">Changer le Logo</button>
                            </form>

                        </div>

                        <div class="col-md-6 my-2">
                            <h3>Changez l'Icone 16x16</h3>
                            <div class="mb-2" style="max-width:100px">
                                <img src="" alt="" id="favicon16-image-preview" class="img-thumbnail"
                                     data-ijabo-default-img="{{ \App\Models\GenConfig::find(1)->getIcon16() }}">
                            </div>
                            <form action="{{ route('admin.genConfig.changeIcon16') }}" method="POST" id="changeIcon16">
                                @csrf
                                <div class="mb-2">
                                    <input type="file" name="favicon16" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary">changer l'Icone 16x16</button>
                            </form>

                        </div>

                        <div class="col-md-6 my-2">
                            <h3>Changez l'Icone 48x48 .ico</h3>
                            <div class="mb-2" style="max-width:100px">
                                <img src="" alt="" id="favicon48-image-preview" class="img-thumbnail"
                                     data-ijabo-default-img="{{ \App\Models\GenConfig::find(1)->getIcon48() }}">
                            </div>
                            <form action="{{ route('admin.genConfig.changeIcon48') }}" method="POST" id="changeIcon48">
                                @csrf
                                <div class="mb-2">
                                    <input type="file" name="favicon48" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary">changer l'Icone 48x48 .ico</button>
                            </form>

                        </div>

                        <div class="col-md-6 my-2">
                            <h3>Changez l'Icone pour Apple 180x180</h3>
                            <div class="mb-2" style="max-width:100px">
                                <img src="" alt="" id="appleicon-image-preview" class="img-thumbnail"
                                     data-ijabo-default-img="{{ \App\Models\GenConfig::find(1)->getAppleIcon18() }}">
                            </div>
                            <form action="{{ route('admin.genConfig.changeAppleIcon') }}" method="POST"
                                  id="changeIcon18">
                                @csrf
                                <div class="mb-2">
                                    <input type="file" name="appleicon18" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary">changer l'Icone 180x180</button>
                            </form>
                        </div>

                        <div class="col-md-6">
                            <h3>Changez le Fond d'ecran du Site</h3>
                            <div class="mb-2" style="max-width: 200px">
                                <img src="" class="img-thumbnail" alt="" id="Bg-image-preview"
                                     data-ijabo-default-img="{{ \App\Models\GenConfig::find(1)->getBg() }}">
                            </div>
                            <form action="{{ route('admin.genConfig.changeBg') }}" method="POST" id="changeBg">
                                @csrf
                                <div class="mb-2">
                                    <input type="file" name="bg_image" class="form-control">
                                </div>
                                <button class="btn btn-primary">Changer l'image de fond du site</button>
                            </form>

                        </div>
                    </div>

                </div>
                <div class="tab-pane fade" id="tabs-media" role="tabpanel">
                    <h4>Medias Sociaux</h4>
                    <div>
                        @livewire('ui.admin.settings.social-config')
                    </div>
                </div>

                <div class="tab-pane fade active show" id="tabs-about" role="tabpanel">
                    <h4>Apropos de l'Ukatesh</h4>
                    <div>
                        <div class="row">
                            <div class="col-md-6 my-2">
                                <h3>
                                    Image d'Apropos
                                </h3>
                                <div class="mb-2" style="max-width:100px">
                                    <img src="" alt="" id="about-image-preview" class="img-thumbnail"
                                         data-ijabo-default-img="{{ \App\Models\About::find(1)->aboutImg() }}">
                                </div>
                                <form action="{{ route('admin.about.about-img') }}" method="POST" id="about">
                                    @csrf
                                    <div class="mb-2">
                                        <input type="file" name="about_img" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary">changer l'image d'à propos</button>
                                </form>

                            </div>
                            <div class="col-md-6 my-2">
                                <h3>Image du projet</h3>
                                <div class="mb-2" style="max-width:100px">
                                    <img src="" alt="" id="project-image-preview" class="img-thumbnail"
                                         data-ijabo-default-img="{{ \App\Models\About::find(1)->projectImg() }}">
                                </div>
                                <form action="{{ route('admin.about.project-img') }}" method="POST" id="project">
                                    @csrf
                                    <div class="mb-2">
                                        <input type="file" name="project_img" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-primary">changer l'image du projet</button>
                                </form>

                            </div>
                        </div>
                        <hr>

                        @livewire('ui.admin.settings.about')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <!-- Libs JS -->
    <!--<script src="" defer></script> -->
    <script>

        document.addEventListener("DOMContentLoaded", function () {
            let options = {
                selector: '#tinymce-mytextarea,#tinymce-about,#tinymce-project,#tinymce-galery',
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
                    // Ajoutez un gestionnaire d'événements pour l'événement 'change'
                    // editor.on('change', function (e) {
                    //     // Mettez à jour les données de Livewire manuellement
                    //     Livewire.find(document.getElementById('tinymce-mytextarea').closest('[wire\\:id]').getAttribute('wire:id')).set('condition', editor.getContent());
                    // });

                    editor.on('change', function (e) {
                        let livewireInstance = Livewire.find(document.getElementById(editor.id).closest('[wire\\:id]').getAttribute('wire:id'));
                        if (editor.id === 'tinymce-mytextarea') {
                            livewireInstance.set('description', editor.getContent());
                        } else if (editor.id === 'tinymce-about') {
                            livewireInstance.set('about', editor.getContent());
                        } else if (editor.id === 'tinymce-project') {
                            livewireInstance.set('project', editor.getContent());
                        }else if (editor.id === 'tinymce-galery') {
                            livewireInstance.set('galery', editor.getContent());
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

        $('input[name="bg_image"]').ijaboViewer({
            preview: '#Bg-image-preview',
            imageShape: 'rectangular',
            allowedExtensions: ['jpg', 'jpeg', 'png','webp'],
            onErrorShape: function(message, element) {
                alert(message);
            },
            onInvalidType: function(message, element) {
                alert(message);
            },
            onSuccess: function(message, element) {

            }
        });

        $('input[name="favicon48"]').ijaboViewer({
            preview: '#favicon48-image-preview',
            imageShape: 'square',
            allowedExtensions: ['ico'],
            onErrorShape: function(message, element) {
                alert(message);
            },
            onInvalidType: function(message, element) {
                alert(message);
            },
            onSuccess: function(message, element) {

            }
        });

        $('input[name="favicon16"]').ijaboViewer({
            preview: '#favicon16-image-preview',
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

        $('input[name="appleicon18"]').ijaboViewer({
            preview: '#appleicon-image-preview',
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
        //About
        $('input[name="about_img"]').ijaboViewer({
            preview: '#about-image-preview',
            imageShape: 'rectangular',
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

        //About Project
        $('input[name="project_img"]').ijaboViewer({
            preview: '#project-image-preview',
            imageShape: 'rectangular',
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
        //end About

        $('#changeBg').submit(function(e) {
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

        $('#changeIcon48').submit(function(e) {
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

        $('#changeIcon16').submit(function(e) {
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


        $('#changeIcon18').submit(function(e) {
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

        //About
        $('#about').submit(function(e) {
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

        //Project
        $('#project').submit(function(e) {
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
