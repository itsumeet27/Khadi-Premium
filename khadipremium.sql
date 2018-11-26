-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2018 at 09:27 PM
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
  `short_desc` text NOT NULL,
  `long_desc` text NOT NULL,
  `featured` tinyint(4) NOT NULL DEFAULT '0',
  `deleted` tinyint(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `author`, `image`, `date`, `short_desc`, `long_desc`, `featured`, `deleted`) VALUES
(2, 'Ylang Ylang or Aloe Vera?', 'Nadia Indulkar', '/khadi/images/blog/535cf5bc9073b053c627045d4506d86b.jpg', '2018-11-10 15:48:32', 'Ylang Ylang has a long history of skin and hair care in Asia. It&rsquo;s a natural skin balancer that can correct either dry or oily skin and it&rsquo;s beneficial for treating acne. If you have dry, oily or a combination of both, the Ylang Ylang herb extract is the perfect solution. It&rsquo;s great for fighting skin irritation and boils, ', 'A combination of these exquisite Ayurvedic herbs can benefit your skin in many ways. So how does Ylang Ylang work for the skin? \r\n\r\nYlang Ylang has a long history of skin and hair care in Asia. It&rsquo;s a natural skin balancer that can correct either dry or oily skin and it&rsquo;s beneficial for treating acne. If you have dry, oily or a combination of both, the Ylang Ylang herb extract is the perfect solution. It&rsquo;s great for fighting skin irritation and boils, treating acne and stimulates and tones your skin. \r\n\r\nAloe Vera has been used for a host of purposes since time immemorial. The ancient Egyptians referred to it as the &quot;Plant of Immortality&quot;. Aloe Vera treats sunburn, acts as a moisturizer, treats acne and fights to age. The Aloe Vera plant leaves contain a plethora of antioxidants including beta-carotene, Vitamin C, and E that help improve the natural firmness of the skin and keeps it hydrated. \r\n\r\nKhadi Premium Cosmetics Day-Cream contains both these beneficial ingredients which help your skin stay hydrated and soft to touch through the day. In a tropical country like India using a Day-Cream is recommended irrespective of your skin type.', 0, 0),
(3, 'How does lime benefit our skin?', 'Nadia Indulkar', '/khadi/images/blog/f98bc89d00f836bf1fed64c23f5745f4.jpg', '2018-11-10 15:50:12', 'Lime, being rich in powerful antioxidants like Vitamin C, citric acid, and flavonoids, helps rejuvenate your skin and protects it from infections, thanks to its antioxidant, disinfection and antibiotic properties. Citrus fruits are known for their beneficial effect on the skin and lime is no exception.', 'Lime, being rich in powerful antioxidants like Vitamin C, citric acid, and flavonoids, helps rejuvenate your skin and protects it from infections, thanks to its antioxidant, disinfection and antibiotic properties. Citrus fruits are known for their beneficial effect on the skin and lime is no exception.\r\n\r\nLime juice, whether taken orally or applied externally, benefits your skin in several ways: \r\n1. Treats dark spots. \r\n2. Treats acne and blemishes. \r\n3. Possesses Anti-aging properties. \r\n4. Natural skin tan solution. \r\n5. Treats open pores. \r\n6. Great for glowing skin. \r\n\r\nWe at Khadi Premium Herbal Cosmetics came up with the Lime Face Mist made with Essential Oils which benefits our skin in many ways. Using fresh and organically grown ingredients of Himachal our products are formulated in the most natural way with no harmful chemicals being used such as SLS, Artificial colors, Perfume, and Parabens. \r\n\r\nOur products are made with care and love. We look forward to delivering skin care solutions that benefit you and give your face a healthy, fresh and glowing aura.', 0, 0),
(4, 'What is stretch marks and how does it occur?', 'Nadia Indulkar', '/khadi/images/blog/6522e118d4e56c120bce26a4685ebc87.jpg', '2018-11-11 22:03:18', 'Stretch marks (medical name stria, striae or strea gravidarum) are caused by tearing of the dermis. This often happens due to stretching of the skin when we gain weight rapidly. These marks form narrow streaks or lines that occur in the surface of the skin, appear to be red or purple to start with and gradually', 'Stretch marks (medical name stria, striae or strea gravidarum) are caused by tearing of the dermis. This often happens due to stretching of the skin when we gain weight rapidly. These marks form narrow streaks or lines that occur in the surface of the skin, appear to be red or purple to start with and gradually fade to a silvery- white color.\r\n\r\nThey appear on the stomach, thighs, breast, hips, upper arms &amp; lower back. Anyone can get stretch marks as it is associated with puberty, pregnancy, bodybuilding, or hormone replacement therapy.\r\n\r\nSo how do we prevent it from happening to our skin with natural ingredients? \r\nTangerine and sage oil has been proved to help prevent stretch marks in the body. Regular use of this combination helps restore damaged tissues in the body. It helps reduce the appearance of scars and stretch marks. Tangerine oil is known for its antifungal, antiseptic, antispasmodic, toning, purifying and cytophylactic benefits.\r\n\r\nSage oil comes from an evergreen perennial plant. It is cicatrisant, which means that it has the ability to heal scars and fade stretch marks and promotes faster healing of wounds too. Khadi Premium Cosmetics has crafted a unique blend using these two main ingredients in a Stretch Mark cream to help prevent the damage of tissue and help you maintain a smooth and scar-free skin.', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `items` text NOT NULL,
  `cid` int(11) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
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
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `bid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tagline` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `blog` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`bid`, `name`, `email`, `tagline`, `message`, `blog`) VALUES
(1, 'Sumit', 'sksksharma0@gmail.com', 'Well Written', 'Very well explained about Aloe Vera and Ylang-Ylang', 'Ylang Ylang or Aloe Vera?'),
(2, 'Akshay Khanna', 'itsakshay@gmail.com', 'Amazing writing', 'Well written and explained about how can lime be so beneficial for our skin', 'How does lime benefit our skin?');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address1` text NOT NULL,
  `address2` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zipcode` int(100) NOT NULL,
  `phone` text NOT NULL,
  `country` varchar(100) NOT NULL,
  `ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `fullname`, `email`, `password`, `address1`, `address2`, `city`, `state`, `zipcode`, `phone`, `country`, `ip`) VALUES
(1, 'Sumeet Sharma', 'sksksharma0@gmail.com', 'Shar8286', '302, B-7, Sector-9', 'Shanti Nagar, Mira Road East', 'Mumbai', 'Maharashtra', 401107, '8286864601', 'India', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `productinfo` varchar(255) NOT NULL,
  `total` text NOT NULL,
  `paid` tinyint(4) NOT NULL DEFAULT '0',
  `shipped` tinyint(4) NOT NULL DEFAULT '0',
  `invoice` int(100) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `cid`, `fullname`, `productinfo`, `total`, `paid`, `shipped`, `invoice`, `ip_add`, `order_date`) VALUES
(1, 1, 'Sumeet Sharma', 'Moisturising Aloe Vera Bar (x1) \r\nTherapeutic Aloe Vera Gel (x1) \r\n', '3.00', 1, 1, 582337791, '::1', '2018-11-26 23:21:39'),
(2, 1632566785, 'Amit Sharma', 'Moisturising Aloe Vera Bar (x2) \r\nTherapeutic Aloe Vera Gel (x2) \r\n', '6.00', 1, 1, 1197066540, '::1', '2018-11-27 00:03:04');

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
(2, 'Therapeutic Aloe Vera Gel', 'GE-AV-050', 525, 0, '8', '/khadi/images/products/7543cff54663a192ed4c960ea3520fc3.jpg,/khadi/images/products/ed76435ac5e80abee31744c0f1af03ce.jpg,/khadi/images/products/a69fa1c1191c719ed9a57d5b1d5ff311.jpg', 'Handcrafted with Love. Supply is Limited', 'With the nourishment of neem and tulsi extracts', 'The medicinal properties of aloe vera, tulsi, and neem combined together protects the skin from environmental damages and other infections due to pollution/dust, cleansing the skin from within and giving it a healthy glow.\r\n\r\nDirections for use: Wash face and apply gel on the face in circular motion. Clean the face if necessary\r\n\r\nIngredients: Aloe vera gel, neem extract, tulsi extract, glycerine, carbopol, acacia catches, meadowfoam oil and Punica granatum.', '50 gms', 1, 'Available', 0, 'skin-care', 0),
(3, 'Moisturising Aloe Vera Bar', 'SO-AG-100', 205, 0, '19', '/khadi/images/products/ab36f302c9a62920a7b286d905aa7e5e.jpg,/khadi/images/products/90eb3188a760b197bfbb1d5ad84d36dd.jpg,/khadi/images/products/b1f8ab9564fd35a7fc968d6dfb4912ab.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of essential oils and glycerin', 'The intensive formulation of aloe vera extract and glycerin deeply moisturizes the skin eliminating moistness, reducing itching and reversing aging while tightening the skin.\r\n\r\nIngredients: Aloe vera extract, essential oils, glycerin and soap base.', '100 gms', 1, 'Available', 0, 'bath-and-beauty', 0),
(4, 'Aromatic Rose Water Bar', 'SO-RG-100', 205, 0, '19', '/khadi/images/products/870e2c793686c7cfec0f0a6069cf8950.jpg,/khadi/images/products/502e98cbc91241a8b7c61adf5c106d88.jpg,/khadi/images/products/aef46e0a5bb865bfd103af7e820ebc7e.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of essential oils and glycerin', 'Rose water acts as a mild cleanser and calms the redness of the skin leaving a splendid aroma while essential oils hydrate and moisturizes the skin giving a natural glow.   \r\n\r\nIngredients:Rose water, essential oils, glycerin and soap base.', '100 gms', 1, 'Available', 0, 'bath-and-beauty', 0),
(5, 'Hairfall Control Neroli Shampoo', 'SH-NE-200', 965, 0, '15', '/khadi/images/products/74e3a024723d83b36b57955abf67baa7.jpg,/khadi/images/products/314dae86bb99491ead9e521803fe0d63.jpg,/khadi/images/products/e57db19059318bdfce642b99b0a439cc.jpg', 'Handcrafted with Love. Supply is Limited', 'With the activeness of lime and frankincense oil', 'Vitamin C abundantly found in neroli, tangerine and lime oil helps produce collagen that is essential to maintain healthy and strong hair. While this combination curbs dandruff as well, usage of frankincense oil promotes healthy scalp moisturizing existing hair follicles preventing hair loss. \r\n\r\nDirections for use: Massage 2-5 ml shampoo in wet hair and scalp and rinse thoroughly with water. Repeat if necessary.\r\n\r\nIngredients: Neroli oil, tangerine oil, frankincense oil, lime oil, acryl 60, Olive 400, Olive 300,decyl-glucoside, potassium sorbate, Cocamidopropyl betaine, nigella sativa oil and deionized water.', '200 ml', 1, 'Available', 0, 'hair-care', 0),
(15, 'Anti Aging Argan Cream', 'AG-AR-015', 505, 0, '5', '/khadi/images/products/a7ad9fcf6cae7aeabec6411026f46ae9.jpg,/khadi/images/products/6ed6455b70a955c291fc19e692dfa242.jpg,/khadi/images/products/3c2e125a3a2a982de5c59e55c49d8634.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of olive and patchouli oil', 'The collective anti-aging properties of argan, olive and patchouli oil are combined in one formulation to tighten the skin and impart a radiant glow, making it supple and youthful.\r\n\r\nDirections for use: Slowly massage on the face in an upward circular motion. Best used after bathing or after washing the face when the skin is most receptive to hydration\r\n\r\nIngredients: Argan oil, meadowfoam oil, olive oil, patchouli oil, sesame oil, frankincense oil, borax, glycerin, vitamin E, Phenoxyethanol, Olive 1000, cetyl alcohol, sodium gluconate and aqua water', '15 gms', 0, 'Available', 0, 'skin-care', 0),
(16, 'Anti Acne Sage Cream', 'AC-SA-015', 505, 0, '6', '/khadi/images/products/7d5f14928d74069619b622ae9903c024.jpg,/khadi/images/products/4617641f1b5aa01c95ffac08c416b063.jpg,/khadi/images/products/44142e83ca54f3b917468d01b5fbee6a.jpg', 'Handcrafted with Love. Supply is Limited', 'With the benefits of tangerine and meadowfoam oil', 'The amalgam of sage, tangerine &amp; meadowfoam oil rich in antioxidants and vitamins helps the skin to rebuild damaged skin tissues, fight against pollution and clear skin impurities that treat acne, giving the skin a youthful and radiant glow.\r\n\r\nDirections for use: Slowly massage on the face in an upward circular motion. Best used after washing the face when skin is most receptive to hydration.\r\n\r\nIngredients: Sage oil, tangerine oil, meadowfoam oil, grapeseed oil, olive 1000, cetyl alcohol, sodium gluconate, borax, glycerin, phenoxyethanol and aqua water.', '15 gms', 0, 'Available', 0, 'skin-care', 0),
(17, 'Argan Lip Balm', 'LB-AR-015', 465, 0, '11', '/khadi/images/products/ab7c8e262442de25c664194cb9af92db.jpg,/khadi/images/products/bc8428775bf2f9fc311b808422f64d68.jpg,/khadi/images/products/471e47ad6a0fc0af497456dc4478ee07.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of olive and patchouli oil', 'The collective anti-aging properties of argan, olive and patchouli oil are combined in one formulation to tighten the skin and impart a radiant glow, making it supple and youthful.\r\n\r\nDirections for use: Slowly massage on the face in an upward circular motion. Best used after bathing or after washing the face when the skin is most receptive to hydration\r\n\r\nIngredients: Argan oil, meadowfoam oil, olive oil, patchouli oil, sesame oil, frankincense oil, borax, glycerin, vitamin E, Phenoxyethanol, Oliver 1000, cetyl alcohol, sodium gluconate ,and aqua water', '15 gms', 0, 'Available', 0, 'skin-care', 0),
(18, 'Meadowfoam Lip Scrub', ' LS-MF-015', 465, 0, '11', '/khadi/images/products/c7f37d201fcb84014df1f816dd2e2efb.jpg,/khadi/images/products/55b37511dc4829f4f5d21e4195def3df.jpg,/khadi/images/products/c48dd82a97c1e3c07505c970fcf0fa0f.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of sesame and lime oil', 'Organic sugar is a strong exfoliating agent that also imparts a natural hue to the lips while the blend of meadowfoam, sesame and lime oil repairs damaged tissues, improves blood circulation keeping them moisturized naturally.\r\n\r\nDirections for use: Apply evenly and liberally on lips as required.\r\n\r\nIngredients: Meadowfoam oil, argan oil, frankincense oil, soyabean oil, geranium oil, lime oil, sesame oil, organic sugar, and beeswax. ', '15 gms', 0, 'Available', 0, 'skin-care', 0),
(19, 'Meadowfoam Lip Scrub', 'LS-MF-015', 465, 0, '22', '/khadi/images/products/df613c4cf1427a740ce9f70a6a357b39.jpg,/khadi/images/products/7cbb05afb36c67f2a9d3075babdbb938.jpg,/khadi/images/products/82a71e969a2cc5d2ff01472d315e8f3c.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of sesame and lime oil', 'Organic sugar is a strong exfoliating agent that also imparts a natural hue to the lips while the blend of meadowfoam, sesame and lime oil repairs damaged tissues, improves blood circulation keeping them moisturized naturally.\r\n\r\nDirections for use: Apply evenly and liberally on lips as required.\r\n\r\nIngredients: Meadowfoam oil, argan oil, frankincense oil, soyabean oil, geranium oil, lime oil, sesame oil, organic sugar, and beeswax.', '15 gms', 0, 'Available', 0, 'skin-care', 1),
(20, 'Argan Lip Balm', 'LB-AR-015', 465, 0, '22', '/khadi/images/products/ced2248643b1de299543960100a7cd53.jpg,/khadi/images/products/ca9b21fff5b42cc61cb81d74c4809959.jpg,/khadi/images/products/1ce6d4446dbda5786e7c2cabdd1c2119.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of olive and patchouli oil', 'The collective anti-aging properties of argan, olive and patchouli oil are combined in one formulation to tighten the skin and impart a radiant glow, making it supple and youthful.\r\n\r\nDirections for use: Slowly massage on the face in an upward circular motion. Best used after bathing or after washing the face when the skin is most receptive to hydration\r\n\r\nIngredients: Argan oil, meadowfoam oil, olive oil, patchouli oil, sesame oil, frankincense oil, borax, glycerin, vitamin E, Phenoxyethanol, Oliver 1000, cetyl alcohol, sodium gluconate and aqua water', '15 gms', 0, 'Available', 0, 'skin-care', 1),
(21, 'Therapeutic Aloe Vera Gel', 'GE-AV-050', 525, 0, '21', '/khadi/images/products/4ea1a92b79e9849188274c3db2854b35.jpg,/khadi/images/products/83b7260e512b616f554d86d252a3e70c.jpg,/khadi/images/products/2dbc111777cdd7dab00d41efc11fc559.jpg', 'Handcrafted with Love. Supply is Limited', 'With the nourishment of neem and tulsi extracts', 'The medicinal properties of aloe vera, tulsi, and neem combined together protects the skin from environmental damages and other infections due to pollution/dust, cleansing the skin from within and giving it a healthy glow.\r\n\r\nDirections for use: Wash face and apply gel on the face in circular motion. Clean the face if necessary\r\n\r\nIngredients: Aloe vera gel, neem extract, tulsi extract, glycerine, carbopol, acacia catches, meadowfoam oil and Punica granatum.', '50 gms', 0, 'Available', 0, 'skin-care', 1),
(22, 'Refreshing Neroli Face Mist', 'FM-NE-060', 505, 0, '21', '/khadi/images/products/56ed0e9f877ee90351b31da73d8e37f2.jpg,/khadi/images/products/07a4dfe138dff7986e187ea1fa8f26ea.jpg,/khadi/images/products/370075fd63194120ae369c30c39283e2.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of rose water and aloe vera gel', 'The anti-bacterial, antiseptic and anti-oxidant properties of neroli forms a protective shield around the skin to prevent it from environmental damage while rose water &amp; aloe vera hydrates the skin boosting refreshment, making it naturally glow.\r\n\r\nDirections for use: Spray mist once or twice over face and neck till dry, wipe if necessary.\r\n\r\nIngredients: Neroli oil, rose water, Aloe Vera gel, lime oil, spearmint, triethanolamine, and glycerin.', '60 ml', 0, 'Available', 0, 'skin-care', 1),
(23, 'Refreshing Neroli Face Mist', 'FM-NE-060', 505, 0, '9', '/khadi/images/products/58c5cb162afa4c8634ae9e8b94b894d2.jpg,/khadi/images/products/91e339d0fba7e2a6c03c7b9ee02e91e2.jpg,/khadi/images/products/bc85252172c97d1d256b8bb7d978bfa0.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of rose water and aloe vera gel', 'The anti-bacterial, antiseptic and anti-oxidant properties of neroli forms a protective shield around the skin to prevent it from environmental damage while rose water &amp; aloe vera hydrates the skin boosting refreshment, making it naturally glow.\r\n\r\nDirections for use: Spray mist once or twice over face and neck till dry, wipe if necessary.\r\n\r\nIngredients: Neroli oil, rose water, Aloe Vera gel, lime oil, spearmint, triethanolamine, and glycerin.', '60 ml', 0, 'Available', 0, 'skin-care', 0),
(24, 'Anti-Bacterial Neem Face Wash', 'FW-NM-060', 625, 0, '21', '/khadi/images/products/36a1d2f2a0c907f4f979fa887f3ba1fc.jpg,/khadi/images/products/84220e7321615139b74cb0981e4cb4cd.jpg,/khadi/images/products/8996bbee00b500cda05a1ec047707b2b.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of tulsi and tea tree oil', 'The collective blend of neem, tulsi, and tea tree oil exfoliates the skin, cleanses pores, treats acne, and tightens the skin reducing the chances of wrinkles and premature aging.\r\n\r\nDirections for use: Lather up and massage over the wet face. Rinse off with water and pat dry. Use in morning &amp; evening for best results.\r\n\r\nIngredients: Neem oil, tulsi oil, tea tree, aloe vera, Olive 400, Olive 300, acryl 60, decyl-glucoside, coco betaine, oil and aqua water.', '60 ml', 0, 'Available', 0, 'skin-care', 1),
(25, 'Anti-Bacterial Neem Face Wash', 'FW-NM-060', 625, 0, '13', '/khadi/images/products/f1b6a45c9dc53749de35f9d69d1b8b08.jpg,/khadi/images/products/33ae55a94a54362f0f29315f9435a305.jpg,/khadi/images/products/425f8a619e83b9120d763298895bb1aa.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of tulsi and tea tree oil', 'The collective blend of neem, tulsi, and tea tree oil exfoliates the skin, cleanses pores, treats acne, and tightens the skin reducing the chances of wrinkles and premature aging.\r\n\r\nDirections for use: Lather up and massage over the wet face. Rinse off with water and pat dry. Use in morning &amp; evening for best results.\r\n\r\nIngredients: Neem oil, tulsi oil, tea tree, aloe vera, Olive 400, Olive 300, acryl 60, decyl-glucoside, coco betaine, oil and aqua water.', '60 ml', 0, 'Available', 0, 'skin-care', 0),
(26, 'Rejuvenating Chamomile Night Cream', 'NC-CH-050', 755, 0, '22', '/khadi/images/products/1c8fb12a57166647ac3c4e6e239301e6.jpg,/khadi/images/products/ce6f6512a1d3f88c0743d9d97a9bc4a1.jpg,/khadi/images/products/afedf846fb9f3b6f7138c5587a324ac1.jpg', 'Handcrafted with Love. Supply is Limited', 'With the benefits of argan and frankincense oil', 'The medicinal properties of chamomile protect skin from damage, naturally moisturizes the skin and promotes calmness and sleep while astringent properties of frankincense oil tighten the skin making it youthful and supple.  \r\n\r\nDirections for use: Slowly massage on the face in a circular motion. For best result, wash the face and apply it at night when the skin is most receptive to hydration.\r\n\r\nIngredients: Chamomile oil, argan oil, frankincense, Vitamin E, sage oil, tangerine oil, GMS(CE), kokum butter, cetyl alcohol, mango butter, potassium sorbate and aqua water.', '50 gms', 0, 'Available', 0, 'skin-care', 1),
(27, 'Rejuvenating Chamomile Night Cream', 'NC-CH-050', 755, 0, '7', '/khadi/images/products/fd52f1594039eece138dc122e82e0ef0.jpg,/khadi/images/products/46de0cd105d3517b4733db2aac0a1cad.jpg,/khadi/images/products/f641513ca2fc154f26f7b25dc972d96c.jpg', 'Handcrafted with Love. Supply is Limited', 'With the benefits of argan and frankincense oil', 'The medicinal properties of chamomile protect skin from damage, naturally moisturizes the skin and promotes calmness and sleep while astringent properties of frankincense oil tighten the skin making it youthful and supple.  \r\n\r\nDirections for use: Slowly massage on the face in a circular motion. For best result, wash the face and apply it at night when the skin is most receptive to hydration.\r\n\r\nIngredients: Chamomile oil, argan oil, frankincense, Vitamin E, sage oil, tangerine oil, GMS(CE), kokum butter, cetyl alcohol, mango butter, potassium sorbate and aqua water.', '50 gms', 0, 'Available', 0, 'skin-care', 0),
(28, 'Hydrating Fenugreek Gel', 'GE-FH-050', 525, 0, '22', '/khadi/images/products/df89d9bee9ef3537dace7649ce428fd8.jpg,/khadi/images/products/71d56b1b909ac7b3aba676dbfb265e73.jpg,/khadi/images/products/f93482bea38ea30d22910621152fb021.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of aloe vera and tamanu oil', 'Extracted from the seeds of fenugreek that are high on nutrition, fatty acids, vitamins and volatile organic compounds, fenugreek oil along with aloe vera and tamanu oil produces emollient which is a perfect escape to rejuvenate, moisturize and refresh your skin.\r\n\r\nDirections for use: Wash face and apply gel on the face in circular motion. Clean the face if necessary.\r\n\r\nIngredients: Fenugreek seed extract, carbopol, triethanolamine, aloe vera, glycerin, potassium sorbate, tamanu oil, and aqua water.', '50 gms', 0, 'Available', 0, 'skin-care', 1),
(29, 'Hydrating Fenugreek Gel', 'GE-FH-050', 525, 0, '12', '/khadi/images/products/8aea0e9888464492c4ddee46ce7027c7.jpg,/khadi/images/products/34e32159b9515e241c8637eeff3d6514.jpg,/khadi/images/products/447261f3938d781dda2a1da5f80548d4.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of aloe vera and tamanu oil', 'Extracted from the seeds of fenugreek that are high on nutrition, fatty acids, vitamins and volatile organic compounds, fenugreek oil along with aloe vera and tamanu oil produces emollient which is a perfect escape to rejuvenate, moisturize and refresh your skin.\r\n\r\nDirections for use: Wash face and apply gel on the face in circular motion. Clean the face if necessary.\r\n\r\nIngredients: Fenugreek seed extract, carbopol, triethanolamine, aloe vera, glycerin, potassium sorbate, tamanu oil, and aqua water.', '50 gms', 0, 'Available', 0, 'skin-care', 0),
(30, 'Therapeutic Aloe Vera Gel', 'GE-AV-050', 525, 0, '8', '/khadi/images/products/58555eb36a8db82146506d952b350f90.jpg,/khadi/images/products/8a3992a5b687df76588272966f93659e.jpg,/khadi/images/products/569afd1a22c1dc467e59178121da88c5.jpg', 'Handcrafted with Love. Supply is Limited', 'With the nourishment of neem and tulsi extracts', 'The medicinal properties of aloe vera, tulsi, and neem combined together protects the skin from environmental damages and other infections due to pollution/dust, cleansing the skin from within and giving it a healthy glow.\r\n\r\nDirections for use: Wash face and apply gel on the face in circular motion. Clean the face if necessary\r\n\r\nIngredients: Aloe vera gel, neem extract, tulsi extract, glycerine, carbopol, acacia catches, meadowfoam oil and Punica granatum.', '50 gms', 0, 'Available', 0, 'skin-care', 0),
(31, 'Regenerating Patchouli Body Wash', 'BW-PA-200', 565, 0, '23', '/khadi/images/products/cae3aff42fa7cc3f5e463b3870d14402.jpg,/khadi/images/products/5d4f6da48c9b902e40b04e89c0803f5d.jpg,/khadi/images/products/33ce06eef35b385c1cb15254c84c35ce.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of palma rosa and spearmint oil', 'Patchouli is most prominently known for its anti-inflammatory properties that soothe irritated skin, especially during summers. The blend of palmarosa, patchouli and spearmint oil has aromatic advantages that induce peace and harmonizes mood instantly.\r\n\r\nDirections for use: Pour a little shower gel on the loofah. Work up a lather by gently applying it over damp skin. Rinse thoroughly with water.\r\n\r\nIngredients: Patchouli oil, palmarosa oil, spearmint oil, Olive 400, olive 300, acryl 60, decyl-glucoside, coco betaine, phenoxyethanol and aqua water.', '200 ml', 0, 'Available', 0, 'bath-and-beauty', 1),
(32, 'Regenerating Patchouli Body Wash', 'BW-PA-200', 565, 0, '18', '/khadi/images/products/14b33e54b3065e86fbb8d49d85b59fed.jpg,/khadi/images/products/97ca897281d446e294ef1da160ad1b8f.jpg,/khadi/images/products/be0036f17eb715a24b6f08c96cbaa63e.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of palma rosa and spearmint oil', 'Patchouli is most prominently known for its anti-inflammatory properties that soothe irritated skin, especially during summers. The blend of palmarosa, patchouli and spearmint oil has aromatic advantages that induce peace and harmonizes mood instantly.\r\n\r\nDirections for use: Pour a little shower gel on the loofah. Work up a lather by gently applying it over damp skin. Rinse thoroughly with water.\r\n\r\nIngredients: Patchouli oil, palmarosa oil, spearmint oil, Olive 400, olive 300, acryl 60, decyl-glucoside, coco betaine, phenoxyethanol and aqua water.', '200 ml', 0, 'Available', 0, 'bath-and-beauty', 0),
(33, 'Body Softening Cedarwood Moisturizer', 'MO-CE-100', 565, 0, '23', '/khadi/images/products/05b3cd9a8a2cff3775ed97acb4e04265.jpg,/khadi/images/products/a825f5aadd687a7702d21aa21c70f4cc.jpg,/khadi/images/products/6bb5693062968647820b45fe80727ac2.jpg', 'Handcrafted with Love. Supply is Limited', 'With the benefits of frankincense and carrot seed oil', 'The astringent properties of cedarwood and frankincense oil therapeutically tighten loose muscles imparting a sense of firmness and youth, while carrot seed oil helps heal chapped, dry and cracked skin nourishing it from within.  \r\n\r\nDirections for use: Apply gently all over the body slowly massaging it in. Best used after bathing when the skin is most receptive to hydration.\r\n\r\nIngredients: Cedarwood oil, carrot seed oil, frankincense oil, olive 1000, glycerol monostearate, stearic acid, sodium gluconate, aloe vera, phenoxyethanol and aqua water.', '100 ml', 0, 'Available', 0, 'body-care', 1),
(34, 'Body Softening Cedarwood Moisturizer', 'MO-CE-100', 565, 0, '17', '/khadi/images/products/b6d81a093343656dde428e1cf88ee9c2.jpg,/khadi/images/products/d00ba9188262947355cc7f13ccd55ddd.jpg,/khadi/images/products/a666c3625f932747bb6e04a8ae73df41.jpg', 'Handcrafted with Love. Supply is Limited', 'With the benefits of frankincense and carrot seed oil', 'The astringent properties of cedarwood and frankincense oil therapeutically tighten loose muscles imparting a sense of firmness and youth, while carrot seed oil helps heal chapped, dry and cracked skin nourishing it from within.  \r\n\r\nDirections for use: Apply gently all over the body slowly massaging it in. Best used after bathing when the skin is most receptive to hydration.\r\n\r\nIngredients: Cedarwood oil, carrot seed oil, frankincense oil, olive 1000, glycerol monostearate, stearic acid, sodium gluconate, aloe vera, phenoxyethanol and aqua water.', '100 ml', 0, 'Available', 0, 'body-care', 0),
(35, 'Deep Nourishing Argan Shampoo', 'SH-AR-200', 965, 0, '23', '/khadi/images/products/d69204a1c05aa49d8d643f496f33783b.jpg,/khadi/images/products/033a1cd0a7fc14362303ed3947ef50a1.jpg,/khadi/images/products/da40988a1d6f4bb5e6492ebcf3c13411.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of rosemary and tea tree oil', 'Argan oil is rich in various nutrients and Vitamin E that is beneficial in repairing damaged follicles and building healthy follicles promoting hair growth. The blend of argan, rosemary, and tea tree oil in tandem revives dull, lifeless hair preventing frizziness and imparts a healthy sheen while increasing its volume.\r\n\r\nDirections for use: Massage 2-5 ml shampoo in wet hair and scalp and rinse thoroughly with water. Repeat if necessary.\r\n\r\nIngredients: Arganoil, rosemary oil, tea tree oil, acryl 60, Olive 400, Olive 300,decyl-glucoride, potassium sorbate, coco amidopropylbetaine, nigella sativa oiland deionized water.', '200 ml', 0, 'Available', 0, 'hair-care', 1),
(36, 'Deep Nourishing Argan Shampoo', 'SH-AR-200', 965, 0, '15', '/khadi/images/products/7639593e6db83a1e5030d31b6ad2f0de.jpg,/khadi/images/products/d533f42353707bf5711fd5945e539791.jpg,/khadi/images/products/045308292e72592b92545581ec706ac6.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of rosemary and tea tree oil', 'Argan oil is rich in various nutrients and Vitamin E that is beneficial in repairing damaged follicles and building healthy follicles promoting hair growth. The blend of argan, rosemary, and tea tree oil in tandem revives dull, lifeless hair preventing frizziness and imparts a healthy sheen while increasing its volume.\r\n\r\nDirections for use: Massage 2-5 ml shampoo in wet hair and scalp and rinse thoroughly with water. Repeat if necessary.\r\n\r\nIngredients: Arganoil, rosemary oil, tea tree oil, acryl 60, Olive 400, Olive 300,decyl-glucoride, potassium sorbate, coco amidopropylbetaine, nigella sativa oiland deionized water.', '200 ml', 0, 'Available', 0, 'hair-care', 0),
(37, 'Deep Nourishing Argan Conditioner', 'CO-AR-100', 565, 0, '23', '/khadi/images/products/e84f1285b33c0436124de153f43d6889.jpg,/khadi/images/products/c62f7a5870f48ffb2d0485d9f8168622.jpg,/khadi/images/products/3a9dab37eda030874b6652865152984d.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of cedarwood and olive oil', 'Fatty acids present in argan oil is an effective and natural remedy to increase blood circulation and cell growth important for hair follicles while cedarwood and olive oil hydrates, nourishes and moisturizes them making hair softer, silkier and shinier.\r\n\r\nDirections for use: Apply for 1-2 minutes after rinsing shampoo and rinse again thoroughly with water\r\n\r\nIngredients: Argan oil, olive oil, cedarwood oil, CM 1000, PEG 07, Potassium sorbate, Vitamin E oil, glycerin, rosemary oil, nigella sativa oil, Phenoxyethanol, and aqua water.', '100 ml', 0, 'Available', 0, 'hair-care', 1),
(38, 'Deep Nourishing Argan Conditioner', 'CO-AR-100', 565, 0, '16', '/khadi/images/products/34a01866ee030395aa4d7358b423f802.jpg,/khadi/images/products/617b73eb30163174e93c157b038c6823.jpg,/khadi/images/products/2bb3de917260d9bbb796f2cd5923bd5f.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of cedarwood and olive oil', 'Fatty acids present in argan oil is an effective and natural remedy to increase blood circulation and cell growth important for hair follicles while cedarwood and olive oil hydrates, nourishes and moisturizes them making hair softer, silkier and shinier.\r\n\r\nDirections for use: Apply for 1-2 minutes after rinsing shampoo and rinse again thoroughly with water\r\n\r\nIngredients: Argan oil, olive oil, cedarwood oil, CM 1000, PEG 07, Potassium sorbate, Vitamin E oil, glycerin, rosemary oil, nigella sativa oil, Phenoxyethanol, and aqua water.', '100 ml', 0, 'Available', 0, 'hair-care', 0),
(39, 'Hairfall Control Neroli Shampoo', 'SH-NE-200', 965, 0, '15', '/khadi/images/products/eb9548e86c6f477f7f79c21be97b234c.jpg,/khadi/images/products/7d8235946417e2f9a79527e924e9d079.jpg,/khadi/images/products/f91fff73b610a45d65970598fa238cea.jpg', 'Handcrafted with Love. Supply is Limited', 'With the activeness of lime and frankincense oil', 'Vitamin C abundantly found in neroli, tangerine and lime oil helps produce collagen that is essential to maintain healthy and strong hair. While this combination curbs dandruff as well, usage of frankincense oil promotes healthy scalp moisturizing existing hair follicles preventing hair loss. \r\n\r\nDirections for use: Massage 2-5 ml shampoo in wet hair and scalp and rinse thoroughly with water. Repeat if necessary.\r\n\r\nIngredients: Neroli oil, tangerine oil, frankincense oil, lime oil, acryl 60, Olive 400, Olive 300,decyl-glucoside, potassium sorbate, Cocamidopropyl betaine, nigella sativa oil and deionized water.', '200 ml', 0, 'Available', 0, 'hair-care', 0),
(40, 'Stress Relieving Pimentoberry Body Wash', 'BW-PI-200', 565, 0, '18', '/khadi/images/products/665a82b7bcffe2b36d1e048fea08e40e.jpg,/khadi/images/products/375b912f635144ff81ae36e6c8aea79b.jpg,/khadi/images/products/c0607cb52dcbb12fdff978e3e1775bd5.jpg', 'Handcrafted with Love. Supply is Limited', 'With the benefits of lemongrass and aloe vera oil', 'Antiseptic and antioxidant properties of pimentoberry and lemongrass detoxifies the body, boosts immunity, strengthens skin tissues and tones up the pores by sterilizing and healing them. Simultaneously while aloe vera acts as a natural moisturizer inducing radiant glow, neroli oil improves skin flexibility and prevents it against environmental damages.\r\n\r\nDirections for use: Pour a little shower gel on the loofah. Work up a lather by gentlyapplying it over damp skin. Rinse thoroughly with water.\r\n\r\nIngredients: Pimentoberry oil, aloe vera oil, lemongrass oil, neroli oil, Olive 400, olive 300, acyl 60,decyl-glucoside, cocobetaine, phenoxyethanol and aqua water.', '200 ml', 0, 'Available', 0, 'bath-and-beauty', 0),
(41, 'Anti-Pollution Lime Face Mist', 'FM-BE-060', 505, 0, '9', '/khadi/images/products/c43d994ecca980c0fb499f80575ef8c4.jpg,/khadi/images/products/85f26f5de7935c77e55b2668b87f33b3.jpg,/khadi/images/products/fe0c9de655e310477229ca7292d71838.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of bergamot and meadowfoam oil', 'Lime contains antiseptic &amp; astringent properties that treat skin tan, opens pores and removes dead skin while its blend with bergamot and meadowfoam oil eradicates excessive oil, dirt, and pollutants, rejuvenating the skin inducing a healthy radiant glow.\r\n\r\nDirections for use: Spray mist once or twice over face and neck till dry, wipe if necessary.\r\n\r\nIngredients: Bergamot oil, lime oil, meadowfoam oil, triethanolamine, glycerine and rose water.', '60 ml', 0, 'Available', 0, 'skin-care', 0),
(42, 'Ylang Ylang Day Cream', 'DC-YL-050', 575, 0, '7', '/khadi/images/products/56024b925042f79f7514598275873aad.jpg,/khadi/images/products/3120140bafc3867222bf990f72cc078f.jpg,/khadi/images/products/224f6bc09769df061c035855ed7c0db4.jpg', 'Handcrafted with Love. Supply is Limited', 'With the nourishment of aloe vera extract and argan oil', 'Ylang ylang is an effective agent in exfoliating the skin, treating pigmentation, maintaining the balance of oil in the skin, soothing the skin while keeping it smooth and young. These benefits are blended with agents of aloe vera and argan that hydrates and moisturizes the skin making it an apt remedy to survive a harsh, long sunny day.\r\n\r\nDirections for use: Slowly massage on the face in an upward &amp; circular motion. Best used after bathing or after washing the face when the skin is most receptive to hydration\r\n\r\nIngredients: GMS, shea butter, mango butter, Vitamin E, aloe vera, turmeric oil, ylang ylang oil, argan oil, cetyl alcohol, stearic acid, potassium sorbate, nigella sativa oil and aqua water. ', '50 gms', 0, 'Available', 0, 'skin-care', 0),
(43, 'Regenerating Patchouli Face Wash', 'FW-PA-060', 625, 0, '13', '/khadi/images/products/4d8a327767ff929d4cb6eada6e6bd2fa.jpg,/khadi/images/products/f7a56fad1bcdaf4e64f1735c77ffb9d0.jpg,/khadi/images/products/c721603038a6b7c05a2b30a71025b621.jpg', 'Handcrafted with Love. Supply is Limited', 'With the activeness of palma rosa and rosemary oil', 'The astringent and anti-aging properties of patchouli are most appropriate to regain a lively-looking skin while rosemary lightens blemishes and gives the face a radiant glow.\r\n\r\nDirections for use: Lather up and massage over the wet face. Rinse off with water and pat dry. Use in morning &amp; evening for best results.\r\n\r\nIngredients: Patchouli oil, palmarosa oil, rosemary oil, olive 400, olive 300, acryl 60, decyl-glucoside, coco betaine, spearmint and aqua water.', '60 ml', 0, 'Available', 0, 'skin-care', 0),
(44, 'Anti Acne Patchouli Face Pack', 'FP-PA-050', 505, 0, '14', '/khadi/images/products/b436149d3da1a6ee3886a4a783de34ae.jpg,/khadi/images/products/e2ff0694d4ff980dd8189084c2b0b587.jpg,/khadi/images/products/874394a439eed022d4dfb417adb5ea4e.jpg', 'Handcrafted with Love. Supply is Limited', 'With the activeness of sage and tamanu oil', 'The anti-aging and anti-inflammatory properties of patchouli and sage prevents wrinkles, dark spots, acne and removes skin impurities while tamanu oil that is rich in fatty acids heal the skin nourishing it from within.\r\n\r\nDirections for use: Apply a thick layer onto clean and dry face &amp; neck. Leave for 15-20 mins. Rinse with water. Use daily or as needed.\r\n\r\nIngredients: Patchouli, glycerin, sage, fuller earth, tangerine oil, tamanu oil, cedarwood oil, cream base GMS(S.E.), cetyl alcohol, stearic acid, Oliver 1000, xanthan and phenoxyethanol.', '50 gms', 0, 'Available', 0, 'skin-care', 0),
(45, 'Exfoliating Sage Face Scrub', 'FS-SA-050', 735, 0, '10', '/khadi/images/products/9abd48baaf09f8e53333803c47de58e9.jpg,/khadi/images/products/0ac3e8a134598f032428d4f6e47204a2.jpg,/khadi/images/products/5132fa3cf6826aa3f3caa41bd904b6e8.jpg', 'Handcrafted with Love. Supply is Limited', 'With the activeness of lime and tangerine oil', 'The collective antioxidant properties of sage, lime, and tangerine oil treats dark spots, acne, blemishes, skin tan, skin impurities and also rebuilds damaged skin tissues preventing wrinkles, dull skin, and early aging.  \r\n\r\nDirections for use: Gently massage with the fingertips in a circular motion over damp face. Wash off with water and pat dry. Use 2-3 times in a week for best results.\r\n\r\nIngredients: Sage oil, tangerine oil, lime oil, nigella sativa oil, aloe vera gel, walnut powder, phenoxyethanol and cream base', '50 gms', 0, 'Available', 0, 'skin-care', 0),
(46, 'Regenerating Apricot Vegetable Bar', 'SO-AV-100', 365, 0, '19', '/khadi/images/products/5eb30bf08b60659835b3a2e9a8d71bb9.jpg,/khadi/images/products/6f2a38749fb93aebfeae986081cc9c7a.jpg,/khadi/images/products/e8eef0f48a31baf10d94d9fef9b33559.jpg', 'Handcrafted with Love. Supply is Limited', 'With the nourishment of essential oils and vegetable fats', 'Apricot contains exfoliating properties and are abundant in vitamin A, B, C, and E that revitalizes and nourishes the skin, maintaining its elasticity, and moisture. These properties combined with vegetable fats and essential oils prevent aging and hydrates the skin improving skin tone.\r\n\r\nIngredients: Apricot extract oil, vegetable fats, essential oils, soap base and saponified oil of coconut', '100 gms', 0, 'Available', 0, 'bath-and-beauty', 0),
(47, 'Oatmeal &amp; Honey Vegetable Bar', 'SO-OV-100', 365, 0, '19', '/khadi/images/products/75b34e3f9156e5ed84d7fd052684634a.jpg,/khadi/images/products/5799c7c42ecf17c17231499a35863aca.jpg,/khadi/images/products/9d551c1082321e1fb61d2c8f39a32ea6.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of essential oils and glycerin', 'Fats and oils of vegetables produce a rich lather and contain conditioning properties while the active ingredients of honey kill all bacteria and oatmeal nourishes and moisturizes the skin giving it a soft and supple look.\r\n\r\nIngredients: Oatmeal, organic honey, essential oils, glycerin and soap base.', '100 gms', 0, 'Available', 0, 'bath-and-beauty', 0),
(48, 'Exfoliating Oatmeal &amp; Honey Scrub Bar', 'SO-OH-100', 365, 0, '19', '/khadi/images/products/ce10f3235a83412d6d0139c6aa55becb.jpg,/khadi/images/products/29791a9993a2766c9e361fbef1fc835a.jpg,/khadi/images/products/a81a3e23ebb31f98bdefefa39cedcc05.jpg', 'Handcrafted with Love. Supply is Limited', 'With the nourishment of essential oils and glycerin', 'Handmade from loofah fibers that unclogs pores naturally, the active ingredients of honey kills all bacteria while oatmeal nourishes and moisturizes the skin giving it a soft and supple look.\r\n\r\nIngredients: Oatmeal, organic honey, essential oils, glycerin and soap base.', '100 gms', 0, 'Available', 0, 'bath-and-beauty', 0),
(49, 'Exfoliating Almond Scrub Bar', 'SO-EA-100', 365, 0, '19', '/khadi/images/products/f337d79147c29d20885b6329279272a8.jpg,/khadi/images/products/94848bf563465d928d6f87cd9ff9b828.jpg,/khadi/images/products/3260ae6a79721e71d99d5828efb08826.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of Vitamin E and essential oils', 'The natural properties of Vitamin E have a soothing effect on the skin, whereas the enriching almond gives your skin a soft and moisturized appearance that prevents wrinkles and acne outbreaks.\r\n\r\nIngredients: Almond powder, soap base, jojoba oil, vitamin E, aloe vera, walnut scrub and tamanu oil.', '100 gms', 0, 'Available', 0, 'bath-and-beauty', 0),
(50, 'Exfoliating Neem &amp; Tulsi Scrub Bar', 'SO-NM-100', 365, 0, '19', '/khadi/images/products/2d86a9999692ae9c55733235e88ef6c7.jpg,/khadi/images/products/90e790d63855a2a41103633673543766.jpg,/khadi/images/products/328b3720c9e0e1fd4b0aa9afe5d80e10.jpg', 'Handcrafted with Love. Supply is Limited', 'With the nourishment of essential oils and glycerin', 'Enriched with active fighting ingredients of neem and tulsi, this blend of nature is robust in treating skin problems like acne, pimples, blemishes, while glycerin moisturizes the skin giving it a radiant glow.\r\n\r\nIngredients: Neem Patra extract, tulsi extract, loofah fibers, essential oils, glycerin and soap base.', '100 gms', 0, 'Available', 0, 'bath-and-beauty', 0),
(51, 'Antiseptic Lemon &amp; Tulsi Bar', 'SO-AL-100', 205, 0, '19', '/khadi/images/products/389959d87a4170e0bd18f40b30061519.jpg,/khadi/images/products/76644718b85a0a9049df4068620f0fe3.jpg,/khadi/images/products/d65bb6314f0930a18794a110bb1bd8fd.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of Vitamin C and essential oils', 'The richness of Vitamin C present in lemon when combined with the antibacterial properties of tulsi, skin problems like itching comes to an end and skin tone lightens too. \r\n\r\nIngredients: Lemon extract, tulsi extract, essential oils, glycerin and soap base.', '100 gms', 0, 'Available', 0, 'bath-and-beauty', 0),
(52, 'Rejuvenating Ylang Ylang Bar', 'SO-YL-100', 205, 0, '19', '/khadi/images/products/7b34d9d3e830fca7cb83a97a1b103e9f.jpg,/khadi/images/products/c58eae24ece2578c2651af50c2e33879.jpg,/khadi/images/products/f07b7ab1316882ff8fb3f3ddb6211103.jpg', 'Handcrafted with Love. Supply is Limited', 'With the nourishment of Jojoba oil and Aloe vera', 'The alluring effect of Ylang Ylang calms the mind and has a lasting fragrance which is blended with aloe vera that hydrates the skin and gives it a radiant look.  \r\n\r\nIngredients: Ylang ylang oil, jojoba oil, aloe vera, glycerin, wheat germ oil, essential oils and soap base.', '100 gms', 0, 'Available', 0, 'bath-and-beauty', 0),
(53, 'Reviving Mint Bar', 'SO-MG-100', 205, 0, '19', '/khadi/images/products/85fb18039bcc6aa012aba3ba67df186b.jpg,/khadi/images/products/fa308812c8cfe38d1234b436f2fdb870.jpg,/khadi/images/products/335a64d8fc1fece4568949e03544f35d.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of tulsi and glycerin', 'As the cooling properties of mint revive the scorched skin during summers, tulsi extract reconstructs damaged cells gifting you a glowing healthy skin. \r\n\r\nIngredients: Mint extract, tulsi extract, essential oils, glycerin and soap base.', '100 gms', 0, 'Available', 0, 'bath-and-beauty', 0),
(54, 'Anti-Bacterial Neem &amp; Tulsi Bar', 'SO-NT-100', 205, 0, '19', '/khadi/images/products/9dc1ecb152231bdb77c59ef294173f27.jpg,/khadi/images/products/8cc42d77268d3a58893d82a6bc73cca6.jpg,/khadi/images/products/74c6e0b1a7be1f3a940ce01bab254c38.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of essential oils and glycerin', 'The medicinal properties of neem prevent aging, soothes dry skin and treats acne whereas tulsi is an efficient way to increase skin elasticity giving you tighter skin.\r\n\r\nIngredients: Neem Patra extract, tulsi extract, essential oils, glycerin and soap base.', '100 gms', 0, 'Available', 0, 'bath-and-beauty', 0),
(55, 'Moisturizing Aloe Vera Bar', 'SO-AG-100', 205, 0, '19', '/khadi/images/products/fc0f859af9e10928d2036011af3d49fa.jpg,/khadi/images/products/b5348683ab329a8ae1d48a695e5b9ea1.jpg,/khadi/images/products/e57e4aeb53e2055b3ce39ea59738489c.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of essential oils and glycerin', 'The intensive formulation of aloe vera extract and glycerin deeply moisturizes the skin eliminating moistness, reducing itching and reversing aging while tightening the skin.\r\n\r\nIngredients: Aloe vera extract, essential oils, glycerin and soap base.', '100 gms', 0, 'Available', 0, 'bath-and-beauty', 0),
(56, 'Refreshing Lime Bar', 'SO-LG-100', 205, 0, '19', '/khadi/images/products/9684a056590d0f79c9780ddb1ccd0b68.jpg,/khadi/images/products/dd40034f058f5f7a4d98c33c4633b5d8.jpg,/khadi/images/products/f32788a9304adc0e7bd9a2038de61dd0.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of Vitamin C and essential oils', 'The intensity of citrus infused with enriching essential oils is most appropriate to rejuvenate the skin during the summers as it brightens your skin tone and adds a refreshing fragrance to it.\r\n\r\nIngredients: Lime extract, tulsi extract, essential oils, glycerin and soap base.', '100 gms', 0, 'Available', 0, 'bath-and-beauty', 0),
(57, 'Aromatic Rose Water Bar', 'SO-RG-100', 205, 0, '19', '/khadi/images/products/b2184dcb420e4bd379348f55c965b819.jpg,/khadi/images/products/7a35368fdcb46003a6d4a9865d991870.jpg,/khadi/images/products/0fafda0aa74918b68ab4b5d3e950c0ec.jpg', 'Handcrafted with Love. Supply is Limited', 'With the goodness of essential oils and glycerin', 'Rose water acts as a mild cleanser and calms the redness of the skin leaving a splendid aroma while essential oils hydrate and moisturizes the skin giving a natural glow.  \r\n\r\nIngredients: Rose water, essential oils, glycerin and soap base.', '100 gms', 0, 'Available', 0, 'bath-and-beauty', 0);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `rid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tagline` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `product` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`rid`, `name`, `email`, `tagline`, `message`, `product`) VALUES
(1, 'Rahul', 'rahul@gmail.com', 'Soothing Fragrance', 'A product that really moisturizes your body after shower', 'Moisturising Aloe Vera Bar'),
(2, 'Amit Sharma', 'addy@gmail.com', 'Amazing Fragrance', 'The rose water bar really makes you feel in love with its fragrance. Its a great combination of something which has natural ingredients as well as an amazing fragrance!', 'Aromatic Rose Water Bar');

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
  `cart_id` int(11) NOT NULL,
  `txnid` varchar(255) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `zipcode` varchar(100) NOT NULL,
  `total` text NOT NULL,
  `productinfo` varchar(255) NOT NULL,
  `txn_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `cart_id`, `txnid`, `fullname`, `email`, `phone`, `address1`, `address2`, `city`, `state`, `country`, `zipcode`, `total`, `productinfo`, `txn_date`) VALUES
(1, 1, '18bf1379aaa52095dd0a', 'Sumeet Sharma', 'sksksharma0@gmail.com', '8286864601', '302  B-7  Sector-9', 'Shanti Nagar  Mira Road East', 'Mumbai', '', 'India', '401107', '3.00', 'Moisturising Aloe Vera Bar (x1) \r\nTherapeutic Aloe Vera Gel (x1) \r\n', '2018-11-26 23:21:39'),
(2, 1, '380740659a3c4f546ac9', 'Amit Sharma', 'addy.afriend@gmail.com', '9870744576', '302  B-7  Sector-9', 'Shanti Nagar  Mira Road East', 'Mumbai', '', 'India', '401107', '6.00', 'Moisturising Aloe Vera Bar (x2) \r\nTherapeutic Aloe Vera Gel (x2) \r\n', '2018-11-27 00:03:04');

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
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`bid`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`rid`);

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
