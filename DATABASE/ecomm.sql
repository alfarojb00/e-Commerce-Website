-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2022 at 08:11 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomm`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `dist_name` varchar(255) NOT NULL,
  `dist_id` varchar(255) NOT NULL,
  `post_date` varchar(255) NOT NULL,
  `announcement` text NOT NULL,
  `media` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `dist_name`, `dist_id`, `post_date`, `announcement`, `media`) VALUES
(25, 'Tesie ', '52', '09/14/22 10:13', 'HELLO', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`) VALUES
(1, 9, 1, 4),
(3, 9, 4, 6),
(4, 9, 12, 2),
(107, 34, 27, 5),
(108, 35, 27, 4),
(111, 36, 27, 1),
(117, 82, 27, 1),
(118, 82, 33, 1),
(119, 39, 27, 1),
(122, 42, 30, 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cat_slug` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `cat_slug`) VALUES
(1, 'Fertilizer', 'fertilizer'),
(2, 'Animal Growth Booster', 'animal-booster'),
(3, 'Food Supplement', 'food-supplement'),
(4, 'Beauty Products', 'beauty-products'),
(5, 'Caffeinated Beverage', 'caffeinated-beverage'),
(6, 'Toothpaste', 'toothpaste');

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `sales_id`, `product_id`, `quantity`) VALUES
(21, 11, 39, 1),
(22, 12, 39, 1),
(23, 13, 39, 1),
(24, 14, 39, 1),
(25, 15, 39, 1),
(26, 16, 39, 1),
(27, 17, 39, 1),
(28, 18, 39, 1),
(29, 19, 39, 1),
(30, 20, 39, 1),
(31, 21, 40, 1),
(32, 22, 40, 1),
(33, 23, 40, 1),
(34, 24, 40, 1),
(35, 25, 39, 1),
(36, 26, 39, 1),
(37, 27, 39, 1),
(38, 28, 39, 1),
(39, 29, 39, 1),
(40, 30, 39, 1),
(41, 31, 39, 1),
(42, 32, 39, 1),
(43, 33, 39, 1),
(44, 34, 39, 1),
(45, 35, 39, 1),
(46, 36, 39, 1),
(47, 37, 40, 1),
(48, 38, 40, 1),
(49, 39, 40, 1),
(50, 40, 40, 1),
(51, 41, 40, 1),
(52, 42, 40, 1),
(53, 43, 39, 1),
(54, 44, 40, 1),
(55, 45, 40, 1),
(56, 46, 40, 1),
(57, 47, 40, 1),
(58, 48, 27, 1),
(59, 49, 27, 1),
(60, 51, 58, 3);

-- --------------------------------------------------------

--
-- Table structure for table `distributorapplication`
--

CREATE TABLE `distributorapplication` (
  `id` int(11) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `distributorapplication`
--

INSERT INTO `distributorapplication` (`id`, `photo`, `user_id`) VALUES
(2, 'IDEAthon Competition Guidelines.pdf', 36);

-- --------------------------------------------------------

--
-- Table structure for table `distributorid`
--

CREATE TABLE `distributorid` (
  `id` int(11) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `distributorid`
--

INSERT INTO `distributorid` (`id`, `photo`, `user_id`) VALUES
(13, '2574.jpg', 23),
(14, 'boy.jpg', 36);

-- --------------------------------------------------------

--
-- Table structure for table `distributor_inventory`
--

CREATE TABLE `distributor_inventory` (
  `dist_inventoryid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `inventoryquantity` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `distributor_inventory`
--

INSERT INTO `distributor_inventory` (`dist_inventoryid`, `productid`, `inventoryquantity`, `userid`) VALUES
(1, 58, 3, 52);

-- --------------------------------------------------------

--
-- Table structure for table `distributor_resellers`
--

CREATE TABLE `distributor_resellers` (
  `id` int(11) NOT NULL,
  `distributor_id` varchar(255) NOT NULL,
  `reseller_id` varchar(255) NOT NULL,
  `reseller_name` varchar(255) NOT NULL,
  `approval` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `distributor_resellers`
--

INSERT INTO `distributor_resellers` (`id`, `distributor_id`, `reseller_id`, `reseller_name`, `approval`) VALUES
(2, '52', '53', 'rolly lakasid', '1'),
(4, '36', '38', 'james lebron', '1'),
(14, '52', '39', 'Yuki Bella', '1');

-- --------------------------------------------------------

--
-- Table structure for table `distributor_shop`
--

CREATE TABLE `distributor_shop` (
  `id` int(11) NOT NULL,
  `shop_id` varchar(255) NOT NULL,
  `shop_owner` varchar(255) NOT NULL,
  `selected_shops` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `distributor_shop`
--

INSERT INTO `distributor_shop` (`id`, `shop_id`, `shop_owner`, `selected_shops`) VALUES
(23, '36', 'Stephen', '28'),
(24, '36', 'Stephen', '29'),
(25, '36', 'Stephen', '36'),
(26, '36', 'Stephen', '34'),
(28, '52', 'Tesie Lamao', '30'),
(29, '52', 'Tesie Lamao', '31'),
(31, '52', 'Tesie Lamao', '33'),
(34, '52', 'Tesie Lamao', '29'),
(36, '52', 'Tesie Lamao', '28'),
(40, '52', 'Tesie ', '60'),
(41, '52', 'Tesie ', '27'),
(42, '52', 'Tesie ', '57');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notificationid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(200) NOT NULL,
  `date_view` date NOT NULL,
  `counter` int(11) NOT NULL,
  `shop_id` varchar(255) NOT NULL,
  `shop_owner` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `stock` varchar(255) NOT NULL,
  `productquantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `slug`, `price`, `photo`, `date_view`, `counter`, `shop_id`, `shop_owner`, `status`, `stock`, `productquantity`) VALUES
(27, 1, 'Humicplus', '\'<p>HUMIC PLUS ORGANIC MATERIALS | SAFE PROVEN EFFECTIVE AFFORDABLE 1 SACHET ( 100 GRAMS ) BEST SELLER 100% ORIGINAL SUPER SALE ORIGINAL AND AUTHENTIC UCORP HUMICPLUS PLANT AND SOIL FERTILIZER ORGANIC SOIL CONDITIONER FERTILIZER ENHANCER HUMIC ACID POTASSIUM</p>\r\n\r\n<ul>\r\n	<li>INCREASES THE VITALITY OF THE ROOTS.</li>\r\n	<li>IMPROVES THE ABSORPTION OF NUTRIENTS.</li>\r\n	<li>INCREASES THE SYNTHESIS OF CHLOROPHYLL.</li>\r\n	<li>BEST GERMINATION OF SEEDS.</li>\r\n	<li>INCREASES THE RETENTION OF FERTILIZERS.</li>\r\n	<li>STIMULATE BENEFICIAL MICROBIAL ACTIVITY.</li>\r\n	<li>HEALTHIER PLANTS AND IMPROVED YIELDS.</li>\r\n	<li>INCREASES THE SOIL\'S ABILITY TO STORE WATER.</li>\r\n	<li>ADJUSTS AND RAISES THE QUALITY OF LAND AND YIELD.</li>\r\n	<li>HELPS PREVENT EXCESSIVE DRYNESS.</li>\r\n	<li>THE COLLAPSE OF THE LAND WILL BE REDUCED.</li>\r\n	<li>REMOVES THE SOIL POISON.</li>\r\n	<li>THE GROWTH OF THE PLANT ACCELERATES.</li>\r\n	<li>IMPROVES THE ROOT TUBE.</li>\r\n	<li>INCREASES THE NUMBER OF GRAIN.</li>\r\n	<li>INCREASES VITAMINS IN PLANTS.</li>\r\n	<li>HELPS TO GET NUTRIENTS FROM THE SOIL.</li>\r\n	<li>HELPS PLANT FOOD.</li>\r\n</ul>\r\n\'', 'humicplus', 550, 'humicplus.jpg', '2022-09-13', 2, '', '', '', '', 1200),
(57, 2, 'CHC Agritech Probiotics ', '\'\'<p>Benefits of our ORGANIC CHC PROBIOTICS formulated by Japanese Dr. Tetsuo Kamekawa. It Eliminates Internal Parasites, Extends Egg-laying period, Boost Immune System Best for Conditioning before and during breeding, Promotes Faster Growth, Functions as Natural Antibiotics, Neutralizes acidity in the Body, Ideal Source of Beneficial Enzymes, For Fertility Eliminates Foul Odor, Best Disinfectant.</p>\r\n\r\n<p>JAPAN TECHNOLOGY PROBIOTICS 1KG 7 Billion CFU/gram For All Kinds Of Animals, Birds, Lovebirds, Pigeon, Rabbit, Chicken, Broiler, Pig, Quail Egg, Rooster Gamefowl Dog Cats Goat Cow Carabao Chicks Sisiw Manok Panabong Pellets Vitamins</p>\r\n\'\'', 'chc-agritech-probiotics', 295, 'chc-agritech-probiotics.jpg', '2022-09-13', 9, '', '', '', '', 1000),
(58, 2, 'Speedy Vita Multivitamins ', '\'<p>The product is improved and re-formulated from the experience of current farming to complete the necessary of whole nutrition in poultry for both Layer and Broiler. This premix contains more than twenty kinds of vitamins and amino acids. It is being absorbed easily and quickly and provide the daily requirement nutrient for growth and production performance of poultry. So that the animal have obtained enough nutrition for maximum productivity and the farmers gain best benefits by using this premix.</p>\r\n\'', 'speedy-vita-multivitamins', 320, 'speedy-vita-multivitamins.jpg', '2022-09-14', 2, '', '', '', '', 1000),
(59, 2, 'Amino Plus Organic Foliar Fertilizer  (1 LITER) ', '<p>AMINO PLUS FOLIAR FERTILIZER is made from fish and contains compounds that promote plant growth. It does not contain toxic or carcinogenic materials, thus a good source of fertilizer. Unlike other fertilizers derived from fish or other natural sources, Amino Plus does not involve heating. Fish is liquefied at low temperature which prevents denaturation of proteins and retains valuable amino acids, vitamins and natural oils. It makes use of natural enzyme from fish to produce essential amino acids and fatty acids that are easily absorbed by plants.</p>\r\n\r\n<p>Amino Plus does not use harmful preservatives and makes use of organic acids produced by lactic acid bacteria (lactobacillus p.) for preservation. Fish contains compounds for promoting plant growth and does not contain toxic or carcinogenic materials making it a valuable resource for bio-fertilization. Amino Plus Foliar fertilizer contains effective microorganisms consisting mostly of lactic acid bacteria, nitrogen fixing bacteria and yeast that act as bio-fertilizers for plants. They give long-term beneficial effects on the physical, chemical and biological aspects of the soil. These microorganisms are highly efficient agents in promoting plant growth and increasing tolerance to disease-causing microorganisms.</p>\r\n', 'amino-plus-organic-foliar-fertilizer-1-liter', 540, 'amino-plus-organic-foliar-fertilizer-1-liter.jpg', '0000-00-00', 0, '', '', '', '', 0),
(60, 1, 'Humic Vet ', '<p>Humic Vet</p>\r\n\r\n<p>Humic acids actively regulate digestion processes, contributing to their activation. Effectively absorb harmful substances and deliver essential minerals and trace elements to the body.&nbsp;Humic acids have a hepatoprotective function, that is, they protect the liver from cell destruction and stimulate their regeneration. They block the development of mycotoxins, facilitate the work of the liver and significantly reduce the risks of the disease.&nbsp;Humic acids improve digestion, normalize metabolism in the body of pets, which in turn effectively eliminates the physiological causes of unpleasant odors.&nbsp;Recovery is faster and more efficient with the Humic Vet feed additive. Humic acids have wound healing properties, help to restore the immune system and functions of the internal organs of the animal after operations or treatment of various diseases.&nbsp;By adding Humic Vet to your feed, you minimize the likelihood of developing skin diseases caused by food and parasitic allergens, bacteria, fungi and viruses. Humic acids restore the water-salt balance in the body, as a result of which the functioning of the liver and kidneys is normalized.</p>\r\n', 'humic-vet', 156, 'humic-vet.png', '0000-00-00', 0, '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reseller_orders`
--

CREATE TABLE `reseller_orders` (
  `id` int(11) NOT NULL,
  `reseller_id` varchar(255) NOT NULL,
  `dist_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_quantity` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reseller_orders`
--

INSERT INTO `reseller_orders` (`id`, `reseller_id`, `dist_id`, `product_id`, `product_name`, `product_quantity`, `total_price`, `delivery_address`, `order_date`, `status`) VALUES
(11, '38', '36', '29', 'Spirulina Troche', '5', '3000', 'Calamba City', '2022/05/27', 'order placed'),
(12, '38', '36', '36', 'RYIFresh Toothpaste', '10', '2800', 'Calamba City', '2022/05/27', 'order received'),
(13, '38', '36', '34', 'Herbal Coffee', '10', '7500', 'Calamba City', '2022/05/27', 'order received'),
(14, '38', '36', '27', 'Humicplus', '12', '5280', 'Calamba City', '2022/05/28', 'shipped out'),
(15, '38', '36', '28', 'Animal Growth Booster', '7', '3080', 'Calamba City', '2022/05/28', 'order received'),
(16, '53', '52', '35', 'Slimming Tea', '1', '500', 'calamba city', '2022/09/01', 'order received'),
(17, '53', '52', '35', 'Slimming Tea', '1', '0', 'calamba', '2022/09/01', 'order received'),
(18, '53', '52', '27', 'Humicplus', '1', '275', 'jan lang', '2022/09/13', 'order received'),
(19, '53', '52', '57', 'CHC Agritech Probiotics ', '2', '295', 'BTGS', '2022/09/13', 'order placed'),
(20, '39', '52', '60', 'Humic Vet ', '1', '124.8', 'calamba city laguna', '2022/09/14', 'order received');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pay_id` varchar(50) NOT NULL,
  `sales_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `user_id`, `pay_id`, `sales_date`) VALUES
(11, 23, 'PAYID-MGXX2HQ63C318634R9049216', '2021-12-07'),
(12, 23, 'PAYID-MGXX6TI8V33080459388494A', '2021-12-07'),
(13, 23, 'PAYID-MGXYB7Q4BT99695MP9391323', '2021-12-07'),
(14, 23, 'PAYID-MGXYE4Q3G735523SG5979220', '2021-12-07'),
(15, 23, 'PAYID-MGXYFTQ31081606R36037944', '2021-12-07'),
(16, 23, 'PAYID-MGXYFTQ31081606R36037944', '2021-12-07'),
(17, 23, 'PAYID-MGXYISI9811612993932670V', '2021-12-07'),
(18, 23, 'PAYID-MGXYJHI2X55039270921514M', '2021-12-07'),
(19, 23, 'PAYID-MGXYJHI2X55039270921514M', '2021-12-07'),
(20, 23, 'PAYID-MGYA4XQ6RX454501E5684036', '2021-12-08'),
(21, 23, 'PAYID-MGZEIVI0AE30889BM9232813', '2021-12-09'),
(22, 23, 'PAYID-MGZEJBQ9B376598896095545', '2021-12-09'),
(23, 23, 'PAYID-MGZEJQY7EE489704S516951V', '2021-12-09'),
(24, 23, 'PAYID-MGZEJ7A86U724151Y4016123', '2021-12-09'),
(25, 23, 'PAYID-MGZEKMQ0DH78389F7205582R', '2021-12-09'),
(26, 23, 'PAYID-MGZEORI5TJ35424EC0754208', '2021-12-09'),
(27, 23, 'PAYID-MGZEQNI1K04554071870683N', '2021-12-09'),
(28, 23, 'PAYID-MGZEREI8MS990629Y8626139', '2021-12-09'),
(29, 23, 'PAYID-MGZEREI8MS990629Y8626139', '2021-12-09'),
(30, 23, 'PAYID-MGZETEA1MT74420WH046445A', '2021-12-09'),
(31, 23, 'PAYID-MGZEWEA6DA971668T721290E', '2021-12-09'),
(32, 23, 'PAYID-MGZEYRA1MV29273190289122', '2021-12-09'),
(33, 23, 'PAYID-MGZEY4I1CX389999X027762V', '2021-12-09'),
(34, 23, 'PAYID-MGZEZFI75X25375V6707645J', '2021-12-09'),
(35, 23, 'PAYID-MGZE2MQ87P20847N86235338', '2021-12-09'),
(36, 23, 'PAYID-MGZE27A81K8752724478644D', '2021-12-09'),
(37, 23, 'PAYID-MGZZJEQ21704153FF6117429', '2021-12-10'),
(38, 23, 'PAYID-MGZZJ3Q36G01831C0998852D', '2021-12-10'),
(39, 23, 'PAYID-MGZZKUA4KK641302M5547149', '2021-12-10'),
(40, 23, 'PAYID-MGZZL6Q9T5292319H151671W', '2021-12-10'),
(41, 27, 'PAYID-MGZ2BLI66479859F45722107', '2021-12-10'),
(42, 27, 'PAYID-MGZ2EIY2X2461761A0815329', '2021-12-10'),
(43, 27, 'PAYID-MGZ7IBY91R9381432886410K', '2021-12-11'),
(44, 27, 'PAYID-MGZ7IMQ4K825795GX494745W', '2021-12-11'),
(45, 23, 'PAYID-MIBJGAY3Y250476F0001223H', '2022-02-08'),
(46, 23, 'PAYID-MIBJJDI2DE22246264460718', '2022-02-08'),
(47, 23, 'PAYID-MIBK2IA60377791U8088835V', '2022-02-08'),
(48, 23, 'PAYID-MIS4UUA36E66307U1759491H', '2022-03-07'),
(49, 52, 'PAYID-MMHPVXA04710200BK354830X', '2022-08-31'),
(50, 53, 'PAYID-MMIE24Q7VN9696181421502F', '2022-09-01'),
(51, 52, 'PAYID-MMQS2CA8YA89382DY4869150', '2022-09-14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` int(1) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` int(1) NOT NULL,
  `activate_code` varchar(15) NOT NULL,
  `reset_code` varchar(15) NOT NULL,
  `created_on` date NOT NULL,
  `plan_type` int(11) NOT NULL,
  `distributor_id` int(11) NOT NULL,
  `province` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `dist_id` varchar(255) NOT NULL,
  `res_id` varchar(255) NOT NULL,
  `id_verified` varchar(255) NOT NULL,
  `application_form` varchar(255) NOT NULL,
  `apform_verified` varchar(255) NOT NULL,
  `paid` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `isVerified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `firstname`, `lastname`, `address`, `contact_info`, `photo`, `status`, `activate_code`, `reset_code`, `created_on`, `plan_type`, `distributor_id`, `province`, `city`, `dist_id`, `res_id`, `id_verified`, `application_form`, `apform_verified`, `paid`, `user_type`, `isVerified`) VALUES
(1, 'admin@admin.com', '$2y$10$8wY63GX/y9Bq780GBMpxCesV9n1H6WyCqcA2hNy2uhC59hEnOpNaS', 1, 'admin', '', '', '', 'profile.jpg', 1, '', '1gHfY63FISz48at', '2018-05-01', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(23, 'Jamesdelasalas21@gmail.com', '$2y$10$3H/ltKYpypXKgRRGGambVeuKUmI9jFAXyR02q1VSU.bRHrktH3aFO', 0, 'James Louie', 'Delas Alas', '', '', '', 1, '', '', '2021-11-24', 2, 0, '', '', '', '', '', '', '', '', '', 1),
(39, 'yukiBella20@gmail.com', '$2y$10$4y5HfMxegTd4XTQD5KVBRumIwK0k28cQnFs2qd/r2JKYI7yO.dOse', 0, 'Yuki', 'Bella', '', '', '', 1, 'FyfK49QPukdw', '', '2022-08-26', 0, 0, 'Benguet', 'Kapangan', '', 'WEBSITE DESIGN ALFARO.jpg', '1', 'VALO webpage design.png', '1', '1', 'Reseller', 1),
(40, 'Evangelista12neth@gmail.com', '$2y$10$PmShpM8kdNaiZPH6mSakaeAFZ2agciBEkLA2MRJE3oTFfu667CD36', 0, 'Neneth', 'Evangelista', '', '', '', 1, 'FjcaUNeGqWpM', '', '2022-08-26', 0, 0, 'Biliran', 'Cabucgayan', '', 'idsample.jpg', '1', 'Free-Customer-Registration-Form-1.pdf', '1', '1', 'Reseller', 1),
(41, 'obvilidorjanice22@gmail.com', '$2y$10$tIXpBRZ05fL.xulLa0mSteZ9sTbiJWCwHRns.XdUbB7FfdV45RLum', 0, 'Janice', 'Ovilidor', '', '', '', 1, '4szZPLWam2Iu', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(42, '13Pagara.irene@gmail.com', '$2y$10$JbJbBXS/8p43Coc.wPmLBuiu0VILg8XyL/nZ/QS.NkMUHR9texvKe', 0, 'Irene', 'Pagara', '', '', '', 1, 'Nnyr5YZau4Iv', '', '2022-08-26', 0, 0, 'Biliran', 'Biliran', 'idsample.jpg', 'idsample.jpg', '1', '', '', '', '', 1),
(43, 'lhenDR001@gmail.com', '$2y$10$euUMgmqCU2br7kee6x/SiObGCagDhpOd981SK41kyhgbbWZp7BBPy', 0, 'Lhen', 'Del Rosario', '', '', '', 1, 'pEYiVWdrsx6N', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(44, 'lykacaringal49@gmail.com', '$2y$10$76sanyG8h9lGK0a060wf3ul9qypoWZmgp2JEcaKcB6apZ6izuPoES', 0, 'Lyka Marie', 'Caringal', '', '', '', 1, 'QZFqi3mleXkw', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(45, 'Li.eanah57@gmail.com', '$2y$10$Yz9ZE2zPjEwR/Dur8qiCyOFGPKW0ailEOPzBi4lRMOZR5P.lJlnDK', 0, 'Eanah', 'Li', '', '', '', 1, '6h9lXj1aY84m', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(46, 'MBlyn09@gmail.com', '$2y$10$BzQRMYDeIw8O.V2Jyc.TjeCPwS0uBgh/ugCVmmzGNYz9O0GOJcKjW', 0, 'Jonnalyn', 'Mata-Bongat', '', '', '', 1, 'IpGlDP8dXHYA', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(47, 'toniEsteves88@gmail.com', '$2y$10$Ls.jzIMrPlw7TAwqCnMp0ee84MdzTb5v4UxjWj8GN.JBDeWeLLvGq', 0, 'Toni Rose', 'Esteves', '', '', '', 1, 'j34zYrT8f9va', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(48, 'mailynperas40@gmail.com', '$2y$10$QC0gJ5KU.rNdIo.xI1vS9.nzkjx0YIhBe20nom2RHJdXScrZyQE9W', 0, 'Mailyn', 'Peras', '', '', '', 1, 'WQBw3UacxKI9', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(49, 'shirCaprial76@gmail.com', '$2y$10$FnwFUH8Q2tvVlxk2sHB6aOxJ2bd1z4Ek9SQIzBi76W9y50fbM3a/q', 0, 'Shirmaine', 'Capiral', '', '', '', 1, 'mzkjLTMGf8Ye', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(50, 'Niem.janet44@gmail.com', '$2y$10$Lob.lEQo.gTU8T8W9ERsbu0PQ0QK4/jyLH7..su8rHuDdj8UmXZCy', 0, 'Janet', 'Niem', '', '', '', 1, 'ie2hxqpVmSvn', '', '2022-08-26', 0, 0, 'Bulacan', 'Pandi', 'IMG_20200314_084027.jpg', '', '1', 'IMG_20200521_142552.jpg', '1', '1', 'Distributor', 1),
(51, 'ailenB68@gmail.com', '$2y$10$/j08Q0DOc8Fcf7OKgNjoi.QVpaNWJEJiUpfZ0A6DMJ9Pfyj35tQa.', 0, 'Ailen', 'Barcenas', '', '', '', 1, '9GBuKb5YvUk1', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(52, 'tesieLamao34@gmail.com', '$2y$10$Zu0qLT1iGazKoqlOh9LRD.UMDN/eWQyPMtaG232NylIOq5LeT0F3q', 0, 'Tesie ', ' Lamao', '', '', '', 1, 'BSHCZOFq6TtW', '', '2022-08-26', 0, 0, 'Batangas', 'Batangas City', 'OIP.jpg', '', '1', 'IMG_20200312_145137.jpg', '1', '1', 'Distributor', 1),
(53, 'rollyLakasid99@gmail.com', '$2y$10$AcF2aD5GnlJFKU3pDctzfuEP3uQFoh9qbJZBnDD5mU7B0ljkHN/Q6', 0, 'Rolly ', 'Lakasid', '', '', '', 1, 'byUVjYLdWDvn', '', '2022-08-26', 0, 0, 'Batangas', 'Malvar', '', 'IMG_20200312_145125.jpg', '1', 'IMG_20200312_153505.jpg', '1', '1', 'Reseller', 1),
(54, 'Amal.berto48@gmail.com', '$2y$10$svLPel8ZLkjV12ORxOkfSumUW4W5KlaFBIDtqLM/o9C9dNtZqLTTu', 0, 'Berto ', 'Amal', '', '', '', 1, 'aBQXCIRhZdsJ', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(55, 'signamon19@gmail.com', '$2y$10$j2e8/ZwZYh.LUJuHRlTXpulyOC3xx8VzQocy3ulMfAupZH0MAraJK', 0, 'Sig ', 'Namonrol', '', '', '', 1, 'KZi5WfpyJqne', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(56, 'palmagigi088@gmail.com', '$2y$10$ngHRhDLPkaE1Q3SombRZdeE.2lhfEXdVNSRYO8LFoJb.X0Jvvn4/q', 0, 'Gigi ', 'Palma', '', '', '', 1, 'd2mLK4YEVXG8', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(57, 'Jimenezkyt24@gmail.com', '$2y$10$Bly3G3tGtyZWAtF.jokSXeqlHfzAPDNgCJyb2mq95Trd4NhGv8VT2', 0, 'Kyt ', 'Jimeneze', '', '', '', 1, 'QcRvMGVIlXSi', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(58, 'mavAtarde79@gmail.com', '$2y$10$TKfmGYH8nDJeU6qdt.CiXef24RRwhX3rkXTkVS/nMw1BmaBCU.6l2', 0, 'Maverick', ' Atarde', '', '', '', 1, 'xQsi14fInu6t', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(59, 'banaopuring75@gmail.com', '$2y$10$D3sSqgchhj5ZgG.M.XmeWuaZm0Up4YZAsqOMzlpPQ2VLZAqZtY2zm', 0, 'Puring ', 'Banao', '', '', '', 1, 'fDL5Ez6hAweO', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(60, 'turiloBalaw95@gmail.com', '$2y$10$Q.oc0D/V8t6/0cj8iyZ1qO5.1JorQzqzGYeL1IXP0yCfRfa4iKpPS', 0, 'Turilo ', 'Abalaw', '', '', '', 1, 'kOHn6Ivr1x7g', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(61, 'jojiSan009@gmail.com', '$2y$10$n/usDleRkJ4KVS/.zq4mkOFVk8m7wOpUhjJPUauxJXlKnggmBES2K', 0, 'Joji ', 'Santoraryo', '', '', '', 1, 'CTcVs58hoEXO', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(62, 'Sinta.moy51@gmail.com', '$2y$10$LZuYjJ1eBtgHyhapsYQDT.2s.Xrbm8bJsOl9dsUV9JKNHfIJQCuEm', 0, 'Moymoy', ' Sinta', '', '', '', 1, 'TnLByaU2eqsQ', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(63, 'MaelAliman121@gmail.com', '$2y$10$3Izkfa2hL5ykqV9YmsyFWugz5OizGKGT7lhYuppQ3j0wQJLuyLMJS', 0, 'Mael ', 'Aliman', '', '', '', 1, 'Mj9kACxW7Sm8', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(64, 'josieRizal31@gmail.com', '$2y$10$rrASroBtKR8xGittCO/nEOPF/qdcNQ3xjAnT9KPMDoIlDFzUwen0O', 0, 'Josie', ' Rizal', '', '', '', 1, 'yHLj6nITZmpl', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(65, 'hensyReyes1100@gmail.com', '$2y$10$UrzWR3FdF7AL.3pq3hkte.umMsS7wk1mmY1D.HkLTGnLJmgFdua0O', 0, 'Hensy', ' Reyes', '', '', '', 1, 'tjM9KIbAfWpn', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(66, 'christiePal899@gmail.com', '$2y$10$gJQRAEk/uTjbBoPM4pjaj.hiqFb1h4Bu8sA33KFX25f0lOseShq3S', 0, 'Christie', ' Palito', '', '', '', 1, 'iy1ZjJ4zTClw', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(67, 'Saana.malv2244@gmail.com', '$2y$10$agUJEfk1UFeUPlFpWLzA8upn5pF64yP0mLQecDw/qvdggbIobYw7K', 0, 'Malvy ', 'Saana', '', '', '', 1, 'GVvt51ZbXeih', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(68, 'pabloE699@gmail.com', '$2y$10$6VfGbZSmMKVc4KR8O2dYuOt.OpHYj.Id7fzn6roY/yDJQBqE6uFjy', 0, 'Pablo', ' Eluron', '', '', '', 1, 'ncOqhEz3QBZC', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(69, 'betVidanes33@gmail.com', '$2y$10$2AuHx5ulLmBDkk0TuLvVLu7oQAoReiU3GuJsI5CgQrT1KOBtM93Pq', 0, 'Bibet ', 'Vidanes', '', '', '', 1, 'L48kgS9KrVqw', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(70, 'sintanMichelle290@gmail.com', '$2y$10$yNxQp4rub9EeV7icP1faJO7sQB84g3eCzo4epBCvRGbjGfBOaw4ai', 0, 'Michelle ', 'Sinstan', '', '', '', 1, 'WeN5iCtUpM7b', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(71, 'nikkiG081@gmail.com', '$2y$10$UYY1D7Ipx77z6E28aayeC.m5ed82YFDQCpFgGTnsdFThWaD383gh2', 0, 'Nikki ', 'Gill', '', '', '', 1, 'tCENcHMzpbPU', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(72, 'lorenaCastro0610@gmail.com', '$2y$10$ZAthkQWIUesGEml1q5CkfuvhlOTdsY.xBJDlb3eEpj77iun7kMcLK', 0, 'Lorena ', 'Castro', '', '', '', 1, 'sFOkgQ9Mxavt', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(73, 'mikkaA2219@gmail.com', '$2y$10$sv1hyx5WT5W8IWocTFcUnenM3rkoPC9cZJRznnxetWkQBwa.8o2xu', 0, 'Mikka ', 'Aquino', '', '', '', 1, 'qlyIXLoFwM9d', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(74, 'glaideM156@gmail.com', '$2y$10$bo2Qa4NVC9y/eNA8BsXao.OhLmEyLEflguDc4ISyultVeQr1fIsfe', 0, 'Glaide ', 'Mabango', '', '', '', 1, 'CObXxK5DTqJZ', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(75, 'joyManb1091@gmail.com', '$2y$10$44RnsBxK885fZGRicfzVOONAjmToa9DK3SU2UTANcwHnxlPeMB7o6', 0, 'Joy ', 'Manbanalaw', '', '', '', 1, 'gMXGqNkz8a1u', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(76, 'jennyP982@gmail.com', '$2y$10$wA4WaS.6sR9yRyPP1Pa0vukJ/JCrPPVrqHn11I18XlHyDgDYnWLLS', 0, 'Jenny ', 'Perez', '', '', '', 1, 'IGQ5SWuMxp1q', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(77, 'litaSolis01@gmail.com', '$2y$10$J1wFu3C6e5D6rk9r.EKugu7nipICnYj7WmJ9pyKMN/5xM8BMavzWa', 0, 'Lita ', 'Solis', '', '', '', 1, 'sxh9WqO6Fifu', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(78, 'benDerro2200@gmail.com', '$2y$10$/krdXYnJQwJXGWOfQ3ZVLuCI/CNTQ9dfXESLn8z9VL4G.iaNv1VYW', 0, 'Ben ', 'Derro', '', '', '', 1, 'WkIvjKEfmt1Q', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(79, 'junelB18@gmail.com', '$2y$10$x/MleUsnkBPFZ9OaS.Zbku5jzIB2aPLJpeipiWZLoih54YTdO1Pc.', 0, 'Junel ', 'Baro', '', '', '', 1, 'qCFZhkHQsItN', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(80, 'markD11@gmail.com', '$2y$10$C27/wNbUCzUSE6GROKKv5./zD8UfZsBWpvH.1QAlRiM.6lQeLB0mC', 0, 'Mark', ' Divino', '', '', '', 1, 'dlj9uIzCKZaS', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(81, 'earlY11@gmail.com', '$2y$10$ovvb9NYlewswrPfnyl5vnOg0wVyz2cTDRuXIlhmAcAdaW4PDq4XbW', 0, 'Earl ', 'yatac', '', '', '', 1, 'iGbtZ37YspQa', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(82, 'alvinChico091@gmail.com', '$2y$10$VvCc1vZ81G3Ne20TUyFq.epdifCPMM7/C1LxOlKUCu9rtqprzjo1O', 0, 'Alvin', ' Chico', '', '', '', 1, 'pDzP7gISQ6hm', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(83, 'lubosCarl22@gmail.com', '$2y$10$0UmunNlG7x6EmGZO3Zs2Lu8fTBhtu6oPKnG5zm890k1G/acEz5MPO', 0, 'Carl ', 'Lubos', '', '', '', 1, 'Tnd4a3fXhrvC', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(84, 'hannaB882@gmail.com', '$2y$10$jDhXkPTzcj1TaJ3gtRgHhOsdoJduIqp0NmYNBCB6q6duK8lWLxtk.', 0, 'Hannah', ' Baliktad', '', '', '', 1, 'zk6s3iv9TVxQ', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(85, 'chelseaCrz0046@gmail.com', '$2y$10$InY4fi2BQ547EYEPvQim.uK87Fd6PmGtJ92oYS8IBmU30dK4o7Q/2', 0, 'Chelsea ', 'Cruz', '', '', '', 1, 'KP2FNn6xSDVr', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(86, 'LuniSaola224@gmail.com', '$2y$10$SUPNgAcDk.c40bmb1ittXOpQeeTIgXiQNlX8BOWF3ygywDSdzzJjG', 0, 'Luni ', 'Saola', '', '', '', 1, 'yzamcDnKiOSY', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(87, 'shawnyP555@gmail.com', '$2y$10$sFlpQz1sCQXrU6sFASHCyu609.9/6UFzKPjXJUez8/3feJRG2ip8W', 0, 'Shawny ', 'Pambili', '', '', '', 1, '9GRqzYnFZTEg', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(88, 'natoyPalo13@gmail.com', '$2y$10$Qk.xc7GVJIsRkfzeIv.7uu/zdmFX7z1nbWyd3A4PG5F4CWGoTFkMi', 0, 'Natoy', ' Palo', '', '', '', 1, 'gVhz9E8utHXn', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(89, 'janeT120@gmail.com', '$2y$10$A4cw239j8FoJWXWY3B6wsum5.EuBLmNH1bAh.6E7d6NCTqky/fJDO', 0, 'Jane ', 'Tenorio', '', '', '', 1, 'MmhEOpAB4lTj', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(90, 'sabrine.malawi222@gmail.com', '$2y$10$NADdiG7T3PbOfPZFdn9PK.RuVQUoj7.HfvZBr6LTs.oRlpSVzUu.K', 0, 'Sabrine ', 'Malawi', '', '', '', 1, 'rwZzpO74e16m', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(91, 'Kanlaweba700@gmail.com', '$2y$10$KQrrLp.0rWimpDoyuOuHvuwXwmnOnGW/goDH7GidTE7zXkc0xo1hC', 0, 'Eba', ' Kanalaw', '', '', '', 1, '7F9bKuWI2RO8', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(92, 'judyAbn285@gmail.com', '$2y$10$kUFWucI9NgNC/VXLkcUJ9ua0XX/pTdhLF6LsfbwVYl083uBy/x5si', 0, 'Judy', ' Abnero', '', '', '', 1, 'KQIP6VtLWn7e', '', '2022-08-26', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(93, 'k.aquino65@gmail.com', '$2y$10$I3aMNamku0rguf3NFRbt.uqrz2/oyN14MaS7GMJ2wbvBkTf5U.0HO', 0, 'Karl ', 'Aquino', '', '', '', 1, 'QdH9T3icZNRm', '', '2022-08-30', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(94, 'julianneS801@gmail.com', '$2y$10$4jR.cUjT8C3rPoQMePZ5DO6RAP.N5/RHdDYuqnimX9bmcGb1b6pWi', 0, 'Julianne ', 'Sanchez', '', '', '', 1, 'GwpbgMsxuyON', '', '2022-08-30', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(95, 'LouiM901@gmail.com', '$2y$10$o5zk2tS7W991TIQV7OFpnel7OoDcDZP2cKrdP3gCIsalSJO9HAfS2', 0, 'Loui ', 'Maiquez', '', '', '', 1, 'nV9lSZrabvTF', '', '2022-08-30', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(96, 'maalihazel22@gmail.com', '$2y$10$sM.uTEYpjkbfNVtzShruquQup1rVc0OfWEYRD/Blu5PEQRlgMANBK', 0, 'Hazel ', 'Maali', '', '', '', 1, 'JoBpgeTsvrqK', '', '2022-08-30', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(97, 'kyleB1022@gmail.com', '$2y$10$ZaMj5L1ONhGmvJwQMC9LTO71FN0pI6PIbPkU9kScMuTkNGEKv8iEK', 0, 'Kyle ', 'Belarmino', '', '', '', 1, 'HgK4zPJau7t9', '', '2022-08-30', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(98, 'joshuaG245@gmail.com', '$2y$10$wN0XU0oOICuPDsFW5AbHvuI29xWI9XFWUnygquWQtFm4lDZbKzuPC', 0, 'Joshua ', 'Garcia', '', '', '', 1, 'yqcXjN3ERA9b', '', '2022-08-30', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(99, 'danielleP601@gmail.com', '$2y$10$IDIpB4AlqutXFDf81bZTP.zfLh4AlDrCPg4TOUWhRQJ4Cu7HwSvhm', 0, 'Danielle ', 'Padilla', '', '', '', 1, 'z6AcButKoJUN', '', '2022-08-30', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(100, 'joanT668@gmail.com', '$2y$10$NkctZURQYDFZD.B5GNdwdeO4oF55BLiqQTgO/9LsPiczVn97AKEpe', 0, 'Joan Mae ', 'Tulis', '', '', '', 1, 'CjvXmFuYrg8W', '', '2022-08-30', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(101, 'jawoKat2029@gmail.com', '$2y$10$XLSd98.qKzuE0S.OB9S2U.EaQNDXBLO5OTIaVudhXzeyFQV.pNRaW', 0, 'Jawo ', 'Katagumpay', '', '', '', 1, 'g9k5MZpDnBRK', '', '2022-08-30', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(102, 'ronaAcebes201@gmail.com', '$2y$10$AYlW3FXl31X.AXyBl77W3eHqbzCjp93yvdJ.FB.eKzv1cpq.c3K8u', 0, 'Ronalyn', ' Acebes', '', '', '', 1, 'l4UtbfuFkeBi', '', '2022-08-30', 0, 0, '', '', '', '', '', '', '', '', '', 1),
(103, 'yzakN001@gmail.com', '$2y$10$uBnwVB2bUMLg1wYTDdiNPeBhYRPKcIPR.ppcQp.bM/hxJEA28Kfoa', 0, 'Yzak ', 'Nambawan', '', '', '', 1, '6VLQyjOUERWN', '', '2022-08-30', 0, 0, '', '', '', '', '', '', '', '', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distributorapplication`
--
ALTER TABLE `distributorapplication`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distributorid`
--
ALTER TABLE `distributorid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distributor_inventory`
--
ALTER TABLE `distributor_inventory`
  ADD PRIMARY KEY (`dist_inventoryid`),
  ADD KEY `productid` (`productid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `distributor_resellers`
--
ALTER TABLE `distributor_resellers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distributor_shop`
--
ALTER TABLE `distributor_shop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notificationid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reseller_orders`
--
ALTER TABLE `reseller_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
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
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `distributorapplication`
--
ALTER TABLE `distributorapplication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `distributorid`
--
ALTER TABLE `distributorid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `distributor_inventory`
--
ALTER TABLE `distributor_inventory`
  MODIFY `dist_inventoryid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `distributor_resellers`
--
ALTER TABLE `distributor_resellers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `distributor_shop`
--
ALTER TABLE `distributor_shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notificationid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `reseller_orders`
--
ALTER TABLE `reseller_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `distributor_inventory`
--
ALTER TABLE `distributor_inventory`
  ADD CONSTRAINT `distributor_inventory_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `distributor_inventory_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
