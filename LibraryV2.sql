-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 08, 2019 at 01:12 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `LibraryV2`
CREATE Database LibraryV2;
use LibraryV2;
--

-- --------------------------------------------------------

--
-- Table structure for table `Author`
--

CREATE TABLE `Author` (
  `ID` int(11) NOT NULL,
  `Forename` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `Surname` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `Author`
--

INSERT INTO `Author` (`ID`, `Forename`, `Surname`) VALUES
(1, 'JK', 'Rowling'),
(2, 'Michelle', 'Obama'),
(3, 'Sophie', 'Kinsella'),
(4, 'Simone', 'Cave'),
(5, 'Caroline', 'Fertleman'),
(6, 'Gregory', 'David Roberts');

-- --------------------------------------------------------

--
-- Table structure for table `Author_Book`
--

CREATE TABLE `Author_Book` (
  `AuthorID` int(11) DEFAULT NULL,
  `BookID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `Author_Book`
--

INSERT INTO `Author_Book` (`AuthorID`, `BookID`) VALUES
(1, 2),
(1, 3),
(2, 1),
(3, 5),
(4, 6),
(5, 6),
(6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `Book`
--

CREATE TABLE `Book` (
  `ID` int(11) NOT NULL,
  `Title` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `ISBN` bigint(50) NOT NULL,
  `Category` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `Book`
--

INSERT INTO `Book` (`ID`, `Title`, `ISBN`, `Category`) VALUES
(1, 'Becoming', 1524763136, 'Autobiography'),
(2, 'Harry Potter 2', 9780439064873, 'Children'),
(3, 'Harry Potter 3', 1408855674, 'Children'),
(4, 'Shantaram', 9780349117546, 'Fiction'),
(5, 'The Undomestic Goddess', 552772747, 'Fiction'),
(6, 'Your Baby Week by Week', 9780091910556, 'Parenting');

-- --------------------------------------------------------

--
-- Table structure for table `Branch`
--

CREATE TABLE `Branch` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `Address` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `Phone` bigint(50) NOT NULL,
  `Email` varchar(50) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `Branch`
--

INSERT INTO `Branch` (`ID`, `Name`, `Address`, `Phone`, `Email`) VALUES
(1, 'The Hub', '1 Sky Way', 445555555, 'info@hub.sky.uk'),
(2, 'Central', '2 Sky Way', 446666666, 'info@central.sky.uk'),
(3, 'BIBB', '3 Sky Way', 447777777, 'info@bibb.sky.uk');

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `ID` int(11) NOT NULL,
  `Forename` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `Surname` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `Email` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `Phone` bigint(20) NOT NULL,
  `Password` varchar(100) COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`ID`, `Forename`, `Surname`, `Email`, `Phone`, `Password`) VALUES
(1, 'Nikolett', 'Trenyik', 'trenyik.nikolett1@gmail.com', 447586825961, 'd521f765a49c72507257a2620612ee96'),
(2, 'Sasha', 'Massan', 'gurjinder.massan@gmail.com', 447889337248, 'd521f765a49c72507257a2620612ee96'),
(3, 'Omo', 'Ojo', 'omoladeishappy@gmail.com', 447956311637, 'd521f765a49c72507257a2620612ee96'),
(4, 'Mona', 'Bhagwat', 'bhagwat.mona@gmail.com', 447727085118, 'd521f765a49c72507257a2620612ee96');

-- --------------------------------------------------------

--
-- Table structure for table `Inventory`
--

CREATE TABLE `Inventory` (
  `ID` int(11) NOT NULL,
  `BookID` int(11) DEFAULT NULL,
  `BranchID` int(11) DEFAULT NULL,
  `PurchaserID` int(11) DEFAULT NULL,
  `LoanStatus` enum('Available','Borrowed','Overdue') COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `Inventory`
--

INSERT INTO `Inventory` (`ID`, `BookID`, `BranchID`, `PurchaserID`, `LoanStatus`) VALUES
(1, 1, 2, 1, 'Available'),
(2, 1, 2, 1, 'Borrowed'),
(3, 2, 3, 1, 'Overdue'),
(4, 3, 2, 1, 'Borrowed'),
(5, 4, 1, 1, ''),
(6, 5, 2, 1, 'Available'),
(7, 6, 1, 1, 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `Loan`
--

CREATE TABLE `Loan` (
  `ID` int(11) NOT NULL,
  `InventoryID` int(11) DEFAULT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `IssueDate` date NOT NULL,
  `DueDate` date DEFAULT NULL,
  `ReturnDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `Loan`
--

INSERT INTO `Loan` (`ID`, `InventoryID`, `CustomerID`, `IssueDate`, `DueDate`, `ReturnDate`) VALUES
(1, 1, 1, '2019-03-02', NULL, '2010-03-07'),
(2, 3, 3, '2019-03-02', '2001-03-19', NULL),
(3, 4, 2, '2019-03-03', '2020-03-12', NULL),
(4, 5, 4, '2019-03-05', '2020-03-20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Staff`
--

CREATE TABLE `Staff` (
  `ID` int(11) NOT NULL,
  `Forname` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `Surname` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `Role` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `Email` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `BranchID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `Staff`
--

INSERT INTO `Staff` (`ID`, `Forname`, `Surname`, `Role`, `Email`, `BranchID`) VALUES
(1, 'Victoria', 'Lloyd', 'Manager', 'victoria@sky.uk', NULL),
(2, 'Conrad', 'Langworthy', 'Librarian', 'conrad@sky.uk', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Author`
--
ALTER TABLE `Author`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Author_Book`
--
ALTER TABLE `Author_Book`
  ADD KEY `AuthorID` (`AuthorID`),
  ADD KEY `BookID` (`BookID`);

--
-- Indexes for table `Book`
--
ALTER TABLE `Book`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Branch`
--
ALTER TABLE `Branch`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Inventory`
--
ALTER TABLE `Inventory`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `BookID` (`BookID`),
  ADD KEY `BranchID` (`BranchID`),
  ADD KEY `PurchaserID` (`PurchaserID`);

--
-- Indexes for table `Loan`
--
ALTER TABLE `Loan`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `InventoryID` (`InventoryID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `Staff`
--
ALTER TABLE `Staff`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `BranchID` (`BranchID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Author`
--
ALTER TABLE `Author`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Book`
--
ALTER TABLE `Book`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Branch`
--
ALTER TABLE `Branch`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Customer`
--
ALTER TABLE `Customer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Inventory`
--
ALTER TABLE `Inventory`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Loan`
--
ALTER TABLE `Loan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Staff`
--
ALTER TABLE `Staff`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Author_Book`
--
ALTER TABLE `Author_Book`
  ADD CONSTRAINT `author_book_ibfk_1` FOREIGN KEY (`AuthorID`) REFERENCES `Author` (`ID`),
  ADD CONSTRAINT `author_book_ibfk_2` FOREIGN KEY (`BookID`) REFERENCES `Book` (`ID`);

--
-- Constraints for table `Inventory`
--
ALTER TABLE `Inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`BookID`) REFERENCES `Book` (`ID`),
  ADD CONSTRAINT `inventory_ibfk_2` FOREIGN KEY (`BranchID`) REFERENCES `Branch` (`ID`),
  ADD CONSTRAINT `inventory_ibfk_3` FOREIGN KEY (`PurchaserID`) REFERENCES `Staff` (`ID`);

--
-- Constraints for table `Loan`
--
ALTER TABLE `Loan`
  ADD CONSTRAINT `loan_ibfk_1` FOREIGN KEY (`InventoryID`) REFERENCES `Inventory` (`ID`),
  ADD CONSTRAINT `loan_ibfk_2` FOREIGN KEY (`CustomerID`) REFERENCES `Customer` (`ID`);

--
-- Constraints for table `Staff`
--
ALTER TABLE `Staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`BranchID`) REFERENCES `Branch` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ChooseAuthor_ViewBooks`(ChooseAuthor int(11))
BEGIN

SELECT Author.ID, Author.Forename, Author.Surname, Book.Title
FROM Book
INNER JOIN Author_Book
ON Author_Book.AuthorID = Book.ID
INNER JOIN Author
ON Author_Book.BookID = Author.ID
WHERE Author.ID = ChooseAuthor;

END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `BookReturned`(IN p_InventoryID int(11), IN p_customerID int(11), INp_ReturnDate date)
BEGIN
Update Loan, Inventory
SET Loan.Returndate = p_ReturnDate,
Inventory.LoanStatus = 'Available'
WHERE Loan.InventoryID = p_InventoryID AND CustomerID =p_customerID;
END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `Branch_BookStatus`(IN ViewStatus varchar(50))
BEgin
SELECT Inventory.BookID, Book.Title, Inventory.LoanStatus, Inventory.BranchID,
Branch.Name, Branch.Address, Branch.Phone
FROM Inventory
INNER JOIN Book
ON Book.ID = Inventory.BookID
INNER JOIN Branch
ON BranchID = Branch.ID
WHERE Inventory.LoanStatus=viewStatus;

END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `NewBook_and_NewAuthor`(
Title varchar(50),
ISBN bigint(50),
Category varchar(50),
Forename varchar(50),
Surname varchar(50)
)
BEGIN
INSERT INTO Book (Title, ISBN, Category)
VALUES (Title, ISBN, Category);
        
INSERT INTO Author (Forename, Surname)
VALUES (Forename, Surname);


END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ViewAll_AuthorsBooks`(ChooseAuthor int(11))
BEGIN

SELECT Author.ID, Author.Forename, Author.Surname, Book.Title
FROM Book
INNER JOIN Author_Book
ON Author_Book.AuthorID = Book.ID
INNER JOIN Author
ON Author_Book.BookID = Author.ID;

END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `ViewLoanStatus`(IN ViewStatus varchar(50))
BEGIN
SELECT Customer.ID, Customer.Forename, Customer.Surname, Customer.Email, InventoryID, LoanStatus
FROM Customer
INNER JOIN Loan
ON Loan.CustomerID = Customer.ID
INNER JOIN Inventory
ON InventoryID = Inventory.ID
WHERE Inventory.LoanStatus = ViewStatus;

END$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `getAuthor`()
    NO SQL
    SQL SECURITY INVOKER
SELECT * FROM Author$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_author`(IN `p_Forename` VARCHAR(50), IN `p_Surname` VARCHAR(50))
BEGIN
insert into Author(Forename, Surname)
values(p_Forename, p_Surname);
end$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_authorIDbookID`(IN `p_authorID` INT(11), IN `p_bookID` INT(11))
BEGIN
insert into Author_Book(AuthorID, BookID)
values(p_authorID, p_bookID);
end$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_book`(IN `p_Title` VARCHAR(50), IN `p_ISBN` BIGINT(50), IN `p_Category` VARCHAR(50))
BEGIN
insert into Book(Title, ISBN, Category)
values(p_Title, p_ISBN, p_Category);
end$$
DELIMITER ;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_customer`(IN `p_Forename` VARCHAR(50), IN `p_Surname` VARCHAR(50), IN `p_Email` VARCHAR(50), IN `p_Phone` BIGINT(20))
BEGIN 
insert into customer(Forename, Surname, email, phone)  
values (p_forename,p_surname, p_email, p_phone); 
END$$
DELIMITER ;



# Privileges for `Librarian`@`localhost`


=======
GRANT USAGE ON `LibraryV2`.* TO 'Librarian'@'localhost' IDENTIFIED BY PASSWORD '*0BECD2563417B53867228AE94D7F1A9A1A1CED70';

GRANT SELECT ON `LibraryV2`.`author` TO 'Librarian'@'localhost';

GRANT SELECT ON `LibraryV2`.`book` TO 'Librarian'@'localhost';

GRANT SELECT ON `LibraryV2`.`author_book` TO 'Librarian'@'localhost';

GRANT SELECT, UPDATE ON `LibraryV2`.`inventory` TO 'Librarian'@'localhost';

GRANT SELECT, UPDATE ON `LibraryV2`.`loan` TO 'Librarian'@'localhost';



GRANT EXECUTE ON PROCEDURE `LibraryV2`.`viewloanstatus` TO 'Librarian'@'localhost';


# Privileges for `Manager`@`localhost`


GRANT USAGE ON `LibraryV2`.* TO 'Manager'@'localhost' IDENTIFIED BY PASSWORD '*0BECD2563417B53867228AE94D7F1A9A1A1CED70';

GRANT SELECT, INSERT ON `LibraryV2`.`author` TO 'Manager'@'localhost';

GRANT SELECT, INSERT ON `LibraryV2`.`book` TO 'Manager'@'localhost';

GRANT SELECT, INSERT, UPDATE, DELETE ON `LibraryV2`.`staff` TO 'Manager'@'localhost';

GRANT SELECT, INSERT ON `LibraryV2`.`author_book` TO 'Manager'@'localhost';

GRANT EXECUTE ON PROCEDURE `LibraryV2`.`newbook_and_newauthor` TO 'Manager'@'localhost';


# Privileges for `Customer`@`localhost`


GRANT USAGE ON `LibraryV2`.* TO 'Customer'@'localhost' IDENTIFIED BY PASSWORD '*0BECD2563417B53867228AE94D7F1A9A1A1CED70';

GRANT SELECT ON `LibraryV2`.`book` TO 'Customer'@'localhost';

GRANT SELECT ON `LibraryV2`.`inventory` TO 'Customer'@'localhost';


GRANT SELECT ON `LibraryV2`.`loan` TO 'Customer'@'localhost';

GRANT EXECUTE ON PROCEDURE `LibraryV2`.`chooseauthor_viewbooks` TO 'Customer'@'localhost';




# Privileges for `root`@`localhost`

GRANT ALL PRIVILEGES ON *.* TO 'root'@'localhost' WITH GRANT OPTION;

GRANT PROXY ON ''@'%' TO 'root'@'localhost' WITH GRANT OPTION;

GRANT PROXY ON ''@'%' TO 'root'@'localhost' WITH GRANT OPTION;

