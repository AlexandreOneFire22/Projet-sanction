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
                <a class="navbar-brand d-flex" href="index.php">
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
                    <?php if (isset($_SESSION["pseudo"])): ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle fs-3 text-blanc me-4" href="#" role="button" data-bs-toggle="dropdown">
                                <?= $_SESSION["pseudo"] ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="">Ajouter un film</a></li>
                                <li><a class="dropdown-item" href="">Liste de mes films</a></li>
                                <li>----------------------------------------</li>
                                <li><a class="dropdown-item" href="">Se déconnecter</a></li>
                            </ul>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link fs-3 fw-bold" href="">|créer un compte| </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link fs-3 fw-bold" href="">|se connecter|</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
</header>