-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2024 at 04:57 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `activity_log_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`activity_log_id`, `username`, `date`, `action`) VALUES
(11, 'admin', '2020-12-21 08:37:51', 'Add Subject 1234'),
(12, 'admin', '2024-01-02 18:38:26', 'Add School Year 2023-2024'),
(13, 'admin', '2024-01-02 18:39:28', 'Edit User Kyle'),
(14, 'admin', '2024-04-15 22:05:03', 'Add User pjfactoran'),
(15, 'pjfactoran', '2024-04-15 22:07:35', 'Add Subject SAMPSUBJ123'),
(16, 'pjfactoran', '2024-04-15 22:14:20', 'Add School Year 2024-2025');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answer_id` int(11) NOT NULL,
  `quiz_question_id` int(11) NOT NULL,
  `answer_text` varchar(100) NOT NULL,
  `choices` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `quiz_question_id`, `answer_text`, `choices`) VALUES
(85, 34, 'Peso', 'A'),
(86, 34, 'PHP Hypertext', 'B'),
(87, 34, 'PHP Hypertext Preprosesor', 'C'),
(88, 34, 'Philippines', 'D'),
(89, 36, 'Right', 'A'),
(90, 36, 'Wrong', 'B'),
(91, 36, 'Wrong', 'C'),
(92, 36, 'Wrong', 'D'),
(93, 39, '1', 'A'),
(94, 39, '2', 'B'),
(95, 39, '3', 'C'),
(96, 39, '5', 'D'),
(97, 40, '1', 'A'),
(98, 40, '2', 'B'),
(99, 40, '3', 'C'),
(100, 40, 'Ewan', 'D'),
(101, 41, '1', 'A'),
(102, 41, '2', 'B'),
(103, 41, '3', 'C'),
(104, 41, '5', 'D'),
(105, 42, '', 'A'),
(106, 42, '', 'B'),
(107, 42, '', 'C'),
(108, 42, '', 'D'),
(109, 44, 'qwd', 'A'),
(110, 44, 'qdwwd', 'B'),
(111, 44, 'wef', 'C'),
(112, 44, 'ewfew', 'D'),
(113, 0, 'weffefw', 'D'),
(114, 0, 'ewfefweff', 'D'),
(115, 0, 'ewffewffewfe', 'D'),
(116, 0, 'kyle', 'D'),
(117, 0, 'oo', 'D'),
(118, 51, 'sige', 'A'),
(119, 51, 'yoko', 'B'),
(120, 51, '', 'C'),
(121, 51, '', 'D'),
(122, 0, 'dog', 'D'),
(123, 0, 'dog', 'D'),
(124, 0, 'dog', 'D'),
(125, 55, 'c', 'A'),
(126, 55, 'a', 'B'),
(127, 55, 'b', 'C'),
(128, 55, 'd', 'D'),
(129, 57, 'answer 1', 'A'),
(130, 57, 'answer 2', 'B'),
(131, 57, 'answer 3', 'C'),
(132, 57, 'answer 4', 'D'),
(133, 58, 'answer 1', 'A'),
(134, 58, 'answe 2', 'B'),
(135, 58, 'answer 3', 'C'),
(136, 58, 'answer 4', 'D'),
(137, 0, 'wrong', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assignment_id` int(11) NOT NULL,
  `floc` varchar(300) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assignment_id`, `floc`, `fdatein`, `fdesc`, `teacher_id`, `class_id`, `fname`) VALUES
(2, 'uploads/6843_File_Doc3.docx', '2013-10-11 01:24:32', 'fasfasf', 13, 36, 'Assignment number 1'),
(3, 'uploads/3617_File_login.mdb', '2013-10-28 19:35:28', 'q', 9, 80, 'q'),
(4, 'admin/uploads/7146_File_normalization.ppt', '2013-10-30 18:48:15', 'fsaf', 9, 95, 'fsaf'),
(5, 'admin/uploads/7784_File_ABSTRACT.docx', '2013-10-30 18:48:33', 'fsaf', 9, 95, 'dsaf'),
(6, 'admin/uploads/4536_File_ABSTRACT.docx', '2013-10-30 18:53:32', 'file', 9, 95, 'abstract'),
(10, 'admin/uploads/2209_File_598378_543547629007198_436971088_n.jpg', '2013-11-01 13:13:18', 'fsafasf', 9, 95, 'Assignment#2'),
(11, 'admin/uploads/1511_File_bootstrap.css', '2013-11-01 13:18:25', 'sdsa', 9, 95, 'css'),
(12, 'admin/uploads/4309_File_new  2.txt', '2013-11-17 23:21:46', 'test', 12, 145, 'test'),
(13, 'admin/uploads/5901_File_IS 112-Personal Productivity Using IS.doc', '2013-11-18 16:59:35', 'q', 12, 145, 'q'),
(15, 'admin/uploads/7077_File_win_boot_screen_16_9_by_medi_dadu-d4s7dc1.gif', '2013-11-25 10:38:45', 'afs', 18, 159, 'dasf'),
(16, 'admin/uploads/8470_File_win_boot_screen_16_9_by_medi_dadu-d4s7dc1.gif', '2013-11-25 10:39:19', 'test', 18, 160, 'assign1'),
(17, 'admin/uploads/2840_File_IMG_0698.jpg', '2013-11-25 15:53:20', 'q', 12, 161, 'q'),
(19, '', '2013-12-07 20:11:39', 'kevin test', 12, 162, ''),
(20, '', '2013-12-07 20:26:43', 'dasddsd', 12, 145, ''),
(21, '', '2013-12-07 20:26:43', 'dasddsd', 12, 162, ''),
(22, '', '2013-12-07 20:27:18', 'dasffsafsaf', 12, 162, ''),
(23, '', '2013-12-07 20:33:11', 'test', 12, 162, ''),
(27, 'admin/uploads/4089_File_win_boot_screen_16_9_by_medi_dadu-d4s7dc1.gif', '2013-12-07 20:47:48', 'fasfafaf', 12, 0, 'fasf'),
(28, 'admin/uploads/2948_File_win_boot_screen_16_9_by_medi_dadu-d4s7dc1.gif', '2013-12-07 20:48:59', 'dasdasd', 12, 0, 'dasd'),
(29, 'admin/uploads/5971_File_win_boot_screen_16_9_by_medi_dadu-d4s7dc1.gif', '2013-12-07 20:50:47', 'dasdasd', 12, 0, 'dsad'),
(30, 'admin/uploads/6926_File_Resume.docx', '2014-02-13 11:27:59', 'q', 12, 167, 'q'),
(31, 'admin/uploads/8289_File_sample.pdf', '2020-12-21 09:56:48', 'asdasd', 9, 186, 'asdasd'),
(32, 'admin/uploads/5159_File_TEST ASSIGNMENT.docx', '2024-04-15 22:59:49', 'test assignment', 22, 192, 'test assignment'),
(33, 'admin/uploads/1109_File_capstone.sql', '2024-04-16 18:00:12', 'asssssss', 20, 187, 'testing kyle'),
(34, 'admin/uploads/2119_File_capstone.sql', '2024-04-16 18:21:45', 'test upload ass from teacher', 20, 193, 'test upload assignment from teacher');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`) VALUES
(1, '   '),
(7, 'BSIS-4A'),
(8, 'BSIS-4B'),
(12, 'BSIS-3A'),
(13, 'BSIS-3B'),
(14, 'BSIS-3C'),
(15, 'BSIS-2A'),
(16, 'BSIS-2B'),
(17, 'BSIS-2C'),
(18, 'BSIS-1A'),
(19, 'BSIS-1B'),
(20, 'BSIS-1C'),
(22, 'AB-1C'),
(23, 'BSIT-2B'),
(24, 'BSIT-1A'),
(25, 'BSCS-1A');

-- --------------------------------------------------------

--
-- Table structure for table `class_quiz`
--

CREATE TABLE `class_quiz` (
  `class_quiz_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `quiz_time` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_quiz`
--

INSERT INTO `class_quiz` (`class_quiz_id`, `teacher_class_id`, `quiz_time`, `quiz_id`) VALUES
(13, 167, 3600, 3),
(14, 167, 3600, 3),
(15, 167, 1800, 3),
(16, 185, 900, 0),
(17, 186, 1800, 6),
(20, 187, 1800, 8),
(21, 189, 1800, 8),
(22, 187, 1800, 10),
(23, 189, 1800, 10),
(24, 191, 1800, 10),
(25, 187, 1800, 11),
(26, 189, 1800, 11),
(27, 191, 1800, 11),
(28, 187, 4140, 13),
(29, 189, 4140, 13),
(30, 191, 4140, 13),
(31, 187, 2400, 14),
(32, 189, 2400, 14),
(33, 191, 2400, 14);

-- --------------------------------------------------------

--
-- Table structure for table `class_subject_overview`
--

CREATE TABLE `class_subject_overview` (
  `class_subject_overview_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `content` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_subject_overview`
--

INSERT INTO `class_subject_overview` (`class_subject_overview_id`, `teacher_class_id`, `content`) VALUES
(1, 167, '<p>Chapter&nbsp; 1</p>\r\n\r\n<p>Cha</p>\r\n'),
(2, 187, '<p>Mag-aaral kayo na gumawa ng ewan</p>\r\n'),
(4, 193, '<p>bscs gagawa lang kayo thesis</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `content_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`content_id`, `title`, `content`) VALUES
(1, 'Mission', '<pre>\n<span style=\"font-size:16px\"><strong>Mission</strong></span></pre>\n\n<p style=\"text-align:left\"><span style=\"font-family:arial,helvetica,sans-serif; font-size:medium\"><span style=\"font-size:large\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></span>&nbsp; &nbsp;<span style=\"font-size:18px\"> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; To develop and offer high quality technical, health and higher education programs that would ensure employability and productivity of young men and women through proper values and principles as a means to achieve success with excellence for a better quality of life.&nbsp;</span></p>\n\n<p style=\"text-align:left\">&nbsp;</p>\n'),
(2, 'Vision', '<pre><span style=\"font-size: large;\"><strong>Vision</strong></span></pre>\n<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style=\"font-size: large;\">&nbsp;  A center of excellence in academic and technical skills programs pursuing dynamic opportunities parallel to global standards, thereby, uplifting the socio-economic growth of the country. </span><br /><br /></p>'),
(3, 'History', '<pre><span style=\"font-size: large;\">HISTORY &nbsp;</span> </pre>\n<p style=\"text-align: justify;\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Lorem Ipsum </p>\n<p style=\"text-align: justify;\">&nbsp;</p>\n<p style=\"text-align: justify;\">&nbsp;&nbsp;&nbsp; Lorem Ipsum</p>'),
(4, 'Footer', '<p style=\"text-align:center\">Skill Forge Online Learning Managenment System</p>\n\n<p style=\"text-align:center\">All Rights Reserved &reg;2024</p>\n'),
(5, 'Upcoming Events', '<pre>\nUP COMING EVENTS</pre>\n\n<p><strong>&gt;</strong> EXAM</p>\n\n<p><strong>&gt;</strong> INTERCAMPUS MEET</p>\n\n<p><strong>&gt;</strong> DEFENSE</p>\n\n<p><strong>&gt;</strong> ENROLLMENT</p>\n\n<p>&nbsp;</p>\n'),
(6, 'Title', '<p><span style=\"font-family:trebuchet ms,geneva\">Skill Forge Online Learning Management System</span></p>\n'),
(7, 'News', '<pre>\n<span style=\"font-size:medium\"><em><strong>Recent News\n</strong></em></span></pre>\n\n<h2><span style=\"font-size:small\">Extension and Community Services</span></h2>\n\n<p style=\"text-align:justify\">This technology package is an index to offer a more diverse and interesting learning platform </p>\n\n<p style=\"text-align:justify\">lorem ipsum</p>\n\n<p style=\"text-align:justify\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Lorem Ipsum</p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n\n<p style=\"text-align:justify\">&nbsp;lorem Ipsum</p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n\n<p style=\"text-align:justify\">Lorem Ipsum</p>\n\n<p style=\"text-align:justify\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Lorem Ipsum</p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n\n<p style=\"text-align:justify\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Lorem Ipsum</p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n'),
(8, 'Announcements', '<pre>\n<span style=\"font-size:medium\"><em><strong>Announcements</strong></em></span></pre>\n\n<p>Examination Period: October 9-11, 2023</p>\n\n<p>Semestrial Break: October 12- November 3, 2023</p>\n\n<p>FASKFJASKFAFASFMFAS</p>\n\n<p>GASGA</p>\n'),
(10, 'Calendar', '<pre style=\"text-align:center\">\n<span style=\"font-size:medium\"><strong>&nbsp;CALENDAR OF EVENTS</strong></span></pre>\n\n<table align=\"center\" cellpadding=\"0\" cellspacing=\"0\" style=\"line-height:1.6em; margin-left:auto; margin-right:auto\">\n	<tbody>\n		<tr>\n			<td>\n			<p>First Semester &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\n			</td>\n			<td>\n			<p>June 10, 2023 to October 11, 2023&nbsp;</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>Semestral Break</p>\n			</td>\n			<td>\n			<p>Oct. 12, 2023 to November 3, 2023</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>Second Semester</p>\n			</td>\n			<td>\n			<p>Nov. 5, 2023 to March 27, 2024</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>Summer Break</p>\n			</td>\n			<td>\n			<p>March 27, 2024 to April 8, 2024</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>Summer</p>\n			</td>\n			<td>\n			<p>April 8 , 2024 to May 24, 2024</p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n\n<p style=\"text-align:center\">&nbsp;</p>\n\n<table cellpadding=\"0\" cellspacing=\"0\" style=\"line-height:1.6em; margin-left:auto; margin-right:auto\">\n	<tbody>\n		<tr>\n			<td colspan=\"4\">\n			<p><strong>June 5, 2023 to October 11, 2023 &ndash; First Semester AY 2023-2024</strong></p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>June 4, 2023 &nbsp; &nbsp; &nbsp; &nbsp;</p>\n			</td>\n			<td>\n			<p>Orientation with the Parents of the College&nbsp;Freshmen</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>June 5</p>\n			</td>\n			<td>\n			<p>First Day of Service</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>June 5</p>\n			</td>\n			<td>\n			<p>College Personnel General Assembly</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>June 6,7</p>\n			</td>\n			<td>\n			<p>In-Service Training (Departmental)</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>June 10</p>\n			</td>\n			<td>\n			<p>First Day of Classes</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>June 14</p>\n			</td>\n			<td>\n			<p>Orientation with Students by College/Campus/Department</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>June 19,20,21</p>\n			</td>\n			<td>\n			<p>Branch/Campus Visit for Administrative / Academic/Accreditation/ Concerns</p>\n			</td>\n		</tr>\n		<tr>\n			<td rowspan=\"2\">\n			<p>June</p>\n			</td>\n			<td>\n			<p>Club Organizations (By Discipline/Programs)</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>Student Affiliation/Induction Programs</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>July</p>\n			</td>\n			<td>\n			<p>Nutrition Month (Sponsor: Laboratory School)</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>July 11, 12</p>\n			</td>\n			<td>\n			<p>Long Tests</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>August&nbsp; 8, 9</p>\n			</td>\n			<td>\n			<p>Midterm Examinations</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>August 19</p>\n			</td>\n			<td>\n			<p>Break</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>August 23</p>\n			</td>\n			<td>\n			<p>Submission of Grade Sheets for Midterm</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>August</p>\n			</td>\n			<td>\n			<p>Recognition Program (Dean&rsquo;s List)</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>August 26</p>\n			</td>\n			<td>\n			<p>National Heroes Day (Regular Holiday)</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>August 28, 29, 30</p>\n			</td>\n			<td>\n			<p>Sports and Cultural Meet</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>September 19,20</p>\n			</td>\n			<td>\n			<p>Long Tests</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>October 5</p>\n			</td>\n			<td>\n			<p>Teachers&rsquo; Day / World Teachers&rsquo; Day</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>October 10, 11</p>\n			</td>\n			<td>\n			<p>Final Examination</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>October 12</p>\n			</td>\n			<td>\n			<p>Semestral Break</p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n\n<p style=\"text-align:center\">&nbsp;</p>\n\n<table cellpadding=\"0\" cellspacing=\"0\" style=\"margin-left:auto; margin-right:auto\">\n	<tbody>\n		<tr>\n			<td colspan=\"4\">\n			<p><strong>Nov. 4, 2023 to March 27, 2024 &ndash; Second Semester AY 2023-2024</strong></p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>November 4 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\n			</td>\n			<td>\n			<p>Start of Classes</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>November 19, 20, 21, 22</p>\n			</td>\n			<td>\n			<p>Intercampus Sports and Cultural Fest/College Week</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>December 5, 6</p>\n			</td>\n			<td>\n			<p>Long Tests</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>December 19,20</p>\n			</td>\n			<td>\n			<p>Thanksgiving Celebrations</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>December 21</p>\n			</td>\n			<td>\n			<p>Start of Christmas Vacation</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>December 25</p>\n			</td>\n			<td>\n			<p>Christmas Day (Regular Holiday)</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>December 30</p>\n			</td>\n			<td>\n			<p>Rizal Day (Regular Holiday)</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>January 6, 2024</p>\n			</td>\n			<td>\n			<p>Classes Resume</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>January 9, 10</p>\n			</td>\n			<td>\n			<p>Midterm Examinations</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>January 29</p>\n			</td>\n			<td>\n			<p>Submission of Grades Sheets for Midterm</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>February 13, 14</p>\n			</td>\n			<td>\n			<p>Long Tests</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>March 6, 7</p>\n			</td>\n			<td>\n			<p>Final Examinations (Graduating)</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>March 13, 14</p>\n			</td>\n			<td>\n			<p>Final Examinations (Non-Graduating)</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>March 17, 18, 19, 20, 21</p>\n			</td>\n			<td>\n			<p>Recognition / Graduation Rites</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>March 27</p>\n			</td>\n			<td>\n			<p>Last Day of Service for Faculty</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>June 5, 2014</p>\n			</td>\n			<td>\n			<p>First Day of Service for SY 2024-2025</p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n\n<p style=\"text-align:center\">&nbsp;</p>\n\n<table border=\"1\" cellpadding=\"0\" cellspacing=\"0\" style=\"margin-left:auto; margin-right:auto\">\n	<tbody>\n		<tr>\n			<td colspan=\"2\">\n			<p><strong>FLAG RAISING CEREMONY-BALANGA CAMPUS</strong></p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>MONTHS &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>\n			</td>\n			<td>\n			<p>UNIT-IN-CHARGE</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>June, Sept. and Dec. 2023, March 2024</p>\n			</td>\n			<td>\n			<p>COE</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>July and October 2023, Jan. 2024</p>\n			</td>\n			<td>\n			<p>IT</p>\n			</td>\n		</tr>\n		<tr>\n			<td>\n			<p>August and November 2023, Feb. 2024</p>\n\n			<p>April and May 2024</p>\n			</td>\n			<td>\n			<p>CS</p>\n\n			<p>HM</p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n'),
(11, 'Directories', '<div class=\"jsn-article-content\" style=\"text-align: left;\">\n<pre>\n<span style=\"font-size:medium\"><em><strong>DIRECTORIES</strong></em></span></pre>\n\n<ul>\n	<li>Lab School - 712-0869</li>\n	<li>Accounting - 495-5569</li>\n	<li>Presidents Office - 495-4069(random numbers)</li>\n	<li>VPA/PME - 495-1669</li>\n	<li>Registrar Office - 495-4669(random numbers)</li>\n	<li>Cashier - 712-7269</li>\n	<li>CIT - 712-0669</li>\n	<li>SAS/COE - 495-6069</li>\n	<li>BAC - 712-8469(random departments)</li>\n	<li>Records - 495-3469</li>\n	<li>Supply - 495-3769</li>\n	<li>Internet Lab - 712-6169/712-6469</li>\n	<li>COA - 495-5769</li>\n	<li>Guard House - 476-1669</li>\n	<li>HRM - 495-4969</li>\n	<li>Extension - 457-2869</li>\n	<li>Canteen - 495-5369</li>\n	<li>Research - 712-8469</li>\n	<li>Library - 495-5169</li>\n	<li>OSA - 495-1169</li>\n</ul>\n</div>\n'),
(12, 'president', '<p>It is my great pleasure and privilege to welcome you to Lorem Ipsum.<br /> Recently, the challenges of the knowledge era of the 21st Century led me to think very deeply how educational institutions of higher learning must vigorously pursue relevant e<img style=\"float: left;\" src=\"images/president.jpg\" alt=\"\" />Lorem Ipsum.<br /><br /> Lorem Ipsum<br /><br /> The tasks Lorem Ipsum <br /><br /></p>\n<p style=\"text-align: justify;\"><span style=\"line-height: 1.3em;\">random numbers;</span></p>\n<p style=\"text-align: justify;\"><span style=\"line-height: 1.3em;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;* Harness the potentials of students thru effective teaching and learning methodologies and techniques;</span></p>\n<p style=\"text-align: justify;\"><span style=\"line-height: 1.3em;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;* Enable CLorem Ipsum;</span></p>\n<p style=\"text-align: justify;\"><span style=\"line-height: 1.3em;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;* Advocate Lorem Ipsum;</span></p>\n<p style=\"text-align: justify;\"><span style=\"line-height: 1.3em;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;* Promote lifelong learning;</span></p>\n<p style=\"text-align: justify;\"><span style=\"line-height: 1.3em;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;* Conduct Research and Development for community and poverty alleviation;</span></p>\n<p style=\"text-align: justify;\"><span style=\"line-height: 1.3em;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;* Share and disseminate knowledge through publication and extension outreach to communities; and</span></p>\n<p style=\"text-align: justify;\"><span style=\"line-height: 1.3em;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;*Strengthen Institute-industry linkages and public-private partnership for mutual interest.</span></p>\n<p style=\"text-align: justify;\"><br /><span style=\"line-height: 1.3em; text-align: justify;\">Lorem Ipsum</span></p>\n<p style=\"text-align: justify;\"><br /><span style=\"line-height: 1.3em;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;*Lorem Ipsum;</span></p>\n<p style=\"text-align: justify;\"><span style=\"line-height: 1.3em;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; *A center for curricular innovations and research especially in education, technology, engineering, ICT and entrepreneurship; and</span></p>\n<p style=\"text-align: justify;\"><span style=\"line-height: 1.3em;\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; *A Provider of quality graduates in professional and technological programs for industry and community.</span></p>\n<p style=\"text-align: justify;\"><br /><br /> Dear readers and guests, Lorem Ipsum. This website will be one of the connections with you as we ardently take each step. Feel free to visit often and be kept posted as we continue to work for discoveries and advancement that will bring benefits to the lives of the students, the community, and the world, as a whole.<br /><br /> Warmest welcome and I wish you well!</p>\n<p style=\"text-align: justify;\"><br /><br /></p>\n<p style=\"text-align: justify;\">Pangalan.<br />Title</p>'),
(13, 'motto', '<p><strong><span style=\"color:#FFF0F5\"><span style=\"font-family:arial,helvetica,sans-serif\">Skill Forge:</span></span></strong></p>\n\n<p><strong><span style=\"color:#FFF0F5\"><span style=\"font-family:arial,helvetica,sans-serif\">Excellence, Competence and Educational</span></span></strong></p>\n\n<p><strong><span style=\"color:#FFF0F5\"><span style=\"font-family:arial,helvetica,sans-serif\">Leadership in Science and Technology</span></span></strong></p>\n'),
(14, 'Campuses', '<pre>\n<span style=\"font-size:16px\"><strong>Campuses</strong></span></pre>\n\n<ul>\n	<li>Bataan Campus</li>\n	<li>Balanga Campus</li>\n	<li>Tenejero Campus</li>\n	<li>Senior Campus<br />\n	&nbsp;</li>\n</ul>\n');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `dean` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `department_name`, `dean`) VALUES
(11, 'CS', 'Percian Borja'),
(12, 'SAMPLE DEPT', 'SAMPLE INCHARGE');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(100) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `date_start` varchar(100) NOT NULL,
  `date_end` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_title`, `teacher_class_id`, `date_start`, `date_end`) VALUES
(15, 'Long Test', 113, '12/05/2013', '12/06/2013'),
(17, 'sdasf', 147, '11/16/2013', '11/16/2013'),
(18, 'Sample', 186, '12/22/2020', '12/24/2020'),
(22, 'SAMPLE EVENT', 0, '04/15/2024', '04/30/2024');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `file_id` int(11) NOT NULL,
  `floc` varchar(500) NOT NULL,
  `fdatein` varchar(200) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `uploaded_by` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`file_id`, `floc`, `fdatein`, `fdesc`, `teacher_id`, `class_id`, `fname`, `uploaded_by`) VALUES
(143, 'admin/uploads/9068_File_Kyle Halili - PackageDesign.ai', '2024-03-11 17:27:24', 'testing 2', 0, 187, 'test upload fro student 2', 'KyleHalili'),
(142, 'admin/uploads/3938_File_Desktop - 1.jpg', '2024-01-10 18:07:51', 'testing', 0, 187, 'test upload from student', 'KyleHalili'),
(144, 'admin/uploads/1336_File_TEST ASSIGNMENT.docx', '2024-04-15 22:44:49', 'test', 0, 192, 'test upload', 'sample student');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `date_sended` varchar(100) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_name` varchar(50) NOT NULL,
  `sender_name` varchar(200) NOT NULL,
  `message_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `reciever_id`, `content`, `date_sended`, `sender_id`, `reciever_name`, `sender_name`, `message_status`) VALUES
(31, 229, 'sample message', '2024-04-15 22:20:42', 22, 'sample  student', 'SAMPLE TEACHER', 'read'),
(32, 22, 'sample reply', '2024-04-15 22:31:51', 229, 'SAMPLE TEACHER', 'sample  student', ''),
(33, 229, 'sample reply', '2024-04-15 22:34:59', 22, 'sample  student', 'SAMPLE TEACHER', 'read'),
(34, 220, 'perfect ka na', '2024-04-16 18:53:13', 20, 'Kyle Halili', 'Perican Borja', 'read'),
(35, 220, 'kahit wag ka na gumawa ng thesis', '2024-04-16 18:53:28', 20, 'Kyle Halili', 'Perican Borja', 'read'),
(36, 220, 'test', '2024-04-16 18:53:54', 20, 'Kyle Halili', 'Perican Borja', 'read');

-- --------------------------------------------------------

--
-- Table structure for table `message_sent`
--

CREATE TABLE `message_sent` (
  `message_sent_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `content` varchar(200) NOT NULL,
  `date_sended` varchar(100) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `reciever_name` varchar(100) NOT NULL,
  `sender_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message_sent`
--

INSERT INTO `message_sent` (`message_sent_id`, `reciever_id`, `content`, `date_sended`, `sender_id`, `reciever_name`, `sender_name`) VALUES
(16, 229, 'sample message', '2024-04-15 22:20:42', 22, 'sample  student', 'SAMPLE TEACHER'),
(17, 22, 'sample reply', '2024-04-15 22:31:51', 229, 'SAMPLE TEACHER', 'sample  student'),
(18, 229, 'sample reply', '2024-04-15 22:34:59', 22, 'sample  student', 'SAMPLE TEACHER'),
(19, 220, 'perfect ka na', '2024-04-16 18:53:13', 20, 'Kyle Halili', 'Perican Borja'),
(20, 220, 'kahit wag ka na gumawa ng thesis', '2024-04-16 18:53:28', 20, 'Kyle Halili', 'Perican Borja'),
(21, 220, 'test', '2024-04-16 18:53:54', 20, 'Kyle Halili', 'Perican Borja');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `notification` varchar(100) NOT NULL,
  `date_of_notification` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `teacher_class_id`, `notification`, `date_of_notification`, `link`) VALUES
(2, 0, 'Add Downloadable Materials file name <b>sss</b>', '2014-01-17 14:35:32', 'downloadable_student.php'),
(3, 167, 'Add Annoucements', '2014-01-17 14:36:32', 'announcements_student.php'),
(4, 0, 'Add Downloadable Materials file name <b>test</b>', '2014-02-13 11:10:56', 'downloadable_student.php'),
(5, 167, 'Add Assignment file name <b>q</b>', '2014-02-13 11:27:59', 'assignment_student.php'),
(6, 0, 'Add Downloadable Materials file name <b>chapter 1</b>', '2014-02-13 12:35:42', 'downloadable_student.php'),
(7, 0, 'Add Downloadable Materials file name <b>q</b>', '2014-02-13 12:53:09', 'downloadable_student.php'),
(8, 0, 'Add Downloadable Materials file name <b>kevi</b>', '2014-02-13 13:31:18', 'downloadable_student.php'),
(9, 185, 'Add Practice Quiz file', '2014-02-13 13:33:27', 'student_quiz_list.php'),
(10, 167, 'Add Annoucements', '2014-02-13 13:45:59', 'announcements_student.php'),
(11, 0, 'Add Downloadable Materials file name <b>q</b>', '2014-02-21 16:43:38', 'downloadable_student.php'),
(12, 0, 'Add Downloadable Materials file name <b>q</b>', '2014-02-21 16:46:18', 'downloadable_student.php'),
(13, 0, 'Add Downloadable Materials file name <b>q</b>', '2014-02-21 16:46:49', 'downloadable_student.php'),
(14, 0, 'Add Downloadable Materials file name <b>q</b>', '2014-02-21 16:52:30', 'downloadable_student.php'),
(15, 186, 'Add Downloadable Materials file name <b>Sample</b>', '2020-12-21 09:24:50', 'downloadable_student.php'),
(16, 0, 'Add Downloadable Materials file name <b>123</b>', '2020-12-21 09:31:40', 'downloadable_student.php'),
(17, 0, 'Add Downloadable Materials file name <b>234234</b>', '2020-12-21 09:36:27', 'downloadable_student.php'),
(18, 0, 'Add Downloadable Materials file name <b>234234</b>', '2020-12-21 09:38:22', 'downloadable_student.php'),
(19, 186, 'Add Downloadable Materials file name <b>234234</b>', '2020-12-21 09:39:32', 'downloadable_student.php'),
(20, 186, 'Add Downloadable Materials file name <b>234234</b>', '2020-12-21 09:40:28', 'downloadable_student.php'),
(21, 186, 'Add Assignment file name <b>asdasd</b>', '2020-12-21 09:56:48', 'assignment_student.php'),
(22, 186, 'Add Annoucements', '2020-12-21 09:59:00', 'announcements_student.php'),
(23, 186, 'Add Practice Quiz file', '2020-12-21 10:10:11', 'student_quiz_list.php'),
(24, 187, 'Add Practice Quiz file', '2024-01-02 20:24:22', 'student_quiz_list.php'),
(25, 187, 'Add Practice Quiz file', '2024-01-02 20:26:15', 'student_quiz_list.php'),
(26, 187, 'Add Annoucements', '2024-01-02 20:52:15', 'announcements_student.php'),
(27, 187, 'Add Practice Quiz file', '2024-01-02 20:53:42', 'student_quiz_list.php'),
(28, 189, 'Add Practice Quiz file', '2024-01-02 20:53:42', 'student_quiz_list.php'),
(29, 187, 'Add Practice Quiz file', '2024-03-02 19:05:50', 'student_quiz_list.php'),
(30, 189, 'Add Practice Quiz file', '2024-03-02 19:05:50', 'student_quiz_list.php'),
(31, 191, 'Add Practice Quiz file', '2024-03-02 19:05:50', 'student_quiz_list.php'),
(32, 187, 'Add Practice Quiz file', '2024-03-05 20:04:50', 'student_quiz_list.php'),
(33, 189, 'Add Practice Quiz file', '2024-03-05 20:04:50', 'student_quiz_list.php'),
(34, 191, 'Add Practice Quiz file', '2024-03-05 20:04:50', 'student_quiz_list.php'),
(35, 187, 'Add Practice Quiz file', '2024-04-02 17:46:13', 'student_quiz_list.php'),
(36, 189, 'Add Practice Quiz file', '2024-04-02 17:46:13', 'student_quiz_list.php'),
(37, 191, 'Add Practice Quiz file', '2024-04-02 17:46:13', 'student_quiz_list.php'),
(38, 187, 'Add Practice Quiz file', '2024-04-02 18:11:38', 'student_quiz_list.php'),
(39, 189, 'Add Practice Quiz file', '2024-04-02 18:11:38', 'student_quiz_list.php'),
(40, 191, 'Add Practice Quiz file', '2024-04-02 18:11:38', 'student_quiz_list.php'),
(41, 192, 'Add Annoucements', '2024-04-15 22:51:40', 'announcements_student.php'),
(42, 192, 'Add Assignment file name <b>test assignment</b>', '2024-04-15 22:59:49', 'assignment_student.php'),
(43, 192, 'Add Practice Quiz file', '2024-04-15 23:12:41', 'student_quiz_list.php'),
(44, 187, 'Add Assignment file name <b>testing kyle</b>', '2024-04-16 18:00:12', 'assignment_student.php'),
(45, 193, 'Add Assignment file name <b>test upload assignment from teacher</b>', '2024-04-16 18:21:45', 'assignment_student.php');

-- --------------------------------------------------------

--
-- Table structure for table `notification_read`
--

CREATE TABLE `notification_read` (
  `notification_read_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_read` varchar(50) NOT NULL,
  `notification_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification_read`
--

INSERT INTO `notification_read` (`notification_read_id`, `student_id`, `student_read`, `notification_id`) VALUES
(1, 219, 'yes', 22),
(2, 219, 'yes', 21),
(3, 219, 'yes', 20),
(4, 219, 'yes', 19),
(5, 219, 'yes', 15),
(6, 220, 'yes', 25),
(7, 220, 'yes', 24),
(8, 220, 'yes', 27),
(9, 220, 'yes', 28),
(10, 220, 'yes', 26),
(11, 220, 'yes', 32),
(12, 220, 'yes', 33),
(13, 220, 'yes', 34),
(14, 220, 'yes', 29),
(15, 220, 'yes', 30),
(16, 220, 'yes', 31),
(17, 229, 'yes', 42),
(18, 229, 'yes', 41),
(19, 229, 'yes', 43),
(20, 220, 'yes', 45);

-- --------------------------------------------------------

--
-- Table structure for table `notification_read_teacher`
--

CREATE TABLE `notification_read_teacher` (
  `notification_read_teacher_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `student_read` varchar(100) NOT NULL,
  `notification_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification_read_teacher`
--

INSERT INTO `notification_read_teacher` (`notification_read_teacher_id`, `teacher_id`, `student_read`, `notification_id`) VALUES
(1, 12, 'yes', 14),
(2, 12, 'yes', 13),
(3, 12, 'yes', 12),
(4, 12, 'yes', 11),
(5, 12, 'yes', 10),
(6, 12, 'yes', 9),
(7, 12, 'yes', 8),
(8, 12, 'yes', 7),
(9, 20, 'yes', 19),
(10, 20, 'yes', 20),
(11, 22, 'yes', 21),
(12, 22, 'yes', 22),
(13, 20, 'yes', 24);

-- --------------------------------------------------------

--
-- Table structure for table `purchased_items`
--

CREATE TABLE `purchased_items` (
  `purchased_item_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `item_image_url` varchar(255) DEFAULT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchased_items`
--

INSERT INTO `purchased_items` (`purchased_item_id`, `student_id`, `item_image_url`, `purchase_date`) VALUES
(1, 220, 'http://localhost/lms/admin/uploads/hat1.png', '2024-04-17 08:19:18'),
(2, 220, 'http://localhost/lms/admin/uploads/pants0.png', '2024-04-17 08:20:46'),
(3, 220, 'http://localhost/lms/admin/uploads/hat1.png', '2024-04-17 08:21:32'),
(4, 220, 'http://localhost/lms/admin/uploads/hat0.png', '2024-04-17 08:21:37'),
(5, 220, 'http://localhost/lms/admin/uploads/shirt0.png', '2024-04-17 08:21:40'),
(6, 220, 'http://localhost/lms/admin/uploads/hat1.png', '2024-04-17 08:55:02'),
(7, 220, 'http://localhost/lms/admin/uploads/hat1.png', '2024-04-17 08:55:12'),
(8, 220, 'http://localhost/lms/admin/uploads/hat1.png', '2024-04-17 08:55:13'),
(9, 220, 'http://localhost/lms/admin/uploads/pants0.png', '2024-04-17 09:07:48'),
(10, 220, 'http://localhost/lms/admin/uploads/pants1.png', '2024-04-17 09:07:52'),
(11, 220, 'http://localhost/lms/admin/uploads/hat0.png', '2024-04-17 09:07:56'),
(12, 220, 'http://localhost/lms/admin/uploads/hat0.png', '2024-04-17 09:50:26'),
(13, 220, 'http://localhost/lms/admin/uploads/hat1.png', '2024-04-17 09:50:32'),
(14, 220, 'http://localhost/lms/admin/uploads/hat0.png', '2024-04-17 09:50:48'),
(15, 220, 'http://localhost/lms/admin/uploads/shirt1.png', '2024-04-17 09:51:00'),
(16, 220, 'http://localhost/lms/admin/uploads/hat1.png', '2024-04-17 09:51:06'),
(17, 220, 'http://localhost/lms/admin/uploads/hat1.png', '2024-04-17 09:51:12'),
(18, 220, 'http://localhost/lms/admin/uploads/shirt0.png', '2024-04-17 09:51:23'),
(19, 220, 'http://localhost/lms/admin/uploads/hat1.png', '2024-04-17 09:51:30'),
(20, 220, 'http://localhost/lms/admin/uploads/pants0.png', '2024-04-17 09:51:38'),
(21, 220, 'http://localhost/lms/admin/uploads/hat1.png', '2024-04-17 09:52:59'),
(22, 220, 'http://localhost/lms/admin/uploads/shirt0.png', '2024-04-17 09:53:45'),
(23, 220, 'http://localhost/lms/admin/uploads/hat1.png', '2024-04-17 09:55:41'),
(24, 220, 'http://localhost/lms/admin/uploads/pants0.png', '2024-04-17 09:55:49'),
(25, 220, 'http://localhost/lms/admin/uploads/hat1.png', '2024-04-17 09:57:46'),
(26, 220, 'http://localhost/lms/admin/uploads/shirt0.png', '2024-04-17 09:57:57'),
(27, 220, 'http://localhost/lms/admin/uploads/hat1.png', '2024-04-17 09:58:50'),
(28, 220, 'http://localhost/lms/admin/uploads/shirt0.png', '2024-04-17 09:58:55'),
(29, 229, 'http://localhost/lms/admin/uploads/pants0.png', '2024-04-17 10:32:53'),
(30, 229, 'http://localhost/lms/admin/uploads/hat1.png', '2024-04-17 10:32:56'),
(31, 229, 'http://localhost/lms/admin/uploads/shirt0.png', '2024-04-17 10:32:58'),
(32, 229, 'http://localhost/lms/admin/uploads/hand0.png', '2024-04-17 10:33:02'),
(33, 229, 'http://localhost/lms/admin/uploads/shirt1.png', '2024-04-17 10:33:07'),
(34, 229, 'http://localhost/lms/admin/uploads/hand1.png', '2024-04-17 10:33:11');

-- --------------------------------------------------------

--
-- Table structure for table `question_type`
--

CREATE TABLE `question_type` (
  `question_type_id` int(11) NOT NULL,
  `question_type` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_type`
--

INSERT INTO `question_type` (`question_type_id`, `question_type`) VALUES
(1, 'Multiple Choice'),
(2, 'True or False'),
(3, 'Identification');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quiz_id` int(11) NOT NULL,
  `quiz_title` varchar(50) NOT NULL,
  `quiz_description` varchar(100) NOT NULL,
  `date_added` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `quizGold` int(255) NOT NULL DEFAULT 100,
  `quizExp` int(255) NOT NULL DEFAULT 100
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quiz_id`, `quiz_title`, `quiz_description`, `date_added`, `teacher_id`, `quizGold`, `quizExp`) VALUES
(3, 'Sample Test', 'Test', '2013-12-03 23:01:56', 12, 100, 100),
(4, 'Chapter 1', 'topics', '2013-12-13 01:51:02', 14, 100, 100),
(5, 'test3', '123', '2014-01-16 04:12:07', 12, 100, 100),
(6, 'Sample Quiz', 'Sample 101', '2020-12-21 10:04:11', 9, 100, 100),
(7, 'Exam', 'pass or fail', '2024-01-02 20:20:45', 15, 100, 100),
(8, 'Exam', 'pass or fail', '2024-01-02 20:24:16', 20, 100, 100),
(9, 'Exam', 'pass or fail', '2024-01-02 20:53:24', 20, 100, 100),
(10, 'quizz', 'pass or fail test', '2024-03-02 17:23:06', 20, 100, 100),
(11, 'prev question button', 'f32f32f32f3', '2024-03-05 19:59:43', 20, 100, 100),
(12, 'test gold', 'rfrfrffr', '2024-04-02 17:02:46', 20, 100, 100),
(13, 'test gold', 'test exp', '2024-04-02 17:24:35', 20, 420, 323),
(14, 'ayos na', '23f2', '2024-04-02 18:10:51', 20, 800, 690),
(15, 'Sample Quiz', 'sample', '2024-04-15 23:09:43', 22, 5000, 25),
(16, 'Sample Quiz', 'Sample Test', '2024-04-16 10:11:02', 22, 250, 25);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_question`
--

CREATE TABLE `quiz_question` (
  `quiz_question_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question_text` varchar(100) NOT NULL,
  `question_type_id` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `date_added` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_question`
--

INSERT INTO `quiz_question` (`quiz_question_id`, `quiz_id`, `question_text`, `question_type_id`, `points`, `date_added`, `answer`) VALUES
(33, 5, '<p>q</p>\r\n', 2, 0, '2014-01-17 04:15:03', 'False'),
(34, 3, '<p>Php Stands for ?</p>\r\n', 1, 0, '2014-01-17 12:25:17', 'C'),
(35, 3, '<p>Echo is a Php code that display the output.</p>\r\n', 2, 0, '2014-01-17 12:26:18', 'True'),
(36, 6, '<p>sample</p>\r\n', 1, 0, '2020-12-21 10:05:09', 'A'),
(37, 6, '<p>asdasd</p>\r\n', 2, 0, '2020-12-21 10:05:25', 'True'),
(38, 6, '<p>sdsd</p>\r\n', 2, 0, '2020-12-21 10:05:35', 'False'),
(39, 7, '<p>2 x 2 = ?</p>\r\n', 1, 0, '2024-01-02 20:21:38', 'D'),
(40, 7, '<p>Pangalan ko?</p>\r\n', 1, 0, '2024-01-02 20:22:34', 'D'),
(41, 8, '<p>2 x 2</p>\r\n', 1, 0, '2024-01-02 20:25:29', 'D'),
(44, 10, '<p>qddwdqw</p>\r\n', 1, 0, '2024-03-02 19:49:38', 'B'),
(49, 10, '<p>sino ako</p>\r\n', 3, 0, '2024-03-02 20:26:11', 'kyle'),
(50, 11, '<p>bobo ka ba?</p>\r\n', 3, 0, '2024-03-05 20:00:11', 'oo'),
(51, 11, '<p>ibalik mo sa naunang tanong</p>\r\n', 1, 0, '2024-03-05 20:00:38', 'B'),
(54, 13, '<p>cat?</p>\r\n', 3, 0, '2024-04-02 17:42:22', 'dog'),
(55, 13, '<p>c</p>\r\n', 1, 0, '2024-04-02 17:43:04', 'C'),
(56, 14, '<p>true</p>\r\n', 2, 0, '2024-04-02 18:11:20', 'True'),
(58, 15, '<p>Question 1 Sample</p>\r\n', 1, 0, '2024-04-15 23:11:00', 'C'),
(59, 15, '<p>sdafgadv true</p>\r\n', 2, 0, '2024-04-15 23:11:22', 'True'),
(60, 15, '<p>1. sample identi</p>\r\n', 3, 0, '2024-04-15 23:11:46', 'wrong');

-- --------------------------------------------------------

--
-- Table structure for table `school_year`
--

CREATE TABLE `school_year` (
  `school_year_id` int(11) NOT NULL,
  `school_year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_year`
--

INSERT INTO `school_year` (`school_year_id`, `school_year`) VALUES
(4, '2023-2024'),
(5, '2024-2025');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `class_id` int(11) NOT NULL DEFAULT 1,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level` int(255) NOT NULL DEFAULT 1,
  `gold` int(255) NOT NULL,
  `hat` varchar(100) NOT NULL DEFAULT 'admin/uploads/hat0.png',
  `shirt` varchar(100) NOT NULL DEFAULT 'admin/uploads/shirt0.png',
  `pants` varchar(100) NOT NULL DEFAULT 'admin/uploads/pants0.png',
  `hand` varchar(100) NOT NULL DEFAULT 'admin/uploads/hand0.png'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `firstname`, `lastname`, `class_id`, `username`, `password`, `location`, `status`, `email`, `level`, `gold`, `hat`, `shirt`, `pants`, `hand`) VALUES
(222, 'Sean', 'Kristofur', 22, '00000000', 'password', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered', '', 1, 0, 'uploads/hat1.png', 'uploads/shirt1.png', 'uploads/pants1.png', 'uploads/hand1.png'),
(223, 'Joyce', 'Factorian', 22, '11111111', '', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered', '', 0, 0, '', '', '', ''),
(224, 'Kyle', 'Test', 15, '22222222', '', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered', '', 3, 0, '', '', '', ''),
(225, 'Kyle', 'Halili2', 0, '33333333', '', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered', '', 0, 0, '', '', '', ''),
(220, 'Kyle', 'Halili', 22, '69696969', 'password', 'uploads/kylebridge.jpg', 'Registered', '', 209, 400, 'http://localhost/lms/admin/uploads/hat1.png', 'http://localhost/lms/admin/uploads/shirt0.png', 'http://localhost/lms/admin/uploads/pants1.png', 'http://localhost/lms/admin/uploads/hand1.png'),
(221, 'Rachel', 'Halili', 22, '96969696', 'rachel', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Registered', '', 100, 0, '', '', '', ''),
(226, 'Kyle', 'Test3', 0, '44444444', '', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered', 'kyle@gamil.com', 0, 0, '', '', '', ''),
(227, 'johnny', 'test', 1, '68686868', '', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered', 'testlang@gmail.com', 2, 0, 'uploads/hat1.png', '', '', ''),
(228, 'joyce', 'factoran', 0, '210221', '', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered', 'joycefactoran@123gmail.com', 1, 0, 'admin/uploads/hat0.png', 'admin/uploads/shirt0.png', 'admin/uploads/pants0.png', 'admin/uploads/hand0.png'),
(229, 'sample', ' student', 25, 'sample', 'password', 'uploads/NO-IMAGE-AVAILABLE.jpg', 'Unregistered', 'sample123@gmail.com', 1, 8900, 'http://localhost/lms/admin/uploads/hat1.png', 'http://localhost/lms/admin/uploads/shirt0.png', 'http://localhost/lms/admin/uploads/pants0.png', 'http://localhost/lms/admin/uploads/hand0.png');

-- --------------------------------------------------------

--
-- Table structure for table `student_assignment`
--

CREATE TABLE `student_assignment` (
  `student_assignment_id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `floc` varchar(100) NOT NULL,
  `assignment_fdatein` varchar(50) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `student_id` int(11) NOT NULL,
  `grade` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_assignment`
--

INSERT INTO `student_assignment` (`student_assignment_id`, `assignment_id`, `floc`, `assignment_fdatein`, `fdesc`, `fname`, `student_id`, `grade`) VALUES
(1, 31, 'admin/uploads/7820_File_sample.pdf', '2020-12-21 10:12:04', 'aaa', 'asdasd', 219, ''),
(2, 32, 'admin/uploads/8121_File_TEST ASSIGNMENT.docx', '2024-04-15 23:01:59', 'test', 'TESTDOWNLOADABLE MATERIAL', 229, '100'),
(3, 32, 'admin/uploads/5046_File_capstone.sql', '2024-04-16 18:01:28', 'sagot ko to', 'sagot ko to', 229, ''),
(4, 34, 'admin/uploads/7848_File_hat1.png', '2024-04-16 18:22:33', 'to sagot kyle', 'to sagot ko', 220, '');

-- --------------------------------------------------------

--
-- Table structure for table `student_backpack`
--

CREATE TABLE `student_backpack` (
  `file_id` int(11) NOT NULL,
  `floc` varchar(100) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_backpack`
--

INSERT INTO `student_backpack` (`file_id`, `floc`, `fdatein`, `fdesc`, `student_id`, `fname`) VALUES
(2, 'admin/uploads/9782_File_sample.pdf', '2020-12-21 10:12:54', 'adasd', 219, '234234'),
(3, 'admin/uploads/6898_File_sample.pdf', '2020-12-21 10:12:54', 'adasd', 219, '234234'),
(4, 'admin/uploads/3579_File_sample.pdf', '2020-12-21 10:12:54', 'adasd', 219, '234234'),
(5, 'admin/uploads/3938_File_Desktop - 1.jpg', '2024-01-10 18:08:05', 'testing', 220, 'test upload from student'),
(6, 'admin/uploads/1336_File_TEST ASSIGNMENT.docx', '2024-04-15 22:45:19', 'test', 229, 'test upload');

-- --------------------------------------------------------

--
-- Table structure for table `student_class_quiz`
--

CREATE TABLE `student_class_quiz` (
  `student_class_quiz_id` int(11) NOT NULL,
  `class_quiz_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_quiz_time` varchar(100) NOT NULL,
  `grade` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_class_quiz`
--

INSERT INTO `student_class_quiz` (`student_class_quiz_id`, `class_quiz_id`, `student_id`, `student_quiz_time`, `grade`) VALUES
(1, 15, 107, '3600', '0 out of 2'),
(2, 16, 136, '3600', '0 out of 0'),
(3, 17, 219, '3600', '1 out of 3'),
(4, 19, 220, '2008', '1 out of 1'),
(5, 18, 220, '2008', '0 out of 1'),
(6, 20, 220, '2008', '1 out of 1'),
(7, 21, 220, '2008', '1 out of 1'),
(8, 22, 220, '2008', '2 out of 2'),
(9, 25, 220, '2008', '2 out of 2'),
(10, 29, 220, '2008', '2 out of 2'),
(11, 26, 220, '2008', '2 out of 2'),
(12, 23, 220, '2008', '2 out of 2'),
(13, 32, 220, '2008', '1 out of 1'),
(14, 33, 220, '2008', '1 out of 1'),
(15, 30, 220, '2008', '1 out of 2'),
(16, 27, 220, '2008', '2 out of 2'),
(17, 24, 220, '2008', '2 out of 2'),
(18, 28, 220, '3600', '0 out of 2'),
(19, 31, 220, '2008', '0 out of 1'),
(20, 34, 229, '3600', '2 out of 3');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `subject_code` varchar(100) NOT NULL,
  `subject_title` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `unit` int(11) NOT NULL,
  `Pre_req` varchar(100) NOT NULL,
  `semester` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_code`, `subject_title`, `category`, `description`, `unit`, `Pre_req`, `semester`) VALUES
(14, 'SSP 1', 'Senior Systems Project 1', '', '<p><span style=\"font-size: medium;\"><em>About the Subject</em></span></p>\r\n<p>This subject comprisea topics about systems development, SDLC methodologies, Conceptual Framework, diagrams such as DFD, ERD and Flowchart and writing a thesis proposal.</p>\r\n<p>&nbsp;</p>\r\n<p>The project requirement for this subject are:</p>\r\n<p>Chapters (1-5) Thesis Proposal</p>\r\n<p>100% Running System at the end of semester</p>\r\n<p>&nbsp;</p>', 3, '', ''),
(15, 'EHCIP', 'Effective Human Communication for IT Professional', '', '<p><span style=\"font-size: medium;\"><em>About the Subject</em></span></p>\r\n<p>This subject is intended for IT students to develop or enhance communication skills that will be beneficial especially when used in the business industry. The lesson includes Verbal Communication (Written and Oral), Non-verbal Communication, etc.</p>', 3, '', ''),
(16, 'Prog Lang', 'Programming Languages', '', '<pre class=\"coursera-course-heading\" data-msg=\"coursera-course-about\"><span style=\"font-size: medium;\"><em>About the Subject</em></span></pre>\r\n<div class=\"coursera-course-detail\" data-user-generated=\"data-user-generated\">Learn many of the concepts that underlie all programming languages. Develop a programming style known as functional programming and contrast it with object-oriented programming. Through experience writing programs and studying three different languages, learn the key issues in designing and using programming languages, such as modularity and the complementary benefits of static and dynamic typing. This course is neither particularly theoretical nor just about programming specifics &ndash; it will give you a framework for understanding how to use language constructs effectively and how to design correct and elegant programs. By using different languages, you learn to think more deeply than in terms of the particular syntax of one language. The emphasis on functional programming is essential for learning how to write robust, reusable, composable, and elegant programs &ndash; in any language.</div>\r\n<h2 class=\"coursera-course-detail\" data-user-generated=\"data-user-generated\">&nbsp;</h2>\r\n<pre class=\"coursera-course-detail\" data-user-generated=\"data-user-generated\"><span style=\"font-size: medium;\"><em>&nbsp;Course Syllabus</em></span></pre>\r\n<div class=\"coursera-course-detail\" data-user-generated=\"data-user-generated\">\r\n<ul>\r\n<li>Syntax vs. semantics vs. idioms vs. libraries vs. tools</li>\r\n<li>ML basics (bindings, conditionals, records, functions)</li>\r\n<li>Recursive functions and recursive types</li>\r\n<li>Benefits of no mutation</li>\r\n<li>Algebraic datatypes, pattern matching</li>\r\n<li>Tail recursion</li>\r\n<li>First-class functions and function closures</li>\r\n<li>Lexical scope</li>\r\n<li>Equivalence and effects</li>\r\n<li>Parametric polymorphism and container types</li>\r\n<li>Type inference</li>\r\n<li>Abstract types and modules</li>\r\n<li>Racket basics</li>\r\n<li>Dynamic vs. static typing</li>\r\n<li>Implementing languages, especially higher-order functions</li>\r\n<li>Macro</li>\r\n<li>Ruby basics</li>\r\n<li>Object-oriented programming</li>\r\n<li>Pure object-orientation</li>\r\n<li>Implementing dynamic dispatch</li>\r\n<li>Multiple inheritance, interfaces, and mixins</li>\r\n<li>OOP vs. functional decomposition and extensibility</li>\r\n<li>Subtyping for records, functions, and objects</li>\r\n<li>Subtyping</li>\r\n<li>Class-based subtyping</li>\r\n<li>Subtyping vs. parametric polymorphism; bounded polymorphism</li>\r\n</ul>\r\n</div>', 3, '', ''),
(17, 'Ethics 101', 'Introduction to the IM Professional and Ethics', '', '<p>This subject discusses about Ethics, E-Commerce, Cybercrime Law, Computer Security, etc.</p>', 0, '', ''),
(22, 'App Dev', 'Application Development', '', '', 3, '', '2nd'),
(23, 'Net Dev', 'Network and Internet Technology', '', '', 3, '', '2nd'),
(24, 'Entrepreneurship 101', 'Business Process', '', '', 3, '', '2nd'),
(25, 'Disc Structures', 'Discrete Structures', '', '', 3, '', '2nd'),
(26, 'Programming 202', 'IS Programming 2', '', '', 3, '', '2nd'),
(28, 'Phil Literature', 'Philippine  Literature', '', '', 3, '', '2nd'),
(29, 'Accounting 101', 'Fundamentals of Accounting 2', '', '', 3, '', '2nd'),
(30, 'PE 4', 'Team Sports', '', '', 3, '', '2nd'),
(31, 'IS 302', 'Survey of Programming Languages', '', '', 3, '', '2nd'),
(32, 'IS 303', 'Structured Query Language', '', '', 3, '', '2nd'),
(33, 'IS 321', 'Information System Planning', '', '', 3, '', '2nd'),
(34, 'IS 322', 'Management of Technology', '', '', 3, '', '2nd'),
(35, 'IS 323', 'E-commerce Strategy Architectural', '', '', 3, '', '2nd'),
(36, 'Web Dev', 'System Analysis and Design', '', '', 3, '', '2nd'),
(37, 'Law 1', 'Law on Obligation and Contracts', '', '', 3, '', '2nd'),
(38, 'Philo 1', 'Social Philosophy & Logic', '', '', 3, '', '2nd'),
(39, 'MQTB', 'Quantitative Techniques in Business', '', '', 3, '', '2nd'),
(40, 'RIZAL', 'Rizal: Life and Works', '', '<p>COURSE OUTLINE<br />\r\n1. Course Code : RIZAL</p>\r\n\r\n<p>2. Course Title &nbsp;: RIZAL (Rizal Life and Works)<br />\r\n3. Pre-requisite : none<br />\r\n5. Credit/ Class Schedule : 3 units; 3 hrs/week<br />\r\n6. Course Description&nbsp;<br />\r\n1. A critical analysis of Jose Rizal&rsquo;s life and ideas as reflected in his biography, his novels Noli Me Tangere and El Filibusterismo and in his other writings composed of essays and poems to provide the students a value based reference for reacting to certain ideas and behavior.<br />\r\n<br />\r\n<strong>PROGRAM OBJECTIVES</strong><br />\r\n1. To instill in the students human values and cultural refinement through the humanities and social sciences.<br />\r\n2. To inculcate high ethical standards in the students through its integration in the learning activities.<br />\r\n3. To have critical studies and discussions why Rizal is made the national hero of the Philippines.<br />\r\n<br />\r\nTOPICS:&nbsp;<br />\r\n1. A Hero is Born&nbsp;<br />\r\n2. Childhood Days in Calamba<br />\r\n3. School Days in Binan<br />\r\n4. Triumphs in the Ateneo<br />\r\n5. At the UST<br />\r\n6. In Spain<br />\r\n7. Paris to Berlin<br />\r\n8. Noli Me Tangere<br />\r\n9. Elias and Salome<br />\r\n10. Rizal&rsquo;s Tour of Europe with with Viola<br />\r\n11. Back to Calamba<br />\r\n12. HK, Macao and Japan<br />\r\n13. Rizal in Japan<br />\r\n14. Rizal in America<br />\r\n15. Life and Works in London<br />\r\n16. In Gay Paris<br />\r\n17. Rizal in Brussles<br />\r\n18. In Madrid<br />\r\n19. El Filibusterismo<br />\r\n20. In Hong Kong<br />\r\n21. Exile in Dapitan<br />\r\n22. The Trial of Rizal<br />\r\n23. Martyrdom at Bagumbayan<br />\r\n<br />\r\nTextbook and References:<br />\r\n1. Rizal&rsquo;s Life, Works and Writings (The Centennial Edition) by: Gregorio F. Zaide<br />\r\nand Sonia M. Zaide Quezon City, 1988. All Nations Publishing Co.<br />\r\n2. Coates, Austin. Rizal: First Filipino Nationalist and Martyr, Quezon City, UP Press 1999.<br />\r\n3. Constantino, Renato. Veneration Without Understanding. Quezon City, UP Press Inc., 2001.<br />\r\n4. Dela Cruz, W. &amp; Zulueta, M. Rizal: Buhay at Kaisipan. Manila, NBS Publications 2002.<br />\r\n5. Ocampo, Ambeth. Rizal Without the Overcoat (New Edition). Pasig City, anvil Publishing House 2002.<br />\r\n6. Odullo-de Guzman, Maria. Noli Me Tangere and El Filibusterismo. Manila, NBS Publications 1998.<br />\r\n7. Palma, Rafael. Rizal: The Pride of the Malay Race. Manila, Saint Anthony Company 2000.<br />\r\n8.Romero, M.C. &amp; Sta Roman, J. Rizal &amp; the Development of Filipino Consciousness (Third Edition). Manila, JMC Press Inc., 2001.<br />\r\n<br />\r\nCourse Evaluation:<br />\r\n<br />\r\n1. Quizzes : 30 %<br />\r\n2. Exams : 40 %<br />\r\n3. Class Standing : 20 %<br />\r\n- recitation<br />\r\n- attendance<br />\r\n- behavior<br />\r\n4. Final Grade<br />\r\n- 40 % previous grade<br />\r\n- 60 % current grade</p>\r\n', 3, '', '2nd'),
(41, 'IS 411B', 'Senior Systems Project 2', '', '', 3, '', '2nd'),
(42, '1234', 'Sample Subject', '', '<p>Sample Only</p>\r\n', 3, '', '1st'),
(43, 'SAMPSUBJ123', 'SAMPLE SUBJECT', '', '<p>Sample Subject added by: joyce</p>\r\n', 23, '', '1st');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `department_id` int(11) NOT NULL,
  `location` varchar(200) NOT NULL,
  `about` varchar(500) NOT NULL,
  `teacher_status` varchar(20) NOT NULL,
  `teacher_stat` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `username`, `password`, `firstname`, `lastname`, `department_id`, `location`, `about`, `teacher_status`, `teacher_stat`) VALUES
(21, 'Nomer', 'password', 'Nomer', 'Aleviado', 11, 'uploads/NO-IMAGE-AVAILABLE.jpg', '', 'Registered', ''),
(20, 'Percian', 'password', 'Perican', 'Borja', 11, 'uploads/NO-IMAGE-AVAILABLE.jpg', '', 'Registered', ''),
(22, 'sampleteacher', 'password', 'SAMPLE', 'TEACHER', 11, 'uploads/NO-IMAGE-AVAILABLE.jpg', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_backpack`
--

CREATE TABLE `teacher_backpack` (
  `file_id` int(11) NOT NULL,
  `floc` varchar(100) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_class`
--

CREATE TABLE `teacher_class` (
  `teacher_class_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `thumbnails` varchar(100) NOT NULL,
  `school_year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_class`
--

INSERT INTO `teacher_class` (`teacher_class_id`, `teacher_id`, `class_id`, `subject_id`, `thumbnails`, `school_year`) VALUES
(97, 9, 7, 15, 'admin/uploads/thumbnails.jpg', '2012-2013'),
(135, 0, 22, 29, 'admin/uploads/thumbnails.jpg', '2013-2014'),
(151, 5, 7, 14, 'admin/uploads/thumbnails.jpg', '2013-2014'),
(152, 5, 8, 14, 'admin/uploads/thumbnails.jpg', '2013-2014'),
(153, 5, 13, 36, 'admin/uploads/thumbnails.jpg', '2013-2014'),
(157, 18, 15, 23, 'admin/uploads/thumbnails.jpg', '2013-2014'),
(158, 18, 16, 23, 'admin/uploads/thumbnails.jpg', '2013-2014'),
(159, 18, 12, 23, 'admin/uploads/thumbnails.jpg', '2013-2014'),
(160, 18, 7, 29, 'admin/uploads/thumbnails.jpg', '2013-2014'),
(165, 134, 15, 23, 'admin/uploads/thumbnails.jpg', '2013-2014'),
(167, 12, 13, 35, 'admin/uploads/thumbnails.jpg', '2013-2014'),
(168, 12, 14, 35, 'admin/uploads/thumbnails.jpg', '2013-2014'),
(170, 12, 16, 24, 'admin/uploads/thumbnails.jpg', '2013-2014'),
(172, 18, 13, 39, 'admin/uploads/thumbnails.jpg', '2013-2014'),
(173, 18, 14, 39, 'admin/uploads/thumbnails.jpg', '2013-2014'),
(174, 13, 12, 16, 'admin/uploads/thumbnails.jpg', '2013-2014'),
(175, 13, 13, 16, 'admin/uploads/thumbnails.jpg', '2013-2014'),
(176, 13, 14, 16, 'admin/uploads/thumbnails.jpg', '2013-2014'),
(177, 14, 12, 32, 'admin/uploads/thumbnails.jpg', '2013-2014'),
(178, 14, 13, 32, 'admin/uploads/thumbnails.jpg', '2013-2014'),
(179, 14, 14, 32, 'admin/uploads/thumbnails.jpg', '2013-2014'),
(180, 19, 13, 22, 'admin/uploads/thumbnails.jpg', '2013-2014'),
(181, 12, 20, 24, 'admin/uploads/thumbnails.jpg', '2013-2014'),
(183, 12, 18, 24, 'admin/uploads/thumbnails.jpg', '2013-2014'),
(184, 12, 17, 25, 'admin/uploads/thumbnails.jpg', '2013-2014'),
(185, 12, 7, 22, 'admin/uploads/thumbnails.jpg', '2013-2014'),
(186, 9, 18, 42, 'admin/uploads/thumbnails.jpg', '2013-2014'),
(187, 20, 22, 22, 'admin/uploads/thumbnails.jpg', '2023-2024'),
(189, 20, 22, 23, 'admin/uploads/thumbnails.jpg', '2023-2024'),
(190, 21, 22, 15, 'admin/uploads/thumbnails.jpg', '2023-2024'),
(191, 20, 13, 36, 'admin/uploads/thumbnails.jpg', '2023-2024'),
(192, 22, 25, 43, 'admin/uploads/thumbnails.jpg', '2024-2025'),
(193, 20, 25, 26, 'admin/uploads/thumbnails.jpg', '2024-2025');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_class_announcements`
--

CREATE TABLE `teacher_class_announcements` (
  `teacher_class_announcements_id` int(11) NOT NULL,
  `content` varchar(500) NOT NULL,
  `teacher_id` varchar(100) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_class_announcements`
--

INSERT INTO `teacher_class_announcements` (`teacher_class_announcements_id`, `content`, `teacher_id`, `teacher_class_id`, `date`) VALUES
(2, '<p><strong>Project Deadline</strong></p>\r\n\r\n<p>In December 1st week&nbsp; system must fully functioning.</p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n', '9', 87, '2013-10-30 13:21:13'),
(21, '<p>fsaf</p>\r\n', '9', 87, '2013-10-30 14:33:21'),
(34, '<p>hello guys</p>\r\n', '9', 95, '2013-11-02 10:51:39'),
(35, '<p>dsdasd</p>\r\n', '12', 147, '2013-11-16 13:59:33'),
(36, '<p>BSIS 1A: Submit assignment on November 20, 2013 before 5pm.</p>\r\n', '12', 154, '2013-11-18 15:29:34'),
(37, '<p>aaaaa<br />\r\n&nbsp;</p>\r\n', '12', 167, '2014-01-17 14:36:32'),
(38, '<p>wala klase<img alt=\"sad\" src=\"http://localhost/lms/admin/vendors/ckeditor/plugins/smiley/images/sad_smile.gif\" style=\"height:20px; width:20px\" title=\"sad\" /></p>\r\n', '12', 167, '2014-02-13 13:45:59'),
(39, '<p>Test</p>\r\n', '9', 186, '2020-12-21 09:59:00'),
(40, '<p>jtyjyjy</p>\r\n', '20', 187, '2024-01-02 20:52:15'),
(41, '<p>sample announcement</p>\r\n', '22', 192, '2024-04-15 22:51:40');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_class_student`
--

CREATE TABLE `teacher_class_student` (
  `teacher_class_student_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_class_student`
--

INSERT INTO `teacher_class_student` (`teacher_class_student_id`, `teacher_class_id`, `student_id`, `teacher_id`) VALUES
(31, 165, 141, 134),
(32, 165, 134, 134),
(54, 167, 113, 12),
(55, 167, 112, 12),
(57, 167, 108, 12),
(58, 167, 105, 12),
(59, 167, 106, 12),
(60, 167, 103, 12),
(61, 167, 104, 12),
(62, 167, 100, 12),
(63, 167, 101, 12),
(64, 167, 102, 12),
(65, 167, 97, 12),
(66, 167, 98, 12),
(67, 167, 95, 12),
(68, 167, 94, 12),
(69, 167, 76, 12),
(70, 167, 107, 12),
(71, 167, 110, 12),
(72, 167, 109, 12),
(73, 167, 99, 12),
(74, 167, 96, 12),
(75, 167, 75, 12),
(76, 167, 74, 12),
(77, 167, 73, 12),
(78, 167, 72, 12),
(79, 167, 71, 12),
(80, 168, 135, 12),
(81, 168, 140, 12),
(82, 168, 162, 12),
(83, 168, 164, 12),
(84, 168, 165, 12),
(85, 168, 166, 12),
(86, 168, 167, 12),
(87, 168, 168, 12),
(88, 168, 169, 12),
(89, 168, 172, 12),
(90, 168, 171, 12),
(91, 168, 173, 12),
(92, 168, 174, 12),
(93, 168, 175, 12),
(94, 168, 176, 12),
(95, 168, 177, 12),
(96, 168, 178, 12),
(97, 168, 179, 12),
(98, 168, 180, 12),
(99, 168, 181, 12),
(100, 168, 182, 12),
(101, 168, 183, 12),
(102, 168, 206, 12),
(103, 168, 207, 12),
(127, 172, 113, 18),
(128, 172, 112, 18),
(129, 172, 111, 18),
(130, 172, 108, 18),
(131, 172, 105, 18),
(132, 172, 106, 18),
(133, 172, 103, 18),
(134, 172, 104, 18),
(135, 172, 100, 18),
(136, 172, 101, 18),
(137, 172, 102, 18),
(138, 172, 97, 18),
(139, 172, 98, 18),
(140, 172, 95, 18),
(141, 172, 94, 18),
(142, 172, 76, 18),
(143, 172, 107, 18),
(144, 172, 110, 18),
(145, 172, 109, 18),
(146, 172, 99, 18),
(147, 172, 96, 18),
(148, 172, 75, 18),
(149, 172, 74, 18),
(150, 172, 73, 18),
(151, 172, 72, 18),
(152, 172, 71, 18),
(153, 173, 135, 18),
(154, 173, 140, 18),
(155, 173, 162, 18),
(156, 173, 164, 18),
(157, 173, 165, 18),
(158, 173, 166, 18),
(159, 173, 167, 18),
(160, 173, 168, 18),
(161, 173, 169, 18),
(162, 173, 172, 18),
(163, 173, 171, 18),
(164, 173, 173, 18),
(165, 173, 174, 18),
(166, 173, 175, 18),
(167, 173, 176, 18),
(168, 173, 177, 18),
(169, 173, 178, 18),
(170, 173, 179, 18),
(171, 173, 180, 18),
(172, 173, 181, 18),
(173, 173, 182, 18),
(174, 173, 183, 18),
(175, 173, 206, 18),
(176, 173, 207, 18),
(177, 174, 134, 13),
(178, 174, 142, 13),
(179, 174, 143, 13),
(180, 174, 144, 13),
(181, 174, 145, 13),
(182, 174, 146, 13),
(183, 174, 147, 13),
(184, 174, 148, 13),
(185, 174, 149, 13),
(186, 174, 150, 13),
(187, 174, 151, 13),
(188, 174, 152, 13),
(189, 174, 153, 13),
(190, 174, 154, 13),
(191, 174, 155, 13),
(192, 174, 156, 13),
(193, 174, 157, 13),
(194, 174, 158, 13),
(195, 174, 159, 13),
(196, 175, 113, 13),
(197, 175, 112, 13),
(198, 175, 111, 13),
(199, 175, 108, 13),
(200, 175, 105, 13),
(201, 175, 106, 13),
(202, 175, 103, 13),
(203, 175, 104, 13),
(204, 175, 100, 13),
(205, 175, 101, 13),
(206, 175, 102, 13),
(207, 175, 97, 13),
(208, 175, 98, 13),
(209, 175, 95, 13),
(210, 175, 94, 13),
(211, 175, 76, 13),
(212, 175, 107, 13),
(213, 175, 110, 13),
(214, 175, 109, 13),
(215, 175, 99, 13),
(216, 175, 96, 13),
(217, 175, 75, 13),
(218, 175, 74, 13),
(219, 175, 73, 13),
(220, 175, 72, 13),
(221, 175, 71, 13),
(222, 176, 135, 13),
(223, 176, 140, 13),
(224, 176, 162, 13),
(225, 176, 164, 13),
(226, 176, 165, 13),
(227, 176, 166, 13),
(228, 176, 167, 13),
(229, 176, 168, 13),
(230, 176, 169, 13),
(231, 176, 172, 13),
(232, 176, 171, 13),
(233, 176, 173, 13),
(234, 176, 174, 13),
(235, 176, 175, 13),
(236, 176, 176, 13),
(237, 176, 177, 13),
(238, 176, 178, 13),
(239, 176, 179, 13),
(240, 176, 180, 13),
(241, 176, 181, 13),
(242, 176, 182, 13),
(243, 176, 183, 13),
(244, 176, 206, 13),
(245, 176, 207, 13),
(246, 177, 134, 14),
(247, 177, 142, 14),
(248, 177, 143, 14),
(249, 177, 144, 14),
(250, 177, 145, 14),
(251, 177, 146, 14),
(252, 177, 147, 14),
(253, 177, 148, 14),
(254, 177, 149, 14),
(255, 177, 150, 14),
(256, 177, 151, 14),
(257, 177, 152, 14),
(258, 177, 153, 14),
(259, 177, 154, 14),
(260, 177, 155, 14),
(261, 177, 156, 14),
(262, 177, 157, 14),
(263, 177, 158, 14),
(264, 177, 159, 14),
(265, 178, 113, 14),
(266, 178, 112, 14),
(267, 178, 111, 14),
(268, 178, 108, 14),
(269, 178, 105, 14),
(270, 178, 106, 14),
(271, 178, 103, 14),
(272, 178, 104, 14),
(273, 178, 100, 14),
(274, 178, 101, 14),
(275, 178, 102, 14),
(276, 178, 97, 14),
(277, 178, 98, 14),
(278, 178, 95, 14),
(279, 178, 94, 14),
(280, 178, 76, 14),
(281, 178, 107, 14),
(282, 178, 110, 14),
(283, 178, 109, 14),
(284, 178, 99, 14),
(285, 178, 96, 14),
(286, 178, 75, 14),
(287, 178, 74, 14),
(288, 178, 73, 14),
(289, 178, 72, 14),
(290, 178, 71, 14),
(291, 179, 135, 14),
(292, 179, 140, 14),
(293, 179, 162, 14),
(294, 179, 164, 14),
(295, 179, 165, 14),
(296, 179, 166, 14),
(297, 179, 167, 14),
(298, 179, 168, 14),
(299, 179, 169, 14),
(300, 179, 172, 14),
(301, 179, 171, 14),
(302, 179, 173, 14),
(303, 179, 174, 14),
(304, 179, 175, 14),
(305, 179, 176, 14),
(306, 179, 177, 14),
(307, 179, 178, 14),
(308, 179, 179, 14),
(309, 179, 180, 14),
(310, 179, 181, 14),
(311, 179, 182, 14),
(312, 179, 183, 14),
(313, 179, 206, 14),
(314, 179, 207, 14),
(315, 180, 113, 19),
(316, 180, 112, 19),
(317, 180, 111, 19),
(318, 180, 108, 19),
(319, 180, 105, 19),
(320, 180, 106, 19),
(321, 180, 103, 19),
(322, 180, 104, 19),
(323, 180, 100, 19),
(324, 180, 101, 19),
(325, 180, 102, 19),
(326, 180, 97, 19),
(327, 180, 98, 19),
(328, 180, 95, 19),
(329, 180, 94, 19),
(330, 180, 76, 19),
(331, 180, 107, 19),
(332, 180, 110, 19),
(333, 180, 109, 19),
(334, 180, 99, 19),
(335, 180, 96, 19),
(336, 180, 75, 19),
(337, 180, 74, 19),
(338, 180, 73, 19),
(339, 180, 72, 19),
(340, 180, 71, 19),
(341, 181, 209, 12),
(342, 181, 210, 12),
(345, 183, 213, 12),
(346, 183, 214, 12),
(347, 183, 215, 12),
(348, 183, 216, 12),
(349, 184, 184, 12),
(350, 184, 185, 12),
(351, 184, 186, 12),
(352, 184, 187, 12),
(353, 184, 188, 12),
(354, 184, 189, 12),
(355, 184, 190, 12),
(356, 184, 191, 12),
(358, 184, 193, 12),
(359, 184, 194, 12),
(360, 184, 195, 12),
(361, 184, 196, 12),
(362, 184, 197, 12),
(363, 184, 198, 12),
(364, 184, 199, 12),
(365, 184, 200, 12),
(366, 184, 201, 12),
(367, 184, 202, 12),
(368, 184, 203, 12),
(369, 184, 204, 12),
(370, 184, 205, 12),
(371, 184, 217, 12),
(372, 184, 192, 12),
(373, 185, 93, 12),
(374, 185, 136, 12),
(375, 185, 138, 12),
(376, 185, 139, 12),
(377, 185, 211, 12),
(378, 186, 213, 9),
(379, 186, 214, 9),
(380, 186, 215, 9),
(381, 186, 216, 9),
(382, 186, 219, 9),
(384, 187, 221, 20),
(385, 187, 100, 20),
(386, 189, 220, 20),
(387, 189, 221, 20),
(388, 190, 222, 21),
(389, 190, 220, 21),
(390, 190, 221, 21),
(391, 191, 220, 20),
(392, 192, 228, 22),
(393, 192, 229, 22),
(395, 187, 229, 20),
(396, 187, 224, 20),
(397, 187, 220, 20),
(398, 193, 220, 20),
(399, 193, 221, 20),
(400, 193, 229, 20),
(401, 193, 226, 20),
(402, 193, 224, 20),
(403, 193, 225, 20),
(404, 193, 227, 20),
(405, 193, 228, 20);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_notification`
--

CREATE TABLE `teacher_notification` (
  `teacher_notification_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `notification` varchar(100) NOT NULL,
  `date_of_notification` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `student_id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_notification`
--

INSERT INTO `teacher_notification` (`teacher_notification_id`, `teacher_class_id`, `notification`, `date_of_notification`, `link`, `student_id`, `assignment_id`) VALUES
(15, 160, 'Submit Assignment file name <b>my_assginment</b>', '2013-11-25 10:39:52', 'view_submit_assignment.php', 93, 16),
(17, 161, 'Submit Assignment file name <b>q</b>', '2013-11-25 15:54:19', 'view_submit_assignment.php', 71, 17),
(18, 186, 'Submit Assignment file name <b>asdasd</b>', '2020-12-21 10:12:04', 'view_submit_assignment.php', 219, 31),
(19, 187, 'Add Downloadable Materials file name <b>test upload from student</b>', '2024-01-10 18:07:51', 'downloadable.php', 220, 0),
(20, 187, 'Add Downloadable Materials file name <b>test upload fro student 2</b>', '2024-03-11 17:27:24', 'downloadable.php', 220, 0),
(21, 192, 'Add Downloadable Materials file name <b>test upload</b>', '2024-04-15 22:44:49', 'downloadable.php', 229, 0),
(22, 192, 'Submit Assignment file name <b>TESTDOWNLOADABLE MATERIAL</b>', '2024-04-15 23:01:59', 'view_submit_assignment.php', 229, 32),
(23, 192, 'Submit Assignment file name <b>sagot ko to</b>', '2024-04-16 18:01:28', 'view_submit_assignment.php', 229, 32),
(24, 193, 'Submit Assignment file name <b>to sagot ko</b>', '2024-04-16 18:22:33', 'view_submit_assignment.php', 220, 34);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_shared`
--

CREATE TABLE `teacher_shared` (
  `teacher_shared_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `shared_teacher_id` int(11) NOT NULL,
  `floc` varchar(100) NOT NULL,
  `fdatein` varchar(100) NOT NULL,
  `fdesc` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_shared`
--

INSERT INTO `teacher_shared` (`teacher_shared_id`, `teacher_id`, `shared_teacher_id`, `floc`, `fdatein`, `fdesc`, `fname`) VALUES
(1, 12, 14, 'admin/uploads/7939_File_449E26DB.jpg', '2014-02-20 09:55:32', 'sas', 'sss');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `firstname`, `lastname`) VALUES
(13, 'Kyle', 'teph', 'Kyle', 'Halili'),
(15, 'admin', 'admin', 'admin', 'admin'),
(16, 'pjfactoran', 'password123a', 'Precious Joyce', 'Factoran');

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `user_log_id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `login_date` varchar(30) NOT NULL,
  `logout_date` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_log`
--

INSERT INTO `user_log` (`user_log_id`, `username`, `login_date`, `logout_date`, `user_id`) VALUES
(94, 'admin', '2024-02-27 18:16:50', '2024-04-15 22:05:23', 15),
(95, 'admin', '2024-02-27 18:24:48', '2024-04-15 22:05:23', 15),
(96, 'admin', '2024-02-28 17:41:05', '2024-04-15 22:05:23', 15),
(97, 'admin', '2024-02-28 17:42:53', '2024-04-15 22:05:23', 15),
(98, 'admin', '2024-02-28 17:50:44', '2024-04-15 22:05:23', 15),
(99, 'admin', '2024-04-01 17:32:29', '2024-04-15 22:05:23', 15),
(100, 'admin', '2024-04-15 13:55:39', '2024-04-15 22:05:23', 15),
(101, 'admin', '2024-04-15 13:58:19', '2024-04-15 22:05:23', 15),
(102, 'admin', '2024-04-15 21:24:27', '2024-04-15 22:05:23', 15),
(103, 'admin', '2024-04-15 21:47:47', '2024-04-15 22:05:23', 15),
(104, 'admin', '2024-04-15 21:55:50', '2024-04-15 22:05:23', 15),
(105, 'pjfactoran', '2024-04-15 22:05:37', '2024-04-15 22:15:41', 16),
(106, 'pjfactoran', '2024-04-15 22:16:33', '', 16),
(107, 'admin', '2024-04-16 18:23:43', '', 15),
(108, 'admin', '2024-04-16 19:12:41', '', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`activity_log_id`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignment_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `class_quiz`
--
ALTER TABLE `class_quiz`
  ADD PRIMARY KEY (`class_quiz_id`);

--
-- Indexes for table `class_subject_overview`
--
ALTER TABLE `class_subject_overview`
  ADD PRIMARY KEY (`class_subject_overview_id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `message_sent`
--
ALTER TABLE `message_sent`
  ADD PRIMARY KEY (`message_sent_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `notification_read`
--
ALTER TABLE `notification_read`
  ADD PRIMARY KEY (`notification_read_id`);

--
-- Indexes for table `notification_read_teacher`
--
ALTER TABLE `notification_read_teacher`
  ADD PRIMARY KEY (`notification_read_teacher_id`);

--
-- Indexes for table `purchased_items`
--
ALTER TABLE `purchased_items`
  ADD PRIMARY KEY (`purchased_item_id`);

--
-- Indexes for table `question_type`
--
ALTER TABLE `question_type`
  ADD PRIMARY KEY (`question_type_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `quiz_question`
--
ALTER TABLE `quiz_question`
  ADD PRIMARY KEY (`quiz_question_id`);

--
-- Indexes for table `school_year`
--
ALTER TABLE `school_year`
  ADD PRIMARY KEY (`school_year_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_assignment`
--
ALTER TABLE `student_assignment`
  ADD PRIMARY KEY (`student_assignment_id`);

--
-- Indexes for table `student_backpack`
--
ALTER TABLE `student_backpack`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `student_class_quiz`
--
ALTER TABLE `student_class_quiz`
  ADD PRIMARY KEY (`student_class_quiz_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `teacher_backpack`
--
ALTER TABLE `teacher_backpack`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `teacher_class`
--
ALTER TABLE `teacher_class`
  ADD PRIMARY KEY (`teacher_class_id`);

--
-- Indexes for table `teacher_class_announcements`
--
ALTER TABLE `teacher_class_announcements`
  ADD PRIMARY KEY (`teacher_class_announcements_id`);

--
-- Indexes for table `teacher_class_student`
--
ALTER TABLE `teacher_class_student`
  ADD PRIMARY KEY (`teacher_class_student_id`);

--
-- Indexes for table `teacher_notification`
--
ALTER TABLE `teacher_notification`
  ADD PRIMARY KEY (`teacher_notification_id`);

--
-- Indexes for table `teacher_shared`
--
ALTER TABLE `teacher_shared`
  ADD PRIMARY KEY (`teacher_shared_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`user_log_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `activity_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `class_quiz`
--
ALTER TABLE `class_quiz`
  MODIFY `class_quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `class_subject_overview`
--
ALTER TABLE `class_subject_overview`
  MODIFY `class_subject_overview_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `message_sent`
--
ALTER TABLE `message_sent`
  MODIFY `message_sent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `notification_read`
--
ALTER TABLE `notification_read`
  MODIFY `notification_read_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `notification_read_teacher`
--
ALTER TABLE `notification_read_teacher`
  MODIFY `notification_read_teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `purchased_items`
--
ALTER TABLE `purchased_items`
  MODIFY `purchased_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `quiz_question`
--
ALTER TABLE `quiz_question`
  MODIFY `quiz_question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `school_year`
--
ALTER TABLE `school_year`
  MODIFY `school_year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT for table `student_assignment`
--
ALTER TABLE `student_assignment`
  MODIFY `student_assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_backpack`
--
ALTER TABLE `student_backpack`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_class_quiz`
--
ALTER TABLE `student_class_quiz`
  MODIFY `student_class_quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `teacher_backpack`
--
ALTER TABLE `teacher_backpack`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher_class`
--
ALTER TABLE `teacher_class`
  MODIFY `teacher_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT for table `teacher_class_announcements`
--
ALTER TABLE `teacher_class_announcements`
  MODIFY `teacher_class_announcements_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `teacher_class_student`
--
ALTER TABLE `teacher_class_student`
  MODIFY `teacher_class_student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=406;

--
-- AUTO_INCREMENT for table `teacher_notification`
--
ALTER TABLE `teacher_notification`
  MODIFY `teacher_notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `teacher_shared`
--
ALTER TABLE `teacher_shared`
  MODIFY `teacher_shared_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `user_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
