-- select
SELECT * FROM users;
SELECT name, email, password FROM users;
SELECT * FROM crud.users;
SELECT * FROM users WHERE email = 'agustincl@gmail.com';
SELECT * FROM users WHERE email LIKE 'a%';
SELECT * FROM users ORDER BY email;
SELECT * FROM users ORDER BY email ASC;
SELECT * FROM users ORDER BY email DESC;
SELECT * FROM users ORDER BY email DESC, password DESC;
SELECT count(*) FROM users;
SELECT count(*) AS Numuser FROM users;

SELECT name as Nombre, email AS miEmail FROM users;

SELECT name, cities_idcity FROM users;

SELECT name, cities.city FROM users, cities  
WHERE users.cities_idcity = cities.idcity;

SELECT name,cities.city FROM users
INNER JOIN cities 
ON cities.idcity = users.cities_idcity;

SELECT name,cities.city, gender FROM users
INNER JOIN cities 
ON cities.idcity = users.cities_idcity
INNER JOIN genders
ON genders.idgender = users.genders_idgender;

SELECT * FROM cities;



-- Usuarios que estan en "Barcelona"
SELECT name, email, cities.city FROM users 
INNER JOIN cities 
ON cities.idcity = users.cities_idcity
WHERE cities.city = "Barcelona";


-- Ciudades que no tienen Usuarios
SELECT city, name FROM cities 
LEFT JOIN users 
ON users.cities_idcity = cities.idcity 
WHERE name is null;

-- Usuarios y sus hobbies
SELECT iduser, name, email, hobbies.hobby FROM users 
INNER JOIN users_has_hobbies 
ON users_iduser = users.iduser 
INNER JOIN hobbies 
ON hobbies_idhobby = hobbies.idhobby;

-- Usuarios con hobbies separados por comas
SELECT iduser, name, email, group_concat(hobbies.hobby)
FROM users 
INNER JOIN users_has_hobbies 
ON users_iduser = users.iduser 
INNER JOIN hobbies 
ON hobbies_idhobby = hobbies.idhobby
GROUP BY iduser;


INSERT INTO cities (city) VALUES ('Albacete');

INSERT INTO users (iduser, name, email, password, 
				   cities_idcity, genders_idgender) 
		   VALUES ('user5', '5','5','5', 1, 1);

INSERT INTO users SET iduser = 'user6',
					name = '6',
					email = '6',
                    password = '6',
					cities_idcity = 2,
                    genders_idgender = 2;

UPDATE users SET email = '5email',
                 password = '5password'					
WHERE iduser='user5';

INSERT INTO users (iduser, name, email, password, 
				   cities_idcity, genders_idgender) 
		   VALUES ('user7', '7','7','7', 1, 1); 
DELETE FROM users WHERE iduser = 'user7';




















 
