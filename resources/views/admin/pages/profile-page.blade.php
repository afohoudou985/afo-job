@extends('layouts.sidenav')
@section('include_content')

    @include('admin.components.topbar')

    @include('admin.components.sidebar')
@endsection
@section('content')


<div class="container-fluid">

    <div class="row">

        <div class="col-lg-6">
            <div>
                <div class="mb-3">
                    <label for="example-text-input" class="form-label">Nom</label>
                    <input class="form-control" type="text" placeholder="Ex : Admin"
                           id="jTitle">
                </div>

                <div class="mb-3">
                    <label for="example-email-input" class="form-label">Email</label>
                    <input class="form-control" type="email" placeholder="Ex : admin@admin.com"
                           id="jLocation">
                </div>
                <div class="mb-3">
                    <label for="example-url-input" class="form-label">Mot de passe</label>
                    <input class="form-control" type="password" placeholder="Ex : minimum 8 caractères"
                           id="jSalary">
                </div>
                <div class="mb-3">
                    <label for="example-url-input" class="form-label">Confirmer le mot de passe</label>
                    <input class="form-control" type="password" placeholder="Ex : minimum 8 caractères"
                           id="jSalary">
                </div>

                <div class="mt-4">
                    <button type="button" class="btn btn-primary">Mettre à jour le profil</button>
                </div>

            </div>
        </div>

    </div>

</div>

<script>


    async function readProfile () {


        let res=await fetch('/admin/profile')
        let data=await res.json()
        console.log(data)

    }

</script>





@endsection
