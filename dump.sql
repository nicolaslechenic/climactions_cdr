-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 02 mai 2022 à 11:30
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `climactions`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

CREATE TABLE `adherent` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `num_tel` char(10) NOT NULL,
  `mail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL,
  `ajouter` text NOT NULL,
  `modifier` int(11) NOT NULL,
  `supprimer_document` int(11) NOT NULL,
  `supprimer_commentaire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `adminnew`
--

CREATE TABLE `adminnew` (
  `id` int(11) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `city` varchar(40) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `adminnew`
--

INSERT INTO `adminnew` (`id`, `lastname`, `firstname`, `city`, `mail`, `password`) VALUES
(2, 'Lejeune', 'baptiste', 'vannes', 'bogoss56@chef.fr', 'vannes');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_document` int(11) NOT NULL,
  `contenu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

CREATE TABLE `document` (
  `id` int(11) NOT NULL,
  `auteur` varchar(50) NOT NULL,
  `photo` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `appartenance` varchar(50) NOT NULL,
  `caution` int(11) NOT NULL,
  `theme` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `etat` varchar(50) NOT NULL,
  `outil` varchar(100) NOT NULL,
  `emplacement` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `document`
--

INSERT INTO `document` (`id`, `auteur`, `photo`, `titre`, `genre`, `appartenance`, `caution`, `theme`, `type`, `etat`, `outil`, `emplacement`, `quantite`) VALUES
(0, '', 0, '', 'jeu', 'ademe', 0, 'air et transport', 'expositions', 'correct', 'Affiche « L’échelle du bruit » ', 6, 3),
(1, '', 0, '', '', 'ademe', 50, 'air et transport', 'malle', 'bon', 'Ecol\'air', 4, 1),
(2, '', 0, '', 'affiche', 'ademe', 0, 'air et transport', 'exposition', 'correct', 'L’échelle du bruit', 6, 3),
(3, '', 0, '', 'panneau', 'ademe', 100, 'air et transport', 'expositions', 'mauvais', 'Déplacements urbains ; En ville sans ma voiture', 6, 1),
(4, '', 0, '', 'panneau', 'ademe', 100, 'air et transport', 'expositions', 'correct', 'Bougez autrement', 6, 1),
(5, '', 0, '', 'panneau', 'ademe', 100, 'air et transport', 'expositions', 'correct', 'Carapatte, caracycle, à pied ou à vélo vers l\'école', 6, 2),
(6, '', 0, '', 'dvd', 'ademe', 30, 'air et transport', 'film_multimedia', 'bon', 'Déplacement : une affaire de choix ', 4, 1),
(7, '', 0, '', 'cd', 'ademe', 0, 'air et transport', 'film_multimedia', 'bon', 'Vélo, Bus,Pedi…Bus ; Tout le monde y gagne !', 4, 1),
(8, '', 0, '', 'exposition', 'ademe', 0, 'Changement climatique', 'expositions', '1 correct, 1 bon ', 'une exposition pour comprendre le changement climatique', 6, 2),
(9, '', 0, '', 'expositions', 'ademe', 100, 'Changement climatique', 'expositions', 'correct', 'Comprendre le changement climatique', 6, 1),
(10, '', 0, '', 'jeu', 'ademe', 30, 'Changement climatique', 'jeux', 'correct', 'T’es COP ou pas COP ', 5, 1),
(11, '', 0, '', 'jeu', 'ademe', 100, 'changement climatique', 'jeux', 'correct', 'un degré de +', 4, 3),
(12, '', 0, '', 'jeu', 'ademe', 0, 'Changement climatique', 'jeux', 'correct', 'kyogami notre planète en danger', 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

CREATE TABLE `emprunt` (
  `id_adherent` int(11) NOT NULL,
  `id_document` int(11) NOT NULL,
  `date_emprunt` date NOT NULL,
  `date_retour` date NOT NULL,
  `enpruntencours` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

CREATE TABLE `login` (
  `id_admin` int(11) NOT NULL,
  `login` varchar(10) NOT NULL,
  `mdp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`id_admin`, `login`, `mdp`) VALUES
(1, 'admin1', 'root1'),
(2, 'admin2', 'root2');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adminnew`
--
ALTER TABLE `adminnew`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adminnew`
--
ALTER TABLE `adminnew`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
