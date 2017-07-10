-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2017 at 12:25 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codewell_duotonal`
--

-- --------------------------------------------------------

--
-- Table structure for table `default_agents`
--

CREATE TABLE `default_agents` (
  `idAGENT` int(11) NOT NULL,
  `browserAGENT` varchar(30) NOT NULL,
  `cityAGENT` varchar(40) NOT NULL,
  `countryAGENT` varchar(50) NOT NULL,
  `emailAGENT` varchar(50) NOT NULL,
  `ipAGENT` varchar(20) NOT NULL,
  `ispAGENT` varchar(30) NOT NULL,
  `osAGENT` varchar(20) NOT NULL,
  `regionAGENT` varchar(50) NOT NULL,
  `createdateAGENT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `default_ci_sessions`
--

CREATE TABLE `default_ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `default_ci_sessions`
--

INSERT INTO `default_ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('3qej8shvleobkurc9pj34rspotfbpqju', '::1', 1497249555, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439373234393535353b),
('7pb7qj9jq8enkduqbum1o2buqoufrson', '::1', 1497249433, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439373234393433313b),
('4i7ettlmrt1roi8ce43ctne9fjogv265', '::1', 1497249981, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439373234393938313b),
('uasi9h5d91s99t6clse661h7nklrsjh7', '::1', 1497250358, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439373235303335383b),
('pv80vji663fefl3nt40fgu09s0gpjui3', '::1', 1497250760, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439373235303736303b),
('451pj55nf6b0cd3bvpdiv8qvvn43t8qm', '::1', 1497251193, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439373235313139333b),
('gs8memb5qctuop8nrksvmdfplu39nmvv', '::1', 1497251032, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439373235303936353b),
('bgedsdufg03roosn2d9hdrvcknli6r89', '::1', 1497251751, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439373235313735313b),
('4e3cdjc68n0l0qjfteuu94v07pqm1g5d', '::1', 1497253812, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439373235333831323b),
('l785lf4k0t3j7pjbvv8nf4pv3skiu4pg', '::1', 1497259373, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439373235393337333b6d6573736167657c613a333a7b733a353a227469746c65223b733a363a2253756b736573223b733a343a2274657874223b733a33353a2250656e79696d70616e616e204461746120626572686173696c2064696c616b756b616e223b733a343a2274797065223b733a373a2273756363657373223b7d5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('f43bd6pof14bho50r3htmsrmksvvbloo', '::1', 1497259763, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439373235393736333b),
('h3kl9h7qbb5c80oi9vn5pg93pf0h59kn', '::1', 1497260939, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439373236303933393b),
('00crc3i4eh7q7m7i87p70b7in09jdg38', '::1', 1497261262, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439373236313236323b),
('01etiga26jbeqo370pl3thhu32hsn43l', '::1', 1497262492, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439373236323439323b),
('mdc833mqlnpqc9fmrh26u91ofcjgql44', '::1', 1497262510, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439373236323439323b);

-- --------------------------------------------------------

--
-- Table structure for table `default_devicelogin`
--

CREATE TABLE `default_devicelogin` (
  `idDEVICE` int(11) NOT NULL,
  `idUSER` int(11) NOT NULL,
  `agentDEVICE` varchar(40) NOT NULL,
  `createdateDEVICE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `default_devicelogin`
--

INSERT INTO `default_devicelogin` (`idDEVICE`, `idUSER`, `agentDEVICE`, `createdateDEVICE`) VALUES
(1, 1, 'Chrome', '2017-05-03 04:13:06'),
(2, 1, 'Chrome', '2017-05-03 04:14:00');

-- --------------------------------------------------------

--
-- Table structure for table `default_loginattempts`
--

CREATE TABLE `default_loginattempts` (
  `idATTEMPTS` int(11) NOT NULL,
  `idUSER` int(11) NOT NULL,
  `timeATTEMPTS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `default_notfound`
--

CREATE TABLE `default_notfound` (
  `idNOTFOUND` int(11) NOT NULL,
  `browserNOTFOUND` varchar(40) NOT NULL,
  `cityNOTFOUND` varchar(50) NOT NULL,
  `countryNOTFOUND` varchar(40) NOT NULL,
  `ipNOTFOUND` varchar(20) NOT NULL,
  `ispNOTFOUND` varchar(30) NOT NULL,
  `osNOTFOUND` varchar(40) NOT NULL,
  `regionNOTFOUND` varchar(50) NOT NULL,
  `urlNOTFOUND` varchar(60) NOT NULL,
  `createdateNOTFOUND` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `default_subscribe`
--

CREATE TABLE `default_subscribe` (
  `idSUBSCRIBE` int(11) NOT NULL,
  `emailSUBSCRIBE` varchar(255) NOT NULL,
  `createdateSUBSCRIBE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedateSUBSCRIBE` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `statusSUBSCRIBE` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `default_subscribe`
--

INSERT INTO `default_subscribe` (`idSUBSCRIBE`, `emailSUBSCRIBE`, `createdateSUBSCRIBE`, `updatedateSUBSCRIBE`, `statusSUBSCRIBE`) VALUES
(1, 'magicwarms@gmail.com', '2017-06-12 07:53:18', '0000-00-00 00:00:00', 1),
(2, 'rivayudha@msn.com', '2017-06-12 09:54:33', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `default_users`
--

CREATE TABLE `default_users` (
  `idUSER` int(11) NOT NULL,
  `emailUSER` varchar(40) NOT NULL,
  `mobileUSER` varchar(20) NOT NULL,
  `otpUSER` int(6) NOT NULL,
  `passwordUSER` varchar(129) NOT NULL,
  `updatedateUSER` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `createdateUSER` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `default_users`
--

INSERT INTO `default_users` (`idUSER`, `emailUSER`, `mobileUSER`, `otpUSER`, `passwordUSER`, `updatedateUSER`, `createdateUSER`) VALUES
(1, 'admin@admin.com', '082113111668', 496384, 'da121f0f67977e6c2e8ea325d7894f6836eec4670f43e9cd3a57e3020c5fde37f244272600064b93874935e210622d935d1407bd699894007bfa88a0e4223857', '2017-06-12 06:25:31', '2017-04-28 01:37:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `default_agents`
--
ALTER TABLE `default_agents`
  ADD PRIMARY KEY (`idAGENT`);

--
-- Indexes for table `default_ci_sessions`
--
ALTER TABLE `default_ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `default_devicelogin`
--
ALTER TABLE `default_devicelogin`
  ADD PRIMARY KEY (`idDEVICE`);

--
-- Indexes for table `default_loginattempts`
--
ALTER TABLE `default_loginattempts`
  ADD PRIMARY KEY (`idATTEMPTS`);

--
-- Indexes for table `default_notfound`
--
ALTER TABLE `default_notfound`
  ADD PRIMARY KEY (`idNOTFOUND`);

--
-- Indexes for table `default_subscribe`
--
ALTER TABLE `default_subscribe`
  ADD PRIMARY KEY (`idSUBSCRIBE`);

--
-- Indexes for table `default_users`
--
ALTER TABLE `default_users`
  ADD PRIMARY KEY (`idUSER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `default_agents`
--
ALTER TABLE `default_agents`
  MODIFY `idAGENT` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `default_devicelogin`
--
ALTER TABLE `default_devicelogin`
  MODIFY `idDEVICE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `default_loginattempts`
--
ALTER TABLE `default_loginattempts`
  MODIFY `idATTEMPTS` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `default_notfound`
--
ALTER TABLE `default_notfound`
  MODIFY `idNOTFOUND` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `default_subscribe`
--
ALTER TABLE `default_subscribe`
  MODIFY `idSUBSCRIBE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `default_users`
--
ALTER TABLE `default_users`
  MODIFY `idUSER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
