CREATE TABLE IF NOT EXISTS `forgot_pass` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_mail` varchar(60) NOT NULL,
  `user_token` char(32) NOT NULL,
  `status` char(10) NOT NULL DEFAULT 'send',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
