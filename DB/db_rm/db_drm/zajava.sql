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

-- Дамп структуры для таблица db_drm.zajava
CREATE TABLE IF NOT EXISTS `zajava` (
  `ZAJAVA_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ZAJAVA_DATA` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `TIP_ZAJAVA_ID` int(11) DEFAULT NULL,
  `POSADA_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`ZAJAVA_ID`),
  KEY `FK_zajava_tip_zajava_TIP_ZAJAVA_ID` (`TIP_ZAJAVA_ID`),
  KEY `FK_zajava_posada_POSADA_ID` (`POSADA_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COMMENT='Заявки на вакансию и рабочее место';

-- Дамп данных таблицы db_drm.zajava: ~7 rows (приблизительно)
DELETE FROM `zajava`;
/*!40000 ALTER TABLE `zajava` DISABLE KEYS */;
INSERT INTO `zajava` (`ZAJAVA_ID`, `ZAJAVA_DATA`, `TIP_ZAJAVA_ID`, `POSADA_ID`) VALUES
	(23, NULL, 2, 1),
	(26, NULL, 2, 3),
	(27, NULL, 2, 17),
	(28, NULL, 1, 17),
	(29, NULL, 1, 11),
	(30, NULL, 1, 10),
	(31, NULL, 1, 3);
/*!40000 ALTER TABLE `zajava` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
