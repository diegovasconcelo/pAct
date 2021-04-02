CREATE DATABASE IF NOT EXISTS tMan;
use tMan;

CREATE TABLE IF NOT EXISTS users(
id          int(255) auto_increment not null,
role        varchar(50),
name        varchar(100),
surname     varchar(200),
email       varchar(255),
password    varchar(255),
created_at  datetime,

CONSTRAINT pk_users PRIMARY KEY(id)
)ENGINE=InnoDb;

INSERT INTO users VALUES(null,'ROLE_USER','Javier','Lopez','javierlopez@tman.com','mipassword',CURTIME());
INSERT INTO users VALUES(null,'ROLE_USER','Sandra','Gutierrez','sandragutierrez@tman.com','mipassword2',CURTIME());
INSERT INTO users VALUES(null,'ROLE_USER','Mateo','Line','mateoline@tman.com','mipassword3',CURTIME());

CREATE TABLE IF NOT EXISTS tasks(
id          int(255) auto_increment not null,
user_id     int(255) not null,
title       varchar(255),
content     text,
priority    varchar(20),
hours       int(100),
created_at  datetime,

CONSTRAINT pk_users PRIMARY KEY(id),
CONSTRAINT fk_task_user FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=InnoDb;

INSERT INTO tasks VALUES(null, 1, 'Tarea1','Contenido prueba 1','High', 10, CURTIME());
INSERT INTO tasks VALUES(null, 2, 'Tarea2','Contenido prueba 2','Medium', 3, CURTIME());
INSERT INTO tasks VALUES(null, 2, 'Tarea3','Contenido prueba 3','Low',1, CURTIME());