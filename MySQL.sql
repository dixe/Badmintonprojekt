CREATE TABLE Players
(
P_id int NOT NULL AUTO_INCREMENT,
Name varchar(255) NOT NULL,
Strength int NOT NULL,
Gender varchar (1) NOT NULL,
Benchable varchar (1) NOT NULL,
Primary_day varchar(9) NOT NULL,
Single varchar(1) NOT NULL,
Played int NOT NULL DEFAULT 0,
Benched int NOT NULL DEFAULT 0,
PRIMARY KEY (P_id)
);

CREATE TABLE Matches
(
Date DATE NOT NULL,
P_id1 int NOT NULL,
P_id2 int NOT NULL,
P_id3 int,
P_id4 int,
FOREIGN KEY (P_id1) REFERENCES Players(P_id),
FOREIGN KEY (P_id2) REFERENCES Players(P_id),
FOREIGN KEY (P_id3) REFERENCES Players(P_id),
FOREIGN KEY (P_id4) REFERENCES Players(P_id)
);

INSERT INTO players VALUES 
('', 'Poul', 3, 'M', 'Y', 'Torsdag', 'N', 15, 1),
('', 'Lars', 1, 'M', 'N', 'Torsdag', 'N', 10, 0),
('', 'Ole', 2, 'M', 'Y', 'Torsdag', 'N', 22, 1),
('', 'Arne', 3, 'M', 'Y', 'Torsdag', 'N', 20, 0),
('', 'Per', 3, 'M', 'Y', 'Torsdag', 'Y', 10, 0),
('', 'Ingrid', 3, 'F', 'Y', 'Torsdag', 'N', 5, 0),
('', 'Margrethe', 1, 'F', 'Y', 'Torsdag', 'N', 12, 0),
('', 'Charlotte', 1, 'F', 'Y', 'Torsdag', 'N', 23, 0),
('', 'Lone', 2, 'F', 'Y', 'Torsdag', 'N', 14, 0),
('', 'Gine', 2, 'F', 'Y', 'Torsdag', 'Y', 14, 0),
('', 'Hanne', 1, 'F', 'Y', 'Torsdag', 'N', 14, 0),
('', 'Ingelise', 3, 'F', 'Y', 'Torsdag', 'N', 24, 0),
('', 'Jens', 2, 'M', 'Y', 'Torsdag', 'N', 20, 1),
('', 'Bjarne', 2, 'M', 'Y', 'Torsdag', 'N', 17, 0),
('', 'Sigurd', 1, 'M', 'Y', 'Torsdag', 'N', 24, 0),
('', 'Jens-Ole', 2, 'M', 'Y', 'Onsdag', 'Y', 24, 0),
('', 'Bjørn', 2, 'M', 'Y', 'Onsdag', 'N', 24, 0),
('', 'Peter', 3, 'M', 'Y', 'Torsdag', 'N', 15, 0),
('', 'Mogens', 3, 'M', 'Y', 'Torsdag', 'N', 23, 1),
('', 'Marie', 1, 'F', 'Y', 'Torsdag', 'N', 14, 0),
('', 'Gitte', 1, 'F', 'Y', 'Torsdag', 'N', 20, 0),
('', 'Josefine', 1, 'F', 'Y', 'Torsdag', 'N', 19, 0),
('', 'Lotte', 2, 'F', 'Y', 'Torsdag', 'N', 23, 1),
('', 'Helge', 2, 'M', 'N', 'Onsdag', 'N', 24, 0);