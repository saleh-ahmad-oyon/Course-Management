-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2016 at 08:39 AM
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
(2, 2, 1, 2),
(3, 1, 2, 2),
(4, 2, 3, 2),
(5, 1, 4, 2),
(43, 2, 5, 2),
(7, 2, 6, 2),
(8, 2, 7, 2),
(9, 2, 8, 2),
(10, 2, 9, 2),
(11, 2, 10, 2),
(12, 2, 11, 2),
(46, 2, 55, 2),
(14, 2, 13, 2),
(15, 2, 14, 2),
(16, 2, 15, 2),
(17, 1, 16, 2),
(18, 2, 17, 2),
(19, 2, 18, 2),
(20, 2, 19, 2),
(21, 2, 20, 2),
(22, 2, 21, 2),
(23, 2, 22, 2),
(24, 2, 23, 2),
(25, 2, 24, 2),
(26, 1, 25, 2),
(27, 2, 26, 2),
(28, 1, 27, 2),
(29, 2, 28, 2),
(45, 2, 51, 2),
(42, 2, 54, 2),
(32, 2, 31, 2),
(33, 2, 32, 2),
(44, 2, 52, 2),
(35, 2, 34, 2),
(36, 2, 35, 2),
(37, 2, 36, 2),
(38, 2, 37, 2),
(39, 2, 38, 2),
(40, 2, 39, 2),
(41, 2, 40, 2);

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
(1, 'ADVANCED TOPICS IN PROGRAMMING II', 1),
(2, 'WEB TECHNOLOGIES', 1),
(3, 'DATA STRUCTURE', 1),
(4, 'DATA WAREHOUSING AND DATA MINING', 2),
(5, 'ALGORITHMS', 2),
(6, 'ARTIFICIAL INTELLIGENCE AND EXPERT SYSTEM', 2),
(7, 'OBJECT ORIENTED PROGRAMMING 2', 3),
(8, 'PROGRAMMING LANGUAGE 2', 3),
(9, 'ADVANCED TOPICS IN PROGRAMMING I', 3);

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
(18, 2, 17, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(19, 2, 18, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(20, 2, 19, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(21, 2, 20, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(22, 2, 21, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(23, 2, 22, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(24, 2, 23, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(25, 2, 24, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(26, 2, 25, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(27, 2, 26, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(28, 2, 27, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(29, 2, 28, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(45, 2, 51, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(42, 2, 54, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(32, 2, 31, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(33, 2, 32, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(44, 2, 52, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(35, 2, 34, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(36, 2, 35, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(37, 2, 36, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(38, 2, 37, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(39, 2, 38, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(40, 2, 39, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(41, 2, 40, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0);

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
(5, 'quiz1', '2016-05-20 09:45:46', 20, 3, 1);

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
  `s_cgpa` float NOT NULL COMMENT 'student cgpa',
  `s_phone` varchar(20) NOT NULL COMMENT 'student phone',
  `s_email` varchar(55) NOT NULL COMMENT 'student email',
  `s_pass` varchar(255) NOT NULL DEFAULT '1234' COMMENT 'student password',
  `s_dept` varchar(10) NOT NULL COMMENT 'student department',
  `s_image` text NOT NULL COMMENT 'student image',
  `s_gender` varchar(10) NOT NULL COMMENT 'student gender',
  `s_dob` date NOT NULL COMMENT 'student date of birth'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `s_aiub_id`, `s_full_name`, `s_cgpa`, `s_phone`, `s_email`, `s_pass`, `s_dept`, `s_image`, `s_gender`, `s_dob`) VALUES
(1, '12-20167-1', 'Rahman Sadikur', 3.5, '01680091207', 'shawon@gmail.com', '1234', 'CSE', 'shawon.jpg', 'Male', '0000-00-00'),
(2, '12-20107-1', 'Rafi, M.H', 3.62, '01677649964', 'rafi@yahoo.com', '1234', 'CSE', 'rafi.jpg', 'Male', '0000-00-00'),
(3, '12-20235-1', 'Ahmad, Saleh', 3.85, '+880-1626785569', 'salehoyon@hotmail.com', 'qQ1!', 'CSE', 'oyon.jpg', 'Male', '1991-08-13'),
(4, '12-20115-1', 'Roy, Pallob Kanti', 3.25, '01912165908', 'pallab@ymail.com', '1234', 'CSSE', 'Pallob.jpg', 'Male', '0000-00-00'),
(5, '12-20120-1', 'Ayon, Arif Ahmed', 3.56, '01677377003', 'ayon@rocketmail.com', '1234', 'CSSE', 'Ayon.jpg', 'Male', '0000-00-00'),
(6, '12-20124-1', 'Alam, Nesar Ul', 3.41, '01676756794', 'nesarul@gmail.com', '1234', 'CSSE', 'Nesar.jpg', 'Male', '0000-00-00'),
(7, '12-20130-1', 'Faria, Tabassum Mehnaz', 3.63, '01625784593', 'faria@live.com', '1234', 'CSE', 'Faria.jpg', 'Female', '0000-00-00'),
(8, '12-20137-1', 'Mahmood, Asif', 3.11, '01682702757', 'asif@hotmail.com', '1234', 'CSE', 'Asif.jpg', 'Male', '0000-00-00'),
(9, '12-21032-1', 'Mimo, Minhaj Mohammad', 3.25, '+880-1711086599', 'mimo@outlook.com', '1234', 'CSSE', 'mimo.jpg', 'Male', '1992-06-09'),
(10, '12-20138-1', 'Bhuiyan, Md, Maksudul Haque', 3.53, '01671038362', 'turja@hotmail.com', '1234', 'CSSE', 'Turja.jpg', 'Male', '0000-00-00'),
(11, '12-20146-1', 'Amin, Mohammad Shafayet Bin', 3.47, '01824954504', 'safayet@yahoo.com', '1234', 'CSSE', 'Shafayet.jpg', 'Male', '0000-00-00'),
(12, '12-20151-1', 'Junayed, A.S.M', 3.05, '01671821613', 'junayed@live.com', '1234', 'CSE', 'default-user.png', 'Male', '0000-00-00'),
(13, '12-20158-1', 'Ahmed, Md. Isteak', 3.49, '01675179712', 'isti@hotmail.com', '1234', 'CSE', 'isteak.jpg', 'Male', '0000-00-00'),
(14, '12-20111-1', 'Ahmed Rejwan', 3.6, '01831174312', 'rejwan@hotmail.com', '1234', 'CSSE', 'Rejwan.jpg', 'Male', '0000-00-00'),
(15, '12-20172-1', 'Islam, Ayon Dipto', 3.32, '01675641830', 'auyon@yahoo.com', '1234', 'CSE', 'auyon.jpg', 'Male', '0000-00-00'),
(16, '12-20229-1', 'Parag, Kutubuddin Jalal', 3.12, '01676163313', 'parag@ymail.com', '1234', 'CSE', 'default-user.png', 'Male', '0000-00-00'),
(17, '12-20232-1', 'Mosharaf, Khaled', 2.81, '01915699339', 'khaled@live.com', '1234', 'CSE', 'default-user.png', 'Male', '0000-00-00'),
(18, '12-20245-1', 'Banna, Sazid Hossain', 3.21, '+880-1715342366', 'cryingbanna@live.com', '1234', 'CSE', 'banna.jpg', 'Male', '1992-08-30'),
(19, '12-20497-1', 'Roy, Nirbachita', 3.8, '+880-1730078219', 'nirba@live.com', '1234', 'CSE', 'nirbachita.jpg', 'Female', '0000-00-00'),
(20, '12-20261-1', 'Hassan, Mahir Faisal', 2.95, '01670281289', 'mahir@gmail.com', '1234', 'CSE', 'default-user.png', 'Male', '0000-00-00'),
(21, '12-20332-1', 'Sajid Mohammad', 3.25, '01732761556', 'sajid@rocketmail.com', '1234', 'CSE', 'default-user.png', 'Male', '0000-00-00'),
(22, '12-20335-1', 'Lasker, Md. Naim', 3.46, '01680641959', 'lasker@yahoo.com', '1234', 'CSE', 'naim.jpg', 'Male', '0000-00-00'),
(23, '12-20337-1', 'Khan, A.K.M Shakuruzzaman', 3.51, '01676608440', 'ashik@rocketmail.com', '1234', 'CSE', 'ashik.jpg', 'Male', '0000-00-00'),
(24, '12-20339-1', 'Islam, Md, Rashedul', 2.87, '01676044694', 'rislam@gmail.com', '1234', 'CSSE', 'default-user.png', 'Male', '0000-00-00'),
(25, '12-20342-1', 'Tazrin, Fahmida', 3.32, '01745269873', 'tazrin@ymail.com', '1234', 'CSE', 'tazrin.JPG', 'Female', '0000-00-00'),
(26, '12-20114-1', 'Antu, Golam Rabbi', 3.62, '+880-1671953765', 'amit@ymail.com', '1234', 'CSE', 'amit.jpg', 'Male', '1990-01-25'),
(27, '12-20343-1', 'Sonchay, Khalid Hassan', 3.25, '01677873564', 'sonchay@gmail.com', '1234', 'SE', 'sonchoy.jpg', 'Male', '0000-00-00'),
(28, '12-20368-1', 'Toma, Tahmida Hedayet', 3.74, '+880-1746715666', 'toma@rocketmail.com', '1234', 'CSE', 'toma.jpg', 'Female', '0000-00-00'),
(29, '12-20369-1', 'Nirjhor, Junayed Ahnaf', 2.42, '01710498712', 'nirjhor@gmail.com', '1234', 'CSSE', 'default-user.png', 'Male', '0000-00-00'),
(30, '12-20373-1', 'Chowdhury, Ali Ashraf', 2.93, '01680267283', 'ali@yahoo.com', '1234', 'CSE', 'default-user.png', 'Male', '0000-00-00'),
(31, '12-20381-1', 'Haque, Imran Atiqul', 3.13, '01682635939', 'imran@outlook.com', '1234', 'CSE', 'imran.jpg', 'Male', '0000-00-00'),
(32, '12-20478-1', 'Uddin Jumana Jashim', 3.23, '+880-1621534769', 'jumana@ymail.com', '1234', 'CSE', 'jumana.JPG', 'Female', '0000-00-00'),
(33, '12-21119-1', 'Alam, Maskurul', 3.26, '01743912055', 'alam@hotmail.com', '1234', 'CSSE', 'default-user.png', 'Male', '0000-00-00'),
(34, '12-21130-1', 'Hasan, Mehedi', 2.78, '+880-1710975078', 'mehedi@rocketmail.com', '1234', 'CSE', 'default-user.png', 'Male', '0000-00-00'),
(35, '12-20520-1', 'Israt,Fahmida', 3.56, '+880-1723217411', 'panda@yahoo.com', '1234', 'CSSE', 'pinkey.jpg', 'Female', '0000-00-00'),
(36, '12-20397-1', 'Abrita, Samiha Islam', 3.82, '+880-1515245238', 'abrita@outlook.com', '1234', 'CSE', 'abrita.jpg', 'Female', '0000-00-00'),
(37, '12-21094-1', 'Abrar,Faheem', 3.98, '+880-1515253396', 'faheem@gmail.com', '1234', 'CSE', 'faheem.jpg', 'Male', '0000-00-00'),
(38, '12-21023-1', 'Abedin Md. Tahmidul', 3.78, '+880-1552380913', 'anik@ymail.com', '1234', 'CSE', 'anik.jpg', 'Male', '0000-00-00'),
(39, '12-20142-1', 'Abedin, Md. Rashedul', 3.01, '+880-1673016974', 'rashedul@yahoo.com', '1234', 'CSE', 'rashed.jpg', 'Male', '0000-00-00'),
(40, '12-20636-1', 'Faize, Md. Sadik', 3.27, '+880-1741341060', 'sadik@gmail.com', '1234', 'CSE', 'sohan.jpg', 'Male', '0000-00-00'),
(41, '12-20781-1', 'Uddin, Md. Sadman Sakib', 3.68, '01785439727', 'sadmansakib@ymail.com', '1234', 'CSE', 'default-user.png', 'Male', '0000-00-00'),
(42, '12-20566-1', 'Mansur, Ryan', 3.59, '+880-1558354442', 'ryan@ymail.com', '1234', 'CSSE', 'default-user.png', 'Male', '0000-00-00'),
(43, '12-21122-1', 'Selim, Rayan', 3.42, '01925479615', 'rselim@live.com', '1234', 'CSSE', 'default-user.png', 'Male', '0000-00-00'),
(44, '12-20305-1', 'Khan, Sakib', 2.82, '+880-1736666712', 'sakibkhan@yahoo.com', '1234', 'CIS', 'tanzim.jpg', 'Male', '0000-00-00'),
(45, '12-20609-1', 'Silvia, Israt Jahan', 3.43, '01678942537', 'silvi@gmail.com', '1234', 'CSSE', 'default-user.png', 'Female', '0000-00-00'),
(46, '12-20310-1', 'Ahmad, Rafat', 3.59, '+880-1553264372', 'rafat@outlook.com', '1234', 'CSSE', 'rafat.jpg', 'Male', '0000-00-00'),
(47, '12-20140-1', 'Islam Md. Zahidul', 3.22, '01552479613', 'zahidul@rocketmail.com', '1234', 'SE', 'zahid.jpg', 'Male', '0000-00-00'),
(48, '12-21020-1', 'Shanto mahmud Hossain', 3.47, '+880-1849396922', 'shanto@gmail.com', '1234', 'CSE', 'shanto.jpg', 'Male', '0000-00-00'),
(49, '12-20731-1', 'Islam, Md Shadmanul', 3.9, '01645967435', 'shadmanul@live.com', '1234', 'CSE', 'shadmanul.jpg', 'Male', '0000-00-00'),
(50, '12-20721-1', 'Saha, Koushik', 3.77, '+880-1920859131', 'koushik@live.com', '1234', 'CSE', 'koushik.jpg', 'Male', '0000-00-00'),
(51, '12-21003-1', 'Islam, Tawhid Al ', 3.99, '+880-1622036696', 'tawhidvai@gmail.com', '1234', 'CSE', 'Tawhid.jpg', 'Male', '1992-01-04'),
(52, '12-20981-1', 'Rahman, Sajidur', 3.96, '+8801674242999', 'sajid_reznov9185@live.com', '1234', 'CSE', 'sajid.jpg', 'Male', '1992-10-31'),
(53, '11-52486-1', 'Maher Mahmud Nishan', 2.75, '+880-1771588210', 'maheer@yahoo.com', '1234', 'CSSE', 'maheer.jpg', 'Male', '1992-02-24'),
(54, '12-20502-1', 'Bonna, Jannatul Ferdous', 3.72, '+880-1765342899', 'bonna@yahoo.com', '1234', 'CSE', 'bonna.jpg', 'Female', '1992-07-26'),
(55, '12-20664-1', 'Keya, rashika Tasnim', 3.62, '+880-1676119628', 'rashika_tasnim@yahoo.com', '1234', 'CSE', 'keya.jpg', 'Female', '1992-05-18');

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
(1, '1234-1234-2', 'MD. AL IMRAN', 'qQ1!', 'alimran@aiub.edu', '+880-9887935', 'Male', '1985-09-19', 'imran.jpg', 'Assistant Professor'),
(2, '5678-5678-2', 'ABDUS SALAM', '1234', '', '', 'Male', '0000-00-00', 'default-user.png', ''),
(3, '1501-2358-2', 'SAIF AHMED RUMI', '1234', '', '', 'Male', '0000-00-00', 'default-user.png', ''),
(4, '4785-4785-2', 'Mashiour Rahman', '1234', 'mashiour@yahoo.com', '+880-1658742367', 'Male', '1980-05-25', 'default-user.png', ''),
(5, '7412-7412-2', 'Juena Ahmed Noshin', '1234', 'juena@aiub.edu', '+880-1685742648', 'Female', '1989-03-07', 'juena.jpg', 'Instructor');

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
(18, 17, 1, 2),
(19, 18, 1, 2),
(20, 19, 1, 2),
(21, 20, 1, 2),
(22, 21, 1, 2),
(23, 22, 1, 2),
(24, 23, 1, 2),
(25, 24, 1, 2),
(26, 25, 1, 2),
(27, 26, 1, 2),
(28, 27, 1, 2),
(29, 28, 1, 2),
(45, 51, 1, 2),
(42, 54, 1, 2),
(32, 31, 1, 2),
(33, 32, 1, 2),
(44, 52, 1, 2),
(35, 34, 1, 2),
(36, 35, 1, 2),
(37, 36, 1, 2),
(38, 37, 1, 2),
(39, 38, 1, 2),
(40, 39, 1, 2),
(41, 40, 1, 2);

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
  MODIFY `att_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'attendance id', AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `authority`
--
ALTER TABLE `authority`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'authority id', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'course id', AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `course_student_marks`
--
ALTER TABLE `course_student_marks`
  MODIFY `c_s_m_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'course student marks id', AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'department id', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'exam id', AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `inf_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'info id', AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'student id', AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'teacher id', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `teacher_student_course`
--
ALTER TABLE `teacher_student_course`
  MODIFY `t_s_c_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=47;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
