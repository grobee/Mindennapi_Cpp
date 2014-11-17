-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2014 at 11:28 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE IF NOT EXISTS `administrators` (
  `id_member` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_member`),
  UNIQUE KEY `id_member` (`id_member`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`id_member`) VALUES
(2);

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id_question` int(11) NOT NULL,
  `correct` tinyint(1) NOT NULL,
  `date` date NOT NULL,
  `id_member` int(11) NOT NULL,
  PRIMARY KEY (`id_question`),
  KEY `fk_answers_users` (`id_member`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id_member` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `forename` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `passwd` char(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_member`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id_member`, `username`, `forename`, `surname`, `passwd`) VALUES
(2, 'admin1', 'Birks', 'Tomas', 'e03794cf02f33dfd603a37822f95ac8d'),
(3, '14415166', 'Istvan', 'Pista', '88b99a31b05979c97d92e2ca41227470'),
(5, '16671188', 'Muhamed', 'Asef', 'abdb0687d8a3ae519fafb670323d3d89');

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
  `difficulty` enum('easy','medium','hard') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_question`),
  UNIQUE KEY `id_question` (`id_question`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id_question`, `question`, `answer_1`, `answer_2`, `answer_3`, `answer_4`, `correct_answer`, `difficulty`) VALUES
(1, 'Hány éves vagy?', '21', '25', '45', '22', '21', 'easy'),
(2, 'Hol élsz?', 'Szerbia', 'USA', 'Magyarország', 'Franciaország', 'Szerbia', 'easy'),
(3, 'Mi a foglalkozásod?', 'Informatikus', 'Tanító', 'Pap', 'Szerelő', 'Informatikus', 'easy'),
(22, 'Legjobb zenekar a világon?', 'Pójásbabák', 'Zentai Kisdisznyók', 'Maláj vadmalacok', 'Spártai hermafroditák', 'Maláj vadmalacok', 'easy'),
(23, 'Ez', 'Egy', 'Nehézség', 'Teszt', 'Kérdés', 'Kérdés', 'medium'),
(24, 'Ez', 'Mégegy', 'Nehezség', 'Kérdés', 'Lesz', 'Mégegy', 'hard');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_member` int(11) NOT NULL DEFAULT '0',
  `index_number` char(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_member`),
  UNIQUE KEY `id_member` (`id_member`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_member`, `index_number`) VALUES
(3, '14415166'),
(5, '16671188');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrators`
--
ALTER TABLE `administrators`
  ADD CONSTRAINT `fk_admins_members` FOREIGN KEY (`id_member`) REFERENCES `members` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `fk_answers_users` FOREIGN KEY (`id_member`) REFERENCES `users` (`id_member`),
  ADD CONSTRAINT `fk_answers_questions` FOREIGN KEY (`id_question`) REFERENCES `questions` (`id_question`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_members` FOREIGN KEY (`id_member`) REFERENCES `members` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
