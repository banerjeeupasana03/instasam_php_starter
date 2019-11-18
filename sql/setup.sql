CREATE DATABASE instasam;
ALTER DATABASE instasam CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;
USE instasam;

CREATE USER 'instasam'@'localhost' IDENTIFIED BY 'instasam';
GRANT ALL PRIVILEGES ON instasam.* TO 'instasam'@'localhost';
