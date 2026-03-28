<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{url('/')}}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src=" {{asset('frontend')}}/assets/img/logo/logov2_img.png" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src=" {{asset('frontend')}}/assets/img/logo/logov2_img.png" alt="" height="24">
                        <span class="logo-txt">JobPulse</span>
                    </span>
                </a>

                <a href="" class="logo logo-light">
                    <span class="logo-sm">
                        <img src=" {{asset('frontend')}}/assets/img/logo/logov2_img.png" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src=" {{asset('frontend')}}/assets/img/logo/logov2_img.png" alt="" height="24">
                        <span class="logo-txt">JobPulse</span>
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

        {!! request()->routeIs('candidate.dashboard') ? '<div class="d-flex justify-content-center align-items-center"><i class="fas fa-user-alt"> </i> <span class="px-2 logo-txt ">Tableau de bord candidat</span></div>' : '' !!}

        {!! request()->routeIs('candidate.jobs') ? '<div class="d-flex justify-content-center align-items-center"><i class="fas fa-user-alt"> </i> <span class="px-2 logo-txt ">Offres du candidat</span></div>' : '' !!}

        {!! request()->routeIs('candidate.profile') ? '<div class="d-flex justify-content-center align-items-center"><i class="fas fa-user-alt"> </i> <span class="px-2 logo-txt ">Profil du candidat</span></div>' : '' !!}

        <div class="d-flex">

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon position-relative"
                        id="page-header-notifications-dropdown" data-bs-toggle="dropdown">
                    <!-- icon -->
                    <span class="badge bg-danger rounded-pill">5</span>
                </button>

                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0">Notifications</h6>
                            </div>
                            <div class="col-auto">
                                <a href="#!" class="small text-reset text-decoration-underline">Non lues (3)</a>
                            </div>
                        </div>
                    </div>

                    <div style="max-height: 230px; overflow-y:auto;">
                        <a href="#!" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">James Lemire</h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">Cela semblera être un anglais simplifié.</p>
                                        <p class="mb-0"><span>Il y a 1 heure</span></p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="#!" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Votre commande a été passée</h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">Si plusieurs langues fusionnent la grammaire</p>
                                        <p class="mb-0"><span>Il y a 3 min</span></p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="#!" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Votre article a été expédié</h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">Si plusieurs langues fusionnent la grammaire</p>
                                        <p class="mb-0"><span>Il y a 3 min</span></p>
                                    </div>
                                </div>
                            </div>
                        </a>

                        <a href="#!" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Salena Layfield</h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">Selon un ami sceptique de Cambridge, occidental.</p>
                                        <p class="mb-0"><span>Il y a 1 heure</span></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="p-2 border-top d-grid">
                        <a class="btn btn-sm btn-link text-center" href="javascript:void(0)">
                            <span>Voir plus...</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item bg-soft-light border-start border-end"
                        data-bs-toggle="dropdown">
                    <img class="rounded-circle header-profile-user"
                         src=" {{asset('assets')}}/images/users/avatar-1.jpg"
                         alt="Avatar">
                    <span class="d-none d-xl-inline-block ms-1 fw-medium">
                        {{Auth::guard('web')->user()->name}}
                    </span>
                </button>

                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="">
                        Profil
                    </a>

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="{{route('logout')}}">
                        Déconnexion
                    </a>
                </div>
            </div>

        </div>
    </div>
</header>
