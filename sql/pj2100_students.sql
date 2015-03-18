CREATE DATABASE IF NOT EXISTS pj2100;
USE pj2100;

DROP TABLE IF EXISTS students;

CREATE TABLE students (
  StudentID int(11) NOT NULL UNIQUE,
  LastName varchar(255) DEFAULT NULL,
  FirstName varchar(255) DEFAULT NULL,
  Email varchar(255) DEFAULT NULL UNIQUE,
  Passphrase int(11) NOT NULL,
  PRIMARY KEY (StudentID)
);

LOCK TABLES students WRITE;
INSERT INTO students VALUES 
	(100000,'Inu Bake','Txũtxũ','inutxu14@student.westerdals.no',123),
	(111111,'Askeladd','Per','askper14@student.westerdals.no',123),
	(222222,'Askeladd','Pål','askpål14@student.westerdals.no',123),
	(333333,'Askeladd','Espen','askesp14@student.westerdals.no',123),
	(444444,'Kenobi','Obi Wan','kenobi14@student.westerdals.no',123),
	(555555,'Rogers','Kenny','rogken14@student.westerdals.no',123),
	(666666,'Astley','Rick','astric14@student.westerdals.no',123),
	(701648,'Schrøder','Christoffer','schchr13@student.westerdals.no',123),
	(701904,'Meieran','Liam Alex Shane','meilia14@student.westerdals.no',123),
	(702073,'Mørkeseth','Patrik','morpat14@student.westerdals.no',123),
	(702220,'Nguyen','Dang Cong','ngudan14@student.westerdals.no',123),
	(701948, 'Gundersen', 'Preben', 'gunpre14@student.westerdals.no', 123),
	(777777,'Palpatine','Sheev','palshe14@student.westerdals.no',123),
	(888888,'Nawa','Hushu','nawhus14@student.westerdals.no',123),
	(999999,'Dua Bake','Txana Bane','duatxa14@student.westerdals.no',123);
UNLOCK TABLES;

