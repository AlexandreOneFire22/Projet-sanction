
<main class="container-fluid mb-4">

    <h1 class="ms-5 mb-3">Se connecter :</h1>

    <div class="w-75 mx-auto">
        <form method="post" novalidate>

            <div class="mb-3">
                <label for="email" class="form-label fs-5">Email* :</label>
                <input type="email"
                       class="form-control <?= (isset($_SESSION["erreurs"]["email"])) ? "border border-2 border-danger" : "" ?>"
                       id="email"
                       name="email"
                       value="<?= (isset($_POST["email"])) ? $_POST["email"] : null ?>"
                       placeholder="Saisissez votre email">

                <?php if (isset($_SESSION["erreurs"]["email"])) : ?>

                    <p class="form-text fs-5 text-danger"> <?= $_SESSION["erreurs"]["email"] ?></p>

                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label fs-5">Mot de passe* :</label>
                <input type="password"
                       class="form-control <?= (isset($_SESSION["erreurs"]["password"])) ? "border border-2 border-danger" : "" ?>"
                       id="password"
                       name="password"
                       value=""
                       placeholder="Saisissez votre mot de passe">

                <?php if (isset($_SESSION["erreurs"]["password"])) : ?>

                    <p class="form-text fs-5 text-danger"> <?= $_SESSION["erreurs"]["password"] ?></p>

                <?php endif; ?>
            </div>

            <p class="fst-italic mt-3">*Champs obligatoire</p>

            <?php if (isset($_SESSION["erreurs"]["connection"])) : ?>

                <p class="form-text fs-5 text-danger"> <?= $_SESSION["erreurs"]["connection"] ?></p>

            <?php endif; ?>

            <span class="d-flex justify-content-evenly">
                <button type="submit" class="btn btn-primary mt-2 mb-1">Valider</button>
            </span>
        </form>
    </div>



</main>