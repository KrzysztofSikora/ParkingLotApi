-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Czas generowania: 03 Lis 2018, 22:31
-- Wersja serwera: 10.1.34-MariaDB-0ubuntu0.18.04.1
-- Wersja PHP: 5.6.37-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `carpark`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ParkingLot`
--

CREATE TABLE `ParkingLot` (
  `id` int(255) NOT NULL,
  `carId` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `wheels` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `ParkingLot`
--

INSERT INTO `ParkingLot` (`id`, `carId`, `type`, `wheels`) VALUES
(119, 1256, 'Car', 4),
(129, 12565, 'Bus', 6);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `ParkingLot`
--
ALTER TABLE `ParkingLot`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `ParkingLot`
--
ALTER TABLE `ParkingLot`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
