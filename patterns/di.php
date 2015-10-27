<?php
interface Handler {
    public function write($msg);
}
class DB implements Handler {
    public function write($msg) {
        var_dump($msg);
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

$logger = new Logger(new DB());
$logger->info("Message");
