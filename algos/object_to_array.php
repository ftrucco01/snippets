<?php
//convertir un objeto a un array asociativo
function objectToArray($objeto) {
    if (is_object($objeto)) {
        $objeto = get_object_vars($objeto);
    }
    if (is_array($objeto)) {
        return array_map(__FUNCTION__, $objeto);
    }
    else {
        return $objeto;
    }
}
$animales = new stdClass;
$animales->perro = "Spoofy";
$animales->gato = new stdClass;
$animales->gato->nombre = "Lenders";
$animales->gato->edad = "9";

$array = objectToArray($animales);
print_r($array);
