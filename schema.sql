CREATE TABLE IF NOT EXISTS `article` (
  `id`           INT           UNSIGNED NOT NULL AUTO_INCREMENT,
  `userId`       INT           UNSIGNED NOT NULL,
  `title`        VARCHAR(255)           NOT NULL,
  `description`  TEXT                   NULL,
  `text`         TEXT                   NULL,
  `state`        TINYINT       UNSIGNED NOT NULL,
  `createdAt`    TIMESTAMP              NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
)
  ENGINE=InnoDB 
  DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `user` (
  `id`           INT           UNSIGNED NOT NULL AUTO_INCREMENT,
  `password`     CHAR(60)               NOT NULL,
  `login`        VARCHAR(50)            NOT NULL,
  `email`        VARCHAR(50)            NOT NULL,
  `role`         TINYINT       UNSIGNED NOT NULL,
  `firstName`    VARCHAR(25)            NULL,
  `lastName`     VARCHAR(25)            NULL,
  `birthday`     DATE                   NOT NULL,
  `state`        TINYINT       UNSIGNED NOT NULL,
  `gender`       TINYINT       UNSIGNED NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY  `name` (`name`)
)  
  ENGINE=InnoDB 
  DEFAULT CHARSET=utf8;