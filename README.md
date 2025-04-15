<h1>COMP1006 Final Exam</h1>
<p>Run this SQL script to create and populate new database tables in your AWS database.  Note: each table is prefixed with the word “exam” so there should be no conflicts with any existing tables you may already have. Please only use examprovinces, examridings, and examusers tables for this exam not the original tables we built in class. Use MySQLWorkbench to access your MySQL database on the AWS server.</p>

DROP TABLE IF EXISTS examprovinces;

DROP TABLE IF EXISTS examridings;

DROP TABLE IF EXISTS examusers;

CREATE TABLE examprovinces
(provinceId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NOT NULL,
photo VARCHAR(100));

CREATE TABLE examridings (
ridingId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(100) NOT NULL,
provinceId INT NOT NULL);

ALTER TABLE examridings AUTO_INCREMENT 2000; 

CREATE TABLE examusers
(userId INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(100) NOT NULL,
password VARCHAR(128) NOT NULL,
photo VARCHAR(100));

INSERT INTO examprovinces (name) VALUES 
('British Columbia'),
('Ontario'), 
('Quebec');

INSERT INTO examridings (name, provinceId) VALUES 
('Surrey Centre', 1),
('Vancouver East', 1),
('Victoria', 1),
('Barrie South - Innisfil', 2),
('Burlington', 2),
('Guelph', 2),
('Papineau', 3),
('Drummond', 3),
('Gatineau', 3);


