-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 30 apr 2020 kl 15:00
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
-- Tabellstruktur `webshop_orderscomplete`
--

CREATE TABLE `webshop_orderscomplete` (
  `orderid` int(11) NOT NULL,
  `orderdate` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `street` varchar(50) NOT NULL,
  `zip` varchar(6) NOT NULL,
  `city` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `products` varchar(5000) NOT NULL,
  `totalprice` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `webshop_orderscomplete`
--

INSERT INTO `webshop_orderscomplete` (`orderid`, `orderdate`, `name`, `email`, `phone`, `street`, `zip`, `city`, `status`, `products`, `totalprice`) VALUES
(54, '2020-04-28 16:24:26', 'hannah', 'hannah_olsson94@hotmail.com', '0701234567', 'mysvägen 1', '11215', 'Hässelby', 3, '[{\"cartQty\":\"1\",\"title\":\"Det stora djungelloppet\",\"price\":\"199\",\"quantity\":\"3\",\"productid\":\"4\"}]', ''),
(55, '2020-04-28 16:29:51', 'hej', 'Mattias@mail.se', '0700000000', 'hejvägen 1', '11111', 'bromma', 3, '[{\"cartQty\":3,\"title\":\"Labyrint\",\"price\":\"189\",\"quantity\":\"30\",\"productid\":\"2\"},{\"cartQty\":\"1\",\"title\":\"Twister\",\"price\":\"249\",\"quantity\":\"80\",\"productid\":\"3\"}]', ''),
(56, '2020-04-28 18:08:56', 'hannah', 'Mattias@mail.se', '0700000000', 'hejvägen 1', '31212', 'Kalmar', 3, '[{\"cartQty\":\"1\",\"title\":\"Råttfällan\",\"price\":\"129\",\"quantity\":\"50\",\"productid\":\"1\"},{\"cartQty\":\"1\",\"title\":\"Labyrint\",\"price\":\"189\",\"quantity\":\"30\",\"productid\":\"2\"},{\"cartQty\":\"1\",\"title\":\"Skippo\",\"price\":\"79\",\"quantity\":\"20\",\"productid\":\"48\"},{\"cartQty\":\"1\",\"title\":\"Labyrint\",\"price\":\"189\",\"quantity\":\"30\",\"productid\":\"2\"}]', ''),
(60, '2020-04-29 09:49:45', 'hannah', 'hannah@mail.se', '0701234567', 'hejvägen 1', '11111', 'stockholm', 3, '[{\"cartQty\":\"1\",\"title\":\"Absolut överens\",\"price\":\"255\",\"outletprice\":\"230\",\"quantity\":\"60\",\"productid\":\"16\"},{\"cartQty\":\"1\",\"title\":\"Exploding kittens\",\"price\":\"179\",\"outletprice\":\"162\",\"quantity\":\"15\",\"productid\":\"15\"}]', '');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `webshop_orderscomplete`
--
ALTER TABLE `webshop_orderscomplete`
  ADD PRIMARY KEY (`orderid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
