{{-- Modal de suppression --}}
<div class="modal animated zoomIn" id="delete-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h3 class=" mt-3 text-warning">Supprimer !</h3>
                <p class="mb-3">Une fois supprimé, vous ne pourrez pas le récupérer.</p>
                <input class="d-none" id="deleteID"/>
            </div>
            <div class="modal-footer justify-content-end">
                <div>
                    <button type="button" id="delete-modal-close" class="btn btn-outline-warning mx-2 " data-bs-dismiss="modal">Annuler</button>
                    <button onclick="itemDelete()" type="button" id="confirmDelete" class="btn btn-outline-danger mx-2">Supprimer</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    async function itemDelete()
    {
        let id = $('#deleteID').val();

        if (id.length === 0)
        {
            errorToast('ID requis !')
        }
        else
        {
            await axios.get(`/candidate-remove/${id}`).then(async function (res)
            {
                if (res.data['message'] === 'success')
                {
                    successToast('Employé supprimé !')
                    await candidateList();
                    $('#delete-modal-close').click();
                }
            }).catch(function (error)
            {
                console.log(error)
            })
        }
    }

</script>
