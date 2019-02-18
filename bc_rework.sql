-- MySQL dump 10.13  Distrib 5.7.25, for Linux (x86_64)
--
-- Host: localhost    Database: bc_rework
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
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `pageDescription` text NOT NULL COMMENT 'The description of the article, as shown by search engines.',
  `mdPath` text NOT NULL COMMENT 'Holds the path to the markdown which is the body of the article. This will typically be md/somefile.',
  `contributorID` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Set to 0 for annonymous.',
  `publishedOn` date NOT NULL,
  `editedOn` date DEFAULT NULL,
  `tags` varchar(256) DEFAULT 'blind computing article',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(128) NOT NULL,
  `categoryMetadata` json NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'','null'),(2,'','null'),(3,'','null'),(4,'','null'),(5,'No Category','{}'),(6,'Devices','{}'),(7,'Operating Systems','{}'),(8,'Software','{}'),(9,'Downloads','{}');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contributors`
--

DROP TABLE IF EXISTS `contributors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contributors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userAlias` varchar(64) NOT NULL,
  `fullName` varchar(96) DEFAULT NULL,
  `profilePicture` varchar(1024) NOT NULL DEFAULT 'https://i.imgur.com/BcAeHS6',
  `rank` enum('Maintainer','Contributor','Translator','Developer','Documentation Writer','Article Author','Video Producer','Advocator') DEFAULT 'Contributor',
  `contactInfo` json NOT NULL,
  `socialLinks` json NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contributors`
--

LOCK TABLES `contributors` WRITE;
/*!40000 ALTER TABLE `contributors` DISABLE KEYS */;
/*!40000 ALTER TABLE `contributors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `navTitle` varchar(128) NOT NULL,
  `pageTitle` varchar(128) NOT NULL COMMENT 'The title of the page to be displayed as a <title> object and next to the BC logo.|',
  `navTooltip` varchar(256) NOT NULL DEFAULT '',
  `uri` text NOT NULL,
  `pageDescription` varchar(512) NOT NULL DEFAULT 'Blind Computing, the home for Blind and Visually Impaired technology and information.' COMMENT 'Description of page (will be displayed in search results).',
  `tags` varchar(256) NOT NULL DEFAULT 'blind computing technology thefake-vip michael connor buchan channel infinity linux accessibility.' COMMENT 'Will be displayed as a meta tag to allow search engines to better catalogue this particular page.',
  `position` int(10) unsigned NOT NULL DEFAULT '0',
  `separatorAfter` tinyint(1) NOT NULL DEFAULT '0',
  `categoryID` int(10) unsigned DEFAULT '0',
  `type` enum('main','article','video','software--showcase','profile','thread','category') NOT NULL DEFAULT 'main',
  `metadata` json DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,'Home','Home','Go to the home page.','index.php','Blind Computing is a site dedicated to centralising and curating all manour of tips, tricks, tutorials and other information for blind and visually impaired users.','blind computing technology thefake-vip michael connor buchan channel infinity linux accessibility.',0,1,0,'main',NULL),(2,'Devices','Devices','Covers a range of devices such as braille notetakers, accessories and other accessible gadgets and reviews their accessibility.','devices.php','Covers a range of devices such as braille notetakers, accessories and other accessible gadgets and reviews their accessibility.','blind computing technology thefake-vip michael connor buchan channel infinity linux accessibility devices braille note taker gadgets',1,0,1,'main',NULL),(3,'Operating Systems','Operating Systems','Covers a variety of operating systems and reviews their accessibility, or lack there of.','operating-systems.php','This page covers a range of operating systems and reviews their accessibility for blind and visually impaired users.','blind computing technology thefake-vip michael connor buchan channel infinity linux accessibility windows mac os ios android bsd unix',2,0,2,'main',NULL),(4,'Software','Software','Covers software that is designed for the blind/VI market, as well as accessible software that is mainstream, with reviews, how tos and software news.','software.php','This page covers software both specific to blind/VI users and more mainstream, with reviews, how tos and software news.','blind computing technology thefake-vip michael connor buchan channel infinity linux accessibility software program application app',3,1,3,'main',NULL),(5,'Downloads','Downloads','Offers downloads of software both created by the blindcomputing team and by external sources that help blind/VI users get more done with their devices.','downloads.php','This page offers downloads of software both created by the blindcomputing team and by external sources that help blind/VI users get more done with their devices.Blind Computing, the home for Blind and Visually Impaired technology and information.','blind computing technology thefake-vip michael connor buchan channel infinity linux accessibility download programs applications apps software operating systems os ios macOS android windows linux bsd unix.',4,1,4,'main',NULL),(6,'Chat/Contact','Chat & Contact','Get in touch with the blindcomputing community by joining us on social media and a range of other chat platforms. Oh, yeh, email exists as well.','chat.php','Get in touch with the blindcomputing community by joining us on social media and a range of other chat platforms.','blind computing technology thefake-vip michael connor buchan channel infinity linux accessibility chat contact discord email irc freenode twitter facebook mastodon',5,0,0,'main',NULL),(7,'Blog','Blog','The blindcomputing blog, where we ask questions to the community, find answers and showcase what we\'re working on.','blog.php','This page provides links to visit the blindcomputing blog, where we ask questions to the community, find answers and showcase what we\'re working on.','blind computing technology thefake-vip michael connor buchan channel infinity linux accessibility blog rss',6,0,0,'main',NULL),(8,'Contributors','Contributors','A filterable list of contributors who have helped the blindcomputing site in some way. Thanks to you all!','contributors.php','This page is a filterable list of all the contributors who have helped the blindcomputing website in some way. Thanks to you all!','blind computing technology thefake-vip michael connor buchan channel infinity linux accessibility contributors code contribute thank you',7,0,0,'main',NULL);
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `videos` (
  `id` int(10) unsigned NOT NULL DEFAULT '0',
  `title` varchar(128) NOT NULL,
  `pageDescription` text NOT NULL COMMENT 'The description of the article, as shown by search engines.',
  `contributorID` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Set to 0 for annonymous.',
  `publishedOn` date NOT NULL,
  `editedOn` date DEFAULT NULL,
  `tags` varchar(256) DEFAULT 'blind computing article',
  `videoDescription` text,
  `videoInfo` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos`
--

LOCK TABLES `videos` WRITE;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-02-18 17:18:47
