DROP TABLE IF EXISTS `teas`;
CREATE TABLE IF NOT EXISTS `teas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `price` DECIMAL(4,2) NOT NULL,
  `weight` ENUM('50g', '100g', '250g') NOT NULL,
  `type` ENUM('black', 'green', 'white', 'herbal', 'oolong', 'pu\'erh', 'rooibos') NOT NULL,
  `caffeine` ENUM('high', 'medium', 'low', 'caffeine-free') NULL,
  `origin` VARCHAR(45) NULL,
  `expire_date` DATE NULL,
  `organic` TINYINT NULL,
  `ingredients` MEDIUMTEXT NULL DEFAULT NULL,
  `description` LONGTEXT NULL DEFAULT NULL,
  `SKU` CHAR(10) NOT NULL,
  `created_at` DATETIME NULL DEFAULT current_timestamp,
  `updated_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);
  
INSERT INTO teas(`id`,`name`,`price`,`weight`,`type`,`caffeine`,`origin`,`expire_date`,`organic`,`ingredients`, `description`,`SKU`) VALUES
(1,'Winter Earl Grey', 10.00, '100g', 'black', 'medium', 'England', '2022-10-1', 1, 'Black tea, Pink pepper, Cornflower petals, Natural orange flavouring.', 'We’ve taken our classic citrusy & malty bergamot black tea and decked it out in red peppercorns & silver white tea. The result is creamy & fruity flavour with a sophisticated twist.', 'NTB-1000001'),

(2,'Vanilla Chai', 7.00, '100g', 'black', 'high', 'India', '2023-1-1', 1, 'Organic cinnamon, Organic black tea, Organic licorice root, Organic ginger, Organic vanilla.', 'For those chilly days, get your cozy on with this rich and spicy vanilla chai tea. The combo of organic black tea and digestion-loving spices like ginger, cinnamon and licorice root is like pure comfort in a cup.', 'NTB-1000002'),

(3,'Orange Pekoe', 15.00, '250g', 'black', 'high', 'Sri Lanka', '2022-12-1', 0, 'Fine black teas from Sri Lanka.', 'From top estates in Ceylon, Sri Lanka, it’s a medium-strength tea with delicious hints of dark honey and malted grain that will satisfy your every mood, whether you sip it on its own or with a splash of milk.', 'NTB-1000003'),

(4,'Cranberry Pear', 17.00, '250g', 'black', 'low', 'Massachusetts', '2022-9-1', 0, 'Cranberries, Black tea, Pear, Apple, Artificial cranberry flavouring, Natural pear flavouring.', 'Normally associated with a neon red holiday sauce, these beautiful berries really sing when paired with rich, floral black tea. Here we blend them with big pieces of pear and apple for the fruit and black tea blend you won’t believe you ever went without.', 'NTB-1000004'),


(5,'Anji Green Tea', 22.00, '50g', 'green', 'low', 'China', '2022-1-1', 1, 'Organic green tea from Anji area, Zhejiang province, China.', 'Grown in the cool, misty foothills of China’s Nine Dragons mountain, this luxuriously rich organic green tea from Anji county steeps ethereal notes of artichokes and asparagus with hints of roasted corn. Plus it’s packed with all the energizing and detoxifying benefits green tea is known for.', 'NTB-1000005'),

(6,'Zen Pearl White Tea', 27.00, '100g', 'white', 'medium', 'China', '2022-4-1', 1, 'Organic rolled white tea from Fujian Province, scented with jasmine flowers.', 'Hand-rolling tea is a tradition that began over 1300 years ago, when a Chinese emperor wanted to give an original gift of love. Our gift to you is this organic white tea, lightly scented with jasmine flowers and hand-rolled into delicate pearls that gently unfurl as they steep.', 'NTB-1000006'),

(7,'Emerald Jade Green Tea', 18.00, '50g', 'green', 'medium', 'China', '2022-8-1', 1, 'Organic green tea from Hubei Province, China.', 'Plucked from a family-owned organic tea garden in the Suizhou prefecture, this classic Chinese green tea is a daily ritual you’re going to love. It’s fresh, energizing and super easy to drink – perfect for tea newbies and connoisseurs alike.', 'NTB-1000007'),

(8,'Japanese Sencha', 15.00, '50g', 'green', 'high', 'Japan', '2022-6-1', 1, 'Organic steamed green tea from Mount Fuji, Japan.', 'Sencha green tea is Japan\'s most popular drink. It\'s not hard to see why – steamed sencha tastes rich, refreshing and crisp. What\'s not to love? Sip on this energizing and detoxifying organic green tea hot or iced, any time of the day.', 'NTB-1000008'),

(9,'Canada Mint', 19.00, '250g', 'green', 'low', 'Canada', '2022-4-1', 0, 'Green tea, ginger, peppermint, cardamom, fennel, clove, black pepper.', 'Canada Mint combines fresh peppermint with comforting cardamom, ginger, licorice root and fennel – spices well-loved for their digestive properties. Deliciously aromatic with all the romance of the Maghreb, it’s the perfect way to unwind after a heavy meal.', 'NTB-1000009'),

(10,'Silk Dragon Jasmine', 12.00, '50g', 'green', 'medium', 'China', '2022-12-1', 1, 'Organic chinese green tea from Jiangxi and Fujian Provinces, scented with jasmine flowers.', 'This premium spring-plucked green tea with jasmine is a real treasure. To create it, night-blooming jasmine is gathered in the morning and kept cool all day. In the evening, when the flowers burst open and release their scent, they’re placed with the tea leaves. This is repeated with fresh flowers over five nights, infusing the green tea with a most magical jasmine flavour.', 'NTB-1000010'),

(11,'Pink Flamingo', 12.00, '250g', 'herbal', 'caffeine-free', 'Morocco', '2022-4-1', 1, 'Apple, Carrot, Hibiscus, Blackberry leaf, Eucalyptus, Lemongrass, Beetroot, Orange, Tangerine.', 'Try this sweet, citrusy cocktail of oranges, tangerines and lemongrass. It’s got hibiscus and beetroot to turn it a natural shade of hot pink, plus blackberry leaves and carrot for extra sweetness, and eucalyptus leaves for kick.', 'NTB-1000011'),

(12,'Mango Fruit Punch', 13.00, '250g', 'herbal', 'caffeine-free', 'Canada', '2022-4-1', 0, 'Candied pineapple, Candied mango, Orange peel, Beetroot, Strawberries, Tangerine, Marigold blossoms.', 'This tropical caffeine-free tea is fresh and fruity, yet rich and exotic, with big pieces of pineapple and mango, tangy slices of tangerine, sweet strawberries and pretty marigold blossoms.', 'NTB-1000012'),

(13,'Ginger Honey', 11.00, '100g', 'herbal', 'caffeine-free', 'India', '2022-8-1', 0, 'Ginger, Crystallized ginger, Lemongrass, Honey ginger crystals, Natural sweet ginger flavouring.', 'Our mellow ginger tea is made with cold-fighting ginger plus a hint of lemongrass for a citrus. In aromatherapy, lemongrass is also used to bring on waves of relaxation. This soothing herbal tea can even help an upset tummy – as sweet as honey.', 'NTB-1000013'),

(14,'Cherry Blossom', 16.00, '100g', 'white', 'medium', 'England', '2022-6-1', 0, 'White tea, Coconut rasps, Artificial cherry flavouring, Rosebuds, Cherries.', 'When it comes to getting romantic, this alluring fruity white tea hits all the right notes. For starters, it’s packed with juicy cherries, said by some to be an aphrodisiac.  It\'s also strewn with pink rose blossoms – a sure-fire sign of love, friendship and affection.', 'NTB-1000014'),

(15,'Maple Syrup Oolong', 22.00, '250g', 'oolong', 'low', 'Canada', '2022-8-1', 1, 'Apple, Oolong tea, Candied papaya, Raisins, Buckwheat seeds, Roasted chicory root, Maple sugar, Stevia extract.', 'With buckwheat and roasted chicory, this maple syrup oolong tea tastes just like a stack of pancakes drenched in rich amber maple. Whether you sip it straight up or as a frothy tea latte, your weekend brunch will never be the same again.', 'NTB-1000015'),

(16,'Guangzhou milk Oolong', 12.00, '50g', 'oolong', 'medium', 'China', '2023-1-1', 1, 'Chinese oolong tea from the Fujian province, Natural and artificial milk flavouring.', 'This rare oolong tea from China’s Wuyi Mountains is velvety smooth and creamy, with a subtle hint of orchid. It’s said that it came about when the moon fell in love with a comet. The comet passed her by, as comets will do. The moon cried milky tears, which chilled the tea fields, withering the leaves and giving them a delicate creaminess.', 'NTB-1000016'),

(17,'Lavender Buttercream', 16.00, '100g', 'rooibos', 'caffeine-free', 'England', '2022-3-1', 1, 'Rooibos, Rosehips, Candied pineapple, Sugar, Apple, Natural vanilla flavouring, Lavender.', 'Dessert is served! Sweet, creamy and laced with aromatic lavender, this decadent caffeine-free rooibos tea tastes just like a slice of vanilla cake with floral buttercream frosting.', 'NTB-1000017'),

(18,'Headache Halo', 15.00, '250g', 'rooibos', 'caffeine-free', 'South Africa', '2022-3-1', 1, 'Rooibos, Nana mint, Lemongrass, Willow bark, Nettle leaves, Lavender, Passionflower, Vervain leaves, Rose petals, Mallow blossoms.', 'Help calm a headache the natural way. This heavenly caffeine-free rooibos features soothing willow bark, comforting passionflower, cooling nana mint and relaxing lavender. A smooth, fresh and creamy infusion designed to help melt away tension and ease the mind – morning, noon and night.', 'NTB-1000018'),

(19,'S\'mores Chai', 13.00, '100g', 'pu\'erh', 'low', 'England', '2022-2-1', 0, 'Pu\'erh tea, Brittle pieces, Cinnamon, Sugar, Marshmallow, Chocolate chips', 'Gooey toasted marshmallows, graham crackers, dark chocolate – it’s no wonder we live for s’mores. Our tempting pu’erh tea adds an extra dash of cinnamon to the campfire classic, so it’s rich, warming and packed with fudgy goodness. ', 'NTB-1000019'),

(20,'Yunnan Pu\'erh', 12.00, '50g', 'pu\'erh', 'high', 'China', '2022-1-1', 1, 'Shou pu’erh tea from Yunnan province, China', 'A deliciously smooth & sweet blend of shou pu’erh, the leaves in this tea come from Menghai county in the province of Yunnan. It smells of sweet, wet earth & cremini mushrooms – think deep mountain ranges after a long rainfall.', 'NTB-1000020');

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers`(
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `age` INT DEFAULT NULL,
  `phone` VARCHAR(45) NULL,
  `address` VARCHAR(255) NULL,
  `city` VARCHAR(255) NULL,
  `province` CHAR(255) NULL,
  `postal_code` VARCHAR(15) NULL,
  `country` VARCHAR(255) NULL,
  `created_at` DATETIME NULL DEFAULT current_timestamp,
  `updated_at` DATETIME NULL DEFAULT NULL,
PRIMARY KEY (`id`)
);

INSERT INTO customers(`id`,`name`,`email`,`password`,`age`,`phone`,`address`,`city`,`province`,`postal_code`,`country`) VALUES
(1, 'Rachel Green', 'rachel.green@gmail.com', 'grp@sswd', 30, '431-374-1353', '510 Main St' , 'Winnipeg', 'MB', 'R3B 1B9', 'CA'),
(2, 'Monica Geller', 'monica.geller@gmail.com', 'mgp@sswd', 33, '403-246-3950', '800 Macleod Trail SE', 'Calgary', 'AB', 'T2G 5E6', 'CA'),
(3, 'Phoebe Buffay', 'phoebe.buffay@gmail.com', 'fbp@sswd', 31, '514-235-2236', '275 Notre-Dame St. East', 'Montreal', 'QC', 'H2Y 1C6', 'CA'),
(4, 'Joey Tribbiani', 'joey.tribbiani@gmail.com', 'jtp@sswd', 37, '613-722-9480', '110 Laurier Ave W', 'Ottawa', 'ON', 'K1P 1J1', 'CA'),
(5, 'Chandler Bing', 'chandler.bing@gmail.com', 'cbp@sswd', 40, '604-222-5623', '453 W 12th Ave', 'Vancouver', 'BC', 'V5Y 1V4', 'CA');


DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders`(
  `id` INT NOT NULL AUTO_INCREMENT,
  `customer_id` INT NULL,
  `order_date` DATETIME NOT NULL DEFAULT current_timestamp,
  `subtotal` DECIMAL(5,2) NOT NULL,
  `gst` DECIMAL(5,2) NOT NULL,
  `pst` DECIMAL(5,2) NOT NULL,
  `total` DECIMAL(10,2) NOT NULL,
PRIMARY KEY (`id`)
-- FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`)
);


INSERT INTO `orders`(`id`,`customer_id`,`subtotal`,`gst`,`pst`,`total`) VALUES
(1, 5, 42.00, 2.10, 2.94, 47.04),
(2, 4, 53.00, 2.65, 3.71, 59.36),
(3, 3, 98.00, 4.90, 6.86, 109.84),
(4, 2, 85.00, 4.25, 0.00, 89.25),
(5, 1, 35.00, 1.75, 2.45, 39.20);


DROP TABLE IF EXISTS `order_tea`;
CREATE TABLE `order_tea`(
  `order_id` INT NOT NULL,
  `tea_id` INT NOT NULL,
  `unit_price` DECIMAL(5,2),
  `quantity` INT,
  `line_price` DECIMAL(5,2),
PRIMARY KEY(`order_id`,`tea_id`)
-- FOREIGN KEY(`order_id`) REFERENCES `orders` (`id`)
-- FOREIGN KEY(`tea_id`) REFERENCES `teas` (`id`)
);

INSERT INTO `order_tea` VALUES
(1, 1, 10.00, 2, 20.00),
(1, 5, 22.00, 1, 22.00),
(2, 4, 17.00, 3, 53.00),
(3, 12, 13.00, 2, 26.00),
(3, 18, 15.00, 4, 60.00),
(3, 20, 12.00, 1, 12.00),
(4, 7, 18.00, 1, 18.00),
(4, 9, 19.00, 1, 19.00),
(4, 13, 11.00, 2, 22.00),
(4, 19, 13.00, 2, 26.00),
(5, 2, 7.00, 5, 35.00);
