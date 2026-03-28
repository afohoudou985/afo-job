@extends('layouts.sidenav')

@section('include_content')

    @include('employer.components.topbar')

    @include('employer.components.sidebar')
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div>
                        <h4 class="card-title">Profil du candidat</h4>
                        <p class="card-title-desc">Voir les informations détaillées du candidat.</p>
                    </div>
                    <div>
                        <a href="{{ url('/employer/applications') }}">
                            <button class="btn btn-secondary">Retour aux candidatures</button>
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6">
                            <h5>Informations personnelles</h5>
                            <p><strong>Nom :</strong> {{ $candidate->name ?? 'N/A' }}</p>
                            <p><strong>Email :</strong> {{ $candidate->email ?? 'N/A' }}</p>
                            <p><strong>Membre depuis :</strong>
                                {{ $candidate->created_at ? $candidate->created_at->format('d M Y') : 'N/A' }}
                            </p>
                        </div>

                        <div class="col-md-6">
                            <h5>Informations du profil</h5>

                            @if($profile)
                                <p><strong>Contact :</strong> {{ $profile->contact_number ?? 'N/A' }}</p>
                                <p><strong>Adresse :</strong> {{ $profile->address ?? 'N/A' }}</p>

                                <p><strong>Portfolio :</strong>
                                    @if($profile->portfolio_url)
                                        <a href="{{ $profile->portfolio_url }}" target="_blank">
                                            {{ $profile->portfolio_url }}
                                        </a>
                                    @else
                                        N/A
                                    @endif
                                </p>

                                <p><strong>LinkedIn :</strong>
                                    @if($profile->linkedin_url)
                                        <a href="{{ $profile->linkedin_url }}" target="_blank">
                                            {{ $profile->linkedin_url }}
                                        </a>
                                    @else
                                        N/A
                                    @endif
                                </p>
                            @else
                                <p>Aucune information de profil supplémentaire disponible.</p>
                            @endif

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
