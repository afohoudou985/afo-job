<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="{{url('/')}}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{asset('frontend')}}/assets/img/logo/logov2_img.png" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('frontend')}}/assets/img/logo/logov2_img.png" alt="" height="24">
                        <span class="logo-txt">JobPulse</span>
                    </span>
                </a>

                <a href="" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{asset('frontend')}}/assets/img/logo/logov2_img.png" alt="logo-light" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="{{asset('frontend')}}/assets/img/logo/logov2_img.png" alt="logo-dark" height="24">
                        <span class="logo-txt">JobPulse</span>
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <!-- App Search -->
            {{-- Formulaire de recherche désactivé --}}
        </div>

        {!! request()->routeIs('admin.dashboard') ? '<div class="d-flex justify-content-center align-items-center"><i class="fas fa-user-alt"></i> <span class="px-2 logo-txt">Tableau de bord Admin</span></div>' : '' !!}
        {!! request()->routeIs('admin.jobs') ? '<div class="d-flex justify-content-center align-items-center"><i class="fas fa-user-alt"></i> <span class="px-2 logo-txt">Liste des emplois</span></div>' : '' !!}
        {!! request()->routeIs('admin.profile') ? '<div class="d-flex justify-content-center align-items-center"><i class="fas fa-user-alt"></i> <span class="px-2 logo-txt">Profil Admin</span></div>' : '' !!}
        {!! request()->routeIs('admin.companies') ? '<div class="d-flex justify-content-center align-items-center"><i class="fas fa-user-alt"></i> <span class="px-2 logo-txt">Liste des entreprises</span></div>' : '' !!}
        {!! request()->routeIs('admin.employees') ? '<div class="d-flex justify-content-center align-items-center"><i class="fas fa-user-alt"></i> <span class="px-2 logo-txt">Liste des employés</span></div>' : '' !!}
        {!! request()->routeIs('admin.candidates') ? '<div class="d-flex justify-content-center align-items-center"><i class="fas fa-user-alt"></i> <span class="px-2 logo-txt">Liste des candidats</span></div>' : '' !!}
        {!! request()->routeIs('admin.blogs') ? '<div class="d-flex justify-content-center align-items-center"><i class="fas fa-user-alt"></i> <span class="px-2 logo-txt">Blogs</span></div>' : '' !!}
        {!! request()->routeIs('admin.pages') ? '<div class="d-flex justify-content-center align-items-center"><i class="fas fa-user-alt"></i> <span class="px-2 logo-txt">Pages</span></div>' : '' !!}
        {!! request()->routeIs('admin.plugins') ? '<div class="d-flex justify-content-center align-items-center"><i class="fas fa-user-alt"></i> <span class="px-2 logo-txt">Plugins</span></div>' : '' !!}

        <div class="d-flex">

            <!-- Mobile Search -->
            <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item" id="page-header-search-dropdown" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search icon-lg">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Rechercher ..."
                                       aria-label="Résultat de recherche">
                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Mode sombre / clair -->
            <div class="dropdown d-none d-sm-inline-block">
                <button type="button" class="btn header-item" id="mode-setting-btn">
                    <!-- Icônes lune / soleil conservées -->
                </button>
            </div>

            <!-- Notifications -->
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon position-relative"
                        id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell icon-lg">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                        <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                    </svg>
                    <span class="badge bg-danger rounded-pill">5</span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                     aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0"> Notifications </h6>
                            </div>
                            <div class="col-auto">
                                <a href="#!" class="small text-reset text-decoration-underline"> Non lues (3)</a>
                            </div>
                        </div>
                    </div>
                    <!-- Liste des notifications conservée mais le texte traduit -->
                </div>
            </div>

            <!-- Profil utilisateur -->
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item bg-soft-light border-start border-end"
                        id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="{{asset('assets')}}/images/users/avatar-1.jpg" alt="Avatar">
                    <span class="d-none d-xl-inline-block ms-1 fw-medium">{{ Auth::guard('admin')->user()->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="{{route('admin.profile')}}"><i class="mdi mdi-face-man-profile font-size-16 align-middle me-1"></i> Profil</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{url('/admin/logout')}}"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Déconnexion</a>
                </div>
            </div>

        </div>
    </div>
</header>
