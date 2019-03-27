-- MySQL dump 10.13  Distrib 5.7.25, for Linux (x86_64)
--
-- Host: localhost    Database: php_blog
-- ------------------------------------------------------
-- Server version	5.7.25-0ubuntu0.18.04.2

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
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) NOT NULL,
  `news_id` int(11) NOT NULL,
  `comm` varchar(255) NOT NULL,
  `date_d` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `news_id_idx` (`news_id`),
  CONSTRAINT `news_id` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,'Vadim',1,'test','2019-03-26 21:13:24'),(2,'Ð¡ÐµÑ€Ð³ÐµÐ¹',1,'good news','2019-03-26 21:34:47'),(3,'Ivan',2,'Test','2019-03-27 05:37:10'),(4,'Frenk',2,'test','2019-03-27 05:37:21'),(5,'Igor',2,'lk;fske;flse;flksel;fklsejflsefelfsejlf','2019-03-27 05:37:38'),(6,'Ivan',3,'efsefsefsefs','2019-03-27 05:38:09'),(7,'fsefsefsefsef',3,'Reresefsefs','2019-03-27 05:38:20'),(8,'Igor',4,'fsefsefsef','2019-03-27 05:38:33'),(9,'Rslan',4,'lvsjsklefjsefsekfjl','2019-03-27 05:38:43'),(10,'Oleg',4,'kklevksnvlsenvlksn','2019-03-27 05:39:41'),(11,'Iva',6,'','2019-03-27 05:39:58'),(12,'edesded',6,'addadawaw','2019-03-27 05:40:07');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) NOT NULL,
  `date_d` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(255) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'vasiliy','2019-03-24 20:42:07','article_name','Michael Avenatti, the lawyer best known for representing Stormy Daniels in her lawsuits against President Trump, was arrested Monday as federal prosecutors filed charges accusing him of attempting to extort millions of dollars from Nike by threatening negative publicity right before an earnings call and the N.C.A.A. men’s basketball tournament.\n\nIn court documents filed Monday, federal prosecutors in Manhattan said that Mr. Avenatti and a client, a former travel team basketball coach, told Nike that they had evidence Nike employees had funneled money to recruits. The prosecutors said the men threatened to release the evidence in order to damage Nike’s reputation and market capitalization unless the company paid them at least $22.5 million.\n\nMr. Avenatti attempted to extract the money “by threatening to use his ability to garner publicity to inflict substantial financial and reputational harm on the company if his demands were not met,” prosecutors said in a statement.'),(2,'vasiliy','2019-03-24 20:42:07','article_name','lorem ipsum'),(3,'vasiliy','2019-03-24 20:42:07','article_name','lorem ipsum'),(4,'vasiliy','2019-03-24 20:42:07','article_name','lorem ipsum'),(5,'vasiliy','2019-03-24 20:42:07','article_name','lorem ipsum'),(6,'vasiliy','2019-03-25 19:23:27','article_name','lorem ipsum'),(7,'vasiliy','2019-03-25 19:26:00','article_name','lorem ipsum'),(8,'vasiliy','2019-03-25 19:26:11','article_name','lorem ipsum'),(9,'vasiliy','2019-03-25 19:26:13','article_name','lorem ipsum'),(10,'Vadim','2019-03-25 19:34:36','drgd','jjknln'),(11,'Vadim','2019-03-25 19:35:46','First news','effsefsef'),(12,'Vadim','2019-03-25 19:38:30','Second news','effsefsef'),(13,'Vadim','2019-03-25 19:39:22','Second news','Генсек НАТО Йенс Столтенберг заявил, что альянс планирует построить в Польше объект для хранения военной техники США. Возведение базы начнется уже летом и продолжится около двух лет. Стоимость проекта оценивается в $260 млн На объекте, по словам Столтенберга, планируется хранить американские бронированные машины, вооружения и боеприпасы. \"Это показывает, как близко мы работаем с США\", — сказал он. И добавил: база требуется \"для укрепления расширившегося присутствия США в Польше\". Об этом сообщает Рамблер. Далее: https://news.rambler.ru/troops/41918556/?utm_content=rnews&utm_medium=read_more&utm_source=copylink'),(14,'Vadim','2019-03-25 19:39:36','sesfsefes','sefsefsef'),(15,'sefsefse','2019-03-25 19:40:15','efsefse','sefsefse'),(16,'gxxfgfgx','2019-03-25 19:41:27','drgd','xgxgxfgx'),(17,'gxxfgfgx','2019-03-25 19:45:57','drgd','xgxgxfgx'),(18,'gxxfgfgx','2019-03-25 19:47:01','drgd','xgxgxfgx'),(19,'Sergey','2019-03-25 19:48:11','test','lks;fkoefks;ofs;ofk'),(20,'Ivan','2019-03-25 19:50:25','jlfjskfjeklf','kefjlsekfjklsefjkl'),(21,'Igor','2019-03-25 20:58:47','First news','111'),(22,'OLGA','2019-03-25 21:29:40',';lf;lsf;lsef;lk',';ls;lefs;lefslefs;lef'),(23,'Bob','2019-03-27 13:23:12','test','ljsljsldfjsklf');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-27 15:35:55
