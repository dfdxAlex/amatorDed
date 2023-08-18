<?php
    session_start();
    if (!isset($_SESSION['statusAD'])) $_SESSION['statusAD']=0;
 
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
    new \src\lib\php\home\HomeFacade();

    /**
     * Класс для работы с переводом текста на разные языки
     * Класс из общей библиотеки, но немного переделанный
     * Класс DelegatorLang регистрируется в контейнере
     * Для использования из контейнера запустить метод ->translator()
     * Чтобы добавить перевод ->control(true);
     * Чтобы посмотреть или удалить перевод ->echoDataMas(); запустить
     * \src\lib\php\ContainerObject::getInstance()->getProperty('TranslateFacade');
     */
    $translate = new src\lib\php\translate\TranslateFacade();

    /**
     * Класс Фасад для управление игрой Выжить
     */
    $games = new src\lib\php\games\survive\SurviveFacade();

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
    * Поставить навигационное меню. Всё, что выводится далее
    * на странице должно быть ниже этого объекта
    */
    class\nonBD\navBootstrap\NavBarFacade::createNavBar();

    /**
     * выводится главная страницы, пока пустая
     */
    echo \src\lib\php\ContainerObject::getInstance()->getProperty('HomeFacade')->outPage();

    
    /**
     * запуск метода toString главного контейнера-акордиона диалогов
     */
    // echo \src\lib\php\ContainerObject::getInstance()->getProperty('AccordionContainer');

    /**
     * Тест аккордиона
     */
    $accord = \src\lib\php\ContainerObject::getInstance()->getProperty('AccordionContainer');
    if (isset($_GET['survive']))
        $accord->writePunkt();
    // /**
    //  * Временно запустить вывод аккордиона
    //  */
    // \src\lib\php\ContainerObject::getInstance()->getProperty('AccordionContainer')->writePunkt();

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
     src\lib\php\ContainerObject::getInstance()->getProperty('NewsPattern')->news();

    /**
     * put the butter
     * 
     * Поставить futter
     */
    new \src\lib\php\FutterDecorator();


