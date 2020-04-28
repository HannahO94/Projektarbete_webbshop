-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 28 apr 2020 kl 18:03
-- Serverversion: 10.4.11-MariaDB
-- PHP-version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `webshop`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `webshop_orders`
--

CREATE TABLE `webshop_orders` (
  `orderid` int(11) NOT NULL,
  `orderdate` datetime NOT NULL DEFAULT current_timestamp(),
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `street` varchar(50) NOT NULL,
  `zip` varchar(6) NOT NULL,
  `city` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `products` varchar(5000) NOT NULL,
  `totalprice` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `webshop_orders`
--

INSERT INTO `webshop_orders` (`orderid`, `orderdate`, `name`, `email`, `phone`, `street`, `zip`, `city`, `status`, `products`, `totalprice`) VALUES
(1, '2020-04-25 00:00:00', 'hannah', 'hannah@email.se', '101111111', 'hejgatan 3', '15433', 'stockholm', 1, '', ''),
(6, '2020-04-25 18:57:58', 'Magdalena Sjökvist', 'magda@gmail.com', '738483921', 'Testgatan 23', '11002', 'Stockholm', 1, '', ''),
(26, '2020-04-27 16:28:28', 'hej', 'hannah@mail.se', '0700000000', 'kulvägen 1', '11212', 'stockholm', 1, '', ''),
(42, '2020-04-28 08:17:35', 'hannah', 'hannah_olsson94@hotmail.com', '0701234567', 'kulvägen 1', '11212', 'stockholm', 1, '', ''),
(43, '2020-04-28 08:18:46', 'hannah', 'hannah_olsson94@hotmail.com', '0701234567', 'kulvägen 1', '11215', 'skå', 1, '', ''),
(44, '2020-04-28 08:20:11', 'Mattias', 'Mattias@mail.se', '0701345678', 'mysvägen 1', '11111', 'stockholm', 1, '', ''),
(45, '2020-04-28 08:22:42', 'hannah', 'hannah@mail.se', '0701345678', 'hejvägen 1', '11215', 'solna', 1, '', ''),
(46, '2020-04-28 09:27:03', 'hannah', 'hannah_olsson94@hotmail.com', '0700000000', 'kulvägen 1', '11215', 'solna', 1, '', ''),
(47, '2020-04-28 15:59:15', 'hej', 'hannah_olsson94@hotmail.com', '0701234567', 'hejvägen 1', '11212', 'solna', 1, '', ''),
(48, '2020-04-28 16:00:02', 'hej', 'hannah_olsson94@hotmail.com', '0701234567', 'hejvägen 1', '11212', 'solna', 1, '[{\"cartQty\":\"1\",\"title\":\"Carcassonne\",\"price\":\"285\",\"outletprice\":\"257\",\"quantity\":\"5\",\"productid\":\"11\"},{\"cartQty\":\"1\",\"title\":\"Risk\",\"price\":\"429\",\"quantity\":\"10\",\"productid\":\"12\"}]', ''),
(49, '2020-04-28 16:00:36', 'hej', 'hannah_olsson94@hotmail.com', '0701234567', 'hejvägen 1', '11212', 'solna', 1, '[{\"cartQty\":\"1\",\"title\":\"Carcassonne\",\"price\":\"285\",\"outletprice\":\"257\",\"quantity\":\"5\",\"productid\":\"11\"},{\"cartQty\":\"1\",\"title\":\"Risk\",\"price\":\"429\",\"quantity\":\"10\",\"productid\":\"12\"}]', ''),
(50, '2020-04-28 16:02:07', 'hannah', 'Mattias@mail.se', '0701234567', 'mysvägen 1', '11215', 'solna', 1, '[{\"cartQty\":\"1\",\"title\":\"Råttfällan\",\"price\":\"129\",\"quantity\":\"50\",\"productid\":\"1\"},{\"cartQty\":\"1\",\"title\":\"Labyrint\",\"price\":\"189\",\"quantity\":\"30\",\"productid\":\"2\"},{\"cartQty\":\"1\",\"title\":\"Twister\",\"price\":\"249\",\"quantity\":\"80\",\"productid\":\"3\"}]', ''),
(51, '2020-04-28 16:12:03', 'Mattias', 'hannah_olsson94@hotmail.com', '0701345678', 'kulvägen 1', '11111', 'solna', 1, '[{\"cartQty\":\"1\",\"title\":\"Carcassonne\",\"price\":\"285\",\"outletprice\":\"257\",\"quantity\":\"5\",\"productid\":\"11\"}]', ''),
(52, '2020-04-28 16:18:58', 'hannah', 'hannah@mail.se', '0700000000', 'kulvägen 1', '11111', 'skå', 1, '[{\"cartQty\":\"1\",\"title\":\"Carcassonne\",\"price\":\"285\",\"outletprice\":\"257\",\"quantity\":\"5\",\"productid\":\"11\"}]', ''),
(53, '2020-04-28 16:19:41', 'hej', 'hannah_olsson94@hotmail.com', '0700000000', 'kulvägen 1', '11215', 'solna', 1, '[{\"cartQty\":\"1\",\"title\":\"Ticket to ride\",\"price\":\"345\",\"quantity\":\"8\",\"productid\":\"10\"}]', ''),
(54, '2020-04-28 16:24:26', 'hannah', 'hannah_olsson94@hotmail.com', '0701234567', 'mysvägen 1', '11215', 'skå', 1, '[{\"cartQty\":\"1\",\"title\":\"Det stora djungelloppet\",\"price\":\"199\",\"quantity\":\"3\",\"productid\":\"4\"}]', ''),
(55, '2020-04-28 16:29:51', 'hej', 'Mattias@mail.se', '0700000000', 'hejvägen 1', '11111', 'skå', 1, '[{\"cartQty\":3,\"title\":\"Labyrint\",\"price\":\"189\",\"quantity\":\"30\",\"productid\":\"2\"},{\"cartQty\":\"1\",\"title\":\"Twister\",\"price\":\"249\",\"quantity\":\"80\",\"productid\":\"3\"}]', '');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `webshop_orders`
--
ALTER TABLE `webshop_orders`
  ADD PRIMARY KEY (`orderid`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `webshop_orders`
--
ALTER TABLE `webshop_orders`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
