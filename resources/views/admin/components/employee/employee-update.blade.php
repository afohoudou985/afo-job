<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier un employé (ADMINS)</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">

                                <label class="form-label">Nom</label>
                                <input type="text" class="form-control" id="employeeName">

                                <label class="form-label mt-2">Email</label>
                                <input type="text" class="form-control" id="employeeEmail">

                                <label class="form-label mt-2">Rôle</label>
                                <select type="text" class="form-control form-select" id="employeeRole">
                                </select>

                                <input type="text" class="d-none" id="updateID">

                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn btn-outline-warning" data-bs-dismiss="modal"
                        aria-label="Close">Fermer
                </button>
                <button onclick="updateEmployeeData()" id="update-btn" class="btn btn-outline-primary">Mettre à jour</button>
            </div>

        </div>
    </div>
</div>


<script>

    async function fillRoleDropdown() {
        let res = await axios.get(`/role-list`);
        $('#employeeRole').empty();

        res.data['data'].forEach(function (item, i) {
            let f = ` <option value="${item['role_name']}">${item['role_name']}</option>`
            $('#employeeRole').append(f)
        })
    }

    async function fillEmployeeData() {
        let id = $('#updateID').val();

        if (id.length === 0) {
            errorToast('ID requis !')
        } else {
            await axios.get(`/employee-id/${id}`).then(async function (res) {

                $('#employeeName').val(res.data['data']['name'])
                $('#employeeEmail').val(res.data['data']['email'])
                await fillRoleDropdown()

            }).catch(function (error) {
                // console.log(error)
            })
        }
    }

    async function updateEmployeeData() {
        let id = $('#updateID').val();
        let name = $('#employeeName').val();
        let email = $('#employeeEmail').val();
        let role = $('#employeeRole').val();

        console.log(id, name, email, role);

        let obj = {
            "name": name,
            "email": email,
            "role": role
        }

        let res = await axios.post(`/employee-update/${id}`, obj)

        if (res.data['message'] === 'success') {
            successToast('Employé mis à jour')
            await employeeList();
            $('#update-modal-close').click();
        } else {
            errorToast('Valeur invalide');
        }
    }

</script>
