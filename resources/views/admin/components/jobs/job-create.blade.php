<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Créer un emploi à publier</h4>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <!-- Left side inputs -->
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Titre du poste</label>
                                <input class="form-control" type="text" placeholder="Ex: Développeur Laravel" id="jTitle">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Lieu du poste</label>
                                <input class="form-control" type="text" placeholder="Ex: Paris, France" id="jLocation">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Fourchette salariale</label>
                                <input class="form-control" type="text" placeholder="Ex: 1500-2000€" id="jSalary">
                            </div>
                        </div>

                        <!-- Right side inputs -->
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Date limite</label>
                                <input class="form-control" type="date" value="2024-01-01" id="jDead">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Catégorie</label>
                                <select class="form-select" id="jCat"></select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tags</label>
                                <select class="form-select" id="tags" multiple></select>
                            </div>
                        </div>

                        <!-- Textareas -->
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea id="jDes" rows="6"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Responsabilités</label>
                                <textarea id="jRes" rows="6"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Exigences</label>
                                <textarea id="jReq" rows="6"></textarea>
                            </div>
                            <div>
                                <button onclick="jobSubmit()" type="button" class="btn btn-primary">Publier l'emploi</button>
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
    await tagDropdown();
    new MultiSelectTag('tags');
    await categoryDropdown();
})();

let jDes, jRes, jReq;
[ ['#jDes', c => jDes=c], ['#jRes', c => jRes=c], ['#jReq', c => jReq=c] ].forEach(([selector,setVar]) => {
    ClassicEditor.create(document.querySelector(selector)).then(editor => setVar(editor)).catch(console.error);
});

async function jobSubmit() {
    let obj = {
        title: $('#jTitle').val(),
        location: $('#jLocation').val(),
        salary_range: $('#jSalary').val(),
        deadline: $('#jDead').val(),
        category_id: $('#jCat').val(),
        description: jDes.getData(),
        responsibilities: jRes.getData(),
        requirement: jReq.getData(),
        tags: $('#tags').val()
    };

    if(Object.values(obj).some(v => !v || (Array.isArray(v) && v.length===0))) {
        return errorToast('Tous les champs sont requis !');
    }

    try {
        let res = await axios.post('/job-store', obj);
        if(res.data.message==='success') successToast('Emploi créé');
        else errorToast('Erreur lors de la création');
    } catch(e) {
        console.error(e);
        errorToast('Erreur serveur');
    }
}

async function categoryDropdown() {
    let res = await axios.get('/job-category-list');
    $('#jCat').empty();
    res.data.data.forEach(item => $('#jCat').append(`<option value="${item.id}">${item.name}</option>`));
}

async function tagDropdown() {
    let res = await axios.get('/job-tag-list');
    res.data.data.forEach(item => $('#tags').append(`<option value="${item.id}">${item.name}</option>`));
}
</script>
