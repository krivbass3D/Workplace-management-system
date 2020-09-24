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

-- Дамп структуры для таблица db_drm.marshrut
CREATE TABLE IF NOT EXISTS `marshrut` (
  `MARSHRUT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `MARSHRUT_NAME` varchar(45) DEFAULT NULL,
  `MARSHRUT_N_ETAP` int(11) DEFAULT NULL,
  `TIP_DOC_ID` int(11) DEFAULT NULL,
  `DOLGNOST_ID` int(11) DEFAULT NULL,
  `DEYSTVIE_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`MARSHRUT_ID`),
  KEY `FK_marshrut_tip_doc_TIP_DOC_ID` (`TIP_DOC_ID`),
  KEY `FK_marshrut_deystvie_DEYSTVIE_ID` (`DEYSTVIE_ID`),
  KEY `FK_marshrut_dolgnost_DOLGNOST_ID` (`DOLGNOST_ID`),
  CONSTRAINT `FK_marshrut_deystvie_DEYSTVIE_ID` FOREIGN KEY (`DEYSTVIE_ID`) REFERENCES `deystvie` (`DEYSTVIE_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_marshrut_dolgnost_DOLGNOST_ID` FOREIGN KEY (`DOLGNOST_ID`) REFERENCES `dolgnost` (`DOLGNOST_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='Пункты маршрута документа';

-- Дамп данных таблицы db_drm.marshrut: ~7 rows (приблизительно)
DELETE FROM `marshrut`;
/*!40000 ALTER TABLE `marshrut` DISABLE KEYS */;
INSERT INTO `marshrut` (`MARSHRUT_ID`, `MARSHRUT_NAME`, `MARSHRUT_N_ETAP`, `TIP_DOC_ID`, `DOLGNOST_ID`, `DEYSTVIE_ID`) VALUES
	(1, 'Отправка на рассмотрение', 3, 1, 4, 2),
	(2, 'Утверждение заявки на вакансию', 4, 1, 5, 3),
	(3, 'Создание требований к РМ', 5, 2, 5, 1),
	(4, 'Отправка на согласование', 6, 2, 5, 2),
	(5, 'Утверждение заявки на РМ', 7, 2, 4, 3),
	(8, 'Создание должности', 1, 1, 3, 1),
	(9, 'Создание требований к вакансии', 2, 1, 3, 1);
/*!40000 ALTER TABLE `marshrut` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
