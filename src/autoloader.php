<?php
define("VER","2023-07-16::special");

require "lib\php\Statistic.php";

spl_autoload_register(function ($class_name) {
    src\lib\php\Statistic::getLinkStatistic()->setPlusOneToIntObj($class_name);
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
