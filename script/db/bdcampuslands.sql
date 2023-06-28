SHOW DATABASES;
USE campuslands;
# CREACION BASE DE DATOS CAMPUSLANDS 

/*Se crea una base de datos para campusland como desarrollo de actividad con sus respectivas tablas */



### CAMPER{

/*​	"name": "JHON EDUARD ALMEIDA HERNANDEZ",

​	"curso": "Sputnik"
*/

### } */


###### CREATE BASE DE DATOS

CREATE DATABASE campuslands;

SHOW TABLES;
/*El siguiente script crea las tablas de la base de datos de Campuslands*/


###### CREATE TABLE PAIS

CREATE TABLE pais(

idPais INT NOT NULL PRIMARY KEY AUTO_INCREMENT,

nombrePais VARCHAR(50) NOT NULL

);

/*El siguiente script agrega registros a la tabla pais*/
INSERT INTO pais (nombrePais) VALUES ("Colombia");



###### CREATE TABLE DEPARTAMENTO

CREATE TABLE departamento(

idDep INT NOT NULL PRIMARY KEY AUTO_INCREMENT,

nombreDep VARCHAR(50) NOT NULL,

idPais INT NOT NULL

);
 

/*El siguiente script agrega registros a la tabla departamento*/
INSERT INTO departamento (nombreDep, idPais) VALUES ("Lima", 1);



###### CREATE TABLE REGION

CREATE TABLE region(

idReg INT NOT NULL PRIMARY KEY AUTO_INCREMENT,

nombreReg VARCHAR(60) NOT NULL,

idDep INT NOT NULL

);


/*El siguiente script agrega registros a la tabla region*/
INSERT INTO region (nombreReg, idDep) VALUES ("Perumini", 1);


###### CREATE TABLE CAMPERS

CREATE TABLE campers(

idCamper VARCHAR(20) NOT NULL PRIMARY KEY,

nombreCamper VARCHAR(50) NOT NULL,

apellidoCamper VARCHAR(50) NOT NULL,

fechaNac DATE NOT NULL,

idReg INT NOT NULL

);


/*El siguiente script agrega registros a la tabla campers*/
INSERT INTO campers (idCamper, nombreCamper, apellidoCamper, fechaNac, idReg) VALUES ("1102391275", "Jhon", "Almeida", "1999-09-18", 1);



###### CREATE LLAVE FORANEA DEPARTAMENTO - PAIS

/*Se crean las llaves foraneas de departamento a pais*/

ALTER TABLE departamento ADD CONSTRAINT fk_departamento_pais FOREIGN KEY (idPais) REFERENCES pais (idPais);



###### CREATE LLAVE FORANEA REGION - DEPARTAMENTO

/*Se crean las llaves foraneas de region a departamento*/

ALTER TABLE region ADD CONSTRAINT fk_region_departamento FOREIGN KEY (idDep) REFERENCES departamento (idDep);



###### CREATE LLAVE FORANEA CAMPERS - REGION

/*Se crean las llaves foraneas de campers a region*/

ALTER TABLE campers ADD CONSTRAINT fk_campers_region FOREIGN KEY (idReg) REFERENCES region (idReg);