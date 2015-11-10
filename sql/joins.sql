/*
Schemas
*/
CREATE TABLE orders(
id INT NOT NULL AUTO_INCREMENT,
customer_id INT,
order_date date,
PRIMARY KEY (id)
);
ALTER TABLE orders ADD FOREIGN KEY (customer_id) REFERENCES customers(id);
CREATE TABLE customers(
id INT NOT NULL AUTO_INCREMENT,
customer_name VARCHAR(255),
contact_name VARCHAR(255),
address VARCHAR(255),
city VARCHAR(255),
country VARCHAR(255),
PRIMARY KEY (id)
); 

/*
Load data
*/
INSERT INTO customers(customer_name, contact_name, address, city, country) VALUES
('Alfreds Futterkiste', 'Maria Anders', 'Obere Str. 57', 'Berlin', 'Germany'),
('Ana Trujillo Emparedados y helados', 'Ana Trujillo', 'Avda. de la Constitución 2222', 'Constitución 222 México D.F.', 'Mexico'),
('Antonio Moreno Taquería', 'Antonio Moreno', 'Mataderos 2312', 'México D.F.', 'Mexico');

INSERT INTO orders(customer_id, order_date) VALUES
(8, '1996-10-31'),
(8, '1996-09-30'),
(9, '1996-09-18'),
(9, '1996-09-19');

/*
Interseccion de dos conjuntos
ej grafico: http://www.w3schools.com/sql/img_innerjoin.gif
explicito: INNER JOIN
*/
SELECT customers.customer_name, orders.id 
FROM customers
JOIN orders
ON customers.id = orders.customer_id

/*
Todos los elementos del conjunto principal mas la interseccion de ambos
ej grafico: http://www.w3schools.com/sql/img_leftjoin.gif
*/
SELECT customers.customer_name, orders.id 
FROM customers
LEFT JOIN orders
ON customers.id = orders.customer_id

/*
Todos los elementos del conjunto secundario mas la interseccion de ambos
ej grafico: http://www.w3schools.com/sql/img_leftjoin.gif
*/
SELECT customers.customer_name, orders.id 
FROM customers
RIGHT JOIN orders
ON customers.id = orders.customer_id

/*
FULL OUTER JOIN no funciona en MySQL, 
para simular el mismo se unifica un right con un left

ej grafico: http://www.w3schools.com/sql/img_fulljoin.gif
*/
SELECT customers.customer_name, orders.id 
FROM customers
LEFT JOIN orders
ON customers.id = orders.customer_id
UNION
SELECT customers.customer_name, orders.id 
FROM customers
RIGHT JOIN orders
ON customers.id = orders.customer_id


/*
Producto cartesiano de dos grupos
ej grafico: http://www.w3resource.com/sql/joins/joins-output/cross-join-round.png
*/
SELECT * FROM customers CROSS JOIN orders