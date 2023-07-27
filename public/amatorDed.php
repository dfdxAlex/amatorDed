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
     * Класс, который публикует информацию пока только о патернах
     */
    src\lib\php\content\pattern\NewsPattern::news();

   /**
    * создать объект navbar
    */
    class\nonBD\navBootstrap\NavBarFacade::createNavBar();

    /**
     * Поставить futter
     */
    new \src\lib\php\Futter();


