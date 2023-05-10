@extends('administration.ui.app')
@section('title','Gestion d\'Evénements Universitaires')
    @push('style')
        {{-- CSS complementaires --}}
    @endpush

    @section('content')
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            Liste d'Événements
                        </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="d-flex">
                            <a href="javascript:void(0)" class="btn btn-primary" >
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 5l0 14"></path>
                                    <path d="M5 12l14 0"></path>
                                </svg>
                                Nouveau Membre
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @livewire('ui.admin.evenements.evenement-index')

    @endsection
    @push('script')
        {{-- JS complementaires --}}
    @endpush
