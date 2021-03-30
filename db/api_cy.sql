-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mar. 30 mars 2021 à 12:58
-- Version du serveur :  5.7.30
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données : `api_cy`
--

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

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `roles_user`
--
ALTER TABLE `roles_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_57048B30A76ED395` (`user_id`),
  ADD KEY `IDX_57048B3038C751C4` (`roles_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `roles_user`
--
ALTER TABLE `roles_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `roles_user`
--
ALTER TABLE `roles_user`
  ADD CONSTRAINT `FK_57048B3038C751C4` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `FK_57048B30A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
