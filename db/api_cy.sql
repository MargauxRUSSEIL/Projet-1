-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 30 mars 2021 à 13:02
-- Version du serveur :  5.7.30
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données : `api_cy`
--

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

CREATE TABLE `competences` (
  `id` int(11) NOT NULL,
  `session_unique_has_type_controle_id` int(11) DEFAULT NULL,
  `blocs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seuil_blocs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ect` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coeff` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seuil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `competences`
--

INSERT INTO `competences` (`id`, `session_unique_has_type_controle_id`, `blocs`, `seuil_blocs`, `ect`, `coeff`, `seuil`) VALUES
(1, 1, 'compétences_bloc', 'compétences_seuil_blocs', 'compétences_ect', 'compétences_coeff', 'compétences_seuil');

-- --------------------------------------------------------

--
-- Structure de la table `composante`
--

CREATE TABLE `composante` (
  `id` int(11) NOT NULL,
  `formation_id` int(11) DEFAULT NULL,
  `libelle_institut` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `composante`
--

INSERT INTO `composante` (`id`, `formation_id`, `libelle_institut`) VALUES
(2, 2, 'CY Tech'),
(3, 3, 'UFR Droit'),
(4, 2, 'Institut d\'Économie et de gestion\r\n'),
(5, 3, 'Institut des Sciences et techniques\r\n'),
(6, 2, 'UFR Langues et études internationales\r\n'),
(7, 2, 'UFR Lettres et sciences humaines\r\n'),
(8, 3, 'INSPE (Instit national supérieur du professorat et de l\'éducation'),
(9, 3, 'EPSS (École pratique des sciences sociales)\r\n'),
(10, 2, 'ILEPS (École supérieure des métiers du sport  et de l’enseignement)\r\n'),
(11, 2, 'IUT (Institut universitaire de technologie)\r\n'),
(12, 3, 'Autre'),
(14, 2, 'Hors composante - fablabs'),
(15, 3, 'Hors composante - Direction professionnelle'),
(16, 2, 'Hors composante - Maison des langues'),
(17, 3, 'Hors composante - Service entrepreneuriat'),
(18, 2, 'Hors composante - Autre');

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id` int(11) NOT NULL,
  `nb_groupe_type_cours_has_cours_id` int(11) DEFAULT NULL,
  `libelle_cours` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_apogee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id`, `nb_groupe_type_cours_has_cours_id`, `libelle_cours`, `code_apogee`) VALUES
(1, 1, 'IOT', 'apogée');

-- --------------------------------------------------------

--
-- Structure de la table `cout_hetd`
--

CREATE TABLE `cout_hetd` (
  `id` int(11) NOT NULL,
  `nb_groupe_type_cours_has_cours_id` int(11) DEFAULT NULL,
  `cout_cm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cout_tp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cout_td` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cout_hetdcol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cout_hetd`
--

INSERT INTO `cout_hetd` (`id`, `nb_groupe_type_cours_has_cours_id`, `cout_cm`, `cout_tp`, `cout_td`, `cout_hetdcol`) VALUES
(1, 1, 'cout_cm', 'cout_tp', 'cout_td', 'cout_hetdcol');

-- --------------------------------------------------------

--
-- Structure de la table `diplome_etablissement`
--

CREATE TABLE `diplome_etablissement` (
  `id` int(11) NOT NULL,
  `type_diplome_has_diplome_etablissement_id` int(11) DEFAULT NULL,
  `libelle_diplome` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nb_annee_diplome` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `diplome_etablissement`
--

INSERT INTO `diplome_etablissement` (`id`, `type_diplome_has_diplome_etablissement_id`, `libelle_diplome`, `nb_annee_diplome`) VALUES
(1, 1, 'DEUG \r\n', '2021'),
(2, 2, 'Licence', '2021'),
(3, 3, 'Maîtrise\r\n', '2021'),
(4, 4, 'Master hors MEEF\r\n\r\n', '2021'),
(5, 5, 'Master MEEF\r\n\r\n', '2021'),
(6, 6, 'Doctorat\r\n', '2021'),
(7, 7, 'HDR (Habilitation à diriger des recherches)\r\n', '2021'),
(8, 8, 'Licence professionnelle \r\n\r\n\r\n', '2021'),
(9, 9, 'BUT\r\n\r\n\r\n', '2021'),
(10, 10, 'DUT\r\n\r\n', '2021'),
(11, 11, ' Pré-ingénieur\r\n\r\n', '2021'),
(12, 12, 'Ingénieur \r\n\r\n\r\n', '2021'),
(13, 13, 'Diplôme de Sciences Po\r\n\r\n\r\n\r\n\r\n', '2021');

-- --------------------------------------------------------

--
-- Structure de la table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210111120156', '2021-03-23 17:48:08', 128),
('DoctrineMigrations\\Version20210319102143', '2021-03-19 10:21:52', 1293),
('DoctrineMigrations\\Version20210323174751', '2021-03-23 17:48:08', 22),
('DoctrineMigrations\\Version20210323175936', '2021-03-23 17:59:44', 141),
('DoctrineMigrations\\Version20210325174119', '2021-03-25 17:41:52', 391),
('DoctrineMigrations\\Version20210325175749', '2021-03-25 17:57:56', 168),
('DoctrineMigrations\\Version20210325180953', '2021-03-25 18:09:59', 196),
('DoctrineMigrations\\Version20210330120811', '2021-03-30 12:08:32', 139),
('DoctrineMigrations\\Version20210330121208', '2021-03-30 12:12:21', 47),
('DoctrineMigrations\\Version20210330121748', '2021-03-30 12:17:58', 174),
('DoctrineMigrations\\Version20210330125153', '2021-03-30 12:52:06', 138),
('DoctrineMigrations\\Version20210330125623', '2021-03-30 12:56:35', 143);

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--

CREATE TABLE `domaine` (
  `id` int(11) NOT NULL,
  `libelle_domaine` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `domaine`
--

INSERT INTO `domaine` (`id`, `libelle_domaine`) VALUES
(1, 'Droit, Économie, Gestion\r\n'),
(2, 'Sciences, Technologies, Santé\r\n'),
(3, 'Sciences Humaines et Sociales\r\n'),
(4, 'Arts, Lettres, Langues\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `etape`
--

CREATE TABLE `etape` (
  `id` int(11) NOT NULL,
  `workflow_id` int(11) DEFAULT NULL,
  `intitule` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_validation` datetime DEFAULT NULL,
  `date_limite` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `etape`
--

INSERT INTO `etape` (`id`, `workflow_id`, `intitule`, `statut`, `date_validation`, `date_limite`) VALUES
(1, NULL, 'nom workflow', 'en cours', '2021-03-29 18:27:20', '2021-04-15 18:27:20');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `id` int(11) NOT NULL,
  `workflow_id` int(11) DEFAULT NULL,
  `structure_haute` int(11) DEFAULT NULL,
  `code_diplome` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ecole_doctorale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commentaire` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `type_formation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vdi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statuts` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mention_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id`, `workflow_id`, `structure_haute`, `code_diplome`, `ecole_doctorale`, `contact`, `commentaire`, `created_at`, `updated_at`, `type_formation`, `vdi`, `statuts`, `mention_id`) VALUES
(2, NULL, 7, 'c123', 'doctorale', 'lp-baaebce@ml.u-cergy.fr', 'commentaire', '2021-03-25 00:00:00', NULL, 'type formation', 'vdi', 'statuts', 5),
(3, NULL, 4, 'CD7765', 'doctorale', 'test@test.fr', 'ceci est un commentaire', '2021-03-18 18:23:11', NULL, 'une formation', 'vdi', 'statuts', 7);

-- --------------------------------------------------------

--
-- Structure de la table `formation_non_diplomante`
--

CREATE TABLE `formation_non_diplomante` (
  `id` int(11) NOT NULL,
  `type_diplome_has_diplome_etablissement_id` int(11) DEFAULT NULL,
  `libelle_certificat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nb_annee_formation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `formation_non_diplomante`
--

INSERT INTO `formation_non_diplomante` (`id`, `type_diplome_has_diplome_etablissement_id`, `libelle_certificat`, `nb_annee_formation`) VALUES
(1, 14, 'Certificat\r\n', '2021'),
(2, 15, 'DAEU\r\n', '2021'),
(3, 16, 'DEUST\r\n\r\n', '2021');

-- --------------------------------------------------------

--
-- Structure de la table `horaire_type_cours`
--

CREATE TABLE `horaire_type_cours` (
  `id` int(11) NOT NULL,
  `nb_groupe_type_cours_has_cours_id` int(11) DEFAULT NULL,
  `horaire_cm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `horaire_tp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `horaire_td` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `horaire_autre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `horaire_type_cours`
--

INSERT INTO `horaire_type_cours` (`id`, `nb_groupe_type_cours_has_cours_id`, `horaire_cm`, `horaire_tp`, `horaire_td`, `horaire_autre`) VALUES
(1, NULL, 'horaire_cm', 'horaire_tp', 'horaire_td', 'horaire_autre');

-- --------------------------------------------------------

--
-- Structure de la table `localisation`
--

CREATE TABLE `localisation` (
  `id` int(11) NOT NULL,
  `formation_id` int(11) DEFAULT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_postal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `localisation`
--

INSERT INTO `localisation` (`id`, `formation_id`, `adresse`, `ville`, `code_postal`) VALUES
(2, 2, '1 rue des tulipes', 'Les Chênes \r\n', 10700),
(3, 3, '1 rue des tulipes', 'Neuville-sur-Oise\r\n', 95000),
(4, 2, '1 rue des tulipes', 'Saint-Martin\r\n', 54450),
(5, 2, '1 rue des tulipes', 'Bernard Hirsch\r\n', 95000),
(6, 3, '1 rue des tulipes', 'Saint-Germain-en-Laye\r\n', 78100),
(7, 2, '1 rue des tulipes', 'Gennevilliers \r\n', 92230),
(8, 3, '1 rue des tulipes', 'Anthony Jouhaux\r\n', 31673),
(9, 2, '1 rue des tulipes', 'Argenteuil\r\n', 73518),
(10, 2, '1 rue des tulipes', 'Sarcelles\r\n', 76391),
(11, 3, '1 rue des tulipes', 'Avenue du Parc\r\n', 98251),
(12, 2, '1 rue des tulipes', 'Hors CY', 32983),
(13, 2, '1 rue des tulipes', 'Pau\r\n', 12345),
(14, 3, '1 rue des tulipes', 'EPSS\r\n', 54321),
(15, 2, '1 rue des tulipes', 'ILEPS\r\n', 19234);

-- --------------------------------------------------------

--
-- Structure de la table `mcc`
--

CREATE TABLE `mcc` (
  `id` int(11) NOT NULL,
  `parcours_id` int(11) DEFAULT NULL,
  `departement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `annee` datetime DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_diplome` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `niveau_id` int(11) DEFAULT NULL,
  `mention_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `mcc`
--

INSERT INTO `mcc` (`id`, `parcours_id`, `departement`, `site`, `annee`, `contact`, `type_diplome`, `niveau_id`, `mention_id`) VALUES
(1, 1, 'Génie biologique\r\n', 'Pontoise', '2021-03-25 00:00:00', 'lp-baaebce@ml.u-cergy.fr\r\n', 'licence', 3, 5),
(2, 2, 'Informatique', 'Champs sur marne', '2021-03-23 18:38:07', 'contact', 'ingénieur', 5, 7);

-- --------------------------------------------------------

--
-- Structure de la table `mention`
--

CREATE TABLE `mention` (
  `id` int(11) NOT NULL,
  `libelle_mention` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domaine_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `mention`
--

INSERT INTO `mention` (`id`, `libelle_mention`, `domaine_id`) VALUES
(1, 'DROIT\r\n\r\n', 1),
(2, 'LICENCE INTÉGRÉE FRANCO-ALLEMANDE EN DROIT\r\n', 1),
(3, 'LANGUES ÉTRANGÈRES APPLIQUÉES\r\n', 4),
(4, 'LANGUES, LITTÉRATURES ET CIVILISATIONS ÉTRANGÈRES ET RÉGIONALES\r\n', 4),
(5, 'GÉOGRAPHIE ET AMÉNAGEMENT\r\n', 3),
(6, 'HISTOIRE\r\n', 3),
(7, 'MATHÉMATIQUES\r\n', 2),
(8, 'INFORMATIQUE\r\n', 2);

-- --------------------------------------------------------

--
-- Structure de la table `nb_groupe_type_cours`
--

CREATE TABLE `nb_groupe_type_cours` (
  `id` int(11) NOT NULL,
  `nb_groupe_type_cours_has_cours_id` int(11) DEFAULT NULL,
  `cm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `td` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `autre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `nb_groupe_type_cours`
--

INSERT INTO `nb_groupe_type_cours` (`id`, `nb_groupe_type_cours_has_cours_id`, `cm`, `tp`, `td`, `autre`) VALUES
(1, 1, '2', '2', '2', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `nb_groupe_type_cours_has_cours`
--

CREATE TABLE `nb_groupe_type_cours_has_cours` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `nb_groupe_type_cours_has_cours`
--

INSERT INTO `nb_groupe_type_cours_has_cours` (`id`) VALUES
(1);

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE `niveau` (
  `id` int(11) NOT NULL,
  `libelle_niveau` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `niveau`
--

INSERT INTO `niveau` (`id`, `libelle_niveau`) VALUES
(1, 'L1'),
(2, 'L2'),
(3, 'L3'),
(4, 'M1'),
(5, 'M2'),
(6, 'DUT 1\r\n'),
(7, 'DUT 2');

-- --------------------------------------------------------

--
-- Structure de la table `parcours`
--

CREATE TABLE `parcours` (
  `id` int(11) NOT NULL,
  `formation_id` int(11) DEFAULT NULL,
  `structure_prolongee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `structure_basse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commentaire` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `libelle_parcours` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `libelle_parcours_apogee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_vet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `annu_ou_semest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `parcours`
--

INSERT INTO `parcours` (`id`, `formation_id`, `structure_prolongee`, `structure_basse`, `contact`, `commentaire`, `created_at`, `updated_at`, `libelle_parcours`, `libelle_parcours_apogee`, `second_vet`, `annu_ou_semest`) VALUES
(1, 2, 'structure prolongée', 'structure basse', 'lp-baaebce@ml.u-cergy.fr', 'commentaire', '2021-03-25 00:00:00', NULL, 'biologie de la cellule eucaryote\r\n', 'parcours apogée', 'second vet', 'annee_ou_semest'),
(2, 3, 'prolongée', 'basse', 'contact@laurentlebg.fr', 'encore un commentaire', '2021-03-29 18:37:03', NULL, 'LPDW', 'AP05EE', 'vet', '3');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `libelle_role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `libelle_role`) VALUES
(2, 'User'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Structure de la table `roles_user`
--

CREATE TABLE `roles_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `roles_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles_user`
--

INSERT INTO `roles_user` (`id`, `user_id`, `roles_id`) VALUES
(2, 2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `semestre`
--

CREATE TABLE `semestre` (
  `id` int(11) NOT NULL,
  `parcours_id` int(11) DEFAULT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_semestre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `semestre`
--

INSERT INTO `semestre` (`id`, `parcours_id`, `libelle`, `code_semestre`) VALUES
(1, 1, 'libellé structure prolongée', 'b122');

-- --------------------------------------------------------

--
-- Structure de la table `session_unique`
--

CREATE TABLE `session_unique` (
  `id` int(11) NOT NULL,
  `session_unique_has_type_controle_id` int(11) DEFAULT NULL,
  `type_controle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_epreuve` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regle_calcul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `session_unique`
--

INSERT INTO `session_unique` (`id`, `session_unique_has_type_controle_id`, `type_controle`, `type_epreuve`, `regle_calcul`, `session`) VALUES
(1, 1, 'type_controle', 'epreuve', 'calcul', 'session');

-- --------------------------------------------------------

--
-- Structure de la table `session_unique_has_type_controle`
--

CREATE TABLE `session_unique_has_type_controle` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `session_unique_has_type_controle`
--

INSERT INTO `session_unique_has_type_controle` (`id`) VALUES
(1);

-- --------------------------------------------------------

--
-- Structure de la table `type_controle`
--

CREATE TABLE `type_controle` (
  `id` int(11) NOT NULL,
  `cours_id` int(11) DEFAULT NULL,
  `session_unique_has_type_controle_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_controle`
--

INSERT INTO `type_controle` (`id`, `cours_id`, `session_unique_has_type_controle_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `type_diplome`
--

CREATE TABLE `type_diplome` (
  `id` int(11) NOT NULL,
  `formation_id` int(11) DEFAULT NULL,
  `type_diplome_has_diplome_etablissement_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_diplome`
--

INSERT INTO `type_diplome` (`id`, `formation_id`, `type_diplome_has_diplome_etablissement_id`) VALUES
(1, 2, 7);

-- --------------------------------------------------------

--
-- Structure de la table `type_diplome_has_diplome_etablissement`
--

CREATE TABLE `type_diplome_has_diplome_etablissement` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_diplome_has_diplome_etablissement`
--

INSERT INTO `type_diplome_has_diplome_etablissement` (`id`) VALUES
(1),
(2),
(3),
(4),
(5),
(6),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16);

-- --------------------------------------------------------

--
-- Structure de la table `ue`
--

CREATE TABLE `ue` (
  `id` int(11) NOT NULL,
  `m_cc_id` int(11) DEFAULT NULL,
  `libelle_ue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ue`
--

INSERT INTO `ue` (`id`, `m_cc_id`, `libelle_ue`) VALUES
(1, 1, 'UE3');

-- --------------------------------------------------------

--
-- Structure de la table `ue_cours`
--

CREATE TABLE `ue_cours` (
  `ue_id` int(11) NOT NULL,
  `cours_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ue_cours`
--

INSERT INTO `ue_cours` (`ue_id`, `cours_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `workflow_id` int(11) DEFAULT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adjoint` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actif` int(11) DEFAULT NULL,
  `adjoint2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adjoint3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `workflow_id`, `nom`, `prenom`, `mail`, `adjoint`, `actif`, `adjoint2`, `adjoint3`) VALUES
(2, NULL, 'Ricard', 'Laurent', 'lebg@lpdw.fr', 'JLB', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `workflow`
--

CREATE TABLE `workflow` (
  `id` int(11) NOT NULL,
  `intitule` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_creation` datetime DEFAULT NULL,
  `date_de_fin` datetime DEFAULT NULL,
  `date_limite` datetime DEFAULT NULL,
  `cree_par` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `competences`
--
ALTER TABLE `competences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_DB2077CE469ACDE3` (`session_unique_has_type_controle_id`);

--
-- Index pour la table `composante`
--
ALTER TABLE `composante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D8E84C85200282E` (`formation_id`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_FDCA8C9C20CE246` (`nb_groupe_type_cours_has_cours_id`);

--
-- Index pour la table `cout_hetd`
--
ALTER TABLE `cout_hetd`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_AF8E3C0D20CE246` (`nb_groupe_type_cours_has_cours_id`);

--
-- Index pour la table `diplome_etablissement`
--
ALTER TABLE `diplome_etablissement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CE539434A6FFED1C` (`type_diplome_has_diplome_etablissement_id`);

--
-- Index pour la table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Index pour la table `domaine`
--
ALTER TABLE `domaine`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etape`
--
ALTER TABLE `etape`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_285F75DD2C7C2CBA` (`workflow_id`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_404021BF2C7C2CBA` (`workflow_id`),
  ADD KEY `IDX_404021BF7A4147F0` (`mention_id`);

--
-- Index pour la table `formation_non_diplomante`
--
ALTER TABLE `formation_non_diplomante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A5DD3F92A6FFED1C` (`type_diplome_has_diplome_etablissement_id`);

--
-- Index pour la table `horaire_type_cours`
--
ALTER TABLE `horaire_type_cours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_323D2DFA20CE246` (`nb_groupe_type_cours_has_cours_id`);

--
-- Index pour la table `localisation`
--
ALTER TABLE `localisation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_BFD3CE8F5200282E` (`formation_id`);

--
-- Index pour la table `mcc`
--
ALTER TABLE `mcc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_252589E76E38C0DB` (`parcours_id`),
  ADD KEY `IDX_252589E7B3E9C81` (`niveau_id`),
  ADD KEY `IDX_252589E77A4147F0` (`mention_id`);

--
-- Index pour la table `mention`
--
ALTER TABLE `mention`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E20259CD4272FC9F` (`domaine_id`);

--
-- Index pour la table `nb_groupe_type_cours`
--
ALTER TABLE `nb_groupe_type_cours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C684FF2020CE246` (`nb_groupe_type_cours_has_cours_id`);

--
-- Index pour la table `nb_groupe_type_cours_has_cours`
--
ALTER TABLE `nb_groupe_type_cours_has_cours`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `niveau`
--
ALTER TABLE `niveau`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `parcours`
--
ALTER TABLE `parcours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_99B1DEE35200282E` (`formation_id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles_user`
--
ALTER TABLE `roles_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_57048B30A76ED395` (`user_id`),
  ADD KEY `IDX_57048B3038C751C4` (`roles_id`);

--
-- Index pour la table `semestre`
--
ALTER TABLE `semestre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_71688FBC6E38C0DB` (`parcours_id`);

--
-- Index pour la table `session_unique`
--
ALTER TABLE `session_unique`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_DFC95C2E469ACDE3` (`session_unique_has_type_controle_id`);

--
-- Index pour la table `session_unique_has_type_controle`
--
ALTER TABLE `session_unique_has_type_controle`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_controle`
--
ALTER TABLE `type_controle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C3C61E927ECF78B0` (`cours_id`),
  ADD KEY `IDX_C3C61E92469ACDE3` (`session_unique_has_type_controle_id`);

--
-- Index pour la table `type_diplome`
--
ALTER TABLE `type_diplome`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_C36D22BB5200282E` (`formation_id`),
  ADD KEY `IDX_C36D22BBA6FFED1C` (`type_diplome_has_diplome_etablissement_id`);

--
-- Index pour la table `type_diplome_has_diplome_etablissement`
--
ALTER TABLE `type_diplome_has_diplome_etablissement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ue`
--
ALTER TABLE `ue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_2E490A9BE4D4012B` (`m_cc_id`);

--
-- Index pour la table `ue_cours`
--
ALTER TABLE `ue_cours`
  ADD PRIMARY KEY (`ue_id`,`cours_id`),
  ADD KEY `IDX_9E2CE27C62E883B1` (`ue_id`),
  ADD KEY `IDX_9E2CE27C7ECF78B0` (`cours_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_8D93D6492C7C2CBA` (`workflow_id`);

--
-- Index pour la table `workflow`
--
ALTER TABLE `workflow`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `competences`
--
ALTER TABLE `competences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `composante`
--
ALTER TABLE `composante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `cout_hetd`
--
ALTER TABLE `cout_hetd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `diplome_etablissement`
--
ALTER TABLE `diplome_etablissement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `domaine`
--
ALTER TABLE `domaine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `etape`
--
ALTER TABLE `etape`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `formation_non_diplomante`
--
ALTER TABLE `formation_non_diplomante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `horaire_type_cours`
--
ALTER TABLE `horaire_type_cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `localisation`
--
ALTER TABLE `localisation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `mcc`
--
ALTER TABLE `mcc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `mention`
--
ALTER TABLE `mention`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `nb_groupe_type_cours`
--
ALTER TABLE `nb_groupe_type_cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `nb_groupe_type_cours_has_cours`
--
ALTER TABLE `nb_groupe_type_cours_has_cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `niveau`
--
ALTER TABLE `niveau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `parcours`
--
ALTER TABLE `parcours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `roles_user`
--
ALTER TABLE `roles_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `semestre`
--
ALTER TABLE `semestre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `session_unique`
--
ALTER TABLE `session_unique`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `session_unique_has_type_controle`
--
ALTER TABLE `session_unique_has_type_controle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `type_controle`
--
ALTER TABLE `type_controle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `type_diplome`
--
ALTER TABLE `type_diplome`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `type_diplome_has_diplome_etablissement`
--
ALTER TABLE `type_diplome_has_diplome_etablissement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `ue`
--
ALTER TABLE `ue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `workflow`
--
ALTER TABLE `workflow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `competences`
--
ALTER TABLE `competences`
  ADD CONSTRAINT `FK_DB2077CE469ACDE3` FOREIGN KEY (`session_unique_has_type_controle_id`) REFERENCES `session_unique_has_type_controle` (`id`);

--
-- Contraintes pour la table `composante`
--
ALTER TABLE `composante`
  ADD CONSTRAINT `FK_D8E84C85200282E` FOREIGN KEY (`formation_id`) REFERENCES `formation` (`id`);

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `FK_FDCA8C9C20CE246` FOREIGN KEY (`nb_groupe_type_cours_has_cours_id`) REFERENCES `nb_groupe_type_cours_has_cours` (`id`);

--
-- Contraintes pour la table `cout_hetd`
--
ALTER TABLE `cout_hetd`
  ADD CONSTRAINT `FK_AF8E3C0D20CE246` FOREIGN KEY (`nb_groupe_type_cours_has_cours_id`) REFERENCES `nb_groupe_type_cours_has_cours` (`id`);

--
-- Contraintes pour la table `diplome_etablissement`
--
ALTER TABLE `diplome_etablissement`
  ADD CONSTRAINT `FK_CE539434A6FFED1C` FOREIGN KEY (`type_diplome_has_diplome_etablissement_id`) REFERENCES `type_diplome_has_diplome_etablissement` (`id`);

--
-- Contraintes pour la table `etape`
--
ALTER TABLE `etape`
  ADD CONSTRAINT `FK_285F75DD2C7C2CBA` FOREIGN KEY (`workflow_id`) REFERENCES `workflow` (`id`);

--
-- Contraintes pour la table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `FK_404021BF2C7C2CBA` FOREIGN KEY (`workflow_id`) REFERENCES `workflow` (`id`),
  ADD CONSTRAINT `FK_404021BF7A4147F0` FOREIGN KEY (`mention_id`) REFERENCES `mention` (`id`);

--
-- Contraintes pour la table `formation_non_diplomante`
--
ALTER TABLE `formation_non_diplomante`
  ADD CONSTRAINT `FK_A5DD3F92A6FFED1C` FOREIGN KEY (`type_diplome_has_diplome_etablissement_id`) REFERENCES `type_diplome_has_diplome_etablissement` (`id`);

--
-- Contraintes pour la table `horaire_type_cours`
--
ALTER TABLE `horaire_type_cours`
  ADD CONSTRAINT `FK_323D2DFA20CE246` FOREIGN KEY (`nb_groupe_type_cours_has_cours_id`) REFERENCES `nb_groupe_type_cours_has_cours` (`id`);

--
-- Contraintes pour la table `localisation`
--
ALTER TABLE `localisation`
  ADD CONSTRAINT `FK_BFD3CE8F5200282E` FOREIGN KEY (`formation_id`) REFERENCES `formation` (`id`);

--
-- Contraintes pour la table `mcc`
--
ALTER TABLE `mcc`
  ADD CONSTRAINT `FK_252589E76E38C0DB` FOREIGN KEY (`parcours_id`) REFERENCES `parcours` (`id`),
  ADD CONSTRAINT `FK_252589E77A4147F0` FOREIGN KEY (`mention_id`) REFERENCES `mention` (`id`),
  ADD CONSTRAINT `FK_252589E7B3E9C81` FOREIGN KEY (`niveau_id`) REFERENCES `niveau` (`id`);

--
-- Contraintes pour la table `mention`
--
ALTER TABLE `mention`
  ADD CONSTRAINT `FK_E20259CD4272FC9F` FOREIGN KEY (`domaine_id`) REFERENCES `domaine` (`id`);

--
-- Contraintes pour la table `nb_groupe_type_cours`
--
ALTER TABLE `nb_groupe_type_cours`
  ADD CONSTRAINT `FK_C684FF2020CE246` FOREIGN KEY (`nb_groupe_type_cours_has_cours_id`) REFERENCES `nb_groupe_type_cours_has_cours` (`id`);

--
-- Contraintes pour la table `parcours`
--
ALTER TABLE `parcours`
  ADD CONSTRAINT `FK_99B1DEE35200282E` FOREIGN KEY (`formation_id`) REFERENCES `formation` (`id`);

--
-- Contraintes pour la table `roles_user`
--
ALTER TABLE `roles_user`
  ADD CONSTRAINT `FK_57048B3038C751C4` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `FK_57048B30A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `semestre`
--
ALTER TABLE `semestre`
  ADD CONSTRAINT `FK_71688FBC6E38C0DB` FOREIGN KEY (`parcours_id`) REFERENCES `parcours` (`id`);

--
-- Contraintes pour la table `session_unique`
--
ALTER TABLE `session_unique`
  ADD CONSTRAINT `FK_DFC95C2E469ACDE3` FOREIGN KEY (`session_unique_has_type_controle_id`) REFERENCES `session_unique_has_type_controle` (`id`);

--
-- Contraintes pour la table `type_controle`
--
ALTER TABLE `type_controle`
  ADD CONSTRAINT `FK_C3C61E92469ACDE3` FOREIGN KEY (`session_unique_has_type_controle_id`) REFERENCES `session_unique_has_type_controle` (`id`),
  ADD CONSTRAINT `FK_C3C61E927ECF78B0` FOREIGN KEY (`cours_id`) REFERENCES `cours` (`id`);

--
-- Contraintes pour la table `type_diplome`
--
ALTER TABLE `type_diplome`
  ADD CONSTRAINT `FK_C36D22BB5200282E` FOREIGN KEY (`formation_id`) REFERENCES `formation` (`id`),
  ADD CONSTRAINT `FK_C36D22BBA6FFED1C` FOREIGN KEY (`type_diplome_has_diplome_etablissement_id`) REFERENCES `type_diplome_has_diplome_etablissement` (`id`);

--
-- Contraintes pour la table `ue`
--
ALTER TABLE `ue`
  ADD CONSTRAINT `FK_2E490A9BE4D4012B` FOREIGN KEY (`m_cc_id`) REFERENCES `mcc` (`id`);

--
-- Contraintes pour la table `ue_cours`
--
ALTER TABLE `ue_cours`
  ADD CONSTRAINT `FK_9E2CE27C62E883B1` FOREIGN KEY (`ue_id`) REFERENCES `ue` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_9E2CE27C7ECF78B0` FOREIGN KEY (`cours_id`) REFERENCES `cours` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_8D93D6492C7C2CBA` FOREIGN KEY (`workflow_id`) REFERENCES `workflow` (`id`);
