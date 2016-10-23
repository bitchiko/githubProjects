-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2016 at 08:01 AM
-- Server version: 5.5.50-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `truls`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `user` varchar(22) NOT NULL,
  `text` text NOT NULL,
  `question_id` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=76 ;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `user`, `text`, `question_id`) VALUES
(41, 'WWRwhDNRaXB8BIb37Kw0w6', 'Physical (Layer 1),Data Link (Layer 2),Network (Layer 3),Transport (Layer 4),Session (Layer 5),Presentation (Layer 6),Application (Layer 7)', 23),
(42, 'WWRwhDNRaXB8BIb37Kw0w6', '32', 9),
(43, 'WWRwhDNRaXB8BIb37Kw0w6', 'A router address', 2),
(44, 'WWRwhDNRaXB8BIb37Kw0w6', 'Network and Host', 3),
(45, 'WWRwhDNRaXB8BIb37Kw0w6', 'To have communication in different networks ', 4),
(46, 'WWRwhDNRaXB8BIb37Kw0w6', 'To translate domain name into Ip address', 5),
(47, 'WWRwhDNRaXB8BIb37Kw0w6', 'Automatically assigns Ip addresses in the network  ', 6),
(48, 'yMjzsFuVvvOLHWFBQpr3bg', 'A default gateway in computer networking is the node that is assumed to know how to forward packets on to other networks. Typically in a TCP/IP network, nodes such as servers, workstations and network devices each have a defined default route setting, (pointing to the default gateway), defining where to send packets for IP addresses for which they can determine no specific route. The gateway is by definition a router.', 2),
(50, '1N2eGBEcXu29qZuOkAayxV', 'Where the traffic is directed if no specific route is available.', 2),
(51, '1N2eGBEcXu29qZuOkAayxV', 'Fiber, copper(twisted pair), air(wireless) ', 45),
(52, '1N2eGBEcXu29qZuOkAayxV', 'TCP', 42),
(53, '1N2eGBEcXu29qZuOkAayxV', 'Hub-and-spoke, Full mesh', 33),
(54, 'oXVn3t0b3c3DWXZjToTjvn', 'TCP/IP and OSI models', 1),
(55, 'oXVn3t0b3c3DWXZjToTjvn', 'Application, presentation, session, transport, network, data link, physical', 7),
(56, 'oXVn3t0b3c3DWXZjToTjvn', 'Application, transport, internet, network.', 8),
(57, '1N2eGBEcXu29qZuOkAayxV', '48', 27),
(58, 'oXVn3t0b3c3DWXZjToTjvn', 'Network ', 13),
(59, 'oXVn3t0b3c3DWXZjToTjvn', 'Data link', 14),
(60, '1N2eGBEcXu29qZuOkAayxV', 'The application', 17),
(61, 'oXVn3t0b3c3DWXZjToTjvn', 'Physical ', 15),
(62, 'oXVn3t0b3c3DWXZjToTjvn', 'To translate/resolve network/IP addresses to physical host adresses', 16),
(63, 'oXVn3t0b3c3DWXZjToTjvn', 'Transport', 18),
(64, '1N2eGBEcXu29qZuOkAayxV', 'To provide a path between different networks and media independence.', 4),
(65, 'oXVn3t0b3c3DWXZjToTjvn', 'Source (IP, MAC, Port) and Destination (IP, MAC, Port)', 20),
(66, 'oXVn3t0b3c3DWXZjToTjvn', 'Encapsulation', 21),
(67, 'oXVn3t0b3c3DWXZjToTjvn', 'Header', 22),
(68, 'oXVn3t0b3c3DWXZjToTjvn', '48', 27),
(69, 'oXVn3t0b3c3DWXZjToTjvn', 'Icmp echo request, icmp echo reply, icmp echo error', 29),
(70, 'oXVn3t0b3c3DWXZjToTjvn', 'Code division multiple access', 30),
(71, 'H4txUFxYHIzDpMUW2HDX7c', 'The Layer 1 is Network Access not Network (Big difference)', 8),
(72, 'oXVn3t0b3c3DWXZjToTjvn', 'Ring and MeshStar and Bus', 33),
(73, 'oXVn3t0b3c3DWXZjToTjvn', 'Ethernet and Token ring', 37),
(74, 'oXVn3t0b3c3DWXZjToTjvn', '80, 443', 38),
(75, 'oXVn3t0b3c3DWXZjToTjvn', 'DNS, HTTP, FTP, DHCP', 40);

-- --------------------------------------------------------

--
-- Table structure for table `like_dislike`
--

CREATE TABLE IF NOT EXISTS `like_dislike` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `like_ans` int(9) NOT NULL,
  `dislike_ans` int(9) NOT NULL,
  `answer_id` int(9) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=100 ;

--
-- Dumping data for table `like_dislike`
--

INSERT INTO `like_dislike` (`id`, `like_ans`, `dislike_ans`, `answer_id`) VALUES
(1, 1, 2, 3),
(2, 1, 0, 34),
(3, 1, 0, 35),
(4, 1, 0, 32),
(5, 1, 0, 33),
(6, 0, 0, 33),
(7, 1, 0, 32),
(8, 1, 0, 34),
(9, 1, 0, 35),
(10, 1, 0, 35),
(11, 1, 0, 32),
(12, 1, 0, 34),
(13, 1, 0, 32),
(14, 1, 0, 32),
(15, 1, 0, 34),
(16, 0, 0, 32),
(17, 1, 0, 0),
(18, 1, 0, 36),
(19, 0, 0, 32),
(20, 1, 0, 32),
(21, 0, 0, 32),
(22, 1, 0, 32),
(23, 0, 0, 32),
(24, 1, 0, 32),
(25, 0, 0, 32),
(26, 1, 0, 32),
(27, 0, 0, 32),
(28, 1, 0, 32),
(29, 0, 0, 32),
(30, 1, 0, 32),
(31, 0, 0, 32),
(32, 1, 0, 32),
(33, 0, 0, 32),
(34, 1, 0, 32),
(35, 1, 0, 32),
(36, 0, 0, 32),
(37, 1, 0, 43),
(38, 1, 0, 43),
(39, 1, 0, 44),
(40, 1, 0, 44),
(41, 1, 0, 44),
(42, 1, 0, 48),
(43, 1, 0, 50),
(44, 1, 0, 48),
(45, 1, 0, 44),
(46, 1, 0, 52),
(47, 1, 0, 51),
(48, 1, 0, 45),
(49, 1, 0, 46),
(50, 1, 0, 47),
(51, 1, 0, 42),
(52, 1, 0, 54),
(53, 1, 0, 54),
(54, 1, 0, 44),
(55, 0, 0, 43),
(56, 1, 0, 64),
(57, 1, 0, 56),
(58, 1, 0, 58),
(59, 1, 0, 44),
(60, 1, 0, 62),
(61, 1, 0, 46),
(62, 1, 0, 47),
(63, 1, 0, 65),
(64, 1, 0, 41),
(65, 1, 0, 55),
(66, 1, 0, 68),
(67, 0, 0, 56),
(68, 1, 0, 57),
(69, 1, 0, 52),
(70, 1, 0, 51),
(71, 1, 0, 42),
(72, 1, 0, 50),
(73, 1, 0, 58),
(74, 1, 0, 59),
(75, 1, 0, 61),
(76, 1, 0, 62),
(77, 1, 0, 64),
(78, 1, 0, 60),
(79, 1, 0, 71),
(80, 0, 0, 56),
(81, 1, 0, 71),
(82, 0, 0, 56),
(83, 1, 0, 54),
(84, 1, 0, 48),
(85, 1, 0, 50),
(86, 1, 0, 44),
(87, 1, 0, 45),
(88, 1, 0, 64),
(89, 1, 0, 46),
(90, 1, 0, 47),
(91, 1, 0, 55),
(92, 0, 0, 56),
(93, 1, 0, 42),
(94, 1, 0, 58),
(95, 1, 0, 59),
(96, 1, 0, 61),
(97, 1, 0, 62),
(98, 1, 0, 60),
(99, 1, 0, 63);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `text`) VALUES
(1, '1. What are the two models the govern the network or internet?'),
(2, '2. What is a default gateway?'),
(3, '3. What are the two part of your IP address?'),
(4, '4. Why do I need a router?\r\n'),
(5, '5. Why do you need DNS in your network?\r\n'),
(6, '6. What is a DHCP server?\r\n'),
(7, '7. What are the layers of the OSI model?'),
(8, '8. What are the layers of the TCP/IP model?'),
(9, '9. How many bits is IPv4?\r\n'),
(13, '11. What OSI layer is the router at?'),
(14, '12. What OSI layer is the switch at?'),
(15, '13 What OSI layer is the cable at?'),
(16, '14. Why do we have ARP?'),
(17, '15. What decides if TCP or UDP is going to be used?'),
(18, '16. Where do the TCP and UDP layers live in the OSI model?'),
(19, '17. What is the process called that sends the data form source to destination?'),
(20, '18. What are the six numbers that are necessary in order for the data to flow\r\nform Source to Destination?'),
(21, '19. What do we call the process when data is flowing from the application layer\r\nto the transport layer to the network layer to the datalink layer then to the\r\nphysical?'),
(22, '20. What is attached to each piece of Data as it flows through the models?\r\n'),
(23, '21. What are the Seven Layers of the OSI Model?\r\n'),
(24, '22. What are the Four Layers to the TCP/IP Model?'),
(25, '23. Why two models?'),
(26, '24. What are the two parts to the IP number?'),
(27, '25. How many bits is the MAC address?'),
(28, '26. What do we need a Router?'),
(29, '27. What are the three types of IP messages?\r\n'),
(30, '28 What is CDMA?'),
(31, '29. What is Media Access Control.'),
(32, '30. Why are all the consumer electronic industries rushing to build product for the TCP/IP protocol\r\nstack?\r\n'),
(33, '31. Give two examples of Physical Typologies.'),
(34, '32. What are the three types of cables used in networking?\r\n'),
(35, '33.Data, Segment, Packet, Frame, Bits, What is this?\r\n'),
(36, '	34.Name an example of a physical layer protocol?\r\n'),
(37, '35. What is an example of a Data Link Layer protocol?\r\n'),
(38, '36 Give me an example of a well known port number.\r\n'),
(39, '37. How dose the transport layer know what application is using it?\r\n'),
(40, '38. Give me an example of a application layer protocol.\r\n'),
(41, '39. What are the two aspects to the network or two typologies?\r\n'),
(42, '40. What uses a three way hand shake?\r\n'),
(43, '41. what is significant about a port number and Ip number ?\r\n'),
(44, '42. How do I monitor the traffic on the wire or cable?\r\n'),
(45, '43. What are the three main types of media in today''s networks?\r\n');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
