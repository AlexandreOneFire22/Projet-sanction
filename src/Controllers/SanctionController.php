<?php

namespace App\Controllers;

use AllowDynamicProperties;
use App\Entity\Etudiant;
use App\Entity\MotifSanction;
use App\Entity\Promotion;
use App\Entity\Sanction;
use App\Entity\User;
use Doctrine\ORM\EntityManager;
use App\Http\Controllers\Controller;
use Doctrine\ORM\Exception\EntityManagerClosed;
use League\Csv\Reader;

class SanctionController extends AbstractController
{
    private EntityManager $entityManager;

    /**
     * @var Doctrine\ORM\EntityManager $entityManager
     */

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repository = $this->entityManager->getRepository(Sanction::class);
    }

    public function ajouterSanction()
    {

        if (!isset($_SESSION ["user"])) {
            $pageErreur = new ErrorController();
            $pageErreur->pageErreur("vous n'êtes pas connecté à un compte.",
                "Vous devez être connecté à un compte pour accéder à cette page.",
                "/seConnecter", "Se connecter");
            exit();
        }

        $_SESSION["erreurs"] = [];
        $_SESSION["etudiant"] = [];
        $_SESSION["motif"] = [];

        if (!isset($_POST["etudiant"])){
            $_POST["etudiant"] = 1;
        }

        $repositoryEtudiant = $this->entityManager->getRepository(Etudiant::class);
        $etudiant = $repositoryEtudiant->findBy([], ['promotion' => 'ASC']);

        foreach ($etudiant as $item) {

            $titre = $item->getPromotion()->getAnnee() . " | " .$item->getPromotion()->getLibelle() . " | " .$item->getNom() . " | " . $item->getPrenom();

            $_SESSION["etudiant"][] = [$titre, $item->getId()];
        }



        if (!isset($_POST["motif"])){
            $_POST["motif"] = 1;
        }

        $repositoryMotif = $this->entityManager->getRepository(MotifSanction::class);
        $motif = $repositoryMotif->findBy([], ['libelle' => 'ASC']);

        foreach ($motif as $item) {

            $titre = $item->getLibelle();

            $_SESSION["motif"][] = [$titre, $item->getId()];
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $etudiant = $repositoryEtudiant->find($_POST["etudiant"]);

            if (!$etudiant){
                $erreurs ["etudiant"] = "L'étudiant n'éxiste pas.";
            }//else{
            //    $libellePromotion = $promoEleve->getLibelle() . " | " . $promoEleve->getAnnee();
            //}

            $motif = $repositoryMotif->find($_POST["motif"]);

            if (!$motif){
                $erreurs ["motif"] = "Le motif n'éxiste pas.";
            }

            $nomApplicateur = $_POST["nomApplicateur"];
            $description = $_POST["description"];
            $dateIncident = $_POST["dateIncident"];

            if (empty($nomApplicateur)) {
                $erreurs ["nomApplicateur"] = "La saisie du nom de l'applicateur est obligatoire.";
            }

            if (empty($description)) {
                $erreurs ["description"] = "La saisie de la description est obligatoire.";
            }

            if (empty($dateIncident)) {
                $erreurs ["dateIncident"] = "La saisie de la date d'incident est obligatoire.";
            }elseif (new \DateTime($_POST["dateIncident"])>new \DateTime()) {
                $erreurs ["dateIncident"] = "La date doit être postérieur à la date du jour";
            }

            if (empty($erreurs)) {

                $etudiant = $this->entityManager->find(Etudiant::class, $_POST["etudiant"]);
                $motif = $this->entityManager->find(MotifSanction::class, $_POST["motif"]);
                $createur = $this->entityManager->find(User::class, $_SESSION["user"]["id"]);


                $sanction = new Sanction();
                $sanction->setEtudiantSanctionne($etudiant);
                $sanction->setNomApplicateur($_POST["nomApplicateur"]);
                $sanction->setMotifSanction($motif);
                $sanction->setDescription($_POST["description"]);
                $sanction->setDateIncident(new \DateTime($_POST["dateIncident"]));
                $sanction->setDateCreation(new \DateTime());
                $sanction->setCreateurSanction($createur);

                $this->entityManager->persist($sanction);


                try {
                    $this->entityManager->flush();
                }catch (\Exception $exception){
                    echo "coucou";
                    echo $exception->getMessage();
                }


                $this->render('accueil/accueil', "footerMoins");
            } else {
                $_SESSION ["erreurs"] = $erreurs;
                $this->render('sanction/ajouterSanction', "footerPlus");
            }
        } else {
            $this->render('sanction/ajouterSanction', "footerPlus");
        }
    }

}