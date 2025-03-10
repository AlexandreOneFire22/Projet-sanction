
<main class="container-fluid mb-4">

    <h1 class="ms-5 mb-3">Ajouter un motif de sanction :</h1>

    <div class="w-75 mx-auto">
        <form method="post" novalidate>

            <div class="mb-3">
                <label for="libelle" class="form-label fs-5">Libellé* :</label>
                <input type="text"
                       class="form-control <?= (isset($_SESSION["erreurs"]["libelle"])) ? "border border-2 border-danger" : "" ?>"
                       id="libelle"
                       name="libelle"
                       value="<?= (isset($_POST["libelle"])) ? $_POST["libelle"] : null ?>"
                       placeholder="Saisissez le libellé de la sanction">

                <?php if (isset($_SESSION["erreurs"]["libelle"])) : ?>

                    <p class="form-text fs-5 text-danger"> <?= $_SESSION["erreurs"]["libelle"] ?></p>

                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label fs-5">description :</label>
                <input type="text"
                       class="form-control <?= (isset($_SESSION["erreurs"]["description"])) ? "border border-2 border-danger" : "" ?>"
                       id="description"
                       name="description"
                       value="<?= (isset($_POST["description"])) ? $_POST["description"] : null ?>"
                       placeholder="Saisissez la description">

                <?php if (isset($_SESSION["erreurs"]["description"])) : ?>

                    <p class="form-text fs-5 text-danger"> <?= $_SESSION["erreurs"]["description"] ?></p>

                <?php endif; ?>
            </div>

            <p class="fst-italic mt-3">*Champs obligatoire</p>

            <?php if (isset($_SESSION["erreurs"]["promotion"])) : ?>

                <p class="form-text fs-5 text-danger"> <?= $_SESSION["erreurs"]["promotion"] ?></p>

            <?php endif; ?>

            <span class="d-flex justify-content-evenly">
                <button type="submit" class="btn btn-primary mt-2 mb-1">Valider</button>
            </span>
        </form>
    </div>



</main>