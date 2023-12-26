CREATE DATABASE IF NOT EXISTS userlistdb;
CREATE USER IF NOT EXISTS 'user'@'localhost' IDENTIFIED BY 'password';
GRANT SELECT,UPDATE,INSERT ON appDB.* TO 'user'@'%';
FLUSH PRIVILEGES;
USE userlistdb;

CREATE TABLE IF NOT EXISTS usertbl (
	id INT(11) auto_increment NOT NULL,
	email varchar(32) NOT NULL,
	password varchar(64) NOT NULL,
	CONSTRAINT NewTable_PK PRIMARY KEY (id)
)
ENGINE=InnoDB
DEFAULT CHARSET=latin1
COLLATE=latin1_swedish_ci;

CREATE TABLE IF NOT EXISTS maths_test (
	id INT(11) auto_increment NOT NULL,
	question text NOT NULL,
	password varchar(32) NOT NULL,
	CONSTRAINT NewTable_PK PRIMARY KEY (id)
)