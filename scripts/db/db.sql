CREATE DATABASE campuslands;
use campuslands;
CREATE TABLE eps(
    IdEps INT(11) NOT NULL PRIMARY KEY,
    NombreEps VARCHAR(50) NOT NULL,
    DireccionEps VARCHAR(30) NOT NULL
);

CREATE TABLE ciudad(
    IdCiudad INT(11) NOT NULL PRIMARY KEY,
    NombreCiudad VARCHAR(50) NOT NULL,
    Region VARCHAR(30) NOT NULL
);

CREATE TABLE paciente(
    IdPaciente INT(11) NOT NULL PRIMARY KEY,
    NombrePaciente VARCHAR(50) NOT NULL,
    FechaNacimiento DATE NOT NULL,
    TipoSangre VARCHAR(10) NOT NULL,
    IdEps INT(11) NOT NULL,
    IdCiudad INT(11) NOT NULL,
    FOREIGN KEY (IdEps) REFERENCES eps(IdEps),
    FOREIGN KEY (IdCiudad) REFERENCES ciudad(IdCiudad)
);

CREATE TABLE bacteriologo(
    IdBacteriologo INT(11) NOT NULL PRIMARY KEY,
    NombreBacteriologo VARCHAR(50) NOT NULL,
    FechaIngreso DATE NOT NULL
);

CREATE TABLE ordenes(
    IdOrdenes INT(11) NOT NULL PRIMARY KEY,
    NombreOrdenes VARCHAR(50) NOT NULL,
    Medico VARCHAR(50) NOT NULL,
    IdPaciente INT(11) NOT NULL,
    IdBacteriologo INT(11) NOT NULL,
    FOREIGN KEY (IdPaciente) REFERENCES paciente(IdPaciente),
    FOREIGN KEY (IdBacteriologo) REFERENCES bacteriologo(IdBacteriologo)
);

CREATE TABLE examenes(
    Codigo INT(11) NOT NULL PRIMARY KEY,
    NombreExamenes VARCHAR(50) NOT NULL,
    Costo INT(11) NOT NULL,
    IdBacteriologo INT(11) NOT NULL,
    FOREIGN KEY (IdBacteriologo) REFERENCES bacteriologo(IdBacteriologo)
);

CREATE TABLE reactivos(
    IdReactivos INT(11) NOT NULL PRIMARY KEY,
    NombreReactivos VARCHAR(50) NOT NULL,
    Existencias INT(11) NOT NULL
);

CREATE TABLE examenes_reactivos(
    IdExamenesReactivos INT(11) NOT NULL PRIMARY KEY,
    Codigo INT(11) NOT NULL,
    IdReactivos INT(11) NOT NULL,
    FOREIGN KEY (Codigo) REFERENCES examenes(Codigo),
    FOREIGN KEY (IdReactivos) REFERENCES reactivos(IdReactivos)
);

CREATE TABLE proveedor(
    NitProveedor INT(11) NOT NULL PRIMARY KEY,
    NombreProveedor VARCHAR(50) NOT NULL
);

CREATE TABLE reactivos_proveedor(
    IdReactivosProveedor INT(11) NOT NULL PRIMARY KEY,
    IdReactivos INT(11) NOT NULL,
    NitProveedor INT(11) NOT NULL,
    FOREIGN KEY (IdReactivos) REFERENCES reactivos(IdReactivos),
    FOREIGN KEY (NitProveedor) REFERENCES proveedor(NitProveedor)
);