
set foreign_key_checks=0;
drop table if exists favorite;
drop table if exists belong;
drop table if exists produce;
drop table if exists user;
drop table if exists song_perf;
drop table if exists artist;
drop table if exists album;

set foreign_key_checks=1;

create table album (
albumid integer NOT NULL DEFAULT 0,
title varchar(400) NOT NULL,
company varchar(200),
PRIMARY KEY (albumid));

create table artist (
artistid varchar(200) NOT NULL,
name varchar(400) NOT NULL,
PRIMARY KEY (artistid));

create table user (
userid varchar(400) NOT NULL,
firstname varchar(400) NOT NULL,
lastname varchar(400) NOT NULL,
password varchar(400) NOT NULL,
age integer,
gender boolean,
admin boolean,
PRIMARY KEY (userid));

create table song_perf (
songid varchar(400) NOT NULL,
year integer NOT NULL,
title varchar(400) NOT NULL,
expert_rate float(6, 5),
loudness float(6, 5),
danceability float(6, 5),
artistid varchar(400) NOT NULL,
PRIMARY KEY (songid),
FOREIGN KEY (artistid) REFERENCES artist(artistid) ON DELETE CASCADE);

create table favorite (
songid varchar(400) NOT NULL,
userid varchar(400) NOT NULL,
PRIMARY KEY (songid, userid),
FOREIGN KEY (userid) REFERENCES user(userid),
FOREIGN KEY (songid) REFERENCES song_perf(songid) ON DELETE CASCADE);


create table belong (
albumid integer NOT NULL DEFAULT 0,
songid varchar(400) NOT NULL,
PRIMARY KEY (albumid, songid),
FOREIGN KEY (albumid) REFERENCES album(albumid) ON DELETE CASCADE,
FOREIGN KEY (songid) REFERENCES song_perf(songid) ON DELETE CASCADE);

create table produce (
albumid integer NOT NULL DEFAULT 0,
artistid varchar(400) NOT NULL,
PRIMARY KEY (artistid, albumid),
FOREIGN KEY (artistid) REFERENCES artist(artistid) ON DELETE CASCADE,
FOREIGN KEY (albumid) REFERENCES album(albumid) ON DELETE CASCADE);





