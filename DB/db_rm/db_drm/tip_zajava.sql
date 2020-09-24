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

-- Дамп структуры для таблица db_drm.tip_zajava
CREATE TABLE IF NOT EXISTS `tip_zajava` (
  `TIP_ZAJAVA_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TIP_ZAJAVA_NAME` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`TIP_ZAJAVA_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Тип документа';

-- Дамп данных таблицы db_drm.tip_zajava: ~2 rows (приблизительно)
DELETE FROM `tip_zajava`;
/*!40000 ALTER TABLE `tip_zajava` DISABLE KEYS */;
INSERT INTO `tip_zajava` (`TIP_ZAJAVA_ID`, `TIP_ZAJAVA_NAME`) VALUES
	(1, 'Робоче місце'),
	(2, 'Пошук спеціаліста');
/*!40000 ALTER TABLE `tip_zajava` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
