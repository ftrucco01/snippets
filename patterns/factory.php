<?php
/**
 * https://es.wikipedia.org/wiki/Abstract_Factory
 * https://es.wikipedia.org/wiki/Factory_Method_%28patr%C3%B3n_de_dise%C3%B1o%29
 * http://codejavu.blogspot.com.ar/2013/07/ejemplo-patron-abstract-factory.html
 */
abstract class Creator{
    abstract public function factoryMethod();
}
class ConcreteCreator extends Creator{
    public function factoryMethod(){
        return new ConcreteProduct();
    } 
}

interface Product{
    public function operation();
}
class ConcreteProduct implements Product{
    public function operation() {
        echo "Una operación de este producto";
    }
}

$aCreator = new ConcreteCreator();
$producto = $aCreator->factoryMethod();
$producto->operation();

