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

                <div class="col-lg-2  p-0 overflow-hidden">
                    <img class="rounded-lg-3" src="{{ asset('assets/rank/apple-touch-icon.png') }}" alt="" width="720">
                </div>
                <div class="col-lg-10 ">
                    <h1 class="display-4 fw-bold lh-1 text-body-emphasis">Fondation Rank</h1>
                    <p class="lead text-lg-justify">
                        La République démocratique du Congo en général et la Province du
                        Lualaba en particulier est connue pour l’inadéquation
                        flagrante entre sa richesse minière et l’accessibilité à ces richesses par sa population.
                        Cela constitue un paradoxe qui se caractérise principalement par <b>le manque de progrès dans l’habitat en milieux ruraux</b>,
                        <b>le non-accès à l’énergie verte</b>, <b>les effets dévastateurs sur la faune et la flore</b>, <b>le non-accès à l’eau potable</b>,
                        <b>le dépeuplement des campagnes par l’exode rural</b>.
                    </p>
                </div>
            </div>
        </div>

        <div class="row align-items-center pb-0 pe-lg-0 pt-lg-5  mt-4">
            <div class="col-lg-12">
                <div class="faq-left-content pl-20">
                    <div class="faq-title">
                        <h2>Vision de la fondation</h2>
                    </div>
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    1. Prévoir le meilleur pour demain.
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Nous ne pouvons pas espérer le meilleur de demain si nous ne le préparons pas aujourd'hui.
                                    C'est pourquoi la fondation <b>Rank</b> vise de ...
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    2. Agir pour anticiper
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Tous les problèmes que nous subissons sont influencés ...
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    3. Mettre en œuvre la meilleure technicité
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Réaliser c'est bien, mais avec qui ? voilà le grand problème que rencontre notre entité,
                                    car nous n'utilisons pas les personnes formées et qualifiées.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class=" mb-5 mt-2 ">
            <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 ">
                <h2>Mission de la fondation </h2>
                <p>
                    Aucune réalisation ne peut aboutir à un vrai succès sans une promotion de la formation ..... <br>
                    c'est ainsi que la fondation <strong>Rank</strong> a commission de:
                </p>
                <div>
                    <ul>
                        <li>Soutenir l'université Ukatesh</li>
                        <li>Lutter contre l'exode rural.</li>
                        <li>...</li>
                    </ul>
                </div>

            </div>
        </div>

    </div>

    <div class="academics-area">
        <div class="container">
            <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 mb-4">
                <h2>Membres de la fondation</h2>
                <p>Peuvent être membres de la Fondation « Rank », toute personne physique ou morale de droit privé ou de droit public, sans autres restrictions ou réserves que celles prévues par la loi, les statuts et le règlement intérieur.
                La demande d’adhésion au statut de membre, s’opère au siège de la Fondation à partir d’un formulaire prévu quant à ce.
                L’adhésion à la Fondation est gratuite au <a class="btn btn-link rounded fw-bold text-decoration-none" href="javascript:void(0)">Lien ici</a>.
                </p>
                <h2>L'équipe Rank</h2>
            </div>

            <div class="row p-2">
                <div class="col-lg-12 ">
                    <div class="academics-left-content">
                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-sm-6">
                                <div class="single-academics-card bg-white">
                                    <div class="icon">
                                        <img class="img-thumbnail" width="120" src="{{ asset('assets/favicons/logo.png') }}" alt="">
                                    </div>
                                    <a href="javascript:void(0)"><h3>Rodrigue Chot</h3></a>
                                    <p>President de la fondation</p>
                                    <h5>Membre d'honneur</h5>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-6">
                                <div class="single-academics-card bg-white">
                                    <div class="icon">
                                        <img class="img-thumbnail" width="120" src="{{ asset('assets/favicons/logo.png') }}" alt="">
                                    </div>
                                    <a href="javascript:void(0)"><h3>Muteb Nawej</h3></a>
                                    <p>Secrétaire de la fondation</p>
                                    <h5>Membre fondateur</h5>
                                </div>
                            </div>

                            <div class="col-lg-4 col-sm-6">
                                <div class="single-academics-card bg-white">
                                    <div class="icon">
                                        <img class="img-thumbnail" width="120" src="{{ asset('assets/favicons/logo.png') }}" alt="">
                                    </div>
                                    <a href="javascript:void(0)"><h3>Eric Ngoyi</h3></a>
                                    <p>Attaché juridique</p>
                                    <h5>Membre d'honneur</h5>
                                </div>
                            </div>
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
                        <h4 class="fw-semibold mb-0 m-3">+243 9925225852</h4>
                    </div>

                    <div class="col-12 col-md d-flex flex-column p-2 mx-2 text-center">
                        <div class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                            <i class='bx bxs-map bx-lg bx-circle-circle'></i>
                        </div>
                        <h4 class="fw-semibold mb-0 m-2">Kolwezi,Manika,Av: Du 30/06 N°: 243</h4>
                    </div>

                    <div class="col-12 col-md d-flex flex-column p-2 mx-2 text-center">
                        <div class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                            <i class='bx bxs-envelope bx-lg bx-circle-circle'></i>
                        </div>
                        <h4 class="fw-semibold mb-0 m-3">rank@ukatesh.org</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>






@endsection
@push('custom_js')

@endpush
