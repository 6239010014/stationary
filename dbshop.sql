-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2020 at 04:56 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `dbuser`
--

CREATE TABLE `dbuser` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dbuser`
--

INSERT INTO `dbuser` (`id`, `fullname`, `username`, `useremail`, `password`, `regdate`) VALUES
(6, 'Worawit Panywai', 'kojoe3654', 'kojoe@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2020-10-29 14:45:58'),
(7, 'Tester the admin', 'admintester', 'admintester@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2020-10-30 15:05:01');

-- --------------------------------------------------------

--
-- Table structure for table `productdb`
--

CREATE TABLE `productdb` (
  `id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` float DEFAULT NULL,
  `product_image` mediumtext DEFAULT NULL,
  `producttext` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productdb`
--

INSERT INTO `productdb` (`id`, `product_name`, `product_price`, `product_image`, `producttext`) VALUES
(1, 'ดินสอสีไม้ลบได้', 2.5, 'Ad/upload/cp1.jpg', 'ดินสอสีลบได้ พร้อมยางลบในตัว แท่งเหลี่ยม ระบายง่าย สีสวย 24 สี / กล่อง'),
(2, 'ไม้บรรทัดนิ่ม', 2.95, 'Ad/upload/fr1.jpg', 'บิดงอได้ 12 นิ้ว (ขายยกโหล 12 อัน) คละสี'),
(3, 'กระถางนี้เลี้ยงง่่าย', 0.18, 'Ad/upload/mp1.jpg', 'ปากกาเขียนแผ่นซีดี ชนิด 2 หัว, หมึกสีเข้ม แห้งไว เส้นคมชัด, เขียนได้บนพื้นผิดว แผ่น CD, แผ่น DVD, แผ่นใสชนิดเขียน รวมถึงพลาสติก, เหล็ก, ไม้, ผ้า และเครื่องหนัง, แก้วและเซรามิก, สีหมึกลบไม่ได้, หัวเข็ม ขนาดหัวปากกา 0.4 มม., หัวแหลม ขนาดหัวปากกา 2 มม.\r\n\r\nมี'),
(4, 'กระเป๋านักเรียนมัธยมต้น', 22.59, 'Ad\\upload\\sb1.jpg', 'ขนาด: กว้าง 36 ซม. สูง 50 ซม. หนา 15 ซม. แชร์ลิงก์ไปยังกลุ่มเพื่อนหลังจากเปิดกลุ่มประหยัดเวลาอันมีค่'),
(5, 'ลิควิดแพ็ค1 ฟรีปากกา JS (', 5.04, 'Ad\\upload\\lq1.jpg', 'แพ็คปากกาลบคำผิด+ปากกาน้ำเงิน ปากกาน้ำเงิน 0.5 มม. ปากกาลบคำผิดปริมาณสุทธิ 7 มล.'),
(6, 'ยางลบดินสอ อีโคโนมี่ สเต็', 0.16, 'Ad\\upload\\ers1.jpg', 'ยางลบดินสอ Staedtler 52635 ผลิตจากวัสดุคุณภาพดีจากประเทศเยอรมนี มีความยืดหยุ่นสูง ลบได้สะอาด ไม่เป็น'),
(7, 'ดินสอดำ 2B ตราม้า กล่องบร', 12.13, 'Ad\\upload\\pc1.jpg', 'ดินสอดำ 2B ตราม้า (กล่องละ 12 แท่ง)\r\n\r\nขายยกกุรุส ( 12 กล่อง หรือ 144 แท่ง ) '),
(8, 'ปากกาเจล Classic 0.5 มม. ', 0.32, 'Ad\\upload\\pen1.jpg', 'ปากกาเจล หัว Bullet  หมึกเจล เขียนลื่น หัวเล็ก 0.5 มิลลิเมตร ไส้หมดสามารถเปลี่ยนได้ ใช้ทนนาน ประเภทป');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dbuser`
--
ALTER TABLE `dbuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productdb`
--
ALTER TABLE `productdb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dbuser`
--
ALTER TABLE `dbuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `productdb`
--
ALTER TABLE `productdb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
