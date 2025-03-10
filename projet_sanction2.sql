-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 10 mars 2025 à 01:44
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_sanction`
--

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `id_etudiant` int(11) NOT NULL,
  `prenom_etudiant` varchar(50) NOT NULL,
  `nom_etudiant` varchar(50) NOT NULL,
  `id_promotion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`id_etudiant`, `prenom_etudiant`, `nom_etudiant`, `id_promotion`) VALUES
(725, 'Gaël', 'ADRIAN', 1),
(726, 'Mika', 'BOUGNON', 1),
(727, 'Adrien', 'BRUYERE', 1),
(728, 'Michal', 'CHILINSKI', 1),
(729, 'Arthur', 'COLLEU', 1),
(730, 'Denis', 'CROZE', 1),
(731, 'SILVA Clément', 'DA', 1),
(732, 'Efe', 'DEMIR', 1),
(733, 'MOUAFIK Titouan', 'EL', 1),
(734, 'Melvin', 'FAINDT', 1),
(735, 'Alexi', 'FIGARD', 1),
(736, 'Alexandre', 'GAUTHIER', 1),
(737, 'Nolan', 'HAMILCARO', 1),
(738, 'Dany', 'ILOAI', 1),
(739, 'Jules', 'JORAY', 1),
(740, 'Mael', 'KOHLER', 1),
(741, 'Lukas', 'LANGUE', 1),
(742, 'Valentin', 'LETHIER', 1),
(743, 'Thomas', 'MICHELIN', 1),
(744, 'Antoine', 'MIGNOT', 1),
(745, 'Léo', 'MOUGIN', 1),
(746, 'Antoine', 'NERET', 1),
(747, 'Khang', 'NGUYEN', 1),
(748, 'Phong', 'NGUYEN', 1),
(749, 'Thomas', 'NICOLET', 1),
(750, 'Grégoire', 'PETITEAU', 1),
(751, 'Andy', 'SCHIESSLÉ', 1),
(752, 'Maxime', 'SERMET', 1),
(753, 'Hugo', 'TALBOT', 1),
(754, 'Teuiau', 'TIATIA', 1);

-- --------------------------------------------------------

--
-- Structure de la table `motifsanction`
--

CREATE TABLE `motifsanction` (
  `id` int(11) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `motifsanction`
--

INSERT INTO `motifsanction` (`id`, `libelle`, `description`) VALUES
(1, 'retard', '');

-- --------------------------------------------------------

--
-- Structure de la table `promotion`
--

CREATE TABLE `promotion` (
  `id_promotion` int(11) NOT NULL,
  `libelle_promotion` varchar(100) NOT NULL,
  `annee_promotion` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `promotion`
--

INSERT INTO `promotion` (`id_promotion`, `libelle_promotion`, `annee_promotion`) VALUES
(1, 'BTS SIO2', '2024'),
(2, 'BTS SIO2', '2023'),
(3, 'BTS SIO1', '2024'),
(4, 'Terminal Général', '2022'),
(5, 'Terminal Général', '2024'),
(6, 'BTS SIO 3', '2000');

-- --------------------------------------------------------

--
-- Structure de la table `sanction`
--

CREATE TABLE `sanction` (
  `id` int(11) NOT NULL,
  `eleve_sanctionne` int(11) NOT NULL,
  `nom_applicateur` varchar(100) NOT NULL,
  `motif_sanction` int(11) NOT NULL,
  `description` text NOT NULL,
  `date_incident` date NOT NULL,
  `date_creation` date NOT NULL DEFAULT curdate(),
  `createur_sanction` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `sanction`
--

INSERT INTO `sanction` (`id`, `eleve_sanctionne`, `nom_applicateur`, `motif_sanction`, `description`, `date_incident`, `date_creation`, `createur_sanction`) VALUES
(1, 736, 'moi', 1, 'en retard', '2025-03-09', '2025-03-10', 13);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nom_user` varchar(100) NOT NULL,
  `prenom_user` varchar(100) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `password_user` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `nom_user`, `prenom_user`, `email_user`, `password_user`) VALUES
(8, 'Nom', 'prénom', 'email@gmail.com', '$2y$10$xEBoV9lJL1/Wrtft8.nKLuI6kHUw7h73oJr12rr5ju/R.IfzFxKzm'),
(10, 'lamy', 'franck', 'fl@test.fr', '$2y$10$qW.y3zu3I3szIb01kzZOEOsI/1wI6wTqncQRiGuXj9OVRHmQKSh1S'),
(11, 'Boileau2', 'Ethan2', 'ethan2@gmail.com', '$2y$10$0xJ5ln7w3R778cr2IelO.O6/ks1nFrvKxLdpEmYG6CfuTSTGGJbUG'),
(12, 'Gauthier', 'Alexandre', 'alexgau70@gmail.com', '$2y$10$qLjRx3rZ0MvKp/lzoLDpf.Pi.22KjXs10X2PF22l7.8oSiMed5W3a'),
(13, 'boileau', 'ethan', 'ethan@gmail.com', '$2y$10$EAi1rQi.ANvh6ZBOMflaWeFM0M8acwvOG/4vGW2ijFFF74piPYd7u');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`id_etudiant`),
  ADD KEY `FK_etudiant_promotion` (`id_promotion`);

--
-- Index pour la table `motifsanction`
--
ALTER TABLE `motifsanction`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`id_promotion`);

--
-- Index pour la table `sanction`
--
ALTER TABLE `sanction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `eleve_sanctionne` (`eleve_sanctionne`),
  ADD KEY `motif_sanction` (`motif_sanction`),
  ADD KEY `createur_sanction` (`createur_sanction`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `id_etudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=755;

--
-- AUTO_INCREMENT pour la table `motifsanction`
--
ALTER TABLE `motifsanction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `id_promotion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `sanction`
--
ALTER TABLE `sanction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `FK_etudiant_promotion` FOREIGN KEY (`id_promotion`) REFERENCES `promotion` (`id_promotion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `sanction`
--
ALTER TABLE `sanction`
  ADD CONSTRAINT `sanction_ibfk_1` FOREIGN KEY (`eleve_sanctionne`) REFERENCES `etudiant` (`id_etudiant`) ON DELETE CASCADE,
  ADD CONSTRAINT `sanction_ibfk_2` FOREIGN KEY (`motif_sanction`) REFERENCES `motifsanction` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sanction_ibfk_3` FOREIGN KEY (`createur_sanction`) REFERENCES `user` (`id_user`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
