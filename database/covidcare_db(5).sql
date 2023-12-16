-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2023 at 10:59 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covidcare_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` text DEFAULT NULL,
  `contact_number` varchar(15) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(50) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `name`, `city`, `address`, `contact_number`, `website`, `email`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Aga Khan University Hospital', 'Karachi', 'Stadium Road, Karachi', '+92-21-34930051', 'www.agakhanhospitals.org', 'info@aku.edu', '2023-11-14 13:57:21', '2023-11-16 16:17:57', 'Approved'),
(2, 'Liaquat National Hospital', 'Karachi', 'National Stadium Road, Karachi', '+92-21-11145645', 'www.lnh.edu.pk', 'info@lnh.edu.pk', '2023-11-14 13:57:21', '2023-11-16 16:08:24', 'Rejected'),
(3, 'Jinnah Postgraduate Medical Centre', 'Karachi', 'Rafiqi Shaheed Road, Karachi', '+92-21-99201300', 'www.jpmc.edu.pk', 'info@jpmc.edu.pk', '2023-11-14 13:57:21', '2023-11-16 16:18:00', 'Approved'),
(4, 'Shaukat Khanum Memorial Cancer Hospital', 'Lahore', 'Johar Town, Lahore', '+92-42-35905000', 'www.shaukatkhanum.org.pk', 'info@skm.org.pk', '2023-11-14 13:57:21', '2023-11-16 16:18:01', 'Rejected'),
(5, 'Punjab Institute of Cardiology', 'Lahore', 'Yakki Gate, Lahore', '+92-42-99203051', 'www.piclhr.edu.pk', 'info@piclhr.edu.pk', '2023-11-14 13:57:21', '2023-11-16 15:46:23', 'Approved'),
(6, 'Polyclinic Hospital', 'Islamabad', 'Sector G-6, Islamabad', '+92-51-9218300', 'www.polycinic.gov.pk', 'info@polycinic.gov.pk', '2023-11-14 13:57:21', '2023-11-16 16:18:02', 'Rejected'),
(7, 'Shifa International Hospital', 'Islamabad', 'Sector H-8/4, Islamabad', '+92-51-8463000', 'www.shifa.com.pk', 'info@shifa.com.pk', '2023-11-14 13:57:21', '2023-11-16 15:46:24', 'Approved'),
(8, 'Nishtar Hospital', 'Multan', 'Kutchery Road, Multan', '+92-61-9200233', 'www.nishtarhospital.pk', 'info@nishtarhospital.pk', '2023-11-14 13:57:21', '2023-11-16 16:17:55', 'Rejected'),
(9, 'Childrens Hospital & Institute of Child Health', 'Faisalabad', 'Susan Road, Faisalabad', '+92-41-9210080', 'www.chichfaisalabad.gov.pk', 'info@chichfaisalabad.gov.pk', '2023-11-14 13:57:21', '2023-11-16 15:46:26', 'Approved'),
(10, 'Madina Teaching Hospital', 'Faisalabad', 'Address27', '+92-41-2651901', 'www.madinahospital.edu.pk', 'info@madinahospital.edu.pk', '2023-11-14 13:57:21', '2023-11-16 15:46:43', 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`Id`, `Name`, `Email`, `Password`) VALUES
(1, 'Abdul Musavir', 'abdulmusavir415@gmail.com', 'Apple12#'),
(2, 'Faran Abbas', 'faran@gmail.com', 'faran@123'),
(3, 'Faran Abbas', 'faran@gmail.com', 'faran@123'),
(4, 'Ibrahim', 'ibrahim@gmail.com', 'ibrahim123'),
(5, 'Ibrahim', 'ibrahim@gmail.com', 'ibrahim123'),
(7, 'Abdul Majeed', 'majeed12@gmail.com', 'Majeed12#');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointment`
--

CREATE TABLE `tbl_appointment` (
  `Id` int(10) NOT NULL,
  `PatientName` varchar(100) NOT NULL,
  `Contact` varchar(12) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Date` date NOT NULL,
  `Time` varchar(50) NOT NULL,
  `Category` varchar(20) NOT NULL,
  `Hospital` varchar(100) NOT NULL,
  `VaccineName` varchar(100) NOT NULL,
  `Status` int(1) NOT NULL DEFAULT 1,
  `h_id` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_appointment`
--

INSERT INTO `tbl_appointment` (`Id`, `PatientName`, `Contact`, `Email`, `Date`, `Time`, `Category`, `Hospital`, `VaccineName`, `Status`, `h_id`) VALUES
(55, 'Abdul Majeed', '03103836377', 'musavir12@gmail.com', '2023-12-06', '11-01', 'Covid-19 test', '22', 'JohnsonJohnsonJanssen', 1, 22),
(57, 'Abdul Majeed', '03304951259', 'musavir12@gmail.com', '2023-12-12', '11-01', 'Covid-19 test', '22', 'JohnsonJohnsonJanssen', 1, 22),
(58, 'Fahim Qureshi', '03103836377', 'fahim12@gmail.com', '2023-12-13', '9-11', 'Covid-19 test', '21', 'Pfizer-BioNTech (Comirnaty)', 1, 21);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Contact` varchar(12) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`Id`, `Name`, `Contact`, `Email`, `Message`) VALUES
(9, 'Ali', '03103836377', 'Ali@gmail.com', 'contact me as soon as possible'),
(10, 'Abdul Majeed', '03103836377', 'majeed12@gmail.com', 'hello '),
(11, 'Fahim Qureshi', '03103836377', 'fahim12@gmail.com', 'contact me as soon as possible'),
(12, 'Jaweria', '12345678901', 'jaweria@gmail.com', 'contact me as soon as possible'),
(13, 'Abdul Musavir', '03103836377', 'musavir12@gmail.com', 'or kia hal hain aap ka ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hospital`
--

CREATE TABLE `tbl_hospital` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Contact` varchar(12) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Password` varchar(15) NOT NULL,
  `Status` int(1) NOT NULL DEFAULT 1,
  `Ap_Id` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_hospital`
--

INSERT INTO `tbl_hospital` (`Id`, `Name`, `Contact`, `Email`, `Address`, `Password`, `Status`, `Ap_Id`) VALUES
(20, 'Roshan Medical Centre', '03352158033', 'roshanhospital1@gmail.com', 'Near National Stadium Karachi', 'roshan1@', 1, NULL),
(21, 'Agha Khan Hospital', '03352158033', 'khanagha2@gmail.com', 'Near National Stadium Karachi', 'aghakhan1@', 1, NULL),
(22, 'Al Khidmat ', '03352158033', 'khidmat12@gmail.com', 'Near National Stadium Karachi', 'khidmat1@', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient`
--

CREATE TABLE `tbl_patient` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Contact` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(10) NOT NULL,
  `Status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_patient`
--

INSERT INTO `tbl_patient` (`Id`, `Name`, `Contact`, `Email`, `Password`, `Status`) VALUES
(48, 'Abdul Majeed', '03103836377', 'abdul12@gmail.com', 'Majeed1@', 1),
(49, 'Abdul Musavir', '03103836377', 'musavir12@gmail.com', 'Apple12#', 1),
(50, 'Fahim Qureshi', '03103836377', 'fahim12@gmail.com', 'fahima1@', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `Id` int(11) NOT NULL,
  `PatientName` varchar(50) NOT NULL,
  `PatientContact` varchar(12) NOT NULL,
  `VaccineStatus` varchar(50) NOT NULL,
  `TestResult` varchar(50) NOT NULL,
  `TestDate` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`Id`, `PatientName`, `PatientContact`, `VaccineStatus`, `TestResult`, `TestDate`) VALUES
(11, 'Fahim Qureshi 1', '03103836377', ' not Vaccinated', 'Negative', '25-Nov-23'),
(13, 'Abdul Musavir', '03103836377', 'Vaccinated', 'Negative', '26-Nov-23'),
(16, 'Fahim Qureshi', '03103836377', 'Not-Vaccinated', 'Negative', '2023-12-13'),
(17, 'Fahim Qureshi', '03103836377', 'Vaccinated', 'Positive', '2023-12-13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vaccines`
--

CREATE TABLE `tbl_vaccines` (
  `Id` int(11) NOT NULL,
  `VaccineName` varchar(100) NOT NULL,
  `VaccineCode` int(11) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_vaccines`
--

INSERT INTO `tbl_vaccines` (`Id`, `VaccineName`, `VaccineCode`, `Status`) VALUES
(1, 'Pfizer-BioNTech (Comirnaty)', 313567, 1),
(10, 'ModernaSpikevax', 1313, 1),
(11, 'JohnsonJohnsonJanssen', 3135, 1),
(12, 'AstraZenecaVaxzevria', 5577, 1),
(13, 'Covaxin', 8899, 1),
(14, 'Covovax 12', 45501, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `fk_key` (`h_id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_hospital`
--
ALTER TABLE `tbl_hospital`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `hk_key` (`Ap_Id`);

--
-- Indexes for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_vaccines`
--
ALTER TABLE `tbl_vaccines`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_hospital`
--
ALTER TABLE `tbl_hospital`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_vaccines`
--
ALTER TABLE `tbl_vaccines`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD CONSTRAINT `fk_key` FOREIGN KEY (`h_id`) REFERENCES `tbl_hospital` (`Id`);

--
-- Constraints for table `tbl_hospital`
--
ALTER TABLE `tbl_hospital`
  ADD CONSTRAINT `hk_key` FOREIGN KEY (`Ap_Id`) REFERENCES `tbl_appointment` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
