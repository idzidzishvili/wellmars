-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 16, 2021 at 03:40 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wellmars`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address_ge` varchar(200) DEFAULT NULL,
  `address_en` varchar(200) NOT NULL,
  `address_ru` varchar(200) NOT NULL,
  `map_url` text DEFAULT NULL,
  `facebook` varchar(200) DEFAULT NULL,
  `twitter` varchar(200) DEFAULT NULL,
  `instagram` varchar(200) DEFAULT NULL,
  `pinterest` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `phone`, `email`, `address_ge`, `address_en`, `address_ru`, `map_url`, `facebook`, `twitter`, `instagram`, `pinterest`) VALUES
(1, '(+633) 577-56-45-55', 'info@wellmars.com', 'საქართველო, ყაზბეგი', 'Georgia, Kazbegi', 'Грузия, Казбеги', 'https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3011.9179446064927!2d44.6158971607837!3d42.62379986166091!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1ska!2s!4v1622562369861!5m2!1ska!2s', 'https://www.facebook.com/wellmars', 'https://www.twitter.com/wellmars', 'https://www.instagram.com/wellmars', '');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
CREATE TABLE IF NOT EXISTS `galleries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `galleryname_ge` varchar(200) NOT NULL,
  `galleryname_en` varchar(200) NOT NULL,
  `galleryname_ru` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `galleryname_ge`, `galleryname_en`, `galleryname_ru`) VALUES
(1, 'მთის სურათები', 'Mountain Images', 'Mountain Images Ru'),
(2, 'ზღვის სურათები', 'Sea images', 'Sea images Ru'),
(5, 'მაგარი გალერეა', 'Cool gallery', 'Cool gallery RU');

-- --------------------------------------------------------

--
-- Table structure for table `galleryimages`
--

DROP TABLE IF EXISTS `galleryimages`;
CREATE TABLE IF NOT EXISTS `galleryimages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_id` int(11) NOT NULL,
  `filename` varchar(250) NOT NULL,
  `ismain` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `galleryimages`
--

INSERT INTO `galleryimages` (`id`, `gallery_id`, `filename`, `ismain`) VALUES
(1, 2, '05658ca39c1f1e322001.jpg', 0),
(2, 2, '05658ca39c1f1e322002.jpg', 1),
(3, 2, '05658ca39c1f1e322003.jpg', 0),
(14, 1, '799fdd42be29d2be1002.jpg', 0),
(5, 2, '4dd4549dc0765b152002.jpg', 0),
(7, 2, 'f68b9681d5b420a72001.jpg', 0),
(13, 1, '799fdd42be29d2be1001.jpg', 0),
(15, 1, '799fdd42be29d2be1003.jpg', 0),
(12, 2, 'cd701b301cc6434c2003.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hotelimages`
--

DROP TABLE IF EXISTS `hotelimages`;
CREATE TABLE IF NOT EXISTS `hotelimages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotelid` int(11) NOT NULL,
  `filename` varchar(200) NOT NULL,
  `ismain` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotelimages`
--

INSERT INTO `hotelimages` (`id`, `hotelid`, `filename`, `ismain`) VALUES
(1, 1, 'a1f20b6d17f2934b001.jpg', 0),
(2, 1, 'a1f20b6d17f2934b002.jpg', 0),
(3, 1, 'a1f20b6d17f2934b003.jpg', 1),
(4, 1, 'a1f20b6d17f2934b004.jpg', 0),
(5, 1, 'a1f20b6d17f2934b005.jpg', 0),
(6, 1, '70820bdf6a3ab3a2001.jpg', 0),
(7, 1, '70820bdf6a3ab3a2002.jpg', 0),
(8, 1, '70820bdf6a3ab3a2003.jpg', 1),
(9, 1, '70820bdf6a3ab3a2004.jpg', 0),
(10, 1, '70820bdf6a3ab3a2005.jpg', 0),
(12, 9, 'e6c0e3ec71e79524002.jpg', 1),
(13, 9, 'e6c0e3ec71e79524003.jpg', 0),
(14, 9, 'e6c0e3ec71e79524004.jpg', 0),
(16, 10, '306b5285707191d0001.jpg', 1),
(17, 10, '306b5285707191d0002.jpg', 0),
(18, 10, '306b5285707191d0003.jpg', 0),
(19, 10, '306b5285707191d0004.jpg', 0),
(21, 11, '6b1a0389160ad03a001.jpg', 1),
(22, 11, '6b1a0389160ad03a002.jpg', 0),
(23, 11, '6b1a0389160ad03a003.jpg', 0),
(24, 11, '6b1a0389160ad03a004.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hotelorders`
--

DROP TABLE IF EXISTS `hotelorders`;
CREATE TABLE IF NOT EXISTS `hotelorders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `room_id` int(11) NOT NULL,
  `order_name` varchar(200) NOT NULL,
  `order_email` varchar(200) NOT NULL,
  `order_phone` varchar(200) NOT NULL,
  `num_persons` int(11) NOT NULL,
  `color` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotelorders`
--

INSERT INTO `hotelorders` (`id`, `user_id`, `startdate`, `enddate`, `room_id`, `order_name`, `order_email`, `order_phone`, `num_persons`, `color`) VALUES
(2, 1, '2021-05-08', '2021-05-09', 1, '', '', '', 0, '#288064'),
(3, 1, '2021-05-13', '2021-05-15', 1, '', '', '', 0, '#683398'),
(4, 2, '2021-05-28', '2021-05-30', 2, '', '', '', 0, '#228f1a'),
(5, 3, '2021-05-05', '2021-05-08', 3, '', '', '', 0, '#8e6a5c'),
(6, 4, '2021-05-05', '2021-05-09', 2, '', '', '', 0, '#b9ba74'),
(7, 1, '2021-05-25', '2021-05-29', 15, '', '', '', 0, '#1089ba'),
(8, 2, '2021-05-17', '2021-05-29', 14, '', '', '', 0, '#3170ab'),
(9, 1, '2021-05-17', '2021-05-20', 15, '', '', '', 0, '#67bfa1'),
(10, 1, '2021-05-20', '2021-05-23', 15, 'ჯემალ ბაღათურია', 'jemala@gmail.com', '(1234)-567-892', 3, '#1f7b00'),
(11, 4, '2021-05-17', '2021-05-24', 6, 'kikliko', 'kikliko@gmail.com', '8293749328', 2, '#49a272'),
(12, 1, '2021-05-17', '2021-05-24', 7, 'shaliko', 'shaliko@gmail.com', '4324232', 2, '#749777'),
(13, 2, '2021-05-18', '2021-05-22', 8, 'bondo', 'bondo@gmail.com', '4324232', 2, '#394b55'),
(14, 2, '2021-05-10', '2021-05-12', 14, '4534534', 'jondo@gmail.com', '(1234)-567-892', 2, '#4f8bc8');

-- --------------------------------------------------------

--
-- Table structure for table `hotelreviews`
--

DROP TABLE IF EXISTS `hotelreviews`;
CREATE TABLE IF NOT EXISTS `hotelreviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotelreviews`
--

INSERT INTO `hotelreviews` (`id`, `hotel_id`, `user_id`, `rating`, `review`, `date`) VALUES
(1, 9, 2, 3, 'მომეწონა, კარგი სასტუმროა', '2021-06-07'),
(2, 9, 3, 5, 'კარგი სასტუმრო იყო, კარგი მომსახურეობით', '2021-05-08'),
(3, 9, 4, 3, 'არ მომეწონა', '2021-05-06'),
(4, 9, 2, 5, 'kargi sastumroa', '2021-05-08'),
(5, 9, 2, 1, 'არ მომეწონა', '2021-05-08'),
(6, 9, 3, 3, 'მომეწონა სერვისი', '2021-06-18'),
(7, 9, 4, 2, 'kargi sastumroa, კიდევ ვესტუმრები', '2021-05-20'),
(8, 9, 5, 4, 'მომეწონა გარემო', '2021-06-07'),
(9, 9, 6, 5, 'სუფთა ოთახები აქვს', '2021-05-22'),
(10, 9, 7, 3, 'kargi sastumroa', '2021-06-05'),
(12, 10, 2, 2, 'ds ghasdljkn ghfldkjfhg lsdkjf sldkjfh slkdjfh-2qoeq pkisoi sdloahfjoisafds', '2021-05-08'),
(13, 10, 3, 2, 'asjkdh alskjdhalskjdh alskjhadl90a as\';a\';sd aslkdjals.', '2021-06-13'),
(14, 9, 1, 4, 'yt berrt dfg dfg fd', '2021-06-13');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

DROP TABLE IF EXISTS `hotels`;
CREATE TABLE IF NOT EXISTS `hotels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_ge` varchar(250) DEFAULT NULL,
  `type_en` varchar(250) DEFAULT NULL,
  `type_ru` varchar(250) DEFAULT NULL,
  `hotel_ge` text DEFAULT NULL,
  `hotel_en` text DEFAULT NULL,
  `hotel_ru` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `type_ge`, `type_en`, `type_ru`, `hotel_ge`, `hotel_en`, `hotel_ru`) VALUES
(9, 'ლუქსი ნომრები', 'Luxury rooms', 'Номера люкс', '<p>სასტუმრო არის დაწესებულება, რომელიც უზრუნველყოფს მოკლევადიან გადასახადს. სასტუმროს ოთახში განთავსებული საშუალებები შეიძლება შეიცავდეს მცირე ოთახის ზომიერი ლეიბებიდან დაწყებული დიდი ლუქებით უფრო დიდი, უმაღლესი ხარისხის საწოლებით, კომოდით, მაცივრით და სამზარეულოს სხვა საშუალებებით, რბილი სკამებით, ტელევიზორის ბრტყელი ეკრანით და სველი წერტილები. მცირე, დაბალ ფასიან სასტუმროებში შესაძლებელია შემოგთავაზოთ მხოლოდ ყველაზე ძირითადი მომსახურებები და მომსახურებები. უფრო დიდ, უფრო მაღალ ფასებში განთავსებულ სასტუმროებში შესაძლებელია დამატებითი სტუმრების მოწყობა, როგორიცაა საცურაო აუზი, ბიზნეს ცენტრი (კომპიუტერებით, პრინტერებით და სხვა საოფისე ტექნიკით), ბავშვების მოვლა, საკონფერენციო და ღონისძიებების საშუალებები, ჩოგბურთის ან კალათბურთის კორტები, გიმნაზია, რესტორნები, დღის სპა, და სოციალური ფუნქციის სერვისები. სასტუმროს ნომრები, როგორც წესი, დანომრილია (ან დასახელებულია ზოგიერთ პატარა სასტუმროსა და საოჯახო სასტუმროში), რათა სტუმრებს საშუალება ჰქონდეთ ამოიცნონ თავიანთი ოთახი....<br></p>', '<p>A hotel is an establishment that provides paid lodging on a short-term basis. Facilities provided inside a hotel room may range from a modest-quality mattress in a small room to large suites with bigger, higher-quality beds, a dresser, a refrigerator and other kitchen facilities, upholstered chairs, a flat screen television, and en-suite bathrooms. Small, lower-priced hotels may offer only the most basic guest services and facilities. Larger, higher-priced hotels may provide additional guest facilities such as a swimming pool, business centre (with computers, printers, and other office equipment), childcare, conference and event facilities, tennis or basketball courts, gymnasium, restaurants, day spa, and social function services. Hotel rooms are usually numbered (or named in some smaller hotels and B&Bs) to allow guests to identify their rooms....<br></p>', '<p>Гостиница - это заведение, предоставляющее платное жилье на краткосрочной основе. Удобства, предоставляемые в гостиничном номере, могут варьироваться от матраса скромного качества в маленькой комнате до больших люксов с более крупными высококачественными кроватями, комодом, холодильником и другими кухонными принадлежностями, мягкими стульями, телевизором с плоским экраном и ванной комнатой. ванные комнаты. Небольшие отели с более низкими ценами могут предлагать только самые основные услуги и удобства. Более крупные отели с более высокими ценами могут предоставить дополнительные удобства для гостей, такие как бассейн, бизнес-центр (с компьютерами, принтерами и другим офисным оборудованием), присмотр за детьми, помещения для конференций и мероприятий, теннисные корты или баскетбольные площадки, тренажерный зал, рестораны, дневной спа-салон, и социальные услуги. Гостиничные номера обычно пронумерованы (или названы в некоторых небольших отелях и B & B), чтобы гости могли идентифицировать свою комнату....<br></p>'),
(10, 'ჩვეულებრივი ნომრები', 'Regular rooms', 'Обычный номери', '<p>ჩვეულებრივ, პრომო ოთახი შედის იაფ ტურებში. ამ ტიპის ოთახი შესაფერისია იმ ტურისტებისთვის, რომლებიც მთელ დროს ატარებენ არა სასტუმროში, არამედ სანაპიროზე, საყიდლებზე ან ექსკურსიებზე. აქ კი შეგიძლიათ ღირსეულად დაზოგოთ ტურის ღირებულება პრომო ოთახში ყოფნისას.</p>', '<p>Usually, the promo room is included in the cheap tours. This type of room is suitable for tourists who spend all their time not in the hotel but on the beach, shopping or excursions. And here you can save the cost of the tour while staying in the promo rooms.</p>', '<p>Обычно в дешевые туры входит промо-номер. Этот тип номера подходит для туристов, которые проводят все время не в отеле, а на пляже, в магазинах или на экскурсиях. А здесь можно сэкономить на стоимости тура, остановившись в промо-руме.<br></p>'),
(11, 'საოჯახო ნომრები', 'Family rooms', 'Семейные номера', '<p>საოჯახო ოთახი არის არაფორმალური, ყველა დანიშნულების ოთახი სახლში. საოჯახო ოთახი შექმნილია ისე, რომ ოჯახი და სტუმრები იკრიბებიან ჯგუფური დასვენებისთვის, როგორიცაა საუბარი, კითხვა, ტელევიზორის ყურება და სხვა საოჯახო საქმიანობა. [1] [2] ხშირად, საოჯახო ოთახი მდებარეობს სამზარეულოს მეზობლად, ზოგჯერ კი მასში ვიზუალური შესვენების გარეშე მიედინება. [3] საოჯახო ოთახს ხშირად აქვს კარები, რომელიც უკანა ეზოსკენ მიდის და გარე საცხოვრებელი ადგილები, როგორიცაა გემბანი, ბაღი ან ტერასა.</p><p><br></p><p>ტერმინი საოჯახო ოთახი განსაზღვრულია ჯორჯ ნელსონისა და ჰენრი რაიტის 1945 წლის წიგნში „ხვალ სახლი“. სახელწოდებით \"ოთახი უსახელო ოთახი\" ლაპარაკობდა თანამედროვე ცხოვრებაში \"ახალი ყველაზე დიდი ოთახის\" საჭიროებაზე, რომელიც მთელი ოჯახის სოციალურ და რეკრეაციულ საჭიროებებს მოემსახურებოდა, რაც საშუალებას მისცემდა მისაღები ოთახის საქმიანობას.</p><p><br></p><p>ამ \"დიდ ოთახს\" ექნება ავეჯი და მასალები, რომლებიც იყო \"მკაცრი\", მყარი გამოყენებისთვის და მისი გაწმენდა ადვილი უნდა იყოს. იმ დროისთვის არსებული \"რუმპუსის ოთახებისგან\" განსხვავებით, ის ზოგჯერ ემსახურებოდა ოდნავ უფრო ოფიციალურ გართობას, ამიტომ ის უნდა იყოს ლამაზი ოთახი და უნდა ჰქონდეს კარადები, სადაც სათამაშოები, ხელსაწყოები და ა.შ.</p>', '<p xss=removed>A family room is an informal, all-purpose room in a <a href=\"https://en.wikipedia.org/wiki/House\" title=\"House\">house</a>. The family room is designed to be a place where <a href=\"https://en.wikipedia.org/wiki/Family\" title=\"Family\">family</a> and guests gather for group recreation like talking, reading, watching TV, and other family activities.<a href=\"https://en.wikipedia.org/wiki/Family_room#cite_note-1\">[1]</a><a href=\"https://en.wikipedia.org/wiki/Family_room#cite_note-2\">[2]</a><span xss=removed> Often, the family room is located adjacent to the </span><a href=\"https://en.wikipedia.org/wiki/Kitchen\" title=\"Kitchen\">kitchen</a><span xss=removed>, and at times, flows into it with no visual breaks.</span><a href=\"https://en.wikipedia.org/wiki/Family_room#cite_note-3\">[3]</a><span xss=removed> A family room often has doors leading to the back yard and specific outdoor living areas such as a </span><a href=\"https://en.wikipedia.org/wiki/Deck_(building)\" title=\"Deck (building)\">deck</a><span xss=removed>, </span><a href=\"https://en.wikipedia.org/wiki/Garden\" title=\"Garden\">garden</a><span xss=removed>, or </span><a href=\"https://en.wikipedia.org/wiki/Terrace_(gardening)\" class=\"mw-redirect\" title=\"Terrace (gardening)\">terrace</a><span xss=removed>.</span></p><p xss=removed>The term family room is defined in the 1945 book <a href=\"https://en.wikipedia.org/w/index.php?title=Tomorrow\'s_House&action=edit&redlink=1\" class=\"new\" title=\"Tomorrow\'s House (page does not exist)\">Tomorrow\'s House</a> by <a href=\"https://en.wikipedia.org/wiki/George_Nelson_(designer)\" title=\"George Nelson (designer)\">George Nelson</a> and Henry Wright.<span xss=removed> entitled \"The Room Without a Name\" spoke of the need in modern life for a new \"biggest room in the house\" that would serve the social and recreational needs of the entire family, allowing activities that would not be permitted in the living room.</span></p><p xss=removed>This \"big room\" would have furnishings and materials that were \"tough\", for hard use, and it should be easy to clean. In contrast with the existing \"<a href=\"https://en.wikipedia.org/wiki/Rumpus_room\" class=\"mw-redirect\" title=\"Rumpus room\">rumpus rooms</a>\" of the time, it would occasionally serve for slightly more formal entertainment, so it should be a handsome room and should have cupboards where toys, tools, etc. could be kept out of sight.</p>', '<p>Семейная комната - это неформальная универсальная комната в доме. Семейная комната спроектирована как место, где семья и гости собираются для группового отдыха, например, для общения, чтения, просмотра телевизора и других семейных мероприятий. [1] [2] Часто семейная комната находится рядом с кухней и иногда перетекает в нее без видимых перерывов [3]. В семейной комнате часто есть двери, ведущие на задний двор и в определенные жилые зоны на открытом воздухе, такие как терраса, сад или терраса.</p><p><br></p><p>Термин «семейная комната» определен в книге Джорджа Нельсона и Генри Райта 1945 года «Дом будущего». под названием «Комната без имени» говорилось о необходимости современной жизни в новой «самой большой комнате в доме», которая удовлетворяла бы социальные и рекреационные потребности всей семьи, позволяя проводить мероприятия, запрещенные в гостиной.</p><p><br></p><p>Мебель и материалы этой «большой комнаты» должны быть «жесткими» для тяжелых условий эксплуатации, и ее должно быть легко чистить. В отличие от существовавших в то время «шумных комнат», она иногда служила для немного более формальных развлечений, поэтому это должна быть красивая комната и в ней должны быть шкафы, где игрушки, инструменты и т. Д. Можно было бы держать вне поля зрения.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `hotelstable`
--

DROP TABLE IF EXISTS `hotelstable`;
CREATE TABLE IF NOT EXISTS `hotelstable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `room_1` int(11) NOT NULL DEFAULT 0,
  `room_2` int(11) NOT NULL DEFAULT 0,
  `room_3` int(11) NOT NULL DEFAULT 0,
  `room_4` int(11) NOT NULL DEFAULT 0,
  `room_5` int(11) NOT NULL DEFAULT 0,
  `room_6` int(11) NOT NULL DEFAULT 0,
  `room_7` int(11) NOT NULL DEFAULT 0,
  `room_8` int(11) NOT NULL DEFAULT 0,
  `room_9` int(11) NOT NULL DEFAULT 0,
  `room_10` int(11) NOT NULL DEFAULT 0,
  `room_11` int(11) NOT NULL DEFAULT 0,
  `room_12` int(11) NOT NULL DEFAULT 0,
  `room_13` int(11) NOT NULL DEFAULT 0,
  `room_14` int(11) NOT NULL DEFAULT 0,
  `room_15` int(11) NOT NULL DEFAULT 0,
  `room_16` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotelstable`
--

INSERT INTO `hotelstable` (`id`, `date`, `room_1`, `room_2`, `room_3`, `room_4`, `room_5`, `room_6`, `room_7`, `room_8`, `room_9`, `room_10`, `room_11`, `room_12`, `room_13`, `room_14`, `room_15`, `room_16`) VALUES
(1, '2021-05-07', 0, 6, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, '2021-05-08', 2, 6, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, '2021-05-09', 2, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, '2021-05-10', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 14, 0, 0),
(5, '2021-05-11', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 14, 0, 0),
(6, '2021-05-12', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, '2021-05-13', 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, '2021-05-14', 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, '2021-05-15', 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, '2021-05-16', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, '2021-05-17', 0, 0, 0, 0, 0, 11, 12, 0, 0, 0, 0, 0, 0, 8, 9, 0),
(12, '2021-05-18', 0, 0, 0, 0, 0, 11, 12, 13, 0, 0, 0, 0, 0, 8, 9, 0),
(13, '2021-05-19', 0, 0, 0, 0, 0, 11, 12, 13, 0, 0, 0, 0, 0, 8, 9, 0),
(14, '2021-05-20', 0, 0, 0, 0, 0, 11, 12, 13, 0, 0, 0, 0, 0, 8, 10, 0),
(15, '2021-05-21', 0, 0, 0, 0, 0, 11, 12, 13, 0, 0, 0, 0, 0, 8, 10, 0),
(16, '2021-05-22', 0, 0, 0, 0, 0, 11, 12, 0, 0, 0, 0, 0, 0, 8, 10, 0),
(17, '2021-05-23', 0, 0, 0, 0, 0, 11, 12, 0, 0, 0, 0, 0, 0, 8, 0, 0),
(18, '2021-05-24', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8, 0, 0),
(19, '2021-05-25', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8, 7, 0),
(20, '2021-05-26', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8, 7, 0),
(21, '2021-05-27', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8, 7, 0),
(22, '2021-05-28', 0, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8, 7, 0),
(23, '2021-05-29', 0, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 8, 7, 0),
(24, '2021-05-30', 0, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(25, '2021-05-31', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(26, '2021-06-01', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(27, '2021-06-02', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(28, '2021-06-03', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(29, '2021-06-04', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(30, '2021-06-05', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(31, '2021-06-06', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(32, '2021-06-07', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(33, '2021-06-08', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(34, '2021-06-09', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(35, '2021-06-10', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(36, '2021-05-06', 0, 6, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(37, '2021-05-05', 0, 6, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hoteltexts`
--

DROP TABLE IF EXISTS `hoteltexts`;
CREATE TABLE IF NOT EXISTS `hoteltexts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text_ge` varchar(255) NOT NULL,
  `text_en` varchar(255) NOT NULL,
  `text_ru` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hoteltexts`
--

INSERT INTO `hoteltexts` (`id`, `text_ge`, `text_en`, `text_ru`) VALUES
(1, 'საუკეთესო სასტუმროები მხოლოდ ჩვენთან', 'The best hotels only with us', 'Лучшие отели только у нас');

-- --------------------------------------------------------

--
-- Table structure for table `mainsliders`
--

DROP TABLE IF EXISTS `mainsliders`;
CREATE TABLE IF NOT EXISTS `mainsliders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mainsliders`
--

INSERT INTO `mainsliders` (`id`, `filename`) VALUES
(20, '4af8434c9f5a2bf1004.png'),
(21, '6dfe3f5c57a0ecd3001.jpg'),
(23, 'b6da03278b7d4e7e001.jpg'),
(24, 'b6da03278b7d4e7e002.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `roomtypes`
--

DROP TABLE IF EXISTS `roomtypes`;
CREATE TABLE IF NOT EXISTS `roomtypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roomtypes`
--

INSERT INTO `roomtypes` (`id`, `hotel_type`) VALUES
(1, 11),
(2, 11),
(3, 11),
(4, 11),
(5, 11),
(6, 10),
(7, 10),
(8, 10),
(9, 10),
(10, 10),
(11, 10),
(12, 10),
(13, 10),
(14, 9),
(15, 9),
(16, 0);

-- --------------------------------------------------------

--
-- Table structure for table `slidertexts`
--

DROP TABLE IF EXISTS `slidertexts`;
CREATE TABLE IF NOT EXISTS `slidertexts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  `text_ge` varchar(250) NOT NULL,
  `text_en` varchar(250) NOT NULL,
  `text_ru` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slidertexts`
--

INSERT INTO `slidertexts` (`id`, `description`, `text_ge`, `text_en`, `text_ru`) VALUES
(1, 'Header', 'იმოგზაურეთ ჩვენთან ერთად', 'travel with us', 'Путешествуйте с нами'),
(2, 'Static text', 'ისიამოვნეთ', 'Enjoy', 'Наслаждаться'),
(3, 'Changeable text', 'თავგადასავლებით, დასვენებით, მთებით', 'Adventure,Holiday,Mountain', 'Adventure,Holiday,Mountain');

-- --------------------------------------------------------

--
-- Table structure for table `tourimages`
--

DROP TABLE IF EXISTS `tourimages`;
CREATE TABLE IF NOT EXISTS `tourimages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tourid` int(11) NOT NULL,
  `filename` varchar(250) NOT NULL,
  `ismain` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=278 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tourimages`
--

INSERT INTO `tourimages` (`id`, `tourid`, `filename`, `ismain`) VALUES
(272, 83, 'e63243e31661d9c7001.jpg', 0),
(276, 77, 'd1b5121d4e64b63a001.jpg', 1),
(267, 81, 'tourimage081.jpg', 1),
(268, 82, 'a49607d2e00faff4001.jpg', 0),
(205, 77, '0bd13c6e0dc0a315001.jpg', 0),
(200, 77, '328a27ade4300247001.jpg', 0),
(203, 77, '2466c05a7287c247001.png', 0),
(273, 83, 'e63243e31661d9c7002.jpg', 0),
(274, 83, 'e63243e31661d9c7003.jpg', 1),
(269, 82, 'a49607d2e00faff4002.jpg', 0),
(270, 82, 'a49607d2e00faff4003.jpg', 0),
(271, 82, 'a49607d2e00faff4004.jpg', 1),
(192, 76, 'tourimage076.png', 1),
(266, 77, '0313cf18a598edb8003.png', 0),
(263, 77, '5059c285dbf2c249002.jpg', 0),
(258, 77, 'e0590fed2e4fbc99001.jpg', 0),
(275, 83, 'e63243e31661d9c7004.jpg', 0),
(257, 77, 'e8d0dd084ce21257002.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

DROP TABLE IF EXISTS `tours`;
CREATE TABLE IF NOT EXISTS `tours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tourid` int(11) DEFAULT NULL,
  `istour` tinyint(1) NOT NULL DEFAULT 0,
  `tourname_ge` varchar(250) DEFAULT NULL,
  `tourname_en` varchar(250) DEFAULT NULL,
  `tourname_ru` varchar(250) DEFAULT NULL,
  `duration_ge` varchar(100) DEFAULT NULL,
  `duration_en` varchar(100) DEFAULT NULL,
  `duration_ru` varchar(100) DEFAULT NULL,
  `destination_ge` varchar(200) DEFAULT NULL,
  `destination_en` varchar(200) DEFAULT NULL,
  `destination_ru` varchar(200) DEFAULT NULL,
  `description_ge` text DEFAULT NULL,
  `description_en` text DEFAULT NULL,
  `description_ru` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`id`, `tourid`, `istour`, `tourname_ge`, `tourname_en`, `tourname_ru`, `duration_ge`, `duration_en`, `duration_ru`, `destination_ge`, `destination_en`, `destination_ru`, `description_ge`, `description_en`, `description_ru`) VALUES
(83, 81, 1, 'ველო ტური კახეთში', 'Bike tours in Kakheti', 'Велосипедные туры в Кахети', '3 დღე', '3 Days', '3 Dney', 'თბილისი თელავი', 'Tbilisi Telavi', 'Tbilisi Telavi', '<p>ველოსიპედის ტური გთავაზობთ ყველაფრის დაგეგმვას, რაც თქვენთვის დაგეგმილია: სასტუმროები, საიჯარო ველოსიპედები, მარშრუტები, კვება, ბარგის ტრანსფერი, ღირსშესანიშნაობების ტურები და ა.შ. სახელმძღვანელოები აღნიშნავენ ღირსშესანიშნავ ადგილებს, აწყობენ ექსკურსიებსა და საქმიანობებს და არიან ავარიების შემთხვევაში (მექანიკური ან ადამიანური).</p><p><br></p><p>დამხმარე და პერსონალი განსხვავდება ტურისტული და ტურისტული კომპანიების მიხედვით, მაგრამ, როგორც წესი, ერთი მეგზური მიდის ჯგუფთან, ხოლო მეორე სახელმძღვანელო თქვენი ბარგით მართავს საყრდენ ფურგონს. ფურგონის საშუალებით შესაძლებელია მარშრუტის ნაკლებად მიმზიდველი ან უფრო რთული მონაკვეთების გადაკვეთა.</p><p><br></p><p>როგორც წესი, ველოსიპედით ივლით 8 – დან 20 – კაციან ჯგუფში, როგორც წესი, რამდენიმე სხვადასხვა ქვეყნიდან, რაც ქმნის ახალ ნაცნობებსა და საერთაშორისო მეგობრობას. ტუროპერატორების უმეტესობა გთავაზობთ სრულყოფილ ინფორმაციულ პაკეტს, სადაც მოცემულია რჩევები ღირშესანიშნაობების, კულტურული ღირსშესანიშნაობების და სცენური გაჩერების შესახებ (თუმცა ინგლისურ ენაზე მასალების მოცულობა განსხვავებულია ტუროპერატორის მიხედვით)</p>', '<p>This bicycle tour provides the convenience of having everything planned out for you: hotels, rental bikes, routes, meals, luggage transfers, sightseeing tours and so on. The guides point out places of interest, organize excursions and activities and are there in case of breakdowns (mechanical or human).</p><p><br></p><p>Support and personnel vary by tour and tour company, but one guide typically rides with the group, while a second guide drives a support van with your luggage. The van also makes it possible to bridge less attractive or more challenging sections of a route.</p><p><br></p><p>You usually bike in a group of 8 to 20 people, typically from several different countries, which makes for new acquaintances and international friendships. Most tour operators provide you with a comprehensive information package with tips on sights, cultural highlights, and scenic stops (although the extent of materials in English varies by tour operator).</p>', '<p>Этот велосипедный тур обеспечивает удобство, когда все спланировано для вас: отели, прокат велосипедов, маршруты, питание, трансферы багажа, обзорные экскурсии и так далее. Гиды указывают на достопримечательности, организуют экскурсии и мероприятия, а также присутствуют в случае поломки (механической или человеческой).</p><p><br></p><p>Поддержка и персонал различаются в зависимости от тура и туристической компании, но один гид обычно едет с группой, а второй гид ведет фургон поддержки с вашим багажом. Фургон также позволяет преодолевать менее привлекательные или более сложные участки маршрута.</p><p><br></p><p>Обычно вы ездите на велосипеде в группе от 8 до 20 человек, как правило, из нескольких разных стран, что способствует новым знакомствам и международной дружбе. Большинство туроператоров предоставляют вам исчерпывающий пакет информации с советами о достопримечательностях, культурных достопримечательностях и живописных остановках (хотя объем материалов на английском языке зависит от туроператора).</p>'),
(81, NULL, 0, 'ველო ტურები', 'Bike tours', 'Велосипедные туры', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(82, 81, 1, 'ველო ტური რუსთავში', 'Bike tours in Rustavi', 'Велосипедные туры в Рустави', '3 დღე', '3 days', '3 dney', 'თბილისი რუსთავი', 'Tbilisi rusTavi', 'Tbilisi rusTavi', '<p>თუ გსიამოვნებთ ჯგუფთან ერთად მოგზაურობა, ახალი ხალხის გაცნობა და ყოველდღიური სახელმძღვანელო და სტრუქტურირებული გრაფიკი, მაშინ ჯგუფური ველოსიპედით მართვა საუკეთესო არჩევანია თქვენთვის.</p><p><br></p><p>ველო ტურები უზრუნველყოფს თქვენთვის დაგეგმილი ყველაფრის მოხერხებულობას: სასტუმროები, საიჯარო ველოსიპედები, მარშრუტები, კვება, ბარგის ტრანსფერი, ღირსშესანიშნაობების ტურები და ა.შ. სახელმძღვანელოები აღნიშნავენ ღირსშესანიშნავ ადგილებს, აწყობენ ექსკურსიებსა და საქმიანობებს და არიან ავარიების შემთხვევაში (მექანიკური ან ადამიანური).</p><p><br></p><p>დამხმარე და პერსონალი განსხვავდება ტურისტული და ტურისტული კომპანიების მიხედვით, მაგრამ, როგორც წესი, ერთი მეგზური მიდის ჯგუფთან, ხოლო მეორე სახელმძღვანელო თქვენი ბარგით მართავს საყრდენ ფურგონს. ფურგონის საშუალებით შესაძლებელია მარშრუტის ნაკლებად მიმზიდველი ან უფრო რთული მონაკვეთების გადაკვეთა.</p>', '<p>If you enjoy traveling with a group, meeting new people, and having a guide and structured daily schedule, then a guided group bike tour is probably the best fit for you.</p><p><br></p><p>These bicycle tours provide the convenience of having everything planned out for you: hotels, rental bikes, routes, meals, luggage transfers, sightseeing tours and so on. The guides point out places of interest, organize excursions and activities and are there in case of breakdowns (mechanical or human).</p><p><br></p><p>Support and personnel vary by tour and tour company, but one guide typically rides with the group, while a second guide drives a support van with your luggage. The van also makes it possible to bridge less attractive or more challenging sections of a route.</p>', '<p>Если вам нравится путешествовать с группой, знакомиться с новыми людьми, иметь гида и структурированный ежедневный график, то групповой велосипедный тур с гидом, вероятно, вам больше всего подойдет.</p><p><br></p><p>Эти велосипедные туры обеспечивают удобство, когда все спланировано для вас: отели, прокат велосипедов, маршруты, питание, трансферы багажа, обзорные экскурсии и так далее. Гиды указывают на достопримечательности, организуют экскурсии и мероприятия, а также присутствуют в случае поломки (механической или человеческой).</p><p><br></p><p>Поддержка и персонал различаются в зависимости от тура и туристической компании, но один гид обычно едет с группой, а второй гид ведет фургон поддержки с вашим багажом. Фургон также позволяет преодолевать менее привлекательные или более сложные участки маршрута.</p>'),
(76, NULL, 0, 'კულტურული ტურები', 'Cultural tours', 'Культурные туры', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(77, 76, 1, 'კულტურული ტური რუსთავში', 'Cultural tours in Rustavi', 'Культурные туры Rustavi', '3 დღე', '3 days', '3 дня', 'თბილისი - რუსთავი', 'Tbilisi - Rustavi', 'Tbilisi - Rustavi', '<p>რუსთავი — ქალაქი და მუნიციპალიტეტი საქართველოში, ქვემო ქართლის მხარის ადმინისტრაციული ცენტრი. ქალაქი 1948 წლის 19 იანვრიდან. მდებარეობს ქვემო ქართლის ვაკეზე, მდინარე მტკვრის ორივე ნაპირას, ზღვის დონიდან 370 მ სიმაღლეზე. რუსთავი თბილისის აგლომერაციაში მყოფი ქალაქებიდან უდიდესია. თბილისსა და რუსთავს შორის უმოკლესი მანძილია 7,66 კილომეტრი. ქალაქის ტერიტორია 60 კვ. კმ-ს შეადგენს, მოსახლეობა 125 103 ადამიანი. რუსთავი საქართველოს უმთავრესი სამრეწველო ქალაქია თბილისის შემდეგაც.<br></p>', '<p>Rustavi - a city and municipality in Georgia, the administrative center of the Kvemo Kartli region. City since 19 January 1948. Located on the plain of Kvemo Kartli, on both banks of the river Mtkvari, at an altitude of 370 m above sea level. Rustavi is one of the largest cities in Tbilisi. The shortest distance between Tbilisi and Rustavi is 7.66 kilometers. City area 60 sq.m. Km, population 125,103 people. Rustavi is the main industrial city of Georgia after Tbilisi.<br></p>', '<p>Рустави - город и муниципалитет в Грузии, административный центр региона Квемо Картли. Город с 19 января 1948 года. Он расположен на равнине Квемо Картли, на обоих берегах реки Мтквари, на высоте 370 м над уровнем моря. Рустави - один из крупнейших городов Тбилиси. Кратчайшее расстояние между Тбилиси и Рустави составляет 7,66 километра. Площадь города 60 кв.м. Км, население 125 103 чел. Рустави - главный промышленный город Грузии после Тбилиси.<br></p>');

-- --------------------------------------------------------

--
-- Table structure for table `tourtexts`
--

DROP TABLE IF EXISTS `tourtexts`;
CREATE TABLE IF NOT EXISTS `tourtexts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text_ge` varchar(255) NOT NULL,
  `text_en` varchar(255) NOT NULL,
  `text_ru` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tourtexts`
--

INSERT INTO `tourtexts` (`id`, `text_ge`, `text_en`, `text_ru`) VALUES
(1, 'საუკეთესო ტურები მხოლოდ ჩვეეენთან2', 'The best tours only with us', 'Лучшие туры только у нас');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(250) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_role` int(11) NOT NULL DEFAULT 2,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `phone` varchar(200) DEFAULT NULL,
  `recoverystring` varchar(200) DEFAULT NULL,
  `avatar` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `user_role`, `status`, `phone`, `recoverystring`, `avatar`, `created_at`) VALUES
(1, NULL, 'admin@wellmars.com', '$2y$10$c8n0Nq.zVoJ8b2/7Ss4che0S2EtaHsGr4z7QXB9YUIkerafuFewJO', 1, 1, NULL, NULL, NULL, '2021-06-03 05:39:45'),
(2, NULL, 'user01@gmail.com', '$2y$10$ZVUqAurcgSROqodZ5jYgVeway75FGsp54AiwxfI1F/X0nJaNU77nC', 2, 1, '598-23-23-25', 'n6TBFKcbfIWsaMF8HsL5BJQVHqM9VtKbXhUcb7Bn38F9o9Q7Ig6kzRIMJfYAJESwqUF5TQre2wUzfngWR8oVenxHRnYQu1ywHJ6p61KCqGOdmIwYHWmM3EVui2UwxlEq', 'avatar2.jpg', '2021-06-05 07:31:56'),
(3, 'user02 user02', 'user02@gmail.com', '$2y$10$qw6frk8Hd1UQI.2.2GgltuWW6fEk2JAdZnNCg5iA.jDgLqHs7gs2u', 2, 1, NULL, NULL, NULL, '2021-06-13 14:37:57'),
(4, 'ilia dzidzishvili', 'ilia.dzidzishvili@gmail.com', '$2y$10$4.IQepL16oWUZNqRdh/mwusP1TB6./8uIq85eTloDr5dLuFRsAbfu', 2, 1, NULL, 'FUbceWSa8z90ZjPZb7EcEScsNodlRIfjV621o105CIbjoSyVIYevNsmksEfzkX9fQcEr7msZxvPc8Ljyqn4mWBMRAnRfcRBwLSNLSbLrr8krsccWBafeTPBx1H3sHdsA', NULL, '2021-06-13 14:56:39');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
