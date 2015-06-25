-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 25, 2015 at 03:01 PM
-- Server version: 5.5.43-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.9

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
  `status` tinyint(3) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `updated` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `base_content`
--

INSERT INTO `base_content` (`id`, `type`, `title`, `slug`, `brief`, `description`, `body`, `date`, `end_date`, `sort`, `status`, `created`, `updated`) VALUES
(1, 1, 'Home Slider', 'home-slider', '', '', '', NULL, NULL, 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 'Arm workout lessons', 'arm-workout-lessons', 'The majority of people i see on here and at my gym i train people, have trouble gaining size and shape to their calves than simply training the gastrocnemius and soleus muscle.', 'The majority of people i see on here and at my gym i train people, have trouble gaining size and shape to their calves than simply training the gastrocnemius and soleus muscle.', '<p>The majority of people i see on here and at my gym i train people, have trouble gaining size and shape to their calves than simply training the gastrocnemius and soleus muscle.</p>\r\n', NULL, NULL, 1, NULL, '0000-00-00 00:00:00', '2015-06-03 14:12:01'),
(3, 2, 'Arm workout lessons', 'arm-workout-lessons-2', 'The majority of people i see on here and at my gym i train people, have trouble gaining size and shape to their calves than simply training the gastrocnemius and soleus muscle.', 'The majority of people i see on here and at my gym i train people, have trouble gaining size and shape to their calves than simply training the gastrocnemius and soleus muscle.', '<p>The majority of people i see on here and at my gym i train people, have trouble gaining size and shape to their calves than simply training the gastrocnemius and soleus muscle.</p>\r\n', '2015-06-02 22:00:00', NULL, 2, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 2, 'Arm workout lessons', 'arm-workout-lessons-3', 'The majority of people i see on here and at my gym i train people, have trouble gaining size and shape to their calves than simply training the gastrocnemius and soleus muscle.', 'The majority of people i see on here and at my gym i train people, have trouble gaining size and shape to their calves than simply training the gastrocnemius and soleus muscle.', '<p>The majority of people i see on here and at my gym i train people, have trouble gaining size and shape to their calves than simply training the gastrocnemius and soleus muscle.</p>\r\n', '2015-06-01 22:00:00', NULL, 3, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 2, 'Arm workout lessons', 'arm-workout-lessons-4', 'The majority of people i see on here and at my gym i train people, have trouble gaining size and shape to their calves than simply training the gastrocnemius and soleus muscle.', 'The majority of people i see on here and at my gym i train people, have trouble gaining size and shape to their calves than simply training the gastrocnemius and soleus muscle.', '<p>The majority of people i see on here and at my gym i train people, have trouble gaining size and shape to their calves than simply training the gastrocnemius and soleus muscle.</p>\r\n', '2015-05-31 22:00:00', NULL, 4, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

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
(21, 4, 'Product', '/shared/uploads/2015/06/03/', '2bwe_y81HPys3H0N.png', 'image/png', 500922, '', '', '', '', NULL, NULL, 18, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `base_settings`
--

INSERT INTO `base_settings` (`id`, `key`, `value`, `description`, `created`, `updated`) VALUES
(1, 'title', 'Digitree CMS', 'Application Url Title', '2015-05-19 15:23:26', '2015-05-19 16:17:17'),
(2, 'test', 'test', '', '0000-00-00 00:00:00', '2015-05-28 14:25:46'),
(3, 'test2', 'test2', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `base_tree`
--

INSERT INTO `base_tree` (`id`, `root`, `lft`, `rgt`, `lvl`, `name`, `slug`, `link`, `description`, `icon`, `icon_type`, `active`, `selected`, `disabled`, `readonly`, `visible`, `collapsed`, `movable_u`, `movable_d`, `movable_l`, `movable_r`, `removable`, `removable_all`, `created`, `updated`) VALUES
(1, 1, 1, 14, 0, 'Categories', 'category', '', 'Product Categories', '', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0, '0000-00-00 00:00:00', '2015-05-31 13:08:10'),
(2, 2, 1, 22, 0, 'Brands', 'brands', '', 'Product Brands', '', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 3, 1, 8, 0, 'Sizes', 'sizes', '', 'Product Sizes', '', 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
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
(23, 3, 2, 3, 1, '1 KG', '1-kg', '', '', NULL, 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 3, 4, 5, 1, '2 KG', '2-kg', '', '', NULL, 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(25, 3, 6, 7, 1, '3 KG', '3-kg', '', '', NULL, 1, 1, 0, 0, 0, 1, 0, 1, 1, 1, 1, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

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
  `tokent_type` tinyint(3) unsigned DEFAULT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `base_user`
--

INSERT INTO `base_user` (`id`, `username`, `email`, `password`, `token`, `tokent_type`, `auth_key`, `sso_key`, `status`, `last_login`, `created`, `updated`) VALUES
(1, 'sharaf', 'a.sharaf@digitreeinc.com', '$2y$13$ga/hQeBy4AcDcNuijqMaFeDPuAh41/mbyZUuJ5QAQgVO4amkDwNJi', NULL, NULL, 'AMITSMZCAjVVktBlAx4sZDuCAVSZp3H2', NULL, 2, '2015-06-16 14:14:11', NULL, '2015-04-06 11:05:36'),
(26, 'test16', 'test16', 'test16', '', NULL, '', '', 2, NULL, NULL, '2015-04-05 14:29:38'),
(27, 'test17', 'test17', 'test17', NULL, NULL, NULL, NULL, 3, NULL, NULL, '2015-04-02 12:38:20'),
(28, 'test18', 'test18', 'test18', NULL, NULL, NULL, NULL, 1, NULL, NULL, '2015-04-02 12:39:09'),
(29, 'test19', 'test19', 'test19', NULL, NULL, NULL, NULL, 3, NULL, NULL, '2015-04-02 12:38:44'),
(32, 'sharaf2', 'a.sharaf+2@digitreeinc.com', 'sharaf2', NULL, NULL, NULL, NULL, 2, NULL, '0000-00-00 00:00:00', '2015-04-02 12:39:25'),
(33, 'test', 'test@test.com', '$2y$13$hbbWD/thoeAw2yC1dKzg8.QA4auAeoHiTX/bbEaqN/OeyVX6.A2Xi', NULL, NULL, '63ObNEc4uboKXYlJr6BjryZV-Agx69Ws', NULL, 2, NULL, '2015-05-18 14:27:52', '2015-05-18 14:27:52'),
(34, 'test1', 'test1@test.com', '$2y$13$xEBSThw92wv3iavMIz5gGO.kbqSAkjyLsUSk3eo4Y2cAISrjCSik2', NULL, NULL, 'oqRYTHdGs4Yqz5Eefqi_0tpb50L25mDz', NULL, 1, NULL, '0000-00-00 00:00:00', '2015-05-31 11:54:45');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `meta_tags`
--

INSERT INTO `meta_tags` (`id`, `model`, `model_id`, `title`, `keywords`, `description`, `created`, `updated`) VALUES
(1, 'Page', 10, 'test', 'test', 'test', NULL, '2015-05-28 11:55:21'),
(4, 'Page', 34, 'test', 'test', 'test', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Article', 35, '', '', '', '0000-00-00 00:00:00', '2015-05-31 15:13:43'),
(7, 'Page', 1, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Article', 2, '', '', '', '0000-00-00 00:00:00', '2015-06-03 14:12:01'),
(9, 'Article', 3, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Article', 4, 'Arm workout lessons', 'Arm workout lessons', 'The majority of people i see on here and at my gym i train people, have trouble gaining size and shape to their calves than simply training the gastrocnemius and soleus muscle.', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Article', 5, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Product', 3, '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Product', 4, '', '', '', '0000-00-00 00:00:00', '2015-06-03 16:35:00'),
(14, 'Product', 5, '', '', '', '0000-00-00 00:00:00', '2015-06-03 16:35:13');

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
('m130524_201442_init', 1424090958),
('m140506_102106_rbac_init', 1424263170),
('m150312_172156_meta_tags', 1432805470);

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
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `color` varchar(7) NOT NULL,
  `price` decimal(6,2) NOT NULL DEFAULT '0.00',
  `qty` smallint(6) NOT NULL DEFAULT '0',
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `parent_id`, `category_id`, `brand_id`, `size_id`, `flavor_id`, `title`, `slug`, `color`, `price`, `qty`, `brief`, `description`, `body`, `featured`, `sort`, `status`, `created`, `updated`) VALUES
(3, NULL, 5, 11, 23, 21, 'Platinum™', 'platinumtm', '#ff0000', 100.00, 100, 'Platinum is an ultra-premium leanla gainer engineered to deliver quality', 'Platinum is an ultra-premium leanla gainer engineered to deliver quality', '<h2>FORTIFY YOUR BODY FROM WITHIN</h2>\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n					<h3>FORTIFY YOUR BODY FROM WITHIN</h3>\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n					<h2>FORTIFY YOUR BODY FROM WITHIN</h2>\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n					<h3>FORTIFY YOUR BODY FROM WITHIN</h3>\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>', 1, 2, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, NULL, 6, 12, 24, 22, 'Platinum™', 'platinumtm-2', '#000000', 100.00, 100, 'Platinum is an ultra-premium leanla gainer engineered to deliver quality', '', '<h2>FORTIFY YOUR BODY FROM WITHIN</h2>\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n					<h3>FORTIFY YOUR BODY FROM WITHIN</h3>\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n					<h2>FORTIFY YOUR BODY FROM WITHIN</h2>\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n					<h3>FORTIFY YOUR BODY FROM WITHIN</h3>\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>', 1, 1, NULL, '0000-00-00 00:00:00', '2015-06-03 16:35:00'),
(5, NULL, 7, 13, 25, 21, 'Platinum™', 'platinumtm-3', '#5b0f00', 200.00, 20, 'Platinum is an ultra-premium leanla gainer engineered to deliver quality', 'Platinum is an ultra-premium leanla gainer engineered to deliver quality', '<h2>FORTIFY YOUR BODY FROM WITHIN</h2>\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n					<h3>FORTIFY YOUR BODY FROM WITHIN</h3>\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n					<h2>FORTIFY YOUR BODY FROM WITHIN</h2>\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n					<h3>FORTIFY YOUR BODY FROM WITHIN</h3>\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>\r\n					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi rem rerum eum nesciunt autem quo dicta nobis, recusandae odit sunt, eligendi amet cum ullam quas, ipsum et eius reiciendis labore.</p>', 1, 3, NULL, '0000-00-00 00:00:00', '2015-06-03 16:35:13');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `translations_with_text`
--

INSERT INTO `translations_with_text` (`id`, `table_name`, `model_id`, `attribute`, `lang`, `value`) VALUES
(1, 'base_content', 10, 'title', 'ar', 'test'),
(2, 'base_content', 10, 'body', 'ar', 'test'),
(3, 'meta_tags', 1, 'title', 'ar', 'test'),
(4, 'meta_tags', 1, 'keywords', 'ar', 'test'),
(5, 'meta_tags', 1, 'description', 'ar', 'test'),
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
(25, 'base_content', 4, 'body', 'ar', 'عربى');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'sharaf', 'AMITSMZCAjVVktBlAx4sZDuCAVSZp3H2', '$2y$13$ws5ZQ.gSNyl1E5u15yUIb.2RSaQMlmEXhAZIJ3DoRufmJ/BaGFPeG', 'p6qebdVeRdaDage4X55-vcwxnaCqM7Rf_1424171998', 'a.sharaf@digitreeinc.com', 10, 1424091071, 1424171998);

--
-- Constraints for dumped tables
--

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
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_products_1` FOREIGN KEY (`parent_id`) REFERENCES `product` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_products_2` FOREIGN KEY (`category_id`) REFERENCES `base_tree` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_products_3` FOREIGN KEY (`brand_id`) REFERENCES `base_tree` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_products_4` FOREIGN KEY (`size_id`) REFERENCES `base_tree` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `fk_products_5` FOREIGN KEY (`flavor_id`) REFERENCES `base_tree` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
