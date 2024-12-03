<?php

namespace App\Controllers;

use App\Entity\Promotion;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use App\Controllers\ErrorController;

class PromotionController extends AbstractController
{
    private EntityManager $entityManager;

    /**
     * @var Doctrine\ORM\EntityManager $entityManager
     */

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repository = $this->entityManager->getRepository(Promotion::class);
    }


    public function creerUnePromotion(){

        if (!isset($_SESSION ["user"])){
            $pageErreur = new ErrorController();
            $pageErreur->pageErreur("vous n'êtes pas connecté à un compte.",
                "Si vous souhaiter accèder à cette page vous devez être connecté à un compte pour accéder à cette page.",
                "/seConnecter", "Se connecter");
            exit();
        }

        $_SESSION["erreurs"] = [];

        if ($_SERVER["REQUEST_METHOD"] === "POST"){

            //Vérification des données saisie :

            $libelle = $_POST["libelle"];
            $annee = $_POST["annee"];

            $erreurs = [];

            if (empty($libelle)) {
                $erreurs ["libelle"] = "La saisie du libellé est obligatoire.";
            }

            if (empty($annee)) {
                $erreurs ["annee"] = "La saisie de l'année est obligatoire.";
            }elseif (strlen($annee)!=4){
                $erreurs ["annee"] = "L'année n'est pas valide.";
            }

            $recherche = $this->repository->findOneBy(['libelle' => $libelle]);

            if (!empty($recherche)){
                if ($recherche->getAnnee() == $annee){
                    $erreurs ["promotion"] = "Cette promotion existe déjà.";
                }
            }

            if (empty($erreurs)) {
                //ajout des données dans la base de données :

                $promotion = new Promotion();
                $promotion->setLibelle($_POST["libelle"]);
                $promotion->setAnnee($_POST["annee"]);

                $this->entityManager->persist($promotion); //persist n'exécute pas directement le insert

                //Valider le Insert

                $this->entityManager->flush(); // flush Réalise le Insert

                $this->render('accueil/accueil',"footerMoins");
            }else{
                $_SESSION ["erreurs"] = $erreurs;
                $this->render('promotion/creerUnePromotion',"footerMoins");
            }
        }else{
            $this->render('promotion/creerUnePromotion',"footerMoins");
        }

    }

}