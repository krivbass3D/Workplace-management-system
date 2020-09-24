-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.6.43 - MySQL Community Server (GPL)
-- Операционная система:         Win32
-- HeidiSQL Версия:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры для таблица db_drm.sotrudnik
CREATE TABLE IF NOT EXISTS `sotrudnik` (
  `SOTRUDNIK_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SOTRUDNIK_FIO` varchar(45) DEFAULT NULL,
  `DOLGNOST_ID` int(11) DEFAULT NULL,
  `SOTRUDNIK_MAIL` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`SOTRUDNIK_ID`),
  KEY `FK_sotrudnik_dolgnost_DOLGNOST_ID` (`DOLGNOST_ID`),
  CONSTRAINT `FK_sotrudnik_dolgnost_DOLGNOST_ID` FOREIGN KEY (`DOLGNOST_ID`) REFERENCES `dolgnost` (`DOLGNOST_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='Сотрудник';

-- Дамп данных таблицы db_drm.sotrudnik: ~5 rows (приблизительно)
DELETE FROM `sotrudnik`;
/*!40000 ALTER TABLE `sotrudnik` DISABLE KEYS */;
INSERT INTO `sotrudnik` (`SOTRUDNIK_ID`, `SOTRUDNIK_FIO`, `DOLGNOST_ID`, `SOTRUDNIK_MAIL`) VALUES
	(1, 'Коренко О.Г.', 5, 'dsferf@mail.ru'),
	(2, 'Иванова И.Т.', 1, 'sdfgfd@mail.ru'),
	(3, 'Петров И.Н.', 2, 'fdsgdfgdf@mail.ru'),
	(4, 'Сидоров И.Т.', 3, 'чмваы@mail.ru'),
	(5, 'Шишкина А.П.', 4, 'ываыва@mail.ru');
/*!40000 ALTER TABLE `sotrudnik` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
