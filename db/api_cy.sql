-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : ven. 23 avr. 2021 à 14:31
-- Version du serveur :  5.7.30
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données : `api_cy`
--

-- --------------------------------------------------------

--
-- Structure de la table `caracteristiques`
--

CREATE TABLE `caracteristiques` (
  `id` int(11) NOT NULL,
  `type_diplome_id` int(11) DEFAULT NULL,
  `complement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `caracteristiques`
--

INSERT INTO `caracteristiques` (`id`, `type_diplome_id`, `complement`, `statut`) VALUES
(1, 1, 'BU', 'National');

-- --------------------------------------------------------

--
-- Structure de la table `caracteristiques_niveau`
--

CREATE TABLE `caracteristiques_niveau` (
  `caracteristiques_id` int(11) NOT NULL,
  `niveau_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `caracteristiques_niveau`
--

INSERT INTO `caracteristiques_niveau` (`caracteristiques_id`, `niveau_id`) VALUES
(1, 7);

-- --------------------------------------------------------

--
-- Structure de la table `competences`
--

CREATE TABLE `competences` (
  `id` int(11) NOT NULL,
  `blocs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seuil_blocs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ect` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coeff` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seuil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `competences`
--

INSERT INTO `competences` (`id`, `blocs`, `seuil_blocs`, `ect`, `coeff`, `seuil`) VALUES
(1, '6', '10', '5', '3', '5'),
(2, '5', '5', '5', '5', '5');

-- --------------------------------------------------------

--
-- Structure de la table `composante`
--

CREATE TABLE `composante` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `composante`
--

INSERT INTO `composante` (`id`, `libelle`) VALUES
(2, 'CY Tech'),
(3, 'UFR Droit'),
(4, 'Institut d\'Économie et de gestion\r\n'),
(5, 'Institut des Sciences et techniques\r\n'),
(6, 'UFR Langues et études internationales\r\n'),
(7, 'UFR Lettres et sciences humaines\r\n'),
(8, 'INSPE (Instit national supérieur du professorat et de l\'éducation'),
(9, 'EPSS (École pratique des sciences sociales)\r\n'),
(10, 'ILEPS (École supérieure des métiers du sport  et de l’enseignement)\r\n'),
(11, 'IUT (Institut universitaire de technologie)\r\n'),
(12, 'Autre');

-- --------------------------------------------------------

--
-- Structure de la table `composante_user`
--

CREATE TABLE `composante_user` (
  `composante_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `composante_user`
--

INSERT INTO `composante_user` (`composante_id`, `user_id`) VALUES
(2, 1),
(11, 2);

-- --------------------------------------------------------

--
-- Structure de la table `controle_connaissance`
--

CREATE TABLE `controle_connaissance` (
  `id` int(11) NOT NULL,
  `cours_id` int(11) DEFAULT NULL,
  `session_unique_has_controle_connaissance_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_apogee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id`, `libelle`, `code_apogee`) VALUES
(1, 'Histoire, civilisations, patrimoine et archéologie des mondes anciens - Séminaire de recherche et début d\'un travail de recherche inédit', '1C04A1'),
(2, 'Outils et méthodologie', '1C05A1');

-- --------------------------------------------------------

--
-- Structure de la table `cout_hetd`
--

CREATE TABLE `cout_hetd` (
  `id` int(11) NOT NULL,
  `cout_cm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cout_tp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cout_td` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cout_hetdcol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cout_hetd`
--

INSERT INTO `cout_hetd` (`id`, `cout_cm`, `cout_tp`, `cout_td`, `cout_hetdcol`) VALUES
(1, '36', '0', '0', '3'),
(2, '30', '2', '1', '5');

-- --------------------------------------------------------

--
-- Structure de la table `creationformation`
--

CREATE TABLE `creationformation` (
  `id` int(11) NOT NULL,
  `formation_id` int(11) DEFAULT NULL,
  `modalite_formation_id` int(11) DEFAULT NULL,
  `modalite_pedagogique_id` int(11) DEFAULT NULL,
  `modalite_recrutement_id` int(11) DEFAULT NULL,
  `niveau_requis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nb_etudiants` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_ouverture` datetime DEFAULT NULL,
  `organisation` longtext COLLATE utf8mb4_unicode_ci,
  `competences` longtext COLLATE utf8mb4_unicode_ci,
  `motivation` longtext COLLATE utf8mb4_unicode_ci,
  `points_spe` longtext COLLATE utf8mb4_unicode_ci,
  `public` longtext COLLATE utf8mb4_unicode_ci,
  `insertion_pro` longtext COLLATE utf8mb4_unicode_ci,
  `concurrence` longtext COLLATE utf8mb4_unicode_ci,
  `partenaires_historique` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diversification_peda` longtext COLLATE utf8mb4_unicode_ci,
  `service_diversification` tinyint(1) DEFAULT NULL,
  `mutualisation` longtext COLLATE utf8mb4_unicode_ci,
  `recherche` longtext COLLATE utf8mb4_unicode_ci,
  `equipements` longtext COLLATE utf8mb4_unicode_ci,
  `strategie` longtext COLLATE utf8mb4_unicode_ci,
  `actions` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `creationformation`
--

INSERT INTO `creationformation` (`id`, `formation_id`, `modalite_formation_id`, `modalite_pedagogique_id`, `modalite_recrutement_id`, `niveau_requis`, `nb_etudiants`, `date_ouverture`, `organisation`, `competences`, `motivation`, `points_spe`, `public`, `insertion_pro`, `concurrence`, `partenaires_historique`, `diversification_peda`, `service_diversification`, `mutualisation`, `recherche`, `equipements`, `strategie`, `actions`) VALUES
(1, 1, 3, 4, 1, 'BAC +2', '25', '2021-09-06 23:02:07', 'Mutualisation des parcours types.', 'Il faut savoir coder.', 'Motivation du projet, le but est de former des développeurs full-stacks. ', 'Négatif', 'Venez comme vous êtes.', 'Direct', 'Aucune', 'Partenaire depuis 2 ans.', 'Oui ils vont apprendre l\'anglais.', 1, '20 heures au max, s\'ils sont sages.', 'Recherche informatique', 'MacBook Pro M1 2021', 'Formation des futurs développeurs web', 'Sur le web. ');

-- --------------------------------------------------------

--
-- Structure de la table `creationformation_partenaire`
--

CREATE TABLE `creationformation_partenaire` (
  `creationformation_id` int(11) NOT NULL,
  `partenaire_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `creationformation_partenaire`
--

INSERT INTO `creationformation_partenaire` (`creationformation_id`, `partenaire_id`) VALUES
(1, 1);

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
('DoctrineMigrations\\Version20210422143134', '2021-04-22 14:31:42', 1913),
('DoctrineMigrations\\Version20210422172156', '2021-04-22 17:22:04', 88),
('DoctrineMigrations\\Version20210422173801', '2021-04-22 17:38:06', 95),
('DoctrineMigrations\\Version20210422185259', '2021-04-22 18:53:06', 538),
('DoctrineMigrations\\Version20210422210048', '2021-04-22 21:00:55', 105),
('DoctrineMigrations\\Version20210423142401', '2021-04-23 14:24:11', 258);

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--

CREATE TABLE `domaine` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `domaine`
--

INSERT INTO `domaine` (`id`, `libelle`) VALUES
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
(1, 1, 'Envoie du dossier', 'En cours', NULL, '2021-06-21 23:08:30'),
(2, 1, 'Validation du dossier', 'En attente', NULL, '2021-06-21 23:08:30');

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `id` int(11) NOT NULL,
  `composante_id` int(11) DEFAULT NULL,
  `localisation_id` int(11) DEFAULT NULL,
  `type_diplome_id` int(11) DEFAULT NULL,
  `domaine_id` int(11) DEFAULT NULL,
  `mention_id` int(11) DEFAULT NULL,
  `niveau_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `structure_haute` int(11) DEFAULT NULL,
  `code_diplome` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ecole_doctorale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commentaire` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `vdi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `formation`
--

INSERT INTO `formation` (`id`, `composante_id`, `localisation_id`, `type_diplome_id`, `domaine_id`, `mention_id`, `niveau_id`, `user_id`, `structure_haute`, `code_diplome`, `ecole_doctorale`, `contact`, `commentaire`, `created_at`, `updated_at`, `vdi`, `libelle`, `statut`) VALUES
(1, 2, 5, 9, 2, 5, 3, 1, 1, '1C07B4', NULL, 'lebg@lpdw.fr', 'C\'est une belle formation.', '2021-04-22 22:55:15', NULL, 'VDI', 'Licence Pro développement web', 'National');

-- --------------------------------------------------------

--
-- Structure de la table `horaire_type_cours`
--

CREATE TABLE `horaire_type_cours` (
  `id` int(11) NOT NULL,
  `horaire_cm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `horaire_tp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `horaire_td` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `horaire_autre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `horaire_type_cours`
--

INSERT INTO `horaire_type_cours` (`id`, `horaire_cm`, `horaire_tp`, `horaire_td`, `horaire_autre`) VALUES
(1, '30', '30', '30', '15');

-- --------------------------------------------------------

--
-- Structure de la table `localisation`
--

CREATE TABLE `localisation` (
  `id` int(11) NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_postal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `localisation`
--

INSERT INTO `localisation` (`id`, `adresse`, `ville`, `code_postal`) VALUES
(2, '1 rue des tulipes', 'Les Chênes \r\n', 10700),
(3, '1 rue des tulipes', 'Neuville-sur-Oise\r\n', 95000),
(4, '1 rue des tulipes', 'Saint-Martin\r\n', 54450),
(5, '1 rue des tulipes', 'Bernard Hirsch\r\n', 95000),
(6, '1 rue des tulipes', 'Saint-Germain-en-Laye\r\n', 78100),
(7, '1 rue des tulipes', 'Gennevilliers \r\n', 92230),
(8, '1 rue des tulipes', 'Anthony Jouhaux\r\n', 31673),
(9, '1 rue des tulipes', 'Argenteuil\r\n', 73518),
(10, '1 rue des tulipes', 'Sarcelles\r\n', 76391),
(11, '1 rue des tulipes', 'Avenue du Parc\r\n', 98251),
(12, '1 rue des tulipes', 'Hors CY', 32983),
(13, '1 rue des tulipes', 'Pau\r\n', 12345),
(14, '1 rue des tulipes', 'EPSS\r\n', 54321),
(15, '1 rue des tulipes', 'ILEPS\r\n', 19234);

-- --------------------------------------------------------

--
-- Structure de la table `mcc`
--

CREATE TABLE `mcc` (
  `id` int(11) NOT NULL,
  `parcours_id` int(11) DEFAULT NULL,
  `mention_id` int(11) DEFAULT NULL,
  `formation_id` int(11) DEFAULT NULL,
  `departement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `annee` datetime DEFAULT NULL,
  `statut` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `niveau` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `mcc`
--

INSERT INTO `mcc` (`id`, `parcours_id`, `mention_id`, `formation_id`, `departement`, `annee`, `statut`, `niveau`) VALUES
(1, 1, 5, 1, 'CY Tech LPDW', '2021-03-23 18:38:07', 'National', 'L3');

-- --------------------------------------------------------

--
-- Structure de la table `mcc_ue`
--

CREATE TABLE `mcc_ue` (
  `mcc_id` int(11) NOT NULL,
  `ue_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `mcc_ue`
--

INSERT INTO `mcc_ue` (`mcc_id`, `ue_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `mention`
--

CREATE TABLE `mention` (
  `id` int(11) NOT NULL,
  `domaine_id` int(11) DEFAULT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `mention`
--

INSERT INTO `mention` (`id`, `domaine_id`, `libelle`) VALUES
(1, 4, 'LICENCE INTÉGRÉE FRANCO-ALLEMANDE EN DROIT'),
(2, 4, 'LANGUES ÉTRANGÈRES APPLIQUÉES'),
(3, 1, 'GÉOGRAPHIE ET AMÉNAGEMENT'),
(4, 3, 'MATHÉMATIQUES'),
(5, 2, 'INFORMATIQUE');

-- --------------------------------------------------------

--
-- Structure de la table `modalite_formation`
--

CREATE TABLE `modalite_formation` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `modalite_formation`
--

INSERT INTO `modalite_formation` (`id`, `libelle`) VALUES
(1, 'Formation initiale'),
(2, 'Formation continue'),
(3, 'Formation en alternance : Contrat d’apprentissage'),
(4, 'Formation en alternance : Contrat de professionnalisation');

-- --------------------------------------------------------

--
-- Structure de la table `modalite_pedagogique`
--

CREATE TABLE `modalite_pedagogique` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `modalite_pedagogique`
--

INSERT INTO `modalite_pedagogique` (`id`, `libelle`) VALUES
(1, 'Présentiel '),
(2, 'Distanciel '),
(3, 'Hybride'),
(4, 'Comodal');

-- --------------------------------------------------------

--
-- Structure de la table `modalite_recrutement`
--

CREATE TABLE `modalite_recrutement` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `modalite_recrutement`
--

INSERT INTO `modalite_recrutement` (`id`, `libelle`) VALUES
(1, 'Étude de dossier'),
(2, 'Entretien de sélection'),
(3, 'Examen d’entrée');

-- --------------------------------------------------------

--
-- Structure de la table `nb_groupe_type_cours`
--

CREATE TABLE `nb_groupe_type_cours` (
  `id` int(11) NOT NULL,
  `cm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `td` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `autre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `nb_groupe_type_cours`
--

INSERT INTO `nb_groupe_type_cours` (`id`, `cm`, `tp`, `td`, `autre`) VALUES
(1, '1', '4', '2', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `nb_groupe_type_cours_has_cours`
--

CREATE TABLE `nb_groupe_type_cours_has_cours` (
  `id` int(11) NOT NULL,
  `horaire_type_cours_id` int(11) DEFAULT NULL,
  `cours_id` int(11) DEFAULT NULL,
  `cout_hetd_id` int(11) DEFAULT NULL,
  `nb_groupe_type_cours_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `nb_groupe_type_cours_has_cours`
--

INSERT INTO `nb_groupe_type_cours_has_cours` (`id`, `horaire_type_cours_id`, `cours_id`, `cout_hetd_id`, `nb_groupe_type_cours_id`) VALUES
(1, 1, 2, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE `niveau` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `niveau`
--

INSERT INTO `niveau` (`id`, `libelle`) VALUES
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
  `user_id` int(11) DEFAULT NULL,
  `structure_prolongee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `structure_basse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commentaire` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `libelle_parcours_apogee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_vet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `annuel` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `parcours`
--

INSERT INTO `parcours` (`id`, `formation_id`, `user_id`, `structure_prolongee`, `structure_basse`, `commentaire`, `created_at`, `updated_at`, `libelle`, `libelle_parcours_apogee`, `second_vet`, `annuel`) VALUES
(1, 1, 2, 'IOT', 'Oui', 'IOT', '2021-04-22 23:10:33', NULL, 'LPDW IOT', '2W03A3', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `partenaire`
--

CREATE TABLE `partenaire` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `partenaire`
--

INSERT INTO `partenaire` (`id`, `libelle`) VALUES
(1, 'Association'),
(2, 'CFA');

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `libelle`) VALUES
(1, 'Responsable de formation'),
(2, 'Directeur de composante'),
(3, 'Admin'),
(4, 'User'),
(5, 'Professeur');

-- --------------------------------------------------------

--
-- Structure de la table `semestre`
--

CREATE TABLE `semestre` (
  `id` int(11) NOT NULL,
  `parcours_id` int(11) DEFAULT NULL,
  `mention_id` int(11) DEFAULT NULL,
  `formation_id` int(11) DEFAULT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_semestre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `semestre`
--

INSERT INTO `semestre` (`id`, `parcours_id`, `mention_id`, `formation_id`, `libelle`, `code_semestre`) VALUES
(1, 1, 5, 1, 'LPDW parcours IOT', 'C2W03A33');

-- --------------------------------------------------------

--
-- Structure de la table `session_unique`
--

CREATE TABLE `session_unique` (
  `id` int(11) NOT NULL,
  `session_unique_has_controle_connaissance_id` int(11) DEFAULT NULL,
  `type_epreuve` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regle_calcul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `session_unique`
--

INSERT INTO `session_unique` (`id`, `session_unique_has_controle_connaissance_id`, `type_epreuve`, `regle_calcul`, `session`) VALUES
(1, 1, 'Oral', '100%', 'Première');

-- --------------------------------------------------------

--
-- Structure de la table `session_unique_has_controle_connaissance`
--

CREATE TABLE `session_unique_has_controle_connaissance` (
  `id` int(11) NOT NULL,
  `competences_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `session_unique_has_controle_connaissance`
--

INSERT INTO `session_unique_has_controle_connaissance` (`id`, `competences_id`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `type_diplome`
--

CREATE TABLE `type_diplome` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_diplome`
--

INSERT INTO `type_diplome` (`id`, `libelle`) VALUES
(1, 'Diplôme d\'établissement'),
(2, 'DEUG'),
(3, 'Licence'),
(4, 'Maitrise'),
(5, 'Master hors MEEF'),
(6, 'Master MEEF'),
(7, 'Doctorat'),
(8, 'HDR'),
(9, 'Licence Pro'),
(10, 'BUT'),
(11, 'DUT'),
(12, 'Pré-ingénieur'),
(13, 'Ingénieur'),
(14, 'Diplôme de Science Po'),
(15, 'Formation non diplômante'),
(16, 'Certificat'),
(17, 'DAEU'),
(18, 'DEUST');

-- --------------------------------------------------------

--
-- Structure de la table `type_diplome_mention`
--

CREATE TABLE `type_diplome_mention` (
  `type_diplome_id` int(11) NOT NULL,
  `mention_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_diplome_mention`
--

INSERT INTO `type_diplome_mention` (`type_diplome_id`, `mention_id`) VALUES
(10, 1),
(10, 5);

-- --------------------------------------------------------

--
-- Structure de la table `ue`
--

CREATE TABLE `ue` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ue`
--

INSERT INTO `ue` (`id`, `libelle`) VALUES
(1, 'UE1 Séminaire principal	'),
(2, 'UE2 Séminaire complémentaire '),
(3, 'UE3 Outils de formation		'),
(4, 'UE4 Langues vivantes		');

-- --------------------------------------------------------

--
-- Structure de la table `ue_cours`
--

CREATE TABLE `ue_cours` (
  `ue_id` int(11) NOT NULL,
  `cours_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
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

INSERT INTO `user` (`id`, `nom`, `prenom`, `mail`, `adjoint`, `actif`, `adjoint2`, `adjoint3`) VALUES
(1, 'Ricard', 'Laurent', 'lebg@lpdw.fr', 'JLB', 1, NULL, NULL),
(2, 'Michaud', 'François', 'francois@docker.fr', 'Laurent Ricard', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` int(11) NOT NULL,
  `roles_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user_roles`
--

INSERT INTO `user_roles` (`user_id`, `roles_id`) VALUES
(1, 1),
(2, 5);

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
-- Déchargement des données de la table `workflow`
--

INSERT INTO `workflow` (`id`, `intitule`, `date_creation`, `date_de_fin`, `date_limite`, `cree_par`, `statut`) VALUES
(1, 'Création formation', '2021-04-22 22:50:16', '2021-04-30 22:50:16', '2021-06-21 22:50:16', 'Laurent Ricard', 'En cours');

-- --------------------------------------------------------

--
-- Structure de la table `workflow_user`
--

CREATE TABLE `workflow_user` (
  `workflow_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `workflow_user`
--

INSERT INTO `workflow_user` (`workflow_id`, `user_id`) VALUES
(1, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `caracteristiques`
--
ALTER TABLE `caracteristiques`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_61B5DA1D3BFB8FC7` (`type_diplome_id`);

--
-- Index pour la table `caracteristiques_niveau`
--
ALTER TABLE `caracteristiques_niveau`
  ADD PRIMARY KEY (`caracteristiques_id`,`niveau_id`),
  ADD KEY `IDX_5CFDC1ADB2639FE4` (`caracteristiques_id`),
  ADD KEY `IDX_5CFDC1ADB3E9C81` (`niveau_id`);

--
-- Index pour la table `competences`
--
ALTER TABLE `competences`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `composante`
--
ALTER TABLE `composante`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `composante_user`
--
ALTER TABLE `composante_user`
  ADD PRIMARY KEY (`composante_id`,`user_id`),
  ADD KEY `IDX_35ED6CE3AC12F1AD` (`composante_id`),
  ADD KEY `IDX_35ED6CE3A76ED395` (`user_id`);

--
-- Index pour la table `controle_connaissance`
--
ALTER TABLE `controle_connaissance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_55EA1EF87ECF78B0` (`cours_id`),
  ADD KEY `IDX_55EA1EF8CCA5EC1C` (`session_unique_has_controle_connaissance_id`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cout_hetd`
--
ALTER TABLE `cout_hetd`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `creationformation`
--
ALTER TABLE `creationformation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_B4C0DDDD5200282E` (`formation_id`),
  ADD KEY `IDX_B4C0DDDDD2ACA42A` (`modalite_formation_id`),
  ADD KEY `IDX_B4C0DDDD2316CC3` (`modalite_pedagogique_id`),
  ADD KEY `IDX_B4C0DDDD7CA59BD8` (`modalite_recrutement_id`);

--
-- Index pour la table `creationformation_partenaire`
--
ALTER TABLE `creationformation_partenaire`
  ADD PRIMARY KEY (`creationformation_id`,`partenaire_id`),
  ADD KEY `IDX_D5EB295B4CE21A05` (`creationformation_id`),
  ADD KEY `IDX_D5EB295B98DE13AC` (`partenaire_id`);

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
  ADD KEY `IDX_404021BFAC12F1AD` (`composante_id`),
  ADD KEY `IDX_404021BFC68BE09C` (`localisation_id`),
  ADD KEY `IDX_404021BF3BFB8FC7` (`type_diplome_id`),
  ADD KEY `IDX_404021BF4272FC9F` (`domaine_id`),
  ADD KEY `IDX_404021BF7A4147F0` (`mention_id`),
  ADD KEY `IDX_404021BFB3E9C81` (`niveau_id`),
  ADD KEY `IDX_404021BFA76ED395` (`user_id`);

--
-- Index pour la table `horaire_type_cours`
--
ALTER TABLE `horaire_type_cours`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `localisation`
--
ALTER TABLE `localisation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mcc`
--
ALTER TABLE `mcc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_252589E76E38C0DB` (`parcours_id`),
  ADD KEY `IDX_252589E77A4147F0` (`mention_id`),
  ADD KEY `IDX_252589E75200282E` (`formation_id`);

--
-- Index pour la table `mcc_ue`
--
ALTER TABLE `mcc_ue`
  ADD PRIMARY KEY (`mcc_id`,`ue_id`),
  ADD KEY `IDX_FAD999BE6BA9F475` (`mcc_id`),
  ADD KEY `IDX_FAD999BE62E883B1` (`ue_id`);

--
-- Index pour la table `mention`
--
ALTER TABLE `mention`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E20259CD4272FC9F` (`domaine_id`);

--
-- Index pour la table `modalite_formation`
--
ALTER TABLE `modalite_formation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `modalite_pedagogique`
--
ALTER TABLE `modalite_pedagogique`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `modalite_recrutement`
--
ALTER TABLE `modalite_recrutement`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `nb_groupe_type_cours`
--
ALTER TABLE `nb_groupe_type_cours`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `nb_groupe_type_cours_has_cours`
--
ALTER TABLE `nb_groupe_type_cours_has_cours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_35711335A65025FA` (`horaire_type_cours_id`),
  ADD KEY `IDX_357113357ECF78B0` (`cours_id`),
  ADD KEY `IDX_35711335176A8114` (`cout_hetd_id`),
  ADD KEY `IDX_3571133527FD395D` (`nb_groupe_type_cours_id`);

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
  ADD KEY `IDX_99B1DEE35200282E` (`formation_id`),
  ADD KEY `IDX_99B1DEE3A76ED395` (`user_id`);

--
-- Index pour la table `partenaire`
--
ALTER TABLE `partenaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `semestre`
--
ALTER TABLE `semestre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_71688FBC6E38C0DB` (`parcours_id`),
  ADD KEY `IDX_71688FBC7A4147F0` (`mention_id`),
  ADD KEY `IDX_71688FBC5200282E` (`formation_id`);

--
-- Index pour la table `session_unique`
--
ALTER TABLE `session_unique`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_DFC95C2ECCA5EC1C` (`session_unique_has_controle_connaissance_id`);

--
-- Index pour la table `session_unique_has_controle_connaissance`
--
ALTER TABLE `session_unique_has_controle_connaissance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_7913F650A660B158` (`competences_id`);

--
-- Index pour la table `type_diplome`
--
ALTER TABLE `type_diplome`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_diplome_mention`
--
ALTER TABLE `type_diplome_mention`
  ADD PRIMARY KEY (`type_diplome_id`,`mention_id`),
  ADD KEY `IDX_5F2BD47B3BFB8FC7` (`type_diplome_id`),
  ADD KEY `IDX_5F2BD47B7A4147F0` (`mention_id`);

--
-- Index pour la table `ue`
--
ALTER TABLE `ue`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`roles_id`),
  ADD KEY `IDX_54FCD59FA76ED395` (`user_id`),
  ADD KEY `IDX_54FCD59F38C751C4` (`roles_id`);

--
-- Index pour la table `workflow`
--
ALTER TABLE `workflow`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `workflow_user`
--
ALTER TABLE `workflow_user`
  ADD PRIMARY KEY (`workflow_id`,`user_id`),
  ADD KEY `IDX_C80CC6722C7C2CBA` (`workflow_id`),
  ADD KEY `IDX_C80CC672A76ED395` (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `caracteristiques`
--
ALTER TABLE `caracteristiques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `competences`
--
ALTER TABLE `competences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `composante`
--
ALTER TABLE `composante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `controle_connaissance`
--
ALTER TABLE `controle_connaissance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `cout_hetd`
--
ALTER TABLE `cout_hetd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `creationformation`
--
ALTER TABLE `creationformation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `domaine`
--
ALTER TABLE `domaine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `etape`
--
ALTER TABLE `etape`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `mention`
--
ALTER TABLE `mention`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `modalite_formation`
--
ALTER TABLE `modalite_formation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `modalite_pedagogique`
--
ALTER TABLE `modalite_pedagogique`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `modalite_recrutement`
--
ALTER TABLE `modalite_recrutement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `partenaire`
--
ALTER TABLE `partenaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT pour la table `session_unique_has_controle_connaissance`
--
ALTER TABLE `session_unique_has_controle_connaissance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `type_diplome`
--
ALTER TABLE `type_diplome`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `ue`
--
ALTER TABLE `ue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `workflow`
--
ALTER TABLE `workflow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `caracteristiques`
--
ALTER TABLE `caracteristiques`
  ADD CONSTRAINT `FK_61B5DA1D3BFB8FC7` FOREIGN KEY (`type_diplome_id`) REFERENCES `type_diplome` (`id`);

--
-- Contraintes pour la table `caracteristiques_niveau`
--
ALTER TABLE `caracteristiques_niveau`
  ADD CONSTRAINT `FK_5CFDC1ADB2639FE4` FOREIGN KEY (`caracteristiques_id`) REFERENCES `caracteristiques` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_5CFDC1ADB3E9C81` FOREIGN KEY (`niveau_id`) REFERENCES `niveau` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `composante_user`
--
ALTER TABLE `composante_user`
  ADD CONSTRAINT `FK_35ED6CE3A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_35ED6CE3AC12F1AD` FOREIGN KEY (`composante_id`) REFERENCES `composante` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `controle_connaissance`
--
ALTER TABLE `controle_connaissance`
  ADD CONSTRAINT `FK_55EA1EF87ECF78B0` FOREIGN KEY (`cours_id`) REFERENCES `cours` (`id`),
  ADD CONSTRAINT `FK_55EA1EF8CCA5EC1C` FOREIGN KEY (`session_unique_has_controle_connaissance_id`) REFERENCES `session_unique_has_controle_connaissance` (`id`);

--
-- Contraintes pour la table `creationformation`
--
ALTER TABLE `creationformation`
  ADD CONSTRAINT `FK_B4C0DDDD2316CC3` FOREIGN KEY (`modalite_pedagogique_id`) REFERENCES `modalite_pedagogique` (`id`),
  ADD CONSTRAINT `FK_B4C0DDDD5200282E` FOREIGN KEY (`formation_id`) REFERENCES `formation` (`id`),
  ADD CONSTRAINT `FK_B4C0DDDD7CA59BD8` FOREIGN KEY (`modalite_recrutement_id`) REFERENCES `modalite_recrutement` (`id`),
  ADD CONSTRAINT `FK_B4C0DDDDD2ACA42A` FOREIGN KEY (`modalite_formation_id`) REFERENCES `modalite_formation` (`id`);

--
-- Contraintes pour la table `creationformation_partenaire`
--
ALTER TABLE `creationformation_partenaire`
  ADD CONSTRAINT `FK_D5EB295B4CE21A05` FOREIGN KEY (`creationformation_id`) REFERENCES `creationformation` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_D5EB295B98DE13AC` FOREIGN KEY (`partenaire_id`) REFERENCES `partenaire` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `etape`
--
ALTER TABLE `etape`
  ADD CONSTRAINT `FK_285F75DD2C7C2CBA` FOREIGN KEY (`workflow_id`) REFERENCES `workflow` (`id`);

--
-- Contraintes pour la table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `FK_404021BF3BFB8FC7` FOREIGN KEY (`type_diplome_id`) REFERENCES `type_diplome` (`id`),
  ADD CONSTRAINT `FK_404021BF4272FC9F` FOREIGN KEY (`domaine_id`) REFERENCES `domaine` (`id`),
  ADD CONSTRAINT `FK_404021BF7A4147F0` FOREIGN KEY (`mention_id`) REFERENCES `mention` (`id`),
  ADD CONSTRAINT `FK_404021BFA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `FK_404021BFAC12F1AD` FOREIGN KEY (`composante_id`) REFERENCES `composante` (`id`),
  ADD CONSTRAINT `FK_404021BFB3E9C81` FOREIGN KEY (`niveau_id`) REFERENCES `niveau` (`id`),
  ADD CONSTRAINT `FK_404021BFC68BE09C` FOREIGN KEY (`localisation_id`) REFERENCES `localisation` (`id`);

--
-- Contraintes pour la table `mcc`
--
ALTER TABLE `mcc`
  ADD CONSTRAINT `FK_252589E75200282E` FOREIGN KEY (`formation_id`) REFERENCES `formation` (`id`),
  ADD CONSTRAINT `FK_252589E76E38C0DB` FOREIGN KEY (`parcours_id`) REFERENCES `parcours` (`id`),
  ADD CONSTRAINT `FK_252589E77A4147F0` FOREIGN KEY (`mention_id`) REFERENCES `mention` (`id`);

--
-- Contraintes pour la table `mcc_ue`
--
ALTER TABLE `mcc_ue`
  ADD CONSTRAINT `FK_FAD999BE62E883B1` FOREIGN KEY (`ue_id`) REFERENCES `ue` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_FAD999BE6BA9F475` FOREIGN KEY (`mcc_id`) REFERENCES `mcc` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `mention`
--
ALTER TABLE `mention`
  ADD CONSTRAINT `FK_E20259CD4272FC9F` FOREIGN KEY (`domaine_id`) REFERENCES `domaine` (`id`);

--
-- Contraintes pour la table `nb_groupe_type_cours_has_cours`
--
ALTER TABLE `nb_groupe_type_cours_has_cours`
  ADD CONSTRAINT `FK_35711335176A8114` FOREIGN KEY (`cout_hetd_id`) REFERENCES `cout_hetd` (`id`),
  ADD CONSTRAINT `FK_3571133527FD395D` FOREIGN KEY (`nb_groupe_type_cours_id`) REFERENCES `nb_groupe_type_cours` (`id`),
  ADD CONSTRAINT `FK_357113357ECF78B0` FOREIGN KEY (`cours_id`) REFERENCES `cours` (`id`),
  ADD CONSTRAINT `FK_35711335A65025FA` FOREIGN KEY (`horaire_type_cours_id`) REFERENCES `horaire_type_cours` (`id`);

--
-- Contraintes pour la table `parcours`
--
ALTER TABLE `parcours`
  ADD CONSTRAINT `FK_99B1DEE35200282E` FOREIGN KEY (`formation_id`) REFERENCES `formation` (`id`),
  ADD CONSTRAINT `FK_99B1DEE3A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `semestre`
--
ALTER TABLE `semestre`
  ADD CONSTRAINT `FK_71688FBC5200282E` FOREIGN KEY (`formation_id`) REFERENCES `formation` (`id`),
  ADD CONSTRAINT `FK_71688FBC6E38C0DB` FOREIGN KEY (`parcours_id`) REFERENCES `parcours` (`id`),
  ADD CONSTRAINT `FK_71688FBC7A4147F0` FOREIGN KEY (`mention_id`) REFERENCES `mention` (`id`);

--
-- Contraintes pour la table `session_unique`
--
ALTER TABLE `session_unique`
  ADD CONSTRAINT `FK_DFC95C2ECCA5EC1C` FOREIGN KEY (`session_unique_has_controle_connaissance_id`) REFERENCES `session_unique_has_controle_connaissance` (`id`);

--
-- Contraintes pour la table `session_unique_has_controle_connaissance`
--
ALTER TABLE `session_unique_has_controle_connaissance`
  ADD CONSTRAINT `FK_7913F650A660B158` FOREIGN KEY (`competences_id`) REFERENCES `competences` (`id`);

--
-- Contraintes pour la table `type_diplome_mention`
--
ALTER TABLE `type_diplome_mention`
  ADD CONSTRAINT `FK_5F2BD47B3BFB8FC7` FOREIGN KEY (`type_diplome_id`) REFERENCES `type_diplome` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_5F2BD47B7A4147F0` FOREIGN KEY (`mention_id`) REFERENCES `mention` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `ue_cours`
--
ALTER TABLE `ue_cours`
  ADD CONSTRAINT `FK_9E2CE27C62E883B1` FOREIGN KEY (`ue_id`) REFERENCES `ue` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_9E2CE27C7ECF78B0` FOREIGN KEY (`cours_id`) REFERENCES `cours` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `FK_54FCD59F38C751C4` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_54FCD59FA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `workflow_user`
--
ALTER TABLE `workflow_user`
  ADD CONSTRAINT `FK_C80CC6722C7C2CBA` FOREIGN KEY (`workflow_id`) REFERENCES `workflow` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_C80CC672A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
