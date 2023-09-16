<?php
namespace class;
define("VER","2023-05-07");


spl_autoload_register(function ($class_name) {
    $hablon='/[^\d\w]/';
    $class_name=preg_replace($hablon,DIRECTORY_SEPARATOR,$class_name);
    require_once $class_name . '.php';
  } 
  );

