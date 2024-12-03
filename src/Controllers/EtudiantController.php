<?php

namespace App\Controllers;

use App\Entity\Etudiant;
use App\Entity\Promotion;
use Doctrine\ORM\EntityManager;
use League\Csv\Reader;
use Doctrine\ORM\EntityRepository;
use App\Controllers\ErrorController;

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

        $repository = $this->entityManager->getRepository(Promotion::class);
        $promotion = $repository->findAll();
        foreach ($promotion as $item){

            $titre = $item->getLibelle()." ".$item->getAnnee();

            $_SESSION["promotion"][] = [$titre,$item->getId()];
        }

        print_r($_SESSION["promotion"]);
        echo "000000000000000000000000000000000000000";
        print_r($_SESSION["promotion"][0]);

        if ($_SERVER["REQUEST_METHOD"] === "POST"){

            //Vérification des données saisie :


            //load the CSV document from a file path
            $csv = Reader::createFromPath('/path/to/your/csv/file.csv', 'r');
            $csv->setHeaderOffset(0);

            $header = $csv->getHeader(); //returns the CSV header record

            //returns all the records as
            $records = $csv->getRecords(); // an Iterator object containing arrays
            $records = $csv->getRecordsAsObject(MyDTO::class); //an Iterator object containing MyDTO objects

            echo $csv->toString(); //returns the CSV document as a string

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
                $this->render('promotion/creerUnePromotion',"footerMoins");
            }
        }else{
            $this->render('etudiant/ajouterEtudiant',"footerMoins");
        }

    }

}