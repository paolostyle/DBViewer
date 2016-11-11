-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 24 Maj 2016, 20:50
-- Wersja serwera: 10.1.10-MariaDB
-- Wersja PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `onlineshop`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `street` varchar(45) DEFAULT NULL,
  `city` varchar(45) DEFAULT NULL,
  `zipcode` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `addresses`
--

INSERT INTO `addresses` (`id`, `street`, `city`, `zipcode`) VALUES
(1, 'Marszałkowska 13', 'Warszawa', '00-010'),
(2, 'Chocimska 32', 'Warszawa', '01-012'),
(3, 'Kazimierzowska 30', 'Kraków', '21-121'),
(4, 'Łazarska 1', 'Poznań', '87-213'),
(5, 'Karpacka 40', 'Katowicka', '22-222'),
(6, 'Morska 2', 'Wrocław', '92-121'),
(7, 'Hamakowa 90', 'Pcim Dolny', '85-584'),
(8, 'Leniwa 10', 'Warszawa', '02-282'),
(9, 'Prawa 6', 'Szczecin', '74-232'),
(10, 'Niska 2', 'Zakopane', '12-223');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(32) DEFAULT NULL,
  `surname` varchar(32) DEFAULT NULL,
  `email` varchar(32) DEFAULT NULL,
  `address_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `clients`
--

INSERT INTO `clients` (`id`, `name`, `surname`, `email`, `address_id`) VALUES
(1, 'Jan', 'Kowalski', 'jan@kowalkski.pl', 1),
(2, 'Marian', 'Kowalski', 'marian@kowalski.pl', 2),
(3, 'Jerzy', 'Janicki', 'j.jan@cos.pl', 3),
(4, 'Piotr', 'Nowak', 'p.nowak@gmail.com', 4),
(5, 'Kacper', 'Kot', 'kkot@gmail.com', 5),
(6, 'Andrzej', 'Koza', 'ak@wp.pl', 6),
(7, 'Marcin', 'Cukier', 'mc12@onet.pl', 7),
(8, 'Anna', 'Kasprzyk', 'akasp@firma.pl', 8),
(9, 'Patryk', 'Antoniak', 'pat@pat.pl', 9),
(10, 'Włodzimierz', 'Chrząszcz', 'wc@korpo.pl', 10);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `delivery_comp`
--

CREATE TABLE `delivery_comp` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `contract_to` date DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `delivery_comp`
--

INSERT INTO `delivery_comp` (`id`, `name`, `contract_to`, `type`) VALUES
(1, 'Poczta Polska', '2020-01-01', 'poczta'),
(2, 'InPost', '2018-06-01', 'poczta'),
(3, 'DHL', '2017-04-12', 'kurier'),
(4, 'UPS', '2017-04-14', 'kurier'),
(5, 'Siódemka', '2015-03-03', 'kurier'),
(6, 'ABC', '2008-10-22', 'kurier'),
(7, 'Kurierzy sp. z o.o.', '2009-12-31', 'kurier'),
(8, 'US Post', '2016-12-31', 'poczta'),
(9, 'TPK', '2023-12-31', 'kurier'),
(10, 'NPTDC', '2010-05-10', 'kurier');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `delivery_method`
--

CREATE TABLE `delivery_method` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `cost` float DEFAULT NULL,
  `del_min` int(11) DEFAULT NULL,
  `del_max` int(11) DEFAULT NULL,
  `provider` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `delivery_method`
--

INSERT INTO `delivery_method` (`id`, `name`, `cost`, `del_min`, `del_max`, `provider`) VALUES
(1, 'List ekonomiczny', 3, 2, 4, 1),
(2, 'List polecony', 4.5, 2, 3, 1),
(3, 'Paczka priorytetowa', 8, 2, 3, 1),
(4, 'Paczka priorytetowa polecona za pobraniem', 12, 1, 3, 1),
(5, 'Przesyłka kurierska Pocztex', 14, 1, 2, 1),
(6, 'Paczka priorytetowa inPost', 8, 1, 2, 2),
(7, 'Paczkomat', 10, 1, 1, 2),
(8, 'Przesyłka kurierska DHL', 14, 1, 2, 3),
(9, 'Przesyłka kurierska za pobraniem DHL', 18, 1, 2, 3),
(10, 'Przesyłka kurierska UPS', 13.5, 1, 2, 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `desc` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `desc`) VALUES
(1, 'Apple iPhone 5s 16GB', 1649, 'smartfon'),
(2, 'Intel i5-6600K 3.50GHz', 1039, 'procesor'),
(3, 'Dell U2412M Premium', 1039, 'monitor'),
(4, 'Lenovo B50-80', 1599, 'laptop'),
(5, 'HP DeskJet Advantage 3635', 259, 'drukarka'),
(6, 'Intel 240GB 2,5" SSD 535 Series', 345, 'dysk SSD'),
(7, 'MSI GeForce GTX970', 1399, 'grafika w sensie że graficzna karta'),
(8, 'SilentiumPC Vero M1 600W', 235, 'zasilacz'),
(9, 'Kingston HyperX 8 GB DDR3 CL9 1600 MHz', 219, 'pamięć RAM'),
(10, 'Samsung Core', 640, 'telefon słaby'),
(15, 'Naklejka na laptopa', 35, 'taka naklejka'),
(16, 'Naklejka na laptopa zielona', 3, 'taka naklejka inna');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_date` date DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `ordered_by` int(11) DEFAULT NULL,
  `delivery_method_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `orders`
--

INSERT INTO `orders` (`id`, `order_date`, `amount`, `discount`, `ordered_by`, `delivery_method_id`) VALUES
(1, '2016-04-23', 271, 0, 1, 4),
(2, '2016-04-22', 622, 0, 2, 9),
(3, '2016-04-21', 590, 0, 5, 7),
(4, '2016-04-21', 2696, 0, 3, 3),
(5, '2016-04-21', 1043.5, 0, 9, 2),
(6, '2016-04-20', 1053, 0, 10, 5),
(8, '2016-04-17', 1409, 0, 1, 7),
(9, '2016-04-14', 3255, 0, 8, 9),
(10, '2016-04-13', 1663, 0, 7, 8);

--
-- Wyzwalacze `orders`
--
DELIMITER $$
CREATE TRIGGER `amount_upd_deliv` BEFORE UPDATE ON `orders` FOR EACH ROW BEGIN
	IF NEW.delivery_method_id <> OLD.delivery_method_id THEN
		SET @delivPriceOld = (SELECT cost FROM delivery_method WHERE id=OLD.delivery_method_id);
		SET @delivPriceNew = (SELECT cost FROM delivery_method WHERE id=NEW.delivery_method_id);
		SET NEW.amount=OLD.amount-@delivPriceOld+@delivPriceNew;
	END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orders_has_items`
--

CREATE TABLE `orders_has_items` (
  `orders_id` int(11) NOT NULL,
  `items_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `orders_has_items`
--

INSERT INTO `orders_has_items` (`orders_id`, `items_id`) VALUES
(1, 5),
(2, 5),
(2, 6),
(3, 6),
(3, 8),
(4, 1),
(4, 3),
(5, 2),
(6, 3),
(8, 7),
(9, 2),
(9, 6),
(9, 7),
(9, 8),
(9, 9),
(10, 1);

--
-- Wyzwalacze `orders_has_items`
--
DELIMITER $$
CREATE TRIGGER `amount_upd_item_del` AFTER DELETE ON `orders_has_items` FOR EACH ROW BEGIN
	SET @itemPrice = (SELECT price FROM items WHERE id=OLD.items_id);
    UPDATE orders SET amount=amount-@itemPrice WHERE id=OLD.orders_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `amount_upd_item_ins` AFTER INSERT ON `orders_has_items` FOR EACH ROW BEGIN
	SET @itemPrice = (SELECT price FROM items WHERE id=NEW.items_id);
    UPDATE orders SET amount=amount+@itemPrice WHERE id=NEW.orders_id;
END
$$
DELIMITER ;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`,`address_id`),
  ADD KEY `fk_clients_addresses_idx` (`address_id`);

--
-- Indexes for table `delivery_comp`
--
ALTER TABLE `delivery_comp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_method`
--
ALTER TABLE `delivery_method`
  ADD PRIMARY KEY (`id`,`provider`),
  ADD KEY `fk_delivery_method_delivery_comp1_idx` (`provider`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order_owner_idx` (`ordered_by`),
  ADD KEY `fk_orders_delivery_method1_idx` (`delivery_method_id`);

--
-- Indexes for table `orders_has_items`
--
ALTER TABLE `orders_has_items`
  ADD PRIMARY KEY (`orders_id`,`items_id`),
  ADD KEY `fk_orders_has_items_items1_idx` (`items_id`),
  ADD KEY `fk_orders_has_items_orders1_idx` (`orders_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT dla tabeli `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT dla tabeli `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT dla tabeli `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `client_address` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `delivery_method`
--
ALTER TABLE `delivery_method`
  ADD CONSTRAINT `fk_delivery_method_delivery_comp1` FOREIGN KEY (`provider`) REFERENCES `delivery_comp` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_order_owner` FOREIGN KEY (`ordered_by`) REFERENCES `clients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orders_delivery_method1` FOREIGN KEY (`delivery_method_id`) REFERENCES `delivery_method` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ograniczenia dla tabeli `orders_has_items`
--
ALTER TABLE `orders_has_items`
  ADD CONSTRAINT `fk_orders_has_items_items1` FOREIGN KEY (`items_id`) REFERENCES `items` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orders_has_items_orders1` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
