DROP TABLE IF EXISTS `groups`;

#
# Table structure for table 'groups'
#

CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Dumping data for table 'groups'
#

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
     (1,'admin','Administrator'),
     (2,'members','General User');



DROP TABLE IF EXISTS `users`;
#
# Table structure for table 'users'
#
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_code` int(5) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `lname` varchar(45) NOT NULL,
  `uname` varchar(45) NOT NULL,
  `addr` varchar(255) NOT NULL,
  `tlp` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(255) DEFAULT 'uploads/user/user.png',
  `password` varchar(255) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_on` varchar(11) NOT NULL,
  `updated_on` varchar(11) NOT NULL,
  `last_login` varchar(11) NOT NULL,
  `activation_code` varchar(100) DEFAULT NULL,
  `remember_code` varchar(100) DEFAULT NULL,
  `forgotten_password_code` varchar(100) DEFAULT NULL,
  `forgotten_password_time` varchar(100) DEFAULT NULL,
  `salt` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


#
# Dumping data for table 'users'
#
INSERT INTO `users` (`id`, `user_code`, `fname`, `lname`, `uname`, `addr`, `tlp`, `email`, `image`, `password`, `ip_address`, `active`, `created_on`, `updated_on`, `last_login`, `activation_code`, `remember_code`, `forgotten_password_code`, `forgotten_password_time`, `salt`) VALUES (1,12345,'super','admin','super admin','padalarang',0226807565,'admin@admin.com','uploads/user/admin.png','$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36','127.0.0.1',1,'1268889823','','1454486396',NULL,NULL,NULL,NULL,NULL),(2,12346,'riky','nurdiana','rikynurdiana','padalarang',082315099988,'nurdiana.riky@gmail.com','uploads/user/user.png','$2y$08$8vNnm5eqMqx9.Cmq4H7nG.pOF5PF7sbCDlAKA6lLiy8CA088t0Hgq','127.0.0.1',1,'1454488032','','',NULL,NULL,NULL,NULL,NULL);


DROP TABLE IF EXISTS `users_groups`;

#
# Table structure for table 'users_groups'
#

CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `uc_users_groups` UNIQUE (`user_id`, `group_id`),
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
     (1,1,1),
     (2,1,2),
     (3,2,2);


DROP TABLE IF EXISTS `login_attempts`;

#
# Table structure for table 'login_attempts'
#

CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `images`;

#
# Table structure for table 'images'
#

CREATE TABLE `images` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `file` text NOT NULL,
  `caption` text NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `pelanggan`;
#
# Table structure for table 'pelanggan'
#
CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_code` int(11) unsigned NOT NULL,
  `id_barang` varchar(10) NOT NULL,
  `created_on` int(11) NOT NULL,
  `updated_on` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `barang`;
#
# Table structure for table 'barang'
#
CREATE TABLE `barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_code` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga_barang` int(20) NOT NULL,
  `kategori` varchar(45) NOT NULL,
  `stock_awal` int(11) NOT NULL,
  `stock_akhir` int(11) NOT NULL,
  `ori_image` varchar(255) NOT NULL,
  `thumb_image` varchar(255) NOT NULL,
  `kondisi` varchar(45) NOT NULL,
  `berat` varchar(45) NOT NULL,
  `min_pemesanan` int(11) NOT NULL,
  `spesifikasi` longtext NOT NULL,
  `payment_method` varchar(45) NOT NULL,
  `created_on` int(11) NOT NULL,
  `updated_on` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;