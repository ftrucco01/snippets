<?php
/**
* Algoritmo basado en la funcion levenshtein: 
* Nos permite buscar y encontrar posibles coincidencias de strings
*/

// palabra de entrada mal escrita
$miAnimal = 'perrl';
// array de palabras a verificar
$animales  = array('perro', 'gato', 'oso', 'liebre', 'ardilla', 'vaca', 'cerdo');
// aún no se ha encontrado la distancia más corta
$shortest = -1;
// bucle a través de las palabras para encontrar la más cercana
foreach ($animales as $animal) {
    // calcula la distancia entre la palabra de entrada
    // y la palabra actual
    $lev = levenshtein($miAnimal, $animal);
    // verifica por una coincidencia exacta
    if ($lev == 0) {
        // la palabra más cercana es esta (coincidencia exacta)
        $closest = $animal;
        $shortest = 0;
        // salir del bucle ya que se ha encontrado una coincidencia exacta
        break;
    }
    // si esta distancia es menor que la siguiente distancia
    // más corta o si una siguiente palabra más corta aun no se ha encontrado
    if ($lev <= $shortest || $shortest < 0) {
        // establece la coincidencia más cercana y la distancia más corta
        $closest  = $animal;
        $shortest = $lev;
    }
}
echo "Palabra de entrada: $miAnimal\n";
if ($shortest == 0) {
    echo "Palabra exacta encontrada: $closest\n";
} else {
    echo "¿Quisiste decir: $closest?\n";
}
// Devuelve: Palabra de entrada: perrl ¿Quisiste decir: perro?
