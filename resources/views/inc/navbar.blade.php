<!-- Start Navbar Area -->
<div class="navbar-area nav-bg-2">
    <div class="mobile-responsive-nav">
        <div class="container">
            <div class="mobile-responsive-menu">
                <div class="logo">
                    <a href="/">
                        <img src="{{ siteInfos()->getLogo() }}" class="main-logo" alt="logo">
                        <img src="{{ siteInfos()->getLogo() }}"  class="white-logo" alt="logo">
                        <span class="label">{{ siteInfos()->sitename }}</span>
                        <hr class="line-height">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="desktop-nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light sticky-top">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ siteInfos()->getLogo() }}"  class="main-logo" alt="logo">
                    <img src="{{ siteInfos()->getLogo() }}"  class="white-logo" alt="logo">
                    <span class="label"> {{ siteInfos()->sigle }} </span>
                    <hr class="line-height">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link active">
                                Acceuil
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link dropdown-toggle">
                                A propos d'Ukatesh
                            </a>

                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="javascript:void(0)" class="nav-link">En cours de développement</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('rank.index') }}" class="nav-link">
                                Fondation RANK
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="javascript:void(0)" class="nav-link dropdown-toggle">
                                Actualités
                            </a>
                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="{{ route('blog.index') }}" class="nav-link">Ukatesh Actualités</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('event.index') }}" class="nav-link">Ukatesh Événements</a>
                                </li>
                            </ul>

                        </li>

                        <li class="nav-item">
                            <a href="{{ route('contact') }}" class="nav-link">Nous Contacter</a>
                        </li>
                    </ul>

                    <div class="others-options">
                        <div class="icon">
                            <i class="ri-menu-3-fill" data-bs-toggle="modal" data-bs-target="#sidebarModal"></i>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <div class="others-option-for-responsive">
        <div class="container">
            <div class="dot-menu">
                <div class="inner">
                    <div class="icon">
                        <i class="ri-menu-3-fill" data-bs-toggle="modal" data-bs-target="#sidebarModal"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Navbar Area -->

<!-- Sidebar Modal -->
<div class="sidebarModal modal right fade" id="sidebarModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-bs-dismiss="modal"><i class="ri-close-line"></i></button>

            <div class="modal-body">
                <a href=" {{ route('home') }}">
                    <img src="{{ asset('assets/favicons/logo.png')}}" width="50" class="main-logo" alt="logo">
                    <img src="{{ asset('assets/favicons/logo.png')}}" width="50" class="white-logo" alt="logo">
                    <span class="label">{{ siteInfos()->sigle }}</span>
                    <hr class="line-height">
                </a>
                <div class="sidebar-content">
                    <h3>Apropos de nous</h3>
                    <p>
                        <b>{{ siteInfos()->sitename }}</b>,
                    </p>
                    {!! siteInfos()->description !!}
                    <div class="sidebar-btn">
                        <a href="{{ route('contact') }}" target="_blank" class="default-btn">Entrons En Contact</a>
                    </div>
                </div>
                <div class="sidebar-contact-info">
                    <h3>Nos Informations de contact</h3>

                    <ul class="info-list">
                        <li><i class="ri-phone-fill"></i> <a href="tel:{{ siteInfos()->phone }}">{{ siteInfos()->phone }}</a></li>

                        <li><i class="ri-mail-line"></i><a href="mailto:{{ siteInfos()->email }}">{{ siteInfos()->email }}</a></li>

                        <li><i class="ri-map-pin-line"></i>{{ siteInfos()->adress }}</li>
                    </ul>
                </div>
                <ul class="sidebar-social-list">
                    <li>
                        <a href="{{ siteInfos()->facebook }}" target="_blank"><i class="flaticon-facebook"></i></a>
                    </li>
                    <li>
                        <a href="{{ siteInfos()->twitter }}" target="_blank"><i class="flaticon-twitter"></i></a>
                    </li>
                    <li>
                        <a href="{{ siteInfos()->linkedin }}" target="_blank"><i class="flaticon-linkedin"></i></a>
                    </li>
{{--                    <li>--}}
{{--                        <a href="javascript:void(0)" target="_blank"><i class="flaticon-instagram"></i></a>--}}
{{--                    </li>--}}
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Sidebar Modal -->
