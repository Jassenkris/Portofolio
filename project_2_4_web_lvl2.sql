-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2026 at 09:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project 2_4 web.lvl2`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `nama`, `email`, `pesan`, `created_at`) VALUES
(1, 'Ahmad', 'ahmad@gmail.com', 'Desain portofolio yang sangat menarik!', '2026-09-23 02:17:06'),
(2, 'Gibran', 'gibran@yahoo.com', 'Halo, saya tertarik untuk bekerja sama dalam proyek web.', '2026-09-23 02:17:06'),
(3, 'Citra', 'citra@gmail.com', 'Apakah menerima proyek pembuatan web?', '2026-09-23 02:17:06'),
(4, 'Coco', 'coco@outlook.com', 'Sangat profesional, sukses terus untuk kariernya.', '2026-09-23 02:17:06'),
(16, 'Ilham', 'ilham@gmail.com', 'Menarik, web ini dibuat secara terstruktur! saya tertarik untuk bekerjasama.', '2026-09-23 06:38:36');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `judul_layanan` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `warna` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `judul_layanan`, `icon`, `warna`) VALUES
(1, 'Mekanika Engineering', 'fas fa-cogs', 'icon-orange'),
(2, 'Elektronika Engineering', 'fas fa-bolt', 'text-navy'),
(3, 'Informatika & Programming', 'fas fa-microchip', 'text-navy');

-- --------------------------------------------------------

--
-- Table structure for table `services_details`
--

CREATE TABLE `services_details` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `judul_layanan` varchar(50) NOT NULL,
  `detail_layanan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services_details`
--

INSERT INTO `services_details` (`id`, `service_id`, `judul_layanan`, `detail_layanan`) VALUES
(0, 1, 'CAD 2D Modeling', 'AutoCAD, Manual Drawing'),
(0, 1, 'CAD 3D Modeling', 'SolidWorks, Fusion 360'),
(0, 1, 'Prototyping & Manufaktur', '3D Printing, Laser Cutting'),
(0, 1, 'Machining', 'CNC Milling, CNC Bubut, Manual Bench Work'),
(0, 2, 'Desain PCB', 'Skematik & Board Layout (Fusion)'),
(0, 2, 'Sistem Aktuator & Daya', 'Motor DC, Stepper, Pneumatik'),
(0, 2, 'Sensor & Instrumentasi', 'Sensor Jarak, Sensor Suhu, Proximity, Photo Electric'),
(0, 3, 'Mikrokontroler', 'C/C++ (Arduino, ESP32, Raspberry Pi)'),
(0, 3, 'Protokol Komunikasi', 'I2C, SPI'),
(0, 3, 'Pemrograman PLC', 'Ladder Diagram (TIA Portal, CX Programer)');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `skill_name` varchar(50) NOT NULL,
  `total_vote` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`id`, `skill_name`, `total_vote`) VALUES
(1, 'Mekanika', 60),
(2, 'Elektronika', 55),
(3, 'Mikrokontroler', 32),
(4, 'C/C++', 51),
(5, 'PLC', 38),
(7, 'respon', 99);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
