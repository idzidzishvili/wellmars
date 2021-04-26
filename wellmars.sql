-- phpMyAdmin SQL Dump
-- version 4.9.7deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 08, 2021 at 05:57 PM
-- Server version: 8.0.23-0ubuntu0.20.10.1
-- PHP Version: 7.4.9

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
-- Table structure for table `hotelimages`
--

CREATE TABLE `hotelimages` (
  `id` int NOT NULL,
  `hotelid` int NOT NULL,
  `filename` varchar(200) NOT NULL,
  `ismain` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(17, 10, '306b5285707191d0002.jpg', 1),
(18, 10, '306b5285707191d0003.jpg', 0),
(19, 10, '306b5285707191d0004.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int NOT NULL,
  `type_ge` varchar(250) DEFAULT NULL,
  `type_en` varchar(250) DEFAULT NULL,
  `type_ru` varchar(250) DEFAULT NULL,
  `hotel_ge` text,
  `hotel_en` text,
  `hotel_ru` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `type_ge`, `type_en`, `type_ru`, `hotel_ge`, `hotel_en`, `hotel_ru`) VALUES
(9, 'ლუქსი ნომრები', 'Luxury rooms', 'Номера люкс', '<p>სასტუმრო არის დაწესებულება, რომელიც უზრუნველყოფს მოკლევადიან გადასახადს. სასტუმროს ოთახში განთავსებული საშუალებები შეიძლება შეიცავდეს მცირე ოთახის ზომიერი ლეიბებიდან დაწყებული დიდი ლუქებით უფრო დიდი, უმაღლესი ხარისხის საწოლებით, კომოდით, მაცივრით და სამზარეულოს სხვა საშუალებებით, რბილი სკამებით, ტელევიზორის ბრტყელი ეკრანით და სველი წერტილები. მცირე, დაბალ ფასიან სასტუმროებში შესაძლებელია შემოგთავაზოთ მხოლოდ ყველაზე ძირითადი მომსახურებები და მომსახურებები. უფრო დიდ, უფრო მაღალ ფასებში განთავსებულ სასტუმროებში შესაძლებელია დამატებითი სტუმრების მოწყობა, როგორიცაა საცურაო აუზი, ბიზნეს ცენტრი (კომპიუტერებით, პრინტერებით და სხვა საოფისე ტექნიკით), ბავშვების მოვლა, საკონფერენციო და ღონისძიებების საშუალებები, ჩოგბურთის ან კალათბურთის კორტები, გიმნაზია, რესტორნები, დღის სპა, და სოციალური ფუნქციის სერვისები. სასტუმროს ნომრები, როგორც წესი, დანომრილია (ან დასახელებულია ზოგიერთ პატარა სასტუმროსა და საოჯახო სასტუმროში), რათა სტუმრებს საშუალება ჰქონდეთ ამოიცნონ თავიანთი ოთახი.<br></p>', '<p>A hotel is an establishment that provides paid lodging on a short-term basis. Facilities provided inside a hotel room may range from a modest-quality mattress in a small room to large suites with bigger, higher-quality beds, a dresser, a refrigerator and other kitchen facilities, upholstered chairs, a flat screen television, and en-suite bathrooms. Small, lower-priced hotels may offer only the most basic guest services and facilities. Larger, higher-priced hotels may provide additional guest facilities such as a swimming pool, business centre (with computers, printers, and other office equipment), childcare, conference and event facilities, tennis or basketball courts, gymnasium, restaurants, day spa, and social function services. Hotel rooms are usually numbered (or named in some smaller hotels and B&Bs) to allow guests to identify their rooms. <br></p>', '<p>Гостиница - это заведение, предоставляющее платное жилье на краткосрочной основе. Удобства, предоставляемые в гостиничном номере, могут варьироваться от матраса скромного качества в маленькой комнате до больших люксов с более крупными высококачественными кроватями, комодом, холодильником и другими кухонными принадлежностями, мягкими стульями, телевизором с плоским экраном и ванной комнатой. ванные комнаты. Небольшие отели с более низкими ценами могут предлагать только самые основные услуги и удобства. Более крупные отели с более высокими ценами могут предоставить дополнительные удобства для гостей, такие как бассейн, бизнес-центр (с компьютерами, принтерами и другим офисным оборудованием), присмотр за детьми, помещения для конференций и мероприятий, теннисные корты или баскетбольные площадки, тренажерный зал, рестораны, дневной спа-салон, и социальные услуги. Гостиничные номера обычно пронумерованы (или названы в некоторых небольших отелях и B & B), чтобы гости могли идентифицировать свою комнату.<br></p>'),
(10, 'ჩვეულებრივი ნომრები', 'Regular rooms', 'Обычные номера', '<p>ჩვეულებრივ, პრომო ოთახი შედის იაფ ტურებში. ამ ტიპის ოთახი შესაფერისია იმ ტურისტებისთვის, რომლებიც მთელ დროს ატარებენ არა სასტუმროში, არამედ სანაპიროზე, საყიდლებზე ან ექსკურსიებზე. აქ კი შეგიძლიათ ღირსეულად დაზოგოთ ტურის ღირებულება პრომო ოთახში ყოფნისას.</p>', '<p>Usually, the promo room is included in the cheap tours. This type of room is suitable for tourists who spend all their time not in the hotel but on the beach, shopping or excursions. And here you can save the cost of the tour while staying in the promo rooms.</p>', '<p>Обычно в дешевые туры входит промо-номер. Этот тип номера подходит для туристов, которые проводят все время не в отеле, а на пляже, в магазинах или на экскурсиях. А здесь можно сэкономить на стоимости тура, остановившись в промо-руме.<br></p>');

-- --------------------------------------------------------

--
-- Table structure for table `mainsliders`
--

CREATE TABLE `mainsliders` (
  `id` int NOT NULL,
  `filename` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mainsliders`
--

INSERT INTO `mainsliders` (`id`, `filename`) VALUES
(3, '30238be7e0654eb8001.png'),
(4, '0fffa532d7ba5eac001.png'),
(5, '660eb4afacf379ea001.png');

-- --------------------------------------------------------

--
-- Table structure for table `subtours`
--

CREATE TABLE `subtours` (
  `id` int NOT NULL,
  `tourid` int NOT NULL,
  `tourname_ge` varchar(250) DEFAULT NULL,
  `tourname_en` varchar(250) DEFAULT NULL,
  `tourname_ru` varchar(250) DEFAULT NULL,
  `duration_ge` varchar(100) DEFAULT NULL,
  `duration_en` varchar(100) DEFAULT NULL,
  `duration_ru` varchar(100) DEFAULT NULL,
  `destination_ge` varchar(200) DEFAULT NULL,
  `destination_en` varchar(200) DEFAULT NULL,
  `destination_ru` varchar(200) DEFAULT NULL,
  `description_ge` text,
  `description_en` text,
  `description_ru` text,
  `price` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subtours`
--

INSERT INTO `subtours` (`id`, `tourid`, `tourname_ge`, `tourname_en`, `tourname_ru`, `duration_ge`, `duration_en`, `duration_ru`, `destination_ge`, `destination_en`, `destination_ru`, `description_ge`, `description_en`, `description_ru`, `price`) VALUES
(39, 2, 'ველო ტური თბილისის ირგვლივ', 'Bike tour around Tbilisi', 'Велосипедный тур по Тбилиси', '2 Days', '2 Days', 'dasdasdas', 'Around Tbilisi', 'asdasdasd', 'asdasdas', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. <br></p>', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. <br></p>', 50),
(38, 1, 'ტური სიღნაღში', 'Tour in Signagi', 'Тур в Сигнаги', '5 Days', '2 Days', NULL, 'Tbilisi - Signagi', NULL, NULL, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', NULL, NULL, 80),
(40, 2, 'ველოტური თბილისში', 'Bike tour withinTbilisi', 'Велоспорт в Тбилиси', '2 დღე', '2 Days', '2 Days ru', 'თბილისი', 'Tbilisi', 'Tbilisi ru', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<br></p>', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).<br></p>', 40),
(41, 2, 'ველოტური თბილისი რუსთავი', 'Bike tour Tbilisi Rustavi', 'Велосипедный тур Тбилиси Рустави', '3 Days', '3 Days', '3 dnei', 'Tbilisi - Rustavi', 'Tbilisi - Rustavi', 'Tbilisi - Rustavi', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br></p>', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br></p>', 70),
(42, 2, 'ველოტური გორში', 'Bike tour to Gori', 'Велотур в Гори', '3 Days', '2 Days', '2 dnei', 'Tbilisi - Gori', 'Tbilisi - Gori', 'Tbilisi - Gori', '<p>The point of using <b>Lorem Ipsum</b> is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use <b><i>Lorem Ipsum as their default model text</i></b>, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, <font color=\"#0000ff\"><b>sometimes by accident</b></font>, sometimes on purpose (injected humour and the like).</p>', '<p>The point of using <span xss=removed>Lorem Ipsum</span> is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use <span xss=removed><i>Lorem Ipsum as their default model text</i></span>, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, <font color=\"#0000ff\"><span xss=removed>sometimes by accident</span></font>, sometimes on purpose (injected humour and the like).<br></p>', '<p>The point of using <span xss=removed>Lorem Ipsum</span> is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use <span xss=removed><i>Lorem Ipsum as their default model text</i></span>, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, <font color=\"#0000ff\"><span xss=removed>sometimes by accident</span></font>, sometimes on purpose (injected humour and the like).<br></p>', 78),
(43, 4, 'ტური მთაში', 'Tour in the mountains', 'Тур в горы', '5 days', '5 Days', NULL, 'tbilisi-borjomi', NULL, NULL, '<p><strong xss=removed>Lorem Ipsum</strong><span xss=removed> საბეჭდი და ტიპოგრაფიული ინდუსტრიის უშინაარსო ტექსტია. იგი სტანდარტად 1500-იანი წლებიდან იქცა, როდესაც უცნობმა მბეჭდავმა ამწყობ დაზგაზე წიგნის საცდელი ეგზემპლარი დაბეჭდა. მისი ტექსტი არამარტო 5 საუკუნის მანძილზე შემორჩა, არამედ მან დღემდე, ელექტრონული ტიპოგრაფიის დრომდეც უცვლელად მოაღწია. განსაკუთრებული პოპულარობა მას 1960-იან წლებში გამოსულმა Letraset-ის ცნობილმა ტრაფარეტებმა მოუტანა, უფრო მოგვიანებით კი — Aldus PageMaker-ის ტიპის საგამომცემლო პროგრამებმა, რომლებშიც Lorem Ipsum-ის სხვადასხვა ვერსიები იყო ჩაშენებული.</span><br></p>', NULL, NULL, 80),
(44, 2, 'ველოტური თბილისი რუსთავი', 'Bike tour Tbilisi Rustavi', 'Велосипедный тур Тбилиси Рустави', '3 Days', '2 Days', 'ert erter', 'Tbilisi - Rustavi', 'ert erter', 'ert erter', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '<p>ertertre</p>', '<p>erterte</p>', 70),
(54, 2, 'Bike tour Tbilisi Rustavi1', 'retert erter ter ter2', 'ert ertertert3', '3 Days4', '3 Days', 'ert erter6', 'Tbilisi - Rustavi7', 'ert erter8', 'ert erter9', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.11', '<p>ertertre12567</p>', '<p>erterte313313</p>', 7010),
(59, 1, 'asad', 'asdasd', 'asdas', 'asdasd', '2 Days', 'asdasdas', 'asdasdas', 'asdasdas', 'asdas', '<p>dsfs fsd sdfhsdkljfhlksdjhfslkdjfh sdlkj</p>', '<p>kjhsdlkj fhsdlkfj hsdlfkjh sdlkj<b>shd kslajdhaslkdjhaskljdhasl kbkijudhs kljash</b>lkjHSdk alsjh</p>', '<p>df dsf sdf sdf sdfsdf sd</p>', 345345);

-- --------------------------------------------------------

--
-- Table structure for table `tourimages`
--

CREATE TABLE `tourimages` (
  `id` int NOT NULL,
  `subtourid` int NOT NULL,
  `filename` varchar(250) NOT NULL,
  `ismain` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tourimages`
--

INSERT INTO `tourimages` (`id`, `subtourid`, `filename`, `ismain`) VALUES
(102, 38, 'a41a796cb17eddd9001.jpg', 0),
(103, 38, 'a41a796cb17eddd9001.jpg', 1),
(104, 38, 'a41a796cb17eddd9001.jpg', 0),
(105, 43, '235b4d104b65448f001.jpg', 0),
(106, 43, '235b4d104b65448f002.jpg', 0),
(107, 43, '235b4d104b65448f003.jpg', 1),
(108, 43, '235b4d104b65448f004.jpg', 0),
(115, 52, '92979a682d669129002.jpg', 0),
(119, 53, 'fe23fc6e0ec93442002.jpg', 1),
(114, 52, '92979a682d669129001.png', 0),
(118, 53, 'fe23fc6e0ec93442001.png', 0),
(113, 45, 'c331589fcce6e74c005.jpg', 0),
(116, 52, '92979a682d669129003.jpg', 1),
(117, 52, '92979a682d669129004.jpg', 0),
(120, 53, 'fe23fc6e0ec93442003.jpg', 0),
(121, 53, 'fe23fc6e0ec93442004.jpg', 0),
(122, 54, '38674f0aa0f61be3001.jpg', 0),
(123, 54, '38674f0aa0f61be3002.jpg', 1),
(124, 57, 'a94bc8a830685ec6001.jpg', 1),
(125, 58, 'a41a796cb17eddd9001.jpg', 0),
(126, 54, '06a16bd6fff29441001.jpg', 0),
(127, 59, 'ba6773169e4a7304001.png', 0),
(128, 59, 'ba6773169e4a7304002.png', 0),
(129, 59, 'ba6773169e4a7304003.jpg', 0),
(134, 54, 'f9e1ebb795f2453c005.jpg', 0),
(131, 59, 'e9f4b40504b573ee001.jpg', 0),
(132, 59, 'a0c5f979df265ea9001.jpg', 1),
(133, 59, '2b8e311eb0ef0203001.png', 0),
(135, 54, 'f7a95816b2623308001.png', 0),
(145, 39, 'e2ea03cf76c77eaa001.jpg', 0),
(137, 40, '0533520f8461d255001.jpg', 1),
(138, 40, '0533520f8461d255002.jpg', 0),
(139, 40, '0533520f8461d255003.jpg', 0),
(140, 40, '0533520f8461d255004.jpg', 0),
(142, 39, 'c3981e3a868b3ddd001.jpg', 1),
(146, 39, 'a515679f4333b5c1001.jpg', 0),
(144, 39, 'c3981e3a868b3ddd003.png', 0),
(147, 41, '8b5ae7f32c8c8e0d001.jpg', 0),
(148, 41, '8b5ae7f32c8c8e0d002.jpeg', 0),
(149, 41, '8b5ae7f32c8c8e0d003.jpg', 1),
(150, 41, '8b5ae7f32c8c8e0d004.jpg', 0),
(151, 44, '051ff4c420e0b101001.jpg', 0),
(152, 44, '051ff4c420e0b101002.jpg', 0),
(153, 44, '051ff4c420e0b101003.jpg', 1),
(154, 44, '051ff4c420e0b101004.jpg', 0),
(155, 42, '85f024ff047ff10b001.jpg', 0),
(156, 42, '85f024ff047ff10b002.jpeg', 0),
(157, 42, '85f024ff047ff10b003.jpg', 1),
(158, 42, '85f024ff047ff10b004.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tourmainimages`
--

CREATE TABLE `tourmainimages` (
  `id` int NOT NULL,
  `tourid` int NOT NULL,
  `filename` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tourmainimages`
--

INSERT INTO `tourmainimages` (`id`, `tourid`, `filename`) VALUES
(7, 22, 'tourimage022.jpg'),
(8, 23, 'tourimage023.jpg'),
(9, 42, 'tourimage042.jpg'),
(10, 1, 'tourimage001.jpg'),
(11, 2, 'tourimage002.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `id` int NOT NULL,
  `tourname_ge` varchar(250) NOT NULL,
  `tourname_en` varchar(200) NOT NULL,
  `tourname_ru` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`id`, `tourname_ge`, `tourname_en`, `tourname_ru`) VALUES
(1, 'კულტურული ტურები', 'Cultural Tours', 'Культурные туры'),
(2, 'ველო ტურები', 'Bike Tours', 'Велосипедные туры');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hotelimages`
--
ALTER TABLE `hotelimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mainsliders`
--
ALTER TABLE `mainsliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subtours`
--
ALTER TABLE `subtours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tourimages`
--
ALTER TABLE `tourimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tourmainimages`
--
ALTER TABLE `tourmainimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hotelimages`
--
ALTER TABLE `hotelimages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mainsliders`
--
ALTER TABLE `mainsliders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subtours`
--
ALTER TABLE `subtours`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tourimages`
--
ALTER TABLE `tourimages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `tourmainimages`
--
ALTER TABLE `tourmainimages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
