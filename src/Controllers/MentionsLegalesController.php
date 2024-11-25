<?php

namespace App\Controllers;

class MentionsLegalesController extends AbstractController{

    public function MentionsLegales() : void{

        $this->render('MentionsLegales/MentionsLegales',"footerPlus");

    }
}