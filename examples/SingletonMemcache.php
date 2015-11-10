<?php
class SingletonMemcache {

    private static $memcache = NULL;
    private static $connection = NULL;
    private static $host = "localhost";
    private static $port = 11211;

    private function __construct() {
        
    }

    public static function getInstance() {
        if (is_null(self::$memcache)) {
            self::$memcache = new Memcache();
            self::setConnection();
        }
        return self::$memcache;
    }
    
    private static function setConnection(){
        if (is_null(self::$connection)){
            self::$memcache->connect(self::$host, self::$port);
        }
    }
}

/*@var $memcache \Memcache*/
$memcache = SingletonMemcache::getInstance();

$tmp_object = new stdClass;
$tmp_object->str_attr = 'test';
$tmp_object->int_attr = 123;

$memcache->set('key', $tmp_object, false, 10);
$get_result = $memcache->get('key');

var_dump($get_result);

