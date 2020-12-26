-- MariaDB dump 10.17  Distrib 10.4.14-MariaDB, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: umkm
-- ------------------------------------------------------
-- Server version	5.7.32-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_100000_create_password_resets_table',1),(2,'2020_12_12_103348_create_table_user',1),(3,'2020_12_12_125453_create_table_tenant',1),(4,'2020_12_12_125529_create_table_stan_active',1),(5,'2020_12_12_125601_create_table_open_hours',1),(6,'2020_12_12_125709_create_table_withdraw_stand',1),(7,'2020_12_12_125754_create_table_help',1),(8,'2020_12_12_125818_create_table_suggestion',1),(9,'2020_12_12_125835_create_table_stand',1),(10,'2020_12_12_125908_create_table_history_rent',1),(11,'2020_12_12_125936_create_table_photo_stand',1),(12,'2020_12_12_125959_create_table_transaction',1),(13,'2020_12_12_130016_create_table_rating',1),(14,'2020_12_12_130048_create_table_admin',1),(15,'2020_12_12_130108_create_table_articles',1),(16,'2020_12_12_130133_create_table_products',1),(17,'2020_12_12_130210_create_table_topup_request',1),(18,'2020_12_12_130238_create_table_topup_confirmation',1),(19,'2020_12_12_130337_create_table_broadcast',1),(20,'2020_12_12_130358_create_table_report',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
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
-- Table structure for table `table_admin`
--

DROP TABLE IF EXISTS `table_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_admin` (
  `admin_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username_admin` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_admin`
--

LOCK TABLES `table_admin` WRITE;
/*!40000 ALTER TABLE `table_admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_articles`
--

DROP TABLE IF EXISTS `table_articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_articles` (
  `article_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `article_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_article` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_articles`
--

LOCK TABLES `table_articles` WRITE;
/*!40000 ALTER TABLE `table_articles` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_broadcast`
--

DROP TABLE IF EXISTS `table_broadcast`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_broadcast` (
  `broadcast_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `stand_id_active` int(11) NOT NULL,
  `broadcast_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `broadcast_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `broadcast_deeplink` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`broadcast_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_broadcast`
--

LOCK TABLES `table_broadcast` WRITE;
/*!40000 ALTER TABLE `table_broadcast` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_broadcast` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_help`
--

DROP TABLE IF EXISTS `table_help`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_help` (
  `help_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `help_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `help_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`help_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_help`
--

LOCK TABLES `table_help` WRITE;
/*!40000 ALTER TABLE `table_help` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_help` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_history_rent`
--

DROP TABLE IF EXISTS `table_history_rent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_history_rent` (
  `history_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tenant_id` int(11) NOT NULL,
  `stand_id_active` int(11) NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_stand` smallint(6) NOT NULL,
  `rent_id` int(11) NOT NULL,
  `photo_stand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stand_category` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_profile` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenant_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`history_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_history_rent`
--

LOCK TABLES `table_history_rent` WRITE;
/*!40000 ALTER TABLE `table_history_rent` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_history_rent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_open_hours_stand`
--

DROP TABLE IF EXISTS `table_open_hours_stand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_open_hours_stand` (
  `open_time_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `stand_id_active` int(11) NOT NULL,
  `open_time` time NOT NULL,
  `close_time` time NOT NULL,
  `status_open` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`open_time_id`),
  KEY `stand_id_active` (`stand_id_active`),
  CONSTRAINT `table_open_hours_stand_ibfk_1` FOREIGN KEY (`stand_id_active`) REFERENCES `table_stand_active` (`stan_id_active`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_open_hours_stand`
--

LOCK TABLES `table_open_hours_stand` WRITE;
/*!40000 ALTER TABLE `table_open_hours_stand` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_open_hours_stand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_photo_stand`
--

DROP TABLE IF EXISTS `table_photo_stand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_photo_stand` (
  `photo_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `stand_id_active` int(11) NOT NULL,
  `photo_stand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`photo_id`),
  KEY `stand_id_active` (`stand_id_active`),
  CONSTRAINT `table_photo_stand_ibfk_1` FOREIGN KEY (`stand_id_active`) REFERENCES `table_stand_active` (`stan_id_active`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_photo_stand`
--

LOCK TABLES `table_photo_stand` WRITE;
/*!40000 ALTER TABLE `table_photo_stand` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_photo_stand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_products`
--

DROP TABLE IF EXISTS `table_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_products` (
  `product_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `stand_id_active` int(11) NOT NULL,
  `stand_category` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double NOT NULL,
  `product_discount` double NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_products`
--

LOCK TABLES `table_products` WRITE;
/*!40000 ALTER TABLE `table_products` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_rating`
--

DROP TABLE IF EXISTS `table_rating`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_rating` (
  `raing_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `stand_id_active` int(11) NOT NULL,
  `rating_stars_product` int(11) NOT NULL,
  `rating_stars_stand` int(11) NOT NULL,
  `comment_for_rating` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`raing_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_rating`
--

LOCK TABLES `table_rating` WRITE;
/*!40000 ALTER TABLE `table_rating` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_rating` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_report`
--

DROP TABLE IF EXISTS `table_report`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_report` (
  `report_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `stand_id_active` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `total_transaction` double NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_time` datetime NOT NULL,
  `number_stand` smallint(6) NOT NULL,
  `total_sales` int(11) NOT NULL,
  `report_start_date` datetime NOT NULL,
  `report_end_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`report_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_report`
--

LOCK TABLES `table_report` WRITE;
/*!40000 ALTER TABLE `table_report` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_stand`
--

DROP TABLE IF EXISTS `table_stand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_stand` (
  `stand_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `number_stand` smallint(6) NOT NULL,
  `category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_stand_avail` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`stand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_stand`
--

LOCK TABLES `table_stand` WRITE;
/*!40000 ALTER TABLE `table_stand` DISABLE KEYS */;
INSERT INTO `table_stand` VALUES (3,12,'Food',0,'2020-12-18 11:12:30','2020-12-18 11:12:30'),(4,13,'Food',0,'2020-12-18 13:19:49','2020-12-18 13:19:49'),(5,14,'Drink',0,'2020-12-18 13:20:22','2020-12-18 13:20:22'),(6,15,'Drink',0,'2020-12-18 13:21:08','2020-12-18 13:21:08'),(7,20,'Drink',0,'2020-12-18 13:22:07','2020-12-18 13:22:07'),(8,78,'Food',0,'2020-12-20 07:32:16','2020-12-20 07:32:16'),(9,80,'drink',0,'2020-12-22 10:23:02','2020-12-22 10:23:02');
/*!40000 ALTER TABLE `table_stand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_stand_active`
--

DROP TABLE IF EXISTS `table_stand_active`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_stand_active` (
  `stan_id_active` int(11) NOT NULL AUTO_INCREMENT,
  `tenant_id` int(11) NOT NULL,
  `stand_id` int(11) NOT NULL,
  `number_stan` int(11) NOT NULL,
  `name_profile` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `money_stan` double NOT NULL,
  `stan_category` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_open` int(11) NOT NULL,
  `status_active` int(11) NOT NULL,
  `tenant_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`stan_id_active`),
  KEY `tenant_id` (`tenant_id`),
  CONSTRAINT `table_stand_active_ibfk_1` FOREIGN KEY (`tenant_id`) REFERENCES `table_tenant` (`tenant_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_stand_active`
--

LOCK TABLES `table_stand_active` WRITE;
/*!40000 ALTER TABLE `table_stand_active` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_stand_active` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_suggestion`
--

DROP TABLE IF EXISTS `table_suggestion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_suggestion` (
  `suggest_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`suggest_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_suggestion`
--

LOCK TABLES `table_suggestion` WRITE;
/*!40000 ALTER TABLE `table_suggestion` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_suggestion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_tenant`
--

DROP TABLE IF EXISTS `table_tenant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_tenant` (
  `tenant_id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar_tenant` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rent_id` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_profile` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_ktp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_npwp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_payment_confirm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stan_category` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rent_status` int(11) NOT NULL,
  `rental_date_start` datetime NOT NULL,
  `rental_date_end` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`tenant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_tenant`
--

LOCK TABLES `table_tenant` WRITE;
/*!40000 ALTER TABLE `table_tenant` DISABLE KEYS */;
INSERT INTO `table_tenant` VALUES (1,'1234','081190908765','',1,'jamilah@mail.com','Mulan Jamila','','','','food',1,'2020-12-18 17:39:59','2020-12-31 17:39:59','2020-12-18 10:39:59','2020-12-18 10:39:59'),(2,'1234','081190908765','',2,'adi_hidayat@mail.com','Adi Hidayat','','','','Drink',1,'2020-12-18 18:21:57','2020-12-31 18:21:57','2020-12-18 11:21:57','2020-12-18 11:21:57');
/*!40000 ALTER TABLE `table_tenant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_topup_confirmation`
--

DROP TABLE IF EXISTS `table_topup_confirmation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_topup_confirmation` (
  `topup_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `submit_date` datetime NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmation_topup_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `update_note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`topup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_topup_confirmation`
--

LOCK TABLES `table_topup_confirmation` WRITE;
/*!40000 ALTER TABLE `table_topup_confirmation` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_topup_confirmation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_topup_request`
--

DROP TABLE IF EXISTS `table_topup_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_topup_request` (
  `topup_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `total_amount` double NOT NULL,
  `status_topup` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`topup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_topup_request`
--

LOCK TABLES `table_topup_request` WRITE;
/*!40000 ALTER TABLE `table_topup_request` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_topup_request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_transaction`
--

DROP TABLE IF EXISTS `table_transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_transaction` (
  `transaction_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `stand_id_active` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_number` smallint(6) NOT NULL,
  `total_transaction` double NOT NULL,
  `discount` double NOT NULL,
  `order_notes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_time` datetime NOT NULL,
  `payment_method` tinyint(4) NOT NULL,
  `order_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`transaction_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_transaction`
--

LOCK TABLES `table_transaction` WRITE;
/*!40000 ALTER TABLE `table_transaction` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_user`
--

DROP TABLE IF EXISTS `table_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_user` (
  `user_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emoney` double NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12322349 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_user`
--

LOCK TABLES `table_user` WRITE;
/*!40000 ALTER TABLE `table_user` DISABLE KEYS */;
INSERT INTO `table_user` VALUES (12322347,'Indra','Rahdian','indra@mail.com','7c4a8d09ca3762af61e59520943dc26494f8941b','082165174835',NULL,0,0,'2020-12-17 22:48:58','2020-12-18 13:20:50'),(12322348,'usersatu','lastsatu',NULL,'5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8','085712345678',NULL,0,0,'2020-12-21 21:54:16','2020-12-21 21:54:16');
/*!40000 ALTER TABLE `table_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table_withdraw_stand`
--

DROP TABLE IF EXISTS `table_withdraw_stand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `table_withdraw_stand` (
  `withdrawal_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `stand_id_active` int(11) NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `money_stand` double NOT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal_withdrawal` double NOT NULL,
  `withdrawal_date` datetime NOT NULL,
  `withdrawal_status` smallint(6) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`withdrawal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table_withdraw_stand`
--

LOCK TABLES `table_withdraw_stand` WRITE;
/*!40000 ALTER TABLE `table_withdraw_stand` DISABLE KEYS */;
/*!40000 ALTER TABLE `table_withdraw_stand` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'umkm'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-25 20:37:06
