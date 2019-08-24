-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2019 at 06:01 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_room`
--

-- --------------------------------------------------------

--
-- Table structure for table `manage_booking`
--

CREATE TABLE `manage_booking` (
  `BOOKING_ID` int(10) NOT NULL,
  `MEMBER_ID` int(10) DEFAULT NULL,
  `TYPEROOM_ID` int(10) DEFAULT NULL,
  `BOOKING_DATE` date DEFAULT NULL,
  `PAY_DATE` date DEFAULT NULL,
  `DATE_STAY` date DEFAULT NULL,
  `DATE_END` date DEFAULT NULL,
  `SUM_AMOUNT` int(10) DEFAULT NULL,
  `BOOKING_STATUS` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manage_booking`
--

INSERT INTO `manage_booking` (`BOOKING_ID`, `MEMBER_ID`, `TYPEROOM_ID`, `BOOKING_DATE`, `PAY_DATE`, `DATE_STAY`, `DATE_END`, `SUM_AMOUNT`, `BOOKING_STATUS`) VALUES
(9, 2, 4, '2019-01-04', '2019-01-12', '2019-01-30', '2019-01-31', 2000, 'Y'),
(10, 3, 4, '2019-01-04', '2019-01-06', '2019-01-06', '2019-01-06', 1000, 'Y'),
(11, 2, 4, '2019-01-12', '0000-00-00', '2019-01-30', '2019-01-31', 1000, 'N'),
(12, 4, 8, '2019-01-25', '0000-00-00', '2019-01-25', '2019-01-25', 1500, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `manage_bookingdetail`
--

CREATE TABLE `manage_bookingdetail` (
  `BOOKINGDETAIL_ID` int(10) NOT NULL,
  `BOOKING_ID` int(10) DEFAULT NULL,
  `ROOM_ID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manage_bookingdetail`
--

INSERT INTO `manage_bookingdetail` (`BOOKINGDETAIL_ID`, `BOOKING_ID`, `ROOM_ID`) VALUES
(37, 9, 3),
(38, 9, 4),
(39, 11, 6),
(51, 12, 9),
(53, 10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `manage_building`
--

CREATE TABLE `manage_building` (
  `BUILDING_ID` int(10) NOT NULL,
  `BUILDING_NAME` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manage_building`
--

INSERT INTO `manage_building` (`BUILDING_ID`, `BUILDING_NAME`) VALUES
(1, 'ตึก 1'),
(2, 'ตึก 2'),
(3, 'ตึก 3'),
(4, 'ตึก 4'),
(6, 'ตึก 5');

-- --------------------------------------------------------

--
-- Table structure for table `manage_class`
--

CREATE TABLE `manage_class` (
  `CLASS_ID` int(10) NOT NULL,
  `CLASS_NAME` varchar(200) DEFAULT NULL,
  `BUILDING_ID` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manage_class`
--

INSERT INTO `manage_class` (`CLASS_ID`, `CLASS_NAME`, `BUILDING_ID`) VALUES
(1, 'ชั้น 1', 1),
(2, 'ชั้น 2', 1),
(3, 'ชั้น 3', 1),
(6, 'ชั้น 1', 2),
(7, 'ชั้น 2', 2),
(8, 'ชั้น 4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `manage_data`
--

CREATE TABLE `manage_data` (
  `manage_id` int(10) NOT NULL,
  `manage_name` varchar(2000) DEFAULT NULL,
  `manage_flie` varchar(200) DEFAULT NULL,
  `manage_order` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `manage_location`
--

CREATE TABLE `manage_location` (
  `ID` int(11) NOT NULL,
  `location_name` varchar(255) DEFAULT NULL,
  `location` varchar(2000) DEFAULT NULL,
  `location_google` varchar(2000) DEFAULT NULL,
  `location_tel` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manage_location`
--

INSERT INTO `manage_location` (`ID`, `location_name`, `location`, `location_google`, `location_tel`) VALUES
(10, 'รัตนจินดาแมนชั่น', '23/414 ม.13 ถ.โชคชัย4 ซอย 61 แขวงลาดพร้าว แขวง ลาดพร้าว เขต ลาดพร้าว กรุงเทพมหานคร 10230', 'https://www.google.com/maps/search/?api=1&query=รัตนจินดาแมนชั่น', '0847823571');

-- --------------------------------------------------------

--
-- Table structure for table `manage_news`
--

CREATE TABLE `manage_news` (
  `NEWS_ID` int(10) NOT NULL,
  `NEWS_SUB` varchar(200) DEFAULT NULL,
  `NEWS_DETAIL` varchar(2000) DEFAULT NULL,
  `NEWS_STATUS` varchar(10) DEFAULT NULL,
  `NEWS_DATE` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manage_news`
--

INSERT INTO `manage_news` (`NEWS_ID`, `NEWS_SUB`, `NEWS_DETAIL`, `NEWS_STATUS`, `NEWS_DATE`) VALUES
(1, 'ลดกะหนำ3', 'รายละเอียด :', 'Y', '2018-11-25'),
(2, 'ทดสอบการทำงาน', 'ทดสอบการทำงาน', 'Y', '2018-09-26'),
(3, 'ลดกะหนำ555', 'เช็คข้อมูล3333', 'Y', '2018-12-03');

-- --------------------------------------------------------

--
-- Table structure for table `manage_room`
--

CREATE TABLE `manage_room` (
  `ROOM_ID` int(10) NOT NULL,
  `ROOM_NAME` varchar(200) DEFAULT NULL,
  `BUILDING_ID` int(1) DEFAULT NULL,
  `CLASS_ID` int(10) DEFAULT NULL,
  `TYPEROOM_ID` int(10) DEFAULT NULL,
  `ROOM_STATUS` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manage_room`
--

INSERT INTO `manage_room` (`ROOM_ID`, `ROOM_NAME`, `BUILDING_ID`, `CLASS_ID`, `TYPEROOM_ID`, `ROOM_STATUS`) VALUES
(2, '11/1', 1, 1, 4, 'N'),
(3, '11/2', 1, 1, 4, 'N'),
(4, '11/3', 1, 1, 4, 'N'),
(5, '11/4', 1, 1, 4, 'N'),
(6, '11/5', 1, 1, 4, 'N'),
(7, '11/6', 1, 1, 4, 'Y'),
(8, '21/1', 2, 6, 2, 'Y'),
(9, '12/1', 1, 2, 8, 'Y'),
(10, '13/1', 1, 3, 3, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `manage_satisfaction`
--

CREATE TABLE `manage_satisfaction` (
  `SATIS_ID` int(10) NOT NULL,
  `MEMBER_ID` int(10) DEFAULT NULL,
  `TYPEROOM_ID` int(10) DEFAULT NULL,
  `FACILITIES` int(1) DEFAULT NULL,
  `CLEAN` int(1) DEFAULT NULL,
  `DESIGN` int(1) DEFAULT NULL,
  `SIZE` int(1) DEFAULT NULL,
  `ROOM_RATES` int(1) DEFAULT NULL,
  `SERVICE_FEE` int(1) DEFAULT NULL,
  `FINESS_ROOM` int(1) DEFAULT NULL,
  `FOOD_PRICE` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manage_satisfaction`
--

INSERT INTO `manage_satisfaction` (`SATIS_ID`, `MEMBER_ID`, `TYPEROOM_ID`, `FACILITIES`, `CLEAN`, `DESIGN`, `SIZE`, `ROOM_RATES`, `SERVICE_FEE`, `FINESS_ROOM`, `FOOD_PRICE`) VALUES
(2, 3, 4, 4, 5, 4, 4, 4, 5, 3, 2),
(3, 3, 4, 5, 4, 2, 3, 3, 4, 3, 4),
(4, 3, 4, 5, 4, 4, 4, 4, 4, 3, 5),
(5, 2, 4, 4, 5, 4, 5, 5, 4, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `manage_typeroom`
--

CREATE TABLE `manage_typeroom` (
  `TYPEROOM_ID` int(10) NOT NULL,
  `TYPEROOM_NAME` varchar(200) DEFAULT NULL,
  `TYPEROOM_SATUS` varchar(10) DEFAULT NULL,
  `TYPEROOM_AMOUNT` int(10) DEFAULT NULL,
  `TYPEROOM_TSATUS` varchar(10) DEFAULT NULL,
  `TYPEROOM_NUMIMAGE` int(10) DEFAULT NULL,
  `TYPEROOM_DETAIL` varchar(4000) DEFAULT NULL,
  `TYPEROOM_AREA` varchar(200) DEFAULT NULL,
  `TYPEROOM_SIZE` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manage_typeroom`
--

INSERT INTO `manage_typeroom` (`TYPEROOM_ID`, `TYPEROOM_NAME`, `TYPEROOM_SATUS`, `TYPEROOM_AMOUNT`, `TYPEROOM_TSATUS`, `TYPEROOM_NUMIMAGE`, `TYPEROOM_DETAIL`, `TYPEROOM_AREA`, `TYPEROOM_SIZE`) VALUES
(2, 'ห้องเตียงคู่', '1', 1700, 'Y', NULL, 'ตกแต่งด้วยโทนสีสดใสมีชีวิตชีวา พร้อมกับมีเตียงใหญ่ 2 เตียง ห้องขนาด 27 ตร.ม. นี้ มีความกว้างขวาง เหมาะสำหรับทั้งคู่หูนักท่องเที่ยวและลูกค้าที่มาเป็นคู่ เรามีการเตรียมเตียงเด็ก ที่กั้นกันเด็กตกเตียง และสิ่งอำนวยความสะดวกต่างๆที่จะช่วยรับรองความปลอดภัยของลูกค้าที่เดินทางมาพร้อมกับเด็กเล็กเอาไว้ด้วย มีให้บริการทั้งชั้นที่ปลอดบุหรี่และไม่ปลอดบุหรี่', '27 ตร.ม.', '123 ซ.ม. x 200 ซ.ม.'),
(3, 'ห้อง 3 เตียง', '1', 2000, 'Y', NULL, 'นี่เป็นห้องชุดสุดหรูตกแต่งด้วยสีโทนน้ำตาลเข้มและสีขาว ในห้องนั่งเล่นมีโต๊ะทำงานและโซฟาที่มีขนาดใหญ่เป็นพิเศษ ห้องนี้เหมาะสำหรับทั้งไว้ใช้นั่งทำงานให้เสร็จและใช้เพื่อผ่อนคลายอย่างเงียบสงบ อีกทั้งมีพื้นที่เก็บของมากมาย ทำให้คุณไม่ต้องกังวลอะไรเลยในการเข้าพักระยะยาว ห้องชุดสุดหรูที่ดูจะฟุ่มเฟือยแต่ก็มีราคาที่สมเหตุสมผลนี้เป็นที่นิยมในลูกค้าวัยรุ่นมาก', '27 ตร.ม.', '120 ซ.ม. x 200 ซ.ม.'),
(4, 'ห้องธรรมดา', '2', 1000, 'Y', NULL, 'ห้องนี้อยู่ที่ชั้น10 และ ชั้น11 ของโรงแรม คุณจะได้เห็นทิวทัศน์ที่งดงามของมัตสึโมโต้ในยามค่ำคืน และได้เห็นวิวของที่ราบมัตสึโมโต้และภูเขาโดยรอบ รวมไปถึงเทือกเขาแอลป์ญี่ปุ่นด้วย ในห้องขนาด 17 ตร.ม.นี้ คุณจะพบเตียงกึ่งเตียงคู่พร้อมกับเครื่องนอนที่เรียบนุ่ม ทำจากผ้าฝ้าย 100% ห้องพักที่กว้างขวางในราคาที่สมเหตุสมผลห้องนี้ถือเป็นตัวเลือกที่ยอดเยี่ยมทั้งสำหรับลูกค้าที่เป็นนักธุรกิจหรือนักท่องเที่ยวที่มาคนเดียวและมากันเป็นคู่ มีให้บริการทั้งชั้นที่ปลอดบุหรี่และไม่ปลอดบุหรี่', '17 ตร.ม.', '150 ซ.ม. x 200 ซ.ม'),
(8, 'ห้องเตียงเดี่ยว', '1', 1500, 'Y', NULL, 'ห้องนี้อยู่ที่ชั้น10 และ ชั้น11 ของโรงแรม คุณจะได้เห็นทิวทัศน์ที่งดงามของมัตสึโมโต้ในยามค่ำคืน และได้เห็นวิวของที่ราบมัตสึโมโต้และภูเขาโดยรอบ รวมไปถึงเทือกเขาแอลป์ญี่ปุ่นด้วย ในห้องขนาด 17 ตร.ม.นี้ คุณจะพบเตียงกึ่งเตียงคู่พร้อมกับเครื่องนอนที่เรียบนุ่ม ทำจากผ้าฝ้าย 100% ห้องพักที่กว้างขวางในราคาที่สมเหตุสมผลห้องนี้ถือเป็นตัวเลือกที่ยอดเยี่ยมทั้งสำหรับลูกค้าที่เป็นนักธุรกิจหรือนักท่องเที่ยวที่มาคนเดียวและมากันเป็นคู่ มีให้บริการทั้งชั้นที่ปลอดบุหรี่และไม่ปลอดบุหรี่', '17 ตร.ม.', '150 ซ.ม. x 200 ซ.ม.');

-- --------------------------------------------------------

--
-- Table structure for table `mannage_roomimage`
--

CREATE TABLE `mannage_roomimage` (
  `IMAGE_ID` int(10) NOT NULL,
  `TYPEROOM_ID` int(10) DEFAULT NULL,
  `IMAGE_NAME` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mannage_roomimage`
--

INSERT INTO `mannage_roomimage` (`IMAGE_ID`, `TYPEROOM_ID`, `IMAGE_NAME`) VALUES
(13, 8, 'image_1_20181215072610_34576.jpg'),
(16, 8, 'image_2_20181215075001_18408.jpg'),
(17, 8, 'image_3_20181218060135_88049.jpg'),
(18, 8, 'image_4_20181218060135_67321.jpg'),
(19, 8, 'image_5_20181218060135_37066.jpg'),
(20, 4, 'image_1_20181218063246_63948.jpg'),
(21, 2, 'image_1_20181218064308_54755.JPG'),
(22, 2, 'image_2_20181218064308_12302.JPG'),
(23, 2, 'image_3_20181218064308_29562.jpg'),
(24, 2, 'image_4_20181218064308_67720.JPG'),
(26, 3, 'image_2_20181218065311_65293.jpg'),
(27, 3, 'image_3_20181218065311_90332.jpg'),
(28, 3, 'image_4_20181218065311_36137.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `MEMBER_ID` int(10) NOT NULL COMMENT 'รหัส',
  `USERNAME` varchar(200) DEFAULT NULL,
  `PASSWORD` varchar(200) DEFAULT NULL,
  `MEMBER_TYPE` int(10) DEFAULT NULL,
  `FULLNAME` varchar(200) DEFAULT NULL,
  `LASTNAME` varchar(200) DEFAULT NULL,
  `ADDRESS` varchar(200) DEFAULT NULL,
  `TEL` varchar(20) DEFAULT NULL,
  `EMAIL` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`MEMBER_ID`, `USERNAME`, `PASSWORD`, `MEMBER_TYPE`, `FULLNAME`, `LASTNAME`, `ADDRESS`, `TEL`, `EMAIL`) VALUES
(1, 'admin', '1234', 1, 'admin', '1234', 'admin', '0847825323', 'one_show@hotmail.com'),
(2, 'kanjana', '1234', 2, 'กาญจณา', 'กิ่งแก้ว', 'กรุงเทพมหานคร', '0846798056', 'kanjana@live.com'),
(3, 'somying', '1234', 2, 'สมหญิง', 'ทองดี', 'นนทบุรี', '0845678900', 'somying_tongdi@gmil.com'),
(4, 'admin013', '1234', 2, 'อภิวัตน์', 'โพธิทอง', 'จันทบุรี', '0847823571', 'apiwat@hotmai.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manage_booking`
--
ALTER TABLE `manage_booking`
  ADD PRIMARY KEY (`BOOKING_ID`);

--
-- Indexes for table `manage_bookingdetail`
--
ALTER TABLE `manage_bookingdetail`
  ADD PRIMARY KEY (`BOOKINGDETAIL_ID`);

--
-- Indexes for table `manage_building`
--
ALTER TABLE `manage_building`
  ADD PRIMARY KEY (`BUILDING_ID`);

--
-- Indexes for table `manage_class`
--
ALTER TABLE `manage_class`
  ADD PRIMARY KEY (`CLASS_ID`);

--
-- Indexes for table `manage_data`
--
ALTER TABLE `manage_data`
  ADD PRIMARY KEY (`manage_id`);

--
-- Indexes for table `manage_location`
--
ALTER TABLE `manage_location`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `manage_news`
--
ALTER TABLE `manage_news`
  ADD PRIMARY KEY (`NEWS_ID`);

--
-- Indexes for table `manage_room`
--
ALTER TABLE `manage_room`
  ADD PRIMARY KEY (`ROOM_ID`);

--
-- Indexes for table `manage_satisfaction`
--
ALTER TABLE `manage_satisfaction`
  ADD PRIMARY KEY (`SATIS_ID`);

--
-- Indexes for table `manage_typeroom`
--
ALTER TABLE `manage_typeroom`
  ADD PRIMARY KEY (`TYPEROOM_ID`);

--
-- Indexes for table `mannage_roomimage`
--
ALTER TABLE `mannage_roomimage`
  ADD PRIMARY KEY (`IMAGE_ID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`MEMBER_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manage_booking`
--
ALTER TABLE `manage_booking`
  MODIFY `BOOKING_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `manage_bookingdetail`
--
ALTER TABLE `manage_bookingdetail`
  MODIFY `BOOKINGDETAIL_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `manage_building`
--
ALTER TABLE `manage_building`
  MODIFY `BUILDING_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `manage_class`
--
ALTER TABLE `manage_class`
  MODIFY `CLASS_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `manage_data`
--
ALTER TABLE `manage_data`
  MODIFY `manage_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manage_location`
--
ALTER TABLE `manage_location`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `manage_news`
--
ALTER TABLE `manage_news`
  MODIFY `NEWS_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `manage_room`
--
ALTER TABLE `manage_room`
  MODIFY `ROOM_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `manage_satisfaction`
--
ALTER TABLE `manage_satisfaction`
  MODIFY `SATIS_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `manage_typeroom`
--
ALTER TABLE `manage_typeroom`
  MODIFY `TYPEROOM_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mannage_roomimage`
--
ALTER TABLE `mannage_roomimage`
  MODIFY `IMAGE_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `MEMBER_ID` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
