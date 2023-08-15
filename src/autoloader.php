<?php
define("VER","2023-07-16::special");

/**
 * Две строки загрузки одного файла, нужно потому, что пути этого
 * файла на локальном и удаленном сервере разные.
 */
// if (file_exists("/lib/php/Statistic.php")) 
//     include "lib/php/Statistic.php";
// elseif (file_exists("/lib\php\Statistic.php"))
//     include "lib\php\Statistic.php";
// elseif (file_exists("amatorDed/src/lib/php/Statistic.php"))
//     include "amatorDed/src/lib/php/Statistic.php";
// elseif (file_exists("amatorDed\src\lib\php\Statistic.php")) {
//     include "amatorDed\src\lib\php\Statistic.php";
// } else echo 'Statistic не найден'.__DIR__;

spl_autoload_register(function ($class_name) {
    \src\lib\php\Statistic::getLinkStatistic()->setPlusOneToIntObj($class_name);
    $hablon='/[^\d\w]/';
    $class_name=preg_replace($hablon,DIRECTORY_SEPARATOR,$class_name);
    
    // поиск класса сначала в библиотеке class, которая внутри modules
    $filename = "../modules/".$class_name . '.php';
    // если в папке modules нет класса, то ищем его в папках 
    // текущего проекта
    if (!file_exists($filename))
      $filename = '../'.$class_name . '.php';

    require $filename;
  } 
  );
