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
-- Table structure for table `bahan_baku`
--

DROP TABLE IF EXISTS `bahan_baku`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bahan_baku` (
  `id` int NOT NULL AUTO_INCREMENT,
  `bahan_baku` varchar(50) DEFAULT NULL,
  `nama_jenis` varchar(50) DEFAULT NULL,
  `desc` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bahan_baku`
--

LOCK TABLES `bahan_baku` WRITE;
/*!40000 ALTER TABLE `bahan_baku` DISABLE KEYS */;
INSERT INTO `bahan_baku` VALUES (2,'Daging','B2','Ini daging kedua yg dimasukan setelah melakukan perubahan pada db dan sedikit merapikan CRUD bagian Bahan Baku'),(3,'Sayur','Sawi','Coba saja sawi.. sapa tau pelanggan rasa cocok');
/*!40000 ALTER TABLE `bahan_baku` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bb_keluar`
--

DROP TABLE IF EXISTS `bb_keluar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bb_keluar` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `jumlah` int DEFAULT NULL,
  `id_jenis_daging` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_daging_idx` (`id_jenis_daging`),
  CONSTRAINT `id_daging` FOREIGN KEY (`id_jenis_daging`) REFERENCES `bahan_baku` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bb_keluar`
--

LOCK TABLES `bb_keluar` WRITE;
/*!40000 ALTER TABLE `bb_keluar` DISABLE KEYS */;
INSERT INTO `bb_keluar` VALUES (1,'2023-09-14',80,2),(2,'2023-09-14',50,3),(3,'2023-08-08',60,2),(4,'2023-08-08',40,3);
/*!40000 ALTER TABLE `bb_keluar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bb_masuk`
--

DROP TABLE IF EXISTS `bb_masuk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bb_masuk` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `jumlah` int DEFAULT NULL,
  `id_jenis_daging` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_jenis_daging_idx` (`id_jenis_daging`),
  CONSTRAINT `id_jenis_daging` FOREIGN KEY (`id_jenis_daging`) REFERENCES `bahan_baku` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bb_masuk`
--

LOCK TABLES `bb_masuk` WRITE;
/*!40000 ALTER TABLE `bb_masuk` DISABLE KEYS */;
INSERT INTO `bb_masuk` VALUES (8,'2023-09-14',100,2),(9,'2023-09-14',60,3),(10,'2023-08-01',100,2),(11,'2023-08-01',50,3);
/*!40000 ALTER TABLE `bb_masuk` ENABLE KEYS */;
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
 1 AS `bahan_baku`,
 1 AS `total_daging_masuk`,
 1 AS `total_daging_keluar`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `stok_bb`
--

DROP TABLE IF EXISTS `stok_bb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stok_bb` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_jenis_daging` int DEFAULT NULL,
  `stok` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_jenis_idx` (`id_jenis_daging`),
  CONSTRAINT `id_jenis` FOREIGN KEY (`id_jenis_daging`) REFERENCES `bahan_baku` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stok_bb`
--

LOCK TABLES `stok_bb` WRITE;
/*!40000 ALTER TABLE `stok_bb` DISABLE KEYS */;
/*!40000 ALTER TABLE `stok_bb` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `stok_view`
--

DROP TABLE IF EXISTS `stok_view`;
/*!50001 DROP VIEW IF EXISTS `stok_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `stok_view` AS SELECT 
 1 AS `id`,
 1 AS `bahan_baku`,
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
/*!50001 VIEW `laporan_bulanan` AS select date_format(`masuk`.`tanggal`,'%Y-%m') AS `bulan`,`jenis`.`nama_jenis` AS `nama_jenis`,`jenis`.`bahan_baku` AS `bahan_baku`,sum(`masuk`.`jumlah`) AS `total_daging_masuk`,ifnull(sum(`keluar`.`jumlah`),0) AS `total_daging_keluar` from ((`bb_masuk` `masuk` join `bahan_baku` `jenis` on((`masuk`.`id_jenis_daging` = `jenis`.`id`))) left join `bb_keluar` `keluar` on(((`masuk`.`id_jenis_daging` = `keluar`.`id_jenis_daging`) and (date_format(`masuk`.`tanggal`,'%Y-%m') = date_format(`keluar`.`tanggal`,'%Y-%m'))))) group by `bulan`,`jenis`.`bahan_baku`,`jenis`.`nama_jenis` */;
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
/*!50001 VIEW `stok_view` AS select `jd`.`id` AS `id`,`jd`.`bahan_baku` AS `bahan_baku`,`jd`.`nama_jenis` AS `nama_jenis`,(coalesce(`masuk`.`total_masuk`,0) - coalesce(`keluar`.`total_keluar`,0)) AS `stok` from ((`bahan_baku` `jd` left join (select `bb_masuk`.`id_jenis_daging` AS `id_jenis_daging`,coalesce(sum(`bb_masuk`.`jumlah`),0) AS `total_masuk` from `bb_masuk` group by `bb_masuk`.`id_jenis_daging`) `masuk` on((`jd`.`id` = `masuk`.`id_jenis_daging`))) left join (select `bb_keluar`.`id_jenis_daging` AS `id_jenis_daging`,coalesce(sum(`bb_keluar`.`jumlah`),0) AS `total_keluar` from `bb_keluar` group by `bb_keluar`.`id_jenis_daging`) `keluar` on((`jd`.`id` = `keluar`.`id_jenis_daging`))) */;
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

-- Dump completed on 2023-09-14 22:47:00
