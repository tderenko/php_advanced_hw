<?php


namespace homework\hw_19;


use homework\hw_19\interfaces\FactoryBase;

class Controller
{
    public static function makeTV(FactoryBase $factory, string $type = 'LCD'){
        $method = "make" . strtoupper($type);
        if (method_exists($factory, $method)) {
            echo $factory->$method()->show();
        } else {
            throw new \Exception("Type $type not found!!!");
        }
    }
}
