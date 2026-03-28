<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mettre à jour l'employeur</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">

                                <label class="form-label">Nom</label>
                                <input type="text" class="form-control" id="employerName">

                                <label class="form-label mt-2">Email</label>
                                <input type="text" class="form-control" id="employerEmail">

                                <label class="form-label mt-2">Statut</label>
                                <select type="text" class="form-control form-select" id="employerStatus">
                                </select>

                                <input type="text" class="d-none" id="updateID">

                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn btn-outline-warning" data-bs-dismiss="modal"
                        aria-label="Fermer">Fermer
                </button>
                <button onclick="updateEmployerData()" id="update-btn" class="btn btn-outline-primary">Mettre à jour</button>
            </div>

        </div>
    </div>
</div>

<script>
    async function fillStatusDropdown() {
        let res = await axios.get(`/status-list`);
        $('#employerStatus').empty();

        res.data['data'].forEach(function (item) {
            let f = `<option value="${item}">${item === '0' ? 'En attente' : 'Actif'}</option>`;
            $('#employerStatus').append(f);
        });
    }

    async function fillEmployerData() {
        let id = $('#updateID').val();
        if (id.length === 0) {
            errorToast('ID requis !');
        } else {
            await axios.get(`/employer-by-id/${id}`).then(async function (res) {
                $('#employerName').val(res.data['data']['name']);
                $('#employerEmail').val(res.data['data']['email']);
                await fillStatusDropdown();
            }).catch(function (error) {
                console.log(error);
            });
        }
    }

    async function updateEmployerData() {
        let id = $('#updateID').val();
        let name = $('#employerName').val();
        let email = $('#employerEmail').val();
        let status = $('#employerStatus').val();

        let obj = { name, email, status };

        let res = await axios.post(`/employer-update/${id}`, obj);
        if (res.data['message'] === 'success') {
            successToast('Employeur mis à jour');
            await employerList();
            $('#update-modal-close').click();
        } else {
            errorToast('Valeur invalide');
        }
    }
</script>
