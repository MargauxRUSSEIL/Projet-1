-- MySQL dump 10.13  Distrib 8.0.22, for Linux (x86_64)
--
-- Host: localhost    Database: data_cy
-- ------------------------------------------------------
-- Server version	8.0.22

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Competences`
--

DROP TABLE IF EXISTS `Competences`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Competences` (
  `blocs` varchar(45) NOT NULL,
  `seuilBlocs` varchar(45) DEFAULT NULL,
  `ECT` varchar(45) DEFAULT NULL,
  `COEFF` varchar(45) DEFAULT NULL,
  `seuil` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`blocs`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Competences`
--

LOCK TABLES `Competences` WRITE;
/*!40000 ALTER TABLE `Competences` DISABLE KEYS */;
/*!40000 ALTER TABLE `Competences` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Cours`
--

DROP TABLE IF EXISTS `Cours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Cours` (
  `idCours` int NOT NULL,
  `libelleCours` varchar(45) DEFAULT NULL,
  `codeAPOGEE` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCours`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Cours`
--

LOCK TABLES `Cours` WRITE;
/*!40000 ALTER TABLE `Cours` DISABLE KEYS */;
/*!40000 ALTER TABLE `Cours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Diplome`
--

DROP TABLE IF EXISTS `Diplome`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Diplome` (
  `idDiplome` int NOT NULL,
  `composante` varchar(45) DEFAULT NULL,
  `domaine` varchar(45) DEFAULT NULL,
  `mention` varchar(45) DEFAULT NULL,
  `structureHaute` varchar(45) DEFAULT NULL,
  `typeFormation` varchar(45) DEFAULT NULL,
  `parcours` varchar(45) DEFAULT NULL,
  `codeDiplome` varchar(45) DEFAULT NULL,
  `ecoleDoctorale` varchar(45) DEFAULT NULL,
  `contact` varchar(45) DEFAULT NULL,
  `commentaire` varchar(45) DEFAULT NULL,
  `dateCreation` datetime DEFAULT NULL,
  `dateModification` datetime DEFAULT NULL,
  `Formation_idFormation` int NOT NULL,
  PRIMARY KEY (`idDiplome`),
  KEY `fk_Diplome_Formation_idx` (`Formation_idFormation`),
  CONSTRAINT `fk_Diplome_Formation` FOREIGN KEY (`Formation_idFormation`) REFERENCES `Formation` (`idFormation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Diplome`
--

LOCK TABLES `Diplome` WRITE;
/*!40000 ALTER TABLE `Diplome` DISABLE KEYS */;
/*!40000 ALTER TABLE `Diplome` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Formation`
--

DROP TABLE IF EXISTS `Formation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Formation` (
  `idFormation` int NOT NULL,
  `localisation` varchar(45) DEFAULT NULL,
  `parcours` varchar(45) DEFAULT NULL,
  `structureProlonge` int DEFAULT NULL,
  `structureBasse` tinyint(1) DEFAULT NULL,
  `contact` varchar(45) DEFAULT NULL,
  `commentaire` varchar(45) DEFAULT NULL,
  `dateCreation` datetime DEFAULT NULL,
  `dateModification` datetime DEFAULT NULL,
  `Semestre_idSemestre` int NOT NULL,
  PRIMARY KEY (`idFormation`),
  KEY `fk_Formation_Semestre1_idx` (`Semestre_idSemestre`),
  CONSTRAINT `fk_Formation_Semestre1` FOREIGN KEY (`Semestre_idSemestre`) REFERENCES `Semestre` (`idSemestre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Formation`
--

LOCK TABLES `Formation` WRITE;
/*!40000 ALTER TABLE `Formation` DISABLE KEYS */;
/*!40000 ALTER TABLE `Formation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MCC`
--

DROP TABLE IF EXISTS `MCC`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `MCC` (
  `idMCC` int NOT NULL,
  `departement` varchar(45) DEFAULT NULL,
  `site` varchar(45) DEFAULT NULL,
  `typeDiplome` varchar(45) DEFAULT NULL,
  `mention` varchar(45) DEFAULT NULL,
  `parcours` varchar(45) DEFAULT NULL,
  `annee` date DEFAULT NULL,
  `niveau` varchar(45) DEFAULT NULL,
  `contact` varchar(45) DEFAULT NULL,
  `UE_idUE` int NOT NULL,
  `Type_Controle_idType_Controle` int NOT NULL,
  PRIMARY KEY (`idMCC`,`UE_idUE`,`Type_Controle_idType_Controle`),
  KEY `fk_MCC_UE1_idx` (`UE_idUE`),
  KEY `fk_MCC_Type_Controle1_idx` (`Type_Controle_idType_Controle`),
  CONSTRAINT `fk_MCC_Type_Controle1` FOREIGN KEY (`Type_Controle_idType_Controle`) REFERENCES `Type_Controle` (`idType_Controle`),
  CONSTRAINT `fk_MCC_UE1` FOREIGN KEY (`UE_idUE`) REFERENCES `UE` (`idUE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MCC`
--

LOCK TABLES `MCC` WRITE;
/*!40000 ALTER TABLE `MCC` DISABLE KEYS */;
/*!40000 ALTER TABLE `MCC` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Semestre`
--

DROP TABLE IF EXISTS `Semestre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Semestre` (
  `idSemestre` int NOT NULL,
  `libelle` varchar(45) DEFAULT NULL,
  `codeSemestre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idSemestre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Semestre`
--

LOCK TABLES `Semestre` WRITE;
/*!40000 ALTER TABLE `Semestre` DISABLE KEYS */;
/*!40000 ALTER TABLE `Semestre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SessionUnique`
--

DROP TABLE IF EXISTS `SessionUnique`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `SessionUnique` (
  `idSessionUnique` int NOT NULL,
  `typeControle` varchar(45) DEFAULT NULL,
  `typeEpreuve` varchar(45) DEFAULT NULL,
  `regleCalcul` varchar(45) DEFAULT NULL,
  `session` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idSessionUnique`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SessionUnique`
--

LOCK TABLES `SessionUnique` WRITE;
/*!40000 ALTER TABLE `SessionUnique` DISABLE KEYS */;
/*!40000 ALTER TABLE `SessionUnique` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SessionUnique_has_Type_Controle`
--

DROP TABLE IF EXISTS `SessionUnique_has_Type_Controle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `SessionUnique_has_Type_Controle` (
  `SessionUnique_idSessionUnique` int NOT NULL,
  `Type_Controle_idType_Controle` int NOT NULL,
  `Competences_blocs` varchar(45) NOT NULL,
  PRIMARY KEY (`SessionUnique_idSessionUnique`,`Type_Controle_idType_Controle`,`Competences_blocs`),
  KEY `fk_SessionUnique_has_Type_Controle_Type_Controle1_idx` (`Type_Controle_idType_Controle`),
  KEY `fk_SessionUnique_has_Type_Controle_SessionUnique1_idx` (`SessionUnique_idSessionUnique`),
  KEY `fk_SessionUnique_has_Type_Controle_Competences1_idx` (`Competences_blocs`),
  CONSTRAINT `fk_SessionUnique_has_Type_Controle_Competences1` FOREIGN KEY (`Competences_blocs`) REFERENCES `Competences` (`blocs`),
  CONSTRAINT `fk_SessionUnique_has_Type_Controle_SessionUnique1` FOREIGN KEY (`SessionUnique_idSessionUnique`) REFERENCES `SessionUnique` (`idSessionUnique`),
  CONSTRAINT `fk_SessionUnique_has_Type_Controle_Type_Controle1` FOREIGN KEY (`Type_Controle_idType_Controle`) REFERENCES `Type_Controle` (`idType_Controle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SessionUnique_has_Type_Controle`
--

LOCK TABLES `SessionUnique_has_Type_Controle` WRITE;
/*!40000 ALTER TABLE `SessionUnique_has_Type_Controle` DISABLE KEYS */;
/*!40000 ALTER TABLE `SessionUnique_has_Type_Controle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Type_Controle`
--

DROP TABLE IF EXISTS `Type_Controle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Type_Controle` (
  `idType_Controle` int NOT NULL,
  PRIMARY KEY (`idType_Controle`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Type_Controle`
--

LOCK TABLES `Type_Controle` WRITE;
/*!40000 ALTER TABLE `Type_Controle` DISABLE KEYS */;
/*!40000 ALTER TABLE `Type_Controle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `UE`
--

DROP TABLE IF EXISTS `UE`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `UE` (
  `idUE` int NOT NULL,
  `libelleUE` varchar(45) DEFAULT NULL,
  `Cours_idCours` int NOT NULL,
  PRIMARY KEY (`idUE`,`Cours_idCours`),
  KEY `fk_UE_Cours1_idx` (`Cours_idCours`),
  CONSTRAINT `fk_UE_Cours1` FOREIGN KEY (`Cours_idCours`) REFERENCES `Cours` (`idCours`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `UE`
--

LOCK TABLES `UE` WRITE;
/*!40000 ALTER TABLE `UE` DISABLE KEYS */;
/*!40000 ALTER TABLE `UE` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coutHETD`
--

DROP TABLE IF EXISTS `coutHETD`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coutHETD` (
  `coutCM` int NOT NULL,
  `coutTP` varchar(45) DEFAULT NULL,
  `coutTD` varchar(45) DEFAULT NULL,
  `coutHETDcol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`coutCM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coutHETD`
--

LOCK TABLES `coutHETD` WRITE;
/*!40000 ALTER TABLE `coutHETD` DISABLE KEYS */;
/*!40000 ALTER TABLE `coutHETD` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horaireTypeCours`
--

DROP TABLE IF EXISTS `horaireTypeCours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `horaireTypeCours` (
  `horaireCM` int NOT NULL,
  `horaireTP` varchar(45) DEFAULT NULL,
  `horaireTD` varchar(45) DEFAULT NULL,
  `horaireAutre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`horaireCM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horaireTypeCours`
--

LOCK TABLES `horaireTypeCours` WRITE;
/*!40000 ALTER TABLE `horaireTypeCours` DISABLE KEYS */;
/*!40000 ALTER TABLE `horaireTypeCours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nbGroupeTypeCours`
--

DROP TABLE IF EXISTS `nbGroupeTypeCours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nbGroupeTypeCours` (
  `CM` int NOT NULL,
  `TP` varchar(45) DEFAULT NULL,
  `TD` varchar(45) DEFAULT NULL,
  `autre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`CM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nbGroupeTypeCours`
--

LOCK TABLES `nbGroupeTypeCours` WRITE;
/*!40000 ALTER TABLE `nbGroupeTypeCours` DISABLE KEYS */;
/*!40000 ALTER TABLE `nbGroupeTypeCours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nbGroupeTypeCours_has_Cours`
--

DROP TABLE IF EXISTS `nbGroupeTypeCours_has_Cours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nbGroupeTypeCours_has_Cours` (
  `nbGroupeTypeCours_CM` int NOT NULL,
  `Cours_idCours` int NOT NULL,
  `coutHETD_coutCM` int NOT NULL,
  `horaireTypeCours_horaireCM` int NOT NULL,
  PRIMARY KEY (`nbGroupeTypeCours_CM`,`Cours_idCours`,`coutHETD_coutCM`,`horaireTypeCours_horaireCM`),
  KEY `fk_nbGroupeTypeCours_has_Cours_Cours1_idx` (`Cours_idCours`),
  KEY `fk_nbGroupeTypeCours_has_Cours_nbGroupeTypeCours1_idx` (`nbGroupeTypeCours_CM`),
  KEY `fk_nbGroupeTypeCours_has_Cours_coutHETD1_idx` (`coutHETD_coutCM`),
  KEY `fk_nbGroupeTypeCours_has_Cours_horaireTypeCours1_idx` (`horaireTypeCours_horaireCM`),
  CONSTRAINT `fk_nbGroupeTypeCours_has_Cours_Cours1` FOREIGN KEY (`Cours_idCours`) REFERENCES `Cours` (`idCours`),
  CONSTRAINT `fk_nbGroupeTypeCours_has_Cours_coutHETD1` FOREIGN KEY (`coutHETD_coutCM`) REFERENCES `coutHETD` (`coutCM`),
  CONSTRAINT `fk_nbGroupeTypeCours_has_Cours_horaireTypeCours1` FOREIGN KEY (`horaireTypeCours_horaireCM`) REFERENCES `horaireTypeCours` (`horaireCM`),
  CONSTRAINT `fk_nbGroupeTypeCours_has_Cours_nbGroupeTypeCours1` FOREIGN KEY (`nbGroupeTypeCours_CM`) REFERENCES `nbGroupeTypeCours` (`CM`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nbGroupeTypeCours_has_Cours`
--

LOCK TABLES `nbGroupeTypeCours_has_Cours` WRITE;
/*!40000 ALTER TABLE `nbGroupeTypeCours_has_Cours` DISABLE KEYS */;
/*!40000 ALTER TABLE `nbGroupeTypeCours_has_Cours` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-01-28 21:18:03
