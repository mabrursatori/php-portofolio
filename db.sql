-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: localhost    Database: portofolio
-- ------------------------------------------------------
-- Server version	8.0.21

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
-- Table structure for table `portofolios`
--

DROP TABLE IF EXISTS `portofolios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `portofolios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `number` int DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `technology` varchar(200) DEFAULT NULL,
  `type` varchar(200) DEFAULT NULL,
  `link` varchar(200) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `developer` varchar(200) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portofolios`
--

LOCK TABLES `portofolios` WRITE;
/*!40000 ALTER TABLE `portofolios` DISABLE KEYS */;
INSERT INTO `portofolios` VALUES (1,4,'Rt-win','WPF.net','Desktop Windows','www.mabrur.caom','v7bq5CZcVS0','mabrur.jpg','- System Analyst<br>- Programmer<br>- Programmerf','Mabrur Satori sjdfkl skdfksfjkda skdjfkasjfdka sdkfjslkdfj asl asdkfjaksl df sdkfjaslkd f sdfjlksd f sdfjlas dfl'),(24,3,'komik','sdfsdf','sfsdf','sfsdf','sfsf','5fd3446a4f79c.jpg','sdfsd','sdfsdf'),(28,1,'Mabrur App','-Flutter','Mobile App','mabrur.epizy.com','L5b_1Kshx3I','5fdca9fa9b65c.jpg','- Mabrur (Flutter Developer)','lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum '),(29,2,'Mabrur App','-Flutter','Mobile App','mabrur.epizy.com','L5b_1Kshx3I','5fdcac9783ca2.jpg','-Mabrur (Flutter App)','lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum lorem ipsum ');
/*!40000 ALTER TABLE `portofolios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `ttl` varchar(255) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `skill` text,
  `telepon` varchar(20) DEFAULT NULL,
  `github` varchar(100) DEFAULT NULL,
  `portofolio` varchar(50) DEFAULT NULL,
  `first_paragraf` text,
  `second_paragraf` text,
  `image` varchar(50) DEFAULT NULL,
  `pengalaman` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Mabrur Satori','admin@gmail.com','admin123','Cirebon, 20 November 1996','Junior Software Developer','-Desktop App(Wpf.NET / C# and XAML) <br>\r\n-Mobile App(Flutter) <br>\r\n-Web App(Laravel, bootstrap and Jquery) <br>\r\n                                    -Services(Windows Services) <br>\r\n                                    -Database (Mysql, Microsoft SQL Server, SQL Lite) <br>\r\n                                    -Languange Programming(C#, Javascript, PHP, Python, Java, Dart, Swift) <br>\r\n                                    -Design (CorelDraw)','6285624436317','https://github.com/mabrursatori','mabrurdev.epizy.com','Saya seorang Enthusiast Technology. Mengawali karir pada Maret 2020 sebagai programmer support di PT. Rekabio yaitu perusahaan yang bergerak di bidang pengadaan mesin absen otomatis yang memiliki klien dari perusahaan BUMN maupun perusahaan swasta.','Saya masuk pada divisi R&D (Reseach And Development) yaitu divisi yang bertanggung jawab untuk mengembangkan produk perusahaan, seperti membuat aplikasi penarikan data dari mesin, aplikasi pengelolaan data kehadiran, aplikasi untuk absen dan melakukan instalasi di tempat klien. Selain membuat aplikasi saya juga harus siap mempelajari teknologi apapun yang dibutuhkan untuk mengembangkan produk','5fdcaeff52535.png','<p><strong>Operator di ALDINO BORDIR KOMPUTER (2018 -2019)<br />\r\n-Mengoperasikan mesin bordir komputer</strong></p>\r\n\r\n<p><img alt=\"alternative text\" src=\"https://awsimages.detik.net.id/customthumb/2019/06/20/1025/img_20190620160105_5d0b4b511468c.jpg?w=600&amp;q=90\" style=\"border-style:solid; border-width:5px; float:right; height:450px; margin:20px 10px; width:600px\" /></p>\r\n\r\n<p><br />\r\nDesign Grafis di PESONA COPY CENTRE (2019 -2020)<br />\r\n-Membuat design menggunakan CorelDraw dan Photoshop<br />\r\n-Membuat dokument menggunakan Microsoft World dan Microsoft Excel<br />\r\n-Mencetak design atau dokumen dengan mesin print atau fotocopy<br />\r\n-Mengoperasikan mesin fotocopy<br />\r\n-Melakukan finishing<br />\r\n<br />\r\nProgrammer Support di PT. REKABIO (2020 - 2021)<br />\r\n-Membangun aplikasi untuk mengembangkan mesin absen dengan teknologi apapun (terutama .NET / C# dan Microsoft SQL Server) bersama Tim<br />\r\n-Instalasi di Klien<br />\r\n-Mempelajari teknologi apapun untuk kebutuhan pengembangan mesin absen<br />\r\n<br />\r\n&nbsp;</p>\r\n');
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

-- Dump completed on 2021-08-01 13:12:06
