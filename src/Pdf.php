<?php

namespace razvan\PdfGen;

class Pdf {
    
    public static function __callStatic($method, $arguments) {
        $class = '\\razvan\\PdfGen\\Modules\\' . Resolver::resolve($arguments[0]);
        if (isset($arguments[1])) {
            $class::instance($arguments[0])->$method($arguments[1]);
        }
        $class::instance($arguments[0])->$method();
    }

}
