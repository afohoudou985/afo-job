@extends('layouts.sidenav')

@section('include_content')

    @include('candidate.components.topbar')
    @include('candidate.components.sidebar')

@endsection

@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-header d-flex justify-content-between ">
                        <div>
                            <h4 class="card-title">Liste des emplois</h4>
                            <p class="card-title-desc">
                                Dans cette section, vous trouverez la liste des emplois et pourrez en créer.
                            </p>
                        </div>
                        {{-- <div><a href="{{url('/job-create')}}"><button class="btn btn-primary">Créer un emploi</button></a></div> --}}
                    </div>

                    <div class="card-body">

                        <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                            <div class="row">
                                <div class="col-sm-12">

                                    <table id="tableData"
                                           class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline dataTable-wrapper">

                                        <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Titre du poste</th>
                                            <th>Date de candidature</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>

                                        <tbody id="tableList"></tbody>

                                    </table>

                                </div>
                            </div>

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

                    // Détruire l’instance DataTable existante
                    $('#tableData').DataTable().destroy();

                    // Reset table
                    $('#tableList').empty();

                    response.data['data'].forEach(function (item, i) {

                        let foreach = `
                        <tr class="odd">
                            <td class="dtr-control sorting_1" tabindex="0">${i + 1}</td>
                            <td class="dtr-control sorting_1" tabindex="0">${item['job']['title']}</td>
                            <td>${item['formatted_applied_at']}</td>

                            <td>
                                <div class="d-flex gap-2">
                                    <button data-id=${item['id']} class="btn btn-lg">
                                        <i class="far fa-eye"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>`;

                        $('#tableList').append(foreach);
                    });

                    $('.deletebtn').on('click', async function () {
                        let id = $(this).data('id');
                        $('#deleteID').val(id);
                        $('#delete-modal').modal('show');
                    });

                    $('#tableData').dataTable({
                        order: [[0, 'asc']],
                        pagingType: 'numbers'
                    });

                })
                .catch(function (error) {
                    console.error('Erreur :', error);
                });
        }
    </script>

@endsection
