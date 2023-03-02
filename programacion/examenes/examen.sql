/*ejercicio1*//*crear tablas alumnos,asignatura y profesores*/
/*un alumno puede estar en una o muchas asignaturas*/
/* una asignatura solo tiene un profesor*/
/*un profesor puede tener muchas asignaturas*/
create database colegio:
create table alumno(
    numero_matricula int auto_increment primary key,
    nombre varchar(50),
    fechanacimiento date,
    telefono int(9)
)engine=innodb;
create table profesor(
    id_p int auto_increment primary key,
    nif_p varchar(15),
    nombre varchar(50),
    especialidad varchar(25),
    telefono int(9)
)engine=innodb;
create table asignatura(
    codigo_asignatura int auto_increment primary key,
    nombre varchar(50)
    id_p int,
    constraint fk_asignatura_profesor foreign key(id_p) references profesor(id_p))engine=innodb;
create table alumno_asignatura(
    id_alumno_asignatura int auto_increment primary key,
    numero_matricula int,
    codigo_asignatura int, constraint fk_alumno foreign key(numero_matricula)
    references alumno(numero_matricula),
    constraint fk_matricula foreign key (codigo_asignatura)
    references asignatura (codigo_asignatura))engine=innodb;

/*ejercicio 2*/
/*mostrar peliculas que no tienen rating*/
SELECT * FROM movies where rating is null;

/*mostrar lista de salas de cine con pelicula proyectando y no proyectando*/
SELECT movietheaters.*,movies.Title
FROM movietheaters
LEFT JOIN movies
ON movietheaters.Movie=movies.Code;

/*poner rating "G" a todas las peliculas que no tienen rating*/
UPDATE movies
SET ratin="g"
WHERE rating is null;

/*borrar peliculas con rating "nc-17"*/
DELETE FROM movietheaters
where IN (SELECT Code
            from movies
            where rating="nc-17");

/*peliculas que han recaudado mas de la media*/
SELECT * 
FROM movies 
WHERE money>(
            SELECT AVG(money)
            FROM movies);

/*media recaudada por rating*/
SELECT AVG(money),rating
FROM movies
GROUP BY rating;

/*cine donde se recauda mas y menos*/
/*menos*/
SELECT movietheaters.Name
FROM movietheaters,movies
WHERE movietheaters.Movie=movies.Code
ORDER BY money LIMIT 1;

/*mas*/
SELECT movietheaters.Name
FROM movietheaters,movies
WHERE movietheaters.Movie=movies.Code
ORDER BY money DESC LIMIT 1;