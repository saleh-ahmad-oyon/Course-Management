-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2016 at 11:09 PM
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
(60, 0, 61, 2),
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
(59, 0, 26, 5),
(61, 0, 7, 14),
(62, 0, 19, 14),
(63, 0, 25, 14),
(64, 0, 28, 14),
(65, 0, 32, 14),
(66, 0, 35, 14),
(67, 0, 36, 14),
(68, 0, 45, 14),
(69, 0, 54, 14),
(70, 0, 55, 14),
(71, 0, 56, 14),
(72, 0, 59, 14),
(73, 0, 61, 14);

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
(14, 'Advanced Computer Networks', 15),
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
(60, 2, 61, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
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
(59, 5, 26, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(61, 14, 7, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(62, 14, 19, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(63, 14, 25, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(64, 14, 28, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(65, 14, 32, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(66, 14, 35, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(67, 14, 36, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(68, 14, 45, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(69, 14, 54, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(70, 14, 55, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(71, 14, 56, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(72, 14, 59, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0),
(73, 14, 61, 0, 0, 0, 'FAIL', 'FAIL', 'FAIL', 0, 0);

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
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` bigint(20) NOT NULL,
  `filepath` text NOT NULL,
  `coursename` text NOT NULL,
  `t_aiub_id` varchar(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `file_size` text,
  `file_type` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `s_dob` date DEFAULT NULL COMMENT 'student date of birth',
  `s_small_image` text COMMENT 'Student''s Image Icon',
  `img_contents` text COMMENT 'Contents of Image'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `s_aiub_id`, `s_full_name`, `s_cgpa`, `s_phone`, `s_email`, `s_pass`, `s_dept`, `s_image`, `s_gender`, `s_dob`, `s_small_image`, `img_contents`) VALUES
(1, '12-20167-1', 'Rahman Sadikur', 3.5, '+880-1680091207', 'shawon@gmail.com', '1234', 'CSE', '579a4220454d89e8abbbf56ce2413c98504c25ab8bd90.jpg', 'Male', '1992-03-09', '579a422056e849e8abbbf56ce2413c98504c25ab8bd90_s.jpg', '03ecd52da2acd0eb0324503697d64705'),
(2, '12-20107-1', 'Rafi, M.H', 3.62, '+880-1677649964', 'rafi@yahoo.com', '1234', 'CSE', '57713695a7c0a139c4e89cdbedaf144d05ca54a12a57b.jpg', 'Male', '1970-01-01', '57713695b8aa0139c4e89cdbedaf144d05ca54a12a57b_s.jpg', 'ca341f43abefb24195e120f8370530f1'),
(3, '12-20235-1', 'Ahmad, Saleh', 3.85, '+880-1626785569', 'salehoyon@hotmail.com', 'qQ1!', 'CSE', '5792566e7f759836c6d8e155de751a497359d07af41d8.jpg', 'Male', '1991-08-13', '5792566e912e2836c6d8e155de751a497359d07af41d8_s.jpg', 'ba72a8685a27103d435ceb224c6051c6'),
(4, '12-20115-1', 'Roy, Pallob Kanti', 3.25, '+880-1912165908', 'pallab@ymail.com', '1234', 'CSSE', '577136cd2f578d5e323ab460b1453ead64258b2db5456.jpg', 'Male', '1970-01-01', '577136cd3f5dfd5e323ab460b1453ead64258b2db5456_s.jpg', '13ea350062fd64fe9fb73ef475879b60'),
(5, '12-20120-1', 'Ayon, Arif Ahmed', 3.56, '+880-1677377003', 'ayon@rocketmail.com', '1234', 'CSSE', '577136fe25c65bf1191c6a98bf41c2d389f63ac0875d8.jpg', 'Male', '1992-09-04', '577136fe364a0bf1191c6a98bf41c2d389f63ac0875d8_s.jpg', '139baf433c3bf3f32fc207569ffe0c98'),
(6, '12-20124-1', 'Alam, Nesar Ul', 3.41, '+880-1676756794', 'nesarul@gmail.com', '1234', 'CSSE', '579210fde9598ed967dc0d46a43c8a629b3d7a7900f97.jpg', 'Male', '1992-10-09', '579210fdf3c2ded967dc0d46a43c8a629b3d7a7900f97_s.jpg', '5ee71722a78d62888b9ad0129cfeb5f1'),
(7, '12-20130-1', 'Faria, Tabassum Mehnaz', 3.63, '+880-1686780827', 'faria@live.com', '1234', 'CSE', '577159b2558e2d73f24d5090d7e2a4b2944c2b35dd2ec.jpg', 'Female', '1970-01-01', '577159b26f5dfd73f24d5090d7e2a4b2944c2b35dd2ec_s.jpg', '49b7fc9e672e1d93592feb15a6c73b77'),
(8, '12-20137-1', 'Mahmood, Asif', 3.11, '+880-1682702757', 'asif@hotmail.com', '1234', 'CSE', '57924fa34f7b5ce0b996aa0b7d64169a4b8ffeaf878c5.jpg', 'Male', '1970-01-01', '57924fa35ed7fce0b996aa0b7d64169a4b8ffeaf878c5_s.jpg', '7eb67a4f752c207cd943ae2e3c9d335b'),
(9, '12-21032-1', 'Mimo, Minhaj Mohammad', 3.25, '+880-1711086599', 'mimo@outlook.com', '1234', 'CSSE', '57715ac439bd6f14cb5cf13c016653d8b6ab54def62bb.jpg', 'Male', '1992-06-09', '57715ac44114bf14cb5cf13c016653d8b6ab54def62bb_s.jpg', '305b9fe1398cade11efb2bb709bb8d06'),
(10, '12-20138-1', 'Bhuiyan, Md, Maksudul Haque', 3.53, '+880-1671038362', 'turja@hotmail.com', '1234', 'CSSE', '5792604d1fa57aea513a578e865592f8526c31dc4c8f2.jpg', 'Male', '1970-09-28', '5792604d269b1aea513a578e865592f8526c31dc4c8f2_s.jpg', '37010faf280fc0b043902afe787ce4b9'),
(11, '12-20146-1', 'Amin, Mohammad Shafayet Bin', 3.47, '+880-1824954504', 'safayet@yahoo.com', '1234', 'CSSE', '57715ba829a9f01be8a917c000d33096c806452d3dd5c.jpg', 'Male', '1970-01-01', '57715ba834adf01be8a917c000d33096c806452d3dd5c_s.jpg', 'f681b1118a3376f6d9e686f52ae7fc46'),
(12, '12-20151-1', 'Junayed, A.S.M', 3.05, '+880-1671821613', 'junayed@live.com', '1234', 'CSE', '57715e8c61945ccffef9a609ab819e954c7e635737575.jpg', 'Male', '1970-01-01', '57715e8c66f9fccffef9a609ab819e954c7e635737575_s.jpg', '53311779f74a0490c96add8524009754'),
(13, '12-20158-1', 'Ahmed, Md. Isteak', 3.49, '+880-1675179712', 'isti@hotmail.com', '1234', 'CSE', '57715f3820635dd1d360bdd4eb57e39b525694b2002fc.jpg', 'Male', '1992-02-16', '57715f382c3aedd1d360bdd4eb57e39b525694b2002fc_s.jpg', 'e4a533af3baceee153809d40b12ae012'),
(14, '12-20111-1', 'Ahmed Rejwan', 3.6, '+880-1831174312', 'rejwan@hotmail.com', '1234', 'CSSE', '57715f9adf4219cb4f7236550186017690a1cf0441af9.jpg', 'Male', '1992-10-09', '57715f9ae5d279cb4f7236550186017690a1cf0441af9_s.jpg', '25f4c80ae52d636414a7fc657c88a8af'),
(15, '12-20172-1', 'Islam, Ayon Dipto', 3.32, '+880-1675641830', 'auyon@yahoo.com', '1234', 'CSE', '57716017d7700bb33fbefa810181900fd65c7c728c7c4.jpg', 'Male', '1992-10-29', '57716017e6eadbb33fbefa810181900fd65c7c728c7c4_s.jpg', 'c9c12176e443ccab74565efe71237572'),
(16, '12-20229-1', 'Parag, Kutubuddin Jalal', 3.12, '+880-1676163313', 'parag@ymail.com', '1234', 'CSE', '577160c0ba316a07d50fa47e3cfcad2a166929d680b45.jpg', 'Male', '1970-01-01', '577160c0bfbe6a07d50fa47e3cfcad2a166929d680b45_s.jpg', '3f7bec062f3a93d133125f96d0664103'),
(60, '12-21206-1', 'Rahit, Tahsin Hasan', 3.89, '+880-1918393864', 'tahsin.rahit@gmail.com', '1234', 'CSE', '57925bac3db0fc213cc15cf6db58aa1bea005db652506.jpg', 'Male', '1992-02-04', '57925bac4b70ac213cc15cf6db58aa1bea005db652506_s.jpg', '64ab6c900a4f821714c6a0784ccc1c35'),
(18, '12-20245-1', 'Banna, Sazid Hossain', 3.21, '+880-1715342366', 'cryingbanna@live.com', '1234', 'CSE', '5792584dc2796f79cf696bf8d18631c0c22ac40fc9db0.jpg', 'Male', '1992-08-30', '5792584dd5966f79cf696bf8d18631c0c22ac40fc9db0_s.jpg', '1e83334c10952e7d6935e74aab159b03'),
(19, '12-20497-1', 'Roy, Nirbachita', 3.8, '+880-1730078219', 'nirba@live.com', '1234', 'CSE', '579f775d9ea82e7efbb8fd5987b779e242498c2a576cb.jpg', 'Female', '1992-05-26', '579f775da704ce7efbb8fd5987b779e242498c2a576cb_s.jpg', '3a0f933232812358018cad077fd5ade2'),
(20, '12-20261-1', 'Hassan, Mahir Faisal', 2.95, '+880-1670281289', 'mahir@gmail.com', '1234', 'CSE', '577559db2df47307b9b5e9a0ecd6437ddd389eb1c7396.jpg', 'Male', '1992-04-07', '577559db3584b307b9b5e9a0ecd6437ddd389eb1c7396_s.jpg', 'd786865d543da14870e95f7c5277aee9'),
(21, '12-20332-1', 'Sajid Mohammad', 3.25, '01732761556', 'sajid@rocketmail.com', '1234', 'CSE', 'default-user.png', 'Male', '0000-00-00', 'default-user.png', NULL),
(22, '12-20335-1', 'Lasker, Md. Naim', 3.46, '+880-1680641959', 'lasker@yahoo.com', '1234', 'CSE', '579a4206601ba918391e674d90a3975b02f6f7112a966.jpg', 'Male', '1970-01-01', '579a42067319a918391e674d90a3975b02f6f7112a966_s.jpg', '33b1fec5561bc76d5a16d7530fe2369f'),
(23, '12-20337-1', 'Khan, A.K.M Shakuruzzaman', 3.51, '+880-1676608440', 'ashik@rocketmail.com', '1234', 'CSE', '57755d21bb97e665f216444d0235a567667bad2c09e11.jpg', 'Male', '1970-01-01', '57755d21bef18665f216444d0235a567667bad2c09e11_s.jpg', '381115f455587a956ce9139dd70208ab'),
(25, '12-20342-1', 'Tazrin, Fahmida', 3.32, '+880-1745269873', 'tazrin@ymail.com', '1234', 'CSE', '57a4ac6c968bddff7755e04cf09af620d7843966700cc.jpg', 'Female', '1970-01-01', '57a4ac6ca5492dff7755e04cf09af620d7843966700cc_s.jpg', 'bc39f472b2f9462dceae58e9053dbcf6'),
(26, '12-20114-1', 'Antu, Golam Rabbi', 3.62, '+880-1671953765', 'amit@ymail.com', '1234', 'CSE', '579f77435b9550cb1eb413b8f7cee17701a37a1d74dc3.jpg', 'Male', '1990-01-25', '579f774373a7a0cb1eb413b8f7cee17701a37a1d74dc3_s.jpg', '0fc90e8e80a426ec14a37bf087d57cf7'),
(27, '12-20343-1', 'Sonchay, Khalid Hassan', 3.25, '+880-1677873564', 'sonchay@gmail.com', '1234', 'SE', '5775602cd297fcdaca809dea127b2b0bc47885cd873a8.jpg', 'Male', '1992-01-23', '5775602cd55cecdaca809dea127b2b0bc47885cd873a8_s.jpg', '4d8bdba950b96a8722c6779c9b9b4ba3'),
(28, '12-20368-1', 'Toma, Tahmida Hedayet', 3.74, '+880-1746715666', 'toma@rocketmail.com', '1234', 'CSE', '57a3fcc79de3b07c496dfeb287bd74f5492265b641f4a.jpg', 'Female', '1970-01-01', '57a3fcc7b203c07c496dfeb287bd74f5492265b641f4a_s.jpg', '7c0f2c2ffd0f73ef09bb5291e7c9fa63'),
(31, '12-20381-1', 'Haque, Imran Atiqul', 3.13, '+880-1682635939', 'imran@outlook.com', '1234', 'CSE', '57756192d986ce18fdc9fa7cc2b5f4e497d21a48ea3b7.jpg', 'Male', '1992-09-10', '57756192e8ba9e18fdc9fa7cc2b5f4e497d21a48ea3b7_s.jpg', 'c37a966a2bc77bb33603ba6ff45673fe'),
(32, '12-20478-1', 'Uddin Jumana Jashim', 3.23, '+880-1621534769', 'jumana@ymail.com', '1234', 'CSE', '577561e03f291af0d77249097a4290431f0f53b404fd1.JPG', 'Female', '1992-12-19', '577561e0466efaf0d77249097a4290431f0f53b404fd1_s.JPG', '63e87daea31cd3787b0386a880cfc999'),
(33, '12-21119-1', 'Alam, Maskurul', 3.26, '01743912055', 'alam@hotmail.com', '1234', 'CSSE', 'default-user.png', 'Male', '0000-00-00', 'default-user.png', NULL),
(35, '12-20520-1', 'Israt,Fahmida', 3.56, '+880-1723217411', 'panda@yahoo.com', '1234', 'CSSE', '5792572f0edd47937d96549a7d1d9dcc3cd2c32012359.jpg', 'Female', '1970-01-01', '5792572f1e6b97937d96549a7d1d9dcc3cd2c32012359_s.jpg', 'ebeeee9dbcac731a1fc66b788043e232'),
(36, '12-20397-1', 'Abrita, Samiha Islam', 3.82, '+880-1515245238', 'abrita@outlook.com', '1234', 'CSE', '579aeeeaaebb2bb765fc55854865465e9c47602650fbb.jpg', 'Female', '1993-12-21', '579aeeeac3949bb765fc55854865465e9c47602650fbb_s.jpg', 'e7e017cc0da5a2921ecf967883597472'),
(37, '12-21094-1', 'Abrar,Faheem', 3.98, '+880-1515253396', 'faheem@gmail.com', '1234', 'CSE', '5797773e2a9ef6fda7c0b9ba6148a2191ed93d1da83eb.jpg', 'Male', '1992-08-05', '5797773e37b746fda7c0b9ba6148a2191ed93d1da83eb_s.jpg', '2bcb9c45ef58485d2cdaa7b869c7a0e1'),
(38, '12-21023-1', 'Abedin Md. Tahmidul', 3.78, '+880-1552380913', 'anik@ymail.com', '1234', 'CSE', '5775683f05e6ef2bb10a6e6d5f76cb2d660333079e612.jpg', 'Male', '1991-01-07', '5775683f0da77f2bb10a6e6d5f76cb2d660333079e612_s.jpg', '17a1a073ea3fca7a14711f38bb956053'),
(39, '12-20142-1', 'Abedin, Md. Rashedul', 3.01, '+880-1673016974', 'rashedul@yahoo.com', '1234', 'CSE', '57924cbdb5db5b60c306f62fbc07820dd607b17968aa2.jpg', 'Male', '1992-11-23', '57924cbdc5e3fb60c306f62fbc07820dd607b17968aa2_s.jpg', '768769e1006f3d6c6347689831026bf9'),
(40, '12-20636-1', 'Faize, Md. Sadik', 3.27, '+880-1741341060', 'sadik@gmail.com', '1234', 'CSE', '57a4ecf076231829e4a4a102526021855e3744bd8a86f.jpg', 'Male', '1992-02-06', '57a4ecf09b696829e4a4a102526021855e3744bd8a86f_s.jpg', '69e57318fa58a984a4b9bd5bf13a0c6b'),
(41, '12-20781-1', 'Uddin, Md. Sadman Sakib', 3.68, '+880-1785439727', 'sadmansakib@demo.com', '1234', 'CSE', '5793b5d91b7e1ade6b779f11c95490a4a394532f351f6.jpg', 'Male', '1992-09-15', '5793b5d922303ade6b779f11c95490a4a394532f351f6_s.jpg', '752e99663c0e09989dcb0249259fd829'),
(42, '12-20566-1', 'Mansur, Ryan', 3.59, '+880-1558354442', 'ryan@ymail.com', '1234', 'CSSE', 'default-user.png', 'Male', '0000-00-00', 'default-user.png', NULL),
(43, '12-21122-1', 'Selim, Rayan', 3.42, '+880-1925479615', 'rselim@demo.com', '1234', 'CSSE', '57756e71daf5aa12e1320abb3ef856c1b3adaa9b42afa.jpg', 'Male', '1992-02-26', '57756e71de0e1a12e1320abb3ef856c1b3adaa9b42afa_s.jpg', '827ec053c0a086c53d0c68aa9c293733'),
(44, '12-20305-1', 'Khan, Sakib', 2.82, '+880-1736666712', 'sakibkhan@yahoo.com', '1234', 'CIS', '579255357f40bc3fc84a6af668418fbcfb9d53a7082e8.jpg', 'Male', '1992-08-18', '579255358a8d1c3fc84a6af668418fbcfb9d53a7082e8_s.jpg', '7ad071906ae12e997de53e32058d09ae'),
(45, '12-20609-1', 'Silvia, Israt Jahan', 3.43, '+880-1678942537', 'silvi@demo.com', '1234', 'CSSE', '579242666e908e5cb7c411f1d9a67f68deff4a954cfbc.jpg', 'Female', '1992-12-06', '5792426680009e5cb7c411f1d9a67f68deff4a954cfbc_s.jpg', '990c316d19237b48114b1e7f17f51c2d'),
(46, '12-20310-1', 'Ahmad, Rafat', 3.59, '+880-1553264372', 'rafat@outlook.com', '1234', 'CSSE', '579ad8ccbd7e25f7ab7be33e41e402f071939b3e83f68.jpg', 'Male', '1970-01-01', '579ad8ccc45385f7ab7be33e41e402f071939b3e83f68_s.jpg', '934f6573bdaa488bca4c64bc5cce9c9e'),
(47, '12-20140-1', 'Islam Md. Zahidul', 3.22, '+880-01534895975', 'zahidul@rocketmail.com', '1234', 'SE', '57756d60a4b54c651148415ab2a260e6c506075c12ae3.jpg', 'Male', '1992-03-25', '57756d60b959bc651148415ab2a260e6c506075c12ae3_s.jpg', '0c73afde40918c876208a12bc6abd079'),
(48, '12-21020-1', 'Shanto mahmud Hossain', 3.47, '+880-1849396922', 'shanto@gmail.com', '1234', 'CSE', '57756c942a5985a461a9593e0176a09259e0f0d8b6cf0.jpg', 'Male', '1992-08-26', '57756c942e3135a461a9593e0176a09259e0f0d8b6cf0_s.jpg', '90c06aeafa974eb80129f84d45ff1227'),
(49, '12-20731-1', 'Islam, Md Shadmanul', 3.9, '+880-1645967435', 'shadmanul@live.com', '1234', 'CSE', '579ada97b9675a60a4676b99c41cb51970dfddc627ad3.jpg', 'Male', '1992-09-07', '579ada97c2889a60a4676b99c41cb51970dfddc627ad3_s.jpg', '9a501686f667868607df5afd1ffe2665'),
(50, '12-20721-1', 'Saha, Koushik', 3.77, '+880-1920859131', 'koushik@live.com', '1234', 'CSE', '579776c3d8c533d4d3ebee2b218ef51213ce379954e49.jpg', 'Male', '1970-01-01', '579776c3eb9fb3d4d3ebee2b218ef51213ce379954e49_s.jpg', 'db9bc6fc2ceed4af56412cc18f536ac9'),
(51, '12-21003-1', 'Islam, Tawhid Al ', 3.99, '+880-1622036696', 'tawhidvai@gmail.com', '1234', 'CSE', '57756b8569cf10fd7c651213a2c1a9df4d64849c01f42.jpg', 'Male', '1992-01-04', '57756b8579c480fd7c651213a2c1a9df4d64849c01f42_s.jpg', '8d120ddadadd8a8b8ae8b995355fea8d'),
(52, '12-20981-1', 'Rahman, Sajidur', 3.96, '+880-1674242999', 'sajid_reznov9185@live.com', '1234', 'CSE', '57756ae25b5ae30220cfd902d347400efcfef5ca9d655.jpg', 'Male', '1992-10-31', '57756ae26034e30220cfd902d347400efcfef5ca9d655_s.jpg', '98a8048c03a63f601f581b66e1de17af'),
(53, '11-52486-1', 'Maher Mahmud Nishan', 2.75, '+880-1771588210', 'maheer@yahoo.com', '1234', 'CSSE', '57756abeb26717aeadf973997ba1067038c2d321ba53f.jpg', 'Male', '1992-02-24', '57756abec24797aeadf973997ba1067038c2d321ba53f_s.jpg', '81fc9b5d747e53c9a4b9261dab2c141f'),
(54, '12-20502-1', 'Bonna, Jannatul Ferdous', 3.72, '+880-1765342899', 'bonna@yahoo.com', '1234', 'CSE', '57965bdc4134fb24592cc69da9202d878f9a84fbd5433.jpg', 'Female', '1992-07-26', '57965bdc57789b24592cc69da9202d878f9a84fbd5433_s.jpg', 'fb0e4617164ae793244f11b2d2f235b4'),
(55, '12-20664-1', 'Keya, Rashika Tasnim', 3.62, '+880-1676119628', 'rashika_tasnim@yahoo.com', '1234', 'CSE', '57965aebcaa0774378b19b736af202de0a80ec489697e.jpg', 'Female', '1992-05-18', '57965aebe635274378b19b736af202de0a80ec489697e_s.jpg', 'c49b8a35abf5c174fff59efe60de7073'),
(56, '12-21014-1', 'Haque, Sadiah', 3.66, '+880-1767696626', 'sadiah.norway93@gmail.com', '1234', 'CSE', '5798ddeec0638b41543b565840ea8a8ad07553b7fb71e.jpg', 'Female', '1993-02-03', '5798ddeed1d9ab41543b565840ea8a8ad07553b7fb71e_s.jpg', 'e9242729c441ea0cae967f7d8b0aa78c'),
(57, '12-20173-1', 'Islam MD Saiful', 3.01, '+880-1534855629', 'shibly@demo.com', '1234', 'CSSE', '579add7708254ab4aeaa942ee13cb7b09b6b7a2720032.jpg', 'Male', '1992-06-02', '579add771044aab4aeaa942ee13cb7b09b6b7a2720032_s.jpg', '6e43666180ae1765754a5ef3bfe8a1ae'),
(59, '12-20203-1', 'Rahman, Faria', 3.32, '+880-1577999999', 'faria@demo.com', '1234', 'CSSE', '579ad8ee31306da7ad486c8381d290e558fe285c95d21.jpg', 'Female', '1993-05-05', '579ad8ee3e93fda7ad486c8381d290e558fe285c95d21_s.jpg', '31a46bd2f0af6be33235674a43b92f07'),
(61, '11-19711-3', 'Das, Prianka', 3.35, '+880-1625959674', 'pria@aiub.com', '1234', 'CSE', '5792168a92e88bcd9d47c0e8413b2cdc186247e7d8957.jpg', 'Female', '1992-02-14', '5792168aa5ca8bcd9d47c0e8413b2cdc186247e7d8957_s.jpg', '8a273f05825cb29cc6c4952fff31a4ad'),
(62, '12-21131-1', 'Hasan, Mehedi', 3.42, '+880-1552639741', 'shakil@aiub.com', '1234', 'CSSE', '579b85edf1011a34b806b5d680cd45e301503fcdb1888.jpg', 'Male', '1992-12-20', '579b85ee0f39fa34b806b5d680cd45e301503fcdb1888_s.jpg', 'd1d7d2fa0addb574593ed58892ed9c94'),
(63, '12-00000-1', 'Faruque Farzana', 2.78, '+880-1789526341', 'farzana@yahoo.com', '1234', 'SE', '579b8a46c3895495e32a105a1bd8f9971b2b0ecc1a2e2.jpg', 'Female', '1993-01-01', '579b8a46d5d77495e32a105a1bd8f9971b2b0ecc1a2e2_s.jpg', 'fe9fc2f3125299550c8538af2bbf5630'),
(64, '12-21461-2', 'Rashid, Rezwana', 3.83, '+880-01725000111', 'rezwana@janina.com', '1234', 'CSE', '57c9e95c8d76cbc69c09f24254311194dd59db27b0761.jpg', 'Female', '1993-03-23', '57c9e95cb09b5bc69c09f24254311194dd59db27b0761_s.jpg', 'd4ea494d39e55fe21c7e169eca84e46a');

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
  `t_gender` text COMMENT 'teacher gender',
  `t_dob` date NOT NULL COMMENT 'teacher date of birth',
  `t_image` varchar(255) NOT NULL DEFAULT 'default-user.png' COMMENT 'teacher image',
  `t_designation` varchar(255) NOT NULL DEFAULT 'Lecturer' COMMENT 'teacher designation',
  `img_contents` text COMMENT 'Teacher''s profile Picture''s Contents',
  `t_small_image` text COMMENT 'Teacher''s Image Icon'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`t_id`, `t_aiub_id`, `t_name`, `t_pass`, `t_email`, `t_phone`, `t_gender`, `t_dob`, `t_image`, `t_designation`, `img_contents`, `t_small_image`) VALUES
(1, '1205-1318-2', 'Md. Al Imran', 'qQ1!', 'alimran@aiub.edu', '+880-9887935', 'Male', '1985-09-19', '577638078df91e18fdc9fa7cc2b5f4e497d21a48ea3b7.jpg', 'Assistant Professor', '5d889ab23b7952c90c62916e6ac779d9', '57763807a7670e18fdc9fa7cc2b5f4e497d21a48ea3b7_s.jpg'),
(2, '1201-1280-2', 'Abdus Salam', '1234', 'salam.t2@aiub.edu', '+880-1764110526', 'Male', '1983-03-10', '57763970e8ca4a257a91001c2575f1989948a5c923e3c.jpg', 'Assistant Professor', 'cfcb07bf9ab319418c85bd6422d82e1c', '57763970effefa257a91001c2575f1989948a5c923e3c_s.jpg'),
(3, '0703-562-3', 'Saif Ahmed Rumi', '1234', 'rumi@aiub.edu', '+880-1725789456', 'Male', '1985-01-16', '57763a459d7641fd116d96d5c4bdc86f7d8cf7ae8273a.jpeg', 'Faculty', '23c10e305f652c64999b79111071b2b8', '57763a45a72791fd116d96d5c4bdc86f7d8cf7ae8273a_s.jpeg'),
(4, '0008-073-2', 'Mashiour Rahman', '1234', 'mashiour@yahoo.com', '+880-1658742367', 'Male', '1977-05-25', '57763cc244eb34c9828d8e53f353fed5b70036abe7998.jpg', 'Director', '56a47725f76ac018065d7779e6159c9b', '57763cc2482664c9828d8e53f353fed5b70036abe7998_s.jpg'),
(5, '1509-1664-3', 'Juena Ahmed Noshin', '1234', 'juena@aiub.edu', '+880-1685742648', 'Female', '1989-03-07', '57763d8ca23afd629680324147f071c70342d05dbfa13.jpg', 'Instructor', 'bd653e1f4aecc3f3f4f9b9e49ee672ea', '57763d8cab77cd629680324147f071c70342d05dbfa13_s.jpg'),
(6, '1501-1572-2', 'Shovra Das', '1234', 'shovra.das@gmail.com', '+880-01715224583', 'Male', '1998-03-15', '57763dc78826c8e323ddc18a85f0a03b94690e10a37d8.jpg', 'Lecturer', 'f796e2ff064edcc9da66434db9b15627', '57763dc78f5768e323ddc18a85f0a03b94690e10a37d8_s.jpg'),
(7, '0905-884-2', 'S.M. Abdur Rouf Bhuiyan', '1234', 'abdur_rouf@aiub.edu', '+880-1824753916', 'Male', '1976-07-08', '57763def2abae55a8d8e0ce4d37a1fdf3cc195fc7a828.jpg', 'Lecturer', '688fdb24d758fac1ee12c1d40e17c525', '57763def2d5a355a8d8e0ce4d37a1fdf3cc195fc7a828_s.jpg'),
(8, '1301-1412-2', 'Bayzid Ashik Hossain', '1234', 'bayzid_ashik@aiub.edu', '+880-1798251436', 'Male', '1984-05-10', '57763e154ed625d14ea490947742c1cb25953b42e4fc5.jpg', 'Assistant Professor', '90e6dff066e144fe522d85988a552e3c', '57763e1550eeb5d14ea490947742c1cb25953b42e4fc5_s.jpg'),
(9, '0507-416-2', 'Dr. Dip Nandi', '1234', 'dip@aiub.edu', '+880-1759729138', 'Male', '1980-09-08', '57763e4108f64ffad3509caa0d87832f811f0f8d211f8.jpg', 'Head, Undergraduate Program', 'aab5b491c71d5fab22be72b58c3ce72e', '57763e410e4d0ffad3509caa0d87832f811f0f8d211f8_s.jpg'),
(10, '0905-883-2', 'Nahar Sultana', '1234', 'nahar_sultana@aiub.edu', '+880-1853789641', 'Female', '1985-08-14', '57763e66e7a8d68927ffd86e3a7ef0d69d346c20ae655.jpg', 'Assistant Professor', 'f42efacd056071647383ff6bde1bb4d9', '57763e66e938068927ffd86e3a7ef0d69d346c20ae655_s.jpg'),
(11, '1105-1220-2', 'Dr. Tabin Hasan', '1234', 'tabin@aiub.edu', '+880-1721727528', 'Male', '1977-10-13', '57763eabb95bc1c8295db010ee1dea3c987e764354712.jpg', 'Head, Graduate Program', 'df89b54da2293c783958a0284cb10fb7', '57763eabbebbd1c8295db010ee1dea3c987e764354712_s.jpg'),
(15, '0509-431-2', 'Md. Manirul Islam', '1234', 'manir@aiub.edu', '+880-1852639874', 'Male', '1981-11-18', '57763ecd769ef1ff3ccc659687049ed49add3ce12f01f.jpg', 'Assistant Professor', 'd9e4e6197ad61449d9154ad1081b38d7', '57763ecd799b61ff3ccc659687049ed49add3ce12f01f_s.jpg'),
(16, '1109-1255-2', 'Asif Ur Rahman', '1234', 'asif@aiub.edu', '+880-1855999999', 'Male', '1986-06-11', '57763ef3be59fce0b996aa0b7d64169a4b8ffeaf878c5.jpg', 'Assistant Professor', '2de27dc8dec9d1b42b01eb6a48461b69', '57763ef3c23bcce0b996aa0b7d64169a4b8ffeaf878c5_s.jpg'),
(18, '0909-931-2', 'Abhijit Bhowmik', '1234', 'ovi775@gmail.com', '+880-1725698741', 'Male', '1982-01-01', '579b8594c65279aa0610aabc1a5579bf5330e8f13d271.jpg', 'Assistant Professor', 'eb9c89a07ade6b0c5d6ba3aa990ef7f9', '579b8594cc2799aa0610aabc1a5579bf5330e8f13d271_s.jpg');

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
(60, 61, 1, 2),
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
(54, 52, 2, 5),
(61, 7, 15, 14),
(62, 19, 15, 14),
(63, 25, 15, 14),
(64, 28, 15, 14),
(65, 32, 15, 14),
(66, 35, 15, 14),
(67, 36, 15, 14),
(68, 45, 15, 14),
(69, 54, 15, 14),
(70, 55, 15, 14),
(71, 56, 15, 14),
(72, 59, 15, 14),
(73, 61, 15, 14);

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
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `att_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'attendance id', AUTO_INCREMENT=74;
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
  MODIFY `c_s_m_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'course student marks id', AUTO_INCREMENT=74;
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
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `inf_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'info id', AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'student id', AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'teacher id', AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `teacher_student_course`
--
ALTER TABLE `teacher_student_course`
  MODIFY `t_s_c_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id', AUTO_INCREMENT=74;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
