<?php

namespace App\Controllers;

use App\Entity\User;
use Doctrine\ORM\EntityManager;

require_once __DIR__.'/../../vendor/autoload.php';

class UserController
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function addUser(){

        if ($_SERVER["REQUEST_METHOD"] === "POST"){

            $user = new User();

            $user->setNom($_POST["nom"]);
            $user->setPrenom($_POST["prenom"]);
            $user->setEmail($_POST["email"]);

            $passwordHash = password_hash($_POST["password"],PASSWORD_DEFAULT);

            $user->setPassword($passwordHash);



            $this->entityManager->persist($user); //persist n'exécute pas directement le insert

            //Valider le Insert

            $this->entityManager->flush(); // flush Réalise le Insert

            require __DIR__."/../../views/accueil/accueil.php";
        }else{
            require __DIR__."/../../views/user/addUser.php";
        }

    }





}