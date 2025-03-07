DROP TABLE IF EXISTS backgrounds;
CREATE TABLE backgrounds (
  id int NOT NULL AUTO_INCREMENT,
  bg_title varchar(50) DEFAULT NULL,
  PRIMARY KEY (id)
);

DROP TABLE IF EXISTS char_classes;

CREATE TABLE char_classes (
  id int NOT NULL AUTO_INCREMENT,
  char_id int DEFAULT NULL,
  class_lvl int DEFAULT NULL,
  subclass_id int DEFAULT NULL,
  class_id int DEFAULT NULL,
  PRIMARY KEY (id)
);

DROP TABLE IF EXISTS characters;

CREATE TABLE characters (
  id int NOT NULL AUTO_INCREMENT,
  race_id int DEFAULT '12',
  bg_id int DEFAULT '3',
  char_name varchar(50) DEFAULT NULL,
  char_lvl int DEFAULT NULL,
  prof_bonus int DEFAULT '2',
  char_str int DEFAULT '10',
  char_dex int DEFAULT '10',
  char_con int DEFAULT '10',
  char_int int DEFAULT '10',
  char_wis int DEFAULT '10',
  char_cha int DEFAULT '10',
  char_speed int DEFAULT NULL,
  armor_class int DEFAULT NULL,
  max_health int DEFAULT NULL,
  classes_id int DEFAULT NULL,
  PRIMARY KEY (id)
);

DROP TABLE IF EXISTS classes;

CREATE TABLE classes (
  id int NOT NULL AUTO_INCREMENT,
  class_title varchar(50) DEFAULT NULL,
  PRIMARY KEY (id)
);

DROP TABLE IF EXISTS races;

CREATE TABLE races (
  id int NOT NULL AUTO_INCREMENT,
  race_title varchar(50) DEFAULT NULL,
  PRIMARY KEY (id)
);

DROP TABLE IF EXISTS subclasses;

CREATE TABLE subclasses (
  id int NOT NULL AUTO_INCREMENT,
  class_id int DEFAULT NULL,
  subclass_lvl_req int DEFAULT NULL,
  subclass_title varchar(50) DEFAULT NULL,
  PRIMARY KEY (id)
);