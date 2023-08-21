-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2022 at 06:44 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gispesawaran`
--

-- --------------------------------------------------------

--
-- Table structure for table `kakao`
--

CREATE TABLE `kakao` (
  `id_kakao` int(11) NOT NULL,
  `kategori` varchar(70) NOT NULL,
  `desa` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `luas` varchar(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `latitude` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `geojson` varchar(5000) NOT NULL,
  `warna` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kakao`
--

INSERT INTO `kakao` (`id_kakao`, `kategori`, `desa`, `kecamatan`, `kabupaten`, `alamat`, `luas`, `keterangan`, `foto`, `latitude`, `longitude`, `geojson`, `warna`) VALUES
(3, 'Pohon Tumbang', 'Desa Tataan', 'Gedong Tataan', 'Pesawaran', 'Gedong Tataan, Pesawaran', '2,571.36 (Ha)', '-', 'Desa_Tataan_1663494456.png', '-5.387820410868355', '105.1739752292633', '{\r\n  \"type\": \"FeatureCollection\",\r\n  \"features\": [\r\n    {\r\n      \"type\": \"Feature\",\r\n      \"properties\": {},\r\n      \"geometry\": {\r\n        \"type\": \"Polygon\",\r\n        \"coordinates\": [\r\n          [\r\n            [\r\n              105.1751124858856,\r\n              -5.385897749437299\r\n            ],\r\n            [\r\n              105.1734709739685,\r\n              -5.38594047531298\r\n            ],\r\n            [\r\n              105.17252683639526,\r\n              -5.386228874895179\r\n            ],\r\n            [\r\n              105.17234444618225,\r\n              -5.388012676676822\r\n            ],\r\n            [\r\n              105.17167925834656,\r\n              -5.389198314484321\r\n            ],\r\n            [\r\n              105.17214059829712,\r\n              -5.389849880221914\r\n            ],\r\n            [\r\n              105.17399668693542,\r\n              -5.3901489593427785\r\n            ],\r\n            [\r\n              105.17489790916443,\r\n              -5.389881924420479\r\n            ],\r\n            [\r\n              105.17512321472168,\r\n              -5.38927308435856\r\n            ],\r\n            [\r\n              105.1751446723938,\r\n              -5.388450615235606\r\n            ],\r\n            [\r\n              105.17603516578674,\r\n              -5.387606782120897\r\n            ],\r\n            [\r\n              105.17686128616333,\r\n              -5.38676294783414\r\n            ],\r\n            [\r\n              105.17606735229492,\r\n              -5.386004564120846\r\n            ],\r\n            [\r\n              105.1751124858856,\r\n              -5.385897749437299\r\n            ]\r\n          ]\r\n        ]\r\n      }\r\n    }\r\n  ]\r\n}', '#95da16'),
(4, 'Banjir', 'Desa Lima', 'Way Lima', 'Pesawaran', 'Way Lima, Pesawaran', '2,582.97 (Ha)', '-', 'Desa_Lima_1663494424.jpg', '-5.419084166523434', '105.03519773483276', '{   \"type\": \"FeatureCollection\",   \"features\": [     {       \"type\": \"Feature\",       \"properties\": {},       \"geometry\": {         \"type\": \"LineString\",         \"coordinates\": [           [             105.0711178779602,             -5.597727283543233           ],           [             105.0711178779602,             -5.597802027250413           ]         ]       }     },     {       \"type\": \"Feature\",       \"properties\": {},       \"geometry\": {         \"type\": \"Polygon\",         \"coordinates\": [           [             [               105.03274083137512,               -5.418539441183117             ],             [               105.03299832344055,               -5.419062804754632             ],             [               105.03299832344055,               -5.419789104469859             ],             [               105.03300905227661,               -5.420429956434367             ],             [               105.0333309173584,               -5.420974680069423             ],             [               105.03395318984985,               -5.421166935352697             ],             [               105.03521919250488,               -5.4207503821615655             ],             [               105.03554105758667,               -5.420611531033989             ],             [               105.03646373748778,               -5.420707658741095             ],             [               105.03730058670044,               -5.4209533183675145             ],             [               105.03756880760193,               -5.419714338363038             ],             [               105.03757953643799,               -5.418955995899324             ],             [               105.03710746765137,               -5.4179519917361425             ],             [               105.03584146499632,               -5.417321818057962             ],             [               105.03442525863647,               -5.4174179462886505             ],             [               105.0331699848175,               -5.4176529263437105             ],             [               105.03274083137512,               -5.418539441183117             ]           ]         ]       }     }   ] }', '#61039c'),
(5, 'Angin', 'Desa Cermin', 'Padang Cermin', 'Pesawaran', 'Desa Cermin, Pesawaran', '4,125.70 (Ha)', '-', 'Desa_Cermin_1663494392.jpg', '-5.59369110916741', '105.06787776947021', '{\r\n  \"type\": \"FeatureCollection\",\r\n  \"features\": [\r\n    {\r\n      \"type\": \"Feature\",\r\n      \"properties\": {},\r\n      \"geometry\": {\r\n        \"type\": \"Polygon\",\r\n        \"coordinates\": [\r\n          [\r\n            [\r\n              105.0736927986145,\r\n              -5.600119077432227\r\n            ],\r\n            [\r\n              105.07373571395874,\r\n              -5.598068968983745\r\n            ],\r\n            [\r\n              105.07339239120483,\r\n              -5.596168341186811\r\n            ],\r\n            [\r\n              105.07259845733643,\r\n              -5.595783943802605\r\n            ],\r\n            [\r\n              105.07266283035277,\r\n              -5.592132156052914\r\n            ],\r\n            [\r\n              105.0712251663208,\r\n              -5.588907459034139\r\n            ],\r\n            [\r\n              105.06749153137207,\r\n              -5.5872844260005365\r\n            ],\r\n            [\r\n              105.06671905517577,\r\n              -5.58805323168245\r\n            ],\r\n            [\r\n              105.06388664245605,\r\n              -5.58984710768156\r\n            ],\r\n            [\r\n              105.062255859375,\r\n              -5.592324355976432\r\n            ],\r\n            [\r\n              105.0614833831787,\r\n              -5.597364242543863\r\n            ],\r\n            [\r\n              105.06577491760252,\r\n              -5.598133034981616\r\n            ],\r\n            [\r\n              105.06826400756836,\r\n              -5.599756037918481\r\n            ],\r\n            [\r\n              105.07049560546875,\r\n              -5.599841459000823\r\n            ],\r\n            [\r\n              105.0736927986145,\r\n              -5.600119077432227\r\n            ]\r\n          ]\r\n        ]\r\n      }\r\n    }\r\n  ]\r\n}', '#16b0c4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUsers` int(11) NOT NULL,
  `namaLengkap` varchar(150) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` enum('admin','users') NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUsers`, `namaLengkap`, `username`, `password`, `status`, `foto`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'user_1663487117.PNG'),
(3, 'Oki Arifin', 'oki', 'e210b2d4726eb89e951f1952be84c02f', 'users', 'user_1663487134.PNG'),
(5, 'Pajar Padillah', 'pajar', 'c80616c82c5224422f21d0ac6823b153', 'admin', 'user_1663605544.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kakao`
--
ALTER TABLE `kakao`
  ADD PRIMARY KEY (`id_kakao`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kakao`
--
ALTER TABLE `kakao`
  MODIFY `id_kakao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
