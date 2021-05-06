-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 06, 2021 at 04:10 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `api_cy`
--

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
(5, 'e', 'Saint-Germain-en-Lay', 78100),
(6, 'f', 'Gennevilliers', 92230),
(7, 'g', 'Anthony Jouhaux', 31673),
(8, 'h', 'Argenteuil', 73518),
(9, 'i', 'Sarcelles', 76391),
(10, 'j', 'Avenue du Parc', 98251),
(11, 'k', 'Hors CY', 32983),
(12, 'l', 'Pau', 12345);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `localisation`
--
ALTER TABLE `localisation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `localisation`
--
ALTER TABLE `localisation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
