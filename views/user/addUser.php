<body>

<main class="container-fluid">

    <h1 class="ms-5 mb-4">Créer un compte :</h1>

    <div class="w-75 mx-auto">
        <form method="post" novalidate>

            <div class="mb-3">
                <label for="prenom" class="form-label fs-5">Prénom* :</label>
                <input type="text"
                       class="form-control"
                       id="prenom"
                       name="prenom"
                       value=""
                       placeholder="Saisissez votre prénom">

            </div>

            <div class="mb-3">
                <label for="nom" class="form-label fs-5">Nom* :</label>
                <input type="text"
                       class="form-control"
                       id="nom"
                       name="nom"
                       value=""
                       placeholder="Saisissez votre nom">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label fs-5">Email* :</label>
                <input type="email"
                       class="form-control"
                       id="email"
                       name="email"
                       value=""
                       placeholder="Saisissez votre email">

            </div>

            <div class="mb-3">
                <label for="password" class="form-label fs-5">Mot de passe* :</label>
                <input type="password"
                       class="form-control"
                       id="password"
                       name="password"
                       value=""
                       placeholder="Saisissez votre mot de passe">
            </div>

            <p class="fst-italic mt-3">*Champs obligatoire</p>

            <span class="d-flex justify-content-evenly">
                <button type="submit" class="btn btn-primary mt-3">Valider</button>
            </span>
        </form>
    </div>



</main>
</body>