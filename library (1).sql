-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 27 Sty 2022, 15:56
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `library`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `postCode` int(32) DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buildingNumber` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apartment` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `addresses`
--

INSERT INTO `addresses` (`id`, `city`, `userId`, `postCode`, `country`, `street`, `buildingNumber`, `apartment`) VALUES
(1, 'Łódź', 1, 93035, 'Poland', 'Piotrkowska', '293', NULL),
(2, 'Lodz', 10, 93035, 'Poland', 'Wólczańska', '235', 2),
(3, 'Radom', 10, 77555, 'Poland', 'Jana Pawła 2', '21', NULL),
(11, 'Dędkowo', 10, 9999, 'Poland', 'Wólczańska', '4c', NULL),
(12, 'Melec', 12, 9999, 'Poland', 'Piotrkowska', '4c', NULL),
(17, 'Bielsk', 13, 9230, 'Poland', 'Broniewskiego', '15', NULL),
(19, 'Łódź', 22, 34234, 'Poland', 'Gdańska', '147', NULL),
(20, 'Łódź', 23, 34234, 'Poland', 'Gdańska', '2', 3),
(21, 'Łódź', 24, 34234, 'Poland', 'Gdańska', '2', 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `available` tinyint(1) DEFAULT 1,
  `publishYear` int(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `books`
--

INSERT INTO `books` (`id`, `name`, `author`, `description`, `categoryId`, `available`, `publishYear`) VALUES
(6, 'The C++ Programming Language', 'Bjarne Stroustrup', 'The new C++11 standard allows programmers to express ideas more clearly, simply, and directly, and to write faster, more efficient code. Bjarne Stroustrup, the designer and original implementer of C++, has reorganized, extended, and completely rewritten his definitive reference and tutorial for programmers who want to use C++ most effectively.', 1, 1, 2013),
(7, 'Effective Modern C++', 'Scott Meyers', 'Coming to grips with C++11 and C++14 is more than a matter of familiarizing yourself with the features they introduce (e.g., auto type declarations, move semantics, lambda expressions, and concurrency support). The challenge is learning to use those features effectively -- so that your software is correct, efficient, maintainable, and portable. Thats where this practical book comes in. It describes how to write truly great software using C++11 and C++14 -- i.e. using modern C++ ... Effective Modern C++ follows the proven guideline-based, example-driven format of Scott Meyers earlier books, but covers entirely new material\"--Publishers website.', 1, 0, 2014),
(9, 'Harry Potter and Philosopher Stone', 'J.K. Rowling', 'Young boy receives a letter from Hogwart, the magic school .He experiences many magical adventures.', 3, 1, 1997),
(10, 'Programming PHP', 'Rasmus Lerdorf', 'PHP is a simple yet powerful open-source scripting language for creating dynamic web content. The millions of web sites powered by PHP.', 1, 1, 2002),
(11, 'Learning PHP, MySQL & JavaScript: With JQuery, CSS & HTML5', 'Robin Nixon', 'Build interactive, data-driven websites with the potent combination of open source technologies and web standards, even if you have only basic HTML knowledge.', 5, 1, 2011),
(12, 'Linux bible', 'Christopher Negus', 'Detailed installation instructions and step-by-step descriptions of key desktop and server components help new users get up and running immediately.', 5, 1, 2005),
(13, 'Witcher: Sword of Destiny', 'Andrzej Sapkowski', 'Sword of Destiny is the second of the two collections of short stories, both preceding the main Witcher Saga. The stories were written by Polish fantasy author Andrzej Sapkowski', 3, 1, 1992),
(14, 'King Rat', 'James Clavell', 'King Rat is a 1962 novel by James Clavell and the author\'s literary debut. Set during World War II, the novel describes the struggle for survival of American, Australian, British, Dutch and New Zealander prisoners of war in a Japanese camp in Singapore.', 6, 1, 1962),
(60, 'Harry Potter and Philosopher Stone', 'J.K. Rowling', 'Young boy receives a letter from Hogwart, the magic school .He experiences many magical adventures.', 3, 1, 1997),
(61, 'Programming PHP', 'Rasmus Lerdorf', 'PHP is a simple yet powerful open-source scripting language for creating dynamic web content. The millions of web sites powered by PHP.', 1, 1, 2002),
(62, 'Learning PHP, MySQL & JavaScript: With JQuery, CSS & HTML5', 'Robin Nixon', 'Build interactive, data-driven websites with the potent combination of open source technologies and web standards, even if you have only basic HTML knowledge.', 5, 1, 2011),
(63, 'Linux bible', 'Christopher Negus', 'Detailed installation instructions and step-by-step descriptions of key desktop and server components help new users get up and running immediately.', 5, 1, 2005),
(64, 'Witcher: Sword of Destiny', 'Andrzej Sapkowski', 'Sword of Destiny is the second of the two collections of short stories, both preceding the main Witcher Saga. The stories were written by Polish fantasy author Andrzej Sapkowski', 3, 1, 1992),
(65, 'King Rat', 'James Clavell', 'King Rat is a 1962 novel by James Clavell and the author\'s literary debut. Set during World War II, the novel describes the struggle for survival of American, Australian, British, Dutch and New Zealander prisoners of war in a Japanese camp in Singapore.', 6, 1, 1962);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ageRestriction` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `ageRestriction`) VALUES
(1, 'Computer Science, C++', 'Learning and mastering C++ language', 9),
(2, 'Computer Science, Java', 'Learning and mastering Java language', 9),
(3, 'Fantasy', 'Fantasy is a genre of literature that features magical and supernatural elements that do not exist in the real world.', 12),
(4, 'Thriller', 'Thrillers are dark, engrossing, and suspenseful plot-driven stories. ... Any novel can generate excitement, suspense, interest, and exhilaration, but because these are the primary goals of the thriller genre, thriller writers have laser-focused expertise in keeping a reader interested.', 14),
(5, 'Computer Science, General', 'General knowledge about programming rules', 9),
(6, 'Historical Novel', 'Historical novel, a novel that has as its setting a period of history and that attempts to convey the spirit, manners, and social conditions of a past age with realistic detail and fidelity (which is in some cases only apparent fidelity) to historical fact. The work may deal with actual historical personages, as does Robert Graves’s I, Claudius (1934), or it may contain a mixture of fictional and historical characters. ', 13);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `contacts`
--

INSERT INTO `contacts` (`id`, `userId`, `email`, `phone_number`) VALUES
(1, 1, 'mail@gmail.com', '123123123');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `order`
--

CREATE TABLE `order` (
  `orderId` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `bookId` int(11) DEFAULT NULL,
  `createdAt` date DEFAULT current_timestamp(),
  `expirationDate` date DEFAULT NULL,
  `expired` tinyint(1) DEFAULT 0,
  `finalized` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `order`
--

INSERT INTO `order` (`orderId`, `userId`, `bookId`, `createdAt`, `expirationDate`, `expired`, `finalized`) VALUES
(39, 10, 13, '2022-01-16', '2022-07-15', 0, 1),
(40, 10, 9, '2022-01-16', '2022-07-15', 0, 1),
(41, 10, 14, '2022-01-16', '2022-07-15', 0, 1),
(42, 10, 12, '2022-01-16', '2022-07-15', 0, 1),
(43, 10, 6, '2022-01-16', '2022-07-15', 0, 1),
(44, 10, 10, '2022-01-16', NULL, 0, 0),
(45, 25, 9, '2022-01-16', NULL, 0, 0),
(46, 13, 9, '2022-01-23', '2022-07-22', 0, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `orderId` int(11) DEFAULT NULL,
  `ammount` float DEFAULT NULL,
  `addressId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `payment`
--

INSERT INTO `payment` (`id`, `orderId`, `ammount`, `addressId`, `userId`) VALUES
(132, 39, 8.99, 11, 10),
(133, 40, 8.99, 11, 10),
(134, 41, 8.99, 11, 10),
(135, 41, 8.99, 11, 10),
(136, 42, 8.99, 11, 10),
(137, 43, 8.99, 11, 10),
(138, 46, 8.99, 17, 13);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `bookId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'user',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phoneNumber` int(11) DEFAULT NULL,
  `createdAt` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`userId`, `firstName`, `secondName`, `password`, `role`, `email`, `phoneNumber`, `createdAt`) VALUES
(1, 'Damian', 'Jasiński', '123456', 'user', 'takitaki@gmail.com', NULL, '2021-12-12'),
(2, 'Piotr', 'Krupa', '123456', 'user', 'niemam@gmail.com', NULL, '2022-01-03'),
(8, 'Damian', 'Jasinski', '123123123', 'user', 'damian@gmail.com', NULL, '2021-11-30'),
(9, 'Piotr błasiak', NULL, '$2y$10$CXZL2gWCoc/3ytwooNgumeGZp4sH5VzwdS1mf9fjccB.K3HMY2J0a', NULL, 'championello@gmail.com', NULL, '0000-00-00'),
(10, 'Damian', 'Łotr', '$2y$10$5CLoZ1S4qGNamNbb7czfHeg3R8tgNlpkU.HM9UNkPT4OpADcs79g.', NULL, 'qazxsw@gmail.com', 555555555, '0000-00-00'),
(12, 'Damian', NULL, '$2y$10$3Vzi2F6udQ0e53r5u1IHIO6HmWSMWL0IO4I77Txnqki3ViGc8Y8qG', NULL, 'damianjasinski1@gmail.com', NULL, '0000-00-00'),
(13, 'Kacper', 'Dobies', '$2y$10$SLvJ3fHRMe9LD.1lizVz4e5v9cWK0z82gpq7.2B364F8q8Ot.5Tle', NULL, 'kacperdobies@gmail.com', 222333444, '0000-00-00'),
(14, 'michał', NULL, '$2y$10$H3Z9WHbQnq6ofNu0gjFVneDExRVBSbTNMmDAOPUP1yRvhQLQFM95u', NULL, 'mkowalski@gmail.com', NULL, '0000-00-00'),
(15, 'michał', 'kowalski2', '$2y$10$QsQdEA7X8NcNkH.P5b1DJOppz/2VpWAiMHmXoEhfwwksPF/1Jm4/K', NULL, 'mkowalskii@gmail.com', NULL, '0000-00-00'),
(16, 'damian', 'damian', '$2y$10$G2xVFOjL5TMmIbxMw02kvuXnIoWqYrY8bjzLg/bR07zuUokibZSW2', NULL, 'damiandamian@gmail.com', NULL, '0000-00-00'),
(17, 'michal', 'michal', '$2y$10$Cbl0KUEStb4YCcOoXLDJ3.lX9UXp3TUYJZ1zHRAfOzagEavMmhaiG', NULL, 'michalmichal@gmail.com', NULL, '0000-00-00'),
(18, 'Damian', 'Kowalski', '$2y$10$8hNC4r9N1WftRQfjRYAUdut.BU5At6bgEymC5H5bDusDLvYbHA1dW', 'user', 'kowal@gmail.com', NULL, '0000-00-00'),
(19, 'Szymon', 'Zajac', '$2y$10$CyadVSXKwCCiJzHzSbAtD.LkoYav1ailMWhfcjTyj2Vk1s1Kj/9gG', 'user', 'szymonzajac@gmail.com', 723427096, '0000-00-00'),
(21, 'Nowy', 'Kowalski', '$2y$10$Tlr2QnwMKDgn2m4Q3GiNtOcGZLrS9tyiW2sMPRRE/ZkkPiIEKWFFS', 'user', 'nkowalski@gmail.com', NULL, '0000-00-00'),
(22, 'Piotr', 'Błasiak', '$2y$10$RWCT2Nm7LN3ozRbeVnJ/OOQgr1nRPYOLZPvXVyCxo1pZGyb.Vq4V2', 'user', 'championello2@gmail.com', 123123123, '0000-00-00'),
(23, 'Adam', 'Truchlewski', '$2y$10$niI1C06KbOtTrdOkIlUkK.YUL7512xS7bqgFbQcN1RDFTB7/cc36i', 'user', 'adam.truchlewski@gmail.com', 607765898, '0000-00-00'),
(24, 'Nowy', 'Stary', '$2y$10$vXPhaQ.p4eB2wGnZVN/jDuPAXOczW7hm8uVCswXaejPK/PaKchMVu', 'user', 'nstary@gmail.com', 123123123, '0000-00-00'),
(25, 'tokk', 'ktokk', '$2y$10$qigmsb.hBXJlVxX74hB8tO5kC.xJbqkrmMQ.JJRqgByCS4FdtHGzm', 'user', '2143safd@gmail.com', NULL, '0000-00-00'),
(26, 'Test', 'Owy', '$2y$10$pa.O.YrNaK4Gh2pVOKeswOPYHFI96dCA7/M93lxz3Qspx1azQNRii', 'user', 'test99@gmail.com', NULL, '0000-00-00'),
(27, 'Admin', 'Admin', '$2y$10$CWUfu7SRHZScjJVa.QH.j.45TqCfpVeg5zdZWdNTmpD5SVXbMICSK', 'admin', 'admin@gmail.com', NULL, '0000-00-00'),
(28, 'Dawid', 'Góra', '$2y$10$uFf9Rlwr6b3Drc4Crwpl/u/gfqbvpaC14G45ZcIFcwGk2aXcFOvbW', 'user', 'dawidg@gmail.com', NULL, '2022-01-24');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indeksy dla tabeli `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indeksy dla tabeli `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `bookId` (`bookId`);

--
-- Indeksy dla tabeli `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderId` (`orderId`);

--
-- Indeksy dla tabeli `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookId` (`bookId`),
  ADD KEY `userId` (`userId`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT dla tabeli `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `order`
--
ALTER TABLE `order`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT dla tabeli `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT dla tabeli `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

--
-- Ograniczenia dla tabeli `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `categories` (`id`);

--
-- Ograniczenia dla tabeli `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);

--
-- Ograniczenia dla tabeli `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`bookId`) REFERENCES `books` (`id`);

--
-- Ograniczenia dla tabeli `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `order` (`orderId`);

--
-- Ograniczenia dla tabeli `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`bookId`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
