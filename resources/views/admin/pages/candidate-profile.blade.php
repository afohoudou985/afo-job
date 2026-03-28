@extends('layouts.sidenav')

@section('include_content')

    @include('admin.components.topbar')

    @include('admin.components.sidebar')
@endsection

@section('content')

    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <h4 class="card-title">Profil du candidat</h4>
                        <p class="card-title-desc">Voir les informations détaillées sur le candidat.</p>
                    </div>
                    <div>
                        <a href="{{ url('/admin/candidates') }}">
                            <button class="btn btn-secondary">Retour aux candidats</button>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="candidate-profile-container">
                        <h5>Informations sur le candidat</h5>
                        <p>ID du candidat : {{ $candidateId }}</p>
                        <p>C’est ici que les informations du profil du candidat seront affichées.</p>
                        <p>Emplacement réservé pour les détails du candidat.</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- fin row -->
</div> <!-- fin container -->

@endsection
