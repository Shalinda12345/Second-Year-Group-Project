-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2024 at 02:55 PM
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
-- Database: `mystore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'heshan', 'hshalindaofficial@gmail.com', '$2y$10$tv5To49b.VYyknj35OrEpuZ4GhAX2mult.cQfOj21r/L80wB9YxMa');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(2, 'Argan'),
(4, 'Dove'),
(5, 'Nivea'),
(6, 'Vaseline'),
(7, 'Seran'),
(9, 'Viana');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `product_id` int(11) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_title`) VALUES
(1, 'Shampoo'),
(2, 'Cream'),
(3, 'Perfume'),
(4, 'Body Lotion'),
(5, 'Nail Polish');

-- --------------------------------------------------------

--
-- Table structure for table `orders_pending`
--

CREATE TABLE `orders_pending` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_pending`
--

INSERT INTO `orders_pending` (`order_id`, `user_id`, `invoice_number`, `product_id`, `quantity`, `order_status`) VALUES
(1, 1, 969361570, 2, 1, 'pending'),
(2, 1, 1233677345, 1, 1, 'pending'),
(3, 1, 758938973, 2, 1, 'pending'),
(4, 1, 1779510863, 2, 1, 'pending'),
(5, 1, 1932995187, 5, 1, 'pending'),
(6, 1, 1244400304, 5, 1, 'pending'),
(7, 1, 359196914, 5, 1, 'pending'),
(8, 1, 1290368365, 6, 1, 'pending'),
(9, 1, 583975129, 2, 1, 'pending'),
(10, 1, 1893432206, 4, 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_keywords` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_image1` varchar(255) NOT NULL,
  `product_image2` varchar(255) NOT NULL,
  `product_image3` varchar(255) NOT NULL,
  `product_price` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_keywords`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `status`) VALUES
(2, 'Argan Oil Shampoo 300ml', 'Argan Oil Shampoo nourishes and moisturizes leaving hair shiny, smooth & healthy. Argan Oil shampoo is formulated using a unique blend of ingredients specially developed to help condition and revive hair for soft, shiny results.  Suitable for all hair typ', 'Arganoil argon oil oilshampoo shampoo', 1, 0, 'argan.png', 'argan.png', 'argan.png', '2300', '2024-06-16 14:37:52', 'true'),
(4, 'Dove Hair Therapy ml 500', 'Our hair goes through a lot, from changes in the weather to everyday heat styling and occasional chemical treatment damage. The secret to caring for dry hair? Dove Intensive Repair Damage Therapy Shampoo and Conditioner is specially formulated with expert', 'shampoo hair', 1, 4, '1464941.png', '1861473.png', '1861473.png', '1200', '2024-06-16 08:46:17', 'true'),
(6, 'Vaseline Radient X Deep Hand Lotion ', 'An ultra-nourishing hand cream, enriched with 100% pure Shea Butter, Coconut Oil, Vitamin C and Peptides. Vaseline® Radiant X Deep Nourishment Hand Butter provides intense moisturization, leaving the skin noticeably softer, smoother, and radiant.', 'Handlotion lotion moisturizer', 4, 6, '111860606.png', '111860605.png', '111860605.png', '2000', '2024-06-16 13:33:38', 'true'),
(8, 'Nivea Rock Salt Body Wash', 'NIVEA MEN Rock Salts Exfoliating Body Wash gently exfoliates, removing dead skin and deeply cleans skin without drying it out.', 'Bodywash Shampoo', 1, 5, 'b1e0d2f6229b4a938b20223b1f29db83-web_1010x1180_transparent_png.webp', '4f6c2489f31846d5bfb1d2ae4e634e7c-web_1010x1180_transparent_png.webp', '4f6c2489f31846d5bfb1d2ae4e634e7c-web_1010x1180_transparent_png.webp', '1800', '2024-07-03 12:05:25', 'true'),
(9, 'Viana Hair Volumizing Shampoo', 'Normal to oily hair, Thinning, Limp Flyaway hair, Hair falling scalps, Frizzy hair, Split End hair, Dull hair  Anti hair loss, Volumizing, Anti inflammatory, Anti oxidant, Anti microbial, Anti Dandruff, Moisturizing', 'Shampoo refill pack', 1, 9, 'Refill-002.png', 'Hair-Thickening-Volumizing-Shampoo-Refill-back.png', 'Hair-Thickening-Volumizing-Shampoo-Refill-back.png', '1400', '2024-07-03 12:14:36', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `user_orders`
--

CREATE TABLE `user_orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount_due` int(255) NOT NULL,
  `invoice_number` int(255) NOT NULL,
  `total_products` int(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_orders`
--

INSERT INTO `user_orders` (`order_id`, `user_id`, `amount_due`, `invoice_number`, `total_products`, `order_date`, `order_status`) VALUES
(1, 1, 3100, 758938973, 2, '2024-06-14 04:49:39', 'Complete'),
(2, 1, 1500, 1779510863, 1, '2024-06-15 14:08:46', 'pending'),
(3, 1, 1000, 1932995187, 1, '2024-06-16 10:29:54', 'pending'),
(4, 1, 1000, 1244400304, 1, '2024-06-16 11:11:06', 'pending'),
(5, 1, 2200, 359196914, 2, '2024-06-16 16:56:43', 'pending'),
(6, 1, 4200, 1290368365, 3, '2024-06-16 17:09:43', 'pending'),
(7, 1, 2300, 583975129, 1, '2024-07-02 07:15:33', 'pending'),
(8, 1, 1200, 1893432206, 1, '2024-07-02 07:16:56', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `invoice_number` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`payment_id`, `order_id`, `invoice_number`, `amount`, `payment_mode`, `date`) VALUES
(1, 1, 969361570, 3100, 'Paypal', '2024-05-18 04:42:51'),
(2, 2, 1233677345, 1600, 'Paypal', '2024-05-19 06:51:15'),
(3, 1, 758938973, 3100, 'Cash on Delivery', '2024-06-14 04:49:39');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_image`, `user_ip`, `user_address`, `user_mobile`) VALUES
(1, 'sashen', 'sashen@gmail.com', '$2y$10$Uto3g9gHJKxOjSAQPBXBtOS3w7afQc0xPj74mUVCIaSym.8cxlq9S', '1.png', '::1', 'colombo', '0778989890'),
(2, 'Maleesha', 'maleesha@gmail.com', '$2y$10$FWAfV8quswGcnVndCY6YSOSFYu7bI351NW.sTdvHsVsem3UWSYrHK', 'among us 4.png', '::1', 'marawila', '0718080700');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders_pending`
--
ALTER TABLE `orders_pending`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_orders`
--
ALTER TABLE `user_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders_pending`
--
ALTER TABLE `orders_pending`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_orders`
--
ALTER TABLE `user_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
