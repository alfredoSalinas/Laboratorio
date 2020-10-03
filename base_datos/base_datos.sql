CREATE TABLE docentes
(
	id int PRIMARY KEY AUTO_INCREMENT,
	rni varchar(10) UNIQUE,
	ci varchar(12) UNIQUE,
	nombre_completo varchar(150),
	celular varchar(10)
);

CREATE TABLE materias
(
	id int PRIMARY KEY AUTO_INCREMENT,
	sigla varchar(10) UNIQUE,
	nombre varchar(150),
	nivel int
);

CREATE TABLE estudiantes
(
	id int PRIMARY KEY AUTO_INCREMENT,
	cu varchar(10) UNIQUE,
	ci varchar(12) UNIQUE,
	nombre_completo varchar(150),
	celular varchar(10),
	nivel int default 0,
	estado varchar(10)
);

CREATE TABLE horas
(
	id int PRIMARY key AUTO_INCREMENT,
	hora varchar(20) UNIQUE
);

CREATE TABLE asignaciones
(
	id int PRIMARY KEY AUTO_INCREMENT,
	id_docente int,
	id_materia int,
	grupo varchar(10),
	cantidad int,
	FOREIGN KEY(id_docente) REFERENCES docentes(id),
	FOREIGN KEY(id_materia) REFERENCES materias(id)
);

CREATE TABLE horarios
(
	id int PRIMARY KEY AUTO_INCREMENT,
	hora int not null,
	dia set('lunes', 'martes', 'miercoles', 'jueves', 'viernes', 'sabado'),
	id_asignacion int,
	FOREIGN KEY(hora) REFERENCES horas(id),
	FOREIGN key(id_asignacion) REFERENCES asignaciones(id)
);

CREATE TABLE programaciones
(
	id int PRIMARY KEY AUTO_INCREMENT,
	id_estudiante int,
	id_asignacion int,
	fecha date,
	hora time,
	estado char(10),
	FOREIGN KEY(id_estudiante) REFERENCES estudiantes(id),
	FOREIGN KEY(id_asignacion) REFERENCES asignaciones(id)
);

CREATE TABLE usuarios
(
	id int PRIMARY KEY AUTO_INCREMENT,
	usuario varchar(200) UNIQUE,
	clave varchar(200) UNIQUE

);

CREATE VIEW lista_asignaciones AS
(
	SELECT `asignaciones`.*, `docentes`.`nombre_completo`, `materias`.`sigla`
	FROM `asignaciones` 
	LEFT JOIN `docentes` ON `asignaciones`.`id_docente` = `docentes`.`id` 
	LEFT JOIN `materias` ON `asignaciones`.`id_materia` = `materias`.`id`
);

CREATE VIEW lista_programaciones AS
(
	SELECT `programaciones`.*, `estudiantes`.`cu`, `asignaciones`.`grupo`
	FROM `programaciones` 
	LEFT JOIN `estudiantes` ON `programaciones`.`id_estudiante` = `estudiantes`.`id` 
	LEFT JOIN `asignaciones` ON `programaciones`.`id_asignacion` = `asignaciones`.`id`
);

CREATE VIEW lista_grupos AS
(
	SELECT D.id, grupo, M.sigla, M.nombre 
	FROM docentes as D
	INNER JOIN asignaciones as A
	ON D.id = A.id_docente
	INNER JOIN materias as M
	ON M.id = A.id_materia
);

CREATE VIEW lista_estudiantes AS
(
	SELECT A.id, E.nombre_completo, E.cu, E.celular from estudiantes as E
	INNER JOIN programaciones as P
	ON E.id = P.id_estudiante
	INNER JOIN asignaciones as A
	ON A.id = P.id_asignacion
);