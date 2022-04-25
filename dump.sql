SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données : `projet_cdr`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

DROP TABLE IF EXISTS `adherent`;
CREATE TABLE IF NOT EXISTS `adherent` (
  `id` int NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8 NOT NULL,
  `prenom` varchar(50) CHARACTER SET utf8 NOT NULL,
  `num_tel` char(10) CHARACTER SET utf8 NOT NULL,
  `mail` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `user_id` int NOT NULL,
  `ajouter` text CHARACTER SET utf8 NOT NULL,
  `modifier` int NOT NULL,
  `supprimer_document` int NOT NULL,
  `supprimer_commentaire` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id_document` int NOT NULL,
  `contenu` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

DROP TABLE IF EXISTS `document`;
CREATE TABLE IF NOT EXISTS `document` (
  `id` int NOT NULL,
  `auteur` varchar(50) CHARACTER SET utf8 NOT NULL,
  `photo` int NOT NULL,
  `titre` varchar(50) CHARACTER SET utf8 NOT NULL,
  `genre` varchar(50) CHARACTER SET utf8 NOT NULL,
  `appartenance` varchar(50) CHARACTER SET utf8 NOT NULL,
  `caution` int NOT NULL,
  `theme` varchar(50) CHARACTER SET utf8 NOT NULL,
  `type` varchar(50) CHARACTER SET utf8 NOT NULL,
  `etat` varchar(50) CHARACTER SET utf8 NOT NULL,
  `outil` varchar(100) CHARACTER SET utf8 NOT NULL,
  `emplacement` int NOT NULL,
  `quantite` int NOT NULL,
  PRIMARY KEY (`id`)
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

DROP TABLE IF EXISTS `emprunt`;
CREATE TABLE IF NOT EXISTS `emprunt` (
  `id_adherent` int NOT NULL,
  `id_document` int NOT NULL,
  `date_emprunt` date NOT NULL,
  `date_retour` date NOT NULL,
  `enpruntencours` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id_admin` int NOT NULL,
  `login` varchar(10) CHARACTER SET utf8 NOT NULL,
  `mdp` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `login`
--

INSERT INTO `login` (`id_admin`, `login`, `mdp`) VALUES
(1, 'admin1', 'root1'),
(2, 'admin2', 'root2');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
