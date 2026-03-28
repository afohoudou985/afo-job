<!-- Début Section Emplois en Vedette -->
<section class="featured-job-area feature-padding">
    <div class="container">
        <!-- Titre de la section -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle text-center">
                    <span>Emplois récents</span>
                    <h2>Emplois en vedette</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-xl-10" id="jobList">
                <!-- La liste des emplois sera injectée ici -->
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="browse-btn2 text-center mt-50">
                    <a href="{{url('/jobs-page')}}" class="border-btn2">Voir tous les emplois</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Fin Section Emplois en Vedette -->

<!-- Modal de confirmation de candidature -->
<section>
    <div class="modal animated zoomIn" id="apply-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <h3 class="mt-3 text-warning">Postuler ?</h3>
                    <p class="mb-3">Cette action ne peut pas être annulée !</p>
                    <input class="d-none" id="applyID"/>
                </div>
                <div class="modal-footer justify-content-end">
                    <div>
                        <button type="button" id="delete-modal-close" class="genric-btn warning mx-2" data-dismiss="modal">Annuler</button>
                        <button onclick="jobApply()" type="button" id="confirmDelete" class="genric-btn primary mx-2">Postuler</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
(async () => {
    await jobList();
})()

// Fonction pour récupérer et afficher la liste des emplois
async function jobList() {
    let res = await axios.get('/job-list');

    $('#jobList').empty();
    res.data['data'].data.forEach(function (item, i) {
        let forEach = `<div class="single-job-items mb-30">
                <div class="job-items">
                    <div class="company-img">
                        <a href=""><img src="{{asset('frontend/assets')}}/img/icon/job-list1.png" alt=""></a>
                    </div>
                    <div class="job-tittle">
                        <a href="/job-details?id=${item['id']}"><h4>${item['title']}</h4></a>
                        <ul>
                            <li>${item['employer']['name']}</li>
                            <li><i class="fas fa-map-marker-alt"></i>${item['location']}</li>
                            <li>${item['salary_range']}</li>
                        </ul>
                    </div>
                </div>
                <div class="items-link f-right">
                    <button data-id=${item['id']} class="genric-btn primary head-btn1 circle apply">Postuler maintenant</button>
                    <span class="pt-2">Date limite : ${item[['deadline']]}</span>
                </div>
            </div>`;

        $('#jobList').append(forEach);
    });

    // Gestion du clic sur le bouton "Postuler maintenant"
    $('.apply').on('click', async function () {
        let id = $(this).data('id');
        $('#apply-modal').modal('show');
        $('#applyID').val(id);
    });
}

// Fonction pour soumettre la candidature
async function jobApply() {
    let job_id = $('#applyID').val();

    if(job_id.length === 0) {
        errorToast('ID requis');
    } else {
        try {
            let res = await axios.post('/job-apply-submit', {job_id: job_id});
            if(res.data['message'] === 'success') {
                successToast('Candidature soumise');
                $('#delete-modal-close').click();
            } else {
                errorToast(res.data['message']);
                $('#delete-modal-close').click();
            }
        } catch(e) {
            if(e.response.status === 401) {
                window.location.href = '/login';
            }
        }
    }
}
</script>
