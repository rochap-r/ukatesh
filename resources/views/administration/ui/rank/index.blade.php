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
                                <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid animi dignissimos
                                    exercitationem expedita facere harum illum impedit in modi nemo nesciunt non numquam
                                    odio officia, perferendis qui quia temporibus voluptatem.
                                </div>
                                <div>Aliquid, deleniti dicta eveniet incidunt magni nesciunt odio saepe. Alias aperiam
                                    dolorum hic illo inventore labore minima nemo non odio sit. Ad deleniti et facilis
                                    ipsam mollitia nesciunt nulla, placeat!
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
                    selector: '#tinymce-mytextarea,#tinymce-memberContent,#tinymce-missionContent,#tinymce-visionContent',
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
        </script>

    @endpush

