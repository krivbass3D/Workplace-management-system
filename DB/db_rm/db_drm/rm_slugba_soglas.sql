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

-- Дамп структуры для таблица db_drm.rm_slugba_soglas
CREATE TABLE IF NOT EXISTS `rm_slugba_soglas` (
  `SLUGBA_SOGLAS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SLUGBA_SOGLAS_NAME` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`SLUGBA_SOGLAS_ID`),
  KEY `FK_rm_slugba_soglas_rm_user_user_id` (`user_id`),
  CONSTRAINT `FK_rm_slugba_soglas_rm_user_user_id` FOREIGN KEY (`user_id`) REFERENCES `rm_user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Службы согласования вакансии и рабочего места';

-- Дамп данных таблицы db_drm.rm_slugba_soglas: ~4 rows (приблизительно)
DELETE FROM `rm_slugba_soglas`;
/*!40000 ALTER TABLE `rm_slugba_soglas` DISABLE KEYS */;
INSERT INTO `rm_slugba_soglas` (`SLUGBA_SOGLAS_ID`, `SLUGBA_SOGLAS_NAME`, `user_id`) VALUES
	(1, 'HR', 2),
	(2, 'МТЗ', 5),
	(3, 'IT', 4),
	(4, 'Спецодежда', 5);
/*!40000 ALTER TABLE `rm_slugba_soglas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
