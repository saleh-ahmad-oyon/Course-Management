-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2016 at 08:29 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course_management`
--
CREATE DATABASE IF NOT EXISTS `course_management` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `course_management`;

-- --------------------------------------------------------

--
-- Table structure for table `attendinfo`
--

CREATE TABLE `attendinfo` (
  `att_id` int(11) NOT NULL COMMENT 'attendance id',
  `att_total` int(11) NOT NULL DEFAULT '0' COMMENT 'total attendance',
  `s_id` int(11) NOT NULL COMMENT 'student id',
  `c_id` int(11) NOT NULL COMMENT 'course id'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendinfo`
--

INSERT INTO `attendinfo` (`att_id`, `att_total`, `s_id`, `c_id`) VALUES
(1, 0, 3, 1),
(2, 3, 1, 2),
(3, 2, 2, 2),
(4, 3, 3, 2),
(5, 2, 4, 2),
(43, 3, 5, 2),
(7, 3, 6, 2),
(8, 3, 7, 2),
(9, 3, 8, 2),
(10, 3, 9, 2),
(11, 3, 10, 2),
(12, 3, 11, 2),
(46, 3, 55, 2),
(14, 3, 13, 2),
(15, 3, 14, 2),
(16, 3, 15, 2),
(17, 2, 16, 2),
(48, 1, 49, 2),
(19, 3, 18, 2),
(20, 3, 19, 2),
(21, 3, 20, 2),
(50, 1, 46, 2),
(23, 3, 22, 2),
(24, 3, 23, 2),
(47, 1, 56, 2),
(26, 2, 25, 2),
(27, 3, 26, 2),
(28, 1, 27, 2),
(29, 3, 28, 2),
(45, 3, 51, 2),
(42, 3, 54, 2),
(32, 3, 31, 2),
(33, 3, 32, 2),
(44, 3, 52, 2),
(49, 1, 50, 2),
(36, 3, 35, 2),
(37, 3, 36, 2),
(38, 3, 37, 2),
(39, 3, 38, 2),
(40, 3, 39, 2),
(41, 3, 40, 2),
(52, 1, 57, 2),
(54, 0, 52, 5),
(59, 0, 26, 5);

-- --------------------------------------------------------

--
-- Table structure for table `authority`
--

CREATE TABLE `authority` (
  `a_id` int(11) NOT NULL COMMENT 'authority id',
  `a_aiub_id` varchar(15) NOT NULL COMMENT 'authority aiub id',
  `a_pass` varchar(55) NOT NULL COMMENT 'authority password'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authority`
--

INSERT INTO `authority` (`a_id`, `a_aiub_id`, `a_pass`) VALUES
(1, '7894-7894-1', 'qQ1!');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `c_id` int(11) NOT NULL COMMENT 'course id',
  `c_name` varchar(55) NOT NULL COMMENT 'course name',
  `t_id` int(11) NOT NULL DEFAULT '0' COMMENT 'teacher id'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_id`, `c_name`, `t_id`) VALUES
(1, 'Advanced Topics In Programming II', 1),
(2, 'Web Technologies', 1),
(3, 'Data Structure', 1),
(4, 'Data Warehousing and Data Mining', 2),
(5, 'Algorithms', 2),
(6, 'Artificial Intelligence and Expert System', 2),
(7, 'Object Oriented Programming 2', 3),
(8, 'Programming Language 2', 3),
(9, 'Advanced Topics In Programming I', 0),
(10, 'Human Computer Interaction', 0),
(11, 'Programming Language 1 ', 0),
(12, 'Advanced Database Management System', 0),
(13, 'Computer Networks', 0),
(14, 'Advanced Computer Networks', 0),
(15, 'Object Oriented Programming 1', 0),
(16, 'Computer Fundamentals', 0),
(17, 'Discrete Mahematics', 0),
(18, 'Introduction to Database', 0),
(19, 'Object Oriented Analysis and Design', 0),
(20, 'Computer Organization and Architecture', 0),
(21, 'Software Engineering', 0),
(22, 'Computer Graphics', 0),
(23, 'Operating System', 8),
(24, 'Theory of Computation', 0),
(25, 'Compiler Design', 0),
(26, 'Research Methodology', 0);

-- --------------------------------------------------------

--
-- Table structure for table `course_student_marks`
--

CREATE TABLE `course_student_marks` (
  `c_s_m_id` int(11) NOT NULL COMMENT 'course student marks id',
  `c_id` int(11) NOT NULL COMMENT 'course id',
  `s_id` int(11) NOT NULL COMMENT 'student id',
  `mid_best_two` float NOT NULL DEFAULT '0' COMMENT 'mid best two quiz marks',
  `final_best_two` float NOT NULL DEFAULT '0' COMMENT 'final best two quiz marks',
  `mid_total` float NOT NULL DEFAULT '0' COMMENT 'mid total marks',
  `mid_grade` varchar(5) DEFAULT 'FAIL' COMMENT 'mid grade',
  `final_grade` varchar(5) DEFAULT 'FAIL' COMMENT 'final grade',
  `grand_final_grade` varchar(5) DEFAULT 'FAIL' COMMENT 'grand final grade',
  `final_total` float NOT NULL DEFAULT '0' COMMENT 'final total',
  `grand_final_total` float NOT NULL DEFAULT '0' COMMENT 'grand final total'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_student_marks`
--

INSERT INTO `course_student_marks` (`c_s_m_id`, `c_id`, `s_id`, `mid_best_two`, `final_best_two`, `mid_total`, `mid_grade`, `final_grade`, `grand_final_grade`, `final_total`, `grand_final_total`) VALUES
(1, 1, 3, 40, 0, 100, 'A+', 'FAIL', 'FAIL', 0, 0),
(2, 2, 1, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(3, 2, 2, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(4, 2, 3, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(5, 2, 4, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(43, 2, 5, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(7, 2, 6, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(8, 2, 7, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(9, 2, 8, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(10, 2, 9, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(11, 2, 10, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(12, 2, 11, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(46, 2, 55, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(14, 2, 13, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(15, 2, 14, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(16, 2, 15, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(17, 2, 16, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(48, 2, 49, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(19, 2, 18, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(20, 2, 19, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(21, 2, 20, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(50, 2, 46, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(23, 2, 22, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(24, 2, 23, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(47, 2, 56, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(26, 2, 25, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(27, 2, 26, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(28, 2, 27, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(29, 2, 28, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(45, 2, 51, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(42, 2, 54, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(32, 2, 31, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(33, 2, 32, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(44, 2, 52, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(49, 2, 50, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(36, 2, 35, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(37, 2, 36, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(38, 2, 37, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(39, 2, 38, 40, 0, 100, 'A+', 'FAIL', 'FAIL', 0, 0),
(40, 2, 39, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(41, 2, 40, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(52, 2, 57, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(54, 5, 52, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(59, 5, 26, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `d_id` int(11) NOT NULL COMMENT 'department id',
  `d_name` varchar(10) NOT NULL COMMENT 'department name'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`d_id`, `d_name`) VALUES
(1, 'CSE'),
(2, 'CSSE'),
(3, 'SE'),
(4, 'CIS'),
(5, 'CS');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `e_id` int(11) NOT NULL COMMENT 'exam id',
  `e_name` varchar(15) NOT NULL COMMENT 'exam name',
  `e_date` datetime NOT NULL COMMENT 'exam date',
  `e_marks` float NOT NULL COMMENT 'exam marks',
  `s_id` int(11) NOT NULL COMMENT 'student id',
  `c_id` int(11) NOT NULL COMMENT 'course id'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`e_id`, `e_name`, `e_date`, `e_marks`, `s_id`, `c_id`) VALUES
(1, 'quiz1', '2016-05-19 10:16:57', 18, 3, 1),
(2, 'quiz2', '2016-05-19 10:17:05', 20, 3, 1),
(3, 'quiz3', '2016-05-19 10:17:10', 17, 3, 1),
(4, 'mid', '2016-05-19 10:17:21', 38, 3, 1),
(5, 'quiz1', '2016-05-20 09:45:46', 20, 3, 1),
(7, 'quiz1', '2016-05-28 04:22:51', 20, 38, 2),
(8, 'quiz2', '2016-05-28 04:22:58', 12, 38, 2),
(9, 'quiz2', '2016-05-28 04:23:03', 17, 38, 2),
(10, 'quiz2', '2016-05-28 04:23:17', 20, 38, 2),
(12, 'mid', '2016-05-28 10:20:48', 40, 38, 2),
(13, 'quiz4', '2016-05-28 10:21:01', 12, 38, 2),
(14, 'quiz5', '2016-05-28 10:21:08', 15, 38, 2),
(15, 'quiz4', '2016-05-28 10:21:15', 15, 38, 2),
(16, 'quiz6', '2016-05-28 10:21:21', 20, 38, 2);

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `inf_id` int(11) NOT NULL COMMENT 'info id',
  `info_privilege` int(11) NOT NULL COMMENT 'info privilege',
  `info_list` text NOT NULL COMMENT 'info description'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`inf_id`, `info_privilege`, `info_list`) VALUES
(1, 1, 'Add Faculty Member(s).'),
(2, 1, 'Add Student(s).'),
(3, 1, 'Change his/her password.'),
(4, 2, 'View his/her information.'),
(5, 2, 'Edit his/her information except AIUB ID, Designation.'),
(6, 2, 'Add / remove new student to his course (assuming that one course has only one faculty but a faculty can take multiple courses).'),
(7, 2, 'Two students with the same ID can''t be added to the same course and also total number of students in a course cannot exceed 40.'),
(8, 2, 'Insert/Edit marks of three quizzes and term exam for all the students of his course.'),
(9, 2, 'Sometimes students may appear for improvement exams (for quizzes). In that case the updated marks also can be uploaded but the previous marks should also be kept for further reference.'),
(10, 2, 'Give attendance to all of the students of his course in each class.'),
(11, 2, 'View the list of students and their information.'),
(12, 2, 'View the marks of each quiz (including the makeups), the sum of best two quiz, the term exam and the total attendance for each student.'),
(13, 2, 'Change his/her password.'),
(14, 1, 'Two students/teachers with the same ID can''t be added.'),
(15, 3, 'View his/her information.'),
(16, 3, 'View his/her courses and course teacher''s information.'),
(17, 3, 'View his/her marks of each quiz (including the makeups), the sum of best two quiz, the term exam and the total attendance.'),
(18, 3, 'Edit his/her information except AIUB ID, marks and CGPA (if there is any).'),
(19, 3, 'Change his/her password.'),
(20, 1, 'Can assign teachers in courses.');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `s_id` int(11) NOT NULL COMMENT 'student id',
  `s_aiub_id` varchar(15) NOT NULL COMMENT 'student aiub id',
  `s_full_name` varchar(55) NOT NULL COMMENT 'student full name',
  `s_cgpa` float NOT NULL DEFAULT '0' COMMENT 'student cgpa',
  `s_phone` varchar(20) NOT NULL COMMENT 'student phone',
  `s_email` varchar(55) DEFAULT NULL COMMENT 'student email',
  `s_pass` varchar(255) NOT NULL DEFAULT '1234' COMMENT 'student password',
  `s_dept` varchar(10) NOT NULL COMMENT 'student department',
  `s_image` text COMMENT 'student image',
  `s_gender` varchar(10) DEFAULT NULL COMMENT 'student gender',
  `s_dob` date DEFAULT NULL COMMENT 'student date of birth'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `s_aiub_id`, `s_full_name`, `s_cgpa`, `s_phone`, `s_email`, `s_pass`, `s_dept`, `s_image`, `s_gender`, `s_dob`) VALUES
(1, '12-20167-1', 'Rahman Sadikur', 3.5, '+880-1680091207', 'shawon@gmail.com', '1234', 'CSE', 'c4ca4238a0b923820dcc509a6f75849b_shawon.jpg', 'Male', '1970-01-01'),
(2, '12-20107-1', 'Rafi, M.H', 3.62, '+880-1677649964', 'rafi@yahoo.com', '1234', 'CSE', 'c81e728d9d4c2f636f067f89cc14862c_rafi.jpg', 'Male', '1970-01-01'),
(3, '12-20235-1', 'Ahmad, Saleh', 3.85, '+880-1626785569', 'salehoyon@hotmail.com', 'qQ1!', 'CSE', 'eccbc87e4b5ce2fe28308fd9f2a7baf3_oyon.jpg', 'Male', '1991-08-13'),
(4, '12-20115-1', 'Roy, Pallob Kanti', 3.25, '+880-1912165908', 'pallab@ymail.com', '1234', 'CSSE', 'a87ff679a2f3e71d9181a67b7542122c_Pallob.jpg', 'Male', '1970-01-01'),
(5, '12-20120-1', 'Ayon, Arif Ahmed', 3.56, '+880-1677377003', 'ayon@rocketmail.com', '1234', 'CSSE', 'e4da3b7fbbce2345d7772b0674a318d5_Ayon.jpg', 'Male', '1970-01-01'),
(6, '12-20124-1', 'Alam, Nesar Ul', 3.41, '+880-1676756794', 'nesarul@gmail.com', '1234', 'CSSE', '1679091c5a880faf6fb5e6087eb1b2dc_Nesar.jpg', 'Male', '1970-01-01'),
(7, '12-20130-1', 'Faria, Tabassum Mehnaz', 3.63, '+880-1625784593', 'faria@live.com', '1234', 'CSE', '8f14e45fceea167a5a36dedd4bea2543_tabassum.jpg', 'Female', '1970-01-01'),
(8, '12-20137-1', 'Mahmood, Asif', 3.11, '+880-1682702757', 'asif@hotmail.com', '1234', 'CSE', 'c9f0f895fb98ab9159f51fd0297e236d_Asif.jpg', 'Male', '1970-01-01'),
(9, '12-21032-1', 'Mimo, Minhaj Mohammad', 3.25, '+880-1711086599', 'mimo@outlook.com', '1234', 'CSSE', '45c48cce2e2d7fbdea1afc51c7c6ad26_mimo.jpg', 'Male', '1992-06-09'),
(10, '12-20138-1', 'Bhuiyan, Md, Maksudul Haque', 3.53, '+880-1671038362', 'turja@hotmail.com', '1234', 'CSSE', 'd3d9446802a44259755d38e6d163e820_Turja.jpg', 'Male', '1970-01-01'),
(11, '12-20146-1', 'Amin, Mohammad Shafayet Bin', 3.47, '+880-1824954504', 'safayet@yahoo.com', '1234', 'CSSE', '6512bd43d9caa6e02c990b0a82652dca_Shafayet.jpg', 'Male', '1970-01-01'),
(12, '12-20151-1', 'Junayed, A.S.M', 3.05, '01671821613', 'junayed@live.com', '1234', 'CSE', 'default-user.png', 'Male', '0000-00-00'),
(13, '12-20158-1', 'Ahmed, Md. Isteak', 3.49, '+880-1675179712', 'isti@hotmail.com', '1234', 'CSE', 'c51ce410c124a10e0db5e4b97fc2af39_isteak.jpg', 'Male', '1970-01-01'),
(14, '12-20111-1', 'Ahmed Rejwan', 3.6, '+880-1831174312', 'rejwan@hotmail.com', '1234', 'CSSE', 'aab3238922bcc25a6f606eb525ffdc56_Rejwan.jpg', 'Male', '1970-01-01'),
(15, '12-20172-1', 'Islam, Ayon Dipto', 3.32, '+880-1675641830', 'auyon@yahoo.com', '1234', 'CSE', '9bf31c7ff062936a96d3c8bd1f8f2ff3_auyon.jpg', 'Male', '1970-01-01'),
(16, '12-20229-1', 'Parag, Kutubuddin Jalal', 3.12, '+880-1676163313', 'parag@ymail.com', '1234', 'CSE', 'c74d97b01eae257e44aa9d5bade97baf_parag.jpg', 'Male', '1970-01-01'),
(60, '12-21206-1', 'Rahit, Tahsin Hasan', 3.89, '+880-1918393864', 'tahsin.rahit@gmail.com', '1234', 'CSE', 'e8ddccd57d603e5bccb0c8d61cd3031b_rahit.jpg', 'Male', '1992-02-04'),
(18, '12-20245-1', 'Banna, Sazid Hossain', 3.21, '+880-1715342366', 'cryingbanna@live.com', '1234', 'CSE', '6f4922f45568161a8cdf4ad2299f6d23_banna.jpg', 'Male', '1992-08-30'),
(19, '12-20497-1', 'Roy, Nirbachita', 3.8, '+880-1730078219', 'nirba@live.com', '1234', 'CSE', '1f0e3dad99908345f7439f8ffabdffc4_nirbachita.jpg', 'Female', '1970-01-01'),
(20, '12-20261-1', 'Hassan, Mahir Faisal', 2.95, '+880-1670281289', 'mahir@gmail.com', '1234', 'CSE', '98f13708210194c475687be6106a3b84_mahir.jpg', 'Male', '1992-04-07'),
(21, '12-20332-1', 'Sajid Mohammad', 3.25, '01732761556', 'sajid@rocketmail.com', '1234', 'CSE', 'default-user.png', 'Male', '0000-00-00'),
(22, '12-20335-1', 'Lasker, Md. Naim', 3.46, '+880-1680641959', 'lasker@yahoo.com', '1234', 'CSE', 'b6d767d2f8ed5d21a44b0e5886680cb9_naim.jpg', 'Male', '1970-01-01'),
(23, '12-20337-1', 'Khan, A.K.M Shakuruzzaman', 3.51, '+880-1676608440', 'ashik@rocketmail.com', '1234', 'CSE', '37693cfc748049e45d87b8c7d8b9aacd_ashik.jpg', 'Male', '1970-01-01'),
(25, '12-20342-1', 'Tazrin, Fahmida', 3.32, '+880-1745269873', 'tazrin@ymail.com', '1234', 'CSE', '8e296a067a37563370ded05f5a3bf3ec_tazrin.JPG', 'Female', '1970-01-01'),
(26, '12-20114-1', 'Antu, Golam Rabbi', 3.62, '+880-1671953765', 'amit@ymail.com', '1234', 'CSE', '4e732ced3463d06de0ca9a15b6153677_amit.jpg', 'Male', '1990-01-25'),
(27, '12-20343-1', 'Sonchay, Khalid Hassan', 3.25, '+880-1677873564', 'sonchay@gmail.com', '1234', 'SE', '02e74f10e0327ad868d138f2b4fdd6f0_sonchoy.jpg', 'Male', '1970-01-01'),
(28, '12-20368-1', 'Toma, Tahmida Hedayet', 3.74, '+880-1746715666', 'toma@rocketmail.com', '1234', 'CSE', '33e75ff09dd601bbe69f351039152189_toma.jpg', 'Female', '1970-01-01'),
(31, '12-20381-1', 'Haque, Imran Atiqul', 3.13, '+880-1682635939', 'imran@outlook.com', '1234', 'CSE', 'c16a5320fa475530d9583c34fd356ef5_imran.jpg', 'Male', '1970-01-01'),
(32, '12-20478-1', 'Uddin Jumana Jashim', 3.23, '+880-1621534769', 'jumana@ymail.com', '1234', 'CSE', '6364d3f0f495b6ab9dcf8d3b5c6e0b01_jumana.JPG', 'Female', '1970-01-01'),
(33, '12-21119-1', 'Alam, Maskurul', 3.26, '01743912055', 'alam@hotmail.com', '1234', 'CSSE', 'default-user.png', 'Male', '0000-00-00'),
(35, '12-20520-1', 'Israt,Fahmida', 3.56, '+880-1723217411', 'panda@yahoo.com', '1234', 'CSSE', '1c383cd30b7c298ab50293adfecb7b18_pinkey.jpg', 'Female', '1970-01-01'),
(36, '12-20397-1', 'Abrita, Samiha Islam', 3.82, '+880-1515245238', 'abrita@outlook.com', '1234', 'CSE', '19ca14e7ea6328a42e0eb13d585e4c22_abrita.jpg', 'Female', '1970-01-01'),
(37, '12-21094-1', 'Abrar,Faheem', 3.98, '+880-1515253396', 'faheem@gmail.com', '1234', 'CSE', 'a5bfc9e07964f8dddeb95fc584cd965d_faheem.jpg', 'Male', '1970-01-01'),
(38, '12-21023-1', 'Abedin Md. Tahmidul', 3.78, '+880-1552380913', 'anik@ymail.com', '1234', 'CSE', 'a5771bce93e200c36f7cd9dfd0e5deaa_anik.jpg', 'Male', '1970-01-01'),
(39, '12-20142-1', 'Abedin, Md. Rashedul', 3.01, '+880-1673016974', 'rashedul@yahoo.com', '1234', 'CSE', 'd67d8ab4f4c10bf22aa353e27879133c_rashed.jpg', 'Male', '1970-01-01'),
(40, '12-20636-1', 'Faize, Md. Sadik', 3.27, '+880-1741341060', 'sadik@gmail.com', '1234', 'CSE', 'd645920e395fedad7bbbed0eca3fe2e0_sohan.jpg', 'Male', '1970-01-01'),
(41, '12-20781-1', 'Uddin, Md. Sadman Sakib', 3.68, '+880-1785439727', 'sadmansakib@demo.com', '1234', 'CSE', '3416a75f4cea9109507cacd8e2f2aefc_sadman_sakib.jpg', 'Male', '1992-09-15'),
(42, '12-20566-1', 'Mansur, Ryan', 3.59, '+880-1558354442', 'ryan@ymail.com', '1234', 'CSSE', 'default-user.png', 'Male', '0000-00-00'),
(43, '12-21122-1', 'Selim, Rayan', 3.42, '+880-1925479615', 'rselim@demo.com', '1234', 'CSSE', '17e62166fc8586dfa4d1bc0e1742c08b_rayan_selim.jpg', 'Male', '1992-02-26'),
(44, '12-20305-1', 'Khan, Sakib', 2.82, '+880-1736666712', 'sakibkhan@yahoo.com', '1234', 'CIS', 'f7177163c833dff4b38fc8d2872f1ec6_tanzim.jpg', 'Male', '1970-01-01'),
(45, '12-20609-1', 'Silvia, Israt Jahan', 3.43, '+880-1678942537', 'silvi@demo.com', '1234', 'CSSE', '6c8349cc7260ae62e3b1396831a8398f_silvia.jpg', 'Female', '1992-12-06'),
(46, '12-20310-1', 'Ahmad, Rafat', 3.59, '+880-1553264372', 'rafat@outlook.com', '1234', 'CSSE', 'd9d4f495e875a2e075a1a4a6e1b9770f_rafat.jpg', 'Male', '1970-01-01'),
(47, '12-20140-1', 'Islam Md. Zahidul', 3.22, '+880-1552479613', 'zahidul@rocketmail.com', '1234', 'SE', '67c6a1e7ce56d3d6fa748ab6d9af3fd7_zahid.jpg', 'Male', '1970-01-01'),
(48, '12-21020-1', 'Shanto mahmud Hossain', 3.47, '+880-1849396922', 'shanto@gmail.com', '1234', 'CSE', '642e92efb79421734881b53e1e1b18b6_shanto.jpg', 'Male', '1970-01-01'),
(49, '12-20731-1', 'Islam, Md Shadmanul', 3.9, '+880-1645967435', 'shadmanul@live.com', '1234', 'CSE', 'f457c545a9ded88f18ecee47145a72c0_shadmanul.jpg', 'Male', '1970-01-01'),
(50, '12-20721-1', 'Saha, Koushik', 3.77, '+880-1920859131', 'koushik@live.com', '1234', 'CSE', 'c0c7c76d30bd3dcaefc96f40275bdc0a_koushik.jpg', 'Male', '1970-01-01'),
(51, '12-21003-1', 'Islam, Tawhid Al ', 3.99, '+880-1622036696', 'tawhidvai@gmail.com', '1234', 'CSE', '2838023a778dfaecdc212708f721b788_Tawhid.jpg', 'Male', '1992-01-04'),
(52, '12-20981-1', 'Rahman, Sajidur', 3.96, '+880-1674242999', 'sajid_reznov9185@live.com', '1234', 'CSE', '9a1158154dfa42caddbd0694a4e9bdc8_sajid.jpg', 'Male', '1992-10-31'),
(53, '11-52486-1', 'Maher Mahmud Nishan', 2.75, '+880-1771588210', 'maheer@yahoo.com', '1234', 'CSSE', 'd82c8d1619ad8176d665453cfb2e55f0_maheer.jpg', 'Male', '1992-02-24'),
(54, '12-20502-1', 'Bonna, Jannatul Ferdous', 3.72, '+880-1765342899', 'bonna@yahoo.com', '1234', 'CSE', 'a684eceee76fc522773286a895bc8436_bonna.jpg', 'Female', '1992-07-26'),
(55, '12-20664-1', 'Keya, Rashika Tasnim', 3.62, '+880-1676119628', 'rashika_tasnim@yahoo.com', '1234', 'CSE', 'b53b3a3d6ab90ce0268229151c9bde11_keya.jpg', 'Female', '1992-05-18'),
(56, '12-21014-1', 'Haque, Sadiah', 3.66, '+880-1767696626', 'sadiah.norway93@gmail.com', '1234', 'CSE', '9f61408e3afb633e50cdf1b20de6f466_sadiah.jpg', 'Female', '1993-02-03'),
(57, '12-20173-1', 'Islam MD Saiful', 3.01, '+880-1534855629', 'shibly@demo.com', '1234', 'CSSE', '9f12377f24f19bcfc473616b46123dc6_shibly.jpg', 'Male', '1992-06-02'),
(59, '12-20203-1', 'Rahman, Faria', 3.32, '+880-1577999999', 'faria@demo.com', '1234', 'CSSE', '093f65e080a295f8076b1c5722a46aa2_faria.JPG', 'Female', '1993-05-05');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `t_id` int(11) NOT NULL COMMENT 'teacher id',
  `t_aiub_id` varchar(15) NOT NULL COMMENT 'teacher aiub id',
  `t_name` varchar(55) NOT NULL COMMENT 'teacher name',
  `t_pass` varchar(255) NOT NULL DEFAULT '1234' COMMENT 'teacher pass',
  `t_email` varchar(100) NOT NULL COMMENT 'teacher email',
  `t_phone` text NOT NULL COMMENT 'teacher phone',
  `t_gender` text NOT NULL COMMENT 'teacher gender',
  `t_dob` date NOT NULL COMMENT 'teacher date of birth',
  `t_image` varchar(255) NOT NULL DEFAULT 'default-user.png' COMMENT 'teacher image',
  `t_designation` varchar(255) NOT NULL DEFAULT 'Lecturer' COMMENT 'teacher designation'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`t_id`, `t_aiub_id`, `t_name`, `t_pass`, `t_email`, `t_phone`, `t_gender`, `t_dob`, `t_image`, `t_designation`) VALUES
(1, '1205-1318-2', 'Md. Al Imran', 'qQ1!', 'alimran@aiub.edu', '+880-9887935', 'Male', '1985-09-19', 'd24d2232c2bbe736063a48ef321f86cf_imran.jpg', 'Assistant Professor'),
(2, '1201-1280-2', 'Abdus Salam', '1234', 'salam.t2@aiub.edu', '+880-1764110526', 'Male', '1983-03-10', '05908ef1a6a58448946f23a3de3e9758_titu.jpg', 'Assistant Professor'),
(3, '0703-562-3', 'Saif Ahmed Rumi', '1234', 'rumi@aiub.edu', '+880-1725789456', 'Male', '1985-01-16', 'eccbc87e4b5ce2fe28308fd9f2a7baf3_rumi.jpeg', 'Facilty'),
(4, '0008-073-2', 'Mashiour Rahman', '1234', 'mashiour@yahoo.com', '+880-1658742367', 'Male', '1977-05-25', 'a87ff679a2f3e71d9181a67b7542122c_mashiour.jpg', ''),
(5, '1509-1664-3', 'Juena Ahmed Noshin', '1234', 'juena@aiub.edu', '+880-1685742648', 'Female', '1989-03-07', 'e4da3b7fbbce2345d7772b0674a318d5_juena.jpg', 'Instructor'),
(6, '1501-1572-2', 'Shovra Das', '1234', 'shovra.das@gmail.com', '+880-01715224583', 'Male', '1998-03-15', '1679091c5a880faf6fb5e6087eb1b2dc_shovra.jpg', 'Lecturer'),
(7, '0905-884-2', 'S.M. Abdur Rouf Bhuiyan', '1234', 'abdur_rouf@aiub.edu', '+880-1824753916', 'Male', '1976-07-08', '8f14e45fceea167a5a36dedd4bea2543_abdur_rouf.jpg', 'Lecturer'),
(8, '1301-1412-2', 'Bayzid Ashik Hossain', '1234', 'bayzid_ashik@aiub.edu', '+880-1798251436', 'Male', '1984-05-10', 'c9f0f895fb98ab9159f51fd0297e236d_Ashik.jpg', 'Assistant Professor'),
(9, '0507-416-2', 'Dr. Dip Nandi', '1234', 'dip@aiub.edu', '+880-1759729138', 'Male', '1980-09-08', '45c48cce2e2d7fbdea1afc51c7c6ad26_dip.jpg', 'Head, Undergraduate Program'),
(10, '0905-883-2', 'Nahar Sultana', '1234', 'nahar_sultana@aiub.edu', '+880-1853789641', 'Female', '1985-08-14', 'd3d9446802a44259755d38e6d163e820_nahar.jpg', 'Assistant Professor'),
(11, '1105-1220-2', 'Dr. Tabin Hasan', '1234', 'tabin@aiub.edu', '+880-1721727528', 'Male', '1977-10-13', '6512bd43d9caa6e02c990b0a82652dca_tabin.jpg', 'Head, Graduate Program'),
(15, '0509-431-2', 'Md. Manirul Islam', '1234', 'manir@aiub.edu', '+880-1852639874', 'Male', '1981-11-18', 'a83b3b84b4285cc0db3f96c110840d1a_monir.jpg', 'Assistant Professor'),
(16, '1109-1255-2', 'Asif Ur Rahman', '1234', 'asif@aiub.edu', '+880-1855999999', 'Male', '1986-06-11', 'c74d97b01eae257e44aa9d5bade97baf_asif.jpg', 'Assistant Professor');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_student_course`
--

CREATE TABLE `teacher_student_course` (
  `t_s_c_id` int(11) NOT NULL COMMENT 'id',
  `s_id` int(11) NOT NULL COMMENT 'student id',
  `t_id` int(11) NOT NULL COMMENT 'teacher id',
  `c_id` int(11) NOT NULL COMMENT 'course id'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_student_course`
--

INSERT INTO `teacher_student_course` (`t_s_c_id`, `s_id`, `t_id`, `c_id`) VALUES
(1, 3, 1, 1),
(2, 1, 1, 2),
(3, 2, 1, 2),
(4, 3, 1, 2),
(5, 4, 1, 2),
(43, 5, 1, 2),
(7, 6, 1, 2),
(8, 7, 1, 2),
(9, 8, 1, 2),
(10, 9, 1, 2),
(11, 10, 1, 2),
(12, 11, 1, 2),
(46, 55, 1, 2),
(14, 13, 1, 2),
(15, 14, 1, 2),
(16, 15, 1, 2),
(17, 16, 1, 2),
(48, 49, 1, 2),
(19, 18, 1, 2),
(20, 19, 1, 2),
(21, 20, 1, 2),
(50, 46, 1, 2),
(23, 22, 1, 2),
(24, 23, 1, 2),
(47, 56, 1, 2),
(26, 25, 1, 2),
(27, 26, 1, 2),
(28, 27, 1, 2),
(29, 28, 1, 2),
(45, 51, 1, 2),
(42, 54, 1, 2),
(32, 31, 1, 2),
(33, 32, 1, 2),
(44, 52, 1, 2),
(49, 50, 1, 2),
(36, 35, 1, 2),
(37, 36, 1, 2),
(38, 37, 1, 2),
(39, 38, 1, 2),
(40, 39, 1, 2),
(41, 40, 1, 2),
(59, 26, 2, 5),
(54, 52, 2, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendinfo`
--
ALTER TABLE `attendinfo`
  ADD PRIMARY KEY (`att_id`);

--
-- Indexes for table `authority`
--
ALTER TABLE `authority`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `course_student_marks`
--
ALTER TABLE `course_student_marks`
  ADD PRIMARY KEY (`c_s_m_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`inf_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `teacher_student_course`
--
ALTER TABLE `teacher_student_course`
  ADD PRIMARY KEY (`t_s_c_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendinfo`
--
ALTER TABLE `attendinfo`
  MODIFY `att_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'attendance id', AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `authority`
--
ALTER TABLE `authority`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'authority id', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'course id', AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `course_student_marks`
--
ALTER TABLE `course_student_marks`
  MODIFY `c_s_m_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'course student marks id', AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'department id', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'exam id', AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `inf_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'info id', AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'student id', AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'teacher id', AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `teacher_student_course`
--
ALTER TABLE `teacher_student_course`
  MODIFY `t_s_c_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=60;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
