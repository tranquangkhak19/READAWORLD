-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2021 at 02:43 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_method`
--

CREATE TABLE `address_method` (
  `SID` char(9) NOT NULL,
  `SHIPPING_ADDRESS` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address_method`
--

INSERT INTO `address_method` (`SID`, `SHIPPING_ADDRESS`) VALUES
('S00000001', '123 Nguyen Hue'),
('S00000002', '77 Da Lat'),
('S00000003', '66 Nguyen Van Con'),
('S00000005', '48 The Strand, London, England'),
('S00000006', '111 New Zealand'),
('S00000007', '89 Canal, New York City, USA'),
('S00000009', '117 Wall, Washington City, USA'),
('S00000010', '192 Thoai Ngoc Hau'),
('S00000012', '2 Cong Xa Paris'),
('S00000013', '15 Nam Ky Khoi Nghia'),
('S00000014', '172 Le Thuc Hoach'),
('S00000015', '192 Go Dau'),
('S00000016', '87 Quatar'),
('S00000018', '130 Dubai'),
('S00000019', '37 Jakarta'),
('S00000020', '58 Taiwan'),
('S00000021', '369/13 Bangkok'),
('S00000022', '23 Tokyo'),
('S00000023', '72 Vung Tau'),
('S00000026', '5 Ba Dinh'),
('S00000027', '200 Dien Bien Phu'),
('S00000030', '81 Long An'),
('S00000031', '55 Kuala Lumpur'),
('S00000032', '90 Vacouver'),
('S00000033', '567 Czech'),
('S00000034', '122 Rio'),
('S00000035', '72 Stockholm');

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `ID` char(9) NOT NULL,
  `ANAME` varchar(100) NOT NULL,
  `ADDRESS` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`ID`, `ANAME`, `ADDRESS`) VALUES
('AU0000001', 'Robert Martin', 'Antatica'),
('AU0000002', 'Alan Beaulieu', 'Netherland'),
('AU0000003', 'Anthony Molinaro', 'Rio, Brazil'),
('AU0000004', 'Upom Malik', 'Mumbai, India'),
('AU0000005', 'Paul Dourish', 'New Zealand'),
('AU0000006', 'Richard Feynman', 'Singapore'),
('AU0000007', 'Carl Sagan', 'Texas, America'),
('AU0000008', 'Bill Bryson', 'Iceland'),
('AU0000009', 'Richard Dawkins', 'Paris, France'),
('AU0000010', 'Stephen Hawking', 'Washington, America'),
('AU0000011', 'Stuart Farrimond', 'Stockholm, Sweden'),
('AU0000012', 'Fujiko F Fujio', 'Tokyo, Japan'),
('AU0000013', 'J. K. Rowling', 'Leicester, England'),
('AU0000014', 'Viện ngôn ngữ Hackers', 'TPHCM, Vietnam'),
('AU0000015', 'Dr Alice Roberts', 'Vancouver, Canda');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `ISBN` char(13) NOT NULL,
  `TITLE` varchar(100) NOT NULL,
  `PRICE` bigint(20) NOT NULL,
  `PUBLISHER_NAME` varchar(100) NOT NULL,
  `AUTHOR_ID` char(9) NOT NULL,
  `IMAGE_URL` varchar(255) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`ISBN`, `TITLE`, `PRICE`, `PUBLISHER_NAME`, `AUTHOR_ID`, `IMAGE_URL`, `description`) VALUES
('0000000000001', 'Strawberry Sunday', 220000, 'Prentice Hall', 'AU0000001', 'https://images-na.ssl-images-amazon.com/images/I/51F99MEJDRL.jpg', 'Hello world'),
('0000000000002', 'Influence', 550000, 'OReilly', 'AU0000002', 'https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1328323681l/6571744.jpg', 'Named One of the Best Books of the Year by The Guardian'),
('0000000000003', 'Deep Learning', 130000, 'OReilly', 'AU0000003', 'https://salt.tikicdn.com/cache/w300/ts/product/1e/2c/54/aca6df4d90b36b6d7339480906756b1d.jpg', 'Named One of the Best Books of the Year by The Guardian'),
('0000000000004', 'Beginning C++ Programming', 490000, 'OReilly', 'AU0000004', 'https://images-na.ssl-images-amazon.com/images/I/91crsfALwBL.jpg', 'Begin the best programmer'),
('0000000000005', 'No SQL: The Shifting Materialities of Database Technology', 230000, 'The MIT Press', 'AU0000005', 'https://images-na.ssl-images-amazon.com/images/I/51ZrXeAlm9L.jpg', 'Named One of the Best Books of the Year by The Guardian'),
('0000000000006', 'The Science of Cooking', 200000, 'DK', 'AU0000011', 'https://images-na.ssl-images-amazon.com/images/I/51ZEq5Q5rrL._SX258_BO1,204,203,200_.jpg', 'Get answers to all your cooking science questions, and cook tastier, more nutritious food using fundamental principles, practical advice, and step-by-step techniques.'),
('0000000000007', 'Doraemon - Chú Mèo Máy Đến Từ Tương Lai - Tập 0', 25000, 'NXB Kim Đồng', 'AU0000012', 'https://www.fahasa.com/media/catalog/product/z/2/z2232687178216_234a5a581b1305bdda44ac3a58ea1fed.jpg', 'Named One of the Best Books of the Year by The Guardian'),
('0000000000008', 'Harry Potter and the Deathly Hallows', 85000, 'Bloomsbury Publishing PLC', 'AU0000013', 'https://m.media-amazon.com/images/I/51g7fkELjaL._SL500_.jpg', 'Named One of the Best Books of the Year by The Guardian'),
('0000000000009', 'Hackers Ielts: Writing', 75000, 'NXB Thế Giới', 'AU0000014', 'https://salt.tikicdn.com/cache/w1200/ts/product/51/1e/85/7793d19ae470e25f1ab0cf3455ed8d62.jpg', 'Named One of the Best Books of the Year by The Guardian'),
('0000000000010', 'Evolution: The Human Story', 170000, 'Dorling Kindersley Ltd', 'AU0000015', 'https://thebookland.vn/thumbnail/Evolution4310.jpg', 'Named One of the Best Books of the Year by The Guardian'),
('0000000000011', 'The Feynman Lectures on Physics', 220000, 'Addison – Wesley', 'AU0000006', 'https://pictures.abebooks.com/inventory/30414206578.jpg', 'Named One of the Best Books of the Year by The Guardian'),
('0000000000012', 'Cosmos', 900000, 'Penguin Random House', 'AU0000007', 'https://images-na.ssl-images-amazon.com/images/I/91w4Ci-KMqL.jpg', 'Named One of the Best Books of the Year by The Guardian'),
('0000000000013', 'A really short history of nearly everything', 190000, 'Broadway Books', 'AU0000008', 'https://m.media-amazon.com/images/I/61sVL1xSrlL._SL500_.jpg', 'Named One of the Best Books of the Year by The Guardian'),
('0000000000022', 'Harry Potter and the Chamber of Secrets', 450000, 'Broadway Books', 'AU0000013', 'https://images-na.ssl-images-amazon.com/images/I/51LIbvlkGVL._SX308_BO1,204,203,200_.jpg', 'A stunning new edition of J.K. Rowlings Harry Potter and the Chamber of Secrets');

-- --------------------------------------------------------

--
-- Table structure for table `book_field`
--

CREATE TABLE `book_field` (
  `ISBN` char(13) NOT NULL,
  `BFIELD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_field`
--

INSERT INTO `book_field` (`ISBN`, `BFIELD`) VALUES
('0000000000001', 'VAN HOC'),
('0000000000002', 'CODE'),
('0000000000002', 'CONG NGHE'),
('0000000000002', 'MAY TINH'),
('0000000000002', 'TIEU THUYET'),
('0000000000002', 'VAN HOC NUOC NGOAI'),
('0000000000003', 'CODE'),
('0000000000003', 'CONG NGHE'),
('0000000000003', 'KHOA HOC'),
('0000000000003', 'SACH NGOAI NGU'),
('0000000000004', 'CODE'),
('0000000000004', 'CONG NGHE'),
('0000000000004', 'SACH NGOAI NGU'),
('0000000000005', 'CODE'),
('0000000000005', 'CONG NGHE'),
('0000000000005', 'SACH NGOAI NGU'),
('0000000000006', 'NAU AN'),
('0000000000006', 'SACH NGOAI NGU'),
('0000000000007', 'TRUYEN TRANH'),
('0000000000008', 'TIEU THUYET'),
('0000000000008', 'VAN HOC NUOC NGOAI'),
('0000000000009', 'GIAO DUC'),
('0000000000009', 'SACH NGOAI NGU'),
('0000000000010', 'CON NGUOI'),
('0000000000010', 'KHTN'),
('0000000000010', 'LICH SU'),
('0000000000011', 'KHOA HOC'),
('0000000000011', 'KHTN'),
('0000000000011', 'SACH NGOAI NGU'),
('0000000000012', 'KHOA HOC'),
('0000000000012', 'KHTN'),
('0000000000012', 'SACH NGOAI NGU'),
('0000000000013', 'LICH SU'),
('0000000000013', 'SACH NGOAI NGU');

-- --------------------------------------------------------

--
-- Table structure for table `book_in_transaction`
--

CREATE TABLE `book_in_transaction` (
  `CID` char(9) NOT NULL,
  `PURCHASED_DATE` datetime NOT NULL,
  `ISBN` char(13) NOT NULL,
  `QTY` int(11) DEFAULT NULL,
  `TRANS_TYPE` varchar(50) DEFAULT NULL CHECK (`TRANS_TYPE` in ('BORROW','BUY'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_in_transaction`
--

INSERT INTO `book_in_transaction` (`CID`, `PURCHASED_DATE`, `ISBN`, `QTY`, `TRANS_TYPE`) VALUES
('C00000008', '2018-07-11 00:00:00', '0000000000004', 5, 'BUY'),
('C00000012', '2019-03-21 00:00:00', '0000000000005', 13, 'BUY'),
('C00000009', '2019-05-08 00:00:00', '0000000000008', 18, 'BORROW'),
('C00000008', '2019-07-07 00:00:00', '0000000000007', 6, 'BUY'),
('C00000011', '2020-05-07 00:00:00', '0000000000003', 20, 'BORROW'),
('C00000099', '2020-07-17 00:00:00', '0000000000006', 6, 'BORROW'),
('C00000010', '2020-09-02 00:00:00', '0000000000001', 7, 'BUY'),
('C00000009', '2020-09-18 00:00:00', '0000000000009', 15, 'BUY'),
('C00000012', '2020-11-18 00:00:00', '0000000000012', 10, 'BUY'),
('C00000008', '2020-11-28 00:00:00', '0000000000010', 7, 'BUY'),
('C00000011', '2020-12-21 00:00:00', '0000000000004', 6, 'BUY'),
('C00000099', '2021-01-28 00:00:00', '0000000000013', 7, 'BUY'),
('C00000007', '2021-02-10 00:00:00', '0000000000010', 1, 'BORROW'),
('C00000007', '2021-02-15 00:00:00', '0000000000011', 10, 'BUY'),
('C00000007', '2021-02-20 00:00:00', '0000000000013', 31, 'BUY');

-- --------------------------------------------------------

--
-- Table structure for table `book_keyword`
--

CREATE TABLE `book_keyword` (
  `ISBN` char(13) NOT NULL,
  `KEYWORD` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_keyword`
--

INSERT INTO `book_keyword` (`ISBN`, `KEYWORD`) VALUES
('0000000000001', 'fruit'),
('0000000000002', 'code'),
('0000000000002', 'novel'),
('0000000000002', 'oreilly'),
('0000000000002', 'sunday'),
('0000000000003', 'deep'),
('0000000000003', 'learning'),
('0000000000003', 'technology'),
('0000000000004', 'begin'),
('0000000000004', 'c++'),
('0000000000005', 'nosql'),
('0000000000005', 'sql'),
('0000000000005', 'technology'),
('0000000000006', 'cook'),
('0000000000006', 'science'),
('0000000000007', 'doraemon'),
('0000000000007', 'fujio'),
('0000000000007', 'truyen tranh'),
('0000000000008', 'harry'),
('0000000000008', 'j k rowling'),
('0000000000008', 'tieu thuyet'),
('0000000000009', 'ielts'),
('0000000000009', 'ngoai ngu'),
('0000000000010', 'evolution'),
('0000000000010', 'human'),
('0000000000011', 'feyman'),
('0000000000011', 'lectures'),
('0000000000011', 'physics'),
('0000000000012', 'carl'),
('0000000000012', 'cosmos'),
('0000000000012', 'universe'),
('0000000000013', 'history');

-- --------------------------------------------------------

--
-- Table structure for table `book_transaction`
--

CREATE TABLE `book_transaction` (
  `CID` char(9) NOT NULL,
  `ISBN` char(13) NOT NULL,
  `PURCHASED_DATE` datetime NOT NULL,
  `TRANS_STATUS` varchar(50) DEFAULT NULL CHECK (`TRANS_STATUS` in ('WAITING','EXPORT','ERROR','SUCCESS')),
  `FEEDBACK` varchar(100) DEFAULT NULL,
  `TOTAL` bigint(20) DEFAULT NULL,
  `RESPONSE_DATE` datetime DEFAULT NULL,
  `SHIPPING_ID` char(9) DEFAULT NULL
) ;

--
-- Dumping data for table `book_transaction`
--

INSERT INTO `book_transaction` (`CID`, `ISBN`, `PURCHASED_DATE`, `TRANS_STATUS`, `FEEDBACK`, `TOTAL`, `RESPONSE_DATE`, `SHIPPING_ID`) VALUES
('C00000008', '0000000000004', '2018-07-11 00:00:00', 'SUCCESS', NULL, 14200000, '2018-07-11 00:00:00', 'S00000016'),
('C00000012', '0000000000005', '2019-03-21 00:00:00', 'SUCCESS', NULL, 14270000, '2019-03-21 00:00:00', 'S00000025'),
('C00000009', '0000000000008', '2019-05-08 00:00:00', 'SUCCESS', NULL, 1375000, '2019-05-08 00:00:00', 'S00000019'),
('C00000008', '0000000000007', '2019-07-07 00:00:00', 'SUCCESS', NULL, 3450000, '2019-07-07 00:00:00', 'S00000017'),
('C00000011', '0000000000003', '2020-05-07 00:00:00', 'SUCCESS', NULL, 300000, '2020-05-07 00:00:00', 'S00000023'),
('C00000099', '0000000000006', '2020-07-17 00:00:00', 'SUCCESS', NULL, 1170000, '2020-07-17 00:00:00', 'S00000008'),
('C00000010', '0000000000001', '2020-09-02 00:00:00', 'SUCCESS', NULL, 5555000, '2020-09-02 00:00:00', 'S00000022'),
('C00000009', '0000000000009', '2020-09-18 00:00:00', 'SUCCESS', NULL, 590000, '2020-09-18 00:00:00', 'S00000020'),
('C00000012', '0000000000012', '2020-11-18 00:00:00', 'WAITING', NULL, 710000, '2020-11-18 00:00:00', 'S00000026'),
('C00000008', '0000000000010', '2020-11-28 00:00:00', 'EXPORT', NULL, 8400000, '2020-11-28 00:00:00', 'S00000018'),
('C00000011', '0000000000004', '2020-12-21 00:00:00', 'ERROR', NULL, 0, '2020-12-21 00:00:00', NULL),
('C00000099', '0000000000013', '2021-01-28 00:00:00', 'SUCCESS', NULL, 2850000, '2021-01-28 00:00:00', 'S00000009'),
('C00000007', '0000000000010', '2021-02-10 00:00:00', 'SUCCESS', NULL, 4100000, '2021-02-10 00:00:00', 'S00000013'),
('C00000007', '0000000000011', '2021-02-15 00:00:00', 'SUCCESS', NULL, 5700000, '2021-02-15 00:00:00', 'S00000014'),
('C00000007', '0000000000013', '2021-02-20 00:00:00', 'WAITING', NULL, 6635000, '2021-02-20 00:00:00', 'S00000015'),
('C00000004', '0000000000003', '2021-03-01 00:00:00', 'SUCCESS', NULL, 2730000, '2021-03-01 00:00:00', 'S00000006'),
('C00000004', '0000000000012', '2021-03-01 00:00:00', 'SUCCESS', NULL, 9900000, '2021-03-01 00:00:00', 'S00000007'),
('C00000009', '0000000000010', '2021-03-01 00:00:00', 'ERROR', NULL, 0, '2021-03-01 00:00:00', NULL),
('C00000009', '0000000000012', '2021-03-01 00:00:00', 'SUCCESS', NULL, 7720000, '2021-03-01 00:00:00', 'S00000021'),
('C00000011', '0000000000007', '2021-03-01 00:00:00', 'SUCCESS', NULL, 17970000, '2021-03-01 00:00:00', 'S00000024'),
('C00000099', '0000000000008', '2021-03-01 00:00:00', 'WAITING', NULL, 6230000, '2021-03-02 00:00:00', 'S00000010');

-- --------------------------------------------------------

--
-- Table structure for table `book_year_published`
--

CREATE TABLE `book_year_published` (
  `ISBN` char(13) NOT NULL,
  `PYEAR` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_year_published`
--

INSERT INTO `book_year_published` (`ISBN`, `PYEAR`) VALUES
('0000000000001', 1999),
('0000000000002', 2010),
('0000000000003', 2008),
('0000000000004', 2015),
('0000000000005', 1999),
('0000000000006', 2017),
('0000000000007', 2020),
('0000000000008', 2007),
('0000000000009', 2019),
('0000000000010', 2018),
('0000000000011', 2021),
('0000000000012', 2013),
('0000000000013', 2021);

-- --------------------------------------------------------

--
-- Table structure for table `buys_borrows`
--

CREATE TABLE `buys_borrows` (
  `CID` char(9) NOT NULL,
  `ISBN` char(13) NOT NULL,
  `QTY` int(11) DEFAULT NULL,
  `BTIME` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buys_borrows`
--

INSERT INTO `buys_borrows` (`CID`, `ISBN`, `QTY`, `BTIME`) VALUES
('C00000004', '0000000000003', 21, '2020-10-25 00:00:00'),
('C00000004', '0000000000012', 11, '2020-10-25 00:00:00'),
('C00000007', '0000000000010', 1, '2020-10-25 00:00:00'),
('C00000007', '0000000000011', 10, '2020-10-25 00:00:00'),
('C00000007', '0000000000013', 31, '2020-10-25 00:00:00'),
('C00000008', '0000000000004', 5, '2020-10-25 00:00:00'),
('C00000008', '0000000000007', 6, '2020-10-25 00:00:00'),
('C00000008', '0000000000010', 7, '2020-10-25 00:00:00'),
('C00000009', '0000000000008', 18, '2020-10-25 00:00:00'),
('C00000009', '0000000000009', 15, '2020-10-25 00:00:00'),
('C00000009', '0000000000010', 200, '2020-10-25 00:00:00'),
('C00000009', '0000000000012', 14, '2020-10-25 00:00:00'),
('C00000010', '0000000000001', 7, '2020-10-25 00:00:00'),
('C00000011', '0000000000003', 20, '2020-10-25 00:00:00'),
('C00000011', '0000000000004', 6, '2020-10-25 00:00:00'),
('C00000011', '0000000000007', 2, '2020-10-25 00:00:00'),
('C00000012', '0000000000005', 13, '2020-10-25 00:00:00'),
('C00000012', '0000000000012', 10, '2020-10-25 00:00:00'),
('C00000099', '0000000000006', 6, '2020-10-25 00:00:00'),
('C00000099', '0000000000008', 8, '2020-10-25 00:00:00'),
('C00000099', '0000000000013', 7, '2020-10-25 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CID` char(9) NOT NULL,
  `ISBN` char(13) NOT NULL,
  `QUANTITY` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`CID`, `ISBN`, `QUANTITY`) VALUES
('C00000004', '0000000000006', 2),
('C00000004', '0000000000011', 3),
('C00000099', '0000000000001', 3),
('C00000099', '0000000000002', 3),
('C00000099', '0000000000004', 1),
('C00000099', '0000000000010', 1),
('C00000100', '0000000000001', 1),
('C00000100', '0000000000002', 2),
('C00000100', '0000000000003', 1),
('C00000105', '0000000000001', 1),
('C00000105', '0000000000002', 1),
('C00000105', '0000000000004', 3),
('C00000105', '0000000000006', 1),
('C00000105', '0000000000007', 3),
('C00000106', '0000000000001', 3),
('C00000106', '0000000000002', 1),
('C00000106', '0000000000003', 6);

-- --------------------------------------------------------

--
-- Table structure for table `checks`
--

CREATE TABLE `checks` (
  `ISBN` char(13) NOT NULL,
  `EMP_ID` char(9) NOT NULL,
  `WNAME` varchar(100) NOT NULL,
  `EX_QTY` int(11) DEFAULT NULL,
  `IM_QTY` int(11) DEFAULT NULL,
  `DATE_IM_EX` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cod`
--

CREATE TABLE `cod` (
  `ID` char(9) NOT NULL,
  `DELIVERY_COMPANY` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cod`
--

INSERT INTO `cod` (`ID`, `DELIVERY_COMPANY`) VALUES
('P00000006', 'VIETELPOST'),
('P00000007', 'UPS'),
('P00000008', 'NINJAVAN'),
('P00000009', 'BEST EXPRESS'),
('P00000010', 'VIETELPOST'),
('P00000013', 'BEST EXPRESS'),
('P00000014', 'VIETELPOST'),
('P00000015', 'NINJAVAN'),
('P00000016', 'UPS'),
('P00000017', 'BEST EXPRESS'),
('P00000018', 'VIETELPOST'),
('P00000019', 'UPS'),
('P00000020', 'BEST EXPRESS'),
('P00000021', 'VIETELPOST'),
('P00000022', 'UPS'),
('P00000023', 'NINJAVAN'),
('P00000024', 'VIETELPOST'),
('P00000025', 'VIETELPOST'),
('P00000026', 'NINJAVAN');

-- --------------------------------------------------------

--
-- Table structure for table `credit_card`
--

CREATE TABLE `credit_card` (
  `CCODE` char(16) NOT NULL,
  `EXPIRATION_DATE` date DEFAULT NULL,
  `ONAME` varchar(100) DEFAULT NULL,
  `BNAME` varchar(100) DEFAULT NULL,
  `BRANCH_NAME` varchar(100) DEFAULT NULL,
  `CID` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `credit_card`
--

INSERT INTO `credit_card` (`CCODE`, `EXPIRATION_DATE`, `ONAME`, `BNAME`, `BRANCH_NAME`, `CID`) VALUES
('0174239213749512', '2027-07-07', 'Coco', 'Vietinbank', NULL, 'C00000008'),
('0303030303030303', '2024-06-03', 'Antonio', 'ACB', NULL, 'C00000007'),
('0404040404040404', '2027-11-12', 'Coco', 'MSB', NULL, 'C00000008'),
('0505050505050505', '2024-02-27', 'Jennie', 'Vietinbank', NULL, 'C00000009'),
('0606060606060606', '2025-06-16', 'Kyle', 'EIB', NULL, 'C00000010'),
('0707070707070707', '2024-07-08', 'Kyle', 'ABBANK', NULL, 'C00000010'),
('1249123093479722', '2027-10-11', 'Coco', 'Agribank', NULL, 'C00000008'),
('1253342892402265', '2022-04-25', 'HARRYTHOMPSON', 'STB', NULL, 'C00000012'),
('1846289475830485', '2026-08-26', 'AUSTINBROWN', 'ACB', NULL, 'C00000011'),
('4444444444444444', '2024-03-29', 'Mina', 'ACB', NULL, 'C00000004'),
('5555555555555555', '2027-10-05', 'Mina', 'Techcombank', NULL, 'C00000004'),
('7439291274319771', '2023-01-14', 'HARRYTHOMPSON', 'Vietcombank', NULL, 'C00000012'),
('9931324355242376', '2022-09-13', 'Mina', 'OCB', NULL, 'C00000099'),
('9998284723461265', '2025-04-17', 'Mina', 'Techcombank', NULL, 'C00000099');

-- --------------------------------------------------------

--
-- Table structure for table `credit_payment`
--

CREATE TABLE `credit_payment` (
  `ID` char(9) NOT NULL,
  `CREDIT_CODE` char(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `credit_payment`
--

INSERT INTO `credit_payment` (`ID`, `CREDIT_CODE`) VALUES
('P00000013', '0303030303030303'),
('P00000014', '0303030303030303'),
('P00000015', '0303030303030303'),
('P00000022', '0707070707070707'),
('P00000016', '1249123093479722'),
('P00000007', '4444444444444444'),
('P00000009', '4444444444444444'),
('P00000008', '5555555555555555');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `ID` char(9) NOT NULL,
  `USERNAME` varchar(20) DEFAULT NULL,
  `PWD` text DEFAULT NULL,
  `PHONE` char(11) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `FNAME` varchar(100) NOT NULL,
  `LNAME` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID`, `USERNAME`, `PWD`, `PHONE`, `EMAIL`, `FNAME`, `LNAME`) VALUES
('C00000004', 'user_0004', '$2y$10$hJMzfZsGuB57LnlkJ7acMOFNDHEEXnByYbHEiW9W08zNuWjSA9/E.', '09012340004', 'mina@gmail.com', 'Mina', 'Truong'),
('C00000007', 'harrythompson92', '$2y$10$CTy70Tq/CFqL9X1rw251Hu35nncHz4cZRht36tInsiVjBPqSh96xW', '027173721', 'harrytms@gmail.com', 'Harry', 'Thompson'),
('C00000008', 'robertjackson98', '$2y$10$TgKBYdYCxv04YvewmtRBxOqKylHat9vRyX4vB8AOyn0Sf3WQ02Ga.', '0237351527', 'robertjck@gmail.com', 'Robert', 'Jackson'),
('C00000009', 'joelwalker85', '$2y$10$E/IZspkh0fKqct3ggXeLoO1uDBKMN/hK2gxUk2F2GD.uYqnvrq2vO', '0172537162', 'jwalker12@gmail.com', 'Joel', 'Walker'),
('C00000010', 'judeharrisons87', '$2y$10$Dpq2ozGzEtiAFcH3chKlDe2nAY5wePS2Tnwtap3pagNjkJxlT5Gfm', '0738294631', 'judehs91@gmail.com', 'Jude', 'Harrisons'),
('C00000011', 'user_0011', '$2y$10$bkg9/qlCdtRrcIG.nYBRzezsQN2d4/7vzwa69WD3KR/fUVLOE2AZm', '09012340011', 'anh_truong@gmail.com', 'Anh', 'Truong'),
('C00000012', 'user_0012', '$2y$10$I6Nb0uC6aIBGRfJUHubNmuLRF8dbHtganY6rt9I4fIFcT37i/dKG2', '09012340012', 'huy_nguyentrinh@gmail.com', 'Huy', 'Nguyen Trinh'),
('C00000099', 'user_0005', '$2y$10$MOimcKAa4QsTOCoWC8WA8e4Sf7SCj1NFsVYaX1sC5iBAMlHw8lfeS', '09012340005', 'alex@gmail.com', 'Alex', 'Nguyen'),
('C00000100', 'kha2', '604935d873e58ffc2da6b5bd76a4a427', '0357846271', 'tqk19112001@gmail.com', 'Trần', 'Khả'),
('C00000101', 'kha3', '2c8b900dc2fcdc494e6266379b944e47', '', 'kha5@gmail.com', '', ''),
('C00000102', 'kha5', '2c8b900dc2fcdc494e6266379b944e47', '', 'kha2@gmail.com', '', ''),
('C00000103', 'kha10', '2c8b900dc2fcdc494e6266379b944e47', '', 'kha2@gmail.com', 'tran', ''),
('C00000104', 'kha11', '5786082412c3e9bc0f0f03fa593f0c85', '', 'kha2@gmail.com', '', ''),
('C00000105', 'kha21', '604935d873e58ffc2da6b5bd76a4a427', '0999888777', 'kha5@gmail.com', 'khai', 'tran'),
('C00000106', 'kha', '207b40d2b18eacd5f71df1ff5f72eb8e', '0933322222', 'kha@gmail.com', 'khakha', 'tran quang');

-- --------------------------------------------------------

--
-- Table structure for table `ebook`
--

CREATE TABLE `ebook` (
  `ISBN` char(13) NOT NULL,
  `URL` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ebook`
--

INSERT INTO `ebook` (`ISBN`, `URL`) VALUES
('0000000000001', 'https://www.freebook.org/ebooks/135135135'),
('0000000000004', 'https://www.freebook.org/ebooks/135135135'),
('0000000000006', 'https://www.freebook.org/ebooks/135135135'),
('0000000000007', 'https://www.pdf-free-book.org/9999999999'),
('0000000000013', 'https://www.gutenberg.org/ebooks/31992');

-- --------------------------------------------------------

--
-- Table structure for table `email_method`
--

CREATE TABLE `email_method` (
  `SID` char(9) NOT NULL,
  `SHIPPING_EMAIL` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email_method`
--

INSERT INTO `email_method` (`SID`, `SHIPPING_EMAIL`) VALUES
('S00000004', 'taitran_926@gmail.com'),
('S00000008', 'nguythuong_11@gmail.com'),
('S00000011', 'harrytms@gmail.com'),
('S00000017', 'jwalker12@gmail.com'),
('S00000024', 'lil_dugong@gmail.com'),
('S00000025', 'lpoko_8384@gmail.com'),
('S00000028', 'fasif_367@gmail.com'),
('S00000029', 'call_me_alex_ich@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `ID` char(9) NOT NULL,
  `FNAME` varchar(100) NOT NULL,
  `LNAME` varchar(100) NOT NULL,
  `USERNAME` varchar(20) NOT NULL,
  `PWD` text NOT NULL,
  `PHONE` char(11) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`ID`, `FNAME`, `LNAME`, `USERNAME`, `PWD`, `PHONE`, `EMAIL`) VALUES
('000000001', 'John', 'Wick', 'admin', 'admin', '1234567890', 'admin@gmail.com'),
('000000002', 'kha', 'tran', 'admin1', 'e00cf25ad42683b3df678c61f42c6bda', '0924681012', 'admin1@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `ID` char(9) NOT NULL,
  `PURCHASED_DATE` datetime NOT NULL,
  `PAYMENT_STATUS` varchar(50) DEFAULT NULL CHECK (`PAYMENT_STATUS` in ('PAID','UNPAID')),
  `CID` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`ID`, `PURCHASED_DATE`, `PAYMENT_STATUS`, `CID`) VALUES
('P00000006', '2021-03-01 00:00:00', 'PAID', 'C00000004'),
('P00000007', '2021-03-01 00:00:00', 'PAID', 'C00000004'),
('P00000008', '2020-07-17 00:00:00', 'PAID', 'C00000099'),
('P00000009', '2021-01-28 00:00:00', 'PAID', 'C00000099'),
('P00000010', '2021-03-01 00:00:00', 'PAID', 'C00000099'),
('P00000013', '2021-02-10 00:00:00', 'PAID', 'C00000007'),
('P00000014', '2021-02-15 00:00:00', 'PAID', 'C00000007'),
('P00000015', '2021-02-20 00:00:00', 'UNPAID', 'C00000007'),
('P00000016', '2018-07-11 00:00:00', 'PAID', 'C00000008'),
('P00000017', '2019-07-07 00:00:00', 'PAID', 'C00000008'),
('P00000018', '2020-11-28 00:00:00', 'PAID', 'C00000008'),
('P00000019', '2019-05-08 00:00:00', 'PAID', 'C00000009'),
('P00000020', '2020-09-18 00:00:00', 'PAID', 'C00000009'),
('P00000021', '2021-03-01 00:00:00', 'UNPAID', 'C00000009'),
('P00000022', '2020-09-02 00:00:00', 'PAID', 'C00000010'),
('P00000023', '2020-05-07 00:00:00', 'PAID', 'C00000011'),
('P00000024', '2021-03-01 00:00:00', 'PAID', 'C00000011'),
('P00000025', '2019-03-21 00:00:00', 'PAID', 'C00000012'),
('P00000026', '2020-11-18 00:00:00', 'UNPAID', 'C00000012');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `PNAME` varchar(100) NOT NULL,
  `ADDRESS` varchar(100) DEFAULT NULL,
  `PHONE` char(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`PNAME`, `ADDRESS`, `PHONE`) VALUES
('Addison – Wesley', NULL, NULL),
('Bantam Books', NULL, NULL),
('Bloomsbury Publishing PLC', NULL, NULL),
('Broadway Books', NULL, NULL),
('DK', NULL, NULL),
('Dorling Kindersley Ltd', NULL, NULL),
('Free Press', NULL, NULL),
('NXB Kim Đồng', NULL, NULL),
('NXB Thế Giới', NULL, NULL),
('OReilly', NULL, NULL),
('Penguin Random House', NULL, NULL),
('Prentice Hall', NULL, NULL),
('The MIT Press', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_method`
--

CREATE TABLE `shipping_method` (
  `SID` char(9) NOT NULL,
  `FEE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping_method`
--

INSERT INTO `shipping_method` (`SID`, `FEE`) VALUES
('S00000001', 30000),
('S00000002', 10000),
('S00000003', 15000),
('S00000004', 0),
('S00000005', 15000),
('S00000006', 15000),
('S00000007', 10000),
('S00000008', 0),
('S00000009', 10000),
('S00000010', 10000),
('S00000011', 0),
('S00000012', 15000),
('S00000013', 10000),
('S00000014', 10000),
('S00000015', 10000),
('S00000016', 20000),
('S00000017', 0),
('S00000018', 10000),
('S00000019', 10000),
('S00000020', 10000),
('S00000021', 20000),
('S00000022', 15000),
('S00000023', 10000),
('S00000024', 0),
('S00000025', 0),
('S00000026', 20000),
('S00000027', 15000),
('S00000028', 0),
('S00000029', 0),
('S00000030', 10000),
('S00000031', 43000),
('S00000032', 27000),
('S00000033', 56000),
('S00000034', 12000),
('S00000035', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `stocked_in`
--

CREATE TABLE `stocked_in` (
  `TRD_BOOK_ISBN` char(13) NOT NULL,
  `WNAME` varchar(100) NOT NULL,
  `AVAILABLE_QTY` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `traditional_book`
--

CREATE TABLE `traditional_book` (
  `ISBN` char(13) NOT NULL,
  `BOOK_STATUS` varchar(30) DEFAULT NULL CHECK (`BOOK_STATUS` in ('AVAILABLE','UNAVAILABLE'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `traditional_book`
--

INSERT INTO `traditional_book` (`ISBN`, `BOOK_STATUS`) VALUES
('0000000000002', 'UNAVAILABLE'),
('0000000000003', 'AVAILABLE'),
('0000000000005', 'AVAILABLE'),
('0000000000008', 'AVAILABLE'),
('0000000000009', 'AVAILABLE'),
('0000000000010', 'AVAILABLE'),
('0000000000011', 'AVAILABLE'),
('0000000000012', 'UNAVAILABLE');

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `ID` char(9) NOT NULL,
  `BANKING_DETAIL` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`ID`, `BANKING_DETAIL`) VALUES
('P00000006', NULL),
('P00000010', 'Nice job'),
('P00000017', NULL),
('P00000018', NULL),
('P00000019', 'hahaha'),
('P00000020', NULL),
('P00000021', NULL),
('P00000023', NULL),
('P00000024', NULL),
('P00000025', 'nice book'),
('P00000026', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `WNAME` varchar(100) NOT NULL,
  `PHONE` char(11) DEFAULT NULL,
  `ADDRESS` varchar(100) DEFAULT NULL,
  `MANAGER_ID` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `work_for`
--

CREATE TABLE `work_for` (
  `PNAME` varchar(100) NOT NULL,
  `AUTHOR_ID` char(9) NOT NULL,
  `SALARY` bigint(20) DEFAULT NULL,
  `PROJECT_BOOK` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `work_for`
--

INSERT INTO `work_for` (`PNAME`, `AUTHOR_ID`, `SALARY`, `PROJECT_BOOK`) VALUES
('Addison – Wesley', 'AU0000011', 25000000, 'PHYSICS'),
('Bantam Books', 'AU0000013', 100000000, 'BLACK HOLES'),
('Bloomsbury Publishing PLC', 'AU0000008', 90000000, 'HARRY POTTER'),
('Broadway Books', 'AU0000013', 55000000, 'LEGACY'),
('DK', 'AU0000006', 70000000, 'COOKING'),
('Dorling Kindersley Ltd', 'AU0000010', 25000000, 'HUMAN HISTORY'),
('Free Press', 'AU0000013', 65000000, 'CIRCLE OF LIFE'),
('NXB Kim Đồng', 'AU0000007', 80000000, 'DORAEMON'),
('NXB Thế Giới', 'AU0000009', 20000000, 'IELTS'),
('OReilly', 'AU0000001', 15000000, 'IN HA NOI'),
('OReilly', 'AU0000002', 30000000, 'HOW TO CRUSH SOMEONE'),
('Penguin Random House', 'AU0000012', 45000000, 'UNIVERSE'),
('Prentice Hall', 'AU0000004', 50000000, 'YOUR LIFE'),
('Prentice Hall', 'AU0000005', 60000000, 'DATABSE TUTORIAL'),
('The MIT Press', 'AU0000003', 40000000, 'SMART TALK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_method`
--
ALTER TABLE `address_method`
  ADD PRIMARY KEY (`SID`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`ISBN`),
  ADD KEY `PUBLISHER_NAME` (`PUBLISHER_NAME`),
  ADD KEY `AUTHOR_ID` (`AUTHOR_ID`);

--
-- Indexes for table `book_field`
--
ALTER TABLE `book_field`
  ADD PRIMARY KEY (`ISBN`,`BFIELD`);

--
-- Indexes for table `book_in_transaction`
--
ALTER TABLE `book_in_transaction`
  ADD PRIMARY KEY (`PURCHASED_DATE`,`CID`,`ISBN`),
  ADD KEY `CID` (`CID`),
  ADD KEY `ISBN` (`ISBN`);

--
-- Indexes for table `book_keyword`
--
ALTER TABLE `book_keyword`
  ADD PRIMARY KEY (`ISBN`,`KEYWORD`);

--
-- Indexes for table `book_transaction`
--
ALTER TABLE `book_transaction`
  ADD PRIMARY KEY (`PURCHASED_DATE`,`CID`,`ISBN`),
  ADD KEY `ISBN` (`ISBN`),
  ADD KEY `CID` (`CID`),
  ADD KEY `SHIPPING_ID` (`SHIPPING_ID`);

--
-- Indexes for table `book_year_published`
--
ALTER TABLE `book_year_published`
  ADD PRIMARY KEY (`ISBN`,`PYEAR`);

--
-- Indexes for table `buys_borrows`
--
ALTER TABLE `buys_borrows`
  ADD PRIMARY KEY (`CID`,`ISBN`),
  ADD KEY `ISBN` (`ISBN`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CID`,`ISBN`),
  ADD KEY `ISBN` (`ISBN`);

--
-- Indexes for table `checks`
--
ALTER TABLE `checks`
  ADD PRIMARY KEY (`ISBN`,`EMP_ID`,`WNAME`,`DATE_IM_EX`),
  ADD KEY `EMP_ID` (`EMP_ID`),
  ADD KEY `WNAME` (`WNAME`);

--
-- Indexes for table `cod`
--
ALTER TABLE `cod`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `credit_card`
--
ALTER TABLE `credit_card`
  ADD PRIMARY KEY (`CCODE`),
  ADD KEY `CID` (`CID`);

--
-- Indexes for table `credit_payment`
--
ALTER TABLE `credit_payment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CREDIT_CODE` (`CREDIT_CODE`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `ebook`
--
ALTER TABLE `ebook`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indexes for table `email_method`
--
ALTER TABLE `email_method`
  ADD PRIMARY KEY (`SID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`ID`,`CID`,`PURCHASED_DATE`),
  ADD KEY `PURCHASED_DATE` (`PURCHASED_DATE`,`CID`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`PNAME`);

--
-- Indexes for table `shipping_method`
--
ALTER TABLE `shipping_method`
  ADD PRIMARY KEY (`SID`);

--
-- Indexes for table `stocked_in`
--
ALTER TABLE `stocked_in`
  ADD PRIMARY KEY (`TRD_BOOK_ISBN`,`WNAME`),
  ADD KEY `WNAME` (`WNAME`);

--
-- Indexes for table `traditional_book`
--
ALTER TABLE `traditional_book`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`WNAME`),
  ADD KEY `MANAGER_ID` (`MANAGER_ID`);

--
-- Indexes for table `work_for`
--
ALTER TABLE `work_for`
  ADD PRIMARY KEY (`PNAME`,`AUTHOR_ID`),
  ADD KEY `AUTHOR_ID` (`AUTHOR_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address_method`
--
ALTER TABLE `address_method`
  ADD CONSTRAINT `address_method_ibfk_1` FOREIGN KEY (`SID`) REFERENCES `shipping_method` (`SID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`PUBLISHER_NAME`) REFERENCES `publisher` (`PNAME`),
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`AUTHOR_ID`) REFERENCES `author` (`ID`);

--
-- Constraints for table `book_field`
--
ALTER TABLE `book_field`
  ADD CONSTRAINT `book_field_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `book_in_transaction`
--
ALTER TABLE `book_in_transaction`
  ADD CONSTRAINT `book_in_transaction_ibfk_1` FOREIGN KEY (`CID`) REFERENCES `customer` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_in_transaction_ibfk_2` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_in_transaction_ibfk_3` FOREIGN KEY (`PURCHASED_DATE`) REFERENCES `book_transaction` (`PURCHASED_DATE`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `book_keyword`
--
ALTER TABLE `book_keyword`
  ADD CONSTRAINT `book_keyword_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `book_transaction`
--
ALTER TABLE `book_transaction`
  ADD CONSTRAINT `book_transaction_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_transaction_ibfk_2` FOREIGN KEY (`CID`) REFERENCES `customer` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_transaction_ibfk_3` FOREIGN KEY (`SHIPPING_ID`) REFERENCES `shipping_method` (`SID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `book_year_published`
--
ALTER TABLE `book_year_published`
  ADD CONSTRAINT `book_year_published_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `buys_borrows`
--
ALTER TABLE `buys_borrows`
  ADD CONSTRAINT `buys_borrows_ibfk_1` FOREIGN KEY (`CID`) REFERENCES `customer` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `buys_borrows_ibfk_2` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`CID`) REFERENCES `customer` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `checks`
--
ALTER TABLE `checks`
  ADD CONSTRAINT `checks_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `checks_ibfk_2` FOREIGN KEY (`EMP_ID`) REFERENCES `employee` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `checks_ibfk_3` FOREIGN KEY (`WNAME`) REFERENCES `warehouse` (`WNAME`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cod`
--
ALTER TABLE `cod`
  ADD CONSTRAINT `cod_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `payment` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `credit_card`
--
ALTER TABLE `credit_card`
  ADD CONSTRAINT `credit_card_ibfk_1` FOREIGN KEY (`CID`) REFERENCES `customer` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `credit_payment`
--
ALTER TABLE `credit_payment`
  ADD CONSTRAINT `credit_payment_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `payment` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `credit_payment_ibfk_2` FOREIGN KEY (`CREDIT_CODE`) REFERENCES `credit_card` (`CCODE`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ebook`
--
ALTER TABLE `ebook`
  ADD CONSTRAINT `ebook_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `email_method`
--
ALTER TABLE `email_method`
  ADD CONSTRAINT `email_method_ibfk_1` FOREIGN KEY (`SID`) REFERENCES `shipping_method` (`SID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`PURCHASED_DATE`,`CID`) REFERENCES `book_transaction` (`PURCHASED_DATE`, `CID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stocked_in`
--
ALTER TABLE `stocked_in`
  ADD CONSTRAINT `stocked_in_ibfk_1` FOREIGN KEY (`TRD_BOOK_ISBN`) REFERENCES `traditional_book` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stocked_in_ibfk_2` FOREIGN KEY (`WNAME`) REFERENCES `warehouse` (`WNAME`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `traditional_book`
--
ALTER TABLE `traditional_book`
  ADD CONSTRAINT `traditional_book_ibfk_1` FOREIGN KEY (`ISBN`) REFERENCES `book` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transfer`
--
ALTER TABLE `transfer`
  ADD CONSTRAINT `transfer_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `payment` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD CONSTRAINT `warehouse_ibfk_1` FOREIGN KEY (`MANAGER_ID`) REFERENCES `employee` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `work_for`
--
ALTER TABLE `work_for`
  ADD CONSTRAINT `work_for_ibfk_1` FOREIGN KEY (`PNAME`) REFERENCES `publisher` (`PNAME`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `work_for_ibfk_2` FOREIGN KEY (`AUTHOR_ID`) REFERENCES `author` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
