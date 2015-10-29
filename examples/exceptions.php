<?php
class a extends Exception {}

class b extends a {}

class Case2 {
    public function __construct() {
        try {
            throw new b("OK");
        } catch (a $e) {
            var_dump($e->getMessage(), 2);
        } catch (b $e) {
            var_dump($e->getMessage(), 1);
        } catch (Exception $e) {
            var_dump($e->getMessage(), 3);
        }
    }
}

class Case1 {
    public function __construct() {
        try {
            $a = 1;
            if ($a < 1) {
                throw new a("OK");
            }
            try {
                $a = 1;
                if ($a < 2) {
                    throw new a("OK");
                }
            } catch (Exception $e) {
                var_dump($e->getMessage(), 2);
            }
        } catch (a $e) {
            var_dump($e->getMessage(), 1);
            try {
                throw new Exception("OK");
            } catch (Exception $e) {
                var_dump($e->getMessage(), 3);
            }
        }
    }
}

new Case1();
