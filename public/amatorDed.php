<?php
    session_start();
    if (!isset($_SESSION['statusAD'])) $_SESSION['statusAD']=0;
 
    use \src\lib\php\ContainerObject;
    use \src\lib\php\home\HomeFacade;
    use \src\lib\php\translate\TranslateFacade;
    use \src\lib\php\games\survive\SurviveFacade;
    use \src\lib\php\content\FacadeContentPattern;
    use \src\lib\php\HeaderFacade;
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
     * фасад для главной страницы, пока там пусто
     * В конструкторе помещает себя в контейнер объектов
     */
    $homeFacade = new HomeFacade();
    ContainerObject::getInstance()->setProperty('HomeFacade',$homeFacade);
    
    $translate = new TranslateFacade();

    /**
     * Класс Фасад для управление игрой Выжить
     */
    $games = new SurviveFacade();

    /**
     * Класс выводит информацию о паттернах и о модулях
     */
    FacadeContentPattern::factoryContentPattern();

    /**
     * Поставить header
     */
    new HeaderFacade();

    $user = new UserFacade();
    $user->userFacadeLevelUp();

    NavBarFacade::createNavBar();


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
      * достать из контейнера ссылку на объект, публикующий
      * новости паттернов и апи и запустить его метод news()
      * для отображения новостей
      */
     ContainerObject::getInstance()
                      ->getProperty('NewsPattern')
                      ->news();

    new FutterDecorator();
