
<main class="container-fluid mb-4">

    <h1 class="ms-5 mb-3">Créer un compte :</h1>

    <div class="w-75 mx-auto">
        <form method="post" novalidate>

            <div class="mb-3">
                <label for="prenom" class="form-label fs-5">Prénom* :</label>
                <input type="text"
                       class="form-control <?= (isset($_SESSION["prenom"])) ? "border border-2 border-danger" : "" ?>"
                       id="prenom"
                       name="prenom"
                       value="<?= (isset($_POST["prenom"])) ? $_POST["prenom"] : null ?>"
                       placeholder="Saisissez votre prénom">

                <?php if (isset($_SESSION["prenom"])) : ?>

                    <p class="form-text fs-5 text-danger"> <?= $_SESSION["prenom"] ?></p>

                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="nom" class="form-label fs-5">Nom* :</label>
                <input type="text"
                       class="form-control <?= (isset($_SESSION["nom"])) ? "border border-2 border-danger" : "" ?>"
                       id="nom"
                       name="nom"
                       value="<?= (isset($_POST["nom"])) ? $_POST["nom"] : null ?>"
                       placeholder="Saisissez votre nom">

                <?php if (isset($_SESSION["nom"])) : ?>

                    <p class="form-text fs-5 text-danger"> <?= $_SESSION["nom"] ?></p>

                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label fs-5">Email* :</label>
                <input type="email"
                       class="form-control <?= (isset($_SESSION["email"])) ? "border border-2 border-danger" : "" ?>"
                       id="email"
                       name="email"
                       value="<?= (isset($_POST["email"])) ? $_POST["email"] : null ?>"
                       placeholder="Saisissez votre email">

                <?php if (isset($_SESSION["email"])) : ?>

                    <p class="form-text fs-5 text-danger"> <?= $_SESSION["email"] ?></p>

                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label fs-5">Mot de passe* :</label>
                <input type="password"
                       class="form-control <?= (isset($_SESSION["password"])) ? "border border-2 border-danger" : "" ?>"
                       id="password"
                       name="password"
                       value=""
                       placeholder="Saisissez votre mot de passe">

                <?php if (isset($_SESSION["password"])) : ?>

                    <?php foreach ($_SESSION["password"] as $erreur) : ?>

                    <p class="form-text fs-5 text-danger"> <?= $erreur ?></p>

                    <?php endforeach; ?>

                <?php endif; ?>
            </div>

            <div class="mb-3">
                <label for="passwordVerif" class="form-label fs-5">Confirmer le mot de passe* :</label>
                <input type="password"
                       class="form-control <?= (isset($_SESSION["passwordVerif"])) ? "border border-2 border-danger" : "" ?>"
                       id="passwordVerif"
                       name="passwordVerif"
                       value=""
                       placeholder="Saisissez à nouveau votre mot de passe">

                <?php if (isset($_SESSION["passwordVerif"])) : ?>

                    <p class="form-text fs-5 text-danger"> <?= $_SESSION["passwordVerif"] ?></p>

                <?php endif; ?>
            </div>

            <p class="fst-italic mt-3">*Champs obligatoire</p>

            <span class="d-flex justify-content-evenly">
                <button type="submit" class="btn btn-primary mt-2 mb-1">Valider</button>
            </span>
        </form>
    </div>



</main>