<?php
    /**
     * подключить автозагрузчик классов
     */
    include_once "../src/autoloader.php";

    // $mysqli = new mysqli("localhost","root","","leson");

    // // Check connection
    // if ($mysqli -> connect_errno) {
    //   echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    //   exit();
    // } else {
    //     echo 'Подключили'.$mysqli->server_info;
    // }





    /**
     * Поставить header
     */
    new \src\lib\php\HeaderFacade();

    /**
    * создать объект navbar
    */
    class\nonBD\navBootstrap\NavBarFacade::createNavBar();


    /**
     * Класс, который публикует информацию пока только о патернах
     */
    src\lib\php\content\FacadeContentPattern::factoryContentPattern();


    /**
     * Поставить futter
     */
    new \src\lib\php\FutterDecorator();


