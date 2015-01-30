-- MySQL dump 10.13  Distrib 5.5.23, for Win32 (x86)
--
-- Host: 192.168.1.10    Database: crud
-- ------------------------------------------------------
-- Server version	5.5.23

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
-- Table structure for table `agreetments`
--

DROP TABLE IF EXISTS `agreetments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agreetments` (
  `idagreetment` int(11) NOT NULL AUTO_INCREMENT,
  `agreetment` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idagreetment`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agreetments`
--

LOCK TABLES `agreetments` WRITE;
/*!40000 ALTER TABLE `agreetments` DISABLE KEYS */;
INSERT INTO `agreetments` VALUES (1,'Si'),(2,'Spam');
/*!40000 ALTER TABLE `agreetments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cities` (
  `idcity` int(11) NOT NULL AUTO_INCREMENT,
  `city` varchar(255) NOT NULL,
  PRIMARY KEY (`idcity`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cities`
--

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
INSERT INTO `cities` VALUES (1,'Valencia'),(2,'Barcelona'),(3,'Madrid'),(4,'Paterna'),(5,'Albacete'),(6,'Albacete');
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genders`
--

DROP TABLE IF EXISTS `genders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genders` (
  `idgender` int(11) NOT NULL AUTO_INCREMENT,
  `gender` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idgender`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genders`
--

LOCK TABLES `genders` WRITE;
/*!40000 ALTER TABLE `genders` DISABLE KEYS */;
INSERT INTO `genders` VALUES (1,'Mujer'),(2,'Hombre'),(3,'Otros');
/*!40000 ALTER TABLE `genders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hobbies`
--

DROP TABLE IF EXISTS `hobbies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hobbies` (
  `idhobby` int(11) NOT NULL AUTO_INCREMENT,
  `hobby` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idhobby`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hobbies`
--

LOCK TABLES `hobbies` WRITE;
/*!40000 ALTER TABLE `hobbies` DISABLE KEYS */;
INSERT INTO `hobbies` VALUES (1,'Cine'),(2,'Viajes'),(3,'Deporte');
/*!40000 ALTER TABLE `hobbies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `iduser` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `description` text,
  `photo` varchar(255) DEFAULT NULL,
  `bdate` datetime DEFAULT NULL,
  `cities_idcity` int(11) NOT NULL,
  `genders_idgender` int(11) NOT NULL,
  PRIMARY KEY (`iduser`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_users_cities_idx` (`cities_idcity`),
  KEY `fk_users_genders1_idx` (`genders_idgender`),
  CONSTRAINT `fk_users_cities` FOREIGN KEY (`cities_idcity`) REFERENCES `cities` (`idcity`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_genders1` FOREIGN KEY (`genders_idgender`) REFERENCES `genders` (`idgender`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('user1','Agustin','agustincl@gmail.com','1234','desc','image1.jpg','2010-10-10 00:00:00',1,1),('user2','a','a','a','a','a','2011-11-11 00:00:00',1,2),('user3','b','b','b','b','b','2012-12-12 00:00:00',2,3),('user4','c','c','c','c','c','2013-12-12 00:00:00',4,1),('user5','5','5email','5password',NULL,NULL,NULL,1,1),('user6','6','6','6',NULL,NULL,NULL,2,2);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_has_agreetments`
--

DROP TABLE IF EXISTS `users_has_agreetments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_has_agreetments` (
  `users_iduser` varchar(255) NOT NULL,
  `agreetments_idagreetment` int(11) NOT NULL,
  PRIMARY KEY (`users_iduser`,`agreetments_idagreetment`),
  KEY `fk_users_has_agreetments_agreetments1_idx` (`agreetments_idagreetment`),
  KEY `fk_users_has_agreetments_users1_idx` (`users_iduser`),
  CONSTRAINT `fk_users_has_agreetments_agreetments1` FOREIGN KEY (`agreetments_idagreetment`) REFERENCES `agreetments` (`idagreetment`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_agreetments_users1` FOREIGN KEY (`users_iduser`) REFERENCES `users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_has_agreetments`
--

LOCK TABLES `users_has_agreetments` WRITE;
/*!40000 ALTER TABLE `users_has_agreetments` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_has_agreetments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_has_hobbies`
--

DROP TABLE IF EXISTS `users_has_hobbies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_has_hobbies` (
  `users_iduser` varchar(255) NOT NULL,
  `hobbies_idhobby` int(11) NOT NULL,
  PRIMARY KEY (`users_iduser`,`hobbies_idhobby`),
  KEY `fk_users_has_hobbies_hobbies1_idx` (`hobbies_idhobby`),
  KEY `fk_users_has_hobbies_users1_idx` (`users_iduser`),
  CONSTRAINT `fk_users_has_hobbies_hobbies1` FOREIGN KEY (`hobbies_idhobby`) REFERENCES `hobbies` (`idhobby`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_hobbies_users1` FOREIGN KEY (`users_iduser`) REFERENCES `users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_has_hobbies`
--

LOCK TABLES `users_has_hobbies` WRITE;
/*!40000 ALTER TABLE `users_has_hobbies` DISABLE KEYS */;
INSERT INTO `users_has_hobbies` VALUES ('user1',1),('user2',1),('user4',1),('user1',2),('user3',2),('user4',2),('user1',3);
/*!40000 ALTER TABLE `users_has_hobbies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usersdata`
--

DROP TABLE IF EXISTS `usersdata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usersdata` (
  `iduserdata` int(11) NOT NULL,
  `phone_number` varchar(45) DEFAULT NULL,
  `facebook_id` varchar(45) DEFAULT NULL,
  `twitter_id` varchar(45) DEFAULT NULL,
  `users_iduser` varchar(255) NOT NULL,
  PRIMARY KEY (`iduserdata`,`users_iduser`),
  KEY `fk_usersdata_users1_idx` (`users_iduser`),
  CONSTRAINT `fk_usersdata_users1` FOREIGN KEY (`users_iduser`) REFERENCES `users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usersdata`
--

LOCK TABLES `usersdata` WRITE;
/*!40000 ALTER TABLE `usersdata` DISABLE KEYS */;
/*!40000 ALTER TABLE `usersdata` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-01-29 12:47:28
