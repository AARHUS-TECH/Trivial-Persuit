-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Vært: localhost:3306
-- Genereringstid: 21. 02 2023 kl. 13:32:08
-- Serverversion: 8.0.32-0ubuntu0.22.04.2
-- PHP-version: 8.1.2-1ubuntu2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trivialpursuit`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `category_questions`
--

CREATE TABLE `category_questions` (
  `Id` int NOT NULL,
  `Name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Data dump for tabellen `category_questions`
--

INSERT INTO `category_questions` (`Id`, `Name`) VALUES
(1, 'Centrale netværksbegreber'),
(3, 'CLI-kommandoer'),
(4, 'IPv6-relateret'),
(5, 'Specialiserede netværksprotokoller/teknologier'),
(6, 'TCP/UDP'),
(7, 'Diverse Netværk');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `category_shared`
--

CREATE TABLE `category_shared` (
  `Id` int NOT NULL,
  `User_Id` int NOT NULL,
  `Category_Id` int NOT NULL,
  `Owner` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Data dump for tabellen `category_shared`
--

INSERT INTO `category_shared` (`Id`, `User_Id`, `Category_Id`, `Owner`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 0);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `questions`
--

CREATE TABLE `questions` (
  `Id` int NOT NULL,
  `Category` int NOT NULL,
  `Question` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `Answer` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `DateCreated` date NOT NULL,
  `CreatedBy` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Data dump for tabellen `questions`
--

INSERT INTO `questions` (`Id`, `Category`, `Question`, `Answer`, `DateCreated`, `CreatedBy`) VALUES
(1, 1, 'Why did the chicken cross the bridge?', 'Because it couldn\'t swim', '2023-01-31', 1);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `role`
--

CREATE TABLE `role` (
  `Id` int NOT NULL,
  `Role` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Data dump for tabellen `role`
--

INSERT INTO `role` (`Id`, `Role`) VALUES
(1, 'Teacher'),
(2, 'Student');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `user`
--

CREATE TABLE `user` (
  `Id` int NOT NULL,
  `Username` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `Password` mediumtext COLLATE utf8mb4_general_ci NOT NULL,
  `Role` int NOT NULL,
  `Email` varchar(200) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Data dump for tabellen `user`
--

INSERT INTO `user` (`Id`, `Username`, `Password`, `Role`, `Email`) VALUES
(1, 'FirstTeacher', 'SKP2020', 1, 'SKPTeacher@edu.aarhustech.dk'),
(2, 'TestStudent', 'SKP2020!', 2, '');

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `category_questions`
--
ALTER TABLE `category_questions`
  ADD PRIMARY KEY (`Id`);

--
-- Indeks for tabel `category_shared`
--
ALTER TABLE `category_shared`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Category_ID_shared` (`Category_Id`),
  ADD KEY `User_ID_Shared` (`User_Id`);

--
-- Indeks for tabel `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Category_ID` (`Category`),
  ADD KEY `CreatedBy_User` (`CreatedBy`);

--
-- Indeks for tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`Id`);

--
-- Indeks for tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Role_ID_User` (`Role`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `category_questions`
--
ALTER TABLE `category_questions`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tilføj AUTO_INCREMENT i tabel `category_shared`
--
ALTER TABLE `category_shared`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tilføj AUTO_INCREMENT i tabel `questions`
--
ALTER TABLE `questions`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tilføj AUTO_INCREMENT i tabel `role`
--
ALTER TABLE `role`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tilføj AUTO_INCREMENT i tabel `user`
--
ALTER TABLE `user`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Begrænsninger for dumpede tabeller
--

--
-- Begrænsninger for tabel `category_shared`
--
ALTER TABLE `category_shared`
  ADD CONSTRAINT `Category_ID_shared` FOREIGN KEY (`Category_Id`) REFERENCES `category_questions` (`Id`),
  ADD CONSTRAINT `User_ID_Shared` FOREIGN KEY (`User_Id`) REFERENCES `user` (`Id`);

--
-- Begrænsninger for tabel `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `Category_ID` FOREIGN KEY (`Category`) REFERENCES `category_questions` (`Id`),
  ADD CONSTRAINT `CreatedBy_User` FOREIGN KEY (`CreatedBy`) REFERENCES `user` (`Id`);

--
-- Begrænsninger for tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `Role_ID_User` FOREIGN KEY (`Role`) REFERENCES `role` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
