
<main class="container-fluid mb-4">

    <h1 class="ms-5 mb-3">Nouvelle Sanction :</h1>

    <div class="w-75 mx-auto">
        <form method="post" novalidate>

            <div class="mb-3">
                <label for="eleve" class="form-label fs-5">Élève sanctionné* :</label>
                <select id="eleve" name="eleve" class="form-select <?= (isset($_SESSION["erreurs"]["eleve"])) ? "border border-2 border-danger" : "" ?>">

                    <?php for ($i = 0; $i <= count($_SESSION["eleve"])-1; $i++) : ?>

                        <?php if ($_POST["eleve"] == $_SESSION["eleve"][$i][1]) : ?>

                            <option selected value="<?= $_SESSION["eleve"][$i][1] ?>"> <?= $_SESSION["eleve"][$i][0] ?> </option>

                        <?php else: ?>

                            <option value="<?= $_SESSION["eleve"][$i][1] ?>"> <?= $_SESSION["eleve"][$i][0] ?> </option>

                        <?php endif;?>

                    <?php endfor;?>

                </select>

                <?php if (isset($_SESSION["erreurs"]["eleve"])) : ?>

                    <p class="form-text fs-5 text-danger"> <?= $_SESSION["erreurs"]["eleve"] ?></p>

                <?php endif; ?>

            </div>

            <div class="mb-3">
                <label for="motifSanction" class="form-label fs-5">Motif de la sanction* :</label>
                <select id="motifSanction" name="motifSanction" class="form-select <?= (isset($_SESSION["erreurs"]["motifSanction"])) ? "border border-2 border-danger" : "" ?>">

                    <?php for ($i = 0; $i <= count($_SESSION["motifSanction"])-1; $i++) : ?>

                        <?php if ($_POST["motifSanction"] == $_SESSION["motifSanction"][$i][1]) : ?>

                            <option selected value="<?= $_SESSION["motifSanction"][$i][1] ?>"> <?= $_SESSION["motifSanction"][$i][0] ?> </option>

                        <?php else: ?>

                            <option value="<?= $_SESSION["motifSanction"][$i][1] ?>"> <?= $_SESSION["motifSanction"][$i][0] ?> </option>

                        <?php endif;?>

                    <?php endfor;?>

                </select>

                <?php if (isset($_SESSION["erreurs"]["motifSanction"])) : ?>

                    <p class="form-text fs-5 text-danger"> <?= $_SESSION["erreurs"]["motifSanction"] ?></p>

                <?php endif; ?>

            </div>

            <div class="mb-3">
                <label for="Description" class="form-label fs-5">Description* :</label>
                <input type="text"
                       class="form-control <?= (isset($_SESSION["erreurs"]["Description"])) ? "border border-2 border-danger" : "" ?>"
                       id="Description"
                       name="Description"
                       value="<?= (isset($_POST["Description"])) ? $_POST["Description"] : null ?>"
                       placeholder="Saisissez une Description">

                <?php if (isset($_SESSION["erreurs"]["Description"])) : ?>

                    <p class="form-text fs-5 text-danger"> <?= $_SESSION["erreurs"]["Description"] ?></p>

                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="DateIncident" class="form-label fs-5">Date incident* :</label>
                <input type="date"
                       class="form-control <?= (isset($_SESSION["erreurs"]["DateIncident"])) ? "border border-2 border-danger" : "" ?>"
                       id="DateIncident"
                       name="DateIncident"
                       value="<?= (isset($_POST["DateIncident"])) ? $_POST["DateIncident"] : null ?>"
                       placeholder="Saisissez la date de l'incident">

                <?php if (isset($_SESSION["erreurs"]["DateIncident"])) : ?>

                    <p class="form-text fs-5 text-danger"> <?= $_SESSION["erreurs"]["DateIncident"] ?></p>

                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="nomApplicateur" class="form-label fs-5">Nom de l'applicateur* :</label>
                <input type="text"
                       class="form-control <?= (isset($_SESSION["erreurs"]["nomApplicateur"])) ? "border border-2 border-danger" : "" ?>"
                       id="nomApplicateur"
                       name="nomApplicateur"
                       value="<?= (isset($_POST["nomApplicateur"])) ? $_POST["nomApplicateur"] : null ?>"
                       placeholder="Saisissez le nom de l'applicateur">

                <?php if (isset($_SESSION["erreurs"]["nomApplicateur"])) : ?>

                    <p class="form-text fs-5 text-danger"> <?= $_SESSION["erreurs"]["nomApplicateur"] ?></p>

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