--CREATE DATABASE Route66

USE Route66

CREATE TABLE Bruger
(
Idbruger INT PRIMARY KEY IDENTITY (1,1) NOT NULL,
Navnbruger NVARCHAR(45) NOT NULL,
Mailbruger NVARCHAR(45) NOT NULL,
Mobilbruger INT,
Har_rigtige NVARCHAR(45),
Monthbruger DATE,
Vinder BIT
)

CREATE TABLE Administartor
(
Idaministartor INT PRIMARY KEY IDENTITY (1,1) NOT NULL,
Administartorlogin NVARCHAR(45) NOT NULL,
Administartotkode NVARCHAR(45) NOT NULL
)

CREATE TABLE Qusten
(
Idqusten INT PRIMARY KEY IDENTITY (1,1) NOT NULL,
Queten NVARCHAR(45) NOT NULL
)

CREATE TABLE Svarmulighed
(
Idsvarmulighed INT PRIMARY KEY IDENTITY (1,1) NOT NULL,
Svarmuligheder NVARCHAR(45) NOT NULL,
Rigtige_eller_forkert BIT NOT NULL,
Idqusten_svarmulighed iNT FOREIGN KEY REFERENCES Qusten(IDqusten)
)