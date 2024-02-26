CREATE TABLE IF NOT EXISTS `PREFIX_sav_requests` (
  `id_sav_request` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `sav_type` VARCHAR(255) NOT NULL,
  `sav_description` TEXT NOT NULL,
  `date_add` DATETIME NOT NULL,
  `date_upd` DATETIME NOT NULL,
  PRIMARY KEY (`id_sav_request`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
