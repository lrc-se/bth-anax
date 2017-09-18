SET NAMES utf8;
USE kabc16;

DROP TABLE IF EXISTS rv1_book;
CREATE TABLE rv1_book (
    id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    title VARCHAR(200) NOT NULL,
    author VARCHAR(200) NOT NULL,
    published INT NULL,
    isbn VARCHAR(13) NULL,
    language VARCHAR(50) NULL
) ENGINE InnoDB CHARACTER SET utf8 COLLATE utf8_swedish_ci;

-- CREATE INDEX idx_title ON rv1_book(title);
