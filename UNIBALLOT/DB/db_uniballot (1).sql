-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 31, 2023 at 03:54 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_uniballot`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL auto_increment,
  `adm_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  PRIMARY KEY  (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `adm_name`, `admin_email`, `admin_password`) VALUES
(7, 'principal', 'principal@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assignelectionteacher`
--

CREATE TABLE `tbl_assignelectionteacher` (
  `assignelectionteacher_id` int(11) NOT NULL auto_increment,
  `teacher_id` int(11) NOT NULL,
  `election_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  PRIMARY KEY  (`assignelectionteacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_assignelectionteacher`
--

INSERT INTO `tbl_assignelectionteacher` (`assignelectionteacher_id`, `teacher_id`, `election_id`, `batch_id`) VALUES
(1, 5, 4, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_batch`
--

CREATE TABLE `tbl_batch` (
  `department_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL auto_increment,
  `batch_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`batch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_batch`
--

INSERT INTO `tbl_batch` (`department_id`, `batch_id`, `batch_name`) VALUES
(1, 7, '1st year'),
(2, 8, '2nd year');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `department_id` int(11) NOT NULL auto_increment,
  `department_name` varchar(50) NOT NULL,
  PRIMARY KEY  (`department_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`department_id`, `department_name`) VALUES
(1, 'bca'),
(2, 'bcom'),
(4, 'bttm'),
(5, 'bvoc');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_election`
--

CREATE TABLE `tbl_election` (
  `election_id` int(11) NOT NULL auto_increment,
  `election_details` varchar(100) NOT NULL,
  `election_name` varchar(50) NOT NULL,
  `election_declareddate` date NOT NULL,
  `election_date` date NOT NULL,
  `election_time` time NOT NULL,
  PRIMARY KEY  (`election_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_election`
--

INSERT INTO `tbl_election` (`election_id`, `election_details`, `election_name`, `election_declareddate`, `election_date`, `election_time`) VALUES
(1, 'knscsbcxnc', 'gaagag', '0000-00-00', '2023-11-11', '12:00:00'),
(2, 'jssjsjsjjs', 'hshshsh', '2023-08-30', '2023-11-11', '12:00:00'),
(3, 'hello', 'hai', '2023-08-31', '2023-11-10', '12:00:01'),
(4, 'hello', 'hai', '2023-08-31', '2023-11-12', '12:00:08'),
(5, 'hello', 'hai', '2023-08-31', '2023-11-10', '12:00:10'),
(6, 'hello', 'nooporam', '2023-08-31', '2023-01-10', '11:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_electionteacher`
--

CREATE TABLE `tbl_electionteacher` (
  `electionteacher_id` int(11) NOT NULL auto_increment,
  `electionteacher_name` varchar(50) NOT NULL,
  `electionteacher_email` varchar(50) NOT NULL,
  `electionteacher_password` varchar(50) NOT NULL,
  `electionteacher_proof` varchar(50) NOT NULL,
  `electionteacher_photo` varchar(500) NOT NULL,
  `electionteacher_contact` varchar(15) NOT NULL,
  PRIMARY KEY  (`electionteacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_electionteacher`
--

INSERT INTO `tbl_electionteacher` (`electionteacher_id`, `electionteacher_name`, `electionteacher_email`, `electionteacher_password`, `electionteacher_proof`, `electionteacher_photo`, `electionteacher_contact`) VALUES
(4, 'eldees', 'eldees@gmail.com', 'eldees@123', '6544', '', '0'),
(5, 'eldees', 'nandhu@gmail.com', 'eldees@123', '', '', '6544'),
(6, 'nandu', 'nandhu@gmail.com', 'eldees@123', 'level1.sdr', 'level2.sdr', '534546'),
(7, 'modi', 'modi@gmail.com', 'usa', 'VOTEIFY-20230816T044326Z-001.zip', 'wp6728034-narendra-modi-wallpapers.jpg', '2147483647'),
(8, 'kim', 'kim@gmail.com', '123', 'sdvp_pdf_export.exe.6hthve4.partial', 'Kim_Jong-un_April_2019_(cropped).jpg', '2147483647'),
(9, 'yadu', 'yadu@gmail.com', 'yadu', 'Actor-Nandamuri-Balakrishna-NBK107-Movie-First-Loo', 'Kim_Jong-un_April_2019_(cropped).jpg', '9446872501');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL auto_increment,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_admissionno` varchar(50) NOT NULL,
  `batch_id` int(50) NOT NULL,
  `user_photo` varchar(50) NOT NULL,
  `user_rollno` int(11) NOT NULL,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email`, `user_password`, `user_admissionno`, `batch_id`, `user_photo`, `user_rollno`) VALUES
(1, 'eldeeee', 'eldees@gmail.com', 'ssdsf', 'sa4463', 7, 'level3.sdr', 27),
(2, 'nandu', 'nandhu@gmail.com', 'nandu123', 'sa4463', 7, 'level1.sdr', 35),
(3, '', '', '', '', 0, '', 0),
(4, 'nazeel', 'nazeel@gmail.com', 'nazell@123', 'sa4431', 0, 'Kim_Jong-un_April_2019_(cropped).jpg', 36),
(5, 'eappenkoshi', 'eappen@gmail.com', '1234', 'sa4255', 7, 'Kim_Jong-un_April_2019_(cropped).jpg', 26);
