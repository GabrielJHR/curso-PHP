create database if not exists trabajo_04;

use trabajo_04;

create table if not exists tipodocumento(
	idtipodocumento int(11) NOT NULL auto_increment primary key,
    nombre varchar(5) NOT NULL,
    descripcion varchar(60)
);

create table if not exists tipousuario(
	idtipousuario int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre varchar(60) NOT NULL,
    descripcion varchar(60)
);

create table if not exists persona(
	idpersona int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    idtipodocumento int(11) NOT NULL,
    apellido varchar(60) NOT NULL,
    nombre varchar(60) NOT NULL,
    numerodocumento int(11) NOT NULL,
    sexo varchar(1) NOT NULL,
    nacionalidad varchar(10),
    email varchar(100) NOT NULL,
    telefono varchar(20),
    celular varchar(20),
    provincia varchar(100),
    localidad varchar(100),
    FOREIGN KEY (idtipodocumento) REFERENCES tipodocumento(idtipodocumento)
);

create table if not exists usuario(
	idusuario int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    idpersona int(11) NOT NULL,
    idtipousuario int(11) NOT NULL,
    nombre varchar(60) NOT NULL,
    contrasenia varchar(60) NOT NULL,
    FOREIGN KEY (idpersona) REFERENCES persona(idpersona),
    FOREIGN KEY (idtipousuario) REFERENCES tipousuario(idtipousuario)
);

INSERT INTO tipodocumento(nombre, descripcion) VALUES('DNI', 'Documento Nacional de Identidad');
INSERT INTO tipodocumento(nombre, descripcion) VALUES('LC', 'Libreta Cívica');
INSERT INTO tipodocumento(nombre, descripcion) VALUES('LE', 'Libreta de Enrolamiento');

INSERT INTO tipousuario(nombre, descripcion) VALUES('Administrador', 'Usuario Administrador');
INSERT INTO tipousuario(nombre, descripcion) VALUES('Normal', 'Usuario Normal');

INSERT INTO persona(idpersona, idtipodocumento, apellido, nombre, numerodocumento, sexo, email)
VALUES(1, 1, 'Administrador', 'Usuario', 0, 'M', 'admin@sgu.com');

INSERT INTO usuario(idusuario, idpersona, idtipousuario, nombre, contrasenia)
VALUES(1, 1, 1, 'admin', 'admin');

SELECT u.idusuario, u.nombre as username, p.apellido, p.nombre, td.descripcion as tipodocumento, p.numerodocumento, p.email
FROM persona p, usuario u, tipodocumento td
WHERE p.idpersona = u.idpersona
AND p.idtipodocumento = td.idtipodocumento
AND u.idtipousuario <> 1;