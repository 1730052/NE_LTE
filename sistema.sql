-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 17, 2020 at 09:17 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistema`
--

-- --------------------------------------------------------

--
-- Table structure for table `administradores`
--

CREATE TABLE `administradores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `contra` varchar(20) DEFAULT NULL,
  `correo` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administradores`
--

INSERT INTO `administradores` (`id`, `nombre`, `usuario`, `contra`, `correo`) VALUES
(1, 'Alfonso Villanueva', 'broyi', 'broyi', '1730052@upv.edu.mx'),
(2, 'Erick Aguilar', 'longlose', 'longlose', '1730189@upv.edu.mx'),
(3, 'Perla', 'Cecy', 'cecy', '1730033@upv.edu.mx');

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `correo` varchar(20) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `correo`, `telefono`) VALUES
(3, 'Cliente 1', 'cli1@gmail.com', 121212),
(4, 'Cliente 2', 'cli2@gmail.com', 33434);

-- --------------------------------------------------------

--
-- Table structure for table `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `contra` varchar(20) DEFAULT NULL,
  `correo` varchar(20) DEFAULT NULL,
  `socio` char(1) DEFAULT NULL,
  `vehiculo` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `empleados`
--

INSERT INTO `empleados` (`id`, `nombre`, `usuario`, `contra`, `correo`, `socio`, `vehiculo`) VALUES
(1, 'Empleado 1', 'emp1', 'emp1', 'emp1@gmail.com', 'S', 'Camion'),
(2, 'Empleado 2', 'emp2', 'emp2', 'emp2@gmail.com', 'S', 'Camion'),
(3, 'Empleado 3', 'emp3', 'emp3', 'emp3@gmail.com', 'S', 'Camion'),
(4, 'Empleado 4', 'emp4', 'emp4', 'emp4@gmail.com', 'S', 'Camion'),
(5, 'Empleado 5', 'emp5', 'emp5', 'emp5@gmail.com', 'S', 'Camion');

-- --------------------------------------------------------

--
-- Table structure for table `viajes`
--

CREATE TABLE `viajes` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `fecha_solicitud` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `material` varchar(20) DEFAULT NULL,
  `destino` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `viajes`
--

INSERT INTO `viajes` (`id`, `id_cliente`, `id_empleado`, `id_admin`, `fecha_solicitud`, `fecha_fin`, `material`, `destino`) VALUES
(3, 6, 3, 1, '2018-05-01', '2018-05-01', 'Arena', 'Victoria'),
(4, 6, 3, 1, '2020-03-16', '2020-03-17', 'Grava', 'Victoria'),
(5, 6, 3, 1, '2020-03-16', '2020-03-17', 'prueba', 'fecha'),
(6, 6, 3, 1, '2020-03-16', '2020-03-17', 'Grava', 'Victoria'),
(7, 3, 6, 1, '2020-03-16', '2020-03-17', 'Grava', 'Victoria'),
(8, 4, 6, 3, '2020-03-16', '2020-03-17', 'Grava', 'Padilla'),
(9, 3, 1, 1, '2020-03-17', '2020-03-18', 'Grava', 'Padilla'),
(11, 4, 1, 3, '2020-03-17', '2020-03-18', 'Arena', 'Guemez');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `viajes`
--
ALTER TABLE `viajes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_empleado` (`id_empleado`),
  ADD KEY `id_admin` (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administradores`
--
ALTER TABLE `administradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `viajes`
--
ALTER TABLE `viajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
