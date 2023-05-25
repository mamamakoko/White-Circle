-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 01:58 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `white_circle`
--
CREATE DATABASE IF NOT EXISTS `white_circle` DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci;
USE `white_circle`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `Admin_ID` int(10) NOT NULL,
  `Admin_Profile` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `Admin_Email` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `Admin_Password` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `Admin_Phone` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `Admin_FirstName` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `Admin_LastName` varchar(45) COLLATE utf8_czech_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `Admin_Profile`, `Admin_Email`, `Admin_Password`, `Admin_Phone`, `Admin_FirstName`, `Admin_LastName`) VALUES
(1, 'Admin.png', 'jonagal@my.cspc.edu.ph', 'f925916e2754e5e03f75dd58a5733251', '09095803400', 'John Llenard', 'Nagal');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `Cart_ID` int(10) NOT NULL,
  `Customers_ID` int(10) NOT NULL,
  `Product_ID` int(10) NOT NULL,
  `Cart_Quantity` int(10) NOT NULL,
  `create_time` timestamp NULL DEFAULT current_timestamp(),
  `update_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Cart_ID`, `Customers_ID`, `Product_ID`, `Cart_Quantity`, `create_time`, `update_time`) VALUES
(1, 1, 27, 3, '2023-04-18 20:41:04', NULL),
(2, 1, 29, 1, '2023-04-18 20:41:04', NULL),
(3, 1, 30, 1, '2023-04-18 20:42:08', NULL),
(4, 1, 31, 11, '2023-04-18 20:42:08', NULL),
(5, 1, 32, 1, '2023-04-18 20:42:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `Categories_ID` int(10) NOT NULL,
  `Categories_Name` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `create_time` timestamp NULL DEFAULT current_timestamp(),
  `update_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Categories_ID`, `Categories_Name`, `create_time`, `update_time`) VALUES
(1, 'Backpack', '2023-05-06 16:57:47', NULL),
(2, 'Messenger Bag', '2023-05-06 16:58:00', '2023-05-24 06:24:52'),
(3, 'School Bag', '2023-05-06 16:58:13', NULL),
(4, 'Sling Bag', '2023-05-06 16:58:22', '2023-05-24 06:24:59'),
(5, 'Tote Bag', '2023-05-06 16:58:30', '2023-05-24 06:25:07');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `Customers_ID` int(10) NOT NULL,
  `Customer_Profile` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `Customers_Email` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `Customers_Password` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `Customers_Phone` varchar(11) COLLATE utf8_czech_ci NOT NULL,
  `Customers_FirstName` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `Customers_LastName` varchar(45) COLLATE utf8_czech_ci NOT NULL,
  `create_time` timestamp NULL DEFAULT current_timestamp(),
  `update_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`Customers_ID`, `Customer_Profile`, `Customers_Email`, `Customers_Password`, `Customers_Phone`, `Customers_FirstName`, `Customers_LastName`, `create_time`, `update_time`) VALUES
(1, '', 'jonagal@my.cspc.edu.ph', '123456789', '09092317038', 'John Llenard', 'Nagal', '2023-04-18 20:38:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `Product_ID` int(10) NOT NULL,
  `Categories_ID` int(10) NOT NULL,
  `Product_Name` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `Product_Path` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `Product_Price` decimal(10,2) NOT NULL,
  `Product_Weight` decimal(10,2) NOT NULL,
  `Product_Thumbnail` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `Product_Stock` int(11) NOT NULL,
  `Product_Description` text COLLATE utf8_czech_ci NOT NULL,
  `create_time` timestamp NULL DEFAULT current_timestamp(),
  `update_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Product_ID`, `Categories_ID`, `Product_Name`, `Product_Path`, `Product_Price`, `Product_Weight`, `Product_Thumbnail`, `Product_Stock`, `Product_Description`, `create_time`, `update_time`) VALUES
(1, 3, 'Doughnut bag', 'Doughnut bag1', '400.00', '43.00', '895330b79ae3790d249bfe4da673b788.jpg', 0, 'Welcome to our no style shop！\r\nIn stock, we ship directly from Manila warehouse!\r\nAfter placing the order, arrange delivery 24 hours!\r\n1-2 days in the province and 3-7 days outside the province\r\nFollow our store to get more discount\r\nSIZE：\r\nbackpack：\r\nHeight 40CM * Width 18CM *Length 27CM\r\nStore Highlights\r\nOrder now！Chance to get free gifts\r\nOrder will be checked and packed nicely before sending out\r\nOrder will be shipped out in 24 hours after purchase (exclude weekends and public holiday) \r\n\r\nNote:\r\n1. Please allow 1-3 cm measurement difference due to manual measurement method and also batch difference.\r\n\r\n2. Colour may be different due to different screen display setting / batch difference\r\n\r\n3. Picture may look bigger than actual. Please refer to the dimension for more accurate measurement.', '2023-05-09 08:16:30', '2023-05-24 11:49:34'),
(2, 3, 'Homer Bags', 'Homer bags1', '120.00', '43.00', '1bfe70f8e4b4821a8b9cde57ae0350c9.jpg', 0, 'Description:\r\n• Bag size: Middle\r\n• Package internal structure: Zipper pockets, mobile phone pockets, document pockets, computer pockets\r\n• Opening method: Zipper\r\n• Applicable gender :Female\r\n• Material: PU leather\r\n• With lock: Yes\r\n• Function: Breathable, waterproof, wear-resistant, capacity expansion, load reduction\r\n• Processing methods: Soft side\r\n• Hardness: Soft\r\n• Lining texture: Polyester\r\n• Types of accessories: Handle\r\n• Number of shoulder straps: Double root\r\n• Popular elements: Sewing thread\r\n• Carrying parts: Soft handle\r\nPackage Included:\r\n• 1 pc x Backpack', '2023-05-09 08:20:53', '2023-05-25 11:34:23'),
(3, 3, 'How ru', 'How ru1', '595.00', '80.00', '2c36453d8b680ca669bd291717224e79.jpg', 58, 'ORIGINAL HOWRU BAGS\r\n\r\n➖ALL ITEMS ARE ONHAND\r\n➖COD AVAILABLE\r\n➖GUARANTEE NO DAMAGE\r\n➖FAST SHIPPING\r\n➖CHECK OUT NOW SHIP 1-2DAYS!\r\n\r\n❌WE MAY NOT ABLE TO CANCEL ORDERS, PLEASE MAKE SURE THEN PLACE ORDER.\r\n\r\nIF YOU ARE SATISFIED, PLEASE GIVE US 5STAR FEEDBACK .. ⭐⭐⭐⭐⭐\r\n\r\nThank you so much! GodbLess..', '2023-05-09 08:24:14', '2023-05-09 12:29:37'),
(4, 3, 'Japanese Schoolbag', 'Japanese Schoolbag1', '250.00', '280.00', '4c6725d646b4bc344c2bbc84f8f54941.jpg', 50, '???? Welcome to DMY.BAG\r\n\r\n???? All products have been carefully checked before delivery, please feel free to buy\r\n\r\n???? Product description:\r\n\r\n\r\n\r\nMaterial: nylon\r\n\r\nLarge capacity: 30-35L\r\n\r\nWhether waterproof: waterproof\r\n\r\nOpening method: zipper\r\n\r\nLength, width and height: 30 * 14 * 42CM\r\n\r\nColor: off white, purple, black\r\n\r\nInterior space: multiple compartments\r\n\r\nComputer size: 15.6 inches\r\n\r\nCubicle with or without computer: Yes\r\n\r\n\r\n\r\n???? If you have any questions or concerns, please contact our customer service personnel, and we will provide the best service\r\n\r\n???? Enjoy your shopping', '2023-05-09 08:32:20', '2023-05-09 12:29:25'),
(5, 3, 'Starbucks bags', 'Starbucks bags1', '456.46', '280.00', '17ef84d398cb087c8f1f5276da7689f2.jpg', 65, 'SIZE : Can fit a 14-inch laptop\r\n\r\nLength: 30cm\r\nWidth: 14cm\r\nHeight: 43cm\r\n\r\n\r\n\r\n\r\n\r\nFeedback\r\n1. Please kindly leave a positive feedback ( 5 stars if you are satisfied with our items\r\n2. Please contact us before leaving any negative feedback or open a dispute on SHOPEE\r\n3. Please give us the opportunity to resolve any problem.\r\n\r\nService\r\n1. The items are 100% new. We offer the best item at the best price\r\n2.If the items you received is defective, please contact us immediately', '2023-05-09 08:37:11', '2023-05-09 12:30:33'),
(6, 4, 'Abeco', 'Abeco1', '400.00', '43.00', 'bed5471945edb0e9c2b1fc25dc5986cd.jpg', 95, 'size 22*16CM\r\n\r\nMaterials : leather\r\nOccasion: Casual\r\nBrand: Korean brand \r\nWeight: 0.25Kg\r\nStyle: Shoulder bag sling bag\r\n\r\nBrand new\r\nGood Quality\r\nDesigned for your convenience\r\nPlease allow 1-3cm differences in product measurement\r\nDue to different computer monitors/calibrations colors may vary slightly from the picture\r\n\r\n#bagsupplier  \r\n#chestbag\r\n#beltbag\r\n#shoulderbag#anello#sale  #koreanfashion \r\nCongratulations!!You found a Factory Direct Shop!！\r\n\r\nKindly follow us and view our shop for more of the cheapest products in market!!????\r\n\r\n✔️The cheapest products of same quality.????\r\n✔️All product are onhand.????\r\n✔️All actual photos.????\r\n✔️All the products are in stock unless it is marked is sold out.????\r\n✔️Free shipping/COD available.\r\n✔️Please select the colors variations then place order,Because we can&#39;t accept the remark or message color request.（If the variation indicate:&#34;Random or Assorted&#34;,It means we decide the color)❗️\r\n✔️⚠️We may not able to cancel some orders, please make sure then place orders.⚠️\r\n✔️Support retail and wholesale.(If there is a mark &#34;wholesale&#34;）\r\n✔️????Ship out the orders within 3 days.\r\n\r\n♻️After-sales service ：\r\n\r\nCheck your parcel when u receive it,If have any problems,Please  contact us and we will make refund.\r\n\r\n\r\n    Thank u very much!', '2023-05-09 08:41:07', '2023-05-09 12:30:03'),
(7, 4, 'Korean Circle bags', 'Korean Circle bags1', '75.00', '43.00', '5c0e658fc702c675305ab6ea367001f9.jpg', 60, 'Kindly follow us and view our shop for more of the cheapest products in market!\r\n\r\n✅Please ask first the availability of the product before placing your order. Free to chat with us for your inquiries.  \r\n✅STRICTLY NO CANCELLATION OF ORDER! Once it has confirmed for shipping by Shopee.\r\n✅We make sure that all our products are in good condition and well packed before handling them to the courier.  \r\n✅We are not RESPONSIBLE for doing due to mishandling of the courier. \r\n✅Be Considerate \r\n\r\n❗️Please note that your COD address is correct, thank you.\r\n❗️After receiving the goods, please give me five-star praise.\r\n\r\n???? ship out the orders within 1-2days.\r\n\r\n️As long as it is easy to damage the product, I will carry on the safe packing for him, please rest assured\r\n\r\nHAPPY ENJOY SHOPPING！！THANKS EVERY BODY', '2023-05-09 08:45:10', '2023-05-09 12:30:21'),
(8, 4, 'Yco bags', 'Yco bags1', '233.00', '43.00', '6e30a74867a02cfbc660bdfccf9478bf.jpg', 40, 'size 7inches\r\nMaterials : leather \r\nOccasion: Casual\r\n Brand: Korean brand \r\nWeight: 0.25Kg \r\nStyle: Shoulder bag sling bag\r\n\r\n Brand new \r\nGood Quality \r\nDesigned for your convenience \r\nPlease allow 1-3cm differences in product measurement \r\nDue to different computer monitors/calibrations colors may vary slightly from the picture\r\n\r\n Congratulations!! You found a factory direct Shop!! \r\nYco shop was rated 4.9 by buyers, the quality and service are worthy of your trust!\r\n\r\n Kindly follow us and view YQY shop for more of the best quality and price products!!\r\n\r\n ✔Yco shop offer a good quality item at the most affordable price. \r\n✔Ship out the orders within 24 hours. \r\n✔All products are on hand. \r\n✔All actual photos.\r\n ✔All the products are in stock unless it is marked is sold out. \r\n✔Free shipping/COD available. \r\n✔Please select the variations then place order,Because we can&#39;t accept the remark or message color request.（If the variation indicate:&#34;Random or Assorted&#34;,It means color is randomly chosen)\r\n\r\n ⚠We can&#39;t cancel the orders, please make sure then place orders.⚠\r\n\r\n ♻After-sales service ： \r\nCheck your parcel carefully before you click &#34;ORDER RECEIVED&#34;, If have any problems found, please contact us and we will make it thru shopee refund only. We cannot and will not accomodate when the status already &#34;COMPLETED&#34;. \r\n\r\nAll &#34;RETURN/REFUND&#34; will be reviewed by CCTV, Proven Scammer Will be Reported and not be Tolerated. Do your part to send the WAYBILL Attached in parcel during request. Thank u very much! \r\n\r\n#branded #ladiesbag #cutebag #bagswomen #bagsforwomen #fashionbag #koreanbag #bags #bag #codbags #freeshipping #travelbag #shoulderbag #slingbag\r\n\r\nWelcome to our store, we are happy to serve you.\r\nnotes:\r\nOur shop ships from Manila, Manila 2-3 days, Luzon 3-5 days, other islands (including Mindanao) 6-10 days, if you don&#39;t have enough time to wait, please don&#39;t order,\r\nIf you like this product, please share what you want with your family, friends, loved ones. Please help us shine 5 stars.\r\nIf you change your mind and don&#39;t want the item, please let us know before the rider picks it up. Please do not refuse to sign for the goods, it will affect your credit for future purchases, and your COD function will be turned off.', '2023-05-09 09:01:19', NULL),
(9, 4, 'Yvon bags', 'Yvon bags1', '120.00', '43.00', '465f88906aac2418fa222b793245da2d.jpg', 55, 'size 7 inches\r\n\r\nMaterials : leather\r\nOccasion: Casual\r\nBrand: Korean brand \r\nWeight: 0.35Kg\r\nStyle:   handbag Sling bag\r\n\r\nBrand new\r\nGood Quality\r\nDesigned for your convenience\r\nPlease allow 1-3cm differences in product measurement\r\nDue to different computer monitors/calibrations colors may vary slightly from the picture\r\n\r\nBrand new\r\nGood Quality\r\nDesigned for your convenience\r\nPlease allow 1-3cm differences in product measurement\r\nDue to different computer monitors/calibrations colors may vary slightly from the picture\r\n\r\nCongratulations!! You found a factory direct Shop!!\r\n\r\nYQY shop was rated 4.9 by buyers, the quality and service are worthy of your trust!!\r\n\r\nKindly follow us and view YQY shop for more of the best quality and price products!!\r\n\r\n✔️YQY shop offer a good quality item at the most affordable price.\r\n✔️Ship out the orders within 24 hours.\r\n✔️All products are on hand.\r\n✔️All actual photos.\r\n✔️All the products are in stock unless it is marked is sold out.\r\n✔️Free shipping/COD available.\r\n✔️Please select the variations then place order,Because we can&#39;t accept the remark or message color request.（If the variation indicate:&#34;Random or Assorted&#34;,It means color is randomly chosen)\r\n\r\n⚠️We can&#39;t cancel the orders, please make sure then place orders.⚠️\r\n\r\n♻️After-sales service ：\r\n\r\nCheck your parcel carefully before you click &#34;ORDER RECEIVED&#34;, If have any problems found, please contact us and we will make it thru shopee refund only. We cannot and will not accomodate when the status already &#34;COMPLETED&#34;.\r\n\r\nAll &#34;RETURN/REFUND&#34; will be reviewed by CCTV, Proven Scammer Will be Reported and not be Tolerated.\r\nDo your part to send the WAYBILL Attached in parcel during request.\r\n\r\nThank u very much!  \r\n            \r\n#branded #ladiesbag #cutebag #bagswomen #bagsforwomen #fashionbag #koreanbag #bags #bag #codbags #freeshipping #travelbag #shoulderbag #slingbag', '2023-05-09 09:07:57', '2023-05-09 12:31:03'),
(10, 4, 'YZ Korean Bags', 'YZ Korean Bags1', '120.00', '43.00', '9a523ebe2aeb4e886bb10bfc17b6bdfd.jpg', 38, 'BAG SIZE: L-19cm W-8cm H-16cm Sling 120cm\r\n\r\nENJOY FREE SHIPPING & CASH ON DELIVERY FOR A MINIMUM PURCHASE OF 249 PESOS ONLY ????????\r\n\r\n✅EARN LOTS OF SHOPEE COINS\r\n✅CASH ON DELIVERY\r\n✅ONHAND AND READY TO SHIP\r\n✅PAY TODAY SHIP TOMORROW\r\n\r\n\r\nNOTE: WRONG PLACEMENT OF SHIPPING FEE WILL NOT BE PROCESS\r\n\r\nDELIVERY PERIOD:\r\n???? 4-10 Days\r\nPLEASE READ CAREFULLY BEFORE PLACING AN ORDER/S ⬇️\r\n \r\n✔️ALL ITEMS ARE AVAILABLE UNLESS MARKED AS &#34;SOLD OUT&#34;\r\n✔CHOOSE THE CORRECT VARATION IF THE ITEMS HAS DIFFERENT COLORS/PRINTS SO WE CAN AVOID MISTAKES\r\n✔WE ACCEPT RETURNS IF THE ITEM IS NOT YET WORN OR USED. BUYER WILL SHOULDER THE RETURN SHIPPING COST\r\n\r\nLIKE & FOLLOW US FOR UPDATES! ????????\r\nHAPPY SHOPEE-ING! ????\r\n\r\n1.Service\r\n(1)All of our items are as stated in their descriptions.\r\n(2)the items are 100% new,we offer the best product at the best price.\r\n(3)If the item you received is defective, please contact us immediately. \r\n\r\nAllows use of Shopee promo codes for your security & more savings!\r\n\r\nFeedback\r\n(1)Please kindly leave us a positive feedback (5 stars) , if you are satisfied with our items.\r\nAnd you could share with your friends on  Facebook, Twitter...Thanks\r\n(2)Please contact us before leaving any negative feedback or open a dispute on Shopee.\r\n(3)Please give us the opportunity to resolve any problem.\r\n#bag #slingbag #bags #koreanbag #freeshipping #shoulderbag #ladiesbag #branded #fashion #Fashionbag #cutebag #cod #codbags #sale #yazi #koreanfashion #koreanslingbag #korean #koreanbags #bagswomen #leatherbag #bestseller', '2023-05-09 09:12:31', NULL),
(11, 5, 'Canvas Bags', 'Canvas bags1', '89.00', '43.00', '564d0b89dc9c27e861e3f507efa51f1d.jpg', 30, 'Size : L*35cm  H*24cm  W*10cm.\r\n\r\nCongratulations!! You found a factory direct Shop!!\r\n\r\nMumu shop was rated 4.9 by buyers, the quality and service are worthy of your trust!!\r\n\r\nKindly follow us and view Mumu shop for more of the best quality and price products!!\r\n\r\n✔️Mumu shop offer a good quality item at the most affordable price.\r\n✔️Ship out the orders within 24 hours.\r\n✔️All products are on hand.\r\n✔️All actual photos.\r\n✔️All the products are in stock unless it is marked is sold out.\r\n✔️Free shipping/COD available.\r\n✔️Please select the correct variation then place order, Because we can&#39;t accept the remark or message color request.（If the variation indicate:&#34;Random or Assorted&#34;,It means color is randomly chosen)\r\n\r\n⚠️We can&#39;t cancel the orders, please make sure then place orders.⚠️\r\n\r\n♻️After-sales service ：\r\n\r\nCheck your parcel carefully before you click &#34;ORDER RECEIVED&#34;, If have any problems found, Please contact us and we will make it thru shopee refund only. We can&#39;t and will not accomodate when the status already &#34;COMPLETED&#34;.\r\n\r\nAll &#34;RETURN/REFUND&#34; will be reviewed by CCTV, Proven Scammer Will be Reported and not be Tolerated.\r\nDo your part to send the WAYBILL Attached in parcel during request.\r\n\r\nThank u very much!  \r\n            \r\n #Mumu #limco #mumubags #bagsmumu #mumumura #branded #ladiesbag #cutebag #bagswomen #bagsforwomen #fashionbag #koreanbag #bags #bag #codbags #freeshipping #travelbag #shoulderbag #totebag', '2023-05-09 09:19:45', '2023-05-24 06:27:49'),
(12, 5, 'Korean Tote Bags', 'Korean Tote bags1', '120.00', '80.00', '1f7a42087a95057e1104af6d6e859f94.jpg', 40, 'Size : L*35cm  H*24cm  W*10cm.\r\n\r\nCongratulations!! You found a factory direct Shop!!\r\n\r\nMumu shop was rated 4.9 by buyers, the quality and service are worthy of your trust!!\r\n\r\nKindly follow us and view Mumu shop for more of the best quality and price products!!\r\n\r\n✔️Mumu shop offer a good quality item at the most affordable price.\r\n✔️Ship out the orders within 24 hours.\r\n✔️All products are on hand.\r\n✔️All actual photos.\r\n✔️All the products are in stock unless it is marked is sold out.\r\n✔️Free shipping/COD available.\r\n✔️Please select the correct variation then place order, Because we can&#39;t accept the remark or message color request.（If the variation indicate:&#34;Random or Assorted&#34;,It means color is randomly chosen)\r\n\r\n⚠️We can&#39;t cancel the orders, please make sure then place orders.⚠️\r\n\r\n♻️After-sales service ：\r\n\r\nCheck your parcel carefully before you click &#34;ORDER RECEIVED&#34;, If have any problems found, Please contact us and we will make it thru shopee refund only. We can&#39;t and will not accomodate when the status already &#34;COMPLETED&#34;.\r\n\r\nAll &#34;RETURN/REFUND&#34; will be reviewed by CCTV, Proven Scammer Will be Reported and not be Tolerated.\r\nDo your part to send the WAYBILL Attached in parcel during request.\r\n\r\nThank u very much!  \r\n            \r\n #Mumu #limco #mumubags #bagsmumu #mumumura #branded #ladiesbag #cutebag #bagswomen #bagsforwomen #fashionbag #koreanbag #bags #bag #codbags #freeshipping #travelbag #shoulderbag #totebag', '2023-05-09 09:21:39', '2023-05-24 09:06:06'),
(13, 5, 'Leisure bags', 'Leisure bags1', '220.00', '43.00', 'd10000783e9e1c8e38f89c8ed5526a4d.jpg', 47, 'Welcome to Fionfashion shop\r\n✔️????Ship out the orders within 24 hours.\r\n✔️All product are on hand.????\r\n✔️All actual photos.????\r\n✔️All the products are in stock unless it is marked is sold out.????\r\n✔️Free shipping/COD available.\r\n✔️Please select the variations then place order,Because we can&#39;t accept the remark or message color request.（If the variation indicate:&#34;Random or Assorted&#34;,It means color is randomly chosen)❗️\r\n✔️⚠️We may not able to cancel some orders, please make sure then place orders.⚠️\r\n\r\n♻️After-sales service ：\r\n\r\nCheck your parcel carefully before you click &#34;ORDER RECEIVED&#34;, If have any problems found, please contact us and we will make it thru shopee refund ONLY. We cannot and will not accomodate when the status already &#34;COMPLETED&#34;.\r\n\r\nALL RETURN/REFUND will be reviewed by CCTV. Proven SCAMMER WILL BE REPORTED and NOT BE TOLERATED.\r\nDO YOUR PART TO SEND THE WAYBILL ATTACHED IN PARCEL DURING REQUEST.\r\n\r\n\r\n    Thank u very much!  \r\n                                -Ur trustable friend - Fionfashion shop????', '2023-05-09 09:35:14', NULL),
(14, 5, 'Mumus bags', 'Mumus bags1', '120.00', '43.00', '617c7a46829ff20abc77e2bd58bcc956.jpg', 44, 'Size : L*36cm  H*31cm  W*8cm.\r\n\r\nAccept bulk orders, send us a message for more details!!\r\n\r\nCongratulations!! You found a factory direct Shop!!\r\n\r\nMumu shop was rated 4.9 by buyers, the quality and service are worthy of your trust!!\r\n\r\nKindly follow us and view Mumu shop for more of the best quality and price products!!\r\n\r\n✔️Mumu shop offer a good quality item at the most affordable price.\r\n✔️Ship out the orders within 24 hours.\r\n✔️All products are on hand.\r\n✔️All actual photos.\r\n✔️All the products are in stock unless it is marked is sold out.\r\n✔️Free shipping/COD available.\r\n✔️Please select the correct variation then place order, Because we can&#39;t accept the remark or message color request.（If the variation indicate:&#34;Random or Assorted&#34;,It means color is randomly chosen)\r\n\r\n⚠️We can&#39;t cancel the orders, please make sure then place orders.⚠️\r\n\r\n♻️After-sales service ：\r\n\r\nCheck your parcel carefully before you click &#34;ORDER RECEIVED&#34;, If have any problems found, Please contact us and we will make it thru shopee refund only. We can&#39;t and will not accomodate when the status already &#34;COMPLETED&#34;.\r\n\r\nAll &#34;RETURN/REFUND&#34; will be reviewed by CCTV, Proven Scammer Will be Reported and not be Tolerated.\r\nDo your part to send the WAYBILL Attached in parcel during request.\r\n\r\nThank u very much!  \r\n            \r\n #Mumu #limco #mumubags #bagsmumu #mumumura #branded #COD #gift #sale #fashion #ootd #affordable #highquality #freeshipping #ladiesbag #cutebag #bagswomen #bagforwoman #bagsforwomen #fashionbag #koreanbag #bags #bag #codbags  #travelbag #shoulderbag  #totebag #slingbag', '2023-05-09 09:37:32', NULL),
(15, 5, 'Printed Canvas', 'Printed Canvas1', '120.00', '43.00', 'c1979fa4046915f5cb836074dee3389a.jpg', 35, 'Size : L*38cm  H*32cm.\r\n\r\nCongratulations!! You found a factory direct Shop!!\r\n\r\n\r\n-We are Factory Direct Supplier .\r\n-The most Competitive prices available in the\r\n market.\r\nPlease read carefully before placing an oders\r\n\r\n-We ship out order in 1-2 days only. Orders take 2-5 days to deliver within Metro Manila and nearby provinces, and over a week for North/South Luzon, Visayas and Mindanao.\r\nFeedback\r\n\r\n-If the item you received is defective ,please contact us immediately!\r\n-Kindly follow our shop to join promotion and get more discount voucher!\r\nENJOY SHOPPING', '2023-05-09 09:40:26', NULL),
(17, 1, 'Hawk bag', 'Hawk bag1', '456.46', '43.00', 'bdf938b2de2e001aeb7d30e73cbdcfd0.jpg', 85, 'CASH ON DELIVERY\r\nONHAND AND READY TO SHIP\r\nPAY TODAY SHIP TOMORROW\r\nNOTE: WRONG PLACEMENT OF SHIPPING FEE WILL NOT BE PROCESS DELIVERY PERIOD:\r\n1-2 days Metro Manila\r\n3-4 days Provincial\r\n\r\nPLEASE READ CAREFULLY BEFORE PLACING AN ORDER/S ALL ITEMS ARE AVAILABLE UNLESS MARKED AS &#34;SOLD OUT&#34;\r\nCHOOSE THE CORRECT VARATION IF THE ITEMS HAS DIFFERENT COLORS/PRINTS SO WE CAN AVOID MISTAKES\r\nWE ACCEPT RETURNS IF THE ITEM IS NOT YET WORN OR USED. BUYER WILL SHOULDER THE RETURN SHIPPING COST\r\nLIKE & FOLLOW US FOR UPDATES!\r\n\r\nService\r\n(1)All of our items are as stated in their descriptions.\r\n(2)the items are 100% new,we offer the best product at the best price.\r\n(3)If the item you received is defective, please contact us immediately.\r\n(4)All of our items are as stated in their descriptions.\r\n(5)the items are 100% new,we offer the best product at the best price.\r\n(6)If the item you received is defective, please contact us immediately.', '2023-05-09 12:14:05', '2023-05-09 12:28:43'),
(18, 1, '247 bag', '247 bag1', '456.46', '280.00', '7c21e58b955432a4a8faab8db8bd36e4.jpg', 59, '>Lowest price for the best quality\r\n>Please do not hesitate to contact us if you have any questions or concerns.\r\n>There is no way to cancel an order once it has been shipped out.\r\n>Actual photos have been uploaded.\r\n>Please be aware of the difference in lighting.\r\n>Once you have ordered and the color is not available, we will change the color of your order.\r\n\r\nHAPPY SHOPPING!\r\n\r\nNote:\r\n1. The real color of the item may be slightly different from the pictures shown on website caused by many factors such as brightness of your monitor and light brightness.\r\n2. Please allow slight manual measurement deviation from the data.\r\n\r\nAffordable, Fashionable, fashion trend, soft handle, solid color', '2023-05-09 12:16:48', NULL),
(19, 1, 'M2 bag', 'M2 bag1', '250.00', '280.00', 'a224a5ad1421f586685184de5bc0ee56.jpg', 76, 'GOOD QUALITY ✔\r\nWHOLESALE ✔\r\nOPEN FOR RESELLERS ✔\r\nVERY AFFORDABLE PRICE ✔\r\nSUPPLIERS✔\r\nHow to Order?\r\n1. Tap Add to Cart / Buy Now then Check out to place an order.\r\n2. Fill out your information (Complete name, complete address and mobile number)\r\n3. Choose Shipping option ( Default is LBC Integrated)\r\n4. Choose payment option (All via Shopee). We offer Cash on Delivery, remittance and bank transfer options.\r\n5. Confirm the order.\r\nOnce you receive the item, don&#39;t forget to confirm that the order has been received.\r\n—————————————————————————\r\nSelected good quality and affordable items but don&#39;t expect that the items are perfect since they didn&#39;t go through the usual Quality Check being done on items sold in malls. Items are way cheaper, though, and are really worth the price.\r\nNo rush shipping, please. We try to ship the items as fast as we can but due to bulk orders, there could be delays.\r\nWe won&#39;t be able to track all your orders and we are not LIABLE for delayed deliveries as we always ship orders within the timeframe stated in the post.\r\nWe stay away from demanding and rude buyers so if you are blocked, that means we avoid transacting with you.\r\n5 star rating = 5 star.\r\n1 star rating = 1 star + block. 1 star rating means that this shop is not for you. If you have problems with the item/s, let us know first before you rate as we can still negotiate. Also, before you order, read the description and shop rules. \r\n======================\r\nThank you and Happy Shopping!', '2023-05-09 12:19:43', NULL),
(20, 1, 'Korean bag', 'Korean bag1', '456.46', '280.00', 'b05183cd84309a1be9e69b737f5d452a.jpg', 64, 'Dear friend, welcome to the August store!\r\nWe manufacture high quality premium products and ship directly from Manila.\r\nProducts are carefully selected, high quality,  cost-effective!\r\nEverything is new and in good condition\r\nQuality inspection before shipment\r\nFollow us, promotion and new arrival every day in our shop.\r\n----------------------------------------------------------------------------------------------\r\nProduct Information：\r\n●Specifications ：\r\nPacket Length ▏Package Width ▏Bag High ▏Package Weight\r\n        30cm                13cm             45cm         0.43kg\r\n▶Acceptable Computer Size：15.6Inch\r\n▶ Material ： Nylon\r\n\r\n●Texture：Nylon\r\n●Style：Japanese and Korean-Style\r\n●Acceptable Computer Size：15.6Inch\r\n●Waterproof Performance：Anti-Spillage\r\n●Lining：Polyester（Polyester Fiber）\r\n▲Fabric：Anti-Spillage Thick Fabric\r\n\r\n\r\n\r\n【Notes】 \r\n1.There is 2-3CM difference according to manual measurement.(1 inch = 2.54 cm)\r\n2.Slight color difference should be acceptable due to the light and screen.\r\n3.Please check the figures carefully and order the right size, don&#39;t completely depend on the &#34; size advice&#34;. It&#39;s just for reference.\r\n\r\nPlease allow 1-3cm differences in product measurement，Due to different computer monitors/calibrations colors may vary slightly from the picture。\r\n Please enter the correct phone number and address in case the package is late or does not meet the recipient️️，\r\nCheck before ordering, we do not accept change of name, number, address or product after ordering。\r\nWarning If the product is damaged or unqualified, please contact customer service. (Reject bad comments)\r\n\r\nThank you for your shopping ️️\r\n After-sales service: If you have any questions / questions about this package, please feel free to contact us, we will reply in time and serve you wholeheartedly!\r\n\r\n Thank you for coming and wish you a happy lifee.', '2023-05-09 12:22:47', NULL),
(21, 1, 'Japanese bag', 'Japanese bag1', '400.00', '43.00', '248a0ea21aacdf2ef3dcd7318791a615.jpg', 55, '❤️Wellcome  MIA fashion ❤️\r\n\\ Unscheduled special events, if there are activities will be announced in the store introduction /\r\n❤❤Off-the-shelf supply\r\n\r\nSize : As Picture\r\nStyle : Fashion \r\nWithout teddy bear\r\n-------------------------------------------------- ---------------------------\r\n\r\nThe goods in the store are all in stock, there are stocks on the shelves, you can place orders directly.\r\n♥️ Product specifications can refer to store pictures, or product content\r\n♥️ Due to different screen settings, there may be chromatic aberration between the picture and the actual object.\r\n♥️ About 2-3 business days to send out\r\n✨If you have any questions after receiving the goods, please contact us, and we will help you \r\n✨ If you like our products, remember to follow us ❤️\r\n????????????Dear customer, we hope you will give us a five-star review and attached pictures after receiving the goods！  thank you ????', '2023-05-09 12:26:19', NULL),
(22, 2, 'Harajiriku retro bags', 'Harajiriku retro bags1', '400.00', '43.00', '60273c58e603e97b96d593e1b06521e2.jpg', 57, 'Hi beautiful lady / handsome sir~ Welcome to my shop ???? \r\n✨✨ I take happiness first and honest transaction as the principle to serve customers. We will strive to create high-quality low price goods, to provide customers with the most thoughtful service, thank you for your presence and I hope you like my shop❤️❤️❤️.\r\n\r\n【Specification】\r\nSize: 37 * 23 * 10 cm\r\nWeight: 0.36 kg\r\nColor: white, blue, black\r\nMaterial: Nylon\r\nOpening method: zipper buckle\r\nWhether there is interlayer: Yes\r\n\r\n*（The picture is for reference only. The color of the picture may be a little different due to the shooting light. If you mind, we don&#39;t suggest you place an order）\r\n\r\n???????? PLEASE READ CAREFULLY BEFORE PLACING AN ORDER/S:\r\n✨ Service\r\n(1)All of our items are as stated in their descriptions.\r\n(2)The items are 100% new, we offer the best product at the best price. \r\n(3)If the item you received is defective, please contact us immediately.\r\n(4)Please select the variations then place order, Because we can&#39;t accept the remark or message color request.（If the variation indicate: &#34;Random or Assorted&#34;, It means we decide the color)\r\n(5)We may not able to cancel some orders, please make sure then place orders. \r\n(6)Support retail and wholesale.(If there is a mark &#34;wholesale&#34;）\r\n(7)Cheapest goods and affordability high quality.\r\n(8)All actual pictures\r\n(9)Cash on delivery\r\n\r\n✨ Feedback\r\n(1)Please kindly leave us a positive feedback (5 stars) , if you are satisfied with our items. And you could share with your friends on Facebook, Twitter...Thanks \r\n(2)Please contact us before leaving any negative feedback or open a dispute on Shopee. \r\n(3)Please give us the opportunity to resolve any problem. \r\n(4)Check your parcel when u receive it, If have any problems, Please contact us and we will make refund.\r\n\r\n???? HAPPY SHOPEE-ING! \r\n\r\n#womenbag #slingbag #bagswomen #leatherbags #phonebag #fashionbags #koreanfashion #fashionbag #crossbodybagforwomen #slingbagsforwomen #shoulderbagforwomen #handbag #bagsforladies #slingbagsforwomenkoreanfashion', '2023-05-09 12:39:26', NULL),
(23, 2, 'Kangaroo bag', 'Kangaroo bag1', '456.46', '260.00', 'aa344d83e4345a06a1d7589fe343fad3.jpg', 65, 'Size: 19cm*22cm*6cm\r\nTexture : PU\r\nStyle: Leisure\r\nClosure mode: Zipper buckle\r\nHigh-quality leather bag, soft touch\r\nWaterproof and wear-resistant\r\nSmall and portable\r\nMulti-compartment, reasonable storage\r\nSportsman must travel\r\n\r\n#branded #ladiesbag #cutebag #bagswomen #bagsforwomen #fashionbag #koreanbag #bags #bag #codbags #freeshipping #travelbag #shoulderbag #slingbag', '2023-05-09 12:41:57', NULL),
(24, 2, 'Oxford Bag', 'Oxford Bag1', '456.46', '43.00', 'cdc1496211f59ca3154bc6dd045d46f2.jpg', 29, 'Brand: other; Texture: Oxford; Closure: Zipper; Pattern: Solid color; Style: Leisure; Shape: Vertical and square; Condition: New; Large size; Internal structure: zipper pocket; With or without interlayer: Yes; Whether it is foldable: No; Double root; Applicable object: Youth; Carrying parts type: Soft handle; Bag type: Stereo bag; Bag hardness: Soft; Style: Shoulder bag; Size: Medium; Accommodating computer size: 10 inches;', '2023-05-09 12:44:43', NULL),
(25, 2, 'Polo bag', 'Polo bag1', '400.00', '43.00', '89d10768acb755142f31918196583111.jpg', 55, '✨✨✨ WELCOME TO SUSAN FASHION SHOP ✨✨✨\r\n—————————————————————\r\n\r\n-S  Size: 23CM*18CM*4CM\r\n-L  Size: 27CM*24CM*4CM\r\n-100% leather\r\n- Solid color design, a variety of colors to choose from\r\n- POLO fashion style\r\n- actual photos\r\n- Light weight, comfortable to use, perfect for everyday use, to meet different needs\r\n\r\n❤1. Please follow our store and get follow coupon ,thank you!\r\n☞2. Ship out the orders within 3 days.\r\n\r\n•Logistics options:\r\n1. For COD, please choose J&T Logistics, which is more convenient.\r\n2. Other logistics do not support COD, thank you\r\n\r\n•SERVICE:\r\n(1)All of our items are as stated in their descriptions.\r\n(2)The items are 100% new,we offer the best product at the best price.\r\n(3)If the item you received is defective, please contact us immediately. \r\n\r\n•FEEDBACK:\r\n(1)Please kindly leave us a positive feedback(5 ❤stars),if you are satisfied with our items.\r\n(2)And you could share with your friends on  Facebook, Twitter,Thanks very much!\r\n(3)Please give us the opportunity to resolve any problem.\r\n\r\nNote: \r\n1: 1 Inch=2.54 CM; 1 CM=0.39 Inch. \r\n2: Due to different producing batches, there may be deviation of 2----3 CM for items. \r\n3: Colors on your computer monitor may differ slightly from actual product colors depending on your monitor settings.　\r\n \r\n#COD #Shopeeph #cod #shopeefromhome #shopee #Korean #Fashion #bag #bags #Bag #womenfashion #slingbag #sling', '2023-05-09 12:46:22', NULL),
(26, 2, 'Sensific Bag', 'Sensific Bag1', '250.00', '80.00', 'e696037484ca7b8ca968336a79e43491.jpg', 46, 'Please read the following tips carefully before buying\r\nSpecifications:(Width) 32cm* (height) 29cm* (thickness) 12cm\r\nColor:Black&Green&White\r\nWeight：0.5KG \r\n\r\nALL ITEMS ARE BRAND NEW AND ON HAND.\r\nCongratulations!! You found a Factory-Direct Shop.\r\nFor potential new buyers please know the following before\r\nplacing your orders:\r\n\r\nSHOP RULES:\r\n\r\n*Check Item description before placing orders.\r\n\r\n*Wrong placing of orders will be accepted for CHANGE,\r\nbut it will be AT YOUR OWN EXPENSE when returning the item to us. REFUNDS\r\nwill only be given after we check the condition of the item upon arrival on us\r\nwarehouse.\r\nNOTE: We will not t0lerate those who are returning\r\nUSED ITEM! We will not hesitate to rep*rt your account.\r\n\r\n*In case you changed your mind after checkout. Please Change\r\nimmediately otherwise when its already booked for pick-up we cannot cancel anymore.\r\n\r\n*For regular working days (Mondays to Saturdays). Orders\r\nwill be sent out 1-2 days after placing your orders.\r\n\r\nAFTER SALES:\r\n\r\n*Upon receiving your parcel. If you can, please take an\r\nunboxing video just in case you will need to return an item.\r\n\r\nNOTE: In case of a problematic parcel/order. Wrong size,\r\nwrong color, damaged product, etc. please know that we NEVER INTENTED TO\r\nSEND WRONG OR DAMAGED ORDERS. So please don’t hesitate to talk to us first\r\nbefore complaining. We will definitely help you with anything with regards to\r\nyour order.\r\n\r\nHERE ARE SOME INFORMATION YOU MIGHT BE INTERESTED IN:\r\n\r\n1) Delivery date/time\r\nPlease note that we have no way of knowing when it will be\r\ndelivered to you (depending on the region and the rider who was assigned with\r\nyour package). The delivery time may be as early as 1-2 days after ship out or\r\nas long as 2-3 weeks because of certain circumstance as misroute package,\r\nunpredictable weather, holidays, etc. For Realtime updates regarding the\r\nlocation of your package, you can check it in the MY ORDERS page on your\r\naccount. There’s no need to ask us because we are seeing exactly the same\r\nupdates as you. For follow-ups, we will only make follow-up requests for\r\npackages that have not been delivered 1 week after the system was last updated.\r\n\r\n2) Transportation risk\r\nWe are being extra careful when packing our goods. However,\r\nregardless of the quality of the packaging. dents, scratches, and damages can\r\nstill be caused by the courier. It cannot be avoided at times, so please be\r\nmindful of your temper towards us. As we also don’t want for that to happen.\r\n\r\n3) COURIERS\r\nWe have no control over the courier that will be assigned to\r\nyour order. For follow-ups you may call the hotline of the courier that’s handling\r\nyour delivery.', '2023-05-09 12:49:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products_images`
--

DROP TABLE IF EXISTS `products_images`;
CREATE TABLE `products_images` (
  `ProductImages_ID` int(10) NOT NULL,
  `Product_ID` int(10) NOT NULL,
  `Product_Image` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `create_time` timestamp NULL DEFAULT current_timestamp(),
  `update_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `products_images`
--

INSERT INTO `products_images` (`ProductImages_ID`, `Product_ID`, `Product_Image`, `create_time`, `update_time`) VALUES
(1, 1, '3cdd982f1da3cf874e4888275fff4e24.jpg', '2023-05-09 08:16:30', NULL),
(2, 1, 'aa9ccabcb72c19165a91f2a6f5d86f97.jpg', '2023-05-09 08:16:30', NULL),
(3, 1, 'd40b94abfc9383994b841af693325766.jpg', '2023-05-09 08:16:30', NULL),
(4, 1, '895330b79ae3790d249bfe4da673b788.jpg', '2023-05-09 08:16:30', NULL),
(5, 2, '9548fc86c1f190756d4df221653a3d14.jpg', '2023-05-09 08:20:53', NULL),
(6, 2, '264ad69bad1665678ac0b1434fde9e69.jpg', '2023-05-09 08:20:53', NULL),
(7, 2, '1bfe70f8e4b4821a8b9cde57ae0350c9.jpg', '2023-05-09 08:20:53', NULL),
(8, 2, '96f0a1b695802cf0a794baf402c36a3a.jpg', '2023-05-09 08:20:53', NULL),
(9, 2, 'ed95ebd76340bd30d60346a39a1bcab0.jpg', '2023-05-09 08:20:53', NULL),
(10, 2, '7c786eb78faf914f438e40900faadc4b.jpg', '2023-05-09 08:20:53', NULL),
(11, 3, '2c36453d8b680ca669bd291717224e79.jpg', '2023-05-09 08:24:14', NULL),
(12, 3, '4f3a49a38d33094eb7c3172e9f0ac195.jpg', '2023-05-09 08:24:14', NULL),
(13, 4, '384dfde0230a756ed5d28fbee36f38c5.jpg', '2023-05-09 08:32:20', NULL),
(14, 4, '4794f2e644a8230a1f3eebe94dca998d.jpg', '2023-05-09 08:32:20', NULL),
(15, 4, '4c6725d646b4bc344c2bbc84f8f54941.jpg', '2023-05-09 08:32:20', NULL),
(16, 4, '68b53b7b7886f36573baff4678185c2f.jpg', '2023-05-09 08:32:20', NULL),
(17, 5, '86fc7ac9f093226fc0645ed4216cd647.jpg', '2023-05-09 08:37:11', NULL),
(18, 5, 'cd7a7264a07561327be4b3cc4a1bd768.jpg', '2023-05-09 08:37:11', NULL),
(19, 5, 'e2f97110b5b99ad635a41d10905dcea4.jpg', '2023-05-09 08:37:11', NULL),
(20, 5, '17ef84d398cb087c8f1f5276da7689f2.jpg', '2023-05-09 08:37:11', NULL),
(21, 5, 'ecaaa8106ea850649e6e082de5201869.jpg', '2023-05-09 08:37:11', NULL),
(22, 6, 'bed5471945edb0e9c2b1fc25dc5986cd.jpg', '2023-05-09 08:41:07', NULL),
(23, 6, 'c998fd8d5e8448bea35fa36db4740bb5.jpg', '2023-05-09 08:41:07', NULL),
(24, 6, 'f18dbe9591c72fb50d17f9eefb1d128e.jpg', '2023-05-09 08:41:07', NULL),
(25, 7, '049cfe4fabbb9de6ecaeb134cf1c6494.jpg', '2023-05-09 08:45:10', NULL),
(26, 7, '5c0e658fc702c675305ab6ea367001f9.jpg', '2023-05-09 08:45:10', NULL),
(27, 7, '8533916bd8dc36bdb1b90a68e9af012a.jpg', '2023-05-09 08:45:10', NULL),
(28, 7, '8fa9fd733a4beff534251ab30f2ffc1a.jpg', '2023-05-09 08:45:10', NULL),
(29, 8, 'e886c06dc7877b3602c07020442b857c.jpg', '2023-05-09 09:01:19', NULL),
(30, 8, '6e30a74867a02cfbc660bdfccf9478bf.jpg', '2023-05-09 09:01:19', NULL),
(31, 8, 'c725e50af83add361bc1c6ecbbc70125.jpg', '2023-05-09 09:01:19', NULL),
(32, 8, 'be50d4eebde10edce4f24a3058ced2a1.jpg', '2023-05-09 09:01:19', NULL),
(33, 9, 'c6488a7134d44aab4122973edf02e30b.jpg', '2023-05-09 09:07:57', NULL),
(34, 9, 'a9f926955bcfd3b9af5d652885e61048.jpg', '2023-05-09 09:07:57', NULL),
(35, 9, 'b93beafdfcfd47053c1af1abca444644.jpg', '2023-05-09 09:07:58', NULL),
(36, 9, '19a5b3c4ca03e380617a03aa9e1c338f.jpg', '2023-05-09 09:07:58', NULL),
(37, 9, '14213c7677c830b6aac1dc4e6fa7c984.jpg', '2023-05-09 09:07:58', NULL),
(38, 10, '9a523ebe2aeb4e886bb10bfc17b6bdfd.jpg', '2023-05-09 09:12:31', NULL),
(39, 10, '495baf40f1b390eb6fd1805d08308a2e.jpg', '2023-05-09 09:12:31', NULL),
(40, 10, '78da794ae83137609dae7f555f145a1d.jpg', '2023-05-09 09:12:31', NULL),
(41, 10, '1c6e31a69c14f9a473d0097096b0227c.jpg', '2023-05-09 09:12:31', NULL),
(42, 10, '4e772bfbda0775ab1177e62b69b5e9ae.jpg', '2023-05-09 09:12:31', NULL),
(43, 10, '0cbc187e56b2bef45ccddd6dfa6c0bd7.jpg', '2023-05-09 09:12:31', NULL),
(44, 10, '315c157cf3a9609d4ab5ff8868f29d25.jpg', '2023-05-09 09:12:31', NULL),
(45, 10, '31549d37f81ae0ebd86dea74209efc61.jpg', '2023-05-09 09:12:31', NULL),
(46, 10, '6e178ce2d41fe56662397c5bea15a79d.jpg', '2023-05-09 09:12:31', NULL),
(47, 11, 'f24d8e0a61cc2d3cea2e7c4dd8ae22a7.jpg', '2023-05-09 09:19:45', NULL),
(48, 11, '564d0b89dc9c27e861e3f507efa51f1d.jpg', '2023-05-09 09:19:45', NULL),
(49, 11, '603a5bd1b7a93b4f16ba6a4bcfdd399e.jpg', '2023-05-09 09:19:45', NULL),
(50, 11, '42512b3b6ec5e4d60784e81fbe5177e8.jpg', '2023-05-09 09:19:45', NULL),
(51, 12, 'c2c1e298be7c9c11c2cb7979a7f20634.jpg', '2023-05-09 09:21:39', NULL),
(52, 12, 'b7545b7b792176ec283d6f162b31f6a5.jpg', '2023-05-09 09:21:39', NULL),
(53, 12, '1f7a42087a95057e1104af6d6e859f94.jpg', '2023-05-09 09:21:39', NULL),
(54, 13, '8ac9ea790301c19e52e54bd43a6b0019.jpg', '2023-05-09 09:35:14', NULL),
(55, 13, '709eb89a35e67c3a1cbf80737ccb9b47.jpg', '2023-05-09 09:35:14', NULL),
(56, 13, 'd10000783e9e1c8e38f89c8ed5526a4d.jpg', '2023-05-09 09:35:14', NULL),
(57, 14, '617c7a46829ff20abc77e2bd58bcc956.jpg', '2023-05-09 09:37:32', NULL),
(58, 14, 'eed2d84e0492715441a28abb681cb31d.jpg', '2023-05-09 09:37:32', NULL),
(59, 14, 'e4bacdc92f5c706b43d449b8788f4ca7.jpg', '2023-05-09 09:37:32', NULL),
(60, 15, '6b3989ca3d7f4c36e0babe63b55ebad3.jpg', '2023-05-09 09:40:26', NULL),
(61, 15, 'e5596818f71dceeb6bc4d160add7b40a.jpg', '2023-05-09 09:40:26', NULL),
(62, 15, 'c1979fa4046915f5cb836074dee3389a.jpg', '2023-05-09 09:40:26', NULL),
(63, 15, '0072992a69c0a3c3e5ff7af8cc4d652e.jpg', '2023-05-09 09:40:26', NULL),
(64, 15, '0d2f4908fbae6fa755b66ef148a65376.jpg', '2023-05-09 09:40:26', NULL),
(65, 15, 'b667934e122bd9aac4804e4d43cd5a23.jpg', '2023-05-09 09:40:26', NULL),
(66, 15, '5582377aaddb1df2205717ff6550067d.jpg', '2023-05-09 09:40:26', NULL),
(70, 17, '1dc8a6c765462a0f3c08354edbdc9edb.jpg', '2023-05-09 12:14:05', NULL),
(71, 17, '04d14f8818872dcc7d8ae565774ffd5c.jpg', '2023-05-09 12:14:05', NULL),
(72, 17, '60a7d66e8645e3dc80e45e21f722f667.jpg', '2023-05-09 12:14:05', NULL),
(73, 17, '22cb1eadba9c9ee82a1d100d4aca381d.jpg', '2023-05-09 12:14:05', NULL),
(74, 17, 'bdf938b2de2e001aeb7d30e73cbdcfd0.jpg', '2023-05-09 12:14:05', NULL),
(75, 17, 'eec9c511f807214232e78d0067e6c1ee.jpg', '2023-05-09 12:14:05', NULL),
(76, 17, 'edd6fe9778e43e9c7256964ec2e8e4e9.jpg', '2023-05-09 12:14:05', NULL),
(77, 18, '7c21e58b955432a4a8faab8db8bd36e4.jpg', '2023-05-09 12:16:48', NULL),
(78, 18, '78db62c1e8c496651916f91f677ecae2.jpg', '2023-05-09 12:16:48', NULL),
(79, 19, 'd2998e7d7def17a1ec84bfbf0ff47963.jpg', '2023-05-09 12:19:43', NULL),
(80, 19, 'a224a5ad1421f586685184de5bc0ee56.jpg', '2023-05-09 12:19:43', NULL),
(81, 19, 'c4226ae92f72cdbd695c6fef2c6be4b9.jpg', '2023-05-09 12:19:43', NULL),
(82, 19, '4d4bafbfa2f16dc2b64613f790c9079d.jpg', '2023-05-09 12:19:43', NULL),
(83, 20, '6cae5e56c08715912b5b116a29c59108.jpg', '2023-05-09 12:22:47', NULL),
(84, 20, 'b05183cd84309a1be9e69b737f5d452a.jpg', '2023-05-09 12:22:47', NULL),
(85, 20, '600e793c2804a42e85dc2e2d8fdb875a.jpg', '2023-05-09 12:22:47', NULL),
(86, 20, '6c073dd18831128f15e11fe9512c466a.jpg', '2023-05-09 12:22:47', NULL),
(87, 20, '12391ff3afbfcea29d7d888e3bbd5be8.jpg', '2023-05-09 12:22:47', NULL),
(88, 21, '24a58d9bc0cf078f50e806c0ed03e3c7.jpg', '2023-05-09 12:26:19', NULL),
(89, 21, 'b26aa9d25daac427f0c70e70630036f3.jpg', '2023-05-09 12:26:19', NULL),
(90, 21, '787869ca891b00257a3d8c43245776ae.jpg', '2023-05-09 12:26:19', NULL),
(91, 21, '248a0ea21aacdf2ef3dcd7318791a615.jpg', '2023-05-09 12:26:19', NULL),
(92, 21, 'ecf79c0bd795fff355d8c6410b958ef5.jpg', '2023-05-09 12:26:19', NULL),
(93, 22, '80956ee94e88fae4c4eaf95ea981e4d3.jpg', '2023-05-09 12:39:26', NULL),
(94, 22, '289b4a256d17523bc9ced95260cb2157.jpg', '2023-05-09 12:39:26', NULL),
(95, 22, '60273c58e603e97b96d593e1b06521e2.jpg', '2023-05-09 12:39:26', NULL),
(96, 22, 'deb29a3bbeae7aa445f1fac2f73bdb58.jpg', '2023-05-09 12:39:26', NULL),
(97, 23, '05fa00833b082947b6ccd9f3ab991fb2.jpg', '2023-05-09 12:41:57', NULL),
(98, 23, 'aa344d83e4345a06a1d7589fe343fad3.jpg', '2023-05-09 12:41:57', NULL),
(99, 24, 'cdc1496211f59ca3154bc6dd045d46f2.jpg', '2023-05-09 12:44:43', NULL),
(100, 24, '4395a93d0fc944b7b1c9353927f78852.jpg', '2023-05-09 12:44:43', NULL),
(101, 25, '89d10768acb755142f31918196583111.jpg', '2023-05-09 12:46:22', NULL),
(102, 25, 'f87507840e4713cab18da8046bad80f0.jpg', '2023-05-09 12:46:22', NULL),
(103, 26, 'd0e17b68a97e3e554d4c3de1ed1ab85e.jpg', '2023-05-09 12:49:00', NULL),
(104, 26, 'e696037484ca7b8ca968336a79e43491.jpg', '2023-05-09 12:49:00', NULL),
(105, 26, 'f0e25103bea063fbb544b9456b50b5f6.jpg', '2023-05-09 12:49:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE `reviews` (
  `Review_ID` int(10) NOT NULL,
  `Customers_ID` int(10) NOT NULL,
  `Product_ID` int(10) NOT NULL,
  `Rating` int(5) NOT NULL,
  `product_reviews` text COLLATE utf8_czech_ci DEFAULT NULL,
  `create_time` timestamp NULL DEFAULT current_timestamp(),
  `update_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`Review_ID`, `Customers_ID`, `Product_ID`, `Rating`, `product_reviews`, `create_time`, `update_time`) VALUES
(1, 1, 27, 4, 'ok ok noice', '2023-04-18 20:21:45', NULL),
(2, 1, 29, 5, 'ewrwer', '2023-04-18 20:21:45', NULL),
(3, 1, 30, 4, 'sdfsdf', '2023-04-18 20:24:00', NULL),
(4, 1, 31, 3, 'erwerwe', '2023-04-18 20:24:00', NULL),
(5, 1, 32, 3, 'erwer', '2023-04-18 20:24:49', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Cart_ID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Categories_ID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`Customers_ID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_ID`);

--
-- Indexes for table `products_images`
--
ALTER TABLE `products_images`
  ADD PRIMARY KEY (`ProductImages_ID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`Review_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `Cart_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Categories_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `Customers_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Product_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `products_images`
--
ALTER TABLE `products_images`
  MODIFY `ProductImages_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `Review_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
