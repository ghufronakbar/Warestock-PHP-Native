-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2024 at 11:29 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `warestock`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `producedBy` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `picture` text DEFAULT NULL,
  `amount` int(11) NOT NULL DEFAULT 0,
  `productTypeId` int(11) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `expiredAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `name`, `producedBy`, `description`, `picture`, `amount`, `productTypeId`, `createdAt`, `updatedAt`, `expiredAt`) VALUES
(1, 'Biskuit Gandum', 'Snackindo', 'Biskuit gandum kaya serat, cocok untuk camilan sehat.', NULL, 150, 1, '2024-11-13 13:34:18', '2024-11-13 13:34:18', '2024-11-13 13:54:48'),
(2, 'Keripik Kentang', 'Cemilan Sehat', 'Keripik kentang renyah dengan rasa asin gurih.', NULL, 200, 1, '2024-11-13 13:34:18', '2024-11-13 13:34:18', '2024-11-13 13:54:48'),
(3, 'Mi Instan Ayam', 'InstanFoods', 'Mi instan dengan rasa ayam spesial, mudah dan praktis.', NULL, 300, 1, '2024-11-13 13:34:18', '2024-11-13 13:34:18', '2024-11-13 13:54:48'),
(4, 'Air Mineral', 'AquaMineral', 'Air mineral kemasan botol 600ml, murni dan menyegarkan.', NULL, 500, 2, '2024-11-13 13:34:18', '2024-11-13 13:34:18', '2024-11-13 13:54:48'),
(5, 'Susu UHT', 'DairyFresh', 'Susu UHT rasa coklat, kaya kalsium.', NULL, 120, 2, '2024-11-13 13:34:18', '2024-11-13 13:34:18', '2024-11-13 13:54:48'),
(6, 'Minuman Berenergi', 'EnergiPlus', 'Minuman berenergi untuk menambah stamina.', NULL, 100, 2, '2024-11-13 13:34:18', '2024-11-13 13:34:18', '2024-11-13 13:54:48'),
(8, 'Vitamin C', 'HealthPlus', 'Vitamin C untuk menjaga daya tahan tubuh.', NULL, 150, 3, '2024-11-13 13:34:27', '2024-11-13 13:34:27', '2024-11-13 13:54:48'),
(9, 'Antibiotik', 'MedLife', 'Obat antibiotik untuk infeksi bakteri.', NULL, 60, 3, '2024-11-13 13:34:27', '2024-11-13 13:34:27', '2024-11-13 13:54:48'),
(12, 'Snack', 'Ind0grosir', 'Snack bergizi anti micin', 'f9P107794549-1.avif', 0, 1, '2024-11-14 18:40:29', '2024-11-14 18:42:45', '2024-11-28 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `producttype`
--

CREATE TABLE `producttype` (
  `productTypeId` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `producttype`
--

INSERT INTO `producttype` (`productTypeId`, `name`, `createdAt`, `updatedAt`) VALUES
(1, 'Makanan', '2024-11-13 13:33:05', '2024-11-13 13:33:05'),
(2, 'Minuman', '2024-11-13 13:33:05', '2024-11-13 13:33:05'),
(3, 'Obat-Obatan', '2024-11-13 13:33:05', '2024-11-13 13:33:05');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `username`, `password`, `createdAt`, `updatedAt`) VALUES
(1, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '2024-11-13 13:32:30', '2024-11-14 18:11:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `productTypeId` (`productTypeId`);

--
-- Indexes for table `producttype`
--
ALTER TABLE `producttype`
  ADD PRIMARY KEY (`productTypeId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `producttype`
--
ALTER TABLE `producttype`
  MODIFY `productTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`productTypeId`) REFERENCES `producttype` (`productTypeId`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
