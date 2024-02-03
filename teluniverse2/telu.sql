-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2023 at 06:08 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `telu`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `sekolah_kampus` varchar(255) DEFAULT NULL,
  `jurusan` varchar(255) DEFAULT NULL,
  `instansi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `Id` int(11) NOT NULL,
  `Judul_Event` varchar(255) DEFAULT NULL,
  `Kategori` varchar(255) DEFAULT NULL,
  `Id_User` int(11) DEFAULT NULL,
  `Deskripsi` text DEFAULT NULL,
  `Poster` varchar(255) DEFAULT NULL,
  `Waktu` date DEFAULT NULL,
  `Tempat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`Id`, `Judul_Event`, `Kategori`, `Id_User`, `Deskripsi`, `Poster`, `Waktu`, `Tempat`) VALUES
(3, 'nia', 'sport', NULL, 'cwe', 'img/Poster/winners.png', '2023-06-07', 'gd e'),
(4, 'Metamorfosa', 'seminar', NULL, 'Seminar anak MP', 'img/Poster/WhatsApp Image 2023-05-21 at 10.32.13.jpeg', '2023-06-20', 'TUCH');

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `Id_User` int(11) DEFAULT NULL,
  `Id_Event` int(11) DEFAULT NULL,
  `Ticket` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `Id_User` int(11) NOT NULL,
  `Id_Event` int(11) NOT NULL,
  `No_Tiket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`Id_User`, `Id_Event`, `No_Tiket`) VALUES
(3, 4, 125),
(3, 4, 126),
(5, 4, 127),
(5, 4, 128),
(5, 4, 129),
(5, 4, 130),
(5, 4, 131),
(5, 4, 132),
(5, 4, 133),
(5, 4, 134),
(5, 4, 135),
(5, 4, 136),
(5, 4, 137),
(5, 3, 138),
(3, 3, 139);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id_User` int(11) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `Role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id_User`, `Email`, `Password`, `Username`, `Role`) VALUES
(1, 'serius@gmail.com', 'seriuswoi', 'seriuswoi', 'user'),
(2, 'mencoba@gmail.com', '$2y$10$xpQRIQ4Tm9fMpw4wZQZ4Dey9ncj7hzoecVZahPQqUoiSy009tdLxe', 'mencoba', 'user'),
(3, 'aprilia@gmail.com', '$2y$10$z6OFvYgeF0dFI37AGK62VuqmITaPrj.qEYRI4B8lEqdGc40JYcbNm', 'aprilia', 'admin'),
(4, 'im.brindawan@gmail.com', '$2y$10$GgY9FtHZvrYQOHQOFDeb7.otbi077i37Gh/reobfxbvKH2bI8pSea', 'admin', 'user'),
(5, 'baru@gmail.com', '$2y$10$VexgqIaHlBYjY1ztmJU4fu3d.kBXsywsxSkIz8LLawqbG3e4SKQmu', 'baru', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_User` (`Id_User`);

--
-- Indexes for table `participant`
--
ALTER TABLE `participant`
  ADD KEY `Id_User` (`Id_User`),
  ADD KEY `Id_Event` (`Id_Event`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`No_Tiket`),
  ADD KEY `Id_User` (`Id_User`),
  ADD KEY `Id_Event` (`Id_Event`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id_User`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `No_Tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`Id_User`) REFERENCES `user` (`Id_User`);

--
-- Constraints for table `participant`
--
ALTER TABLE `participant`
  ADD CONSTRAINT `participant_ibfk_1` FOREIGN KEY (`Id_User`) REFERENCES `user` (`Id_User`),
  ADD CONSTRAINT `participant_ibfk_2` FOREIGN KEY (`Id_Event`) REFERENCES `event` (`Id`);

--
-- Constraints for table `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `tiket_ibfk_1` FOREIGN KEY (`Id_User`) REFERENCES `user` (`Id_User`),
  ADD CONSTRAINT `tiket_ibfk_2` FOREIGN KEY (`Id_Event`) REFERENCES `event` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
