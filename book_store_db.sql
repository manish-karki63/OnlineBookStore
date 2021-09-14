-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2021 at 06:02 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_store_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(30) NOT NULL,
  `category_ids` text NOT NULL,
  `title` varchar(200) NOT NULL,
  `author` text NOT NULL,
  `description` text NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL,
  `image_path` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `category_ids`, `title`, `author`, `description`, `qty`, `price`, `image_path`, `date_created`) VALUES
(3, '1,2', 'Core Java Volume I – Fundamentals', 'Cay S. Horstmann', ' Core Java Volume I – Fundamentals is a Java reference book (Best book for Java)that offers a detailed explanation of various features of Core Java, including exception handling, interfaces, and lambda expressions. Significant highlights of the book include simple language, conciseness, and detailed examples. The latest edition of the Core Java Volume I – Fundamentals comprehensively updated for covering Java SE 9, 10 & 11. The book helps Java programmers develop an ability to write highly robust and maintainable code.', 0, 2399, '1625712780_1604631420_books-1419613.jpg', '2021-07-08 08:38:59'),
(7, '3,', 'Alice in Wonderland', 'Lewis Carroll', 'The story of a girl named Alice who falls down a rabbit hole into a fantasy world populated by peculiar and anthropomorphic creatures. The tale is filled with allusions to Dodgsons friends. The tale plays with logic in ways that have given the story lasting popularity with adults as well as children. It is considered to be one of the most characteristic examples of the genre of literary nonsense, and its narrative course and structure have been enormously influential, especially in the fantasy genre.', 0, 2999, '1604631360_books-1419613.jpg', '2021-09-02 15:33:31'),
(8, '3,', 'Alice in Wonderland', '  Lewis Carroll', 'The story of a girl named Alice who falls down a rabbit hole into a fantasy world populated by peculiar and anthropomorphic creatures. The tale is filled with allusions to Dodgsons friends. The tale plays with logic in ways that have given the story lasting popularity with adults as well as children. It is considered to be one of the most characteristic examples of the genre of literary nonsense, and its narrative course and structure have been enormously influential, especially in the fantasy genre.', 0, 2499, '1604630880_books-1419613.jpg', '2021-09-02 15:39:07'),
(10, '4,', ' In Search of Lost Time', 'Marcel Proust', 'Swann Way, the first part of A la recherche de temps perdu, Marcel Proust seven-part cycle, was published in 1913. In it, Proust introduces the themes that run through the entire work.', 0, 2000, '1604631420_books-1419613.jpg', '2021-09-02 17:53:55');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(30) NOT NULL,
  `book_id` int(30) NOT NULL,
  `qty` int(30) NOT NULL,
  `price` float NOT NULL,
  `customer_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `book_id`, `qty`, `price`, `customer_id`) VALUES
(4, 2, 1, 1800, 2),
(5, 3, 1, 2500, 2),
(6, 1, 1, 2500, 2),
(7, 1, 3, 2500, 1),
(8, 2, 3, 1800, 1),
(9, 3, 3, 2500, 1),
(10, 3, 1, 2500, 3),
(11, 2, 1, 1800, 3),
(12, 2, 2, 1800, 3),
(13, 2, 4, 1800, 3),
(14, 3, 6, 2500, 3),
(15, 3, 1, 2399, 3);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'Educational', 'Educational'),
(2, 'Programming', 'Programming'),
(3, 'Fantasy', 'Fantasy'),
(4, 'Business', 'Business');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `contact` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `address`, `contact`, `email`, `password`, `date_created`) VALUES
(3, 'Manish Karki', 'Bkt', '123456890', 'manish@gmail.com', 'manish', '2021-07-11 08:14:29'),
(4, 'Manish Karki', 'Bkt', '9843645188', 'manish@gmail.com', 'manish', '2021-07-11 08:15:00'),
(5, 'Manis Karki', 'bkt', '9818692794', 'manis@gmail.com', 'manish', '2021-09-01 07:22:45');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(30) NOT NULL,
  `customer_id` int(30) NOT NULL,
  `address` text NOT NULL,
  `total_amount` float NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `address`, `total_amount`, `status`, `date_created`) VALUES
(1, 1, 'Sample address', 0, 1, '2020-11-06 15:26:12');

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `id` int(30) NOT NULL,
  `order_id` int(30) NOT NULL,
  `book_id` int(30) NOT NULL,
  `qty` int(30) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`id`, `order_id`, `book_id`, `qty`, `price`) VALUES
(1, 1, 1, 4, 2500),
(2, 1, 2, 3, 1800);

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `cover_img` text NOT NULL,
  `about_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `cover_img`, `about_content`) VALUES
(1, 'Online Book Store System', 'info@sample.com', '+18456-5455-55', '', '&lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tincidunt dolor in odio aliquet placerat. Mauris vestibulum lacinia justo, at sollicitudin nisi pretium in. Vivamus et ex at purus placerat laoreet faucibus vitae enim. Sed nibh ex, varius congue augue vitae, ullamcorper porta lorem. Praesent ex nunc, faucibus id eros nec, dapibus tempor justo. Ut turpis urna, euismod ac tincidunt vitae, interdum vel purus. Etiam pellentesque leo eget commodo dignissim. Proin ac lorem id lorem euismod posuere eget eget ipsum.&lt;/p&gt;&lt;p&gt;Nunc tincidunt augue eu ipsum aliquam venenatis. Vestibulum metus nunc, porta quis commodo id, consectetur id ipsum. Phasellus luctus tortor vitae nisl consectetur molestie. Sed varius ornare leo, sit amet faucibus turpis placerat non. Nam ipsum quam, dapibus vitae consequat vitae, molestie nec lacus. Praesent gravida lacus sed pellentesque posuere. Donec tincidunt urna nec magna pulvinar, et viverra leo dictum. Cras aliquet odio ac dapibus porttitor.&lt;/p&gt;&lt;p&gt;Suspendisse sed auctor enim, eu laoreet purus. Fusce aliquam nisl odio, condimentum commodo risus bibendum eu. Proin vitae felis sollicitudin, porta leo sit amet, pretium lorem. Proin facilisis egestas lacus, eu mollis felis egestas eget. Phasellus efficitur accumsan dolor, ut pharetra tortor posuere nec. Phasellus rutrum lacus in purus facilisis tempus. Donec a sapien a dolor varius rutrum in vel velit. Proin mattis porttitor commodo. Nam vitae porta diam, auctor lacinia nibh. Sed sodales commodo suscipit. Suspendisse eu lectus ac ligula fringilla auctor. Donec rutrum, lectus in cursus hendrerit, leo massa dignissim dui, eu tempus lacus est laoreet enim. Nunc lobortis condimentum vulputate.&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;http://localhost/book_store/admin/assets/uploads/1604629260_books-1419613.jpg&quot; style=&quot;width: 465px;&quot; class=&quot;fr-fic fr-dib&quot;&gt;&lt;/p&gt;&lt;p&gt;Curabitur bibendum sem non sagittis sagittis. Fusce ac orci tincidunt, viverra enim id, posuere felis. Cras sed urna elit. Curabitur facilisis odio porta eros facilisis varius. Sed vulputate dolor ac venenatis porta. Suspendisse sit amet odio mollis, porta erat ut, venenatis velit. Nunc sollicitudin lorem vitae purus sodales malesuada. Maecenas pellentesque, nisl sed hendrerit venenatis, tortor augue commodo felis, non cursus risus massa pulvinar sapien. Aliquam vitae nisi et magna condimentum faucibus nec sit amet est. Etiam vulputate iaculis sodales. Fusce ut turpis ut ante laoreet interdum sed ac velit. Suspendisse lacinia felis erat, in lacinia risus volutpat id. Praesent egestas odio diam, ut congue quam sollicitudin laoreet. Aenean elit eros, dapibus id purus blandit, imperdiet vehicula augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nam maximus elementum nulla nec consequat.&lt;/p&gt;&lt;p&gt;In aliquam tellus turpis. Etiam pretium ex cursus viverra interdum. Quisque maximus tortor lacus, nec ullamcorper risus bibendum nec. Mauris at ante dui. Vivamus eget suscipit ex. Nullam a purus tincidunt, molestie purus et, placerat enim. Mauris luctus erat sit amet suscipit luctus. Mauris lorem sapien, maximus sit amet varius nec, scelerisque sit amet felis. Phasellus et consequat metus. Sed suscipit aliquet ullamcorper. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Integer nec pharetra nunc, a pretium libero. Etiam rhoncus ante nibh, a venenatis felis ullamcorper sit amet.&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1=Admin,2=Staff'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`) VALUES
(1, 'admin', 'admin', '0192023a7bbd73250516f069df18b500', 1),
(2, 'admin', 'admin', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
