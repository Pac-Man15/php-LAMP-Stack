-- mysql -u root -p < sql/schema.sql
CREATE DATABASE IF NOT EXISTS jabb CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE jabb;

CREATE TABLE IF NOT EXISTS contact_messages (
  id         INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name       VARCHAR(100)  NOT NULL,
  email      VARCHAR(150)  NOT NULL,
  topic      VARCHAR(20)   NOT NULL,
  message    TEXT          NOT NULL,
  mail_sent  TINYINT(1)    NOT NULL DEFAULT 0,
  created_at TIMESTAMP     NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY idx_created (created_at)
) ENGINE=InnoDB;

-- Replace the password, then run:
-- CREATE USER 'jabb'@'localhost' IDENTIFIED BY 'a-long-random-password';
-- GRANT INSERT, SELECT ON jabb.contact_messages TO 'jabb'@'localhost';
