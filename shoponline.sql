-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2021 at 05:13 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoponline`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `personid` int(11) NOT NULL,
  `salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`personid`, `salary`) VALUES
(2, 20000000),
(3, 93);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `personid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `deliveryid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`personid`, `productid`, `quantity`, `cost`, `deliveryid`) VALUES
(5, 1, 1, 75000, 2),
(6, 1, 3, 225000, 3),
(6, 1, 1, 75000, 4),
(6, 1, 1, 75000, 5),
(6, 2, 2, 50000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `personid` int(11) NOT NULL,
  `paymentPreference` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`personid`, `paymentPreference`) VALUES
(1, 'Credit Card'),
(4, 'Cash on Delivery'),
(5, 'Cash On Delivery'),
(6, 'Cash on Delivery');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `deliveryid` int(11) NOT NULL,
  `personid` int(11) NOT NULL,
  `deliveryStatus` varchar(50) NOT NULL DEFAULT 'Order Placed',
  `deliveryDate` date DEFAULT current_timestamp(),
  `totalCost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`deliveryid`, `personid`, `deliveryStatus`, `deliveryDate`, `totalCost`) VALUES
(1, 4, 'Requested Cancellation', '2020-10-30', 150000),
(2, 5, 'Order Canceled', '2020-11-30', 75000),
(3, 6, 'Shipping', '2020-12-04', 225000),
(4, 6, 'Order Placed', '2020-11-30', 75000),
(5, 6, 'Order Canceled', '2020-11-13', 125000);

-- --------------------------------------------------------

--
-- Table structure for table `persons`
--

CREATE TABLE `persons` (
  `personid` int(11) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `accesslevel` varchar(15) NOT NULL,
  `accountpassword` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `phoneno` bigint(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `persons`
--

INSERT INTO `persons` (`personid`, `fname`, `lname`, `accesslevel`, `accountpassword`, `dob`, `phoneno`, `email`, `address`) VALUES
(1, 'Sandeep', 'Rajakrishnan', 'customer', 'testPass', '2020-11-12', 9876543190, 'sandur43@gmail.com', 'Cbe, India'),
(2, 'Sudhay', 'S', 'admin', 'testAdmin', '2020-11-13', 9876542321, 'sudhay2001@gmail.com', 'India'),
(3, 'Raswanth', 'Rajangam', 'admin', 'scamPassword', '2020-10-30', 9361309533, 'raswanth8901@gmail.com', 'G2, Anant Jothi apartments, west ramalingam road, '),
(4, 'Tarun', 'KB', 'customer', 'tarunPassword', '2020-11-01', 9876543210, 'kbtarun2002@gmail.com', 'Salem, India'),
(5, 'Sam', 'Anderson', 'customer', 'samPassword', '2020-12-02', 9876543210, 'sam@gmail.com', 'India'),
(6, 'John', 'Doe', 'customer', 'testPassword', '2003-01-22', 9876421949, 'john@gmail.com', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productID` int(11) NOT NULL,
  `productName` varchar(200) NOT NULL,
  `productPrice` int(11) NOT NULL,
  `productStock` int(11) NOT NULL,
  `productDescription` varchar(200) NOT NULL,
  `productCap` int(11) NOT NULL,
  `productPhoto` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productID`, `productName`, `productPrice`, `productStock`, `productDescription`, `productCap`, `productPhoto`) VALUES
(1, 'iPhone 12 Pro', 75000, 797, 'A14 Bionic', 4, 'https://store.storeimages.cdn-apple.com/4668/as-images.apple.com/is/iphone-12-pro-family-hero?wid=940&amp;hei=1112&amp;fmt=jpeg&amp;qlt=80&amp;op_usm=0.5,0.5&amp;.v=1604021663000'),
(2, 'Airpods Pro', 25000, 896, 'Best Sound', 7, 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/MWP22?wid=2000&hei=2000&fmt=jpeg&qlt=95&op_usm=0.5,0.5&.v=1591634795000'),
(3, 'iPad Pro', 200000, 398, 'Best iPad you can find', 5, 'https://store.storeimages.cdn-apple.com/4982/as-images.apple.com/is/ipad-pro-12-select-wifi-silver-202003_FMT_WHH?wid=1945&hei=2000&fmt=jpeg&qlt=95&op_usm=0.5,0.5&.v=1583551131102');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`personid`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`personid`,`productid`,`deliveryid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`personid`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`deliveryid`);

--
-- Indexes for table `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`personid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `deliveryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `persons`
--
ALTER TABLE `persons`
  MODIFY `personid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
