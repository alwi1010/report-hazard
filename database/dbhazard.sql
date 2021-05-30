-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 30, 2021 at 03:29 PM
-- Server version: 10.1.38-MariaDB
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
-- Database: `dbhazard`
--
CREATE DATABASE IF NOT EXISTS `dbhazard` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dbhazard`;

-- --------------------------------------------------------

--
-- Table structure for table `loginlogadmin`
--

CREATE TABLE `loginlogadmin` (
  `IdLog` int(11) NOT NULL,
  `IdAdmin` int(11) NOT NULL,
  `TanggalLog` date NOT NULL,
  `WaktuLog` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `loginlogunitst`
--

CREATE TABLE `loginlogunitst` (
  `IdLog` int(11) NOT NULL,
  `IdUnitSt` int(11) NOT NULL,
  `TanggalLog` date NOT NULL,
  `WaktuLog` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbadmin`
--

CREATE TABLE `tbadmin` (
  `IdAdmin` int(11) NOT NULL,
  `UsernameAdmin` varchar(40) NOT NULL,
  `PassAdmin` varchar(150) NOT NULL,
  `NamaAdmin` varchar(70) NOT NULL,
  `EmailAdmin` text NOT NULL,
  `UnitAdmin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbadmin`
--

INSERT INTO `tbadmin` (`IdAdmin`, `UsernameAdmin`, `PassAdmin`, `NamaAdmin`, `EmailAdmin`, `UnitAdmin`) VALUES
(1, 'ProSawi', '$2y$10$cdMNQZd9RhIkZpbFl9osoO1V5g/aJJb9fCAqzqzpdQDdhWAc9ANL.', 'Sayid Alwi Al Attas', 'sayid.alwi@stikom-bali.ac.id', 'Information Communication Technology'),
(4, 'Rangga1234', '$2y$10$kYwvW3VAN.Smz0MuxOKF4uRos/X6zNEJNQklXGonk3Bae6h8ikiEu', 'Deni Rangga Putranto', 'sayidalwialattas@gmail.com', 'Human Capital Section');

-- --------------------------------------------------------

--
-- Table structure for table `tbarea`
--

CREATE TABLE `tbarea` (
  `IdArea` int(11) NOT NULL,
  `NamaArea` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbarea`
--

INSERT INTO `tbarea` (`IdArea`, `NamaArea`) VALUES
(1, 'Airside'),
(2, 'Landside'),
(3, 'Terminal');

-- --------------------------------------------------------

--
-- Table structure for table `tbdisposisi`
--

CREATE TABLE `tbdisposisi` (
  `IdDisposisi` int(11) NOT NULL,
  `IdMasalah` int(11) NOT NULL,
  `IdUnitSt` int(11) NOT NULL,
  `Dudate` date NOT NULL,
  `TglDisposisi` date NOT NULL,
  `JamDisposisi` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbhistorilaporan`
--

CREATE TABLE `tbhistorilaporan` (
  `Nomor` int(11) NOT NULL,
  `IdMasalah` int(11) NOT NULL,
  `IdStatusLaporan` int(11) NOT NULL,
  `FotoKegiatan` text,
  `KeteranganKegiatan` text NOT NULL,
  `TanggalAksi` date NOT NULL,
  `JamAksi` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblokasi`
--

CREATE TABLE `tblokasi` (
  `NomorLokasi` int(11) NOT NULL,
  `IdArea` int(11) NOT NULL,
  `KodeLokasi` varchar(4) NOT NULL,
  `NamaLokasi` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblokasi`
--

INSERT INTO `tblokasi` (`NomorLokasi`, `IdArea`, `KodeLokasi`, `NamaLokasi`) VALUES
(1, 3, 'APBD', 'Area Pengambilan Bagasi Domestik'),
(3, 2, 'APPD', 'Area Penjemputan Penumpang Domestik'),
(4, 2, 'APPI', 'Area Penjemputan Penumpang Internasional'),
(5, 3, 'CIDK', 'Area Check-In Domestik'),
(6, 3, 'CIIL', 'Area Check-In Internasional'),
(7, 3, 'APCL', 'Area Passport Control'),
(8, 2, 'GMDS', 'Gedung Parkir Mobil Domestik Lt.1'),
(9, 2, 'GMDD', 'Gedung Parkir Mobil Domestik Lt.2'),
(10, 2, 'GMDT', 'Gedung Parkir Mobil Domestik Lt.3'),
(11, 2, 'GMDE', 'Gedung Parkir Mobil Domestik Lt.4'),
(12, 2, 'GMDL', 'Gedung Parkir Mobil Domestik Lt.5'),
(13, 2, 'GMIS', 'Gedung Parkir Mobil Internasional Lt.1'),
(14, 2, 'GMID', 'Gedung Parkir Mobil Internasional Lt.2'),
(15, 2, 'GMIT', 'Gedung Parkir Mobil Internasional Lt.3'),
(16, 2, 'GMIE', 'Gedung Parkir Mobil Internasional Lt.4'),
(17, 3, 'GSAD', 'Area Gate 1a Domestik'),
(18, 3, 'GSBD', 'Area Gate 1b Domestik'),
(19, 3, 'GSCD', 'Area Gate 1c Domestik'),
(20, 3, 'GDUD', 'Area Gate 2 Domestik'),
(21, 3, 'GTAD', 'Area Gate 3 Domestik'),
(22, 3, 'GETD', 'Area Gate 4 Domestik'),
(23, 3, 'GLAD', 'Area Gate 5 Domestik'),
(24, 3, 'GEMD', 'Area Gate 6 Domestik'),
(25, 3, 'GSUI', 'Area Gate 1 Internasional'),
(26, 3, 'GDAI', 'Area Gate 2 Internasional'),
(27, 3, 'GTAI', 'Area Gate 3 Internasional'),
(28, 3, 'GETI', 'Area Gate 4 Internasional'),
(29, 3, 'GLAI', 'Area Gate 5 Internasional'),
(30, 3, 'GEMI', 'Area Gate 6 Internasional'),
(31, 3, 'GTHI', 'Area Gate 7 Internasional'),
(32, 3, 'GDNI', 'Area Gate 8 Internasional'),
(33, 3, 'GSNI', 'Area Gate 9 Internasional'),
(35, 1, 'RYPT', 'Runway Pesawat');

-- --------------------------------------------------------

--
-- Table structure for table `tbmasalah`
--

CREATE TABLE `tbmasalah` (
  `IdMasalah` int(11) NOT NULL,
  `NoMasalah` varchar(20) NOT NULL,
  `NamaPelapor` varchar(75) DEFAULT NULL,
  `NamaInstansi` varchar(150) NOT NULL,
  `EmailPelapor` varchar(75) NOT NULL,
  `DetailPermasalahan` text NOT NULL,
  `NomorLokasi` int(11) NOT NULL,
  `FotoMasalah` text NOT NULL,
  `TanggalLaporan` date NOT NULL,
  `TimeLaporan` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbnorut`
--

CREATE TABLE `tbnorut` (
  `IdUrut` int(1) NOT NULL,
  `NomorUrut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbnorut`
--

INSERT INTO `tbnorut` (`IdUrut`, `NomorUrut`) VALUES
(0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbprogress`
--

CREATE TABLE `tbprogress` (
  `IdProgress` int(11) NOT NULL,
  `IdDisposisi` int(11) DEFAULT NULL,
  `IdMasalah` int(11) NOT NULL,
  `IdStatusLaporan` int(11) NOT NULL,
  `TanggalProgress` date NOT NULL,
  `JamProgress` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbrequest`
--

CREATE TABLE `tbrequest` (
  `IdRequest` int(11) NOT NULL,
  `KodeReq` int(1) NOT NULL,
  `IdMasalah` int(11) NOT NULL,
  `NamaRequest` varchar(15) NOT NULL,
  `DetailRequest` text NOT NULL,
  `TglRequest` date NOT NULL,
  `JamRequest` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbstatuslaporan`
--

CREATE TABLE `tbstatuslaporan` (
  `IdStatusLaporan` int(11) NOT NULL,
  `StatusLaporan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbstatuslaporan`
--

INSERT INTO `tbstatuslaporan` (`IdStatusLaporan`, `StatusLaporan`) VALUES
(1, 'Waiting Validate'),
(2, 'Disposition'),
(3, 'On Process'),
(4, 'Closed'),
(5, 'Accepted'),
(6, 'Rejected'),
(7, 'Request Updating'),
(8, 'Closing Request'),
(9, 'Update Dudate'),
(10, 'Received');

-- --------------------------------------------------------

--
-- Table structure for table `tbunitst`
--

CREATE TABLE `tbunitst` (
  `IdUnitSt` int(11) NOT NULL,
  `EmailUnit` varchar(50) NOT NULL,
  `PasswordUnit` varchar(100) NOT NULL DEFAULT 'BaliAirport2020',
  `NamaUnit` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbunitst`
--

INSERT INTO `tbunitst` (`IdUnitSt`, `EmailUnit`, `PasswordUnit`, `NamaUnit`) VALUES
(1, 'habibikebulidps1@gmail.com', '$2y$10$utYwv.quEEIu3LhLcflz8O0hTtpAVHG262KQV8Qt6qtn2z.Gy8HmC', 'Information Communication And Technology'),
(2, 'unitst@gmail.com', '$2y$10$utYwv.quEEIu3LhLcflz8O0hTtpAVHG262KQV8Qt6qtn2z.Gy8HmC', 'Human Capital Section'),
(3, '160010012@stikom-bali.ac.id', '$2y$10$utYwv.quEEIu3LhLcflz8O0hTtpAVHG262KQV8Qt6qtn2z.Gy8HmC', 'Security Section');

-- --------------------------------------------------------

--
-- Table structure for table `tbupdate`
--

CREATE TABLE `tbupdate` (
  `Nmr` int(11) NOT NULL,
  `IdMasalah` int(11) NOT NULL,
  `IdDisposisi` int(11) DEFAULT NULL,
  `NamaPetugas` varchar(100) NOT NULL,
  `DetailPengerjaan` text NOT NULL,
  `FotoPengerjaan` text,
  `TanggalPengerjaan` date NOT NULL,
  `WaktuPengerjaan` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loginlogadmin`
--
ALTER TABLE `loginlogadmin`
  ADD PRIMARY KEY (`IdLog`),
  ADD KEY `IdAdmin` (`IdAdmin`);

--
-- Indexes for table `loginlogunitst`
--
ALTER TABLE `loginlogunitst`
  ADD PRIMARY KEY (`IdLog`),
  ADD KEY `IdUnitSt` (`IdUnitSt`);

--
-- Indexes for table `tbadmin`
--
ALTER TABLE `tbadmin`
  ADD PRIMARY KEY (`IdAdmin`);

--
-- Indexes for table `tbarea`
--
ALTER TABLE `tbarea`
  ADD PRIMARY KEY (`IdArea`);

--
-- Indexes for table `tbdisposisi`
--
ALTER TABLE `tbdisposisi`
  ADD PRIMARY KEY (`IdDisposisi`),
  ADD KEY `IdMasalah` (`IdMasalah`),
  ADD KEY `IdUnitSt` (`IdUnitSt`);

--
-- Indexes for table `tbhistorilaporan`
--
ALTER TABLE `tbhistorilaporan`
  ADD PRIMARY KEY (`Nomor`),
  ADD KEY `IdMasalah` (`IdMasalah`),
  ADD KEY `IdStatusLaporan` (`IdStatusLaporan`);

--
-- Indexes for table `tblokasi`
--
ALTER TABLE `tblokasi`
  ADD PRIMARY KEY (`NomorLokasi`),
  ADD KEY `IdArea` (`IdArea`);

--
-- Indexes for table `tbmasalah`
--
ALTER TABLE `tbmasalah`
  ADD PRIMARY KEY (`IdMasalah`),
  ADD KEY `NomorLokasi` (`NomorLokasi`);

--
-- Indexes for table `tbnorut`
--
ALTER TABLE `tbnorut`
  ADD PRIMARY KEY (`IdUrut`);

--
-- Indexes for table `tbprogress`
--
ALTER TABLE `tbprogress`
  ADD PRIMARY KEY (`IdProgress`),
  ADD KEY `IdStatusLaporan` (`IdStatusLaporan`),
  ADD KEY `IdDisposisi` (`IdDisposisi`),
  ADD KEY `IdMasalah` (`IdMasalah`);

--
-- Indexes for table `tbrequest`
--
ALTER TABLE `tbrequest`
  ADD PRIMARY KEY (`IdRequest`),
  ADD KEY `IdMasalah` (`IdMasalah`);

--
-- Indexes for table `tbstatuslaporan`
--
ALTER TABLE `tbstatuslaporan`
  ADD PRIMARY KEY (`IdStatusLaporan`);

--
-- Indexes for table `tbunitst`
--
ALTER TABLE `tbunitst`
  ADD PRIMARY KEY (`IdUnitSt`);

--
-- Indexes for table `tbupdate`
--
ALTER TABLE `tbupdate`
  ADD PRIMARY KEY (`Nmr`),
  ADD KEY `IdDisposisi` (`IdDisposisi`),
  ADD KEY `IdMasalah` (`IdMasalah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loginlogadmin`
--
ALTER TABLE `loginlogadmin`
  MODIFY `IdLog` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loginlogunitst`
--
ALTER TABLE `loginlogunitst`
  MODIFY `IdLog` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbadmin`
--
ALTER TABLE `tbadmin`
  MODIFY `IdAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbarea`
--
ALTER TABLE `tbarea`
  MODIFY `IdArea` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbdisposisi`
--
ALTER TABLE `tbdisposisi`
  MODIFY `IdDisposisi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbhistorilaporan`
--
ALTER TABLE `tbhistorilaporan`
  MODIFY `Nomor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblokasi`
--
ALTER TABLE `tblokasi`
  MODIFY `NomorLokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbmasalah`
--
ALTER TABLE `tbmasalah`
  MODIFY `IdMasalah` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbprogress`
--
ALTER TABLE `tbprogress`
  MODIFY `IdProgress` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbrequest`
--
ALTER TABLE `tbrequest`
  MODIFY `IdRequest` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbstatuslaporan`
--
ALTER TABLE `tbstatuslaporan`
  MODIFY `IdStatusLaporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbunitst`
--
ALTER TABLE `tbunitst`
  MODIFY `IdUnitSt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbupdate`
--
ALTER TABLE `tbupdate`
  MODIFY `Nmr` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `loginlogadmin`
--
ALTER TABLE `loginlogadmin`
  ADD CONSTRAINT `loginlogadmin_ibfk_1` FOREIGN KEY (`IdAdmin`) REFERENCES `tbadmin` (`IdAdmin`);

--
-- Constraints for table `loginlogunitst`
--
ALTER TABLE `loginlogunitst`
  ADD CONSTRAINT `loginlogunitst_ibfk_1` FOREIGN KEY (`IdUnitSt`) REFERENCES `tbunitst` (`IdUnitSt`);

--
-- Constraints for table `tbdisposisi`
--
ALTER TABLE `tbdisposisi`
  ADD CONSTRAINT `tbdisposisi_ibfk_1` FOREIGN KEY (`IdMasalah`) REFERENCES `tbmasalah` (`IdMasalah`),
  ADD CONSTRAINT `tbdisposisi_ibfk_2` FOREIGN KEY (`IdUnitSt`) REFERENCES `tbunitst` (`IdUnitSt`);

--
-- Constraints for table `tbhistorilaporan`
--
ALTER TABLE `tbhistorilaporan`
  ADD CONSTRAINT `tbhistorilaporan_ibfk_1` FOREIGN KEY (`IdMasalah`) REFERENCES `tbmasalah` (`IdMasalah`),
  ADD CONSTRAINT `tbhistorilaporan_ibfk_2` FOREIGN KEY (`IdStatusLaporan`) REFERENCES `tbstatuslaporan` (`IdStatusLaporan`);

--
-- Constraints for table `tblokasi`
--
ALTER TABLE `tblokasi`
  ADD CONSTRAINT `tblokasi_ibfk_1` FOREIGN KEY (`IdArea`) REFERENCES `tbarea` (`IdArea`);

--
-- Constraints for table `tbmasalah`
--
ALTER TABLE `tbmasalah`
  ADD CONSTRAINT `tbmasalah_ibfk_3` FOREIGN KEY (`NomorLokasi`) REFERENCES `tblokasi` (`NomorLokasi`);

--
-- Constraints for table `tbprogress`
--
ALTER TABLE `tbprogress`
  ADD CONSTRAINT `tbprogress_ibfk_1` FOREIGN KEY (`IdStatusLaporan`) REFERENCES `tbstatuslaporan` (`IdStatusLaporan`),
  ADD CONSTRAINT `tbprogress_ibfk_2` FOREIGN KEY (`IdDisposisi`) REFERENCES `tbdisposisi` (`IdDisposisi`),
  ADD CONSTRAINT `tbprogress_ibfk_3` FOREIGN KEY (`IdMasalah`) REFERENCES `tbmasalah` (`IdMasalah`);

--
-- Constraints for table `tbrequest`
--
ALTER TABLE `tbrequest`
  ADD CONSTRAINT `tbrequest_ibfk_1` FOREIGN KEY (`IdMasalah`) REFERENCES `tbmasalah` (`IdMasalah`);

--
-- Constraints for table `tbupdate`
--
ALTER TABLE `tbupdate`
  ADD CONSTRAINT `tbupdate_ibfk_1` FOREIGN KEY (`IdDisposisi`) REFERENCES `tbdisposisi` (`IdDisposisi`),
  ADD CONSTRAINT `tbupdate_ibfk_2` FOREIGN KEY (`IdMasalah`) REFERENCES `tbmasalah` (`IdMasalah`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
