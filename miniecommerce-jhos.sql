-- MySQL dump 10.13  Distrib 5.5.47, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: miniecommerce
-- ------------------------------------------------------
-- Server version	5.5.47-0ubuntu0.14.04.1

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
-- Table structure for table `DETALLE_PEDIDO`
--

DROP TABLE IF EXISTS `DETALLE_PEDIDO`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DETALLE_PEDIDO` (
  `CODIGO_PRODUC` int(11) NOT NULL,
  `LOGIN` varchar(50) NOT NULL,
  `NUMERO_PEDIDO` int(11) NOT NULL,
  `CANTIDAD` int(11) NOT NULL,
  `DETALLE` varchar(1024) NOT NULL,
  PRIMARY KEY (`CODIGO_PRODUC`,`LOGIN`,`NUMERO_PEDIDO`),
  CONSTRAINT `FK_PEDIDO_DETALLE` FOREIGN KEY (`CODIGO_PRODUC`, `LOGIN`, `NUMERO_PEDIDO`) REFERENCES `PEDIDO` (`CODIGO_PRODUC`, `LOGIN`, `NUMERO_PEDIDO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DETALLE_PEDIDO`
--

LOCK TABLES `DETALLE_PEDIDO` WRITE;
/*!40000 ALTER TABLE `DETALLE_PEDIDO` DISABLE KEYS */;
/*!40000 ALTER TABLE `DETALLE_PEDIDO` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PAGOS`
--

DROP TABLE IF EXISTS `PAGOS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PAGOS` (
  `CODIGO_PRODUC` int(11) NOT NULL,
  `LOGIN` varchar(50) NOT NULL,
  `NUMERO_PEDIDO` int(11) NOT NULL,
  `NUMERO_CHEQUE` varchar(50) NOT NULL,
  `FECHA_PAGO` date NOT NULL,
  `PAGO` decimal(10,0) NOT NULL,
  PRIMARY KEY (`CODIGO_PRODUC`,`LOGIN`,`NUMERO_PEDIDO`,`NUMERO_CHEQUE`),
  CONSTRAINT `FK_PEDIDO_PAGOS` FOREIGN KEY (`CODIGO_PRODUC`, `LOGIN`, `NUMERO_PEDIDO`) REFERENCES `PEDIDO` (`CODIGO_PRODUC`, `LOGIN`, `NUMERO_PEDIDO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PAGOS`
--

LOCK TABLES `PAGOS` WRITE;
/*!40000 ALTER TABLE `PAGOS` DISABLE KEYS */;
/*!40000 ALTER TABLE `PAGOS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PEDIDO`
--

DROP TABLE IF EXISTS `PEDIDO`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PEDIDO` (
  `CODIGO_PRODUC` int(11) NOT NULL,
  `LOGIN` varchar(50) NOT NULL,
  `NUMERO_PEDIDO` int(11) NOT NULL,
  `FECHA_PEDIDO` date NOT NULL,
  `FECHA_ENVIO` date DEFAULT NULL,
  `ESTADO` varchar(50) DEFAULT NULL,
  `COMENTARIOS` varchar(700) DEFAULT NULL,
  PRIMARY KEY (`CODIGO_PRODUC`,`LOGIN`,`NUMERO_PEDIDO`),
  KEY `FK_USU_PEDIDO` (`LOGIN`),
  CONSTRAINT `FK_PRODUC_PEDIDO` FOREIGN KEY (`CODIGO_PRODUC`) REFERENCES `PRODUCTOS` (`CODIGO_PRODUC`),
  CONSTRAINT `FK_USU_PEDIDO` FOREIGN KEY (`LOGIN`) REFERENCES `USUARIO` (`LOGIN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PEDIDO`
--

LOCK TABLES `PEDIDO` WRITE;
/*!40000 ALTER TABLE `PEDIDO` DISABLE KEYS */;
/*!40000 ALTER TABLE `PEDIDO` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PERMISOS`
--

DROP TABLE IF EXISTS `PERMISOS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PERMISOS` (
  `ID_PERM` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(150) NOT NULL,
  PRIMARY KEY (`ID_PERM`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PERMISOS`
--

LOCK TABLES `PERMISOS` WRITE;
/*!40000 ALTER TABLE `PERMISOS` DISABLE KEYS */;
/*!40000 ALTER TABLE `PERMISOS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PRODUCTOS`
--

DROP TABLE IF EXISTS `PRODUCTOS`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PRODUCTOS` (
  `CODIGO_PRODUC` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(50) DEFAULT NULL,
  `IMG` varchar(50) DEFAULT NULL,
  `PRECIO` decimal(10,0) DEFAULT NULL,
  `STOCK` int(11) DEFAULT NULL,
  `DESCRIPCION` varchar(150) DEFAULT NULL,
  `ACTIVO` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`CODIGO_PRODUC`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PRODUCTOS`
--

LOCK TABLES `PRODUCTOS` WRITE;
/*!40000 ALTER TABLE `PRODUCTOS` DISABLE KEYS */;
INSERT INTO `PRODUCTOS` VALUES (69,'Ahri','prueba_poros/ahri.jpg',50,10,NULL,1),(70,'Amumu','prueba_poros/amumu.jpg',63,5,NULL,1),(71,'Ashe','prueba_poros/ashe.jpg',25,20,NULL,1),(72,'Ezreal','prueba_poros/ezreal.jpg',50,5,NULL,1),(73,'Gragas','prueba_poros/gragas.jpg',26,10,NULL,1),(74,'Heimerdinger','prueba_poros/heim.jpg',63,10,NULL,1),(75,'Jinx','prueba_poros/jinx.jpg',63,10,NULL,1),(76,'Rengar','prueba_poros/rengar.jpg',63,10,NULL,1),(77,'Sona','prueba_poros/sona.jpg',63,10,NULL,1),(78,'Teemo','prueba_poros/teemo.jpg',63,10,NULL,1),(79,'Twisted Fate','prueba_poros/tf.jpg',63,10,NULL,1),(80,'Master Yi','prueba_poros/yi.jpg',63,10,NULL,1),(81,'Zed','prueba_poros/zed.jpg',63,10,NULL,1);
/*!40000 ALTER TABLE `PRODUCTOS` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ROL`
--

DROP TABLE IF EXISTS `ROL`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ROL` (
  `ID_ROL` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_ROL` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_ROL`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ROL`
--

LOCK TABLES `ROL` WRITE;
/*!40000 ALTER TABLE `ROL` DISABLE KEYS */;
/*!40000 ALTER TABLE `ROL` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ROL_PERM`
--

DROP TABLE IF EXISTS `ROL_PERM`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ROL_PERM` (
  `ID_ROL` int(11) NOT NULL,
  `ID_PERM` int(11) NOT NULL,
  PRIMARY KEY (`ID_ROL`,`ID_PERM`),
  KEY `FK_PERM_ROL_PERM` (`ID_PERM`),
  CONSTRAINT `FK_PERM_ROL_PERM` FOREIGN KEY (`ID_PERM`) REFERENCES `PERMISOS` (`ID_PERM`),
  CONSTRAINT `FK_ROL_ROL_PERM` FOREIGN KEY (`ID_ROL`) REFERENCES `ROL` (`ID_ROL`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ROL_PERM`
--

LOCK TABLES `ROL_PERM` WRITE;
/*!40000 ALTER TABLE `ROL_PERM` DISABLE KEYS */;
/*!40000 ALTER TABLE `ROL_PERM` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SESION`
--

DROP TABLE IF EXISTS `SESION`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SESION` (
  `LOGIN` varchar(50) NOT NULL,
  `FECHA_INI` datetime NOT NULL,
  `FECHA_FIN` datetime DEFAULT NULL,
  `TIEMPO` time DEFAULT NULL,
  `ACTIVO` tinyint(1) NOT NULL,
  PRIMARY KEY (`LOGIN`,`FECHA_INI`),
  CONSTRAINT `FK_USU_SES` FOREIGN KEY (`LOGIN`) REFERENCES `USUARIO` (`LOGIN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SESION`
--

LOCK TABLES `SESION` WRITE;
/*!40000 ALTER TABLE `SESION` DISABLE KEYS */;
INSERT INTO `SESION` VALUES ('jhon','2016-02-26 10:02:24','2016-02-26 10:06:04','00:03:40',0),('jhon','2016-03-03 19:35:49','2016-03-03 19:35:57','00:00:08',0),('jhon','2016-03-03 20:03:20',NULL,NULL,1),('jhon','2016-03-04 17:53:54','2016-03-04 17:54:20','00:00:26',0),('mary','2016-02-26 10:00:47','2016-02-26 10:01:56','00:01:09',0),('mary','2016-02-26 10:02:02','2016-02-26 10:02:13','00:00:11',0),('mary','2016-02-26 10:11:20','2016-02-26 10:11:38','00:00:18',0),('mary','2016-02-26 10:11:42','2016-02-26 10:11:48','00:00:06',0),('mary','2016-02-26 12:47:31','2016-02-26 12:50:15','00:02:44',0),('mary','2016-02-26 12:50:32','2016-02-26 12:50:49','00:00:17',0),('mary','2016-02-26 12:58:33',NULL,NULL,1);
/*!40000 ALTER TABLE `SESION` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `USR_ROL`
--

DROP TABLE IF EXISTS `USR_ROL`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `USR_ROL` (
  `LOGIN` varchar(50) NOT NULL,
  `ID_ROL` int(11) NOT NULL,
  PRIMARY KEY (`LOGIN`,`ID_ROL`),
  KEY `FK_ROL_USR_ROL` (`ID_ROL`),
  CONSTRAINT `FK_ROL_USR_ROL` FOREIGN KEY (`ID_ROL`) REFERENCES `ROL` (`ID_ROL`),
  CONSTRAINT `FK_USR_USR_ROL` FOREIGN KEY (`LOGIN`) REFERENCES `USUARIO` (`LOGIN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `USR_ROL`
--

LOCK TABLES `USR_ROL` WRITE;
/*!40000 ALTER TABLE `USR_ROL` DISABLE KEYS */;
/*!40000 ALTER TABLE `USR_ROL` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `USUARIO`
--

DROP TABLE IF EXISTS `USUARIO`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `USUARIO` (
  `LOGIN` varchar(50) NOT NULL,
  `PASSWD` varchar(50) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `APELLIDO_S` varchar(50) NOT NULL,
  `TELEFONO` varchar(50) DEFAULT NULL,
  `DIRECCION` varchar(100) NOT NULL,
  `CIUDAD` varchar(50) NOT NULL,
  `ESTADO` varchar(50) DEFAULT NULL,
  `CODIGO_POSTAL` varchar(15) DEFAULT NULL,
  `PAIS` varchar(50) NOT NULL,
  `LIMITE_CREDITO` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`LOGIN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `USUARIO`
--

LOCK TABLES `USUARIO` WRITE;
/*!40000 ALTER TABLE `USUARIO` DISABLE KEYS */;
INSERT INTO `USUARIO` VALUES ('jhon','123','898','998','989','9898','989','989','9898','989',898),('mary','123','mary','strayberry header','67','cbb','cbb','cbba','89','89',19);
/*!40000 ALTER TABLE `USUARIO` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-10 14:47:44
