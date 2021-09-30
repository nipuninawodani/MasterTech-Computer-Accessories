-- MySQL dump 10.13  Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: mastertechserver.mysql.database.azure.com    Database: mastertech
-- ------------------------------------------------------
-- Server version	5.6.47.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `UserID` varchar(10) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` text NOT NULL,
  `Mobile` varchar(12) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Type` varchar(10) NOT NULL,
  `Status` varchar(10) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('0000000000','Admin','1','admin1@mastertech.com','8f7792843c076e2bcff7ef368a817dbb','+94774396812','Other','Admin','Active'),('0000000100','Mahela','Dissanayake','maheladissanayake@gmail.com','e1aa512c96b6eb0678c5483c481e463f','0774396812','Male','User','Active'),('0000000101','Nirmal','Samod','Nirmal123@gmail.com','c24551c36bb9ee0d31b1030877cfbb4d','+94775685956','Male','User','Active'),('0000000102','Isuruni','Divyanjalee','Isuruni123@gmail.com','ddab0c2335e4fb28e66dcac64f9c4b1b','+94775632875','Female','User','Active'),('0000000103','Kasun','Dananjaya','KasunD@abc.com','30473a6ef17613c493e677b60fb8da11','0774396888','Male','User','Unverified'),('0000000104','Sachin','Tharaka','tharakasachin98@gmail.com','ad89208a654f7b21487739192e1f9776','0716289146','Male','User','Unverified'),('0000000105','Abdullah','Ramees','abdullahteachofficial@gmail.com','136b91f391a9b2d6a4ef83a6508c2c3d','+94701171990','Male','User','Unverified'),('0000000106','Shehan','Dissanayake','mahela100@gmail.com','673b0b860f85009a2deab62647f7c238','0778596852','Male','User','Unverified'),('0000000107','Mohamed Ramees','Abdullah','m.abdullah.ramees0916@gmail.com','136b91f391a9b2d6a4ef83a6508c2c3d','+94701171990','Male','User','Unverified'),('0000000108','Sasuke','Uchiha','kurukavatar69@gmail.com','32036005d1f6ed59803ba3e13c80993e','0774896572','Male','User','Active');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-30 13:23:48
