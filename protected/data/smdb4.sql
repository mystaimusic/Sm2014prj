-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 13, 2013 at 07:28 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `smdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `BANDS`
--

CREATE TABLE IF NOT EXISTS `bands` (
  `BANDID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `BANDNAME` varchar(32) NOT NULL,
  `DESCRIPTION` varchar(64) DEFAULT NULL,
  `IMAGEPATH` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`BANDID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `BRIDGE_GENRES_BAND`
--

CREATE TABLE IF NOT EXISTS `bridge_genres_band` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `GID` int(11) unsigned NOT NULL,
  `BID` int(11) unsigned NOT NULL,
  `PERCENTAGE` float DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `GID` (`GID`,`BID`),
  KEY `BID` (`BID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `BRIDGE_PL_SONGS`
--

CREATE TABLE IF NOT EXISTS `bridge_pl_songs` (
  `PSID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `PLID` int(11) unsigned NOT NULL,
  `SONGID` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`PSID`),
  KEY `PLID` (`PLID`),
  KEY `SONGID` (`SONGID`),
  KEY `PLID_2` (`PLID`),
  KEY `SONGID_2` (`SONGID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `BRIDGE_TAGS_PL`
--

CREATE TABLE IF NOT EXISTS `bridge_tags_pl` (
  `TPID` bigint(20) NOT NULL AUTO_INCREMENT,
  `TAGID` int(11) unsigned NOT NULL,
  `PLID` int(11) unsigned NOT NULL,
  PRIMARY KEY (`TPID`),
  KEY `TAGID` (`TAGID`),
  KEY `PLID` (`PLID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `GENRES`
--

CREATE TABLE IF NOT EXISTS `genres` (
  `GENREID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `GENRENAME` varchar(64) NOT NULL,
  `DESCRIPTION` varchar(128) DEFAULT NULL,
  `IMAGEPATH` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`GENREID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `user_id` int(11) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(128) NOT NULL,
  `salt` char(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `email`, `password`, `salt`) VALUES
(1, 'test_user', 'test@example.com', '00807432eae173f652f2064bdca1b61b290b52d40e429a7d295d76a71084aa96c0233b82f1feac45529e0726559645acaed6f3ae58a286b9f075916ebf66cacc', 'f9aab579fc1b41ed0c44fe4ecdbfcdb4cb99b9023abb241a6db833288f4eea3c02f76e0d35204a8695077dcf81932aa59006423976224be0390395bae152d4ef');

-- --------------------------------------------------------

--
-- Table structure for table `PLAYLISTS`
--

CREATE TABLE IF NOT EXISTS `playlists` (
  `PLID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `PLREF` varchar(32) NOT NULL,
  `PLTITLE` varchar(64) NOT NULL,
  `DESCRIPTION` varchar(128) DEFAULT NULL,
  `IMAGEPATH` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`PLID`),
  UNIQUE KEY `PLREF` (`PLREF`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `SONGS`
--

CREATE TABLE IF NOT EXISTS `songs` (
  `SONGID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `WEBSITE` varchar(16) NOT NULL DEFAULT 'YOUTUBE',
  `BANDID` int(10) unsigned NOT NULL,
  `CODE` varchar(32) NOT NULL,
  `TITLE` varchar(64) NOT NULL,
  `DESCRIPTION` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`SONGID`),
  KEY `BANDID` (`BANDID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `stored_playlists`
--

CREATE TABLE IF NOT EXISTS `stored_playlists` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `PL_HREF` varchar(32) NOT NULL,
  `PL_TITLE` varchar(128) NOT NULL,
  `BAND` varchar(128) DEFAULT NULL,
  `ID_VIDEO` varchar(128) DEFAULT NULL,
  `VIDEO_TITLE` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `stored_playlists`
--

INSERT INTO `stored_playlists` (`ID`, `PL_HREF`, `PL_TITLE`, `BAND`, `ID_VIDEO`, `VIDEO_TITLE`) VALUES
(1, 'playlist-1', 'Metallica', 'Metallica', 'bAsA00-5KoI&gl', 'Metallica - Nothing Else Matters [Original Video]'),
(2, 'playlist-1', 'Metallica', 'Metallica', 'CD-E-LDc384', 'Metallica - Enter Sandman [Official Music Video]'),
(3, 'playlist-2', 'M83', 'M83', 'dX3k_QDnzHE', 'M83 Midnight City Official Video'),
(4, 'playlist-2', 'M83', 'M83', 'Bzge5vY72hE', 'M83 - We Own the Sky'),
(5, 'playlist-3', 'U2', 'U2', 'XmSdTa9kaiQ', 'U2 - With Or Without You'),
(6, 'playlist-4', 'Daftpank', 'Daftpank', 'PsO6ZnUZI0g', 'Kanye West - Stronger'),
(7, 'playlist-4', 'Daftpank', 'Daftpank', 'G6WEIVDHS7k', 'ft Punk - Get Lucky'),
(8, 'playlist-5', 'NOFX', 'NOFX', 'krZyeldj7tQ', 'the separation of church and skate'),
(11, 'playlist-5', 'NOFX', 'NOFX', 'UmaqD3PElh0', 'everything in moderation');

-- --------------------------------------------------------

--
-- Table structure for table `TAGS`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `TAGID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `TAGNAME` varchar(64) NOT NULL,
  `DESCRIPTION` varchar(128) DEFAULT NULL,
  `IMAGEPATH` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`TAGID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `BANDS`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_ibfk_1` FOREIGN KEY (`BANDID`) REFERENCES `bands` (`BANDID`);
--
-- Constraints for table `BRIDGE_GENRES_BAND`
--
ALTER TABLE `bridge_genres_band`
  ADD CONSTRAINT `BRIDGE_GENRES_BAND_ibfk_2` FOREIGN KEY (`BID`) REFERENCES `bands` (`BANDID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `BRIDGE_GENRES_BAND_ibfk_1` FOREIGN KEY (`GID`) REFERENCES `genres` (`GENREID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `BRIDGE_PL_SONGS`
--
ALTER TABLE `bridge_pl_songs`
  ADD CONSTRAINT `BRIDGE_PL_SONGS_ibfk_1` FOREIGN KEY (`PLID`) REFERENCES `playlists` (`PLID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `BRIDGE_PL_SONGS_ibfk_2` FOREIGN KEY (`SONGID`) REFERENCES `songs` (`SONGID`) ON UPDATE CASCADE;

--
-- Constraints for table `BRIDGE_TAGS_PL`
--
ALTER TABLE `bridge_tags_pl`
  ADD CONSTRAINT `BRIDGE_TAGS_PL_ibfk_1` FOREIGN KEY (`TAGID`) REFERENCES `tags` (`TAGID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `BRIDGE_TAGS_PL_ibfk_2` FOREIGN KEY (`PLID`) REFERENCES `playlists` (`PLID`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;	
