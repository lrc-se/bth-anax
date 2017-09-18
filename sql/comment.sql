SET NAMES utf8;
USE kabc16;

DROP TABLE IF EXISTS rv1_comment;
CREATE TABLE rv1_comment (
    id INT UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
	contentId VARCHAR(30) NOT NULL,
    userId INT UNSIGNED NOT NULL,
	editorId INT UNSIGNED NULL,
    text VARCHAR(2000) NOT NULL,
    created DATETIME NOT NULL,
    updated DATETIME NULL,

	FOREIGN KEY (userId) REFERENCES rv1_user(id),
	FOREIGN KEY (editorId) REFERENCES rv1_user(id)
) ENGINE InnoDB CHARACTER SET utf8 COLLATE utf8_swedish_ci;

CREATE INDEX idx_created ON rv1_comment(created);
