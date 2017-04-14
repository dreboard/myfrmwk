CREATE TABLE `Session` (
  `Session_Id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Session_Expires` datetime NOT NULL,
  `Session_Data` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`Session_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;