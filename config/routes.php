<?php

return [
    '/' => ['AccueilController', 'Accueil'],
    '/index' => ['AccueilController', 'Accueil'],
    '/mentionsLegales' => ['MentionsLegalesController', 'MentionsLegales'],
    '/creerUnCompte' => ['UserController', 'creerUnCompte'],
    '/seConnecter' => ['UserController', 'seConnecter'],
    '/seDeconnecter' => ['UserController', 'seDeconnecter'],
    '/creerUnePromotion' => ['PromotionController', 'creerUnePromotion'],
    '/ajouterEtudiant' => ['EtudiantController', 'ajouterEtudiant'],
    '/pageErreur' => ['ErrorController', 'pageErreur']
];