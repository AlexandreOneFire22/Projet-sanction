<?php

namespace App\Controllers;

use App\Entity\MotifSanction;
use App\Entity\Promotion;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use App\Controllers\ErrorController;

class MotifSanctionController extends AbstractController
{
    private EntityManager $entityManager;

    /**
     * @var Doctrine\ORM\EntityManager $entityManager
     */

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repository = $this->entityManager->getRepository(MotifSanction::class);
    }


    public function creerUnMotif(){

        if (!isset($_SESSION ["user"])){
            $pageErreur = new ErrorController();
            $pageErreur->pageErreur("vous n'êtes pas connecté à un compte.",
                "Vous devez être connecté à un compte pour accéder à cette page.",
                "/seConnecter", "Se connecter");
            exit();
        }

        $_SESSION["erreurs"] = [];

        if ($_SERVER["REQUEST_METHOD"] === "POST"){

            //Vérification des données saisie :

            $libelle = $_POST["libelle"];
            $description = $_POST["description"];

            $erreurs = [];

            if (empty($libelle)) {
                $erreurs ["libelle"] = "La saisie du libellé est obligatoire.";
            }

            $recherche = $this->repository->findOneBy(['libelle' => $libelle]);

            if (!empty($recherche)){
                    $erreurs ["libelle"] = "Ce motif est déjà éxistant.";
                }

            if (empty($erreurs)) {
                //ajout des données dans la base de données :

                $motif = new MotifSanction();
                $motif->setLibelle($_POST["libelle"]);
                $motif->setDescription($_POST["description"]);

                $this->entityManager->persist($motif); //persist n'exécute pas directement le insert

                //Valider le Insert

                $this->entityManager->flush(); // flush Réalise le Insert

                $this->render('sanction/ajouterMotifSanction',"footerMoins");
            }else{
                $_SESSION ["erreurs"] = $erreurs;
                $this->render('sanction/ajouterMotifSanction',"footerMoins");
            }
        }else{
            $this->render('sanction/ajouterMotifSanction',"footerMoins");
        }

    }

}