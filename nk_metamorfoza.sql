-- MariaDB dump 10.19  Distrib 10.6.12-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: nk_metamorfoza
-- ------------------------------------------------------
-- Server version	10.6.12-MariaDB-0ubuntu0.22.04.1

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
-- Table structure for table `kategorie`
--

DROP TABLE IF EXISTS `kategorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategorie` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategorie`
--

LOCK TABLES `kategorie` WRITE;
/*!40000 ALTER TABLE `kategorie` DISABLE KEYS */;
INSERT INTO `kategorie` VALUES (1,'fryzjer'),(2,'manicure/pedicure'),(3,'makijaż/henna'),(4,'zabiegi');
/*!40000 ALTER TABLE `kategorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `otwarcia`
--

DROP TABLE IF EXISTS `otwarcia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `otwarcia` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `dzien` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `otwarcie` varchar(5) NOT NULL,
  `zamkniecie` varchar(5) NOT NULL,
  `zamkniete` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `otwarcia`
--

LOCK TABLES `otwarcia` WRITE;
/*!40000 ALTER TABLE `otwarcia` DISABLE KEYS */;
INSERT INTO `otwarcia` VALUES (1,'poniedziałek','09:00','19:00',0),(2,'wtorek','09:00','19:00',0),(3,'środa','09:00','19:00',0),(4,'czwartek','09:00','19:00',0),(5,'piątek','09:00','19:00',0),(6,'sobota','08:00','16:00',0),(7,'niedziela','00:00','00:00',1);
/*!40000 ALTER TABLE `otwarcia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uslugi`
--

DROP TABLE IF EXISTS `uslugi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uslugi` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `kategoria` int(2) NOT NULL,
  `cena` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `kategoria` (`kategoria`),
  CONSTRAINT `uslugi_ibfk_1` FOREIGN KEY (`kategoria`) REFERENCES `kategorie` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uslugi`
--

LOCK TABLES `uslugi` WRITE;
/*!40000 ALTER TABLE `uslugi` DISABLE KEYS */;
INSERT INTO `uslugi` VALUES (1,'strzyżenie damskie - włosy krótkie',1,60),(2,'strzyżenie damskie - włosy półdługie',1,80),(3,'strzyżenie damskie - włosy długie',1,90),(4,'strzyżenie męskie - barber',1,45),(5,'strzyżenie męskie - grzywka',1,25),(6,'strzyżenie dzieciennce',1,40),(7,'strzyżenie męskie - barber',1,45),(8,'strzyżenie męskie - grzywka',1,25),(9,'strzyżenie dzieciennce',1,40),(10,'koloryzacja (odrost) - włosy krótkie',1,100),(11,'koloryzacja (odrost) - włosy półdługie',1,140),(12,'koloryzacja (odrost) - włosy długie',1,160),(13,'koloryzacja (kolor) - włosy krótkie',1,140),(14,'koloryzacja (kolor) - włosy półdługie',1,200),(15,'koloryzacja (kolor) - włosy długie',1,300),(16,'dermabrazja (peeling skóry głowy)',1,30),(17,'botox na zimno',1,220),(18,'botox na włosy (silna regeneracja)',1,100),(19,'modelowanie - włosy krótkie',1,60),(20,'modelowanie - włosy półdługie',1,70),(21,'modelowanie - włosy długie',1,90),(22,'refleksy/pasemka + kolor - włosy krótkie',1,250),(23,'refleksy/pasemka + kolor - włosy półdługie',1,350),(24,'refleksy/pasemka + kolor - włosy długie',1,400),(25,'dekoloryzacja + farba - włosy krótkie',1,220),(26,'dekoloryzacja + farba - włosy półdługie',1,300),(27,'dekoloryzacja + farba - włosy długie',1,350),(28,'tonowanie włosów - włosy krótkie',1,70),(29,'tonowanie włosów - włosy półdługie',1,100),(30,'tonowanie włosów - włosy długie',1,150),(31,'koloryzacja metodą Shatush',1,300),(32,'bixyplastia - Honma Tokyo - włosy krótkie',1,300),(33,'bixyplastia - Honma Tokyo - włosy półdługie',1,450),(34,'bixyplastia - Honma Tokyo - włosy długie',1,550),(35,'rekonstrukcja włosów Joico - włosy krótkie',1,80),(36,'rekonstrukcja włosów Joico - włosy półdługie',1,100),(37,'rekonstrukcja włosów Joico - włosy długie',1,130),(38,'olejowanie włosów',1,140),(39,'prostowanie kreatynowe - włosy półdługie',1,350),(40,'prostowanie kreatynowe - włosy długie',1,500),(41,'upięcie - wieczorowe',1,100),(42,'upięcie - ślubne próbne',1,150),(43,'upięcie - ślubne',1,180),(44,'pedicure hybrydrowy',2,90),(45,'manicure hybrydrowy',2,80),(46,'menicure żelowy - przedłużanie',2,130),(47,'hybryda - ściąganie',2,35),(48,'menicure żelowy + francuski - przedłużanie',2,150),(49,'pedicure hybrydrowy - francuski',2,100),(50,'naprawa jednego paznokcia',2,20),(51,'manicure żelowy - korekcja',2,100),(52,'menicure hybrydowy - francuski',2,100),(53,'manicure żelowy',2,100),(54,'żel - ściąganie',2,50),(55,'pedicure z opracowaniem stóp frezarką + hybryda',2,130),(56,'pedicure frezarkowy stopy',2,100),(57,'henna brwi + regulacja',3,35),(58,'regulacja brwi',3,20),(59,'henna pudrowa + regulacja',3,60),(60,'henna brwi i rzęs - pudrowa + regulacja',3,80),(61,'henna brwi i rzęs + regulacja',3,55),(62,'makijaż ślubny',3,160),(63,'makijaż okolicznościowy',3,140),(64,'depilacja woskiem - wąsik',4,25),(65,'depilacja woskiem - broda',4,25),(66,'depilacja woskiem - baki',4,30),(67,'depilacja woskiem - cała twarz',4,60),(68,'luksusowy zabieg rozświetlający',4,180),(69,'zabieg odmladzający',4,250),(70,'zabieg przywracający równowagę skórze tłustej',4,150),(71,'zabieg złuszczający z kwasami',4,150),(72,'zabieg odżywczy na twarz - przywracający witalność',4,220),(73,'zabieg z kwasem laktobionowym',4,160),(74,'mezoterapia igłowa',4,400),(75,'mezoterapia bezigłowa',4,200),(76,'fala radiowy - focus RF',4,180),(77,'manualne oczyszczanie twarzy',4,180),(78,'mikrodermabrazja',4,160),(79,'peeling kawitacyjny z kwasami',4,150),(80,'botoks',4,450),(81,'stymulatory tkankowe',4,500),(82,'masaż liftigujący Klapp Express Lift',4,120),(83,'epilacja laserowa - cena do ustalenia (tel. 510-593-610)',4,0),(84,'makijaż permanentny - cena do ustalenia (tel. 510-593-610)',4,0);
/*!40000 ALTER TABLE `uslugi` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-28 15:32:59
