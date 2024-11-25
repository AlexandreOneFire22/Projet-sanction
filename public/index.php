<?php

// Contrôleur FRONTAL => Router
// Toute les requêtes des utilisateurs passent par ce fichier


require_once __DIR__.'/../vendor/autoload.php';

// Récupération des routes
$routes = require_once __DIR__ . '/../config/routes.php';

// Récupération de l'URL actuelle
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// Dans https://localhost:8000/todos/show?id=1
// $uri = "/todos/show"

// Recherche de la route correspondante
if (!isset($routes[$uri])) {
    $errorController = new \App\Controller\ErrorController();
    $errorController->error404();
    exit;
}

// Récupération du contrôleur et de l'action
[$controllerName, $action] = $routes[$uri];
$controllerClass = "App\\Controller\\{$controllerName}";

// Récupération du contrôleur et de l'action
[$controllerName, $action] = $routes[$uri];
$controllerClass = "App\\Controller\\{$controllerName}";

try {
    // Instanciation du contrôleur et appel de l'action
    $controller = new $controllerClass();
    $controller->$action();
} catch (\Exception $e) {
    error_log($e->getMessage());
    $errorController = new \App\Controller\ErrorController();
    $errorController->error404();
}




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






require_once __DIR__ . '/../vendor/autoload.php';

// Récupération des routes
$routes = require_once __DIR__ . '/../config/routes.php';






// Récupération de l'URL actuelle
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// Dans https://localhost:8000/todos/show?id=1
// $uri = "/todos/show"




// Recherche de la route correspondante
if (!isset($routes[$uri])) {
    $errorController = new \App\Controller\ErrorController();
    $errorController->error404();
    exit;
}




// Récupération du contrôleur et de l'action
[$controllerName, $action] = $routes[$uri];
$controllerClass = "App\\Controller\\{$controllerName}";

try {
    // Instanciation du contrôleur et appel de l'action
    $controller = new $controllerClass();
    $controller->$action();
} catch (\Exception $e) {
    error_log($e->getMessage());
    $errorController = new \App\Controller\ErrorController();
    $errorController->error404();
}


