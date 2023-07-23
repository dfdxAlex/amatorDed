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
     * Создать простой елемент-объект для навбара
     */
    $navbarMenuUp->setProperty('Home','Первая');
    $navbarMenuUp->setProperty('link','?1');
    $element1 = new \class\nonBD\navBootstrap\ElementNavBar($navbarMenuUp);
     /**
     * Создать простой елемент-объект для навбара
     */
    $navbarMenuUp->setProperty('Home','Вторая');
    $navbarMenuUp->setProperty('link','?2');
    $element2 = new \class\nonBD\navBootstrap\ElementNavBar($navbarMenuUp);
    
    /**
     * Поместить объект простого элемента в главый класс
     */
   
    $navbarMenuUp->addElement($element1);
    $navbarMenuUp->addElement($element2);
    
    /**
     * публикация разметки навбара
     */
    echo $navbarMenuUp->writeElement();

    


    /**
     * Поставить futter
     */
    new \src\lib\php\Futter();


