CREATE DATABASE  IF NOT EXISTS `mindenapicpp` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `mindenapicpp`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: localhost    Database: mindenapicpp
-- ------------------------------------------------------
-- Server version	5.6.17

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `administrators`
--

DROP TABLE IF EXISTS `administrators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrators` (
  `id_member` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_member`),
  UNIQUE KEY `id_member` (`id_member`),
  CONSTRAINT `fk_admins_members` FOREIGN KEY (`id_member`) REFERENCES `members` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrators`
--

LOCK TABLES `administrators` WRITE;
/*!40000 ALTER TABLE `administrators` DISABLE KEYS */;
INSERT INTO `administrators` VALUES (2);
/*!40000 ALTER TABLE `administrators` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answers` (
  `id_question` int(11) NOT NULL,
  `correct` tinyint(1) NOT NULL,
  `date` date NOT NULL,
  `id_member` int(11) NOT NULL,
  PRIMARY KEY (`id_question`),
  KEY `fk_answers_users` (`id_member`),
  CONSTRAINT `fk_answers_questions` FOREIGN KEY (`id_question`) REFERENCES `questions` (`id_question`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_answers_users` FOREIGN KEY (`id_member`) REFERENCES `users` (`id_member`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answers`
--

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT INTO `answers` VALUES (469,1,'2014-12-19',5),(471,0,'2014-12-19',3),(472,0,'2014-12-19',3),(473,1,'2014-12-19',5),(474,1,'2014-10-24',5),(476,1,'2014-12-19',5),(479,0,'2014-12-19',3),(480,0,'2014-12-19',3),(483,0,'2014-12-19',3),(485,1,'2014-10-24',5),(487,0,'2014-12-19',3),(488,0,'2014-10-24',3),(493,0,'2014-10-24',3),(494,0,'2014-10-24',3),(495,0,'2014-12-19',3),(497,0,'2014-11-15',3),(498,1,'2014-10-24',5),(501,0,'2014-02-05',3),(502,1,'2014-12-19',5),(504,1,'2014-12-19',5),(506,0,'2014-12-19',3),(509,0,'2014-12-19',3),(513,1,'2014-12-19',5);
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `members` (
  `id_member` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `forename` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `passwd` char(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_member`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (2,'admin1','Birks','Tomas','e03794cf02f33dfd603a37822f95ac8d'),(3,'14415166','Istvan','Pista','88b99a31b05979c97d92e2ca41227470'),(5,'16671188','Muhamed','Asef','abdb0687d8a3ae519fafb670323d3d89');
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
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
) ENGINE=InnoDB AUTO_INCREMENT=517 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (467,'Num. 1: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','közepes'),(468,'Num. 2: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','nehéz'),(469,'Num. 3: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','közepes'),(470,'Num. 4: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','nehéz'),(471,'Num. 5: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','közepes'),(472,'Num. 6: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','nehéz'),(473,'Num. 7: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','közepes'),(474,'Num. 8: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','nehéz'),(475,'Num. 9: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','közepes'),(476,'Num. 10: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','nehéz'),(477,'Num. 11: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','közepes'),(478,'Num. 12: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','nehéz'),(479,'Num. 13: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','közepes'),(480,'Num. 14: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','nehéz'),(481,'Num. 15: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','közepes'),(482,'Num. 16: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','nehéz'),(483,'Num. 17: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','közepes'),(484,'Num. 18: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','nehéz'),(485,'Num. 19: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','közepes'),(486,'Num. 20: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','nehéz'),(487,'Num. 21: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','közepes'),(488,'Num. 22: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','nehéz'),(489,'Num. 23: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','közepes'),(490,'Num. 24: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','nehéz'),(491,'Num. 25: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','közepes'),(492,'Num. 26: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','nehéz'),(493,'Num. 27: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','közepes'),(494,'Num. 28: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','nehéz'),(495,'Num. 29: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','közepes'),(496,'Num. 30: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','nehéz'),(497,'Num. 31: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','közepes'),(498,'Num. 32: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','nehéz'),(499,'Num. 33: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','közepes'),(500,'Num. 34: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','nehéz'),(501,'Num. 35: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','közepes'),(502,'Num. 36: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','nehéz'),(503,'Num. 37: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','közepes'),(504,'Num. 38: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','nehéz'),(505,'Num. 39: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','közepes'),(506,'Num. 40: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','nehéz'),(507,'Num. 41: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','közepes'),(508,'Num. 42: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','nehéz'),(509,'Num. 43: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','közepes'),(510,'Num. 44: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','nehéz'),(511,'Num. 45: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','közepes'),(512,'Num. 46: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','nehéz'),(513,'Num. 47: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','közepes'),(514,'Num. 48: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','nehéz'),(515,'Num. 49: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','közepes'),(516,'Num. 50: Ez egy nagyon hosszú kérdés, nem igaz? Szerintem nagyon is!','Valasz1','Valasz2','Valasz3','Valasz4','Helyes valasz','nehéz');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id_member` int(11) NOT NULL DEFAULT '0',
  `index_number` char(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_member`),
  UNIQUE KEY `id_member` (`id_member`),
  CONSTRAINT `fk_users_members` FOREIGN KEY (`id_member`) REFERENCES `members` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (3,'14415166'),(5,'16671188');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-12-19 21:02:27
