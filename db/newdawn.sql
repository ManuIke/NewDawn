------------------------------
-- Archivo de base de datos --
------------------------------

DROP TABLE IF EXISTS users CASCADE;

CREATE TABLE users
(
    id              bigserial       PRIMARY KEY
   ,username        varchar(25)     NOT NULL UNIQUE
   ,password        varchar(255)    NOT NULL
   ,posts           bigint
   ,comments        bigint
   ,role            integer         NOT NULL
   ,banned          boolean         NOT NULL
   ,banreason       varchar(255)
);

DROP TABLE IF EXISTS posts CASCADE;

CREATE TABLE posts
(
    id              bigserial       PRIMARY KEY
   ,title           varchar(255)    NOT NULL
   ,type            bigint     NOT NULL REFERENCES types (id)
   ,createdat       timestamp   
   ,comments        bigint  
);

DROP TABLE IF EXISTS comments CASCADE;

CREATE TABLE comments
(
    id              bigserial       PRIMARY KEY
   ,text            varchar(400)    NOT NULL
   ,parentpost      bigint          NOT NULL REFERENCES posts (id)
);

DROP TABLE IF EXISTS types CASCADE;

CREATE TABLE types
(
    id              bigserial       PRIMARY KEY
   ,name            varchar(25)     NOT NULL
   ,description     varchar(255)    
);

DROP TABLE IF EXISTS games CASCADE;

CREATE TABLE games
(
    id              bigserial       PRIMARY KEY
   ,name            varchar(25)     NOT NULL
   ,description     varchar(255)
   ,releasedate     timestamp          
);

DROP TABLE IF EXISTS roles CASCADE;

CREATE TABLE roles
(
    id              bigserial       PRIMARY KEY
   ,name            varchar(25)     NOT NULL        
);

DROP TABLE IF EXISTS news CASCADE;

CREATE TABLE news
(
    id              bigserial       PRIMARY KEY
   ,title           varchar(50)     NOT NULL   
   ,content         varchar(2000)   NOT NULL
   ,creationdate    timestamp   NOT NULL     
);
