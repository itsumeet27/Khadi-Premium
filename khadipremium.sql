-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 08, 2018 at 01:44 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khadipremium`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `items` text COLLATE utf8_unicode_ci NOT NULL,
  `expire_date` datetime NOT NULL,
  `paid` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(100) NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `parent`) VALUES
(1, 'Skin Care', 0),
(2, 'Hair Care', 0),
(3, 'Body Care', 0),
(4, 'Bath & Beauty', 0),
(5, 'Anti Aging Creams', 1),
(6, 'Anti Acne Creams', 1),
(7, 'Day/Night Creams', 1),
(8, 'Essential Aloe Vera Gel', 1),
(9, 'Essential Face Mist/Toner', 1),
(10, 'Exfoliating Face Scrubs', 1),
(11, 'Essential Lip Care', 1),
(12, 'Hydrating Face Gel', 1),
(13, 'Natural Face Cleansers', 1),
(14, 'Natural Face Packs', 1),
(15, 'Natural Hair Cleansers', 2),
(16, 'Natural Hair Conditioners', 2),
(17, 'Body Lotion', 3),
(18, 'Body Wash', 4),
(19, 'Bathing Bars', 4);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(100) NOT NULL,
  `list_price` int(100) NOT NULL,
  `categories` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tagline` text COLLATE utf8_unicode_ci NOT NULL,
  `short_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `long_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `weight` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `featured` tinyint(4) NOT NULL DEFAULT '0',
  `stock` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  `cat_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `sku`, `price`, `list_price`, `categories`, `image`, `tagline`, `short_desc`, `long_desc`, `weight`, `featured`, `stock`, `deleted`, `cat_name`) VALUES
(1, 'Anti Acne Sage Cream', 'AC-SA-015', 505, 0, '6', '/khadi/images/products/Anti-Acne-Sage-Cream.jpg', 'Handcrafted with Love. Supply is Limited', 'With the benefits of tangerine and meadowfoam oil', 'The amalgam of sage, tangerine & meadowfoam oil rich in antioxidants and vitamins helps the skin to rebuild damaged skin tissues, fight against pollution and clear skin impurities that treat acne, giving the skin a youthful and radiant glow.\r\n\r\nDirections for use: Slowly massage on the face in an upward circular motion. Best used after washing the face when skin is most receptive to hydration.\r\n\r\nIngredients: Sage oil, tangerine oil, meadowfoam oil, grapeseed oil, olive 1000, cetyl alcohol, sodium gluconate, borax, glycerin, phenoxyethanol and aqua water.', '15 gms', 0, 'Available', 0, 'skin-care'),
(2, 'Therapeutic Aloe Vera Gel', 'GE-AV-050', 525, 0, '8', '/khadi/images/aloe vera gel.jpg', 'Handcrafted with Love. Supply is Limited', 'With the nourishment of neem and tulsi extracts', 'The medicinal properties of aloe vera, tulsi, and neem combined together protects the skin from environmental damages and other infections due to pollution/dust, cleansing the skin from within and giving it a healthy glow.\r\n\r\nDirections for use: Wash face and apply gel on the face in circular motion. Clean the face if necessary\r\n\r\nIngredients: Aloe vera gel, neem extract, tulsi extract, glycerine, carbopol, acacia catches, meadowfoam oil and Punica granatum.', '50 gms', 1, 'Available', 0, 'skin-care'),
(3, 'Moisturising Aloe Vera Bar', 'SO-AG-100', 205, 0, '19', '/khadi/images/aloe vera bar.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of essential oils and glycerin', 'The intensive formulation of aloe vera extract and glycerin deeply moisturizes the skin eliminating moistness, reducing itching and reversing aging while tightening the skin.\r\n\r\nIngredients: Aloe vera extract, essential oils, glycerin and soap base.', '100 gms', 1, 'Available', 0, 'bath-and-beauty'),
(4, 'Aromatic Rose Water Bar', 'SO-RG-100', 205, 0, '19', '/khadi/images/rose water bar.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of essential oils and glycerin', 'Rose water acts as a mild cleanser and calms the redness of the skin leaving a splendid aroma while essential oils hydrate and moisturizes the skin giving a natural glow.   \r\n\r\nIngredients:Rose water, essential oils, glycerin and soap base.', '100 gms', 1, 'Available', 0, 'bath-and-beauty'),
(5, 'Hairfall Control Neroli Shampoo', 'SH-NE-200', 965, 0, '15', '/khadi/images/shampoo.jpg', 'Handcrafted with Love. Supply is Limited', 'With the activeness of lime and frankincense oil', 'Vitamin C abundantly found in neroli, tangerine and lime oil helps produce collagen that is essential to maintain healthy and strong hair. While this combination curbs dandruff as well, usage of frankincense oil promotes healthy scalp moisturizing existing hair follicles preventing hair loss. \r\n\r\nDirections for use: Massage 2-5 ml shampoo in wet hair and scalp and rinse thoroughly with water. Repeat if necessary.\r\n\r\nIngredients: Neroli oil, tangerine oil, frankincense oil, lime oil, acryl 60, Olive 400, Olive 300,decyl-glucoside, potassium sorbate, Cocamidopropyl betaine, nigella sativa oil and deionized water.', '200 ml', 1, 'Available', 0, 'hair-care'),
(14, 'Anti Acne Patchouli Face Pack', 'FP-PA-050', 505, 0, '14', '/khadi/images/products/b2014218a0aee14eedb737454f57587d.jpg', 'Handcrafted with Love. Supply is Limited', 'With the activeness of sage and tamanu oil', 'The anti-aging and anti-inflammatory properties of patchouli and sage prevents wrinkles, dark spots, acne and removes skin impurities while tamanu oil that is rich in fatty acids heal the skin nourishing it from within.\r\n\r\nDirections for use: Apply a thick layer onto clean and dry face &amp; neck. Leave for 15-20 mins. Rinse with water. Use daily or as needed.\r\n\r\nIngredients: Patchouli, glycerin, sage, fuller earth, tangerine oil, tamanu oil, cedarwood oil, cream base GMS(S.E.), cetyl alcohol, stearic acid, Oliver 1000, xanthan and phenoxyethanol.', '50 gms', 0, 'Available', 0, 'skin-care'),
(15, 'Anti Aging Argan Cream', 'AG-AR-015', 505, 0, '5', '/khadi/images/products/a4d57f2497205d88a12d3da5d7b99d20.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of olive and patchouli oil', 'The collective anti-aging properties of argan, olive and patchouli oil are combined in one formulation to tighten the skin and impart a radiant glow, making it supple and youthful.\r\n\r\nDirections for use: Slowly massage on the face in an upward circular motion. Best used after bathing or after washing the face when the skin is most receptive to hydration\r\n\r\nIngredients: Argan oil, meadowfoam oil, olive oil, patchouli oil, sesame oil, frankincense oil, borax, glycerin, vitamin E, Phenoxyethanol, Olive 1000, cetyl alcohol, sodium gluconate and aqua water', '15 gms', 0, 'Available', 0, 'skin-care');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `join_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` datetime NOT NULL,
  `permissions` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `join_date`, `last_login`, `permissions`) VALUES
(1, 'Sumeet Sharma', 'sksksharma0@gmail.com', '$2y$10$a0RXEC2lTlnL8Qxw34IdN.JB/gJftdFSvN4bKsg5RXtPjUjTiOjZC', '2018-10-05 13:07:14', '2018-10-08 11:27:08', 'admin, editor');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
