-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2023 at 09:28 AM
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
-- Database: `devastro_terangbenderang`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `stock` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `country`, `description`, `image`, `stock`, `price`, `created_at`) VALUES
(1, 'Mountslafe', 'Italia', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis dolore explicabo fuga modi, rem ab.', 'img/prod-1.jpg', 100, 560000, '2023-02-28 16:19:41'),
(2, 'Katana', 'Jepang', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis dolore explicabo fuga modi, rem ab.', 'img/prod-2.jpg', 50, 250000, '2023-02-28 16:34:40'),
(3, 'Ocha', 'China', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quis dolore explicabo fuga modi, rem ab.', 'img/prod-3.jpg', 20, 400000, '2023-02-28 16:35:41'),
(4, 'Nasril', 'nassril', 'base', 'upload/1692870140_banner-yz.jpg', 1, 100, '2023-08-24 16:42:20');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(4, 'admin', '$2y$10$oai6vz8W5xIZwZdtaZ3JVefoCW5shAXNpvkiVb8KAvBwb1X18RAUq', 1),
(5, 'nas', '$2y$10$74a2/IxAD3Vm29.yPMDTc.rfWibn6/Xi3xu75XAws.1octJHatnvq', 0),
(6, 'abc', '$2y$10$CHp22/770ZKB0rXbUF/1UudF8GV40J4rzIr2BfbuHGFrm9S1YvdzC', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
