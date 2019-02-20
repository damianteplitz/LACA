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


-- Como cargar datos en clientes cursos y Cursos abiertos: 
--insert into Clientes_cursos (id_cliente,id_cabierto,estado,f_consulta,f_inscripcion)
--values ((select id from Clientes where id = 1),(select id from Cursos_abiertos where id = 1),0,'2019-02-01','2019-02-28');
--
--insert into Cursos_abiertos (id_curso,f_inicio,f_final,estado)
--values ((select id from Cursos where id = 1),'2019-02-01','2019-02-28',0);
