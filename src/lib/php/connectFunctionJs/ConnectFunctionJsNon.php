<?php
namespace src\lib\php\connectFunctionJs;

/**
 * Класс подключает функцию JS из папки Js
 */

use \class\nonBD\trait\DirectorySep;

class ConnectFunctionJsNon
{
    public function __construct($name)
    {   
        $nameJs = "/src/lib/js/$name";
        $nameJs = DirectorySep::insertDirectorySeparator($nameJs);
        $nameJs = "amatorDed".$nameJs.".js";
        echo '<script src="'.$nameJs.'"></script>';
    }
}
