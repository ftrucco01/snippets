<?php
//Hacer una petición HTTP con una conexión socket
//https://diego.com.es/sockets-en-php
$direccion = gethostbyname("www.example.com");
// Creamos la conexión socket:
$cliente = stream_socket_client("tcp://$direccion:80", $errno, $errorMessage);
if ($cliente === false) {
    throw new UnexpectedValueException("Failed to connect: $errorMessage");
}
// Escribimos en el socket la petición HTTP:
fwrite($cliente, "GET / HTTP/1.0\r\nHost: www.example.com\r\nAccept: */*\r\n\r\n");
echo stream_get_contents($cliente);
fclose($cliente);
