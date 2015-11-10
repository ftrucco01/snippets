/*
Schemas
*/
CREATE TABLE customers(
id INT NOT NULL AUTO_INCREMENT,
customer_name VARCHAR(255),
contact_name VARCHAR(255),
address VARCHAR(255),
city VARCHAR(255),
country VARCHAR(255),
PRIMARY KEY (id)
); 
create table suppliers(
id INT NOT NULL AUTO_INCREMENT,
supplier_name varchar(255),
contact_name varchar(255),
address varchar(255),
city varchar(255),
postal_code int,
PRIMARY KEY(id)
);
INSERT INTO suppliers(supplier_name, contact_name, address, city, postal_code) VALUES
('Exotic Liquid', 'Charlotte Cooper', '49 Gilbert St.', 'Londona', 11111);

/*
Combina dos dos consultas
Nota: Las tablas deben tener la misma cantidad de campos
*/

SELECT * FROM customers
UNION
SELECT * FROM suppliers