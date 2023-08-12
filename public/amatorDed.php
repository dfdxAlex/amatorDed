<?php
    session_start();
    if (!isset($_SESSION['statusAD'])) $_SESSION['statusAD']=0;
    
    /**
     * connect class autoloader
     * 
     * подключить автозагрузчик классов
     */
    include_once "../src/autoloader.php";

    /**
     * Set header
     * 
     * Поставить header
     */
    new \src\lib\php\HeaderFacade();

    /**
     * A facade object is created to simplify and optimize work
     * with system of authorization and registration. 
     * 
     * Создается объект фасад для упрощения и оптимизации работы
     * с системой авторизации и регистрации.
     */
    $user = new src\lib\php\authorization\UserFacade();

    /**
     * To unload the first page part of the system methods
     * registration and login will fall into this method.
     * This includes the methods that should be run
     * before launching the navigation menu.
     * 
     * Для разгрузки первой страницы часть методов системы
     * регистрации и входа попадут в данный метод.
     * Сюда попадают те методы, кторые должны быть запущены 
     * до запуска навигационного меню.
     */
    $user->userFacadeLevelUp();

    /**
    * create a navbar object
    * 
    * создать объект navbar
    */
    class\nonBD\navBootstrap\NavBarFacade::createNavBar();

    /**
     * To unload the first page part of the system methods
     * registration and login will fall into this method.
     * This includes the methods that should be run
     * after launching the navigation menu.
     * 
     * Для разгрузки первой страницы часть методов системы
     * регистрации и входа попадут в данный метод.
     * Сюда попадают те методы, кторые должны быть запущены 
     * после запуска навигационного меню.
     */
     $user->userFacadeLevelLast();

    /**
     * A class that publishes information so far only about patterns
     * This method contains part of the content hard-coded
     * and part of the content (in development), which is pulled from
     * Database. As a result, the object stores all the information
     * concerning the description of programming patterns.
     * Displays this object information only if
     * There is a required variable in the get request. Information about this
     * variable is also stored in the object.
     * If the required variable is not in the get request, then the object
     * outputs nothing, that is, does not interfere with other objects in any way
     * build a page.
     * 
     * Класс, который публикует информацию пока только о патернах
     * Данный метод содержит в себе часть контента жёстко запрограммированную
     * и часть контента (в разработке), которая подтягивается из 
     * базы данных. В итоге объект хранит в себе все информацию,
     * касающуюся описания паттернов программирования.
     * Выводит данный объект информацию только в том случае, если
     * в гет запроссе есть нужная переменная. Информация об этой
     * переменной так-же хранится в объекте.
     * Если в гет запросе нет нужной переменной, то объект
     * ничего не выводит, то есть никак не мешает другим объектам
     * строить страницу.
     */
    src\lib\php\content\FacadeContentPattern::factoryContentPattern();

    /**
     * put the butter
     * 
     * Поставить futter
     */
    new \src\lib\php\FutterDecorator();


