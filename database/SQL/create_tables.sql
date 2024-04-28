use iris_db;

CREATE TABLE iris_db.users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    idPesquisa INT(11),
    name VARCHAR(100) NOT NULL,
    login VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    contato Varchar(20),
    status TINYINT DEFAULT 0,
    `password` VARCHAR(255) NOT NULL
);

CREATE TABLE studies (
	id INT(11) AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(255),
	responsableUser INT(11),
	idUniversity INT(11)
);

CREATE TABLE universities (
	id INT(11) AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(255),
	acronym VARCHAR(10)
);

CREATE TABLE participants (
	id INT(11) AUTO_INCREMENT PRIMARY KEY,
	code INT(11),
	idStudy INT(11) NOT NULL,
	email VARCHAR(100) NOT NULL,
	token VARCHAR(255) NOT NULL,
	smartWatch VARCHAR(100) NOT NULL
);

