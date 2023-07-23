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
    * создать объект navbar
    */
    $navbarMenuUp = new \class\nonBD\navBootstrap\NavMenu();

    //изменение свойств навбара
    $navbarMenuUp->setProperty('buttonSearch',false);
    $navbarMenuUp->setProperty('navbarBrandHref','?str1');
    $navbarMenuUp->setProperty('navbarBrandName','AmatorDed');
    /**
     * публикация разметки навбара
     */
    echo $navbarMenuUp->addNavBar();

    $fff = new \class\nonBD\navBootstrap\ElementNavBar();
    $navbarMenuUp->addElement($fff);

    $navbarMenuUp->writeContainerObjects();

    // var_dump ($navbarMenuUp->valuePatternName('navbar'));




    /**
     * Поставить futter
     */
    new \src\lib\php\Futter();


