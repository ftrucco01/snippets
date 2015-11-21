<?php
/* 
 * Question #12: What will be printed?
 * 
 * A: true
 * B: false
 * 
 * Nota: todo tipo de dato con valor no asignado es $valor igual a null 
 * pero la condicion is_null($valor) no se cumple
 */

$a = array();

if ($a == null) { 
  echo 'true';
} else {
  echo 'false';
}

if (is_null($a)) { 
  echo 'true';
} else {
  echo 'false';
}