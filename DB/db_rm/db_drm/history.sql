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

-- Дамп структуры для таблица db_drm.history
CREATE TABLE IF NOT EXISTS `history` (
  `HISTORY_ID` int(11) NOT NULL AUTO_INCREMENT,
  `HISTORY_DATA_START` date DEFAULT NULL,
  `HISTORY_DATA_END` date DEFAULT NULL,
  `MARSHRUT_ID` int(11) DEFAULT NULL,
  `ZAJAVA_ID` int(11) DEFAULT NULL,
  `SOTRUDNIK_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`HISTORY_ID`),
  KEY `FK_history_marshrut_MARSHRUT_ID` (`MARSHRUT_ID`),
  KEY `FK_history_sotrudnik_SOTRUDNIK_ID` (`SOTRUDNIK_ID`),
  KEY `FK_history_zajava_ZAJAVA_ID` (`ZAJAVA_ID`),
  CONSTRAINT `FK_history_marshrut_MARSHRUT_ID` FOREIGN KEY (`MARSHRUT_ID`) REFERENCES `marshrut` (`MARSHRUT_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_history_sotrudnik_SOTRUDNIK_ID` FOREIGN KEY (`SOTRUDNIK_ID`) REFERENCES `sotrudnik` (`SOTRUDNIK_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='Истори пути документа';

-- Дамп данных таблицы db_drm.history: ~4 rows (приблизительно)
DELETE FROM `history`;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` (`HISTORY_ID`, `HISTORY_DATA_START`, `HISTORY_DATA_END`, `MARSHRUT_ID`, `ZAJAVA_ID`, `SOTRUDNIK_ID`) VALUES
	(1, '2020-02-06', '0000-00-00', 1, 1, 4),
	(2, '2020-02-06', NULL, 4, 1, 1),
	(3, '2020-02-06', '2020-02-07', 2, 1, 1),
	(4, '2020-02-07', '2020-02-07', NULL, NULL, NULL);
/*!40000 ALTER TABLE `history` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
