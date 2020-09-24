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

-- Дамп структуры для таблица db_drm.zajava_structure
CREATE TABLE IF NOT EXISTS `zajava_structure` (
  `STRUCTURE_ID` int(11) NOT NULL AUTO_INCREMENT,
  `STRUCTURE_NAME` varchar(250) NOT NULL DEFAULT '0',
  `PARAGRAPH_ID` int(11) NOT NULL DEFAULT '0',
  `SOGLASOVANO` tinyint(1) DEFAULT NULL,
  `POSADA_ID` int(11) NOT NULL,
  PRIMARY KEY (`STRUCTURE_ID`),
  KEY `FK_doc_structure_doc_paragraph_PARAGRAPH_ID` (`PARAGRAPH_ID`),
  KEY `FK_zajava_structure_posada_POSADA_ID` (`POSADA_ID`),
  CONSTRAINT `FK_doc_structure_doc_paragraph_PARAGRAPH_ID` FOREIGN KEY (`PARAGRAPH_ID`) REFERENCES `doc_paragraph` (`PARAGRAPH_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_zajava_structure_posada_POSADA_ID` FOREIGN KEY (`POSADA_ID`) REFERENCES `posada` (`POSADA_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=551 DEFAULT CHARSET=utf8 COMMENT='Составляющие документа';

-- Дамп данных таблицы db_drm.zajava_structure: ~44 rows (приблизительно)
DELETE FROM `zajava_structure`;
/*!40000 ALTER TABLE `zajava_structure` DISABLE KEYS */;
INSERT INTO `zajava_structure` (`STRUCTURE_ID`, `STRUCTURE_NAME`, `PARAGRAPH_ID`, `SOGLASOVANO`, `POSADA_ID`) VALUES
	(298, 'Мастер 1,2', 2, NULL, 4),
	(299, 'Мастер 1,5', 30, NULL, 4),
	(300, 'Мастер 2,4', 6, NULL, 4),
	(301, 'Мастер 4,2', 10, NULL, 4),
	(302, 'Мастер 5,3', 13, NULL, 4),
	(303, '1', 18, NULL, 4),
	(304, '1', 41, NULL, 4),
	(305, '1', 20, NULL, 4),
	(306, '1', 21, NULL, 4),
	(307, '1', 43, NULL, 4),
	(308, '1', 23, NULL, 4),
	(309, '1', 25, NULL, 4),
	(500, 'Сторож 1,2', 2, NULL, 11),
	(501, 'Нововведена штатна одиниця', 31, NULL, 11),
	(502, 'cvbrth', 5, NULL, 11),
	(503, 'Сторож 2,7', 34, NULL, 11),
	(504, 'rthrth', 8, NULL, 11),
	(505, 'Автомобіль', 38, NULL, 11),
	(506, '1', 15, NULL, 11),
	(507, 'Кресло додатково', 16, NULL, 11),
	(508, '1', 17, NULL, 11),
	(509, '1', 43, NULL, 11),
	(510, '1', 24, NULL, 11),
	(528, 'Бухгалтер 23', 28, NULL, 3),
	(529, 'Бухгалтер 15', 30, NULL, 3),
	(530, 'Бухгалтер2,6', 6, NULL, 3),
	(531, '1', 14, NULL, 3),
	(532, '1', 15, NULL, 3),
	(533, '1', 17, NULL, 3),
	(534, '1', 18, NULL, 3),
	(535, '1', 20, NULL, 3),
	(536, '1', 43, NULL, 3),
	(537, '1', 44, NULL, 3),
	(538, '1', 22, NULL, 3),
	(539, '1', 23, NULL, 3),
	(540, '1', 24, NULL, 3),
	(541, '1', 26, NULL, 3),
	(542, '1', 27, NULL, 3),
	(543, '1', 49, NULL, 3),
	(544, '1', 50, NULL, 3),
	(547, 'Програмист наименов ваканс', 2, NULL, 1),
	(548, 'Нововведена штатна одиниця', 31, NULL, 1),
	(549, 'Програмист спец знання', 33, NULL, 1),
	(550, '1', 50, NULL, 1);
/*!40000 ALTER TABLE `zajava_structure` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
