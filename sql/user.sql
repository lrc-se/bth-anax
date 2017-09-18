SET NAMES utf8;
USE kabc16;

DROP TABLE IF EXISTS rv1_user;
CREATE TABLE rv1_user (
	id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
	username VARCHAR(25) NULL UNIQUE,
	password VARCHAR(255) NULL,
	name VARCHAR(100) NOT NULL,
	email VARCHAR(200) NULL,
	admin TINYINT NOT NULL DEFAULT 0
) ENGINE InnoDB CHARACTER SET utf8 COLLATE utf8_swedish_ci;

INSERT INTO rv1_user VALUES (1, 'admin', '$2y$10$28ANwequzg1BryIAwdXrt.D65WjRjxQHC35mYSXlA2/6KQMUA0.dS', 'Admin', 'kabc16@student.bth.se', 1);
INSERT INTO rv1_user VALUES (2, 'doe', '$2y$10$5NG8.RGSS/0HZ3lN6PUx7eVFAj10AW8/HMOj6tzV3GhmWuY8SnFCa', 'John Doe', 'e@mail.com', 0);
