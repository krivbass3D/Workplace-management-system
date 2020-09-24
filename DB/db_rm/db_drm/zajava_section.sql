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

-- Дамп структуры для таблица db_drm.zajava_section
CREATE TABLE IF NOT EXISTS `zajava_section` (
  `SECTION_ID` int(11) NOT NULL AUTO_INCREMENT,
  `SECTION_NAME` varchar(50) NOT NULL DEFAULT '0',
  `TIP_ZAJAVA_ID` int(11) NOT NULL DEFAULT '0',
  `SECTION_No` int(11) DEFAULT NULL,
  `SOGLAS_SLUGBA_ID` int(11) NOT NULL,
  PRIMARY KEY (`SECTION_ID`),
  KEY `FK_doc_section_tip_doc_TIP_DOC_ID` (`TIP_ZAJAVA_ID`),
  KEY `FK_zajava_section_rm_slugba_soglas_SLUGBA_SOGLAS_ID` (`SOGLAS_SLUGBA_ID`),
  CONSTRAINT `FK_zajava_section_rm_slugba_soglas_SLUGBA_SOGLAS_ID` FOREIGN KEY (`SOGLAS_SLUGBA_ID`) REFERENCES `rm_slugba_soglas` (`SLUGBA_SOGLAS_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_zajava_section_tip_zajava_TIP_ZAJAVA_ID` FOREIGN KEY (`TIP_ZAJAVA_ID`) REFERENCES `tip_zajava` (`TIP_ZAJAVA_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='Разделы заявки';

-- Дамп данных таблицы db_drm.zajava_section: ~11 rows (приблизительно)
DELETE FROM `zajava_section`;
/*!40000 ALTER TABLE `zajava_section` DISABLE KEYS */;
INSERT INTO `zajava_section` (`SECTION_ID`, `SECTION_NAME`, `TIP_ZAJAVA_ID`, `SECTION_No`, `SOGLAS_SLUGBA_ID`) VALUES
	(1, 'Загальні відомості', 2, 1, 1),
	(2, 'Основні вимого до кандидата', 2, 2, 1),
	(3, 'Додаткові вимоги', 2, 3, 1),
	(4, 'Функціональні обов\'язки', 2, 4, 1),
	(5, 'Компенсація', 2, 5, 1),
	(6, 'Офісні меблі', 1, 6, 2),
	(7, 'Оргтехніка та комп\'ютерне забеспечення', 1, 7, 3),
	(8, 'Спеціальне програмне забеспечення', 1, 8, 3),
	(9, 'Корпоративний зв\'язок', 1, 9, 3),
	(10, 'Канцелярське приляддя', 1, 10, 2),
	(11, 'Спецодяг', 1, 11, 4);
/*!40000 ALTER TABLE `zajava_section` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
