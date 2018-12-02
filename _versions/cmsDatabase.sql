/**
 * Author:  WeszDEV
 */

CREATE TABLE `cms_system` (
  `id` int(1) NOT NULL auto_increment,
  `sitename` varchar(30) collate latin1_general_ci NOT NULL,
  `shortname` varchar(30) collate latin1_general_ci NOT NULL,
  `owner` varchar(30) collate latin1_general_ci NOT NULL,
  `motto` varchar(40) collate latin1_general_ci NOT NULL,
  `credits` int(11) collate latin1_general_ci NOT NULL,
  `pixels` int(11) collate latin1_general_ci NOT NULL,
  `points` int(11) collate latin1_general_ci NOT NULL,
  `maintenance` enum('0','1') collate latin1_general_ci NOT NULL,
  `language` varchar(2) collate latin1_general_ci NOT NULL,
  `ip` varchar(50) collate latin1_general_ci NOT NULL,
  `port` varchar(5) collate latin1_general_ci NOT NULL,
  `musport` varchar(5) collate latin1_general_ci NOT NULL,
  `swf` varchar(250) collate latin1_general_ci NOT NULL,
  `habboswf` varchar(250) collate latin1_general_ci NOT NULL,
  `habboswffolder` varchar(250) collate latin1_general_ci NOT NULL,
  `texts` varchar(250) collate latin1_general_ci NOT NULL,
  `variables` varchar(250) collate latin1_general_ci NOT NULL,
  `overridetexts` varchar(250) collate latin1_general_ci NOT NULL,
  `overridevariables` varchar(250) collate latin1_general_ci NOT NULL,
  `figuredata` varchar(250) collate latin1_general_ci NOT NULL,
  `productdata` varchar(250) collate latin1_general_ci NOT NULL,
  `furnidata` varchar(250) collate latin1_general_ci NOT NULL,
  `localhost` enum('0','1') collate latin1_general_ci NOT NULL,
  `adminnotes` text collate latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='wowCMS';


CREATE TABLE `cms_stafflog` (
  `id` int(5) NOT NULL auto_increment,
  `action` varchar(12) collate latin1_general_ci NOT NULL,
  `message` text collate latin1_general_ci,
  `note` text collate latin1_general_ci,
  `userid` int(11) NOT NULL,
  `targetid` int(11) default NULL,
  `timestamp` varchar(50) collate latin1_general_ci default NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=485 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='wowCMS';

CREATE TABLE `cms_news` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL DEFAULT 'top_story_news.png',
  `shortstory` text NOT NULL,
  `story` text NOT NULL,
  `author` varchar(100) NOT NULL,
  `time` int(11) NOT NULL DEFAULT '0',
  `updated` enum('0','1') NOT NULL DEFAULT '0',
  `timeupdated` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='wowCMS';

CREATE TABLE `cms_staffinfo` (
  `id` int(11) NOT NULL auto_increment,
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `specialrank` varchar(50) NOT NULL,
  `pincode` int(4) NOT NULL DEFAULT '0000',
  `title` varchar(100) NOT NULL,
  `story` text NOT NULL,
  `timestamp` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='wowCMS';

CREATE TABLE `cms_sitetexts` (
  `id` int(11) NOT NULL auto_increment,
  `category` varchar(50) NOT NULL,
  `page` varchar(50) NOT NULL,
  `nltitle` varchar(75) NOT NULL,
  `entitle` varchar(75) NOT NULL,
  `nl` text collate latin1_general_ci,
  `en` text collate latin1_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='wowCMS';

CREATE TABLE IF NOT EXISTS `cms_tags` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL DEFAULT '0',
  `tag` varchar(25) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='wowCMS';

CREATE TABLE IF NOT EXISTS `cms_languages` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `page` varchar(50) NOT NULL,
  `tag` varchar(100) NOT NULL,
  `en` text collate latin1_general_ci,
  `nl` text collate latin1_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='wowCMS';

CREATE TABLE IF NOT EXISTS `cms_staffapps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rankid` int(11) NOT NULL,
  `description` text collate latin1_general_ci,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='wowCMS';

CREATE TABLE IF NOT EXISTS `cms_staffappform` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `realname` varchar(100) NOT NULL,
  `usermail` varchar(100) NOT NULL,
  `discord` varchar(10) NOT NULL,
  `motivation` text collate latin1_general_ci,
  `experience` enum('1','2','3') NOT NULL DEFAULT '1',
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `timestamp` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='wowCMS';