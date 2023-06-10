<!--Including main layouts-->
@extends('layouts.main')

@section('title','Fondation Rank')
@section('meta')
    <!--balise meta ici-->
@endsection
@push('custom_css')
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        .feature-icon-small {
            height: 80px;
        }
    </style>
@endpush
@section('content')
    <div class="container">

        <div class=" my-4 ">
            <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 ">

                <div class="col-lg-2  p-0 overflow-hidden text-center mb-2">
                    <img class="rounded-lg-3" src="{{ rank()->getLogo() }}" alt="" max-width="720">
                </div>
                <div class="col-lg-10 ">
                    <h1 class="display-4 fw-bold lh-1 text-body-emphasis">{{ rank()->name }}</h1>
                    <p class="lead text-lg-justify">
                        {!! rank()->description !!}
                    </p>
                </div>
            </div>
        </div>

        <div class="row align-items-center pb-0 pe-lg-0 pt-lg-5  mt-4">
            <div class="col-lg-12">
                <div class="faq-left-content pl-20">
                    <div class="faq-title">
                        <h2>{{ rank()->visionTitle }}</h2>
                    </div>
                    <div class="accordion" id="accordionVision">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingVision">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseVision" aria-expanded="false" aria-controls="collapseVision">
                                    Découvrez la vision de la Fondation RANK.
                                </button>
                            </h2>
                            <div id="collapseVision" class="accordion-collapse collapse" aria-labelledby="headingVision" data-bs-parent="#accordionVision">
                                <div class="accordion-body">
                                    {!! rank()->visionContent !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class=" mb-5 mt-2 ">
            <div class="row align-items-center pb-0 pe-lg-0 pt-lg-5  mt-4">
                <div class="col-lg-12">
                    <div class="faq-left-content pl-20">
                        <div class="faq-title">
                            <h2>{{ rank()->missionTitle }}</h2>
                        </div>
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        Découvrez la mission de la Fondation RANK.
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {!! rank()->missionContent !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="academics-area">
        <div class="container">
            <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 mb-4">
                <h2>{{ rank()->memberTitle }}</h2>
                {!! rank()->memberContent !!}
            </div>


            <div class="row p-2">
                <div class="col-lg-12 ">
                    <div class="academics-left-content">
                        <div class="row justify-content-center">
                            @forelse(rankTeam() as $member)
                                <div class="col-lg-4 col-sm-6">
                                    <div class="single-academics-card bg-white">
                                        <div class="icon">
                                            <img class="img-thumbnail" width="120" src="{{ $member->image? asset('storage/'.$member->image->path) : rank()->getLogo() }}" alt="">
                                        </div>
                                        <a href="javascript:void(0)"><h3>{{ \Str::ucfirst($member->name) }} {{ \Str::ucfirst($member->lname) }}</h3></a>
                                        <p class="lead">{{ \Str::title($member->fonction->name)/* Str::title= ucwords */}}</p>
                                        <h5 class="">{{ rank()->name }}</h5>
                                    </div>
                                </div>
                            @empty
                                <div class="col-lg-12 col-sm-12 text-center">
                                    <p class="text-danger lead">Aucun membre de l'équipe n'est disponible</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container px-4 py-5">
        <div class=" align-items-md-center pt-2 pb-5">
            <div class="">
                <h3 class="fw-bold text-center">Nos Informations de contact</h3>
                <div class="row">
                    <div class="col-12 col-md d-flex flex-column p-2 mx-2 text-center">
                        <div class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                            <i class='bx bx-phone-call bx-lg bx-circle-circle' ></i>
                        </div>
                        <h4 class="fw-semibold mb-0 m-3">{{ rank()->tel }}</h4>
                    </div>

                    <div class="col-12 col-md d-flex flex-column p-2 mx-2 text-center">
                        <div class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                            <i class='bx bxs-map bx-lg bx-circle-circle'></i>
                        </div>
                        <h4 class="fw-semibold mb-0 m-2">{{ rank()->address }}</h4>
                    </div>

                    <div class="col-12 col-md d-flex flex-column p-2 mx-2 text-center">
                        <div class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                            <i class='bx bxs-envelope bx-lg bx-circle-circle'></i>
                        </div>
                        <h4 class="fw-semibold mb-0 m-3">{{ rank()->email }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@push('custom_js')

@endpush
