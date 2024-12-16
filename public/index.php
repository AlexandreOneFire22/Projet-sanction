<?php

// Contrôleur FRONTAL => Router
// Toute les requêtes des utilisateurs passent par ce fichier

use App\Entity\User;
use Doctrine\ORM\EntityManager;

require_once __DIR__.'/../vendor/autoload.php';

session_start();

$entityManager = require_once __DIR__.'/../config/bootstrap.php';

// Récupération des routes
$routes = require_once __DIR__ . '/../config/routes.php';

// Récupération de l'URL actuelle
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// Dans https://localhost:8000/todos/show?id=1
// $uri = "/todos/show"

// Recherche de la route correspondante
if (!isset($routes[$uri])) {
    $errorController = new \App\Controllers\ErrorController();
    $errorController->error404();
    exit;
}

// Récupération du contrôleur et de l'action
[$controllerName, $action] = $routes[$uri];
$controllerClass = "App\\Controllers\\{$controllerName}";

try {
    // Instanciation du contrôleur et appel de l'action
    $controller = new $controllerClass($entityManager);
    $controller->$action();
} catch (\Exception $e) {

    //error_log($e->getMessage());
    //$errorController = new \App\Controllers\ErrorController();
    //$errorController->error404();


    $controller = new $controllerClass($entityManager);
    $controller->$action();
}





