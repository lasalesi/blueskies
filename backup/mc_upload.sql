-- MySQL dump 10.13  Distrib 5.6.23, for Win64 (x86_64)
--
-- Host: homqsrgqteam10.qiagen.ads    Database: mcupload
-- ------------------------------------------------------
-- Server version	5.7.10-log

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
-- Table structure for table `tbl_creators`
--

DROP TABLE IF EXISTS `tbl_creators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_creators` (
  `crt_id` int(11) NOT NULL AUTO_INCREMENT,
  `crt_user` varchar(4) NOT NULL COMMENT 'Short name of the user',
  PRIMARY KEY (`crt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='Contains all creators';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_creators`
--

LOCK TABLES `tbl_creators` WRITE;
/*!40000 ALTER TABLE `tbl_creators` DISABLE KEYS */;
INSERT INTO `tbl_creators` VALUES (1,'LaMu'),(9,'KarS'),(10,'AnWi'),(12,'RoSc'),(13,'PaRo'),(14,'FaSc');
/*!40000 ALTER TABLE `tbl_creators` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_requests`
--

DROP TABLE IF EXISTS `tbl_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_requests` (
  `req_id` int(11) NOT NULL AUTO_INCREMENT,
  `req_datetime` datetime NOT NULL,
  `req_author` varchar(100) NOT NULL DEFAULT '.',
  `req_dhfname` varchar(45) NOT NULL DEFAULT '.',
  `req_file` text NOT NULL,
  `req_status` int(11) NOT NULL DEFAULT '1',
  `req_comment` text NOT NULL,
  `req_approvers` varchar(256) NOT NULL DEFAULT '.',
  `req_owner` varchar(50) NOT NULL DEFAULT '.',
  `req_title` varchar(100) NOT NULL DEFAULT '.',
  `req_revision` varchar(5) NOT NULL DEFAULT '01',
  `req_link` text NOT NULL,
  `req_attachements` text NOT NULL COMMENT 'Attachement file links',
  `req_fasttrack` int(1) NOT NULL DEFAULT '0',
  `req_locked` varchar(4) NOT NULL DEFAULT '',
  PRIMARY KEY (`req_id`)
) ENGINE=InnoDB AUTO_INCREMENT=236 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `tbl_states`
--

DROP TABLE IF EXISTS `tbl_states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_states` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(25) NOT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_states`
--

LOCK TABLES `tbl_states` WRITE;
/*!40000 ALTER TABLE `tbl_states` DISABLE KEYS */;
INSERT INTO `tbl_states` VALUES (1,'Requested'),(2,'Created'),(3,'Complete'),(4,'Closed');
/*!40000 ALTER TABLE `tbl_states` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_users` (
  `usr_id` int(11) NOT NULL AUTO_INCREMENT,
  `usr_short` varchar(4) NOT NULL,
  `usr_name` varchar(45) NOT NULL,
  `usr_mail` varchar(65) NOT NULL,
  PRIMARY KEY (`usr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COMMENT='Contains users';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Temporary view structure for view `top10authors`
--

DROP TABLE IF EXISTS `top10authors`;
/*!50001 DROP VIEW IF EXISTS `top10authors`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `top10authors` AS SELECT 
 1 AS `Author`,
 1 AS `Requests`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_creatorrevisors`
--

DROP TABLE IF EXISTS `view_creatorrevisors`;
/*!50001 DROP VIEW IF EXISTS `view_creatorrevisors`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `view_creatorrevisors` AS SELECT 
 1 AS `usr_short`,
 1 AS `usr_name`,
 1 AS `usr_mail`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `view_dailyrequestslast3months`
--

DROP TABLE IF EXISTS `view_dailyrequestslast3months`;
/*!50001 DROP VIEW IF EXISTS `view_dailyrequestslast3months`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `view_dailyrequestslast3months` AS SELECT 
 1 AS `Day`,
 1 AS `Requests`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `top10authors`
--

/*!50001 DROP VIEW IF EXISTS `top10authors`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`lars`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `top10authors` AS select `tbl_requests`.`req_author` AS `Author`,count(0) AS `Requests` from `tbl_requests` group by `tbl_requests`.`req_author` order by `Requests` desc limit 10 */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_creatorrevisors`
--

/*!50001 DROP VIEW IF EXISTS `view_creatorrevisors`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`lars`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `view_creatorrevisors` AS select `tbl_users`.`usr_short` AS `usr_short`,`tbl_users`.`usr_name` AS `usr_name`,`tbl_users`.`usr_mail` AS `usr_mail` from (`tbl_users` join `tbl_creators` on((`tbl_users`.`usr_short` = `tbl_creators`.`crt_user`))) order by `tbl_users`.`usr_name` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `view_dailyrequestslast3months`
--

/*!50001 DROP VIEW IF EXISTS `view_dailyrequestslast3months`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`lars`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `view_dailyrequestslast3months` AS select cast(`tbl_requests`.`req_datetime` as date) AS `Day`,count(`tbl_requests`.`req_datetime`) AS `Requests` from `tbl_requests` where (`tbl_requests`.`req_datetime` > (now() - interval 3 month)) group by cast(`tbl_requests`.`req_datetime` as date) */;
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

-- Dump completed on 2016-09-14 21:23:44
