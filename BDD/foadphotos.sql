-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 06 fév. 2020 à 09:05
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `foadphotos`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `idComment` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `dateComment` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idUser` int(11) NOT NULL,
  `idPicture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`idComment`, `title`, `content`, `dateComment`, `idUser`, `idPicture`) VALUES
(2, 'j coi pa', 'jecri tai mal', '2020-02-05 14:56:39', 2, 4),
(4, 'dfg', 'dg', '2020-02-05 16:30:27', 2, 4),
(5, 'dfg', 'dg', '2020-02-05 16:31:59', 2, 4),
(6, '', '', '2020-02-05 16:32:40', 2, 4),
(7, 'Bouuuuuuuuuhhhhhh', 'C\'est nul ton image', '2020-02-05 17:11:28', 2, 21),
(8, 'Encore moi', 'T\'es encore plus nul', '2020-02-05 17:13:23', 2, 21),
(9, 'PurÃ©e', 'T\'es trop juteuse !', '2020-02-05 17:23:29', 2, 30);

-- --------------------------------------------------------

--
-- Structure de la table `picture`
--

CREATE TABLE `picture` (
  `idPicture` int(11) NOT NULL,
  `fileName` varchar(255) COLLATE utf8_bin NOT NULL,
  `status` varchar(30) COLLATE utf8_bin NOT NULL DEFAULT 'private',
  `link` varchar(255) COLLATE utf8_bin NOT NULL,
  `tags` text COLLATE utf8_bin NOT NULL,
  `dateUpload` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `picture`
--

INSERT INTO `picture` (`idPicture`, `fileName`, `status`, `link`, `tags`, `dateUpload`, `idUser`) VALUES
(1, 'test1', 'public', 'Uploads/test1.png', 'Ca c\'est du test !', '2020-02-04 13:40:59', 2),
(2, 'test2', 'private', 'Uploads/test2.png', 'Ca c\'est du test !', '2020-02-04 13:41:16', 2),
(3, 'test3', 'public', 'Uploads/test3.png', 'Ca c\'est du test !', '2020-02-04 13:41:37', 2),
(4, 'test4', 'public', 'Uploads/test4.png', 'Ca c\'est du test !', '2020-02-04 13:41:51', 2),
(19, 'ggg', 'public', 'Uploads/04.02.20.496080.png', 'hhh', '2020-02-04 11:38:49', 1),
(20, 'fr', 'public', 'Uploads/05.02.20.4352434.png', 'fr', '2020-02-05 10:34:43', 1),
(21, 'fr', 'public', 'Uploads/05.02.20.2920886.jpg', 'fr', '2020-02-05 10:36:29', 1),
(22, 'sdfds', 'public', 'Uploads/05.02.20.5022260.jpg', 'sdfsd', '2020-02-05 10:38:50', 1),
(24, 'hyu', 'public', 'Uploads/05.02.20.00120848.png', 'tui', '2020-02-05 11:13:00', 1),
(25, 'dfg', 'public', 'Uploads/05.02.20.41161262.png', 'dfgf', '2020-02-05 11:15:41', 1),
(26, 'dfg', 'public', 'Uploads/05.02.20.20188936.png', 'dhh', '2020-02-05 11:20:20', 1),
(27, 'gdgdf', 'public', 'Uploads/05.02.20.2647561.png', 'dfgdfg,Super,Wow,SUper !', '2020-02-05 11:24:26', 2),
(28, 'Orange', 'public', 'Uploads/05.02.20.51364190.jpg', 'trop bell,Ca donne trop envie de manger !', '2020-02-05 17:20:51', 2),
(29, 'Orange', 'public', 'Uploads/05.02.20.05123200.jpg', 'Trop belle !', '2020-02-05 17:21:05', 2),
(30, 'Orange', 'public', 'Uploads/05.02.20.27291654.jpg', 'Trop belle !', '2020-02-05 17:22:27', 2);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `login` varchar(100) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `login`, `password`, `email`) VALUES
(1, 'Anonymous', 'Coucou', 'cou@cou.fr'),
(2, 'Coucou', 'Coucou', 'Coucou');

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

CREATE TABLE `vote` (
  `idVote` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idPicture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idComment`),
  ADD KEY `id_picture` (`idPicture`),
  ADD KEY `id_user` (`idUser`);

--
-- Index pour la table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`idPicture`),
  ADD KEY `id_user` (`idUser`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`idVote`),
  ADD KEY `id_picture` (`idPicture`),
  ADD KEY `id_user` (`idUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `idComment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `picture`
--
ALTER TABLE `picture`
  MODIFY `idPicture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `vote`
--
ALTER TABLE `vote`
  MODIFY `idVote` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`idPicture`) REFERENCES `picture` (`idPicture`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

--
-- Contraintes pour la table `picture`
--
ALTER TABLE `picture`
  ADD CONSTRAINT `picture_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

--
-- Contraintes pour la table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `vote_ibfk_1` FOREIGN KEY (`idPicture`) REFERENCES `picture` (`idPicture`),
  ADD CONSTRAINT `vote_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
