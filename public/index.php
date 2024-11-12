<?php

// Contrôleur FRONTAL => Router
// Toute les requêtes des utilisateurs passent par ce fichier


require_once __DIR__.'/../vendor/autoload.php';

/**
 * @var Doctrine\ORM\EntityManager $entityManager
 */

$entityManager = require_once __DIR__.'/../config/bootstrap.php';



$route = $_GET['route'] ?? 'accueil' ;


require __DIR__ . "/../views/_partial/header.php";


switch ($route){

    case "accueil" :
        $_GET['footer'] = "footerMoins";
        $accueilController = new \App\Controllers\AccueilController();
        $accueilController->Accueil();

        break;

    case "mentionsLegales" :

        $_GET['footer'] = "footerPlus";

        $mentionsLegalesControleur = new \App\Controllers\MentionsLegales();

        $mentionsLegalesControleur->MentionsLegales();

        break;

    case "user-add" :

        $_GET['footer'] = "footerPlus";

        $userControleur = new \App\Controllers\UserController($entityManager);

        $userControleur->addUser();

        break;

    default :
        // Page erreur 404
        $_GET['footer'] = "footerMoins";
        echo "Page non trouvée";

        break;

}


require __DIR__ . "/../views/_partial/footer.php";



