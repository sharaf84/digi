-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 02, 2015 at 12:58 PM
-- Server version: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tss`
--

-- --------------------------------------------------------

--
-- Table structure for table `authclient`
--

CREATE TABLE IF NOT EXISTS `authclient` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `source_id` varchar(255) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_authclient_1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `authclient`
--

INSERT INTO `authclient` (`id`, `user_id`, `source`, `source_id`, `created`, `updated`) VALUES
(6, 65, 'facebook', '10207097600862395', '2015-08-18 17:38:22', '2015-08-18 17:38:22');

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Asterisk', '1', 1424278268);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/*', 2, NULL, NULL, NULL, 1424278227, 1424278227),
('Asterisk', 1, 'Full Access', NULL, NULL, 1424278062, 1424279109);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('Asterisk', '/*');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `base_content`
--

CREATE TABLE IF NOT EXISTS `base_content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(3) unsigned DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `brief` tinytext NOT NULL,
  `description` text NOT NULL,
  `body` text NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `sort` int(10) unsigned NOT NULL DEFAULT '0',
  `hits` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(3) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `base_content`
--

INSERT INTO `base_content` (`id`, `type`, `title`, `slug`, `brief`, `description`, `body`, `date`, `end_date`, `sort`, `hits`, `status`, `created`, `updated`) VALUES
(1, 1, 'Home Slider', 'home-slider', '', '', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n			\r\n			<video src="/shared/themes/frontend/images/src/chrome.mp4" controls></video>\r\n			\r\n			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>', NULL, NULL, 1, 0, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 'Arm workout lessons', 'arm-workout-lessons', 'The majority of people i see on here and at my gym i train people, have trouble gaining size and shape to their calves than simply training the gastrocnemius and soleus muscle.', 'The majority of people i see on here and at my gym i train people, have trouble gaining size and shape to their calves than simply training the gastrocnemius and soleus muscle.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n', NULL, NULL, 1, 3, NULL, '0000-00-00 00:00:00', '2015-08-18 09:23:55'),
(3, 2, 'Arm workout lessons', 'arm-workout-lessons-2', 'The majority of people i see on here and at my gym i train people, have trouble gaining size and shape to their calves than simply training the gastrocnemius and soleus muscle.', 'The majority of people i see on here and at my gym i train people, have trouble gaining size and shape to their calves than simply training the gastrocnemius and soleus muscle.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n', '2015-06-02 22:00:00', NULL, 2, 4, NULL, '0000-00-00 00:00:00', '2015-08-18 09:24:16'),
(4, 2, 'Arm workout lessons', 'arm-workout-lessons-3', 'The majority of people i see on here and at my gym i train people, have trouble gaining size and shape to their calves than simply training the gastrocnemius and soleus muscle.', 'The majority of people i see on here and at my gym i train people, have trouble gaining size and shape to their calves than simply training the gastrocnemius and soleus muscle.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n', '2015-06-01 22:00:00', NULL, 3, 2, NULL, '0000-00-00 00:00:00', '2015-08-18 09:24:34'),
(5, 2, 'Arm workout lessons', 'arm-workout-lessons-4', 'The majority of people i see on here and at my gym i train people, have trouble gaining size and shape to their calves than simply training the gastrocnemius and soleus muscle.', 'The majority of people i see on here and at my gym i train people, have trouble gaining size and shape to their calves than simply training the gastrocnemius and soleus muscle.', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n', '2015-05-31 22:00:00', NULL, 4, 1, NULL, '0000-00-00 00:00:00', '2015-08-18 09:24:50'),
(6, 1, 'Home Banner', 'home-banner', '', '', '', NULL, NULL, 2, 0, NULL, '2015-07-30 12:48:31', '2015-07-30 12:48:31'),
(7, 1, 'About Us', 'about-us', '', '', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus voluptates sint maiores a doloribus debitis, error repudiandae molestiae eligendi dignissimos id explicabo quo, eveniet accusamus autem commodi iusto voluptatum similique.</p>\r\n', NULL, NULL, 3, 0, NULL, '2015-08-11 11:10:14', '2015-08-18 12:04:15'),
(8, 1, 'Contact Us', 'contact-us', '', '', '<p><strong>Address:</strong> 15 AlFustat Street, 2nd Settelment, Fustat City, Masr Al Qadeema, Cairo, Egypt.</p>\r\n\r\n<p><strong>Telephone:</strong> 02-27429783 - 02-27429783, 19402</p>\r\n\r\n<p><strong>Fax:</strong> 02-27424323</p>\r\n', NULL, NULL, 4, 0, NULL, '2015-08-11 11:20:33', '2015-08-11 13:08:14'),
(9, 1, 'Terms Of Service', 'terms-of-service', '', '', '<p>Terms Of Service</p>\r\n', NULL, NULL, 5, 0, NULL, '2015-08-11 11:21:03', '2015-08-11 11:21:03'),
(10, 1, 'Privacy Policy', 'privacy-policy', '', '', '<p>Privacy Policy</p>\r\n', NULL, NULL, 6, 0, NULL, '2015-08-11 11:21:26', '2015-08-11 11:21:26');

-- --------------------------------------------------------

--
-- Table structure for table `base_media`
--

CREATE TABLE IF NOT EXISTS `base_media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `model_id` int(10) unsigned DEFAULT NULL,
  `model` varchar(64) NOT NULL,
  `path` varchar(255) NOT NULL,
  `filename` varchar(128) NOT NULL,
  `mime` varchar(128) NOT NULL,
  `size` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `embed` text NOT NULL,
  `status` tinyint(3) unsigned DEFAULT NULL,
  `type` tinyint(3) unsigned DEFAULT NULL,
  `sort` int(10) unsigned NOT NULL DEFAULT '0',
  `created` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `base_media`
--

INSERT INTO `base_media` (`id`, `model_id`, `model`, `path`, `filename`, `mime`, `size`, `title`, `description`, `link`, `embed`, `status`, `type`, `sort`, `created`, `updated`) VALUES
(1, 1, 'Page', '/shared/uploads/2015/06/01/', 'jjSb34LvXHteIRMd.png', 'image/png', 1439500, 'The BSN Push Training Guide', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non quod numquam sit magni expedita.', 'http://google.com', '', NULL, NULL, 1, '0000-00-00 00:00:00', '2015-06-02 16:29:32'),
(2, 1, 'Page', '/shared/uploads/2015/06/01/', 'cgRxUPubFyTHodTd.png', 'image/png', 1498917, 'The BSN Push Training Guide', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non quod numquam sit magni expedita.', 'http://google.com', '', NULL, NULL, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 1, 'Page', '/shared/uploads/2015/06/01/', 'rjSi8k3H2Z-Ymtkr.png', 'image/png', 1497535, 'The BSN Push Training Guide', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non quod numquam sit magni expedita.', 'http://google.com', '', NULL, NULL, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 3, 'Article', '/shared/uploads/2015/06/03/', 'Tk_yI_mEiTCkWq-q.png', 'image/png', 269755, '', '', '', '', NULL, NULL, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 4, 'Article', '/shared/uploads/2015/06/03/', '_ktL48K8fTehO5yP.png', 'image/png', 269755, '', '', '', '', NULL, NULL, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 3, 'Article', '/shared/uploads/2015/06/03/', 'sB8O3ktmcHLN84Px.png', 'image/png', 420318, '', '', '', '', NULL, NULL, 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 5, 'Article', '/shared/uploads/2015/06/03/', '28oP_2QkDz3XY18X.png', 'image/png', 269755, '', '', '', '', NULL, NULL, 8, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 11, 'Brand', '/shared/uploads/2015/06/03/', 'Q5tWNI8i8MSGHWyH.png', 'image/png', 7446, '', '', '', '', NULL, NULL, 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 12, 'Brand', '/shared/uploads/2015/06/03/', 'o4dyfZVg57rZtLZs.png', 'image/png', 15010, '', '', '', '', NULL, NULL, 10, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 13, 'Brand', '/shared/uploads/2015/06/03/', 'Cd3ICh53TdkhUdfg.png', 'image/png', 9697, '', '', '', '', NULL, NULL, 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 14, 'Brand', '/shared/uploads/2015/06/03/', 'RVuSSsOpQqhaMNrP.png', 'image/png', 20098, '', '', '', '', NULL, NULL, 12, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 15, 'Brand', '/shared/uploads/2015/06/03/', '2lzDIatGmUq35V7L.png', 'image/png', 11778, '', '', '', '', NULL, NULL, 13, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 16, 'Brand', '/shared/uploads/2015/06/03/', 'pVs0hitQeiaZs2zP.png', 'image/png', 7642, '', '', '', '', NULL, NULL, 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 19, 'Brand', '/shared/uploads/2015/06/03/', 'nP92NzqqJ9CFvUh4.png', 'image/png', 13410, '', '', '', '', NULL, NULL, 15, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(17, 17, 'Brand', '/shared/uploads/2015/06/03/', 'oTpNhr6P5OnPDXzI.png', 'image/png', 15322, '', '', '', '', NULL, NULL, 16, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 3, 'Product', '/shared/uploads/2015/06/03/', 'MAZBlgVOc_GGaegZ.png', 'image/png', 527519, '', '', '', '', NULL, NULL, 17, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 4, 'Product', '/shared/uploads/2015/06/03/', 'N3KgK0ZdPNzapdSb.png', 'image/png', 405279, '', '', '', '', NULL, NULL, 19, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 5, 'Product', '/shared/uploads/2015/06/03/', 'QYarRz7hjpxWwQiZ.png', 'image/png', 500922, '', '', '', '', NULL, NULL, 20, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 4, 'Product', '/shared/uploads/2015/06/03/', '2bwe_y81HPys3H0N.png', 'image/png', 500922, '', '', '', '', NULL, NULL, 18, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 8, 'Product', '/shared/uploads/2015/07/26/', 'Vb1kvYNlfBmSgeHc.png', 'image/png', 527519, '', '', '', '', NULL, NULL, 21, '2015-07-26 17:42:34', '2015-07-26 17:42:34'),
(24, 9, 'Product', '/shared/uploads/2015/07/26/', 'YhdsCjVhHvehBM-E.png', 'image/png', 500922, '', '', '', '', NULL, NULL, 22, '2015-07-26 17:42:49', '2015-07-26 17:42:49'),
(25, 10, 'Product', '/shared/uploads/2015/07/26/', 'EaFPaKo-2zXO5UKK.png', 'image/png', 527519, '', '', '', '', NULL, NULL, 23, '2015-07-26 17:43:10', '2015-07-26 17:43:10'),
(26, 11, 'Product', '/shared/uploads/2015/07/26/', '8FhNHGilZQ6oAWGb.png', 'image/png', 262299, '', '', '', '', NULL, NULL, 24, '2015-07-26 17:43:28', '2015-07-26 17:43:28'),
(27, 13, 'Product', '/shared/uploads/2015/07/26/', 'Yo7vLbeGP2WkUELp.png', 'image/png', 405279, '', '', '', '', NULL, NULL, 25, '2015-07-26 18:16:33', '2015-07-26 18:16:33'),
(29, 14, 'Product', '/shared/uploads/2015/07/26/', 'pN2OPcwI-0uIjI1E.png', 'image/png', 405279, '', '', '', '', NULL, NULL, 27, '2015-07-26 18:17:40', '2015-07-26 18:17:40'),
(32, 16, 'Product', '/shared/uploads/2015/07/26/', 'ltoo9HaTWrlK6qwV.png', 'image/png', 248780, '', '', '', '', NULL, NULL, 30, '2015-07-26 18:19:04', '2015-07-26 18:19:04'),
(33, 15, 'Product', '/shared/uploads/2015/07/26/', 'scVS8GYgBSSQoD2p.png', 'image/png', 158498, '', '', '', '', NULL, NULL, 31, '2015-07-26 18:20:11', '2015-07-26 18:20:11'),
(34, 13, 'Product', '/shared/uploads/2015/07/27/', '1r62u4CZB5gDTxWa.gif', 'image/gif', 117695, '', '', '', '', NULL, NULL, 32, '2015-07-27 13:37:37', '2015-07-27 13:37:37'),
(35, 14, 'Product', '/shared/uploads/2015/07/27/', '7RXLPTSSgGwUnxOK.gif', 'image/gif', 15868, '', '', '', '', NULL, NULL, 33, '2015-07-27 13:37:57', '2015-07-27 13:37:57'),
(36, 17, 'Product', '/shared/uploads/2015/07/27/', '-m0GYynG-MT0BKCL.png', 'image/png', 527519, '', '', '', '', NULL, NULL, 34, '2015-07-27 13:39:21', '2015-07-27 13:39:21'),
(37, 17, 'Product', '/shared/uploads/2015/07/27/', 'mapiLo3fb3YFL5TU.gif', 'image/gif', 15868, '', '', '', '', NULL, NULL, 35, '2015-07-27 13:39:31', '2015-07-27 13:39:31'),
(38, 6, 'Page', '/shared/uploads/2015/07/30/', 'ABo4lIwzH6DxhF9k.png', 'image/png', 247081, 'BLENDER BOTTLE', 'Daily Multivitamin for Overall Men''s Health malum soccer das lansey fall left', 'http://google.com', '', NULL, NULL, 36, '2015-07-30 12:52:26', '2015-07-30 12:58:14'),
(41, 1, 'User', '/shared/uploads/2015/08/18/', 'OQnHhYujtapl_l1n.png', 'image/png', 420318, '', '', '', '', NULL, NULL, 38, '2015-08-18 16:06:50', '2015-08-18 16:06:50'),
(42, 1, 'User', '/shared/uploads/2015/08/18/', 'cIprJwFsblhfv85-.png', 'image/png', 24141, '', '', '', '', NULL, NULL, 39, '2015-08-18 16:08:54', '2015-08-18 16:08:54'),
(43, 60, 'User', '/shared/uploads/2015/08/18/', 'UDIHV2kYTZTTUgfU..jpg', 'image/jpeg', 10984, '', '', '', '', NULL, NULL, 40, '2015-08-18 16:18:14', '2015-08-18 16:18:14'),
(44, 64, 'User', '/shared/uploads/2015/08/18/', 'sV4EMoUniuicFZdr.jpg', 'image/jpeg', 10984, '', '', '', '', NULL, NULL, 41, '2015-08-18 16:51:09', '2015-08-18 16:51:09'),
(45, 65, 'User', '/shared/uploads/2015/08/18/', 'L0CzbyH8adpvQYGr.jpg', 'image/jpeg', 10984, '', '', '', '', NULL, NULL, 42, '2015-08-18 17:38:28', '2015-08-18 17:38:28');

-- --------------------------------------------------------

--
-- Table structure for table `base_messages`
--

CREATE TABLE IF NOT EXISTS `base_messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `sender_id` int(10) unsigned DEFAULT NULL,
  `receiver_id` int(10) unsigned DEFAULT NULL,
  `model_id` int(10) unsigned DEFAULT NULL,
  `model` varchar(64) NOT NULL,
  `type` tinyint(3) unsigned DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_base_messages_1` (`parent_id`),
  KEY `fk_base_messages_2` (`sender_id`),
  KEY `fk_base_messages_3` (`receiver_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `base_settings`
--

CREATE TABLE IF NOT EXISTS `base_settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(64) NOT NULL,
  `value` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key_UNIQUE` (`key`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `base_settings`
--

INSERT INTO `base_settings` (`id`, `key`, `value`, `description`, `created`, `updated`) VALUES
(1, 'title', 'Digitree CMS', 'Application Url Title', '2015-05-19 15:23:26', '2015-05-19 16:17:17'),
(2, 'meta_keywords', 'Tss, Store, Articles', '', '0000-00-00 00:00:00', '2015-08-25 11:29:34');

-- --------------------------------------------------------

--
-- Table structure for table `base_tree`
--

CREATE TABLE IF NOT EXISTS `base_tree` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Unique tree node identifier',
  `root` int(10) unsigned DEFAULT NULL COMMENT 'Tree root identifier',
  `lft` int(11) NOT NULL COMMENT 'Nested set left property',
  `rgt` int(11) NOT NULL COMMENT 'Nested set right property',
  `lvl` smallint(6) NOT NULL COMMENT 'Nested set level / depth',
  `name` varchar(255) NOT NULL COMMENT 'The tree node name / label',
  `slug` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `icon` varchar(255) DEFAULT NULL COMMENT 'The icon to use for the node',
  `icon_type` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Icon Type: 1 = CSS Class, 2 = Raw Markup',
  `active` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Whether the node is active (will be set to false on deletion)',
  `selected` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Whether the node is selected/checked by default',
  `disabled` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Whether the node is enabled',
  `readonly` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Whether the node is read only (unlike disabled - will allow toolbar actions)',
  `visible` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Whether the node is visible',
  `collapsed` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Whether the node is collapsed by default',
  `movable_u` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Whether the node is movable one position up',
  `movable_d` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Whether the node is movable one position down',
  `movable_l` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Whether the node is movable to the left (from sibling to parent)',
  `movable_r` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Whether the node is movable to the right (from sibling to child)',
  `removable` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Whether the node is removable (any children below will be moved as siblings before deletion)',
  `removable_all` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Whether the node is removable along with descendants',
  `created` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_tree_NK1` (`root`),
  KEY `tbl_tree_NK2` (`lft`),
  KEY `tbl_tree_NK3` (`rgt`),
  KEY `tbl_tree_NK4` (`lvl`),
  KEY `tbl_tree_NK5` (`active`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `base_tree`
--

INSERT INTO `base_tree` (`id`, `root`, `lft`, `rgt`, `lvl`, `name`, `slug`, `link`, `description`, `icon`, `icon_type`, `active`, `selected`, `disabled`, `readonly`, `visible`, `collapsed`, `movable_u`, `movable_d`, `movable_l`, `movable_r`, `removable`, `removable_all`, `created`, `updated`) VALUES
(1, 1, 1, 14, 0, 'Categories', 'category', '', 'Product Categories', '', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0, '0000-00-00 00:00:00', '2015-05-31 13:08:10'),
(2, 2, 1, 22, 0, 'Brands', 'brands', '', 'Product Brands', '', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 3, 1, 14, 0, 'Sizes', 'sizes', '', 'Product Sizes', '', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 4, 1, 6, 0, 'Flavors', 'flavors', '', 'Product Flavors', '', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 1, 2, 3, 1, 'Muscle Building', 'muscle-building', '', '', NULL, 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 1, 4, 5, 1, 'Weight Gaining', 'weight-gaining', '', '', NULL, 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 1, 6, 7, 1, 'Pre-Workout', 'pre-workout', '', '', NULL, 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 1, 8, 9, 1, 'Weight Loss', 'weight-loss', '', '', NULL, 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 1, 10, 11, 1, 'Health & Wellness', 'health-wellness', '', '', NULL, 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 1, 12, 13, 1, 'Accessories', 'accessories', '', '', NULL, 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 2, 2, 3, 1, 'Universal', 'universal', '', '', NULL, 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 2, 4, 5, 1, 'BPI', 'bpi', '', '', NULL, 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 2, 6, 7, 1, 'Inner Armour', 'inner-armour', '', '', NULL, 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 2, 8, 9, 1, 'Gorilla Wear', 'gorilla-wear', '', '', NULL, 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 2, 10, 11, 1, 'Grenade', 'grenade', '', '', NULL, 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(16, 2, 12, 13, 1, 'Betancourt Nutrition', 'betancourt-nutrition', '', '', NULL, 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '2015-06-03 14:35:03'),
(17, 2, 14, 15, 1, 'BlenderBottle®', 'blenderbottle', '', '', NULL, 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(18, 2, 16, 17, 1, 'FA Nutrition', 'fa-nutrition', '', '', NULL, 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(19, 2, 18, 19, 1, 'Muscle Pharm', 'muscle-pharm', '', '', NULL, 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 2, 20, 21, 1, 'BSN', 'bsn', '', '', NULL, 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(21, 4, 2, 3, 1, 'Chocolate', 'chocolate', '', '', NULL, 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 4, 4, 5, 1, 'Vanilla', 'vanilla', '', '', NULL, 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 3, 2, 3, 1, '1 KG', '1-kg', '', '', NULL, 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '2015-08-11 16:01:04'),
(24, 3, 4, 5, 1, '2 KG', '2-kg', '', '', NULL, 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 3, 6, 7, 1, '3 KG', '3-kg', '', '', NULL, 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 5, 1, 6, 0, 'Cities', 'cities', '', 'Cities', '', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(27, 5, 2, 3, 1, 'Cairo', 'cairo', '', '', NULL, 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 5, 4, 5, 1, 'Alex', 'alex', '', '', NULL, 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 3, 8, 9, 1, 'Large', '4-kg', '', '', NULL, 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '2015-07-26 18:09:14'),
(31, 3, 10, 11, 1, 'Medium', 'medium', '', '', NULL, 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, '2015-07-26 18:09:41', '2015-07-26 18:09:41'),
(32, 3, 12, 13, 1, 'Small', 'small', '', '', NULL, 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, '2015-07-26 18:09:54', '2015-07-26 18:09:54');

-- --------------------------------------------------------

--
-- Table structure for table `base_user`
--

CREATE TABLE IF NOT EXISTS `base_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` char(123) NOT NULL,
  `token` char(123) DEFAULT NULL,
  `token_type` tinyint(3) unsigned DEFAULT NULL,
  `auth_key` char(123) DEFAULT NULL,
  `sso_key` char(123) DEFAULT NULL,
  `status` tinyint(3) unsigned DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `token_UNIQUE` (`token`),
  UNIQUE KEY `signature_UNIQUE` (`auth_key`),
  UNIQUE KEY `login_token_UNIQUE` (`sso_key`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=80 ;

--
-- Dumping data for table `base_user`
--

INSERT INTO `base_user` (`id`, `username`, `email`, `password`, `token`, `token_type`, `auth_key`, `sso_key`, `status`, `last_login`, `created`, `updated`) VALUES
(1, 'sharaf', 'a.sharaf@digitreeinc.com', '$2y$13$ga/hQeBy4AcDcNuijqMaFeDPuAh41/mbyZUuJ5QAQgVO4amkDwNJi', NULL, NULL, 'AMITSMZCAjVVktBlAx4sZDuCAVSZp3H2', NULL, 2, '2015-09-02 09:45:50', NULL, '2015-04-06 11:05:36'),
(26, 'test16', 'test16', 'test16', '', NULL, '', '', 2, NULL, NULL, '2015-04-05 14:29:38'),
(27, 'test17', 'test17', 'test17', NULL, NULL, NULL, NULL, 3, NULL, NULL, '2015-04-02 12:38:20'),
(28, 'test18', 'test18', 'test18', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2015-04-02 12:39:09'),
(29, 'test19', 'test19', 'test19', NULL, NULL, NULL, NULL, 3, NULL, NULL, '2015-04-02 12:38:44'),
(32, 'sharaf2', 'a.sharaf+2@digitreeinc.com', 'sharaf2', NULL, NULL, NULL, NULL, 2, NULL, '0000-00-00 00:00:00', '2015-04-02 12:39:25'),
(33, 'test', 'test@test.com', '$2y$13$hbbWD/thoeAw2yC1dKzg8.QA4auAeoHiTX/bbEaqN/OeyVX6.A2Xi', NULL, NULL, '63ObNEc4uboKXYlJr6BjryZV-Agx69Ws', NULL, 2, NULL, '2015-05-18 14:27:52', '2015-05-18 14:27:52'),
(34, 'test1', 'test1@test.com', '$2y$13$xEBSThw92wv3iavMIz5gGO.kbqSAkjyLsUSk3eo4Y2cAISrjCSik2', NULL, NULL, 'oqRYTHdGs4Yqz5Eefqi_0tpb50L25mDz', NULL, 1, NULL, '0000-00-00 00:00:00', '2015-05-31 11:54:45'),
(42, 'a.sharaf+1@digitreeinc.com', 'a.sharaf+1@digitreeinc.com', '$2y$13$WrCqmHtYreMtpbV6j01Ih.l9uCWhQCQpEgCJYgumRJIKvfdNb1xDO', '0m_mnNEcC5Iktyw76xVFWfCY2WxyJBZN_1441052693', 2, 'DOOS1yGmT-k_rUGycNE-UEY02qUkDqKy', NULL, 2, '2015-09-01 13:23:37', '0000-00-00 00:00:00', '2015-08-31 20:24:53'),
(44, 'a.sharaf+3@digitreeinc.com', 'a.sharaf+3@digitreeinc.com', '$2y$13$UhnUU6Ik.eEM0MgZhkwOhOb.1U0rq3F/tQLSVFhP1tUXfaNRO/dSO', NULL, NULL, 'z2Rp4voOYt70ul1lR8lEeaE2zFMvDfp-', NULL, 1, '2015-07-07 13:32:21', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(56, 'a.sharaf+5@digitreeinc.com', 'a.sharaf+5@digitreeinc.com', '$2y$13$tVZ9n.URFre/EJfw8WnsQeCzlubhIH7t4fS3KtKxUtnxSi/xAxTny', NULL, NULL, 'MADtDxckCuEEUxhy1UilNljfzfWqRmhr', NULL, 1, '2015-07-07 13:43:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(57, 'a.sharaf+6@digitreeinc.com', 'a.sharaf+6@digitreeinc.com', '$2y$13$6wAN1GQAyHCrR/N90KM.PefG2jxE/bZu13WIub5Dm9eDQbYNzhtzC', NULL, NULL, 'yFFfurMFs-7H_Pkcm7z1O-sjaimtmDuk', NULL, 1, '2015-07-07 14:38:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(58, 'a.sharaf+7@digitreeinc.com', 'a.sharaf+7@digitreeinc.com', '$2y$13$yDQgiDPzbHQ7EKpk50.kKuEZEtBnOoQN9NSVQ.pGrcal15A1DcZnC', NULL, NULL, 'lyUYNIONCr1Vzd9nSeKERI-iSlgXAITW', NULL, 2, '2015-07-21 11:38:45', '0000-00-00 00:00:00', '2015-07-21 11:38:45'),
(59, 'a.sharaf+10@digitree.com', 'a.sharaf+10@digitree.com', '$2y$13$K4OO.js.6BN6a.gb0t4ah.0LDPtUb5oAOrcyXDM5BdLBiKTfNy5yG', 'V6W4tyCPrE2oGuW8XeocnbJkd-0h3uJS_1437577535', 1, 'oxxPCuiAkxNqqn0i2457VuYXdBCIG7I4', NULL, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 'sharaf.developer@gmail.com', 'sharaf.developer@gmail.com', '$2y$13$iInltkX9qW4ZzsYalvspPuEidf//yYyFMyF/0h8v3sKdwZOC.doyK', NULL, NULL, 'oN0y6TFd_LFX_7yrG9xrfKKFa8Vk6h76', NULL, 2, '2015-08-18 17:38:28', '2015-08-18 17:38:22', '2015-08-18 17:38:22'),
(66, 'a.sharaf+1@digitree.com', 'a.sharaf+1@digitree.com', '$2y$13$4yd9N.S8b0cNcD.PcmW2ze1gqfsX/kdhfWYaeuPYrXIYPF.CtrdcK', '6Wnz8NThT0sIquZg3vkcQXNkE6JexQaL_1440609959', 1, '6SZzwQ_yvGCajGNtkCMxoo_NzKuBX-yR', NULL, 1, NULL, '2015-08-26 17:25:59', '2015-08-26 17:25:59'),
(74, 'a.sharaf+8@digitreeinc.com', 'a.sharaf+8@digitreeinc.com', '$2y$13$m/fOMrW.6SdUfoyw66QHNu7cfrXbZXGDNF4wjJVU2dg8tNxkyxVra', 'NFZ6HyD0VWGuS48pQGFhZyUyj1LYjuDO_1441049582', 1, 'crCKS6Go3zpqUXqFimkc_1-hbNBqfC_6', NULL, 1, NULL, '2015-08-31 19:33:02', '2015-08-31 19:33:02'),
(77, 'a.sharaf+9@digitreeinc.com', 'a.sharaf+9@digitreeinc.com', '$2y$13$mmwRX8AxMTKyKPWko5Ilcehi2QjgVtTYfEEknb8VHr1EViDlyyQhu', NULL, NULL, 'vzTr1cb8QDSotOEYCDvdMRfU3oirs5vY', NULL, 2, '2015-08-31 19:43:06', '2015-08-31 19:40:19', '2015-08-31 19:43:06'),
(78, 'a.sharaf+10@digitreeinc.com', 'a.sharaf+10@digitreeinc.com', '$2y$13$aOWJuabjukQg4Lfyc6cTDO4OXbDHM3tY8kouqd53L1HyCDaDq6ohC', NULL, NULL, 'YZYEiY8E-GyI6iDHfhrMtqc10-ZPqGHu', NULL, 2, '2015-08-31 20:24:36', '2015-08-31 20:24:15', '2015-08-31 20:24:36'),
(79, 'a.sharaf+11@digitreeinc.com', 'a.sharaf+11@digitreeinc.com', '$2y$13$eCNyzMQ19EPdZHxlbbufouj9qaa4r8uyt/6.8iQtb1BsNHDt8Zs62', '-xS4VWjIk1-Lp5YiPXg6Y_5NhpzJ_t-G_1441052843', 1, 'qVUxPJnWiOqTKaQftvpQ7O2Tb-VWGB04', NULL, 1, NULL, '2015-08-31 20:27:23', '2015-08-31 20:27:23');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned DEFAULT NULL,
  `item_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `price` decimal(6,2) NOT NULL DEFAULT '0.00',
  `qty` smallint(6) NOT NULL DEFAULT '0',
  `status` tinyint(3) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cart_1_idx` (`order_id`),
  KEY `fk_cart_2_idx` (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `order_id`, `item_id`, `title`, `price`, `qty`, `status`, `created`, `updated`) VALUES
(14, 2, 13, 'Platinum™', 100.00, 1, NULL, '2015-08-10 15:27:06', '2015-08-12 22:41:29'),
(18, 2, 15, 'Animal GYM Bag', 300.00, 2, NULL, '2015-08-10 20:38:21', '2015-08-12 22:41:29'),
(20, 3, 14, 'Platinum™', 200.00, 1, NULL, '2015-08-12 23:46:34', '2015-08-13 08:40:13'),
(21, 4, 14, 'Platinum™', 200.00, 7, NULL, '2015-08-13 11:47:01', '2015-08-13 11:56:34'),
(22, 4, 13, 'Platinum™', 100.00, 10, NULL, '2015-08-13 11:53:20', '2015-08-13 11:56:34'),
(23, 5, 14, 'Platinum™', 200.00, 2, NULL, '2015-08-16 12:13:56', '2015-08-19 18:16:39'),
(25, 5, 15, 'Animal GYM Bag', 300.00, 1, NULL, '2015-08-18 14:51:23', '2015-08-19 18:16:39'),
(26, 7, 14, 'Platinum™', 200.00, 2, NULL, '2015-08-18 18:08:51', '2015-08-18 18:09:16'),
(27, 8, 15, 'Animal GYM Bag', 300.00, 1, NULL, '2015-08-18 18:11:04', '2015-08-18 18:11:16'),
(28, 9, 17, 'Platinum™', 300.00, 1, NULL, '2015-08-20 09:46:13', '2015-08-20 09:46:21'),
(29, 10, 14, 'Platinum™', 200.00, 1, NULL, '2015-08-26 18:02:45', '2015-08-26 18:05:41'),
(30, 11, 14, 'Platinum™', 200.00, 1, NULL, '2015-08-31 21:23:18', '2015-08-31 21:23:28'),
(31, 12, 14, 'Platinum™', 200.00, 1, NULL, '2015-08-31 21:26:06', '2015-08-31 21:26:12'),
(32, 13, 14, 'Platinum™', 200.00, 1, NULL, '2015-08-31 21:27:39', '2015-08-31 21:27:45'),
(33, 14, 14, 'Platinum™', 200.00, 1, NULL, '2015-08-31 21:29:55', '2015-08-31 21:30:01'),
(34, 15, 14, 'Platinum™', 200.00, 1, NULL, '2015-08-31 21:31:09', '2015-08-31 21:31:17'),
(35, 16, 14, 'Platinum™', 200.00, 1, NULL, '2015-09-01 10:08:04', '2015-09-01 12:37:52'),
(36, 17, 14, 'Platinum™', 200.00, 1, NULL, '2015-09-01 12:40:49', '2015-09-01 12:42:13'),
(37, 18, 14, NULL, 0.00, 1, NULL, '2015-09-01 13:06:48', '2015-09-01 13:06:48'),
(38, 18, 13, NULL, 0.00, 1, NULL, '2015-09-01 14:26:26', '2015-09-01 14:26:26');

-- --------------------------------------------------------

--
-- Table structure for table `Comment`
--

CREATE TABLE IF NOT EXISTS `Comment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `entity` char(10) COLLATE utf8_unicode_ci NOT NULL,
  `entityId` int(10) unsigned NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `parentId` int(10) unsigned DEFAULT NULL,
  `level` tinyint(3) NOT NULL DEFAULT '1',
  `createdBy` int(10) unsigned DEFAULT NULL,
  `updatedBy` int(10) unsigned DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `createdAt` int(11) NOT NULL,
  `updatedAt` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `entity_index` (`entity`),
  KEY `status_index` (`status`),
  KEY `fk_Comment_1_idx` (`createdBy`),
  KEY `fk_Comment_2_idx` (`updatedBy`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `Comment`
--

INSERT INTO `Comment` (`id`, `entity`, `entityId`, `content`, `parentId`, `level`, `createdBy`, `updatedBy`, `status`, `createdAt`, `updatedAt`) VALUES
(1, 'd2dd67ec', 4, 'test comments', NULL, 1, 65, 65, 1, 1439919701, 0),
(2, 'd2dd67ec', 3, 'test comment', NULL, 1, 42, 42, 1, 1440069399, 0),
(3, 'd2dd67ec', 3, 'last comment', NULL, 1, 42, 42, 1, 1440069412, 0),
(4, 'd2dd67ec', 4, 'test comment', NULL, 1, 42, 42, 1, 1440069507, 0),
(5, 'd2dd67ec', 4, 'last comment', NULL, 1, 42, 42, 1, 1440069515, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hits`
--

CREATE TABLE IF NOT EXISTS `hits` (
  `hit_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_agent` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `target_group` varchar(255) NOT NULL,
  `target_pk` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  PRIMARY KEY (`hit_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `hits`
--

INSERT INTO `hits` (`hit_id`, `user_agent`, `ip`, `target_group`, `target_pk`, `created_at`) VALUES
(16, 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:39.0) Gecko/20100101 Firefox/39.0', '127.0.0.1', 'Article', 3, 1439934523),
(17, 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:39.0) Gecko/20100101 Firefox/39.0', '127.0.0.1', 'Article', 2, 1439934566),
(18, 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:39.0) Gecko/20100101 Firefox/39.0', '127.0.0.1', 'Article', 5, 1439934628),
(19, 'Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:39.0) Gecko/20100101 Firefox/39.0', '127.0.0.1', 'Article', 4, 1440069496);

-- --------------------------------------------------------

--
-- Table structure for table `meta_tags`
--

CREATE TABLE IF NOT EXISTS `meta_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model` varchar(255) NOT NULL,
  `model_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `object` (`model`,`model_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `meta_tags`
--

INSERT INTO `meta_tags` (`id`, `model`, `model_id`, `title`, `keywords`, `description`, `created`, `updated`) VALUES
(1, 'Page', 10, 'Privacy Policy', 'Privacy Policy', 'Privacy Policy', NULL, '2015-08-11 11:21:26'),
(4, 'Page', 34, 'test', 'test', 'test', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Article', 35, '', '', '', '0000-00-00 00:00:00', '2015-05-31 15:13:43'),
(7, 'Page', 1, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Article', 2, '', '', '', '0000-00-00 00:00:00', '2015-08-18 09:23:55'),
(9, 'Article', 3, '', '', '', '0000-00-00 00:00:00', '2015-08-18 09:24:16'),
(10, 'Article', 4, 'Arm workout lessons', 'Arm workout lessons', 'The majority of people i see on here and at my gym i train people, have trouble gaining size and shape to their calves than simply training the gastrocnemius and soleus muscle.', '0000-00-00 00:00:00', '2015-08-18 09:24:34'),
(11, 'Article', 5, '', '', '', '0000-00-00 00:00:00', '2015-08-18 09:24:50'),
(17, 'Product', 8, 'Platinum', 'Platinum', 'Platinum is an ultra-premium lean gainer engineered', '2015-07-26 17:30:19', '2015-08-17 20:08:45'),
(18, 'Product', 9, '', '', '', '2015-07-26 17:37:18', '2015-07-26 17:37:18'),
(19, 'Product', 10, '', '', '', '2015-07-26 17:39:27', '2015-07-26 17:44:06'),
(20, 'Product', 11, '', '', '', '2015-07-26 17:41:36', '2015-07-28 13:25:57'),
(21, 'Product', 12, '', '', '', '2015-07-26 17:45:39', '2015-07-26 17:45:39'),
(22, 'Product', 13, '', '', '', '2015-07-26 17:54:11', '2015-07-26 17:54:11'),
(23, 'Product', 14, '', '', '', '2015-07-26 18:07:39', '2015-07-26 18:07:39'),
(24, 'Product', 15, '', '', '', '2015-07-26 18:10:32', '2015-07-26 18:19:31'),
(25, 'Product', 16, '', '', '', '2015-07-26 18:15:32', '2015-07-26 18:15:32'),
(26, 'Product', 17, '', '', '', '2015-07-27 12:48:05', '2015-07-27 13:38:49'),
(27, 'Page', 6, '', '', '', '2015-07-30 12:48:31', '2015-07-30 12:48:31'),
(28, 'Page', 7, 'about us', 'about us', 'about us', '2015-08-11 11:10:14', '2015-08-18 12:04:15'),
(29, 'Page', 8, 'Contact Us', 'Contact Us', 'Contact Us', '2015-08-11 11:20:33', '2015-08-11 13:08:15'),
(30, 'Page', 9, 'Terms Of Service', 'Terms Of Service', 'Terms Of Service', '2015-08-11 11:21:03', '2015-08-11 11:21:03');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1424090952),
('m010101_100001_init_comment', 1439761184),
('m010102_100002_init_hits', 1439925856),
('m130524_201442_init', 1424090958),
('m140506_102106_rbac_init', 1424263170),
('m150312_172156_meta_tags', 1432805470);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `comment` text NOT NULL,
  `payment_method` tinyint(3) unsigned DEFAULT NULL,
  `amount` decimal(8,2) unsigned DEFAULT '0.00',
  `token` char(123) DEFAULT NULL,
  `new` tinyint(1) unsigned DEFAULT NULL,
  `status` tinyint(3) unsigned DEFAULT NULL,
  `paid` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `created` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_order_1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `name`, `email`, `phone`, `address`, `comment`, `payment_method`, `amount`, `token`, `new`, `status`, `paid`, `created`, `updated`) VALUES
(2, 42, 'Ahmed Sharaf1', 'a.sharaf+1@digitreeinc.com', '12345678911', 'Address Address Address, Alex', '', 1, 700.00, 'QnIg-NmBCrJP40_ccvf_1439419289', 0, 3, 0, '2015-08-05 11:02:32', '2015-08-24 16:39:10'),
(3, 42, 'Ahmed Sharaf1', 'a.sharaf+1@digitreeinc.com', '12345678911', 'Address Address Address, Alex', '', 1, 200.00, 'fBorSP1BhECXqXZ_1439455213', 0, 3, 0, '2015-08-12 22:43:35', '2015-08-24 19:49:54'),
(4, 42, 'Ahmed Sharaf1', 'a.sharaf+1@digitreeinc.com', '12345678911', 'Address Address Address, Alex', '', 1, 2400.00, 'ngqNtNdvkOqIeyM_1439466994', 0, 10, 0, '2015-08-13 11:47:01', '2015-08-24 19:52:56'),
(5, 42, 'Ahmed Sharaf1', 'a.sharaf+1@digitreeinc.com', '12345678911', 'Address Address Address, Alex', '', 2, 700.00, 'H8TdACMxOL2_1440008199', 0, 10, 1, '2015-08-16 12:13:56', '2015-08-24 14:58:50'),
(7, 65, 'Ahmed Sharaf', 'sharaf.developer@gmail.com', '1111111111', 'adress', 'comment', 1, 400.00, 'ULkvlQ00lFwItC1hbpohv3g8TMtuwiA4_1439921356', 0, 10, 0, '2015-08-18 18:08:50', '2015-08-25 09:32:10'),
(8, 65, 'Ahmed Sharaf', 'sharaf.developer@gmail.com', '1111111111', 'adress', '', 1, 300.00, 'br86pMpeSzok6IcS_1439921476', 0, 1, 0, '2015-08-18 18:11:04', '2015-08-24 20:47:18'),
(9, 42, 'Ahmed Sharaf1', 'a.sharaf+1@digitreeinc.com', '12345678911', 'Address Address Address, Alex', '', 2, 300.00, 'AsTzHzGgnsJ65Hgu_1440063981', 1, 1, 1, '2015-08-20 09:46:13', '2015-08-20 09:52:46'),
(10, 42, 'Ahmed Sharaf1', 'a.sharaf+1@digitreeinc.com', '12345678911', 'Address Address Address, Alex', '', 2, 200.00, '71GowHCLdp8vZmQF_1440612341', 1, 1, 0, '2015-08-26 18:02:45', '2015-08-26 18:05:41'),
(11, 42, 'Ahmed Sharaf1', 'a.sharaf+1@digitreeinc.com', '12345678911', 'Address Address Address, Alex', '', 2, 200.00, 'Igl_5VKOn6JcVrzm_1441056208', 0, 1, 1, '2015-08-31 21:23:18', '2015-08-31 21:25:23'),
(12, 42, 'Ahmed Sharaf1', 'a.sharaf+1@digitreeinc.com', '12345678911', 'Address Address Address, Alex', '', 2, 200.00, 'mGAWWdyhDe_62_0P_1441056372', 1, 1, 1, '2015-08-31 21:26:06', '2015-08-31 21:26:48'),
(13, 42, 'Ahmed Sharaf1', 'a.sharaf+1@digitreeinc.com', '12345678911', 'Address Address Address, Alex', '', 2, 200.00, 'fsJsN4U0UPdBJwLN_1441056465', 1, 1, 1, '2015-08-31 21:27:39', '2015-08-31 21:29:07'),
(14, 42, 'Ahmed Sharaf1', 'a.sharaf+1@digitreeinc.com', '12345678911', 'Address Address Address, Alex', '', 2, 200.00, '-DN5KMXFpkxR3JBS_1441056601', 1, 1, 1, '2015-08-31 21:29:55', '2015-08-31 21:30:35'),
(15, 42, 'Ahmed Sharaf1', 'a.sharaf+1@digitreeinc.com', '12345678911', 'Address Address Address, Alex', '', 2, 200.00, '1rJ3VxtMzS5ghR6V_1441056677', 1, 1, 1, '2015-08-31 21:31:09', '2015-08-31 21:31:44'),
(16, 42, 'Ahmed Sharaf1', 'a.sharaf+1@digitreeinc.com', '12345678911', 'Address Address Address, Alex', '', 1, 200.00, '0jskGlXfFAq6jkUe_1441111072', 1, 1, 0, '2015-08-31 21:45:09', '2015-09-01 12:37:52'),
(17, 42, 'Ahmed Sharaf1', 'a.sharaf+1@digitreeinc.com', '12345678911', 'Address Address Address, Alex', '', 1, 200.00, 'aPeaTD-igDmhpaoJ_1441111333', 1, 1, 0, '2015-09-01 12:42:13', '2015-09-01 12:42:13'),
(18, 42, '', '', '', '', '', NULL, 0.00, NULL, NULL, 0, 0, '2015-09-01 13:06:48', '2015-09-01 13:06:48');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) unsigned DEFAULT NULL,
  `gateway` varchar(45) DEFAULT NULL,
  `transaction_reference` varchar(45) DEFAULT NULL,
  `response` text,
  `status` varchar(45) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_payment_1_idx` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `order_id`, `gateway`, `transaction_reference`, `response`, `status`, `created`, `updated`) VALUES
(2, 5, 'Migs_ThreeParty', '523207587497', '{"vpc_3DSXID":"tKUO1yKegVuxvZ+l0mfL+J\\/Pxa8=","vpc_3DSenrolled":"N","vpc_AVSRequestCode":"Z","vpc_AVSResultCode":"Unsupported","vpc_AVS_City":"","vpc_AVS_Country":"EGY","vpc_AVS_PostCode":"12345","vpc_AVS_StateProv":"","vpc_AVS_Street01":"Address","vpc_AcqAVSRespCode":"Unsupported","vpc_AcqCSCRespCode":"Unsupported","vpc_AcqResponseCode":"00","vpc_Amount":"70000","vpc_AuthorizeId":"587497","vpc_BatchNo":"20150820","vpc_CSCResultCode":"Unsupported","vpc_Card":"VC","vpc_CardNum":"xxxxxxxxxxxx0001","vpc_Command":"pay","vpc_Locale":"en","vpc_MerchTxnRef":"H8TdACMxOL2_1440008199","vpc_Merchant":"TEST512345USD","vpc_Message":"Approved","vpc_ReceiptNo":"523207587497","vpc_SecureHash":"731DDD441A63173704E41BD8C3899014","vpc_TransactionNo":"2000069506","vpc_TxnResponseCode":"0","vpc_VerSecurityLevel":"06","vpc_VerStatus":"E","vpc_VerType":"3DS","vpc_Version":"1"}', NULL, '2015-08-19 21:34:57', '2015-08-19 21:34:57'),
(3, 9, 'Migs_ThreeParty', '523219588343', '{"vpc_3DSXID":"k15hbkiSK1QA5prC\\/omE+aIQUWY=","vpc_3DSenrolled":"N","vpc_AVSRequestCode":"Z","vpc_AVSResultCode":"Unsupported","vpc_AVS_City":"","vpc_AVS_Country":"EGY","vpc_AVS_PostCode":"12345","vpc_AVS_StateProv":"","vpc_AVS_Street01":"Address","vpc_AcqAVSRespCode":"Unsupported","vpc_AcqCSCRespCode":"Unsupported","vpc_AcqResponseCode":"00","vpc_Amount":"30000","vpc_AuthorizeId":"588343","vpc_BatchNo":"20150820","vpc_CSCResultCode":"Unsupported","vpc_Card":"VC","vpc_CardNum":"xxxxxxxxxxxx0001","vpc_Command":"pay","vpc_Locale":"en","vpc_MerchTxnRef":"AsTzHzGgnsJ65Hgu_1440063981","vpc_Merchant":"TEST512345USD","vpc_Message":"Approved","vpc_ReceiptNo":"523219588343","vpc_SecureHash":"4D7953A6B486377922C92D91EFDABEC7","vpc_TransactionNo":"2000069515","vpc_TxnResponseCode":"0","vpc_VerSecurityLevel":"06","vpc_VerStatus":"E","vpc_VerType":"3DS","vpc_Version":"1"}', NULL, '2015-08-20 09:52:46', '2015-08-20 09:52:46'),
(4, 11, 'Migs_ThreeParty', '524407340785', '{"vpc_3DSXID":"puXNCkER70kiE9rflQgEwscBsx0=","vpc_3DSenrolled":"N","vpc_AVSRequestCode":"Z","vpc_AVSResultCode":"Unsupported","vpc_AVS_City":"","vpc_AVS_Country":"EGY","vpc_AVS_PostCode":"12345","vpc_AVS_StateProv":"","vpc_AVS_Street01":"address","vpc_AcqAVSRespCode":"Unsupported","vpc_AcqCSCRespCode":"Unsupported","vpc_AcqResponseCode":"00","vpc_Amount":"20000","vpc_AuthorizeId":"340785","vpc_BatchNo":"20150901","vpc_CSCResultCode":"Unsupported","vpc_Card":"VC","vpc_CardNum":"xxxxxxxxxxxx0001","vpc_Command":"pay","vpc_Locale":"en","vpc_MerchTxnRef":"Igl_5VKOn6JcVrzm_1441056208","vpc_Merchant":"TEST512345USD","vpc_Message":"Approved","vpc_OrderInfo":"11","vpc_ReceiptNo":"524407340785","vpc_SecureHash":"CF97D005FFF18A2D30D92FCEEE19D095","vpc_TransactionNo":"75225","vpc_TxnResponseCode":"0","vpc_VerSecurityLevel":"06","vpc_VerStatus":"E","vpc_VerType":"3DS","vpc_Version":"1"}', NULL, '2015-08-31 21:24:24', '2015-08-31 21:24:24'),
(5, 12, 'Migs_ThreeParty', '524407340795', '{"vpc_3DSXID":"xFKmXDPepVXn9GJP3HKXqJ7ydZs=","vpc_3DSenrolled":"N","vpc_AVSRequestCode":"Z","vpc_AVSResultCode":"Unsupported","vpc_AVS_City":"","vpc_AVS_Country":"EGY","vpc_AVS_PostCode":"12345","vpc_AVS_StateProv":"","vpc_AVS_Street01":"address","vpc_AcqAVSRespCode":"Unsupported","vpc_AcqCSCRespCode":"Unsupported","vpc_AcqResponseCode":"00","vpc_Amount":"20000","vpc_AuthorizeId":"340795","vpc_BatchNo":"20150901","vpc_CSCResultCode":"Unsupported","vpc_Card":"VC","vpc_CardNum":"xxxxxxxxxxxx0001","vpc_Command":"pay","vpc_Locale":"en","vpc_MerchTxnRef":"mGAWWdyhDe_62_0P_1441056372","vpc_Merchant":"TEST512345USD","vpc_Message":"Approved","vpc_OrderInfo":"12","vpc_ReceiptNo":"524407340795","vpc_SecureHash":"648C94E259C3270E9CDA5D5555BE18E2","vpc_TransactionNo":"75226","vpc_TxnResponseCode":"0","vpc_VerSecurityLevel":"06","vpc_VerStatus":"E","vpc_VerType":"3DS","vpc_Version":"1"}', NULL, '2015-08-31 21:26:48', '2015-08-31 21:26:48'),
(6, 13, 'Migs_ThreeParty', '524407340801', '{"vpc_3DSXID":"fyE0uqU\\/8MxDO9jxQlej2yqM+hw=","vpc_3DSenrolled":"N","vpc_AVSRequestCode":"Z","vpc_AVSResultCode":"Unsupported","vpc_AVS_City":"","vpc_AVS_Country":"EGY","vpc_AVS_PostCode":"12345","vpc_AVS_StateProv":"","vpc_AVS_Street01":"address","vpc_AcqAVSRespCode":"Unsupported","vpc_AcqCSCRespCode":"Unsupported","vpc_AcqResponseCode":"00","vpc_Amount":"20000","vpc_AuthorizeId":"340801","vpc_BatchNo":"20150901","vpc_CSCResultCode":"Unsupported","vpc_Card":"VC","vpc_CardNum":"xxxxxxxxxxxx0001","vpc_Command":"pay","vpc_Locale":"en","vpc_MerchTxnRef":"fsJsN4U0UPdBJwLN_1441056465","vpc_Merchant":"TEST512345USD","vpc_Message":"Approved","vpc_OrderInfo":"13","vpc_ReceiptNo":"524407340801","vpc_SecureHash":"F49866D5138542F4FFF20C42D72ABAB6","vpc_TransactionNo":"75227","vpc_TxnResponseCode":"0","vpc_VerSecurityLevel":"06","vpc_VerStatus":"E","vpc_VerType":"3DS","vpc_Version":"1"}', NULL, '2015-08-31 21:29:07', '2015-08-31 21:29:07'),
(7, 14, 'Migs_ThreeParty', '524407340806', '{"vpc_3DSXID":"1mzKU43+ajldOoukkd\\/eedaaTb8=","vpc_3DSenrolled":"N","vpc_AVSRequestCode":"Z","vpc_AVSResultCode":"Unsupported","vpc_AVS_City":"","vpc_AVS_Country":"EGY","vpc_AVS_PostCode":"12345","vpc_AVS_StateProv":"","vpc_AVS_Street01":"address","vpc_AcqAVSRespCode":"Unsupported","vpc_AcqCSCRespCode":"Unsupported","vpc_AcqResponseCode":"00","vpc_Amount":"20000","vpc_AuthorizeId":"340806","vpc_BatchNo":"20150901","vpc_CSCResultCode":"Unsupported","vpc_Card":"VC","vpc_CardNum":"xxxxxxxxxxxx0001","vpc_Command":"pay","vpc_Locale":"en","vpc_MerchTxnRef":"-DN5KMXFpkxR3JBS_1441056601","vpc_Merchant":"TEST512345USD","vpc_Message":"Approved","vpc_OrderInfo":"14","vpc_ReceiptNo":"524407340806","vpc_SecureHash":"AFB192C9B85253777021DCE0B6EAE148","vpc_TransactionNo":"75228","vpc_TxnResponseCode":"0","vpc_VerSecurityLevel":"06","vpc_VerStatus":"E","vpc_VerType":"3DS","vpc_Version":"1"}', NULL, '2015-08-31 21:30:35', '2015-08-31 21:30:35'),
(8, 15, 'Migs_ThreeParty', '524407340810', '{"vpc_3DSXID":"8\\/JmE6SoYsTetTNmdohqWJdWGgY=","vpc_3DSenrolled":"N","vpc_AVSRequestCode":"Z","vpc_AVSResultCode":"Unsupported","vpc_AVS_City":"","vpc_AVS_Country":"EGY","vpc_AVS_PostCode":"12345","vpc_AVS_StateProv":"","vpc_AVS_Street01":"address","vpc_AcqAVSRespCode":"Unsupported","vpc_AcqCSCRespCode":"Unsupported","vpc_AcqResponseCode":"00","vpc_Amount":"20000","vpc_AuthorizeId":"340810","vpc_BatchNo":"20150901","vpc_CSCResultCode":"Unsupported","vpc_Card":"VC","vpc_CardNum":"xxxxxxxxxxxx0001","vpc_Command":"pay","vpc_Locale":"en","vpc_MerchTxnRef":"1rJ3VxtMzS5ghR6V_1441056677","vpc_Merchant":"TEST512345USD","vpc_Message":"Approved","vpc_OrderInfo":"15","vpc_ReceiptNo":"524407340810","vpc_SecureHash":"429B1FA746F8DFD94BAD9FA1A0A1D91B","vpc_TransactionNo":"75229","vpc_TxnResponseCode":"0","vpc_VerSecurityLevel":"06","vpc_VerStatus":"E","vpc_VerType":"3DS","vpc_Version":"1"}', NULL, '2015-08-31 21:31:44', '2015-08-31 21:31:44');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  `brand_id` int(10) unsigned DEFAULT NULL,
  `size_id` int(10) unsigned DEFAULT NULL,
  `flavor_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `color` varchar(7) NOT NULL,
  `price` decimal(6,2) NOT NULL DEFAULT '0.00',
  `qty` smallint(6) NOT NULL DEFAULT '0',
  `sold` int(10) unsigned NOT NULL DEFAULT '0',
  `brief` tinytext NOT NULL,
  `description` text NOT NULL,
  `body` text NOT NULL,
  `featured` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `sort` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(3) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_products_2_idx` (`category_id`),
  KEY `fk_products_3_idx` (`brand_id`),
  KEY `fk_products_4_idx` (`size_id`),
  KEY `fk_products_5_idx` (`flavor_id`),
  KEY `fk_products_1_idx` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `parent_id`, `category_id`, `brand_id`, `size_id`, `flavor_id`, `title`, `slug`, `color`, `price`, `qty`, `sold`, `brief`, `description`, `body`, `featured`, `sort`, `status`, `created`, `updated`) VALUES
(8, NULL, 5, 11, NULL, NULL, 'Platinum™', 'platinumtm', '', 100.00, 31, 24, 'Platinum is an ultra-premium lean gainer engineered', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.', '<p>FORTIFY YOUR BODY FROM WITHIN</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n\r\n<p>FORTIFY YOUR BODY FROM WITHIN</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n\r\n<p>FORTIFY YOUR BODY FROM WITHIN</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n\r\n<p>FORTIFY YOUR BODY FROM WITHIN</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n', 1, 1, NULL, '2015-07-26 17:30:19', '2015-09-01 12:42:13'),
(9, NULL, 6, 12, NULL, NULL, 'Nitro Tech', 'nitro-tech', '', 0.00, 0, 0, 'NITRO-TECH® contains protein sourced primarily', 'NITRO-TECH® contains protein sourced primarily from\r\nwhey protein isolate - one of the cleanest and purest\r\nprotien sources available to athletes. It is also\r\nenhanced with the most studied for of creatine for\r\nfaster gains in muscle and strength.', '<h2>FORTIFY YOUR BODY FROM WITHIN</h2>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <h3>FORTIFY YOUR BODY FROM WITHIN</h3>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <h2>FORTIFY YOUR BODY FROM WITHIN</h2>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <h3>FORTIFY YOUR BODY FROM WITHIN</h3>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n', 1, 2, NULL, '2015-07-26 17:37:18', '2015-07-26 17:37:18'),
(10, NULL, 7, 13, NULL, NULL, 'Animal Pak', 'animal-pak', '', 0.00, 0, 0, 'As the "foundational" supplement', 'As the "foundational" supplement, Animal Pak should be a part of every bodybuilder''s regimen. Every Animal supplement has been designed to work together, creating a unique, powerful, and comprehensive nutritional system. Animal Pak is your starting point.', '<h2>FORTIFY YOUR BODY FROM WITHIN</h2>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <h3>FORTIFY YOUR BODY FROM WITHIN</h3>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <h2>FORTIFY YOUR BODY FROM WITHIN</h2>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <h3>FORTIFY YOUR BODY FROM WITHIN</h3>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n', 1, 3, NULL, '2015-07-26 17:39:27', '2015-07-26 17:44:06'),
(11, NULL, 10, 11, NULL, NULL, 'Animal GYM Bag', 'animal-gym-bag', '', 300.00, 28, 2, 'ANimal Gym Bag is one-of-a-kind.', 'ANimal Gym Bag is one-of-a-kind. Retro-inspired, classic, and functional, this black throwback duffle is made of lightweight distressed/weathered canvas.', '<p>FORTIFY YOUR BODY FROM WITHIN</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n\r\n<p>FORTIFY YOUR BODY FROM WITHIN</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n\r\n<p>FORTIFY YOUR BODY FROM WITHIN</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n\r\n<p>FORTIFY YOUR BODY FROM WITHIN</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n', 1, 4, NULL, '2015-07-26 17:41:36', '2015-08-24 16:39:11'),
(13, 8, 5, 11, 23, 21, 'Platinum™', 'platinumtm-3', '', 100.00, 1, 10, '', '', '<h2>FORTIFY YOUR BODY FROM WITHIN</h2>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <h3>FORTIFY YOUR BODY FROM WITHIN</h3>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <h2>FORTIFY YOUR BODY FROM WITHIN</h2>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <h3>FORTIFY YOUR BODY FROM WITHIN</h3>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n', 0, 5, NULL, '2015-07-26 17:54:11', '2015-08-24 19:52:56'),
(14, 8, 5, 11, 24, 22, 'Platinum™', 'platinumtm-4', '', 200.00, 1, 13, '', '', '<h2>FORTIFY YOUR BODY FROM WITHIN</h2>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <h3>FORTIFY YOUR BODY FROM WITHIN</h3>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <h2>FORTIFY YOUR BODY FROM WITHIN</h2>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <h3>FORTIFY YOUR BODY FROM WITHIN</h3>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n', 0, 6, NULL, '2015-07-26 18:07:38', '2015-09-01 12:42:13'),
(15, 11, 10, 11, 29, NULL, 'Animal GYM Bag', 'animal-gym-bag-2', '#ffff00', 300.00, 18, 2, '', '', '<h2>FORTIFY YOUR BODY FROM WITHIN</h2>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <h3>FORTIFY YOUR BODY FROM WITHIN</h3>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <h2>FORTIFY YOUR BODY FROM WITHIN</h2>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <h3>FORTIFY YOUR BODY FROM WITHIN</h3>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n', 0, 7, NULL, '2015-07-26 18:10:32', '2015-08-24 16:39:11'),
(16, 11, 10, 11, 29, NULL, 'Animal GYM Bag', NULL, '#ff0000', 300.00, 10, 0, '', '', '<h2>FORTIFY YOUR BODY FROM WITHIN</h2>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <h3>FORTIFY YOUR BODY FROM WITHIN</h3>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <h2>FORTIFY YOUR BODY FROM WITHIN</h2>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <h3>FORTIFY YOUR BODY FROM WITHIN</h3>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n', 0, 8, NULL, '2015-07-26 18:15:32', '2015-07-26 18:15:32'),
(17, 8, 5, 11, 23, 22, 'Platinum™', 'platinumtm-2', '', 300.00, 29, 1, '', '', '', 0, 9, NULL, '2015-07-27 12:48:05', '2015-08-20 09:46:21');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `city_id` int(10) unsigned DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `bio` text NOT NULL,
  `gender` tinyint(1) unsigned DEFAULT NULL,
  `address` text NOT NULL,
  `country_phone_code` varchar(5) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_mstql_profiles_1` (`user_id`),
  KEY `fk_mstql_profiles_2` (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `user_id`, `city_id`, `first_name`, `last_name`, `bio`, `gender`, `address`, `country_phone_code`, `phone`, `status`, `created`, `updated`) VALUES
(1, 42, 28, 'Ahmed Sharaf1', '', 'Bio Bio Bio Bio', NULL, 'Address Address Address', '', '12345678911', NULL, '0000-00-00 00:00:00', '2015-09-01 10:56:13'),
(2, 44, 27, 'Ahmed Sharaf', '', '', NULL, 'Address Address Address', '', '12345678910', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 56, 27, 'Ahmed Sharaf', '', '', NULL, 'Address Address Address', '', '12345678910', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 57, 27, 'Ahmed Sharaf', '', '', NULL, 'Address Address Address', '', '12345678910', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 58, 27, 'Ahmed Sharaf', '', '', NULL, 'Address Address Address', '', '12345678910', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 59, 27, 'Ahmed Sharaf', '', '', NULL, 'Address Address Address', '', '01234567891', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 65, NULL, 'Ahmed Sharaf', '', '', NULL, '', '', '', NULL, '2015-08-18 17:38:22', '2015-08-18 17:38:22'),
(14, 66, 27, 'ahmed', '', '', NULL, 'address address', '', '01100060862', NULL, '2015-08-26 17:25:59', '2015-08-26 17:25:59'),
(21, 74, 27, 'ahmed', '', '', NULL, 'address address', '', '11111111111', NULL, '2015-08-31 19:33:02', '2015-08-31 19:33:02'),
(24, 77, 27, 'ahmed', '', '', NULL, 'address address', '', '11111111111', NULL, '2015-08-31 19:40:19', '2015-08-31 19:40:19'),
(25, 78, 28, 'ahmed', '', '', NULL, 'address address', '', '11111111111', NULL, '2015-08-31 20:24:15', '2015-08-31 20:24:15'),
(26, 79, 27, 'ahmed', '', '', NULL, 'address address', '', '11111111111', NULL, '2015-08-31 20:27:23', '2015-08-31 20:27:23');

-- --------------------------------------------------------

--
-- Table structure for table `translations_with_string`
--

CREATE TABLE IF NOT EXISTS `translations_with_string` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table_name` varchar(100) NOT NULL,
  `model_id` int(11) NOT NULL,
  `attribute` varchar(100) NOT NULL,
  `lang` varchar(6) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `attribute` (`attribute`),
  KEY `table_name` (`table_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `translations_with_text`
--

CREATE TABLE IF NOT EXISTS `translations_with_text` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table_name` varchar(100) NOT NULL,
  `model_id` int(11) NOT NULL,
  `attribute` varchar(100) NOT NULL,
  `lang` varchar(6) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `attribute` (`attribute`),
  KEY `table_name` (`table_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `translations_with_text`
--

INSERT INTO `translations_with_text` (`id`, `table_name`, `model_id`, `attribute`, `lang`, `value`) VALUES
(1, 'base_content', 10, 'title', 'ar', 'test'),
(2, 'base_content', 10, 'body', 'ar', 'test'),
(3, 'meta_tags', 1, 'title', 'ar', ''),
(4, 'meta_tags', 1, 'keywords', 'ar', ''),
(5, 'meta_tags', 1, 'description', 'ar', ''),
(6, 'meta_tags', 2, 'title', 'ar', 'test'),
(7, 'meta_tags', 2, 'keywords', 'ar', 'test'),
(8, 'meta_tags', 2, 'description', 'ar', 'test'),
(9, 'meta_tags', 3, 'title', 'ar', 'test'),
(10, 'meta_tags', 3, 'keywords', 'ar', 'test'),
(11, 'meta_tags', 3, 'description', 'ar', 'test'),
(12, 'meta_tags', 4, 'title', 'ar', 'test'),
(13, 'meta_tags', 4, 'keywords', 'ar', 'test'),
(14, 'meta_tags', 4, 'description', 'ar', 'test'),
(15, 'base_content', 34, 'title', 'ar', 'test'),
(16, 'base_content', 34, 'body', 'ar', 'test'),
(17, 'base_media', 1, 'title', 'ar', 'عربى'),
(18, 'base_media', 1, 'description', 'ar', 'عربى'),
(19, 'meta_tags', 10, 'title', 'ar', 'عربى'),
(20, 'meta_tags', 10, 'keywords', 'ar', 'عربى'),
(21, 'meta_tags', 10, 'description', 'ar', 'عربى'),
(22, 'base_content', 4, 'title', 'ar', 'عربى'),
(23, 'base_content', 4, 'brief', 'ar', 'عربى'),
(24, 'base_content', 4, 'description', 'ar', 'عربى'),
(25, 'base_content', 4, 'body', 'ar', 'عربى'),
(26, 'meta_tags', 17, 'title', 'ar', 'اسم المنتج'),
(27, 'meta_tags', 17, 'keywords', 'ar', 'اسم المنتج'),
(28, 'meta_tags', 17, 'description', 'ar', 'وصف المنتج'),
(29, 'product', 8, 'title', 'ar', 'اسم المنتج'),
(30, 'product', 8, 'brief', 'ar', 'مخنصر'),
(31, 'product', 8, 'description', 'ar', 'وصف'),
(32, 'product', 8, 'body', 'ar', 'محتوى'),
(33, 'base_content', 2, 'title', 'ar', 'عربى'),
(34, 'base_content', 2, 'brief', 'ar', 'عربى'),
(35, 'base_content', 2, 'description', 'ar', 'عربى'),
(36, 'base_content', 2, 'body', 'ar', 'عربى'),
(37, 'base_content', 3, 'title', 'ar', 'عربى'),
(38, 'base_content', 3, 'brief', 'ar', 'عربى'),
(39, 'base_content', 3, 'description', 'ar', 'عربى'),
(40, 'base_content', 3, 'body', 'ar', 'عربى'),
(41, 'base_content', 5, 'title', 'ar', 'عربى'),
(42, 'base_content', 5, 'brief', 'ar', 'عربى'),
(43, 'base_content', 5, 'description', 'ar', 'عربى'),
(44, 'base_content', 5, 'body', 'ar', 'عربى'),
(45, 'base_content', 7, 'title', 'ar', 'من نحن');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authclient`
--
ALTER TABLE `authclient`
  ADD CONSTRAINT `fk_authclient_1` FOREIGN KEY (`user_id`) REFERENCES `base_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cart_2` FOREIGN KEY (`item_id`) REFERENCES `product` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `Comment`
--
ALTER TABLE `Comment`
  ADD CONSTRAINT `fk_Comment_1` FOREIGN KEY (`createdBy`) REFERENCES `base_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Comment_2` FOREIGN KEY (`updatedBy`) REFERENCES `base_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_order_1` FOREIGN KEY (`user_id`) REFERENCES `base_user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_payment_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_products_1` FOREIGN KEY (`parent_id`) REFERENCES `product` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_products_2` FOREIGN KEY (`category_id`) REFERENCES `base_tree` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_products_3` FOREIGN KEY (`brand_id`) REFERENCES `base_tree` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_products_4` FOREIGN KEY (`size_id`) REFERENCES `base_tree` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_products_5` FOREIGN KEY (`flavor_id`) REFERENCES `base_tree` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_profile_1` FOREIGN KEY (`user_id`) REFERENCES `base_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_profile_2` FOREIGN KEY (`city_id`) REFERENCES `base_tree` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
