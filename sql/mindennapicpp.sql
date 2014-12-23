CREATE DATABASE  IF NOT EXISTS `cdb_0928836329` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `cdb_0928836329`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: eu-cdbr-azure-west-b.cloudapp.net    Database: cdb_0928836329
-- ------------------------------------------------------
-- Server version	5.5.40-log

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
INSERT INTO `administrators` VALUES (21),(41),(51);
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
  PRIMARY KEY (`id_question`,`id_member`,`date`),
  KEY `fk_answers_members` (`id_member`),
  CONSTRAINT `fk_answers_questions` FOREIGN KEY (`id_question`) REFERENCES `questions` (`id_question`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_answers_members` FOREIGN KEY (`id_member`) REFERENCES `users` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answers`
--

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT INTO `answers` VALUES (551,0,'2014-12-21',11),(551,1,'2014-12-22',11),(661,1,'2014-12-23',11),(691,1,'2014-12-23',11),(721,0,'2014-12-23',3),(721,1,'2014-12-23',11);
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
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (2,'admin1','Birks','Tomas','e03794cf02f33dfd603a37822f95ac8d'),(3,'14415166','Istvan','Pista','88b99a31b05979c97d92e2ca41227470'),(5,'16671188','Muhamed','Asef','abdb0687d8a3ae519fafb670323d3d89'),(11,'12214193','Labadi','Henrik','df3e2afeda1b7580b4ed4ed2cac5774e'),(21,'hlabadi','Labadi','Henrik','9e88bd2a6daccb74c6150834fc6f7c65'),(41,'grobi','Gulyás','Róbert','43e30ff62baae846ea2b88c58ec1d77d'),(51,'grobert','Robert','Gulyas','2d53ec692278fa1836b822184e510bf3');
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
  `question` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `answer_1` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `answer_2` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `answer_3` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `answer_4` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `correct_answer` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `difficulty` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'könnyű',
  `number` int(11) NOT NULL,
  PRIMARY KEY (`id_question`),
  UNIQUE KEY `id_question` (`id_question`)
) ENGINE=InnoDB AUTO_INCREMENT=741 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (551,'void main(){\r\n    int i = 0;\r\n    if((13 + 1) / 2) {\r\n        if(13 > 5)\r\n            i+=5;\r\n        else\r\n            i++;\r\n    } else\r\n        i+=2;\r\n	  cout<<i;\r\n}','4','5','4.0','5.0','5','közepes',1),(561,'void main (){\r\n    int i;\r\n    for (i = 0; i < 25; i++)\r\n       ;\r\ncout<<i;\r\n}','23','24','25','26','25','könnyű',5),(571,'void main(){\r\n    int i = 0;\r\n    int P = 1;\r\n\r\n    while (i++ < 5 && P)\r\n        if (i % 2 == 5 % 3)\r\n            P = !P;\r\n        else\r\n            i++;\r\ncout<<i;\r\n}','6','7.0','6.0','7','7','könnyű',2),(581,'void main(){\r\n    int i = -1;\r\n    int j = 8;\r\n    \r\n    if ( j > 5 && j < 10)\r\n        if ( j <= 7)\r\n            i = j * 8;\r\n        else\r\n            i = j + 8;\r\n    else\r\n     if ( j > 3)\r\n            i = j / 8;\r\n        else\r\n            i = j - 8;\r\n   cout<<i;\r\n}','16','18','22','32','16','könnyű',4),(591,'void main(){\r\n    int i = 0;\r\n    int S = 0;\r\n    while (i < 6) {\r\n        if (i % 2) {\r\n            i += 2;\r\n            S += 2 * i;\r\n        } else if (i < 3) {\r\n            i += 3;\r\n            S += 3 * i;\r\n        } else {\r\n            i++;\r\n            S += i;\r\n        }\r\n    }	\r\n	 	cout<<S;\r\n}','24','33','27','21','33','könnyű',3),(601,'void main (){\r\n    int i = 0;\r\n    int s = 9;\r\n    \r\n    for (; i < s; i++)\r\n        s -= i;\r\ncout<<s;\r\n}','6','5','4','3','4','könnyű',6),(611,'void main (){\r\n int i, j;\r\n for (i = 0, j = 12; i < j; i++, j--);\r\n		cout<<i;\r\n	}','6','5','4','3','6','könnyű',7),(621,'void main (){\r\n    int i, j, res = 0;\r\n    \r\n   for (j = 0, i = 8; j <= 8; j++,i--)\r\n        res = (i == j) ? i : res;\r\n		cout<<res;\r\n\r\n\r\n}','6','5','4','3','4','könnyű',8),(631,'void main (){\r\nint i, j;\r\n\r\nfor (i = 1, j = 0; j <= 8; i +=2,j++);\r\ncout<<i;\r\n}','8','15','19','24','19','könnyű',9),(641,'void main (){\r\n  int i, j, S = 0;\r\n    \r\n  for (i = j = 1; i < 6; i ++, j *= 2)\r\n        S += j;\r\n	      cout<<S;\r\n\r\n}','20','21','30','31','31','könnyű',10),(651,'void main (){\r\n    int values[10] = {0, 1, 2, 3, 4, 5, 6, 7, 8, 9};\r\n    int i = 0;\r\n    int res;\r\n    \r\n    while(i < 6)\r\n    {\r\n        values[0] += values[i];\r\n        i++;\r\n    }\r\n    res = values[0];\r\n           cout<<res;\r\n\r\n}','9','15','16','17','15','könnyű',11),(661,'void main(){\r\n    int j, i;\r\n    int ar[] = {1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11};\r\n\r\n    for(j = 5, i = 0 ; i < j ; j--,i++)\r\n        ar[i] = ar[j];\r\n    i = ar[i];\r\n     cout<<i;\r\n\r\n}','6','5','4','3','4','könnyű',12),(671,'void main(){\r\n    int i;\r\n    int j = 0;\r\n    int ar[] = {9, 3, -4, 7, 2, -11, 4, 10, 1, 4};\r\n    int extr = ar[j];\r\n\r\n    for(i = 1; i < 3 ; i++)\r\n        if (extr > ar[i]) {\r\n            extr = ar[i];\r\n            j = i;\r\n        }\r\n    cout<<j;\r\n}','0','1','2','3','2','könnyű',13),(681,'void main(){\r\n    int i;\r\n    int extr = 0;\r\n    int ar[] = {9, 3, -4, 7, 2, -11, 4, 10, 1, 4};\r\n	\r\n    for(i = 0; i < 7 ; i++)\r\n        if (extr < ar[i]) {\r\n        	extr = ar[i];\r\n        }\r\n	   cout<<extr;\r\n}','9','10','4','-4','9','könnyű',14),(691,'int fcn (int, int);\r\nvoid main (){\r\n    int i = 8;\r\n    int j = 20 - 8;\r\n    i = fcn (i, j);\r\n    cout<<i;\r\n}\r\n\r\nint fcn (int x, int y){\r\n    return ( (x > y) ? x : y );\r\n}','8','10','12','20','12','könnyű',15),(701,'float sqr(float);\r\n\r\nvoid main (){\r\n    float x = 4;\r\n    float y = 1.1 * sqr(x) + 2.2 * x + 3.3;\r\n	  cout<<y;\r\n    \r\n}\r\n\r\nfloat sqr (float n){\r\n    return (n * n);\r\n}','29','29.7','19','19.8','29.7','könnyű',16),(702,'void main (){\r\n    int array[] = {10, 15, 20, 25, 30, 35, 40, 45, 50};\r\n    int answer = 0;\r\n    int i = 2;\r\n    \r\n    while(i++ < 8)\r\n        answer += array[i];\r\n	   cout<<answer;\r\n}','130','175','225','275','225','könnyű',17),(711,'int abs (int);\r\nint max (int, int);\r\n\r\nvoid main (){\r\n    int i = 9, j = -10 + 9;\r\n    cout<< max (abs(i), abs(j));\r\n}\r\n\r\nint abs (int x){\r\n    return ((x > 0) ? x : -1*x);\r\n}\r\n\r\nint max (int x, int y){\r\n	return ((x > y) ? x : y);\r\n}','9','-9','10','11','9','könnyű',19),(721,'int power(int, int);\r\nvoid main (){\r\n    int x = 3;\r\n    cout<< power(x, 3);\r\n\r\n}\r\n\r\nint power (int base, int n){\r\n    int i, p = 1;\r\n	for (i = 0; i < n; i++)\r\n        p = p * base;\r\n    return p;\r\n}','9','12','21','27','9','könnyű',20),(731,'int f1 (int, int);\r\nvoid main (){\r\n    int i = 2, j = i;\r\n	cout<< f1 (i + j, i + i);\r\n}\r\n\r\nint f1 (int x, int y){\r\n    if ((++x + 1 == (2 + y)))\r\n        return (0);\r\n    else\r\n        return (x != y) ? -1 : 1;\r\n}','-1','0','1','2','0','könnyű',18);
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
INSERT INTO `users` VALUES (3,'14415166'),(5,'16671188'),(11,'12214193'),(21,'hlabadi'),(51,'grobert');
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

-- Dump completed on 2014-12-23 15:26:57
