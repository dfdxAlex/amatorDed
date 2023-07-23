<?php
    /**
     * подключить автозагрузчик классов
     */
    include_once "../src/autoloader.php";

    /**
     * Поставить header
     */
    new \src\lib\php\HeaderFacade();


   /**
    * создать объект navbar и поставить его
    */

    $navbarMenuUp = new \class\nonBD\navBootstrap\NavMenu();

    //изменение свойств навбара
    $navbarMenuUp->setProperty('buttonSearch',false);
    $navbarMenuUp->setProperty('navbarBrandHref','?str1');
    $navbarMenuUp->setProperty('navbarBrandName','AmatorDed');
    echo $navbarMenuUp->addNavBar();

    /**
     * Поставить futter
     */
    new \src\lib\php\Futter();


