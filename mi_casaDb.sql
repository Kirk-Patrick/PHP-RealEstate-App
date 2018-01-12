CREATE DATABASE  IF NOT EXISTS `mi_casa` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `mi_casa`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: mi_casa
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
-- Table structure for table `bathroomtype`
--

DROP TABLE IF EXISTS `bathroomtype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bathroomtype` (
  `bathroom_typeid` int(11) NOT NULL AUTO_INCREMENT,
  `bathroom_type` char(3) NOT NULL,
  PRIMARY KEY (`bathroom_typeid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bathroomtype`
--

LOCK TABLES `bathroomtype` WRITE;
/*!40000 ALTER TABLE `bathroomtype` DISABLE KEYS */;
INSERT INTO `bathroomtype` VALUES (1,'1'),(2,'1.5'),(3,'2'),(4,'3+');
/*!40000 ALTER TABLE `bathroomtype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bedroomstype`
--

DROP TABLE IF EXISTS `bedroomstype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bedroomstype` (
  `bedroom_typeid` int(11) NOT NULL AUTO_INCREMENT,
  `bedroom_type` char(3) NOT NULL COMMENT 'gives the bed room type',
  PRIMARY KEY (`bedroom_typeid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bedroomstype`
--

LOCK TABLES `bedroomstype` WRITE;
/*!40000 ALTER TABLE `bedroomstype` DISABLE KEYS */;
INSERT INTO `bedroomstype` VALUES (1,'1'),(2,'2'),(3,'3+');
/*!40000 ALTER TABLE `bedroomstype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buildingtype`
--

DROP TABLE IF EXISTS `buildingtype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buildingtype` (
  `buildingid` int(11) NOT NULL AUTO_INCREMENT,
  `buildingType` varchar(45) NOT NULL,
  PRIMARY KEY (`buildingid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buildingtype`
--

LOCK TABLES `buildingtype` WRITE;
/*!40000 ALTER TABLE `buildingtype` DISABLE KEYS */;
INSERT INTO `buildingtype` VALUES (1,'N/A'),(2,'Farm Land'),(3,'Housing'),(4,'Apartment'),(5,'Town House'),(6,'Plaza'),(7,'Office Space'),(8,'Other');
/*!40000 ALTER TABLE `buildingtype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `listingtype`
--

DROP TABLE IF EXISTS `listingtype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `listingtype` (
  `listing_typeid` int(11) NOT NULL AUTO_INCREMENT,
  `listing_type` varchar(20) NOT NULL,
  PRIMARY KEY (`listing_typeid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `listingtype`
--

LOCK TABLES `listingtype` WRITE;
/*!40000 ALTER TABLE `listingtype` DISABLE KEYS */;
INSERT INTO `listingtype` VALUES (1,'Rent'),(2,'Purchase');
/*!40000 ALTER TABLE `listingtype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parish`
--

DROP TABLE IF EXISTS `parish`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parish` (
  `parishId` int(11) NOT NULL AUTO_INCREMENT,
  `parish` varchar(45) NOT NULL,
  PRIMARY KEY (`parishId`),
  UNIQUE KEY `parish_UNIQUE` (`parish`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parish`
--

LOCK TABLES `parish` WRITE;
/*!40000 ALTER TABLE `parish` DISABLE KEYS */;
INSERT INTO `parish` VALUES (6,'Clarendon'),(1,'Hanover'),(11,'Kingston'),(7,'Manchester'),(12,'Portland'),(8,'Saint Ann'),(13,'St. Andrew'),(9,'St. Catherine'),(3,'St. James'),(10,'St. Mary'),(14,'St. Thomas'),(2,'St.Elizabeth'),(4,'Trelawny'),(5,'Westmoreland');
/*!40000 ALTER TABLE `parish` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `propertydescription`
--

DROP TABLE IF EXISTS `propertydescription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `propertydescription` (
  `property_descriptionid` int(11) NOT NULL AUTO_INCREMENT,
  `property_typeid` int(11) NOT NULL,
  `building_typeid` int(11) NOT NULL,
  `bedrooms_typeid` int(11) NOT NULL,
  `bathrooms_typeid` int(11) NOT NULL,
  `listing_typeid` int(11) NOT NULL,
  `land_size` decimal(10,2) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `locationId_of_property` int(11) NOT NULL,
  PRIMARY KEY (`property_descriptionid`),
  KEY `fk_propertytype_idx` (`property_typeid`),
  KEY `fk_building_type_idx` (`building_typeid`),
  KEY `fk_bedroomtype_idx` (`bedrooms_typeid`),
  KEY `bathroomtype_id_idx` (`bathrooms_typeid`),
  KEY `fk_listingtype_idx` (`listing_typeid`),
  KEY `fk_user_idx` (`user_id`),
  KEY `fk_location_description_idx` (`locationId_of_property`),
  CONSTRAINT `fk_bathroomtype` FOREIGN KEY (`bathrooms_typeid`) REFERENCES `bathroomtype` (`bathroom_typeid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_bedroomtype` FOREIGN KEY (`bedrooms_typeid`) REFERENCES `bedroomstype` (`bedroom_typeid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_building_type` FOREIGN KEY (`building_typeid`) REFERENCES `buildingtype` (`buildingid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_listingtype` FOREIGN KEY (`listing_typeid`) REFERENCES `listingtype` (`listing_typeid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_location_description` FOREIGN KEY (`locationId_of_property`) REFERENCES `propertylocation` (`locationId_of_property`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_propertytype` FOREIGN KEY (`property_typeid`) REFERENCES `propertytype` (`propertyTypeId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `usermembership` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `propertydescription`
--

LOCK TABLES `propertydescription` WRITE;
/*!40000 ALTER TABLE `propertydescription` DISABLE KEYS */;
INSERT INTO `propertydescription` VALUES (11,2,4,3,2,1,9.00,20000.00,36,32),(15,2,6,2,3,2,32.00,4588.00,37,36),(16,2,6,2,3,2,32.00,4588.00,37,37),(17,3,7,2,3,2,17.00,43777.00,36,38),(18,2,5,3,2,2,29.00,43786.00,36,39),(19,2,3,2,2,2,94.00,10000000.00,38,40),(20,1,3,1,2,1,94.00,1003333.00,38,41),(21,1,3,1,2,1,94.00,1003333.00,38,42),(22,2,4,3,2,2,126.00,3003351.00,38,43);
/*!40000 ALTER TABLE `propertydescription` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `propertylocation`
--

DROP TABLE IF EXISTS `propertylocation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `propertylocation` (
  `locationId_of_property` int(11) NOT NULL AUTO_INCREMENT,
  `streetAddress1` varchar(50) NOT NULL,
  `streetAddress2` varchar(50) NOT NULL,
  `City` varchar(45) NOT NULL,
  `parishId` int(11) NOT NULL,
  `Country` varchar(45) NOT NULL,
  `user_Id` int(11) NOT NULL,
  PRIMARY KEY (`locationId_of_property`),
  KEY `fk_userId_idx` (`user_Id`),
  KEY `fk_parish_idx` (`parishId`),
  CONSTRAINT `fk_parish` FOREIGN KEY (`parishId`) REFERENCES `parish` (`parishId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_userId` FOREIGN KEY (`user_Id`) REFERENCES `usermembership` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `propertylocation`
--

LOCK TABLES `propertylocation` WRITE;
/*!40000 ALTER TABLE `propertylocation` DISABLE KEYS */;
INSERT INTO `propertylocation` VALUES (32,'seaview 12','seaview16','kingston',11,'Jamaica',36),(36,'kingston18','kingston5','kingston',1,'Jamaica',37),(37,'kingston19','kingston59','kingston',10,'Jamaica',37),(38,'harbor view','kingston59','kingston',11,'Jamaica',36),(39,'harbor view45','kingston59','kingston',11,'Jamaica',36),(40,'Hope Street','wise view12','wise city',10,'Jamaica',38),(41,'Hope Street2','wise view1222','wise city2',12,'Jamaica',38),(42,'Hope Street23','kiing  view1222','wise city2',12,'Jamaica',38),(43,'Hope Street23','kiing  view1222','wise city2',12,'Jamaica',38);
/*!40000 ALTER TABLE `propertylocation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `propertytype`
--

DROP TABLE IF EXISTS `propertytype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `propertytype` (
  `propertyTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `propertyType` varchar(45) NOT NULL,
  PRIMARY KEY (`propertyTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `propertytype`
--

LOCK TABLES `propertytype` WRITE;
/*!40000 ALTER TABLE `propertytype` DISABLE KEYS */;
INSERT INTO `propertytype` VALUES (1,'Vacant Lot'),(2,'Residential'),(3,'Commercial');
/*!40000 ALTER TABLE `propertytype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `roleid` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(45) NOT NULL,
  PRIMARY KEY (`roleid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin'),(2,'user');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usermembership`
--

DROP TABLE IF EXISTS `usermembership`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usermembership` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `userEmail` varchar(45) NOT NULL,
  `u_password` varchar(45) NOT NULL,
  `DateCreated` varchar(45) DEFAULT NULL,
  `roleid` int(11) DEFAULT NULL COMMENT 'A single user can have 0- 1 roles and single role has  can have many users',
  `firstName` varchar(45) NOT NULL,
  `middleName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) NOT NULL,
  `telephoneNumber1` varchar(20) NOT NULL,
  `telephoneNumber2` varchar(20) DEFAULT NULL,
  `trn` varchar(12) NOT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `userEmail_UNIQUE` (`userEmail`),
  UNIQUE KEY `trn_UNIQUE` (`trn`),
  KEY `fk_roles_id_idx` (`roleid`),
  CONSTRAINT `fk_roles_id` FOREIGN KEY (`roleid`) REFERENCES `roles` (`roleid`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usermembership`
--

LOCK TABLES `usermembership` WRITE;
/*!40000 ALTER TABLE `usermembership` DISABLE KEYS */;
INSERT INTO `usermembership` VALUES (34,'micasadmin','micasa#123','2017-12-15 19:31:49',1,'john',NULL,'peter','876-555-7685',NULL,'555555555'),(36,'andre@gmail.com','rise','2017-12-16 05:29:33',2,'John','','Hopkin','876-887-9987','','111111118'),(37,'kimoy@gmail.com','rise','2017-12-16 09:44:33',2,'kimoy','','Cunning','876-887-9987','','444499967'),(38,'king@gmail.com','riseoftheking','2017-12-16 13:58:58',2,'King','','Ping','778-667-3333','','777777345');
/*!40000 ALTER TABLE `usermembership` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `vw_users`
--

DROP TABLE IF EXISTS `vw_users`;
/*!50001 DROP VIEW IF EXISTS `vw_users`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `vw_users` AS SELECT 
 1 AS `userEmail`,
 1 AS `firstName`,
 1 AS `lastName`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `vw_users`
--

/*!50001 DROP VIEW IF EXISTS `vw_users`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_users` AS select `usermembership`.`userEmail` AS `userEmail`,`usermembership`.`firstName` AS `firstName`,`usermembership`.`lastName` AS `lastName` from `usermembership` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-12-16 15:31:04
