-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 06, 2021 at 04:57 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `api_cy`
--

-- --------------------------------------------------------

--
-- Table structure for table `caracteristiques`
--

CREATE TABLE `caracteristiques` (
  `id` int(11) NOT NULL,
  `type_diplome_id` int(11) DEFAULT NULL,
  `complement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `caracteristiques`
--

INSERT INTO `caracteristiques` (`id`, `type_diplome_id`, `complement`, `statut`) VALUES
(1, 1, 'BU', 'National');

-- --------------------------------------------------------

--
-- Table structure for table `caracteristiques_niveau`
--

CREATE TABLE `caracteristiques_niveau` (
  `caracteristiques_id` int(11) NOT NULL,
  `niveau_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `caracteristiques_niveau`
--

INSERT INTO `caracteristiques_niveau` (`caracteristiques_id`, `niveau_id`) VALUES
(1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `competences`
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
-- Dumping data for table `competences`
--

INSERT INTO `competences` (`id`, `blocs`, `seuil_blocs`, `ect`, `coeff`, `seuil`) VALUES
(1, '6', '10', '5', '3', '5'),
(2, '', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `composante`
--

CREATE TABLE `composante` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `composante`
--

INSERT INTO `composante` (`id`, `libelle`) VALUES
(10, 'Autre'),
(1, 'CY Tech'),
(7, 'EPSS (École pratique des sciences sociales)'),
(8, 'ILEPS (École supérieure des métiers du sport  et de l’enseignement)'),
(6, 'INSPE (Instit national supérieur du professorat et de l\'éducation)'),
(2, 'Institut d\'Économie et de gestion'),
(3, 'Institut des Sciences et techniques'),
(9, 'IUT (Institut universitaire de technologie)'),
(4, 'UFR Langues et études internationales'),
(5, 'UFR Lettres et sciences humaines');

-- --------------------------------------------------------

--
-- Table structure for table `composante_user`
--

CREATE TABLE `composante_user` (
  `composante_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `composante_user`
--

INSERT INTO `composante_user` (`composante_id`, `user_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `controle_connaissances`
--

CREATE TABLE `controle_connaissances` (
  `id` int(11) NOT NULL,
  `cours_id` int(11) DEFAULT NULL,
  `competences_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `controle_connaissances`
--

INSERT INTO `controle_connaissances` (`id`, `cours_id`, `competences_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `controle_connaissances_session_unique`
--

CREATE TABLE `controle_connaissances_session_unique` (
  `controle_connaissances_id` int(11) NOT NULL,
  `session_unique_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `controle_connaissances_session_unique`
--

INSERT INTO `controle_connaissances_session_unique` (`controle_connaissances_id`, `session_unique_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cours`
--

CREATE TABLE `cours` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_apogee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cours`
--

INSERT INTO `cours` (`id`, `libelle`, `code_apogee`) VALUES
(1, 'Histoire, civilisations, patrimoine et archéologie des mondes anciens - Séminaire de recherche et début d\'un travail de recherche inédit', '1C04A1'),
(2, 'Outils et méthodologie', '1C05A1');

-- --------------------------------------------------------

--
-- Table structure for table `cout_hetd`
--

CREATE TABLE `cout_hetd` (
  `id` int(11) NOT NULL,
  `cout_cm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cout_tp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cout_td` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cout_hetdcol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cout_hetd`
--

INSERT INTO `cout_hetd` (`id`, `cout_cm`, `cout_tp`, `cout_td`, `cout_hetdcol`) VALUES
(1, '36', '0', '0', '3'),
(2, '30', '1', '2', '5');

-- --------------------------------------------------------

--
-- Table structure for table `creationformation`
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
-- Dumping data for table `creationformation`
--

INSERT INTO `creationformation` (`id`, `formation_id`, `modalite_formation_id`, `modalite_pedagogique_id`, `modalite_recrutement_id`, `niveau_requis`, `nb_etudiants`, `date_ouverture`, `organisation`, `competences`, `motivation`, `points_spe`, `public`, `insertion_pro`, `concurrence`, `partenaires_historique`, `diversification_peda`, `service_diversification`, `mutualisation`, `recherche`, `equipements`, `strategie`, `actions`) VALUES
(1, 1, 3, 4, 1, 'BAC +2', '25', '2021-05-06 18:33:15', 'Mutualisation des parcours types', 'Il faut savoir coder', 'Motivation du projet, le but est de former des développeurs full-stacks', 'Non', 'Venez comme vous êtes', 'Direct', 'Aucune', '2 ans', 'Oui ils vont apprendre l\'anglais', 1, '20 heures au max, s\'ils sont sages', 'Recherche informatique', 'MacBook Pro M1 2021', 'Formation des futurs développeurs web', 'Sur le web');

-- --------------------------------------------------------

--
-- Table structure for table `creationformation_partenaire`
--

CREATE TABLE `creationformation_partenaire` (
  `creationformation_id` int(11) NOT NULL,
  `partenaire_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `creationformation_partenaire`
--

INSERT INTO `creationformation_partenaire` (`creationformation_id`, `partenaire_id`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `domaine`
--

CREATE TABLE `domaine` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `domaine`
--

INSERT INTO `domaine` (`id`, `libelle`) VALUES
(1, 'Droit, Économie, Gestion'),
(2, 'Sciences, Technologies, Santé'),
(3, 'Sciences Humaines et Sociales'),
(4, 'Arts, Lettres, Langues');

-- --------------------------------------------------------

--
-- Table structure for table `etape`
--

CREATE TABLE `etape` (
  `id` int(11) NOT NULL,
  `workflow_id` int(11) DEFAULT NULL,
  `intitule` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_validation` datetime DEFAULT NULL,
  `date_limite` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `etape`
--

INSERT INTO `etape` (`id`, `workflow_id`, `intitule`, `statut`, `date_validation`, `date_limite`) VALUES
(1, 1, 'Envoie du dossier', 'En cours', NULL, '2021-05-06 18:35:51'),
(2, 1, 'Validation du dossier', 'En attente', NULL, '2021-05-06 18:35:51');

-- --------------------------------------------------------

--
-- Table structure for table `formation`
--

CREATE TABLE `formation` (
  `id` int(11) NOT NULL,
  `localisation_id` int(11) DEFAULT NULL,
  `type_diplome_id` int(11) DEFAULT NULL,
  `domaine_id` int(11) DEFAULT NULL,
  `mention_id` int(11) DEFAULT NULL,
  `niveau_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `composante_id` int(11) DEFAULT NULL,
  `structure_haute` int(11) DEFAULT NULL,
  `code_diplome` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ecole_doctorale` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commentaire` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `vdi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statut` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `formation`
--

INSERT INTO `formation` (`id`, `localisation_id`, `type_diplome_id`, `domaine_id`, `mention_id`, `niveau_id`, `user_id`, `composante_id`, `structure_haute`, `code_diplome`, `ecole_doctorale`, `commentaire`, `created_at`, `updated_at`, `vdi`, `libelle`, `statut`) VALUES
(1, 6, 9, 2, NULL, 3, 1, 1, 1, '1C07B4', NULL, 'lebg@lpdw.fr', '2021-05-06 18:36:27', NULL, 'VDI', '\'Licence Pro développement web', 'National');

-- --------------------------------------------------------

--
-- Table structure for table `horaire_type_cours`
--

CREATE TABLE `horaire_type_cours` (
  `id` int(11) NOT NULL,
  `horaire_cm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `horaire_tp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `horaire_td` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `horaire_autre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `horaire_type_cours`
--

INSERT INTO `horaire_type_cours` (`id`, `horaire_cm`, `horaire_tp`, `horaire_td`, `horaire_autre`) VALUES
(1, '30', '30', '30', '15');

-- --------------------------------------------------------

--
-- Table structure for table `localisation`
--

CREATE TABLE `localisation` (
  `id` int(11) NOT NULL,
  `adresse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ville` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_postal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `localisation`
--

INSERT INTO `localisation` (`id`, `adresse`, `ville`, `code_postal`) VALUES
(1, 'a', 'Les Chênes', 10700),
(2, 'b', 'Neuville-sur-Oise', 95000),
(3, 'c', 'Saint-Martin', 54450),
(4, 'd', 'Bernard Hirsch', 95000),
(5, 'e', 'Saint-Germain-en-Laye', 78100),
(6, 'f', 'Gennevilliers', 92230),
(7, 'g', 'Anthony Jouhaux', 31673),
(8, 'h', 'Argenteuil', 73518),
(9, 'i', 'Sarcelles', 76391),
(10, 'j', 'Avenue du Parc', 98251),
(15, 'k', 'Hors CY', 32983);

-- --------------------------------------------------------

--
-- Table structure for table `mcc`
--

CREATE TABLE `mcc` (
  `id` int(11) NOT NULL,
  `parcours_id` int(11) DEFAULT NULL,
  `mention_id` int(11) DEFAULT NULL,
  `formation_id` int(11) DEFAULT NULL,
  `departement` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `annee` datetime NOT NULL,
  `statut` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `niveau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mcc`
--

INSERT INTO `mcc` (`id`, `parcours_id`, `mention_id`, `formation_id`, `departement`, `annee`, `statut`, `niveau`) VALUES
(1, 1, NULL, 1, 'CY Tech LPDW', '2021-05-06 18:41:28', 'Active', 'L3');

-- --------------------------------------------------------

--
-- Table structure for table `mcc_ue`
--

CREATE TABLE `mcc_ue` (
  `mcc_id` int(11) NOT NULL,
  `ue_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mcc_ue`
--

INSERT INTO `mcc_ue` (`mcc_id`, `ue_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `mention`
--

CREATE TABLE `mention` (
  `id` int(11) NOT NULL,
  `domaine_id` int(11) DEFAULT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mention`
--

INSERT INTO `mention` (`id`, `domaine_id`, `libelle`) VALUES
(1, 4, 'LICENCE INTÉGRÉE FRANCO-ALLEMANDE EN DROIT'),
(2, 4, 'LANGUES ÉTRANGÈRES APPLIQUÉES'),
(3, 3, 'GÉOGRAPHIE ET AMÉNAGEMENT'),
(4, 2, 'MATHÉMATIQUES'),
(5, 2, 'INFORMATIQUE');

-- --------------------------------------------------------

--
-- Table structure for table `modalite_formation`
--

CREATE TABLE `modalite_formation` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modalite_formation`
--

INSERT INTO `modalite_formation` (`id`, `libelle`) VALUES
(2, 'Formation continue'),
(3, 'Formation en alternance (apprentissage)'),
(4, 'Formation en alternance (professionnalisation)'),
(1, 'Formation initiale');

-- --------------------------------------------------------

--
-- Table structure for table `modalite_pedagogique`
--

CREATE TABLE `modalite_pedagogique` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modalite_pedagogique`
--

INSERT INTO `modalite_pedagogique` (`id`, `libelle`) VALUES
(4, 'Comodal'),
(2, 'Distanciel'),
(3, 'Hybride'),
(1, 'Présentiel');

-- --------------------------------------------------------

--
-- Table structure for table `modalite_recrutement`
--

CREATE TABLE `modalite_recrutement` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `modalite_recrutement`
--

INSERT INTO `modalite_recrutement` (`id`, `libelle`) VALUES
(2, 'Entretien de sélection'),
(1, 'Étude de dossier'),
(3, 'Examen d\'entrée');

-- --------------------------------------------------------

--
-- Table structure for table `nb_groupe_type_cours`
--

CREATE TABLE `nb_groupe_type_cours` (
  `id` int(11) NOT NULL,
  `cm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `td` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `autre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nb_groupe_type_cours`
--

INSERT INTO `nb_groupe_type_cours` (`id`, `cm`, `tp`, `td`, `autre`) VALUES
(1, '1', '4', '2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nb_groupe_type_cours_has_cours`
--

CREATE TABLE `nb_groupe_type_cours_has_cours` (
  `id` int(11) NOT NULL,
  `horaire_type_cours_id` int(11) DEFAULT NULL,
  `cours_id` int(11) DEFAULT NULL,
  `cout_hetd_id` int(11) DEFAULT NULL,
  `nb_groupe_type_cours_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nb_groupe_type_cours_has_cours`
--

INSERT INTO `nb_groupe_type_cours_has_cours` (`id`, `horaire_type_cours_id`, `cours_id`, `cout_hetd_id`, `nb_groupe_type_cours_id`) VALUES
(1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `niveau`
--

CREATE TABLE `niveau` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `niveau`
--

INSERT INTO `niveau` (`id`, `libelle`) VALUES
(1, 'L1'),
(2, 'L2'),
(3, 'L3'),
(4, 'M1'),
(5, 'M2'),
(6, 'DUT 1'),
(7, 'DUT 2');

-- --------------------------------------------------------

--
-- Table structure for table `parcours`
--

CREATE TABLE `parcours` (
  `id` int(11) NOT NULL,
  `formation_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `structure_prolongee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `structure_basse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commentaire` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `libelle_parcours_apogee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `second_vet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `annuel` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parcours`
--

INSERT INTO `parcours` (`id`, `formation_id`, `user_id`, `libelle`, `structure_prolongee`, `structure_basse`, `commentaire`, `created_at`, `updated_at`, `libelle_parcours_apogee`, `second_vet`, `annuel`) VALUES
(1, 1, 1, 'IOT', 'Oui', 'IOT', NULL, '2021-05-06 18:45:50', NULL, '2W03A3', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `partenaire`
--

CREATE TABLE `partenaire` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partenaire`
--

INSERT INTO `partenaire` (`id`, `libelle`) VALUES
(1, 'Association'),
(2, 'CFA');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `libelle`) VALUES
(3, 'Admin'),
(2, 'Directeur de composante'),
(5, 'Professeur'),
(1, 'Responsable de formation'),
(4, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `semestre`
--

CREATE TABLE `semestre` (
  `id` int(11) NOT NULL,
  `parcours_id` int(11) DEFAULT NULL,
  `mention_id` int(11) DEFAULT NULL,
  `formation_id` int(11) DEFAULT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_semestre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semestre`
--

INSERT INTO `semestre` (`id`, `parcours_id`, `mention_id`, `formation_id`, `libelle`, `code_semestre`) VALUES
(1, 1, NULL, 1, 'LPDW parcours IOT', 'C2W03A33');

-- --------------------------------------------------------

--
-- Table structure for table `session_unique`
--

CREATE TABLE `session_unique` (
  `id` int(11) NOT NULL,
  `type_epreuve` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `regle_calcul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `session_unique`
--

INSERT INTO `session_unique` (`id`, `type_epreuve`, `regle_calcul`, `session`) VALUES
(1, 'Oral', '100%', 'Première');

-- --------------------------------------------------------

--
-- Table structure for table `type_diplome`
--

CREATE TABLE `type_diplome` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_diplome`
--

INSERT INTO `type_diplome` (`id`, `libelle`) VALUES
(1, 'Diplome d\'établissement'),
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
(14, 'Diplome Science Po'),
(15, 'Formation non diplomante'),
(16, 'Certificat'),
(17, 'DAEU'),
(18, 'DEUST');

-- --------------------------------------------------------

--
-- Table structure for table `type_diplome_mention`
--

CREATE TABLE `type_diplome_mention` (
  `type_diplome_id` int(11) NOT NULL,
  `mention_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_diplome_mention`
--

INSERT INTO `type_diplome_mention` (`type_diplome_id`, `mention_id`) VALUES
(11, 1),
(11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `ue`
--

CREATE TABLE `ue` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ue`
--

INSERT INTO `ue` (`id`, `libelle`) VALUES
(1, 'UE1 Séminaire principal'),
(2, 'UE2 Séminaire complémentaire'),
(3, 'UE3 Outils de formation'),
(4, 'UE4 Langues vivantes');

-- --------------------------------------------------------

--
-- Table structure for table `ue_cours`
--

CREATE TABLE `ue_cours` (
  `ue_id` int(11) NOT NULL,
  `cours_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ue_cours`
--

INSERT INTO `ue_cours` (`ue_id`, `cours_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` int(11) DEFAULT NULL,
  `adjoint` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actif` int(11) DEFAULT NULL,
  `adjoint2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adjoint3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `mail`, `telephone`, `adjoint`, `actif`, `adjoint2`, `adjoint3`) VALUES
(1, 'Ricard', 'Laurent', 'lebg@mail.com', 989009, 'JLB', 1, NULL, NULL),
(2, 'Michaud', 'François', 'francois@docker.fr', 7898, 'Laurent Ricard', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` int(11) NOT NULL,
  `roles_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`user_id`, `roles_id`) VALUES
(1, 1),
(2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `workflow`
--

CREATE TABLE `workflow` (
  `id` int(11) NOT NULL,
  `intitule` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_creation` datetime NOT NULL,
  `date_de_fin` datetime DEFAULT NULL,
  `date_limite` datetime NOT NULL,
  `cree_par` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `statut` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workflow`
--

INSERT INTO `workflow` (`id`, `intitule`, `date_creation`, `date_de_fin`, `date_limite`, `cree_par`, `statut`) VALUES
(1, 'Création formation', '2021-05-06 18:52:18', NULL, '2021-05-06 18:52:18', 'Laurent Ricard', 'En cours');

-- --------------------------------------------------------

--
-- Table structure for table `workflow_user`
--

CREATE TABLE `workflow_user` (
  `workflow_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `workflow_user`
--

INSERT INTO `workflow_user` (`workflow_id`, `user_id`) VALUES
(1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `caracteristiques`
--
ALTER TABLE `caracteristiques`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_61B5DA1D3BFB8FC7` (`type_diplome_id`);

--
-- Indexes for table `caracteristiques_niveau`
--
ALTER TABLE `caracteristiques_niveau`
  ADD PRIMARY KEY (`caracteristiques_id`,`niveau_id`),
  ADD KEY `IDX_5CFDC1ADB2639FE4` (`caracteristiques_id`),
  ADD KEY `IDX_5CFDC1ADB3E9C81` (`niveau_id`);

--
-- Indexes for table `competences`
--
ALTER TABLE `competences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `composante`
--
ALTER TABLE `composante`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_D8E84C8A4D60759` (`libelle`);

--
-- Indexes for table `composante_user`
--
ALTER TABLE `composante_user`
  ADD PRIMARY KEY (`composante_id`,`user_id`),
  ADD KEY `IDX_35ED6CE3AC12F1AD` (`composante_id`),
  ADD KEY `IDX_35ED6CE3A76ED395` (`user_id`);

--
-- Indexes for table `controle_connaissances`
--
ALTER TABLE `controle_connaissances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A83D5F3B7ECF78B0` (`cours_id`),
  ADD KEY `IDX_A83D5F3BA660B158` (`competences_id`);

--
-- Indexes for table `controle_connaissances_session_unique`
--
ALTER TABLE `controle_connaissances_session_unique`
  ADD PRIMARY KEY (`controle_connaissances_id`,`session_unique_id`),
  ADD KEY `IDX_5ED336522B34C263` (`controle_connaissances_id`),
  ADD KEY `IDX_5ED33652A024C649` (`session_unique_id`);

--
-- Indexes for table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cout_hetd`
--
ALTER TABLE `cout_hetd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `creationformation`
--
ALTER TABLE `creationformation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_B4C0DDDD5200282E` (`formation_id`),
  ADD KEY `IDX_B4C0DDDDD2ACA42A` (`modalite_formation_id`),
  ADD KEY `IDX_B4C0DDDD2316CC3` (`modalite_pedagogique_id`),
  ADD KEY `IDX_B4C0DDDD7CA59BD8` (`modalite_recrutement_id`);

--
-- Indexes for table `creationformation_partenaire`
--
ALTER TABLE `creationformation_partenaire`
  ADD PRIMARY KEY (`creationformation_id`,`partenaire_id`),
  ADD KEY `IDX_D5EB295B4CE21A05` (`creationformation_id`),
  ADD KEY `IDX_D5EB295B98DE13AC` (`partenaire_id`);

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `domaine`
--
ALTER TABLE `domaine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `etape`
--
ALTER TABLE `etape`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_285F75DD2C7C2CBA` (`workflow_id`);

--
-- Indexes for table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_404021BFC68BE09C` (`localisation_id`),
  ADD KEY `IDX_404021BF3BFB8FC7` (`type_diplome_id`),
  ADD KEY `IDX_404021BF4272FC9F` (`domaine_id`),
  ADD KEY `IDX_404021BF7A4147F0` (`mention_id`),
  ADD KEY `IDX_404021BFB3E9C81` (`niveau_id`),
  ADD KEY `IDX_404021BFA76ED395` (`user_id`),
  ADD KEY `IDX_404021BFAC12F1AD` (`composante_id`);

--
-- Indexes for table `horaire_type_cours`
--
ALTER TABLE `horaire_type_cours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `localisation`
--
ALTER TABLE `localisation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_BFD3CE8FC35F0816` (`adresse`);

--
-- Indexes for table `mcc`
--
ALTER TABLE `mcc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_252589E76E38C0DB` (`parcours_id`),
  ADD KEY `IDX_252589E77A4147F0` (`mention_id`),
  ADD KEY `IDX_252589E75200282E` (`formation_id`);

--
-- Indexes for table `mcc_ue`
--
ALTER TABLE `mcc_ue`
  ADD PRIMARY KEY (`mcc_id`,`ue_id`),
  ADD KEY `IDX_FAD999BE6BA9F475` (`mcc_id`),
  ADD KEY `IDX_FAD999BE62E883B1` (`ue_id`);

--
-- Indexes for table `mention`
--
ALTER TABLE `mention`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E20259CD4272FC9F` (`domaine_id`);

--
-- Indexes for table `modalite_formation`
--
ALTER TABLE `modalite_formation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_177E55B1A4D60759` (`libelle`);

--
-- Indexes for table `modalite_pedagogique`
--
ALTER TABLE `modalite_pedagogique`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_96625500A4D60759` (`libelle`);

--
-- Indexes for table `modalite_recrutement`
--
ALTER TABLE `modalite_recrutement`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_EC00EC8CA4D60759` (`libelle`);

--
-- Indexes for table `nb_groupe_type_cours`
--
ALTER TABLE `nb_groupe_type_cours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nb_groupe_type_cours_has_cours`
--
ALTER TABLE `nb_groupe_type_cours_has_cours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_35711335A65025FA` (`horaire_type_cours_id`),
  ADD KEY `IDX_357113357ECF78B0` (`cours_id`),
  ADD KEY `IDX_35711335176A8114` (`cout_hetd_id`),
  ADD KEY `IDX_3571133527FD395D` (`nb_groupe_type_cours_id`);

--
-- Indexes for table `niveau`
--
ALTER TABLE `niveau`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parcours`
--
ALTER TABLE `parcours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_99B1DEE35200282E` (`formation_id`),
  ADD KEY `IDX_99B1DEE3A76ED395` (`user_id`);

--
-- Indexes for table `partenaire`
--
ALTER TABLE `partenaire`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_32FFA373A4D60759` (`libelle`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_B63E2EC7A4D60759` (`libelle`);

--
-- Indexes for table `semestre`
--
ALTER TABLE `semestre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_71688FBC6E38C0DB` (`parcours_id`),
  ADD KEY `IDX_71688FBC7A4147F0` (`mention_id`),
  ADD KEY `IDX_71688FBC5200282E` (`formation_id`);

--
-- Indexes for table `session_unique`
--
ALTER TABLE `session_unique`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_diplome`
--
ALTER TABLE `type_diplome`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_diplome_mention`
--
ALTER TABLE `type_diplome_mention`
  ADD PRIMARY KEY (`type_diplome_id`,`mention_id`),
  ADD KEY `IDX_5F2BD47B3BFB8FC7` (`type_diplome_id`),
  ADD KEY `IDX_5F2BD47B7A4147F0` (`mention_id`);

--
-- Indexes for table `ue`
--
ALTER TABLE `ue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ue_cours`
--
ALTER TABLE `ue_cours`
  ADD PRIMARY KEY (`ue_id`,`cours_id`),
  ADD KEY `IDX_9E2CE27C62E883B1` (`ue_id`),
  ADD KEY `IDX_9E2CE27C7ECF78B0` (`cours_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D6495126AC48` (`mail`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`roles_id`),
  ADD KEY `IDX_54FCD59FA76ED395` (`user_id`),
  ADD KEY `IDX_54FCD59F38C751C4` (`roles_id`);

--
-- Indexes for table `workflow`
--
ALTER TABLE `workflow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workflow_user`
--
ALTER TABLE `workflow_user`
  ADD PRIMARY KEY (`workflow_id`,`user_id`),
  ADD KEY `IDX_C80CC6722C7C2CBA` (`workflow_id`),
  ADD KEY `IDX_C80CC672A76ED395` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `caracteristiques`
--
ALTER TABLE `caracteristiques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `competences`
--
ALTER TABLE `competences`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `composante`
--
ALTER TABLE `composante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `controle_connaissances`
--
ALTER TABLE `controle_connaissances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cours`
--
ALTER TABLE `cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cout_hetd`
--
ALTER TABLE `cout_hetd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `creationformation`
--
ALTER TABLE `creationformation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `domaine`
--
ALTER TABLE `domaine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `etape`
--
ALTER TABLE `etape`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `formation`
--
ALTER TABLE `formation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `horaire_type_cours`
--
ALTER TABLE `horaire_type_cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `localisation`
--
ALTER TABLE `localisation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `mcc`
--
ALTER TABLE `mcc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mention`
--
ALTER TABLE `mention`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `modalite_formation`
--
ALTER TABLE `modalite_formation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `modalite_pedagogique`
--
ALTER TABLE `modalite_pedagogique`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `modalite_recrutement`
--
ALTER TABLE `modalite_recrutement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nb_groupe_type_cours`
--
ALTER TABLE `nb_groupe_type_cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nb_groupe_type_cours_has_cours`
--
ALTER TABLE `nb_groupe_type_cours_has_cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `niveau`
--
ALTER TABLE `niveau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `parcours`
--
ALTER TABLE `parcours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `partenaire`
--
ALTER TABLE `partenaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `semestre`
--
ALTER TABLE `semestre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `session_unique`
--
ALTER TABLE `session_unique`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `type_diplome`
--
ALTER TABLE `type_diplome`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ue`
--
ALTER TABLE `ue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `workflow`
--
ALTER TABLE `workflow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `caracteristiques`
--
ALTER TABLE `caracteristiques`
  ADD CONSTRAINT `FK_61B5DA1D3BFB8FC7` FOREIGN KEY (`type_diplome_id`) REFERENCES `type_diplome` (`id`);

--
-- Constraints for table `caracteristiques_niveau`
--
ALTER TABLE `caracteristiques_niveau`
  ADD CONSTRAINT `FK_5CFDC1ADB2639FE4` FOREIGN KEY (`caracteristiques_id`) REFERENCES `caracteristiques` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_5CFDC1ADB3E9C81` FOREIGN KEY (`niveau_id`) REFERENCES `niveau` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `composante_user`
--
ALTER TABLE `composante_user`
  ADD CONSTRAINT `FK_35ED6CE3A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_35ED6CE3AC12F1AD` FOREIGN KEY (`composante_id`) REFERENCES `composante` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `controle_connaissances`
--
ALTER TABLE `controle_connaissances`
  ADD CONSTRAINT `FK_A83D5F3B7ECF78B0` FOREIGN KEY (`cours_id`) REFERENCES `cours` (`id`),
  ADD CONSTRAINT `FK_A83D5F3BA660B158` FOREIGN KEY (`competences_id`) REFERENCES `competences` (`id`);

--
-- Constraints for table `controle_connaissances_session_unique`
--
ALTER TABLE `controle_connaissances_session_unique`
  ADD CONSTRAINT `FK_5ED336522B34C263` FOREIGN KEY (`controle_connaissances_id`) REFERENCES `controle_connaissances` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_5ED33652A024C649` FOREIGN KEY (`session_unique_id`) REFERENCES `session_unique` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `creationformation`
--
ALTER TABLE `creationformation`
  ADD CONSTRAINT `FK_B4C0DDDD2316CC3` FOREIGN KEY (`modalite_pedagogique_id`) REFERENCES `modalite_pedagogique` (`id`),
  ADD CONSTRAINT `FK_B4C0DDDD5200282E` FOREIGN KEY (`formation_id`) REFERENCES `formation` (`id`),
  ADD CONSTRAINT `FK_B4C0DDDD7CA59BD8` FOREIGN KEY (`modalite_recrutement_id`) REFERENCES `modalite_recrutement` (`id`),
  ADD CONSTRAINT `FK_B4C0DDDDD2ACA42A` FOREIGN KEY (`modalite_formation_id`) REFERENCES `modalite_formation` (`id`);

--
-- Constraints for table `creationformation_partenaire`
--
ALTER TABLE `creationformation_partenaire`
  ADD CONSTRAINT `FK_D5EB295B4CE21A05` FOREIGN KEY (`creationformation_id`) REFERENCES `creationformation` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_D5EB295B98DE13AC` FOREIGN KEY (`partenaire_id`) REFERENCES `partenaire` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `etape`
--
ALTER TABLE `etape`
  ADD CONSTRAINT `FK_285F75DD2C7C2CBA` FOREIGN KEY (`workflow_id`) REFERENCES `workflow` (`id`);

--
-- Constraints for table `formation`
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
-- Constraints for table `mcc`
--
ALTER TABLE `mcc`
  ADD CONSTRAINT `FK_252589E75200282E` FOREIGN KEY (`formation_id`) REFERENCES `formation` (`id`),
  ADD CONSTRAINT `FK_252589E76E38C0DB` FOREIGN KEY (`parcours_id`) REFERENCES `parcours` (`id`),
  ADD CONSTRAINT `FK_252589E77A4147F0` FOREIGN KEY (`mention_id`) REFERENCES `mention` (`id`);

--
-- Constraints for table `mcc_ue`
--
ALTER TABLE `mcc_ue`
  ADD CONSTRAINT `FK_FAD999BE62E883B1` FOREIGN KEY (`ue_id`) REFERENCES `ue` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_FAD999BE6BA9F475` FOREIGN KEY (`mcc_id`) REFERENCES `mcc` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mention`
--
ALTER TABLE `mention`
  ADD CONSTRAINT `FK_E20259CD4272FC9F` FOREIGN KEY (`domaine_id`) REFERENCES `domaine` (`id`);

--
-- Constraints for table `nb_groupe_type_cours_has_cours`
--
ALTER TABLE `nb_groupe_type_cours_has_cours`
  ADD CONSTRAINT `FK_35711335176A8114` FOREIGN KEY (`cout_hetd_id`) REFERENCES `cout_hetd` (`id`),
  ADD CONSTRAINT `FK_3571133527FD395D` FOREIGN KEY (`nb_groupe_type_cours_id`) REFERENCES `nb_groupe_type_cours` (`id`),
  ADD CONSTRAINT `FK_357113357ECF78B0` FOREIGN KEY (`cours_id`) REFERENCES `cours` (`id`),
  ADD CONSTRAINT `FK_35711335A65025FA` FOREIGN KEY (`horaire_type_cours_id`) REFERENCES `horaire_type_cours` (`id`);

--
-- Constraints for table `parcours`
--
ALTER TABLE `parcours`
  ADD CONSTRAINT `FK_99B1DEE35200282E` FOREIGN KEY (`formation_id`) REFERENCES `formation` (`id`),
  ADD CONSTRAINT `FK_99B1DEE3A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `semestre`
--
ALTER TABLE `semestre`
  ADD CONSTRAINT `FK_71688FBC5200282E` FOREIGN KEY (`formation_id`) REFERENCES `formation` (`id`),
  ADD CONSTRAINT `FK_71688FBC6E38C0DB` FOREIGN KEY (`parcours_id`) REFERENCES `parcours` (`id`),
  ADD CONSTRAINT `FK_71688FBC7A4147F0` FOREIGN KEY (`mention_id`) REFERENCES `mention` (`id`);

--
-- Constraints for table `type_diplome_mention`
--
ALTER TABLE `type_diplome_mention`
  ADD CONSTRAINT `FK_5F2BD47B3BFB8FC7` FOREIGN KEY (`type_diplome_id`) REFERENCES `type_diplome` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_5F2BD47B7A4147F0` FOREIGN KEY (`mention_id`) REFERENCES `mention` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ue_cours`
--
ALTER TABLE `ue_cours`
  ADD CONSTRAINT `FK_9E2CE27C62E883B1` FOREIGN KEY (`ue_id`) REFERENCES `ue` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_9E2CE27C7ECF78B0` FOREIGN KEY (`cours_id`) REFERENCES `cours` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `FK_54FCD59F38C751C4` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_54FCD59FA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `workflow_user`
--
ALTER TABLE `workflow_user`
  ADD CONSTRAINT `FK_C80CC6722C7C2CBA` FOREIGN KEY (`workflow_id`) REFERENCES `workflow` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_C80CC672A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
