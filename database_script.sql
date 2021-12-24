-- MySQL dump 10.13  Distrib 5.7.35, for Win64 (x86_64)
--
-- Host: localhost    Database: pagweb
-- ------------------------------------------------------
-- Server version	5.7.35-log

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
-- Table structure for table `experiencia`
--

DROP TABLE IF EXISTS `experiencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `experiencia` (
  `id_postulante` int(11) DEFAULT NULL,
  `empresa` varchar(100) DEFAULT NULL,
  `desde` int(11) DEFAULT NULL,
  `hasta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `experiencia`
--

LOCK TABLES `experiencia` WRITE;
/*!40000 ALTER TABLE `experiencia` DISABLE KEYS */;
INSERT INTO `experiencia` VALUES (1,'Ford Motors Company',2001,2014),(1,'CasaToro',1991,2001);
/*!40000 ALTER TABLE `experiencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postulantes`
--

DROP TABLE IF EXISTS `postulantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `postulantes` (
  `id_postulante` int(11) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `experiencia` int(11) DEFAULT NULL,
  `sector_laboral` varchar(10) DEFAULT NULL,
  `aspiracion_salarial` int(11) DEFAULT NULL,
  `nombre_fotos` varchar(100) DEFAULT NULL,
  `descripcion` text,
  `profesion` varchar(100) DEFAULT NULL,
  `habilidades` text,
  `video` varchar(100) DEFAULT NULL,
  `empresas` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postulantes`
--

LOCK TABLES `postulantes` WRITE;
/*!40000 ALTER TABLE `postulantes` DISABLE KEYS */;
INSERT INTO `postulantes` VALUES (1,'Eduardo Rojas',20,'M1',10000000,'Foto1.jpg','Expert in sales and after sales of light and heavy vehicles. Black Belt Certification in Six Sigma with a specialization in applied statistics. Management of spare parts import logistics.','Mechanical engineer','Commercial Labor, Commercial and Technical Trainer, Specialist in Applied Statistics, Black Belt Six Sigma','Video Experience.mp4','Ford Motor Company, Casatoro'),(2,'Nicolas Rojas',5,'M2',3000000,'Foto2.jpg','Expert in the management of residual plants and drinking water plants, with a master\'s degree in environmental engineering from Harvard University','Environmental engineer','Management of WWTP, Management of PTAP',NULL,'New Green Company, Environment Desing, Wattle Petroleum Company'),(3,'Juan Jose Rojas',25,'M3',7000000,'Foto3.jpg','Expert in improvement of industrial processes and time and movement management with a diploma in process management','Industrial Engineer','Logistics, methods and times, Process expert',NULL,'Ingemetcol, DSM Nutritional Products, Pacific Steel Company'),(4,'Miguel Rojas',35,'M4',2500000,'Foto4.jpg','Expert in road design, layout and development. Expert in aerial and digital topography with specialization in road design','Civil engineer','Expert in Topography, planning of roads and highways',NULL,'Orient road consortium, Savannah pavements, Colombian road company'),(5,'Bibiana Trujillo',13,'M1',2000000,'Foto5.jpg','Expert in managing preventive and corrective maintenance programs in oil wells and heavy machinery with specialization in design','Mechanical engineer','Maintenance Expert, Oil Well Expert',NULL,'Atlantic oil company, Colombian oil ministe'),(6,'Alejandro Rodriguez',4,'M2',5000000,'Foto6.jpg','Expert in management and implementation of integrated pest and hazardous waste management programs','Environmental engineer','Waste Management Expert, Pest Control Expert',NULL,'Integrated Pest Control Company, Spanish waste management company'),(7,'Santiago Saltaren',29,'M3',25000000,'Foto7.jpg','Expert in management and administration of large companies with a specialization in finance from the Universidad de los Andes','Industrial Engineer','Expert in Finance, Expert in Business Administration',NULL,'Latin American busiColombian American process companyness bank, Brazilian industrial company'),(8,'Alejandra Pinzon',40,'M4',6000000,'Foto8.jpg','Expert in structural calculation and design and development of bridges and tunnels with a master\'s degree in structural development from the University of Cataluña','Civil engineer','Bridge Expert, Structural Design Expert',NULL,'Pacific Road Consortium, Ruta del Sol Consortium, Heavy Metal Company');
/*!40000 ALTER TABLE `postulantes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'pagweb'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-24  1:56:56
