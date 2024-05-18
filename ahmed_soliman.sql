-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2019 at 12:55 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ahmed_soliman`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `ArticleImage` varchar(255) NOT NULL,
  `ArticleText` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`ID`, `Name`, `ArticleImage`, `ArticleText`) VALUES
(1, 'مقال الشيخ احمد سليمان', '', '<p style=\"text-align:center\"><span style=\"font-size:36px\"><span style=\"font-family:Trebuchet MS,Helvetica,sans-serif\"><span style=\"background-color:#e67e22\">الشيخ احمد سليمان</span></span></span></p>\n'),
(4, 'programming', '', '<p style=\"text-align:center\"><span style=\"font-size:36px\">php language</span></p>\n\n<p style=\"text-align:justify\"><span style=\"font-size:20px\"><span style=\"color:#1abc9c\">php&nbsp;language is very useful</span></span></p>\n'),
(5, 'tet', '', '<p><span style=\"font-size:28px\">stdas</span></p>\n\n<p><span style=\"font-size:28px\">dasd</span></p>\n'),
(7, 'logo', '6949391563391924.png', '<p>dasd</p>\n\n<p>asd</p>\n\n<p>as</p>\n\n<p>d</p>\n\n<p>asd</p>\n\n<p>as</p>\n\n<p>d</p>\n');

-- --------------------------------------------------------

--
-- Table structure for table `mosqueetables`
--

CREATE TABLE `mosqueetables` (
  `ID` int(11) NOT NULL,
  `MosqueeName` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Day` varchar(255) NOT NULL,
  `Duration` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mosqueetables`
--

INSERT INTO `mosqueetables` (`ID`, `MosqueeName`, `Name`, `Day`, `Duration`) VALUES
(1, 'الصابرين', 'رياض الصالحين', 'السبت', 'بين المغرب والعشاء'),
(2, 'الصابرين ', 'الاربعين الننويه', 'الاحد ', 'بين المغرب والعشاء'),
(3, 'البخارى', 'رياض الصالحين', 'السبت', 'بين المغرب والعشاء'),
(4, 'بب', 'بب', 'ب', 'ب'),
(6, 'ببسسسسسسسسسسسس', 'بب', 'ب', 'ب'),
(7, 'test ', 'test test test', 'test', 'test'),
(8, 'das', 'dsa as a a a ', 'dsa', 'sda');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `ID` int(11) NOT NULL,
  `Question` text NOT NULL,
  `Answer` text NOT NULL,
  `Type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`ID`, `Question`, `Answer`, `Type`) VALUES
(1, 'حكم عدم الإلتزام بعدد ساعات العمل الرسمية ؟', '  لسلام عليكم ورحمة الله وبركاته ,                             أعمل في شركة إستشارات هندسية                             بعقد ينص علي عدد ساعات (10 ساعات يوميا ) عدا الجمعة                             ولا يلتزم أحد من الموظفين بالشركة بهذا العدد ولكن عادة نعمل 8 ساعات فقط مع علم المديرين بذلك                             ومع العلم أن الشركة تصدر فاتورة شهرية لمالك المشروع الذي نعمل به بأننا نعمل 8 ساعات يوميا +                             ساعتين إضافيه                             ويلزمنا بالتوقيع عليها لتحصيل الأجرة من المالك                             فهل هذا يعتبر غش للمالك مع العمل أن مديرين الشركة علي علم تام بعدد ساعات عملنا واننا لانلتزم                             بال 10 ساعات كاملة                             وهل علينا إثم ؟', 'فتوي'),
(4, 'هل يجوز التعدي عل مال الكفار', 'لا ينهاكم الله عن الذين لم يقاتلوكم ولم يخرجوكم من دياركم ان تبروهم وتقسطو اليهم', 'سيره'),
(5, 'هل يجوز ترك صلاه الجماعه في حاله وجود الطعام', 'اختلف العلماء في ذلك فمنهم من قال اختلف العلماء في ذلك فمنهم من قال اختلف العلماء في ذلك فمنهم من قال اختلف العلماء في ذلك فمنهم من قال اختلف العلماء في ذلك فمنهم من قال اختلف العلماء في ذلك فمنهم من قال ', 'فتوي');

-- --------------------------------------------------------

--
-- Table structure for table `tableimages`
--

CREATE TABLE `tableimages` (
  `ID` int(11) NOT NULL,
  `ImageName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tableimages`
--

INSERT INTO `tableimages` (`ID`, `ImageName`) VALUES
(1, 's1.jpg'),
(2, 's2.jpg'),
(3, 's3.jpg'),
(4, '47930Capture.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `uploadedfiles`
--

CREATE TABLE `uploadedfiles` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Uploaded_Name` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uploadedfiles`
--

INSERT INTO `uploadedfiles` (`ID`, `Name`, `Description`, `Uploaded_Name`, `Type`, `Location`) VALUES
(1, 'درس عن كظم الغيظ ', 'هو درس تم التحدث فيه عن صبر وحلم النبي', '6724451556793423.mp4', 'video', 'دروس'),
(3, 'خطبه الجمعه في جامع المدينه المنوره', 'test', '91839audioUploading7298.mp3', 'audio', 'دروس'),
(4, 'خطبه العيد', 'dasd', '23197audioUploading2975.mp3', 'audio', 'خطب'),
(6, 'خطبه الجمعه في جامع المدينه المنوره', 'هو درس تم التحدث فيه عن اخلاق النبي ', '13368audioUploading7888.mp3', 'audio', 'دروس'),
(7, 'درس السيره النبويه لكتاب البخاري', 'هو درس تم التحدث فيه عن صبر وحلم النبي', '50397audioUploading1225.mp3', 'audio', 'دروس'),
(11, 'كتاب الجوزي', 'هو كتاب يتم التحدث فيه عن سيره النبي', '2686621560744350.pdf', 'book', ''),
(13, 'مش فارقه', 'هو درس تم التحدث فيه عن اخلاق النبي ', '32203audioUploading2954.mp3', 'audio', 'خطب');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Name`, `Password`) VALUES
(10, 'mahmoud_elzanklony@yahoo.com', '12345'),
(11, 'baker@yahoo.com', '123123'),
(13, 'samah_ibrahim@yahoo.com', '31231'),
(14, 'zankllllll@yahoo.com', '123123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `mosqueetables`
--
ALTER TABLE `mosqueetables`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tableimages`
--
ALTER TABLE `tableimages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `uploadedfiles`
--
ALTER TABLE `uploadedfiles`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mosqueetables`
--
ALTER TABLE `mosqueetables`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tableimages`
--
ALTER TABLE `tableimages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `uploadedfiles`
--
ALTER TABLE `uploadedfiles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
