USE challenge_being_db;
CREATE TABLE `challenge_being_db`.`converter_logs` (
  `id`         INT          NOT NULL AUTO_INCREMENT,
  `email`      VARCHAR(80)  NULL,
  `filename`   VARCHAR(255) NULL,
  `created_at` DATETIME     NULL,
  PRIMARY KEY (`id`)
);