CREATE DATABASE  IF NOT EXISTS `nursery` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `nursery`;
-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: localhost    Database: nursery
-- ------------------------------------------------------
-- Server version	8.0.26

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
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact` (
  `idcontact` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`idcontact`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (1,'omansh','omanshkothari@gmail.com','8888888888','Some message for me'),(2,'omansh2','omanshkothari@gmail.com2','88888888882','Some message for me2'),(3,'','','555','');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_admin`
--

DROP TABLE IF EXISTS `tb_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_admin` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_admin`
--

LOCK TABLES `tb_admin` WRITE;
/*!40000 ALTER TABLE `tb_admin` DISABLE KEYS */;
INSERT INTO `tb_admin` VALUES (26,'Aman Rawat','aman123','202cb962ac59075b964b07152d234b70'),(29,'Gon Freaks','freakgon','9a90b6e318ba8f12d5a7e1149585e67f'),(30,'Omansh Kothari','omansh','7f780a101979810427b76bf6310c0fef'),(32,'Minato Namikaze','YellowFlash','63c371952b4b10f89041a63de6d49879'),(33,'Shikamaru Nara','1954302021','20e51d06b43acb27fabb656ee85ce8e6');
/*!40000 ALTER TABLE `tb_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_cart`
--

DROP TABLE IF EXISTS `tb_cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_cart` (
  `idtb_cart` int NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idtb_cart`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_cart`
--

LOCK TABLES `tb_cart` WRITE;
/*!40000 ALTER TABLE `tb_cart` DISABLE KEYS */;
INSERT INTO `tb_cart` VALUES (6,'Jade Plant',785.00,'1638874387.jpg'),(7,'Spider Plant',455.00,'1638874207.jpg'),(8,'Spider Plant',455.00,'1638874207.jpg'),(9,'Jade Plant',785.00,'1638874387.jpg'),(10,'Jade Plant',785.00,'1638874387.jpg'),(11,'Spider Plant',455.00,'1638874207.jpg'),(12,'Jade Plant',785.00,'1638874387.jpg');
/*!40000 ALTER TABLE `tb_cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_category`
--

DROP TABLE IF EXISTS `tb_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_category` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(45) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `featured` varchar(45) DEFAULT NULL,
  `active` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_category`
--

LOCK TABLES `tb_category` WRITE;
/*!40000 ALTER TABLE `tb_category` DISABLE KEYS */;
INSERT INTO `tb_category` VALUES (20,'Sucullent 2','1638535175.png','YES','YES'),(21,'Succulent 3','1638541571.jpg','NO','YES'),(22,'Ullam cupidatat amet','1638702891.jpg','YES','YES');
/*!40000 ALTER TABLE `tb_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_order`
--

DROP TABLE IF EXISTS `tb_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_order` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `plant` varchar(150) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT '0.00',
  `qty` int DEFAULT '1',
  `total` decimal(10,2) DEFAULT '0.00',
  `order_date` datetime DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `customer_name` varchar(45) DEFAULT NULL,
  `customer_contact` varchar(45) DEFAULT NULL,
  `customer_email` varchar(150) DEFAULT NULL,
  `customer_address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_order`
--

LOCK TABLES `tb_order` WRITE;
/*!40000 ALTER TABLE `tb_order` DISABLE KEYS */;
INSERT INTO `tb_order` VALUES (1,'Jade Plant',785.00,1,785.00,'2021-12-09 00:00:00','ordered','Omansh','8558558558','abc@email.com','fuksodbeif'),(2,'Spider Plant',455.00,5,2275.00,'2021-12-09 00:00:00','ordered','Omansh','8558558558','abc@email.com','fuksodbeif'),(3,'Jade Plant',785.00,5,3925.00,'2021-12-09 00:00:00','ordered','Aman','8558558558','abc@email.com','fuksodbeif');
/*!40000 ALTER TABLE `tb_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_plant`
--

DROP TABLE IF EXISTS `tb_plant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_plant` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) DEFAULT NULL,
  `description` text,
  `price` decimal(10,2) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `category_id` int unsigned DEFAULT NULL,
  `featured` varchar(45) DEFAULT NULL,
  `active` varchar(45) DEFAULT NULL,
  `caring_instructions` text,
  `toxicity` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_plant`
--

LOCK TABLES `tb_plant` WRITE;
/*!40000 ALTER TABLE `tb_plant` DISABLE KEYS */;
INSERT INTO `tb_plant` VALUES (20,'Spider Plant','The spider plant (Chlorophytum comosum) is considered one of the most adaptable of \r\nhouseplants and the easiest to grow. This plant can grow in a wide range of conditions \r\nand suffers from few problems, other than brown tips. The spider plant is so named \r\nbecause of its spider-like plants, or spiderettes, which dangle down from the mother \r\nplant like spiders on a web. Available in green or variegated varieties, these\r\n spiderettes often start out as small white flowers.',455.00,'1638874207.jpg',20,'YES','YES','Spider plant needs are simple: Place the plant in bright to moderate light in a room that is at comfortable temperature for everyone. Keep the soil slightly moist. Once-a-week watering is sufficient in spring and summer; in winter, allow the soil to dry a bit more between waterings.','Spider plants are non-toxic to dogs, cats, and humans.'),(21,'Jade Plant','Jade plant,(Crassula ovata)commonly known as jade plant, lucky plant, money plant or money tree, is a succulent plant with small pink or white flowers that is native to the KwaZulu-Natal and Eastern Cape provinces of South Africa, and Mozambique; it is common as a houseplant worldwide. The jade plant is an evergreen plant  with thick branches. It has thick, shiny, smooth leaves that grow in opposing pairs along the branches. Leaves are a rich jade green, although some may appear to be more of a yellow-green.',785.00,'1638874387.jpg',20,'YES','YES','Jade Plants love sun, but they should not be put in direct sunlight. Ideally, the soil should have a neutral to slightly acidic pH level, and drain well in order to prevent excessive moisture from accumulating and leading to fungal growth. In spring and summer they should be watered often to keep the soil moist but reduce it to once a month during winters.','The jade plant is toxic to horses, and dogs and cats, as well as mildly toxic to humans'),(22,'Ghost Plant','The Ghost plant (Graptopetalum paraguayense) is a species of succulent plant in the jade plant family,Thick, fleshy leaves and stems characterize most succulent plants. Ghost plants have thick leaves that hold excess moisture so the plant can withstand periods without rain. The silvery gray to bluish green foliage has a pinkish tinge to the edges of the leaves when they are young. The amount of light a ghost plant receives can affect its coloration, which can cause plants of the same species to look like different varieties.',785.00,'1638874957.jpg',21,'YES','YES','Ghost plant thrives in sunlight, so choose a location where it will receive full or half-day sun. Ghost plants grow best in a porous potting mix consisting of soil mixed with up to 50% sand, gravel, or perlite. Water only when the soil is dry to a depth of one inch. This means watering once every week in most indoor conditions and every 2-3 weeks in winter.','Non-Toxic to Dogs, Non-Toxic to Cats, Non-Toxic to Horses'),(23,'Aloe Aristata','Aloe aristata,(Aristaloe aristata)Lace Aloe,This frost-hardy Aloe has leaves that mimic a Haworthia. Unlike some Aloes, this one is particularly fast growing. The dark green leaves have white bumps on them, are wide at the bottom and taper into a sharper point at the top. It has pink flowers that attract bees and hummingbirds.Aristaloe is a genus of evergreen flowering perennial plants in the family Asphodelaceae from Southern Africa. Its sole species is Aristaloe aristata, known as guinea-fowl aloe or lace aloe. ',1245.00,'1638875307.jpg',22,'YES','YES','Aristaloe aristata has typical watering needs for a succulent, but can be sensitive to over-watering. It is best to use the soak and dry method, and allow the soil to dry out completely between waterings. It requires partial sun to partial shade.','Generally non-toxic to humans and animals'),(24,'English Ivy','English ivy (Hedera helix) is an evergreen perennial. It is also classified as a woody vine. English ivy can act as a ground cover, spreading horizontally and reaching 8 inches in height. But it is also a climber, due to its aerial rootlets, which allows it to climb to 80 feet high. The plant will eventually bear insignificant greenish flowers, but it is grown primarily for its evergreen leaves. In this regard, ivy can be classified as a foliage plant. The best time to plant English ivy is spring. ',550.00,'1638875470.jpg',21,'NO','YES','English ivy plants grow well in part shade to full shade. Grow this evergreen vine in well-drained soil,Ivies prefer to be kept slightly on the dry side. Their leaves will stay dark green when grown in steady temperatures and medium to high humidity. ','English ivy is toxic to humans and animals');
/*!40000 ALTER TABLE `tb_plant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `idUser` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Omansh','abc@email.com','1954302020','9079b6ee1d5ca04ab00e44e877a222ee','7894561235'),(3,'Aman','abc@email.com','aman','54119476701aba676f1599aa09101415','7894561235'),(4,'Abc','abc@email.com','def','25d55ad283aa400af464c76d713c07ad','7894561235');
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

-- Dump completed on 2021-12-09 17:56:08
