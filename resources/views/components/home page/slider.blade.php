<!-- Début Zone Slider -->
<div class="slider-area" style="background-image: url(https://images.pexels.com/photos/3756678/pexels-photo-3756678.jpeg); background-size: cover; background-position: center; background-repeat: no-repeat;">
    <!-- Mobile Menu -->
    <div class="slider-active">
        <div class="single-slider slider-height d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-9 col-md-10">
                        <div class="text-black hero__caption">
                            <h1 class="text-black">Faites commencer votre parcours professionnel ici</h1>
                        </div>
                    </div>
                </div>
                <!-- Boîte de recherche -->
                <div class="row">
                    <div class="col-xl-8">
                        <!-- Formulaire -->
                        <form class="search-box">
                            <div class="input-form">
                                <input id="searchTitle" type="text" placeholder="Intitulé du poste ou mot-clé">
                            </div>
                            <div class="select-form">
                                <div class="select-itms">
                                    <select id="select1">
                                        <option value="">Localisation BD</option>
                                        <option value="">Localisation PK</option>
                                        <option value="">Localisation US</option>
                                        <option value="">Localisation UK</option>
                                    </select>
                                </div>
                            </div>
                            <div class="search-form">
                                <a href="#" id="findJobAnchor" tabindex="0">Rechercher un emploi</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Fin Zone Slider -->

<script>
document.getElementById('findJobAnchor').addEventListener('click', function (event) {
    event.preventDefault(); // Empêche le comportement par défaut du lien

    let searchTitle = $('#searchTitle').val()

    if (searchTitle.length === 0) {
        errorToast('Le titre est requis')
    } else {
        // Redirection vers la page de résultats de recherche
        window.location.href = `/job-search-result?title=${searchTitle}`;
    }
});
</script>
