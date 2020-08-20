-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: אוגוסט 20, 2020 בזמן 09:16 AM
-- גרסת שרת: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faultsystem`
--

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `fault`
--

DROP TABLE IF EXISTS `fault`;
CREATE TABLE IF NOT EXISTS `fault` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `faultDate` date NOT NULL,
  `faultCategory` varchar(50) NOT NULL,
  `faultLocation` varchar(50) NOT NULL,
  `faultDescription` varchar(255) NOT NULL,
  `faultOpenBy` varchar(9) NOT NULL,
  `faultStatus` varchar(20) NOT NULL,
  `faultClosedDate` date NOT NULL,
  `faultPriority` int NOT NULL,
  `serviceManComments` varchar(255) DEFAULT NULL,
  `partsReplaced` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- הוצאת מידע עבור טבלה `fault`
--

INSERT INTO `fault` (`ID`, `faultDate`, `faultCategory`, `faultLocation`, `faultDescription`, `faultOpenBy`, `faultStatus`, `faultClosedDate`, `faultPriority`, `serviceManComments`, `partsReplaced`) VALUES
(1, '2020-08-19', 'electricity', 'ספריה', 'TEXTETXTETXTXE', '205913619', 'closed', '0000-00-00', 0, NULL, NULL),
(2, '2020-08-19', 'safetyHazard', 'ספריה', 'asdsadsadsadas', '205913619', 'open', '0000-00-00', 5, NULL, NULL),
(3, '2020-08-19', 'toilet', 'ספריה', 'gjghhggh', '205913619', 'open', '0000-00-00', 2, NULL, NULL),
(4, '2020-08-19', 'electricity', 'ספריה', 'rtyrtyrtyrty', '205913619', 'open', '0000-00-00', 1, NULL, NULL),
(5, '2020-08-19', 'safetyHazard', 'dsafsdf', 'sdfsdf', '205913619', 'open', '0000-00-00', 2, NULL, NULL),
(6, '2020-08-19', 'toilet', 'dsfsdf', 'sdfsdf', '207894563', 'open', '0000-00-00', 4, NULL, NULL),
(7, '2020-08-19', 'electricity', 'dsfgdgf', 'sdfgsdfg', '205913619', 'open', '0000-00-00', 3, NULL, NULL),
(8, '2020-08-19', 'safetyHazard', '31145647', '31145647 fault', '205913619', 'open', '0000-00-00', 0, NULL, NULL),
(9, '2020-08-19', 'safetyHazard', '31145647', '31145647 fault', '205913619', 'open', '0000-00-00', 3, NULL, NULL),
(10, '2020-08-19', 'safetyHazard', '31145647', '31145647 id ', '31145647', 'open', '0000-00-00', 3, NULL, NULL),
(11, '2020-08-19', 'electricity', 'gg', 'gg', '31145647', 'open', '0000-00-00', 3, NULL, NULL),
(12, '2020-08-19', 'isNull', '26', '546', '31145647', 'open', '0000-00-00', 3, NULL, NULL),
(13, '2020-08-19', 'safetyHazard', 'fghfgh', 'jj', '205913619', 'open', '0000-00-00', 4, NULL, NULL),
(14, '2020-08-19', 'electricity', 'fggadfg', 'fsdagfg', '205913619', 'open', '0000-00-00', 4, NULL, NULL),
(15, '2020-08-19', 'electricity', 'fggadfg', 'fsdagfg', '205913619', 'open', '0000-00-00', 4, NULL, NULL),
(16, '2020-08-19', 'electricity', 'dfggf', 'dfgfdgfg', '31145647', 'open', '0000-00-00', 5, NULL, NULL),
(17, '2020-08-19', 'electricity', 'sdfdf', 'asdiuf asdaiufsdiau siduah isdahfiusdhfuisdahf uisdaf hfiusda hfihaiuaiufhiahfiusdh ishufi shdfihif uh asiudf isduhf isduhafasiduhfsaikhksgjhsfdkjgh fdkjgh kjhgkjhgkjfshg kdhg khg ksfhgdhga lkhgjskajhg ksdjhg ksah asdgkhj sdkjgkjhg fhgkjhg kshg jsfhgh g', '207894563', 'open', '0000-00-00', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` varchar(9) NOT NULL,
  `firstName` varchar(25) NOT NULL,
  `lastName` varchar(25) NOT NULL,
  `userPassword` varchar(25) NOT NULL,
  `Role` varchar(25) NOT NULL,
  `userPhoneNumber` varchar(25) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- הוצאת מידע עבור טבלה `users`
--

INSERT INTO `users` (`ID`, `firstName`, `lastName`, `userPassword`, `Role`, `userPhoneNumber`) VALUES
('205913619', 'yuval', 'shai', '123456', 'Student', '0528954775'),
('31145647', 'rotem', 'levi', '123456', 'serviceMan', '7894562'),
('207894563', 'adi', 'hemo', '123456', 'Staff', '12345678'),
('1111111', 'שדג', 'שדג', 'שדגשדג', 'Student', '1231321');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
