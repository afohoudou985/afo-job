<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Liste des entreprises</h4>
                    <p class="card-title-desc">Dans cette section, nous trouvons la liste des entreprises et leurs détails.</p>
                </div>
                <div class="card-body">

                    <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                        <div class="row">
                            <div class="col-sm-12">
                                <table id="datatable"
                                       class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline dataTable-wrapper"
                                       role="grid" aria-describedby="datatable_info" style="width: 1573px;">
                                    <thead>
                                    <tr role="row">
                                        <th>SN</th>
                                        <th>Nom de l'employeur</th>
                                        <th>Email de l'employeur</th>
                                        <th>Statut</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody id="employerList">
                                   </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<script>
    (async () => {
        await employerList();
    })();

    async function employerList() {
        await axios.get('/employer-list')
            .then(function (response) {
                $('#datatable').DataTable().destroy();
                $('#employerList').empty();

                response.data['data'].forEach(function (item, i) {
                    let foreach = `
                        <tr class="odd">
                            <td class="dtr-control sorting_1" tabindex="0">${i+1}</td>
                            <td class="dtr-control sorting_1" tabindex="0">${item['name']}</td>
                            <td>${item['email']}</td>
                            <td>
                                <button data-status=${item['status']} class="btn ${item['status']==="0" ? "btn-secondary" : "btn-primary" }">
                                    ${item['status']==="0" ? "En attente" : "Actif" }
                                </button>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <button data-id=${item['id']} class="btn btn-lg editbtn"><i class="fas fa-edit"></i></button>
                                    <button data-id=${item['id']} class="btn deletebtn btn-lg"><i class="fas fa-trash-alt"></i></button>
                                </div>
                            </td>
                        </tr>`

                    $('#employerList').append(foreach)
                })

                $('.editbtn').on('click', async function () {
                    let id = $(this).data('id');
                    $('#updateID').val(id);
                    $('#update-modal').modal('show');
                    await fillEmployerData();
                })

                $('.deletebtn').on('click', async function () {
                    let id = $(this).data('id');
                    $('#deleteID').val(id);
                    $('#delete-modal').modal('show');
                })

                $('#datatable').dataTable();
            })
            .catch(function (error) {
                console.error('Erreur :', error);
            });
    }
</script>
