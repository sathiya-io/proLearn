CREATE TABLE users (
ID int IDENTITY(1,1) PRIMARY KEY,
username varchar(255) NOT NULL UNIQUE,
email varchar(255) NOT NULL,
password varchar(255) NOT NULL,
active bit NOT NULL
)