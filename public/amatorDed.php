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
    class\nonBD\navBootstrap\NavBarFacade::createNavBar();


    /**
     * Класс, который публикует информацию пока только о патернах
     */
    src\lib\php\content\FacadeContentPattern::factoryContentPattern();


    /**
     * Поставить futter
     */
    new \src\lib\php\Futter();


