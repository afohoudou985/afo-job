<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Liste des employés</h4>
                    <p class="card-title-desc">Dans cette section, vous trouverez la liste des employés ainsi que leurs détails.
                    </p>
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
                                        <th class="sorting sorting_asc" tabindex="0">SN</th>
                                        <th class="sorting sorting_asc" tabindex="0">Nom de l'employé</th>
                                        <th class="sorting" tabindex="0">Email de l'employé</th>
                                        <th class="sorting" tabindex="0">Rôle</th>
                                        <th class="sorting" tabindex="0">Action</th>
                                    </tr>
                                    </thead>

                                    <tbody id="employeeList">
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div> <!-- fin col -->
</div> <!-- fin row -->

<script>
    (async()=>
    {
        await employeeList();
    })();

    async  function employeeList()
    {

        await axios.get('/employee-list')
            .then(function (response) {
                $('#datatable').DataTable().destroy();
                // Handle the successful response
                $('#employeeList').empty();
                response.data['data'].forEach(function (item,i)
                {
                    let foreach= ` <tr class="odd">
                                            <td class="dtr-control sorting_1" tabindex="0">${i+1}</td>
                                            <td class="dtr-control sorting_1" tabindex="0">${item['name']}</td>
                                            <td>${item['email']}</td>
                                            <td><button  class="btn ${item['status']==="0" ? "btn-secondary" : "btn-primary" }">${item['role']['role_name']}</button> </td>

                                            <td><div class="d-flex gap-2"><button data-id=${item['id']} class="btn btn-lg editbtn"><i class="fas fa-edit"></i></button>
                                            <button  data-id=${item['id']} class="btn  deletebtn btn-lg"><i class="fas fa-trash-alt"></i></button></div></td>

                                        </tr>`

                    $('#employeeList').append(foreach)

                    // <button class="btn btn-outline-primary"> </button>
                })

                $('.editbtn').on('click',async function ()
                {
                    let id= $(this).data('id');
                    $('#updateID').val(id);
                    $('#update-modal').modal('show');

                   await fillEmployeeData()

                })

                $('.deletebtn').on('click',async function ()
                {
                    let id= $(this).data('id');
                    $('#deleteID').val(id);
                    $('#delete-modal').modal('show');




                })


                $('#datatable').dataTable();
            })
            .catch(function (error) {
                // Handle errors
                console.error('Error:', error);
            });


    }
</script>
