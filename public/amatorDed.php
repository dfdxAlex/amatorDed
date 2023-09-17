<?php
    session_start();
    
    use \src\lib\php\ContainerObject;
    use \src\lib\php\games\survive\VievSurviveFacade;
    use \src\lib\php\ContainerPre;
    use \src\lib\php\authorization\UserFacade;
    use \class\nonBD\navBootstrap\NavBarFacade;
    use \src\lib\php\games\survive\state\ViewState;
    use \src\lib\php\FutterDecorator;
    use \src\lib\php\db\Db;
    
    /**
     * Ручное подключение класса, который работает внутри
     * автозагрузчика
     */
    include_once "../src/lib/php/Statistic.php";
    /**
     * connect class autoloader
     * 
     * подключить автозагрузчик классов
     */
    include_once "../src/autoloader.php";

    /**
     * Класс является контейнером лля объектов, отрабатывающих перед
     * началом вывода разметки. Класс изменяет входящий параметр 
     * $user и помещает в него ссылку на объект класса UserFacade
     */
    new ContainerPre;

    NavBarFacade::createNavBar();

    new VievSurviveFacade;

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
    ContainerObject::getObject('UserFacade')->userFacadeLevelLast();

     /**
      * достать из контейнера ссылку на объект, публикующий
      * новости паттернов и апи и запустить его метод news()
      * для отображения новостей
      */
     ContainerObject::getObject('NewsPattern')->news();

    new FutterDecorator();
