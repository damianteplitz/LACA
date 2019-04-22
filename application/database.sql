DROP TABLE Clientes_cursos;
DROP TABLE Clientes;
DROP TABLE Cursos_abiertos;
DROP TABLE Cursos;

CREATE TABLE Cursos (
    id int NOT NULL AUTO_INCREMENT,
    nombre varchar(255),
	profesor varchar(255),
	modalidad varchar(255),
	objetivo varchar(255),
	programa varchar(255),
	materiales varchar(255),
	requisitos varchar(255),
	kit_inicio varchar(255),
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
	telefono int,
    documento int,
    direccion varchar (255),
	localidad varchar (255),
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

INSERT INTO Cursos (nombre,detalles,duracion,minimo,maximo,profesor,modalidad,objetivo,programa,materiales,requisitos,kit_inicio) VALUES ('Cosmetologia', 'Curso de belleza de la piel',10,5,10,'Eli','practica','ganar plata','muuuchas cosas copadas','cremas y cosas caras','tener plata para pagarlo','muchas cosas que no vas a usar');
INSERT INTO Cursos (nombre,detalles,duracion,minimo,maximo,profesor,modalidad,objetivo,programa,materiales,requisitos,kit_inicio) VALUES ('Peeling','Curso de belleza de pestañas',10,5,10,'Eli','practica','ganar plata','muuuchas cosas copadas','cremas y cosas caras','tener plata para pagarlo','muchas cosas que no vas a usar');
INSERT INTO Cursos (nombre,detalles,duracion,minimo,maximo,profesor,modalidad,objetivo,programa,materiales,requisitos,kit_inicio) VALUES ('Maquillaje', 'Aprende a maquillarte como una reina',10,5,10,'Eli','practica','ganar plata','muuuchas cosas copadas','cremas y cosas caras','tener plata para pagarlo','muchas cosas que no vas a usar');
INSERT INTO Cursos (nombre,detalles,duracion,minimo,maximo,profesor,modalidad,objetivo,programa,materiales,requisitos,kit_inicio) VALUES ('Depilacion', 'Depilate y deja tus piernas sedosas',10,5,10,'Eli','practica','ganar plata','muuuchas cosas copadas','cremas y cosas caras','tener plata para pagarlo','muchas cosas que no vas a usar');

INSERT INTO Clientes (nombre,apellido,documento,direccion,mail,f_alta,telefono,localidad) VALUES ('Damian', 'Teplitz',39482778,'Bonifacio 2444 1º','damitepl@hotmail.com',CURDATE(),1131822452,'CABA');
INSERT INTO Clientes (nombre,apellido,documento,direccion,mail,f_alta,telefono,localidad) VALUES ('Karina', 'Kohen',20053087,'Bonifacio 2444 1º','karikohen@hotmail.com',CURDATE(),1123745926,'CABA');
INSERT INTO Clientes (nombre,apellido,documento,direccion,mail,f_alta,telefono,localidad) VALUES ('Laila', 'Teplitz',40187965,'Bonifacio 2444 1º','laitepl@hotmail.com',CURDATE(),1158162395,'CABA');
INSERT INTO Clientes (nombre,apellido,documento,direccion,mail,f_alta,telefono,localidad) VALUES ('Ariel', 'Teplitz',43256984,'Bonifacio 2444 1º','aritepl@hotmail.com',CURDATE(),1155986485,'CABA');


INSERT INTO Cursos_abiertos (id_curso,f_inicio,f_final,estado)
VALUES ((SELECT id FROM Cursos WHERE id = 1),'2019-02-01','2019-02-28',1);
INSERT INTO Cursos_abiertos (id_curso,f_inicio,f_final,estado)
VALUES ((SELECT id FROM Cursos WHERE id = 2),'2019-02-01','2019-02-28',1);
INSERT INTO Cursos_abiertos (id_curso,f_inicio,f_final,estado)
VALUES ((SELECT id FROM Cursos WHERE id = 3),'2019-02-01','2019-02-28',1);
INSERT INTO Cursos_abiertos (id_curso,f_inicio,f_final,estado)
VALUES ((SELECT id FROM Cursos WHERE id = 4),'2019-02-01','2019-02-28',1);



INSERT INTO Clientes_cursos (id_cliente,id_cabierto,estado,f_consulta,f_inscripcion)
VALUES ((SELECT id FROM Clientes WHERE id = 1),(SELECT id FROM Cursos_abiertos WHERE id = 1),1,CURDATE(),CURDATE());
INSERT INTO Clientes_cursos (id_cliente,id_cabierto,estado,f_consulta,f_inscripcion)
VALUES ((SELECT id FROM Clientes WHERE id = 1),(SELECT id FROM Cursos_abiertos WHERE id = 3),1,CURDATE(),CURDATE());
INSERT INTO Clientes_cursos (id_cliente,id_cabierto,estado,f_consulta,f_inscripcion)
VALUES ((SELECT id FROM Clientes WHERE id = 2),(SELECT id FROM Cursos_abiertos WHERE id = 1),1,CURDATE(),CURDATE());
INSERT INTO Clientes_cursos (id_cliente,id_cabierto,estado,f_consulta,f_inscripcion)
VALUES ((SELECT id FROM Clientes WHERE id = 2),(SELECT id FROM Cursos_abiertos WHERE id = 3),1,CURDATE(),CURDATE());
INSERT INTO Clientes_cursos (id_cliente,id_cabierto,estado,f_consulta,f_inscripcion)
VALUES ((SELECT id FROM Clientes WHERE id = 3),(SELECT id FROM Cursos_abiertos WHERE id = 1),1,CURDATE(),CURDATE());
INSERT INTO Clientes_cursos (id_cliente,id_cabierto,estado,f_consulta,f_inscripcion)
VALUES ((SELECT id FROM Clientes WHERE id = 3),(SELECT id FROM Cursos_abiertos WHERE id = 3),1,CURDATE(),CURDATE());
INSERT INTO Clientes_cursos (id_cliente,id_cabierto,estado,f_consulta,f_inscripcion)
VALUES ((SELECT id FROM Clientes WHERE id = 4),(SELECT id FROM Cursos_abiertos WHERE id = 1),1,CURDATE(),CURDATE());
INSERT INTO Clientes_cursos (id_cliente,id_cabierto,estado,f_consulta,f_inscripcion)
VALUES ((SELECT id FROM Clientes WHERE id = 4),(SELECT id FROM Cursos_abiertos WHERE id = 3),1,CURDATE(),CURDATE());


