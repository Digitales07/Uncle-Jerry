-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2016 at 06:44 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uncle_jerry`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(10) NOT NULL,
  `title` varchar(5000) NOT NULL,
  `discription` mediumtext NOT NULL,
  `contact` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `discription`, `contact`) VALUES
(1, 'Insert About us demo title here', 'Insert About us demo Description here', 'ahmed.a.tamim@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `stores_id_FK` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `stores_id_FK`) VALUES
(1, 'admin', 'admin123', 'shaheerulazeem@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(10) NOT NULL,
  `category_name` varchar(45) NOT NULL,
  `category_description` varchar(250) NOT NULL,
  `category_type` varchar(45) NOT NULL,
  `category_parentID` int(10) DEFAULT NULL,
  `category_archived` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_description`, `category_type`, `category_parentID`, `category_archived`) VALUES
(1, 'Phones', 'smart phones', 'Primary', NULL, 1),
(3, 'Clothes', ' men, women, kids', 'Primary', NULL, 1),
(4, 'Computer', 'Laptops, desktops', 'Primary', NULL, 1),
(5, ' Iphone', ' 4s,5s,6s', 'Secondary', 1, 1),
(6, 'Men shirts', ' t', 'Secondary', 3, 1),
(7, 'Women suits', ' demo', 'Secondary', 3, 1),
(8, ' Samsung', 'Mobiles', 'Secondary', 1, 1),
(9, ' camera', ' HD', 'Primary', NULL, 1),
(10, ' appliances', 'HOME ', 'Primary', NULL, 1),
(11, ' cars', ' lorem espum espa', 'Primary', NULL, 0),
(12, 'bikes', 'lorem espum espa', 'Primary', NULL, 0),
(13, 'furniture', 'all types', 'Primary', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_fname` varchar(45) NOT NULL,
  `customer_lname` varchar(45) NOT NULL,
  `customer_phone` varchar(45) NOT NULL,
  `customer_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_fname`, `customer_lname`, `customer_phone`, `customer_email`) VALUES
(1, 'shaheer', 'azeem', '03244925887', 'shaheerulazeem@gmail.com'),
(2, 'tabish', 'munir', '0321456789', 'abc@gmail.com'),
(3, 'tabish', 'munir', '02156998', 'abc@123'),
(4, 'tabish', 'munir', '02156998', 'abc@gmail.com'),
(5, 'tabish', 'munir', '02156998', 'abc@gmail.com'),
(6, 'aatir', 'a rehman', '03244141314', 'aatir_rehman@yahoo.com'),
(7, 'hamza', 'iqbal', '0321456789', 'asbd@example.com'),
(8, 'ahmed', 'anas', '03114568789', 'abc@gmail.com'),
(9, 'ahmed', 'anas', '03114568789', 'abc@gmail.com'),
(10, 'ahmed', 'anas', '03114568789', 'abc@gmail.com'),
(11, 'ahmed', 'anas', '03114568789', 'abc@gmail.com'),
(39, 'a', 'a', '1', 'a'),
(40, 'a', 'a', 'a', 'a'),
(41, 'a', 'a', 'a', 'a'),
(42, 'a', 'a', '1', 'a'),
(43, 'a', 'a', '1', 'a'),
(44, 'a', 'a', '1', 'a'),
(45, 'a', 'a', '1', 'a'),
(46, 'a', 'a', '1', 'a'),
(47, 'a', 'a', '1', 'a'),
(48, 'a', 'a', '1', 'a'),
(49, 'a', 'a', '1', 'a'),
(50, 'a', 'a', '1', 'a'),
(51, 'a', 'as', '12', 'asd'),
(52, '39', '39', '39', '39'),
(54, '40', '40', '40', '40'),
(55, '41', '41', '41', '41'),
(56, '45', '45', '45', '45'),
(57, 'shaheer ul azeem', '.', '123456', 'asdf@q123.com'),
(58, 'new', 'new', '123', 'new'),
(59, 'shaheer', 'azeem', '123', 'shaheerulazeem@gmail.com'),
(60, 'faseeh', 'azeem', '145', 'abc@gmail.com'),
(61, 's', 'q', 'e', 'e');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `orderdetails_id` int(10) NOT NULL,
  `customer_id_fk` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(25) NOT NULL,
  `country` varchar(25) NOT NULL,
  `postcode` int(5) NOT NULL,
  `order_archived` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`orderdetails_id`, `customer_id_fk`, `address`, `city`, `country`, `postcode`, `order_archived`) VALUES
(31, 57, '21-A', 'Lahore', 'Pakistan', 54000, 1),
(32, 25, '29-B', 'Lahore', 'Pakistan', 54000, 1),
(33, 5, '29-B', 'Lahore', 'Pakistan', 54123, 1),
(34, 58, '21-A', 'Lahore', 'Pakistan', 54000, 1),
(35, 59, '21-A', 'Lahore', 'Pakistan', 54000, 0),
(36, 1, '21-A', 'Lahore', 'Pakistan', 54000, 1),
(37, 1, '21-A', 'Lahore', 'Pakistan', 54000, 0),
(38, 60, '21-A', 'Lahore', 'Pakistan', 54000, 1),
(39, 1, '21-A', 'Lahore', 'Pakistan', 54000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `customer_id_fk` int(11) NOT NULL,
  `order_quantity` int(3) NOT NULL DEFAULT '1',
  `product_id_FK` int(10) NOT NULL,
  `order_archived` tinyint(1) NOT NULL DEFAULT '1',
  `orderdetails_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `customer_id_fk`, `order_quantity`, `product_id_FK`, `order_archived`, `orderdetails_id_fk`) VALUES
(25, '2016-05-01', 57, 1, 3, 1, 31),
(26, '2016-05-01', 57, 1, 1, 1, 31),
(27, '2016-05-01', 57, 1, 1, 1, 31),
(28, '2016-05-01', 57, 1, 3, 1, 31),
(29, '2016-05-01', 57, 1, 11, 1, 31),
(30, '2016-05-01', 57, 1, 1, 1, 31),
(31, '2016-05-01', 57, 1, 6, 1, 31),
(32, '2016-05-01', 57, 1, 4, 1, 31),
(33, '2016-05-01', 25, 1, 2, 1, 32),
(34, '2016-05-01', 25, 1, 6, 1, 32),
(35, '2016-05-01', 5, 1, 3, 1, 33),
(36, '2016-05-01', 5, 1, 7, 1, 33),
(37, '2016-05-01', 58, 1, 2, 1, 34),
(38, '2016-05-07', 59, 1, 11, 1, 35),
(42, '2016-05-07', 1, 1, 1, 1, 37),
(44, '2016-05-08', 60, 1, 14, 1, 38),
(45, '2016-05-08', 60, 1, 4, 1, 0),
(48, '2016-05-10', 1, 1, 4, 1, 39),
(49, '2016-05-10', 1, 1, 1, 1, 39),
(50, '2016-05-10', 1, 1, 3, 1, 39),
(51, '2016-05-10', 1, 1, 2, 1, 39),
(52, '2016-05-10', 1, 1, 7, 1, 39);

-- --------------------------------------------------------

--
-- Table structure for table `ordertemp`
--

CREATE TABLE `ordertemp` (
  `order_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `customer_id_fk` int(11) NOT NULL,
  `order_quantity` int(5) NOT NULL DEFAULT '1',
  `product_id_FK` int(11) NOT NULL,
  `order_archiced` tinyint(1) DEFAULT '1',
  `orderdetails_id_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordertemp`
--

INSERT INTO `ordertemp` (`order_id`, `order_date`, `customer_id_fk`, `order_quantity`, `product_id_FK`, `order_archiced`, `orderdetails_id_fk`) VALUES
(42, '2016-05-08', 87, 1, 12, 1, NULL),
(43, '2016-05-08', 87, 1, 11, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(10) NOT NULL,
  `product_code` varchar(15) NOT NULL,
  `product_name` varchar(45) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `product_discription` varchar(250) NOT NULL,
  `category_id_FK` int(10) NOT NULL,
  `stores_id_FK` int(10) NOT NULL,
  `product_archived` tinyint(1) NOT NULL DEFAULT '1',
  `product_picture_name` varchar(50) DEFAULT NULL,
  `product_color` varchar(25) DEFAULT NULL,
  `product_brand` varchar(25) DEFAULT NULL,
  `product_type` varchar(30) NOT NULL DEFAULT 'Regular'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_code`, `product_name`, `product_price`, `product_discription`, `category_id_FK`, `stores_id_FK`, `product_archived`, `product_picture_name`, `product_color`, `product_brand`, `product_type`) VALUES
(1, '0001', 'Iphone', '60000.00', '6+ brand new.', 1, 1, 0, NULL, 'White', 'Iphone', 'Best Seller'),
(2, '002', 'shirt', '500.00', 'men polo shirt', 3, 2, 0, NULL, 'Black', 'Levise', 'Regular'),
(3, '5', 'samsung', '6.00', 'm', 1, 1, 1, NULL, 'White', 'Samsung', 'Regular'),
(4, '5', 'ipad', '6.00', '6 inch', 5, 1, 1, NULL, 'Black', 'Iphone', 'Regular'),
(6, '01', 'demo', '12.00', 'demo', 1, 1, 1, NULL, 'demo', 'demo', 'Regular'),
(7, '025', 'digital cam', '25000.00', '45MP', 9, 2, 1, '21008-DSLR-Cameras.jpg', 'Black', 'Cannon', 'Featured'),
(11, '032', 'DSLR Cannon', '120000.00', 'DSLR', 9, 1, 1, '21008-DSLR-Cameras.jpg', 'Black', 'Cannon', 'Regular'),
(12, '025', 'i7', '122233.00', '2GB,1TB', 4, 1, 0, '21008-DSLR-Cameras.jpg', 'White', 'Dell', 'Best Seller'),
(13, '021', 'demo', '12555.00', 'i5', 4, 2, 1, '21008-DSLR-Cameras.jpg', 'Black', 'HP', 'Regular'),
(14, '0254', 'HP paviion', '250000.00', 'i5', 3, 2, 0, NULL, 'White', 'HP', 'Latest'),
(15, '0254', 'Phone', '25600.00', '7 inch', 1, 1, 1, NULL, 'White', 'samsung', 'Hot product'),
(16, '112', 'table', '25000.00', 'lorem espum espa', 13, 2, 1, NULL, 'wood', 'kenwood', 'Regular');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shipping_id` int(11) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `shipping_city` varchar(25) NOT NULL,
  `shipping_country` varchar(25) NOT NULL,
  `shipping_postcode` int(5) DEFAULT NULL,
  `customer_id_FK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shipping_id`, `shipping_address`, `shipping_city`, `shipping_country`, `shipping_postcode`, `customer_id_FK`) VALUES
(29, '21-A', 'Lahore', 'Pakistan', 54000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `stores_id` int(10) NOT NULL,
  `stores_company_name` varchar(45) NOT NULL,
  `stores_contact` varchar(45) NOT NULL,
  `stores_location` varchar(75) NOT NULL,
  `stores_discription` varchar(50000) NOT NULL,
  `stores_archived` tinyint(1) NOT NULL DEFAULT '1',
  `stores_email` varchar(75) NOT NULL,
  `stores_title` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`stores_id`, `stores_company_name`, `stores_contact`, `stores_location`, `stores_discription`, `stores_archived`, `stores_email`, `stores_title`) VALUES
(1, 'united mobile', '03244925887', 'best', 'lorem espum ', 1, '', ''),
(2, 'futurevision', '111707707', 'agro flats Shadman', 'ad agency', 1, 'abc@123', 'together we can do it'),
(3, 'istore', '78965233', 'liberty', 'Apple', 1, '', ''),
(4, 'Levise', '021546987', 'Liberty', 'trending clothes', 1, '', ''),
(5, 'demo', '0321456789', 'Lahore', 'demo', 1, 'abc@gmail.com', 'Great stuff'),
(6, 'test', '03245', 'as', 'lorem espum espa', 0, 'asbd@example.com', 'hello world');

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`id`) VALUES
(87),
(88),
(89),
(90),
(97),
(98),
(99);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `user_username` varchar(45) NOT NULL,
  `user_password` varchar(45) NOT NULL,
  `customer_id_FK` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `customer_id_FK`) VALUES
(1, 'shaheer', '123', 1),
(2, '', '', 3),
(4, 'tabish', 'asdf', 5),
(5, 'aatir', 'mari', 6),
(6, 'hamza', 'asdfgh', 7),
(7, 'ahmed', 'asdfghjkl', 8),
(24, 'demo', 'demo', 25),
(25, 'demo1', 'demo', 26),
(26, 'demo11', 'a', 27),
(27, 'demo111', 'a', 28),
(28, 'demo123456', 'asdf', 29),
(29, 'aaaaa', 'aaaaa', 30),
(30, 'aaaaaa', 'a', 31),
(31, 'aaaaaaa', 'a', 32),
(32, 'asdf', 'asdf', 33),
(33, 'asdfa', 'a', 34),
(34, 'asdfaa', 'a', 35),
(35, 'faseeh', 'a', 36),
(36, 'shaheerulazeem', '123456', 37),
(37, 'a1', 'a1', 38),
(38, 'a11', 'qa', 39),
(39, 'a2', 'a2', 40),
(40, 'a23', 'a', 41),
(41, 'muneeb', 'muneeb', 42),
(42, 'muneeba', 'aa', 43),
(43, 'qwe', 'qwe', 44),
(44, '1a', '12', 45),
(45, '123', '123', 46),
(47, '123321', '1', 48),
(49, '1as', '1as', 50),
(50, 'asd47', 'asd', 51),
(51, '39', '39', 52),
(52, '40', '40', 54),
(53, '41', '41', 55),
(54, '45', '45', 56),
(55, 'shaheerazeem', 'asdfgh', 57),
(56, 'new', 'new', 58),
(57, 'new1', '123', 59),
(58, '123456', '123456', 60),
(59, 'r', 't', 61);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`orderdetails_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `ordertemp`
--
ALTER TABLE `ordertemp`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`stores_id`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_username` (`user_username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `orderdetails_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `ordertemp`
--
ALTER TABLE `ordertemp`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `stores_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
