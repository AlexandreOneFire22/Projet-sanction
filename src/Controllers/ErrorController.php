<?php

namespace App\Controllers;

use App\Controller\AbstractController;

class ErrorController extends AbstractController
{
    public function error404(): void
    {
        $this->renderError(404);
    }
} 