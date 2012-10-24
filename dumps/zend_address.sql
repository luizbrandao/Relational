CREATE DATABASE  IF NOT EXISTS `zend` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `zend`;
-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: localhost    Database: zend
-- ------------------------------------------------------
-- Server version	5.5.24-log

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
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL,
  `address1` text NOT NULL,
  `address2` text,
  `city` text NOT NULL,
  `state` text,
  `zip` text NOT NULL,
  `country` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address`
--

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` VALUES (1,1,1,'1 Test Home','','Testtown','ZF','1234','PHP'),(2,1,2,'2 Test Home','','Testtown','ZF','1234','PHP'),(3,2,2,'Test Corp, LTD','4 Test Ave','Testtown','ZF','1234','PHP'),(4,2,3,'rua dos testes','rua dos validacoes','',NULL,'',''),(5,2,4,'rua dos testes','rua dos validacoes','',NULL,'',''),(6,2,5,'rua dos testes','rua dos validacoes','',NULL,'',''),(7,2,6,'rua dos testes','rua dos validacoes','',NULL,'',''),(8,2,7,'rua dos testes','rua dos validacoes','',NULL,'',''),(9,2,8,'rua dos testes','rua dos validacoes','',NULL,'',''),(10,2,9,'rua dos testes','rua dos validacoes','',NULL,'',''),(11,2,10,'rua dos testes','rua dos validacoes','',NULL,'',''),(12,2,11,'rua dos testes','rua dos validacoes','',NULL,'',''),(13,2,12,'rua dos testes','rua dos validacoes','',NULL,'',''),(14,2,13,'rua dos testes','rua dos validacoes','',NULL,'',''),(15,2,14,'rua dos testes','rua dos validacoes','',NULL,'','');
/*!40000 ALTER TABLE `address` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-10-18 18:04:34
