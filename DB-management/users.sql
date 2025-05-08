CREATE DATABASE password_manager;
USE password_manager;

CREATE TABLE Users(
	id INT PRIMARY KEY,
    Name VARCHAR(30),
    Email VARCHAR(40),
    Password mediumtext
);

SELECT * FROM Users;