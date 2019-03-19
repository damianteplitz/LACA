DROP TABLE Clientes_cursos;
DROP TABLE Clientes;
DROP TABLE Cursos_abiertos;
DROP TABLE Cursos;

CREATE TABLE Cursos (
    id int NOT NULL AUTO_INCREMENT,
    nombre varchar(255),
    detalles varchar(255),
    duracion int,
    minimo int,
    maximo int,
    PRIMARY KEY (id)
);

CREATE TABLE Cursos_abiertos (
    id int NOT NULL AUTO_INCREMENT,
    id_curso int NOT NULL,
    f_inicio date,
    f_final date,
    estado int,
    FOREIGN KEY (id_curso) REFERENCES Cursos(id),
	PRIMARY KEY (id)
);

CREATE TABLE Clientes (
    id int NOT NULL AUTO_INCREMENT,
    nombre varchar (255),
    apellido varchar (255),
    documento int,
    direccion varchar (255),
    mail varchar (255),
    f_alta date,
    PRIMARY KEY (id)
);

CREATE TABLE Clientes_cursos (
    id int NOT NULL AUTO_INCREMENT,
    id_cliente int NOT NULL,
    id_cabierto int NOT NULL,
    estado int,
    f_consulta date,
    f_inscripcion date,
    FOREIGN KEY (id_cliente) REFERENCES Clientes(id),
    FOREIGN KEY (id_cabierto) REFERENCES Cursos_abiertos(id),
    PRIMARY KEY (id)
);

INSERT INTO Cursos (nombre,detalles,duracion,minimo,maximo) VALUES ('Cosmetologia', 'Curso de belleza de la piel',10,5,10);
INSERT INTO Cursos (nombre,detalles,duracion,minimo,maximo) VALUES ('Peeling','Curso de belleza de pestañas',10,5,10);
INSERT INTO Cursos (nombre,detalles,duracion,minimo,maximo) VALUES ('Maquillaje', 'Aprende a maquillarte como una reina',10,5,10);
INSERT INTO Cursos (nombre,detalles,duracion,minimo,maximo) VALUES ('Depilacion', 'Depilate y deja tus piernas sedosas',10,5,10);

INSERT INTO Clientes (nombre,apellido,documento,direccion,mail,f_alta) VALUES ('Damian', 'Teplitz',39482778,'Bonifacio 2444 1º','damitepl@hotmail.com',CURDATE());
INSERT INTO Clientes (nombre,apellido,documento,direccion,mail,f_alta) VALUES ('Karina', 'Kohen',20053087,'Bonifacio 2444 1º','karikohen@hotmail.com',CURDATE());
INSERT INTO Clientes (nombre,apellido,documento,direccion,mail,f_alta) VALUES ('Laila', 'Teplitz',40187965,'Bonifacio 2444 1º','laitepl@hotmail.com',CURDATE());
INSERT INTO Clientes (nombre,apellido,documento,direccion,mail,f_alta) VALUES ('Ariel', 'Teplitz',43256984,'Bonifacio 2444 1º','aritepl@hotmail.com',CURDATE());


INSERT INTO Cursos_abiertos (id_curso,f_inicio,f_final,estado)
VALUES ((SELECT id FROM Cursos WHERE id = 1),'2019-02-01','2019-02-28',1);
INSERT INTO Cursos_abiertos (id_curso,f_inicio,f_final,estado)
VALUES ((SELECT id FROM Cursos WHERE id = 2),'2019-02-01','2019-02-28',1);
INSERT INTO Cursos_abiertos (id_curso,f_inicio,f_final,estado)
VALUES ((SELECT id FROM Cursos WHERE id = 3),'2019-02-01','2019-02-28',1);
INSERT INTO Cursos_abiertos (id_curso,f_inicio,f_final,estado)
VALUES ((SELECT id FROM Cursos WHERE id = 4),'2019-02-01','2019-02-28',1);