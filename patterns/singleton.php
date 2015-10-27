<?php
/**
 * https://es.wikipedia.org/wiki/Singleton
 */
class Singleton {
    // Contenedor Instancia de la clase
    private static $instance = NULL;

    // Constructor privado, previene la creación de objetos vía new
    private function __construct() {
        
    }
    // Clone no permitido
    public function __clone() {
        
    }

    // Método singleton 
    public static function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }
}