CREATE DATABASE IF NOT EXISTS portfolio
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE portfolio;

CREATE TABLE IF NOT EXISTS messages (
  id         INT UNSIGNED      NOT NULL AUTO_INCREMENT,
  name       VARCHAR(100)      NOT NULL,
  email      VARCHAR(150)      NOT NULL,
  message    TEXT              NOT NULL,
  created_at TIMESTAMP         NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  INDEX idx_created (created_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
