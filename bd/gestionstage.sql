drop database if not exists gestionstage;
create database if not exists gestionstage;
use gestionstage;

 create table stagiaire(
     idstagiaire int(4) auto_increment primary key,
     nom varchar(50),
     prenom varchar(50),
     civilite varchar(50),
     idfiliere int(4));
     
create table filiere(
    idfiliere int(4) auto_increment primary key,
    nomfiliere varchar(50),
    niveaufiliere varchar(50));
 
 create table utilisateur(
    iduser int(4) auto_increment primary key,
    login varchar(50),
    email varchar(255),
    role varchar(50),
    etat int(1),
    pwd varchar(255));
    
 Alter table stagiaire add constraint foreign key (idfiliere) references filiere(idfiliere);
 
 INSERT INTO filiere(nomfiliere,niveaufiliere) values
 
 ('developpement','Ingenieur'),
 ('Technicien','BTS'),
 ('Securite','Licence'),
 ('Maintenance','BTP'),
 ('Design web','Master'),
  ('developpement','Ingenieur'),
 ('Technicien','BTS'),
 ('Securite','Licence'),
 ('Maintenance','BTP'),
 ('Design web','Master');
   
 
 
 INSERT INTO utilisateur(login,email,role,etat,pwd) values 
 ('admin','ayadibasma33@gmail.com','ADMIN',1,md5('123')),
 ('user1','user1@gmail.com','VISITEUR',0,md5('123')),
 ('user2','user2@gmail.com','VISITEUR',1,md5('123'));
 
 
 INSERT INTO stagiaire(nom,prenom,civilite,idfiliere) values
 ('Mohamed','Ouichi','M',1),
 ('Imed','Jendoubi','M',2),
 ('Sabri','Ayadi','M',3),
 ('Chadlia','Belghouthi','F',1),
 ('Amira','Salem','F',2),
  ('Mohamed','Ouichi','M',3),
 ('Imed','Jendoubi','M',1),
 ('Sabri','Ayadi','M',2),
 ('Chadlia','Belghouthi','F',3);

 select * from stagiaire;
 select * from filiere;
 select * from utilisateur;

 
 
 
 
 
 
 
 
 
 
 
 


