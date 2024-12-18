


<main class="container-fluid">

    <?php if (isset($nbEtudiantAjouter) && isset($libellePromotion)) : ?>
    <div class="alert alert-success alert-dismissible fade show d-flex justify-content-between">
        <h5 class="my-auto">Importation effectué avec succès, <?=$nbEtudiantAjouter?> élèves ont été importés dans la
            promotion <?=$libellePromotion?></h5>
        <button type="button" class="close bg-success-subtle border-0" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true" class="fs-4">&times;</span>
        </button>
    </div>
    <?php endif; ?>

<h1 class="text-primary fs-3" style="text-indent: 40px"> Se site est un site web ayant pour vocation d'assiter les professeurs,
    personnels scrolaire, et l'administration scrolaire sur les sanctions donné au élèves et étudiants.</h1>

</main>
