
<main class="container-fluid mb-4">

    <h1 class="ms-5 mb-3">Ajouter des étudiants :</h1>

    <div class="w-75 mx-auto">
        <form method="post" novalidate>

            <div class="mb-3">
                <label for="csvEtudiant" class="form-label fs-5">Fichier en .csv des étudiants* :</label>
                <input type="file"
                       class="form-control"
                       id="csvEtudiant"
                       name="csvEtudiant"
                       accept=".csv"
                >
            </div>

            <div class="mb-3">
                <label for="promotion" class="form-label fs-5">Promotion* :</label>
                <select id="promotion" name="promotion" class="form-select">

                    <?php for ($i = 0; $i <= count($_SESSION["promotion"])-1; $i++) : ?>

                        <option value="<?= $_SESSION["promotion"][$i][1] ?>"> <?= $_SESSION["promotion"][$i][0] ?> </option>

                    <?php endfor;?>

                </select>

            </div>

            <p class="fst-italic mt-3">*Champs obligatoire</p>

            <span class="d-flex justify-content-evenly">
                <button type="submit" class="btn btn-primary mt-2 mb-1">Valider</button>
            </span>
        </form>
    </div>



</main>