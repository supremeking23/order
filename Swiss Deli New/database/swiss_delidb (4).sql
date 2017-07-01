-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2017 at 07:41 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `swiss_delidb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintbl`
--

CREATE TABLE IF NOT EXISTS `admintbl` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_surname` varchar(45) NOT NULL,
  `admin_firstname` varchar(45) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(45) NOT NULL,
  `role` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `admin_tel` varchar(45) NOT NULL,
  `admin_cell` varchar(45) NOT NULL,
  `admin_profile` text NOT NULL,
  `date_registered` datetime NOT NULL,
  `admin_bin` varchar(45) NOT NULL,
  `admin_address` varchar(45) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `admintbl`
--

INSERT INTO `admintbl` (`admin_id`, `admin_surname`, `admin_firstname`, `birthdate`, `gender`, `role`, `username`, `password`, `email`, `admin_tel`, `admin_cell`, `admin_profile`, `date_registered`, `admin_bin`, `admin_address`) VALUES
(1, 'Funcion', 'Ivan Christian Jay', '1995-11-23', 'male', 'superadmin', 'ivan', 'ivan', 'icjfuncion@gmail.com', '9114', '09082363508', 'steph.jpg', '0000-00-00 00:00:00', '', '16th ISU Village Barangay 31'),
(2, 'Admins', 'Admins', '1995-11-23', 'male', 'superadmin', 'admin', 'admin', 'icjfuncion@gmail.com', '911', '09082363508', 'jackfrost.jpg', '2017-01-01 20:50:05', '', 'makati'),
(3, 'Funcion', 'Chris', '1995-11-23', 'male', 'superadmin', 'chris', 'chris', 'icjfuncion@gmail.com', '333', '11111', '', '2017-01-01 21:02:29', '', 'makati'),
(4, 'Reid', 'Mary Celine', '1995-11-23', 'male', 'superadmin', 'celine', 'celine', 'mcaphroditeried@gmail.com', '911', '09082363508', 'supreme king.jpg', '2017-01-01 21:14:47', '', 'makati'),
(5, 'Reid', 'Mary Celine', '1993-11-23', 'female', 'staff', 'celine', 'celine', 'mcaphroditeried@gmail.com', '911', '09082363508', 'naruto-uzumaki-14358.jpg', '2017-01-01 23:45:38', 'bin', 'makati'),
(6, 'Ellise', 'Juson', '1995-03-07', 'female', 'staff', 'mclise', 'mclise', 'mclise@gmail.com', '211', '09082363508', 'case study.PNG', '2017-01-03 17:16:00', '', 'makati'),
(8, 'Salvador', 'Janella', '2017-01-05', 'female', 'superadmin', 'janella', 'janella', 'JanellaSalvador@gmail.com', '666', '09082345226', '', '2017-01-24 16:38:21', '', ' Barangay 31'),
(9, 'Salvador', 'Janella', '2017-01-06', 'female', 'superadmin', 'Janella', 'Janella', 'icjfuncion@gmail.com', 'eeee', 'www', 'dark prince 1.jpg', '2017-01-24 16:41:10', 'bin', ' Barangay 31'),
(10, 'Salvador', 'Janella', '2017-01-11', 'female', 'superadmin', 'Janella', 'Janella', 'JanellaSalvador@gmail.com', '333', '333', 'Princess Ruu.jpg', '2017-01-24 16:48:15', 'bin', 'abs cbn star magin'),
(11, 'Fonaciar', 'LarryLarry', '1985-02-05', 'male', 'staff', 'babyface', 'babyface', 'babbyfaceassasin@gmail.com', '3444', '11111', '3.jpg', '2017-01-24 19:01:12', '', ' Barangay 31'),
(12, 'Thompson', 'klay', '1988-05-16', 'male', 'superadmin', 'klay', 'klay', 'klaythompson111@gmail.com', '1111111', '0908234522', '', '2017-02-28 12:10:33', '', 'Golden State Marikina');

-- --------------------------------------------------------

--
-- Table structure for table `categorytbl`
--

CREATE TABLE IF NOT EXISTS `categorytbl` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(45) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `categorytbl`
--

INSERT INTO `categorytbl` (`category_id`, `category_name`) VALUES
(1, 'Smoked Meat'),
(2, 'Smoked Fish'),
(3, 'Smoke Chicken'),
(4, 'Cooked Ham'),
(5, 'Pickled Meat'),
(6, 'Fresh Sauges'),
(7, 'Cooked Sausage'),
(8, 'Smoked Sausage'),
(9, 'Spreadable Saugsage');

-- --------------------------------------------------------

--
-- Table structure for table `customertbl`
--

CREATE TABLE IF NOT EXISTS `customertbl` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `surname` varchar(45) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `middlename` varchar(45) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telephone` varchar(45) NOT NULL,
  `cellphone` varchar(45) NOT NULL,
  `isApproved` varchar(45) NOT NULL,
  `date_registered` datetime NOT NULL,
  `isBin` varchar(45) NOT NULL,
  `profile` text NOT NULL,
  `customer_address` varchar(45) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `customertbl`
--

INSERT INTO `customertbl` (`customer_id`, `surname`, `firstname`, `middlename`, `birthdate`, `gender`, `username`, `password`, `email`, `telephone`, `cellphone`, `isApproved`, `date_registered`, `isBin`, `profile`, `customer_address`) VALUES
(28, 'Funcion', 'Irene Joy', '', '1999-10-22', 'female', 'tweety', 'ayrina22', 'princessirenejoy@gmail.com', '09185554010', '09568125917', '0', '0000-00-00 00:00:00', '', '', 'taguig city '),
(29, 'Huela', 'Jhazelle ', '', '2000-02-15', 'female', 'panda15', 'panda15', 'aseng15@yahoo.com', '09195679081', '09195679081', '0', '0000-00-00 00:00:00', '', '', 'taguig city'),
(30, 'Bugante', 'Zarre Sistine', '', '1996-12-16', 'female', 'sistine', 'wonka16', 'zarrebugante@yahoo.com', '09178652490', '09178652490', '0', '0000-00-00 00:00:00', '', '', 'makati city'),
(31, 'Enano', 'John Willy ', '', '1991-02-19', 'male', 'shamarwa20', 'willy', 'willywonka@yahoo.com', '09183267591', '09183267591', '2', '2017-02-25 03:26:01', '', '', 'taguig city'),
(32, 'Dayo', 'Blessie', '', '1994-08-24', 'female', 'bellisima', 'bangs', 'bangsdayo@yahoo,com', '09975190528', '09975190528', '0', '0000-00-00 00:00:00', '', '', 'makati city'),
(33, 'Reyes', 'Michaella', '', '1989-05-15', 'female', 'mikaykay', 'mikay', 'mikayreyes05@yahoo.com', '09977639012', '09977639012', '0', '0000-00-00 00:00:00', '', '', 'taguig city'),
(34, 'Cuzzamu', 'Mara Louella', '', '2017-05-05', 'female', 'maraaaa', 'maramara', 'mara@yahoo.com', '87000', '09182363508', '0', '0000-00-00 00:00:00', '', '', 'taguig city'),
(35, 'Villaver', 'Ray Vincent Phillip', '', '1995-06-13', 'male', 'ray', 'ray', 'phelpvillaver@gmail.com', '666', '09082363508', '0', '0000-00-00 00:00:00', '', '', 'Olympia Makati City'),
(36, 'Villete', 'John ', '', '1995-06-20', 'male', 'john', 'john', 'johnvillete@yahoo.com', '5656', '09082363508', '0', '0000-00-00 00:00:00', '', '', 'Tenement Taguig'),
(37, 'Cruz', 'John Paulo', '', '1995-10-10', 'male', 'pau', 'pau', 'paulocruz@gmail.com', '6743', '09082363508', '0', '0000-00-00 00:00:00', '', '', 'West Rembo Makati'),
(38, 'Gulo', 'Rhea Marie', '', '1995-10-10', 'male', 'rhea', 'rhea', 'rheagulo@gmail.com', '8983', '09082363508', '0', '0000-00-00 00:00:00', '', '', 'Manila City'),
(39, 'Labrador', 'Aldwin', '', '1995-09-09', 'male', 'aldwin', 'aldwin', 'aldwinlabrador@gmail.com', '6545', '09082363508', '1', '2017-02-24 17:57:51', '', '', 'Caloocan City'),
(40, 'Cabusora', 'Mark Joseph ', '', '1988-06-21', 'male', 'mark', 'mark', 'markjoseph@gmail.com', '777', '232323232', '0', '0000-00-00 00:00:00', '', '', 'Pateros'),
(41, 'Paulino', 'Jason', '', '2003-05-18', 'male', 'jason', 'jason', 'jasonpaulino@gmail.com', '43434', '09082363508', '0', '0000-00-00 00:00:00', '', '', 'Mcdo Makati'),
(42, 'Arduo', 'Jonathan ', '', '0000-00-00', 'male', 'onat', 'onat', 'onatsdonats@gmail.com', '54545', '09082363508', '0', '0000-00-00 00:00:00', '', '', 'Harvard Street Makati City'),
(43, 'Layosa', 'Jefferson ', '', '1995-09-09', 'male', 'jeff', 'jeff', 'jefflayosa@gmail.com', '54544', '09082363508', '1', '2017-02-26 02:21:55', '', 'venue.PNG', 'Taguig City'),
(44, 'Logronio', 'Jaime ', '', '1995-09-19', 'male', 'logie', 'logie', 'logie@gmail.com', '7676', '09082363508', '0', '0000-00-00 00:00:00', '', '', 'Tenement Taguig'),
(45, 'Trinidad', 'Paul Simon', '', '1996-04-12', 'male', 'trinity', 'trinity', 'trinidad@gmail.com', '6454', '09082363508', '1', '2017-02-20 23:35:26', '', '', 'trinity'),
(46, 'Ganaban', 'John David', '', '0000-00-00', 'male', 'david', 'david', 'davidganaban@gmail', '908787', '09082363508', '0', '0000-00-00 00:00:00', '', '', 'Circuit Makati'),
(47, 'Verds', 'Kim Patrick ', '', '1995-06-20', 'male', 'verds', 'verds', 'verds@gmail.com', '098787', '09082363508', '1', '2017-02-20 23:35:22', '', '', 'BCDA Makati City'),
(48, 'Olimberio', 'Daniel', '', '1996-01-15', 'male', 'daniel', 'daniel', 'danielolimberio@gmail.com', '7676', '09082363508', '1', '2017-02-26 02:21:03', '', '', 'Pateros'),
(49, 'Vergara', 'Eric', '', '1989-11-22', 'male', 'eric', 'eric', 'ericvergara@gmail.com', '5445', '09082363508', '0', '0000-00-00 00:00:00', '', '', 'patero'),
(50, 'David', 'Apple', '', '1988-06-21', 'female', 'apple', 'apple', 'appledavid@gmail.com', '7676', '09082363508', '1', '2017-02-20 23:35:16', '', 'apple david.jpg', 'Makati City'),
(51, 'Adobas', 'Ariel', '', '1995-03-15', 'male', 'arial', 'arial', 'arialadobas@gmail.com', '565', '09082363508', '1', '2017-02-20 23:40:41', '', 'phelp.PNG', 'Mcda Makati City'),
(52, 'Mercado', 'Sol', '', '1984-06-13', 'male', 'soltrain', 'soltrain', 'soltrain@gmail.com', '64543', '09082363508', '1', '2017-02-26 01:34:48', '', '', 'Barangay Ginebra San Miguel'),
(53, 'Tenerio', 'LA', '', '1984-06-12', 'male', 'latenorio', 'latenorio', 'la_tenorio@gmail.com', '54453', '09082363508', '1', '2017-02-26 01:36:34', '', '', 'Barangay Ginebra San Miguel'),
(54, 'Yuki', 'Asuna', '', '1995-06-20', 'female', 'asuna', 'asuna', 'asuna@gmail.com', '4331', '09082363508', '1', '2017-02-26 01:38:25', '', 'product 1.jpg', 'Sword Art Online'),
(55, 'Rogers', 'Steven', '', '1942-06-24', 'male', 'steve', 'steve', 'captainamerica@gmail.com', '5454', '09082363508', '1', '2017-02-26 01:41:46', '', '', 'AStrategic Homeland Intervention Enforcement '),
(56, ' Fajardo', 'June Mar', '', '1989-06-23', 'male', 'kraken', 'kraken', 'kraken15@gmail.com', '121215', '09082363515', '1', '2017-02-26 22:46:39', 'bin', '', 'San Miguel Manila City');

-- --------------------------------------------------------

--
-- Table structure for table `epointstbl`
--

CREATE TABLE IF NOT EXISTS `epointstbl` (
  `point_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `total_points` double NOT NULL,
  PRIMARY KEY (`point_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `epointstbl`
--

INSERT INTO `epointstbl` (`point_id`, `customer_id`, `total_points`) VALUES
(8, 50, 103),
(9, 47, 100),
(10, 45, 100),
(11, 51, 0),
(12, 39, 100),
(13, 52, 100),
(14, 53, 106),
(15, 54, 114),
(16, 55, 100),
(17, 48, 100),
(18, 43, 127),
(19, 56, 100);

-- --------------------------------------------------------

--
-- Table structure for table `notificationtbl`
--

CREATE TABLE IF NOT EXISTS `notificationtbl` (
  `notify_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(45) NOT NULL,
  `message` text NOT NULL,
  `notification_date` datetime NOT NULL,
  `status` varchar(45) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `order_id` varchar(45) NOT NULL,
  PRIMARY KEY (`notify_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `notificationtbl`
--

INSERT INTO `notificationtbl` (`notify_id`, `subject`, `message`, `notification_date`, `status`, `customer_id`, `order_id`) VALUES
(1, 'New customer account', 'Welcome to your new account', '2017-02-26 01:41:46', 'seen', 55, ''),
(2, 'New customer account', 'Welcome to your new account. In here, you can update your account,track your orders and check your epoints balance.', '2017-02-26 02:21:03', '', 48, ''),
(4, 'New customer account', 'Welcome to your new account. In here, you can update your account,track your orders and check your epoints balance.', '2017-02-26 02:21:55', 'seen', 43, ''),
(5, 'Initial Points of 100', 'You have recieve  an initial points of 100', '2017-02-26 02:21:55', 'seen', 43, ''),
(6, 'Approve Order', 'Your order request has been approve and will be delivered 2 days from now.', '2017-02-26 22:14:17', '', 0, ''),
(7, 'Extra points on previous order', 'You have gain an additional points during your previous orders', '2017-02-26 22:14:17', '', 0, ''),
(8, 'Approve Order', 'Your order request has been approve and will be delivered 2 days from now.', '2017-02-26 22:16:47', 'seen', 43, ''),
(9, 'Extra points on previous order', 'You have gain an additional points during your previous orders', '2017-02-26 22:16:47', 'seen', 43, ''),
(10, 'Approve Order', 'Your order request has been approve and will be delivered 2 days from now.', '2017-02-26 22:16:59', 'seen', 43, ''),
(11, 'Extra points on previous order', 'You have gain an additional points during your previous orders', '2017-02-26 22:16:59', 'seen', 43, ''),
(12, 'New customer account', 'Welcome to your new account. In here, you can update your account,track your orders and check your epoints balance.', '2017-02-26 22:46:39', '', 56, ''),
(13, 'Initial Points of 100', 'To our valuable customer. You have recieve  an initial points of 100', '2017-02-26 22:46:39', '', 56, ''),
(14, 'Approve Order', 'Your order request has been approve and will be delivered 2 days from now.', '2017-02-26 23:29:44', 'seen', 43, ''),
(15, 'Extra points on previous order', 'You have gain an additional points during your previous orders', '2017-02-26 23:29:45', 'seen', 43, ''),
(16, 'Approve Order', 'Your order request has been approve and will be delivered 2 days from now.', '2017-02-26 23:37:53', 'seen', 43, ''),
(17, 'Extra points on previous order', 'You have gain an additional points during your previous orders', '2017-02-26 23:37:54', 'seen', 43, ''),
(18, 'Approve Order', 'Your order request has been approve and will be delivered 2 days from now. Order ID is SD106', '2017-02-26 23:44:09', '', 53, ''),
(19, 'Extra points on previous order', 'You have gain an additional points during your previous order', '2017-02-26 23:44:09', '', 53, ''),
(20, 'Canceled Order', 'Your order has been canceled.', '2017-02-27 12:54:37', '', 43, ''),
(21, 'Canceled Order', 'Your order has been canceled.Order ID is SD110', '2017-02-27 12:57:39', '', 43, ''),
(22, 'Approve Order', 'Your order request has been approve and will be delivered 2 days from now. Order ID is SD111', '2017-02-27 13:03:46', '', 43, ''),
(23, 'Extra points on previous order', 'You have gain an additional points during your previous order', '2017-02-27 13:03:46', '', 43, ''),
(24, 'Approve Order', 'Your order request has been approve and will be delivered 2 days from now. Order ID is SD112', '2017-02-27 19:01:42', 'seen', 54, ''),
(25, 'Extra points on previous order', 'You have gain an additional points during your previous order', '2017-02-27 19:01:42', 'seen', 54, ''),
(26, 'Canceled Order', 'Your order has been canceled.Order ID is SD113', '2017-02-27 19:29:46', '', 54, ''),
(27, 'Canceled Order', 'Your order has been canceled.Order ID is SD114', '2017-02-28 02:18:51', 'seen', 43, ''),
(28, 'Canceled Order', 'Your order has been canceled.Order ID is SD115', '2017-02-28 02:20:24', 'seen', 43, ''),
(29, 'Canceled Order', 'Your order has been canceled.Order ID is SD116', '2017-02-28 02:47:07', 'seen', 43, ''),
(30, 'Canceled Order', 'Your order has been canceled.Order ID is SD119', '2017-02-28 18:14:58', '', 43, '');

-- --------------------------------------------------------

--
-- Table structure for table `ordertbl`
--

CREATE TABLE IF NOT EXISTS `ordertbl` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `date_ordered` datetime NOT NULL,
  `date_approved` datetime NOT NULL,
  `date_delivered` datetime NOT NULL,
  `status` varchar(45) NOT NULL,
  `epoints_use` int(11) NOT NULL,
  `general_amount` decimal(10,2) NOT NULL,
  `date_cancelled` datetime NOT NULL,
  `cancel_reason` text NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=120 ;

--
-- Dumping data for table `ordertbl`
--

INSERT INTO `ordertbl` (`order_id`, `customer_id`, `total_price`, `date_ordered`, `date_approved`, `date_delivered`, `status`, `epoints_use`, `general_amount`, `date_cancelled`, `cancel_reason`) VALUES
(86, 51, '5470.00', '2017-02-21 01:23:50', '2017-02-21 01:24:57', '2017-02-23 01:24:57', 'delivered', 0, '5470.00', '0000-00-00 00:00:00', ''),
(87, 51, '873.00', '2017-02-21 01:31:17', '2017-02-21 09:54:55', '2017-02-23 09:54:55', 'delivered', 0, '873.00', '0000-00-00 00:00:00', ''),
(88, 51, '873.00', '2017-02-21 10:25:51', '2017-02-24 18:49:54', '2017-02-26 18:49:54', 'delivered', 105, '768.00', '0000-00-00 00:00:00', ''),
(89, 50, '1468.00', '2017-02-24 18:29:19', '2017-02-24 18:56:31', '2017-02-26 18:56:31', 'delivered', 0, '1468.00', '0000-00-00 00:00:00', ''),
(90, 50, '1215.00', '2017-02-24 18:56:22', '2017-02-24 19:26:10', '2017-02-26 19:26:10', 'delivered', 0, '1215.00', '0000-00-00 00:00:00', ''),
(91, 50, '1224.00', '2017-02-24 18:58:40', '2017-02-24 19:33:59', '2017-02-26 19:33:59', 'delivered', 10, '1214.00', '0000-00-00 00:00:00', ''),
(92, 50, '2164.00', '2017-02-24 19:36:56', '2017-02-24 19:42:45', '2017-02-26 19:42:45', 'delivered', 0, '2164.00', '0000-00-00 00:00:00', ''),
(93, 50, '1350.00', '2017-02-24 19:43:08', '2017-02-24 19:43:16', '2017-02-26 19:43:16', 'delivered', 0, '1350.00', '0000-00-00 00:00:00', ''),
(94, 50, '9526.30', '2017-02-24 19:44:01', '2017-02-24 19:44:11', '2017-02-26 19:44:11', 'delivered', 0, '9526.30', '0000-00-00 00:00:00', ''),
(95, 50, '1080.00', '2017-02-24 19:44:45', '2017-02-24 19:45:22', '2017-02-26 19:45:22', 'cancel', 3, '1077.00', '2017-02-25 02:37:35', ''),
(96, 50, '2565.00', '2017-02-24 19:54:48', '2017-02-24 20:32:28', '2017-02-26 20:32:28', 'approve', 0, '2565.00', '0000-00-00 00:00:00', ''),
(97, 50, '2632.00', '2017-02-24 20:41:41', '2017-02-24 20:42:18', '2017-02-26 20:42:18', 'approve', 0, '2632.00', '0000-00-00 00:00:00', ''),
(98, 50, '3240.00', '2017-02-25 00:47:20', '2017-02-25 00:47:37', '2017-02-27 00:47:37', 'approve', 7, '3233.00', '0000-00-00 00:00:00', ''),
(99, 50, '13045.00', '2017-02-25 01:37:18', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'cancel', 0, '0.00', '2017-02-25 02:23:48', ''),
(100, 50, '6156.00', '2017-02-25 02:29:10', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'pending', 0, '0.00', '0000-00-00 00:00:00', ''),
(101, 43, '3078.00', '2017-02-26 22:14:03', '2017-02-26 22:14:17', '2017-02-28 22:14:17', 'delivered', 0, '3078.00', '0000-00-00 00:00:00', ''),
(102, 43, '3650.00', '2017-02-26 22:15:21', '2017-02-26 22:16:47', '2017-02-28 22:16:47', 'cancel', 0, '3650.00', '2017-02-27 12:46:40', ''),
(103, 43, '3830.00', '2017-02-26 22:16:24', '2017-02-26 22:16:59', '2017-02-28 22:16:59', 'delivered', 0, '3830.00', '0000-00-00 00:00:00', ''),
(104, 43, '5278.00', '2017-02-26 23:29:33', '2017-02-26 23:29:45', '2017-02-28 23:29:45', 'delivered', 0, '5278.00', '0000-00-00 00:00:00', ''),
(105, 43, '9702.00', '2017-02-26 23:37:41', '2017-02-26 23:37:54', '2017-02-28 23:37:54', 'delivered', 0, '9702.00', '0000-00-00 00:00:00', ''),
(106, 53, '6792.00', '2017-02-26 23:43:50', '2017-02-26 23:44:09', '2017-02-28 23:44:09', 'approve', 0, '6792.00', '0000-00-00 00:00:00', ''),
(107, 43, '9819.00', '2017-02-27 12:48:13', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'cancel', 0, '0.00', '2017-02-27 12:48:28', ''),
(108, 43, '4380.00', '2017-02-27 12:50:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'cancel', 0, '0.00', '2017-02-27 12:52:40', ''),
(109, 43, '10399.00', '2017-02-27 12:54:25', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'cancel', 0, '0.00', '2017-02-27 12:54:37', ''),
(110, 43, '4257.00', '2017-02-27 12:57:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'cancel', 0, '0.00', '2017-02-27 12:57:39', ''),
(111, 43, '7542.00', '2017-02-27 13:03:30', '2017-02-27 13:03:47', '2017-03-01 13:03:47', 'approve', 3, '7539.00', '0000-00-00 00:00:00', ''),
(112, 54, '14003.00', '2017-02-27 19:01:21', '2017-02-27 19:01:43', '2017-03-01 19:01:43', 'approve', 0, '14003.00', '0000-00-00 00:00:00', ''),
(113, 54, '2920.00', '2017-02-27 19:29:21', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'cancel', 876, '0.00', '2017-02-27 19:29:46', ''),
(114, 43, '6289.00', '2017-02-28 02:18:27', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'cancel', 128, '0.00', '2017-02-28 02:18:51', ''),
(115, 43, '6570.00', '2017-02-28 02:20:14', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'cancel', 1221, '0.00', '2017-02-28 02:20:24', ''),
(116, 43, '3078.00', '2017-02-28 02:28:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'cancel', 12, '0.00', '2017-02-28 02:47:07', ''),
(117, 43, '13153.00', '2017-02-28 02:46:54', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'pending', 127, '0.00', '0000-00-00 00:00:00', ''),
(118, 43, '4015.00', '2017-02-28 02:56:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'pending', 0, '0.00', '0000-00-00 00:00:00', ''),
(119, 43, '7732.00', '2017-02-28 03:06:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'cancel', 127, '0.00', '2017-02-28 18:14:58', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
  `item_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(5) NOT NULL,
  `grams` int(11) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=146 ;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `quantity`, `grams`) VALUES
(90, 86, 28, 6, 250),
(91, 86, 47, 8, 250),
(92, 86, 27, 10, 250),
(93, 86, 32, 10, 250),
(94, 86, 41, 24, 250),
(95, 87, 28, 9, 250),
(96, 88, 28, 9, 250),
(97, 89, 33, 5, 250),
(98, 89, 27, 9, 250),
(99, 90, 29, 9, 250),
(100, 91, 27, 12, 250),
(101, 92, 29, 11, 250),
(102, 92, 28, 7, 250),
(103, 93, 29, 10, 250),
(104, 94, 28, 28, 250),
(105, 94, 29, 22, 250),
(106, 94, 32, 17, 250),
(107, 94, 35, 19, 250),
(108, 95, 29, 8, 250),
(109, 96, 29, 19, 250),
(110, 97, 47, 15, 250),
(111, 97, 46, 13, 250),
(112, 98, 46, 9, 35),
(113, 99, 28, 25, 1000),
(114, 99, 27, 10, 1000),
(115, 100, 29, 18, 1000),
(116, 101, 29, 9, 1000),
(117, 102, 28, 10, 1000),
(118, 103, 30, 10, 1000),
(119, 104, 34, 14, 1000),
(120, 105, 31, 15, 1000),
(121, 105, 41, 12, 40),
(122, 106, 44, 8, 35),
(123, 106, 38, 8, 1000),
(124, 107, 53, 9, 1000),
(125, 107, 52, 16, 1000),
(126, 108, 28, 12, 1000),
(127, 109, 28, 11, 1000),
(128, 109, 27, 7, 1000),
(129, 109, 37, 10, 1000),
(130, 110, 32, 11, 1000),
(131, 111, 28, 9, 1000),
(132, 111, 33, 11, 1000),
(133, 112, 51, 9, 1000),
(134, 112, 30, 7, 1000),
(135, 112, 32, 6, 1000),
(136, 113, 28, 8, 1000),
(137, 114, 28, 10, 1000),
(138, 114, 34, 7, 1000),
(139, 115, 28, 18, 1000),
(140, 116, 29, 9, 1000),
(141, 117, 27, 14, 1000),
(142, 117, 28, 21, 1000),
(143, 118, 28, 11, 1000),
(144, 119, 29, 10, 1000),
(145, 119, 27, 11, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `producttbl`
--

CREATE TABLE IF NOT EXISTS `producttbl` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(45) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL,
  `product_grams` int(100) NOT NULL,
  `product_quantity` int(100) NOT NULL,
  `product_bin` varchar(45) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `producttbl`
--

INSERT INTO `producttbl` (`product_id`, `category_id`, `product_name`, `product_price`, `product_desc`, `product_image`, `product_keywords`, `product_grams`, `product_quantity`, `product_bin`, `date_added`) VALUES
(27, 1, 'Smoked Bacon Sliced', '392.00', 'Swiss Deli loin bacon, also known as Canadian or Back bacon, is prepared from top-quality boneless lean New Zealand pork loin. It is mild-cured and has a slight smoky manuka finish. Fried Swiss Deli loin bacon is a delicious breakfast side-dish. It is beautiful match to Eggs Benedict.', 'Canadian-Bacon.jpg', '', 1000, 2469, '', '2017-02-24 23:18:42'),
(28, 1, 'Smoked Porkloin', '365.00', 'Swiss Deli loin bacon, also known as Canadian or Back bacon, is prepared from top-quality boneless lean New Zealand pork loin. It is mild-cured and has a slight smoky manuka finish. Fried Swiss Deli loin bacon is a delicious breakfast side-dish. It is beautiful match to Eggs Benedict.', 'Olive-Snackies-1024x683.jpg', '', 1000, 2346, '', '2017-02-24 23:21:58'),
(29, 1, 'Smoke Malasugou Loin', '342.00', 'Swiss Deli loin bacon, also known as Canadian or Back bacon, is prepared from top-quality boneless lean New Zealand pork loin. It is mild-cured and has a slight smoky manuka finish. Fried Swiss Deli loin bacon is a delicious breakfast side-dish. It is beautiful match to Eggs Benedict.', 'Summer-Grill-Pack_2-300x200.jpg', '', 1000, 2223, '', '2017-02-25 00:34:01'),
(30, 1, 'Smoked Norwegian Salmon', '383.00', 'Swiss Deli loin bacon, also known as Canadian or Back bacon, is prepared from top-quality boneless lean New Zealand pork loin. It is mild-cured and has a slight smoky manuka finish. Fried Swiss Deli loin bacon is a delicious breakfast side-dish. It is beautiful match to Eggs Benedict.', 'Salametti-Lugano.jpg', '', 1000, 2205, '', '2017-02-25 00:29:58'),
(31, 1, 'Smoked Chicken Breast Fillet', '390.00', 'Swiss Deli loin bacon, also known as Canadian or Back bacon, is prepared from top-quality boneless lean New Zealand pork loin. It is mild-cured and has a slight smoky manuka finish. Fried Swiss Deli loin bacon is a delicious breakfast side-dish. It is beautiful match to Eggs Benedict.', 'Chilli-Snackies.jpg', '', 1000, 987, '', '2017-02-25 00:28:28'),
(32, 1, 'Bacon Ham', '387.00', 'Swiss Deli loin bacon, also known as Canadian or Back bacon, is prepared from top-quality boneless lean New Zealand pork loin. It is mild-cured and has a slight smoky manuka finish. Fried Swiss Deli loin bacon is a delicious breakfast side-dish. It is beautiful match to Eggs Benedict.', 'Ham-Sausage-Roll.jpg', '', 1000, 701, '', '2017-02-25 00:27:47'),
(33, 4, 'Smoked Farmers Ham', '387.00', 'Swiss Deli loin bacon, also known as Canadian or Back bacon, is prepared from top-quality boneless lean New Zealand pork loin. It is mild-cured and has a slight smoky manuka finish. Fried Swiss Deli loin bacon is a delicious breakfast side-dish. It is beautiful match to Eggs Benedict.', 'Farmhouse-Meatloaf.jpg', '', 1000, 1906, '', '2017-02-25 03:18:10'),
(34, 4, 'Chicken Ham', '377.00', 'Swiss Deli loin bacon, also known as Canadian or Back bacon, is prepared from top-quality boneless lean New Zealand pork loin. It is mild-cured and has a slight smoky manuka finish. Fried Swiss Deli loin bacon is a delicious breakfast side-dish. It is beautiful match to Eggs Benedict.', 'Breakfast-Sandwich-2.jpg', '', 1000, 1197, '', '2017-02-25 03:18:37'),
(35, 1, 'Spiced Ham', '372.00', 'Swiss Deli loin bacon, also known as Canadian or Back bacon, is prepared from top-quality boneless lean New Zealand pork loin. It is mild-cured and has a slight smoky manuka finish. Fried Swiss Deli loin bacon is a delicious breakfast side-dish. It is beautiful match to Eggs Benedict.', 'Feature-Sausage_2.jpg', '', 1000, 1993, '', '2017-02-26 22:59:35'),
(36, 4, 'Sandwich Ham', '357.00', 'Swiss Deli loin bacon, also known as Canadian or Back bacon, is prepared from top-quality boneless lean New Zealand pork loin. It is mild-cured and has a slight smoky manuka finish. Fried Swiss Deli loin bacon is a delicious breakfast side-dish. It is beautiful match to Eggs Benedict.', 'Antipasti-sharing-platters.jpg', '', 1000, 1212, '', '2017-02-25 03:27:57'),
(37, 5, 'Beef Ham', '364.00', 'Swiss Deli loin bacon, also known as Canadian or Back bacon, is prepared from top-quality boneless lean New Zealand pork loin. It is mild-cured and has a slight smoky manuka finish. Fried Swiss Deli loin bacon is a delicious breakfast side-dish. It is beautiful match to Eggs Benedict.', 'Beef-Pastrami-300x187.png', '', 1000, 1211, '', '2017-02-25 00:01:44'),
(38, 1, 'Pastrami', '475.00', 'Swiss Deli loin bacon, also known as Canadian or Back bacon, is prepared from top-quality boneless lean New Zealand pork loin. It is mild-cured and has a slight smoky manuka finish. Fried Swiss Deli loin bacon is a delicious breakfast side-dish. It is beautiful match to Eggs Benedict.', 'Beef-Pastrami.png', '', 1000, 1204, '', '2017-02-24 23:59:32'),
(39, 1, 'Corned Beef (Pinoy)', '287.00', 'Swiss Deli loin bacon, also known as Canadian or Back bacon, is prepared from top-quality boneless lean New Zealand pork loin. It is mild-cured and has a slight smoky manuka finish. Fried Swiss Deli loin bacon is a delicious breakfast side-dish. It is beautiful match to Eggs Benedict.', 'corned beef.jpg', '', 1000, 2322, '', '2017-02-24 23:54:09'),
(40, 1, 'Liver Sausage', '369.00', 'Swiss Deli loin bacon, also known as Canadian or Back bacon, is prepared from top-quality boneless lean New Zealand pork loin. It is mild-cured and has a slight smoky manuka finish. Fried Swiss Deli loin bacon is a delicious breakfast side-dish. It is beautiful match to Eggs Benedict.', 'Sausage-Feature-7.jpg', '', 1000, 2321, '', '2017-02-24 23:51:26'),
(41, 1, 'Longaniza Beef', '321.00', 'Swiss Deli loin bacon, also known as Canadian or Back bacon, is prepared from top-quality boneless lean New Zealand pork loin. It is mild-cured and has a slight smoky manuka finish. Fried Swiss Deli loin bacon is a delicious breakfast side-dish. It is beautiful match to Eggs Benedict.', 'Beefy-Bites.png', '', 40, 963, '', '2017-02-24 23:48:11'),
(42, 1, 'Longaniza Pork', '374.00', 'Swiss Deli loin bacon, also known as Canadian or Back bacon, is prepared from top-quality boneless lean New Zealand pork loin. It is mild-cured and has a slight smoky manuka finish. Fried Swiss Deli loin bacon is a delicious breakfast side-dish. It is beautiful match to Eggs Benedict.', 'Dutch-Smoked-Salami.jpg', '', 160, 1212, '', '2017-02-24 23:46:49'),
(43, 1, 'Italian Style Pork Sausage', '374.00', 'Swiss Deli loin bacon, also known as Canadian or Back bacon, is prepared from top-quality boneless lean New Zealand pork loin. It is mild-cured and has a slight smoky manuka finish. Fried Swiss Deli loin bacon is a delicious breakfast side-dish. It is beautiful match to Eggs Benedict.', 'Pork_Bratwurst.png', '', 160, 2321, '', '2017-02-24 23:43:54'),
(44, 1, 'Nuernberger', '374.00', 'Swiss Deli loin bacon, also known as Canadian or Back bacon, is prepared from top-quality boneless lean New Zealand pork loin. It is mild-cured and has a slight smoky manuka finish. Fried Swiss Deli loin bacon is a delicious breakfast side-dish. It is beautiful match to Eggs Benedict.', 'Salametti-Lugano.jpg', '', 35, 4335, '', '2017-02-24 23:39:26'),
(45, 1, 'Veal Bratwurst', '341.00', 'Swiss Deli loin bacon, also known as Canadian or Back bacon, is prepared from top-quality boneless lean New Zealand pork loin. It is mild-cured and has a slight smoky manuka finish. Fried Swiss Deli loin bacon is a delicious breakfast side-dish. It is beautiful match to Eggs Benedict.', 'Veal-Bratwurst-with-Mushrooms-and-Creamy-Sauce.png', '', 125, 1121, '', '2017-02-24 23:33:36'),
(46, 1, 'Chipolata', '360.00', 'Swiss Deli Chipolata, also known as Canadian or Back bacon, is prepared from top-quality boneless lean New Zealand pork loin. It is mild-cured and has a slight smoky manuka finish. Fried Swiss Deli loin bacon is a delicious breakfast side-dish. It is beautiful match to Eggs Benedict.', 'Hot-Pot-Vienna-and-Kale.png', '', 35, 1189, '', '2017-02-24 23:30:31'),
(47, 1, 'Augsburger', '370.00', 'Swiss Deli loin bacon, also known as Canadian or Back bacon, is prepared from top-quality boneless lean New Zealand pork loin. It is mild-cured and has a slight smoky manuka finish. Fried Swiss Deli loin bacon is a delicious breakfast side-dish. It is beautiful match to Eggs Benedict.', 'Berne-Lyoner-Sausage-Roll.jpg', '', 125, 3088, '', '2017-02-24 23:29:02'),
(48, 1, 'Smoked Bacon Whole', '360.00', 'Swiss Deli Cooked on Bone Ham (COB) is a must-have  Christmas. This year we are also offering a Free Range option. This delicious ham has a unique smoky flavour that is truly unmistakable. Traditionally enjoyed glazed both hot and cold.', 'Double-Smoked-Ham1.jpg', '', 1000, 4444, '', '2017-02-24 23:21:16'),
(49, 1, 'Ground Bacon', '352.00', 'Swiss Deli Cooked on Bone Ham (COB) is a must-have at Christmas. This year we are also offering a Free Range option. This delicious ham has a unique smoky flavour that is truly unmistakable. Traditionally enjoyed glazed both hot and cold.', 'Cheese-Bacon-Kransky.jpg', '', 1000, 3332, '', '2017-02-24 23:23:17'),
(50, 2, 'Smoked Malasugue Loin', '900.00', 'Swiss Deli Hot Spanish Salami is a very versatile hot course-textured salami. A combination of paprika and tanginess produced by the curing and smoking gives this salami its authentic Spanish flavour and aroma. It can be enjoyed as a snack or as part of an antipasto. A great way to add a bit of spice to any dish.', 'Smoked Malasugue Loin.jpg', '', 1000, 3312, '', '2017-02-25 03:02:11'),
(51, 2, 'Smoked Salmon', '1000.00', 'Swiss Deli Hunter Pork Stick is a smoked, dried and full-bodied salami style sausage made from select cuts of New Zealand pork with a hint of cumin for flavouring. Best enjoyed as a snack or sliced as part of an antipasto.', 'Smoked Salmon.jpg', '', 1000, 3214, '', '2017-02-25 03:13:41'),
(52, 4, 'Loin Ham', '396.00', 'Swiss Deli Hunter Pork Stick is a smoked, dried and full-bodied salami style sausage made from select cuts of New Zealand pork with a hint of cumin for flavouring. Best enjoyed as a snack or sliced as part of an antipasto.', 'Loin Ham.jpg', '', 1000, 1211, '', '2017-02-25 03:16:07'),
(53, 4, 'Bacon Ham', '387.00', 'Swiss Deli Hunter Pork Stick is a smoked, dried and full-bodied salami style sausage made from select cuts of New Zealand pork with a hint of cumin for flavouring. Best enjoyed as a snack or sliced as part of an antipasto.', 'Bacon Ham.jpg', '', 1000, 1212, '', '2017-02-25 03:17:49');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
