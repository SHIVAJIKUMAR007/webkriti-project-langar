-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 27, 2020 at 10:47 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id13011202_langar`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `username` varchar(30) NOT NULL,
  `f_id` int(5) NOT NULL,
  `r_id` int(5) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`username`, `f_id`, `r_id`, `quantity`) VALUES
('suman', 1, 1, 3),
('suman', 2, 1, 1),
('Saicharan', 1, 1, 3),
('Paragp', 12, 2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `r_id` int(5) DEFAULT NULL,
  `f_id` int(5) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`r_id`, `f_id`, `name`, `tagline`, `image`, `price`) VALUES
(1, 1, 'TANDURI CHICKEN ', 'Mouth Watering!!!!', 'https://1.bp.blogspot.com/-Z8PhT9XhF50/XlJy-CV9EAI/AAAAAAAAARg/oXecDvMLgKk8YAjISUH_riPzmRkuDfOHQCEwYBhgL/s320/tanduri.jpg', 149),
(1, 2, 'HYDERABADI BIRYANI', 'Sooooooo Spicy', 'https://1.bp.blogspot.com/-KUo7k8psOVA/XlJy8zcdYfI/AAAAAAAAARU/I805eJwHqA0hwGgwrWElb6tqP7Gr-kZvwCEwYBhgL/s320/Hyderabadi-Biryani.jpg', 199),
(1, 3, 'BUTTER CHICKEN', ' Delicious......', 'https://1.bp.blogspot.com/-NqU73-f7OIk/XlJy8nHrY9I/AAAAAAAAARQ/jqIBUGAF5x4Bp5jrJrchsZdl_XURoBNnwCEwYBhgL/s1600/download.jpg', 199),
(2, 4, 'VEG-LOADED PIZZA', 'Rich with fresh Cheese,Healthy vegies', 'https://images.unsplash.com/photo-1513104890138-7c749659a591?ixlib=rb-1.2.1&w=1000&q=80', 149),
(2, 5, 'KING BURGER', 'Can\'t Resist!', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRCeguaXdCS6KnShhszVqYJ9m69PVJZFjR5gQm6B7nGfLQ_UdoA', 99),
(2, 6, 'FRENCH FRIES', 'Crispy N Spicy!', 'https://img.taste.com.au/2z0hUTnc/w1200-h630-cfill/taste/2016/11/rachel-87711-2.jpeg', 79),
(3, 7, 'BUTTER PANEER', 'Best Seller', 'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTW5UeFD2E0G2c6Q2U1pIxgwhdwdnyiQN9ZUoWWleEW-hKTsh1v', 135),
(3, 8, ' RAJMA CHAWAL', 'Must Try', 'https://www.secondrecipe.com/wp-content/uploads/2017/08/rajma-chawal-2018.jpg', 99),
(3, 9, 'VEG THALI', 'Enough for you', 'https://cmkt-image-prd.freetls.fastly.net/0.1.0/ps/5813908/910/910/m2/fpnw/wm1/wzxzyw63bmn6amnux9jyi0lnkh6v9wpjsiqs2ccw3exsafsaml48jyf3tzemj7iz-.jpg?1549204362&s=06de6c1eb70f73869fd892d31fd78970', 149),
(2, 12, 'Butter Naan', 'Buttery  !!!!!', 'images/download.jpeg', 8),
(2, 13, 'coke(500ml)', 'chil dil', 'images/langar8.jfif', 40);

-- --------------------------------------------------------

--
-- Table structure for table `my_order`
--

CREATE TABLE `my_order` (
  `username` varchar(255) NOT NULL,
  `o_id` int(8) NOT NULL,
  `f_id` int(5) NOT NULL,
  `r_id` int(5) NOT NULL,
  `quantity` int(5) NOT NULL,
  `stetus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `o_id` int(8) NOT NULL,
  `r_id` int(5) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact no` bigint(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `landmark` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(50) NOT NULL,
  `pincode` int(6) NOT NULL,
  `amount_to_rec` int(5) NOT NULL,
  `stetus` varchar(30) NOT NULL,
  `otp` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`o_id`, `r_id`, `username`, `name`, `email`, `contact no`, `address`, `landmark`, `state`, `country`, `pincode`, `amount_to_rec`, `stetus`, `otp`) VALUES
(26, 1, 'Shivaji007', 'shivaji', 'befilmi007@gmail.com', 8573637292, 'bh2 nilgiri hostel', 'iiitm gwalior', 'mp', 'india', 474015, 1437, 'not will to rate', 34422899),
(27, 2, 'Shivaji007', 'shivaji', 'befilmi007@gmail.com', 8573637292, 'bh2 nilgiri hostel', 'iiitm gwalior', 'mp', 'india', 474015, 336, 'rated', 87237341),
(28, 3, 'Shivaji007', 'shivaji', 'befilmi007@gmail.com', 8076660918, 'bh2 nilgiri hostel', 'iiitm gwalior', 'mp', 'india', 474015, 554, 'rated', 77079466),
(29, 1, 'Shivaji007', 'shivaji', 'befilmi007@gmail.com', 8292290456, 'bh2 nilgiri hostel', 'iiitm gwalior', 'mp', 'india', 474015, 360, 'rated', 98207684),
(30, 1, 'Shivaji007', 'shivaji', 'befilmi007@gmail.com', 8573637292, 'mandir wali gali', 'tikri', 'Delhi', 'India', 110041, 1097, 'rated', 98001503),
(31, 3, 'Paragp', 'PARAG PODDAR', 'paragpoddar123@gmail.com', 7440624675, 'Near bus stand , marwahi road', 'CHHATTISGARH', 'CHHATTISGARH', 'india', 495119, 482, 'rated', 27340014),
(32, 1, 'Paragp', 'PARAG PODDAR', 'paragpoddar123@gmail.com', 7440624675, 'Near bus stand , marwahi road', 'CHHATTISGARH', 'CHHATTISGARH', 'india', 495119, 417, 'rated', 90863295),
(33, 2, 'Shivaji007', 'shivaji', 'suman@gmail.com', 8573637292, 'mandir wali gali, baba haridas colony', 'Delhi', 'Delhi', 'India', 110041, 450, 'rated', 65420919),
(34, 2, 'Shivaji007', 'shivaji', 'befilmi007@gmail.com', 8573637292, 'mandir wali gali, baba haridas colony', 'Delhi', 'Delhi', 'India', 110041, 369, 'rated', 47239984),
(35, 3, 'Shivaji007', 'shivaji', 'befilmi007@gmail.com', 8076660918, 'mandir wali gali, baba haridas colony', 'Delhi', 'Delhi', 'India', 110041, 441, 'rated', 87204532),
(36, 1, 'Aasf', 'sanket kumar', 'befilmi007@gmail.com', 12345678910, 'wdefekjbqwe', 'kygfyi', 'lihifyf', '9223md', 3233, 247, 'rated', 46244012);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `r_id` int(5) NOT NULL,
  `rate_num` int(5) NOT NULL,
  `total_points` int(6) NOT NULL,
  `av_rate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`r_id`, `rate_num`, `total_points`, `av_rate`) VALUES
(1, 4, 14, 3.5),
(2, 3, 14, 4.66667),
(3, 4, 18, 4.5);

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `r_name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `r_id` int(5) NOT NULL,
  `owner_page` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `tagline` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `restaurant_page` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`r_name`, `pass`, `r_id`, `owner_page`, `name`, `address`, `tagline`, `image`, `restaurant_page`) VALUES
('restaurant1', '', 1, 'ro1.php', 'NON-VEG PAVILION', 'Near DD Mall, Gwalior', 'Come, Eat, Repeat', 'https://prod-c2i.s3.amazonaws.com/articles/14776280735812d0a9a5c1c.jpg', 'resturant1.php'),
('restaurant2', '', 2, 'ro2.php', 'Mac-Domino', 'Near Gwalior fort, Gwalior', 'Know me know Flavour!,\r\n  No me no Flvaour!', 'https://dailyhdwallpaper.com/wp-content/uploads/Pizza-Food-Delicious-Photo-Wallpaper-2048x1536.jpg', 'resturant2.php'),
('restaurant3', '', 3, 'ro3.php', 'VEGGIE INDIA', 'Near Hazira Market,Gwalior', 'Your Happiness Is Our Concern', 'https://bigseventravel.com/wp-content/uploads/2019/11/Screenshot-2019-11-15-at-15.12.00.png', 'resturant3.php');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(30) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact no` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `pass`, `email`, `contact no`) VALUES
('Aasf', '$2y$10$vxlyCR2DIHNrCA8nScVA/.9eHN9KwqSegNe8fdlwMPYKJjRuG0Z/2', 'aasf@gmail.com', 911),
('abc', '$2y$10$2/ifpQ9ylnqGyGPK8ZnMsOVBFR/Mw5wiQ.2Y9Y3QuCtnhWvvVxf16', 'tomar@gmail.com', 4578952645),
('itsme', '$2y$10$vE8l1b7NWKDxPPfNfAbnaeDzzo1Cc2QMfc3XRN4lZn8Xb3RdbtAGa', '7026871210@sdiaosq', 123),
('Paragp', '$2y$10$Gm/wMoE1euzXQu5XV40cXeMWY5Qw9cBvemTt6hDVq84bcHflEeVZu', 'paragpoddar123@gmail.com', 7440624675),
('Ravi', '$2y$10$/oyM3xH5dcpTs2nV5z2fgOESvNHYJzi0AiwUWak2TnIG5dSXaOWBm', 'ravi@gmail.com', 1234567890),
('Saicharan', '$2y$10$qAQmNRns4O0y7qUBxB8I6.hMQ8Sx6CbdzuWaM2Ay7SGLR3ANdc3ZG', 'saicharan@gmail.com', 9493846740),
('Shivaji007', '$2y$10$jh//B3ei4ECiEhHavYUKYeQx.vRgUopXZuCejyenpvN3Vs71IJROO', 'shivaji@gmail.com', 8295850524),
('suman', '$2y$10$wo2jLlTcGYhsC6HOoZJJ8u.KPi28p8CVyD9F4UAlSd5M.01rsPwGu', 'suman@gmail.com', 8573637292),
('test', '$2y$10$MO/Dj2DDT1eujvEWIAwmi.rWeLymugVAGOdbshJqENXA0AHjtcIVu', 'test@gmail.com', 9898989898);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `f_id` (`f_id`),
  ADD KEY `r_id` (`r_id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`f_id`),
  ADD KEY `r_id` (`r_id`);

--
-- Indexes for table `my_order`
--
ALTER TABLE `my_order`
  ADD KEY `o_id` (`o_id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD KEY `r_id` (`r_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`r_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`(10)),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `contact no` (`contact no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `f_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `o_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`f_id`) REFERENCES `food` (`f_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`r_id`) REFERENCES `restaurant` (`r_id`);

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `food_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `restaurant` (`r_id`);

--
-- Constraints for table `my_order`
--
ALTER TABLE `my_order`
  ADD CONSTRAINT `my_order_ibfk_1` FOREIGN KEY (`o_id`) REFERENCES `order_table` (`o_id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `restaurant` (`r_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
