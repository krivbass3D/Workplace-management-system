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

-- Дамп структуры для таблица db_drm.doc_paragraph
CREATE TABLE IF NOT EXISTS `doc_paragraph` (
  `PARAGRAPH_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PARAGRAPH_No` int(11) DEFAULT NULL,
  `PARAGRAPH_NAME` varchar(250) DEFAULT NULL,
  `SECTION_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`PARAGRAPH_ID`),
  KEY `FK_doc_paragraph_doc_section_SECTION_ID` (`SECTION_ID`),
  CONSTRAINT `FK_doc_paragraph_doc_section_SECTION_ID` FOREIGN KEY (`SECTION_ID`) REFERENCES `zajava_section` (`SECTION_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COMMENT='Подразделы заявки';

-- Дамп данных таблицы db_drm.doc_paragraph: ~51 rows (приблизительно)
DELETE FROM `doc_paragraph`;
/*!40000 ALTER TABLE `doc_paragraph` DISABLE KEYS */;
INSERT INTO `doc_paragraph` (`PARAGRAPH_ID`, `PARAGRAPH_No`, `PARAGRAPH_NAME`, `SECTION_ID`) VALUES
	(1, 1, 'Повна назва структурного підрозділу, в якому відкрита вакансія', 1),
	(2, 2, 'Найменування вакантної посади', 1),
	(3, 7, 'Освіта', 2),
	(4, 8, 'Пріоритетні ВНЗ', 2),
	(5, 9, 'Досвід роботи (сфера діяльності, стаж)', 2),
	(6, 10, 'Найменування підприємств, фірм та компаній, які можуть зацікавити в першу чергу', 2),
	(7, 15, 'Операційні системи та програми Microsoft Word Microsoft Exel', 3),
	(8, 16, 'Спеціальні програми/пакети/бази даних AutoCAD, Map.Info', 3),
	(9, 19, 'Перелік службових обов\'язків, які передбачені посадою', 4),
	(10, 20, 'Графік роботи', 4),
	(11, 23, 'Рівень заробітної плати, яку буде отримувати робітником', 5),
	(12, 24, 'Додаткові виплати', 5),
	(13, 25, 'Компенсаційний пакет', 5),
	(14, 26, 'Офісний стіл', 6),
	(15, 27, 'Крісло/стілець', 6),
	(16, 28, 'Додатково', 6),
	(17, 29, 'Стаціонарний персональний компьютер', 7),
	(18, 32, 'Принтер', 7),
	(19, 30, 'Ноутбук', 7),
	(20, 35, 'ЗУП', 8),
	(21, 36, '1С Бухгалтерія', 8),
	(22, 38, 'IP телефон', 9),
	(23, 39, 'Sim-карта', 9),
	(24, 41, 'Канцелярські приладдя', 10),
	(25, 42, 'Костюм бавовняний', 11),
	(26, 46, 'Футболка бавовняна', 11),
	(27, 48, 'Халат білий медичний', 11),
	(28, 3, 'П.І.Б. директора з напрямку', 1),
	(29, 4, 'П.І.Б. начальника управління', 1),
	(30, 5, 'П.І.Б. безпосереднього керівника', 1),
	(31, 6, 'Причина виникнення вакансії', 1),
	(32, 11, 'Кандидат має професійні знання в таких сферах:', 2),
	(33, 12, 'Спеціальні знання та навички', 2),
	(34, 13, 'Особисті якості, необхідні для даної посади', 2),
	(35, 14, 'Знання іноземних мов та рівень їх володіння', 3),
	(36, 17, 'Язики програмування', 3),
	(37, 18, 'Інше', 3),
	(38, 21, 'Відрядження (тривалість, частота)', 4),
	(39, 22, 'Перспективи росту (посада, сроки)', 4),
	(40, 31, 'Зовнішні пристрої (подовжувачі USB, модеми, роутери і т.д.)', 7),
	(41, 32, 'Сканер', 7),
	(42, 33, 'БФП', 7),
	(43, 34, 'Документообіг', 8),
	(44, 37, 'Industry', 8),
	(45, 40, 'Електронна пошта', NULL),
	(46, 43, 'Костюм брезентовий', 11),
	(47, 44, 'Халат бавовняний', 11),
	(48, 45, 'Комбінезон бавовняний', 11),
	(49, 47, 'Напівкомбінезон', 11),
	(50, 49, 'Кепка робоча', 11),
	(51, 50, 'Шапка утеплена', 11);
/*!40000 ALTER TABLE `doc_paragraph` ENABLE KEYS */;

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

-- Дамп структуры для таблица db_drm.rm_user
CREATE TABLE IF NOT EXISTS `rm_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='Пользователи системы';

-- Дамп данных таблицы db_drm.rm_user: ~5 rows (приблизительно)
DELETE FROM `rm_user`;
/*!40000 ALTER TABLE `rm_user` DISABLE KEYS */;
INSERT INTO `rm_user` (`user_id`, `username`, `password`, `status`) VALUES
	(1, 'admin', 'admin', 'administrator'),
	(2, 'hr', 'hr', 'administrator'),
	(3, 'user', 'user', 'user'),
	(4, 'it', 'it', 'it'),
	(5, 'мтз', 'мтз', 'мтз');
/*!40000 ALTER TABLE `rm_user` ENABLE KEYS */;

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
