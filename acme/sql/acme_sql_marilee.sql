-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2018 at 11:25 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acme`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryId` int(10) UNSIGNED NOT NULL,
  `categoryName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Category classifications of inventory items';

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryId`, `categoryName`) VALUES
(1, 'Cannon'),
(2, 'Explosive'),
(3, 'Misc'),
(4, 'Rocket'),
(5, 'Trap');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `clientId` int(10) UNSIGNED NOT NULL,
  `clientFirstname` varchar(15) NOT NULL,
  `clientLastname` varchar(25) NOT NULL,
  `clientEmail` varchar(40) NOT NULL,
  `clientPassword` varchar(255) NOT NULL,
  `clientLevel` enum('1','2','3') NOT NULL DEFAULT '1',
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`clientId`, `clientFirstname`, `clientLastname`, `clientEmail`, `clientPassword`, `clientLevel`, `comments`) VALUES
(17, 'Admin', 'User', 'admin@cit336.net', '$2y$10$byKprzHhu5tVwwJOvsXJaeJWyx63Z82zFYehrZm1MmkyVIl3suCvi', '3', ''),
(18, 'Marilee', 'Austin', 'marileeaustin@gmail.com', '$2y$10$P4sjYT3jZw1tOoZBYa3rveYadavtpNHUu7sMhckV6Uv.hsPXO..be', '1', ''),
(26, 'Miss', 'Tuffett', 'curd@mail.com', '$2y$10$KDrxiWzjV.QKjnsZwFrTgecWI8zkACHKo6aewn1Dxkmow9LF/3Sv6', '1', ''),
(27, 'Humpty', 'Dumpty', 'wall@mail.com', '$2y$10$sKfLSRMHuOWCMwzsGaUP6.bjiXIpe0DxJDwmW8VTWTrR2ISf9UNn6', '1', ''),
(28, 'Little', 'Lamb', 'mary@mail.com', '$2y$10$ebplhCpEXdoQoqjMNcBwCeMNQk1iAK4SO/CTaKlGtT/OaTUkoWcxO', '1', ''),
(29, 'Peter', 'Piper', 'pickle@mail.com', '$2y$10$rD8ZBdKWp9bomcrn/rLB1uZtBGqLVUn.2fJd9TQVPuIhCVQrylwQW', '1', ''),
(30, 'Jack', 'B-Nimble', 'candlestick@mail.com', '$2y$10$537l.sfrICckwGNZ992bcOg1Wy/HxhbdEKll9AstOFCVZQZ/5dn.C', '1', ''),
(31, 'Miss', 'Muffett', 'tuffett@mail.com', '$2y$10$lam5Gd/ySB0Tv6H97/4nzOLYll7AdIDZ8Mme6n/.tPMldfdNTMxCu', '1', ''),
(32, 'Frere', 'Jaques', 'lematin@mail.com', '$2y$10$VlBHoC5iMR.RGYssD9/9KesWkPxtDCX4gi4LzhraJFmiFL1Usxd4G', '1', ''),
(33, 'Diddle', 'Diddle', 'catandfiddle@mail.com', '$2y$10$X8niEpSEH1iB8FwAWafek.XCKX46sTbOjVMOs1MQ0fYp9Lkdb0Z5u', '1', ''),
(34, 'Jack', 'Tumbling', 'hill@mail.com', '$2y$10$RNQdHjQR2oFIKmr2I65HHOjTSA4Yv/6QVw3V0EL3IlLFvh7hsnPT.', '1', ''),
(35, 'Itsy-Bitsy', 'Spider', 'spout@mail.com', '$2y$10$CDm/kIMXPHljgj8G4xTNE.OcFTpqcHO0GL6vhWVypAiINJyVqdF2q', '1', ''),
(36, 'Mary ', 'Contrary', 'garden@mail.com', '$2y$10$HMGRf9bENTj40YzPOldUzO7osnqmfdlyCuZ9Q6cy/Sx3S6limF0Bm', '1', ''),
(37, 'Little-Bo', 'Peep', 'sheep@mail.com', '$2y$10$rGc9eJKJz56RMNvC1QaRpO6.Z69HTRvuUvtJOTpLDMEQd.m4kSSlW', '1', ''),
(38, 'Little-Boy', 'Blue', 'horn@mail.com', '$2y$10$ieGtHC757lqcqUDjlOFIHOrrYbwdG9mqtQGGtZYj67b8Fym40WogS', '1', ''),
(39, 'King', 'Cole', 'merry@mail.com', '$2y$10$Gt7/snNOBrFYpdXb1mWO7.mHI3HGL1nztTB2IyIPPLHWBjpSNRi96', '1', ''),
(40, 'Peter', 'Pumpkin', 'eater@mail.com', '$2y$10$QoIHqXcUdzE39D8GTCkKr.D8ZJ4RNSnZizKZCcGmWskcR3kKSIv1u', '1', ''),
(41, 'Hearts', 'Queen', 'spade@mail.com', '$2y$10$3aQ4irLbRWwNW0wF5SFkyOFpY0BIwL.0V5vbvBYbqmIvbvSEQKxEi', '1', ''),
(42, 'Farmer', 'Dell', 'dairy@mail.com', '$2y$10$FuuP2yMc6PKJZP5OBuIER.axMzauV17ctUYr/LpkD6viLlWGul4fi', '1', ''),
(43, 'Star', 'Light', 'bright@mail.com', '$2y$10$oB1fZI/AeiYY4XFrEM.mvuKX582cDAxvi8k3UyDOeGsFufavHp0.O', '1', ''),
(44, 'Bugs', 'Bunny', 'carrot@mail.com', '$2y$10$C2W1HZLSiFNcWJiE/ZrkZ.h9H5g3s.TGDVIwm42KzBu/1sJrc9tUe', '1', ''),
(45, 'Daffy ', 'Duck', 'pond@mail.com', '$2y$10$8AiPkHzWYzKuLGDgIQsxJOiKL4Apvcpske44/vGNHESDAcyP0DDam', '1', ''),
(46, 'Foghorn', 'Leghorn', 'chicken@mail.com', '$2y$10$LyfCN4THJ47gFKKcKEfzG.7xPSL7hjWM8jrmYoYEkj4Edz6FqVfom', '1', ''),
(47, 'Elmer', 'Fudd', 'toons@mail.com', '$2y$10$dz.sHmrY9ZozQVMhfwTvKumOaBcLIKEuPwVILqh3m9wsgJPRJjxE.', '1', ''),
(48, 'Speedy', 'Gonzales', 'speed@mail.com', '$2y$10$pti2Lp5h71swE/p200xESuu4Ecm3BHBjJqtgLQm41ZyCP43VmpjU2', '1', ''),
(49, 'Wile', 'Coyote', 'smash@mail.com', '$2y$10$p0S40o/Ywi26pW/m0/vlpejIVTi84IYhULtjD6Rco..AChDNYyyJq', '1', ''),
(50, 'Tooth', 'Fairy', 'pillow@mail.com', '$2y$10$ni96HrpYJKfAG/4IBGHpx.u4QZ/aboQpdZGiqqQK9mt0oF.bpSxoe', '1', ''),
(51, 'Santa', 'Clause', 'northpole@mail.com', '$2y$10$lKjIc6BdsFCuPQdQivvSounrc98rg2VxKCfhEcqBPQ.PT5G9I8we.', '1', ''),
(52, 'Darth', 'Vader', 'rebellion@mail.com', '$2y$10$yLd6rp1uAeWDvKZnU7p9u.3Jm2pudarayYEq6bh9wdGzXnOJpX0yi', '1', ''),
(53, 'Elmer', 'Fudd', 'acme@mail.com', '$2y$10$KRErqzxelLsUNdTehTpuZ.wFDFwJU0YXRmvA9gGtzOJoIl0ckHNJ2', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imgId` int(10) UNSIGNED NOT NULL,
  `invId` int(10) UNSIGNED NOT NULL,
  `imgName` varchar(100) CHARACTER SET latin1 NOT NULL,
  `imgPath` varchar(150) CHARACTER SET latin1 NOT NULL,
  `imgDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imgId`, `invId`, `imgName`, `imgPath`, `imgDate`) VALUES
(33, 3, 'catapult.png', '/acme/images/products/catapult.png', '2018-11-28 00:41:33'),
(34, 3, 'catapult-tn.png', '/acme/images/products/catapult-tn.png', '2018-11-28 00:41:33'),
(35, 14, 'helmet.png', '/acme/images/products/helmet.png', '2018-11-28 00:41:44'),
(36, 14, 'helmet-tn.png', '/acme/images/products/helmet-tn.png', '2018-11-28 00:41:44'),
(37, 4, 'roadrunner.jpg', '/acme/images/products/roadrunner.jpg', '2018-11-28 00:41:59'),
(38, 4, 'roadrunner-tn.jpg', '/acme/images/products/roadrunner-tn.jpg', '2018-11-28 00:41:59'),
(41, 5, 'trap.jpg', '/acme/images/products/trap.jpg', '2018-11-28 00:42:26'),
(42, 5, 'trap-tn.jpg', '/acme/images/products/trap-tn.jpg', '2018-11-28 00:42:26'),
(43, 13, 'piano.jpg', '/acme/images/products/piano.jpg', '2018-11-28 00:42:51'),
(44, 13, 'piano-tn.jpg', '/acme/images/products/piano-tn.jpg', '2018-11-28 00:42:51'),
(45, 6, 'hole.png', '/acme/images/products/hole.png', '2018-11-28 00:43:03'),
(46, 6, 'hole-tn.png', '/acme/images/products/hole-tn.png', '2018-11-28 00:43:03'),
(47, 7, 'koenigsegg.jpg', '/acme/images/products/koenigsegg.jpg', '2018-11-28 00:43:19'),
(48, 7, 'koenigsegg-tn.jpg', '/acme/images/products/koenigsegg-tn.jpg', '2018-11-28 00:43:19'),
(49, 10, 'mallet.png', '/acme/images/products/mallet.png', '2018-11-28 00:43:28'),
(50, 10, 'mallet-tn.png', '/acme/images/products/mallet-tn.png', '2018-11-28 00:43:28'),
(51, 9, 'rubberband.jpg', '/acme/images/products/rubberband.jpg', '2018-11-28 00:43:39'),
(52, 9, 'rubberband-tn.jpg', '/acme/images/products/rubberband-tn.jpg', '2018-11-28 00:43:39'),
(53, 2, 'mortar.jpg', '/acme/images/products/mortar.jpg', '2018-11-28 00:43:46'),
(54, 2, 'mortar-tn.jpg', '/acme/images/products/mortar-tn.jpg', '2018-11-28 00:43:46'),
(55, 15, 'rope.jpg', '/acme/images/products/rope.jpg', '2018-11-28 00:43:56'),
(56, 15, 'rope-tn.jpg', '/acme/images/products/rope-tn.jpg', '2018-11-28 00:43:56'),
(57, 12, 'seed.jpg', '/acme/images/products/seed.jpg', '2018-11-28 00:44:05'),
(58, 12, 'seed-tn.jpg', '/acme/images/products/seed-tn.jpg', '2018-11-28 00:44:05'),
(59, 1, 'rocket.png', '/acme/images/products/rocket.png', '2018-11-28 00:44:13'),
(60, 1, 'rocket-tn.png', '/acme/images/products/rocket-tn.png', '2018-11-28 00:44:13'),
(61, 17, 'bomb.png', '/acme/images/products/bomb.png', '2018-11-28 00:44:20'),
(62, 17, 'bomb-tn.png', '/acme/images/products/bomb-tn.png', '2018-11-28 00:44:21'),
(63, 16, 'fence.png', '/acme/images/products/fence.png', '2018-11-28 00:44:30'),
(64, 16, 'fence-tn.png', '/acme/images/products/fence-tn.png', '2018-11-28 00:44:31'),
(65, 11, 'tnt.png', '/acme/images/products/tnt.png', '2018-11-28 00:44:40'),
(66, 11, 'tnt-tn.png', '/acme/images/products/tnt-tn.png', '2018-11-28 00:44:40'),
(69, 13, 'squaregrand.jpg', '/acme/images/products/squaregrand.jpg', '2018-11-28 19:48:09'),
(70, 13, 'squaregrand-tn.jpg', '/acme/images/products/squaregrand-tn.jpg', '2018-11-28 19:48:10'),
(71, 13, 'browngrand.jpg', '/acme/images/products/browngrand.jpg', '2018-11-28 19:48:30'),
(72, 13, 'browngrand-tn.jpg', '/acme/images/products/browngrand-tn.jpg', '2018-11-28 19:48:30'),
(73, 3, 'catapults_mangonel.jpg', '/acme/images/products/catapults_mangonel.jpg', '2018-11-28 22:16:15'),
(74, 3, 'catapults_mangonel-tn.jpg', '/acme/images/products/catapults_mangonel-tn.jpg', '2018-11-28 22:16:15'),
(77, 11, 'dynamite.jpg', '/acme/images/products/dynamite.jpg', '2018-11-28 22:18:34'),
(78, 11, 'dynamite-tn.jpg', '/acme/images/products/dynamite-tn.jpg', '2018-11-28 22:18:34'),
(79, 9, '700425046.jpg', '/acme/images/products/700425046.jpg', '2018-11-28 22:34:56'),
(80, 9, '700425046-tn.jpg', '/acme/images/products/700425046-tn.jpg', '2018-11-28 22:34:56'),
(81, 9, 'giant_rubber_bands.jpg', '/acme/images/products/giant_rubber_bands.jpg', '2018-11-28 22:35:06'),
(82, 9, 'giant_rubber_bands-tn.jpg', '/acme/images/products/giant_rubber_bands-tn.jpg', '2018-11-28 22:35:06'),
(83, 14, '6404-Shox-Sniper-Motorcycle-Helmet-Black-1600-2.jpg', '/acme/images/products/6404-Shox-Sniper-Motorcycle-Helmet-Black-1600-2.jpg', '2018-11-29 17:19:35'),
(84, 14, '6404-Shox-Sniper-Motorcycle-Helmet-Black-1600-2-tn.jpg', '/acme/images/products/6404-Shox-Sniper-Motorcycle-Helmet-Black-1600-2-tn.jpg', '2018-11-29 17:19:35'),
(85, 14, 'rpha-11-full-face-motorcycle-helmet-hjc-disney-pixar-mike-wazowski.jpg', '/acme/images/products/rpha-11-full-face-motorcycle-helmet-hjc-disney-pixar-mike-wazowski.jpg', '2018-11-29 17:19:44'),
(86, 14, 'rpha-11-full-face-motorcycle-helmet-hjc-disney-pixar-mike-wazowski-tn.jpg', '/acme/images/products/rpha-11-full-face-motorcycle-helmet-hjc-disney-pixar-mike-wazowski-tn.jpg', '2018-11-29 17:19:44'),
(87, 18, 'box_trap_blog.jpeg', '/acme/images/products/box_trap_blog.jpeg', '2018-11-30 19:42:25'),
(88, 18, 'box_trap_blog-tn.jpeg', '/acme/images/products/box_trap_blog-tn.jpeg', '2018-11-30 19:42:25'),
(89, 10, '31QFKQePVcL.jpg', '/acme/images/products/31QFKQePVcL.jpg', '2018-11-30 20:18:30'),
(90, 10, '31QFKQePVcL-tn.jpg', '/acme/images/products/31QFKQePVcL-tn.jpg', '2018-11-30 20:18:30'),
(91, 10, 'jgoh_harley_quinn_mallet.jpg', '/acme/images/products/jgoh_harley_quinn_mallet.jpg', '2018-11-30 20:18:37'),
(92, 10, 'jgoh_harley_quinn_mallet-tn.jpg', '/acme/images/products/jgoh_harley_quinn_mallet-tn.jpg', '2018-11-30 20:18:37'),
(93, 8, 'anvil.png', '/acme/images/products/anvil.png', '2018-12-04 21:22:04'),
(94, 8, 'anvil-tn.png', '/acme/images/products/anvil-tn.png', '2018-12-04 21:22:04'),
(103, 19, 'cat.png', '/acme/images/products/cat.png', '2018-12-13 20:42:10'),
(104, 19, 'cat-tn.png', '/acme/images/products/cat-tn.png', '2018-12-13 20:42:10'),
(105, 19, 'kitten.png', '/acme/images/products/kitten.png', '2018-12-13 20:42:18'),
(106, 19, 'kitten-tn.png', '/acme/images/products/kitten-tn.png', '2018-12-13 20:42:18');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `invId` int(10) UNSIGNED NOT NULL,
  `invName` varchar(50) NOT NULL DEFAULT '',
  `invDescription` text NOT NULL,
  `invImage` varchar(50) NOT NULL DEFAULT '',
  `invThumbnail` varchar(50) NOT NULL DEFAULT '',
  `invPrice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `invStock` smallint(6) NOT NULL DEFAULT '0',
  `invSize` smallint(6) NOT NULL DEFAULT '0',
  `invWeight` smallint(6) NOT NULL DEFAULT '0',
  `invLocation` varchar(35) NOT NULL DEFAULT '',
  `categoryId` int(10) UNSIGNED NOT NULL,
  `invVendor` varchar(20) NOT NULL DEFAULT '',
  `invStyle` varchar(20) NOT NULL DEFAULT '',
  `invFeatured` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Acme Inc. Inventory Table';

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`invId`, `invName`, `invDescription`, `invImage`, `invThumbnail`, `invPrice`, `invStock`, `invSize`, `invWeight`, `invLocation`, `categoryId`, `invVendor`, `invStyle`, `invFeatured`) VALUES
(1, 'Rocket', 'Rocket for multiple purposes. This can be launched independently to deliver a payload or strapped on to help get you to where you want to be FAST!!! Really Fast!', '/acme/images/products/rocket.png', '/acme/images/products/rocket-tn.png', '1320.00', 5, 60, 90, 'California', 4, 'Goddard', 'metal', NULL),
(2, 'Mortar', 'Our Mortar is very powerful. This cannon can launch a projectile or bomb 3 miles. Made of solid steel and mounted on cement or metal stands [not included].', '/acme/images/products/mortar.jpg', '/acme/images/products/mortar-tn.jpg', '1500.00', 26, 250, 750, 'San Jose', 1, 'Smith & Wesson', 'Metal', NULL),
(3, 'Catapult', 'Our best wooden catapult. Ideal for hurling objects for up to 1000 yards. Payloads of up to 300 lbs.', '/acme/images/products/catapult.png', '/acme/images/products/catapult-tn.png', '2500.00', 4, 1569, 400, 'Cedar Point, IO', 1, 'Wooden Creations', 'Wood', NULL),
(4, 'Female RoadRunner Cutout', 'This carbon fiber backed cutout of a female roadrunner is sure to catch the eye of any male roadrunner.', '/acme/images/products/roadrunner.jpg', '/acme/images/products/roadrunner-tn.jpg', '20.00', 500, 27, 2, 'San Jose', 5, 'Picture Perfect', 'Carbon Fiber', NULL),
(5, 'Giant Mouse Trap', 'Our big mouse trap. This trap is multifunctional. It can be used to catch dogs, mountain lions, road runners or even muskrats. Must be staked for larger varmints [stakes not included] and baited with approptiate bait [sold seperately].\r\n', '/acme/images/products/trap.jpg', '/acme/images/products/trap-tn.jpg', '20.00', 34, 470, 28, 'Cedar Point, IO', 5, 'Rodent Control', 'Wood', NULL),
(6, 'Instant Hole', 'Instant hole - Wonderful for creating the appearance of openings.', '/acme/images/products/hole.png', '/acme/images/products/hole-tn.png', '25.00', 269, 24, 2, 'San Jose', 3, 'Hidden Valley', 'Ether', NULL),
(7, 'Koenigsegg CCX', 'This high performance car is sure to get you where you are going fast. It holds the production car land speed record at an amazing 250mph.', '/acme/images/products/koenigsegg.jpg', '/acme/images/products/koenigsegg-tn.jpg', '500000.00', 1, 25000, 3000, 'San Jose', 3, 'Koenigsegg', 'Metal', NULL),
(8, 'Anvil', 'Heavy item for your tough jobs. Drop this on your enemy for maximum results. ', '/acme/images/products/anvil.png', '/acme/images/products/anvil-tn.png', '40.00', 60, 50, 50, 'Harbor Freight, USA', 5, 'Heavy Items', 'Metal', NULL),
(9, 'Monster Rubber Band', 'These are not tiny rubber bands. These are MONSTERS! These bands can stop a train locamotive or be used as a slingshot for cows. Only the best materials are used!', '/acme/images/products/rubberband.jpg', '/acme/images/products/rubberband-tn.jpg', '4.00', 4589, 75, 1, 'Cedar Point, IO', 3, 'Rubbermaid', 'Rubber', NULL),
(10, 'Mallet', 'Ten pound mallet for bonking roadrunners on the head. Can also be used for bunny rabbits.', '/acme/images/products/mallet.png', '/acme/images/products/mallet-tn.png', '25.00', 100, 36, 10, 'Cedar Point, IA', 3, 'Wooden Creations', 'Wood', NULL),
(11, 'TNT', 'The biggest bang for your buck with our nitro-based TNT. Price is per stick.', '/acme/images/products/tnt.png', '/acme/images/products/tnt-tn.png', '10.00', 1000, 25, 2, 'San Jose', 2, 'Nobel Enterprises', 'Plastic', NULL),
(12, 'Roadrunner Custom Bird Seed Mix', 'Our best varmint seed mix - varmints on two or four legs can\'t resist this mix. Contains meat, nuts, cereals and our own special ingredient. Guaranteed to bring them in. Can be used with our monster trap.', '/acme/images/products/seed.jpg', '/acme/images/products/seed-tn.jpg', '8.00', 150, 24, 3, 'San Jose', 5, 'Acme', 'Plastic', NULL),
(13, 'Grand Piano', 'This grand piano is guaranteed to play well and smash anything beneath it if dropped from a height.', '/acme/images/products/piano.jpg', '/acme/images/products/piano-tn.jpg', '3500.00', 36, 500, 1200, 'Cedar Point, IA', 3, 'Wulitzer', 'Wood', NULL),
(14, 'Crash Helmet', 'This carbon fiber and plastic helmet is the ultimate in protection for your head. comes in assorted colors.', '/acme/images/products/helmet.png', '/acme/images/products/helmet-tn.png', '100.00', 25, 48, 9, 'San Jose', 3, 'Suzuki', 'Carbon Fiber', NULL),
(15, 'Nylon Rope', 'This nylon rope is ideal for all uses. Each rope is the highest quality nylon and comes in 100 foot lengths.', '/acme/images/products/rope.jpg', '/acme/images/products/rope-tn.jpg', '15.00', 200, 200, 6, 'San Jose', 3, 'Marina Sales', 'Nylon', NULL),
(16, 'Sticky Fence', 'This fence is covered with Gorilla Glue and is guaranteed to stick to anything that touches it and is sure to hold it tight.', '/acme/images/products/fence.png', '/acme/images/products/fence-tn.png', '75.00', 15, 48, 2, 'San Jose', 3, 'Acme', 'Nylon', NULL),
(17, 'Small Bomb', 'Bomb with a fuse - A little old fashioned, but highly effective. This bomb has the ability to devistate anything within 30 feet.', '/acme/images/products/bomb.png', '/acme/images/products/bomb-tn.png', '275.00', 58, 30, 12, 'San Jose', 2, 'Nobel Enterprises', 'Metal', NULL),
(18, 'Box Traps', 'A trap for wild animals.', '/acme/images/products/box_trap_blog.jpeg', '/acme/images/products/box_trap_blog-tn.jpeg', '45.00', 5, 123, 25, 'Oregon Coast', 5, 'Box Traps', 'Wood', NULL),
(19, 'Siamese Cat', 'Uses it&#39;s claws to create a distraction.', '/acme/images/products/cat.png', '/acme/images/products/kitten.png', '55.00', 12, 45, 35, 'Oregon Coast', 3, 'Cat Shop USA', 'furry', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewId` int(10) UNSIGNED NOT NULL,
  `reviewText` text CHARACTER SET latin1 NOT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `invId` int(10) UNSIGNED NOT NULL,
  `clientId` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewId`, `reviewText`, `reviewDate`, `invId`, `clientId`) VALUES
(8, 'The massive explosion blew up my giant pumpkin! It was incredible. I can&#39;t wait for next Halloween.', '2018-12-07 21:32:41', 11, 18),
(11, 'Go for it! I tried this and it made a great firework show.', '2018-12-08 02:58:12', 11, 18),
(12, 'This is William&#39;s favorite TNT. He would use it in Minecraft.', '2018-12-08 19:01:21', 11, 17),
(13, 'Be careful with this product. It explodes! There should be some kind of warning on the label.', '2018-12-10 20:57:41', 11, 18),
(14, 'I love pianos. These models are perfect for playing and dropping. Make sure to buy more than one so you can do both.', '2018-12-11 01:39:40', 13, 27),
(15, 'These things scare me! I would never buy one. I prefer to fall off a wall.', '2018-12-11 01:40:58', 11, 27),
(17, 'This is another test of the emergency review system.', '2018-12-11 19:24:51', 11, 17),
(18, 'If you push this piano off a wall then all the king&#39;s horses will put it back together.', '2018-12-11 19:57:39', 13, 27),
(19, 'Call the Three Little Pigs before buying this product. They have experience and can give you advice.', '2018-12-11 20:39:22', 11, 17),
(20, 'Don&#39;t post bogus reviews here. It messes up my life!', '2018-12-11 20:49:24', 11, 17),
(24, 'This TNT is compatible with Minecraft.', '2018-12-11 20:51:51', 11, 17),
(26, 'Yo! Buy this stuff.', '2018-12-11 20:55:10', 11, 17),
(29, 'Never ever use TNT while writing PHP.', '2018-12-11 20:57:13', 11, 17),
(30, 'Mary had a little lamb and some TNT too.', '2018-12-11 20:57:45', 11, 17),
(31, 'TNT is my favorite product from ACME inc.', '2018-12-11 21:00:11', 11, 17),
(33, 'I&#39;ve used these to catch wolves who are after my flock. They are so great that I told Little Red Riding Hood about it.', '2018-12-11 22:25:52', 5, 28),
(34, 'I love to stretch these across my backyard. It&#39;s a great way to jump over something. ', '2018-12-11 22:35:46', 9, 30),
(35, 'My favorite pastime is to jump and this is a great way to teach others how to do it. Just put the hole in the way and watch them jump!', '2018-12-11 22:37:23', 6, 30),
(36, 'I tried this and found it boring. I would rather jump over the problem.', '2018-12-11 22:39:52', 3, 30),
(38, 'The sheep&#39;s wool sticks to this fence. It took hours to wash them off. ', '2018-12-11 22:48:48', 16, 28),
(39, 'My sheep actually love this seed. Of course, they&#39;ll eat just about anything. ', '2018-12-11 23:09:26', 12, 28),
(41, 'I used to throw these around when I was little. I mean more little than I am now.', '2018-12-11 23:13:36', 17, 28),
(42, 'I caught a coyote with this once. He bit me when I opened it up. At least he never came back again.', '2018-12-11 23:17:31', 18, 28),
(43, 'I found my lost sheep hiding inside the trunk. Can you believe it was that roomy?', '2018-12-11 23:20:01', 7, 28),
(44, 'I tried storing my pickles in this cannon. It gave an amazing flavor.', '2018-12-11 23:22:11', 2, 29),
(45, 'I use this anvil to hold down my pickle jars when there&#39;s a hurricane. It makes it harder for giants to steal them too.', '2018-12-11 23:23:48', 8, 29),
(46, 'If you are a spider these are a great alternative to webs. Save some time and buy these!', '2018-12-12 16:41:10', 16, 35),
(47, 'These are great for smashing spiders. One time, a spider frightened me away but now I have a mallet. My curds and whey will never be left alone again.', '2018-12-12 16:46:33', 10, 31),
(48, 'These are too big for spiders. I need something smaller.', '2018-12-12 17:41:42', 17, 31),
(49, 'On the other hand, if you have spiders from the forbidden forest call Harry Potter. He uses these.', '2018-12-12 17:46:56', 17, 31),
(51, 'Don&#39;t use these in your hair. I like pink little ones that match my dress.', '2018-12-12 17:49:10', 9, 31),
(52, 'You could set up a trap for spiders. These would smash these good!', '2018-12-12 17:50:04', 8, 31),
(53, 'I would ride this to the moon.', '2018-12-12 17:50:42', 1, 31),
(54, 'These are great for junior jumpers!', '2018-12-12 18:53:23', 14, 30),
(61, 'If you buy this then I&#39;ll come jump over it.', '2018-12-12 19:12:49', 1, 30),
(63, 'I wonder if this would jump over a bridge. Has anyone tried it?', '2018-12-12 19:21:19', 7, 30),
(64, 'I can light up any dark place. Even this portable hole.', '2018-12-12 20:17:09', 6, 43),
(66, 'We give this as a gift for every purchase over $100. It&#39;s a customer favorite.', '2018-12-12 23:30:33', 12, 17),
(67, 'Maybe this is where my sheep went. I&#39;m too scared to check. I&#39;ll ask Jack B-Nimble to look while he&#39;s jumping over.', '2018-12-13 16:44:39', 6, 37),
(68, 'I found my sheep so much faster with this car. It beats walking any day. Now if only they would stop wandering.', '2018-12-13 16:47:09', 7, 37),
(70, 'This catapult can throw a car.', '2018-12-13 17:34:50', 3, 44),
(73, 'Someone hit me on the head with this one. I had a goose-egg the size of a basketball. ', '2018-12-13 17:44:24', 10, 45),
(74, 'Sufferin&#39; Succotash! I love this. I even bought one for my mom.', '2018-12-13 17:46:09', 2, 45),
(77, 'We deliver this product for free. It takes 2 semis but it&#39;s worth it.', '2018-12-13 20:46:56', 5, 17),
(81, 'I love these things!!! I have a two and take them for walks every day. They make great exercise. ', '2018-12-13 20:57:21', 4, 49),
(82, 'This box is exactly a peck. I don&#39;t know if it works for a trap. I just use it to pick pickled peppers.', '2018-12-14 02:53:27', 18, 29),
(87, 'These would ruin my hairdo. I would rather ride a pony.', '2018-12-14 20:04:42', 14, 28),
(89, 'This is trying to fix the review system.', '2018-12-14 20:12:56', 7, 28),
(91, 'I wonder if these wander too. Maybe I should change animals.', '2018-12-14 20:21:55', 4, 28),
(99, 'Why are there so many reviews for this product?', '2018-12-14 20:41:59', 11, 28),
(119, 'What if we still used these today?', '2018-12-14 21:16:19', 3, 28),
(120, 'What a cute kitty!', '2018-12-14 21:18:13', 19, 27),
(122, 'I&#39;m glad this isn&#39;t by my wall.', '2018-12-14 22:02:13', 6, 27),
(124, 'Someone blew up my wall!', '2018-12-14 22:03:03', 17, 27),
(125, 'If only I could bounce back as easily.', '2018-12-14 22:04:06', 9, 27),
(126, 'I wonder why no one has bought this product.', '2018-12-14 22:06:21', 15, 27),
(127, 'I used the force to move this rocket. It amazed all my stormtroopers.', '2018-12-14 22:10:36', 1, 52),
(128, 'I&#39;ve used this to catch a pesky rabbit. I&#39;ve caught him many times. The problem is he gets away.', '2018-12-17 21:50:09', 15, 53);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`clientId`),
  ADD UNIQUE KEY `clientEmail` (`clientEmail`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imgId`),
  ADD KEY `FK_inv_image` (`invId`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`invId`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewId`),
  ADD KEY `FK_reviews_clients` (`clientId`),
  ADD KEY `FK_reviews_inventory` (`invId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `clientId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imgId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `invId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `FK_inv_image` FOREIGN KEY (`invId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `FK_reviews_clients` FOREIGN KEY (`clientId`) REFERENCES `clients` (`clientId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_reviews_inventory` FOREIGN KEY (`invId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
