-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: blindcomputing
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu18.04.1

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
  `title` varchar(192) NOT NULL,
  `published` date NOT NULL,
  `editted` date DEFAULT NULL,
  `contributor` varchar(192) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `title` (`title`),
  UNIQUE KEY `id_2` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (1,'What is linux?','2018-04-01',NULL,'TheFakeVIP'),(2,'The Webbie Web Browser and Accessible Programs','2018-04-01',NULL,'TheFakeVIP'),(3,'The CurrentState of Linux Accessibility on the Desktop','2016-04-09','2018-04-22','TheFakeVIP'),(4,'The BrailleNote Touch VS The Esytime | Braille NoteTaker Battle Part 1','2018-04-01',NULL,'TheFakeVIP'),(5,'BrailleNote Touch VS EsyTime - After Hands On','2018-04-01',NULL,'TheFakeVIP'),(6,'The State of Linux Command Line Accessibility as of Apr 2018','2018-04-09',NULL,'TheFakeVIP');
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contributors`
--

DROP TABLE IF EXISTS `contributors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contributors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(32) DEFAULT NULL,
  `email` text,
  `github` text,
  `youtube` text,
  `twitter` text,
  `fullName` varchar(99) DEFAULT NULL,
  `description` text,
  `imguri` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contributors`
--

LOCK TABLES `contributors` WRITE;
/*!40000 ALTER TABLE `contributors` DISABLE KEYS */;
INSERT INTO `contributors` VALUES (1,'TheFakeVIP','mikeybuchan@hotmail.co.uk','https://github.com/mcb2003','https://www.youtube.com/channel/UCRUCCRK2TY0Ns0MlX0qVhYg','https://twitter.com/BuchanMichael','Michael Connor Buchan','\n<p><strong>TheFakeVIP</strong> was the original creater of this website. He was unsatisfied with the lack of information out there on the internet for blind and visually impaired computer users and saw an opertunity to change that</p>\n<p>In the past, any information pertaining to blind/VI computing on the internet was scattered, not wide spread and far from widely documented. BlindComputing was set up as a result of this, providing one central place for the often overlooked community of blind computer users to get the information they needed.</p>\n<p><strong>And look at where we are now ...</p>','https://yt3.ggpht.com/a-/AJLlDp1qNjrYZT8Q0VHfCdCH4y8WwWd93eCge-H-5A=s900-mo-c-c0xffffffff-rj-k-no'),(2,'Billswax','billylapworth@gmail.com','https://github.com/BillyLapworth','https://www.youtube.com/channel/UCzeqSovpeNw4ocouGOjwfcg','https://twitter.com/Billswax','Billy Lapworth','<p>I\'m a 15 year old programmer who loves web development. I\'ve helped design quite a bit of the visuals of the site as well as moving to the better, more common navbar style instead of a sidebar. I\'ve also helped fix numerous bugs that you\'ll find a history of in <a href=\"https://github.com/BillyLapworth/blind-computing\">My Fork of the BlindComputing Site</a>.</p>','https://yt3.ggpht.com/a-/AJLlDp3--Q4L2xG38luVqWbN3M3so-0D_pKN8Ck51g=s900-mo-c-c0xffffffff-rj-k-no'),(3,'olivernybroe','olivernybroe@gmail.com','https://github.com/olivernybroe',NULL,NULL,'Oliver Nybroe','I\'m a software developer student from Copenhagen in Denmark.','https://avatars0.githubusercontent.com/u/5870441?s=460&amp;v=4');
/*!40000 ALTER TABLE `contributors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(512) DEFAULT NULL,
  `description` text,
  `uri` text NOT NULL,
  `category` varchar(32) NOT NULL,
  `contributor` varchar(256) DEFAULT NULL,
  `pageTitle` varchar(512) DEFAULT NULL,
  `pageDescription` text,
  `target` varchar(32) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,'Home','Go to the home page.','/home.php','main','TheFakeVIP and contributors to the BlindComputing website','Home',NULL,''),(2,'-','','','main',NULL,NULL,NULL,''),(3,'Devices','This page covers many different devices made for the blind and visually impaired.','/category/devices.php','main','','Devices',NULL,''),(4,'','','','','',NULL,NULL,''),(6,'','','','','',NULL,NULL,''),(7,'Operating Systems','This page covers the accessibility features, or lack there of, of various operating-systems, whether they be for mobile devices or desktop and laptop computers.','/category/operating-systems.php','main','','Operating Systems',NULL,''),(8,'Software','It\'s all well and good having an operating system to use, but what can you do with it with out software? This page reprovides reviews, overviews and showcases of different accessible software.','/category/software.php','main','','Software',NULL,''),(9,'-',NULL,'','main',NULL,NULL,NULL,''),(10,'Downloads','This page lists various files, some created by us, some not, rhR rhw blind and visually impaired may find helpfull. All credit goes to the creaters of the download.','/category/downloads.php','main','Creaters of the downloads','Downloads',NULL,''),(11,'-',NULL,'','main',NULL,NULL,NULL,''),(12,'Chat/Contact','Wether it\'s IRC, Discord or just a simple E-Mail, if you want to get in touch with any of our community members or the administrators of this website, you can do so on this page.','/category/chat.php','main','The BlindComputing Community','Chat/Contact',NULL,''),(13,'Blog','The BlindComputing Blog, where we ask questions to the community, get answers, post announcements and show off what we\'ve been working on.','/blog.php','main','Writers of the blog.','Blog',NULL,''),(14,'Joining us on the Discord server','If you\'ve got a discord account, you can chat with us by','https://discord.gg/rFHxWty','chat','Members of the VIP Central Discord server, particularly staff and mods',NULL,NULL,'blank'),(15,'Chat to us on IRC','Don\'t have a discord account or can\'t use it? You can also','/irc.php','chat','Ops and members of the IRC channel','IRC',NULL,''),(16,'View the Blog Web Page','To go to the blog\'s web site, click','https://blind-computing.blogspot.com','blog','Writers of the blog',NULL,NULL,'blank'),(17,'Subscribe to the RSS feed','You can also','http://feeds.feedburner.com/Blind-computingBlog','blog','Writers of the Blog',NULL,NULL,'blank'),(18,'Video showcasing the accessibility features of Mac Os 10.12','The second part in the accessibility for blind/vi users series on youtube, TheFake VIP has created a ','/video/mac-os-10.12-video.php','operating-systems-apple','TheFakeVIP','OS10.12',NULL,''),(19,'Video going over the main assistive tech features Ubuntu Mate 16.04 LTS provides','Ubuntu Mate is one of the most accessible linux distributions out there. This is a ','/video/ubuntu-mate-16.04-video.php','operating-systems-linux','TheFakeVIP','Ubuntu Mate 16.04',NULL,''),(20,'Video discussing the accessibility features and changes in Ubuntu Mate 17.10','When Ubuntu 17.10 came out, with its switch to gnome brought about a new way to access assistive technologies and related settings. This is a ','/video/ubuntu-17.10-video.php','operating-systems-linux','TheFakeVIP','Ubuntu 17.10',NULL,''),(21,'Talks about linux and what it is','Wondering what all this linux stuff is about? Why not read TheFakeVIP\'s article that ','/article/what-is-linux.php','operating-systems-linux','TheFakeVIP','What Is Linux?',NULL,''),(22,'This article talks about the webbie web browser and its accessible programs','The webbie web browser. Its a browser designed with the VI in mind. ','/article/webbie-programs.php','software','TheFakeVIP and the creaters of the Webbie project','The Webbie Browser and Tools',NULL,''),(23,'A list of pros and cons for both the BrailleNote Touch and the EsyTime','TheFakeVIP had a look at the <strong>BrailleNote Touch</strong> and the <strong>EsyTime</strong> notetakers and came up with ','/article/braillenote-touch-vs-esytime-1.php','devices','TheFakeVIP','BrailleNote Touch VS EsyTime (1)?',NULL,''),(24,'Overview of the accessibility features linux provides for VI users.','TheFakeVIP has also written an ','/article/state-of-linux-accessibility.php','operating-systems-linux','TheFakeVIP','State of Linux Accessibility',NULL,''),(25,'Second document about the BrailleNote Touch vs the EsyTime','After <strong>He got his hands on both devices</strong> He also added some extra points and questions in the ','/article/braillenote-touch-vs-esytime-2.php','devices','TheFakeVIP','BrailleNote Touch VS EsyTime (1)?',NULL,''),(26,'The Blind Installer Project (BIP) to find out more','TheFakeVIP, along with others on github, are looking to revolutionise the way blind/VI computer users get started with using a computer. Check out ','/download/blind-installer.php','downloads','contributors to the blind-installer-project on github','What Is Linux?',NULL,'blank'),(27,'Contributing','The page to visit if you want to help out the blind computing community by submitting content or code to us.','/contributing.php','None',NULL,'How to Contribute','The page to visit if you want to help out the blind computing community by submitting content or code to us.',''),(28,'contributors','A filterable list of all of the contributors that helped make this site possible.','/contributors.php','main','The contributors of blind computing','contributors','A filterable list of all of the contributors that helped make this site possible.',''),(29,'State of linux Command Line Accessibility as of April 2018','In addition, he has also written a follow-up to the previous article, talking about the ','/article/state-of-linux-cli-accessibility.php','operating-systems-linux','TheFakeVIP','State of Linux CLI Accessibility','This article talks about the accessibility of the linux Command Line Interface (CLI) from a blind / visually impaired stand-point',''),(30,'A Review of Ubuntu Mate 18.04 (beta)','Following on from his previous ubuntu mate video, TheFakeVIP is at it again, with ','/video/ubuntu-mate-18.04-beta-video.php','operating-systems-linux','TheFakeVIP','Ubuntu Mate 18.04 Beta','Following on from his previous video, TheFakeVIP is at it again with a video review of Ubuntu Mate 18.04. This review is based on the beta release.',''),(31,'Log-IN','Log into Blind Computing to post comments on articles and videos, submit content and join the Blind Computing community.','/login.php','misc','Blind Computing Contributors','Log-IN','Log into Blind Computing to post comments on articles and videos, submit content and join the Blind Computing community.',''),(32,'follow us on twitter <strong>@blind_comp</strong>','Like to get all your updates and news via twitter just like me? Why not ','https://www.twitter.com/blind_comp','chat','Maintainers of the Blind Computing twitter account','follow us on twitter <strong>@blind_comp</strong>','Join in the blind and visually impaired computing discussion on twitter by following @blind_comp','blank'),(33,'clicking this link to the facebook page','I\'ve also created a facebook group, where users can chat about anything blind computing and technology related. Join it by ','https://www.facebook.com/groups/347355422340125/','chat','Admins and members of the Blind Computing and Technology facebook group','clicking this link to the facebook page','Join in the discussion on facebook with the creaters, maintainers and community members of Blind Computing.','blank');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `videos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'The main ID field',
  `title` varchar(64) NOT NULL COMMENT 'This is the title of the video. Currently, there are no plans to use it, but it is here for completeness.',
  `description` text NOT NULL COMMENT 'The HTML description to be shown in the video info pannel.',
  `published` date NOT NULL COMMENT 'The publication date. Default is now.',
  `contributor` text NOT NULL COMMENT 'Stores the contributor[s] that created this video.',
  `uri` text NOT NULL COMMENT 'The URL or URI to the youtube video to be embedded',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos`
--

LOCK TABLES `videos` WRITE;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
INSERT INTO `videos` VALUES (1,'mac-os-10.12-video','<p>  After the success of my part 1 video and at long last, the second video in this series is finally here. There really isn\'t many videos about this topic on youtube, so I\'m at it again with a video about mac OS 10 (sorry, not the 10 bit any more, apple doesn\'t want that). This video is recorded using version 10.12 of the mac OS, so anything added after then is not covered. I also didn\'t go into much depth about different features, mainly focusing on voiceover so that people who are coming to the mac can grasp how it works. Enjoy!</p>','2017-05-28','TheFake-VIP','https://www.youtube.com/embed/rYpm0LxRJfo'),(2,'ubuntu-mate-16.04-video','<p>A quite long, rambling, keybord thwacking video showing the features linux provides for blind and visually impared users. We cover:</p> <ul><li>Compiz negative and zoom features,</li><li>Firefox settings to make it easier to see your web pages,</li><li>The orca screen reader</li></ul>','2016-10-21','TheFakeVIP','https://www.youtube.com/embed/yCfBoCzOoEE'),(3,'ubuntu-17.10-video','<p>With the new ubuntu 17.10 release that includes the gnome desktop by default, accessibility has changed a bit if you\'re coming from unity or any other desktop environment for that matter. This video highlights some of the changes, bugs, features and overall differences that I found when using ubuntu 17.10. I hope you all find this useful and Enjoy!</p>','2017-10-23','TheFakeVIP','https://www.youtube-nocookie.com/embed/mQTrnzkVkmk'),(4,'Ubuntu Mate 18.04 LTS (Beta) review','<p>In this video, I cover the changes and accessibility updates in ubuntu mate 18.04 beta 2, a prerelease version of Canonical\'s next gen, long term support distribution. Overall, there\'s not many new features, as the ubuntu mate team have worked on refinements to the mate desktop, but the new features are very nice nontheless.</p><p> We cover:</p><ul><li>Brisk menu as default, as well as how to change the menu back to the traditional menubar.</li><li>mate-tweak\'s annoying bug that makes it harder to set settings</li><li>Settings compiz to start up by default</li><li>Firefox preferences dialog changes, as well as my newly overhauled website</li><li>An updated installer that\'s now once again accessible</li><li>And much more!</li></ul><p></strong>Enjoy!</strong></p>','2018-04-09','TheFakeVIP','https://www.youtube-nocookie.com/embed/5vkDNPT9p1s');
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

-- Dump completed on 2018-05-31 20:25:33
