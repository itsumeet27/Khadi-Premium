-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2018 at 12:01 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

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
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `short_desc` varchar(50) NOT NULL,
  `long_desc` varchar(255) NOT NULL,
  `featured` tinyint(4) NOT NULL DEFAULT '0',
  `deleted` tinyint(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `author`, `image`, `date`, `short_desc`, `long_desc`, `featured`, `deleted`) VALUES
(1, 'Test', 'test author', '/khadi/images/blog/f73a2063ac7356c2c650cf20a40fe290.jpg', '2018-10-21 14:08:41', 'Test short', 'Test long', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `items` text NOT NULL,
  `expire_date` datetime NOT NULL,
  `paid` tinyint(4) NOT NULL DEFAULT '0',
  `shipped` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(19, 'Bathing Bars', 4),
(20, 'Beauty Regime', 0),
(21, 'Natural Protection from Sun and Pollution Regime', 20),
(22, 'Natural Advanced Night Repair Regime', 20),
(23, 'Natural Nourishment for Hair and Body Regime', 20);

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
  `cat_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `beauty_regime` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `sku`, `price`, `list_price`, `categories`, `image`, `tagline`, `short_desc`, `long_desc`, `weight`, `featured`, `stock`, `deleted`, `cat_name`, `beauty_regime`) VALUES
(2, 'Therapeutic Aloe Vera Gel', 'GE-AV-050', 525, 0, '8', '/khadi/images/aloe vera gel.jpg', 'Handcrafted with Love. Supply is Limited', 'With the nourishment of neem and tulsi extracts', 'The medicinal properties of aloe vera, tulsi, and neem combined together protects the skin from environmental damages and other infections due to pollution/dust, cleansing the skin from within and giving it a healthy glow.\r\n\r\nDirections for use: Wash face and apply gel on the face in circular motion. Clean the face if necessary\r\n\r\nIngredients: Aloe vera gel, neem extract, tulsi extract, glycerine, carbopol, acacia catches, meadowfoam oil and Punica granatum.', '50 gms', 1, 'Available', 0, 'skin-care', 0),
(3, 'Moisturising Aloe Vera Bar', 'SO-AG-100', 205, 0, '19', '/khadi/images/aloe vera bar.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of essential oils and glycerin', 'The intensive formulation of aloe vera extract and glycerin deeply moisturizes the skin eliminating moistness, reducing itching and reversing aging while tightening the skin.\r\n\r\nIngredients: Aloe vera extract, essential oils, glycerin and soap base.', '100 gms', 1, 'Available', 0, 'bath-and-beauty', 0),
(4, 'Aromatic Rose Water Bar', 'SO-RG-100', 205, 0, '19', '/khadi/images/rose water bar.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of essential oils and glycerin', 'Rose water acts as a mild cleanser and calms the redness of the skin leaving a splendid aroma while essential oils hydrate and moisturizes the skin giving a natural glow.   \r\n\r\nIngredients:Rose water, essential oils, glycerin and soap base.', '100 gms', 1, 'Available', 0, 'bath-and-beauty', 0),
(5, 'Hairfall Control Neroli Shampoo', 'SH-NE-200', 965, 0, '15', '/khadi/images/shampoo.jpg', 'Handcrafted with Love. Supply is Limited', 'With the activeness of lime and frankincense oil', 'Vitamin C abundantly found in neroli, tangerine and lime oil helps produce collagen that is essential to maintain healthy and strong hair. While this combination curbs dandruff as well, usage of frankincense oil promotes healthy scalp moisturizing existing hair follicles preventing hair loss. \r\n\r\nDirections for use: Massage 2-5 ml shampoo in wet hair and scalp and rinse thoroughly with water. Repeat if necessary.\r\n\r\nIngredients: Neroli oil, tangerine oil, frankincense oil, lime oil, acryl 60, Olive 400, Olive 300,decyl-glucoside, potassium sorbate, Cocamidopropyl betaine, nigella sativa oil and deionized water.', '200 ml', 1, 'Available', 0, 'hair-care', 0),
(14, 'Anti Acne Patchouli Face Pack', 'FP-PA-050', 505, 0, '14', '', 'Handcrafted with Love. Supply is Limited', 'With the activeness of sage and tamanu oil', 'The anti-aging and anti-inflammatory properties of patchouli and sage prevents wrinkles, dark spots, acne and removes skin impurities while tamanu oil that is rich in fatty acids heal the skin nourishing it from within.\r\n\r\nDirections for use: Apply a thick layer onto clean and dry face &amp; neck. Leave for 15-20 mins. Rinse with water. Use daily or as needed.\r\n\r\nIngredients: Patchouli, glycerin, sage, fuller earth, tangerine oil, tamanu oil, cedarwood oil, cream base GMS(S.E.), cetyl alcohol, stearic acid, Oliver 1000, xanthan and phenoxyethanol.', '50 gms', 0, 'Available', 1, 'skin-care', 0),
(15, 'Anti Aging Argan Cream', 'AG-AR-015', 505, 0, '5', '/khadi/images/products/a4d57f2497205d88a12d3da5d7b99d20.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of olive and patchouli oil', 'The collective anti-aging properties of argan, olive and patchouli oil are combined in one formulation to tighten the skin and impart a radiant glow, making it supple and youthful.\r\n\r\nDirections for use: Slowly massage on the face in an upward circular motion. Best used after bathing or after washing the face when the skin is most receptive to hydration\r\n\r\nIngredients: Argan oil, meadowfoam oil, olive oil, patchouli oil, sesame oil, frankincense oil, borax, glycerin, vitamin E, Phenoxyethanol, Olive 1000, cetyl alcohol, sodium gluconate and aqua water', '15 gms', 0, 'Available', 0, 'skin-care', 0),
(16, 'Anti Acne Sage Cream', 'AC-SA-015', 505, 0, '6', '/khadi/images/products/ce463853315807fb052931f45c0a5e86.jpg', 'Handcrafted with Love. Supply is Limited', 'With the benefits of tangerine and meadowfoam oil', 'The amalgam of sage, tangerine &amp; meadowfoam oil rich in antioxidants and vitamins helps the skin to rebuild damaged skin tissues, fight against pollution and clear skin impurities that treat acne, giving the skin a youthful and radiant glow.\r\n\r\nDirections for use: Slowly massage on the face in an upward circular motion. Best used after washing the face when skin is most receptive to hydration.\r\n\r\nIngredients: Sage oil, tangerine oil, meadowfoam oil, grapeseed oil, olive 1000, cetyl alcohol, sodium gluconate, borax, glycerin, phenoxyethanol and aqua water.', '15 gms', 0, 'Available', 0, 'skin-care', 0),
(17, 'Argan Lip Balm', 'LB-AR-015', 465, 0, '11', '/khadi/images/products/4672163dc9c1bde91af5f26d2abe3a14.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of olive and patchouli oil', 'The collective anti-aging properties of argan, olive and patchouli oil are combined in one formulation to tighten the skin and impart a radiant glow, making it supple and youthful.\r\n\r\nDirections for use: Slowly massage on the face in an upward circular motion. Best used after bathing or after washing the face when the skin is most receptive to hydration\r\n\r\nIngredients: Argan oil, meadowfoam oil, olive oil, patchouli oil, sesame oil, frankincense oil, borax, glycerin, vitamin E, Phenoxyethanol, Oliver 1000, cetyl alcohol, sodium gluconate ,and aqua water', '15 gms', 0, 'Available', 0, 'skin-care', 0),
(18, 'Meadowfoam Lip Scrub', ' LS-MF-015', 465, 0, '11', '/khadi/images/products/c0f1305b1b80378614fca8f8bd03cc05.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of sesame and lime oil', 'Organic sugar is a strong exfoliating agent that also imparts a natural hue to the lips while the blend of meadowfoam, sesame and lime oil repairs damaged tissues, improves blood circulation keeping them moisturized naturally.\r\n\r\nDirections for use: Apply evenly and liberally on lips as required.\r\n\r\nIngredients: Meadowfoam oil, argan oil, frankincense oil, soyabean oil, geranium oil, lime oil, sesame oil, organic sugar, and beeswax. ', '15 gms', 0, 'Available', 0, 'skin-care', 0),
(19, 'Meadowfoam Lip Scrub', 'LS-MF-015', 465, 0, '22', '/khadi/images/products/36af7bc435dad60851b8fafce1eb350b.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of sesame and lime oil', 'Organic sugar is a strong exfoliating agent that also imparts a natural hue to the lips while the blend of meadowfoam, sesame and lime oil repairs damaged tissues, improves blood circulation keeping them moisturized naturally.\r\n\r\nDirections for use: Apply evenly and liberally on lips as required.\r\n\r\nIngredients: Meadowfoam oil, argan oil, frankincense oil, soyabean oil, geranium oil, lime oil, sesame oil, organic sugar, and beeswax.', '15 gms', 0, 'Available', 0, 'skin-care', 1),
(20, 'Argan Lip Balm', 'LB-AR-015', 465, 0, '22', '/khadi/images/products/71a2e913aa267b37efc16f0a234beb48.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of olive and patchouli oil', 'The collective anti-aging properties of argan, olive and patchouli oil are combined in one formulation to tighten the skin and impart a radiant glow, making it supple and youthful.\r\n\r\nDirections for use: Slowly massage on the face in an upward circular motion. Best used after bathing or after washing the face when the skin is most receptive to hydration\r\n\r\nIngredients: Argan oil, meadowfoam oil, olive oil, patchouli oil, sesame oil, frankincense oil, borax, glycerin, vitamin E, Phenoxyethanol, Oliver 1000, cetyl alcohol, sodium gluconate and aqua water', '15 gms', 0, 'Available', 0, 'skin-care', 1),
(21, 'Therapeutic Aloe Vera Gel', 'GE-AV-050', 525, 0, '21', '/khadi/images/products/babcf4fa0e2977ccc0eb677aff1618b0.jpg', 'Handcrafted with Love. Supply is Limited', 'With the nourishment of neem and tulsi extracts', 'The medicinal properties of aloe vera, tulsi, and neem combined together protects the skin from environmental damages and other infections due to pollution/dust, cleansing the skin from within and giving it a healthy glow.\r\n\r\nDirections for use: Wash face and apply gel on the face in circular motion. Clean the face if necessary\r\n\r\nIngredients: Aloe vera gel, neem extract, tulsi extract, glycerine, carbopol, acacia catches, meadowfoam oil and Punica granatum.', '50 gms', 0, 'Available', 0, 'skin-care', 1),
(22, 'Refreshing Neroli Face Mist', 'FM-NE-060', 505, 0, '21', '/khadi/images/products/b03e6df2fcb1dddf537e707ccebaf905.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of rose water and aloe vera gel', 'The anti-bacterial, antiseptic and anti-oxidant properties of neroli forms a protective shield around the skin to prevent it from environmental damage while rose water &amp; aloe vera hydrates the skin boosting refreshment, making it naturally glow.\r\n\r\nDirections for use: Spray mist once or twice over face and neck till dry, wipe if necessary.\r\n\r\nIngredients: Neroli oil, rose water, Aloe Vera gel, lime oil, spearmint, triethanolamine, and glycerin.', '60 ml', 0, 'Available', 0, 'skin-care', 1),
(23, 'Refreshing Neroli Face Mist', 'FM-NE-060', 505, 0, '9', '/khadi/images/products/9c3a50ed03ce1c4484454594c9ce2a7a.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of rose water and aloe vera gel', 'The anti-bacterial, antiseptic and anti-oxidant properties of neroli forms a protective shield around the skin to prevent it from environmental damage while rose water &amp; aloe vera hydrates the skin boosting refreshment, making it naturally glow.\r\n\r\nDirections for use: Spray mist once or twice over face and neck till dry, wipe if necessary.\r\n\r\nIngredients: Neroli oil, rose water, Aloe Vera gel, lime oil, spearmint, triethanolamine, and glycerin.', '60 ml', 0, 'Available', 0, 'skin-care', 0),
(24, 'Anti-Bacterial Neem Face Wash', 'FW-NM-060', 625, 0, '21', '/khadi/images/products/73b4f5d959dde557554cf7ce10211238.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of tulsi and tea tree oil', 'The collective blend of neem, tulsi, and tea tree oil exfoliates the skin, cleanses pores, treats acne, and tightens the skin reducing the chances of wrinkles and premature aging.\r\n\r\nDirections for use: Lather up and massage over the wet face. Rinse off with water and pat dry. Use in morning &amp; evening for best results.\r\n\r\nIngredients: Neem oil, tulsi oil, tea tree, aloe vera, Olive 400, Olive 300, acryl 60, decyl-glucoside, coco betaine, oil and aqua water.', '60 ml', 0, 'Available', 0, 'skin-care', 1),
(25, 'Anti-Bacterial Neem Face Wash', 'FW-NM-060', 625, 0, '13', '/khadi/images/products/3c130e7e5a64d1ce4d1f92f3b4285e59.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of tulsi and tea tree oil', 'The collective blend of neem, tulsi, and tea tree oil exfoliates the skin, cleanses pores, treats acne, and tightens the skin reducing the chances of wrinkles and premature aging.\r\n\r\nDirections for use: Lather up and massage over the wet face. Rinse off with water and pat dry. Use in morning &amp; evening for best results.\r\n\r\nIngredients: Neem oil, tulsi oil, tea tree, aloe vera, Olive 400, Olive 300, acryl 60, decyl-glucoside, coco betaine, oil and aqua water.', '60 ml', 0, 'Available', 0, 'skin-care', 0),
(26, 'Rejuvenating Chamomile Night Cream', 'NC-CH-050', 755, 0, '22', '/khadi/images/products/55bf5a58ec3471ac63b32c32988e3988.jpg', 'Handcrafted with Love. Supply is Limited', 'With the benefits of argan and frankincense oil', 'The medicinal properties of chamomile protect skin from damage, naturally moisturizes the skin and promotes calmness and sleep while astringent properties of frankincense oil tighten the skin making it youthful and supple.  \r\n\r\nDirections for use: Slowly massage on the face in a circular motion. For best result, wash the face and apply it at night when the skin is most receptive to hydration.\r\n\r\nIngredients: Chamomile oil, argan oil, frankincense, Vitamin E, sage oil, tangerine oil, GMS(CE), kokum butter, cetyl alcohol, mango butter, potassium sorbate and aqua water.', '50 gms', 0, 'Available', 0, 'skin-care', 1),
(27, 'Rejuvenating Chamomile Night Cream', 'NC-CH-050', 755, 0, '7', '/khadi/images/products/1a6cf0a9662c27721c0cf987b87d6a35.jpg', 'Handcrafted with Love. Supply is Limited', 'With the benefits of argan and frankincense oil', 'The medicinal properties of chamomile protect skin from damage, naturally moisturizes the skin and promotes calmness and sleep while astringent properties of frankincense oil tighten the skin making it youthful and supple.  \r\n\r\nDirections for use: Slowly massage on the face in a circular motion. For best result, wash the face and apply it at night when the skin is most receptive to hydration.\r\n\r\nIngredients: Chamomile oil, argan oil, frankincense, Vitamin E, sage oil, tangerine oil, GMS(CE), kokum butter, cetyl alcohol, mango butter, potassium sorbate and aqua water.', '50 gms', 0, 'Available', 0, 'skin-care', 0),
(28, 'Hydrating Fenugreek Gel', 'GE-FH-050', 525, 0, '22', '/khadi/images/products/1db8f80e572902d6a68c6dbee14e253a.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of aloe vera and tamanu oil', 'Extracted from the seeds of fenugreek that are high on nutrition, fatty acids, vitamins and volatile organic compounds, fenugreek oil along with aloe vera and tamanu oil produces emollient which is a perfect escape to rejuvenate, moisturize and refresh your skin.\r\n\r\nDirections for use: Wash face and apply gel on the face in circular motion. Clean the face if necessary.\r\n\r\nIngredients: Fenugreek seed extract, carbopol, triethanolamine, aloe vera, glycerin, potassium sorbate, tamanu oil, and aqua water.', '50 gms', 0, 'Available', 0, 'skin-care', 1),
(29, 'Hydrating Fenugreek Gel', 'GE-FH-050', 525, 0, '12', '/khadi/images/products/024196d92b09901c79bb1eec81472df8.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of aloe vera and tamanu oil', 'Extracted from the seeds of fenugreek that are high on nutrition, fatty acids, vitamins and volatile organic compounds, fenugreek oil along with aloe vera and tamanu oil produces emollient which is a perfect escape to rejuvenate, moisturize and refresh your skin.\r\n\r\nDirections for use: Wash face and apply gel on the face in circular motion. Clean the face if necessary.\r\n\r\nIngredients: Fenugreek seed extract, carbopol, triethanolamine, aloe vera, glycerin, potassium sorbate, tamanu oil, and aqua water.', '50 gms', 0, 'Available', 0, 'skin-care', 0),
(30, 'Therapeutic Aloe Vera Gel', 'GE-AV-050', 525, 0, '8', '/khadi/images/products/eb0a06f1f9bb7c15608b819f95fa9358.jpg', 'Handcrafted with Love. Supply is Limited', 'With the nourishment of neem and tulsi extracts', 'The medicinal properties of aloe vera, tulsi, and neem combined together protects the skin from environmental damages and other infections due to pollution/dust, cleansing the skin from within and giving it a healthy glow.\r\n\r\nDirections for use: Wash face and apply gel on the face in circular motion. Clean the face if necessary\r\n\r\nIngredients: Aloe vera gel, neem extract, tulsi extract, glycerine, carbopol, acacia catches, meadowfoam oil and Punica granatum.', '50 gms', 0, 'Available', 0, 'skin-care', 0),
(31, 'Regenerating Patchouli Body Wash', 'BW-PA-200', 565, 0, '23', '/khadi/images/products/05154961dabcaa22ade486affcbdb99b.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of palma rosa and spearmint oil', 'Patchouli is most prominently known for its anti-inflammatory properties that soothe irritated skin, especially during summers. The blend of palmarosa, patchouli and spearmint oil has aromatic advantages that induce peace and harmonizes mood instantly.\r\n\r\nDirections for use: Pour a little shower gel on the loofah. Work up a lather by gently applying it over damp skin. Rinse thoroughly with water.\r\n\r\nIngredients: Patchouli oil, palmarosa oil, spearmint oil, Olive 400, olive 300, acryl 60, decyl-glucoside, coco betaine, phenoxyethanol and aqua water.', '200 ml', 0, 'Available', 0, 'bath-and-beauty', 1),
(32, 'Regenerating Patchouli Body Wash', 'BW-PA-200', 565, 0, '18', '/khadi/images/products/f570343d5cba719f762d6b40c6884b5e.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of palma rosa and spearmint oil', 'Patchouli is most prominently known for its anti-inflammatory properties that soothe irritated skin, especially during summers. The blend of palmarosa, patchouli and spearmint oil has aromatic advantages that induce peace and harmonizes mood instantly.\r\n\r\nDirections for use: Pour a little shower gel on the loofah. Work up a lather by gently applying it over damp skin. Rinse thoroughly with water.\r\n\r\nIngredients: Patchouli oil, palmarosa oil, spearmint oil, Olive 400, olive 300, acryl 60, decyl-glucoside, coco betaine, phenoxyethanol and aqua water.', '200 ml', 0, 'Available', 0, 'bath-and-beauty', 0),
(33, 'Body Softening Cedarwood Moisturizer', 'MO-CE-100', 565, 0, '23', '/khadi/images/products/e5d2fb7851ee39bfb6d6427763bd024f.jpg', 'Handcrafted with Love. Supply is Limited', 'With the benefits of frankincense and carrot seed oil', 'The astringent properties of cedarwood and frankincense oil therapeutically tighten loose muscles imparting a sense of firmness and youth, while carrot seed oil helps heal chapped, dry and cracked skin nourishing it from within.  \r\n\r\nDirections for use: Apply gently all over the body slowly massaging it in. Best used after bathing when the skin is most receptive to hydration.\r\n\r\nIngredients: Cedarwood oil, carrot seed oil, frankincense oil, olive 1000, glycerol monostearate, stearic acid, sodium gluconate, aloe vera, phenoxyethanol and aqua water.', '100 ml', 0, 'Available', 0, 'body-care', 1),
(34, 'Body Softening Cedarwood Moisturizer', 'MO-CE-100', 565, 0, '17', '/khadi/images/products/ea00f28a22c45b0d6f06056674b87302.jpg', 'Handcrafted with Love. Supply is Limited', 'With the benefits of frankincense and carrot seed oil', 'The astringent properties of cedarwood and frankincense oil therapeutically tighten loose muscles imparting a sense of firmness and youth, while carrot seed oil helps heal chapped, dry and cracked skin nourishing it from within.  \r\n\r\nDirections for use: Apply gently all over the body slowly massaging it in. Best used after bathing when the skin is most receptive to hydration.\r\n\r\nIngredients: Cedarwood oil, carrot seed oil, frankincense oil, olive 1000, glycerol monostearate, stearic acid, sodium gluconate, aloe vera, phenoxyethanol and aqua water.', '100 ml', 0, 'Available', 0, 'body-care', 0),
(35, 'Deep Nourishing Argan Shampoo', 'SH-AR-200', 965, 0, '23', '/khadi/images/products/817fc3fa7e9d7bfc838684ef203edb85.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of rosemary and tea tree oil', 'Argan oil is rich in various nutrients and Vitamin E that is beneficial in repairing damaged follicles and building healthy follicles promoting hair growth. The blend of argan, rosemary, and tea tree oil in tandem revives dull, lifeless hair preventing frizziness and imparts a healthy sheen while increasing its volume.\r\n\r\nDirections for use: Massage 2-5 ml shampoo in wet hair and scalp and rinse thoroughly with water. Repeat if necessary.\r\n\r\nIngredients: Arganoil, rosemary oil, tea tree oil, acryl 60, Olive 400, Olive 300,decyl-glucoride, potassium sorbate, coco amidopropylbetaine, nigella sativa oiland deionized water.', '200 ml', 0, 'Available', 0, 'hair-care', 1),
(36, 'Deep Nourishing Argan Shampoo', 'SH-AR-200', 965, 0, '15', '/khadi/images/products/5725817ca49759308521f0aba1ba4d32.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of rosemary and tea tree oil', 'Argan oil is rich in various nutrients and Vitamin E that is beneficial in repairing damaged follicles and building healthy follicles promoting hair growth. The blend of argan, rosemary, and tea tree oil in tandem revives dull, lifeless hair preventing frizziness and imparts a healthy sheen while increasing its volume.\r\n\r\nDirections for use: Massage 2-5 ml shampoo in wet hair and scalp and rinse thoroughly with water. Repeat if necessary.\r\n\r\nIngredients: Arganoil, rosemary oil, tea tree oil, acryl 60, Olive 400, Olive 300,decyl-glucoride, potassium sorbate, coco amidopropylbetaine, nigella sativa oiland deionized water.', '200 ml', 0, 'Available', 0, 'hair-care', 0),
(37, 'Deep Nourishing Argan Conditioner', 'CO-AR-100', 565, 0, '23', '/khadi/images/products/3add19fbc78292386883ee1427e26931.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of cedarwood and olive oil', 'Fatty acids present in argan oil is an effective and natural remedy to increase blood circulation and cell growth important for hair follicles while cedarwood and olive oil hydrates, nourishes and moisturizes them making hair softer, silkier and shinier.\r\n\r\nDirections for use: Apply for 1-2 minutes after rinsing shampoo and rinse again thoroughly with water\r\n\r\nIngredients: Argan oil, olive oil, cedarwood oil, CM 1000, PEG 07, Potassium sorbate, Vitamin E oil, glycerin, rosemary oil, nigella sativa oil, Phenoxyethanol, and aqua water.', '100 ml', 0, 'Available', 0, 'hair-care', 1),
(38, 'Deep Nourishing Argan Conditioner', 'CO-AR-100', 565, 0, '16', '/khadi/images/products/afda8d73f073671db16eb642a5cc0555.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of cedarwood and olive oil', 'Fatty acids present in argan oil is an effective and natural remedy to increase blood circulation and cell growth important for hair follicles while cedarwood and olive oil hydrates, nourishes and moisturizes them making hair softer, silkier and shinier.\r\n\r\nDirections for use: Apply for 1-2 minutes after rinsing shampoo and rinse again thoroughly with water\r\n\r\nIngredients: Argan oil, olive oil, cedarwood oil, CM 1000, PEG 07, Potassium sorbate, Vitamin E oil, glycerin, rosemary oil, nigella sativa oil, Phenoxyethanol, and aqua water.', '100 ml', 0, 'Available', 0, 'hair-care', 0),
(39, 'Hairfall Control Neroli Shampoo', 'SH-NE-200', 965, 0, '15', '/khadi/images/products/9442fdd854b27490a222f7649f1076f8.jpg', 'Handcrafted with Love. Supply is Limited', 'With the activeness of lime and frankincense oil', 'Vitamin C abundantly found in neroli, tangerine and lime oil helps produce collagen that is essential to maintain healthy and strong hair. While this combination curbs dandruff as well, usage of frankincense oil promotes healthy scalp moisturizing existing hair follicles preventing hair loss. \r\n\r\nDirections for use: Massage 2-5 ml shampoo in wet hair and scalp and rinse thoroughly with water. Repeat if necessary.\r\n\r\nIngredients: Neroli oil, tangerine oil, frankincense oil, lime oil, acryl 60, Olive 400, Olive 300,decyl-glucoside, potassium sorbate, Cocamidopropyl betaine, nigella sativa oil and deionized water.', '200 ml', 0, 'Available', 0, 'hair-care', 0),
(40, 'Stress Relieving Pimentoberry Body Wash', 'BW-PI-200', 565, 0, '18', '/khadi/images/products/19d9968b1c399cfc35e077d2ddc3f673.jpg', 'Handcrafted with Love. Supply is Limited', 'With the benefits of lemongrass and aloe vera oil', 'Antiseptic and antioxidant properties of pimentoberry and lemongrass detoxifies the body, boosts immunity, strengthens skin tissues and tones up the pores by sterilizing and healing them. Simultaneously while aloe vera acts as a natural moisturizer inducing radiant glow, neroli oil improves skin flexibility and prevents it against environmental damages.\r\n\r\nDirections for use: Pour a little shower gel on the loofah. Work up a lather by gentlyapplying it over damp skin. Rinse thoroughly with water.\r\n\r\nIngredients: Pimentoberry oil, aloe vera oil, lemongrass oil, neroli oil, Olive 400, olive 300, acyl 60,decyl-glucoside, cocobetaine, phenoxyethanol and aqua water.', '200 ml', 0, 'Available', 0, 'bath-and-beauty', 0),
(41, 'Anti-Pollution Lime Face Mist', 'FM-BE-060', 505, 0, '9', '/khadi/images/products/39736b1e455dae9553ce9c274f54907e.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of bergamot and meadowfoam oil', 'Lime contains antiseptic &amp; astringent properties that treat skin tan, opens pores and removes dead skin while its blend with bergamot and meadowfoam oil eradicates excessive oil, dirt, and pollutants, rejuvenating the skin inducing a healthy radiant glow.\r\n\r\nDirections for use: Spray mist once or twice over face and neck till dry, wipe if necessary.\r\n\r\nIngredients: Bergamot oil, lime oil, meadowfoam oil, triethanolamine, glycerine and rose water.', '60 ml', 0, 'Available', 0, 'skin-care', 0),
(42, 'Ylang Ylang Day Cream', 'DC-YL-050', 575, 0, '7', '/khadi/images/products/8d88d891e910feb026775d9cd5d11903.jpg', 'Handcrafted with Love. Supply is Limited', 'With the nourishment of aloe vera extract and argan oil', 'Ylang ylang is an effective agent in exfoliating the skin, treating pigmentation, maintaining the balance of oil in the skin, soothing the skin while keeping it smooth and young. These benefits are blended with agents of aloe vera and argan that hydrates and moisturizes the skin making it an apt remedy to survive a harsh, long sunny day.\r\n\r\nDirections for use: Slowly massage on the face in an upward &amp; circular motion. Best used after bathing or after washing the face when the skin is most receptive to hydration\r\n\r\nIngredients: GMS, shea butter, mango butter, Vitamin E, aloe vera, turmeric oil, ylang ylang oil, argan oil, cetyl alcohol, stearic acid, potassium sorbate, nigella sativa oil and aqua water. ', '50 gms', 0, 'Available', 0, 'skin-care', 0),
(43, 'Regenerating Patchouli Face Wash', 'FW-PA-060', 625, 0, '13', '/khadi/images/products/2b08b146ec8c77ca763927cd2717ed4a.jpg', 'Handcrafted with Love. Supply is Limited', 'With the activeness of palma rosa and rosemary oil', 'The astringent and anti-aging properties of patchouli are most appropriate to regain a lively-looking skin while rosemary lightens blemishes and gives the face a radiant glow.\r\n\r\nDirections for use: Lather up and massage over the wet face. Rinse off with water and pat dry. Use in morning &amp; evening for best results.\r\n\r\nIngredients: Patchouli oil, palmarosa oil, rosemary oil, olive 400, olive 300, acryl 60, decyl-glucoside, coco betaine, spearmint and aqua water.', '60 ml', 0, 'Available', 0, 'skin-care', 0),
(44, 'Anti Acne Patchouli Face Pack', 'FP-PA-050', 505, 0, '14', '/khadi/images/products/c12936469eb8f4a732e0389a4e5ab00a.jpg', 'Handcrafted with Love. Supply is Limited', 'With the activeness of sage and tamanu oil', 'The anti-aging and anti-inflammatory properties of patchouli and sage prevents wrinkles, dark spots, acne and removes skin impurities while tamanu oil that is rich in fatty acids heal the skin nourishing it from within.\r\n\r\nDirections for use: Apply a thick layer onto clean and dry face &amp; neck. Leave for 15-20 mins. Rinse with water. Use daily or as needed.\r\n\r\nIngredients: Patchouli, glycerin, sage, fuller earth, tangerine oil, tamanu oil, cedarwood oil, cream base GMS(S.E.), cetyl alcohol, stearic acid, Oliver 1000, xanthan and phenoxyethanol.', '50 gms', 0, 'Available', 0, 'skin-care', 0),
(45, 'Exfoliating Sage Face Scrub', 'FS-SA-050', 735, 0, '10', '/khadi/images/products/bc473156d5e61819c4163001b4d8d89e.jpg', 'Handcrafted with Love. Supply is Limited', 'With the activeness of lime and tangerine oil', 'The collective antioxidant properties of sage, lime, and tangerine oil treats dark spots, acne, blemishes, skin tan, skin impurities and also rebuilds damaged skin tissues preventing wrinkles, dull skin, and early aging.  \r\n\r\nDirections for use: Gently massage with the fingertips in a circular motion over damp face. Wash off with water and pat dry. Use 2-3 times in a week for best results.\r\n\r\nIngredients: Sage oil, tangerine oil, lime oil, nigella sativa oil, aloe vera gel, walnut powder, phenoxyethanol and cream base', '50 gms', 0, 'Available', 0, 'skin-care', 0),
(46, 'Regenerating Apricot Vegetable Bar', 'SO-AV-100', 365, 0, '19', '/khadi/images/products/8b1177f3db87ec7447f8756b1551d601.jpg', 'Handcrafted with Love. Supply is Limited', 'With the nourishment of essential oils and vegetable fats', 'Apricot contains exfoliating properties and are abundant in vitamin A, B, C, and E that revitalizes and nourishes the skin, maintaining its elasticity, and moisture. These properties combined with vegetable fats and essential oils prevent aging and hydrates the skin improving skin tone.\r\n\r\nIngredients: Apricot extract oil, vegetable fats, essential oils, soap base and saponified oil of coconut', '100', 0, 'Available', 0, 'bath-and-beauty', 0),
(47, 'Oatmeal &amp; Honey Vegetable Bar', 'SO-OV-100', 365, 0, '19', '/khadi/images/products/8dfb111d74da1d931b78a289ad9b971f.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of essential oils and glycerin', 'Fats and oils of vegetables produce a rich lather and contain conditioning properties while the active ingredients of honey kill all bacteria and oatmeal nourishes and moisturizes the skin giving it a soft and supple look.\r\n\r\nIngredients: Oatmeal, organic honey, essential oils, glycerin and soap base.', '100 gms', 0, 'Available', 0, 'bath-and-beauty', 0),
(48, 'Exfoliating Oatmeal &amp; Honey Scrub Bar', 'SO-OH-100', 365, 0, '19', '/khadi/images/products/497895847044ca3096d9f5ea73a799bf.jpg', 'Handcrafted with Love. Supply is Limited', 'With the nourishment of essential oils and glycerin', 'Handmade from loofah fibers that unclogs pores naturally, the active ingredients of honey kills all bacteria while oatmeal nourishes and moisturizes the skin giving it a soft and supple look.\r\n\r\nIngredients: Oatmeal, organic honey, essential oils, glycerin and soap base.', '100 gms', 0, 'Available', 0, 'bath-and-beauty', 0),
(49, 'Exfoliating Almond Scrub Bar', 'SO-EA-100', 365, 0, '19', '/khadi/images/products/ea5f93500f9d04d8df42731f8fd1867f.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of Vitamin E and essential oils', 'The natural properties of Vitamin E have a soothing effect on the skin, whereas the enriching almond gives your skin a soft and moisturized appearance that prevents wrinkles and acne outbreaks.\r\n\r\nIngredients: Almond powder, soap base, jojoba oil, vitamin E, aloe vera, walnut scrub and tamanu oil.', '100 gms', 0, 'Available', 0, 'bath-and-beauty', 0),
(50, 'Exfoliating Neem &amp; Tulsi Scrub Bar', 'SO-NM-100', 365, 0, '19', '/khadi/images/products/ae4e4a4db2392dc5ab59342522b01388.jpg', 'Handcrafted with Love. Supply is Limited', 'With the nourishment of essential oils and glycerin', 'Enriched with active fighting ingredients of neem and tulsi, this blend of nature is robust in treating skin problems like acne, pimples, blemishes, while glycerin moisturizes the skin giving it a radiant glow.\r\n\r\nIngredients: Neem Patra extract, tulsi extract, loofah fibers, essential oils, glycerin and soap base.', '100 gms', 0, 'Available', 0, 'bath-and-beauty', 0),
(51, 'Antiseptic Lemon &amp; Tulsi Bar', 'SO-AL-100', 205, 0, '19', '/khadi/images/products/f4486d45af71233e6fc3b4380ed85e0f.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of Vitamin C and essential oils', 'The richness of Vitamin C present in lemon when combined with the antibacterial properties of tulsi, skin problems like itching comes to an end and skin tone lightens too. \r\n\r\nIngredients: Lemon extract, tulsi extract, essential oils, glycerin and soap base.', '100 gms', 0, 'Available', 0, 'bath-and-beauty', 0),
(52, 'Rejuvenating Ylang Ylang Bar', 'SO-YL-100', 205, 0, '19', '/khadi/images/products/c1e4dea2e5b688c58999aae5e69e23e3.jpg', 'Handcrafted with Love. Supply is Limited', 'With the nourishment of Jojoba oil and Aloe vera', 'The alluring effect of Ylang Ylang calms the mind and has a lasting fragrance which is blended with aloe vera that hydrates the skin and gives it a radiant look.  \r\n\r\nIngredients: Ylang ylang oil, jojoba oil, aloe vera, glycerin, wheat germ oil, essential oils and soap base.', '100 gms', 0, 'Available', 0, 'bath-and-beauty', 0),
(53, 'Reviving Mint Bar', 'SO-MG-100', 205, 0, '19', '/khadi/images/products/885c6ba71bacbc7af31cf22c14b24dbc.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of tulsi and glycerin', 'As the cooling properties of mint revive the scorched skin during summers, tulsi extract reconstructs damaged cells gifting you a glowing healthy skin. \r\n\r\nIngredients: Mint extract, tulsi extract, essential oils, glycerin and soap base.', '100 gms', 0, 'Available', 0, 'bath-and-beauty', 0),
(54, 'Anti-Bacterial Neem &amp; Tulsi Bar', 'SO-NT-100', 205, 0, '19', '/khadi/images/products/077d4cc45e60f55c1df06769047da0ff.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of essential oils and glycerin', 'The medicinal properties of neem prevent aging, soothes dry skin and treats acne whereas tulsi is an efficient way to increase skin elasticity giving you tighter skin.\r\n\r\nIngredients: Neem Patra extract, tulsi extract, essential oils, glycerin and soap base.', '100 gms', 0, 'Available', 0, 'bath-and-beauty', 0),
(55, 'Moisturizing Aloe Vera Bar', 'SO-AG-100', 205, 0, '19', '/khadi/images/products/a494c3a5e73aa35b743f78911624c78b.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of essential oils and glycerin', 'The intensive formulation of aloe vera extract and glycerin deeply moisturizes the skin eliminating moistness, reducing itching and reversing aging while tightening the skin.\r\n\r\nIngredients: Aloe vera extract, essential oils, glycerin and soap base.', '100 gms', 0, 'Available', 0, 'bath-and-beauty', 0),
(56, 'Refreshing Lime Bar', 'SO-LG-100', 205, 0, '19', '/khadi/images/products/de846613c1fd70c09c41c5c6b5553ffb.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of Vitamin C and essential oils', 'The intensity of citrus infused with enriching essential oils is most appropriate to rejuvenate the skin during the summers as it brightens your skin tone and adds a refreshing fragrance to it.\r\n\r\nIngredients: Lime extract, tulsi extract, essential oils, glycerin and soap base.', '100 gms', 0, 'Available', 0, 'bath-and-beauty', 0),
(57, 'Aromatic Rose Water Bar', 'SO-RG-100', 205, 0, '19', '/khadi/images/products/406f999bed83240429f2bac531137a50.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of essential oils and glycerin', 'Rose water acts as a mild cleanser and calms the redness of the skin leaving a splendid aroma while essential oils hydrate and moisturizes the skin giving a natural glow.  \r\n\r\nIngredients: Rose water, essential oils, glycerin and soap base.', '100 gms', 0, 'Available', 0, 'bath-and-beauty', 0);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(100) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `name`) VALUES
(1, 'Andhra Pradesh'),
(2, 'Arunachal Pradesh'),
(3, 'Assam'),
(4, 'Bihar'),
(5, 'Chhattisgarh'),
(6, 'Goa'),
(7, 'Gujarat'),
(8, 'Haryana'),
(9, 'Himachal Pradesh'),
(10, 'Jammu & Kashmir'),
(11, 'Jharkhand'),
(12, 'Karnataka'),
(13, 'Kerala'),
(14, 'Madhya Pradesh'),
(15, 'Maharashtra'),
(16, 'Manipur'),
(17, 'Meghalaya'),
(18, 'Mizoram'),
(19, 'Nagaland'),
(20, 'Odisha'),
(21, 'Punjab'),
(22, 'Rajasthan'),
(23, 'Sikkim'),
(24, 'Tamil Nadu'),
(25, 'Telangana'),
(26, 'Tripura'),
(27, 'Uttarakhand'),
(28, 'Uttar Pradesh'),
(29, 'West Bengal');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(100) NOT NULL,
  `cart_id` int(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `zipcode` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `productinfo` varchar(255) NOT NULL,
  `txn_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `cart_id`, `firstname`, `email`, `phone`, `address1`, `address2`, `city`, `state`, `country`, `zipcode`, `total`, `productinfo`, `txn_date`) VALUES
(10, 2, 'Sumit', 'sksksharma0@gmail.com', '8286864601', '302  B-7  Sector-9', 'Shanti Nagar  Mira Road EAST', 'Mumbai', '', '', '401107', '1.00', 'Therapeutic Aloe Vera Gel (x1)', '2018-10-29 00:59:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `permission` varchar(255) NOT NULL,
  `join_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `permission`, `join_date`, `last_login`) VALUES
(1, 'Sumeet Sharma', 'sksksharma0@gmail.com', 'password', 'admin,editor', '2018-10-06 01:00:34', '2018-10-03 09:12:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
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
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
