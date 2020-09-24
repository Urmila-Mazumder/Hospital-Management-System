-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2020 at 03:49 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `ambulance_driver`
--

CREATE TABLE `ambulance_driver` (
  `AD_ID` varchar(4) NOT NULL,
  `Vehicle_Reg` varchar(50) NOT NULL,
  `A_ID` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ambulance_driver`
--

INSERT INTO `ambulance_driver` (`AD_ID`, `Vehicle_Reg`, `A_ID`) VALUES
('AD_0', 'DHAKA-D-11-9998', 'A_0'),
('AD_1', 'DHAKA-D-11-9999', 'A_0'),
('AD_2', 'DHAKA-D-11-9900', 'A_0');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `App_ID` int(11) NOT NULL,
  `D_ID` varchar(4) NOT NULL,
  `P_ID` varchar(11) NOT NULL,
  `A_Date` varchar(10) NOT NULL,
  `A_Time` varchar(15) NOT NULL,
  `Fees` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`App_ID`, `D_ID`, `P_ID`, `A_Date`, `A_Time`, `Fees`) VALUES
(1, 'D_18', 'P_100002', '03-09-2020', '05.30-06.00', 500),
(2, 'D_19', 'P_100001', '04-09-2020', '08.00-08.30', 2000),
(3, 'D_19', 'P_100002', '04-09-2020', '09.00-09.30', 2000),
(4, 'D_19', 'P_100003', '04-09-2020', '11.30-12.00', 2000),
(5, 'D_19', 'P_100001', '04-09-2020', '08.30-09.00', 2000),
(6, 'D_18', 'P_100001', '04-09-2020', '07.30-08.00', 500),
(7, 'D_18', 'P_100001', '04-09-2020', '07.30-08.00', 500),
(8, 'D_18', 'P_100001', '04-09-2020', '07.30-08.00', 500),
(9, 'D_18', 'P_100001', '04-09-2020', '04.00-04.30', 500),
(10, 'D_18', 'P_100001', '04-09-2020', '06.00-06.30', 500),
(11, 'D_18', 'P_100001', '04-09-2020', '05.30-06.00', 500),
(12, 'D_18', 'P_100001', '04-09-2020', '05.30-06.00', 500),
(13, 'D_18', 'P_100001', '04-09-2020', '05.30-06.00', 500),
(14, 'D_18', 'P_100001', '04-09-2020', '05.30-06.00', 500),
(15, 'D_18', 'P_100001', '04-09-2020', '05.30-06.00', 500),
(16, 'D_18', 'P_100001', '04-09-2020', '05.30-06.00', 500),
(17, 'D_19', 'P_100004', '04-09-2020', '09.30-10.00', 2000),
(18, 'D_18', 'P_100005', '04-09-2020', '04.30-05.00', 500),
(19, 'D_19', 'P_100001', '05-09-2020', '08.30-09.00', 2000),
(20, 'D_19', 'P_100001', '20-09-2020', '11.00-11.30', 2000),
(21, 'D_19', 'P_100002', '20-09-2020', '08.30-09.00', 2000),
(22, 'D_19', 'P_100002', '20-09-2020', '09.00-09.30', 2000),
(23, 'D_19', 'P_100001', '20-09-2020', '09.30-10.00', 2000),
(24, 'D_20', 'P_100003', '20-09-2020', '08.00-08.30', 2000),
(25, 'D_20', 'P_100003', '20-09-2020', '10.00-10.30', 2000),
(26, 'D_20', 'P_100004', '20-09-2020', '09.30-10.00', 2000),
(27, 'D_20', 'P_100005', '20-09-2020', '08.30-09.00', 2000),
(28, 'D_19', 'P_100006', '20-09-2020', '11.30-12.00', 2000),
(29, 'D_19', 'P_100004', '20-09-2020', '10.00-10.30', 2000),
(30, 'D_20', 'P_100006', '20-09-2020', '09.00-09.30', 2000),
(31, 'D_20', 'P_100001', '21-09-2020', '09.30-10.00', 2000),
(34, 'D_19', 'P_100002', '21-09-2020', '11.00-11.30', 2000),
(35, 'D_19', 'P_100003', '21-09-2020', '09.00-09.30', 2000),
(36, 'D_19', 'P_100010', '23-09-2020', '08.30-09.00', 2000),
(37, 'D_19', 'P_100001', '23-09-2020', '10.30-11.00', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `appoint_time`
--

CREATE TABLE `appoint_time` (
  `AT_ID` int(11) NOT NULL,
  `D_ID` varchar(4) NOT NULL,
  `T1` varchar(14) NOT NULL,
  `S1` varchar(50) NOT NULL,
  `T2` varchar(14) NOT NULL,
  `S2` varchar(50) NOT NULL,
  `T3` varchar(14) NOT NULL,
  `S3` varchar(50) NOT NULL,
  `T4` varchar(14) NOT NULL,
  `S4` varchar(50) NOT NULL,
  `T5` varchar(14) NOT NULL,
  `S5` varchar(50) NOT NULL,
  `T6` varchar(14) NOT NULL,
  `S6` varchar(50) NOT NULL,
  `T7` varchar(14) NOT NULL,
  `S7` varchar(50) NOT NULL,
  `T8` varchar(14) NOT NULL,
  `S8` varchar(50) NOT NULL,
  `A_Date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appoint_time`
--

INSERT INTO `appoint_time` (`AT_ID`, `D_ID`, `T1`, `S1`, `T2`, `S2`, `T3`, `S3`, `T4`, `S4`, `T5`, `S5`, `T6`, `S6`, `T7`, `S7`, `T8`, `S8`, `A_Date`) VALUES
(1, 'D_17', '08.00-08.30', '0', '08.30-09.00', '0', '09.00-09.30', '0', '09.30-10.00', '0', '10.00-10.30', '0', '10.30-11.00', '0', '11.00-11.30', '0', '11.30-12.00', '0', '24-09-2020'),
(2, 'D_18', '04.00-04.30', '0', '04.30-05.00', '0', '05.00-05.30', '0', '05.30-06.00', '0', '06.00-06.30', '0', '06.30-07.00', '0', '07.00-07.30', '0', '07.30-08.00', '0', '24-09-2020'),
(3, 'D_19', '08.00-08.30', '0', '08.30-09.00', '0', '09.00-09.30', '0', '09.30-10.00', '0', '10.00-10.30', '0', '10.30-11.00', '0', '11.00-11.30', '0', '11.30-12.00', '0', '24-09-2020'),
(4, 'D_20', '08.00-08.30', '0', '08.30-09.00', '0', '09.00-09.30', '0', '09.30-10.00', '0', '10.00-10.30', '0', '10.30-11.00', '0', '11.00-11.30', '0', '11.30-12.00', '0', '24-09-2020'),
(7, 'D_21', '08.00-08.30', '0', '08.30-09.00', '0', '09.00-09.30', '0', '09.30-10.00', '0', '10.00-10.30', '0', '10.30-11.00', '0', '11.00-11.30', '0', '11.30-12.00', '0', '24-09-2020'),
(8, 'D_22', '12.00-12.30', '0', '12.30-01.00', '0', '01.00-01.30', '0', '01.30-02.00', '0', '02.00-02.30', '0', '02.30-03.00', '0', '03.00-03.30', '0', '03.30-04.00', '0', '24-09-2020'),
(9, 'D_23', '08.00-08.30', '0', '08.30-09.00', '0', '09.00-09.30', '0', '09.30-10.00', '0', '10.00-10.30', '0', '10.30-11.00', '0', '11.00-11.30', '0', '11.30-12.00', '0', '24-09-2020');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `B_ID` int(11) NOT NULL,
  `Date` varchar(10) NOT NULL,
  `P_ID` varchar(10) NOT NULL,
  `Total_Amount` double NOT NULL,
  `D_Amount` double NOT NULL,
  `T_Amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`B_ID`, `Date`, `P_ID`, `Total_Amount`, `D_Amount`, `T_Amount`) VALUES
(1, '23-09-2020', 'P_100001', 2000, 0, 0),
(2, '21-09-2020', 'P_100002', 2000, 0, 0),
(3, '21-09-2020', 'P_100003', 0, 2000, 0),
(4, '20-09-2020', 'P_100004', 3000, 0, 0),
(5, '20-09-2020', 'P_100005', 0, 2000, 0),
(6, '20-09-2020', 'P_100006', 0, 2000, 0),
(7, '23-09-2020', 'P_100010', 0, 2000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `D_ID` varchar(10) NOT NULL,
  `Video_Link` varchar(100) NOT NULL,
  `App_ID` int(11) NOT NULL,
  `Degree` varchar(100) NOT NULL,
  `Fees` double NOT NULL,
  `ATime` varchar(15) NOT NULL,
  `A_ID` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`D_ID`, `Video_Link`, `App_ID`, `Degree`, `Fees`, `ATime`, `A_ID`) VALUES
('D_10', '0', 1, '0', 0, '', ''),
('D_11', 'None', 1, 'MBBS', 500, '08.00-12.00 PM', 'A_0'),
('D_12', 'None', 1, 'MBBS', 1000, '08.00-12.00 PM', 'A_0'),
('D_13', 'None', 1, 'MBBS', 500, '04.00-08.00 PM', 'A_0'),
('D_14', 'None', 1, 'MBBS', 1000, '04.00-08.00 PM', 'A_0'),
('D_15', 'None', 1, 'MBBS', 500, '08.00-12.00 PM', 'A_0'),
('D_16', 'None', 1, 'MBBS', 2000, '04.00-08.00 PM', 'A_0'),
('D_17', 'None', 1, 'MBBS, FCPS, FRCS', 1500, '08.00-12.00 PM', 'A_0'),
('D_18', 'https://www.google.com/', 1, 'MBBS', 500, '04.00-08.00 PM', 'A_0'),
('D_19', 'None', 1, 'MBBS, FCPS, FRCS', 2000, '08.00-12.00 PM', 'A_0'),
('D_20', 'https://www.google.com/', 1, 'MBBS, FCPS, FRCS', 2000, '08.00-12.00 PM', 'A_0'),
('D_21', 'None', 1, 'MBBS', 500, '08.00-12.00 PM', 'A_0'),
('D_22', 'None', 1, 'MBBS', 1000, '12.00-04.00 PM', 'A_0'),
('D_23', 'https://outlook.live.com/owa/', 1, 'MBBS', 500, '08.00-12.00 PM', 'A_0');

-- --------------------------------------------------------

--
-- Table structure for table `med_list`
--

CREATE TABLE `med_list` (
  `M_ID` int(11) NOT NULL,
  `Medicine_Name` varchar(50) NOT NULL,
  `Disease_Name` varchar(100) NOT NULL,
  `Company_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `med_list`
--

INSERT INTO `med_list` (`M_ID`, `Medicine_Name`, `Disease_Name`, `Company_Name`) VALUES
(1, 'Atova(Atorvastatin)', 'Lipid Profile (Diabetes, Cholesterol)', 'Beximco pharma'),
(2, 'Rosu (Rosuvastatin)', 'Lipid Profile (Diabetes, Cholesterol)', 'Popular pharma'),
(3, 'Cefotil (Cefuroxime)', 'Urine C/S  (kidney,Urine infection,Kidney stones)', 'Square pharma'),
(4, 'Urokit plus(citric acid monohydrade 5%+ potassium ', 'Urine C/S  (kidney,Urine infection,Kidney stones)', 'Eskayef pharma'),
(5, 'Napa(Paracetamol) ', 'Dengue IgM & Dengue IgG (Dengue )\r\n', 'Beximco Pharma'),
(6, 'Bemsivir (Remdesivir)', 'Covid-19  ', 'Beximco Pharma'),
(7, 'Imanix (imatinib)', 'C.B.C (Wide range of disorders, including anemia, infection and leukemia)', 'Beacon Pharma'),
(8, 'Cef-3 (Cefixime)', 'C.B.C (Wide range of disorders, including anemia, infection and leukemia)', 'Square pharma');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `P_ID` varchar(10) NOT NULL,
  `B_ID` int(11) NOT NULL,
  `App_ID` int(11) NOT NULL,
  `PDate` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`P_ID`, `B_ID`, `App_ID`, `PDate`) VALUES
('P_100000', 0, 0, '04-09-2020'),
('P_100001', 1, 0, '23-09-2020'),
('P_100002', 2, 0, '22-09-2020'),
('P_100003', 3, 0, '22-09-2020'),
('P_100004', 4, 0, '21-09-2020'),
('P_100005', 5, 0, '20-09-2020'),
('P_100006', 6, 0, '21-09-2020'),
('P_100007', 1, 0, '04-09-2020'),
('P_100008', 1, 0, '04-09-2020'),
('P_100009', 1, 0, '04-09-2020'),
('P_100010', 7, 0, '24-09-2020');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `Pr_ID` int(11) NOT NULL,
  `P_ID` varchar(10) NOT NULL,
  `Test_Name` varchar(50) NOT NULL,
  `D_ID` varchar(4) NOT NULL,
  `Medicine_Name` varchar(100) NOT NULL,
  `Dose` varchar(50) NOT NULL,
  `Date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`Pr_ID`, `P_ID`, `Test_Name`, `D_ID`, `Medicine_Name`, `Dose`, `Date`) VALUES
(1, 'P_100001', 'Covid-19', 'D_20', 'Napa(Paracetamol)', '2 Days', '23-09-2020'),
(4, 'P_100001', '', 'D_20', 'Napa(Paracetamol)', '7 Days', '24-09-2020');

-- --------------------------------------------------------

--
-- Table structure for table `receptionist`
--

CREATE TABLE `receptionist` (
  `R_ID` varchar(3) NOT NULL,
  `B_ID` varchar(3) NOT NULL,
  `A_ID` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receptionist`
--

INSERT INTO `receptionist` (`R_ID`, `B_ID`, `A_ID`) VALUES
('R_0', '0', 'A_0'),
('R_1', '0', 'A_0'),
('R_2', '0', 'A_0');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `TA_ID` varchar(5) NOT NULL,
  `T_Name` varchar(50) NOT NULL,
  `T_Amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`TA_ID`, `T_Name`, `T_Amount`) VALUES
('TA_01', 'Covid-19', 200),
('TA_02', 'C.B.C', 500),
('TA_03', 'Dengue IgM', 500),
('TA_04', 'Dengue IgG', 500),
('TA_05', 'Urine C/S', 550),
('TA_06', 'Lipid Profile', 1100);

-- --------------------------------------------------------

--
-- Table structure for table `testing_section`
--

CREATE TABLE `testing_section` (
  `T_ID` int(11) NOT NULL,
  `T_Name` varchar(50) NOT NULL,
  `T_Date` varchar(10) NOT NULL,
  `Result` text NOT NULL,
  `T_Amount` double NOT NULL,
  `P_ID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testing_section`
--

INSERT INTO `testing_section` (`T_ID`, `T_Name`, `T_Date`, `Result`, `T_Amount`, `P_ID`) VALUES
(7, 'Covid-19', '06-09-2020', 'Test_Report/c046ce747d.jpg', 200, 'P_100001');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `U_ID` varchar(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `DOB` varchar(10) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `B_G` varchar(3) NOT NULL,
  `Age` int(3) NOT NULL,
  `Pre_Add` varchar(50) NOT NULL,
  `Per_Add` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Mobile` varchar(11) NOT NULL,
  `Telephone` varchar(8) DEFAULT NULL,
  `Photo` text DEFAULT NULL,
  `User_Name` varchar(20) NOT NULL,
  `Password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`U_ID`, `Name`, `DOB`, `Gender`, `B_G`, `Age`, `Pre_Add`, `Per_Add`, `Email`, `Mobile`, `Telephone`, `Photo`, `User_Name`, `Password`) VALUES
('AD_0', 'Sumit Malakar', '25-01-1980', 'Male', 'AB-', 40, 'Khulna', 'Khulna', 'malakar.sumit@gmail.com', '01715252525', '66666666', 'uploads/5038aacce4.jpg', 'SM123', '12345'),
('AD_1', 'Shahin', '27-08-1995', 'Male', 'A+', 23, 'Dhaka', 'Dhaka', 'shahin@gmail.com', '01715910000', '', 'uploads/46aafe7b91.png', 'Shahin123', '12345'),
('AD_2', 'Urmila Mazumder', '04-08-1998', 'Female', 'B+', 22, 'Dhaka', 'Narayangong', 'urmila.mazumder@gmail.com', '01714564858', '', 'uploads/4cc0c4750b.png', 'Urmila.Driver', '12345'),
('A_0', 'Hridoy Bir', '25-01-1980', 'Male', 'O+', 40, 'Dhaka', 'Dhaka', 'bir@gmail.com', '01715910000', '05877125', 'uploads/b118912486.png', 'bir.admin', '123'),
('D_10', 'Mousumi Malakar', '27-11-1992', 'Female', 'B+', 23, 'Australia', 'Australia', 'mousumi@gmail.com', '01715656565', '0', 'uploads/f311984d88.png', 'mousumi123', '12345'),
('D_11', 'Mousumi Malakar', '27-11-1992', 'Female', 'B+', 28, 'Australia', 'Australia', 'mousumi@gmail.com', '01715916352', '11111111', 'uploads/35f736f744.png', 'mousumi1234', '12345'),
('D_12', 'Satyajit', '12-12-1999', 'Male', 'A+', 23, 'Dhaka', 'Khulna', 'malakar.satyajit@gmail.com', '11111111111', '', 'uploads/4a19f06330.png', 'Satyajit123456', '12345'),
('D_13', 'Fahim Ahamed', '12-08-1999', 'Male', 'A+', 21, 'Dhaka', 'Khulna', 'fahim@gmail.com', '11111111111', '', 'uploads/8f15c8f8f9.jpg', 'Fahim123', '123'),
('D_14', 'Sumit Malakar', '12-12-1997', 'Male', 'A+', 23, 'Dhaka', 'Khulna', 'malakar.satyajit@gmail.com', '01715916353', '', 'uploads/196524a2c6.jpg', 'Sumit123D', '12345'),
('D_15', 'Urmila Mazumder', '12-12-1999', 'Female', 'B+', 21, 'Dhaka', 'Narayangong', 'urmila@gmail.com', '01711111111', '', 'uploads/3cdef8cf4c.jpg', 'Urmila123', '12345'),
('D_16', 'Urmila Mazumder', '04-08-1998', 'Female', 'B+', 22, 'Dhaka', 'Khulna', 'urmila.mazumder@gmail.com', '01715989898', '', 'uploads/2f43c4dbf2.png', 'Urmila12345', '12345'),
('D_17', 'Fahim', '21-12-1984', 'Male', 'O+', 36, 'Dhaka', 'Khulna', 'fahim@gmail.com', '01715313636', '', 'uploads/fe5584166b.jpg', 'Fahim12345', '12345'),
('D_18', 'Urmila Mazumder', '04-08-1990', 'Female', 'AB+', 30, 'Dhaka', 'Dhaka', 'urmila@gmail.com', '01715251263', '', 'uploads/78097e11a5.', 'Urmi12345', '12345'),
('D_19', 'Sumit Malakar', '12-12-1980', 'Male', 'O+', 40, 'Dhaka', 'Khulna', 'malakar.sumit@gmail.com', '01715985656', '', 'uploads/6ecee02b92.jpg', 'sumit.doc', '12345'),
('D_20', 'S.S Malakar', '12-12-1980', 'Male', 'A+', 40, 'Dhaka', 'Khulna', 'malakar.satyajit@gmail.com', '01715213456', '', 'uploads/302927188b.png', 'SS123', '123'),
('D_21', 'Sabuj Sharker', '21-09-1992', 'Male', 'O+', 28, 'Dhaka', 'Khulna', 'sabuj.sharker@gmail.com', '01715313131', '', 'uploads/6fd196a8e4.', 'Sabuj123', '12345'),
('D_22', 'Satyajit Malakar', '12-12-1992', 'Male', 'O+', 28, 'Dhaka', 'Khulna', 'malakar.sumit@gmail.com', '01715346459', '', 'uploads/5bc168748e.png', 'Satyajit123456789', '12345'),
('D_23', 'Fahim Ahamed', '06-09-1995', 'Male', 'O+', 25, 'Dhaka', 'Khulna', 'fahim.ahamed@gmail.com', '01712369584', '', 'uploads/5f212d567a.jpg', 'Fahim1234', '12345'),
('P_100001', 'Satyajit Malakar', '12-12-1997', 'Male', 'O+', 23, 'Dhaka', 'Khulna', 'malakar.satyajit@gmail.com', '01715916353', '11111111', 'uploads/b8af63f38e.jpg', 'Satyajit123', '12345'),
('P_100002', 'Sumit Malakar', '12-12-1997', 'Male', 'O+', 23, 'Dhaka', 'Khulna', 'malakar.satyajit@gmail.com', '11111111111', '', 'uploads/e73168f6ac.png', 'Sumit123', '12345'),
('P_100003', 'Satyajit', '12-12-1997', 'Male', 'A-', 23, 'Dhaka', 'Khulna', 'malakar.satyajit@gmail.com', '66666666666', '', 'uploads/dd4ca70d49.', 'Sumit12345', '12345'),
('P_100004', 'Satyajit', '12-12-1997', 'Male', 'O+', 23, 'Dhaka', 'Khulna', 'malakar.satyajit@gmail.com', '11111111111', '', 'uploads/dcbea6f853.', 'Sumit123456', '12345'),
('P_100005', 'Satyajit', '12-12-1997', 'Male', 'A+', 23, 'Dhaka', 'Khulna', 'malakar.satyajit@gmail.com', '11111111111', '', 'uploads/ba09de1924.', 'Sumit12342132', '12345'),
('P_100006', 'Sumit', '12-12-1997', 'Male', 'A+', 23, 'Dhaka', 'Khulna', 'malakar.satyajit@gmail.com', '11111111111', '', 'uploads/1cd9a5dab9.', 'Sumit123421321', '12345'),
('P_100010', 'Chaitali Mazumder', '25-03-1996', 'Female', 'B+', 24, 'Dhaka', 'Narayangong', 'chaitali.mazumder@gmail.com', '01715824263', '', 'uploads/f17b0e122d.png', 'Chaitali123', '12345'),
('R_0', 'Progga Shirsho Some', '27-08-2000', 'Male', 'A+', 20, 'Dhaka', 'Khulna', 'progga.shome@gmail.com', '01715658585', '88888888', 'uploads/fc0a1431fa.png', 'progga.rec', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ambulance_driver`
--
ALTER TABLE `ambulance_driver`
  ADD PRIMARY KEY (`AD_ID`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`App_ID`);

--
-- Indexes for table `appoint_time`
--
ALTER TABLE `appoint_time`
  ADD PRIMARY KEY (`AT_ID`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`B_ID`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`D_ID`);

--
-- Indexes for table `med_list`
--
ALTER TABLE `med_list`
  ADD PRIMARY KEY (`M_ID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`P_ID`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`Pr_ID`);

--
-- Indexes for table `receptionist`
--
ALTER TABLE `receptionist`
  ADD PRIMARY KEY (`R_ID`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`TA_ID`);

--
-- Indexes for table `testing_section`
--
ALTER TABLE `testing_section`
  ADD PRIMARY KEY (`T_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`U_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `App_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `appoint_time`
--
ALTER TABLE `appoint_time`
  MODIFY `AT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `B_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `med_list`
--
ALTER TABLE `med_list`
  MODIFY `M_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `Pr_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testing_section`
--
ALTER TABLE `testing_section`
  MODIFY `T_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
