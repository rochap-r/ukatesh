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
                            <a href="{{ route('admin.gallery.create') }}" class="btn btn-success" >
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                     viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                     stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 5l0 14"></path>
                                    <path d="M5 12l14 0"></path>
                                </svg>
                                Ajouter une photo
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{--    Il faut prendre la structure sur tabler.io de la galerie    --}}
        <div class="container py-4">
            <div class="row">
              @forelse ($galeries as $galerie)
              <div class="col-md-4 mb-2">
                <div class="card">
                  <div class="position-relative">
                    <img src="{{ asset('storage/galeries/thumbnails/thumb_'.$galerie->name)}}" class="card-img-top" alt="{{ $galerie->name}}">
                    <span class="badge badge-lg bg-success position-absolute top-0 start-0 m-3">{{ $galerie->type->name}}</span>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">{{ $galerie->title }}</h5>
                    <h5 class="card-title">
                      <a href="{{ route('admin.gallery.edit',$galerie)}}" class="btn btn-danger">Editer</a>
                    </h5>
                  </div>
                </div>
              </div>
              @empty
                <p class="text-danger lead">Aucune Image disponible dans la galérie</p>
              @endforelse
            </div>
            <div class=" mb-5">
              {{ $galeries->links() }}
          </div>
          </div>
          
        <!--fin structure -->

    
    @endsection
    @push('script')
        {{-- JS complementaires --}}
    @endpush

