-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2024 at 10:49 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userId` varchar(20) NOT NULL,
  `productId` int(4) NOT NULL,
  `productName` varchar(20) NOT NULL,
  `productPrice` int(5) NOT NULL,
  `productImage` text NOT NULL,
  `quantity` int(20) NOT NULL,
  `totalPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `userId`, `productId`, `productName`, `productPrice`, `productImage`, `quantity`, `totalPrice`) VALUES
(297, 'utsav1124@gmail.com', 37, 'Rose Incense Sticks', 270, 'IMG-6742f7f7f01c98.98998361.png', 1, 270),
(298, 'utsav1124@gmail.com', 38, 'Lavender Incense Sti', 300, 'IMG-6742f84eed6b97.78950938.png', 1, 300),
(299, 'utsav1124@gmail.com', 39, 'Jasmine Incense Stic', 120, 'IMG-6742f89cc7fee4.41145500.png', 1, 120),
(300, 'bhavy1123@gmail.com', 30, 'Jasmine Dhoop Sticks', 170, 'IMG-6742ef8a30df13.42902239.png', 4, 680);

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `userId` varchar(40) NOT NULL,
  `orderId` int(11) NOT NULL,
  `billingId` int(11) NOT NULL,
  `shippingId` int(11) NOT NULL,
  `paymentType` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`userId`, `orderId`, `billingId`, `shippingId`, `paymentType`) VALUES
('utsav1124@gmail.com', 18, 30, 29, 'UPI'),
('bhavy1123@gmail.com', 19, 0, 0, 'COD'),
('utsav1124@gmail.com', 20, 30, 29, 'COD');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `fullName` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `userId` varchar(20) NOT NULL,
  `productName` varchar(20) NOT NULL,
  `reviewMessage` text NOT NULL,
  `starNumber` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `userId`, `productName`, `reviewMessage`, `starNumber`) VALUES
(22, 'bhavy1123@gmail.com', 'Sandalwood Dhoop Sti', 'I recently tried Chandan Dhoop Sticks, and I am absolutely in love with them! The fragrance is warm, calming.', 4),
(31, 'utsav1124@gmail.com', 'Rose Incense Cups', 'I recently tried rose incense sticks, and I am absolutely in love with them.', 3),
(32, 'raj1089@gmail.com', 'Jasmine Incense Cups', 'I recently tried jasmine incense cups, and I am absolutely in love with them! The fragrance is warm.', 5),
(33, 'parth1145@gmail.com', 'Lotus Incense floral', 'The fragrance is warm, calming, and has that signature sandalwood scent that fills the room with a peaceful atmosphere.', 2),
(34, 'vivek1156@gmail.com', 'Mogra Incense floral', 'I recently tried mogra incense sticks , and I am absolutely in love with them.', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(4) NOT NULL,
  `orderId` int(3) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `productName` varchar(40) NOT NULL,
  `user_id` varchar(40) DEFAULT NULL,
  `productPrice` int(9) NOT NULL,
  `quantity` int(5) NOT NULL,
  `total` int(5) NOT NULL,
  `action` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderId`, `product_id`, `productName`, `user_id`, `productPrice`, `quantity`, `total`, `action`) VALUES
(25, 18, 29, 'Rose Dhoop Sticks', 'utsav1124@gmail.com', 200, 1, 200, 'Pending'),
(26, 18, 31, 'Chandan Dhoop Sticks', 'utsav1124@gmail.com', 120, 1, 120, 'Delivered'),
(27, 18, 32, 'Sandalwood Incense C', 'utsav1124@gmail.com', 100, 1, 100, 'Pending'),
(28, 19, 29, 'Rose Dhoop Sticks', 'bhavy1123@gmail.com', 200, 4, 800, 'Pending'),
(29, 19, 31, 'Chandan Dhoop Sticks', 'bhavy1123@gmail.com', 120, 5, 600, 'Pending'),
(30, 20, 29, 'Rose Dhoop Sticks', 'utsav1124@gmail.com', 200, 1, 200, 'Shipped'),
(31, 20, 30, 'Jasmine Dhoop Sticks', 'utsav1124@gmail.com', 170, 1, 170, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `prodductcategory`
--

CREATE TABLE `prodductcategory` (
  `categoryId` int(11) NOT NULL,
  `categoryName` varchar(100) NOT NULL,
  `categoryImage` text NOT NULL,
  `categoryDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prodductcategory`
--

INSERT INTO `prodductcategory` (`categoryId`, `categoryName`, `categoryImage`, `categoryDescription`) VALUES
(15, 'incense', 'IMG-6742eb61a8e220.50121655.png', 'Discover our premium selection of incense, crafted to elevate your senses and create a calming atmosphere. Perfect for meditation, relaxation, or simply enhancing the ambiance of your space, our incense sticks and cones come in a variety of fragrances, including floral, woody, herbal, and exotic blends. '),
(16, 'dhoop', 'IMG-6742eb9eb570e8.22118485.png', 'mmerse yourself in the rich and authentic aromas of our dhoop collection, designed to enhance your spiritual practices and daily rituals. Known for its intense fragrance and smokeless burn, dhoop is perfect for prayer, meditation, and creating a serene atmosphere at home or in sacred spaces.'),
(17, 'cup', 'IMG-6742ebcbd6af40.37306848.png', 'Explore our versatile collection of cups, designed to suit every occasion and style. From elegant ceramic and glass cups to durable stainless steel and eco-friendly options, we offer a wide range of choices for your favorite beverages. '),
(18, 'Floral', 'IMG-6742ed8009f757.67180763.png', 'Bring the enchanting essence of blooming flowers into your space with our floral incense collection. Each stick is infused with the delicate and refreshing fragrances of nature’s finest blossoms, including rose, jasmine, lavender, mogra, and lotus. Perfect for creating a serene atmosphere, these floral scents uplift your mood, promote relaxation, and add a touch of elegance to any setting.');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `productName` text NOT NULL,
  `productImage` text NOT NULL,
  `productDescription` text NOT NULL,
  `productPrice` int(11) NOT NULL,
  `CatagoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `productName`, `productImage`, `productDescription`, `productPrice`, `CatagoryId`) VALUES
(28, 'Sandalwood Dhoop Sticks', 'IMG-6742eea72055f0.72191032.png', 'Experience the timeless and calming aroma of sandalwood with our premium sandalwood dhoop sticks. Renowned for its earthy and woody fragrance, sandalwood.', 150, 16),
(29, 'Rose Dhoop Sticks', 'IMG-6742ef1ddbaaa7.28302411.png', 'Immerse yourself in the sweet and romantic aroma of our rose dhoop sticks. Infused with the essence of fresh roses, these dhoop sticks create a soothing and uplifting ambiance, perfect for moments.', 200, 16),
(30, 'Jasmine Dhoop Sticks', 'IMG-6742ef8a30df13.42902239.png', 'Fill your space with the enchanting fragrance of our jasmine dhoop sticks, inspired by the elegance of fresh jasmine blossoms. Known for its calming and refreshing properties, jasmine creates an atmosphere.', 170, 16),
(31, 'Chandan Dhoop Sticks', 'IMG-6742efdc2bf465.12209765.png', 'Immerse yourself in the divine and soothing aroma of our Chandan (Pure Sandal) dhoop sticks. Made with authentic sandalwood, these dhoop sticks are perfect for spiritual rituals.\r\n', 120, 16),
(32, 'Sandalwood Incense Cups', 'IMG-6742f21b0d27a4.01447972.png', 'Infused with the calming aroma of sandalwood, these incense cups create a serene and grounding atmosphere. Perfect for meditation, relaxation, or enhancing spiritual practices.\r\n', 100, 17),
(33, 'Lavender Incense Cups', 'IMG-6742f2fe8e7bd0.96178093.png', 'Fill your space with the soothing and floral scent of lavender. These incense cups are designed for those seeking a peaceful ambiance, ideal for relaxation, stress relief.', 190, 17),
(34, 'Rose Incense Cups', 'IMG-6742f4f16a8907.60915180.png', 'These incense cups release a sweet, floral fragrance that uplifts and refreshes the surroundings. Ideal for creating a romantic or relaxing atmosphere.\r\n', 230, 17),
(35, 'Jasmine Incense Cups', 'IMG-6742f58ee4b905.93970056.png', 'Known for its fragrant, sweet, and exotic aroma, jasmine incense cups bring a luxurious atmosphere to your space. Ideal for enhancing mindfulness, meditation, and creating a peaceful', 250, 17),
(36, 'Sandalwood Incense Sticks', 'IMG-6742f7a5815d73.84859949.png', 'Known for its rich, woody, and earthy aroma, sandalwood incense sticks are perfect for creating a peaceful, grounding atmosphere.', 260, 15),
(37, 'Rose Incense Sticks', 'IMG-6742f7f7f01c98.98998361.png', 'Infused with the sweet and floral scent of roses, these incense sticks create a romantic and serene atmosphere.', 270, 15),
(38, 'Lavender Incense Sticks', 'IMG-6742f84eed6b97.78950938.png', 'Relax and unwind with the soothing fragrance of lavender. These incense sticks are perfect for reducing stress and anxiety, promoting.', 300, 15),
(39, 'Jasmine Incense Sticks', 'IMG-6742f89cc7fee4.41145500.png', 'With its exotic and sweet floral fragrance, jasmine incense sticks create an uplifting and peaceful environment. Ideal for meditation.', 120, 15),
(40, 'Rose Incense floral', 'IMG-6742f9479d1445.24987704.png', 'Fill your surroundings with the calming and floral fragrance of lavender. These incense sticks are perfect for reducing stress and anxiety.', 150, 18),
(41, 'Lotus Incense floral', 'IMG-6742f97b2374b7.79045969.png', 'Fill your surroundings with the calming and floral fragrance of lavender. These incense sticks are perfect for reducing stress and anxiety.', 190, 18),
(42, 'Mogra Incense floral', 'IMG-6742f9aa68bd45.87047715.png', 'Relax and unwind with the soothing fragrance of lavender. These incense sticks are perfect for reducing stress and anxiety, promoting.', 300, 18),
(43, 'Plumeria Incense floral', 'IMG-6742f9e48e3091.94232418.png', 'Known for its fragrant, sweet, and exotic aroma, jasmine incense cups bring a luxurious atmosphere to your space.', 340, 18);

-- --------------------------------------------------------

--
-- Table structure for table `useraddress`
--

CREATE TABLE `useraddress` (
  `id` int(11) NOT NULL,
  `userId` varchar(30) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `middleName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `gender` varchar(20) NOT NULL,
  `addressOne` text NOT NULL,
  `addressTwo` text NOT NULL,
  `dateOfBirth` varchar(30) NOT NULL,
  `pincode` int(6) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `addressType` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `useraddress`
--

INSERT INTO `useraddress` (`id`, `userId`, `firstName`, `middleName`, `lastName`, `email`, `phone`, `gender`, `addressOne`, `addressTwo`, `dateOfBirth`, `pincode`, `city`, `state`, `country`, `addressType`) VALUES
(29, 'utsav1124@gmail.com', 'utsav', 'patel', 'harshadbhai', 'utsavp377@gmail.com', '5678665443', 'male', 'lihoda', 'lihoda1', '2005-04-06', 786789, 'unjha', 'gujarat', 'india', 'shipping'),
(30, 'utsav1124@gmail.com', 'vivek', 'prajapati', 'hasamukhlal', 'vivekprajapati2533@gmail.com', '4567893456', 'male', 'dalvana', 'dalvana1', '2004-05-12', 456789, 'unjha', 'gujarat', 'india', 'billing');

-- --------------------------------------------------------

--
-- Table structure for table `usersdata`
--

CREATE TABLE `usersdata` (
  `id` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `middleName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dateOfBirth` varchar(11) NOT NULL,
  `number` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `address` text NOT NULL,
  `pincode` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `country` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usersdata`
--

INSERT INTO `usersdata` (`id`, `firstName`, `middleName`, `lastName`, `gender`, `dateOfBirth`, `number`, `email`, `password`, `address`, `pincode`, `city`, `state`, `country`) VALUES
(37, 'utsav', 'patel', 'harshadbhai', 'male', '5/3/2004', '3456789076', 'utsav1124@gmail.com', '123123', 'maherwada', '384170', 'unjha', 'gujarat', 'india'),
(38, 'bhavy', 'patel', 'rameshbhai', 'male', '5/3/2004', '3456789076', 'bhavy1123@gmail.com', '111222', 'lihoda', '384170', 'unjha', 'gujarat', 'india'),
(39, 'utsav', 'patel', 'harshadbhai', 'male', '5/3/2004', '3456789076', 'utsav1124@gmail.com', '123456', 'mehsana', '384170', 'unjha', 'gujarat', 'india'),
(40, 'utsav', 'patel', 'harshadbhai', 'male', '5/3/2004', '3456789076', 'utsav1124@gmail.com', '123321', 'patan', '384170', 'unjha', 'gujarat', 'india'),
(41, 'utsav', 'patel', 'harshadbhai', 'male', '5/3/2004', '3456789076', 'utsav1124@gmail.com', '111333', 'palanpur', '384170', 'unjha', 'gujarat', 'india');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodductcategory`
--
ALTER TABLE `prodductcategory`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `useraddress`
--
ALTER TABLE `useraddress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usersdata`
--
ALTER TABLE `usersdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `prodductcategory`
--
ALTER TABLE `prodductcategory`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `useraddress`
--
ALTER TABLE `useraddress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `usersdata`
--
ALTER TABLE `usersdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
