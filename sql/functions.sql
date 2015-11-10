/*
Funciones de agregacion

Sumar todos los elementos de una columna numerica
*/
SELECT SUM(column__name) FROM table__name;

/*
Calcular el promedio de una columna
*/
SELECT AVG(column__name) FROM table__name

/*
Cantidad total de elementos encontrados
*/
SELECT COUNT(*) FROM table__name;

--Segundo ejemplo, total de elementos distintos
SELECT COUNT(DISTINCT column__name) FROM table__name; 

/*
Calcular el maximo valor de una lista
*/
SELECT MAX(column__name) FROM table__name;

/*
Calcular el minimo valor de una lista
*/
SELECT MIN(column__name) FROM table__name;

/*
Funciones escalares

Convertir de minusculas a mayusculas los resultados de una columna
*/
SELECT UCASE(column__name) FROM table__name;

/*
Convertir de mayusculas a minusculas los resultados de una columna
*/
SELECT LCASE(column__name) FROM table__name;









