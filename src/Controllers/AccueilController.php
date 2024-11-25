<?php

namespace App\Controllers;

class AccueilController extends AbstractController
{

    public function Accueil() :void {

        $this->render('accueil/accueil',"footerMoins");

    }

}

