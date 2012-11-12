-- MySQL dump 10.11
--
-- Dump for DOLIKA managment system
-- Server version	5.0.51b-community-nt-log

--
-- Table structure for table `dolika`
--

DROP TABLE IF EXISTS `dolika`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `dolika` (
  `id` smallint(6) NOT NULL auto_increment,
  `name` varchar(128) NOT NULL,
  `link` varchar(128) NOT NULL,
  `module` varchar(128) NOT NULL,
  `weight` smallint(6) NOT NULL default '100',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `dolika`
--

LOCK TABLES `dolika` WRITE;
/*!40000 ALTER TABLE `dolika` DISABLE KEYS */;
INSERT INTO `dolika` VALUES (1,'Статическая информация','static','static',100),(2,'Загрузка файлов','files','files',100);
/*!40000 ALTER TABLE `dolika` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dolika_password`
--

DROP TABLE IF EXISTS `dolika_password`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `dolika_password` (
  `id` smallint(6) NOT NULL auto_increment,
  `user` varchar(128) NOT NULL,
  `password` varchar(64) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `dolika_session`
--

DROP TABLE IF EXISTS `dolika_session`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `dolika_session` (
  `id` int(11) NOT NULL auto_increment,
  `id_owner` smallint(6) NOT NULL,
  `hash` varchar(128) default NULL,
  `lastvisit` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `files` (
  `id` smallint(6) NOT NULL auto_increment,
  `name` varchar(128) NOT NULL,
  `link` varchar(128) NOT NULL,
  `time` int(11) NOT NULL,
  `description` text,
  `size` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;


--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `pages` (
  `id` smallint(6) NOT NULL auto_increment,
  `name` varchar(32) NOT NULL,
  `type` varchar(64) NOT NULL,
  `title` varchar(32) NOT NULL,
  `meta_description` text,
  `link` varchar(32) default NULL,
  `file` varchar(64) default NULL,
  `icon` varchar(128) NOT NULL,
  `body` text NOT NULL,
  `id_owner` smallint(6) NOT NULL default '0',
  `weight` smallint(6) NOT NULL default '100',
  `display` enum('yes','no') NOT NULL default 'yes',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
SET character_set_client = @saved_cs_client;
-- Dump completed on 2012-11-03 19:08:12