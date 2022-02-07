CREATE DATABASE bdproductos;

CREATE TABLE producto (
  codigo int(11) NOT NULL AUTO_INCREMENT,
  nombre varchar(120) DEFAULT NULL,
  precio decimal(6,2) DEFAULT NULL,
  PRIMARY KEY (codigo)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO producto VALUES (1, 'aceite', 1800.78);
INSERT INTO producto VALUES (2, 'pasta', 3570.52);

CREATE TABLE persona (
  codigo int(11) NOT NULL AUTO_INCREMENT,
  nombre varchar(120) NOT NULL,
  usuario varchar(120) NOT NULL,
  clave varchar(120) NOT NULL,
  rol varchar(120) NOT NULL CHECK (rol in ('admin', 'no-admin')),
  PRIMARY KEY (codigo)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO persona VALUES (1, 'jhonfer', 'jruiz', 'jruiz', 'admin');
INSERT INTO persona VALUES (2, 'adrian', 'agironza', 'agironza', 'no-admin');
