-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 17, 2021 at 07:58 PM
-- Server version: 5.7.33-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-50+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aluno14738`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `country` varchar(50) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`country`, `count`) VALUES
('Angola', 12),
('Australia', 12),
('Austria', 5),
('Belgium', 2),
('Brazil', 5),
('China', 1),
('EUA', 1),
('France', 5),
('Japan', 1),
('Mexico', 12),
('Portugal', 33),
('Russia', 9),
('Spain', 1);

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL DEFAULT '',
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `dob` date NOT NULL,
  `pGroup` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=geostd8;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `email`, `username`, `password`, `dob`, `pGroup`) VALUES
(28, 'anothersprivado@gmail.com', 'asd', '$2y$10$7c2TXJhp8MwztF.WFAlGK.EcFeH654E.tom4VICUGKlsCpAWGb7bS', '2004-12-16', 'owner'),
(236, 'lectus.sit.amet@Proin.edu', 'Neville', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '2001-03-05', 'user'),
(237, 'rutrum@mollisInteger.edu', 'Kennan', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1998-06-22', 'user'),
(238, 'magna.Suspendisse.tristique@nisi.edu', 'Portia', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1995-10-16', 'user'),
(239, 'orci.quis.lectus@Suspendisse.ca', 'Malik', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1985-04-03', 'user'),
(240, 'lobortis.mauris@inlobortis.co.uk', 'Steven', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1986-11-02', 'user'),
(241, 'Nulla@pedePraesent.ca', 'August', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1993-09-09', 'user'),
(242, 'risus.Donec@auguescelerisquemollis.co.uk', 'Lael', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1996-12-13', 'user'),
(243, 'eros@arcuacorci.ca', 'Jason', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '2000-03-28', 'user'),
(244, 'consectetuer@non.ca', 'Guinevere', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '2001-01-06', 'user'),
(245, 'egestas.hendrerit@luctusaliquet.edu', 'Genevieve', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1987-06-26', 'user'),
(266, 'quam.elementum@sollicitudinamalesuada.co.uk', 'Willow', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1984-11-08', 'user'),
(267, 'interdum.feugiat@Curabitursed.edu', 'Harlan', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1977-09-30', 'user'),
(268, 'euismod.est.arcu@volutpatNulla.edu', 'Keelie', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1986-09-11', 'user'),
(269, 'Aliquam@lacinia.ca', 'Haley', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1993-06-16', 'user'),
(270, 'rutrum.Fusce@eleifend.org', 'Rebekah', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1985-02-04', 'user'),
(271, 'ornare.placerat.orci@elementumsemvitae.com', 'Ocean', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1998-06-12', 'user'),
(272, 'vitae.purus.gravida@vitae.ca', 'Chester', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1998-11-28', 'user'),
(273, 'magna.Ut@necmaurisblandit.co.uk', 'Colby', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1991-11-09', 'user'),
(274, 'eu@Duissit.edu', 'Linda', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1984-12-14', 'user'),
(275, 'magna.Lorem.ipsum@ligula.org', 'Lyle', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1996-09-29', 'user'),
(276, 'bibendum@Proinvel.edu', 'Karleigh', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1987-03-07', 'user'),
(277, 'Nunc@cursusluctusipsum.net', 'Destiny', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1989-10-28', 'user'),
(278, 'Nam@Integersemelit.co.uk', 'Halee', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1986-02-07', 'user'),
(279, 'nulla@scelerisquesedsapien.edu', 'Kaitlin', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '2000-10-23', 'user'),
(280, 'urna.Vivamus@faucibuslectus.co.uk', 'Arsenio', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1992-02-25', 'user'),
(281, 'tincidunt.orci.quis@sit.co.uk', 'Grant', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1996-12-28', 'user'),
(282, 'auctor.vitae.aliquet@sapienimperdiet.ca', 'Ivor', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '2002-05-23', 'user'),
(283, 'hymenaeos.Mauris@malesuadautsem.co.uk', 'Akeem', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1990-07-16', 'user'),
(284, 'et.magnis.dis@rutrumjustoPraesent.co.uk', 'Dennis', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1977-03-03', 'user'),
(285, 'sodales@orciDonecnibh.co.uk', 'Tamekah', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '2000-11-09', 'user'),
(286, 'erat.vitae@sedsapien.ca', 'Guy', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1980-12-06', 'user'),
(287, 'Maecenas.libero.est@commodo.co.uk', 'Dacey', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1977-12-10', 'user'),
(288, 'bibendum.fermentum.metus@porttitoreros.edu', 'Samson', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1988-03-28', 'user'),
(289, 'in.cursus.et@nec.net', 'Yolanda', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1983-02-17', 'user'),
(290, 'sit.amet@accumsan.edu', 'Yoshi', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1983-10-21', 'user'),
(291, 'sit.amet@magnaSuspendisse.edu', 'Edan', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1988-09-12', 'user'),
(292, 'Quisque.nonummy@anteNuncmauris.ca', 'Alden', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1982-06-04', 'user'),
(293, 'pharetra@Crasloremlorem.ca', 'Yardley', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1996-03-25', 'user'),
(294, 'magna.a@malesuadautsem.org', 'Lester', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1993-08-18', 'user'),
(295, 'neque@loremauctor.net', 'Marsden', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1990-12-02', 'user'),
(296, 'id@sitametornare.edu', 'Cedric', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1992-10-25', 'user'),
(297, 'vehicula.Pellentesque@lorem.edu', 'Hayley', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1990-11-24', 'user'),
(298, 'Suspendisse.sed@vellectusCum.ca', 'Indigo', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1998-03-05', 'user'),
(299, 'urna.Vivamus@facilisisvitaeorci.com', 'Lareina', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1976-09-30', 'user'),
(300, 'orci.Ut@mollisPhasellus.com', 'Carter', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1978-03-23', 'user'),
(301, 'diam@aliquetliberoInteger.org', 'David', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '2000-01-18', 'user'),
(302, 'Morbi@egetnisidictum.ca', 'Clinton', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1980-06-05', 'user'),
(303, 'non.cursus@augueSed.ca', 'Ingrid', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1996-01-02', 'user'),
(304, 'eu@nec.edu', 'Chloe', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1993-02-08', 'user'),
(305, 'Cras.pellentesque.Sed@fames.org', 'Abel', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1988-03-08', 'user'),
(306, 'dolor@sit.com', 'Kieran', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1992-09-03', 'user'),
(307, 'Aliquam.nec@orcitinciduntadipiscing.edu', 'Eagan', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1999-11-12', 'user'),
(308, 'mattis@elementumpurusaccumsan.co.uk', 'Byron', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1997-10-25', 'user'),
(309, 'Aliquam.nec@mollisIntegertincidunt.ca', 'Kato', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1992-07-16', 'user'),
(310, 'eget.laoreet.posuere@semperegestasurna.edu', 'Martha', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1979-02-21', 'user'),
(311, 'ullamcorper.velit.in@Integer.com', 'Jeanette', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1993-05-07', 'user'),
(312, 'ultricies.sem.magna@pedeCrasvulputate.com', 'Bernard', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1997-01-28', 'user'),
(313, 'consequat@ametornarelectus.co.uk', 'Jenette', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1979-02-25', 'user'),
(314, 'ipsum.Phasellus.vitae@Nulladignissim.org', 'Nelle', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1999-12-11', 'user'),
(315, 'ipsum.dolor.sit@hendreritconsectetuer.co.uk', 'Kaseem', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1983-02-27', 'user'),
(386, 'Aenean.sed@amet.com', 'Regan', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1980-03-28', 'user'),
(387, 'cubilia.Curae@ante.edu', 'Kelly', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1981-01-24', 'user'),
(388, 'ultricies.ligula.Nullam@erosProin.org', 'Kaye', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1991-10-26', 'user'),
(389, 'rhoncus@aarcuSed.co.uk', 'Olivia', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1986-01-06', 'user'),
(390, 'in.consectetuer@aliquet.co.uk', 'Wang', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1992-02-23', 'user'),
(391, 'Aliquam.adipiscing@posuere.co.uk', 'Neil', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1983-09-11', 'user'),
(392, 'eu.odio.Phasellus@eget.co.uk', 'Maggy', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1977-02-23', 'user'),
(393, 'non@in.com', 'Peter', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1985-03-06', 'user'),
(394, 'pulvinar.arcu.et@viverraMaecenasiaculis.org', 'George', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '2001-01-26', 'user'),
(395, 'Cras@ornareFuscemollis.ca', 'Herrod', '$2y$10$EMEB6sG9yOT98OMgo7BcteJBKg7J4R/X31F5YvN4FHLBhyBmHUyVq', '1982-04-13', 'user'),
(396, 'biancafilipa10@gmail.com', 'MissCharlott', '$2y$10$FMxz6TA2sisAd1Ztf5yB0.orFDBFNoQTyWtHMrCUeRKbv.AoOpZcu', '2004-01-08', 'user'),
(423, 'cutthisname@hotmail.com', 'asdd', '$2y$10$6BwKKVIYjyfKj2bwxNioyeQJsUTT0HR/LROZXAaHMQ51mq3SJ13Cy', '2004-12-07', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `rankings`
--

CREATE TABLE `rankings` (
  `id` int(11) NOT NULL,
  `place` int(11) NOT NULL DEFAULT '99999',
  `time` varchar(50) NOT NULL,
  `money` int(11) NOT NULL DEFAULT '0',
  `kills` int(11) NOT NULL DEFAULT '0',
  `player` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `rankings`
--

INSERT INTO `rankings` (`id`, `place`, `time`, `money`, `kills`, `player`) VALUES
(19, 43, '00:50:30:77', 9867, 269, 243),
(20, 52, '00:43:31:69', 1214, 366, 236),
(21, 5, '00:95:44:56', 2729, 76, 236),
(22, 83, '00:08:83:88', 7307, 521, 242),
(23, 67, '00:26:22:00', 7180, 503, 240),
(24, 59, '00:33:84:47', 3645, 304, 242),
(25, 15, '00:86:20:78', 1298, 449, 243),
(26, 56, '00:36:10:14', 4559, 487, 239),
(27, 73, '00:21:80:92', 5876, 287, 238),
(28, 80, '00:12:69:93', 1355, 2, 236),
(29, 39, '00:56:61:71', 9970, 63, 237),
(30, 49, '00:44:78:74', 2012, 360, 238),
(31, 25, '00:75:45:52', 6326, 461, 245),
(32, 3, '00:97:87:49', 4334, 54, 245),
(33, 50, '00:44:56:80', 4010, 498, 242),
(34, 44, '00:46:91:08', 8210, 350, 285),
(35, 70, '00:23:94:93', 5694, 67, 277),
(36, 34, '00:64:68:99', 8653, 182, 269),
(37, 13, '00:89:23:90', 4565, 678, 279),
(38, 57, '00:36:03:14', 8565, 444, 274),
(39, 10, '00:90:92:90', 4998, 189, 278),
(40, 66, '00:26:83:89', 9149, 587, 295),
(41, 63, '00:31:90:01', 6302, 241, 275),
(42, 88, '00:05:12:57', 1594, 190, 313),
(43, 62, '00:32:52:18', 4718, 440, 272),
(44, 6, '00:94:78:80', 1224, 511, 283),
(45, 68, '00:25:23:08', 2343, 4, 306),
(46, 16, '00:84:02:82', 7830, 340, 278),
(47, 71, '00:23:82:48', 5660, 222, 281),
(48, 74, '00:19:68:12', 7335, 209, 292),
(49, 37, '00:61:36:65', 3471, 609, 269),
(50, 27, '00:72:12:37', 6614, 560, 288),
(51, 72, '00:22:30:28', 5045, 248, 272),
(52, 61, '00:32:60:39', 5620, 633, 288),
(53, 82, '00:09:16:61', 7648, 663, 269),
(54, 7, '00:93:89:47', 8690, 267, 268),
(55, 32, '00:64:79:04', 2588, 571, 287),
(56, 91, '00:02:20:78', 6828, 505, 269),
(57, 4, '00:95:46:93', 7526, 381, 291),
(58, 75, '00:19:53:25', 1933, 301, 296),
(59, 20, '00:78:35:02', 3803, 38, 293),
(60, 48, '00:45:38:75', 3819, 494, 291),
(61, 45, '00:46:37:14', 7924, 524, 295),
(62, 60, '00:33:77:21', 6519, 210, 305),
(63, 78, '00:15:39:54', 4624, 425, 291),
(64, 90, '00:03:09:40', 9800, 79, 281),
(65, 55, '00:37:87:66', 5533, 586, 296),
(66, 19, '00:78:55:28', 4205, 488, 290),
(67, 31, '00:65:26:86', 1684, 301, 270),
(68, 35, '00:64:00:84', 9647, 533, 283),
(69, 84, '00:06:83:82', 3597, 129, 282),
(70, 79, '00:14:23:30', 3543, 348, 275),
(71, 77, '00:16:34:21', 6299, 8, 284),
(72, 38, '00:58:72:38', 1663, 550, 266),
(73, 26, '00:73:78:87', 7550, 82, 277),
(74, 18, '00:82:47:39', 8824, 46, 292),
(75, 28, '00:68:88:69', 7219, 346, 302),
(76, 24, '00:76:64:77', 7931, 92, 269),
(77, 85, '00:06:52:38', 4819, 526, 290),
(78, 22, '00:77:25:32', 9174, 115, 278),
(79, 40, '00:55:10:30', 1500, 271, 303),
(80, 65, '00:28:34:83', 1376, 19, 284),
(81, 92, '00:00:93:31', 8675, 69, 276),
(82, 47, '00:45:71:12', 3644, 77, 296),
(83, 53, '00:40:77:47', 5597, 512, 310),
(84, 51, '00:44:09:67', 6280, 542, 392),
(85, 76, '00:19:17:96', 4625, 593, 387),
(86, 33, '00:64:72:13', 9148, 88, 390),
(87, 87, '00:05:37:46', 3356, 8, 388),
(88, 46, '00:46:34:94', 6122, 247, 388),
(89, 17, '00:83:73:31', 2812, 476, 387),
(90, 42, '00:51:33:62', 4966, 451, 387),
(91, 41, '00:53:95:72', 4876, 165, 394),
(92, 64, '00:29:92:78', 3569, 77, 389),
(93, 21, '00:78:00:64', 5768, 377, 391),
(94, 12, '00:89:39:34', 8161, 691, 390),
(95, 86, '00:05:73:62', 6153, 229, 388),
(96, 30, '00:66:64:24', 4796, 620, 395),
(97, 54, '00:39:03:84', 2895, 673, 386),
(98, 8, '00:93:09:28', 5121, 417, 389),
(99, 81, '00:12:48:76', 7578, 150, 389),
(100, 9, '00:92:84:39', 3594, 241, 389),
(101, 89, '00:04:16:41', 7397, 659, 395),
(102, 69, '00:24:60:26', 1227, 470, 389),
(103, 14, '00:86:54:50', 4330, 402, 386),
(104, 11, '00:89:66:14', 5351, 595, 386),
(105, 23, '00:77:12:24', 3919, 71, 393),
(106, 58, '00:34:20:51', 6471, 333, 390),
(107, 36, '00:62:55:59', 8984, 155, 389),
(108, 29, '00:68:73:32', 9250, 475, 392),
(109, 2, '12:32:12:10', 5000000, 22500, 28),
(110, 1, '63:66:45:92', 883, 280, 280);

-- --------------------------------------------------------

--
-- Table structure for table `requesting_rankings`
--

CREATE TABLE `requesting_rankings` (
  `id` int(11) NOT NULL,
  `time` varchar(50) NOT NULL,
  `money` int(11) NOT NULL DEFAULT '0',
  `kills` int(11) NOT NULL DEFAULT '0',
  `player` int(11) NOT NULL DEFAULT '0',
  `manage` varchar(50) NOT NULL DEFAULT 'waiting'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `requesting_rankings`
--

INSERT INTO `requesting_rankings` (`id`, `time`, `money`, `kills`, `player`, `manage`) VALUES
(62, '75:30:41:86', 4319, 670, 240, 'waiting'),
(63, '28:22:09:07', 9132, 95, 237, 'waiting'),
(64, '96:08:74:65', 9481, 663, 244, 'waiting'),
(65, '79:47:14:26', 215, 151, 242, 'waiting'),
(66, '13:36:15:95', 7686, 698, 239, 'waiting'),
(67, '96:69:93:21', 6147, 446, 236, 'waiting'),
(68, '34:12:48:49', 4629, 257, 239, 'waiting'),
(69, '44:84:74:05', 2529, 36, 240, 'waiting'),
(70, '07:47:66:10', 9724, 651, 240, 'waiting'),
(71, '61:74:17:30', 6334, 185, 244, 'waiting'),
(72, '45:70:79:82', 833, 359, 241, 'waiting'),
(73, '89:56:41:31', 8185, 520, 242, 'waiting'),
(74, '55:53:19:59', 7561, 209, 244, 'waiting'),
(75, '96:09:72:52', 9216, 69, 238, 'waiting'),
(76, '39:38:94:67', 4542, 212, 240, 'waiting'),
(77, '93:49:87:44', 9089, 647, 308, 'waiting'),
(78, '13:17:23:76', 6494, 362, 315, 'waiting'),
(79, '73:60:22:32', 4320, 156, 282, 'waiting'),
(80, '98:64:40:33', 635, 208, 289, 'waiting'),
(81, '64:68:24:97', 5529, 381, 310, 'waiting'),
(82, '66:84:78:28', 9814, 307, 315, 'waiting'),
(83, '56:52:83:47', 855, 598, 273, 'waiting'),
(84, '98:29:34:71', 8158, 37, 300, 'waiting'),
(85, '67:10:59:83', 7156, 301, 281, 'waiting'),
(86, '22:82:49:03', 993, 218, 314, 'waiting'),
(87, '44:97:46:77', 7956, 141, 276, 'waiting'),
(88, '82:11:24:00', 432, 484, 306, 'waiting'),
(89, '66:30:15:97', 8990, 329, 266, 'waiting'),
(90, '28:88:24:64', 8681, 368, 275, 'waiting'),
(92, '07:69:42:99', 3583, 486, 297, 'waiting'),
(93, '42:54:91:32', 4610, 412, 305, 'waiting'),
(94, '61:56:00:42', 3913, 408, 293, 'waiting'),
(95, '94:38:67:81', 9762, 204, 281, 'waiting'),
(96, '35:69:16:25', 3277, 51, 300, 'waiting'),
(97, '17:76:22:76', 2258, 563, 292, 'waiting'),
(98, '82:43:51:75', 2769, 417, 303, 'waiting'),
(99, '87:23:74:62', 9473, 39, 281, 'waiting'),
(100, '76:09:70:80', 8045, 299, 282, 'waiting'),
(101, '66:71:73:05', 4832, 656, 281, 'waiting'),
(102, '92:24:79:04', 8880, 406, 287, 'waiting'),
(104, '80:72:28:05', 2799, 152, 305, 'waiting'),
(105, '41:45:90:18', 5481, 87, 283, 'waiting'),
(106, '41:71:25:77', 1413, 612, 268, 'waiting'),
(107, '12:58:86:60', 3262, 76, 291, 'waiting'),
(108, '06:44:51:59', 9786, 326, 302, 'waiting'),
(109, '76:70:47:45', 2584, 175, 270, 'waiting'),
(110, '17:08:20:40', 2487, 535, 301, 'waiting'),
(111, '07:24:51:50', 5421, 556, 291, 'waiting'),
(112, '40:32:00:90', 6964, 290, 269, 'waiting'),
(113, '63:43:46:91', 6695, 346, 295, 'waiting'),
(114, '89:46:03:09', 7861, 85, 268, 'waiting'),
(115, '73:93:59:17', 8230, 425, 298, 'waiting'),
(116, '65:41:09:32', 5914, 55, 300, 'waiting'),
(117, '28:58:23:27', 3559, 592, 395, 'waiting'),
(118, '57:41:77:83', 2732, 469, 387, 'waiting'),
(119, '98:72:10:25', 7957, 285, 393, 'waiting'),
(120, '50:20:00:23', 3785, 134, 394, 'waiting'),
(121, '44:32:35:23', 8870, 356, 386, 'waiting'),
(122, '07:62:96:37', 5593, 36, 388, 'waiting'),
(123, '45:97:08:50', 209, 502, 393, 'waiting'),
(124, '15:70:97:33', 1698, 644, 387, 'waiting'),
(125, '08:29:25:22', 885, 374, 388, 'waiting'),
(126, '51:41:34:30', 860, 193, 390, 'waiting'),
(127, '80:65:46:33', 5263, 685, 393, 'waiting'),
(128, '16:59:44:02', 3274, 99, 391, 'waiting'),
(129, '00:32:24:37', 4222, 5, 388, 'waiting'),
(130, '00:95:21:88', 6535, 121, 386, 'waiting'),
(131, '89:96:23:04', 1234, 260, 394, 'waiting'),
(132, '17:08:39:18', 5935, 583, 391, 'waiting'),
(133, '39:19:63:82', 4272, 232, 391, 'waiting'),
(134, '65:86:49:32', 5521, 259, 392, 'waiting'),
(135, '86:45:98:64', 8849, 35, 386, 'waiting'),
(136, '21:20:06:81', 8993, 518, 386, 'waiting'),
(138, '31:23:12', 123, 12312, 423, 'waiting'),
(139, '32:01', 654, 211, 396, 'waiting');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`country`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `name` (`username`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`) USING BTREE;

--
-- Indexes for table `rankings`
--
ALTER TABLE `rankings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `player-requests` (`player`) USING BTREE;

--
-- Indexes for table `requesting_rankings`
--
ALTER TABLE `requesting_rankings`
  ADD KEY `id` (`id`),
  ADD KEY `player-requests` (`player`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=424;
--
-- AUTO_INCREMENT for table `rankings`
--
ALTER TABLE `rankings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `requesting_rankings`
--
ALTER TABLE `requesting_rankings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `rankings`
--
ALTER TABLE `rankings`
  ADD CONSTRAINT `rankings_ibfk_1` FOREIGN KEY (`player`) REFERENCES `players` (`id`);

--
-- Constraints for table `requesting_rankings`
--
ALTER TABLE `requesting_rankings`
  ADD CONSTRAINT `player-requests` FOREIGN KEY (`player`) REFERENCES `players` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
