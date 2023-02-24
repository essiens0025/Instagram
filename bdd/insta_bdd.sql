-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 24 fév. 2023 à 10:05
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `insta_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `Commentaires`
--

CREATE TABLE `Commentaires` (
  `id_m` int(11) NOT NULL,
  `commentaire` varchar(255) NOT NULL,
  `id_u` int(11) NOT NULL,
  `id_p` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Commentaires`
--

INSERT INTO `Commentaires` (`id_m`, `commentaire`, `id_u`, `id_p`) VALUES
(1, 'bonjour', 4, 6),
(7, 'bonjour', 1, 6),
(9, 'bonjour', 1, 6),
(23, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique incidunt, consequatur natus fugiat animi quo, non tempore nam culpa asperiores iusto voluptates illo deserunt neque porro amet! Quia, necessitatibus ipsa.', 1, 6),
(26, 'qsdffgh juytr', 1, 6),
(29, 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Similique incidunt, consequatur natus fugiat animi quo, non tempore nam culpa asperiores iusto voluptates illo deserunt neque porro amet! Quia, necessitatibus ipsa.', 1, 6),
(31, 'dfdfddf', 1, 6),
(32, 'bienvenue', 1, 6),
(33, 'bonjour', 4, 14),
(34, 'bonjour', 1, 15),
(35, 'bonjour', 4, 34),
(36, 'bonjour', 4, 33),
(37, 'bonjour', 1, 29),
(38, 'cocou', 1, 17),
(39, 'yo', 1, 17),
(40, 'il fait beau', 11, 38),
(41, 'bonjour', 11, 38),
(42, 'sfeigfifgi', 1, 38);

-- --------------------------------------------------------

--
-- Structure de la table `Likes`
--

CREATE TABLE `Likes` (
  `id_l` int(11) NOT NULL,
  `id_p` int(11) NOT NULL,
  `id_u` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Likes`
--

INSERT INTO `Likes` (`id_l`, `id_p`, `id_u`) VALUES
(13, 34, 4),
(14, 33, 1),
(15, 28, 1),
(18, 35, 4),
(19, 35, 1),
(20, 33, 4),
(21, 29, 1),
(22, 18, 1),
(23, 37, 11),
(24, 38, 11),
(25, 17, 1),
(26, 40, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Photos`
--

CREATE TABLE `Photos` (
  `id_p` int(11) NOT NULL,
  `nom_p` varchar(255) NOT NULL,
  `id_u` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `Photos`
--

INSERT INTO `Photos` (`id_p`, `nom_p`, `id_u`) VALUES
(5, 'goku.jpg', 1),
(6, 'nami.jpg', 4),
(7, 'luffy.jpg', 1),
(8, 'pikachu.gif', 1),
(9, 'pikachu.gif', 1),
(10, 'pikachu.gif', 1),
(11, 'pikachu.gif', 1),
(12, 'pikachu.gif', 1),
(13, 'pikachu.gif', 1),
(14, 'essai.jpg', 1),
(15, 'paysage.PNG', 4),
(16, 'fleur.jpg', 1),
(17, 'fleur.jpg', 1),
(18, 'goku.jpg', 1),
(28, 'phone.png', 1),
(29, 'phone.png', 1),
(33, 'image34.jpg', 1),
(34, 'image34.jpg', 4),
(35, 'goku.jpg', 4),
(37, 'fond-instagram.jpg', 1),
(38, 'fleur.jpg', 11),
(39, 'codephp.docx', 11),
(40, 'pizza.jpg', 11),
(41, 'contact.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_u` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_u`, `nom`, `prenom`, `pseudo`, `password`, `avatar`) VALUES
(1, 'Farre', 'Mickael', 'Mike', '12345', 'images.png'),
(2, 'Farres', 'Michel', 'Michou', '1234', 'nami.jpg'),
(3, 'Jean F', 'Pierre', 'Jp', '123456', NULL),
(4, 'MARTIN', 'Julien', 'chess42', '1234', 'goku.jpg'),
(6, 'fg', 'f', 'g', 'y', NULL),
(7, 'j', 'm', 'ju', 'fgh', NULL),
(8, 'tyyu', 'io', 'rty', 'ghh', NULL),
(9, 'f', 'f', 'f', 'f', NULL),
(10, 'k', 'k', 'kkk', 'k', NULL),
(11, 'Mila2', 'Jasmine', 'mila56', '345', 'ondine.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Commentaires`
--
ALTER TABLE `Commentaires`
  ADD PRIMARY KEY (`id_m`),
  ADD KEY `id_u` (`id_u`),
  ADD KEY `id_p` (`id_p`);

--
-- Index pour la table `Likes`
--
ALTER TABLE `Likes`
  ADD PRIMARY KEY (`id_l`),
  ADD KEY `id_u` (`id_u`),
  ADD KEY `id_p` (`id_p`);

--
-- Index pour la table `Photos`
--
ALTER TABLE `Photos`
  ADD PRIMARY KEY (`id_p`),
  ADD KEY `fk_id_u` (`id_u`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_u`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Commentaires`
--
ALTER TABLE `Commentaires`
  MODIFY `id_m` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT pour la table `Likes`
--
ALTER TABLE `Likes`
  MODIFY `id_l` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `Photos`
--
ALTER TABLE `Photos`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Commentaires`
--
ALTER TABLE `Commentaires`
  ADD CONSTRAINT `id_p` FOREIGN KEY (`id_p`) REFERENCES `Photos` (`id_p`),
  ADD CONSTRAINT `id_u` FOREIGN KEY (`id_u`) REFERENCES `users` (`id_u`);

--
-- Contraintes pour la table `Likes`
--
ALTER TABLE `Likes`
  ADD CONSTRAINT `Likes_ibfk_1` FOREIGN KEY (`id_u`) REFERENCES `users` (`id_u`),
  ADD CONSTRAINT `Likes_ibfk_2` FOREIGN KEY (`id_p`) REFERENCES `Photos` (`id_p`);

--
-- Contraintes pour la table `Photos`
--
ALTER TABLE `Photos`
  ADD CONSTRAINT `fk_id_u` FOREIGN KEY (`id_u`) REFERENCES `users` (`id_u`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
