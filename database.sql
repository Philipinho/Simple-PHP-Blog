-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2021 at 05:56 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `date`) VALUES
(1, 'Admin', '$2y$10$FfhPYubR4sOXAFSd3NzyQ.C77L4.qIsCa/YlYZCn.2eK8rfWr6oiq', 'admin@example.org', '2021-09-19 14:39:53');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `page_name` varchar(255) DEFAULT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `posted_by` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `slug`, `posted_by`, `date`) VALUES
(1, 'Cristiano Ronaldo Returns to Manchester United', '<img class=\"w3-image\" src=\"https://assets.manutd.com/AssetPicker/images/0/0/15/128/1016013/CR_Home_21630596121972_large.jpg\" alt=\"\"><p>\r\n\r\nManchester United is delighted to confirm the signing of Cristiano Ronaldo on a two-year contract with the option to extend for a further year, subject to international clearance.\r\n\r\n\r\nCristiano, a five-time Ballon D’or winner, has so far won over 30 major trophies during his career, including five UEFA Champions League titles, four FIFA Club World Cups, seven league titles in England, Spain and Italy, and the UEFA European Championship for his native Portugal. Cristiano is the first player to have won league titles in England, Spain and Italy. He was also the highest goalscorer in last season’s Serie A and won the golden boot at this year’s European Championship. In his first spell for Manchester United, he scored 118 goals in 292 games.</p><p>Cristiano Ronaldo said:\r\n\r\n“Manchester United is a club that has always had a special place in my heart, and I have been overwhelmed by all the messages I have received since the announcement on Friday. I cannot wait to play at Old Trafford in front of a full stadium and see all the fans again. I\'m looking forward to joining up with the team after the international games, and I hope we have a very successful season ahead.”</p><p>Ole Gunnar Solskjaer said:\r\n\r\n“You run out of words to describe Cristiano. He is not only a marvellous player, but also a great human being. To have the desire and the ability to play at the top level for such a long period requires a very special person. I have no doubt that he will continue to impress us all and his experience will be so vital for the younger players in the squad. Ronaldo’s return demonstrates the unique appeal of this club and I am absolutely delighted he is coming home to where it all started.” </p>  ', 'cristiano-ronaldo-returns-to-manchester-united', 'Admin', '2022-02-11 15:50:41'),
(2, 'Leo Messi signs for Paris Saint-Germain', '<p style=\"text-align: center; \"><img src=\"https://images.psg.media/media/209006/leo-cp.jpg?anchor=center&amp;mode=crop&amp;width=800&amp;height=500&amp;quality=80\" alt=\"\"><br></p><p><strong>Paris Saint-Germain is delighted to announce the signing of Leo Messi on a two-year contract with an option of a third year.\r\n\r\nThe six-time Ballon d’Or winner is justifiably considered a legend of the game and a true inspiration for those of all ages inside and outside football.</strong></p><p>The signing of Leo reinforces Paris Saint-Germain’s aspirations as well as providing the club’s loyal fans with not only an exceptionally talented squad, but also moments of incredible football in the coming years.</p><p>Leo Messi said: “I am excited to begin a new chapter of my career at Paris Saint-Germain. Everything about the club matches my football ambitions. I know how talented the squad and the coaching staff are here. I am determined to help build something special for the club and the fans, and I am looking forward to stepping out onto the pitch at the Parc des Princes.”</p><p>Nasser Al-Khelaifi, Chairman and CEO of Paris Saint-Germain said: “I am delighted that Lionel Messi has chosen to join Paris Saint-Germain and we are proud to welcome him and his family to Paris. He has made no secret of his desire to continue competing at the very highest level and winning trophies, and naturally our ambition as a club is to do the same. The addition of Leo to our world class squad continues a very strategic and successful transfer window for the club. Led by our outstanding coach and his staff, I look forward to the team making history together for our fans all around the world.” </p>  ', 'leo-messi-signs-for-paris-saint-germain', 'Admin', '2022-02-11 15:50:41'),
(3, 'Apple Introduces iPhone 13 and iPhone 13 Mini', '<p style=\"text-align: center; \"><img src=\"https://www.apple.com/newsroom/images/product/iphone/geo/Apple_iphone13_hero_geo_09142021_inline.jpg.large.jpg\" alt=\"\"><strong><br></strong></p><p><strong>CUPERTINO, CALIFORNIA</strong> Apple today introduced iPhone 13 and iPhone 13 mini, the next generation of the world’s best smartphone, featuring a beautiful design with sleek flat edges in five gorgeous new colours. Both models feature major innovations, including the most advanced dual-camera system ever on iPhone — with a new Wide camera with bigger pixels and sensor-shift optical image stabilisation (OIS) offering improvements in low-light photos and videos, a new way to personalise the camera with Photographic Styles, and Cinematic mode, which brings a new dimension to video storytelling. iPhone 13 and iPhone 13 mini also boast super-fast performance and power efficiency with A15 Bionic, longer battery life, a brighter Super Retina XDR display that brings content to life, incredible durability with the Ceramic Shield front cover, double the entry-level storage at 128GB, an industry-leading IP68 rating for water resistance, and an advanced 5G experience.</p>', 'apple-introduces-iphone-13-and-iphone-13-mini', 'admin', '2022-02-11 15:50:41'),
(4, 'Apple Reveals Apple Watch Series 7', '<img src=\"https://www.apple.com/newsroom/images/product/watch/standard/Apple_watch-series7_hero_09142021_big.jpg.large.jpg\" alt=\"\"><p><strong>\r\nCUPERTINO, CALIFORNIA</strong> Apple today announced Apple Watch Series 7, featuring a reengineered Always-On Retina display with significantly more screen area and thinner borders, making it the largest and most advanced display ever. The narrower borders allow the display to maximise screen area, while minimally changing the dimensions of the watch itself. The design of Apple Watch Series 7 is refined with softer, more rounded corners, and the display has a unique refractive edge that makes full-screen watch faces and apps appear to seamlessly connect with the curvature of the case. Apple Watch Series 7 also features a user interface optimised for the larger display, offering greater readability and ease of use, plus two unique watch faces — Contour and Modular Duo — designed specifically for the new device. With the improvements to the display, users benefit from the same all-day 18-hour battery life,1 now complemented by 33 percent faster charging.</p>', 'apple-reveals-apple-watch-series-7', 'admin', '2022-02-11 15:50:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `page_name` (`page_name`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
