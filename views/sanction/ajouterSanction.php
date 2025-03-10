
<main class="container-fluid mb-4">

    <h1 class="ms-5 mb-3">Nouvelle Sanction :</h1>

    <div class="w-75 mx-auto">
        <form method="post" novalidate>

            <div class="mb-3">
                <label for="etudiant" class="form-label fs-5">Étudiant sanctionné* :</label>
                <select id="etudiant" name="etudiant" class="form-select <?= (isset($_SESSION["erreurs"]["etudiant"])) ? "border border-2 border-danger" : "" ?>">

                    <?php for ($i = 0; $i <= count($_SESSION["etudiant"])-1; $i++) : ?>

                        <?php if ($_POST["etudiant"] == $_SESSION["etudiant"][$i][1]) : ?>

                            <option selected value="<?= $_SESSION["etudiant"][$i][1] ?>"> <?= $_SESSION["etudiant"][$i][0] ?> </option>

                        <?php else: ?>

                            <option value="<?= $_SESSION["etudiant"][$i][1] ?>"> <?= $_SESSION["etudiant"][$i][0] ?> </option>

                        <?php endif;?>

                    <?php endfor;?>

                </select>

                <?php if (isset($_SESSION["erreurs"]["etudiant"])) : ?>

                    <p class="form-text fs-5 text-danger"> <?= $_SESSION["erreurs"]["etudiant"] ?></p>

                <?php endif; ?>

            </div>

            <div class="mb-3">
                <label for="motif" class="form-label fs-5">Motif de la sanction* :</label>
                <select id="motif" name="motif" class="form-select <?= (isset($_SESSION["erreurs"]["motif"])) ? "border border-2 border-danger" : "" ?>">

                    <?php for ($i = 0; $i <= count($_SESSION["motif"])-1; $i++) : ?>

                        <?php if ($_POST["motif"] == $_SESSION["motif"][$i][1]) : ?>

                            <option selected value="<?= $_SESSION["motif"][$i][1] ?>"> <?= $_SESSION["motif"][$i][0] ?> </option>

                        <?php else: ?>

                            <option value="<?= $_SESSION["motif"][$i][1] ?>"> <?= $_SESSION["motif"][$i][0] ?> </option>

                        <?php endif;?>

                    <?php endfor;?>

                </select>

                <?php if (isset($_SESSION["erreurs"]["motif"])) : ?>

                    <p class="form-text fs-5 text-danger"> <?= $_SESSION["erreurs"]["motif"] ?></p>

                <?php endif; ?>

            </div>

            <div class="mb-3">
                <label for="description" class="form-label fs-5">Description* :</label>
                <input type="text"
                       class="form-control <?= (isset($_SESSION["erreurs"]["description"])) ? "border border-2 border-danger" : "" ?>"
                       id="description"
                       name="description"
                       value="<?= (isset($_POST["description"])) ? $_POST["description"] : null ?>"
                       placeholder="Saisissez une description">

                <?php if (isset($_SESSION["erreurs"]["description"])) : ?>

                    <p class="form-text fs-5 text-danger"> <?= $_SESSION["erreurs"]["description"] ?></p>

                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="dateIncident" class="form-label fs-5">Date incident* :</label>
                <input type="date"
                       class="form-control <?= (isset($_SESSION["erreurs"]["dateIncident"])) ? "border border-2 border-danger" : "" ?>"
                       id="dateIncident"
                       name="dateIncident"
                       value="<?= (isset($_POST["dateIncident"])) ? $_POST["dateIncident"] : null ?>"
                       placeholder="Saisissez la date de l'incident">

                <?php if (isset($_SESSION["erreurs"]["dateIncident"])) : ?>

                    <p class="form-text fs-5 text-danger"> <?= $_SESSION["erreurs"]["dateIncident"] ?></p>

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