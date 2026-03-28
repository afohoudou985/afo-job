@extends('layouts.sidenav')

@section('include_content')

    @include('candidate.components.topbar')
    @include('candidate.components.sidebar')

@endsection

@section('content')

<div class="container-fluid">

    <!-- Informations de base -->
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Informations de base</h4>
        </div>

        <div class="card-body p-4">
            <div class="mb-3">
                <label class="form-label">Nom du candidat</label>
                <input class="form-control" type="text" placeholder="Ex : Jean Dupont" id="name">
            </div>

            <div class="mb-3">
                <label class="form-label">Email du candidat</label>
                <input class="form-control" type="email" placeholder="Ex : email@gmail.com" id="email">
            </div>

            <div class="mb-3">
                <label class="form-label">Numéro de contact</label>
                <input class="form-control" type="text" placeholder="Ex : +228 90 00 00 00" id="contact">
            </div>

            <div class="mb-3">
                <label class="form-label">Adresse</label>
                <input class="form-control" type="text" placeholder="Ex : Lomé, Togo" id="address">
            </div>

            <div class="mb-3">
                <label class="form-label">URL LinkedIn</label>
                <input class="form-control" type="url" placeholder="Ex : https://linkedin.com/in/..." id="linkUrl">
            </div>

            <div class="mb-3">
                <label class="form-label">URL du portfolio</label>
                <input class="form-control" type="url" placeholder="Ex : https://monportfolio.com" id="portUrl">
            </div>

            <div class="mb-3">
                <label class="form-label">Sélectionner les compétences</label>
                <select class="form-select" id="skills" multiple>
                    <option>Développement Web</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Éducation -->
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Informations académiques</h4>
        </div>

        <div class="card-body p-4">
            @for($i=0;$i<3;$i++)
                <div class="row py-3">
                    <div class="col-lg-3">
                        <label class="form-label">Type de diplôme {{$i+1}}</label>
                        <select class="form-select" id="degreeType_{{$i}}">
                            <option>Secondaire</option>
                            <option>Lycée</option>
                            <option>Université</option>
                        </select>
                    </div>

                    <div class="col-lg-3">
                        <label class="form-label">École / Université</label>
                        <input class="form-control" type="text" placeholder="Ex : Université de Lomé" id="school_{{$i}}">
                    </div>

                    <div class="col-lg-2">
                        <label class="form-label">Filière / Spécialité</label>
                        <input class="form-control" type="text" placeholder="Ex : Informatique" id="major_{{$i}}">
                    </div>

                    <div class="col-lg-2">
                        <label class="form-label">Année d'obtention</label>
                        <input class="form-control" type="text" placeholder="Ex : 2022" id="passYear_{{$i}}">
                    </div>

                    <div class="col-lg-2">
                        <label class="form-label">Moyenne (GPA)</label>
                        <input class="form-control" type="text" placeholder="Ex : 15/20" id="gpa_{{$i}}">
                    </div>
                </div>
            @endfor
        </div>
    </div>

    <!-- Expérience -->
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Expériences professionnelles (si applicable)</h4>
        </div>

        <div class="card-body p-4">
            @for($i=0;$i<3;$i++)
                <div class="row py-3">
                    <div class="col-lg-3">
                        <label class="form-label">Poste {{$i+1}}</label>
                        <input class="form-control" type="text" placeholder="Ex : Développeur" id="designation_{{$i}}">
                    </div>

                    <div class="col-lg-3">
                        <label class="form-label">Entreprise</label>
                        <input class="form-control" type="text" placeholder="Ex : XYZ Company" id="company_{{$i}}">
                    </div>

                    <div class="col-lg-3">
                        <label class="form-label">Date d'embauche</label>
                        <input class="form-control" type="date" id="joinDate_{{$i}}">
                    </div>

                    <div class="col-lg-3">
                        <label class="form-label">Date de départ</label>
                        <input class="form-control" type="date" id="departure_{{$i}}">
                    </div>
                </div>
            @endfor
        </div>
    </div>

    <!-- Formations -->
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Formations professionnelles (si applicable)</h4>
        </div>

        <div class="card-body p-4">
            @for($i=0;$i<3;$i++)
                <div class="row py-3">
                    <div class="col-lg-4">
                        <label class="form-label">Nom de la formation {{$i+1}}</label>
                        <input class="form-control" type="text" id="training_{{$i}}">
                    </div>

                    <div class="col-lg-4">
                        <label class="form-label">Organisme / Entreprise</label>
                        <input class="form-control" type="text" id="trainingCompany_{{$i}}">
                    </div>

                    <div class="col-lg-4">
                        <label class="form-label">Année d'achèvement</label>
                        <input class="form-control" type="text" placeholder="Ex : 2024" id="completionYear_{{$i}}">
                    </div>
                </div>
            @endfor
        </div>

        <div class="p-3">
            <button onclick="profileSubmit()" type="button" class="btn btn-primary">
                Mettre à jour le profil
            </button>
        </div>
    </div>

</div>

<script>
    new MultiSelectTag('skills');

    async function profileSubmit() {

        const educationInfo = [];

        let contact = $('#contact').val();
        let address = $('#address').val();
        let link = $('#linkUrl').val();
        let port = $('#portUrl').val();

        for (let i = 0; i < 3; i++) {

            const degreeType = document.getElementById(`degreeType_${i}`).value;
            const schoolName = document.getElementById(`school_${i}`).value;
            const major = document.getElementById(`major_${i}`).value;
            const passingYear = document.getElementById(`passYear_${i}`).value;
            const gpa = document.getElementById(`gpa_${i}`).value;

            if (!degreeType || !schoolName || !major || !passingYear || !gpa) {
                errorToast('Veuillez remplir tous les champs');
            } else {
                educationInfo.push({
                    degree_type: degreeType,
                    school_name: schoolName,
                    major: major,
                    passing_year: passingYear,
                    gpa: gpa,
                });
            }
        }

        let res = await axios.post('/candidate-profile', {
            educationInfo,
            contact,
            address,
            link,
            port
        });

        if (res.status === 201) {
            successToast('Profil mis à jour !');
        } else {
            errorToast(res.data['message']);
        }
    }
</script>

@endsection
