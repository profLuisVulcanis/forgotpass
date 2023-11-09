CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_mail` varchar(60) NOT NULL,
  `user_pass` char(32) NOT NULL,
  `user_status` char(10) NOT NULL DEFAULT 'ativo',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_mail` (`user_mail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
