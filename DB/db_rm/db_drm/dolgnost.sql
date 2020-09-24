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

-- Дамп структуры для таблица db_drm.dolgnost
CREATE TABLE IF NOT EXISTS `dolgnost` (
  `DOLGNOST_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DOLGNOST_NAME` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`DOLGNOST_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='Должность';

-- Дамп данных таблицы db_drm.dolgnost: ~5 rows (приблизительно)
DELETE FROM `dolgnost`;
/*!40000 ALTER TABLE `dolgnost` DISABLE KEYS */;
INSERT INTO `dolgnost` (`DOLGNOST_ID`, `DOLGNOST_NAME`) VALUES
	(1, 'Руководитель HR'),
	(2, 'Главный инженер'),
	(3, 'Начальник охраны'),
	(4, 'Руководитель МТЗ'),
	(5, 'Руководитель IT');
/*!40000 ALTER TABLE `dolgnost` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
