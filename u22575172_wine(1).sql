-- phpMyAdmin SQL Dump
-- version 5.0.4deb2~bpo10+1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 06, 2023 at 09:46 PM
-- Server version: 10.3.31-MariaDB-0+deb10u1
-- PHP Version: 7.3.31-1~deb10u3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u22575172_wine`
--

-- --------------------------------------------------------

--
-- Table structure for table `bemail`
--

CREATE TABLE `bemail` (
  `BusinessID` int(11) NOT NULL,
  `BEmail` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bemail`
--

INSERT INTO `bemail` (`BusinessID`, `BEmail`) VALUES
(1, 'info@middelvleiwines.com'),
(2, 'info@kleinezalze.co.za'),
(3, 'info@vilafonte.com'),
(4, 'info@mullineuxandleeu.com'),
(5, 'info@franschhoekcellar.co.za'),
(6, 'info@labri.co.za'),
(7, 'customerservices@vergelegen.co.za'),
(8, 'info@kleinconstantia.com'),
(9, 'info@rustenvrede.com'),
(10, 'shop@meerlust.co.za'),
(11, 'info@delaire.co.za'),
(12, 'wine@kanonkop.co.za'),
(13, 'sales@waterfordestate.co.za '),
(14, 'info(at)spier.co.za'),
(15, ' info@jordanwines.com'),
(16, 'info@thelema.co.za'),
(17, 'enquiries@boschendal.co.za'),
(18, 'info@stellvine.co.za'),
(19, 'info@bouchardfinlayson.co.za'),
(20, 'wine@tokara.com'),
(21, 'info@vsattui.com'),
(22, 'torciano@torciano.com'),
(23, 'reservas@vivancoculturadevino.es'),
(24, 'info@turkeyflat.com.au');

-- --------------------------------------------------------

--
-- Table structure for table `bnumber`
--

CREATE TABLE `bnumber` (
  `BusinessID` int(11) NOT NULL,
  `BNumber` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bnumber`
--

INSERT INTO `bnumber` (`BusinessID`, `BNumber`) VALUES
(1, '019 129 3122'),
(2, '021 880 0717'),
(3, '021 886 4083'),
(4, '021 492 2224'),
(5, '021 876 2086'),
(6, '021 876 2593'),
(7, ' +27 21 847 2100'),
(8, '+27 21 794 5188'),
(9, '+27 21 881 3881'),
(10, '+27 21 843 3274'),
(11, ' +27 21 885 8160'),
(12, '+27 21 884 4656'),
(13, '+27 21 880 5300'),
(14, '+27 (21) 809 1100'),
(15, '+27 21 881 3441'),
(16, '+27 21 885 1924'),
(17, '+27 21 870 4200'),
(18, '+27 21 881 3870'),
(19, '+27 28 312 3515'),
(20, '+27 21 808 5900'),
(21, '(707) 963-7774'),
(22, '+39 0577 950055'),
(23, '+34 941 32 23 23'),
(24, '+61 8 8563 2851');

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `Business_ID` int(11) NOT NULL,
  `BName` varchar(128) NOT NULL,
  `Business_URL` varchar(300) NOT NULL,
  `Website_URL` varchar(300) NOT NULL,
  `Weekday_open_time` varchar(128) NOT NULL,
  `Weekday_close_time` varchar(128) NOT NULL,
  `Weekend_open_time` varchar(128) NOT NULL,
  `Weekend_close_time` varchar(128) NOT NULL,
  `Instagram` varchar(128) DEFAULT NULL,
  `Twitter` varchar(128) DEFAULT NULL,
  `Facebook` varchar(128) DEFAULT NULL,
  `Description` longtext NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Region_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`Business_ID`, `BName`, `Business_URL`, `Website_URL`, `Weekday_open_time`, `Weekday_close_time`, `Weekend_open_time`, `Weekend_close_time`, `Instagram`, `Twitter`, `Facebook`, `Description`, `User_ID`, `Region_ID`) VALUES
(1, 'Middelvlei Wine Estate', 'https://middelvlei.co.za/new-website/wp-content/uploads/2020/02/cropped-middelvlei_logo_300px.png', 'https://middelvlei.co.za/', '10:00:00', '17:00:00', '10:00:00', '13:00:00', 'https://www.instagram.com/middelvlei_wine/', 'https://twitter.com/Middelvlei_Wine', 'https://www.facebook.com/pages/Middelvlei%20Wine%20Estate/144921322570331/', 'Middelvlei Estate, known for its hospitality and special farm atmosphere, offers a personal, unforgettable and authentic Stellenbosch Winelands experience for the whole family. By producing superb quality wines, brothers Tinnie and Ben Momberg are continuing the families legacy of winemaking that has lasted for over 100 years.', 1, 4),
(2, 'Kleine Zalze Wine Estate', 'https://kleinezalze.co.za/wp-content/uploads/2021/07/KZ-LOGO-transparent-300.png', 'https://www.kleinezalze.co.za/', '09:00:00', '18:00:00', '11:00:00', '18:00:00', NULL, 'https://twitter.com/kleine_zalze', 'https://www.facebook.com/kleinezalzeofficial/', 'Kleine Zalze’s philosophy is simple  – success begins in the vineyards. Exceptional wines are made possible by careful management of the farm’s extensive natural assets through innovative canopy management and selecting varieties and clones specifically suited to the various soils and slope', 1, 4),
(3, 'Vilafonté Wines', 'https://www.vilafonte.com/wp-content/uploads/2018/02/vilafonte-logo-black.png', 'https://www.vilafonte.com/', '09:00:00', '18:00:00', '11:00:00', '18:00:00', 'https://www.instagram.com/explore/tags/vilafonte/?hl=en', 'https://twitter.com/Vilafonte', 'https://m.facebook.com/profile.php?id=268500363255406', 'a vineyard different by design of ancient vilafontes soils low yielding small vines harvested by handind ividual berry selection unfiltered and barrel aged limited production', 3, 4),
(4, 'Mullineux & Leeu Family Wines - Franschhoek', 'https://mlfwines.com/mullineux/wp-content/themes/mullineux/images/logo.svg', 'https://mlfwines.com/mullineux/contact-us/', '09:00:00', '17:00:00', '10:00:00', '13:00:00', NULL, 'https://twitter.com/mullineuxwines?lang=en', 'https://m.facebook.com/profile.php?id=171443899875120', 'after working several vintages at wineries in france, south africa and california, chris & andrea chose to settle in the swartland region of south africa, firmly believing that the granite and schist based terroirs and old vineyards of the swartland have the potential to produce truly great wine.', 4, 5),
(5, 'Franschhoek Celler', 'https://middelvlei.co.za/new-website/wp-content/uploads/2020/02/cropped-middelvlei_logo_300px.png', 'https://franschhoekcellar.co.za/', '09:00:00', '18:00:00', '09:00:00', '13:00:00', '', 'https://twitter.com/franschhoek_sa?lang=en', 'https://www.facebook.com/franschhoekcellar/', 'Franschhoek Cellar, a beautiful asset to the Franschhoek wine route, combines the charms of leisurely country life with the elegance of a world-class venue. Enjoy wine tastings paired with Belgian chocolate or handmade cheese. Dine on alfresco style lunches in our fabulous garden, or sip on an artisanal beer in our bistro & beer garden. Franschhoek Cellar has a special selection of unique event venues within the space to ensure we host your most memorable occasion.', 5, 5),
(6, 'La Bri Wine Estate', 'https://labri.co.za/wp-content/uploads/2022/12/la-bri-logo.png', 'https://labri.co.za/?v=e4dd286dc7d7', '10:00:00', '17:00:00', '09:00:00', '13:00:00', NULL, 'https://twitter.com/labriwine?lang=en', 'https://www.facebook.com/LaBriWine/', 'Boasting a state-of-the-art 120 tonne boutique wine cellar and tasting room, La Bri is where you will find signature styled wines made with passion. Our formidable team aims to share their wonderful products with fellow wine lovers who will enjoy, share and cherish their efforts.', 6, 5),
(7, 'Vergelegen Estate', 'https://vergelegen.co.za/wp-content/uploads/2020/12/vergelegen-logo-wc-email.png', 'https://vergelegen.co.za/', '8:30:00', '16:00:00', '8:30:00', '16:00:00', NULL, NULL, 'https://www.facebook.com/vergelegenwines/', 'Vergelegen - no ordinary Estate. Founded on 1 February 1700, Vergelegen (meaning \"situated far away\"), has been under the ownership of some of the world\'s great explorers and visionaries, each of whom, in their own way, have helped shape Vergelegen to what it is today: a world-class Estate. With its world renowned handcrafted wines, history spanning over 300 years, heritage, exquisite gardens and refined cuisine, it comes as no surprise that Vergelegen continues to be the choice of the discerning visitor seeking a total sensory experience. For this reason, the Estate has borne witness to many visits of heads of state and celebrities from all over the world. Think of Vergelegen to spend quality time on your own, with your family and friends or business associates - wine tasting centre and cellar tours, Camphors at Vergelegen Signature Restaurant, Stables at Vergelegen Bistro Restaurant and the Picnic, are only a few of a myriad of enjoyable activities at Vergelegen. We invite you to experience the world of Vergelegen first-hand.', 3, 19),
(8, 'Klein Constantia', 'https://piwosa.com/wp-content/uploads/2022/09/Klein-Constantia-logo.png', 'https://www.kleinconstantia.com/', '10:00:00', '17:00:00', '10:00:00', '17:00:00', NULL, 'https://twitter.com/KleinConstantia', 'https://www.facebook.com/KleinConstantia', 'The perfect location for cool climate wines, Klein Constantia produces some of South Africa’s top wines, including one of the world’s best natural sweet wines, Vin de Constance', 1, 17),
(9, 'Rust en Vrede Estate', 'https://rustenvrede.com/wp-content/themes/Rust/img/logo_top.png', 'https://rustenvrede.com/', '9:00:00', '17:00:00', '10:00:00', '16:00:00', NULL, NULL, 'https://www.facebook.com/rustenvrede/', 'Rust en Vrede Estate lies south of Stellenbosch, approximately 15km from False Bay. The property is nestled on the lower slopes of the Helderberg Mountain between 85m and 130m above sea level, with a view on Table Mountain to the West. Vineyards are situated on North facing slopes, with a small portion of North-East and North-West facing slopes that provide subtle nuances in aspect. Shielded from the powerful South-Easterly wind by the Helderberg and Stellenbosch mountains, and protected from the South-Westerly wind off the Atlantic by the foothills of the Helderberg, Rust en Vrede is a warmer microcosm in the Helderberg area, which is why we specialise in reds, particularly Syrah and Cabernet Sauvignon. These varieties lend themselves to full bodied wines with powerful structure and excellent ageing potential.\r\n\r\nOur focus on Cabernet Sauvignon and Syrah allows us to produce the highest quality, full bodied wines that reflect our Stellenbosch terroir. All our wines are Estate grown, made and bottled', 5, 4),
(10, 'Meerlust Estate', 'https://www.meerlust.co.za/client/1144/images/Meerlust_Logo.png', 'https://www.meerlust.co.za/', '9:00:00', '17:00:00', '10:00:00', '14:00:00', NULL, NULL, NULL, 'Long recognized for producing world-class wines, Meerlust Estate has been the pride of the Myburgh family since 1756. Today, the traditional dedication to the art of winemaking continues under the guidance of Hannes Myburgh, eighth generation custodian of this seventeenth-century national monument.\r\n\r\nMeerlust, with its historic manor house, classic wine cellar, family cemetery, dovecote and bird sanctuary is situated fifteen kilometers south of Stellenbosch, with the blue crescent of False Bay a mere five kilometers away. Wines are only made from grapes grown on the Estate which is uniquely positioned for the production of wines with exceptional complexity and character.\r\n\r\nIn the summertime, ocean breezes and evening mists roll in from the coast to cool the vineyards. The grapes ripen slowly, thus achieving full, concentrated varietal flavours. The soils consist of predominantly deep, well drained Hutton and Clovelly soil types, affording the vines excellent drought resistance and an ideal substrata for producing concentrated, complex wines', 6, 4),
(11, 'Delaire Graff Estate', 'https://cdn.shopify.com/s/files/1/0267/3521/4650/files/Delaire_Graff_Estate.png?height=628&pad_color=ffffff&v=1614313002&width=1200', 'https://www.delaire.co.za/', '10:00:00', '20:00:00', '10:00:00', '20:00:00', 'https://www.instagram.com/delairegraff/?hl=en', NULL, 'https://www.facebook.com/DelaireGraff/', 'The ultimate Cape Winelands experience, Delaire Graff Estate is dedicated to beauty in its many forms. Much like polishing a diamond to reveal its brilliance, jeweller Laurence Graff has transformed an extraordinary natural setting into a world-class destination for wine, art, cuisine, and an escape from the everyday.', 1, 4),
(12, 'Kanonkop Wine Estate', 'https://www.kanonkop.co.za/wp-content/uploads/2020/03/Kanonkop-Estate.png', 'https://www.kanonkop.co.za/', '9:00:00', '17:00:00', '9:00:00', '15:00:00', 'https://www.instagram.com/kanonkopwineestate/?hl=en', NULL, 'https://www.facebook.com/Kanonkop/', 'Kanonkop Wine Estate is situated in Stellenbosch, the premium red wine region of South Africa’s Western Cape Province.\r\nTo many, Kanonkop is considered to be the South African equivalent of a Premier Cru or First Growth. For others, Kanonkop is not just a wine estate.\r\n\r\nIt is a place of natural beauty where hospitality, family values, tradition, history and interesting characters are as integral to our ability to create magnificent wines as the ancient decomposed granite soils, the cool air from the Atlantic Ocean and the old dryland vineyards.', 3, 4),
(13, 'Waterford Estate', 'https://cdn.shopify.com/s/files/1/0606/5016/0282/files/WHITE_FOUNTAIN.png?v=1669216063&width=500', 'https://www.waterfordestate.co.za/', '10:00:00', '17:00:00', '10:00:00', '17:00:00', 'https://www.instagram.com/waterford_estate/?hl=en', NULL, 'https://www.facebook.com/waterfordestate/', 'Waterford Estate is situated in the Blaauwklippen Valley on the rolling slopes of the Helderberg Mountain. It is this mountain range that gives our Waterford Estate wines their unique character and sense of place.', 4, 4),
(14, 'Spier Wine Farm', 'https://www.spier.co.za/assets/images/logo.png', 'https://www.spier.co.za/', '9:00:00', '16:00:00', '9:00:00', '16:00:00', 'https://www.instagram.com/spierwinefarm/?hl=en', NULL, 'https://www.facebook.com/spierwinefarm/', 'Established in 1692, Spier is one of South Africa’s oldest – and most accoladed – family-owned working wine farms. The farm’s philosophy is centred on genuine respect for the land and a desire to express the exceptional Cape terroir.\r\n\r\nSpier’s Growing for Good initiatives empower communities to create positive social and environmental change. From art and entrepreneurship to regenerative farming, Spier aims to reach a net zero-aligned carbon emission target by 2030. The winery produces six ranges of award-winning wines and is a WWF Conservation Champion and a Wine Industry Ethical Trade Associations (WIETA) member. Spier is FSSC 22000, organically certified, and holds a Control Union Vegan Standard certification.', 5, 4),
(15, 'Jordan Wine Estate', 'https://www.jordanwines.com/wp-content/uploads/2020/09/jordan-logo-white.png', 'https://www.jordanwines.com/', '8:00:00', '16:30:00', '8:00:00', '16:30:00', 'https://www.instagram.com/jordan_wines/?hl=en', NULL, 'https://www.facebook.com/jordanwines/', 'South African roots. Worldwide acclaim. Gary and Kathy Jordan have been making world-class wines since 1993 on a farm with a history going back over 300 years. Gary\'s parents, Ted and Sheelagh, bought the 146-hectare Stellenbosch property in 1982, and embarked on an extensive replanting programme, specializing in classic varieties suited to the different soils and slopes. From the Jordan hillside vineyards one has spectacular panoramic views of Table Mountain, False Bay and Stellenbosch.', 5, 4),
(16, 'Thelema Mountain Vineyards', 'https://www.thelema.co.za/wp-content/uploads/2019/06/facebook.v1.png', 'https://www.thelema.co.za/', '9:00:00', '17:00:00', '10:00:00', '15:00:00', 'https://instagram.com/ThelemaWines', 'https://twitter.com/ThelemaWines', 'https://www.facebook.com/ThelemaWines', 'François Rabelais was a monk, doctor and writer in sixteenth-century France who imagined a utopian abbey on the banks of the Loire. In stark contrast to the religious orders of his day, this community admitted both men and women and encouraged them to live together in great luxury. Only one law governed its members: “Fay ce que vouldras” – Do what thou wilt!\r\n\r\nThis was the Abbey of Thélème, which ultimately lent its name to our vineyard on the slopes of the Simonsberg Mountain: Thelema.\r\n\r\n“Rabelaisian” is defined as “displaying earthy humour; bawdy,” and Rabelais spent a lot of time thinking and writing about wine. Among his more memorable quotes were “Wine is the most civilised thing on earth” and “Never did a great man hate good wine,” so it is only fitting that we name our flagship wine after him.', 6, 4),
(17, 'Boschendal Estate', 'https://boschendal.com/wp-content/uploads/2022/09/logo.png', 'https://boschendal.com/', '9:00:00', '17:00:00', '9:00:00', '17:00:00', 'https://www.instagram.com/boschendal/?_ga=2.222682779.1470328624.1663239167-1295498435.1662541255', NULL, 'https://www.facebook.com/boschendal/?_ga=2.222682779.1470328624.1663239167-1295498435.1662541255&_rdc=2&_rdr', 'Boschendal (Dutch for bush and dale) is one of the oldest Wine Estates in South Africa and is located between Franschhoek and Stellenbosch in South Africa’s Western Cape.This Iconic wine farm is nestled in one of the most picturesque valleys in the Cape Winelands. With a winemaking tradition spanning over 330 years, Boschendal Wine Estate offers a veritable treat for wine lovers everywhere.\r\n\r\nAt Boschendal we believe wine is made in the vineyards. We take the utmost care to find specific terroir driven sites best suited for our cultivars. We have made it our priority to embrace sustainability techniques across both our farm and cellar practices in order to retain the country’s exceptional biodiversity and to empower the teams that work within it.\r\n\r\nAt Boschendal teamwork is essential. We all strive for the same goal which is creating exceptional, memorable wines. When you drink a glass of Boschendal we want you to taste the view, taste the lifestyle and taste excellence. We strive for perfection and aspire to always improve.\r\n\r\n2021 marks 40 years of Cap Classique sparkling wine production on Boschendal, the first Boschendal Brut having been made in 1981 by Achim van Arnim, then the cellarmaster on the estate and considered one of the pioneers of Cap Classique.', 4, 5),
(18, 'Stellenbosch Vineyards', 'https://stellenboschvineyards.co.za/wp-content/uploads/2021/03/Stellenbosch-Vineyards-logo_blue-bg.png', 'https://stellenboschvineyards.co.za/', '10:00:00', '17:00:00', '10:00:00', '17:00:00', 'https://www.instagram.com/stellenboschvineyards/?hl=en', 'https://twitter.com/stbvineyards?lang=en', 'https://www.facebook.com/StellenboschVineyards/', 'Situated on the Welmoed farm, one of the first proclaimed farms in the Stellenbosch district that dates back to 1690, Stellenbosch Vineyards is a leading wine producer and exporter that’s passionate about wine, committed to our partnerships and proud of our rich heritage. Celebrated internationally for our exceptional brands and pioneering performance, we work in partnership with our customers to produce innovative, branded and private label products. Exporting 85% of our products, we serve a selection of customers within the FMCG and wine sales sector.\r\nStellenbosch Vineyards is now entering a new and exciting period in our journey to celebrate our deep heritage. Our strategic intent and brand promise is reflected in our updated corporate identity and reestablished Stellenbosch Vineyards Collection of Fine Wines.', 6, 4),
(19, 'Bouchard Finlayson Winery', 'https://dj52908b123td.cloudfront.net//media/n0an5mxf/bouchard-finlayson-logo-vector.png?width=238&height=102&anchor=center&mode=crop&rnd=132665027062100000&scale=both&format=webp', 'https://bouchardfinlayson.co.za/', '9:00:00', '16:30:00', '9:00:00', '16:00:00', 'https://www.instagram.com/bouchardfinlayson/', 'https://twitter.com/BouchFinlayson', 'https://www.facebook.com/BouchardFinlayson', 'Cradled amid the hills of the Hemel-en-Aarde (Heaven and Earth) valley,\r\nBouchard Finlayson is widely acclaimed as one of South Africa’s leading boutique wine cellars.\r\n\r\nWith a terroir defined by both ancient soils and a cool maritime climate, the vineyards of Bouchard Finlayson are famous for producing award-winning\r\nPinot Noir, elegant Chardonnay and terroir-driven Sauvignon Blanc, while inspired blends showcase the depth of skill and innovation in our winemaking team.\r\n\r\nThe Bouchard Finlayson cellar is conveniently located a scenic 90 minutes’ drive from Cape Town, close to the world-famous whale-watching centre of Hermanus.', 1, 20),
(20, 'Tokara Estate', 'https://i0.wp.com/www.tokara.com/wp-content/uploads/2022/07/Tokara-Logo-1.0-3.png?fit=257%2C170&ssl=1', 'https://www.tokara.com/', '10:00:00', '18:00:00', '10:00:00', '18:00:00', 'https://www.instagram.com/eatokara/?hl=en', NULL, 'https://www.facebook.com/TokaraWines/', 'TOKARA is a picture perfect destination which offers visitors a unique combination of award-winning wines, brandy and olive oils, a gallery of fine art, a restaurant featuring one of South Africa’s leading chefs as well as a delicatessen.', 4, 4),
(21, 'V. Sattui Winery', 'https://www.vsattui.com/wp-content/uploads/2022/03/logo-vsattui-home_header.svg', 'https://www.vsattui.com/', '9:00:00', '18:00:00', '9:00:00', '18:00:00', 'https://www.instagram.com/vsattui/?hl=en', 'https://twitter.com/vsattui', 'https://www.facebook.com/vsattui1885', 'V. Sattui Winery is a family-owned property located in the heart of Napa Valley, which was founded in 1885 and makes more than 60 different wines with dozens of 90+ point rated wines among its current vintages. It is a stunning, must-see Napa Valley destination for picnics, weddings and events, offering an impressively robust Cheese Shop with more than 200 selections, an excellent Deli directed by Chef Gerardo Sainato, and a Salumeria directed by Stefano Masanti. The sprawling estate includes two-dozen picnic tables nestled beneath ancient Valley Oak trees and tri-level terraces that overlook beautifully manicured gardens and vineyards.', 6, 35),
(22, 'Tenuta Torciano', 'https://www.torciano.com/img/layout/logo_small.png', 'https://www.torciano.com/en/', '9:00:00', '21:00:00', '9:00:00', '21:00:00', 'https://www.instagram.com/torcianowinery/?hl=en', 'https://twitter.com/torcianowinery?lang=en', 'https://www.facebook.com/tenuta.torciano/', 'Tenuta Torciano Winery is the Italian winery Giachi\'s family represents world luxury italian wines, italian heritage and italian style. In the Tuscan Chianti hills, welcomes you in its extensive wine cellar furnished with Tuscan lines, made from the finest materials and furniture of prestige, surrounded by green hills covered with vineyards, olive groves and oak wood and with magnificent views of the Towers of San Gimignano This stylish cellar restaurant is fully dedicated in every day of the year, to his majesty the wine and wine tasting, while having the opportunity to have lunch and dinner simple and genuine food in the vineyard. The menu a la carte has some nice dishes carefully selected meats and cheeses, fresh pasta and tortellini and ravioli prepared by the chef. The Team organizes tasting of fine wines in private spaces, beautiful cellars which more 200 references, enough to delight the pleasures of Bacchus lovers! This winery organizes many activities such as wine tasting courses, or tour of wine, pasta courses, truffle hunting. This winery is not like of the others, come to find out without delay!', 3, 1),
(23, 'Vivanco', 'https://vivancoculturadevino.es/img/logo_completo_w_en.png', 'https://vivancoculturadevino.es/en/', '10:00:00', '18:00:00', '10:00:00', '18:00:00', NULL, NULL, 'https://www.facebook.com/VivancoWines/', 'VIVANCO IS MUCH MORE THAN EXPERIENCES We seek to transport you to a new universe of sensations where the wine takes centre stage. 9,000 m2 of emotions and activities around culture, art, cuisine, flavour and fun. The meeting point between knowledge and the enjoyment of wine. Today at Vivanco we understand wine as a way of life from an innovative, energy-filled perspective, offering you a unique, exclusive experience around the Culture of Wine. Winery, Foundation and Experiences are a faithful reflection of the commitment of the Vivanco family to \"giving back to wine what wine has given us\", which we invite you to discover.', 4, 36),
(24, 'Turkey Flat', 'https://www.turkeyflat.com.au/dist/logos/website/logo-menu.svg', 'https://www.turkeyflat.com.au/wines', '11:00:00', '17:00:00', '11:00:00', '17:00:00', 'https://www.instagram.com/turkeyflat/?hl=en', NULL, 'https://m.facebook.com/profile.php?id=108627542492673', 'Our name derives from the Prussian settlers of Bethany and Langmeil in the early 1840s.  They noticed that a large native bird frequented the rich flats located here towards the lower end of the Tanunda Creek.  They called the site ‘Turkey Flat’ as a result. The bird was no turkey: it was Ardeotis australis, or the Plains Bustard, which is sadly rarely seen now.  We recognise the significance of the bird and the original landscape it came here for through the artwork on our label.  The same landscape supports our vines and gives us the means to make unique, character-filled fine wine.\r\n\r\n\r\n\r\nShiraz was first planted at Turkey Flat in 1847 by Johann Fiedler.  Fiedler was one of the first Prussian Lutherans to make wine in the Barossa. He was noted for his early efforts to experiment with grape varietals to test the viticultural viability of the new settlement.  A journalist visiting Turkey Flat in 1851 notes that an experimental vineyard of 72 varieties had been planted to identify what was suited to the environment.\r\n\r\n\r\n\r\nThe Schulz family have been custodians of Turkey Flat since the 1860s.  They have continued with the legacy laid down by Fiedler to grow vines and make wines that suit the landscape conditions.\r\n\r\n\r\n\r\nToday Christie Schulz is the fourth generation of the Schulz family to become caretaker of this remarkable estate. Extensive viticultural research has been undertaken in the vineyards, allowing Christie and her team to sensitively blend traditional Rhône varietals which speak confidently of their origin, with the 1847 Shiraz vines some of the oldest in Australia the centre piece of our family-owned estate, playing a vital role on the Barossa Valley’s rich cultural heritage.\r\n\r\n\r\n\r\nWe aim to optimise ecological systems rather than treat our vineyards as a monoculture. Using natural influences to control both vegetative growth and yield is central to this. Our approach to vineyard management is one that seeks to operate within the local ecosystems instead of in competition with them. This is why our vineyards survive on natural rainfall and we now boast permanent cover crops in all our vineyards which shift the vineyard from a monoculture to a managed ecosystem.  Mixtures of self-seeding medics, native grass and sub-clover have proven to be most successful cover crops within our vineyards. The native grass grows quickly at the turn of winter, suppressing undesirable weeds whilst the medics and sub-clovers prosper in late winter/spring.  They naturally fix nitrogen from the atmosphere and provide further weed suppression from spring rains. In tandem they are carbon and nitrogen positive and create a layered and biodiverse soil structure.  Their root systems open up the soil, reversing the symptoms of compaction. Permanent cover-crops require far less tractor work, reducing our diesel use and carbon footprint. We do not cultivate at Turkey Flat, rather we roll our cover crops in spring. This protects the soil from both wind and water erosion.\r\n\r\n\r\n\r\nAll aspects of Turkey Flat Vineyards are committed to reducing our environmental footprint, harvesting all our rainwater for use in the winery and solar panels to provide the main source of power. We will continue to expand our vision of a truly sustainable agricultural business, which operates as a functional and not just a consumptive part of the ecosystems we occupy. Turkey Flat consistently delivers award winning wines of great integrity showcasing just how exciting the Barossa Valley and its complexities of evolution and history can be.', 5, 37);

-- --------------------------------------------------------

--
-- Table structure for table `business_reviews`
--

CREATE TABLE `business_reviews` (
  `Business_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Rating` int(11) NOT NULL,
  `Comment` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business_reviews`
--

INSERT INTO `business_reviews` (`Business_ID`, `User_ID`, `Rating`, `Comment`) VALUES
(1, 3, 4, 'Wow, this place is fantastic! The wine selection is excellent, and the staff is knowledgeable and friendly. I highly recommend trying their red blends.'),
(1, 5, 5, 'I can\'t say enough good things about this winery. The atmosphere is cozy, the wines are superb, and the owner is passionate about his craft. A must-visit!'),
(2, 1, 4, 'I enjoyed my visit to this winery. The wines were tasty, especially their Chardonnay. The outdoor seating area provided a lovely view of the vineyard.'),
(2, 4, 3, 'Decent wines, but the service was a bit lacking. The staff seemed distracted and inattentive. The ambiance is nice though.'),
(3, 2, 5, 'What an incredible experience! The vineyard is stunning, and the wine tasting was superb. The staff went above and beyond to make us feel welcome.'),
(3, 5, 4, 'This winery has a great selection of wines, and the tasting room is elegant. The staff was friendly and knowledgeable, making the visit enjoyable.'),
(4, 1, 3, 'The winery has a beautiful location, but the wines were average at best. The customer service was friendly, though, and they have a nice patio.'),
(4, 3, 2, 'I was disappointed with my visit to this winery. The wines lacked complexity, and the staff was not very attentive. Not my favorite.'),
(5, 2, 4, 'This winery exceeded my expectations. The wines were exceptional, and the staff was friendly and knowledgeable. I can\'t wait to visit again!'),
(5, 4, 5, 'What a gem of a winery! The wines here are outstanding, especially the Cabernet Sauvignon. The staff is passionate and provides excellent recommendations.'),
(6, 1, 4, 'I had a great time at this winery. The wines were delicious, especially the Pinot Noir. The staff was friendly and provided informative tastings.'),
(6, 5, 5, 'This winery is a hidden gem! The wines are top-notch, and the staff is knowledgeable and welcoming. Don\'t miss their sparkling wine.'),
(7, 3, 3, 'The wines at this winery were just okay. Nothing stood out as exceptional, but the staff was friendly and helpful.'),
(7, 4, 4, 'I enjoyed my visit to this winery. The wines were good, and the tasting room had a nice ambiance. The staff was friendly and attentive.'),
(8, 1, 5, 'This winery is a must-visit! The wines are exceptional, and the staff is friendly and passionate. The vineyard views are breathtaking.'),
(8, 2, 5, 'I can\'t recommend this winery enough. The wines are outstanding, and the staff is incredibly knowledgeable. The tasting experience was top-notch.'),
(9, 3, 4, 'The wines at this winery were quite good. I particularly enjoyed their Merlot. The staff was friendly and provided great service.'),
(9, 5, 3, 'I had an average experience at this winery. The wines were decent, but nothing stood out. The staff was friendly, though, and the location is lovely.'),
(10, 4, 5, 'This winery is a hidden gem! The wines are exceptional, and the staff is friendly and knowledgeable. I can\'t wait to visit again'),
(10, 6, 5, 'Wow wow wow! I love this place so much I want to get married here!'),
(10, 15, 4, 'Wow, such a great business! The wines are outstanding, and the staff is knowledgeable and friendly. Highly recommended.'),
(10, 16, 5, 'I had an amazing experience at this winery. The ambiance is delightful, and the wines are top-notch. Don\'t miss their Cabernet Sauvignon.'),
(11, 12, 3, 'This winery has a decent selection of wines, but the service could be improved. The staff seemed a bit disorganized. Average experience overall.'),
(11, 14, 4, 'I enjoyed my visit to this winery. The wines were delicious, especially their Pinot Noir. The staff was attentive and provided insightful recommendations.'),
(12, 11, 4, 'Had a wonderful time at this winery. The wines were exceptional, particularly the Chardonnay. The atmosphere was charming, and the staff was welcoming.'),
(12, 18, 5, 'What a hidden gem! This winery surpassed my expectations. The wines were outstanding, and the staff was friendly and knowledgeable. Will definitely return!'),
(13, 17, 2, 'Unfortunately, I was disappointed with this winery. The wines were below expectations, and the service was lacking. Not recommended.'),
(13, 20, 3, 'This winery has a beautiful location, but the wines didn\'t meet my expectations. The staff was friendly, but overall experience was average.'),
(14, 13, 5, 'Wow! This winery is a must-visit. The wines are absolutely superb, and the staff is incredibly knowledgeable. The vineyard views are breathtaking.'),
(14, 19, 4, 'Had an incredible time at this winery. The wines were exceptional, especially their Merlot. The staff was friendly and provided excellent service.'),
(15, 10, 4, 'Highly recommend this winery. The wines were delicious, particularly the Syrah. The staff was friendly and provided a great tasting experience.'),
(15, 12, 5, 'This winery is outstanding! The wines are top-notch, and the staff is knowledgeable and welcoming. Don\'t miss their sparkling wine.'),
(16, 14, 4, 'Enjoyed my visit to this winery. The wines were good, and the tasting room had a nice ambiance. The staff was friendly and attentive.'),
(16, 16, 3, 'The wines at this winery were decent, but nothing stood out. The staff was friendly and helpful. Average experience overall.'),
(17, 11, 5, 'I can\'t recommend this winery enough. The wines are outstanding, and the staff is incredibly knowledgeable. The tasting experience was top-notch.'),
(17, 20, 5, 'This winery is a must-visit! The wines are exceptional, and the staff is friendly and passionate. The vineyard views are breathtaking.'),
(18, 13, 4, 'The wines at this winery were quite good. I particularly enjoyed their Merlot. The staff was friendly and provided great service.'),
(18, 19, 3, 'Had an average experience at this winery. The wines were decent, but nothing stood out. The staff was friendly, though, and the location is lovely.'),
(19, 15, 5, 'This winery is a hidden gem! The wines are exceptional, and the staff is friendly and knowledgeable. Can\'t wait to visit again!'),
(19, 17, 4, 'I had a fantastic time at this winery. The wines were delicious, and the staff went above and beyond to make our visit memorable.'),
(20, 10, 3, 'The wines at this winery were decent, but nothing extraordinary. The staff was friendly, but the overall experience was average.'),
(20, 14, 4, 'I had a great experience at this winery. The wines were excellent, especially their Cabernet Sauvignon. The staff was friendly and provided great recommendations.'),
(21, 1, 4, 'Wow, such a great business! The wines are outstanding, and the staff is knowledgeable and friendly. Highly recommended.'),
(21, 2, 5, 'I had an amazing experience at this winery. The ambiance is delightful, and the wines are top-notch. Don\'t miss their Cabernet Sauvignon.'),
(22, 3, 3, 'This winery has a decent selection of wines, but the service could be improved. The staff seemed a bit disorganized. Average experience overall.'),
(22, 4, 4, 'I enjoyed my visit to this winery. The wines were delicious, especially their Pinot Noir. The staff was attentive and provided insightful recommendations.'),
(23, 5, 5, 'What a hidden gem! This winery surpassed my expectations. The wines were outstanding, and the staff was friendly and knowledgeable. Will definitely return!'),
(23, 6, 4, 'Had a wonderful time at this winery. The wines were exceptional, particularly the Chardonnay. The atmosphere was charming, and the staff was welcoming.'),
(24, 7, 2, 'Unfortunately, I was disappointed with this winery. The wines were below expectations, and the service was lacking. Not recommended.'),
(24, 8, 3, 'This winery has a beautiful location, but the wines didn\'t meet my expectations. The staff was friendly, but the overall experience was average.');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `BusinessID` int(11) NOT NULL,
  `EventID` int(11) NOT NULL,
  `Description` longtext NOT NULL,
  `Name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`BusinessID`, `EventID`, `Description`, `Name`) VALUES
(1, 1, 'Housed in an old horse stable, built in the late 1800s and an extension completed in 2017, the restaurant has a verandah stepping out onto an open lawn overlooking the Middelvlei dam.', 'Middelvlei Celebrations at Boerebraai Restaurant'),
(1, 2, 'The Wine Barn at Middelvlei is the ideal venue for a conference, conveniently located only 4 km from the Stellenbosch town centre.', 'Middelvlei Conferences'),
(1, 3, 'Beautiful views, food and wine for your special day. Middelvlei has it all and best of all, we have a Wine Barn filled with charm.', 'Wine & Wedding'),
(2, 4, 'The Kleine Zalze Wine Tasting center is situated between the winery on the one side and the restaurant on the other. You can pick from a wide selection of wine tasting options, depending on your preferences . Our knowledgeable wine advisors will be on hand to take you through your selection of our award winning wines in our tranquil setting under the vines or the oaks in summer or inside in winter.', 'Kleine Zalze Tasting Room'),
(4, 5, 'The tasting room of Mullineux & Leeu Family Wines, called The Wine Studio, is on Leeu Estates in Franschhoek. It was designed by eminent Spanish Architect, Tomeu Esteva, who wanted to create the ultimate environment in which to taste fine wines.', 'Mullineux & Leeu Family Wines Tastings'),
(5, 6, 'Franschhoek Cellar has an attentive and professional events team that will see to your every nuptial need, ensuring a stress-free wedding that is marked by warm hospitality, delicious food and wine, and vintage memories. This is where elegant, modern facilities meet the romance and charm of wine country life.', 'Franschhoek Weddings'),
(6, 7, 'Experience the relaxed luxury of a conference in the Franschhoek Winelands. With our central location in the heart of the Cape Winelands, only a short, scenic drive from Cape Town, we are conveniently located to host your event in the tranquillity of the country while still close to urban amenities. We offer half and full day conference packages which include venue hire and set-up, standard conference equipment and exquisite catering.', 'Franschhoek Conferences'),
(6, 8, 'A match made in our haven. Dark Belgian chocolate handcrafted by our local chocolatier and carefully selected by our winemaker to complement each of the decadent La Bri wines.', 'La Bri Wine Estate Wine Tasting');

-- --------------------------------------------------------

--
-- Table structure for table `favourite_business`
--

CREATE TABLE `favourite_business` (
  `UserID` int(11) NOT NULL,
  `BusinessID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favourite_business`
--

INSERT INTO `favourite_business` (`UserID`, `BusinessID`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(2, 1),
(2, 2),
(3, 1),
(3, 3),
(4, 4),
(4, 5),
(4, 6),
(5, 4),
(5, 5),
(6, 4),
(6, 5),
(6, 6),
(11, 1),
(11, 2),
(12, 1),
(13, 1),
(14, 4),
(14, 5),
(14, 6),
(15, 5),
(15, 6),
(16, 4);

-- --------------------------------------------------------

--
-- Table structure for table `favourite_wine`
--

CREATE TABLE `favourite_wine` (
  `WineID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favourite_wine`
--

INSERT INTO `favourite_wine` (`WineID`, `UserID`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 2),
(3, 1),
(3, 3),
(4, 4),
(4, 6),
(5, 4),
(6, 4),
(6, 6),
(7, 1),
(7, 2),
(8, 12),
(9, 1),
(10, 2),
(10, 12),
(11, 1),
(11, 2),
(12, 1),
(13, 1),
(13, 5),
(14, 4),
(14, 6),
(15, 6),
(16, 4),
(17, 1),
(17, 2),
(18, 1),
(19, 2),
(19, 4),
(20, 1),
(20, 19),
(36, 25),
(41, 5),
(42, 5),
(43, 5),
(43, 26),
(94, 5),
(107, 5);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`UserID`) VALUES
(1),
(3),
(4),
(5),
(6);

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `Region_ID` int(11) NOT NULL,
  `Country` varchar(45) NOT NULL,
  `RegionName` varchar(45) NOT NULL,
  `Latitude` varchar(45) DEFAULT NULL,
  `Longitude` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`Region_ID`, `Country`, `RegionName`, `Latitude`, `Longitude`) VALUES
(1, 'Italy', 'Tuscany', '43.771100', '11.248600'),
(2, 'Italy', 'Piedmont', '45.052200', '7.515400'),
(3, 'Italy', 'Veneto', '45.441500', '12.315300'),
(4, 'South Africa', 'Stellenbosch', '-33.932106', '18.860151'),
(5, 'South Africa', 'Franschhoek', '-33.897500', '19.152300'),
(6, 'South Africa', 'Paarl', '-33.734200', '18.962100'),
(7, 'South africa', 'Cape town', '-33.924900', '18.424100'),
(8, 'South africa', 'Cape town', NULL, NULL),
(9, 'South africa', 'Cape town', NULL, NULL),
(10, 'South africa', 'Cape town', NULL, NULL),
(11, 'South africa', 'Cape town', NULL, NULL),
(12, 'South africa', 'Cape town', NULL, NULL),
(13, 'South africa', 'Cape town', NULL, NULL),
(14, 'South africa', 'Cape town', NULL, NULL),
(15, 'South africa', 'Cape town', NULL, NULL),
(16, 'South Africa', 'Clare Valley', '-33.833600', '138.610000'),
(17, 'South Africa', 'Constantia', '-34.025800', '18.423100'),
(18, 'South Africa', 'Coonawarra', '-37.291600', '140.833600'),
(19, 'South Africa', 'Somerset West', '-34.075700', '18.843300'),
(20, 'South Africa', 'Hermanus', '-34.38169', '19.24192'),
(28, 'South', 'Fransch', NULL, NULL),
(29, 'South Africa', 'Fransch', NULL, NULL),
(30, 'South africa', 'Pretoria', '-25.747900', '28.229300'),
(33, 'South africa', 'Johannesburg', NULL, NULL),
(35, 'United States of America', 'Napa Valley', '38.5025', '122.2654'),
(36, 'Spain', 'Rioja', '42.2871', '2.5396'),
(37, 'Australia', 'Barossa Valley', '-34.531418', '138.95827');

-- --------------------------------------------------------

--
-- Table structure for table `tourist`
--

CREATE TABLE `tourist` (
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tourist`
--

INSERT INTO `tourist` (`UserID`) VALUES
(2),
(7),
(8),
(9),
(10),
(11),
(12),
(13),
(14),
(15),
(16),
(17),
(18),
(19),
(20);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `First_name` varchar(128) NOT NULL,
  `Middle_name` varchar(128) DEFAULT NULL,
  `Last_name` varchar(128) NOT NULL,
  `Region_id` int(11) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(256) NOT NULL,
  `API_Key` varchar(45) NOT NULL,
  `PhoneNumber` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `First_name`, `Middle_name`, `Last_name`, `Region_id`, `Password`, `Email`, `API_Key`, `PhoneNumber`) VALUES
(1, 'Testing', 'Grace', 'Anderson', 5, '7G83hB9e5N', 'emily.anderson@example.com', '7G83hB9e5N', '+1 555-123-4567'),
(2, 'Jacob', 'Alexander', 'Smith', 4, 'X6rLk0Q1uW', 'jacob.smith@example.com', '7G83hB9e5N', '+44 20 1234 5678'),
(3, 'Olivia', 'Rose', 'Johnson', 4, '2vC5dY9a4I', 'olivia.johnson@example.com', '7G83hB9e5N', '+49 1234 567890'),
(4, 'Ethan', 'James', 'Thompson', 5, 'P3mJk6N9o2', 'ethan.thompson@example.com', '7G83hB9e5N', '+61 2 1234 5678'),
(5, 'Ava', 'Elizabeth', 'Wilson', 5, '$argon2i$v=19$m=65536,t=4,p=1$SzBmMDVsZ242Qk4yUUxpMw$HxuDXgYUkRpT/4OMUByEUnMEJwjJH1aB7Sgw012Npgw', 'ava.wilson@example.com', '7G83hB9e5N', '+33 1 23 45 67 89'),
(6, 'Liam', 'Michael', 'Davis', 5, 'A5iG8lO9pT', 'liam.davis@example.com', '7G83hB9e5N', '+39 02 1234 5678'),
(7, 'Sophia', 'Marie', 'Taylor', 6, 'D4cN7uB0vE', 'sophia.taylor@example.com', '7G83hB9e5N', '+81 3 1234 5678'),
(8, 'Noah', 'Benjamin', 'Robinson', 6, 'H2xY1mK3nI', 'noah.robinson@example.com', '7G83hB9e5N', '+55 11 1234-5678'),
(9, 'Isabella', 'Grace', 'Martinez', 6, 'W8eR4yT1oL', 'isabella.martinez@example.com', '7G83hB9e5N', '+34 91 234 56 78'),
(10, 'Benjamin', 'Thomas', 'Anderson', 6, 'F9nI5kG3jD', 'benjamin.anderson@example.com', '7G83hB9e5N', '+61 8 8765 4321'),
(11, 'Elijah', 'Samuel', 'Harris', 4, '5gW7dHjK9L', 'elijah.harris@example.com', '7G83hB9e5N', '+1 555-987-6543'),
(12, 'Charlotte', 'Grace', 'Thompson', 4, 'R2sT4yU6vQ', 'charlotte.thompson@example.com', '7G83hB9e5N', '+44 20 8765 4321'),
(13, 'Henry', 'Alexander', 'Davis', 4, 'P8bN6mJ3kX', 'henry.davis@example.com', '7G83hB9e5N', '+49 1234 5678910'),
(14, 'Emma', 'Rose', 'Carter', 5, 'P8bN6mJ3kX', 'emma.carter@example.com', '7G83hB9e5N', '+61 2 3456 7890'),
(15, 'Sebastian', 'Jameson', 'Wright', 5, 'A3nB6mG4pD', 'sebastian.wright@example.com', '7G83hB9e5N', '+33 1 2345 6789'),
(16, 'Sophie', 'Elizabeth', 'Phillips', 5, 'S6tY8hN1wZ', 'sophie.phillips@example.com', '7G83hB9e5N', '+39 02 9876 5432'),
(17, 'Nathan', 'Benjamin', 'Wilson', 6, 'D4eF9cR2vG', 'nathan.wilson@example.com', '7G83hB9e5N', '+81 3 4567 8901'),
(18, 'Ava', 'Sophia', 'Mitchell', 6, 'H2uT7kL5mP', 'ava.mitchell@example.com', '7G83hB9e5N', '+55 11 7890-1234'),
(19, 'Caleb', 'Michael', 'Anderson', 6, 'W9xR4yU1oT', 'caleb.anderson@example.com', '7G83hB9e5N', '+34 91 234 5678'),
(20, 'Isabella', 'Grace', 'Roberts', 6, 'F7nI2kG8jD', 'isabella.roberts@example.com', '7G83hB9e5N', '+61 8 7654 3210'),
(21, 'Jack', 'B', 'Pat', 7, '$argon2i$v=19$m=65536,t=4,p=1$RFY2eFc3dlN6TDhQWXBMUQ$uJNHGZkjEygvf1uVX5mB8VkXGHJgP66zlSAeZpyniF8', 'hambone@gmail.com', '4e4a8c-0a85dd-58ee1c-fcd1d9-c29cc7-51', '0845819018'),
(22, 'Jack', 'B', 'Pat', 7, '$argon2i$v=19$m=65536,t=4,p=1$NXNkbGZROTBjcE9qRDN1Mw$Q7Tn4acobT4ZmdCdUipxZc9xfqMP48lYjoXIVwNeVJE', 'hambone2@gmail.com', 'b2d67e-e8d045-2554d0-b4659c-4f2314-d0', '0845819018'),
(23, 'Himan', 'H', 'Heniz', 7, '$argon2i$v=19$m=65536,t=4,p=1$bDRzNGtCRE0wamhnRWkySg$ZJOHoiRdbLFd8e5j5Lg6VOovvpergVN5EvZIXXzwZM0', 'hambone3@gmail.com', '4d348a-8c5366-87d446-07194c-dfc6f9-dd', '0845819018'),
(24, 'Emily', 'Grace', 'Anderson', 4, '7G83hB9e5N', 'emily.anderson@example.com', '7G83hB9e5N', '+1 555-123-4567'),
(25, 'Kyle', 'H', 'Lowry', 30, '$argon2i$v=19$m=65536,t=4,p=1$SzBmMDVsZ242Qk4yUUxpMw$HxuDXgYUkRpT/4OMUByEUnMEJwjJH1aB7Sgw012Npgw', 'lowry@gmail.com', 'ca6d6c-4b6199-6248e4-ef1eae-5cc5fb-8e', '01234500014'),
(26, 'Troy', 'A', 'Clark', 33, '$argon2i$v=19$m=65536,t=4,p=1$eWdGQlhTOHNsL2lqaDVtSg$Pj4fpLi/9MBxSTHJOFOpJ3EfN3mK82NpLxE5Mr6qWZI', 'troy12772tesv@gmail.com', '0b15ee-ac7cc8-499aeb-147cb4-1b7aa8-67', '0607794960');

-- --------------------------------------------------------

--
-- Table structure for table `wine`
--

CREATE TABLE `wine` (
  `WineID` int(11) NOT NULL,
  `Name` varchar(300) NOT NULL,
  `Wine_URL` varchar(300) NOT NULL,
  `Body` varchar(45) NOT NULL,
  `Alcohol` double NOT NULL,
  `Tannin` varchar(45) NOT NULL,
  `Acidity` float NOT NULL,
  `Sweetness` varchar(45) NOT NULL,
  `Producer` varchar(45) NOT NULL,
  `Vintage` varchar(45) NOT NULL,
  `Volume` varchar(45) NOT NULL,
  `Cultivars` varchar(45) NOT NULL,
  `Category` varchar(45) NOT NULL,
  `Description` longtext NOT NULL,
  `Cost_per_bottle` decimal(45,2) NOT NULL,
  `Price_Category` varchar(45) NOT NULL,
  `Business_ID` int(11) NOT NULL,
  `Cost_per_glass` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wine`
--

INSERT INTO `wine` (`WineID`, `Name`, `Wine_URL`, `Body`, `Alcohol`, `Tannin`, `Acidity`, `Sweetness`, `Producer`, `Vintage`, `Volume`, `Cultivars`, `Category`, `Description`, `Cost_per_bottle`, `Price_Category`, `Business_ID`, `Cost_per_glass`) VALUES
(1, 'Lamoreaux Landing Wine Cellars Chardonnay', 'https://vinepair.com/wp-content/uploads/2023/04/btb-chardonnay-2023-louis-jadot-macon-villages-internal.jpg', 'full-bodied', 12.6, 'high', 3.12, 'Medium', 'Middelvlei Wine Estate', '2017', '750 ml', 'Cabernet Sauvignon', 'white', 'The Finger Lakes knows how to give a lean Chardonnay some depth. The acidity in the wine is high (typical for cool-climate wines), but it is rounded out with an unctuous mouthfeel . There is a hint of tannin in the background that adds structure.', '327.00', 'Premium', 1, '98.10'),
(2, 'Billsboro Winery Chardonnay', 'https://vinepair.com/wp-content/uploads/2023/04/btb-chardonnay-2023-billsboro-winery-chardonnay-internal.jpg', 'full-bodied', 12.3, 'high', 3.1, 'Medium', 'Middelvlei Wine Estate', '2018', '750 ml', 'Cabernet Sauvignon', 'white', 'It’s lean. It’s deep. It’s in the in-between. There is ample acidity here in that cool-climate vibe but the depth on the palate gives that high tone a run for its money.', '327.00', 'Premium', 1, '98.10'),
(3, 'Blenheim Vineyards Chardonnay', 'https://vinepair.com/wp-content/uploads/2023/04/btb-chardonnay-2023-blenheim-vineyards-chardonnay-internal.jpg', 'full-bodied', 12.2, 'high', 3.6, 'Medium', 'Middelvlei Wine Estate', '2015', '750 ml', 'Cabernet Sauvignon', 'white', 'Guys, Virginia is not playing. And Blenheim isn’t either. This Chardonnay is so damn earthy with some deep honey notes winding through the fruit. The thick, palate-coating mouthfeel is lifted by wonderful acidity, allowing you to enjoy the weight and the refreshment all at once.', '4347.00', 'Luxury', 1, '1304.10'),
(4, 'Boschkloof Chardonnay', 'https://vinepair.com/wp-content/uploads/2023/04/btb-chardonnay-2023-boschkloof-chardonnay-bottle-shot-charlotte-alsaadi-internal.jpg', 'full-bodied', 12, 'high', 3.4, 'Medium', 'Middelvlei Wine Estate', '2013', '750 ml', 'Cabernet Sauvignon', 'white', 'A lot of stainless steel and a little bit of oak was the approach to this bright and lively wine with soft edges. The little bit of wood comes through in texture more than aroma and that is a win. This is a no-brainer on the casual wine front.', '366.00', 'Premium', 1, '109.80'),
(5, 'Weingut Franz & Christine Netzl Chardonnay', 'https://vinepair.com/wp-content/uploads/2023/04/btb-chardonnay-2023-weingut-franz-christine-netzl-chardonnay-internal.jpg', 'full-bodied', 12.1, 'high', 3.5, 'Medium', 'Middelvlei Wine Estate', '2016', '750 ml', 'Cabernet Sauvignon', 'white', 'This is not the Chardonnay you are used to. And that’s great because this grape has multiple personalities. Here, it is all blazing acidity, blooming with ripe, round, and unoaked(?) fruit. This is so a crowd-pleasing case-buy.', '1385.00', 'Luxury', 1, '415.50'),
(6, 'Wente Vineyards Riva Ranch Chardonnay', 'https://vinepair.com/wp-content/uploads/2023/04/btb-chardonnay-2023-wente-riva-ranch-chardonnay-2019-internal.jpg', 'full-bodied', 12.5, 'high', 3.1, 'Medium', 'Kleine Zalze Wine Estate', '2017', '750 ml', 'Cabernet Sauvignon', 'white', 'This wine is just scratching the surface of what the Wente family has to offer. But start here. If you’re gonna go for a wine with toasty and deep oak, this is the way to go. It’s soft and creamy with a good lift to the palate. A great wind-down wine', '385.00', 'Premium', 2, '115.50'),
(7, 'Lava Cap Winery Reserve Chardonnay', 'https://vinepair.com/wp-content/uploads/2023/04/btb-chardonnay-2023-lava-cap-chardonnay-nv-internal.jpg', 'full-bodied', 12.9, 'high', 3, 'Medium', 'Kleine Zalze Wine Estate', '2015', '750 ml', 'Cabernet Sauvignon', 'white', 'This is volcanic Chardonnay. No, it’s not hot but from the dark soils of a lava cap in El Dorado, Calif. It’s quite fruit-forward with a waft of that volcanic, saline minerality. The oak is minimal, which is nice because there are so many other things happening in this refreshing wine.', '424.00', 'Super Premium', 2, '127.20'),
(8, 'Corey Creek Coquillage Chardonnay', 'https://vinepair.com/wp-content/uploads/2023/04/btb-chardonnay-2023-corey-creek-cellars-coquillage-chardonnay-internal.jpg', 'full-bodied', 12, 'high', 3.45, 'Medium', 'Kleine Zalze Wine Estate', '2018', '750 ml', 'Cabernet Sauvignon', 'white', 'There is only one wine like this in the entire world… well… it’s this one. Coming from the North Fork of Long Island is this amazing Chardonnay that was AGED ON SEA SHELLS! It is so clean and mineral with nice mild fruit. The mouthfeel is soft and refreshing with a bit of depth and the slightest hint of briny sea shells on the finish. Run to a computer now and buy some.', '562.00', 'Super Premium', 2, '168.60'),
(9, 'Black Stallion Estate Winery Heritage Chardonnay', 'https://vinepair.com/wp-content/uploads/2023/04/btb-chardonnay-2023-black-stallion-winery-heritage-chardonnay-internal.jpg', 'full-bodied', 12.5, 'high', 3.67, 'Medium', 'Vilafonté Wines', '2016', '750 ml', 'Cabernet Sauvignon', 'white', 'For the price, this wine is punching above its weight. Soft and toasty with hints of vanilla and a creamy, coating mouthfeel, this wine drinks like a more expensive wine. And the balance on the palate with good natural acidity holds up the slight weight.', '682.00', 'Super Premium', 3, '204.60'),
(10, 'Domaine Skouras Dum Vinum Sperum Chardonnay', 'https://vinepair.com/wp-content/uploads/2023/04/btb-chardonnay-2023-skouras-dum-vinum-sperum-chardonnay-internal.jpg', 'full-bodied', 12.8, 'high', 3, 'Medium', 'Vilafonté Wines', '2017', '750 ml', 'Cabernet Sauvignon', 'white', 'This wine is as bright and refreshing as a Greek island breeze. The fruit is nice and ripe, balanced by soft tones of butter and vanilla. The acidity is so active that it bursts through the wine, keeping you aware of the next sip.', '539.00', 'Super Premium', 3, '161.70'),
(11, 'Dr. Konstantin Frank Old Vines Pinot Noir 2020', 'https://vinepair.com/wp-content/uploads/2023/03/good-wines-reds-finger-lakes-internal-dr-konstantin-frank-pinot-noir.jpg', 'full-bodied', 12.5, 'high', 4, 'High', 'Vilafonté Wines', '2020', '750 ml', 'Pinot Noir', 'red', 'From a pioneering Finger Lakes winery, this is a Pinot Noir that can compete with many from California or Oregon. Perfectly balanced with refreshing acidity and light tannins, it offers tastes of cherry, strawberry, and blueberry with an overlay of vanilla and touches of earth and cookie dough. The website says the blend includes wine from the original Pinot Noir vines planted by its founder Dr. Konstantin Frank in 1958, representing the second-oldest Pinot Noir vines in the U.S.', '520.00', 'Super Premium', 3, '156.00'),
(12, 'Stony Lonesome Cabernet Sauvignon Sawmill Creek Vineyard 2020', 'https://vinepair.com/wp-content/uploads/2023/03/good-wines-reds-finger-lakes-internal-sawmill-creek-cabernet-sauvignon.jpg', 'full-bodied', 12.3, 'high', 3, 'Medium', 'Mullineux & Leeu Family Wines - Franschhoek', '2020', '750 ml', 'Pinot noir', 'red', 'This lovely Cabernet shows true varietal character in a fresh, approachable style. A beautiful combination of concentrated dark and red fruit tastes that include dried cherry, raspberry, and blackberry accented by a mocha note. Fine tannins add to the elegance of this classy wine with under-12 percent ABV. Stony Lonesome is a label of Three Brothers Wineries & Estates on Seneca Lake.', '886.00', 'Ultra Premium', 4, '265.80'),
(13, 'McGregor Vineyard Saperavi 2019', 'https://vinepair.com/wp-content/uploads/2023/03/good-wines-reds-finger-lakes-internal-mcgregor-saperavi.jpg', 'full-bodied', 12.2, 'high', 3, 'Medium', 'Mullineux & Leeu Family Wines - Franschhoek', '2019', '750 ml', 'Saperavi ', 'red', 'Saperavi, an ancient variety originally from the country of Georgia, soars in this phenomenal wine from McGregor, which overlooks Keuka Lake and was founded in 1971. Dark, dense, and full-bodied (but with alcohol at just 12.4 percent), aromas and tastes include blackberry and violets with hints of black licorice, green olive, and orange rind. Firm tannins and refreshing acidity complete the picture. McGregor also offers Reserve and Grand Reserve Saperavis with a year or two of additional age.', '1155.00', 'Luxury', 4, '346.50'),
(14, 'Wagner Vineyards Cabernet Franc 2020', 'https://vinepair.com/wp-content/uploads/2023/03/good-wines-reds-finger-lakes-internal-wagner-cabernet-franc.jpg', 'full-bodied', 12, 'high', 4, 'Medium', 'Mullineux & Leeu Family Wines - Franschhoek', '2020', '750 ml', 'Cabernet', 'red', 'This elegant wine, an under-$20 value, evokes some of the Cabernet Francs of France’s Loire Valley. Initial tastes of sour cherry and pomegranate give way to darker fruit notes as it opens up. There’s a touch of leafiness, which is typical of young Cab Franc. A refreshing wine of balance and complexity that will evolve for several years and is perfect for lighter foods, including white meats and fish.', '366.00', 'Premium', 4, '109.80'),
(15, 'Toast Winery Zweigelt 2021', 'https://vinepair.com/wp-content/uploads/2023/03/good-wines-reds-finger-lakes-internal-toast-zweigelt.jpg', 'full-bodied', 12.1, 'high', 3, 'Medium', 'Franschhoek Cellar', '2021', '750 ml', 'Pinot noir', 'red', 'Great acidity and freshness in this Austrian variety make it a superb food wine. It’s rather Beaujolais-like in taste and feel, with notes of sour cherry and blueberry and hints of vanilla and forest floor. It was perfect with a shrimp and vegetable risotto, neither overpowering, nor overpowered by, the food.', '462.00', 'Super Premium', 5, '138.60'),
(16, 'Weis Vineyards Blaufränkisch 2020', 'https://vinepair.com/wp-content/uploads/2023/03/good-wines-reds-finger-lakes-internal-weis-blaufrankisch.jpg', 'full-bodied', 12.5, 'high', 3.2, 'Medium', 'Franschhoek Cellar', '2020', '750 ml', 'Pinot noir', 'red', 'This stellar wine makes a convincing case for the importance of Blaufränkisch in the Finger Lakes. Savory, with notes of blackberry, plum, and overripe strawberry, the wine is lively and lean with an impressively long finish that beckons you for the next sip. A serious wine that should be compared with Blaufränkisches from Austria.', '501.00', 'Super Premium', 5, '150.30'),
(17, 'Fox Run Vineyards Unoaked Lemberger (Blaufränkisch) 2021', 'https://vinepair.com/wp-content/uploads/2023/03/good-wines-reds-finger-lakes-internal-fox-run-lemberger.jpg', 'full-bodied', 12.9, 'high', 3, 'Medium', 'Franschhoek Cellar', '2021', '750 ml', 'Pinot noir', 'red', 'Another wine that evokes young Beaujolais in its lightness and fruitiness with aromas and concentrated tastes of blackberry and blueberry compote and white pepper on the finish. With ample acidity, this will be a summer hit with a slight chill for all kinds of foods and for sipping on its own.', '385.00', 'Super Premium', 5, '115.50'),
(18, 'Lakewood Vineyards Cabernet Franc 2020', 'https://vinepair.com/wp-content/uploads/2023/03/good-wines-reds-finger-lakes-internal-lakewood-cabernet-franc.jpg', 'full-bodied', 12, 'high', 3, 'Medium', 'La Bri Wine Estate', '2020', '750 ml', 'Pinot noirn', 'red', 'There’s lots of complexity in this Cab Franc, with blueberry and cranberry notes, touches of orange rind and spice, and subtle oak that provides hints of vanilla and smoke. Soft tannins round out the picture in an altogether lovely wine. Another excellent value.', '385.00', 'Premium', 6, '115.50'),
(19, 'Point of the Bluff Vineyards Reserve Pinot Noir', 'https://vinepair.com/wp-content/uploads/2023/03/good-wines-reds-finger-lakes-internal-point-of-the-bluff-pinot-noir.jpg', 'full-bodied', 12.6, 'high', 3.9, 'Medium', 'La Bri Wine Estate', '2020', '750 ml', 'Pinot noir', 'red', 'This delightful Pinot Noir, with ABV at just 12 percent, is complex and delicious, showing aromas and tastes of cherry, raspberry, and blueberry. The concentrated fruit is framed by lively acidity and accented by touches of earth, cinnamon, and vanilla. The winery on Keuka Lake claims on its website that its Pinot Noir “has the elegance and finesse of some of the best wine around the world.” I won’t disagree.', '674.00', 'Ultra Premium', 6, '202.20'),
(20, 'Heron Hill Winery Blaufränkisch Ingle Vineyard 2020', 'https://vinepair.com/wp-content/uploads/2023/03/good-wines-reds-finger-lakes-internal-heron-hill-blaufrankisch.jpg', 'full-bodied', 12.1, 'high', 3, 'Medium', 'La Bri Wine Estate', '2020', '750 ml', 'Pinot noir', 'red', 'This delicate and expressive Blaufränkisch shows dark fruit tastes, including cassis and black cherry, with secondary notes of white pepper, black licorice, and flowers. All of it is supported by a gentle tannic structure and balanced acidity. Serve it slightly chilled to give it an even more refreshing lift.', '674.00', 'Ultra Premium', 6, '202.20'),
(28, 'VERGELEGEN V', 'https://vergelegen.co.za/wp-content/uploads/2020/10/Vergelegen-V-300x732.png', 'full-bodied', 15, 'high', 4.1, 'low', 'Vergelegen Estate', '2017', '750 ml', 'Cabernet Sauvignon', 'red', 'The nose is complex, showing blackcurrants, red cherries, cedar wood, lead pencil and cigar box aromas. These develop in the glass and are joined by raspberry, black cherry, spice and a hint of gaminess. On the palate the wine is concentrated but elegant, with fine-grained tannins. These tannins soften even further in the glass, resulting in a luxurious wine with a long aftertaste.', '391.00', 'Super Premium', 7, '117.30'),
(29, 'VERGELEGEN G.V.B RED', 'https://vergelegen.co.za/wp-content/uploads/2020/10/Vergelegen-G.V.B-Red-300x732.png', 'full-bodied', 14.7, 'high', 4.55, 'low', 'Vergelegen Estate', '2016', '750 ml', 'Cabernet Sauvignon', 'red', 'ORIGIN\r\nThe grapes are always sourced from the Rondekop Vineyards grown at 200 – 220 meters above sea level. These vineyards are extremely wind exposed and this leads to thick skinned berries that deliver very concentrated juice.\r\n\r\nVINIFICATION\r\nGrapes were hand-picked and de-stemmed BUT not crushed. The de-stemmed grapes were cooled to 8°C and ‘cold soaked’ for 168 hours. Fermentation took place at 25°C followed by a 30 day maceration on the skins. After malolactic fermentation in stainless steel tanks, the wine went into 50% new French oak barrels for 18 months.', '537.00', 'Super Premium ', 7, '161.10'),
(30, 'VERGELEGEN G.V.B WHITE', 'https://vergelegen.co.za/wp-content/uploads/2020/10/Vergelegen-G.V.B-White-300x732.png', 'full-bodied', 13.41, 'medium', 3.999, 'high', 'Vergelegen Estate', '2022', '750 ml', 'Sémillon', 'white', 'Tight, focused and beautifully integrated with herbal (fynbos), grapefruit flavours, ripe tropical notes, and a long, focused aftertaste. Enjoy with fresh seafood. Probably one of our best vintages ever and without a doubt one of the great white wines of the world. Total production amounts to 2997 standard bottles. Stock piling is recommended!!', '725.00', 'Super-Premium ', 7, '217.50'),
(31, 'ESTATE VINEYARDS SYRAH', 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcTDpdeGQDHUJr9ACqTh5uTD3Iyob0bOmB2Ef2wMQd2iWGBj4COw', 'full-bodied', 14.34, 'high', 3.76, 'medium', 'Rust en Vrede', '2020', '750 ml', 'Cabernet Sauvignon', 'red', 'Rich black fruit with a floral perfume of musk. Blackberry compote, blueberries and ripe\r\ndamson plum combine with spicy paprika, sweet red pepper and sandalwood. Round, juicy\r\nblack fruit follows on the palate, with intense black cherry, crème de cassis and chilli chocolate.\r\nLayers of complex flavours are revealed as the wine opens. Refined tannins are well integrated\r\nwith the intense fruit, balanced by zesty acidity. Full bodied and structured with a long finish\r\nof blueberry and black pepper. ', '760.00', 'Super-Premium ', 9, '228.00'),
(32, 'Meerlust Cabernet Sauvignon', 'https://images.commerce7.com/cellardirect-meerlust/images/medium/meerlust-cabernet-sauvignon-1677271194705.avif', 'full-bodied', 14.2, 'high', 4.56, 'low', 'Meerlust Estate', '2019', '750 ml', 'Cabernet Sauvignon', 'red', 'Very deep, youthful colour with an intense garnet hue. The nose shows dark and red fruit mixed with a slight mint note. Still young and intense, the palate is structured and packed with ripe blue berries and wonderfully elegant tannins. Dark chocolate and salted liquorice on the finish. This is a powerful vintage despite the challenging season and will provide great complexity with further maturation.', '922.00', 'Super-Premium ', 10, '276.60'),
(33, 'Meerlust Chardonnay', 'https://images.commerce7.com/cellardirect-meerlust/images/medium/meerlust_chardonnay-1678106944415.avif', 'full-bodied', 12.94, 'high', 3.98, 'high', 'Meerlust Estate', '2022', '750 ml', 'Chardonnay', 'white', 'Very bright pale-yellow colour with green, vivacious hue. Complex, appealing nose of apricot, peach, pear, lemon zest and floral notes with hints of toasted almonds. On the palate the wine is well structured and linear but retains generous focused stone fruit flavours with sleek, balanced, and crisp acidity. The wine remains vivacious and fresh on the finish with clean citrus fruit underpinned by minerality. The wine has a long, very pleasant lingering finish.', '280.00', 'Premium', 10, '84.00'),
(34, 'Meerlust Merlot', 'https://images.commerce7.com/cellardirect-meerlust/images/medium/merlot-nv-1679931016058.avif', 'full-bodied', 14, 'high', 3.3, 'low', 'Meerlust Estate', '2018', '750 ml', 'Merlot', 'red', 'Brick red colour with crimson edge. Typical Merlot characteristics on nose with ripe plum and dark cherry notes underpinned by some dried herbs and oak spice. The palate is plush while still delicate on the finish, showing complex cherry tobacco flavours coupled with a fine acidity. This wine shows the intensity and concentration of the 2018 vintage and as with all Merlot’s from the estate, will age gracefully and will gain in complexity and suppleness of tannin for many years to come.\r\n\r\nThis wine consists of 86% Merlot, 11% Cabernet Franc and 3% Petit Verdot. It is made up of a few individual parcels that are all fermented separately before undergoing malolactic fermentation in 300 L barrels. After 8 months in barrel, the final components were selected and blended and given another 10 months in barrel for harmonization before bottling.', '670.30', 'Super Premium', 10, '201.09'),
(35, 'Meerlust Pinot Noir', 'https://images.commerce7.com/cellardirect-meerlust/images/medium/meerlust-pinot-noir-nv-1677229067558.avif', 'full-bodied', 13, 'high', 4.1, 'low', 'Meerlust Estate', '2021', '750 ml', 'Pinot Noir', 'red', 'Intense, vivid opaque youthful purple-ruby appearance. The wine shows pronounced lifted floral perfume on the nose with a brooding and seductive dark berry fruit, musk, wild mushrooms and hints of iron, savoury richness and spice and an intense vibrant minerality.\r\n\r\nOn the palate there are very pure Pinot fruit flavours on entry with red cherry and musk flavours coupled with fresh acidity. The wine has layered complexity with great elegance and finesse. Very fine lacy, almost powdery tannin on the finish.', '920.00', 'Super Premium ', 10, '276.00'),
(36, 'Meerlust Red', 'https://images.commerce7.com/cellardirect-meerlust/images/medium/meerlust-red-nv-1677329193126.avif', 'medium bodied', 14, 'high', 4.7, 'medium', 'Meerlust Estate', '2019', '750 ml', 'Cabernet Sauvignon', 'red', 'The wine has an intense, dark purple colour with a violet rim. Bright and vivacious in the glass, very youthful. The nose is expressive with powerful cassis, plum, exotic spice and hints of floral aromas. On the palate the wine is medium bodied with intense flavours of crushed black fruit, cassis, vanilla and dark chocolate. The tannins are very soft and silky with fresh acidity and a focused, linear flavour profile. The wine has a persistent and long lasting aftertaste.', '432.00', 'Premium', 10, '129.60'),
(37, 'Meerlust Red 2019 Magnum', 'https://images.commerce7.com/cellardirect-meerlust/images/medium/redmagnum2019-1677505754499.avif', 'medium bodied', 14, 'high', 4.23, 'low', 'Meerlust Estate', '2019', '750 ml', 'Cabernet Sauvignon', 'red', 'The wine has an intense, dark purple colour with a violet rim. Bright and vivacious in the glass, very youthful. The nose is expressive with powerful cassis, plum, exotic spice and hints of floral aromas. On the palate the wine is medium bodied with intense flavours of crushed black fruit, cassis, vanilla and dark chocolate. The tannins are very soft and silky with fresh acidity and a focused, linear flavour profile. The wine has a persistent and long lasting aftertaste.', '3327.00', 'Luxury', 10, '998.10'),
(38, 'Meerlust Rubicon', 'https://images.commerce7.com/cellardirect-meerlust/images/medium/meerlust-rubicon-2016-1677330826063.avif', 'full-bodied', 14.3, 'high', 4.23, 'low', 'Meerlust Estate', '2018', '750 ml', 'Cabernet Sauvignon', 'red', 'Very deep, youthful colour, and intense almost purple hue. Quintessential Rubicon nose with violets, ripe plum, cedar wood, fennel, and intense spiciness. A typical liquorice note also evident on the nose. Still young and intense, the palate is full bodied, structured but packed with fresh dark fruit and rounded tannins. This is a vintage that is more approachable in youth because of the ripeness and richness levels attained in 2018 but will provide great complexity with further maturation.\r\n\r\nThe 2018 Rubicon is a classically proportioned blend of 67% Cabernet Sauvignon, 19% Merlot, 10% Cabernet Franc and 4% Petit Verdot, every parcel of each variety was fermented separately before undergoing malolactic fermentation in 300 L barrels and large Foudré. After 8 months in barrel, the components were blended and given another 10 months in barrel for harmonization before bottling.', '428.00', 'Premium', 10, '128.40'),
(39, 'Banghoek Reserve Chardonnay', 'https://cdn.nexternal.com/capeardor/images/Delaire-BanghoekReserve-Chardonnay-2017.png', 'full-bodied', 14.25, 'high', 3.99, 'high', 'Delaire Graff Estate', '2020', '750 ml', 'Chardonnay', 'white', 'Elegant with layered nuances of vanilla, peaches and honeycomb. A hint of minerality adds to lingering finish.', '6628.00', 'Luxury', 11, '1988.40'),
(40, 'Banghoek Reserve Merlot', 'https://cdn.nexternal.com/capeardor/images/DelaireBanghoekReserveMerlot2016.png', 'full-bodied', 14.85, 'high', 3.7, 'low', 'Delaire Graff Estate', '2020', '750 ml', 'Merlot', 'red', 'Firm and well balanced, this Merlot is characterised by spicy, dark plum and berry flavors, whilst silky, ripe tannins ensure a long and lingering finish.', '449.50', 'Premium', 11, '134.85'),
(41, 'Botmaskop', 'https://cdn.nexternal.com/capeardor/images/DG-BOTS-2017.jpg', 'full-bodied', 14.62, 'high', 4.8, 'low', 'Delaire Graff Estate', '2019', '750 ml', 'Cabernet Sauvignon', 'red', 'Powerful, yet elegant and polished. A red blend with classic aromas of dark berry fruit, spice and cassis. The softness of tannins and balance in structure complete this wine on the palate. Optimal ageing potential of 5 - 8 years. ', '38.00', 'Premium ', 11, '11.40'),
(42, 'Signature Chenin Blanc', 'https://cdn.shopify.com/s/files/1/0259/0670/8570/products/SpierSignatureSauvignonBlancWine.jpg?v=1661845012&width=1200', 'full-bodied', 13.5, 'high', 3.2, 'medium', 'Spier Wine farm', '2022', '750 ml', 'Chenin Blanc', 'white', 'This is a crisp and fruity Chenin Blanc, bursting with aromas of green\r\nguava, pear, ripe peach notes, and hints of litchi on the nose. The wellbalanced palate hails from the sun-kissed slopes of the Cape Winelands,\r\nwhere the grapes ripen quickly but retain Chenin’s signature acidity and\r\nconcentrated finish.', '405.00', 'Premium', 14, '121.50'),
(43, '21 Gables Pinotage', 'https://cdn.shopify.com/s/files/1/0259/0670/8570/products/21-Gables-Pinotage-2048x2048-awards.jpg?v=1643269039&width=1200', 'full-bodied', 14.69, 'high', 4.8, 'low', 'Spier Wine Farm', '2018', '750 ml', 'Pinotage', 'red', 'Deep ruby red on the eyes, this is a Pinotage to sink into slowly. The nose exudes violet aromas and sweet,\r\nripe blackberries and cherries which overlay a hint of graphite. Classic and full-bodied in style, the palate\r\nfollows with ripe, Black Forest cake-like flavours while the tannins are dense and velvety for an opulent finish.', '1880.00', 'Luxury', 14, '564.00'),
(44, 'Farm House Organic Chenin Blanc', 'https://cdn.shopify.com/s/files/1/0259/0670/8570/products/Spier-Farm-House-Organic-wineChenin-Blanc_8b4ea0a4-82cb-4c16-bc3a-faa4a05d6943.jpg?v=1619773742&width=1200', 'full-bodied', 13.28, 'high', 4.5, 'medium', 'Spier Wine Farm', '2020', '750 ml', 'Chenin Blanc', 'white', 'This sunshine-coloured Chenin will brighten your day no matter how stormy the weather. Made with grapes grown organically at Spier, with its dreamy honeycomb, citrus and pear flavours are supported by exquisite minerality. We love pairing it with pork belly by the fireplace in winter or seafood on the stoep in summer.\r\n\r\nThis wine offers butterscotch, apricots and hints of citrus on the nose. The rich, mouthwatering palate of citrus and honeycomb culminates in a lingering, crisp finish', '140.00', 'Premium', 14, '42.00'),
(87, 'Rutherford Dust Up Cabernet Sauvignon', 'https://client-assets.ecellar1.com/vsattui/prod_image1_20162.png', 'full-bodied', 14.9, 'High', 3.54, 'medium', 'V. Sattui Winery', '2019', '750 ml', 'Cabernet Sauvignon', 'Red', 'This very limited and special bottling of Cabernet Sauvignon comes from a blend of Gary Morisoli’s vineyard on Niebaum Lane and his brother, Mike Morisoli’s vineyard, just a stone’s throw away. Mike and Gary are 3rd generation Napa Valley grape growers, beginning with the Morisoli Family planted grapes in western Rutherford in early 1950’s. The vineyards are located in the heart of the famous “Rutherford Bench”, an area of well-drained, alluvial soils below Mt. St. John that produce fine grain “dusty” and supple tannins and where some of the most notable Cabernet Sauvignon in Napa Valley is grown. It is a tribute to their family’s hard work and dedication to growing the finest grapes in Napa Valley.', '2700.00', 'Super Luxury ', 21, '540.00'),
(88, 'Paradiso', 'https://client-assets.ecellar1.com/vsattui/prod_image1_15952.png', 'full-bodied', 14.2, 'High', 3.6, 'medium', 'V. Sattui Winery', '2019', '750 ml', 'Bordeaux', 'Red', 'Our 2019 Paradiso is bursting with black cherry aromas, spicy notes of black pepper, and toasted oak. This blend showcases succulent mixed berry fruit and bittersweet chocolate flavors followed by hints of earthy, savory herbs. A full-bodied wine with surprisingly soft tannins that together, make a truly remarkable and unique red blend. \r\nVineyard Notes:\r\n\r\nParadiso is the proprietary name for our red “Meritage” - a Bordeaux-style blend that changes in varietal composition from vintage to vintage. In an homage to this type of wine, we have included five of classic grape varietals, with no single variety making up more than 90% of the blend. The beauty of this is that no one varietal stands out, but that each one is harmoniously balanced by the others. These wines are prized for the smooth, silky textures and complex, full-bodied structure. They age beautifully for decades; however, most are also very drinkable in their younger years.\r\n\r\nWinemaking Notes:\r\n\r\nThe grapes are harvested at night into ½ ton bins, arriving at the winery early morning and very cold. They are “de-stemmed”, berry sorted and crushed to tank. The initial “cold-soak” (no fermentation) of the grapes is 3-4 days at 50ºF. Multiple lots were fermented in stainless steel tank where a peak temperature is typically 92ºF; and the yeast strain is Premier Cuvee. The wine is tasted twice a day to evaluate the color and tannin extraction from the skins and seeds.\r\n\r\nFor this wine we are looking for a careful balance of deep red pigment intensity, complexity of flavors and balance in the mid-palate, and overall tannin content. Once these are at an optimum in the wine, we drain the free-run juice from the skins to another tank and keep separate the hard press wine, which will be evaluated and aged separately. Once the new wine has settled in tank (3-4 days) we rack off the gross grape solids (lees) and move to barrels. The 2nd fermentation (called Malolactic) will then proceed in small barrels over several months.', '2100.00', 'Super Luxury Wine', 21, '420.00'),
(89, 'Reserve Stock Pinot Noir', 'https://client-assets.ecellar1.com/vsattui/vinsuite/wines/pictures/2019-Reserve-Pinot-Noir.png', 'full-bodied', 14.4, 'High', 3.73, 'low', 'V. Sattui Winery', '2019', '750 ml', 'Pinot Noir', 'Red', 'This reserve selection of Pinot Noir entices the scenes with aromas of blossoming violets black cherry vanilla and toasted oak. It’s well-balanced acidity and round mouthfeel are countered by delicate raspberry fruit flavor that evolves into cinnamon spice and dark chocolate on the finish.\r\n\r\nVineyard Notes:\r\n\r\nFor our 2019 Reserve Stock Pinot Noir we created a blend that sourced fruit from our estate vineyards Hibbard Ranch located in Los Carneros, Napa Valley and Collina d’ Oro Vineyard, nestled along the Russian River in Sonoma County. Both appellations are in close proximity to marine climates, allowing the morning fog to inhibit significant temperature rises in the morning. With the coastal influence keeping temperatures cool, and chance of late-season rain minimal, the grapes are allowed to develop slowly, ripen evenly, and develop fruit flavors over time while preserving acidity.\r\n\r\nWinemaking Notes:\r\n\r\nThe grapes are harvested at night into ½ ton bins, arriving at the winery early morning and very cold. They are “de-stemmed”, berry sorted and crushed to tank. The initial “cold-soak” (no fermentation) of the grapes is 3-4 days at 50ºF. Multiple lots were fermented in stainless steel tank where peak temperature is typically 92ºF; and the yeast strain is RC212. The wine is tasted twice a day to evaluate the color and tannin extraction from the skins and seeds.\r\n\r\nFor this wine we are looking for a careful balance of deep red pigment intensity, complexity of flavors and balance in the mid-palate, and overall tannin content. Once these are at an optimum in the wine, we drain the free-run juice from the skins to another tank and keep separate the hard press wine, which will be evaluated and aged separately. Once the new wine has settled in tank (3-4 days) we rack off the gross grape solids (lees) and move to barrels. The 2nd fermentation (called Malolactic) will then proceed in small barrels over several months.', '1500.00', 'Luxury Wine', 21, '300.00'),
(90, 'Reserve Stock Napa Valley Chardonnay', 'https://client-assets.ecellar1.com/vsattui/vinsuite/wines/pictures/2019-Reserve-Chardonnay.png', 'full-bodied', 14.6, 'High', 3.41, 'high', 'V. Sattui Winery', '2019', '750 ml', 'Chardonnay', 'White', 'Our 2019 Reserve Napa Valley Chardonnay showcases sweet notes of crème brûlée butterscotch and vanilla followed by nuances of rich toasted oak. A round mouthfeel with persistent stone fruit flavors—balanced acidity and a little buttery note on the finish.\r\n\r\nVineyard Notes:\r\n\r\nOur 2019 Reserve Napa Valley Chardonnay is a beautifully balanced blend, crafted using fruit from our estate properties Hibbard Ranch (53%) in Los Carneros and Carsi Vineyard (47%) in Yountville. These properties are located toward the cool, southern end of Napa Valley where fog from the San Pablo Bay helps to regulate temperature throughout the growing season. The coastal influence of the bay keeps daytime temperatures cool, allowing grapes to develop slowly, ripen evenly, and develop full varietal flavors over time while preserving acidity.\r\n\r\nWinemaking Notes:\r\n\r\nThe grapes are harvested at night into ½ ton bins, arriving at the winery early morning and very cold. Whole clusters are pressed, and the juice is transferred to stainless steel tanks, where it settles for 24 hours at 50ºF. Once the gross grape solids (lees) have settled, the clear juice is then racked into 100% new French oak barrels for fermentation. We typically divide the Chardonnay into four different lots; three of them will be inoculated with a different yeast strain; each one capable of producing different aromatic compounds, while one lot will undergo a native fermentation with no yeast addition. Once primary fermentation has been completed, winemaking will determine which lots will go through malolactic fermentation, also referred to as secondary fermentation. The completion of malolactic fermentation will aid in providing a creamier texture with a fuller mouthfeel. All lots are stirred biweekly through malolactic and will age on its lees for nine months until racked out for blending and bottling.\r\n', '1250.00', 'Luxury Wine', 21, '250.00'),
(91, 'Napa Valley Sauvignon Blanc', 'https://client-assets.ecellar1.com/vsattui/prod_image1_20101.png', 'full-bodied', 14.5, 'Medium', 3.3, 'Medium', 'V. Sattui Winery', '2022', '750 ml', 'Sauvignon Blanc', 'White', 'A beautifully structured wine with refreshing aromas of tropical kiwi, lemongrass, and a hint of minerality; this is a dry wine with absolutely no residual sugar to hide behind. A pure example of Sauvignon Blanc character; bright, savory and lush with a mouthwatering acidity that leaves you wanting more!\r\n\r\nVineyard Notes:\r\n\r\nOur 2022 Napa Valley Sauvignon Blanc is a refreshing blend that showcases our estate vineyard fruit. A majority (55%) of the blend comes from Carsi Vineyard located in Yountville. It is a 27-acre vineyard named in honor of Vittorio Sattui’s birthplace, the Italian hillside village of Carsi. This appellation is one of the coolest wine growing regions in Napa Valley, which contributes to a long growing season and full-flavored fruit.\r\n\r\n The remainder of the blend (45%) is sourced from just down the road at Hibbard Ranch in Los Carneros. This appellation lies on the border of both Napa and Sonoma Counties, but unlike other cool-climate AVAs in Sonoma County, Los Carneros receives much less rainfall, and it is farther from the ocean. The area’s dense, clay soils are not particularly deep or fertile, and these factors when combined produce fruit with concentrated flavors.\r\n\r\nWinemaking Notes:\r\n\r\nThe grapes are harvested at night into ½ ton bins, arriving at the winery early morning and very cold. Whole clusters are pressed, and the juice is transferred to stainless steel tanks, where it settles for 24 hours at 50F. Once the gross grape solids (lees) have settled, the clear juice is then racked into another vessel where it will undergo fermentation at a very cold temperature, typically 52F; and the yeast strain is SL3. This is a special yeast strain, ideal for fermentations with varietals that are exceptionally aromatic to preserve these fruit forward characteristics.\r\n\r\nA majority of the blend (95%) was fermented in stainless steel tank which preserves the crisp, natural Sauvignon Blanc varietal flavors. A small portion of the blend (2.5%) was fermented in our concrete egg, which creates body and richness on the palate, whilst imparting hints of minerality to the aroma. The remainder of the blend (2.5%) was fermented in French Oak barrels to increase complexity of aromas and flavors. Once fermentation was complete, wines from each vessel were blended, lightly filtered, and bottled just a few months after its harvest to capture the freshest, fruitiest aromas and flavors.', '620.00', 'Ultra Premium', 21, '124.00'),
(92, 'Prestige Cuvée Brut Rosé', 'https://client-assets.ecellar1.com/vsattui/vinsuite/wines/pictures/2018-Prestige-Cuvee-Brut-Rose1.png', 'full-bodied', 12.5, 'High', 3.23, 'High', 'V. Sattui Winery', '2018', '750 ml', 'Pinot Noir', 'Rose', 'This dry elegant sparkling wine is bright and inviting with its blushing peach color, and fresh strawberry bouquet. Crisp, delicate, and refreshing with an effervescent complexity of orange blossom, that melds into a soft green apple finish. Believe us when we say this wine is dangerously delicious!\r\n\r\nVineyard Notes:\r\n\r\nFor our Prestige Cuvée Brut Rosé we used a blend of 84% Pinot Noir and 16% Chardonnay from grapes grown from our estate vineyards along the North Coast. This appellation is the perfect climate for producing high quality sparkling wines because of the cooling influence of the Pacific Ocean. The moderate, coastal climate allows the grapes to ripen slowly and retain their acidity levels, an essential quality needed for sparkling wines.\r\n\r\nWinemaking Notes: \r\n\r\nThe grapes are hand- harvested at night into ½ ton bins, arriving at the winery early morning and very cold. Whole clusters are pressed and the “free run juice” is separated from the “press juice”. The juice is transferred to stainless steel tanks. After primary fermentation the resulting wine is “bone dry” (no residual grape sugar), then the “Tirage” bottling occurs, where it undergoes the secondary fermentation in the bottle following the French “Method Champenoise”. Following the aging process, bottles are transferred into riddling bins where they undergo a month-long process of slight turns which gradually move the yeast lees to the cork. Once completed, the bottles undergo the disgorging process where they are inverted, the necks frozen to ensure the sediment is removed and then finished with the cork and packaging. At this point, the champagne is ready to be enjoyed!', '970.00', 'Ultra Premium', 21, '194.00'),
(93, 'Prestige Cuvée Brut', 'https://client-assets.ecellar1.com/vsattui/vinsuite/wines/pictures/2017-Prestige-Cuvee.png', 'full-bodied', 12.5, 'Medium', 3.3, 'High', 'V. Sattui Winery', '2017', '750 ml', 'Chardonnay', 'Sparkling', 'This newly-released sparkler is perfect for celebrating any occasion!  The 2017 vintage Prestige Cuvée bursts with crisp apple pear and a hint of twisted lime zest. You\'re sure to enjoy this dry sophisticated Brut and its creamy slightly toasted finish. Produced using classic French \"Méthode Champenoise\" with a secondary fermentation in the bottle this cuvée is made with 100% Napa Valley fruit.\r\n\r\nVineyard Notes:\r\n\r\nFor our 2017 Prestige Cuvee Brut we used a blend of 73% Chardonnay and 27% Pinot Noir from grapes that were grown in Napa Valley. This appellation is the perfect climate for producing high quality sparkling wines because of the cooling influence of the San Francisco Bay. The moderate coastal climate allows the grapes to ripen slowly and retain their acidity levels an essential quality needed for sparkling wines.\r\n\r\nWinemaking Notes:\r\n\r\nThe grapes are hand-harvested at night into ½ ton bins arriving at the winery early morning and very cold. Whole clusters are pressed and the “free run juice” is separated from the “press juice”. The juice is transferred to stainless steel tanks. After primary fermentation the resulting wine is “bone dry” (no residual grape sugar) then the “Tirage” bottling occurs where it undergoes the secondary fermentation in the bottle following the French “Method Champenoise”. Following the aging process bottles are transferred into riddling bins where they undergo a month long process of slight turns which gradually move the yeast lees to the cork. Once completed the bottles undergo the disgorging process where they are inverted the necks frozen to ensure the sediment is removed and then finished with the cork and packaging. At this point the champagne is ready to be enjoyed!', '965.00', 'Ultra Premium', 21, '193.00'),
(94, 'Madeira', 'https://client-assets.ecellar1.com/vsattui/prod_image1_922.png', 'full-bodied', 19, 'High', 3.51, 'low', 'V. Sattui Winery', '1916', '750 ml', 'Solera', 'Dessert', 'Our Madeira is a rich smooth and nutty after-dinner wine that belies the complex method of preparation that goes into making it. Its blend of ancient port rich Zinfandel and fine brandy gives it a sweet hazelnut burnt-caramel flavor that is both intriguing and haunting. Many people who favor great ports and sherries know us solely for this single wine. Our Solera is over 120 years old one of the oldest in the U.S. \r\n\r\nWinemaking Notes:\r\n\r\nThe solera process is an ingenious system of fractional blending perfected by the Spanish to ensure consistent quality based on the fact that old wines can be refreshed by the addition of a younger wine which then acquires the characteristics of the old wine. We begin with now what is now a 107-year-old vintage port, a lasting vestige from Vittorio Sattui\'s original winery as the mother (or master-blend). We then fashion primary secondary and tertiary blends \"criaderas\" using varying ages of Zinfandel - the oldest is more than 35 years old - and add a little back to the mother to keep it alive much like sourdough breadmaking.', '1330.00', 'Luxury Wine', 21, '266.00'),
(95, 'Amador Ridge Vineyard Zinfandel', 'https://client-assets.ecellar1.com/vsattui/vinsuite/wines/pictures/2019-Amador-Zinfandel.png', 'full-bodied', 14.6, 'High', 3.63, 'Low', 'V. Sattui Winery', '2019', '750 ml', 'Zinfandel', 'Red', 'Sourced from old vines in the Sierra foothills the 2019 Amador Ridge Zinfandel is dark red/inky violet in color with concentrated aromas of black cherry and currant. It presents a soft roundness on the palate with jammy characteristics of sweet plum and wild blueberry followed by lingering notes of vanilla spice on the finish.\r\n\r\nVineyard Notes:\r\n\r\nSustainable farming at its best!  Amador Ridge Vineyard is located just outside of Sutter Creek on an ancient mud-slide of red cobbly-loam soil. The head-trained Zinfandel is grafted to St. George rootstock on an east facing slope allowing the grower to dry farm in most seasons and to irrigate the vines only in exceptionally dry years.\r\n\r\nJohn Murrill’s Zinfandel vines at Amador Ridge Vineyard are located just outside of Sutter Creek on an ancient mud-slide of red cobbly-loam soil. The head-trained Zinfandel is grafted to St. George rootstock on an east-facing slope allowing him to dry-farm in most seasons and to irrigate the vines only in exceptionally dry years. John practices sustainable farming and yield are only 2 to 2 ½ tons per acre on average', '810.00', 'Ultra Premium', 21, '162.00'),
(96, 'Boonville Ranch Riesling', 'https://client-assets.ecellar1.com/vsattui/vinsuite/wines/pictures/2021-Boonville-Ranch-Riesling.png', 'full-bodied', 13.5, 'High', 2.92, 'High', 'V. Sattui Winery', '2021', '750 ml', 'Riesling', 'White', 'Stone fruit aromas of nectarine and peach integrate with floral notes of lemon blossom jasmine and sweet honeysuckle. On the palate it shows an intense minerality with a semi-dry residual sweetness and great acidity. Lush fruit and rich flavors of nectarine and pineapple on the finish.\r\n\r\nVineyard Notes:\r\n\r\nThe grapes for this wine are grown in Anderson Valley which is only about 16 miles long and up to 1½ miles wide surrounded on three sides by rolling hills and low mountains and open to the west through majestic old- and second-growth redwoods to the Pacific Ocean along the Navarro River. With the coastal influence keeping temperatures cool grapes are allowed to develop slowly ripen evenly and develop their characteristically exotic flavors over time while preserving acidity. This vineyard is planted utilizing a VSP trellis system which forces clusters to the outside of the canopy to increases their exposure to sunlight and enhance the ripening under cool climate conditions.', '620.00', 'Super-Premium', 21, '124.00'),
(97, 'Cavaliere Tuscan Blend Red Wine', 'https://www.torciano.com/img/product/4034/cavaliere_big_big_big.jpg', 'full-bodied', 13.5, 'High', 3.62, 'Low', 'Tenuta Torciano', '2017', '750 ml', 'Merlot', 'Red', 'Wine Description:\r\n\"Cavaliere\" is an aristocrat wine with elegant and personal flavor. With a deep ruby red tending to garnet with age it\'s a blend of Sangiovese and Merlot. Its bouquet is Round, complete and elegant. Has a dry, full and smooth flavor.\r\n\r\nThe prime quality and structure of this wine demand excellent first courses and risottos with sauces made from game, red meat, and mature spicy cheeses.\r\n\r\n', '1060.00', 'Luxury ', 22, '212.00'),
(98, '', '', 'full-bodied', 13.5, 'High', 3.32, 'Low', 'Tenuta Torciano', '2017', '750 ml', 'Cabernet', 'Red', 'Wine Description:\r\nThe Sangiovese, from the Latin \"Sangius jovis\", is the predominant grape-variety in this wine and the calm, elegant characteristics of the Cabernet give this wine ample olfactory complexity and greater strength to both body and flavor. The color is deep ruby red, tending to garnet with age. With a dry, full and smooth flavor, rich with personality and well structured, complete and elegant, with an evidently aristocratic character; hints of wood can be perceived amidst the typical herbaceous notes.\r\n\r\nThe prime quality and structure of this wine demand excellent first courses and risottos with sauces made from wild boar and hare, tasty red meat dishes such as roast game, vegetable soufflé and spicy mature cheeses.', '1250.00', 'Luxury ', 22, '250.00'),
(99, 'Terrestre Gold Tuscan Blend Red Wine', 'https://www.torciano.com/img/product/1561/8be36-terr_750_full_big.png', 'full-bodied', 13, 'High', 3.54, 'Low', 'Tenuta Torciano', '2013', '750 ml', 'Sauvignon', 'Red', 'Our Terrestre, forming part of the line of Super-Tuscan Luxury Wines linked to the great territory of our region, has proved to be a great success and has received an award at Vinitaly in Verona last April. This is a clone of the first grape tuscany, mother of great Brunello. The land has a musky smell with sweet notes of dried leaves, characteristics of the tuscan woods.\r\n\r\nThe Terrestre has a musky smell with sweet notes of dried leaves, characteristics of the tuscan woods. The scent of vanilla derives from the first quality used for aging and the famous land of Montalcino, the quality of which exalt the natural scents. Recommend it with the pasta with a sauce made from red meat or in conjunction with roast meat.\r\n\r\nThe vintage 2013 was presented with a hot summer but throughout the year temperatures were maintained regular, with important rains in the month of May and June. Also in the month of Sept, in Tuscany, at the beginning of the month have occurred of thunderstorms, creating discomfort during the step of harvesting the grapes but helping to make an overall great Fine Wine', '3300.00', 'Super Luxury', 22, '660.00'),
(100, 'Cabernet Sauvignon \"MMXX\" Red Wine', 'https://www.torciano.com/img/product/3974/mmxx_tt_collare_big_big.png', 'full-bodied', 14, 'High', 3.21, 'Low', 'Tenuta Torciano', '2020', '750 ml', 'Cabernet Sauvignon', 'Red', 'Wine Description:\r\nExclusively produced with 100% Cabernet Sauvignon grapes. Powerful and deeply expressive from the outset, with heady black currant, plum, and cedar aromas. Layered currant and black cherry flavors are elegantly accented by notes of clove.\r\n\r\nBold, coating tannins frame the entire wine, and hints of slate add dimension to a dark, brooding finish. Ideal with grilled meat, structured first courses such as pappardelle with mushrooms or pasta with white meat ragù and medium-aged cheeses.', '1350.00', 'Luxury ', 22, '270.00'),
(101, 'Pinot Grigio \"GoldVine\"', 'https://www.torciano.com/img/product/3516/pinot-grigio_big.png', 'full-bodied', 11, 'Medium', 3.12, 'High', 'Tenuta Torciano', '2020', '750 ml', 'Pinot Grigio', 'White', 'Wine Description:\r\nA white wine with delicate coppery highlights and a fragrant aroma of toasted almonds and yeast. A cuvee of the best Pinots, its body and structure are enhanced when accompanied by fish main courses, as well as hors d’oeuvres and light first courses.\r\n\r\n', '810.00', 'Ultra Premium', 22, '162.00'),
(102, 'Barona di Torciano', 'https://www.torciano.com/img/product/4033/barona_big_big.png', 'full-bodied', 12.5, 'medium', 3.07, 'high', 'Tenuta Torciano', '2020', '750 ml', 'Sauvignon', 'White', 'Wine Description:\r\nThe Barona di Torciano white offers a straw yellow color with greenish highlights. The nose is delicate and elegant with notes of bananas, pineapples, white flowers, and candied fruit.\r\n\r\nThe palate is balanced and harmonious with good flavor persistence and mineral notes on the finish and aftertaste.\r\n\r\nThe vintage was characterized by an early bud break with a crop of excellent quality.', '500.00', 'Super-Premium', 22, '100.00'),
(103, 'Spumante', 'https://www.torciano.com/img/product/1706/spumante_big.png', 'full-bodied', 11, 'medium', 3.21, 'high', 'Tenuta Torciano', '2020', '750 ml', 'Prosecco', 'Sparkling', 'Wine Description:\r\nThis typical wine has a fresh, fruity and vigorous flavour. Its fine and persistent perlage makes it the ideal aperitif to accompany sweet or savoury appetizers and to feature in the typical Italian lemon sorbet recipe This wine has an intense fruity bouquet with a hint of golden apples. It is very dry, fresh, light in body and well-balanced. This wine is perfect alone as an aperitif or as a delightful complement to appetizers such as prosciutto or mild cheeses. Excellent as wine cocktails.', '800.00', 'Ultra Premium', 22, '160.00');
INSERT INTO `wine` (`WineID`, `Name`, `Wine_URL`, `Body`, `Alcohol`, `Tannin`, `Acidity`, `Sweetness`, `Producer`, `Vintage`, `Volume`, `Cultivars`, `Category`, `Description`, `Cost_per_bottle`, `Price_Category`, `Business_ID`, `Cost_per_glass`) VALUES
(104, 'Tenuta Torciano Rosè ', 'https://www.torciano.com/img/product/3942/rosato%20igt%20toscana_big_big.png', 'full-bodied', 11.5, 'medium', 3.24, 'High', 'Tenuta Torciano', '2020', '750 ml', 'Sangiovese', 'Rosè', 'Wine Description:\r\nThe Tuscan red grapes are vinified in rosè by soft pressing to obtain this rosé wine. The nose is characterized by fresh fruity and floral aromas reminiscent of pink grapefruit, strawberry and dog rose. On the palate it is balanced, soft and fragrant. When tasted, it conquers with its fruity character, enlivened by flavor and freshness that invite you to taste it again and make it particularly pleasant to sip.\r\n\r\nVery fresh and flowing, it proves to be full-bodied and persistent. The long finish highlights fruity and mineral notes. This rosé is perfect as an aperitif but also goes well with cold cuts and croutons appetizers, lightly seasoned first courses and risottos, soups, white meats and all fish-based dishes.', '800.00', 'Ultra Premium', 22, '160.00'),
(105, 'Villagiachi', 'https://www.torciano.com/img/product/2523/rosso%20villagiachi_big.png', 'full-bodied', 11.5, 'high', 3.62, 'low', 'Tenuta Torciano', '2021', '750 ml', 'Syrah', 'Red', 'Wine Description:\r\nRed from the fine selection of grapes grown in Italy on hilly terrain with heavy clay soils, then assembled with other international varietals. This ruby red wine is fruity and floral with hints of vanilla. It has a balanced flavor, with pleasantly bitter, sincere and soft tannins.\r\n\r\nBetter served with rich dishes, such as red meats and game, hearty soups and succulent sauces.', '500.00', 'Super-Premium', 22, '100.00'),
(106, 'Malbec Monogram TT', 'https://www.torciano.com/img/product/2959/MALBECH_TT_big.png', 'full-bodied', 13.5, 'high', 3.89, 'low', 'Tenuta Torciano', '2019', '750 ml', 'Malbec', 'Red', 'Wine Description:\r\nIntense and deep ruby ​​red. The nose perceives notes of ripe black fruit well integrated with spicy and vanilla hints. On the palate it is balanced and enveloping, with a good persistence. The aftertaste is characterized by hints of blueberry that fade on notes of coffee and bitter chocolate.', '615.00', 'Ultra Premium', 22, '123.00'),
(107, 'Vivanco Crianza ', 'https://vivancoculturadevino.es/img/bodega/losvinos/vino_3_big.png?v=2023', 'full-bodied', 14.1, 'high', 3.67, 'low', 'Vivanco', '2020', '750 ml', 'Tempranillo', 'Red', 'VINEYARDS\r\nA selection of vines in Briones, Rioja Alta which are 15–20 years old on average, grown in mainly ferrous-clay soils.\r\n\r\nHARVEST\r\nHand picked. All the grapes are placed in a cold room for 36 hours before being processed on the sorting table. The grape harvest began in early October.\r\n\r\nVINIFICATION\r\nAfter mild crushing, the grapes are fed by gravity into small French oak vats where they ferment and are left to macerate for 20 days in contact with the skins at a controlled temperature of 28 °C with light pumpovers.\r\n\r\nMALOLACTIC FERMENTATION\r\nIn small French oak vats.\r\n\r\nAGEING\r\nAged for 16 months in French and American oak barrels, with periodic rackings, followed by at least 6 months in the bottle-ageing hall.\r\n\r\nTHE BOTTLE\r\nOur bottle is inspired in an original eighteenth-century bottle that is on exhibit at the Vivanco Museum of the Culture of Wine.\r\n\r\nTASTING NOTES\r\nBright cherry-red. Intense aromas of fresh, ripe, red fruit, with spicy and liquorice notes, accompanied by elegant toasty and smoky hints. Fresh and sweet in the mouth, with a very well-balanced, persistent and elegant mouthfeel.\r\n\r\nSERVING AND PAIRING\r\nServing temperature: 16-18 °C. The perfect companion to Mediterranean cuisine, rice dishes, pulses, pasta and all kinds of white and red meats.', '800.00', 'Ultra Premium', 23, '160.00'),
(108, 'Vivanco Viura-Tempranillo Blanco-Maturana Blanca', 'https://vivancoculturadevino.es/img/bodega/losvinos/vino_1_big.png?v=2023', 'full-bodied', 12.4, 'high', 3.21, 'medium', 'Vivanco', '2022', '750 ml', 'Viura', 'White', 'THE BOTTLE\r\nOur bottle is inspired in an original eighteenth-century bottle that is on exhibit at the Vivanco Museum of the Culture of Wine.\r\n\r\nTHE LABEL\r\nThe artwork Variedades modernas, made by María Ángeles Kareaga Hormaza, illustrates the label of this vintage in our Vivanco white. This piece, which expresses and personality of our wine, has been selected among the exhibitors in the X Edition of the International Prize of Engraving and Wine of the Vivanco Foundation. \r\n\r\nTASTING NOTES\r\n\r\nPale-yellow with green hues; clean and bright. To the nose it proves expressive, intense and complex, with aromas of citrus fruit, green apples and white peaches, underscored by elegant oral hints. Fresh and tasty in the mouth, enticing and enjoyable. \r\n\r\nSERVING AND PAIRING\r\nServing temperature: 6-10 °C. Ideal for wine by the glass, as a standalone appetiser or with tapas. It is a good choice to enjoy with mild rice dishes, white meats, cold creams, sh and shell sh. \r\n\r\n', '200.00', 'Popular “Premium” Wine', 23, '40.00'),
(109, 'TEMPRANILLO GARNACHA TINTA Y', 'https://vivancoculturadevino.es/img/bodega/losvinos/vino_2_big.png?v=2023', 'full-bodied', 12.22, 'high', 3.41, 'high', 'Vivanco', '2022', '750 ml', 'Tempranillo', 'Rosé', 'THE BOTTLE\r\nOur bottle is inspired in an original eighteenth-century bottle that is on exhibit at the Vivanco Museum of the Culture of Wine.\r\n\r\nTHE LABEL\r\nThe artwork Sucus, made by Laura Martín Calleja, illustrates the label of this vintage in our Vivanco rosé. This piece, which expresses the fresh red fruit of our wine, has been selected among the exhibitors in the XII Edition of the International Prize of Engraving and Wine of the Vivanco Foundation.\r\n\r\nTASTING NOTES\r\nLively, bright pink with purple hues. To the nose, it o ers aromas of red liquorice, raspberries, and strawberries, all of them wrapped in a oral component of roses and violets. Fresh and creamy in the mouth, with a well-balanced acidity and a avoursome, fruity nish. \r\n\r\nSERVING AND PAIRING\r\nServing temperature: 8-10 °C. Ideal for wine by the glass, as a standalone appetiser or accompanying all kinds of tapas. It is a good choice to enjoy with vegetable dishes, barbecues, all kinds of salads, white meats, cold creams, pasta and assorted charcuterie. ', '230.00', 'Popular “Premium” Wine', 23, '46.00'),
(110, '4 VARIETALES', 'https://vivancoculturadevino.es/img/bodega/losvinos/vino_5_big.png?v=2023', 'full-bodied', 14.56, 'high', 3.86, 'low', 'Vivanco', '2020', '750 ml', 'Graciano', 'Red', 'AGEING\r\n16-month stay in barrels from different cooperages, with different toasting levels and origins, without racking. Each of the four wines remains over lees until bottled, with periodic bâtonnages during the first months. The wines are racked and bottled without filtering or fining, so a small amount of natural precipitate may appear over time.\r\n\r\nTHE BOTTLE\r\nOur bottle is inspired in an original eighteenth-century bottle that is on exhibit at the Vivanco Museum of the Culture of Wine.\r\n\r\nTASTING NOTES\r\nVery intense garnet-cherry red. Powerful, complex aroma, with abundant ripe red and dark fruit, and well-integrated find wood. There are also elegant mineral notes, spices, toffee and liquorice. Very expressive in the mouth, with a silky, fresh, tasty, intense mouthfeel, leaving a long aftertaste, complex and elegant.\r\n\r\nPAIRING\r\nAll kinds of char-grilled red meat, foie gras, casseroles and game dishes.', '500.00', 'Premium', 23, '100.00'),
(111, 'PARCELAS DE GARNACHA', 'https://vivancoculturadevino.es/img/bodega/losvinos/vino_6_big.png?v=2023', 'full-bodied', 14.87, 'high', 3.76, 'low', 'Vivanco', '2019', '750 ml', 'Garnacha', 'Red', 'THE BOTTLE\r\nOur bottle is inspired in an original eighteenth-century bottle that is on exhibit at the Vivanco Museum of the Culture of Wine.\r\n\r\nTASTING NOTES\r\nVery intense garnet-cherry red. Powerful, complex aroma, with abundant ripe red and dark fruit, and well-integrated find wood. There are also elegant mineral notes, spices, toffee and liquorice. Very expressive in the mouth, with a silky, fresh, tasty, intense mouthfeel, leaving a long aftertaste, complex and elegant.\r\n\r\nPAIRING\r\nAll kinds of char-grilled red meat, foie gras, casseroles and game dishes.', '760.00', 'Ultra Premium ', 23, '152.00'),
(112, 'PARCELAS DE MAZUELO', 'https://vivancoculturadevino.es/img/bodega/losvinos/vino_7_big.png?v=2023', 'full-bodied', 14, 'high', 3.83, 'low', 'Vivanco', '2019', '750 ml', 'Mazuelo', 'Red', 'THE BOTTLE\r\nOur bottle is inspired in an original eighteenth-century bottle that is on exhibit at the Vivanco Museum of the Culture of Wine.\r\n\r\nTASTING NOTES\r\nDeep purple, with a garnet-red rim inking the glass. Intense aromas of ripe black and red fruit (blackberries, raspberries), underbrush, fresh herbs and coffee, all of it enveloped by an earthy, mineral component. In the mouth, it is very fresh, fruity and balsamic, with soft tannins and a long, powerful, complex, persistent finish.\r\n\r\nPAIRING\r\nStews, pulses, meat casseroles and all kinds of char-grilled meat.', '680.00', 'Ultra Premium Wine', 23, '136.00'),
(113, 'PARCELAS DE MATURANA TINTA', 'https://vivancoculturadevino.es/img/bodega/losvinos/vino_8_big.png?v=2023', 'full-bodied', 14.5, 'high', 3.61, 'low', 'Vivanco', '2019', '750 ml', 'Maturana Tinta', 'Red', 'THE BOTTLE\r\nOur bottle is inspired in an original eighteenth-century bottle that is on exhibit at the Vivanco Museum of the Culture of Wine.\r\n\r\nTASTING NOTES\r\nVery deep purplish-red, with a marked purple rim. Spicy aromas, with dark fruit, peppercorns, cloves, mulberry leaves, against a mineral and underbrush background. Very balsamic and mineral in the mouth, also with spicy sensations (peppercorns, roses, cummin, cloves) with an elegant, vibrant mouthfeel and long finish.\r\n\r\nPAIRING\r\nAll kinds of char-grilled and roasted meats, cured cheese and game dishes', '632.00', 'Ultra Premium Wine', 23, '126.00'),
(114, '4 VARIETALES BLANCO DE GUARDA', 'https://vivancoculturadevino.es/img/bodega/losvinos/vino_11_big.png?v=2023', 'full-bodied', 13.5, 'high', 3.21, 'high', 'Vivanco', '2019', '750 ml', 'Garnacha Blanca', 'White', 'TASTING NOTES\r\nBright green, almost electric hues  belie its three years’ ageing. Overwhelming, complex nose, with tremendous mineral and hydrocarbon notes, denoting its ageing on the lees. Over time, notes of candied fruit appear, although fresh and lively. The mouth is a superb opportunity for enjoyment. Long, dense, with a salinity that almost speaks of other lands. A wine to enjoy that will continue to grow over time.\r\n\r\nPAIRING\r\nShellfish, vegetables and all kinds of fish, particularly blue and fatty fish. Cheeses, rice dishes... It is a wine to enjoy by the glass on any occasion.', '437.00', 'Super-Premium', 23, '87.00'),
(115, 'VIVANCO CUVÉE INÉDITA RESERVA EXTRA BRUT', 'https://vivancoculturadevino.es/img/bodega/premios/vino_12.png?v=2023', 'full-bodied', 13.4, 'medium', 3.15, 'medium', 'Vivanco', '2019', '750 ml', 'Viura', 'White', 'TASTING NOTES\r\nPale yellow, lively and intense,\r\nstarting to show its long aging in the bottle. Fine bubbles and persistent. Fresh, complex aromas of stone fruit, white flowers, citrus fruit and tertiary notes of nuts and brioche; very well assembled. In the mouth it is effervescent yet smooth with a creamy texture that shows, once again, a balance between the vibrant acidity of youth and the elegant cloak of maturity. The finish is deep and delicate, with an enticing mineral and saline background.\r\n\r\nPAIRING\r\nA very food-focused, versatile wine that can be enjoyed from start to finish with shellfish (oysters, scallops, prawns), sushi, sashimi, foie gras, Iberian ham, Caesar salad, salmon in puff pastry, paella, pasta, roast lamb, pigeon, turbot or monkfish in the oven, goat\'s cheese, Comté cheese and dark chocolate with olive oil and fleur de sel, to name a few options.', '450.00', 'Super-Premium', 23, '90.00'),
(116, 'VIVANCO CUVÉE INÉDITA ROSADO RESERVA EXTRA BRUT', 'https://vivancoculturadevino.es/img/bodega/losvinos/vino_14_big.png?v=2023', 'full-bodied', 12.3, 'medium', 3.32, 'high', 'Vivanco', '2020', '750 ml', 'Garnacha Tinta', 'Sparkling', 'TASTING NOTES\r\nPale salmon-pink, showing its long maturation in the bottle. Fine bubbles and persistent. Fresh, complex aromas of red and citrus fruit and tertiary notes of nuts and brioche; very well assembled. In the mouth it is effervescent yet with a creamy texture that shows, once again, a balance between vibrant acidity and the elegant cloak of maturity. The finish is deep and delicate, with an enticing fruit-laden, mineral background.\r\n\r\nPAIRING\r\nA very food-focused, versatile wine that can be enjoyed from start to finish with shellfish (oysters, scallops, prawns), sushi, sashimi, foie gras, Iberian ham, caesar salad, salmon in puff pastry, paella, pasta, roast lamb, pigeon, turbot or monkfish in the oven, goat’s cheese, Comté cheese and dark chocolate with olive oil and fleur de sel, to name a few options.', '425.00', 'Super-Premium', 23, '85.00'),
(128, 'Barossa Valley White', 'https://fusws.api.aspedia.io/turkeyflat-website/2022%20Marsanne%20Roussanne-NV.jpg?preset=wineproductdetails&t=1675730268590', 'full-bodied', 12.5, 'high', 3.2, 'high', 'Turkey Flat Vineyards', '2022', '750 ml', 'Marsanne', 'White', 'Rich and multi-layered on the nose with honeydew and fresh citrus combining beautifully with hints of creamy nougat, gun smoke and ginger spice. The palate is full of tension, with stone fruit and lemon cured hemmed in by a tight acid drive and long textured finish. \r\n\r\nTasting Notes\r\nThe underlying rich medley of fresh & roasted stone fruit is laced with toast and spice, with a crisp zesty hit of ginger on the lingering finish.', '320.00', 'Premium', 24, '64.00'),
(129, 'Turkey Flat Rose', 'https://fusws.api.aspedia.io/turkeyflat-website/Bottles/Turkey_Flat_Ros%C3%A9_NV_750ml.png?preset=wineproductdetails&t=1607053723116', 'full-bodied', 12.5, 'medium', 3.1, 'high', 'Turkey Flat Vineyards', '2022', '750 ml', 'Rosé', 'Rosé', 'The Turkey Flat Rosé is the result of nearly thirty years of refinement in technique. Our style has become archetypal of Australian Rosé, with fresh, aromatic fruit, florals and spice on the nose, satisfying body and texture on the palate, and a clean, savoury-shift on the finish. Grenache is the star of this wine and is picked in multiple parcels across the vintage to provide the components for a wine that is a masterclass in blending.', '320.00', 'Premium', 24, '64.00'),
(130, 'Butchers Block Red', 'https://fusws.api.aspedia.io/turkeyflat-website/Bottles/Turkey_Flat_Butchers_Block_Red_NV.png?preset=wineproductdetails&t=1607053675160', 'medium-bodied', 14.1, 'high', 3.61, 'low', 'Turkey Flat Vineyards', '2020', '750 ml', 'Shiraz', 'Red', 'Each varietal is vinified & aged individually in French oak barrels before the final blending process. Shiraz adds the generous mouthfeel, Grenache the spice and cherry-like sweetness and Mataro the backbone, savoury edge and fragrance. Balance is crucial, each varietal’s contribution is evident, yet nothing competes for your attention.\r\n\r\nTasting Notes\r\nA medium-bodied palate with red and black berries. Layers of spice, dark plum, cassis and berry fruit adorn the palate - pleasantly held together by fine tannins. Smooth & delicious.', '320.00', 'Premium', 24, '64.00'),
(131, 'Butchers Block Shiraz', 'https://fusws.api.aspedia.io/turkeyflat-website/Bottles/Turkey_Flat_Butchers_Block_Shiraz_NV.png?preset=wineproductdetails&t=1607053670926', 'medium-bodied', 14.1, 'high', 3.56, 'medium', 'Turkey Flat Vineyards', '2021', '750 ml', 'Shiraz', 'Red', 'Source blocks were selected for spice and lift, representing a fresher and more layered version of ‘Barossa Valley shiraz’. 15% whole bunch used to increase spice and structure, with 100% old oak allowing fruit to take the fore. \r\n\r\nTasting Notes\r\nA medium-bodied palate with juicy dark berry fruits, blueberries, violets, graphite and flint, held together with fine, supple tannins. Smooth & delicious. Drink now!', '360.00', 'Premium', 24, '64.00'),
(132, 'Turkey Flat Mataro', 'https://fusws.api.aspedia.io/turkeyflat-website/Bottles/Turkey_Flat_Mataro_NV.png?preset=wineproductdetails&t=1607053688973', 'full-bodied', 14.1, 'high', 3.72, 'low', 'Turkey Flat Vineyards', '2021', '750 ml', 'Mataro', 'Red', 'A fresh and exciting representation of Mataro. The opening bouquet hints of forest fruit flavours. A touch of savory with sophistication sees this playful and seamless wine coat the palate with joy. Subtle oak integration over a brief eight months adds fine tannins to the finish. \r\n\r\nTasting Notes\r\nColour\r\nA medium to dark purple with magenta hue.\r\nAroma\r\nThe opening bouquet hints of forest fruit flavours.\r\n\r\nPalate\r\nA touch of savory with sophistication sees this playful and seamless wine coat the palate with joy. Subtle oak integration over a brief eight months adds fine tannins to the finish. ', '513.00', 'Super-Premium Wine', 24, '103.00'),
(133, 'Turkey Flat Grenache', 'https://fusws.api.aspedia.io/turkeyflat-website/Bottles/Turkey_Flat_Grenache_NV.png?preset=wineproductdetails&t=1607053685738', 'full-bodied', 13.8, 'high', 3.3, 'medium', 'Turkey Flat Vineyards', '2021', '750 ml', 'Grenache', 'Red', 'We remain respectful to our past tradition of making Grenache into a fine wine, while moving seamlessly into a more refined, contemporary style. The wine was fermented with 15% whole bunch with half the remaining stems also included in the ferment. Maturation took place in a combination of neutral oak Foudre and neutral oak puncheons. The resulting wine shows beautiful floral and spiced aromatics, bright fruit that fills out into more complex spiced and savoury characteristics, and strong tannins that will ensure longevity. \r\n\r\nTasting Notes\r\nAroma\r\nBeautiful floral and spiced aromatics, bright fruit that fills out into more complex spiced and savoury characteristics, and strong tannins that will ensure longevity.', '577.00', 'Ultra Premium Wine', 24, '115.00'),
(134, 'Pedro Ximenez NV', 'https://fusws.api.aspedia.io/turkeyflat-website/tf-pedro-ximenez-375ml%20(2).jpg?preset=wineproductdetails&t=1637029653973', 'full-bodied', 18, 'high', 3.2, 'high', 'Turkey Flat Vineyards', '2021', '375 ml', 'Pedro Ximenez', 'Fortified', 'Aged using a Solera system, this blended wine has an average age of 7 years. Careful consideration is given to creating nutty characters with a background of freshness.\r\n\r\nTasting Notes\r\nColour\r\nAmber\r\n\r\nPalate\r\nDisplay attractive marmalade and citrus peel characters.\r\n\r\nFood Pairing\r\nRich foods, sweet or savoury. Best picks? Chocolate truffles, Christmas pudding, pate, figs, sticky ribs, blue cheese & charcuterie. Serve chilled.', '450.00', 'Super-Premium', 24, '90.00'),
(135, 'Quinquina White', 'https://fusws.api.aspedia.io/turkeyflat-website/Bottles/Web/Turkey_Flat_Quinquina_NV.png?preset=wineproductdetails&t=1611992555845', 'full-bodied', 21, 'high', 3.06, 'high', 'Turkey Flat Vineyards', '2022', '750 ml', 'Marsanne', 'White', 'Marsanne was pressed, settled, racked and began fermentation. Our aromats were thrown in at 5 Baume and continued to ferment with the juice until the blend was fortified at 1 Baume. The Quinquina continued to infuse for a further 3 months (differing from the traditional method of adding aromatised spirit to wine). A slow process of separately simmering small batches of cinchona bark and extracting a bitter quinine solution proceeded. This solution was added just prior to bottling. It is this process that makes this wine a Quinquina (or Chinati). \r\n\r\nTasting Notes\r\nPalate\r\nIntense citrus with floral notes and a delicious, bitter kick to the finish.', '515.00', 'Super-Premium Wine', 24, '103.00'),
(136, 'Quinquina Red', 'https://fusws.api.aspedia.io/turkeyflat-website/QuinQuina.jpg?preset=wineproductdetails&t=1683069752175', 'full-bodied', 21, 'high', 3.56, 'medium', 'Turkey Flat Vineyards', '2022', '750 ml', 'Red Marsanne', 'Red', 'Marsanne was pressed, settled, racked and began fermentation. Our aromats were thrown in at 5 Baume and continued to ferment with the juice until the blend was fortified at 1 Baume. The Quinquina continued to infuse for a further 3 months (differing from the traditional method of adding aromatised spirit to wine). A slow process of separately simmering small batches of cinchona bark and extracting a bitter quinine solution proceeded. This solution was added just prior to bottling. It is this process that makes this wine a Quinquina (or Chinati). \r\n\r\nTasting Notes\r\nPalate\r\nIntense citrus with floral notes and a delicious, bitter kick to the finish.', '515.00', 'Super-Premium Wine', 24, '103.00'),
(137, 'Turkey Flat Shiraz', 'https://fusws.api.aspedia.io/turkeyflat-website/Bottles/Turkey_Flat_Shiraz_NV.png?preset=wineproductdetails&t=1607053691973', 'full-bodied', 14.1, 'high', 3.53, 'medium', 'Turkey Flat Vineyards', '2019', '750 ml', 'Flat Shiraz', 'Red', 'This Shiraz is a result of a very intricate blending process. After each parcel of fruit is individually vinified & aged in specially selected French oak barrels, the final blend is created with careful consideration to upholding its reputation for cellaring gracefully, retaining its freshness and balance for many years. ', '705.00', 'Ultra Premium', 24, '141.00');

-- --------------------------------------------------------

--
-- Table structure for table `wine_reviews`
--

CREATE TABLE `wine_reviews` (
  `Wine_ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Rating` int(11) NOT NULL,
  `Comment` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wine_reviews`
--

INSERT INTO `wine_reviews` (`Wine_ID`, `UserID`, `Rating`, `Comment`) VALUES
(1, 1, 3, 'It was quite bitter.'),
(1, 2, 5, 'I absolutely loved this wine! It\'s perfectly balanced and pairs well with a variety of dishes.'),
(2, 3, 2, 'This wine is below average. It lacks depth and complexity.'),
(2, 4, 1, 'Not impressed with this wine. It tastes bland and has an off-putting aftertaste.'),
(3, 5, 5, 'This wine is outstanding! It has a complex flavor profile and a long, satisfying finish.'),
(3, 6, 4, 'I really enjoyed this wine. It\'s well-balanced and has a great aroma.'),
(4, 7, 2, 'Unfortunately, this wine didn\'t meet my expectations. It lacks flavor and character.'),
(4, 8, 3, 'An average wine. It\'s drinkable, but nothing extraordinary.'),
(5, 9, 4, 'I highly recommend this wine. It has a unique flavor profile and is very enjoyable.'),
(5, 10, 5, 'One of the best wines I\'ve ever tasted. It\'s rich, velvety, and simply delightful.'),
(6, 11, 3, 'This wine is decent. It has some good qualities, but it\'s not exceptional.'),
(6, 12, 4, 'I found this wine to be quite enjoyable. It has a nice balance of flavors.'),
(7, 13, 5, 'Wow! This wine is absolutely amazing. It\'s full-bodied and bursting with flavors.'),
(7, 14, 4, 'I had a great experience with this wine. It\'s well-made and has a delightful taste.'),
(8, 15, 3, 'This wine is average. It\'s neither impressive nor disappointing.'),
(8, 16, 2, 'Not my favorite wine. It lacks complexity and has a slightly bitter aftertaste.'),
(9, 17, 4, 'I really liked this wine. It\'s smooth, well-balanced, and has a pleasant finish.'),
(9, 18, 5, 'An outstanding wine! It exceeded my expectations with its rich flavors and complexity.'),
(10, 19, 4, 'I had a wonderful experience with this wine. It\'s flavorful and well-rounded.'),
(10, 20, 5, 'This wine is exceptional! It\'s a true delight for the palate.'),
(11, 5, 5, 'This is the best wine I have ever had!'),
(11, 21, 3, 'This wine is average. It\'s neither remarkable nor disappointing.'),
(11, 22, 2, 'Not impressed with this wine. It lacks complexity and depth.'),
(12, 23, 5, 'Wow! This wine is outstanding. It\'s bold, elegant, and full of character.'),
(12, 24, 4, 'I thoroughly enjoyed this wine. It has a great balance of flavors.'),
(13, 1, 4, 'I had a great experience with this wine. It exceeded my expectations.'),
(13, 2, 3, 'This wine is decent. It\'s enjoyable but not exceptional.'),
(14, 3, 5, 'This wine is a true gem. It\'s rich, complex, and absolutely delicious.'),
(14, 4, 4, 'I highly recommend this wine. It\'s a delightful experience for the senses.'),
(15, 5, 3, 'This wine is average. It\'s neither remarkable nor disappointing.'),
(15, 6, 2, 'Not my favorite wine. It lacks depth and complexity.'),
(16, 5, 4, 'It takes like nothing I have ever had before'),
(16, 7, 5, 'Wow! This wine is exceptional. It\'s a true masterpiece.'),
(16, 8, 4, 'I thoroughly enjoyed this wine. It\'s well-balanced and full of flavor.'),
(17, 9, 4, 'This wine is fantastic. It\'s bold, elegant, and incredibly enjoyable.'),
(17, 10, 5, 'I can\'t recommend this wine enough. It\'s absolutely outstanding.'),
(18, 11, 3, 'This wine is decent. It\'s enjoyable but lacks the wow factor.'),
(18, 12, 2, 'Not impressed with this wine. It\'s rather ordinary.'),
(19, 13, 5, 'Wow! This wine is absolutely amazing. It\'s a must-try.'),
(19, 14, 4, 'I had a fantastic experience with this wine. It\'s truly delightful.'),
(20, 15, 4, 'This wine is excellent. It\'s well-crafted and delicious.'),
(20, 16, 3, 'I enjoyed this wine. It\'s pleasant but not exceptional.'),
(28, 1, 4, 'I really enjoyed this wine. It has a great balance of flavors.'),
(28, 2, 5, 'This wine is exceptional. It\'s one of the best I\'ve tasted.'),
(29, 3, 3, 'This wine is decent. It\'s not outstanding but still enjoyable.'),
(29, 4, 2, 'I found this wine to be average. It didn\'t impress me.'),
(29, 5, 5, 'Truly remarkable wine!'),
(30, 5, 4, 'Wow! This wine is amazing. It exceeded my expectations.'),
(30, 6, 5, 'I highly recommend this wine. It\'s a true gem.'),
(31, 7, 3, 'This wine is good. It\'s a solid choice for casual enjoyment.'),
(31, 8, 4, 'I enjoyed this wine. It has a nice complexity.'),
(32, 5, 4, 'Decent WIne!'),
(32, 9, 5, 'This wine is outstanding. It\'s rich and full-bodied.'),
(32, 10, 4, 'I can\'t get enough of this wine. It\'s truly exceptional.'),
(33, 11, 3, 'This wine is average. It didn\'t stand out among others.'),
(33, 12, 2, 'Not my favorite wine. It lacks depth.'),
(34, 13, 4, 'I really liked this wine. It has a unique character.'),
(34, 14, 5, 'This wine is fantastic. It\'s a true delight.'),
(35, 15, 3, 'This wine is decent. It\'s enjoyable for casual occasions.'),
(35, 16, 4, 'I found this wine to be quite enjoyable. It has good complexity.'),
(36, 17, 5, 'Wow! This wine is exceptional. It\'s a must-try.'),
(36, 18, 4, 'I highly recommend this wine. It\'s truly remarkable.'),
(37, 19, 3, 'This wine is good. It\'s a safe choice for any occasion.'),
(37, 20, 4, 'I enjoyed this wine. It has a nice balance of flavors.'),
(37, 25, 1, 'Bad Wine'),
(38, 21, 5, 'This wine is outstanding. It\'s a real gem.'),
(38, 22, 4, 'I can\'t get enough of this wine. It\'s truly fantastic.'),
(39, 23, 3, 'This wine is average. It didn\'t leave a strong impression.'),
(39, 24, 2, 'Not my favorite wine. It lacks complexity.'),
(40, 1, 4, 'I really liked this wine. It has a nice depth of flavor.'),
(40, 2, 5, 'This wine is fantastic. It\'s a true delight.'),
(41, 3, 3, 'This wine is decent. It\'s enjoyable but not extraordinary.'),
(41, 4, 2, 'I found this wine to be average. It didn\'t stand out.'),
(41, 5, 5, 'Great Wine!'),
(41, 25, 1, 'This is my new review'),
(42, 5, 5, 'Fantastic Wine!'),
(42, 6, 5, 'I highly recommend this wine. It\'s a real treat.'),
(43, 5, 1, 'Worst Wine I ever had!'),
(43, 7, 3, 'This wine is good. It\'s a safe choice for any occasion.'),
(43, 8, 4, 'I enjoyed this wine. It has a nice balance of flavors.'),
(44, 9, 5, 'This wine is outstanding. It\'s truly exceptional.'),
(44, 10, 4, 'I can\'t get enough of this wine. It\'s absolutely amazing.'),
(44, 25, 1, 'Bad Review'),
(88, 2, 3, 'I liked this wine, but it\'s not my favorite.'),
(88, 3, 4, 'Nice balance of flavors in this wine.'),
(89, 4, 5, 'One of the best wines I\'ve ever tasted.'),
(89, 5, 5, 'This wine is absolutely incredible.'),
(90, 6, 2, 'Not a fan of this wine. Too sweet for my taste.'),
(90, 7, 1, 'Terrible wine. Would not recommend.'),
(91, 8, 4, 'Really enjoyed this wine. Great value for the price.'),
(91, 9, 5, 'Exquisite wine! Highly recommended.'),
(92, 10, 3, 'This wine is okay, but I\'ve had better.'),
(92, 11, 2, 'Disappointing wine. Lacks complexity.'),
(93, 12, 5, 'Outstanding wine! A must-try.'),
(93, 13, 4, 'I can\'t get enough of this wine.'),
(94, 14, 3, 'Decent wine, but nothing extraordinary.'),
(94, 15, 4, 'Enjoyed the flavors in this wine.'),
(95, 16, 5, 'Impressive wine. Truly exceptional.'),
(95, 17, 5, 'This wine is a delight for the senses.'),
(96, 18, 2, 'Not my cup of tea. The wine is too acidic.'),
(96, 19, 1, 'Awful wine. Avoid at all costs.'),
(97, 6, 5, 'Superb wine! Can\'t recommend it enough.'),
(97, 20, 4, 'Really liked this wine. Would buy again.'),
(98, 1, 3, 'Average wine. Nothing special.'),
(98, 2, 4, 'Nice aroma and good balance of flavors.'),
(99, 3, 5, 'One of the finest wines I\'ve ever had.'),
(99, 4, 5, 'This wine is simply divine.'),
(100, 5, 2, 'Didn\'t enjoy this wine. Too bitter for my taste.'),
(100, 6, 1, 'Terrible wine. Steer clear.'),
(101, 7, 4, 'Really enjoyed this wine. Pleasantly surprised.'),
(101, 8, 5, 'Exquisite wine! Will definitely buy again.'),
(102, 9, 3, 'Decent wine, but not outstanding.'),
(102, 10, 2, 'Not impressed with this wine. It lacks depth.'),
(103, 11, 5, 'This wine is outstanding. Truly exceptional.'),
(103, 12, 4, 'I cannot get enough of this wine.'),
(104, 13, 3, 'I liked this wine, but it\'s not my favorite.'),
(104, 14, 4, 'Nice balance of flavors in this wine.'),
(105, 15, 5, 'One of the best wines I\'ve ever tasted.'),
(105, 16, 5, 'This wine is absolutely incredible.'),
(106, 17, 2, 'Not a fan of this wine. Too sweet for my taste.'),
(106, 18, 1, 'Terrible wine. Would not recommend.'),
(107, 19, 4, 'Really enjoyed this wine. Great value for the price.'),
(107, 20, 5, 'Exquisite wine! Highly recommended.'),
(108, 1, 2, 'Disappointing wine. Lacks complexity.'),
(108, 3, 3, 'This wine is okay, but I\'ve had better.'),
(109, 2, 5, 'Outstanding wine! A must-try.'),
(109, 3, 4, 'I can\'t get enough of this wine.'),
(110, 4, 3, 'Decent wine, but nothing extraordinary.'),
(110, 5, 4, 'Enjoyed the flavors in this wine.'),
(111, 6, 5, 'Impressive wine. Truly exceptional.'),
(111, 7, 5, 'This wine is a delight for the senses.'),
(112, 8, 2, 'Not my cup of tea. The wine is too acidic.'),
(112, 9, 1, 'Awful wine. Avoid at all costs.'),
(113, 10, 4, 'Really liked this wine. Would buy again.'),
(113, 11, 5, 'Superb wine! Can\'t recommend it enough.'),
(114, 12, 3, 'Average wine. Nothing special.'),
(114, 13, 4, 'Nice aroma and good balance of flavors.'),
(115, 14, 5, 'One of the finest wines I\'ve ever had.'),
(115, 15, 5, 'This wine is simply divine.'),
(116, 16, 2, 'Didn\'t enjoy this wine. Too bitter for my taste.'),
(116, 17, 1, 'Terrible wine. Steer clear.'),
(128, 1, 4, 'I found this wine to be quite enjoyable. It had a nice balance of flavors and a smooth finish.'),
(128, 2, 3, 'This wine was decent, but it didn\'t leave a lasting impression on me.'),
(129, 3, 5, 'Wow! This wine is absolutely amazing. It has a rich and complex flavor profile that I can\'t get enough of.'),
(129, 4, 5, 'I must say, this wine exceeded my expectations. It\'s definitely one of the best wines I\'ve ever tasted.'),
(130, 5, 2, 'Unfortunately, this wine didn\'t suit my palate. It was too sweet for my liking.'),
(130, 6, 1, 'I really didn\'t enjoy this wine. It had an unpleasant aftertaste and lacked depth.'),
(131, 7, 4, 'I thoroughly enjoyed this wine. It offers great value for the price and has a delightful flavor.'),
(131, 8, 5, 'An exquisite wine that left me wanting more. Highly recommended!'),
(132, 9, 3, 'This wine is decent, but I\'ve had better. It lacked the complexity I was hoping for.'),
(132, 10, 2, 'I was disappointed with this wine. It didn\'t live up to my expectations and felt flat.'),
(133, 11, 5, 'Outstanding! This wine truly impressed me with its exceptional quality and unique flavors.'),
(133, 12, 4, 'I can\'t get enough of this wine. It\'s become one of my favorites.'),
(134, 13, 3, 'This wine is decent, but it didn\'t stand out from the crowd. It\'s just average.'),
(134, 14, 4, 'I enjoyed the flavors in this wine. It had a nice balance and went down smoothly.'),
(135, 15, 5, 'Impressive! This wine is truly exceptional. It\'s a must-try for any wine lover.'),
(135, 16, 5, 'A delightful wine that engages all the senses. It\'s a true gem.'),
(136, 17, 2, 'Unfortunately, this wine wasn\'t to my liking. It was too acidic and didn\'t appeal to my palate.'),
(136, 18, 1, 'I found this wine to be terrible. I would advise avoiding it at all costs.'),
(137, 19, 4, 'I really liked this wine. It had a pleasant taste and I would definitely buy it again.'),
(137, 20, 5, 'Superb! This wine is absolutely fantastic. I can\'t recommend it enough.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bemail`
--
ALTER TABLE `bemail`
  ADD PRIMARY KEY (`BusinessID`,`BEmail`);

--
-- Indexes for table `bnumber`
--
ALTER TABLE `bnumber`
  ADD PRIMARY KEY (`BusinessID`,`BNumber`);

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`Business_ID`),
  ADD KEY `UserConstraint` (`User_ID`),
  ADD KEY `RegionConstraint` (`Region_ID`);

--
-- Indexes for table `business_reviews`
--
ALTER TABLE `business_reviews`
  ADD PRIMARY KEY (`Business_ID`,`User_ID`),
  ADD KEY `UserIDbr_idx` (`User_ID`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`EventID`),
  ADD KEY `BusinessIDother` (`BusinessID`);

--
-- Indexes for table `favourite_business`
--
ALTER TABLE `favourite_business`
  ADD PRIMARY KEY (`UserID`,`BusinessID`),
  ADD KEY `BusinessIDFB_idx` (`BusinessID`);

--
-- Indexes for table `favourite_wine`
--
ALTER TABLE `favourite_wine`
  ADD PRIMARY KEY (`WineID`,`UserID`),
  ADD KEY `UserID_idx` (`UserID`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`Region_ID`),
  ADD UNIQUE KEY `Region_ID_UNIQUE` (`Region_ID`);

--
-- Indexes for table `tourist`
--
ALTER TABLE `tourist`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`,`Region_id`),
  ADD UNIQUE KEY `UserID_UNIQUE` (`UserID`),
  ADD KEY `Region` (`Region_id`);

--
-- Indexes for table `wine`
--
ALTER TABLE `wine`
  ADD PRIMARY KEY (`WineID`),
  ADD UNIQUE KEY `WineID_UNIQUE` (`WineID`),
  ADD KEY `BusinessConstraint1` (`Business_ID`);

--
-- Indexes for table `wine_reviews`
--
ALTER TABLE `wine_reviews`
  ADD PRIMARY KEY (`Wine_ID`,`UserID`),
  ADD KEY `User_ID_idx` (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `Business_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `EventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `Region_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `wine`
--
ALTER TABLE `wine`
  MODIFY `WineID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bemail`
--
ALTER TABLE `bemail`
  ADD CONSTRAINT `BusinessIDemail` FOREIGN KEY (`BusinessID`) REFERENCES `business` (`Business_ID`);

--
-- Constraints for table `bnumber`
--
ALTER TABLE `bnumber`
  ADD CONSTRAINT `BusinessIDbnum` FOREIGN KEY (`BusinessID`) REFERENCES `business` (`Business_ID`);

--
-- Constraints for table `business`
--
ALTER TABLE `business`
  ADD CONSTRAINT `RegionConstraint` FOREIGN KEY (`Region_ID`) REFERENCES `region` (`Region_ID`),
  ADD CONSTRAINT `UserConstraint` FOREIGN KEY (`User_ID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `business_reviews`
--
ALTER TABLE `business_reviews`
  ADD CONSTRAINT `BusinessIDbr` FOREIGN KEY (`Business_ID`) REFERENCES `business` (`Business_ID`),
  ADD CONSTRAINT `UserIDbr` FOREIGN KEY (`User_ID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `BusinessIDother` FOREIGN KEY (`BusinessID`) REFERENCES `business` (`Business_ID`);

--
-- Constraints for table `favourite_business`
--
ALTER TABLE `favourite_business`
  ADD CONSTRAINT `BusinessIDFB` FOREIGN KEY (`BusinessID`) REFERENCES `business` (`Business_ID`),
  ADD CONSTRAINT `UserIDFB` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `favourite_wine`
--
ALTER TABLE `favourite_wine`
  ADD CONSTRAINT `UserID` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `WineID` FOREIGN KEY (`WineID`) REFERENCES `wine` (`WineID`),
  ADD CONSTRAINT `favourite_wine_ibfk_1` FOREIGN KEY (`WineID`) REFERENCES `wine` (`WineID`) ON DELETE CASCADE;

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `UserIDManager` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `tourist`
--
ALTER TABLE `tourist`
  ADD CONSTRAINT `UserIDtourist` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `Region` FOREIGN KEY (`Region_id`) REFERENCES `region` (`Region_ID`);

--
-- Constraints for table `wine`
--
ALTER TABLE `wine`
  ADD CONSTRAINT `BusinessConstraint` FOREIGN KEY (`Business_ID`) REFERENCES `business` (`Business_ID`),
  ADD CONSTRAINT `BusinessConstraint1` FOREIGN KEY (`Business_ID`) REFERENCES `business` (`Business_ID`) ON DELETE CASCADE;

--
-- Constraints for table `wine_reviews`
--
ALTER TABLE `wine_reviews`
  ADD CONSTRAINT `User` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `Wine_ID` FOREIGN KEY (`Wine_ID`) REFERENCES `wine` (`WineID`),
  ADD CONSTRAINT `Wine_ID_Constraint` FOREIGN KEY (`Wine_ID`) REFERENCES `wine` (`WineID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
