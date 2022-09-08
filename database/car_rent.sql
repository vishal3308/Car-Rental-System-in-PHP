-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2022 at 05:39 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rent`
--

-- --------------------------------------------------------

--
-- Table structure for table `booked_car`
--

CREATE TABLE `booked_car` (
  `Booking_id` int(11) NOT NULL,
  `Customer_id` int(11) NOT NULL,
  `Days` int(11) NOT NULL,
  `Starting_date` date NOT NULL,
  `Car_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booked_car`
--

INSERT INTO `booked_car` (`Booking_id`, `Customer_id`, `Days`, `Starting_date`, `Car_id`) VALUES
(6, 1, 10, '2022-09-14', 7),
(7, 1, 5, '2022-09-07', 8),
(8, 1, 14, '2022-09-15', 3);

-- --------------------------------------------------------

--
-- Table structure for table `cardetailes`
--

CREATE TABLE `cardetailes` (
  `carid` int(11) NOT NULL,
  `Model` varchar(50) NOT NULL,
  `Vehical_no` varchar(20) NOT NULL,
  `Capacity` int(11) NOT NULL,
  `Rent_day` int(11) NOT NULL,
  `Ownerid` int(11) NOT NULL,
  `Booking_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cardetailes`
--

INSERT INTO `cardetailes` (`carid`, `Model`, `Vehical_no`, `Capacity`, `Rent_day`, `Ownerid`, `Booking_status`) VALUES
(2, 'Honda City', 'MH04EE9147', 9, 350, 2, 0),
(3, 'Thor Mahindra', 'MH04DJ9189', 8, 750, 2, 1),
(4, 'Hero Honda', 'UP62N0743', 3, 100, 2, 0),
(5, 'Honda WRV', 'UP62CF8284', 7, 450, 2, 0),
(6, 'Tata Tiger', 'UP62GS8637', 8, 650, 2, 0),
(7, 'Nissan Sunny Facelift', 'UP62JH8736', 7, 980, 2, 1),
(8, 'Hyundai Grand i10', 'UP62DD6969', 7, 800, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Vishal Maurya', 'vishalmaurya3308@gmail.com', 'e49b9ba97350a0e4e2cdb497749db7fe', 0),
(2, 'VISHAL Maurya', 'vishalmaurya@gmail.com', 'e49b9ba97350a0e4e2cdb497749db7fe', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booked_car`
--
ALTER TABLE `booked_car`
  ADD PRIMARY KEY (`Booking_id`),
  ADD KEY `Customer_id` (`Customer_id`),
  ADD KEY `Car_id` (`Car_id`);

--
-- Indexes for table `cardetailes`
--
ALTER TABLE `cardetailes`
  ADD PRIMARY KEY (`carid`),
  ADD KEY `Userid` (`Ownerid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booked_car`
--
ALTER TABLE `booked_car`
  MODIFY `Booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cardetailes`
--
ALTER TABLE `cardetailes`
  MODIFY `carid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booked_car`
--
ALTER TABLE `booked_car`
  ADD CONSTRAINT `booked_car_ibfk_1` FOREIGN KEY (`Customer_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `booked_car_ibfk_2` FOREIGN KEY (`Car_id`) REFERENCES `cardetailes` (`carid`);

--
-- Constraints for table `cardetailes`
--
ALTER TABLE `cardetailes`
  ADD CONSTRAINT `cardetailes_ibfk_1` FOREIGN KEY (`Ownerid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
