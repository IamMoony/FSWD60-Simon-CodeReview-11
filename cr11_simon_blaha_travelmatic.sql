-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2019 at 06:46 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr11_simon_blaha_travelmatic`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventID` int(11) NOT NULL,
  `eventName` varchar(55) NOT NULL,
  `eventPrice` int(11) NOT NULL,
  `eventDate` date NOT NULL,
  `eventTime` time NOT NULL,
  `eventWebAddress` varchar(55) NOT NULL,
  `fk_locationID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventID`, `eventName`, `eventPrice`, `eventDate`, `eventTime`, `eventWebAddress`, `fk_locationID`) VALUES
(1, 'Lenny Kravitz', 60, '2019-04-04', '16:00:00', 'https://www.lennykravitz.com', 9),
(2, 'Tomorrowland', 100, '2019-03-12', '12:00:00', 'https://www.tomorrowland.com', 10),
(3, 'Donauinselfest', 0, '2019-06-13', '10:00:00', 'https://www.donauinselfest.at', 11),
(4, 'Alpaka Expo', 20, '2019-05-08', '15:00:00', 'https://www.alpakaexpo.at', 12);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `locationID` int(11) NOT NULL,
  `locationAddress` varchar(55) NOT NULL,
  `locationZIPCode` int(11) NOT NULL,
  `locationCity` varchar(55) NOT NULL,
  `locationImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`locationID`, `locationAddress`, `locationZIPCode`, `locationCity`, `locationImage`) VALUES
(1, '5 avenue Anatole', 75007, 'Paris, France', 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/85/Tour_Eiffel_Wikimedia_Commons_%28cropped%29.jpg/240px-Tour_Eiffel_Wikimedia_Commons_%28cropped%29.jpg'),
(2, 'Stephansplatz 3', 1010, 'Vienna, Austria', 'https://www.tripsavvy.com/thmb/imhRpoqgeU6ElN81_yKlbfT-45o=/960x0/filters:no_upscale():max_bytes(150000):strip_icc()/GettyImages-801378096-5b5f635846e0fb0050b8f8b0.jpg'),
(3, 'Foreststreet', 101051, 'Yucatan, Mexico', 'https://d0bb9bb29a4a152db5cb-2fd7b88453b021537812277c8c433fcb.ssl.cf1.rackcdn.com/1030/1/large.jpg'),
(4, 'Theater District', 10036, 'New York, USA', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRdWLOLuhEs8sAZLHTCfu4CLSkJYNbIdVSpfPYbL0OpsQ0aZnZQHQ'),
(5, 'Stephansplatz 12', 1010, 'Vienna, Austria', 'https://media-cdn.tripadvisor.com/media/photo-s/07/0a/2f/ae/do-co-hotel.jpg'),
(6, 'Schubertring 13', 1010, 'Vienna, Austria', 'https://thumbs.vienna.at/?url=https://www.vienna.at/2016/09/FRIDAYS_Terrasse-e1473684517646.jpg&w=1324&h=993&crop=1'),
(7, 'Professor Tulpplein 1', 1018, 'Amsterdam, Netherlands', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSVq_pZOR9Q8-dV-d9bUSdNnf1Wxc5Cqu7Up1GmaoKlekS5Xq2FdA'),
(8, 'Prater 116', 1020, 'Vienna, Austria', 'https://www.heute.at/dyim/074c97/M600,1000/images/content/4/8/6/48623957/3/topelement.jpg'),
(9, 'Roland-Reiner-Platz 1', 1150, 'Vienna, Austria', 'https://www.rollingstone.com/wp-content/uploads/2018/09/2018-121_Lenny_Kravitz0381_3b.jpg?crop=900:600&width=440'),
(10, 'Kapelstraat 83', 2850, 'Boom, Belgium', 'https://cdn-images-1.medium.com/max/1200/1*5bE-E20GfFcjClQFFbFmEQ.jpeg'),
(11, 'Donauinsel', 1220, 'Vienna, Austria', 'https://tv.orf.at/highlights/orf3/donauinselfest_116~_v-body__16__9_-8356d68febb302a69d0d38655ca9b89002ae9eee.jpg'),
(12, 'Messeturm, Messeplatz 1', 8010, 'Graz, Austria', 'https://www.alpaka-zv.at/wp-content/uploads/2017/06/fb-alpaka-zuchtverband-1200x630.png');

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `placeID` int(11) NOT NULL,
  `placeName` varchar(55) NOT NULL,
  `placeType` varchar(55) NOT NULL,
  `placeDescr` text NOT NULL,
  `placeWebAddress` varchar(55) NOT NULL,
  `fk_locationID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`placeID`, `placeName`, `placeType`, `placeDescr`, `placeWebAddress`, `fk_locationID`) VALUES
(2, 'Eiffel Tower', 'Must see', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 'https://www.toureiffel.paris', 1),
(3, 'St. Stephens Cathedral', 'Church', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 'www.stephansdom.at', 2),
(4, 'Cichen Itza', 'Must see', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 'https://www.chichenitza.com/', 3),
(5, 'Broadway Theatre', 'Theatre', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 'https://www.broadway.com', 4);

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `restaurantID` int(11) NOT NULL,
  `restaurantName` varchar(55) NOT NULL,
  `restaurantTel` varchar(55) NOT NULL,
  `restaurantDescr` text NOT NULL,
  `restaurantType` varchar(55) NOT NULL,
  `restaurantWebAddress` varchar(55) NOT NULL,
  `fk_locationID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`restaurantID`, `restaurantName`, `restaurantTel`, `restaurantDescr`, `restaurantType`, `restaurantWebAddress`, `fk_locationID`) VALUES
(1, 'DO & CO Restaurant', '01 5353969', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 'Luxury', 'www.docohotel.com', 5),
(2, 'TGI Fidays', '01 53539691', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 'Fast Food', 'https://www.tgifridays.at', 6),
(3, 'La Rive', '+31 20 520 3264', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 'Upper Class', 'https://www.restaurantlarive.nl', 7),
(4, 'Schweizerhaus', '01 7148995', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.', 'Traditional Austrian Food', 'https://www.schweizerhaus.at', 8);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `userName` varchar(55) NOT NULL,
  `userEmail` varchar(55) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `userRule` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userName`, `userEmail`, `userPassword`, `userRule`) VALUES
(1, 'admin', 'admin@domain.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'admin'),
(2, 'user', 'user@domain.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'user'),
(3, 'test', 'test@test.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eventID`),
  ADD KEY `fk_locationID` (`fk_locationID`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`locationID`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`placeID`),
  ADD KEY `fk_locationID` (`fk_locationID`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`restaurantID`),
  ADD KEY `fk_locationID` (`fk_locationID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `locationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `placeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `restaurantID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`fk_locationID`) REFERENCES `location` (`locationID`) ON UPDATE CASCADE;

--
-- Constraints for table `places`
--
ALTER TABLE `places`
  ADD CONSTRAINT `places_ibfk_1` FOREIGN KEY (`fk_locationID`) REFERENCES `location` (`locationID`) ON UPDATE CASCADE;

--
-- Constraints for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD CONSTRAINT `restaurants_ibfk_1` FOREIGN KEY (`fk_locationID`) REFERENCES `location` (`locationID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
