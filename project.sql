-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2024 at 12:42 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(4, 'Climbers'),
(5, 'Creepers'),
(12, 'EverGreen'),
(1, 'Herbs'),
(7, 'Indoor Plants'),
(8, 'Outdoor Plants'),
(11, 'Seasonal'),
(2, 'Shrubs'),
(9, 'Tress');

-- --------------------------------------------------------

--
-- Table structure for table `favourites`
--

CREATE TABLE `favourites` (
  `fav_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `plant_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favourites`
--

INSERT INTO `favourites` (`fav_id`, `cust_id`, `plant_id`, `quantity`) VALUES
(6, 7, 8, NULL),
(7, 7, 8, 1),
(8, 7, 8, 1),
(9, 7, 8, 1),
(10, 7, 3, 3),
(11, 7, 3, 2),
(12, 7, 1, 5),
(13, 8, 1, 2),
(14, 7, 1, 1),
(15, 7, 1, 5),
(16, 7, 1, 2),
(17, 8, 10, 2),
(18, 7, 10, 4);

-- --------------------------------------------------------

--
-- Table structure for table `plant`
--

CREATE TABLE `plant` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` float NOT NULL,
  `Category_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plant`
--

INSERT INTO `plant` (`id`, `name`, `description`, `price`, `Category_id`, `image`) VALUES
(1, 'Basil', 'Basil is an annual herbaceous plant in the mint family Lamiaceae. It has square stems with leaves that grow on opposite sides, and the leaves are rounded, slightly cupped, and curve to form at point at the tip. The leaves are generally light green, although some varieties have reddish or purplish leaves.', 15, 1, 'uploads/plant_6732b7db498e81.62753494.jpeg'),
(2, 'Pothos', 'Pothos plants, native to the jungles of Malaysia, are highly adaptable, glossy-leafed plants with heart-shaped leaves. They are easy to care for and grow almost anywhere, the perfect houseplant for beginners.', 17, 7, 'uploads/plant_6732b8df655516.78755154.jpeg'),
(3, 'Conifer Shrubs', 'Conifers are defined as a type of tree that produces cones. Typically evergreen. they all have needles or scale-like leaves, and there are a few deciduous conifers out there, namely larch or Larix spp. or dawn redwood, Metasequoia glyptostroboides.', 20, 2, 'uploads/plant_6732bb424809a3.28270741.jpeg'),
(5, 'Levender', 'Lavandula is a genus of 47 known species of perennial flowering plants in the mints family, Lamiaceae. It is native to the Old World, primarily found across the drier, warmer regions of mainland Eurasia, with an affinity for maritime breezes', 10.99, 12, 'uploads/lovandar.webp'),
(7, 'strawberry ', 'Arbutus unedo, commonly known as strawberry tree, is an evergreen shrub or small tree in the family Ericaceae, native to the Mediterranean Basin and Western Europe. The tree is well known for its fruits, the arbutus berry, which bear some resemblance to the strawberry, hence the common name strawberry tree', 35, 9, 'uploads/plant_673acf0cbeda53.59631252.jpeg'),
(8, 'Apple', 'An apple is a round, edible fruit produced by an apple tree (Malus spp., among them the domestic or orchard apple; Malus domestica).', 57, 9, 'uploads/plant_673ad0781fe9a7.57307169.jpeg'),
(10, 'Peppermint', 'The peppermint plant and its many parts are used throughout the world in many different ways and for diverse purposes. The production of peppermint oil by distillation of the cultivated herb is an extensive industry in the United States and around the world. Cultivation of the plant is required because the plants found in the wild are not suitable for the distillation process and the cultivated plants contain much more and better quality oil. The United States is the leading producer of peppermint oil in the world, with Michigan, California, Washington, Oregon, Idaho, Indiana, and Wisconsin leading the way. Peppermint oil is used as a flavouring agent in many different products including decongestants, mouthwashes, chewing gum, toothpastes, and other mint flavoured candies and breath-freshening products. Peppermint oil can cause burning and gastrointestinal upset in some people. Peppermint tea, made from the dry leaves of the peppermint plant, is considered safer than peppermint oil for regular consumption. Peppermint tea has antiseptic properties and is considered a stimulant. It is effective in treating digestive pains caused by gas, colic, gallstones, gingivitis, irritable bowel syndrome, morning sickness, headaches, sore throats, common colds, fevers, insomnia, nervous tension, and it may also increase flow of bile from the gallbladder.', 50, 11, 'uploads/plant_67465a2cd3ed17.27032434.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `plant_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL CHECK (`quantity` >= 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `plant_id`, `quantity`) VALUES
(2, 8, 0),
(4, 3, 35),
(5, 1, 45),
(6, 10, 24);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `Login_id` int(11) NOT NULL,
  `Cust_id` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `password` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`Login_id`, `Cust_id`, `Username`, `password`) VALUES
(3, 7, 'abc', '$2y$10$eqkKSw2zbax4MlYDnEQmdukFdm037sQpYxSoDWCeBBdfrWhhSkfZy'),
(4, 8, 'Ammu', '$2y$10$VF4wec6UBQGzeQ4LSag4r.lbX2ilksoiT7D8AeKnhpWDF.xd.Heiq');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registration`
--

CREATE TABLE `tbl_registration` (
  `Cust_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_registration`
--

INSERT INTO `tbl_registration` (`Cust_id`, `email`, `phone`) VALUES
(7, 'a@gmail.com', 2147483647),
(8, 'ammu@gmail.com', 1234567890);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`fav_id`),
  ADD KEY `cust_id` (`cust_id`),
  ADD KEY `plant_id` (`plant_id`);

--
-- Indexes for table `plant`
--
ALTER TABLE `plant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Category_id` (`Category_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plant_id` (`plant_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`Login_id`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD KEY `Cust_id` (`Cust_id`);

--
-- Indexes for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  ADD PRIMARY KEY (`Cust_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `favourites`
--
ALTER TABLE `favourites`
  MODIFY `fav_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `plant`
--
ALTER TABLE `plant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `Login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  MODIFY `Cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `favourites_ibfk_1` FOREIGN KEY (`cust_id`) REFERENCES `tbl_registration` (`Cust_id`),
  ADD CONSTRAINT `favourites_ibfk_2` FOREIGN KEY (`plant_id`) REFERENCES `plant` (`id`);

--
-- Constraints for table `plant`
--
ALTER TABLE `plant`
  ADD CONSTRAINT `plant_ibfk_1` FOREIGN KEY (`Category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`plant_id`) REFERENCES `plant` (`id`);

--
-- Constraints for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD CONSTRAINT `tbl_login_ibfk_1` FOREIGN KEY (`Cust_id`) REFERENCES `tbl_registration` (`Cust_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
