/*SCHEMA*/
CREATE TABLE muestras (
    ciudad VARCHAR(40), 
    fecha DATE, 
    temperatura TINYINT);

/*DATA*/
INSERT INTO muestras (ciudad,fecha,temperatura) VALUES
('Madrid', '2005-03-17', 23),
('París', '2005-03-17', 16),
('Berlín', '2005-03-17', 15),
('Madrid', '2005-03-18', 25),
('Madrid', '2005-03-19', 24),
('Berlín', '2005-03-19', 18);

/*todas las ciudades que cuyo valor maximo de temperatura exedan los 16 grados*/
SELECT
ciudad, MAX(temperatura) AS TempMax
FROM muestras
GROUP BY ciudad HAVING MAX(temperatura) > 16
