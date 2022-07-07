DROP DATABASE IF EXISTS parc;
CREATE DATABASE parc CHARACTER SET utf8 COLLATE utf8_general_ci;
USE parc;

CREATE TABLE utilisateurs (
  id int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name varchar(50),
  email varchar(50) UNIQUE ,
  username varchar(50) UNIQUE ,
  password varchar(100),
  role varchar(50) default 'User',
  status varchar(50) default 'Not Active'
) ENGINE=InnoDB;

CREATE TABLE equipements (
  id int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  lib_equip varchar(50) UNIQUE ,
  type_equip varchar(50),
  description text,
  qtte int(3),
  dispo varchar(100) default 'Disponible'
) ENGINE=InnoDB;

CREATE TABLE reservation (
  num int(10) NOT NULL AUTO_INCREMENT,
  idUser int(10),
  idEqui int(10),
  dateR varchar(50),
  jrPrevu int(2),
  libE varchar(50),
  typeE varchar(50) ,
  qtteE int(3),
  NameU varchar(50) ,
  etat varchar(50) ,
  PRIMARY Key(num,idUser,idEqui)
) ENGINE=InnoDB;

ALTER TABLE reservation ADD FOREIGN KEY(idUser) REFERENCES utilisateurs(id);
ALTER TABLE reservation ADD FOREIGN KEY(idEqui) REFERENCES equipements(id);

INSERT INTO utilisateurs(name,email,username,password,role,status) VALUES 
('Moez Rkaya', 'user1@gmail.com', 'user1', md5('user1user1'),'administrateur','Active');
INSERT INTO utilisateurs(name,email,username,password,role,status) VALUES 
('Salsabil bouzayen', 'user2@voila.fr', 'user2', md5('user2user2'),'administrateur','Active');
INSERT INTO utilisateurs(name,email,username,password,role,status) VALUES 
('Ridha bouazizi', 'user2@yahoo.fr', 'user3', md5('user3user3'),'User','Active');
INSERT INTO utilisateurs(name,email,username,password,role,status) VALUES 
('Arij mabrouk', 'user4@wanadoo.fr','user4', md5('user4user4'),'User','Not Active');
INSERT INTO utilisateurs(name,email,username,password,role,status) VALUES
('Mohammed mahjoubi', 'user5@gmail.com', 'user5', md5('user5user5'),'User','Not Active');

INSERT INTO equipements(lib_equip,type_equip,description,qtte) VALUES 
('Dell Inspiron 15', 'PC Bureau','détails produit ..', 1);
INSERT INTO equipements(lib_equip,type_equip,description,qtte) VALUES 
('Dell Inspiron 15 3000', 'PC Portable','détails..', 10);
INSERT INTO equipements(lib_equip,type_equip,description,qtte) VALUES 
('Souris sans fil WS-201', 'Souris','Souris Gaming USB Xtrike Me GM-203 - Interface USB', 30);
INSERT INTO equipements(lib_equip,type_equip,description,qtte) VALUES 
('Souris sans fil WS-203', 'Souris','détails produit ..', 30);
INSERT INTO equipements(lib_equip,type_equip,description,qtte) VALUES 
('Projecteur LED RGB 75W', 'Projecteur','détails produit ..', 5);
INSERT INTO equipements(lib_equip,type_equip,description,qtte) VALUES 
('3LCD EPSON EB-E01', 'Projecteur','Vidéoprojecteur professionnel 3LCD EPSON EB-E01', 13);

select * from utilisateurs;
select * from equipements;
select * from reservation;
commit;

