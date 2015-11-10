/*
Primer elemento de una lista
*/
SELECT column__name FROM table__name
ORDER BY column__name ASC
LIMIT 1;

/*
Ultimo elemento de una lista
*/
SELECT column__name FROM table__name
ORDER BY column__name DESC
LIMIT 1;

/*
Paginar
*/
SELECT * FROM table__name LIMIT [initial_position],[total_records]