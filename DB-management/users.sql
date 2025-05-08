CREATE DATABASE password_manager;
USE password_manager;

CREATE TABLE Users(
	id INT PRIMARY KEY,
    Name VARCHAR(30),
    Age INT,
    Email VARCHAR(40)
);

SELECT * FROM Users;