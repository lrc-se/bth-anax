-- setup
SET NAMES utf8;
USE kabc16;


-- clean
DROP TABLE IF EXISTS rv1_comment;
DROP TABLE IF EXISTS rv1_user;
DROP TABLE IF EXISTS rv1_book;


-- Users
CREATE TABLE rv1_user (
	id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
	username VARCHAR(25) NULL UNIQUE,
	password VARCHAR(255) NULL,
	name VARCHAR(100) NOT NULL,
	email VARCHAR(200) NULL,
	admin TINYINT NULL DEFAULT 0,
	deleted DATETIME NULL
) ENGINE InnoDB CHARACTER SET utf8 COLLATE utf8_swedish_ci;

INSERT INTO rv1_user VALUES (1, 'admin', '$2y$10$28ANwequzg1BryIAwdXrt.D65WjRjxQHC35mYSXlA2/6KQMUA0.dS', 'Admin', 'kabc16@student.bth.se', 1, NULL);
INSERT INTO rv1_user VALUES (2, 'doe', '$2y$10$5NG8.RGSS/0HZ3lN6PUx7eVFAj10AW8/HMOj6tzV3GhmWuY8SnFCa', 'John Doe', 'e@mail.com', 0, NULL);


-- Comments
CREATE TABLE rv1_comment (
    id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
	contentId VARCHAR(30) NOT NULL,
    userId INT UNSIGNED NOT NULL,
	editorId INT UNSIGNED NULL,
    text VARCHAR(2000) NOT NULL,
    created DATETIME NOT NULL,
    updated DATETIME NULL,

	FOREIGN KEY (userId) REFERENCES rv1_user(id) ON DELETE CASCADE,
	FOREIGN KEY (editorId) REFERENCES rv1_user(id) ON DELETE SET NULL
) ENGINE InnoDB CHARACTER SET utf8 COLLATE utf8_swedish_ci;

CREATE INDEX idx_created ON rv1_comment(created);


-- Books
CREATE TABLE rv1_book (
    id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
    title VARCHAR(200) NOT NULL,
    author VARCHAR(200) NOT NULL,
    published INT NULL,
    isbn VARCHAR(13) NULL,
    language VARCHAR(50) NULL
) ENGINE InnoDB CHARACTER SET utf8 COLLATE utf8_swedish_ci;

-- CREATE INDEX idx_title ON rv1_book(title);

INSERT INTO rv1_book (title, author, published, language)
    VALUES ('The Fellowship of the Ring', 'J.R.R. Tolkien', 1954, 'Engelska');
INSERT INTO rv1_book (title, author, published, language)
    VALUES ('The Two Towers', 'J.R.R. Tolkien', 1954, 'Engelska');
INSERT INTO rv1_book (title, author, published, language)
    VALUES ('The Return of the King', 'J.R.R. Tolkien', 1955, 'Engelska');
INSERT INTO rv1_book (title, author, published, isbn)
    VALUES ('The Klingon Dictionary', 'Marc Okrand', 1992, '9780671745592');
INSERT INTO rv1_book (title, author, language)
    VALUES ('The Art of War', 'Sun Tzu', 'Kinesiska');
