CREATE DATABASE new;

USE new;

CREATE TABLE INFO (
    ID INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    Name VARCHAR(250) NOT NULL,
    Email_Address VARCHAR(250),
    Phone VARCHAR(13),
    Street VARCHAR(250),
    City VARCHAR(250),
    State VARCHAR(250),
    Zip VARCHAR(250),
    Days_Attending VARCHAR(250),
    Activites_Attending  VARCHAR(250)
);

SELECT 
    *
FROM
    INFO;