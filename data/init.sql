CREATE DATABASE IF NOT EXISTS `sports_monitor`;

USE `sports_monitor`;

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users`
(
  `id`       int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(50)      NOT NULL,
  `password` varchar(255)     NOT NULL,
  PRIMARY KEY (`id`)
) DEFAULT CHARSET = utf8;

DROP TABLE IF EXISTS `rss_feeds`;

CREATE TABLE `rss_feeds`
(
  `id`   int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `src`  varchar(50)      NOT NULL,
  `name` varchar(100)     NOT NULL,
  `url`  varchar(255)     NOT NULL,
  PRIMARY KEY (`id`)
) DEFAULT CHARSET = utf8;

DROP TABLE IF EXISTS `users_rss_feeds`;

CREATE TABLE `users_rss_feeds`
(
  `id`          int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id`     int(11) UNSIGNED NOT NULL,
  `rss_feed_id` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  FOREIGN KEY (`rss_feed_id`) REFERENCES `rss_feeds` (`id`)
) DEFAULT CHARSET = utf8;
