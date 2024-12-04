<?php

namespace App\Controllers;

use App\Entity\Etudiant;
use App\Entity\Promotion;
use Doctrine\ORM\EntityManager;
use League\Csv\Reader;
use Doctrine\ORM\EntityRepository;
use App\Controllers\ErrorController;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class EtudiantController extends AbstractController
{
    private EntityManager $entityManager;

    /**
     * @var Doctrine\ORM\EntityManager $entityManager
     */

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repository = $this->entityManager->getRepository(Etudiant::class);
    }


    public function ajouterEtudiant(){

        if (!isset($_SESSION ["user"])){
            $pageErreur = new ErrorController();
            $pageErreur->pageErreur("vous n'êtes pas connecté à un compte.",
                "Vous devez être connecté à un compte pour accéder à cette page.",
                "/seConnecter", "Se connecter");
            exit();
        }

        $_SESSION["erreurs"] = [];
        $_SESSION["promotion"] = [];

        $repository = $this->entityManager->getRepository(Promotion::class);
        $promotion = $repository->findBy([], ['annee' => 'DESC']);

        foreach ($promotion as $item){

            $titre = $item->getLibelle()." ".$item->getAnnee();

            $_SESSION["promotion"][] = [$titre,$item->getId()];
        }



        if ($_SERVER["REQUEST_METHOD"] === "POST"){

            //Vérification des données saisie :


            //$csv = Reader::createFromPath($_POST["csvEtudiant"], 'r');

            //(new UsersImport)->import('users.csv', null, \Maatwebsite\Excel\Excel::CSV);




            $erreurs = ["cc"];

            if (empty($erreurs)) {
                //ajout des données dans la base de données :

                $promotion = new Etudiant();
                $promotion->setPrenom($_POST["libelle"]);
                $promotion->setAnnee($_POST["annee"]);

                $this->entityManager->persist($promotion); //persist n'exécute pas directement le insert

                //Valider le Insert

                $this->entityManager->flush(); // flush Réalise le Insert

                $this->render('accueil/accueil',"footerMoins");
            }else{
                $_SESSION ["erreurs"] = $erreurs;
                $this->render('etudiant/ajouterEtudiant',"footerMoins");
            }
        }else{
            $this->render('etudiant/ajouterEtudiant',"footerMoins");
        }

    }

}