-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2014 at 07:29 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mindenapicpp`
--
CREATE DATABASE IF NOT EXISTS mindenapicpp CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE mindenapicpp;

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id_question` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `correct` tinyint(1) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id_question`,`id_user`),
  KEY `fk_answers_users` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `professors`
--

CREATE TABLE IF NOT EXISTS `professors` (
  `id_prof` int(11) NOT NULL AUTO_INCREMENT,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `passwd` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_prof`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `professors`
--

INSERT INTO `professors` (`id_prof`, `username`, `passwd`) VALUES
(1, 'tanar1', '2aa7c19a47257704b6453b590a1ff235');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id_question` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `answer_1` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `answer_2` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `answer_3` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `answer_4` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `correct_answer` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_question`),
  UNIQUE KEY `id_question` (`id_question`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id_question`, `question`, `answer_1`, `answer_2`, `answer_3`, `answer_4`, `correct_answer`) VALUES
(1, 'Hány éves vagy?', '21', '25', '45', '22', '21'),
(2, 'Hol élsz?', 'Szerbia', 'USA', 'Magyarország', 'Franciaország', 'Szerbia'),
(3, 'Mi a foglalkozásod?', 'Informatikus', 'Tanító', 'Pap', 'Szerelő', 'Informatikus'),
(22, 'Legjobb zenekar a világon?', 'Pójásbabák', 'Zentai Kisdisznyók', 'Maláj vadmalacok', 'Spártai hermafroditák', 'Maláj vadmalacok');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `forename` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `index_number` int(11) NOT NULL,
  `passwd` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `forename`, `surname`, `index_number`, `passwd`) VALUES
(1, '', 'John', 122121122, '2aa7c19a47257704b6453b590a1ff235'),
(2, 'Doe', 'John', 122121122, '2aa7c19a47257704b6453b590a1ff235'),
(3, 'Doe', 'John', 122121122, '2aa7c19a47257704b6453b590a1ff235'),
(4, '', '', 0, 'f31cb2f082c4b3ce5ac3faee325ed437');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `fk_answers_questions` FOREIGN KEY (`id_question`) REFERENCES `questions` (`id_question`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_answers_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
