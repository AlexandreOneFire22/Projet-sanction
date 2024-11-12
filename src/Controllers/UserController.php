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
        $this->repository = $this->entityManager->getRepository(User::class);
    }

    public function addUser(){

        if ($_SERVER["REQUEST_METHOD"] === "POST"){

            //Vérification des données saisie :

            $prenom = $_POST["prenom"];
            $nom = $_POST["nom"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $passwordVerif = $_POST["passwordVerif"];

            if (empty($prenom)) {
                $erreurs ["prenom"] = "La saisie du prénom est obligatoire.";
            }

            if (empty($nom)) {
                $erreurs ["nom"] = "La saisie du nom est obligatoire.";
            }

            if (empty($email)) {
                $erreurs ["email"] = "L'adresse email est obligatoire.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $erreurs ["email"] = "L'adresse email n'est pas valide.";


            }elseif (!empty($this->repository->findOneBy(['email' => $email]))){
                $erreurs ["email_utilisateur"] = "Cette adresse email est déjà utilisé.";
            }

            if (empty($password)) {
                $erreurs ["password"] = "Le mot de passe est obligatoire.";
            }elseif (strlen($password)<8){
            $erreurs ["password"] = "Le mot de passe doit comporter plus de 8 caractère.";
            }

            //#############################################################################################

            if (empty($passwordVerif)) {
                $erreurs ["passwordVerif"] = "Le mot de passe doit être à nouveau saisie.";
            }elseif ($password!=$passwordVerif){
                $erreurs ["passwordVerif"] = "Le mot de passe saisie est différent, il doit être identique.";
            }

            //ajout des données dans la base de données :
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