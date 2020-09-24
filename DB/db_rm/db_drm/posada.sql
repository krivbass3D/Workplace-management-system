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

-- Дамп структуры для таблица db_drm.posada
CREATE TABLE IF NOT EXISTS `posada` (
  `POSADA_ID` int(11) NOT NULL AUTO_INCREMENT,
  `POSADA_NAME` varchar(255) DEFAULT NULL,
  `POSADA_PIDROZDIL` varchar(255) DEFAULT NULL,
  `POSADA_MESTO` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`POSADA_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='справочник посад';

-- Дамп данных таблицы db_drm.posada: ~6 rows (приблизительно)
DELETE FROM `posada`;
/*!40000 ALTER TABLE `posada` DISABLE KEYS */;
INSERT INTO `posada` (`POSADA_ID`, `POSADA_NAME`, `POSADA_PIDROZDIL`, `POSADA_MESTO`) VALUES
	(1, 'Програмист', 'УСУП', '15 кабинет'),
	(3, 'Бухгалтер', 'Центральная бухгалтерия', '56 кабинет'),
	(4, 'Мастер', 'Дільниця №3', '3 кабинет'),
	(11, 'Сторож', 'Цех', 'охраник'),
	(16, 'Тест', 'Тест', 'Тест'),
	(17, '1', '1', '1');
/*!40000 ALTER TABLE `posada` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
