-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
-- Auther: than the van
-- Host: localhost    Database: unishop
-- ------------------------------------------------------
-- Server version	5.7.21-log

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
-- Table structure for table `about`
--

DROP TABLE IF EXISTS `about`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `about` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `about`
--

LOCK TABLES `about` WRITE;
/*!40000 ALTER TABLE `about` DISABLE KEYS */;
INSERT INTO `about` VALUES (1,'hotrounishop@gmail.com','0869249714','92 Đại La Trương Định Hà Nội');
/*!40000 ALTER TABLE `about` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`),
  CONSTRAINT `admin_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'Thân Thế Văn','thanthevanpm3@gmail.com','0869249714',1,'$2y$10$vPK/3RTmtDE.jcTz.hgd7OLgfFYqcgqZvjIqfV5NKgbAthfg.TtcW','d4G9AgBSki8vsuN9xbfCyTI5yYiWqFsTrbuUwbveSbdMP0uaKICI8SiTgGf6'),(3,'Trần Thị Ngà','ngatran@gmail.com','01654432175',2,'$2y$10$nMHerLmGesSnzmNnfOXw.umzf2RaUzb9awS71M9KN41Hiqdwp/b5W','W01rIM1witquiBpusKxomrqSHNwpQXCL1Nh9z24DzuS6WWTTqK2qKBptFg6F');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Danh Mục Nam','danh-muc-nam',0),(2,'Danh Mục Nữ','danh-muc-nu',0),(4,'Áo len','ao-len',1),(6,'Áo sơ mi','ao-so-mi',1),(7,'Quần jeans','quan-jeans',1),(9,'Áo len','ao-len',2),(11,'Quần jeans','quan-jeans',2),(13,'Áo Phông','ao-phong',1),(14,'Đồ bộ công sở','Đo-bo-cong-so',2),(15,'Áo sơ mi','ao-so-mi',2),(16,'Danh Mục Trẻ Em','danh-muc-tre-em',0),(17,'Đồ bộ bò','Đo-bo-bo',16),(18,'Áo sơ mi','ao-so-mi',16),(19,'Quần jeans','quan-jeans',16),(20,'Áo len','ao-len',16);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorypost`
--

DROP TABLE IF EXISTS `categorypost`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorypost` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorypost`
--

LOCK TABLES `categorypost` WRITE;
/*!40000 ALTER TABLE `categorypost` DISABLE KEYS */;
INSERT INTO `categorypost` VALUES (1,'Tư Vấn Thời Trang','tu-van-thoi-trang',0),(2,'Tin Tức Trong Nước','tin-tuc-trong-nuoc',0),(3,'Tin Tức Quốc Tế','tin-tuc-quoc-te',0),(4,'Xu Hướng Thời Trang 2018','xu-huong-thoi-trang-2018',0);
/*!40000 ALTER TABLE `categorypost` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `color`
--

DROP TABLE IF EXISTS `color`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `color` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `color` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `color_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `color`
--

LOCK TABLES `color` WRITE;
/*!40000 ALTER TABLE `color` DISABLE KEYS */;
INSERT INTO `color` VALUES (2,2,'navy'),(3,3,'silver'),(4,3,'purple'),(5,4,'turquoise'),(6,5,'violet'),(7,6,'White'),(8,6,'blue'),(9,6,'turquoise'),(10,7,'navy'),(11,8,'red'),(14,10,'olive'),(15,10,'yellow'),(16,11,'black'),(17,12,'black'),(18,13,'black'),(19,14,'blue'),(20,15,'violet'),(21,1,'red');
/*!40000 ALTER TABLE `color` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedback` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `created` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` VALUES (1,'Nguyễn Hoài Thu','website ok nhé','2018/05/05','Góp ý','hoaithu@gmail.com',1);
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedbackproduct`
--

DROP TABLE IF EXISTS `feedbackproduct`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedbackproduct` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `comment` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `created` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `vote` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `feedbackproduct_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `feedbackproduct_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `feedbackproduct_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedbackproduct`
--

LOCK TABLES `feedbackproduct` WRITE;
/*!40000 ALTER TABLE `feedbackproduct` DISABLE KEYS */;
/*!40000 ALTER TABLE `feedbackproduct` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imageproduct`
--

DROP TABLE IF EXISTS `imageproduct`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imageproduct` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `link` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `imageproduct_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--  f
-- Dumping data for table `imageproduct`
--

LOCK TABLES `imageproduct` WRITE;
/*!40000 ALTER TABLE `imageproduct` DISABLE KEYS */;
INSERT INTO `imageproduct` VALUES (1,1,NULL,'3b0ed3e5275c63351664d61a1e6d39955421d3a4.jpg','3b0ed3e5275c63351664d61a1e6d39955421d3a4.jpg'),(2,1,NULL,'79eb5a3eb2e1e8a6070aa62705957146bbcd1666.jpg','79eb5a3eb2e1e8a6070aa62705957146bbcd1666.jpg'),(3,2,NULL,'0ec690ed453d724b44069015cbbe6b2a7b0efb7d.jpg','0ec690ed453d724b44069015cbbe6b2a7b0efb7d.jpg'),(4,2,NULL,'b25757902d6d0a31ba114dd2baa17a8b635c3d85.jpg','b25757902d6d0a31ba114dd2baa17a8b635c3d85.jpg'),(5,3,NULL,'71cb2567ddc72460e4ddc18f85930483698d3c02.jpg','71cb2567ddc72460e4ddc18f85930483698d3c02.jpg'),(6,3,NULL,'af91fcd1bfb64540ee5a77bb1403b72b398fd813.jpg','af91fcd1bfb64540ee5a77bb1403b72b398fd813.jpg'),(7,3,NULL,'cdcdd74f507ed45c5476983d1b2b30748339ad4a.jpg','cdcdd74f507ed45c5476983d1b2b30748339ad4a.jpg'),(8,4,NULL,'c2504b50c7d280028a9e515923366a2335e207ab.jpg','c2504b50c7d280028a9e515923366a2335e207ab.jpg'),(9,4,NULL,'4c4533cc3a01efad02a7e1a810c383b90706cf06.jpg','4c4533cc3a01efad02a7e1a810c383b90706cf06.jpg'),(10,5,NULL,'dce2ffe33319746d13656ca4f061fa5ff8edf6ed.jpg','dce2ffe33319746d13656ca4f061fa5ff8edf6ed.jpg'),(11,5,NULL,'d2cb8049254d934226dbe2a1948be09a5e0fcfb0.jpg','d2cb8049254d934226dbe2a1948be09a5e0fcfb0.jpg'),(12,6,NULL,'c98de8214a9b3ef81e0b644a63627e5e83a5c620.jpg','c98de8214a9b3ef81e0b644a63627e5e83a5c620.jpg'),(13,6,NULL,'47e6caba80a6ac46df7956739645d39b3eb6a023.jpg','47e6caba80a6ac46df7956739645d39b3eb6a023.jpg'),(14,6,NULL,'73519a8dd5c6e5533ba02f88ab41403bfd8dacdd.jpg','73519a8dd5c6e5533ba02f88ab41403bfd8dacdd.jpg'),(15,6,NULL,'f41bb0bdc129bf65525ec54ac3b29aa20398cbff.jpg','f41bb0bdc129bf65525ec54ac3b29aa20398cbff.jpg'),(16,7,NULL,'b30e6438978f7bbc422f75a392356d0767600e51.jpg','b30e6438978f7bbc422f75a392356d0767600e51.jpg'),(17,7,NULL,'3c61f396c65829079662ab9ce66505d4a47829c2.jpg','3c61f396c65829079662ab9ce66505d4a47829c2.jpg'),(18,8,NULL,'9cbe9702dd70c83237faa23e0160b135ff6e878d.jpg','9cbe9702dd70c83237faa23e0160b135ff6e878d.jpg'),(19,8,NULL,'93209525b0b5f84304452d39dc1621756295be56.jpg','93209525b0b5f84304452d39dc1621756295be56.jpg'),(20,8,NULL,'58df2f59a670970f402a3fd48a6573dda1b6e6c3.jpg','58df2f59a670970f402a3fd48a6573dda1b6e6c3.jpg'),(21,8,NULL,'12605218d9b1fcc5bb9c6e215643cb06ee65e04a.jpg','12605218d9b1fcc5bb9c6e215643cb06ee65e04a.jpg'),(22,10,NULL,'bc1de07fb77599366783031d2261102159324417.jpg','bc1de07fb77599366783031d2261102159324417.jpg'),(23,10,NULL,'93396e2d2aa74e6ded6651512f318053d30a5063.jpg','93396e2d2aa74e6ded6651512f318053d30a5063.jpg'),(24,11,NULL,'dad3036935fdb4b8f60393775654486265ca7444.jpg','dad3036935fdb4b8f60393775654486265ca7444.jpg'),(25,11,NULL,'517eb2ff2f31b8ab76eb0a37ca2fa08bbfa0f512.jpg','517eb2ff2f31b8ab76eb0a37ca2fa08bbfa0f512.jpg'),(26,12,NULL,'1aae561185f2d615c546806547f05630415bf60d.jpg','1aae561185f2d615c546806547f05630415bf60d.jpg'),(27,12,NULL,'6ff76421b1f5eaf73bfb09472a74970464d45846.jpg','6ff76421b1f5eaf73bfb09472a74970464d45846.jpg'),(28,13,NULL,'bdb060af76b0a417eb0190fd5585c22f96be8fe4.jpg','bdb060af76b0a417eb0190fd5585c22f96be8fe4.jpg'),(29,13,NULL,'721b28fea5fd535188056f59ab033523868a8fd5.jpg','721b28fea5fd535188056f59ab033523868a8fd5.jpg'),(30,14,NULL,'3f6754d37754bb9c6959adedd3107ba94d7dafd7.jpg','3f6754d37754bb9c6959adedd3107ba94d7dafd7.jpg'),(31,14,NULL,'e8104cbfa1028a470e3e85b13468485a8293627b.jpg','e8104cbfa1028a470e3e85b13468485a8293627b.jpg'),(32,15,NULL,'66b78a51ebe81c3c21f852c4ed5ba1a28eca9c3d.jpg','66b78a51ebe81c3c21f852c4ed5ba1a28eca9c3d.jpg');
/*!40000 ALTER TABLE `imageproduct` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT '0',
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `total` double NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `create_by` int(11) DEFAULT '0',
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES (1,7,'thanhbinh@gmail.com','0869249713','112/20/80 Xuân Phương Q.Nam Từ Liêm Hà Nội',400000,1,'2018-04-03 00:35:15','Nguyễn Thanh Bình','ok','offline',1,'2018-04-26 00:35:39'),(2,8,'hoaithu@gmail.com','01677045037','80/101/21 tổ dân phố số 2 phương canh nam từ niêm',200000,1,'2018-04-05 17:34:47','Nguyễn Hoài Thu',NULL,'offline',1,NULL),(3,8,'hoaithu@gmail.com','01677045037','80/101/21 tổ dân phố số 2 phương canh nam từ niêm',1015000,1,'2018-02-05 10:03:53','Nguyễn Hoài Thu',NULL,'offline',1,'2018-05-05 10:04:43'),(4,8,'hoaithu@gmail.com','01677045037','80/101/21 tổ dân phố số 2 phương canh nam từ niêm',750000,1,'2018-03-22 10:04:23','Nguyễn Hoài Thu',NULL,'offline',1,'2018-05-05 10:04:39'),(5,8,'hoaithu@gmail.com','01677045037','80/101/21 tổ dân phố số 2 phương canh nam từ niêm',1510000,1,'2018-03-05 10:07:10','Nguyễn Hoài Thu',NULL,'offline',1,'2018-05-05 10:07:22'),(6,8,'hoaithu@gmail.com','01677045037','80/101/21 tổ dân phố số 2 phương canh nam từ niêm',2125000,1,'2018-05-05 14:25:47','Nguyễn Hoài Thu',NULL,'offline',1,'2018-05-05 14:25:57'),(7,8,'hoaithu@gmail.com','01677045037','80/101/21 tổ dân phố số 2 phương canh nam từ niêm',2280000,1,'2018-01-05 15:31:41','Nguyễn Hoài Thu',NULL,'offline',1,'2018-05-05 16:03:28'),(8,8,'hoaithu@gmail.com','01677045037','80/101/21 tổ dân phố số 2 phương canh nam từ niêm',795000,1,'2018-05-05 21:56:21','Nguyễn Hoài Thu','nhanh nhé','offline',1,'2018-05-05 21:57:15'),(9,0,'thanthevanpm3@gmail.com','0869249714','Thượng lan - việt yên',1600000,2,'2018-05-05 23:53:27','Ngô Xuân Kiên',NULL,'offline',-1,'2018-05-06 11:54:11'),(10,0,'thanthevanpm3@gmail.com','0869249714','Thượng lan - việt yên',615000,1,'2018-05-06 13:33:19','Ngô Xuân Kiên','ok','paypal',1,'2018-05-06 13:37:08'),(11,0,'thanthevanpm3@gmail.com','0869249714','Thượng lan - việt yên',615000,1,'2018-05-06 13:38:50','Ngô Xuân Hùng',NULL,'offline',1,'2018-05-06 13:41:40'),(12,0,'thanthevanpm3@gmail.com','0869249714','Ha noi Viet nam',395000,1,'2018-05-06 13:40:10','Nguyễn Thanh Bình','ok','offline',1,'2018-05-06 13:41:37'),(13,0,'thanthevanpm3@gmail.com','0869249714','Ha noi Viet nam',395000,1,'2018-05-06 13:41:10','Nguyễn Thị Mến','ok','offline',1,'2018-05-06 13:41:35'),(14,0,'thanthevanpm3@gmail.com','0869249714','Thượng lan - việt yên',395000,2,'2018-05-06 13:42:31','Ngô Xuân Kiên',NULL,'offline',1,'2018-05-06 16:59:35'),(15,8,'hoaithu@gmail.com','01677045037','80/101/21 tổ dân phố số 2 phương canh nam từ niêm',615000,1,'2018-05-06 16:30:14','Nguyễn Hoài Thu','ok','offline',1,'2018-05-06 16:59:26'),(16,8,'hoaithu@gmail.com','01677045037','80/101/21 tổ dân phố số 2 phương canh nam từ niêm',1200000,0,'2018-05-06 17:43:09','Nguyễn Hoài Thu',NULL,'offline',0,NULL);
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orderdetail`
--

DROP TABLE IF EXISTS `orderdetail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orderdetail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(11) unsigned NOT NULL,
  `product_id` int(11) unsigned NOT NULL,
  `product_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `color` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`),
  CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orderdetail`
--

LOCK TABLES `orderdetail` WRITE;
/*!40000 ALTER TABLE `orderdetail` DISABLE KEYS */;
INSERT INTO `orderdetail` VALUES (1,1,2,'Áo sơ mi nam Fonto',1,'navy','S'),(2,2,6,'Áo sơ mi nam Fit Mattana',1,'White','S'),(3,3,2,'Áo sơ mi nam Fonto',1,'navy','S'),(4,3,3,'Áo sơ mi nam Mattana Slimfit',1,'silver','S'),(5,4,5,'Áo sơ mi nam ngắn tay Hasa',1,'violet','S'),(6,4,4,'Áo sơ mi nam dài tay Hasa',1,'turquoise','S'),(7,5,2,'Áo sơ mi nam Fonto',1,'navy','S'),(8,5,4,'Áo sơ mi nam dài tay Hasa',1,'turquoise','S'),(9,5,1,'Áo sơ mi nam kẻ dài tay Aligro',1,'magenta','M'),(10,6,2,'Áo sơ mi nam Fonto',1,'navy','S'),(11,6,3,'Áo sơ mi nam Mattana Slimfit',1,'silver','S'),(12,6,4,'Áo sơ mi nam dài tay Hasa',1,'turquoise','S'),(13,6,1,'Áo sơ mi nam kẻ dài tay Aligro',1,'magenta','M'),(14,7,1,'Áo sơ mi nam kẻ dài tay Aligro',1,'magenta','M'),(15,7,4,'Áo sơ mi nam dài tay Hasa',1,'turquoise','S'),(16,7,6,'Áo sơ mi nam Fit Mattana',1,'White','S'),(17,7,5,'Áo sơ mi nam ngắn tay Hasa',1,'violet','S'),(18,7,3,'Áo sơ mi nam Mattana Slimfit',1,'silver','S'),(19,8,4,'Áo sơ mi nam dài tay Hasa',1,'turquoise','S'),(20,8,2,'Áo sơ mi nam Fonto',1,'navy','S'),(21,9,2,'Áo sơ mi nam Fonto',4,'navy','S'),(22,10,3,'Áo sơ mi nam Mattana Slimfit',1,'silver','S'),(23,11,3,'Áo sơ mi nam Mattana Slimfit',1,'silver','S'),(24,12,4,'Áo sơ mi nam dài tay Hasa',1,'turquoise','S'),(25,13,4,'Áo sơ mi nam dài tay Hasa',1,'turquoise','S'),(26,14,4,'Áo sơ mi nam dài tay Hasa',1,'turquoise','S'),(27,15,3,'Áo sơ mi nam Mattana Slimfit',1,'silver','S'),(28,16,2,'Áo sơ mi nam Fonto',2,'navy','M'),(29,16,2,'Áo sơ mi nam Fonto',1,'navy','S');
/*!40000 ALTER TABLE `orderdetail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `auther` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `category_post` int(10) unsigned NOT NULL,
  `decribe` longtext COLLATE utf8_unicode_ci NOT NULL,
  `meta_keyword` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_describe` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_post` (`category_post`),
  CONSTRAINT `post_ibfk_1` FOREIGN KEY (`category_post`) REFERENCES `categorypost` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (1,'58161392417565760fc63023541efde7c13798a7.jpg','Giắt túi những kiến thức cơ bản về cổ áo sơ mi cho bạn!','Thân Thế Văn',1,'<h2>&ldquo;TH&Ocirc;NG ĐIỆP&rdquo; TỪ CỔ &Aacute;O SƠ&nbsp; MI CHO BẠN</h2>\r\n\r\n<p>Một trong những m&oacute;n đồ &ldquo;cần c&oacute;&rdquo; trong tủ đồ của ph&aacute;i mạnh đ&oacute; l&agrave; chiếc &aacute;o sơ mi. &Aacute;o sơ mi dường như đ&atilde; trở th&agrave;nh biểu tượng v&agrave; l&agrave; một item thời trang kinh điển của bất cứ ai d&ugrave; họ c&oacute; quan t&acirc;m đến thời trang hay kh&ocirc;ng. Tuy nhi&ecirc;n, tưởng như sẽ chẳng c&ograve;n g&igrave; để n&oacute;i về chiếc &aacute;o sơ mi &ldquo;qu&aacute; đỗi b&igrave;nh thường&rdquo; n&agrave;y, bạn sẽ thấy bất ngờ trước những g&igrave; m&agrave; bạn c&oacute; thể &ldquo;lắng nghe&rdquo; từ m&oacute;n đồ n&agrave;y đấy!</p>\r\n\r\n<p>H&ocirc;m nay, những g&igrave; ch&uacute;ng t&ocirc;i &ldquo;bật m&iacute;&rdquo; cho bạn l&agrave; tất tần tật kiến thức cơ bản nhất về cổ &aacute;o sơ mi. Bạn c&oacute; lẽ chưa từng thực sự để t&acirc;m đến chi tiết n&agrave;y tr&ecirc;n chiếc &aacute;o, tuy nhi&ecirc;n, n&oacute; c&oacute; &yacute; nghĩa quan trọng hơn bạn tưởng rất nhiều!</p>\r\n\r\n<h3>Cổ &aacute;o sơ mi v&agrave; khu&ocirc;n mặt</h3>\r\n\r\n<p>Bạn c&oacute; bao giờ từng cho rằng cổ &aacute;o sơ mi ảnh hưởng phần n&agrave;o đến khu&ocirc;n mặt bạn chưa? Nghe dường như hai yếu tố n&agrave;y chắc li&ecirc;n quan ch&uacute;t n&agrave;o nhưng đ&uacute;ng l&agrave; thật đấy!</p>\r\n\r\n<p>Việc lựa chọn cổ &aacute;o sơ mi ph&ugrave; hợp với kiểu d&aacute;ng khu&ocirc;n mặt sẽ gi&uacute;p những đường n&eacute;t tr&ecirc;n khu&ocirc;n mặt bạn nổi bật hơn v&agrave; h&agrave;i h&ograve;a hơn, đồng thời cũng giảm sự ch&uacute; &yacute; của người nh&igrave;n v&agrave;o một số nhược điểm.&nbsp;<em>&ldquo;Cổ &aacute;o sơ mi&rdquo;</em>&nbsp;v&agrave;&nbsp;<em>&ldquo;khu&ocirc;n mặt&rdquo;</em>&nbsp;c&oacute; t&aacute;c dụng hỗ trợ nhau v&agrave; quyết định tổng thể vẻ ngo&agrave;i của bạn trong chiếc &aacute;o sơ mi.</p>\r\n\r\n<p><img alt=\"các loại cổ áo sơ mi\" src=\"https://s3-ap-southeast-1.amazonaws.com/canifablog/blog/wp-content/uploads/2018/03/14135204/co-ao-so-mi-2-684x1024.jpg\" style=\"height:500px; width:334px\" /></p>\r\n\r\n<h3>Cổ &aacute;o sơ mi v&agrave; chiếc c&agrave; vạt của bạn</h3>\r\n\r\n<p>Tất nhi&ecirc;n rồi, thật thiếu s&oacute;t khi nhắc đến &ldquo;cổ &aacute;o sơ mi&rdquo; m&agrave; lại qu&ecirc;n mất chiếc c&agrave; vạt. Trong khi chiếc c&agrave; vạt l&agrave; một điểm nhấn kh&ocirc;ng thể thiếu để ho&agrave;n thiện bộ đồ của bạn, cố &aacute;o được coi l&agrave; phần nền &ldquo;hỗ trợ&rdquo; đắc lực để tạo ra sự &ldquo;vừa vặn&rdquo; đến ho&agrave;n hảo tr&ecirc;n tổng thể bộ đồ.</p>\r\n\r\n<p><em><strong>N&ecirc;n xem:&nbsp;</strong></em></p>\r\n\r\n<ul>\r\n	<li><em><a href=\"https://canifa.com/blog/cach-that-ca-vat-dep/\" target=\"_blank\">KH&Ocirc;NG C&Ograve;N BỐI RỐI với 16 c&aacute;ch thắt c&agrave;-vạt Đẹp v&agrave; Chuẩn men dưới đ&acirc;y</a></em></li>\r\n	<li><em><a href=\"https://canifa.com/blog/chon-ca-vat-cho-ao-mi-trang/\" target=\"_blank\">Chọn c&agrave; vạt cho &aacute;o sơ mi trắng: Đ&atilde; mặc đẹp, lại c&ograve;n &ldquo;chuẩn&rdquo;!</a></em></li>\r\n</ul>\r\n\r\n<p><img alt=\"các loại cổ áo sơ mi\" src=\"https://s3-ap-southeast-1.amazonaws.com/canifablog/blog/wp-content/uploads/2018/03/14135339/co-ao-so-mi-3.jpg\" style=\"height:500px; width:355px\" /></p>\r\n\r\n<p>Cổ &aacute;o sơ mi c&oacute; vẻ &ldquo;nhỏ b&eacute;&rdquo; nhưng cũng c&oacute; &ldquo;v&otilde;&rdquo; chẳng k&eacute;m g&igrave; ai phải kh&ocirc;ng? Với rất nhiều loại cổ &aacute;o sơ mi, bạn c&ograve;n cần phải t&igrave;m ra &ldquo;th&ocirc;ng điệp&rdquo; của mỗi loại để lu&ocirc;n biết c&aacute;ch mặc đ&uacute;ng v&agrave; mặc đẹp mọi nơi mọi l&uacute;c.</p>\r\n\r\n<p>C&ograve;n chần chừ g&igrave; m&agrave; kh&ocirc;ng t&igrave;m hiểu ngay th&ocirc;i n&agrave;o!</p>\r\n\r\n<p><strong><a href=\"https://canifa.com/nam/danh-muc-san-pham/ao-so-mi.html\" target=\"_blank\">100+ MẪU &Aacute;O SƠ MI NAM CANIFA CHO BẠN THA HỒ CHỌN LỰA</a>&nbsp;</strong></p>\r\n\r\n<p><strong><a href=\"https://canifa.com/nu/danh-muc-san-pham/ao-so-mi.html\" target=\"_blank\">100+ MẪU &Aacute;O SƠ MI NỮ CANIFA CHO N&Agrave;NG &ndash; XEM NGAY</a></strong></p>\r\n\r\n<hr />\r\n<h2>CỔ &Aacute;O SƠ MI C&Oacute; CẤU TẠO NHƯ THẾ N&Agrave;O?</h2>\r\n\r\n<p>Trước khi đi v&agrave;o c&aacute;c loại cổ &aacute;o sơ mi cơ bản v&agrave; th&ocirc;ng dụng, h&atilde;y d&agrave;nh 1 ph&uacute;t để xem cấu tạo cổ &aacute;o sơ mi như thế n&agrave;o c&ugrave;ng&nbsp;<strong>CANIFA</strong>&nbsp;nh&eacute;!</p>\r\n\r\n<p><img alt=\"cấu tạo cổ áo sơ mi nam\" src=\"https://s3-ap-southeast-1.amazonaws.com/canifablog/blog/wp-content/uploads/2018/03/14135544/co-ao-so-mi-4-294x300.png\" style=\"height:300px; width:294px\" /></p>\r\n\r\n<ul>\r\n	<li><strong>Mũi cổ &aacute;o</strong>: đầu nhọn của cố &aacute;o</li>\r\n	<li><strong>Chiều d&agrave;i từ mũi cổ &aacute;o:</strong>&nbsp;khoảng c&aacute;ch từ mũi cổ &aacute;o đến điểm chạm với dải cổ &aacute;o</li>\r\n	<li><strong>Dải cổ &aacute;o:</strong>&nbsp;miếng vải xung quanh phần cổ</li>\r\n	<li><strong>Độ cao cổ &aacute;o:</strong>&nbsp;độ cao của phần cổ &aacute;o gập để vừa vặn với cổ</li>\r\n	<li><strong>Khoảng c&aacute;ch thắt c&agrave; vạt:</strong>&nbsp;khoảng c&aacute;ch giữa phần đầu của cổ &aacute;o gập khi &aacute;o sơ mi được c&agrave;i c&uacute;c</li>\r\n	<li><strong>Độ mở:</strong>&nbsp;khoảng c&aacute;ch giữa 2 mũi cổ &aacute;o</li>\r\n</ul>\r\n\r\n<p>Sau khi nắm được một số thuật ngữ về cổ &aacute;o sơ mi, bạn sẽ thấy đơn giản hơn nhiều khi t&igrave;m hiểu c&aacute;c loai cổ &aacute;o đấy! H&atilde;y c&ugrave;ng&nbsp;<strong>CANIFA</strong>&nbsp;kh&aacute;m ph&aacute; ngay b&acirc;y giờ nh&eacute;!</p>\r\n\r\n<h2>C&Aacute;C KIỂU/ LOẠI CỔ &Aacute;O SƠ MI NAM BẠN CẦN BIẾT</h2>\r\n\r\n<p>Nếu tinh &yacute; một ch&uacute;t, bạn c&oacute; thể để &yacute; thấy c&oacute; kh&aacute; nhiều kiểu cổ &aacute;o sơ mi kh&aacute;c nhau. Mỗi kiểu cổ &aacute;o n&agrave;y lại c&oacute; &ldquo;c&acirc;u chuyện ri&ecirc;ng&rdquo; của n&oacute; v&agrave; lại đi theo một số kiểu trang phục nhất định. Ch&iacute;nh v&igrave; vậy, để tr&aacute;nh những t&igrave;nh huống như &ldquo;mặc &aacute;o sơ mi cổ t&agrave;u với bộ suit&rdquo; th&igrave; bạn cần &ldquo;giắt t&uacute;i&rdquo; ngay những điều cần biết về cổ &aacute;o sơ mi.</p>\r\n\r\n<p>Dưới đ&acirc;y,&nbsp;<strong>CANIFA</strong>&nbsp;sẽ gi&uacute;p bạn ph&acirc;n loại cổ &aacute;o th&agrave;nh 3 loại lớn:&nbsp;<em>cổ nhọn, cổ bẻ v&agrave; một số kiểu cổ &aacute;o đặc biệt.</em></p>\r\n\r\n<h3>Kiểu cổ &aacute;o sơ mi nhọn (Point collar)</h3>\r\n\r\n<p>Cổ &aacute;o sơ mi nhọn c&oacute; thể n&oacute;i l&agrave; kiểu cổ &aacute;o th&ocirc;ng dụng nhất v&agrave; thường thấy nhất, chiếm khoảng 90% tr&ecirc;n &aacute;o sơ mi nam. Bắt nguồn từ những bộ đồng phục qu&acirc;n đội từ thế kỷ 20, cổ &aacute;o sơ mi nhọn cho đến nay đ&atilde; được thay đổi, biến tấu để tạo ra nhiều kiểu cổ nhọn kh&aacute;c ph&ugrave; hợp với trang phục của người mặc.</p>\r\n\r\n<p><em><strong>Đặc điểm:</strong></em>&nbsp;Đặc điểm dễ thấy của cổ &aacute;o sơ mi nhọn đ&oacute; l&agrave; đường cắt cổ &aacute;o khiến cho phần mũi cổ &aacute;o kh&aacute; gần nhau v&agrave; đ&ocirc;i khi hẹp đến mức che cả phần đầu của c&agrave; vạt. Một số kiểu cổ &aacute;o nhọn được thiết kế d&agrave;i gi&uacute;p hướng sự ch&uacute; &yacute; của người nh&igrave;n về ph&iacute;a c&agrave; vạt v&agrave; kh&ocirc;ng ch&uacute; &yacute; đến khu&ocirc;n mặt. Trong khi đ&oacute;, c&oacute; một số kiểu cổ &aacute;o sơ mi nhọn c&oacute; độ d&agrave;i vừa phải lại khiến người nh&igrave;n tập trung v&agrave;o khu&ocirc;n mặt bạn hơn.</p>\r\n\r\n<p><em><strong>Khu&ocirc;n mặt ph&ugrave; hợp với cổ &aacute;o nhọn:</strong></em>&nbsp;Kiểu cổ &aacute;o sơ mi nhọn sẽ thực sự &ldquo;ph&aacute;t huy&rdquo; tối đa c&ocirc;ng dụng của n&oacute; với những bạn c&oacute; khu&ocirc;n mặt tr&ograve;n bởi kiểu cổ &aacute;o d&agrave;i sẽ khiến khu&ocirc;n mặt c&acirc;n bằng tỷ lệ hơn. Ngược lại, những bạn c&oacute; khu&ocirc;n mặt gầy v&agrave; d&agrave;i n&ecirc;n tr&aacute;nh mặc kiểu cổ &aacute;o sơ mi n&agrave;y.</p>\r\n\r\n<h4>Cổ &aacute;o nhọn cổ điển&nbsp;</h4>\r\n\r\n<p><img alt=\"cổ áo sơ mi nhọn cổ điển\" src=\"https://s3-ap-southeast-1.amazonaws.com/canifablog/blog/wp-content/uploads/2018/03/14140559/co-ao-so-mi-5.png\" style=\"height:357px; width:684px\" /></p>\r\n\r\n<p><strong><em>Đặc điểm:</em></strong>&nbsp;Cổ &aacute;o nhọn cổ điển c&oacute; điểm đặc trưng ở độ mở cổ &aacute;o hẹp, khoảng c&aacute;ch thắt c&agrave; vạt khoảng 2cm, chiều d&agrave;i từ mũi cổ &aacute;o th&ocirc;ng thường l&agrave; 7cm.</p>\r\n\r\n<p><em><strong>Kiểu khu&ocirc;n mặt ph&ugrave; hợp:</strong></em>&nbsp;Hầu hết mọi kiểu khu&ocirc;n mặt</p>\r\n\r\n<p><em><strong>Trang phục phối c&ugrave;ng:</strong></em>&nbsp;&Aacute;o sơ mi c&oacute; cổ &aacute;o nhọn cổ điển lu&ocirc;n ph&ugrave; hợp với những trang phục c&ocirc;ng sở h&agrave;ng ng&agrave;y của ph&aacute;i mạnh. Ch&iacute;nh v&igrave; vậy, bạn cũng kh&ocirc;ng cần lo ngại khi diện &aacute;o sơ mi nhọn cổ điển. Với c&agrave; vạt, bạn n&ecirc;n chọn c&aacute;ch&nbsp;<a href=\"https://canifa.com/blog/cach-that-ca-vat-dep/#Kieu_Four_in_Hand\" target=\"_blank\">thắt Four-in-hand</a>&nbsp;cho kiểu cổ &aacute;o n&agrave;y.</p>\r\n\r\n<p><img alt=\"cổ áo sơ mi kiểu nhọn cổ điển\" src=\"https://s3-ap-southeast-1.amazonaws.com/canifablog/blog/wp-content/uploads/2018/03/14141156/co-ao-so-mi-6-1024x683.jpg\" style=\"height:350px; width:525px\" /></p>\r\n\r\n<h4>Cổ &aacute;o nhọn hẹp ( hay c&ograve;n gọi l&agrave; Cổ Đức)</h4>\r\n\r\n<p><img alt=\"cổ áo sơ mi nhọn hẹp - cổ đức\" src=\"https://s3-ap-southeast-1.amazonaws.com/canifablog/blog/wp-content/uploads/2018/03/14141554/co-ao-so-mi-8.png\" style=\"height:364px; width:695px\" /></p>\r\n\r\n<p><em><strong>Đặc điểm:</strong></em>&nbsp;So với kiểu cổ nhọn cổ điển, cổ &aacute;o nhọn hẹp đ&uacute;ng như t&ecirc;n gọi của n&oacute; sẽ c&oacute; độ mở cổ &aacute;o hẹp hơn. Chiều d&agrave;i từ mũi cổ &aacute;o khoảng 9cm.</p>\r\n\r\n<p><em><strong>Kiểu khu&ocirc;n mặt ph&ugrave; hợp:</strong></em>&nbsp;Những người khu&ocirc;n mặt tr&ograve;n n&ecirc;n chọn kiểu &aacute;o c&oacute; cổ nhọn hẹp để &ldquo;đ&aacute;nh lừa&rdquo; người nh&igrave;n với tỷ lệ c&acirc;n đối hơn.</p>\r\n\r\n<p><em><strong>Trang phục phối c&ugrave;ng:</strong></em>&nbsp;Tương tự như kiểu cổ nhọn cổ điển, cổ &aacute;o nhọn hẹp cũng l&agrave; sự lựa chọn tuyệt vời cho c&aacute;c trang phục c&ocirc;ng sở. Tuy nhi&ecirc;n, với cổ &aacute;o nhọn hẹp, bạn n&ecirc;n chọn c&agrave; vạt loại mảnh v&agrave; d&agrave;i, chọn kiểu thắt nhỏ.</p>\r\n\r\n<p><img alt=\"cổ áo sơ mi nhọn hẹp - cổ đức\" src=\"https://s3-ap-southeast-1.amazonaws.com/canifablog/blog/wp-content/uploads/2018/03/14141828/co-ao-so-mi-9-1024x513.jpg\" style=\"height:263px; width:525px\" /></p>\r\n\r\n<h4>Cổ &aacute;o c&agrave;i khuy (Button down collar )</h4>\r\n\r\n<p><img alt=\"cổ áo sơ mi cài khuy\" src=\"https://s3-ap-southeast-1.amazonaws.com/canifablog/blog/wp-content/uploads/2018/03/14142123/co-ao-so-mi-10.png\" style=\"height:355px; width:683px\" /></p>\r\n\r\n<p><em><strong>Đặc điểm:</strong></em>&nbsp;C&oacute; lỗ đ&iacute;nh khuy nhỏ ở phần mũi cổ &aacute;o v&agrave; thường được c&agrave;i v&agrave;o</p>\r\n\r\n<p><em><strong>Kiểu khu&ocirc;n mặt ph&ugrave; hợp:</strong>&nbsp;</em>Hầu hết mọi kiểu khu&ocirc;n mặt</p>\r\n\r\n<p><em><strong>Trang phục phối c&ugrave;ng:</strong></em>&nbsp;&Aacute;o sơ mi c&oacute; cổ &aacute;o c&agrave;i khuy c&oacute; thể mặc c&ugrave;ng c&agrave; vạt, tuy nhi&ecirc;n, v&igrave; đ&acirc;y l&agrave; kiểu cổ &aacute;o &iacute;t c&oacute; t&iacute;nh trang trọng nhất n&ecirc;n n&oacute; xuất hiện nhiều trong những&nbsp;<a href=\"https://canifa.com/blog/glossary/casual/\" target=\"_blank\">trang phục Casual</a>&nbsp; (h&agrave;ng ng&agrave;y) m&agrave; kh&ocirc;ng cần c&oacute; c&agrave; vạt.</p>\r\n\r\n<p><img alt=\"cổ áo sơ mi cài khuy\" src=\"https://s3-ap-southeast-1.amazonaws.com/canifablog/blog/wp-content/uploads/2018/03/14144115/co-ao-so-mi-11.jpg\" style=\"height:400px; width:800px\" /></p>\r\n\r\n<h4>Cổ &aacute;o c&agrave;i khuy ẩn</h4>\r\n\r\n<p><img alt=\"cổ áo sơ mi cài khuy ẩn\" src=\"https://s3-ap-southeast-1.amazonaws.com/canifablog/blog/wp-content/uploads/2018/03/14144638/co-ao-so-mi-11.png\" style=\"height:320px; width:525px\" /></p>\r\n\r\n<p><em><strong>Đặc điểm:</strong></em>&nbsp;C&oacute; lỗ đ&iacute;nh khuy nhỏ ở mặt trong của mũi cổ &aacute;o. Thiết kế khuy ẩn ở dưới khiến cho cổ &aacute;o thoạt nh&igrave;n b&ecirc;n ngo&agrave;i giống kiểu cổ điển nhưng vẫn cố định được 2 b&ecirc;n cổ &aacute;o như kiểu cổ c&agrave;i khuy</p>\r\n\r\n<p><em><strong>Kiểu khu&ocirc;n mặt ph&ugrave; hợp:</strong></em>&nbsp;Hầu hết mọi kiểu khu&ocirc;n mặt</p>\r\n\r\n<p><em><strong>Trang phục phối c&ugrave;ng:</strong></em>&nbsp;Ph&ugrave; hợp với cả trang phục c&ocirc;ng sở, trang trọng hay những trang phục phong c&aacute;ch Casual. Với kiểu cổ &aacute;o n&agrave;y th&igrave; n&uacute;t thắt của c&agrave; vạt sẽ được l&agrave;m nổi bật.</p>\r\n\r\n<p><img alt=\"cổ áo sơ mi cài khuy ẩn\" src=\"https://s3-ap-southeast-1.amazonaws.com/canifablog/blog/wp-content/uploads/2018/03/14145654/co-ao-so-mi-12.jpg\" style=\"height:600px; width:484px\" /></p>\r\n\r\n<h3>Kiểu cổ &aacute;o sơ mi bẻ rộng ( Speard collar)</h3>\r\n\r\n<p><img alt=\"cổ áo sơ mi bẻ rộng\" src=\"https://s3-ap-southeast-1.amazonaws.com/canifablog/blog/wp-content/uploads/2018/03/14150035/co-ao-so-mi-12-1024x398.png\" style=\"height:204px; width:525px\" /></p>\r\n\r\n<p>Đứng thứ hai chỉ sau cổ &aacute;o nhọn về độ th&ocirc;ng dụng v&agrave; phổ biến, kiểu cổ &aacute;o sơ mi bẻ rộng cũng được ưa chuộng v&agrave; ứng dụng nhiều trong c&aacute;c trang phục kể cả l&agrave; c&ocirc;ng sở hay những bộ đồ h&agrave;ng ng&agrave;y.</p>\r\n\r\n<p><em><strong>Đặc điểm:</strong></em>&nbsp;Kiểu cổ &aacute;o sơ mi bẻ rộng c&oacute; đặc trưng ở phần cổ bẻ rộng ra thay v&igrave; nhỏ v&agrave; hẹp như kiểu cổ nhọn thường thấy, để lộ ra phần tr&ecirc;n của &aacute;o v&agrave; đặc biệt c&ograve;n để một khoảng trống đủ rộng để thấy được c&aacute;c n&uacute;t thắt c&agrave; vạt lớn. Kiểu cổ &aacute;o sơ mi bẻ rộng c&oacute; nhiều loại, kh&aacute;c nhau về độ mở của cổ &aacute;o. C&oacute; loại cổ c&oacute; độ mở trung b&igrave;nh tr&ocirc;ng giống cổ nhọn x&ograve;e ra, c&oacute; loại c&oacute; độ mở lớn nhất th&igrave; cổ &aacute;o được bẻ ngang.</p>\r\n\r\n<p><em><strong>Khu&ocirc;n mặt ph&ugrave; hợp với cổ &aacute;o bẻ rộng:</strong></em>&nbsp;Nếu cổ &aacute;o nhọn d&agrave;nh cho những bạn nam c&oacute; khu&ocirc;n mặt hơi tr&ograve;n v&agrave; mập mạp th&igrave; cổ &aacute;o bẻ rộng lại &ldquo;sinh ra&rdquo; để d&agrave;nh cho c&aacute;c ch&agrave;ng trai c&oacute; khu&ocirc;n mặt gầy v&agrave; d&agrave;i. Cổ &aacute;o bẻ rộng sẽ l&agrave;m tăng hiệu ứng thị gi&aacute;c, khiến người nh&igrave;n tưởng như khu&ocirc;n mặt bạn đầy đặn hơn. Từ đ&oacute;, tỷ lệ khu&ocirc;n mặt được c&acirc;n đối hơn.</p>\r\n\r\n<h4>Cổ &aacute;o bẻ rộng cổ điển (Cutaway collar)</h4>\r\n\r\n<p><img alt=\"cổ áo sơ mi kiểu bẻ rộng cổ điển\" src=\"https://s3-ap-southeast-1.amazonaws.com/canifablog/blog/wp-content/uploads/2018/03/14150341/co-ao-so-mi-13.png\" style=\"height:329px; width:669px\" /></p>\r\n\r\n<p><em><strong>Đặc điểm</strong></em>: Độ mở cổ &aacute;o c&oacute; số đo từ khoảng 18 &ndash; 21 cm</p>\r\n\r\n<p><em><strong>Kiểu khu&ocirc;n mặt ph&ugrave; hợp:</strong></em>&nbsp;Khu&ocirc;n mặt nhỏ, gầy, d&agrave;i</p>\r\n\r\n<p><em>Lưu &yacute;</em>: H&atilde;y lưu &yacute; khoảng c&aacute;ch giữa 2 mũi cổ &aacute;o (tạo th&agrave;nh h&igrave;nh chữ V ngược) v&agrave; chiều d&agrave;i từ mũi cổ &aacute;o. C&ugrave;ng tạo ra một g&oacute;c chữ V như nhau nhưng lại c&oacute; chiều d&agrave;i từ mũi cổ &aacute;o ngắn sẽ ph&ugrave; hợp với những người c&oacute; đầu nhỏ bởi cổ &aacute;o nhỏ sẽ khiến đầu bạn c&oacute; cảm gi&aacute;c to hơn.</p>\r\n\r\n<p><em><strong>Trang phục phối c&ugrave;ng</strong></em>: Bạn c&oacute; thể lựa chọn kiểu cổ &aacute;o n&agrave;y cho nhiều loại trang phục kh&aacute;c nhau, nhưng cổ &aacute;o bẻ rộng n&agrave;y sẽ l&agrave; sự lựa chọn tuyệt vời khi mặc với &aacute;o kho&aacute;c suit v&agrave; c&agrave; vạt. Bạn n&ecirc;n chọn kiểu thắt c&agrave; vạt n&uacute;t to rộng như&nbsp;<a href=\"https://canifa.com/blog/cach-that-ca-vat-dep/#Kieu_Full_Windsor_Tie_Knot\" target=\"_blank\">kiểu thắt Windsor</a>&nbsp;với cổ &aacute;o n&agrave;y.</p>\r\n\r\n<p><img alt=\"cổ áo sơ mi kiểu bẻ rộng cổ điển\" src=\"https://s3-ap-southeast-1.amazonaws.com/canifablog/blog/wp-content/uploads/2018/03/14150442/co-ao-so-mi-14.jpg\" style=\"height:600px; width:400px\" /></p>\r\n\r\n<h4>Cổ &aacute;o bẻ rộng nửa (Semi Spread Collar)</h4>\r\n\r\n<p><img alt=\"cổ áo sơ mi kiểu bẻ rộng một nửa\" src=\"https://s3-ap-southeast-1.amazonaws.com/canifablog/blog/wp-content/uploads/2018/03/14150627/co-ao-so-mi-15.png\" style=\"height:273px; width:600px\" /></p>\r\n\r\n<p><em><strong>Đặc điểm:</strong>&nbsp;</em>Kiểu cổ n&agrave;y l&agrave; &ldquo;anh em xa&rdquo; của cổ &aacute;o nhọn, kh&aacute;c biệt ở mỗi độ mở của cổ &aacute;o. Độ mở của cổ &aacute;o c&oacute; số đo từ 10 &ndash; 15 cm v&agrave; kiểu cổ n&agrave;y to hơn kiểu cổ bẻ rộng cổ điển.</p>\r\n\r\n<p><em><strong>Kiểu khu&ocirc;n mặt ph&ugrave; hợp:</strong></em>&nbsp;Ph&ugrave; hợp với khu&ocirc;n mặt gầy, d&agrave;i hoặc người c&oacute; cổ d&agrave;i.</p>\r\n\r\n<p><em><strong>Trang phục phối c&ugrave;ng</strong></em>: Ph&ugrave; hợp với c&aacute;c kiểu trang phục c&ocirc;ng sở với n&uacute;t thắt c&agrave; vạt lớn</p>\r\n\r\n<p>Ngo&agrave;i hai kiểu cổ phổ biến tr&ecirc;n, cổ &aacute;o bẻ rộng c&ograve;n c&oacute; loại bẻ rộng (Wide spread) v&agrave; loại bẻ c&oacute; đường cong (Curved wide spread). Hai kiểu cổ n&agrave;y c&oacute; chiều d&agrave;i từ mũi cổ &aacute;o d&agrave;i hơn, khoảng 9cm.</p>\r\n\r\n<p><img alt=\"cổ áo sơ mi kiểu bẻ rộng một nửa\" src=\"https://s3-ap-southeast-1.amazonaws.com/canifablog/blog/wp-content/uploads/2018/03/14152124/co-ao-so-mi-16.jpg\" style=\"height:400px; width:600px\" /></p>\r\n\r\n<h3>Một số kiểu cổ &aacute;o đặc biệt</h3>\r\n\r\n<p>Ngo&agrave;i những kiểu cổ &aacute;o thường thấy ở tr&ecirc;n,&nbsp;<strong>CANIFA</strong>&nbsp;c&ograve;n muốn giới thiệu cho c&aacute;c bạn một số kiểu cổ &aacute;o đặc biệt v&agrave; &iacute;t thấy hơn. H&atilde;y c&ugrave;ng kh&aacute;m ph&aacute; th&ocirc;i n&agrave;o!</p>\r\n\r\n<h4>Cổ &aacute;o c&oacute; dải (Tab collar)</h4>\r\n\r\n<p><img alt=\"cổ áo sơ mi có dải\" src=\"https://s3-ap-southeast-1.amazonaws.com/canifablog/blog/wp-content/uploads/2018/03/14152314/co-ao-so-mi-17.png\" style=\"height:354px; width:542px\" /></p>\r\n\r\n<p><em><strong>Đặc điểm:</strong>&nbsp;</em>Kiểu cổ &aacute;o n&agrave;y c&oacute; th&ecirc;m 1 dải vải nhỏ giữa hai mũi cổ &aacute;o thường được cố định lại bằng khuy c&agrave;i nằm ph&iacute;a dưới phần thắt c&agrave; vạt. C&aacute;ch thiết kế n&agrave;y gi&uacute;p c&agrave; vạt lu&ocirc;n được đẩy l&ecirc;n tr&ecirc;n v&agrave; nổi bật hơn.</p>\r\n\r\n<p><em><strong>Kiểu khu&ocirc;n mặt ph&ugrave; hợp:</strong></em>&nbsp;Ở đ&acirc;y, thay v&igrave; chọn kiểu khu&ocirc;n mặt ph&ugrave; hợp, cổ &aacute;o Tab sẽ gi&uacute;p người c&oacute; cổ d&agrave;i che giấu được khuyết điểm.</p>\r\n\r\n<p><em><strong>Trang phục phối c&ugrave;ng:</strong></em>&nbsp;Kiểu cổ &aacute;o n&agrave;y lu&ocirc;n phải mặc c&ugrave;ng c&agrave; vạt.</p>\r\n\r\n<p><img alt=\"cổ áo sơ mi có dải\" src=\"https://s3-ap-southeast-1.amazonaws.com/canifablog/blog/wp-content/uploads/2018/03/14152423/co-ao-so-mi-18.jpg\" style=\"height:457px; width:800px\" /></p>\r\n\r\n<h4>Cổ &aacute;o c&oacute; lỗ xỏ (Pin collar)</h4>\r\n\r\n<p><img alt=\"cổ áo sơ mi có lỗ xỏ\" src=\"https://s3-ap-southeast-1.amazonaws.com/canifablog/blog/wp-content/uploads/2018/03/14152615/co-ao-so-mi-19.png\" style=\"height:374px; width:591px\" /></p>\r\n\r\n<p><em><strong>Đặc điểm:</strong></em>&nbsp;Ở mỗi b&ecirc;n cổ &aacute;o c&oacute; một lỗ để xỏ v&agrave;o một thanh ngang trang tr&iacute; dưới phần thắt c&agrave; vạt gi&uacute;p đẩy c&agrave; vạt l&ecirc;n tr&ecirc;n v&agrave; đồng thời trang tr&iacute; cho cổ &aacute;o.</p>\r\n\r\n<p><em><strong>Kiểu khu&ocirc;n mặt ph&ugrave; hợp:</strong></em>&nbsp;Kiểu cổ &aacute;o n&agrave;y d&agrave;nh cho những người c&oacute; cổ cao muốn che khuyết điểm</p>\r\n\r\n<p><em><strong>Trang phục phối c&ugrave;ng:</strong>&nbsp;</em>Cổ &aacute;o c&oacute; lỗ xỏ lu&ocirc;n phải mặc c&ugrave;ng c&agrave; vạt.</p>\r\n\r\n<p><img alt=\"kiểu cổ áo sơ mi có lỗ xỏ\" src=\"https://s3-ap-southeast-1.amazonaws.com/canifablog/blog/wp-content/uploads/2018/03/14152632/co-ao-so-mi-20.jpg\" style=\"height:470px; width:600px\" /></p>\r\n\r\n<p><strong>Lời kết,</strong></p>\r\n\r\n<p>Với to&agrave;n tập b&iacute; k&iacute;p về cổ &aacute;o sơ mi, c&aacute;c ch&agrave;ng chắc chắn sẽ tự tin hơn khi tự chọn những chiếc &aacute;o sơ mi cho m&igrave;nh trong bất cứ dịp n&agrave;o!&nbsp;<strong>CANIFA</strong>&nbsp;hy vọng đ&acirc;y sẽ l&agrave; b&iacute; k&iacute;p giắt t&uacute;i v&ocirc; c&ugrave;ng hữu &iacute;ch cho bạn để lu&ocirc;n mặc đẹp v&agrave; mặc đ&uacute;ng.</p>','Một trong những món đồ “cần có” trong tủ đồ của phái mạnh đó là chiếc áo sơ mi. Áo sơ mi dường như đã trở thành biểu tượng và là một item thời trang kinh điển của bất cứ ai dù họ có quan tâm đến thời trang hay không. Tuy nhiên, tưởng như sẽ chẳng còn gì để nói về chiếc áo sơ mi “quá đỗi bình thường” này, bạn sẽ thấy bất ngờ trước những gì mà bạn có thể “lắng nghe” từ món đồ này đấy!','Một trong những món đồ “cần có” trong tủ đồ của phái mạnh đó là chiếc áo sơ mi. Áo sơ mi dường như đã trở thành biểu tượng và là một item thời trang kinh điển của bất cứ ai dù họ có quan tâm đến thời trang hay không. Tuy nhiên, tưởng như sẽ chẳng còn gì để nói về chiếc áo sơ mi “quá đỗi bình thường” này, bạn sẽ thấy bất ngờ trước những gì mà bạn có thể “lắng nghe” từ món đồ này đấy!',1,'2018-04-26');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `unit_price` int(11) NOT NULL,
  `promo_price` int(11) DEFAULT '0',
  `producer` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `vote` int(5) DEFAULT '0',
  `view_count` int(11) DEFAULT '0',
  `describe` longtext COLLATE utf8_unicode_ci NOT NULL,
  `meta_keyword` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `meta_describe` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Áo sơ mi nam kẻ dài tay Aligro','ao-so-mi-nam-ke-dai-tay-aligro',6,715000,0,'Việt Nam',0,0,0,'<p>Áo sơ mi nam kẻ dài tay thương hiệu Aligro được sản xuất từ chất liệu cao cấp, họa tiết kẻ sang trọng mang đến cho phái mạnh phong cách lịch lãm, nam tính.</p>\r\n\r\n<ul>\r\n	<li>Chất liệu Cotton</li>\r\n	<li>Dáng Custom Fit</li>\r\n	<li>Cổ đức, tay dài</li>\r\n	<li>Xuất xứ: Việt Nam</li>\r\n</ul>\r\n\r\n<p>Thông tin thương hiệu</p>\r\n\r\n<p>Aligro là thương hiệu thời trang cao cấp được đăng kí bảo hộ tại Việt Nam. Tuy ra đời chưa lâu nhưng Aligro đang dần khẳng định ưu thế vượt trội bằng chất liệu sản phẩm, mẫu mã đa dạng, phong phú, là thương hiệu thời trang công sở nam cao cấp, thân thiện với môi trường, phù hợp với mọi khách hàng. Các sản phẩm Aligro mang đậm phong cách Italia nhưng lại rất phù hợp với vóc dáng của người Việt Nam. Aligro không ngừng nghiên cứu, học hỏi và lắng nghe để dòng sản phẩm cao cấp mang thương hiệu Aligro ngày một đẳng cấp hơn, đáp ứng tối đa nhu cầu của quý khách hàng và thị trường.</p>','Áo sơ mi ,Áo sơ mi nam,Áo sơ mi kẻ sọc,Áo sơ mi nam kẻ dài tay Aligro ,Áo sơ mi Việt Nam','Sản phẩm Áo sơ mi nam kẻ dài tay Aligro (PRI409474_MO3) ✔ Giá Tốt Nhất thị trường ✔ Nhiều khuyến mãi hấp dẫn ✔ Hoàn tiền đến 10% ✔ Đổi trả linh động ✔ Giao hàng miễn phí! Xem ngay!',2,'2018-04-25'),(2,'Áo sơ mi nam Fonto','ao-so-mi-nam-fonto',6,400000,0,'Việt Nam',100,0,0,'<p>Áo sơ mi nam Fonto SM043 xanh navy được may từ chất liệu vải Cotton pha cao cấp, thiết kế đơn giản mang đến cho phái mạnh phong thái lịch lãm, nam tính.</p>\r\n\r\n<ul>\r\n	<li>Chất liệu vải Cotton pha bền đẹp</li>\r\n	<li>Thiết kế cổ bẻ, tay dài lịch lãm</li>\r\n	<li>Dáng Slim Fit ôm vừa vặn cơ thể</li>\r\n	<li>Xuất xứ: Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>Thông tin thương hiệu</strong></p>\r\n\r\n<p>Fonto tự hào là 1 trong 10 thương hiệu vest cưới, vest công sở hàng đầu Việt Nam. Fonto ra đời với mong muốn giới thiệu đến người tiêu dùng những mẫu mã thời trang bắt kịp với xu hướng của thời trang thế giới, những sản phẩm của Fonto được thiết kế theo phong cách đơn giản, đẹp mắt nhưng không kém phần lịch lãm và sang trọng. Từ khi xuất hiện trên thị trường Fonto đã được người tiêu dùng yêu thích, đón nhận bởi mỗi sản phẩm của Fonto đều được kiểm tra nghiêm ngặt từ khâu lựa chọn chất liệu, thiết kế đến khâu sản xuất. Fonto hứa hẹn sẽ làm hài lòng quý khách hàng bằng những sản phẩm chất lượng và giá cả hợp lý nhất. </p>','Áo sơ mi,Áo sơ mi nam,Áo sơ mi nam Fonto SM043 xanh navy','Sản phẩm Áo sơ mi nam Fonto SM043 xanh navy (PRI981203_LP7) ✔ Giá Tốt Nhất thị trường ✔ Nhiều khuyến mãi hấp dẫn ✔ Hoàn tiền đến 10% ✔ Đổi trả linh động ✔ Giao hàng miễn phí! Xem ngay!',2,'2018-04-25'),(3,'Áo sơ mi nam Mattana Slimfit','ao-so-mi-nam-mattana-slimfit',6,615000,0,'Việt Nam',100,0,0,'<p>&Aacute;o sơ mi nam d&agrave;i tay Mattana Slimfit m&agrave;u t&iacute;m được may từ chất liệu vải Cotton mềm mịn, đường may tỉ mỉ, tinh tế chuẩn phom v&ocirc; c&ugrave;ng thoải m&aacute;i khi mặc. Thiết kế d&aacute;ng slimfit &ocirc;m s&aacute;t mang lại sự trẻ trung, nam t&iacute;nh cho ph&aacute;i mạnh. Kh&eacute;o l&eacute;o kết hợp trang phục c&ugrave;ng phụ kiện ph&ugrave; hợp, bạn c&oacute; thể biến tấu phong c&aacute;ch của m&igrave;nh trong nhiều ho&agrave;n cảnh v&agrave; thời điểm kh&aacute;c nhau.</p>\r\n\r\n<ul>\r\n	<li>Chất liệu vải Cotton mềm mịn</li>\r\n	<li>&Aacute;o sơ mi nam cổ đức, tay d&agrave;i</li>\r\n	<li>D&aacute;ng slimfit</li>\r\n	<li>Xuất xứ: Việt Nam.</li>\r\n</ul>\r\n\r\n<p>Th&ocirc;ng tin thương hiệu</p>\r\n\r\n<p>Mattana l&agrave; thương hiệu của NBC - Tổng c&ocirc;ng ty may mặc nổi tiếng tại Việt Nam với bề d&agrave;y lịch sử hơn 35 năm h&igrave;nh th&agrave;nh v&agrave; ph&aacute;t triển. Tuy mang phong c&aacute;ch ch&acirc;u &Acirc;u nhưng Mattana lại rất ph&ugrave; hợp với người ti&ecirc;u d&ugrave;ng Việt Nam, từ v&oacute;c d&aacute;ng đến chất liệu, kỹ thuật cắt may&hellip; Đặc biệt, Mattana hiện c&oacute; những d&ograve;ng sản phẩm như: &Aacute;o sơ mi được sản xuất tr&ecirc;n d&acirc;y chuyền c&ocirc;ng nghệ hiện đại, cổ &aacute;o, nẹp &aacute;o, măng s&eacute;c phẳng; V&ograve;ng n&aacute;ch, sườn rất phẳng sau khi giặt; Quần t&acirc;y được sử dụng c&ocirc;ng nghệ ủi &eacute;p cao cấp, tạo độ sắc n&eacute;t v&agrave; giữ đứng ly quần trong qu&aacute; tr&igrave;nh sử dụng. Hiện nay, Mattana đ&atilde; c&oacute; mặt tại c&aacute;c tỉnh th&agrave;nh lớn v&agrave; c&aacute;c trung t&acirc;m thương mại tr&ecirc;n to&agrave;n quốc với chuỗi hệ thống hơn 100 cửa h&agrave;ng phủ đều khắp cả nước.</p>','Áo sơ mi,Áo sơ mi dài tay,Áo sơ mi nam dài tay Mattana Slimfit','Sản phẩm Áo sơ mi nam dài tay Mattana Slimfit màu tím  (1330659_PWS) ✔ Giá Tốt Nhất thị trường ✔ Nhiều khuyến mãi hấp dẫn ✔ Hoàn tiền đến 10% ✔ Đổi trả linh động ✔ Giao hàng miễn phí! Xem ngay!',2,'2018-04-25'),(4,'Áo sơ mi nam dài tay Hasa','ao-so-mi-nam-dai-tay-hasa',6,395000,0,'Việt Nam',100,0,0,'<p>&Aacute;o sơ mi nam d&agrave;i tay Hasa 11211 xanh biển nhạt được may từ chất liệu vải bền đẹp,&nbsp;mềm mịn, kiểu d&aacute;ng đơn giản, tinh tế, mang đến sự thanh lịch, hiện đại, nam t&iacute;nh cho ph&aacute;i mạnh.</p>\r\n\r\n<ul>\r\n	<li>Chất liệu vải Cotton&nbsp;</li>\r\n	<li>&Aacute;o sơ mi d&agrave;i tay</li>\r\n	<li>D&aacute;ng Regular Fit</li>\r\n	<li>Xuất xứ: Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>Th&ocirc;ng tin thương hiệu</strong></p>\r\n\r\n<p>Hasa l&agrave; thương hiệu thời trang đ&atilde; xuất hiện từ c&aacute;ch đ&acirc;y hơn 10 năm, trong qu&aacute; tr&igrave;nh ph&aacute;t triển của m&igrave;nh, c&aacute;c sản phẩm thời trang mang thương hiệu Hasa đ&atilde; được xuất khẩu ra nhiều nước tr&ecirc;n thế giới. Đặc biệt l&agrave; c&aacute;c chủng loại mặt h&agrave;ng dệt kim mang thương hiệu Hasa được Vinatex đ&aacute;nh gi&aacute; rất cao, lu&ocirc;n lu&ocirc;n nằm trong nh&oacute;m những mặt h&agrave;ng chủ chốt của Vinatex. C&aacute;c sản phẩm thời trang mang thương hiệu Hasa bao gồm: Thời trang nam, thời trang nữ, thời trang thể thao, thời trang trẻ em. Hầu hết c&aacute;c mẫu thời trang Hasa cung cấp ra thị trường nhận được sự ủng hộ, sự đ&aacute;nh gi&aacute; cao của kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>&nbsp;</p>','Áo sơ mi,Áo sơ mi nam,Áo sơ mi nam dài tay Hasa','Sản phẩm Áo sơ mi nam dài tay Hasa 11211 xanh biển nhạt (PRI1159751_OH6) ✔ Giá Tốt Nhất thị trường ✔ Nhiều khuyến mãi hấp dẫn ✔ Hoàn tiền đến 10% ✔ Đổi trả linh động ✔ Giao hàng miễn phí! Xem ngay!',2,'2018-04-25'),(5,'Áo sơ mi nam ngắn tay Hasa','ao-so-mi-nam-ngan-tay-hasa',6,355000,0,'Việt Nam',100,0,0,'<p>&Aacute;o sơ mi nam ngắn tay Hasa họa tiết kẻ được may từ chất liệu vải bền đẹp,&nbsp;mềm mịn, kiểu d&aacute;ng đơn giản, tinh tế, mang đến sự trẻ trung, hiện đại, nam t&iacute;nh cho ph&aacute;i mạnh.</p>\r\n\r\n<ul>\r\n	<li>Chất liệu vải Cotton&nbsp;</li>\r\n	<li>&Aacute;o sơ mi ngắn&nbsp;tay</li>\r\n	<li>D&aacute;ng Regular Fit</li>\r\n	<li>Xuất xứ: Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>Th&ocirc;ng tin thương hiệu</strong></p>\r\n\r\n<p>Hasa l&agrave; thương hiệu thời trang đ&atilde; xuất hiện từ c&aacute;ch đ&acirc;y hơn 10 năm, trong qu&aacute; tr&igrave;nh ph&aacute;t triển của m&igrave;nh, c&aacute;c sản phẩm thời trang mang thương hiệu Hasa đ&atilde; được xuất khẩu ra nhiều nước tr&ecirc;n thế giới. Đặc biệt l&agrave; c&aacute;c chủng loại mặt h&agrave;ng dệt kim mang thương hiệu Hasa được Vinatex đ&aacute;nh gi&aacute; rất cao, lu&ocirc;n lu&ocirc;n nằm trong nh&oacute;m những mặt h&agrave;ng chủ chốt của Vinatex. C&aacute;c sản phẩm thời trang mang thương hiệu Hasa bao gồm: Thời trang nam, thời trang nữ, thời trang thể thao, thời trang trẻ em. Hầu hết c&aacute;c mẫu thời trang Hasa cung cấp ra thị trường nhận được sự ủng hộ, sự đ&aacute;nh gi&aacute; cao của kh&aacute;ch h&agrave;ng.</p>','Áo sơ mi,Áo sơ mi ngắn tay,Áo sơ mi ngắn tay Hasa','Sản phẩm Áo sơ mi nam ngắn tay Hasa 11227 họa tiết kẻ (PRI1159905_OH6) ✔ Giá Tốt Nhất thị trường ✔ Nhiều khuyến mãi hấp dẫn ✔ Hoàn tiền đến 10% ✔ Đổi trả linh động ✔ Giao hàng miễn phí! Xem ngay!',2,'2018-04-25'),(6,'Áo sơ mi nam Fit Mattana','ao-so-mi-nam-fit-mattana',6,635000,200000,'Việt Nam',100,0,0,'<p>Áo sơ mi nam Classic Fit Mattana được may từ chất liệu cao cấp, mềm mại đem đến cảm giác thoải mái khi sử dụng. Thiết kế đơn giản, tinh tế, mang đến vẻ trẻ trung, mang đến sự thanh lịch, nam tính cho phái mạnh.</p>\r\n\r\n<ul>\r\n	<li>Chất liệu 100% Cotton</li>\r\n	<li>Áo sơ mi cổ đức, tay dài</li>\r\n	<li>Dáng áo Classic Fit</li>\r\n	<li>Xuất xứ: Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>Thông tin thương hiệu</strong></p>\r\n\r\n<p>Mattana là thương hiệu của NBC - Tổng công ty may mặc hàng đầu tại Việt Nam với bề dày lịch sử hơn 35 năm hình thành và phát triển. Tuy mang phong cách Châu Âu nhưng Mattana lại rất phù hợp với người tiêu dùng Việt Nam từ vóc dáng, chất liệu đến kỹ thuật cắt may. Đặc biệt, Mattana hiện có những dòng sản phẩm như: áo sơ mi được sản xuất trên dây chuyền công nghệ hiện đại nhất hiện nay, cổ áo, nẹp áo, măng séc phẳng, không bị dọp; vòng nách, sườn rất phẳng sau khi giặt; quần tây được sử dụng công nghệ ủi ép cao cấp, tạo độ sắc nét và giữ đứng ly quần trong quá trình sử dụng. Hiện nay, Mattana đã có mặt tại các tỉnh thành lớn và các trung tâm thương mại trên toàn quốc với chuỗi hệ thống hơn 100 cửa hàng phủ đều khắp cả nước.</p>','Áo sơ mi dài tay ,Áo sơ mi, Áo sơ mi nam Classic Fit Mattana','Sản phẩm Áo sơ mi nam Classic Fit Mattana (PRI1043370_PWS) ✔ Giá Tốt Nhất thị trường ✔ Nhiều khuyến mãi hấp dẫn ✔ Hoàn tiền đến 10% ✔ Đổi trả linh động ✔ Giao hàng miễn phí! Xem ngay!',1,'2018-04-25'),(7,'Đầm công sở HeraDG xanh','Đam-cong-so-heradg-xanh',14,1368000,0,'Việt Nam',100,0,0,'<ul>\r\n	<li>Chất liệu vải Cotton pha bền đẹp</li>\r\n	<li>Thiết kế cổ V, tay lỡ, ngực 3 khuy cài</li>\r\n	<li>Chiết eo nhẹ tôn dáng, eo phối đai</li>\r\n	<li>Xuất xứ: Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>Thông tin thương hiệu</strong></p>\r\n\r\n<p>HeraDG là thương hiệu thời trang trung và cao cấp dành cho phái đẹp của Tổng công ty Đức Giang. Các sản phẩm mang thương hiệu HeraDG được thiết kế theo ba phong cách riêng biệt: Thời trang trẻ hiện đại, năng động; Thời trang công sở thanh lịch, duyên dáng và Thời trang cao cấp sang trọng, tinh tế, phù hợp với những nữ doanh nhân thành đạt. Với tiêu chí \"Đẹp mãi cùng thời gian\", nhãn hàng HeraDG sẽ mang đến cho phái đẹp những diện mạo tuyệt vời cùng phong cách trang phục được cập nhật theo xu hướng thời trang thế giới.</p>','Đầm công sở,Đầm công sở HeraDG WDC17030 xanh kẻ hồng,Đầm nữ','Sản phẩm Đầm công sở HeraDG WDC17030 xanh kẻ hồng  (1348286_Q24) ✔ Giá Tốt Nhất thị trường ✔ Nhiều khuyến mãi hấp dẫn ✔ Hoàn tiền đến 10% ✔ Đổi trả linh động ✔ Giao hàng miễn phí! Xem ngay!',2,'2018-05-05'),(8,'Chân váy công sở HeraDG  đỏ','chan-vay-cong-so-heradg--đo',14,798000,0,'Việt Nam',100,0,0,'<ul>\r\n	<li>Chất liệu vải kaki bền đẹp</li>\r\n	<li>Thiết kế cạp cao, khóa kéo sau lưng</li>\r\n	<li>Dáng ôm nhẹ, xẻ sau</li>\r\n	<li>Vạt xếp lệch phối 3 khuy trang trí</li>\r\n	<li>Xuất xứ: Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>Thông tin thương hiệu</strong></p>\r\n\r\n<p>HeraDG là thương hiệu thời trang trung và cao cấp dành cho phái đẹp của Tổng công ty Đức Giang. Các sản phẩm mang thương hiệu HeraDG được thiết kế theo ba phong cách riêng biệt: Thời trang trẻ hiện đại, năng động; Thời trang công sở thanh lịch, duyên dáng và Thời trang cao cấp sang trọng, tinh tế, phù hợp với những nữ doanh nhân thành đạt. Với tiêu chí \"Đẹp mãi cùng thời gian\", nhãn hàng HeraDG sẽ mang đến cho phái đẹp những diện mạo tuyệt vời cùng phong cách trang phục được cập nhật theo xu hướng thời trang thế giới.</p>\r\n\r\n<p> </p>','Chân váy công sở,Chân váy công sở HeraDG màu đỏ','Sản phẩm Chân váy công sở HeraDG WJP17027 màu đỏ (143065_Q24) ✔ Giá Tốt Nhất thị trường ✔ Nhiều khuyến mãi hấp dẫn ✔ Hoàn tiền đến 10% ✔ Đổi trả linh động ✔ Giao hàng miễn phí! Xem ngay!',2,'2018-05-05'),(10,'Đầm công sở GRUSZ LDS','Đam-cong-so-grusz-lds',14,1568000,0,'Việt Nam',100,0,0,'<p>Đầm công sở GRUSZ LDS/191568 phối màu được may từ chất liệu vải cao cấp, thiết kế thời thượng cùng đường chỉ may tinh tế sẽ là gợi ý hoàn hảo mang đến cho quý cô công sở phong cách thanh lịch mà vẫn đẳng cấp và hợp thời trang.</p>\r\n\r\n<ul>\r\n	<li>Thành phần vải: 72% Cotton, 24% Polyester, 4% Spandex</li>\r\n	<li>Có lớp vải lót</li>\r\n	<li>Thiết kế cổ tròn, tay vai chờm</li>\r\n	<li>Dáng ôm nhẹ, xẻ sau, khóa lưng</li>\r\n	<li>Xuất xứ: Việt Nam</li>\r\n	<li>Size người mẫu mặc: M. Số đo người mẫu: 82 - 60 - 87 - 175 (cm)</li>\r\n</ul>\r\n\r\n<p>GRUSZ là thương hiệu chuyên cung cấp các sản phẩm thời trang của Tổng công ty May 10. Khởi đầu là một xưởng nhỏ chuyên may quân trang phục vụ kháng chiến chống Pháp, qua 70 năm xây dựng và phát triển, Tổng công ty May 10 đã trở thành một trong những doanh nghiệp hàng đầu của ngành dệt may Việt Nam với 18 đơn vị thành viên tại 7 tỉnh thành trong cả nước, khẳng định được tiềm lực và vị thế dẫn đầu của mình ngay cả trong giai đoạn kinh tế khủng hoảng. Thời gian qua, May 10 là đối tác tin cậy của hầu hết các thương hiệu thời trang lớn trên thế giới như Pierre Cardin, Vanheusen, Calvin Klein, Old Navy... </p>','Đầm công sở,Sản phẩm Đầm công sở GRUSZ LDS','Sản phẩm Đầm công sở GRUSZ LDS/191568 phối màu (PRI1118769_PQ4) ✔ Giá Tốt Nhất thị trường ✔ Nhiều khuyến mãi hấp dẫn ✔ Hoàn tiền đến 10% ✔ Đổi trả linh động ✔ Giao hàng miễn phí! Xem ngay!',2,'2018-05-05'),(11,'Chân váy công sở HeraDG màu đen','chan-vay-cong-so-heradg-mau-đen',14,898000,0,'Việt Nam',100,0,0,'<p>Ch&acirc;n v&aacute;y c&ocirc;ng sở HeraDG FJ3498 m&agrave;u đen sở hữu thiết kế nữ t&iacute;nh thanh lịch, cho bạn h&igrave;nh ảnh tươi mới đầy sức sống mỗi khi tới c&ocirc;ng sở. Kết hợp với chất liệu vải mềm mại, th&ocirc;ng tho&aacute;ng, sản phẩm đem lại cảm gi&aacute;c thoải m&aacute;i cho người mặc.&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Chất liệu vải cao cấp, mềm mại, c&oacute; độ bền cao</li>\r\n	<li>C&oacute; lớp l&oacute;t mượt m&agrave;</li>\r\n	<li>Thiết kế d&aacute;ng đu&ocirc;i c&aacute; với những đường n&eacute;t tinh tế</li>\r\n	<li>Kh&oacute;a h&ocirc;ng chắc chắn, mượt m&agrave;</li>\r\n	<li>Xuất xứ: Việt Nam</li>\r\n	<li>Size người mẫu mặc: S. Số đo người mẫu:&nbsp;84 - 65 - 91 - 168 (cm)</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Th&ocirc;ng tin thương hiệu</strong></p>\r\n\r\n<p>HeraDG l&agrave; thương hiệu thời trang trung v&agrave; cao cấp d&agrave;nh cho ph&aacute;i đẹp của tổng c&ocirc;ng ty Đức Giang. C&aacute;c sản phẩm mang thương hiệu HeraDG được thiết kế theo ba phong c&aacute;ch ri&ecirc;ng biệt: Thời trang trẻ hiện đại, năng động; thời trang c&ocirc;ng sở thanh lịch, duy&ecirc;n d&aacute;ng v&agrave; thời trang cao cấp sang trọng, tinh tế, ph&ugrave; hợp với những nữ doanh nh&acirc;n th&agrave;nh đạt. Với ti&ecirc;u ch&iacute; &quot; Đẹp m&atilde;i c&ugrave;ng thời gian&quot;, nh&atilde;n h&agrave;ng HeraDG sẽ mang đến cho ph&aacute;i đẹp những cảm nhận tuyệt vời c&ugrave;ng phong c&aacute;ch trang phục được cập nhật theo xu hướng thời trang thế giới.</p>','Sản phẩm Chân váy công sở HeraDG FJ3498 màu đen (PRI1042100_Q24) ✔ Giá Tốt Nhất thị trường ✔ Nhiều khuyến mãi hấp dẫn ✔ Hoàn tiền đến 10% ✔ Đổi trả linh động ✔ Giao hàng miễn phí! Xem ngay!','Sản phẩm Chân váy công sở HeraDG FJ3498 màu đen (PRI1042100_Q24) ✔ Giá Tốt Nhất thị trường ✔ Nhiều khuyến mãi hấp dẫn ✔ Hoàn tiền đến 10% ✔ Đổi trả linh động ✔ Giao hàng miễn phí! Xem ngay!',1,'2018-05-05'),(12,'Chân váy công sở  WJP17028 màu đen','chan-vay-cong-so--wjp17028-mau-đen',14,698000,0,'Việt Nam',100,0,0,'<ul>\r\n	<li>Chất liệu vải Cotton pha bền đẹp</li>\r\n	<li>Thiết kế cạp cao, khóa kéo sau lưng</li>\r\n	<li>Dáng chữ A</li>\r\n	<li>Phối 5 khuy trang trí</li>\r\n	<li>Xuất xứ: Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>Thông tin thương hiệu</strong></p>\r\n\r\n<p>HeraDG là thương hiệu thời trang trung và cao cấp dành cho phái đẹp của Tổng công ty Đức Giang. Các sản phẩm mang thương hiệu HeraDG được thiết kế theo ba phong cách riêng biệt: Thời trang trẻ hiện đại, năng động; Thời trang công sở thanh lịch, duyên dáng và Thời trang cao cấp sang trọng, tinh tế, phù hợp với những nữ doanh nhân thành đạt. Với tiêu chí \"Đẹp mãi cùng thời gian\", nhãn hàng HeraDG sẽ mang đến cho phái đẹp những diện mạo tuyệt vời cùng phong cách trang phục được cập nhật theo xu hướng thời trang thế giới.</p>\r\n\r\n<p> </p>','Sản phẩm Chân váy công sở HeraDG WJP17028 màu đen (143087_Q24) ✔ Giá Tốt Nhất thị trường ✔ Nhiều khuyến mãi hấp dẫn ✔ Hoàn tiền đến 10% ✔ Đổi trả linh động ✔ Giao hàng miễn phí! Xem ngay!','Sản phẩm Chân váy công sở HeraDG WJP17028 màu đen (143087_Q24) ✔ Giá Tốt Nhất thị trường ✔ Nhiều khuyến mãi hấp dẫn ✔ Hoàn tiền đến 10% ✔ Đổi trả linh động ✔ Giao hàng miễn phí! Xem ngay!',1,'2018-05-05'),(13,'Đầm công sở  WDC17030 đen','Đam-cong-so--wdc17030-đen',14,1368000,1200000,'Việt Nam',100,0,0,'<ul>\r\n	<li>Chất liệu vải Cotton pha bền đẹp</li>\r\n	<li>Thiết kế cổ V, tay lỡ, ngực 3 khuy cài</li>\r\n	<li>Chiết eo nhẹ tôn dáng, eo phối đai</li>\r\n	<li>Xuất xứ: Việt Nam</li>\r\n</ul>\r\n\r\n<p><strong>Thông tin thương hiệu</strong></p>\r\n\r\n<p>HeraDG là thương hiệu thời trang trung và cao cấp dành cho phái đẹp của Tổng công ty Đức Giang. Các sản phẩm mang thương hiệu HeraDG được thiết kế theo ba phong cách riêng biệt: Thời trang trẻ hiện đại, năng động; Thời trang công sở thanh lịch, duyên dáng và Thời trang cao cấp sang trọng, tinh tế, phù hợp với những nữ doanh nhân thành đạt. Với tiêu chí \"Đẹp mãi cùng thời gian\", nhãn hàng HeraDG sẽ mang đến cho phái đẹp những diện mạo tuyệt vời cùng phong cách trang phục được cập nhật theo xu hướng thời trang thế giới.</p>\r\n\r\n<p> </p>','Sản phẩm Đầm công sở HeraDG WDC17030 đen kẻ đỏ  (1348282_Q24) ✔ Giá Tốt Nhất thị trường ✔ Nhiều khuyến mãi hấp dẫn ✔ Hoàn tiền đến 10% ✔ Đổi trả linh động ✔ Giao hàng miễn phí! Xem ngay!','Sản phẩm Đầm công sở HeraDG WDC17030 đen kẻ đỏ  (1348282_Q24) ✔ Giá Tốt Nhất thị trường ✔ Nhiều khuyến mãi hấp dẫn ✔ Hoàn tiền đến 10% ✔ Đổi trả linh động ✔ Giao hàng miễn phí! Xem ngay!',1,'2018-05-05'),(14,'Đầm công sở Cleopatre II xanh dương','Đam-cong-so-cleopatre-ii-xanh-duong',14,668000,0,'Việt Nam',100,0,0,'<p>Đầm c&ocirc;ng sở May 10 Cleopatre II LDS/21668 xanh dương được may từ chất liệu vải cao cấp, thiết kế tay x&ograve;e điệu đ&agrave;&nbsp;c&ugrave;ng đường chỉ may tinh tế sẽ l&agrave; gợi &yacute; ho&agrave;n hảo mang đến cho qu&yacute; c&ocirc; c&ocirc;ng sở phong c&aacute;ch thanh lịch m&agrave; vẫn đẳng cấp v&agrave; hợp thời trang.</p>\r\n\r\n<ul>\r\n	<li>Th&agrave;nh phần vải: 100% Cotton</li>\r\n	<li>Thiết kế cổ thuyền, tay ngắn phối b&egrave;o x&ograve;e</li>\r\n	<li>D&aacute;ng chữ A, chiết eo nhẹ,&nbsp;kh&oacute;a lưng</li>\r\n	<li>Xuất xứ: Việt Nam</li>\r\n	<li>Size người mẫu mặc: S. Số đo người mẫu: 79 - 63 - 89 - 174 (cm)</li>\r\n</ul>\r\n\r\n<p><strong>Th&ocirc;ng tin thương hiệu</strong></p>\r\n\r\n<p>May 10 l&agrave; thương hiệu chuy&ecirc;n cung cấp c&aacute;c sản phẩm thời trang của Tổng c&ocirc;ng ty May 10. Khởi đầu l&agrave; một xưởng nhỏ chuy&ecirc;n may qu&acirc;n trang phục vụ kh&aacute;ng chiến chống Ph&aacute;p, qua 70 năm x&acirc;y dựng v&agrave; ph&aacute;t triển, Tổng c&ocirc;ng ty May 10 đ&atilde; trở th&agrave;nh một trong những doanh nghiệp h&agrave;ng đầu của ng&agrave;nh dệt may Việt Nam với 18 đơn vị th&agrave;nh vi&ecirc;n tại 7 tỉnh th&agrave;nh trong cả nước, khẳng định được tiềm lực v&agrave; vị thế dẫn đầu của m&igrave;nh ngay cả trong giai đoạn kinh tế khủng hoảng</p>','Sản phẩm Đầm công sở May 10 Cleopatre II LDS/21668 xanh dương (PRI1193794_PQ4) ✔ Giá Tốt Nhất thị trường ✔ Nhiều khuyến mãi hấp dẫn ✔ Hoàn tiền đến 10% ✔ Đổi trả linh động ✔ Giao hàng miễn phí! Xem ngay!','Sản phẩm Đầm công sở May 10 Cleopatre II LDS/21668 xanh dương (PRI1193794_PQ4) ✔ Giá Tốt Nhất thị trường ✔ Nhiều khuyến mãi hấp dẫn ✔ Hoàn tiền đến 10% ✔ Đổi trả linh động ✔ Giao hàng miễn phí! Xem ngay!',1,'2018-05-05'),(15,'Đầm công sở YMY tím nhạt','Đam-cong-so-ymy-tim-nhat',14,2399200,2351200,'Việt Nam',100,0,0,'<p>Đầm công sở YMY tím nhạt phối ren ghi điểm với chi tiết hoa văn đen nổi bật cùng kiểu dáng trẻ trung và thanh lịch, giúp phái đẹp thêm phần duyên dáng và cuốn hút khi dạo phố. Đầm được may từ chất liệu mềm mại, đường may tỉ mỉ, mang lại form dáng chuẩn cho người mặc. </p>\r\n\r\n<ul>\r\n	<li>Chất liệu vải thun Cotton co giãn</li>\r\n	<li>Thiết kế cổ tròn, tay ngắn thanh lịch</li>\r\n	<li>Tay áo và chân đầm phối hoa văn thời trang</li>\r\n	<li>Eo đính nơ xinh xắn</li>\r\n	<li>Đường may tỉ mỉ, bền chắc</li>\r\n	<li>Sản xuất tại Việt Nam</li>\r\n	<li>Size mẫu mặc: S. Số đo mẫu: 85 - 63 - 94 - 173 (cm)</li>\r\n</ul>\r\n\r\n<p><strong>Thông tin thương hiệu</strong></p>\r\n\r\n<p>YMY định vị trên thị trường là một thương hiệu thời trang cao cấp dành cho nữ nhưng điều đặc biệt chính là với giá cả phải chăng. YMY mong muốn được làm thỏa mãn những nhu cầu mặc đẹp, hợp gu và thời trang của tất cả phái đẹp và trên hết là những ai có khao khát trở thành một \"fashionista\" thực thụ. Với nhiều năm kinh nghiệm trong lĩnh vực thời trang và quan tâm đến các hoạt động thời trang trong nước và thế giới, hơn ai hết người sáng lập MYM hiểu rõ giá trị đích thực của từ \"fashionista\". Để từ đó, YMY ra đời mang tinh thần và đẳng cấp của những sản phẩm thời trang quốc tế, kết tinh từ những phẩm chất mạnh mẽ để đáp ứng được khát vọng gắn kết với thời trang của thế hệ phụ nữ hiện đại.</p>\r\n\r\n<p> </p>','Sản phẩm Đầm công sở YMY tím nhạt phối ren (PRI902355_N5D) ✔ Giá Tốt Nhất thị trường ✔ Nhiều khuyến mãi hấp dẫn ✔ Hoàn tiền đến 10% ✔ Đổi trả linh động ✔ Giao hàng miễn phí! Xem ngay!','Sản phẩm Đầm công sở YMY tím nhạt phối ren (PRI902355_N5D) ✔ Giá Tốt Nhất thị trường ✔ Nhiều khuyến mãi hấp dẫn ✔ Hoàn tiền đến 10% ✔ Đổi trả linh động ✔ Giao hàng miễn phí! Xem ngay!',1,'2018-05-05');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'Quản trị cao cấp',1),(2,'Nhân viên',2);
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `size`
--

DROP TABLE IF EXISTS `size`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `size` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `size` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `size_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `size`
--

LOCK TABLES `size` WRITE;
/*!40000 ALTER TABLE `size` DISABLE KEYS */;
INSERT INTO `size` VALUES (3,2,'S'),(4,2,'M'),(5,2,'L'),(6,2,'XL'),(7,3,'S'),(8,3,'M'),(9,3,'L'),(10,3,'XL'),(11,4,'S'),(12,4,'M'),(13,4,'L'),(14,4,'XL'),(15,5,'S'),(16,5,'M'),(17,5,'L'),(18,6,'S'),(19,6,'M'),(20,6,'L'),(21,6,'XL'),(22,7,'S'),(23,7,'M'),(24,7,'L'),(25,8,'S'),(26,8,'M'),(27,8,'L'),(31,10,'S'),(32,10,'M'),(33,10,'L'),(34,11,'S'),(35,11,'M'),(36,11,'L'),(37,12,'S'),(38,12,'M'),(39,12,'L'),(40,13,'S'),(41,13,'M'),(42,13,'L'),(43,14,'S'),(44,14,'M'),(45,14,'L'),(46,15,'S'),(47,15,'M'),(48,15,'L'),(49,1,'S'),(50,1,'M'),(51,1,'L'),(52,1,'XL');
/*!40000 ALTER TABLE `size` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Nguyễn Văn Nam','user1@gmail.com','$2y$10$HlqmLbmw6AaLl4jGk4WmreeVsl8DlnTk6lwG98ZECuDZaV11ipOEu','01677045033','10/07/1996','360 Kim Mã Q. Ba Đình  Hà Nội','uIjLxaNHm0R67MBT5kvbePFTc4xz9THnqqcInaAYCe54Bw6HkAZGNF2KKbjb','2018-03-03'),(3,'Trần Văn Bình','user3@gmail.com','$10$5/WHJal6vbiinVvC/ISK1e9ttImJWVcCcEB08kEPwK7lWWqp/E0wq','01677045039','10/07/1996','1 Lê Thánh Tông, Q. Hoàn Kiếm  Hà Nội',NULL,'2018-03-03'),(4,'Ngô Thảo Mai','user4@gmail.com','$2y$10$Qrb.XUgqyBvE.uIAnXWnx.4XdFj8XM/FPNK3lxlUMCdt8KGkN02eK','01677045039','10/07/1996','44B Lý Thường Kiệt, Q. Hoàn Kiếm  Hà Nội',NULL,'2018-03-03'),(5,'Nguyễn Anh Thơ','user5@gmail.com','$10$5/WHJal6vbiinVvC/ISK1e9ttImJWVcCcEB08kEPwK7lWWqp/E0wq','01677045039','10/07/1996','84 Trần Nhân Tông, Q. Hai Bà Trưng  Hà Nội',NULL,'2018-03-03'),(6,'Tống Ngọc Bình','user6@gmail.com','$10$5/WHJal6vbiinVvC/ISK1e9ttImJWVcCcEB08kEPwK7lWWqp/E0wq','01677045039','10/07/1996','K5 Nghi Tàm, 11 Xuân Diệu, Q. Tây Hồ  Hà Nội',NULL,'2018-03-03'),(7,'Nguyễn Thanh Bình','thanhbinh@gmail.com','$2y$10$xEzEkfE5kh3BApMTR9RsMeIqRLacS6z06UxHcgphn3nkJrlK2nlsO','0869249713',NULL,'112/20/80 Xuân Phương Q.Nam Từ Liêm Hà Nội','JBvtn6xXtCWSpbFCOcJ8nVe9LL0Z3tIVteux146HXRJtqmCkJKobn42Xc9f8','2018-04-11'),(8,'Nguyễn Hoài Thu','hoaithu@gmail.com','$2y$10$BL2gNj1OuYr63VjCvWtFkeQjE0RuVHZTAV6uxaNn2buvV5rX0EOp6','01677045037','1996/07/14','80/101/21 tổ dân phố số 2 phương canh nam từ niêm','1rxd62yMJACqnUlmEvkxL6ZP2JUUChYKf3yhhOj4u84dsmvGbHQqvgCq8RfM','2018-04-13'),(9,'Phạm Thị Thủy','thuypham@gmail.com','$2y$10$C3C3Dea9EFmTktvArqcgsOpEdY2MoJ64k7EtPIehQvWYqASqVmF3e','0976127385',NULL,'Số 10 136/103 đường Cầu Diễn Q.Bắc Từ Niêm Hà Nội','hHfibREdz8r950QiYxFU9zRkUZApG3NdL4m9Kqz62QcR97vI4Lpgb2RFtZcR','2018-04-14'),(10,'Lê Thanh Trà','trale@gmail.com','$2y$10$W9OvtrOI6tQy3m.ctBFFneZ7XAvNv1bk8xt4.klMd0v2T7EJc6/F.','01664538736',NULL,'106 Phạm Huy Thông Q.Ba Đình Hà Nội',NULL,'2018-04-14'),(11,'Trần Tuấn Phát','tuanphat@gmail.com','$2y$10$HO3F77dEZYpc3ZphbJ5SyeSqo8.b8hdyqEpiHqbQBP8kjzF1z1iXC','01677045039',NULL,'Q.1 Bình Thạnh Hồ Chí Minh',NULL,'2018-04-19');
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

-- Dump completed on 2018-05-07 18:42:37
