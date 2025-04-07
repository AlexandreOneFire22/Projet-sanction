<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <title>Accueil</title>
</head>

<header>
    <nav class="navbar navbar-expand-md bg-info border-bottom border-3 border-primary mb-5">
        <div class="container-fluid mx-2">
            <div class="d-flex justify-content-start">
                <a class="navbar-brand d-flex" href="/">
                    <img src="assets/image/logo.png" width="140">
                    <h1 class="fw-bold text-primary fst-italic align-self-center ms-2" id="nomLogo">my punishment~</h1>
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <?php if (isset($_SESSION["user"])): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fs-3 text-blanc me-4" href="#" role="button" data-bs-toggle="dropdown">
                                <?= $_SESSION["user"]["prenom"] ?> <?= $_SESSION["user"]["nom"] ?>
                            </a>

                            <ul class="dropdown-menu me-5">
                                <li><a class="dropdown-item" href="/creerUnePromotion">Ajouter une promotion</a></li>
                                <li><a class="dropdown-item" href="/ajouterEtudiant">Ajouter des étudiants</a></li>
                                <li><a class="dropdown-item" href="/ajouterMotifSanction">Ajouter un motif de sanction</a></li>
                                <li><a class="dropdown-item" href="/ajouterSanction">Ajouter une sanction</a></li>
                                <li>----------------------------------------</li>
                                <li><a class="dropdown-item" href="/seDeconnecter">Se déconnecter</a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link fs-3 fw-bold" href="/creerUnCompte">|créer un compte| </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-3 fw-bold" href="/seConnecter">|se connecter|</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>

<body>

<?= $content ?>

</body>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="assets/js/bootstrap.bundle.js"></script>

<footer class="fixed-bottom bg-info border-top border-3 border-primary d-flex justify-content-evenly" id="<?=$_GET['footer']?>">
    <a href="/mentionsLegales" class="align-self-center fs-2">Mentions légales</a>
    <a href="" class="align-self-center fs-2">Contact</a>
    <div class="d-flex justify-content-evenly">
        <a href="" class="align-self-center mx-2"> <img src="assets/image/instagramLogo.png" width="50"></a>
        <a href="" class="align-self-center mx-2"> <img src="assets/image/facebookLogo.png" width="50"></a>
        <a href="" class="align-self-center mx-2"> <img src="assets/image/xLogo.png" width="50"></a>
    </div>
</footer>

</html>