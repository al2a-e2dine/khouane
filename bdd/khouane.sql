-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 23 mars 2020 à 18:47
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `khouane`
--

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `fact_id` int(11) NOT NULL,
  `art_type` int(11) NOT NULL,
  `art_id` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `archived` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`id`, `fact_id`, `art_type`, `art_id`, `qte`, `date`, `archived`) VALUES
(30, 2, 1, 1, 30, '2020-03-22', 1),
(34, 4, 3, 1, 2, '2020-03-23', 1),
(35, 4, 4, 1, 2, '2020-02-22', 1),
(36, 4, 5, 1, 2, '2020-03-22', 1),
(37, 4, 6, 1, 2, '2020-03-23', 1),
(39, 7, 2, 1, 5, '2020-02-22', 1);

-- --------------------------------------------------------

--
-- Structure de la table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `n_phone` int(11) NOT NULL,
  `lun_d_sph` int(11) NOT NULL,
  `lun_d_cyl` int(11) NOT NULL,
  `lun_d_axe` int(11) NOT NULL,
  `lun_g_sph` int(11) NOT NULL,
  `lun_g_cyl` int(11) NOT NULL,
  `lun_g_axe` int(11) NOT NULL,
  `lun_ep` int(11) NOT NULL,
  `len_d_sph` int(11) NOT NULL,
  `len_d_cyl` int(11) NOT NULL,
  `len_d_axe` int(11) NOT NULL,
  `len_g_sph` int(11) NOT NULL,
  `len_g_cyl` int(11) NOT NULL,
  `len_g_axe` int(11) NOT NULL,
  `len_rayon` int(11) NOT NULL,
  `len_diametre` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `archived` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `customers`
--

INSERT INTO `customers` (`id`, `fullname`, `sexe`, `age`, `n_phone`, `lun_d_sph`, `lun_d_cyl`, `lun_d_axe`, `lun_g_sph`, `lun_g_cyl`, `lun_g_axe`, `lun_ep`, `len_d_sph`, `len_d_cyl`, `len_d_axe`, `len_g_sph`, `len_g_cyl`, `len_g_axe`, `len_rayon`, `len_diametre`, `date`, `archived`) VALUES
(1, 'qsdfsd', 'Femme', 55, 555, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, '2020-03-20 11:55:00', 0),
(2, 'sfdqsfqsf', 'Homme', 7, 7, 0, 0, 0, 0, 0, 0, 0, 7, 7, 7, 7, 7, 7, 7, 7, '2020-03-20 11:57:28', 0),
(3, 'alaa', 'Homme', 1, 1, 3, 3, 3, 3, 3, 3, 3, 1, 1, 1, 1, 1, 1, 1, 1, '2020-03-20 11:58:28', 1),
(6, 'zamch', 'Femme', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2020-03-20 12:48:36', 0),
(7, 'Belalia Mohamed Mohamed Alaa Eddine', 'Homme', 26, 697701228, 1, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2020-03-22 09:29:39', 0);

-- --------------------------------------------------------

--
-- Structure de la table `glass`
--

CREATE TABLE `glass` (
  `id` int(11) NOT NULL,
  `org_or_min` varchar(255) NOT NULL,
  `indice` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `sph` int(11) NOT NULL,
  `cyl` int(11) NOT NULL,
  `ad` int(11) NOT NULL,
  `type_de_trait` varchar(255) NOT NULL,
  `fournisseur_id` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `seuil_min` int(11) NOT NULL,
  `prix_a` int(11) NOT NULL,
  `prix_v` int(11) NOT NULL,
  `net_profit` int(11) NOT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `archived` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `glass`
--

INSERT INTO `glass` (`id`, `org_or_min`, `indice`, `type`, `sph`, `cyl`, `ad`, `type_de_trait`, `fournisseur_id`, `qte`, `seuil_min`, `prix_a`, `prix_v`, `net_profit`, `date`, `archived`) VALUES
(1, 'Torique', 2, 'Sphérique', 1221, 0, 0, 'Anti reflet', 1, 524, 54, 50, 100, 50, '2020-03-21 10:11:10', 1),
(9, 'Torique', 2, 'Torique', 21, 5464, 0, 'Durci', 2, 21, 2121, 2121, 2121, 32323, '2020-03-21 14:40:52', 0),
(10, 'Organique', 1, 'Sphérique', 12, 0, 0, 'Aucun', 1, 50, 10, 18500, 20000, 1500, '2020-03-23 13:11:39', 0);

-- --------------------------------------------------------

--
-- Structure de la table `glasses`
--

CREATE TABLE `glasses` (
  `id` int(11) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `ref` varchar(255) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `enf_or_adu` varchar(255) NOT NULL,
  `fournisseur_id` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `seuil_min` int(11) NOT NULL,
  `prix_a` int(11) NOT NULL,
  `prix_v` int(11) NOT NULL,
  `net_profit` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `archived` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `glasses`
--

INSERT INTO `glasses` (`id`, `designation`, `ref`, `marque`, `sexe`, `enf_or_adu`, `fournisseur_id`, `qte`, `seuil_min`, `prix_a`, `prix_v`, `net_profit`, `date`, `archived`) VALUES
(1, 'sdfsdfsd', '545454', 'zazo', 'Femme', 'Mineur', 2, 4, 4, 60, 80, 20, '2020-03-20 16:16:47', 0),
(2, 'zzzzzzzzzzzzzz', '1212', 'fghbfgh', 'Homme', 'Mineur', 1, 1, 1, 5454545, 6454545, 466666, '2020-03-22 09:50:37', 0),
(3, 'aaaa', '1221', 'fghfhgf', 'Homme', 'Mineur', 2, 100, 20, 55555555, 77777777, 22222222, '2020-03-23 13:15:05', 0);

-- --------------------------------------------------------

--
-- Structure de la table `implants`
--

CREATE TABLE `implants` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `puissance` varchar(255) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `fournisseur_id` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `seuil_min` int(11) NOT NULL,
  `prix_a` int(11) NOT NULL,
  `prix_v` int(11) NOT NULL,
  `net_profit` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `archived` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `implants`
--

INSERT INTO `implants` (`id`, `type`, `puissance`, `marque`, `fournisseur_id`, `qte`, `seuil_min`, `prix_a`, `prix_v`, `net_profit`, `date`, `archived`) VALUES
(1, 'PMMA', '1212', '2121', 2, 2121, 2121, 100, 200, 100, '2020-03-21 11:44:19', 0),
(2, 'Pliable', '5', 'jhgjghj', 2, 65665, 2332, 78780707, 99999999, 21219292, '2020-03-23 13:15:52', 0);

-- --------------------------------------------------------

--
-- Structure de la table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `invoice`
--

INSERT INTO `invoice` (`id`, `client_id`, `total`, `date`) VALUES
(1, 7, 0, '2020-03-22 10:55:34'),
(2, 6, 40484, '2020-03-22 12:01:44'),
(3, 2, 0, '2020-03-22 13:31:56'),
(4, 6, 11578, '2020-03-22 13:33:03'),
(5, 7, 0, '2020-03-22 17:07:44'),
(6, 7, 0, '2020-03-22 17:11:37'),
(7, 7, 12825, '2020-03-22 17:16:10'),
(8, 6, 0, '2020-03-22 17:38:10'),
(9, 7, 0, '2020-03-22 18:21:48'),
(10, 0, 0, '2020-03-23 13:51:15');

-- --------------------------------------------------------

--
-- Structure de la table `lenses`
--

CREATE TABLE `lenses` (
  `id` int(11) NOT NULL,
  `hy_s_r` varchar(255) NOT NULL,
  `type_de_len` varchar(255) NOT NULL,
  `sph` int(11) NOT NULL,
  `cyl` int(11) NOT NULL,
  `axe` int(11) NOT NULL,
  `rayon` int(11) NOT NULL,
  `diametre` int(11) NOT NULL,
  `k1` int(11) NOT NULL,
  `k2` int(11) NOT NULL,
  `sclerale` varchar(255) NOT NULL,
  `fournisseur_id` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `seuil_min` int(11) NOT NULL,
  `prix_a` int(11) NOT NULL,
  `prix_v` int(11) NOT NULL,
  `net_profit` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `archived` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lenses`
--

INSERT INTO `lenses` (`id`, `hy_s_r`, `type_de_len`, `sph`, `cyl`, `axe`, `rayon`, `diametre`, `k1`, `k2`, `sclerale`, `fournisseur_id`, `qte`, `seuil_min`, `prix_a`, `prix_v`, `net_profit`, `date`, `archived`) VALUES
(1, 'Hydrogel', 'Sphérique', 1211, 0, 0, 0, 0, 0, 0, '', 1, 212, 2121, 160, 200, 40, '2020-03-21 11:31:10', 1),
(2, 'Silicone hydrogel', 'Sphérique', 4545, 0, 0, 5454, 5454, 0, 0, '', 2, 212, 2121, 212, 122, 253232, '2020-03-21 11:32:05', 0),
(3, 'Hydrogel', 'Sphérique', 1211, 0, 0, 212, 2121, 0, 0, '', 1, 212, 2121, 212, 122, 32323, '2020-03-21 11:32:19', 0),
(4, 'Hydrogel', 'Torique', 1211, 212, 2121, 212, 2121, 0, 0, '', 1, 212, 2121, 212, 122, 32323, '2020-03-21 11:32:46', 0),
(5, 'Hydrogel', 'Rigide', 1211, 212, 2121, 212, 2121, 212, 2121, '', 1, 212, 2121, 212, 122, 32323, '2020-03-21 11:33:05', 1),
(6, 'Hydrogel', 'Scléral', 0, 0, 0, 0, 0, 0, 0, '2121', 1, 212, 2121, 212, 122, 3232, '2020-03-21 11:33:31', 0),
(7, 'Hydrogel', 'Scléral', 0, 0, 0, 0, 0, 0, 0, '2121', 1, 212, 2121, 212, 122, 3232, '2020-03-21 11:34:18', 1);

-- --------------------------------------------------------

--
-- Structure de la table `other`
--

CREATE TABLE `other` (
  `id` int(11) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `fournisseur_id` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `seuil_min` int(11) NOT NULL,
  `prix_a` int(11) NOT NULL,
  `prix_v` int(11) NOT NULL,
  `net_profit` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `archived` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `other`
--

INSERT INTO `other` (`id`, `designation`, `fournisseur_id`, `qte`, `seuil_min`, `prix_a`, `prix_v`, `net_profit`, `date`, `archived`) VALUES
(1, 'zamch', 2, 1, 1, 150, 300, 150, '2020-03-21 12:05:46', 0),
(2, 'dsfsdfgsdg', 1, 45454, 44, 200000, 300000, 100000, '2020-03-23 13:16:21', 0);

-- --------------------------------------------------------

--
-- Structure de la table `produit_entre`
--

CREATE TABLE `produit_entre` (
  `id` int(11) NOT NULL,
  `article` varchar(255) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `fournisseur_id` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `seuil_min` int(11) NOT NULL,
  `prix_a` int(11) NOT NULL,
  `prix_v` int(11) NOT NULL,
  `net_profit` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `archived` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `produit_entre`
--

INSERT INTO `produit_entre` (`id`, `article`, `marque`, `fournisseur_id`, `qte`, `seuil_min`, `prix_a`, `prix_v`, `net_profit`, `date`, `archived`) VALUES
(1, 'Cordon', 'aaaaaaaa', 1, 54, 5454, 400, 1000, 600, '2020-03-21 11:56:19', 0),
(2, 'Produit lentille souple', 'fgjhfgj', 1, 121, 12, 100000, 200000, 100000, '2020-03-23 13:16:07', 0);

-- --------------------------------------------------------

--
-- Structure de la table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `e_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `n_phone1` int(11) NOT NULL,
  `n_phone2` int(11) NOT NULL,
  `adr` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `archived` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `suppliers`
--

INSERT INTO `suppliers` (`id`, `fullname`, `e_name`, `email`, `n_phone1`, `n_phone2`, `adr`, `date`, `archived`) VALUES
(1, 'adel', 'al2a', 'al2a@al2a.com', 123, 2121, 'mascara', '2020-03-18 13:14:49', 0),
(2, 'abda9a', 'znin', 'abda9a@gmail.com', 123, 456, 'mascara', '2020-03-20 13:29:06', 0);

-- --------------------------------------------------------

--
-- Structure de la table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tbl_employee`
--

INSERT INTO `tbl_employee` (`id`, `name`, `address`, `gender`, `designation`, `age`, `image`) VALUES
(1, 'Bruce Tom', '656 Edsel Road\r\nSherman Oaks, CA 91403', 'Male', 'Driver', 36, '1.jpg'),
(5, 'Clara Gilliam', '63 Woodridge Lane\r\nMemphis, TN 38138', 'Female', 'Programmer', 24, '2.jpg'),
(6, 'Barbra K. Hurley', '1241 Canis Heights Drive\r\nLos Angeles, CA 90017', 'Female', 'Service technician', 26, '3.jpg'),
(7, 'Antonio J. Forbes', '403 Snyder Avenue\r\nCharlotte, NC 28208', 'Male', 'Faller', 32, '4.jpg'),
(8, 'Charles D. Horst', '1636 Walnut Hill Drive\r\nCincinnati, OH 45202', 'Male', 'Financial investigator', 29, '5.jpg'),
(175, 'Ronald D. Colella', '1571 Bingamon Branch Road, Barrington, IL 60010', 'Male', 'Top executive', 32, '6.jpg'),
(174, 'Martha B. Tomlinson', '4005 Bird Spring Lane, Houston, TX 77002', 'Female', 'Systems programmer', 38, '7.jpg'),
(161, 'Glenda J. Stewart', '3482 Pursglove Court, Rossburg, OH 45362', 'Female', 'Cost consultant', 28, '8.jpg'),
(162, 'Jarrod D. Jones', '3827 Bingamon Road, Garfield Heights, OH 44125', 'Male', 'Manpower development advisor', 64, '9.jpg'),
(163, 'William C. Wright', '2653 Pyramid Valley Road, Cedar Rapids, IA 52404', 'Male', 'Political geographer', 33, '10.jpg'),
(178, 'Sara K. Ebert', '1197 Nelm Street\r\nMc Lean, VA 22102', 'Female', 'Billing machine operator', 50, ''),
(177, 'Patricia L. Scott', '1584 Dennison Street\r\nModesto, CA 95354', 'Female', 'Urban and regional planner', 54, ''),
(179, 'James K. Ridgway', '3462 Jody Road\r\nWayne, PA 19088', 'Female', 'Recreation leader', 41, ''),
(180, 'Stephen A. Crook', '448 Deercove Drive\r\nDallas, TX 75201', 'Male', 'Optical goods worker', 36, ''),
(181, 'Kimberly J. Ellis', '4905 Holt Street\r\nFort Lauderdale, FL 33301', 'Male', 'Dressing room attendant', 24, ''),
(182, 'Elizabeth N. Bradley', '1399 Randall Drive\r\nHonolulu, HI 96819', 'Female', ' Software quality assurance analyst', 25, ''),
(183, 'Steve John', '108, Vile Parle, CL', 'Male', 'Software Engineer', 29, ''),
(184, 'Marks Johnson', '021, Big street, NY', 'Male', 'Head of IT', 41, ''),
(185, 'Mak Pub', '1462 Juniper Drive\r\nBreckenridge, MI 48612', 'Male', 'Mental health counselor', 40, ''),
(186, 'Louis C. Charmis', '1462 Juniper Drive\r\nBreckenridge, MI 48612', 'Male', 'Mental health counselor', 40, '');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `n_phone` int(11) NOT NULL,
  `n_cni` int(11) NOT NULL,
  `adr` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `archived` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `password`, `n_phone`, `n_cni`, `adr`, `date`, `archived`) VALUES
(1, 'admin', 'admin', 'admin@khouane.com', '202cb962ac59075b964b07152d234b70', 123, 123, 'mascara', '2020-03-19 18:24:45', 0),
(3, 'adel', 'adel', 'adel@gmail.com', '202cb962ac59075b964b07152d234b70', 85666565, 365656565, 'mascara', '2020-03-19 19:17:58', 1),
(4, 'Belalia Mohamed Mohamed Alaa Eddine', 'al2ae2dine', 'al2atheitengineer@gmail.com', '202cb962ac59075b964b07152d234b70', 697701228, 123, 'rue ould ben khadda mohamed, zone 12', '2020-03-19 19:24:02', 1),
(5, 'Belalia Mohamed Mohamed Alaa Eddine', 'Belalia', 'sdfs@gmail.com', '202cb962ac59075b964b07152d234b70', 697701228, 123, 'rue ould ben khadda mohamed, zone 12', '2020-03-19 19:35:24', 1),
(6, 'dsffsd', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 2424, 0, '', '2020-03-20 11:35:45', 1),
(7, 'fgfdgdf', 'gfdgdf', 'gfdgfd@gfdgfd.gfdg', '202cb962ac59075b964b07152d234b70', 123, 123, 'rue ould bekhada mohamed, la zone 12', '2020-03-21 18:43:14', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `glass`
--
ALTER TABLE `glass`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `glasses`
--
ALTER TABLE `glasses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `implants`
--
ALTER TABLE `implants`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lenses`
--
ALTER TABLE `lenses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `other`
--
ALTER TABLE `other`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `produit_entre`
--
ALTER TABLE `produit_entre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT pour la table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `glass`
--
ALTER TABLE `glass`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `glasses`
--
ALTER TABLE `glasses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `implants`
--
ALTER TABLE `implants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `lenses`
--
ALTER TABLE `lenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `other`
--
ALTER TABLE `other`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `produit_entre`
--
ALTER TABLE `produit_entre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
