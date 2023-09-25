-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 25, 2023 at 11:42 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `products`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_category`
--

CREATE TABLE `table_category` (
  `ProductCategory` varchar(50) NOT NULL,
  `ID` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `table_category`
--

INSERT INTO `table_category` (`ProductCategory`, `ID`) VALUES
('Drink', 1),
('Dessert', 2),
('Pasta', 3),
('Bread', 4),
('Appetizer', 13),
('Snacks', 15);

-- --------------------------------------------------------

--
-- Table structure for table `table_products`
--

CREATE TABLE `table_products` (
  `ID` int NOT NULL,
  `ProductName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ProductDescription` varchar(16000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ProductCategory` int NOT NULL,
  `ProductQuantity` int NOT NULL,
  `ProductPrice` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `table_products`
--

INSERT INTO `table_products` (`ID`, `ProductName`, `ProductDescription`, `ProductCategory`, `ProductQuantity`, `ProductPrice`) VALUES
(12, 'Coke', 'Soda', 1, 5, '20'),
(13, 'Spaghetti', 'Sweet', 3, 3, '40'),
(17, 'Nova', ' Country Cheddar Multigrain Crackers have the best from nature. The flour is made from corn, wheat, rice, and oats and enriched with delicious cheddar cheese and delicate spices. These crispy multigrain crackers taste delicious crispy.', 15, 3, '20'),
(18, 'Sprite', 'Sprite is a colorless, citrus-flavored soft drink created by Coca-Cola1. It was introduced to the U.S. in 1961 as a direct competitor to 7-Up. Sprite is caffeine-free and has a crisp taste. It is often thought to be a close competitor to 7Up, another caffeine-free lemon-lime flavored soft drink.', 1, 2, '20'),
(20, 'Carbonara', 'Carbonara is a pasta dish made with eggs, hard cheese, cured pork, and black pepper. The dish took its modern form and name in the middle of the 20th century. The cheese is usually Pecorino Romano, parmesan, or a combination of the two.', 3, 2, '100'),
(21, 'VCUT', 'Snack for all', 15, 3, '20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_category`
--
ALTER TABLE `table_category`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `table_products`
--
ALTER TABLE `table_products`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ProductCategory` (`ProductCategory`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_category`
--
ALTER TABLE `table_category`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `table_products`
--
ALTER TABLE `table_products`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `table_products`
--
ALTER TABLE `table_products`
  ADD CONSTRAINT `table_products_ibfk_1` FOREIGN KEY (`ProductCategory`) REFERENCES `table_category` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
