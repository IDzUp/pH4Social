SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


-- --------------------------------------------------------

--
-- Table structure for table `addlanguage`
--

CREATE TABLE IF NOT EXISTS `addlanguage` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `updated_at` varchar(100) DEFAULT NULL,
  `created_at` varchar(100) DEFAULT NULL,
  `lang` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `addlanguage`
--

INSERT INTO `addlanguage` (`id`, `updated_at`, `created_at`, `lang`, `name`) VALUES
(1, '2014-12-18 05:33:26', NULL, 'en', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `aman`
--

CREATE TABLE IF NOT EXISTS `aman` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bin` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `amans`
--

CREATE TABLE IF NOT EXISTS `amans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bin` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE IF NOT EXISTS `authors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bin` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `bin`, `created_at`, `updated_at`) VALUES
(3, 'sahil kaushal', 'hello', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'test', 'hello', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'hello', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'hello', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'kausal', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'dsad', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'dsdsd', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, 'adas', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `block`
--

CREATE TABLE IF NOT EXISTS `block` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `other` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `profile` varchar(100) DEFAULT NULL,
  `idss` varchar(100) DEFAULT NULL,
  `uname` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `contents` varchar(100) DEFAULT NULL,
  `path` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `created_at`, `updated_at`, `name`, `title`, `contents`, `path`) VALUES
(1, '2013-07-05 07:16:16', '2013-07-05 07:16:16', 'sahil', 'test', 'hello', 'uploads/images/072013/blog-one.jpg'),
(2, '2013-07-05 07:23:36', '2013-07-05 07:23:36', 'kaushal', 'kaushal', 'kaushal', 'uploads/images/072013/blog-three.jpg'),
(3, '2013-07-05 08:43:06', '2013-07-05 08:43:06', 'test', 'test', 'test', 'uploads/images/072013/blog-two.jpg'),
(4, '2013-07-05 08:43:36', '2013-07-05 08:43:36', 'test', 'test', 'test', 'uploads/images/072013/man-two.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `created_at`, `updated_at`, `title`, `content`) VALUES
(4, '2013-07-05 05:12:20', '2013-07-05 05:12:20', 'Sportswear', ' Sportswear'),
(5, '2013-07-05 05:13:29', '2013-07-05 05:13:29', 'Mens', ' Mens'),
(6, '2013-07-05 05:14:08', '2013-07-05 05:14:08', 'Valentino', ' Valentino'),
(7, '2013-07-05 05:14:24', '2013-07-05 05:14:24', 'Kids', ' Kids'),
(8, '2013-07-05 05:14:32', '2013-07-05 05:14:32', 'Fashion', ' Fashion');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `other` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `chatrecord`
--

CREATE TABLE IF NOT EXISTS `chatrecord` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL,
  `names` text,
  `emailto` varchar(100) DEFAULT NULL,
  `emailby` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL,
  `product_id` int(100) DEFAULT NULL,
  `comment` text,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `time` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `confirmmail`
--

CREATE TABLE IF NOT EXISTS `confirmmail` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL,
  `comment` text,
  `from` varchar(100) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;


--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `message` text,
  `updated_at` varchar(100) DEFAULT NULL,
  `created_at` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=121 ;


--
-- Table structure for table `contemplate`
--

CREATE TABLE IF NOT EXISTS `contemplate` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL,
  `comment` text,
  `subject` varchar(100) DEFAULT NULL,
  `from` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contemplate`
--

INSERT INTO `contemplate` (`id`, `created_at`, `updated_at`, `comment`, `subject`, `from`) VALUES
(1, NULL, '2014-12-17 12:36:19', '<p>hellosss &lt; NAME &gt;</p>\r\n<p>&nbsp;</p>\r\n<p><strong><span style="color: #ff6600;">Contact u shortly!!</span></strong></p>\r\n<p>Thanks &amp; Regards</p>\r\n<p><strong>Street Date</strong></p>', 'Contact Form', 'noreply@mysite.com');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `content` text,
  `title` varchar(100) DEFAULT NULL,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `content`, `title`, `created_at`, `updated_at`) VALUES
(1, 'hellosssss', 'About us', '2013-07-03 07:18:41', '2013-07-03 09:02:13');

-- --------------------------------------------------------

--
-- Table structure for table `createevent`
--

CREATE TABLE IF NOT EXISTS `createevent` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL,
  `dates` varchar(100) DEFAULT NULL,
  `event` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `timess` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE IF NOT EXISTS `currency` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `currency` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `currency`) VALUES
(1, '€');

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE IF NOT EXISTS `emails` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `comment` text,
  `from` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;


--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `path` varchar(100) DEFAULT NULL,
  `price` int(100) DEFAULT NULL,
  `stock` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL,
  `created_at` varchar(100) DEFAULT NULL,
  `comment` text,
  `brand` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `path`, `price`, `stock`, `name`, `updated_at`, `created_at`, `comment`, `brand`) VALUES
(13, 'uploads/images/072013/product12.jpg', 15, '10', 'test', '2013-07-03 11:00:01', '2013-07-03 11:00:01', NULL, 'PUMA'),
(14, 'uploads/images/072013/product9.jpg', 150, '10', 'Suit', '2013-07-03 11:00:29', '2013-07-03 11:00:29', NULL, 'LEVIS'),
(15, 'uploads/images/072013/product8.jpg', 12, '10', 'Dress', '2013-07-03 11:01:24', '2013-07-03 11:01:24', NULL, 'DISEL'),
(17, 'uploads/images/072013/similar1.jpg', 120, '10', 'test', '2013-07-07 08:57:47', '2013-07-07 08:57:47', NULL, 'PUMA'),
(18, 'uploads/images/072013/similar2.jpg', 12, '1', 'hello', '2013-07-07 09:16:43', '2013-07-07 09:16:43', NULL, 'DISEL');

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL,
  `mainuser` varchar(100) DEFAULT NULL,
  `otheruser` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL,
  `path` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `imagessvideo` varchar(100) DEFAULT NULL,
  `postid` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `created_at`, `updated_at`, `path`, `user`, `imagessvideo`, `postid`) VALUES
(1, '2015-01-13 15:18:43', '2015-01-13 15:18:43', 'uploads/images/012015/xW371TDT3F250354.jPg', 'lNZR1dClmQ', NULL, '2');

-- --------------------------------------------------------

--
-- Table structure for table `like`
--

CREATE TABLE IF NOT EXISTS `like` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `updated_at` varchar(100) DEFAULT NULL,
  `created_at` varchar(100) DEFAULT NULL,
  `user_rand` varchar(100) DEFAULT NULL,
  `other_rand` varchar(100) DEFAULT NULL,
  `count` int(100) DEFAULT NULL,
  `postid` int(100) DEFAULT NULL,
  `timess` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;


-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE IF NOT EXISTS `logo` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `updated_at` varchar(100) DEFAULT NULL,
  `created_at` varchar(100) DEFAULT NULL,
  `path` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `updated_at`, `created_at`, `path`) VALUES
(1, '2015-01-13 09:02:38', NULL, 'uploads/images/012015/logos.png');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `path` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL,
  `created_at` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `path`, `updated_at`, `created_at`) VALUES
(11, 'uploads/images/062014/Birthday_candles.jpg', '2014-06-30 22:21:50', '2014-06-13 00:15:14'),
(12, 'uploads/images/062014/Birthday_candles.jpg', '2014-06-30 22:22:00', '2014-06-30 22:22:00'),
(13, 'uploads/images/072013/similar1.jpg', '2013-07-03 10:53:43', '2013-07-03 10:53:43');

-- --------------------------------------------------------

--
-- Table structure for table `membershipplan`
--

CREATE TABLE IF NOT EXISTS `membershipplan` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `removeadmin` varchar(100) DEFAULT NULL,
  `removesuperadmin` varchar(100) DEFAULT NULL,
  `removemember` varchar(100) DEFAULT NULL,
  `users` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `membershipplan`
--

INSERT INTO `membershipplan` (`id`, `created_at`, `updated_at`, `name`, `removeadmin`, `removesuperadmin`, `removemember`, `users`) VALUES
(5, '2014-10-10 08:56:58', '2014-12-16 07:17:44', 'Member', NULL, NULL, NULL, NULL),
(7, '2014-10-10 09:30:00', '2014-12-23 09:27:28', 'Superadmin', 'on', 'on', 'on', 'on'),
(10, '2014-10-17 11:26:10', '2014-12-23 09:27:46', 'Admin', 'on', NULL, NULL, 'on'),
(11, '2014-10-28 06:08:52', '2014-12-23 09:33:04', 'Moderators', NULL, NULL, NULL, 'on'),
(15, '2015-01-02 18:22:39', '2015-01-02 18:22:57', 'abcabcabcPP', NULL, 'on', 'on', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `created_at` varchar(100) NOT NULL,
  `updated_at` varchar(100) NOT NULL,
  `menu` varchar(100) NOT NULL,
  `menu2` varchar(100) NOT NULL,
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `link` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`created_at`, `updated_at`, `menu`, `menu2`, `id`, `link`) VALUES
('2013-07-07 10:36:45', '2013-07-09 04:25:22', 'Home', '', 1, 'ww.yahioocm'),
('2013-07-07 11:23:45', '2013-07-07 11:23:45', 'Contact us', '', 2, NULL),
('2013-07-09 04:23:23', '2013-07-09 04:23:23', 'hell', '', 3, 'www.google.com');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `otheruser` varchar(100) DEFAULT NULL,
  `chat` text,
  `timess` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `othername` varchar(100) DEFAULT NULL,
  `read` varchar(100) DEFAULT NULL,
  `count` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_06_05_233828_create_authors_table', 1),
('2014_06_05_235440_create_aman_table', 2),
('2014_06_06_000448_add_authors', 3),
('2014_06_06_195937_create_test_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) DEFAULT NULL,
  `friendrequest` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL,
  `created_at` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `notilike`
--

CREATE TABLE IF NOT EXISTS `notilike` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) DEFAULT NULL,
  `postlike` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL,
  `created_at` varchar(100) DEFAULT NULL,
  `otheruser` varchar(100) DEFAULT NULL,
  `timess` varchar(100) DEFAULT NULL,
  `comment` text,
  `commentid` varchar(100) DEFAULT NULL,
  `read` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `friendaccept` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;


-- --------------------------------------------------------

--
-- Table structure for table `notitemplate`
--

CREATE TABLE IF NOT EXISTS `notitemplate` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL,
  `comment` text,
  `from` varchar(100) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `notitemplate`
--

INSERT INTO `notitemplate` (`id`, `created_at`, `updated_at`, `comment`, `from`, `subject`) VALUES
(1, NULL, '2014-12-17 10:59:09', '<p>You have one &lt; LINK &gt; please check it</p>\r\n<p>&nbsp;</p>\r\n<p>Thanks &amp; Regards</p>\r\n<p>Street Date</p>', 'noreply@mysite.com', 'Notification Friends');

-- --------------------------------------------------------

--
-- Table structure for table `onlineuser`
--

CREATE TABLE IF NOT EXISTS `onlineuser` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL,
  `user_rand` varchar(100) DEFAULT NULL,
  `timess` varchar(100) DEFAULT NULL,
  `chat` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `onlineuser`
--

INSERT INTO `onlineuser` (`id`, `created_at`, `updated_at`, `user_rand`, `timess`, `chat`) VALUES
(1, '2015-01-13 14:27:45', '2015-01-27 14:27:09', '77', '02-27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `product` varchar(100) DEFAULT NULL,
  `price` int(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL,
  `created_at` varchar(100) DEFAULT NULL,
  `rand` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product`, `price`, `updated_at`, `created_at`, `rand`) VALUES
(6, 'test', 120, '2013-07-02 11:08:19', '2013-07-02 11:08:19', 'BylK86AW8V'),
(7, 'capcha', 10, '2013-07-02 11:08:20', '2013-07-02 11:08:20', 'BylK86AW8V'),
(8, 'roses', 10, '2013-07-02 11:08:20', '2013-07-02 11:08:20', 'BylK86AW8V');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `keyword` varchar(100) DEFAULT NULL,
  `urls` varchar(100) DEFAULT NULL,
  `content` text,
  `publish` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `created_at`, `updated_at`, `title`, `description`, `keyword`, `urls`, `content`, `publish`) VALUES
(13, '2014-10-10 04:11:24', '2014-10-28 06:05:25', 'About Us', 'aboutus', 'About Us', NULL, '<section class="about_sec">\r\n<div class="container">\r\n<div class="row">\r\n<div class="col-sm-12 col-sm-12 col-md-12">\r\n<div class="row">\r\n<div class="col-sm-6 col-md-3">\r\n<div class="about_box2 center_box1">\r\n<div class="friend_list_img"><img class="img-circle" src="../../imagesfb/1.jpg" alt="" /></div>\r\n<div class="caption">\r\n<h3>Alexander Samokhin</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>\r\n<div class="social_icon">\r\n<ul>\r\n<li><a href="#"><img src="../../imagesfb/facebook1.png" alt="" /></a></li>\r\n<li><a href="#"><img src="../../imagesfb/twitter1.png" alt="" /></a></li>\r\n<li><a href="#"><img src="../../imagesfb/youtube1.png" alt="" /></a></li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="col-sm-6 col-md-3">\r\n<div class="about_box2 center_box1">\r\n<div class="friend_list_img"><img class="img-circle" src="../../imagesfb/about_img1.jpg" alt="" /></div>\r\n<div class="caption">\r\n<h3>Petra Novakova</h3>\r\n<p>Phasellus vulputate facilisis lectus, non tempus metus efficitur</p>\r\n<div class="social_icon">\r\n<ul>\r\n<li><a href="#"><img src="../../imagesfb/facebook1.png" alt="" /></a></li>\r\n<li><a href="#"><img src="../../imagesfb/twitter1.png" alt="" /></a></li>\r\n<li><a href="#"><img src="../../imagesfb/youtube1.png" alt="" /></a></li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="col-sm-6 col-md-3">\r\n<div class="about_box2 center_box1">\r\n<div class="friend_list_img"><img class="img-circle" src="../../imagesfb/4.jpg" alt="" /></div>\r\n<div class="caption">\r\n<h3>Emilia Clarke</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>\r\n<div class="social_icon">\r\n<ul>\r\n<li><a href="#"><img src="../../imagesfb/facebook1.png" alt="" /></a></li>\r\n<li><a href="#"><img src="../../imagesfb/twitter1.png" alt="" /></a></li>\r\n<li><a href="#"><img src="../../imagesfb/youtube1.png" alt="" /></a></li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class="col-sm-6 col-md-3">\r\n<div class="about_box2 center_box1">\r\n<div class="friend_list_img"><img class="img-circle" src="../../imagesfb/about_img2.jpg" alt="" /></div>\r\n<div class="caption">\r\n<h3>Emilia Clarke</h3>\r\n<p>Phasellus vulputate facilisis lectus, non tempus metus efficitur</p>\r\n<div class="social_icon">\r\n<ul>\r\n<li><a href="#"><img src="../../imagesfb/facebook1.png" alt="" /></a></li>\r\n<li><a href="#"><img src="../../imagesfb/twitter1.png" alt="" /></a></li>\r\n<li><a href="#"><img src="../../imagesfb/youtube1.png" alt="" /></a></li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n<div class="container">\r\n<div class="row">\r\n<p class="abouttext">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vehicula quam sed rhoncus viverra. Fusce blandit dictum ornare. Maecenas et erat eget odio eleifend tristique vel ut dui. Proin congue sem quis ligula scelerisque tincidunt. Proin viverra aliquet sem sit amet elementum. Pellentesque et ex mauris. Nam eu facilisis risus, at ornare mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam neque urna, venenatis convallis quam et, facilisis vestibulum nunc.</p>\r\n</div>\r\n</div>', 'yes'),
(14, '2014-10-10 04:22:53', '2014-10-10 04:22:53', 'Privacy', 'privacy', 'privacy', NULL, '<section class="page_text">\r\n<div class="container">\r\n<div class="row">\r\n<div class="col-sm-12">\r\n<h3>Lorem ipsum dolor</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu magna et diam tempor varius non a orci. Sed nec lorem nulla. Aliquam tincidunt massa ipsum, et aliquam purus facilisis a. Sed finibus metus viverra, congue odio sit amet, dignissim diam. Nam ultrices consequat augue sed finibus. Aliquam lobortis lorem in neque egestas viverra. Sed tempor nisl in diam aliquam ornare. Sed nec finibus orci, eget lobortis dui. Cras id neque condimentum erat venenatis dapibus quis et massa. Quisque laoreet facilisis mi, non ultricies magna convallis consequat. Integer non fringilla nisi, sit amet porta tellus. Fusce vestibulum metus libero, at porttitor lorem varius sit amet.</p>\r\n<h3>tincidunt massa ipsum</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu magna et diam tempor varius non a orci. Sed nec lorem nulla. Aliquam tincidunt massa ipsum, et aliquam purus facilisis a. Sed finibus metus viverra, congue odio sit amet, dignissim diam. Nam ultrices consequat augue sed finibus. Aliquam at porttitor lorem varius sit amet.</p>\r\n<h3>consectetur adipiscing elit</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu magna et diam tempor varius non a orci. Sed nec lorem nulla. Aliquam tincidunt massa ipsum,</p>\r\n<h3>Lorem ipsum dolor tincidunt massa ipsum</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu magna et diam tempor varius non a orci. Sed nec lorem nulla. Aliquam tincidunt massa ipsum, et aliquam purus facilisis a. Sed finibus metus viverra, congue odio sit amet, dignissim diam. Nam ultrices consequat augue sed finibus. Aliquam lobortis lorem in neque egestas viverra. Sed tempor nisl in diam aliquam ornare. Sed nec finibus orci, eget lobortis dui. Cras id neque condimentum erat venenatis dapibus quis et massa. Quisque laoreet facilisis mi, non ultricies magna convallis consequat. Integer non fringilla nisi, sit amet porta tellus. Fusce vestibulum metus libero, at porttitor lorem varius sit amet.</p>\r\n<h3>tincidunt massa ipsum tincidunt massa ipsum tincidunt massa ipsum</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu magna et diam tempor varius non a orci. Sed nec lorem nulla. Aliquam tincidunt massa ipsum, et aliquam purus facilisis a. Sed finibus metus viverra, congue odio sit amet, dignissim diam. Nam ultrices consequat augue sed finibus. Aliquam at porttitor lorem varius sit amet.</p>\r\n<h3>consectetur adipiscing elit</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu magna et diam tempor varius non a orci. Sed nec lorem nulla. Aliquam tincidunt massa ipsum,</p>\r\n<h3>Lorem ipsum dolor</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu magna et diam tempor varius non a orci. Sed nec lorem nulla. Aliquam tincidunt massa ipsum, et aliquam purus facilisis a. Sed finibus metus viverra, congue odio sit amet, dignissim diam. Nam ultrices consequat augue sed finibus. Aliquam lobortis lorem in neque egestas viverra. Sed tempor nisl in diam aliquam ornare. Sed nec finibus orci, eget lobortis dui. Cras id neque condimentum erat venenatis dapibus quis et massa. Quisque laoreet facilisis mi, non ultricies magna convallis consequat. Integer non fringilla nisi, sit amet porta tellus. Fusce vestibulum metus libero, at porttitor lorem varius sit amet.</p>\r\n<h3>tincidunt massa ipsum</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu magna et diam tempor varius non a orci. Sed nec lorem nulla. Aliquam tincidunt massa ipsum, et aliquam purus facilisis a. Sed finibus metus viverra, congue odio sit amet, dignissim diam. Nam ultrices consequat augue sed finibus. Aliquam at porttitor lorem varius sit amet.</p>\r\n<h3>consectetur adipiscing elit</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu magna et diam tempor varius non a orci. Sed nec lorem nulla. Aliquam tincidunt massa ipsum,</p>\r\n<h3>Lorem ipsum dolor tincidunt massa ipsum</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu magna et diam tempor varius non a orci. Sed nec lorem nulla. Aliquam tincidunt massa ipsum, et aliquam purus facilisis a. Sed finibus metus viverra, congue odio sit amet, dignissim diam. Nam ultrices consequat augue sed finibus. Aliquam lobortis lorem in neque egestas viverra. Sed tempor nisl in diam aliquam ornare. Sed nec finibus orci, eget lobortis dui. Cras id neque condimentum erat venenatis dapibus quis et massa. Quisque laoreet facilisis mi, non ultricies magna convallis consequat. Integer non fringilla nisi, sit amet porta tellus. Fusce vestibulum metus libero, at porttitor lorem varius sit amet.</p>\r\n<h3>tincidunt massa ipsum tincidunt massa ipsum tincidunt massa ipsum</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu magna et diam tempor varius non a orci. Sed nec lorem nulla. Aliquam tincidunt massa ipsum, et aliquam purus facilisis a. Sed finibus metus viverra, congue odio sit amet, dignissim diam. Nam ultrices consequat augue sed finibus. Aliquam at porttitor lorem varius sit amet.</p>\r\n<h3>consectetur adipiscing elit</h3>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu magna et diam tempor varius non a orci. Sed nec lorem nulla. Aliquam tincidunt massa ipsum,</p>\r\n</div>\r\n</div>\r\n</div>\r\n</section>', 'yes'),
(16, '2014-10-10 10:57:46', '2014-10-10 10:59:22', 'Terms & Condition', 'show terms & condition', 'T&C', NULL, '<p><a title="tc" href="http://www.google.co.in/url?sa=i&amp;rct=j&amp;q=&amp;esrc=s&amp;source=images&amp;cd=&amp;cad=rja&amp;uact=8&amp;docid=eP5bBrisHwCFVM&amp;tbnid=nbhxJI_u7fGPgM:&amp;ved=0CAcQjRw&amp;url=http%3A%2F%2Fredwing-asia.com%2Fterms-and-conditions%2F&amp;ei=8ro3VKOZKNOVuASWi4H4Aw&amp;bvm=bv.77161500,d.c2E&amp;psig=AFQjCNGW6_BuJ04_CNmiA5LRBRwywGIT7A&amp;ust=1413024840418358" target="_blank">http://www.google.co.in/url?sa=i&amp;rct=j&amp;q=&amp;esrc=s&amp;source=images&amp;cd=&amp;cad=rja&amp;uact=8&amp;docid=eP5bBrisHwCFVM&amp;tbnid=nbhxJI_u7fGPgM:&amp;ved=0CAcQjRw&amp;url=http%3A%2F%2Fredwing-asia.com%2Fterms-and-conditions%2F&amp;ei=8ro3VKOZKNOVuASWi4H4Aw&amp;bvm=bv.77161500,d.c2E&amp;psig=AFQjCNGW6_BuJ04_CNmiA5LRBRwywGIT7A&amp;ust=1413024840418358</a></p>\r\n<p><img src="http://redwing-asia.com/wp-content/uploads/Page-Terms-Conditions-graphic-2.jpg" alt="" width="700" height="261" /><br />laborum et dolorum fuga. Et harum quidem rerum facilis est et expeditasi distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihilse impedit quo minus id quod amets untra dolor amet sad. Sed ut perspser iciatis unde omnis iste natus error sit voluptatem accusantium doloremque laste. Dolores sadips ipsums sits.</p>', 'yes'),
(22, '2014-10-28 09:51:30', '2014-11-04 04:38:04', 'Call Us', 'Contact', 'Call US', NULL, '<p><strong>gfjfdgutt grjif ffgcfxj</strong></p>\r\n<p><img src="http://staging.appmakr.com/learn_more/index.php" alt="Hhhh" /></p>', 'yes'),
(23, '2014-10-28 11:41:12', '2014-12-15 09:06:01', 'Templates', 'Templates', 'Temp', NULL, '', 'yes'),
(26, '2014-12-22 10:01:42', '2014-12-30 11:37:24', 'test', 'test', 'test', NULL, '<p>test</p>', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `post` text,
  `path` varchar(100) DEFAULT NULL,
  `user_rand` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL,
  `created_at` varchar(100) DEFAULT NULL,
  `like` int(100) DEFAULT NULL,
  `imagessvideo` varchar(100) DEFAULT NULL,
  `curdate` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `post`, `path`, `user_rand`, `updated_at`, `created_at`, `like`, `imagessvideo`, `curdate`) VALUES
(2, 'test', 'uploads/images/012015/xW371TDT3F250354.jPg', 'lNZR1dClmQ', '2015-01-13 15:18:43', '2015-01-13 15:18:43', NULL, NULL, '2015/01/13 03:18:43pm');

-- --------------------------------------------------------

--
-- Table structure for table `postcomment`
--

CREATE TABLE IF NOT EXISTS `postcomment` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL,
  `comment` text,
  `post_id` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `path` varchar(100) DEFAULT NULL,
  `imagessvideo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `postcomment`
--

INSERT INTO `postcomment` (`id`, `created_at`, `updated_at`, `comment`, `post_id`, `user`, `name`, `path`, `imagessvideo`) VALUES
(1, '2015-01-13 10:09:25', '2015-01-13 10:09:25', 'tjdykmuhjnb', '3', 'lNZR1dClmQ', 'sahil kaushals', NULL, NULL),
(2, '2015-01-13 10:09:31', '2015-01-13 10:09:31', 'yjhmgn', '3', 'lNZR1dClmQ', 'sahil kaushals', 'uploads/vax2g001cb3ba800d39235f0f6a706700c136.jpg', NULL),
(3, '2015-01-13 10:09:43', '2015-01-13 10:09:43', 'tjhn', '3', 'lNZR1dClmQ', 'sahil kaushals', NULL, 'uploads/P8FNXguuguhephuuhiuybouyvbjhbuoybibuygbpiupiubpibjpiiu iuguyfujfityfkj ufyufgiugufgcfydfy df');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `path` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL,
  `created_at` varchar(100) DEFAULT NULL,
  `user_rand` varchar(100) DEFAULT NULL,
  `cover` varchar(100) DEFAULT NULL,
  `thumb` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `path`, `updated_at`, `created_at`, `user_rand`, `cover`, `thumb`) VALUES
(1, 'uploads/images/012015/HVypZ1TsAc250354.jPg', '2015-01-13 10:08:14', '2015-01-13 09:48:52', 'lNZR1dClmQ', 'imagesfb/male_cover.jpg', 'uploads/images/012015/smallHVypZ1TsAc250354.jPg');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `product_id` varchar(100) DEFAULT NULL,
  `rating` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;


--
-- Table structure for table `set`
--

CREATE TABLE IF NOT EXISTS `set` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `updated_at` varchar(100) DEFAULT NULL,
  `created_at` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `meta` varchar(100) DEFAULT NULL,
  `copyright` varchar(250) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `set`
--

INSERT INTO `set` (`id`, `updated_at`, `created_at`, `title`, `meta`, `copyright`, `description`) VALUES
(1, '2014-12-28 21:26:24', NULL, 'Street Date', 'Date, Social, Other, All, Me, About', '&copy; Powered by <strong><a href="http://ph4social.com">pH4Social</a></strong>&nbsp;&nbsp;&bull;&nbsp;&nbsp;<a href="http://newayup.com">Learn Language with People</a>', 'Description Test....');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL,
  `other` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `created_at`, `updated_at`, `color`, `other`) VALUES
(2, '2013-07-03 04:04:13', '2014-10-06 04:07:02', 'Blue', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shopping`
--

CREATE TABLE IF NOT EXISTS `shopping` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `price` int(100) DEFAULT NULL,
  `product` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL,
  `created_at` varchar(100) DEFAULT NULL,
  `rand` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `shopping`
--

INSERT INTO `shopping` (`id`, `price`, `product`, `updated_at`, `created_at`, `rand`) VALUES
(10, 150, 'Suit', '2013-07-04 10:09:37', '2013-07-04 10:09:37', 'gATVki0hOv'),
(11, 12, 'Dress', '2013-07-04 10:43:34', '2013-07-04 10:43:34', 'gATVki0hOv'),
(12, 12, 'Dress', '2013-07-07 09:07:04', '2013-07-07 09:07:04', 'gATVki0hOv'),
(13, 15, 'test', '2014-10-16 05:42:58', '2014-10-16 05:42:58', 'gATVki0hOv');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `path` varchar(100) DEFAULT NULL,
  `path1` varchar(100) DEFAULT NULL,
  `path2` varchar(100) DEFAULT NULL,
  `path3` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL,
  `created_at` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `path`, `path1`, `path2`, `path3`, `updated_at`, `created_at`) VALUES
(1, 'uploads/images/072013/gallery4.jpg', 'uploads/images/072013/girl3.jpg', 'uploads/images/072013/iframe3.png', 'uploads/images/072013/girl1.jpg', '2013-07-03 11:14:41', '2014-06-30 22:17:16');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL,
  `category_id` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `created_at`, `updated_at`, `category_id`, `title`, `content`) VALUES
(4, '2013-07-05 05:12:30', '2013-07-05 05:12:30', '4', 'Nike', ' Nike'),
(5, '2013-07-05 05:12:40', '2013-07-05 05:12:40', '4', 'Under Armour', ' Under Armour'),
(6, '2013-07-05 05:12:48', '2013-07-05 05:12:48', '4', 'Adidas', ' Adidas'),
(7, '2013-07-05 05:12:57', '2013-07-05 05:12:57', '4', 'Puma', ' Puma'),
(8, '2013-07-05 05:13:05', '2013-07-05 05:13:05', '4', 'ASICS', ' ASICS'),
(9, '2013-07-05 05:13:38', '2013-07-05 05:13:38', '5', 'Fendi', ' Fendi'),
(10, '2013-07-05 05:13:50', '2013-07-05 05:13:50', '5', 'Guess', ' Guess');

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE IF NOT EXISTS `submenu` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL,
  `menu` varchar(100) DEFAULT NULL,
  `submenu` varchar(100) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`id`, `created_at`, `updated_at`, `menu`, `submenu`, `link`) VALUES
(1, '2013-07-07 10:41:25', '2013-07-09 04:31:00', '1', 'abouts', 'www.goo.com'),
(3, '2013-07-09 04:28:20', '2013-07-09 04:28:20', '1', 'test', 'test.com');

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE IF NOT EXISTS `template` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `created_at` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `other` varchar(100) DEFAULT NULL,
  `publish` varchar(100) DEFAULT NULL,
  `screen` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`id`, `created_at`, `updated_at`, `name`, `other`, `publish`, `screen`) VALUES
(8, '2014-10-15 08:39:22', '2014-12-30 04:25:15', 'my style', 'cssfb/mystyle.css', 'on', 'uploads/images/default_temp.jpg'),
(12, '2014-10-18 11:46:57', '2014-12-30 04:25:15', 'pink2', 'cssfb/mystylepink.css', NULL, 'uploads/images/pink_theme.jpg'),
(13, '2014-10-20 07:20:15', '2014-12-30 04:25:15', 'Green', 'cssfb/mystylegreen.css', NULL, 'uploads/images/green_theme.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `updated_at` varchar(100) DEFAULT NULL,
  `created_at` varchar(100) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `rand` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `approved` varchar(100) DEFAULT NULL,
  `permission` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `sex` varchar(100) DEFAULT NULL,
  `activate` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `forget` varchar(100) DEFAULT NULL,
  `plan` varchar(100) DEFAULT NULL,
  `education` varchar(100) DEFAULT NULL,
  `work` varchar(100) DEFAULT NULL,
  `event` varchar(100) DEFAULT NULL,
  `account` varchar(100) DEFAULT NULL,
  `uname` varchar(100) DEFAULT NULL,
  `ipaddress` varchar(255) DEFAULT NULL,
  `visitors` varchar(100) DEFAULT NULL,
  `bodytype` varchar(100) DEFAULT NULL,
  `height` varchar(100) DEFAULT NULL,
  `haircolor` varchar(100) DEFAULT NULL,
  `eyecolor` varchar(100) DEFAULT NULL,
  `age` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=186 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `updated_at`, `created_at`, `remember_token`, `rand`, `city`, `name`, `approved`, `permission`, `username`, `sex`, `activate`, `phone`, `location`, `forget`, `plan`, `education`, `work`, `event`, `account`, `uname`, `ipaddress`, `visitors`, `bodytype`, `height`, `haircolor`, `eyecolor`, `age`) VALUES
(185, 'demo@demo.com', '$2y$10$XGFFoYfTmlexFnxMg/p9Tu6EgvkybZgi8MC/vpMsIpML5XTH30vYC', '2015-01-13 04:45:02', '2014-12-30 12:32:44', '8cFhKbJFOqIaraj8NOhQK3rLcXXJAiglJd8GYNLes2Dd448TxHsz4GRmxhra', 'tZClS5dFuh', 'moahli', 'supers', NULL, NULL, 'admin', 'male', '1', '', '', NULL, 'Superadmin', '', '', '', '1', 'supers', '182.71.115.54', NULL, '4', '200', '5', '4', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
