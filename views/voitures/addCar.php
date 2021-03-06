<div class="container">
    <div class="row mt-5">
        <div class="col-sm-12">
            <h1>Modification</h1>
        </div>
    </div>
    <?php
    if (!empty($success)) {
        ?>
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                <div class="alert alert-success" role="alert">
                    <?= $success ?>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <a href="/voitures/index" title="retour à l'accueil" class="btn btn-secondary">Retour</a>
            </div>
        </div>
        <?php
    }
    ?>
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <form action="/voitures/addCar/" method="post">
                <div class="mb-3">
                    <label for="model" class="form-label">Modèle :</label>
                    <input type="text" class="form-control" id="model" value="<?= isset($_POST['model']) ? $_POST['model'] : '' ?>" name="model">
                    <span class="error" id="errorModel"><?= isset($error['model']) ? $error['model'] : '' ?></span>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Prix :</label>
                    <input type="text" class="form-control" id="price" value="<?= isset($_POST['price']) ? $_POST['price'] : '' ?>" name="price">
                    <span class="error"><?= isset($error['price']) ? $error['price'] : '' ?></span>
                </div>
                <div class="mb-3">
                    <label for="brand" class="form-label">Marque :</label>
                    <select class="form-select" aria-label="Default select example" id="brand" name="brand">
                        <option selected disabled>Sélectionnez une marque</option>
                        <?php
                        foreach ($marques as $marque) {
                            ?>
                            <option value="<?= $marque->id ?>"><?= $marque->marque_nom ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <span class="error"><?= isset($error['brand']) ? $error['brand'] : '' ?></span>
                </div>
                <button type="submit" class="btn btn-primary" name="add" value="add">Ajouter</button>
            </form>
        </div>
    </div>
</div>