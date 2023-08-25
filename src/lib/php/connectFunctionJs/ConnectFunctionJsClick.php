<?php
namespace src\lib\php\connectFunctionJs;

/**
 * Класс подключает функцию JS из папки Js
 * c событием Click
 */

use \class\nonBD\trait\DirectorySep;

class ConnectFunctionJsClick
{
    public function __construct($id, $name)
    {   
        $doc = "let doc = 'window'";
        
        $nameJs = "/src/lib/js/$name";
        $nameJs = DirectorySep::insertDirectorySeparator($nameJs);
        $nameJs = "amatorDed".$nameJs.".js";
        echo '<script src="'.$nameJs.'"></script>';
        echo '<script>
                let tyc=document.getElementById("'.$id.'");
                tyc.addEventListener("click",'.$name.',false);
              </script>';
    }
}
