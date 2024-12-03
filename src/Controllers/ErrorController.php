<?php

namespace App\Controllers;

class ErrorController extends AbstractController
{
    public function error404(): void
    {
        $this->renderError(404);
    }

    public function pageErreur(string $titre, string $message, string $redirectionLiens = null, string $redirectionMessage = null): void
    {
        $_SESSION["pageErreur"] ["titre"] = $titre;
        $_SESSION["pageErreur"] ["message"] = $message;
        $_SESSION["pageErreur"] ["redirection"] ["lien"] = $redirectionLiens;
        $_SESSION["pageErreur"] ["redirection"] ["message"] = $redirectionMessage;

        $this->render('error/pageErreur',"footerMoins");
    }

} 