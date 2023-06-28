CREATE DATABASE campuslands;
use campuslands;
CREATE TABLE pais(
    idPais INT(11) NOT NULL PRIMARY KEY,
    NombrePais VARCHAR(50) NOT NULL
);
ALTER TABLE pais MODIFY COLUMN nombrePais INT(50);


CREATE TABLE departamento(
    idDep INT(11) NOT NULL PRIMARY KEY,
    nombreDep VARCHAR(50) NOT NULL,
    idPais INT(11) NOT NULL,
    FOREIGN KEY (idPais) REFERENCES pais(idPais)
);

CREATE TABLE region(
    idRegion INT(11) NOT NULL PRIMARY KEY,
    nombreReg VARCHAR(60) NOT NULL,
    idDep INT(11) NOT NULL,
    FOREIGN KEY (idDep) REFERENCES departamento(idDep)
);

CREATE TABLE campers(
    idCamper VARCHAR(20) NOT NULL PRIMARY KEY,
    nombreCamper VARCHAR(50) NOT NULL,
    apellidoCamper VARCHAR(50) NOT NULL,
    fechaNac DATE NOT NULL,
    idReg INT(11) NOT NULL,
    FOREIGN KEY (idReg) REFERENCES region(idRegion)
);