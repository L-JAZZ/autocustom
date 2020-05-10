-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 09 2020 г., 15:19
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `autocustom`
--

-- --------------------------------------------------------

--
-- Структура таблицы `autocustom`
--

CREATE TABLE `autocustom` (
  `Date` datetime NOT NULL DEFAULT current_timestamp(),
  `OrderID` int(11) NOT NULL,
  `PersonID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `autocustom`
--

INSERT INTO `autocustom` (`Date`, `OrderID`, `PersonID`) VALUES
('2020-04-21 13:54:29', 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `client`
--

CREATE TABLE `client` (
  `ClientID` int(11) NOT NULL,
  `FirstName` varchar(64) DEFAULT NULL,
  `LastName` varchar(64) DEFAULT NULL,
  `PaymentInfo` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `client`
--

INSERT INTO `client` (`ClientID`, `FirstName`, `LastName`, `PaymentInfo`) VALUES
(1, 'Alisher', 'Alisher', 1111),
(2, 'Zharmukhambetov', 'Alisher', 7777),
(12, 'Sher', 'Ali', 6666);

-- --------------------------------------------------------

--
-- Структура таблицы `feetback`
--

CREATE TABLE `feetback` (
  `Rate` int(11) NOT NULL,
  `problem` varchar(256) DEFAULT NULL,
  `clientid` int(11) DEFAULT NULL,
  `orderid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `manager`
--

CREATE TABLE `manager` (
  `Bill` float NOT NULL,
  `ManagerID` int(11) NOT NULL,
  `PersonID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура таблицы `mechanic`
--

CREATE TABLE `mechanic` (
  `MechanicID` int(11) NOT NULL,
  `CarID` int(11) NOT NULL,
  `PersonID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `mechanic`
--

INSERT INTO `mechanic` (`MechanicID`, `CarID`, `PersonID`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `oorder`
--

CREATE TABLE `oorder` (
  `Bill` float NOT NULL,
  `probleminfo` varchar(256) DEFAULT NULL,
  `PlannedDateofComplete` date NOT NULL,
  `RealDateofComplete` int(11) NOT NULL,
  `Date` int(11) NOT NULL,
  `TypeOfWork` varchar(64) DEFAULT NULL,
  `OrderID` int(11) NOT NULL,
  `ClientID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `oorder`
--

INSERT INTO `oorder` (`Bill`, `probleminfo`, `PlannedDateofComplete`, `RealDateofComplete`, `Date`, `TypeOfWork`, `OrderID`, `ClientID`) VALUES
(12000, 'd', '2019-04-15', 8, 7, 'Paint', 1, 2);

--
-- Триггеры `oorder`
--
DELIMITER $$
CREATE TRIGGER `Add repairment` AFTER INSERT ON `oorder` FOR EACH ROW INSERT into repairment (Info_about_problem, OrderID,mechanicid,clientid)
SELECT o.probleminfo, o.OrderID ,m.mechanicid, c.clientid from oorder o,mechanic m,Client c
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Record free` AFTER INSERT ON `oorder` FOR EACH ROW INSERT into autocustom (OrderID,PersonID) 
SELECT o.OrderID,p.personid from oorder o,personal p,Client c WHERE 
o.orderid=(
SELECT MAX(oorder.orderid) from oorder 
)order by personid DESC limit 1
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `personal`
--

CREATE TABLE `personal` (
  `PersonID` int(11) NOT NULL,
  `LastName` varchar(64) DEFAULT NULL,
  `FirstName` varchar(64) DEFAULT NULL,
  `Salary` int(11) NOT NULL,
  `WorkHours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `personal`
--

INSERT INTO `personal` (`PersonID`, `LastName`, `FirstName`, `Salary`, `WorkHours`) VALUES
(1, 'Higashikata', 'Josuke', 166666, 10),
(2, 'Aldabergenov', 'Yernar', 500, 14);

-- --------------------------------------------------------

--
-- Структура таблицы `repairment`
--

CREATE TABLE `repairment` (
  `Info_about_problem` varchar(256) DEFAULT NULL,
  `OrderID` int(11) NOT NULL,
  `MechanicID` int(11) DEFAULT NULL,
  `ClientID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `vehicle`
--

CREATE TABLE `vehicle` (
  `Type` varchar(64) DEFAULT NULL,
  `EngineVol` float NOT NULL,
  `Brand` varchar(64) DEFAULT NULL,
  `YearOfProd` int(11) NOT NULL,
  `CarID` int(11) NOT NULL,
  `ClientID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `vehicle`
--

INSERT INTO `vehicle` (`Type`, `EngineVol`, `Brand`, `YearOfProd`, `CarID`, `ClientID`) VALUES
('SUV ', 1.8, 'Toyota', 2014, 1, 1),
('SUV ', 4.7, 'Jeep', 2014, 2, 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `autocustom`
--
ALTER TABLE `autocustom`
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `PersonID` (`PersonID`);

--
-- Индексы таблицы `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ClientID`);

--
-- Индексы таблицы `feetback`
--
ALTER TABLE `feetback`
  ADD KEY `clientid` (`clientid`),
  ADD KEY `orderid` (`orderid`);

--
-- Индексы таблицы `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`ManagerID`),
  ADD KEY `PersonID` (`PersonID`);

--
-- Индексы таблицы `mechanic`
--
ALTER TABLE `mechanic`
  ADD PRIMARY KEY (`MechanicID`),
  ADD KEY `CarID` (`CarID`),
  ADD KEY `PersonID` (`PersonID`);

--
-- Индексы таблицы `oorder`
--
ALTER TABLE `oorder`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `ClientID` (`ClientID`);

--
-- Индексы таблицы `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`PersonID`);

--
-- Индексы таблицы `repairment`
--
ALTER TABLE `repairment`
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `MechanicID` (`MechanicID`),
  ADD KEY `ClientID` (`ClientID`);

--
-- Индексы таблицы `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`CarID`),
  ADD KEY `ClientID` (`ClientID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `manager`
--
ALTER TABLE `manager`
  MODIFY `ManagerID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `autocustom`
--
ALTER TABLE `autocustom`
  ADD CONSTRAINT `autocustom_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `oorder` (`OrderID`),
  ADD CONSTRAINT `autocustom_ibfk_2` FOREIGN KEY (`PersonID`) REFERENCES `personal` (`PersonID`);

--
-- Ограничения внешнего ключа таблицы `feetback`
--
ALTER TABLE `feetback`
  ADD CONSTRAINT `feetback_ibfk_1` FOREIGN KEY (`clientid`) REFERENCES `client` (`ClientID`),
  ADD CONSTRAINT `feetback_ibfk_2` FOREIGN KEY (`orderid`) REFERENCES `oorder` (`OrderID`);

--
-- Ограничения внешнего ключа таблицы `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`PersonID`) REFERENCES `personal` (`PersonID`);

--
-- Ограничения внешнего ключа таблицы `mechanic`
--
ALTER TABLE `mechanic`
  ADD CONSTRAINT `mechanic_ibfk_1` FOREIGN KEY (`CarID`) REFERENCES `vehicle` (`CarID`),
  ADD CONSTRAINT `mechanic_ibfk_2` FOREIGN KEY (`PersonID`) REFERENCES `personal` (`PersonID`);

--
-- Ограничения внешнего ключа таблицы `oorder`
--
ALTER TABLE `oorder`
  ADD CONSTRAINT `oorder_ibfk_1` FOREIGN KEY (`ClientID`) REFERENCES `client` (`ClientID`);

--
-- Ограничения внешнего ключа таблицы `repairment`
--
ALTER TABLE `repairment`
  ADD CONSTRAINT `repairment_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `oorder` (`OrderID`),
  ADD CONSTRAINT `repairment_ibfk_2` FOREIGN KEY (`MechanicID`) REFERENCES `mechanic` (`MechanicID`),
  ADD CONSTRAINT `repairment_ibfk_3` FOREIGN KEY (`ClientID`) REFERENCES `client` (`ClientID`);

--
-- Ограничения внешнего ключа таблицы `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_ibfk_1` FOREIGN KEY (`ClientID`) REFERENCES `client` (`ClientID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
