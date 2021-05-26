-- MariaDB dump 10.18  Distrib 10.4.17-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: capstone
-- ------------------------------------------------------
-- Server version	10.5.9-MariaDB-1:10.5.9+maria~focal

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `province` char(255) DEFAULT NULL,
  `postal_code` varchar(15) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `priv_level` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'Rachel Green','rachel.green@gmail.com','$2y$10$PQU7Lyd9zalXGM2f78H0VegP7ewtB97XfXhwWGtjMO/7g8F2ZXg3m',30,'431-374-1353','510 Main St','Winnipeg','MB','R3B 1B9','CA',0,'2021-05-06 20:11:27',NULL,NULL),(2,'Monica Geller','monica.geller@gmail.com','$2y$10$PQU7Lyd9zalXGM2f78H0VegP7ewtB97XfXhwWGtjMO/7g8F2ZXg3m',33,'403-246-3950','800 Macleod Trail SE','Calgary','AB','T2G 5E6','CA',0,'2021-05-06 20:11:27',NULL,NULL),(3,'Phoebe Buffay','phoebe.buffay@gmail.com','$2y$10$PQU7Lyd9zalXGM2f78H0VegP7ewtB97XfXhwWGtjMO/7g8F2ZXg3m',31,'514-235-2236','275 Notre-Dame St. East','Montreal','QC','H2Y 1C6','CA',0,'2021-05-06 20:11:27',NULL,NULL),(4,'Joey Tribbiani','joey.tribbiani@gmail.com','$2y$10$PQU7Lyd9zalXGM2f78H0VegP7ewtB97XfXhwWGtjMO/7g8F2ZXg3m',37,'613-722-9480','110 Laurier Ave W','Ottawa','ON','K1P 1J1','CA',0,'2021-05-06 20:11:27',NULL,NULL),(5,'Chandler Bing','chandler.bing@gmail.com','$2y$10$PQU7Lyd9zalXGM2f78H0VegP7ewtB97XfXhwWGtjMO/7g8F2ZXg3m',40,'604-222-5623','453 W 12th Ave','Vancouver','BC','V5Y 1V4','CA',0,'2021-05-06 20:11:27',NULL,NULL),(6,'Nina','test@gmail.com','$2y$10$8mgS5g.a2NlBxWBCITrurefPmMnFHppHVpWwU5LsWR5.uGFNixx0e',NULL,'2041231234','Test Ave','Winnipeg','MB','T3T 3T3','canada',1,'2021-05-06 20:13:33',NULL,NULL),(7,'Test 2','test2@gmail.com','$2y$10$TA1MtOOzWVNU7wP7R31Cm.9vX.60TfsKjUtMMVYoXHqRkmo2ZOizO',NULL,'2041231234','Test Ave','Winnipeg','MB','T3T 3T3','canada',0,'2021-05-08 01:26:05',NULL,NULL);
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` VALUES (1,'2021-05-12 | 04:11:58pm | GET | 200 | /?page=contact | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36\n','2021-05-12 21:11:58'),(2,'2021-05-12 | 04:13:56pm | GET | 200 | /?page=rewards | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36\n','2021-05-12 21:13:56'),(3,'2021-05-12 | 04:13:58pm | GET | 200 | /?page=teas | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36\n','2021-05-12 21:13:58'),(4,'2021-05-12 | 04:14:04pm | GET | 404 | /?page=test | Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.212 Safari/537.36\n','2021-05-12 21:14:04');
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_tea`
--

DROP TABLE IF EXISTS `order_tea`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_tea` (
  `order_id` int(11) NOT NULL,
  `tea_id` int(11) NOT NULL,
  `unit_price` decimal(5,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `line_price` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`order_id`,`tea_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_tea`
--

LOCK TABLES `order_tea` WRITE;
/*!40000 ALTER TABLE `order_tea` DISABLE KEYS */;
INSERT INTO `order_tea` VALUES (1,1,10.00,2,20.00),(1,5,22.00,1,22.00),(2,4,17.00,3,53.00),(3,12,13.00,2,26.00),(3,18,15.00,4,60.00),(3,20,12.00,1,12.00),(4,7,18.00,1,18.00),(4,9,19.00,1,19.00),(4,13,11.00,2,22.00),(4,19,13.00,2,26.00),(5,2,7.00,5,35.00);
/*!40000 ALTER TABLE `order_tea` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `subtotal` decimal(5,2) NOT NULL,
  `gst` decimal(5,2) NOT NULL,
  `pst` decimal(5,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,5,'2021-05-06 20:11:27',42.00,2.10,2.94,47.04),(2,4,'2021-05-06 20:11:27',53.00,2.65,3.71,59.36),(3,3,'2021-05-06 20:11:27',98.00,4.90,6.86,109.84),(4,2,'2021-05-06 20:11:27',85.00,4.25,0.00,89.25),(5,1,'2021-05-06 20:11:27',35.00,1.75,2.45,39.20);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teas`
--

DROP TABLE IF EXISTS `teas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `price` decimal(4,2) NOT NULL,
  `weight` enum('50g','100g','250g') NOT NULL,
  `type` enum('black','green','white','herbal','oolong','pu''erh','rooibos') NOT NULL,
  `caffeine` enum('high','medium','low','caffeine-free') DEFAULT NULL,
  `origin` varchar(45) DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `organic` tinyint(4) DEFAULT NULL,
  `ingredients` mediumtext DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `SKU` char(11) NOT NULL,
  `image` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teas`
--

LOCK TABLES `teas` WRITE;
/*!40000 ALTER TABLE `teas` DISABLE KEYS */;
INSERT INTO `teas` VALUES (1,'Winter Earl Grey',10.00,'100g','black','medium','England','2022-10-01',1,'Black tea, Pink pepper, Cornflower petals, Natural orange flavouring.','We have taken our classic citrusy & malty bergamot black tea and decked it out in red peppercorns & silver white tea. The result is creamy & fruity flavour with a sophisticated twist.','NTB-1000001','winter_earl_grey.jpg','2021-05-06 20:11:27',NULL,NULL),(2,'Vanilla Chai',7.00,'100g','black','high','India','2023-01-01',1,'Organic cinnamon, Organic black tea, Organic licorice root, Organic ginger, Organic vanilla.','For those chilly days, get your cozy on with this rich and spicy vanilla chai tea. The combo of organic black tea and digestion-loving spices like ginger, cinnamon and licorice root is like pure comfort in a cup.','NTB-1000002','vanilla_chai.jpg','2021-05-06 20:11:27',NULL,NULL),(3,'Orange Pekoe',15.00,'250g','black','high','Sri Lanka','2022-12-01',0,'Fine black teas from Sri Lanka.','From top estates in Ceylon, Sri Lanka, it’s a medium-strength tea with delicious hints of dark honey and malted grain that will satisfy your every mood, whether you sip it on its own or with a splash of milk.','NTB-1000003','orange_pekoe.jpg','2021-05-06 20:11:27',NULL,NULL),(4,'Cranberry Pear',17.00,'250g','black','low','Massachusetts','2022-09-01',0,'Cranberries, Black tea, Pear, Apple, Artificial cranberry flavouring, Natural pear flavouring.','Normally associated with a neon red holiday sauce, these beautiful berries really sing when paired with rich, floral black tea. Here we blend them with big pieces of pear and apple for the fruit and black tea blend you won’t believe you ever went without.','NTB-1000004','cranberry_pear.jpg','2021-05-06 20:11:27',NULL,NULL),(5,'Anji Green Tea',22.00,'50g','green','low','China','2022-01-01',1,'Organic green tea from Anji area, Zhejiang province, China.','Grown in the cool, misty foothills of China’s Nine Dragons mountain, this luxuriously rich organic green tea from Anji county steeps ethereal notes of artichokes and asparagus with hints of roasted corn. Plus it’s packed with all the energizing and detoxifying benefits green tea is known for.','NTB-1000005','anji_green_tea.jpg','2021-05-06 20:11:27',NULL,NULL),(6,'Zen Pearl White Tea',27.00,'100g','white','medium','China','2022-04-01',1,'Organic rolled white tea from Fujian Province, scented with jasmine flowers.','Hand-rolling tea is a tradition that began over 1300 years ago, when a Chinese emperor wanted to give an original gift of love. Our gift to you is this organic white tea, lightly scented with jasmine flowers and hand-rolled into delicate pearls that gently unfurl as they steep.','NTB-1000006','zen_pearl_white_tea.jpg','2021-05-06 20:11:27',NULL,NULL),(7,'Emerald Jade Green Tea',18.00,'50g','green','medium','China','2022-08-01',1,'Organic green tea from Hubei Province, China.','Plucked from a family-owned organic tea garden in the Suizhou prefecture, this classic Chinese green tea is a daily ritual you’re going to love. It’s fresh, energizing and super easy to drink – perfect for tea newbies and connoisseurs alike.','NTB-1000007','emerald_jade_green_tea.jpg','2021-05-06 20:11:27',NULL,NULL),(8,'Japanese Sencha',15.00,'50g','green','high','Japan','2022-06-01',1,'Organic steamed green tea from Mount Fuji, Japan.','Sencha green tea is Japan\'s most popular drink. It\'s not hard to see why – steamed sencha tastes rich, refreshing and crisp. What\'s not to love? Sip on this energizing and detoxifying organic green tea hot or iced, any time of the day.','NTB-1000008','japanese_sencha.jpg','2021-05-06 20:11:27',NULL,NULL),(9,'Canada Mint',19.00,'250g','green','low','Canada','2022-04-01',0,'Green tea, ginger, peppermint, cardamom, fennel, clove, black pepper.','Canada Mint combines fresh peppermint with comforting cardamom, ginger, licorice root and fennel – spices well-loved for their digestive properties. Deliciously aromatic with all the romance of the Maghreb, it’s the perfect way to unwind after a heavy meal.','NTB-1000009','canada_mint.jpg','2021-05-06 20:11:27',NULL,NULL),(10,'Silk Dragon Jasmine',12.00,'50g','green','medium','China','2022-12-01',1,'Organic chinese green tea from Jiangxi and Fujian Provinces, scented with jasmine flowers.','This premium spring-plucked green tea with jasmine is a real treasure. To create it, night-blooming jasmine is gathered in the morning and kept cool all day. In the evening, when the flowers burst open and release their scent, they’re placed with the tea leaves. This is repeated with fresh flowers over five nights, infusing the green tea with a most magical jasmine flavour.','NTB-1000010','silk_dragon_jasmine.jpg','2021-05-06 20:11:27',NULL,NULL),(11,'Pink Flamingo',12.00,'250g','herbal','caffeine-free','Morocco','2022-04-01',1,'Apple, Carrot, Hibiscus, Blackberry leaf, Eucalyptus, Lemongrass, Beetroot, Orange, Tangerine.','Try this sweet, citrusy cocktail of oranges, tangerines and lemongrass. It’s got hibiscus and beetroot to turn it a natural shade of hot pink, plus blackberry leaves and carrot for extra sweetness, and eucalyptus leaves for kick.','NTB-1000011','pink_flamingo.jpg','2021-05-06 20:11:27',NULL,NULL),(12,'Mango Fruit Punch',13.00,'250g','herbal','caffeine-free','Canada','2022-04-01',0,'Candied pineapple, Candied mango, Orange peel, Beetroot, Strawberries, Tangerine, Marigold blossoms.','This tropical caffeine-free tea is fresh and fruity, yet rich and exotic, with big pieces of pineapple and mango, tangy slices of tangerine, sweet strawberries and pretty marigold blossoms.','NTB-1000012','mango_fruit_punch.jpg','2021-05-06 20:11:27',NULL,NULL),(13,'Ginger Honey',11.00,'100g','herbal','caffeine-free','India','2022-08-01',0,'Ginger, Crystallized ginger, Lemongrass, Honey ginger crystals, Natural sweet ginger flavouring.','Our mellow ginger tea is made with cold-fighting ginger plus a hint of lemongrass for a citrus. In aromatherapy, lemongrass is also used to bring on waves of relaxation. This soothing herbal tea can even help an upset tummy – as sweet as honey.','NTB-1000013','ginger_honey.jpg','2021-05-06 20:11:27',NULL,NULL),(14,'Cherry Blossom',16.00,'100g','white','medium','England','2022-06-01',0,'White tea, Coconut rasps, Artificial cherry flavouring, Rosebuds, Cherries.','When it comes to getting romantic, this alluring fruity white tea hits all the right notes. For starters, it’s packed with juicy cherries, said by some to be an aphrodisiac.  It\'s also strewn with pink rose blossoms – a sure-fire sign of love, friendship and affection.','NTB-1000014','cherry_blossom.jpg','2021-05-06 20:11:27',NULL,NULL),(15,'Maple Syrup Oolong',22.00,'250g','oolong','low','Canada','2022-08-01',1,'Apple, Oolong tea, Candied papaya, Raisins, Buckwheat seeds, Roasted chicory root, Maple sugar, Stevia extract.','With buckwheat and roasted chicory, this maple syrup oolong tea tastes just like a stack of pancakes drenched in rich amber maple. Whether you sip it straight up or as a frothy tea latte, your weekend brunch will never be the same again.','NTB-1000015','maple_syrup_oolong.jpg','2021-05-06 20:11:27',NULL,NULL),(16,'Guangzhou milk Oolong',12.00,'50g','oolong','medium','China','2023-01-01',1,'Chinese oolong tea from the Fujian province, Natural and artificial milk flavouring.','This rare oolong tea from China’s Wuyi Mountains is velvety smooth and creamy, with a subtle hint of orchid. It’s said that it came about when the moon fell in love with a comet. The comet passed her by, as comets will do. The moon cried milky tears, which chilled the tea fields, withering the leaves and giving them a delicate creaminess.','NTB-1000016','guangzhou_milk_oolong.jpg','2021-05-06 20:11:27',NULL,NULL),(17,'Lavender Buttercream',16.00,'100g','rooibos','caffeine-free','England','2022-03-01',1,'Rooibos, Rosehips, Candied pineapple, Sugar, Apple, Natural vanilla flavouring, Lavender.','Dessert is served! Sweet, creamy and laced with aromatic lavender, this decadent caffeine-free rooibos tea tastes just like a slice of vanilla cake with floral buttercream frosting.','NTB-1000017','lavender_buttercream.jpg','2021-05-06 20:11:27',NULL,NULL),(18,'Headache Halo',15.00,'250g','rooibos','caffeine-free','South Africa','2022-03-01',1,'Rooibos, Nana mint, Lemongrass, Willow bark, Nettle leaves, Lavender, Passionflower, Vervain leaves, Rose petals, Mallow blossoms.','Help calm a headache the natural way. This heavenly caffeine-free rooibos features soothing willow bark, comforting passionflower, cooling nana mint and relaxing lavender. A smooth, fresh and creamy infusion designed to help melt away tension and ease the mind – morning, noon and night.','NTB-1000018','headache_halo.jpg','2021-05-06 20:11:27',NULL,NULL),(19,'S\'mores Chai',13.00,'100g','pu\'erh','low','England','2022-02-01',0,'Pu\'erh tea, Brittle pieces, Cinnamon, Sugar, Marshmallow, Chocolate chips','Gooey toasted marshmallows, graham crackers, dark chocolate – it’s no wonder we live for s’mores. Our tempting pu’erh tea adds an extra dash of cinnamon to the campfire classic, so it’s rich, warming and packed with fudgy goodness. ','NTB-1000019','smores_chai.jpg','2021-05-06 20:11:27',NULL,NULL),(20,'Yunnan Pu\'erh',12.00,'50g','pu\'erh','high','China','2022-01-01',1,'Shou pu’erh tea from Yunnan province, China','A deliciously smooth & sweet blend of shou pu’erh, the leaves in this tea come from Menghai county in the province of Yunnan. It smells of sweet, wet earth & cremini mushrooms – think deep mountain ranges after a long rainfall.','NTB-1000020','yunnan_puer.jpg','2021-05-06 20:11:27',NULL,NULL);
/*!40000 ALTER TABLE `teas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-25 22:04:31
