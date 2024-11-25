<?php

namespace App\Controllers;

use App\Entity\User;
use Doctrine\ORM\EntityManager;

require_once __DIR__.'/../../vendor/autoload.php';

class UserController extends AbstractController
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

            $erreurs = [];

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
                $erreurs ["email"] = "Cette adresse email est déjà utilisé.";
            }

            $passwordParLettre = str_split($password);

            if (empty($password)){
                $erreurs ["password"] [] = "Le mot de passe est obligatoire.";
            }elseif (strlen($password)<8){
                $erreurs ["password"] [] = "Le mot de passe doit comporter plus de 8 caractère.";
            }

                $tabPassword = str_split($password);

                $minusculePresent = false;
                $majusculePresent = false;
                $chiffrePresent = false;

                foreach ($tabPassword as $lettre) {

                    $assciiLetttre = ord($lettre);

                    switch (true) {
                        case ($assciiLetttre >= 48 && $assciiLetttre <= 57):
                            $chiffrePresent = true;
                            break;

                        case ($assciiLetttre >= 65 && $assciiLetttre <= 90):
                            $majusculePresent = true;
                            break;

                        case ($assciiLetttre >= 97 && $assciiLetttre <= 122):
                            $minusculePresent = true;
                            break;
                    }
                }

                if (!$minusculePresent) {
                    $erreurs ["password"] [] = "Le mot de passe doit comporter au moins une minuscule.";
                }

                if (!$majusculePresent) {
                    $erreurs ["password"] [] = "Le mot de passe doit comporter au moins une majuscule.";
                }

                if (!$chiffrePresent) {
                    $erreurs ["password"] [] = "Le mot de passe doit comporter au moins un chiffre.";
                }


            if (empty($passwordVerif)) {
                $erreurs ["passwordVerif"] = "Le mot de passe doit être à nouveau saisie.";
            }elseif ($password!=$passwordVerif){
                $erreurs ["passwordVerif"] = "Le mot de passe saisie est différent, il doit être identique.";
            }

            if (empty($erreurs)) {
                //ajout des données dans la base de données :
                $user = new User();
                $user->setNom($_POST["nom"]);
                $user->setPrenom($_POST["prenom"]);
                $user->setEmail($_POST["email"]);

                $passwordHash = password_hash($_POST["password"], PASSWORD_DEFAULT);

                $user->setPassword($passwordHash);

                $this->entityManager->persist($user); //persist n'exécute pas directement le insert

                //Valider le Insert

                $this->entityManager->flush(); // flush Réalise le Insert

                require __DIR__."/../../public/index.php";
            }else{
                require __DIR__."/../../views/user/addUser.php";
            }
        }else{
            require __DIR__."/../../views/user/addUser.php";
        }

    }





}