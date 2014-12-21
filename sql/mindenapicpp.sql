-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2014 at 04:48 PM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `generateDummyAnswers`()
BEGIN
	DECLARE num_of_data INT DEFAULT 25;
    DECLARE counter INT DEFAULT 1;
    DECLARE member INT DEFAULT 3;
    DECLARE correctness TINYINT(1) DEFAULT 0;
    DECLARE rand_quest_id INT;
    DECLARE min INT;
    DECLARE max INT;
    
    WHILE counter <= num_of_data DO
		SET min = (SELECT MIN(id_question) FROM questions);
        SET max = (SELECT MAX(id_question) FROM questions);
		SET rand_quest_id = ROUND(RAND() * (max - min)) + min;
    
		IF MOD(counter,2) = 0 THEN
			SET member = 5;
            SET correctness = 1;
		ELSE
			SET member = 3;
            SET correctness = 0;
        END IF;
    
		INSERT INTO answers(id_question, correct, date, id_member)
        VALUES (rand_quest_id, correctness, '2014-10-24', member);    
        
        SET counter = counter + 1;
    END WHILE;    
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `generateDummyQuestions`()
BEGIN
	DECLARE num_of_data INT DEFAULT 50;
    DECLARE counter INT DEFAULT 1;
    DECLARE var_diff VARCHAR(75) DEFAULT "közepes";
    
    WHILE counter <= num_of_data DO
		IF MOD(counter,2) = 0 THEN
			SET var_diff = "nehéz";
		ELSE
			SET var_diff = "közepes";
        END IF;
    
		INSERT INTO questions(question, answer_1, answer_2, answer_3, answer_4, correct_answer, difficulty) 
        VALUES (CONCAT("Num. ", counter, ": ", "Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!"), "Valasz1", "Valasz2", "Valasz3", "Valasz4", "Helyes valasz", var_diff);    
        
        SET counter = counter + 1;
    END WHILE;    
END$$

DELIMITER ;

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
  PRIMARY KEY (`id_question`,`id_member`,`date`),
  KEY `fk_answers_members` (`id_member`)
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
  `difficulty` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'könnyű',
  PRIMARY KEY (`id_question`),
  UNIQUE KEY `id_question` (`id_question`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=522 ;

--
-- Dumping data for table `questions`
--
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
  ADD CONSTRAINT `fk_answers_questions` FOREIGN KEY (`id_question`) REFERENCES `questions` (`id_question`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_answers_members` FOREIGN KEY (`id_member`) REFERENCES `users` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_members` FOREIGN KEY (`id_member`) REFERENCES `members` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
