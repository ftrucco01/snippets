<?php
//Ejemplo iteracion list y each con la estructura de control while

$array = array('John' => 'West', 'Peter' => 'Parker', 'Ann' => 'Jolie');

while(list($var, $val) = each($array)) {
    print "$var is $val \n";
}
