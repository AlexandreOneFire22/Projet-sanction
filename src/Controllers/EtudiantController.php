<?php

namespace App\Controllers;

use AllowDynamicProperties;
use App\Entity\Etudiant;
use App\Entity\Promotion;
use Doctrine\ORM\EntityManager;
use App\Http\Controllers\Controller;
use Doctrine\ORM\Exception\EntityManagerClosed;
use League\Csv\Reader;

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


    public function ajouterEtudiant()
    {

        if (!isset($_SESSION ["user"])) {
            $pageErreur = new ErrorController();
            $pageErreur->pageErreur("vous n'êtes pas connecté à un compte.",
                "Vous devez être connecté à un compte pour accéder à cette page.",
                "/seConnecter", "Se connecter");
            exit();
        }

        $_SESSION["erreurs"] = [];
        $_SESSION["promotion"] = [];

        if (!isset($_POST["promotion"])){
            $_POST["promotion"] = 1;
        }

        $repositoryPromotion = $this->entityManager->getRepository(Promotion::class);
        $promotion = $repositoryPromotion->findBy([], ['annee' => 'DESC']);

        foreach ($promotion as $item) {

            $titre = $item->getLibelle() . " | " . $item->getAnnee();

            $_SESSION["promotion"][] = [$titre, $item->getId()];
        }


        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            if (empty($_FILES['csvEtudiant']['tmp_name'])) {
                $erreurs ["fichier"] = "L'importation d'un fichier CSV est obligatoire";
            }else{
                $csv = Reader::createFromPath($_FILES['csvEtudiant']['tmp_name'], 'r');

                $csv->setHeaderOffset(0);

                $records = $csv->getRecords();
            }

            if (!isset($record["Nom"]) || !isset($record["Prénom"])){
                $erreurs ["fichier"] = "Le fichier csv doit comporter un champs 'Nom' et un champs 'Prénom'.";
            }



            $promoEleve = $repositoryPromotion->find($_POST["promotion"]);

            if (!$promoEleve){
                $erreurs ["promotion"] = "La promotion n'éxiste pas.";
            }

            if (empty($erreurs)) {




                $promoEleve = $this->entityManager->find(Promotion::class, $_POST["promotion"]);

                foreach ($records as $record) {
                    $etudiant = new Etudiant();
                    $etudiant->setPrenom($record["Prénom"]);
                    $etudiant->setNom($record["Nom"]);
                    $etudiant->setPromotion($promoEleve);
                    $this->entityManager->persist($etudiant);
                }

                try {
                    $this->entityManager->flush();
                }catch (\Exception $exception){
                    echo "coucou";
                    echo $exception->getMessage();
                }


                $this->render('accueil/accueil', "footerMoins");
            } else {
                $_SESSION ["erreurs"] = $erreurs;
                $this->render('etudiant/ajouterEtudiant', "footerMoins");
            }
        } else {
            $this->render('etudiant/ajouterEtudiant', "footerMoins");
        }
    }

}