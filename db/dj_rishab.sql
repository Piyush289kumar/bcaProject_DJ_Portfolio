-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 14, 2024 at 05:40 PM
-- Server version: 10.11.7-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u423777452_rishabtiwari`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievement`
--

CREATE TABLE `achievement` (
  `aid` int(11) NOT NULL,
  `atitle` varchar(255) NOT NULL,
  `adate` varchar(255) NOT NULL,
  `atype` varchar(255) NOT NULL,
  `aimg` varchar(255) NOT NULL,
  `userId` varchar(255) NOT NULL,
  `active_record` varchar(255) NOT NULL DEFAULT 'Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `achievement`
--

INSERT INTO `achievement` (`aid`, `atitle`, `adate`, `atype`, `aimg`, `userId`, `active_record`) VALUES
(533, '2022-23 (CBSE 10TH RESULT)', '2024-03-16 ', 'Gallery', '13_Mar_2024_08_26_16am_schoolLogo.jpg', 'admin', 'no'),
(534, 'Event Title', '2024-03-06', 'Event Location', '20_Mar_2024_11_34_16am_event-3.jpg', 'admin', 'no'),
(535, 'Title', '2024-05-23', 'Jabalpur', '14_May_2024_05_24_41pm_HOTEL SHAWN ELIZEY.jpg', 'admin', 'no'),
(536, 'Title', '2024-05-16', 'Jabalpur', '14_May_2024_04_49_21pm_Untitled design (1).jpg', 'admin', 'no'),
(537, 'Test Event ', '2024-05-21', 'Local', '14_May_2024_05_13_40pm_track-right.jpg', 'admin', 'no'),
(538, '45', '2024-05-15', '45', '14_May_2024_05_12_26pm_thinkandgrow3d.jpg.webp', 'admin', 'no'),
(539, 'HOTEL', '2024-05-14', 'JABALPUR', '14_May_2024_05_26_13pm_HOTEL PRINCE VIRAJ.jpg.webp', 'admin', 'no'),
(540, 'h2', '2024-05-16', 'jghg', '14_May_2024_05_26_43pm_Screenshot 2024-05-14 224705.jpg.webp', 'admin', 'no'),
(541, 'HOTEL', '2024-05-14', 'JABALPUR', '14_May_2024_05_31_30pm_Hotel Narmada Jackson.jpg.webp', 'admin', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `tracks`
--

CREATE TABLE `tracks` (
  `aid` int(11) NOT NULL,
  `atitle` varchar(255) NOT NULL,
  `adate` varchar(255) NOT NULL,
  `link` text NOT NULL,
  `userId` varchar(255) NOT NULL,
  `active_record` varchar(255) NOT NULL DEFAULT 'Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tracks`
--

INSERT INTO `tracks` (`aid`, `atitle`, `adate`, `link`, `userId`, `active_record`) VALUES
(1, 'Tracks Title Update', '2024-03-30', '20_Mar_2024_12_02_27pm_6.mp3', 'admin', 'Yes'),
(2, 'Title 2', '2024-03-21', '20_Mar_2024_11_56_53am_4.mp3', 'admin', 'Yes'),
(3, 'Title', '2024-03-20', '20_Mar_2024_12_02_27pm_6.mp3', 'admin', 'Yes'),
(4, 'Title', '2024-03-20', '20_Mar_2024_12_02_27pm_6.mp3', 'admin', 'Yes'),
(5, 'Title', '2024-03-20', '20_Mar_2024_12_02_27pm_6.mp3', 'admin', 'Yes'),
(6, 'Radhe Albeli Sarkar (Remix) DJ RISHAB', '2024-03-20', '14_May_2024_04_31_50pm_Radhe Albeli Sarkar (Remix) DJ RISHAB.mp3', 'admin', 'Yes'),
(7, 'Shree Krishna Govind - Dj RISHAB', '2024-03-20', '14_May_2024_04_29_48pm_Shree Krishna Govind - Dj RISHAB.mp3', 'admin', 'Yes'),
(8, 'Ram Siya Ram - (Banger)  DJ RISHAB', '2024-03-20', '14_May_2024_04_28_10pm_Ram Siya Ram - (Banger)  Deejay RISHAB.mp3', 'admin', 'Yes'),
(9, 'Kesariya X Give It Up DJ RISHAB', '2024-03-20', '14_May_2024_04_26_25pm_Kesariya X Give It Up (AViN Mashup).mp3', 'admin', 'Yes'),
(10, 'Baller X Stop Snitchin DJ RISHAB', '2024-03-20', '14_May_2024_04_20_50pm_Baller X Stop Snitchin X Voices (AViN Mashup).mp3', 'admin', 'Yes'),
(11, 'Title', '2024-03-20', '20_Mar_2024_12_02_27pm_6.mp3', 'admin', 'no'),
(12, 'Title', '2024-03-20', '20_Mar_2024_12_02_27pm_6.mp3', 'admin', 'no'),
(13, 'Title', '2024-03-20', '20_Mar_2024_12_02_27pm_6.mp3', 'admin', 'no'),
(14, 'Dilbar X Xena MASHUP DJ RISHAB', '2024-03-21', '20_Mar_2024_04_40_24pm_5.mp3', 'admin', 'no'),
(15, 'sdf', '2024-05-16', '14_May_2024_04_10_23pm_Tu-Hai-Kahan(PaglaSongs).mp3', 'admin', 'no'),
(16, 'Dilbar X Xena DJ RISHAB', '2024-05-14', '14_May_2024_04_12_29pm_Dilbar X Xena DJ RISHAB.mp3', 'admin', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `role` int(11) NOT NULL,
  `img` text NOT NULL,
  `otp` varchar(255) NOT NULL,
  `active_record` varchar(255) NOT NULL DEFAULT 'Yes'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`, `img`, `otp`, `active_record`) VALUES
(186, 'admin', 'admin', 'admin', '202cb962ac59075b964b07152d234b70', 1, '20_Mar_2024_12_04_15pm_music.png', '', 'Yes'),
(187, 'tmp', 'tmp', 'tmp', 'd9b1d7db4cd6e70935368a1efb10e377', 0, '20_Mar_2024_12_41_07pm_play-default.png.webp', '', 'no'),
(188, 'Tmpe', 'temp', 'abc', '202cb962ac59075b964b07152d234b70', 0, '20_Mar_2024_04_29_34pm_youtube-2.jpg.webp', '', 'no'),
(189, 'abc', 'abc', 'xyz', '202cb962ac59075b964b07152d234b70', 0, '20_Mar_2024_04_42_14pm_music.png.webp', '', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `log_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `log_time` varchar(255) NOT NULL,
  `log_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`log_id`, `user_id`, `username`, `user_role`, `log_time`, `log_date`) VALUES
(40, '186', 'admin', 'Admin', '09:15:20 AM', '12-03-2024'),
(41, '186', 'admin', 'Admin', '09:20:25 AM', '12-03-2024'),
(42, '186', 'admin', 'Admin', '09:23:42 AM', '12-03-2024'),
(43, '186', 'admin', 'Admin', '06:10:18 PM', '12-03-2024'),
(44, '186', 'admin', 'Admin', '06:40:40 PM', '12-03-2024'),
(45, '186', 'admin', 'Admin', '05:13:28 AM', '13-03-2024'),
(46, '186', 'admin', 'Admin', '08:25:24 AM', '13-03-2024'),
(47, '186', 'admin', 'Admin', '08:50:25 AM', '13-03-2024'),
(48, '186', 'admin', 'Admin', '11:19:31 AM', '20-03-2024'),
(49, '187', 'tmp', 'Local', '12:41:18 PM', '20-03-2024'),
(50, '187', 'tmp', 'Local', '12:42:31 PM', '20-03-2024'),
(51, '187', 'tmp', 'Local', '12:43:24 PM', '20-03-2024'),
(52, '187', 'tmp', 'Admin', '12:43:50 PM', '20-03-2024'),
(53, '186', 'admin', 'Admin', '01:39:39 PM', '20-03-2024'),
(54, '186', 'admin', 'Admin', '02:36:35 PM', '20-03-2024'),
(55, '186', 'admin', 'Admin', '04:25:45 PM', '20-03-2024'),
(56, '186', 'admin', 'Admin', '04:28:53 PM', '20-03-2024'),
(57, '188', 'abc', 'Local', '04:29:58 PM', '20-03-2024'),
(58, '186', 'admin', 'Admin', '04:38:43 PM', '20-03-2024'),
(59, '189', 'xyz', 'Local', '04:42:42 PM', '20-03-2024'),
(60, '186', 'admin', 'Admin', '12:07:48 PM', '21-03-2024'),
(61, '186', 'admin', 'Admin', '12:18:24 PM', '21-03-2024'),
(62, '186', 'admin', 'Admin', '12:21:09 PM', '22-03-2024'),
(63, '186', 'admin', 'Admin', '09:11:15 AM', '14-05-2024'),
(64, '186', 'admin', 'Admin', '02:27:21 PM', '14-05-2024'),
(65, '186', 'admin', 'Admin', '03:29:49 PM', '14-05-2024'),
(66, '186', 'admin', 'Admin', '04:00:13 PM', '14-05-2024'),
(67, '186', 'admin', 'Admin', '04:04:39 PM', '14-05-2024'),
(68, '186', 'admin', 'Admin', '05:10:38 PM', '14-05-2024');

-- --------------------------------------------------------

--
-- Table structure for table `youtube`
--

CREATE TABLE `youtube` (
  `aid` int(11) NOT NULL,
  `atitle` varchar(255) NOT NULL,
  `adate` varchar(255) NOT NULL,
  `link` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `userId` varchar(255) NOT NULL,
  `active_record` varchar(255) NOT NULL DEFAULT 'Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `youtube`
--

INSERT INTO `youtube` (`aid`, `atitle`, `adate`, `link`, `img`, `userId`, `active_record`) VALUES
(1, 'Youtube Link Title', '2024-03-13', 'Link', '20_Mar_2024_12_33_31pm_countdown-bg.jpg', 'admin', 'no'),
(2, 'Youtube Link Title', '2024-03-13', 'Link', '20_Mar_2024_12_34_47pm_countdown-bg.jpg', 'admin', 'Yes'),
(3, 'Title Test update', '2024-03-30', 'Link Test update', '20_Mar_2024_02_17_43pm_youtube-3.jpg', 'admin', 'Yes'),
(4, 'Title', '2024-03-29', 'Link', '20_Mar_2024_02_17_59pm_youtube-2.jpg', 'admin', 'Yes'),
(5, 'Title', '2024-03-23', 'Link', '20_Mar_2024_02_18_20pm_youtube-3.jpg', 'admin', 'Yes'),
(6, 'Title', '2024-03-26', 'Link', '20_Mar_2024_02_18_31pm_youtube-1.jpg', 'admin', 'Yes'),
(7, 'Title', '2024-03-22', 'Link', '20_Mar_2024_02_18_45pm_youtube-1.jpg', 'admin', 'Yes'),
(8, 'title', '2024-03-20', 'Youtube link', '14_May_2024_04_38_11pm_mine image.jpg', 'admin', 'no'),
(9, 'Song', '2024-05-16', 'https://www.youtube.com/watch?v=HOUam58wT6U', '14_May_2024_05_17_41pm_Screenshot 2024-05-14 224705.jpg', 'admin', 'Yes'),
(10, 'new', '2024-05-15', 'https://www.youtube.com/watch?v=kKh3Z32D6kA', '14_May_2024_05_21_04pm_Screenshot 2024-05-14 224705.jpg', 'admin', 'Yes'),
(11, 'RISHAB', '2024-05-14', 'https://www.youtube.com/watch?v=kZ63raa_P1I', '14_May_2024_05_28_14pm_7183909.jpg', 'admin', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievement`
--
ALTER TABLE `achievement`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `tracks`
--
ALTER TABLE `tracks`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `youtube`
--
ALTER TABLE `youtube`
  ADD PRIMARY KEY (`aid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievement`
--
ALTER TABLE `achievement`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=542;

--
-- AUTO_INCREMENT for table `tracks`
--
ALTER TABLE `tracks`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `youtube`
--
ALTER TABLE `youtube`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
