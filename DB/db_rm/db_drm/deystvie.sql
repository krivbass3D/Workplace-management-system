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

-- Дамп структуры для таблица db_drm.deystvie
CREATE TABLE IF NOT EXISTS `deystvie` (
  `DEYSTVIE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `DEYSTVIE_NAME` varchar(45) DEFAULT NULL,
  `DEYSTVIE_SROK` date DEFAULT NULL,
  PRIMARY KEY (`DEYSTVIE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='Действия';

-- Дамп данных таблицы db_drm.deystvie: ~4 rows (приблизительно)
DELETE FROM `deystvie`;
/*!40000 ALTER TABLE `deystvie` DISABLE KEYS */;
INSERT INTO `deystvie` (`DEYSTVIE_ID`, `DEYSTVIE_NAME`, `DEYSTVIE_SROK`) VALUES
	(1, 'Создание', NULL),
	(2, 'Согласование', NULL),
	(3, 'Утверждение', NULL),
	(4, 'Удаление', NULL),
	(5, 'Изменение', NULL);
/*!40000 ALTER TABLE `deystvie` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
