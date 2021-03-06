-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 06 fév. 2020 à 12:25
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
  `idUser` int(11) NOT NULL,
  `urlAnonymous` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `picture`
--

INSERT INTO `picture` (`idPicture`, `fileName`, `status`, `link`, `tags`, `dateUpload`, `idUser`, `urlAnonymous`) VALUES
(2, 'test2', 'private', 'Uploads/test2.png', 'Ca c\'est du test !', '2020-02-04 13:41:16', 2, NULL),
(4, 'test4', 'public', 'Uploads/test4.png', 'Ca c\'est du test !', '2020-02-04 13:41:51', 2, NULL),
(19, 'ggg', 'public', 'Uploads/04.02.20.496080.png', 'hhh', '2020-02-04 11:38:49', 1, NULL),
(20, 'fr', 'public', 'Uploads/05.02.20.4352434.png', 'fr', '2020-02-05 10:34:43', 1, NULL),
(21, 'fr', 'public', 'Uploads/05.02.20.2920886.jpg', 'fr', '2020-02-05 10:36:29', 1, NULL),
(22, 'sdfds', 'public', 'Uploads/05.02.20.5022260.jpg', 'sdfsd', '2020-02-05 10:38:50', 1, NULL),
(24, 'hyu', 'public', 'Uploads/05.02.20.00120848.png', 'tui', '2020-02-05 11:13:00', 1, NULL),
(25, 'dfg', 'public', 'Uploads/05.02.20.41161262.png', 'dfgf', '2020-02-05 11:15:41', 1, NULL),
(26, 'dfg', 'public', 'Uploads/05.02.20.20188936.png', 'dhh', '2020-02-05 11:20:20', 1, NULL),
(29, 'Orange', 'public', 'Uploads/05.02.20.05123200.jpg', 'Trop belle !', '2020-02-05 17:21:05', 2, NULL),
(30, 'Orange', 'public', 'Uploads/05.02.20.27291654.jpg', 'Trop belle !', '2020-02-05 17:22:27', 2, NULL),
(31, 'cxv', 'private', 'Uploads/06.02.20.03287923.png', 'xcvxc,xcvxcv', '2020-02-06 09:09:03', 2, NULL),
(32, 'Salut Ã§a va ?', 'public', 'Uploads/06.02.20.31346804.jpg', 'ggggggggggggggggggggggggggggggggggggggggggggggggggggggg,xdddddddddddddddd,ddddddddddddddddddddddddddddddddd,dghfhsgkjdfhgkjdfhgkjdhkjhkjh,ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', '2020-02-06 10:20:31', 2, NULL),
(33, 'hg', 'public', 'Uploads/06.02.20.36167280.png', 'Coucou,Salut tu vas bien mon garÃ§on ?', '2020-02-06 10:24:36', 2, NULL),
(34, 'rhfh', 'private', 'Uploads/06.02.20.19331376.jpg', 'fghfgh,fghfghfhfg,tetryrty,etertr', '2020-02-06 11:52:19', 1, NULL),
(40, 'Test', 'private', 'Uploads/06.02.20.34158388.jpg', 'gfhfghf,hfghgfhf,fghgfhfg', '2020-02-06 12:16:34', 1, 'g2240bel59152NqBa5LWu14lB64T8RmOMEkxoAN2UF3xt2hmMZK8VMH72l1'),
(41, 'gfdgdfe', 'private', 'Uploads/06.02.20.32202105.png', 'dfsdfdsf,llllllll', '2020-02-06 12:23:32', 1, '7lmOh4Xec33V1573Vh8ohJMEK0MPo5y4S');

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
  MODIFY `idPicture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
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
