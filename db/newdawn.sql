------------------------------
-- Archivo de base de datos --
------------------------------

DROP TABLE IF EXIST users CASCADE;

CREATE TABLE users
(
    id          bigserial       PRIMARY KEY
   ,username    varchar(25)     NOT NULL UNIQUE
   ,password    varchar(255)    NOT NULL
   ,posts       bigint
   ,comments    bigint
   ,role        integer         NOT NULL
);

DROP TABLE IF EXIST posts CASCADE;

CREATE TABLE posts
(
    id          bigserial       PRIMARY KEY
   ,title       varchar(255)    NOT NULL
   ,type        varchar(25)     NOT NULL REFERENCES types (id)
   ,createdat   timestamp   
   ,comments    bigint          REFERENCES comments (id)   
);

DROP TABLE IF EXIST comments CASCADE;

CREATE TABLE comments
(
    id          bigserial       PRIMARY KEY
   ,text        varchar(400)    NOT NULL
   ,parentpost  bigint          NOT NULL REFERENCES posts (id)
);

DROP TABLE IF EXIST types CASCADE;

CREATE TABLE types
(
    id          bigserial       PRIMARY KEY
   ,name        varchar(25)     NOT NULL
   ,description varchar(255)    
);