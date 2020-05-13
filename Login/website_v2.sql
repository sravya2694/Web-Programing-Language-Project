-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 25, 2019 at 11:59 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `website`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(7) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(300) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Birthday_Date` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `Name`, `Email`, `Password`, `Gender`, `Birthday_Date`) VALUES
(67, 'Sravya Kurra', 'kurrasravya41@gmail.com', '$2y$10$h/UcADD2HIweLJyGmHqNU.O0lGiie5OKNX2WaFonY9IOzVYxiwtTW', 'female', '1111-11-11'),
(68, 'Sravya Kurra', 'kurrasravy41@gmail.com', '$2y$10$CjbFKVTK1tU/2ugDyulXnuu9nDnYwSIbXQS3QPlUil9g.6NGjSHuu', 'female', '1995-12-12'),
(69, 'Sravya Kurra', 'kurrasravy4@gmail.com', '$2y$10$GRzTGtcTafjrICTn4OFMjejmFVarDTY5qBi4x6Q4Sz3N8GS7KU7rO', 'female', '1995-12-12'),
(70, 'Sravya Kurra', 'kurrasrvy4@gmail.com', '$2y$10$5K2oOK9hnGSJRGTldPKyReNNTQ3ewSd6Ty9EpKDxY4s5labU/O3nq', 'female', '1995-12-12'),
(71, 'Sravya Kurra', 'kurrsrvy4@gmail.com', '$2y$10$lUWtS6AZPauSfrSWS/xpsOhFG4w5WdtPCaO8FExyrrKUIZ0KKRzBS', 'female', '1995-12-12'),
(72, 'Sravya Kurra', 'kurrsvy4@gmail.com', '$2y$10$l8p07hatKHA5u/NSJteesea9Sr.99I1e8mxTBisdAdw2Yw4/HSQ.m', 'female', '1995-12-12'),
(73, 'Sravya Kurra', 'kursvy4@gmail.com', '$2y$10$Tw.ANpP8QOcEXCRyisBLtuNqfjcOMJd0wFbl8y42GKuVj7WJvPuqS', 'female', '1995-12-12'),
(74, 'SravyaKurra', 'asravya41@gmail.com', '$2y$10$sUOSk7WqCva1M2CuHkm/p.m6Y9E1QqRcVYLDV3jpEUeD4cY19t1ea', 'female', ''),
(75, 'SravyaKurra', 'kurrasravya4@gmail.com', '$2y$10$8QXnKDDY1vWa.ML26de9ZetKUWBueWPGBcvTK8wg.fyjoWHQzUEp.', 'female', '1432-12-12'),
(76, 'ranya', 'Ranya@gmail.com', '$2y$10$9gSIHLkvNzQnGjYcO8tYTey/rckqJEmGQVQrVtXIyfXemecQ.Tuye', 'female', '1010-10-10'),
(77, 'SravyaKurra', 'kurrasrvya41@gmail.com', '$2y$10$Je85MxL/tAaWG4rHaxOhsOp.LV5JjrzLjQHS9DtMDpRY6A6XQEoMK', 'female', '1111-11-11'),
(78, 'karthik', 'karthik@gmail.com', '$2y$10$SuNHF8C.6rbK1OEsHi2kb.4HxLmWjlyRgEYUoVcgM7GmudWGWUM2W', 'female', '1111-11-11'),
(79, 'kavya', 'kavya@GMAil.com', '$2y$10$Iy.CtEPaof9IlwQ6E5PHseAfuimz4sigotqby/rGB2P2n/igR38DW', 'female', '1111-11-11'),
(80, 'sriya', 'sriya@gmail.com', '$2y$10$konnucCxha91sUUEbHQh8.9l7RcnvxAkv.CyH1PLqLQXShNBMlgNa', 'female', '1111-11-11'),
(81, 'Sravya Kurra', 'sxk180049@utdallas.edu', '$2y$10$7jazxJb4b7TTSdCco9PY7.CvJuhda321kjJt7e4zlrlzaobYladuu', 'female', '1111-11-11'),
(82, 'ram', 'eam@gmail.com', '$2y$10$v733rcBycauBSWegxzkZY.341U5lO6/O6mInHCAm.0CaF14selU6y', 'female', '1111-11-11'),
(83, 'raj', 'raj@gmail.com', '$2y$10$S6qHOwUEL4CPv2TtskpmgeuxGUBl2XNtrMfUsskU7T4C5JCoGFWtS', 'female', '1212-12-12'),
(84, 'rak', 'rak@ghmaki.com', '$2y$10$7M.4J05g9PCcfx.QwNfLSuS/oww3dhg5lSejKDyvDFd7LW..Saq.K', 'female', '1111-11-11'),
(85, 'rak', 'rak@ghmaki.com', '$2y$10$UbA38xEwgGhSudiEvG8wTOXxTHvmDfpbb73XO.sVB1.dNUZiRojpS', 'female', '1111-11-11'),
(86, 'sam', 'sam@gmail.com', '$2y$10$7LBtpvtu/N7XBIpFrjKbGuaplNRuOm7yiNNNEHMbl3WOzstrBP6Ia', 'female', '1212-12-12'),
(87, 'dsfr', 'dffsfae@fmail.com', '$2y$10$yHJXbflS6Z9BE8Zy/DV4vun9ffMQp4Xe8i3vso6RcQN9QUz6i/Nxu', 'female', '1234-12-13'),
(88, 'sita', 'sita@gmail.com', '$2y$10$Upq9iGf4HRGobPmqx3qjleg58zun9QE/mFNQdIjpxKWfuC8qSWU5u', 'female', '1123-11-11'),
(89, 'krish', 'krish@gmail.com', '$2y$10$scwCIy8IcvrQXOX8nqbA4OkVOgW.xhbKFqEBkhwRp0Dmeh/vOVm2O', 'female', '1234-12-12'),
(90, 'sravya', 'kurraguf18090@gmail.com', '$2y$10$Z0PBYG7jE3TZIkOGXQdQyusfJrv8bDRX/0jigZpX.02EpIdG2w7DK', 'female', '1111-11-11');

-- --------------------------------------------------------

--
-- Table structure for table `user_cover_pic`
--

CREATE TABLE `user_cover_pic` (
  `cover_id` int(7) NOT NULL,
  `user_id` int(7) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_cover_pic`
--

INSERT INTO `user_cover_pic` (`cover_id`, `user_id`, `image`) VALUES
(23, 25, 'user-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_post`
--

CREATE TABLE `user_post` (
  `post_id` int(7) NOT NULL,
  `user_id` int(7) NOT NULL,
  `post_txt` text NOT NULL,
  `post_pic` varchar(150) NOT NULL,
  `post_time` varchar(30) NOT NULL,
  `priority` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_post`
--

INSERT INTO `user_post` (`post_id`, `user_id`, `post_txt`, `post_pic`, `post_time`, `priority`) VALUES
(4, 25, 'Hi', '', '12-4-2019 16:15', 'FOF'),
(5, 25, 'Heloo', '', '14-4-2019 14:28', 'Public'),
(6, 25, 'Afternnon', '', '14-4-2019 14:34', 'Public'),
(15, 25, 'a1', '', '14-4-2019 14:50', 'Public'),
(23, 25, 'a4', 'user-6.jpg', '', 'Friends'),
(24, 25, 'a5', 'user-4.jpg', '', 'FOF'),
(25, 25, 'a5', 'user-4.jpg', '', 'FOF'),
(26, 25, 'a7', 'user-7.jpg', '14-4-2019 15:35', 'Public'),
(27, 25, 'a7', 'user-7.jpg', '14-4-2019 15:35', 'Public'),
(28, 25, 'a7', 'user-7.jpg', '14-4-2019 15:35', 'Public'),
(29, 25, 'a8', 'user-10.jpg', '14-4-2019 15:36', 'Private'),
(30, 25, 'hi', 'user-6.jpg', '14-4-2019 16:42', 'Public'),
(31, 25, 'Done', '', '15-4-2019 0:21', 'Public');

-- --------------------------------------------------------

--
-- Table structure for table `user_post_comment`
--

CREATE TABLE `user_post_comment` (
  `comment_id` int(7) NOT NULL,
  `post_id` int(7) NOT NULL,
  `user_id` int(7) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_post_status`
--

CREATE TABLE `user_post_status` (
  `status_id` int(7) NOT NULL,
  `post_id` int(7) NOT NULL,
  `user_id` int(7) NOT NULL,
  `status` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_post_status`
--

INSERT INTO `user_post_status` (`status_id`, `post_id`, `user_id`, `status`) VALUES
(33, 31, 25, 'Like'),
(35, 30, 25, 'Like'),
(36, 33, 25, 'Like'),
(37, 32, 25, 'Like');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile_pic`
--

CREATE TABLE `user_profile_pic` (
  `profile_id` int(7) NOT NULL,
  `user_id` int(7) NOT NULL,
  `image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profile_pic`
--

INSERT INTO `user_profile_pic` (`profile_id`, `user_id`, `image`) VALUES
(22, 25, '4.jpg'),
(23, 78, ''),
(24, 79, ''),
(25, 79, ''),
(26, 80, ''),
(27, 86, 'fe74b263-bd96-4288-a6f7-9281655ec321.jpg'),
(28, 88, 'D86AB8F7-C64E-41BE-9DA7-1BCF3350BDE8.JPG'),
(29, 89, 'D86AB8F7-C64E-41BE-9DA7-1BCF3350BDE8.JPG'),
(30, 90, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_secret_quotes`
--

CREATE TABLE `user_secret_quotes` (
  `user_id` int(7) NOT NULL,
  `Question1` varchar(50) NOT NULL,
  `Answer1` varchar(20) NOT NULL,
  `Question2` varchar(50) NOT NULL,
  `Answer2` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_cover_pic`
--
ALTER TABLE `user_cover_pic`
  ADD PRIMARY KEY (`cover_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_post`
--
ALTER TABLE `user_post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_post_comment`
--
ALTER TABLE `user_post_comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `user_post_status`
--
ALTER TABLE `user_post_status`
  ADD PRIMARY KEY (`status_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_profile_pic`
--
ALTER TABLE `user_profile_pic`
  ADD PRIMARY KEY (`profile_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_secret_quotes`
--
ALTER TABLE `user_secret_quotes`
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `user_cover_pic`
--
ALTER TABLE `user_cover_pic`
  MODIFY `cover_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_post`
--
ALTER TABLE `user_post`
  MODIFY `post_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user_post_comment`
--
ALTER TABLE `user_post_comment`
  MODIFY `comment_id` int(7) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_post_status`
--
ALTER TABLE `user_post_status`
  MODIFY `status_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user_profile_pic`
--
ALTER TABLE `user_profile_pic`
  MODIFY `profile_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
