CREATE TABLE `Users` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `firstName` varchar(255),
  `secondName` varchar(255),
  `password` varchar(255),
  `role` varchar(255),
  `created_at` datetime
);

CREATE TABLE `Contacts` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `userId` int,
  `email` varchar(255),
  `phone_number` varchar(255)
);

CREATE TABLE `Books` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `author` text,
  `description` text,
  `categoryId` int,
  `available` boolean,
  `publish_year` datetime
);

CREATE TABLE `Categories` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(255),
  `description` text,
  `ageRestriction` int
);

CREATE TABLE `Reviews` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `bookId` int,
  `userId` int,
  `rating` int,
  `description` text,
  `created_at` datetime
);

CREATE TABLE `Addresses` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `city` varchar(255),
  `userId` int,
  `postCode` varchar(255),
  `country` varchar(255),
  `street` varchar(255)
);

CREATE TABLE `Order` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `userId` int,
  `bookId` int,
  `created_at` datetime,
  `expiration_date` datetime
);

CREATE TABLE `Payment` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `orderId` int,
  `ammount` int
);

ALTER TABLE `Contacts` ADD FOREIGN KEY (`userId`) REFERENCES `Users` (`id`);

ALTER TABLE `Books` ADD FOREIGN KEY (`categoryId`) REFERENCES `Categories` (`id`);

ALTER TABLE `Reviews` ADD FOREIGN KEY (`bookId`) REFERENCES `Books` (`id`);

ALTER TABLE `Reviews` ADD FOREIGN KEY (`userId`) REFERENCES `Users` (`id`);

ALTER TABLE `Addresses` ADD FOREIGN KEY (`userId`) REFERENCES `Users` (`id`);

ALTER TABLE `Order` ADD FOREIGN KEY (`userId`) REFERENCES `Users` (`id`);

ALTER TABLE `Order` ADD FOREIGN KEY (`bookId`) REFERENCES `Books` (`id`);

ALTER TABLE `Payment` ADD FOREIGN KEY (`orderId`) REFERENCES `Order` (`id`);

INSERT INTO books (name, author, description, categoryId, publish_year, available) VALUES ('The C++ Programming Language', 'Bjarne Stroustrup', 'The new C++11 standard allows programmers to express ideas more clearly, simply, and directly, and to write faster, more efficient code. Bjarne Stroustrup, the designer and original implementer of C++, has reorganized, extended, and completely rewritten his definitive reference and tutorial for programmers who want to use C++ most effectively.',1, 2013,true);

INSERT INTO books (name, author, description, categoryId, publish_year, available) VALUES ('Effective Modern C++', 'Scott Meyers', 'Coming to grips with C++11 and C++14 is more than a matter of familiarizing yourself with the features they introduce (e.g., auto type declarations, move semantics, lambda expressions, and concurrency support). The challenge is learning to use those features effectively -- so that your software is correct, efficient, maintainable, and portable. Thats where this practical book comes in. It describes how to write truly great software using C++11 and C++14 -- i.e. using modern C++ ... Effective Modern C++ follows the proven guideline-based, example-driven format of Scott Meyers earlier books, but covers entirely new material"--Publishers website.',1, 2014,true);


INSERT INTO books (name, author, description, categoryId, publish_year, available) VALUES ('Java for Beginners Guide','Josh Thompsons','Do You Want To Start Programming Quickly? Are You Tired of Your Java Code Turning Out Wrong? Want to Become A Programming Master? If you have always wanted to know how to program, then this book is your ideal solution!The book, "Java: Java For Beginners Guide To Learn Java And Java Programming" , contains proven steps and strategies on how to learn basic programming in Java, including lesson summaries for easy reference and lessons at the end of each chapter to help you compound your new knowledge. Java is a simple language, object-oriented and incredibly easy to learn, provided you put your mind to it. Once you have learned the fundamental concepts and how to write the code, you will soon be programming like a pro!This book aims to teach you the basics of Java language in the simplest way possible. Unlike other resources, this book will not feed you with too many technicalities that might confuse you along the way. Each discussion was written in simple words. All exercises in this book were carefully chosen to be simple cases in order to make your Java practice easier.By reading this book you will gain an understanding of the basic concepts of Java Programming including:
Conditional Statements
Statements - Looping and Iteration
Arrays
Functions and Methods
Classes and Objects
Solutions to Exercises
and Many More...
This book brings you a concise, straight to the point, easy to follow code examples so you can begin coding in 24 hours or less. Invest in yourself, learn the Java basics, practice Java programming and you will be a programmer in no time. Begin your journey TODAY, No Prior Programming Experience Is Required!Dont wait! Download "Java: Java For Beginners Guide To Learn Java And Java Programming" Today and Get Started With Your New Programming Career!!',2, 2017,true);

INSERT INTO categories(name, description, ageRestriction) 
VALUES ("Computer Science, C++", "Learning and mastering C++ language","9");

INSERT INTO categories(name, description, ageRestriction) 
VALUES ("Computer Science, Java", "Learning and mastering Java language","9");

INSERT INTO categories(name, description, ageRestriction) 
VALUES ("Fantasy", "Fantasy is a genre of literature that features magical and supernatural elements that do not exist in the real world.","12");

INSERT INTO categories(name, description, ageRestriction) 
VALUES ("Thriller", "Thrillers are dark, engrossing, and suspenseful plot-driven stories. ... Any novel can generate excitement, suspense, interest, and exhilaration, but because these are the primary goals of the thriller genre, thriller writers have laser-focused expertise in keeping a reader interested.","14");


INSERT INTO categories(name, description, ageRestriction);
VALUES ("Computer Science, General", "General knowledge about programming rules","9")

INSERT INTO users(firstName, secondName, password, role, created_at) 
VALUE ("Jan", "Kowalski", "123456", 'employee', now());

INSERT INTO Addresses(city, userId, postCode, country, street, building_number)
VALUES ("Łódź", 1, 93-035, "Poland", "Piotrkowska", 293);

INSERT INTO Addresses(city, userId, postCode, country, street, building_number)
VALUES ("Łódź", 2, 93-035,"Poland", "Wólczańska", 235);