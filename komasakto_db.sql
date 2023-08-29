-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: localhost    Database: komasakto_db
-- ------------------------------------------------------
-- Server version	8.0.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `info_daging_keluar`
--

DROP TABLE IF EXISTS `info_daging_keluar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `info_daging_keluar` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `jumlah` int DEFAULT NULL,
  `id_jenis_daging` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_daging_idx` (`id_jenis_daging`),
  CONSTRAINT `id_daging` FOREIGN KEY (`id_jenis_daging`) REFERENCES `jenis_daging` (`iddaging`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `info_daging_keluar`
--

LOCK TABLES `info_daging_keluar` WRITE;
/*!40000 ALTER TABLE `info_daging_keluar` DISABLE KEYS */;
INSERT INTO `info_daging_keluar` VALUES (14,'2023-05-31',50,1),(15,'2023-05-30',30,9),(16,'2023-05-01',80,10),(17,'2023-06-01',80,10);
/*!40000 ALTER TABLE `info_daging_keluar` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb3 */ ;
/*!50003 SET character_set_results = utf8mb3 */ ;
/*!50003 SET collation_connection  = utf8mb3_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `trigger_stok_keluar` AFTER INSERT ON `info_daging_keluar` FOR EACH ROW BEGIN
                    UPDATE stok_daging
                    SET stok = stok - NEW.jumlah
                    WHERE id_jenis_daging = NEW.id_jenis_daging;
                END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `info_daging_masuk`
--

DROP TABLE IF EXISTS `info_daging_masuk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `info_daging_masuk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `jumlah` int DEFAULT NULL,
  `id_jenis_daging` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_jenis_daging_idx` (`id_jenis_daging`),
  CONSTRAINT `id_jenis_daging` FOREIGN KEY (`id_jenis_daging`) REFERENCES `jenis_daging` (`iddaging`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `info_daging_masuk`
--

LOCK TABLES `info_daging_masuk` WRITE;
/*!40000 ALTER TABLE `info_daging_masuk` DISABLE KEYS */;
INSERT INTO `info_daging_masuk` VALUES (73,'2023-05-01',100,1),(74,'2023-05-02',80,9),(75,'2023-05-01',100,10),(76,'2023-06-01',80,10);
/*!40000 ALTER TABLE `info_daging_masuk` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'IGNORE_SPACE,ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `update_stok_masuk` AFTER INSERT ON `info_daging_masuk` FOR EACH ROW BEGIN
    UPDATE stok_daging
    SET stok = stok + NEW.jumlah
    WHERE id_jenis_daging = NEW.id_jenis_daging;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb3 */ ;
/*!50003 SET character_set_results = utf8mb3 */ ;
/*!50003 SET collation_connection  = utf8mb3_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `trigger_stok_masuk` AFTER INSERT ON `info_daging_masuk` FOR EACH ROW BEGIN
                    UPDATE stok_daging
                    SET stok = stok + NEW.jumlah
                    WHERE id_jenis_daging = NEW.id_jenis_daging;
                END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `jenis_daging`
--

DROP TABLE IF EXISTS `jenis_daging`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jenis_daging` (
  `iddaging` int NOT NULL AUTO_INCREMENT,
  `nama_jenis` varchar(50) DEFAULT NULL,
  `desc` text,
  PRIMARY KEY (`iddaging`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenis_daging`
--

LOCK TABLES `jenis_daging` WRITE;
/*!40000 ALTER TABLE `jenis_daging` DISABLE KEYS */;
INSERT INTO `jenis_daging` VALUES (1,'Rib Eye','Rib eye atau iga adalah bagian daging sapi untuk bbq paling favorit. Sama saja, baik potongan dengan tulang maupun tanpa tulang. Posisinya terletak pada tulang rusuk sapi.'),(9,'B2 ','daging enak'),(10,'Smoke Beef','Daging berasap lah kurang lebih');
/*!40000 ALTER TABLE `jenis_daging` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `laporan_bulanan`
--

DROP TABLE IF EXISTS `laporan_bulanan`;
/*!50001 DROP VIEW IF EXISTS `laporan_bulanan`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `laporan_bulanan` AS SELECT 
 1 AS `bulan`,
 1 AS `nama_jenis`,
 1 AS `total_daging_masuk`,
 1 AS `total_daging_keluar`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2023-08-15-134205','App\\Database\\Migrations\\TriggerStokMasuk','default','App',1692107421,1),(2,'2023-08-15-134220','App\\Database\\Migrations\\TriggerStokKeluar','default','App',1692107659,2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stok_daging`
--

DROP TABLE IF EXISTS `stok_daging`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stok_daging` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_jenis_daging` int DEFAULT NULL,
  `stok` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_jenis_daging_idx` (`id_jenis_daging`),
  CONSTRAINT `id_jenis` FOREIGN KEY (`id_jenis_daging`) REFERENCES `jenis_daging` (`iddaging`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stok_daging`
--

LOCK TABLES `stok_daging` WRITE;
/*!40000 ALTER TABLE `stok_daging` DISABLE KEYS */;
/*!40000 ALTER TABLE `stok_daging` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `stok_daging_view`
--

DROP TABLE IF EXISTS `stok_daging_view`;
/*!50001 DROP VIEW IF EXISTS `stok_daging_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `stok_daging_view` AS SELECT 
 1 AS `iddaging`,
 1 AS `nama_jenis`,
 1 AS `total_stok`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `stok_view`
--

DROP TABLE IF EXISTS `stok_view`;
/*!50001 DROP VIEW IF EXISTS `stok_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `stok_view` AS SELECT 
 1 AS `iddaging`,
 1 AS `nama_jenis`,
 1 AS `stok`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Admin','$2y$10$teAnlgD33hyQ8rBTzznnUeQUrkQ1i9Fp9lIXUjj10SKj9vLkU510y');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `laporan_bulanan`
--

/*!50001 DROP VIEW IF EXISTS `laporan_bulanan`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = cp850 */;
/*!50001 SET character_set_results     = cp850 */;
/*!50001 SET collation_connection      = cp850_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `laporan_bulanan` AS select date_format(`masuk`.`tanggal`,'%Y-%m') AS `bulan`,`jenis`.`nama_jenis` AS `nama_jenis`,sum(`masuk`.`jumlah`) AS `total_daging_masuk`,ifnull(sum(`keluar`.`jumlah`),0) AS `total_daging_keluar` from ((`info_daging_masuk` `masuk` join `jenis_daging` `jenis` on((`masuk`.`id_jenis_daging` = `jenis`.`iddaging`))) left join `info_daging_keluar` `keluar` on(((`masuk`.`id_jenis_daging` = `keluar`.`id_jenis_daging`) and (date_format(`masuk`.`tanggal`,'%Y-%m') = date_format(`keluar`.`tanggal`,'%Y-%m'))))) group by `bulan`,`jenis`.`nama_jenis` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `stok_daging_view`
--

/*!50001 DROP VIEW IF EXISTS `stok_daging_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `stok_daging_view` AS select `jenis_daging`.`iddaging` AS `iddaging`,`jenis_daging`.`nama_jenis` AS `nama_jenis`,coalesce(sum(`stok_daging`.`stok`),0) AS `total_stok` from (`jenis_daging` left join `stok_daging` on((`jenis_daging`.`iddaging` = `stok_daging`.`id_jenis_daging`))) group by `jenis_daging`.`iddaging` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `stok_view`
--

/*!50001 DROP VIEW IF EXISTS `stok_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `stok_view` AS select `jd`.`iddaging` AS `iddaging`,`jd`.`nama_jenis` AS `nama_jenis`,(coalesce(`masuk`.`total_masuk`,0) - coalesce(`keluar`.`total_keluar`,0)) AS `stok` from ((`jenis_daging` `jd` left join (select `info_daging_masuk`.`id_jenis_daging` AS `id_jenis_daging`,coalesce(sum(`info_daging_masuk`.`jumlah`),0) AS `total_masuk` from `info_daging_masuk` group by `info_daging_masuk`.`id_jenis_daging`) `masuk` on((`jd`.`iddaging` = `masuk`.`id_jenis_daging`))) left join (select `info_daging_keluar`.`id_jenis_daging` AS `id_jenis_daging`,coalesce(sum(`info_daging_keluar`.`jumlah`),0) AS `total_keluar` from `info_daging_keluar` group by `info_daging_keluar`.`id_jenis_daging`) `keluar` on((`jd`.`iddaging` = `keluar`.`id_jenis_daging`))) */;
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

-- Dump completed on 2023-08-29 19:38:06
