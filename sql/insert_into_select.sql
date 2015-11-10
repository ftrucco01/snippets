/*
Schemas
*/
CREATE TABLE test(
id INT,
data VARCHAR(255)
);

CREATE TABLE test(
id INT,
data VARCHAR(255)
);

/*
Load data table A
*/
INSERT INTO test VALUES
(1, 'data1'),
(2, 'data2'),
(3, 'data3');

/*
Load data table B from table A
*/
INSERT INTO test2 (id, data) 
SELECT id, data FROM test;