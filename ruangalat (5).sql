-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2024 at 02:54 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ruangalat`
--

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `id` int(11) NOT NULL,
  `model` varchar(100) NOT NULL,
  `nama_alat` varchar(100) NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `diagnosis`
--

INSERT INTO `diagnosis` (`id`, `model`, `nama_alat`, `jumlah`, `keterangan`) VALUES
(1, '', 'AIR VALVE LAPPER VR 1NPA', '1', 'diagnosis'),
(2, '', 'CYLINDER BORE GAUGE 10-35MM', '1', 'diagnosis'),
(3, '', 'CYLINDER BORE GAUGE 35-60MM', '1', 'diagnosis'),
(4, '', 'CYLINDER BORE GAUGE 50-150MM', '1', 'diagnosis'),
(5, '', 'GASOLINE COMPRESSOR GAUGE NPS', '1', 'diagnosis'),
(6, '', 'DIESEL COMPESSOR GAUGE NPA', '1', 'diagnosis'),
(7, '', 'ADAPTOR DIESEL COMPRESOR', '1', 'diagnosis'),
(8, '', 'RADIATOR CUP TESTER', '1', 'diagnosis'),
(9, '', 'COMBINATION WRENCH-27 CW-27 KUN AUTO', '1', 'diagnosis'),
(10, '', 'SIGN SET PC/TRITON (NEW BLACK MODEL) SVC-SIGN-SET PC LOCAL', '1', 'diagnosis'),
(11, '', 'ROTARY PUMP SB-25 RUBBER MAID', '2', 'diagnosis'),
(12, '', 'OIL MEASURE 5 LITER PM-5 FURUPIA', '2', 'diagnosis'),
(13, '', 'PART WASHER CS-3 00X LOCAL', '1', 'diagnosis'),
(14, '', 'ENGINE OILSURE TIRE PRESURE GAUGE', '1', 'diagnosis'),
(15, '', 'CURVE MIRROR FKS-K 800 TAIWAN', '1', 'diagnosis'),
(16, '', 'TAP DAN DIES SET OK-51 KUN AUTO', '1', 'diagnosis'),
(17, '', 'TIRE LEVER TL-30 KUN AUTO', '1', 'diagnosis'),
(18, '', 'TRANSMISSION B/G PULLER HTM-150 NIPPEI', '1', 'diagnosis'),
(19, '', 'DIAL GAUGE', '1', 'diagnosis'),
(20, '', 'CORD REEL 50MM', '1', 'diagnosis'),
(21, '', 'VACUUM GAUGE VP-3H NPA', '1', 'diagnosis'),
(22, '', 'MECHAMIRROR 1 1/14 1900448 KRISBOW', '1', 'diagnosis'),
(23, '', 'SOUND SCOPE M-1 EXCEL JAPAN', '1', 'diagnosis'),
(24, '', 'VICE 7 V0-6-00X', '1', 'diagnosis'),
(25, '', 'SERVICE CREEPE 92102 WOLF HEAD', '1', 'diagnosis'),
(26, '', 'UNIVERSAL CLUTCH ALIGNER CG-87 LOCAL', '1', 'diagnosis'),
(27, '', 'WRENCH SET COMB 9PC MET KA-CW09 KUN AUTO', '1', 'diagnosis'),
(28, '', 'MICROMETER SET', '1', 'diagnosis'),
(29, '', 'AIR VALVE LAPPER VR 1NPA', '1', 'diagnosis'),
(30, '', 'AIR VALVE LAPPER VR 1NPA', '1', 'diagnosis');

-- --------------------------------------------------------

--
-- Table structure for table `electrical`
--

CREATE TABLE `electrical` (
  `id` int(11) NOT NULL,
  `model` varchar(100) NOT NULL,
  `nama_alat` varchar(100) NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `electrical`
--

INSERT INTO `electrical` (`id`, `model`, `nama_alat`, `jumlah`, `keterangan`) VALUES
(1, '', 'DIGITAL MULTITESTER CD-800 SANWA', '1', 'electrical'),
(2, '', 'GARAGE LAMP HL-100 KUN AUTO ', '5', 'electrical'),
(3, '', 'SOUND SCOPE M-1 EXCEL JAPAN', '1', 'electrical'),
(4, '', 'DIGITAL TERMOMETER', '1', 'electrical'),
(5, '', 'BRAKER DISC LATHE', '1', 'electrical'),
(6, '', 'BRAKE FLUID TESTER WH-509WOLF HEAD', '1', 'electrical'),
(7, '', 'BATTERY TESTER DS-6 JAPAN', '1', 'electrical'),
(8, '', 'COMPUTER MEMORY SAVER CMS LOCAL', '1', 'electrical'),
(9, '', 'AUTOMATIC FLUID CHANGER CAT -501S LAAUNCH', '1', 'electrical'),
(10, '', 'BATTERY CHARGE HRMAX 100', '1', 'electrical'),
(11, '', 'AIR HOSE BAND', '1', 'electrical'),
(12, '', 'ELECTRICK PORTABLE DIC GRINDER', '1', 'electrical'),
(13, '', 'ELECTRICK PORATBLE DRILL', '1', 'electrical'),
(14, '', 'SOLDERING IRON E12000X KUN AUTO', '1', 'electrical'),
(15, '', 'ENGINE HANGER AE 901 00X LOCAL', '1', 'electrical');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(25) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `nama`, `password`) VALUES
(1, 'sakinah', 's123'),
(2, 'aling', 'a123'),
(3, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `mqp`
--

CREATE TABLE `mqp` (
  `id` int(11) NOT NULL,
  `model` varchar(100) NOT NULL,
  `nama_alat` varchar(100) NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mqp`
--

INSERT INTO `mqp` (`id`, `model`, `nama_alat`, `jumlah`, `keterangan`) VALUES
(1, '', 'SAFETY KIT (HLEM, KACAMATA, SARUNG TANGAN) LOCAL', '2', 'mqp'),
(2, '', 'WASHING KIT (JAS HUJAN TRANFARAN, SEPATU BOOT)', '2', 'mqp'),
(3, '', 'MQP SMART CADDY -CAD-0612 LOCAL/NEW', '2', 'mqp'),
(4, '', 'MQP CURVE MIRROR MQP-CURVE-12LOCAL', '8', 'mqp'),
(5, '', 'HELMETSET MQP-HLEMSET 12 LOCAL', '4', 'mqp'),
(6, '', 'WASHING KIT (JAS HUJAN TRANFARAN, SEPATU BOOT)', '1', 'mqp'),
(7, '', 'OIL DRAIN/AIR OPERATED-OD-0612 LOCAL', '1', 'mqp'),
(8, '', 'SEAT COVER SET FOR FONT OFFICE MQP 14 LOCAL', '1', 'mqp'),
(9, '', 'MQP SMART TOOLS SET MQP-TOOLS-0612 KUN AUTO', '1', 'mqp'),
(10, '', 'JIGGLE JACK ATACHMENT DJ50-00X', '1', 'mqp'),
(11, '', 'RODA W/RUBER JIGLE JACK 1 TON 4PCS RR-JJ10 LOCAL', '2', 'mqp'),
(12, '', 'PART AND TOOLS STAND 65-00X LOCAL', '1', 'mqp'),
(13, '', 'RODA W/RUBER JIGLE JACK 1 TON 4PCS RR-JJ10 LOCAL', '2', 'mqp'),
(14, '', 'TOOLS CADDY REGULER KA-177 DRW LOCAL', '7', 'mqp'),
(15, '', 'SAFETY KIT BOX SKB-14 LOAL', '1', 'mqp'),
(16, '', 'ELECTRIKAL BENCH DRIIL B-135 HITACHI', '1', 'mqp'),
(17, '', 'TIRE PRESURE GAUGE 6 FB', '2', 'mqp'),
(18, '', 'PIJAKAN PENINGGI', '4', 'mqp'),
(19, '', 'TIRE CARIER', '9', 'mqp'),
(20, '', 'CS KIT BOX', '2', 'mqp'),
(21, '', 'MQP MESSAGE SIGN FOR STALL MOP-SIGN LOCAL', '2', 'mqp');

-- --------------------------------------------------------

--
-- Table structure for table `peminjam`
--

CREATE TABLE `peminjam` (
  `id` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `nama` varchar(225) NOT NULL,
  `nama_alat` varchar(100) NOT NULL,
  `pinjam` time NOT NULL,
  `kembali` time NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjam`
--

INSERT INTO `peminjam` (`id`, `tgl`, `nama`, `nama_alat`, `pinjam`, `kembali`, `ket`) VALUES
(19, '2024-09-14', 's', 'COMBINATION WRENCH-27 CW-27 KUN AUTO', '08:58:00', '09:00:00', 'dikembalikan'),
(20, '2024-09-14', 'yaya', 'AIR VALVE LAPPER VR 1NPA', '09:05:00', '09:05:00', 'dikembalikan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `electrical`
--
ALTER TABLE `electrical`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mqp`
--
ALTER TABLE `mqp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjam`
--
ALTER TABLE `peminjam`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `electrical`
--
ALTER TABLE `electrical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mqp`
--
ALTER TABLE `mqp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `peminjam`
--
ALTER TABLE `peminjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
