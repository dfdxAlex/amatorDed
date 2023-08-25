<?php
namespace src\lib\php\connectFunctionJs;

/**
 * Класс подключает функцию JS из папки Js
 * c событием Load
 */
use \class\nonBD\trait\DirectorySep;

class ConnectFunctionJsLoad
{
    public function __construct($name)
    {   
        $doc = "let doc = 'window'";
        
        $nameJs = "/src/lib/js/$name";
        $nameJs = DirectorySep::insertDirectorySeparator($nameJs);
        $nameJs = "amatorDed".$nameJs.".js";
        echo '<script src="'.$nameJs.'"></script>';
        echo '<script>
        
                window.addEventListener("load",'.$name.',false);
              </script>';
    }
}
