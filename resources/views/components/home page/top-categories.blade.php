<!-- Début Nos Services -->
<div class="our-services section-pad-t30 pt-0">
    <div class="container">
        <!-- Titre de section -->
        <div class="row">
            <div class="col-lg-12">
                <div class="section-tittle text-center">
                    <span>CATEGORIES D'EMPLOIS EN VEDETTE</span>
                    <h2>Parcourir les principales catégories</h2>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center" id="jobCategoryList">
            <!-- Les catégories seront insérées ici dynamiquement -->
        </div>
        <!-- Bouton pour voir plus -->
        <div class="row">
            <div class="col-lg-12">
                <div class="browse-btn2 text-center mt-50">
                    <a href="{{url('/jobs-page')}}" class="border-btn2">Voir tous les emplois</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fin Nos Services -->

<script>
(async () => {
    await JobCategoryList();
})();

async function JobCategoryList() {
    let res = await axios.get('/job-category-list');

    $('#jobCategoryList').empty();

    res.data['data'].forEach(function(item) {
        let categoryCard = `
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                <div class="single-services text-center mb-30">
                    <div class="services-ion">
                        <span class="flaticon-tour"></span>
                    </div>
                    <div class="services-cap">
                        <h5><a href="/job-by-category?id=${item['id']}">${item['name']}</a></h5>
                        <span>${item['jobs_count']} emplois</span>
                    </div>
                </div>
            </div>
        `;

        $('#jobCategoryList').append(categoryCard);
    });
}
</script>
