<?php

namespace App\Controllers;

class AccueilController
{

    //Méthode permettant de gérer la page d'accueil

    public function Accueil() {

        //Fait appelle au Modèle afin de récupérer les données dans la BD


        //Fait appel à la Vue afin de renvoyer la page

        require_once __DIR__."/../../views/accueil/accueil.php";

    }

}