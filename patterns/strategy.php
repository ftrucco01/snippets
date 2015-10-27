<?php
interface Handler {
    public function write($msg);
}
class DB implements Handler {
    public function write($msg) {
        var_dump($msg, 1);
    }
}
class Mailer implements Handler{
    function write($msg) {
        var_dump($msg, 2);
    }
}
class FileM implements Handler{
    function write($msg) {
        var_dump($msg, 3);
    }
}

class Strategy1{
    public function __construct() {
        $logger = new Logger(new DB());
        $logger->info("Message");
        
        $logger = new Logger(new Mailer());
        $logger->info("Message");
    }
}

class Strategy2{
    public function __construct() {
        $logger = new Logger(new FileM());
        $logger->info("Message");
        
        $logger = new Logger(new Mailer());
        $logger->info("Message");
    }
}

class Logger {
    protected $handler;

    public function __construct($handler) {
        try {
            if ($handler instanceof Handler) {
                $this->handler = $handler;
            } else {
                throw new Exception("The argument passed must implement interface Handler");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }
    public function info($msg) {
        $this->handler->write($msg);
    }
}

new Strategy2();

