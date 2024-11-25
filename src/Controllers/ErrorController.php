<?php

namespace App\Controllers;

class ErrorController extends AbstractController
{
    public function error404(): void
    {
        $this->renderError(404);
    }
} 