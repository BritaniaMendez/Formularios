CREATE DATABASE IF NOT EXISTS sistema_escolar
CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE sistema_escolar;

CREATE TABLE alumnos (
    id_alumno INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(80) NOT NULL,
    apaterno VARCHAR(80) NOT NULL,
    amaterno VARCHAR(80),
    domicilio VARCHAR(150),
    correo VARCHAR(120),
    telefono VARCHAR(20),
    estatus VARCHAR(20) DEFAULT 'Activo',
    matricula VARCHAR(30) NOT NULL UNIQUE
);

CREATE TABLE grupos (
    id_grupo INT AUTO_INCREMENT PRIMARY KEY,
    descripcion VARCHAR(100) NOT NULL,
    estatus VARCHAR(20) DEFAULT 'Activo'
);

CREATE TABLE materias (
    id_materia INT AUTO_INCREMENT PRIMARY KEY,
    descripcion VARCHAR(100) NOT NULL,
    cantidad_alumnos INT DEFAULT 0
);

CREATE TABLE profesores (
    id_profesor INT AUTO_INCREMENT PRIMARY KEY,
    matricula VARCHAR(30),
    no_empleado VARCHAR(30) NOT NULL UNIQUE
);

CREATE TABLE asignar_grupo (
    id_asignacion INT AUTO_INCREMENT PRIMARY KEY,
    id_grupo INT NOT NULL,
    id_alumno INT NOT NULL,
    id_profesor INT NOT NULL,
    FOREIGN KEY (id_grupo) REFERENCES grupos(id_grupo),
    FOREIGN KEY (id_alumno) REFERENCES alumnos(id_alumno),
    FOREIGN KEY (id_profesor) REFERENCES profesores(id_profesor)
);

CREATE TABLE asignar_materia (
    id_asignacion INT AUTO_INCREMENT PRIMARY KEY,
    id_materia INT NOT NULL,
    id_alumno INT NOT NULL,
    id_profesor INT NOT NULL,
    FOREIGN KEY (id_materia) REFERENCES materias(id_materia),
    FOREIGN KEY (id_alumno) REFERENCES alumnos(id_alumno),
    FOREIGN KEY (id_profesor) REFERENCES profesores(id_profesor)
);
