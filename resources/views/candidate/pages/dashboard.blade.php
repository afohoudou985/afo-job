@extends('layouts.sidenav')

@section('include_content')

    @include('candidate.components.topbar')
    @include('candidate.components.sidebar')

@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Tableau de bord</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="">Tableau de bord</a></li>
                        <li class="breadcrumb-item active">Tableau de bord</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Candidatures -->
        <div class="col-xl-3 col-md-6">
            <div class="card card-h-100">
                <a href="{{ route('candidate.jobs') }}" class="text-decoration-none">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <span class="text-muted mb-3 lh-1 d-block text-truncate card-title">
                                    Offres postulées
                                </span>
                                <h4 class="mb-3">
                                    <span class="counter-value" id="appliedJobCount"></span>
                                </h4>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Trouver un job -->
        <div class="col-xl-3 col-md-6">
            <div class="card card-h-100">
                <a href="{{ url('/jobs-page') }}" class="text-decoration-none">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <span class="text-muted mb-3 lh-1 d-block text-truncate card-title">
                                    Trouver un emploi
                                </span>
                                <h4 class="mb-3">
                                    <i class="fas fa-search fa-2x text-primary"></i>
                                </h4>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Profil -->
        <div class="col-xl-3 col-md-6">
            <div class="card card-h-100">
                <a href="{{ route('candidate.profile') }}" class="text-decoration-none">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <span class="text-muted mb-3 lh-1 d-block text-truncate card-title">
                                    Mon profil
                                </span>
                                <h4 class="mb-3">
                                    <i class="fas fa-user fa-2x text-success"></i>
                                </h4>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Actions rapides -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Actions rapides</h5>

                    <div class="row g-3">
                        <div class="col-md-4">
                            <a href="{{ route('candidate.jobs') }}" class="btn btn-primary w-100">
                                <i class="fas fa-briefcase me-2"></i>Voir mes candidatures
                            </a>
                        </div>

                        <div class="col-md-4">
                            <a href="{{ url('/jobs-page') }}" class="btn btn-success w-100">
                                <i class="fas fa-search me-2"></i>Trouver de nouveaux emplois
                            </a>
                        </div>

                        <div class="col-md-4">
                            <a href="{{ route('candidate.profile') }}" class="btn btn-info w-100">
                                <i class="fas fa-user me-2"></i>Mettre à jour le profil
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        (async () => {
            await jobList();
        })();

        async function jobList() {
            await axios.get('/applications-candidate')
                .then(function (response) {

                    let appliedJob = response.data['data'].length;
                    $('#appliedJobCount').text(appliedJob);

                }).catch(function (error) {
                    console.error('Erreur :', error);
                })
        }
    </script>

@endsection
