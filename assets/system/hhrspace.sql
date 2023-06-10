-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 10, 2023 at 12:36 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hhrspace`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

DROP TABLE IF EXISTS `application`;
CREATE TABLE IF NOT EXISTS `application` (
  `a_id` int NOT NULL AUTO_INCREMENT,
  `a_name` varchar(255) NOT NULL,
  `a_value` varchar(255) NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`a_id`, `a_name`, `a_value`) VALUES
(1, 'site-name', 'HHR SPACE'),
(2, 'favicon', 'assets/uploads/2b42487f71f5272049d43b2172461357.png'),
(3, 'smtp_host', 'smtp.gmail.com'),
(4, 'smtp_auth', 'true'),
(5, 'smtp_user', 'thejanvishmitha3@gmail.com'),
(6, 'smtp_password', 'goebeykjglkizeaq'),
(7, 'smtp_secure', 'tls'),
(8, 'smtp_port', '587'),
(9, 'system-email', 'thejanvishmitha3@gmail.com'),
(10, 'description', 'We are web developers'),
(11, 'phone_number', '+94781112388'),
(12, 'address', 'No.264/B/2,Batuwatt, Ragama, Sri Lanka'),
(13, 'post_thumbnail', 'assets/system/no-thumbnail.jpg'),
(14, 'Cuserphoto', '29ff43dc4917d06e6be87c333d4c4e51.jpg'),
(15, 'telegramApi', '6241741673:AAF0Dxy1M5omTMpfzqJTc1NlGSdCuQqLBSk'),
(16, 'telegram_ChatId', '@hhrspace'),
(17, 'PClient_ID', 'Acmh3KZMzUPKt05VR0Mc7wpIKZyJ_7byR1YKQVemCmd4SE8I8LiRKCqkN_JHrDpxMuoBGtQoESF6cJbA');

-- --------------------------------------------------------

--
-- Table structure for table `email_messages`
--

DROP TABLE IF EXISTS `email_messages`;
CREATE TABLE IF NOT EXISTS `email_messages` (
  `system_email-id` int NOT NULL AUTO_INCREMENT,
  `e_subject` varchar(255) NOT NULL,
  `Ebody` varchar(255) NOT NULL,
  `sent_to` varchar(255) NOT NULL,
  `sent_user_id` int NOT NULL,
  `sent_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`system_email-id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `email_messages`
--

INSERT INTO `email_messages` (`system_email-id`, `e_subject`, `Ebody`, `sent_to`, `sent_user_id`, `sent_at`) VALUES
(1, 'Hello Test', '<p>Testing that store data of email<b> in database</b><img src=\"http://localhost/hhrspace/assets/uploads/22c35c251e9e31f2f1dfbd1d83131d54.jpg\" style=\"width: 0px;\"><br></p>', 'Admins', 14, '2023-05-25 10:35:23'),
(2, 'Hello Test', '<p>Testing that store data of email<b> in database</b><img src=\"http://localhost/hhrspace/assets/uploads/22c35c251e9e31f2f1dfbd1d83131d54.jpg\" style=\"width: 0px;\"><br></p>', 'Authors', 14, '2023-05-25 10:35:28'),
(3, 'Hello Test', '<p>Testing that store data of email<b> in database</b><img src=\"http://localhost/hhrspace/assets/uploads/22c35c251e9e31f2f1dfbd1d83131d54.jpg\" style=\"width: 0px;\"><br></p>', 'Members', 14, '2023-05-25 10:35:35'),
(4, 'Hello Test', '<p>Testing that store data of email<b> in database</b><img src=\"http://localhost/hhrspace/assets/uploads/22c35c251e9e31f2f1dfbd1d83131d54.jpg\" style=\"width: 0px;\"><br></p>', 'Subscribers', 14, '2023-05-25 10:35:45'),
(5, 'Hello New admin', '<p><u><font color=\"#ff0000\">New admin </font>Welcome To</u>&nbsp;HHR SPACE</p>', 'Admins', 14, '2023-05-26 10:54:29'),
(6, 'Hello New admin', '<p><u><font color=\"#ff0000\">New admin </font>Welcome To</u>&nbsp;HHR SPACE</p>', 'Authors', 14, '2023-05-26 10:54:33'),
(7, 'Hello New admin', '<p><u><font color=\"#ff0000\">New admin </font>Welcome To</u>&nbsp;HHR SPACE</p>', 'Members', 14, '2023-05-26 10:54:39'),
(8, 'Hello New admin', '<p><u><font color=\"#ff0000\">New admin </font>Welcome To</u>&nbsp;HHR SPACE</p>', 'Subscribers', 14, '2023-05-26 10:54:45'),
(9, 'Hello New admin', '<p><u><font color=\"#ff0000\">New admin </font>Welcome To</u>&nbsp;HHR SPACE 444</p>', 'Admins', 14, '2023-05-26 10:55:13'),
(10, 'Hello New admin', '<p><u><font color=\"#ff0000\">New admin </font>Welcome To</u>&nbsp;HHR SPACE 444</p>', 'Authors', 14, '2023-05-26 10:55:16'),
(11, 'Hello New admin', '<p><u><font color=\"#ff0000\">New admin </font>Welcome To</u>&nbsp;HHR SPACE 444</p>', 'Members', 14, '2023-05-26 10:55:20'),
(12, 'Hello New admin', '<p><u><font color=\"#ff0000\">New admin </font>Welcome To</u>&nbsp;HHR SPACE 444</p>', 'Subscribers', 14, '2023-05-26 10:55:24'),
(13, 'Hi', '<p>Today is premiumcontent day</p>', 'Admins', 14, '2023-05-31 06:44:46'),
(14, 'Hi', '<p>Today is premiumcontent day</p>', 'Authors', 14, '2023-05-31 06:44:51'),
(15, 'Hi', '<p>Today is premiumcontent day</p>', 'Members', 14, '2023-05-31 06:44:56'),
(16, 'Hi', '<p>Today is premiumcontent day</p>', 'Subscribers', 14, '2023-05-31 06:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `page_id` int NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) NOT NULL,
  `page_url` varchar(255) NOT NULL,
  `page_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`page_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `page_name`, `page_url`, `page_added`) VALUES
(1, 'World', 'world', '2023-05-04 06:21:42'),
(2, 'Technology', 'tecnology', '2023-05-04 06:21:42'),
(3, 'Politics', 'politics', '2023-05-04 06:35:37'),
(4, 'Health', 'health', '2023-05-04 06:35:37');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
CREATE TABLE IF NOT EXISTS `photos` (
  `photo_id` int NOT NULL AUTO_INCREMENT,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`photo_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`photo_id`, `url`, `added`) VALUES
(4, 'assets/uploads/59f0a99e991c11153257a5769fd7f182.jpg', '2023-05-20 12:23:22'),
(3, 'assets/uploads/fdeca6a6cc23e832be83a824e4edc4e6.png', '2023-05-20 12:17:27'),
(5, 'assets/uploads/b829b90b4cd063816d836e2f43a25f0e.jpg', '2023-05-20 12:36:51'),
(6, 'assets/uploads/22c35c251e9e31f2f1dfbd1d83131d54.jpg', '2023-05-20 12:37:01'),
(7, 'assets/uploads/72dad1c6eb21b88587099b48d6a59a2a.jpg', '2023-05-20 12:37:09'),
(8, 'assets/uploads/884b116b2b9c6885a2c2c954ac21806d.jpg', '2023-05-25 06:15:45'),
(9, 'assets/uploads/56fd91987adccd2af6ed7f2d6ad2bd0b.png', '2023-06-02 12:25:31');

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

DROP TABLE IF EXISTS `polls`;
CREATE TABLE IF NOT EXISTS `polls` (
  `poll_id` int NOT NULL AUTO_INCREMENT,
  `media` varchar(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `options` varchar(255) NOT NULL,
  `sent_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sent_by` int NOT NULL,
  PRIMARY KEY (`poll_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `polls`
--

INSERT INTO `polls` (`poll_id`, `media`, `question`, `options`, `sent_at`, `sent_by`) VALUES
(1, 'Telegram', '5011', '[\"101\",\"10\"]', '2023-05-25 12:06:55', 14),
(2, 'Telegram', '5011', '[\"101\",\"10\"]', '2023-05-25 12:06:56', 14),
(3, 'Telegram', 'How are you?', '[\"Fine\",\"Good\",\"Never Better\",\"Bad day\",\"lucky day\"]', '2023-05-25 12:08:40', 14),
(4, 'Telegram', 'How are you?', '[\"Fine\",\"Good\",\"Never Better\"]', '2023-05-25 12:08:56', 14),
(5, 'Telegram', 'How are you?', '[\"Fine\",\"Good\"]', '2023-05-25 12:09:02', 14);

-- --------------------------------------------------------

--
-- Table structure for table `premium_content`
--

DROP TABLE IF EXISTS `premium_content`;
CREATE TABLE IF NOT EXISTS `premium_content` (
  `pc_id` int NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_type` varchar(255) NOT NULL,
  `file_url` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `file_description` mediumtext NOT NULL,
  `added_by_user` int NOT NULL,
  `review` int NOT NULL,
  PRIMARY KEY (`pc_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

DROP TABLE IF EXISTS `subscribers`;
CREATE TABLE IF NOT EXISTS `subscribers` (
  `subscriber-id` int NOT NULL AUTO_INCREMENT,
  `fi_name` varchar(255) NOT NULL,
  `la_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subscribed_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`subscriber-id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`subscriber-id`, `fi_name`, `la_name`, `email`, `subscribed_on`) VALUES
(11, 'Harry', 'Potter', 'hhrspace@gmail.com', '2023-05-24 13:58:19');

-- --------------------------------------------------------

--
-- Table structure for table `telegram_messages`
--

DROP TABLE IF EXISTS `telegram_messages`;
CREATE TABLE IF NOT EXISTS `telegram_messages` (
  `system-msg-id` int NOT NULL AUTO_INCREMENT,
  `msg_id` int NOT NULL,
  `message` varchar(255) NOT NULL,
  `msg_status` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `system_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `added_user_id` varchar(255) NOT NULL,
  PRIMARY KEY (`system-msg-id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `telegram_messages`
--

INSERT INTO `telegram_messages` (`system-msg-id`, `msg_id`, `message`, `msg_status`, `image`, `description`, `system_time`, `added_user_id`) VALUES
(13, 0, '', '0', '0', 'Unauthorized', '2023-05-25 08:17:49', '14'),
(12, 0, '44444', '0', '0', 'Unauthorized', '2023-05-25 08:17:15', '14'),
(14, 0, '', '0', '0', 'Bad Request: wrong HTTP URL specified', '2023-05-25 08:18:40', '14'),
(15, 0, 'Hi', '0', '0', 'Bad Request: wrong HTTP URL specified', '2023-05-25 08:18:53', '14'),
(16, 56, 'Hi', '1', 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9e/Phalacrocorax_carbo%2C_Egretta_garzetta_and_Mareca_strepera_in_Taudha_Lake.jpg/500px-Phalacrocorax_carbo%2C_Egretta_garzetta_and_Mareca_strepera_in_Taudha_Lake.jpg', '', '2023-05-25 08:19:19', '14'),
(17, 57, '<b>Hi</b>', '1', 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9e/Phalacrocorax_carbo%2C_Egretta_garzetta_and_Mareca_strepera_in_Taudha_Lake.jpg/500px-Phalacrocorax_carbo%2C_Egretta_garzetta_and_Mareca_strepera_in_Taudha_Lake.jpg', '', '2023-05-25 08:19:43', '14'),
(18, 58, '<b>Hi</b>', '1', '0', '0', '2023-05-25 08:20:00', '14'),
(19, 0, '', '0', '0', 'Bad Request: wrong HTTP URL specified', '2023-05-25 10:32:39', '14'),
(20, 66, '444444444444444444444', '1', '0', '0', '2023-05-25 12:36:10', '14'),
(21, 67, '444444444444444444444dfffffffffffffffff', '1', '0', '0', '2023-05-25 12:36:14', '14'),
(27, 75, 'Hello', '1', '0', '0', '2023-05-26 10:41:14', '14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verification` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `dp` varchar(255) NOT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `verification`, `type`, `dp`, `added`) VALUES
(15, 'Thejan', 'Vishmitha', 'thejanvishmitha3@gmail.com', '$2y$10$Zb9sYBEnPHHfIA3rtOPoluPwQsG3Aef0XcfiZhkTumY4s/Vb3OpIW', 'verified', 'user', '29ff43dc4917d06e6be87c333d4c4e51.jpg', '2023-05-18 11:14:58'),
(14, 'Thejan', 'Vishmitha', 'vishmithathejan154@gmail.com', '$2y$10$LiXxqts3jCNnda3Kg3sH1u7gewsea9wGNJk1xjaTcOz/3App/vkfm', 'verified', 'admin', 'user.png', '2023-05-14 04:38:13'),
(16, 'har', 'vvvv', 'thejanvishmitha4@gmail.com', 'jjj', 'verified', 'author', 'user.png', '2023-05-24 14:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `verifications`
--

DROP TABLE IF EXISTS `verifications`;
CREATE TABLE IF NOT EXISTS `verifications` (
  `verify_id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `expiration_time` varchar(255) NOT NULL,
  `used` int NOT NULL,
  `addeed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`verify_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `verifications`
--

INSERT INTO `verifications` (`verify_id`, `email`, `code`, `expiration_time`, `used`, `addeed`) VALUES
(4, 'vishmithathejan154@gmail.com', '532269', '1684152664', 1, '2023-05-11 05:47:59'),
(3, 'thejanvishmitha3@gmail.com', '614150', '1684412099', 1, '2023-05-11 05:43:38');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
