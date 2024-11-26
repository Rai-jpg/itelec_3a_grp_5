-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql200.infinityfree.com
-- Generation Time: Nov 24, 2024 at 10:04 PM
-- Server version: 10.6.19-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bayanihan_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `Admin_ID` int(11) NOT NULL,
  `Admin_Username` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `Donation_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Event_ID` int(11) NOT NULL,
  `Amount_Donated` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events_tbl`
--

CREATE TABLE `events_tbl` (
  `Event_ID` int(11) NOT NULL,
  `Event_Creator` int(11) NOT NULL,
  `Event_Name` varchar(50) NOT NULL,
  `Phone_Num` varchar(13) DEFAULT NULL,
  `Location` varchar(50) NOT NULL,
  `Event_Date` date NOT NULL,
  `Banner_Image` varchar(255) DEFAULT NULL,
  `Expenses` varchar(12) NOT NULL,
  `Donation_Goal` varchar(12) NOT NULL,
  `joiners` int(11) NOT NULL,
  `Verified` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events_tbl`
--

INSERT INTO `events_tbl` (`Event_ID`, `Event_Creator`, `Event_Name`, `Phone_Num`, `Location`, `Event_Date`, `Banner_Image`, `Expenses`, `Donation_Goal`, `joiners`, `Verified`) VALUES
(5, 5, 'test', '098675346342', 'testing 123', '2024-11-27', 'upload/1732471845.png', '2500', '5000', 0, ''),
(6, 5, 'asfafas', '24124124', 'safsa', '2024-11-28', 'upload/1732474164.png', '1212312', '3231231241', 0, ''),
(7, 5, 'asdsadsaczx', 'zxadsasf', 'cxzzcxczxczx', '2024-11-26', 'upload/1732475756.png', '21214', '214214214214', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `joined_events`
--

CREATE TABLE `joined_events` (
  `Event_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `telephone`, `address`, `password`) VALUES
(1, 'TestUser', 'testuser@example.com', '1234567890', '123 Community Street', '$2y$10$eImiTXuWVxfM37uY4JANjO4lD4w/Fv6iPTp4zHpr5j8A1ECu8G3rK'),
(2, 'jonasm', 'jonasmecayer2@gmail.com', '09613411230', 'MARAWOY LIPA CITY', '$2y$10$kQhaQ9.rlh0761.7CHdzAuR25Qrj56le..bzlVn6waxQfYyWMMrbq'),
(3, 'jonasom', 'jonasmecayer@gmail.com', '09703887231', 'MARAWOY LIPA CITY', '$2y$10$jDPsSjii.NB773ZrCL4Jl.PAoXVq0jCL1xmwgxEN3y3Af.H.jhfRW');

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `User_ID` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Phone_Num` varchar(15) NOT NULL,
  `User_Address` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`User_ID`, `Username`, `Email`, `Phone_Num`, `User_Address`, `Password`) VALUES
(5, 'Test', 'test@gmail.com', '0213123', 'Marawoy', '1111'),
(6, 'nas', 'Jonasmecayer@gmail.com', '09613411230', 'MARAWOY LIPA CITY', 'Snoopy09'),
(7, 'nas', 'Jonasmecayer@gmail.com', '09613411230', 'MARAWOY LIPA CITY', 'Snoopy09'),
(8, 'nas', 'Jonasmecayer@gmail.com', '09613411230', 'MARAWOY LIPA CITY', 'Snoopy09'),
(9, 'nas', 'Jonasmecayer@gmail.com', '09613411230', 'MARAWOY LIPA CITY', 'Snoopy09'),
(10, 'nas', 'Jonasmecayer@gmail.com', '09613411230', 'MARAWOY LIPA CITY', 'Snoopy0923'),
(11, 'nas', 'Jonasmecayer@gmail.com', '09613411230', 'MARAWOY LIPA CITY', 'Snoopy0923'),
(12, 'nas', 'Jonasmecayer@gmail.com', '09613411230', 'MARAWOY LIPA CITY', 'Snoopy0923'),
(13, 'nas', 'Jonasmecayer@gmail.com', '09613411230', 'MARAWOY LIPA CITY', 'Snoopy0923'),
(14, 'asd', 'asdasdasd@gmai.com', '123123', 'asdasdasd', 'asdasdasd'),
(15, 'asd', 'asdasdasd@gmai.com', '123123', 'asdasdasd', 'asdasdasd'),
(16, 'asd', 'asdasdasd@gmai.com', '123123', 'asdasdasd', 'asdasdasd'),
(17, 'asd', 'asdasdasd@gmai.com', '123123', 'asdasdasd', 'asdasdasd'),
(18, 'jonas', 'jonas@gmail.com', '123123', 'asdasd', 'asdasd'),
(19, 'jonas', 'jonas@gmail.com', '123123', 'asdasd', 'asdasd'),
(20, 'jonas', 'jonas@gmail.com', '123123', 'asdasd', 'asdasd'),
(21, 'jonas', 'jonas@gmail.com', '123123', 'asdasd', 'asdasd'),
(22, 'anoba', 'bryanmitra17@gmail.com', '123123123', 'asdasd', 'ewankoba'),
(23, 'anoba', 'bryanmitra17@gmail.com', '123123123', 'asdasd', 'ewankoba'),
(24, 'anoba', 'bryanmitra17@gmail.com', '123123123', 'asdasd', 'ewankoba'),
(25, 'anoba', 'bryanmitra17@gmail.com', '123123123', 'asdasd', 'ewankoba'),
(26, '1620343', 'jonasmecayer@gmail.com', '09613411230', 'MARAWOY LIPA CITY', 'Snoopy09'),
(27, '1620343', 'jonasmecayer@gmail.com', '09613411230', 'MARAWOY LIPA CITY', 'Snoopy09'),
(28, '1620343', 'jonasmecayer@gmail.com', '09613411230', 'MARAWOY LIPA CITY', 'Snoopy09'),
(29, '1620343', 'jonasmecayer@gmail.com', '09613411230', 'MARAWOY LIPA CITY', 'Snoopy09'),
(30, 'banky_moon', 'charlesb614@gmail.com', '09263865884', '#38 Purok 1, Tangway, Lipa City, Batangas', '1111'),
(31, 'banky_moon', 'charlesb614@gmail.com', '09263865884', '#38 Purok 1, Tangway, Lipa City, Batangas', '1111'),
(32, 'banky_moon', 'charlesb614@gmail.com', '09263865884', '#38 Purok 1, Tangway, Lipa City, Batangas', '1111'),
(33, 'banky_moon', 'charlesb614@gmail.com', '09263865884', '#38 Purok 1, Tangway, Lipa City, Batangas', '1111'),
(34, '1620343', 'jonasmecayer@gmail.com', '09613411230', 'MARAWOY LIPA CITY', 'Snoopy09'),
(35, '1620343', 'jonasmecayer@gmail.com', '09613411230', 'MARAWOY LIPA CITY', 'Snoopy09'),
(36, '1620343', 'jonasmecayer@gmail.com', '09613411230', 'MARAWOY LIPA CITY', 'Snoopy09'),
(37, '1620343', 'jonasmecayer@gmail.com', '09613411230', 'MARAWOY LIPA CITY', 'Snoopy09'),
(38, 'Test11231', 'bruh@gmail.com', '058321', 'sdasda', '23141'),
(39, 'Test11231', 'bruh@gmail.com', '0213123', 'Marawoy', '1234'),
(40, 'nas', 'Jonasmecayer@gmail.com', '09613411230', 'MARAWOY LIPA CITY', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`Donation_ID`),
  ADD KEY `Event_ID` (`Event_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `events_tbl`
--
ALTER TABLE `events_tbl`
  ADD PRIMARY KEY (`Event_ID`),
  ADD KEY `Event_Creator` (`Event_Creator`);

--
-- Indexes for table `joined_events`
--
ALTER TABLE `joined_events`
  ADD KEY `Event_ID` (`Event_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `Admin_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `Donation_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `events_tbl`
--
ALTER TABLE `events_tbl`
  MODIFY `Event_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donation`
--
ALTER TABLE `donation`
  ADD CONSTRAINT `donation_ibfk_1` FOREIGN KEY (`Event_ID`) REFERENCES `events_tbl` (`Event_ID`),
  ADD CONSTRAINT `donation_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `users_tbl` (`User_ID`);

--
-- Constraints for table `events_tbl`
--
ALTER TABLE `events_tbl`
  ADD CONSTRAINT `events_tbl_ibfk_1` FOREIGN KEY (`Event_Creator`) REFERENCES `users_tbl` (`User_ID`);

--
-- Constraints for table `joined_events`
--
ALTER TABLE `joined_events`
  ADD CONSTRAINT `joined_events_ibfk_1` FOREIGN KEY (`Event_ID`) REFERENCES `events_tbl` (`Event_ID`),
  ADD CONSTRAINT `joined_events_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `users_tbl` (`User_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
