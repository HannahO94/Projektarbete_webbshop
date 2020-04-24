-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 24 apr 2020 kl 09:22
-- Serverversion: 10.4.11-MariaDB
-- PHP-version: 7.4.2

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
-- Tabellstruktur `webshop_categories`
--

CREATE TABLE `webshop_categories` (
  `categoryid` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `webshop_categories`
--

INSERT INTO `webshop_categories` (`categoryid`, `category`, `image`) VALUES
(1, 'familjespel', 'familjespel.jpg'),
(2, 'barnspel', 'barnspel.jpg'),
(3, 'strategispel', 'strategispel.jpg'),
(4, 'partyspel', 'partyspel.jpg'),
(13, 'brädspel', '');

-- --------------------------------------------------------

--
-- Tabellstruktur `webshop_orderinfo`
--

CREATE TABLE `webshop_orderinfo` (
  `orderid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `street` varchar(50) NOT NULL,
  `zip` varchar(6) NOT NULL,
  `city` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `webshop_orderinfo`
--

INSERT INTO `webshop_orderinfo` (`orderid`, `name`, `email`, `phone`, `street`, `zip`, `city`, `status`) VALUES
(1, 'hannah', 'hannah@email.se', '0101111111', 'hejgatan 3', '15433', 'stockholm', 1);

-- --------------------------------------------------------

--
-- Tabellstruktur `webshop_orderproducts`
--

CREATE TABLE `webshop_orderproducts` (
  `orderproductid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `webshop_orderproducts`
--

INSERT INTO `webshop_orderproducts` (`orderproductid`, `orderid`, `productid`, `quantity`) VALUES
(1, 1, 15, 1),
(3, 1, 3, 1);

-- --------------------------------------------------------

--
-- Tabellstruktur `webshop_productimages`
--

CREATE TABLE `webshop_productimages` (
  `imageid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellstruktur `webshop_products`
--

CREATE TABLE `webshop_products` (
  `productid` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `quantity` int(11) NOT NULL,
  `productimg` varchar(1000) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `webshop_products`
--

INSERT INTO `webshop_products` (`productid`, `categoryid`, `title`, `description`, `price`, `quantity`, `productimg`, `date`) VALUES
(1, 2, 'Råttfällan', 'Ett fingerfärdigt plockspel för hela familjen! Först spänns spelpjäserna fast i råttfällan, sedan gäller det att plocka upp så många som möjligt utan att fällan slår igen.', '129', 50, '', '2020-04-23 00:00:00'),
(2, 2, 'Labyrint', 'Nu är det möjligt att svara på Daidalos utmaning på hemmaplan. Labyrintspelet bjuder på fyra utmaningar var din uppgift är att samla livspuckar. Undvik att bli slajmad av Taurus i labyrinten, ta dig över slajmsjön, para ihop korten i minnesspelet och var snabbast i byggutmaningen. Spelaren med flest livspuckar i behåll efter utmaningarna vinner spelet.', '189', 30, '', '2020-04-15 00:00:00'),
(3, 2, 'Twister', 'Din medspelare snurrar på hjulet och du gör det som hjulet visar, t ex sätt höger fot på den blå cirkeln eller vänster fot på den gröna cirkeln. Akta så du inte slår knut på dig själv! Den som lyckas stå upp längst vinner.', '249', 80, '', '2020-04-15 00:00:00'),
(4, 2, 'Det stora djungelloppet', 'Djungelns vildaste kapplöpning börjar snart! Slå tre tärningar och flytta antingen din elefant, din tiger eller din apa. Du måste få alla djur över mållinjen först av alla för att vinna den vilda jakten genom djungeln! Ett spel med högt tempo för barn.', '199', 3, '', '2020-04-23 00:00:00'),
(5, 1, 'Alfapet', 'Spelglädjen växer med ordförrådet. Det är inte vem som helst som tar hem segern i Alfapet! Efter hand som spelplanen fylls, blir det allt klurigare att bilda nya ord. Det är nu som Alfapetsspelarens uthållighet, ordförråd och kreativitet ställs på prov. Tänk till, spela ut och ta poäng!', '275', 0, '', '2020-03-20 00:00:00'),
(6, 1, 'Blokus', 'Blokus är ett enkelt och snabbspelat familjespel men även ett där strategifantasten får något att bita i. Placera ut dina enfärgade brickor på den trånga spelplanen och försök få ut fler än dina motspelare, så att du slipper minuspoängen när spelplanen inte längre rymmer era brickor!', '185', 0, '', '2020-03-20 00:00:00'),
(7, 1, 'Sequence', 'Sequence är ett rktigt bra familjespel med ganska mycket tur och med lagom mycket strategi utan att bli krångligt. Sequence är ett lagspel för 2 eller 3 lag med 1 till 4 personer i varje lag. Dvs man kan spela 2-12 personer men inte 5, 7 eller 11 personer.', '249', 0, '', '2020-03-25 00:00:00'),
(8, 1, 'Alias', 'För smarta pratkvarnar. Alias är ett ordförklaringsspel för vuxna och spelas i tvåmannalag. Spelet går ut på att förklara ord inom vissa gränser. Med hjälp av synonymer, motsatser, antydningar mm ska man förklara så att lagkamraten förstår och gissar så många ord som möjligt.', '225', 0, '', '2020-03-20 00:00:00'),
(9, 3, 'Catan', 'Catan är ett av de mest populära spelen de senaste 10 åren. I Catan bygger spelarna vägar, byar och städer på ön Catan. Genom att bygga på ett smart sätt försöker man få sin bosättning att växa fortare än de andra spelarnas. En viktig del av spelet är byteshandeln mellan spelarna.', '359', 10, '', '2020-03-20 00:00:00'),
(10, 3, 'Ticket to ride', 'Ticket to Ride: Europe handlar om att resa mellan städer och åka så långa sträckor som möjligt för att generera ett större antal poäng än vad kortare sträckor ger, men samtidigt är det också just de längre sträckorna som är svåra att lyckas genomföra.', '345', 8, '', '2020-03-20 00:00:00'),
(11, 3, 'Carcassonne', 'I Carcassonne bygger spelarna upp små landskap med spelbrickor av öppna fält, vägar, kloster och städer som de alla försöker kontrollera fram till dess att den sista spelbrickan är dragen och placerad på den ständigt växande spelplanen.', '285', 5, '', '2020-02-20 00:00:00'),
(12, 3, 'Risk', 'Det klassiska spelet om världsherravälde har varit det ledande militärstrategispelet sedan 1959! För att dominera världen ska du erövra samtliga 42 territorier. Med nya Risk får du tre versioner av spelet i samma förpackning. En för nya spelare, en för riskveteraner och en för 2 spelare.', '429', 10, '', '2020-03-20 00:00:00'),
(13, 3, 'Terraforming Mars', 'Stora korporationer har påbörjat omvandla Mars yta för att kunna skapa en beboelig miljö för mänskligheten att expandera till. Varje spelare är ett sådant företag som genom sina handlingar bidrar till att höja temperaturen på Mars, öka syrgasnivån och bilda stora oceaner.', '250', 30, '', '2020-03-20 00:00:00'),
(14, 4, 'Speak out', 'Var beredd att vika dig dubbel av skratt med det här löjliga munstyckespelet! Speak Out samlar vänner och familj i ett gapskratt när spelarna försöker säga olika fraser medan de har på sig ett munstycke som hindrar dem att stänga munnen.', '249', 40, '', '2020-02-20 00:00:00'),
(15, 4, 'Exploding kittens', 'For people who are into kittens and explosions and laser beams and sometimes goats.', '179', 15, '', '2020-02-20 00:00:00'),
(16, 4, 'Absolut överens', 'Du och din lagkamrat ska svara på roliga frågor, utan att visa svaren för varandra. Flytta sedan ett steg framåt för varje svar ni är överens om.', '255', 60, '', '2020-02-20 00:00:00'),
(17, 4, 'Cards against humanity', 'Cards Against Humanity is a party game for horrible people. Each round, one player asks a question from a black card, and everyone else answers with their funniest white card.', '329', 10, '', '2020-02-20 00:00:00'),
(18, 4, 'Det borde man ju veta', 'Ett spel om allt det där man faktiskt borde veta.. Det borde man ju veta! är ett medryckande och underhållande frågespel med över 400 frågor om sånt man faktiskt borde veta.', '165', 35, '', '2020-03-20 00:00:00'),
(48, 1, 'Skippo', 'Roligare än Uno', '79', 20, 'a:1:{i:0;s:0:\"\";}', '2020-04-23 00:00:00');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `webshop_categories`
--
ALTER TABLE `webshop_categories`
  ADD PRIMARY KEY (`categoryid`);

--
-- Index för tabell `webshop_orderinfo`
--
ALTER TABLE `webshop_orderinfo`
  ADD PRIMARY KEY (`orderid`);

--
-- Index för tabell `webshop_orderproducts`
--
ALTER TABLE `webshop_orderproducts`
  ADD PRIMARY KEY (`orderproductid`),
  ADD KEY `productid` (`productid`),
  ADD KEY `orderid` (`orderid`);

--
-- Index för tabell `webshop_productimages`
--
ALTER TABLE `webshop_productimages`
  ADD PRIMARY KEY (`imageid`),
  ADD KEY `Referensintegritet` (`productid`) USING BTREE;

--
-- Index för tabell `webshop_products`
--
ALTER TABLE `webshop_products`
  ADD PRIMARY KEY (`productid`),
  ADD KEY `Referensintegritet` (`categoryid`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `webshop_categories`
--
ALTER TABLE `webshop_categories`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT för tabell `webshop_orderinfo`
--
ALTER TABLE `webshop_orderinfo`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT för tabell `webshop_orderproducts`
--
ALTER TABLE `webshop_orderproducts`
  MODIFY `orderproductid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT för tabell `webshop_productimages`
--
ALTER TABLE `webshop_productimages`
  MODIFY `imageid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT för tabell `webshop_products`
--
ALTER TABLE `webshop_products`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `webshop_orderproducts`
--
ALTER TABLE `webshop_orderproducts`
  ADD CONSTRAINT `webshop_orderproducts_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `webshop_products` (`productid`),
  ADD CONSTRAINT `webshop_orderproducts_ibfk_2` FOREIGN KEY (`orderid`) REFERENCES `webshop_orderinfo` (`orderid`);

--
-- Restriktioner för tabell `webshop_productimages`
--
ALTER TABLE `webshop_productimages`
  ADD CONSTRAINT `webshop_productimages_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `webshop_products` (`productid`);

--
-- Restriktioner för tabell `webshop_products`
--
ALTER TABLE `webshop_products`
  ADD CONSTRAINT `Referensintegritet` FOREIGN KEY (`categoryid`) REFERENCES `webshop_categories` (`categoryid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
