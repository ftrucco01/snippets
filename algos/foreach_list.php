<?php
//A partir de PHP 5.5 es posible utilizar list() con foreach():
$users = array(
    array('John', 'West'),
    array('Peter', 'Parker'),
    array('Ann', 'Jolie')
);
// Esto:
foreach ($users as $user){
    list($nombre, $apellido) = $user;
    echo "Usuario: $nombre $apellido <br>";
}
// Devuelve lo mismo que esto:
foreach ($users as list($nombre, $apellido))
{
    echo "Usuario: $nombre $apellido <br>";
}
