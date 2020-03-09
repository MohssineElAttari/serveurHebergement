-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 08 Octobre 2019 à 00:42
-- Version du serveur :  10.1.16-MariaDB
-- Version de PHP :  7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `hebergement`
--

-- --------------------------------------------------------

--
-- Structure de la table `audioqestions`
--

CREATE TABLE `audioqestions` (
  `id` int(11) NOT NULL,
  `idHebergement` int(11) NOT NULL,
  `idLangue` int(11) NOT NULL,
  `qestion` varchar(255) NOT NULL,
  `fichier` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `consielles`
--

CREATE TABLE `consielles` (
  `id` int(11) NOT NULL,
  `idHebergement` int(11) NOT NULL,
  `idLangue` int(11) NOT NULL,
  `libelleConsielle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `hebergements`
--

CREATE TABLE `hebergements` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `nomHebergement` varchar(50) NOT NULL,
  `paye` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `adresseMap` varchar(255) NOT NULL,
  `responsabe` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `telephone` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `langues`
--

CREATE TABLE `langues` (
  `id` int(11) NOT NULL,
  `nomLangue` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `idHebergement` int(11) NOT NULL,
  `idLangue` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `fichier` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `suggestions`
--

CREATE TABLE `suggestions` (
  `id` int(11) NOT NULL,
  `idHebergement` int(11) NOT NULL,
  `idLangue` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `audioqestions`
--
ALTER TABLE `audioqestions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idHebergement` (`idHebergement`),
  ADD KEY `idLangue` (`idLangue`);

--
-- Index pour la table `consielles`
--
ALTER TABLE `consielles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idHebergement` (`idHebergement`),
  ADD KEY `idLangue` (`idLangue`);

--
-- Index pour la table `hebergements`
--
ALTER TABLE `hebergements`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `langues`
--
ALTER TABLE `langues`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idHebergement` (`idHebergement`),
  ADD KEY `idLangue` (`idLangue`);

--
-- Index pour la table `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idHebergement` (`idHebergement`),
  ADD KEY `idLangue` (`idLangue`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `audioqestions`
--
ALTER TABLE `audioqestions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `consielles`
--
ALTER TABLE `consielles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `hebergements`
--
ALTER TABLE `hebergements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `langues`
--
ALTER TABLE `langues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `audioqestions`
--
ALTER TABLE `audioqestions`
  ADD CONSTRAINT `audioqestions_ibfk_1` FOREIGN KEY (`idHebergement`) REFERENCES `hebergements` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `audioqestions_ibfk_2` FOREIGN KEY (`idLangue`) REFERENCES `langues` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `consielles`
--
ALTER TABLE `consielles`
  ADD CONSTRAINT `consielles_ibfk_1` FOREIGN KEY (`idHebergement`) REFERENCES `hebergements` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consielles_ibfk_2` FOREIGN KEY (`idLangue`) REFERENCES `langues` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`idHebergement`) REFERENCES `hebergements` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `menu_ibfk_2` FOREIGN KEY (`idLangue`) REFERENCES `langues` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `suggestions`
--
ALTER TABLE `suggestions`
  ADD CONSTRAINT `suggestions_ibfk_1` FOREIGN KEY (`idHebergement`) REFERENCES `hebergements` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `suggestions_ibfk_2` FOREIGN KEY (`idLangue`) REFERENCES `langues` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
