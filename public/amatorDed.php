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
    
    /**
     * Класс для работы с переводом текста на разные языки
     * Класс из общей библиотеки, но немного переделанный
     * Класс DelegatorLang регистрируется в контейнере
     * Для использования из контейнера запустить метод ->translator()
     * Чтобы добавить перевод ->control(true);
     * Чтобы посмотреть или удалить перевод ->echoDataMas(); запустить
     * \src\lib\php\ContainerObject::getInstance()->getProperty('TranslateFacade');
     */
    $translate = new TranslateFacade();

    /**
     * Класс Фасад для управление игрой Выжить
     */
    $games = new SurviveFacade();

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
    FacadeContentPattern::factoryContentPattern();

    /**
     * Set header
     * 
     * Поставить header
     */
    new HeaderFacade();

    /**
     * A facade object is created to simplify and optimize work
     * with system of authorization and registration. 
     * 
     * Создается объект фасад для упрощения и оптимизации работы
     * с системой авторизации и регистрации.
     */
    $user = new UserFacade();

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
    NavBarFacade::createNavBar();

    
    /**
     * Запуск отображения энергий
     * Запуск системы диалога если вошли в игру
     */
    
    if (isset($_GET['survive']) && isset($_SESSION['loginAD'])) {
        /** отображение енергий */
        $state = ContainerObject::getInstance()
                                  ->getProperty('State');
        $energi = new ViewState($state);
        $energi->viewParametr();
        
        /** диалоги */
        $accord = ContainerObject::getInstance()
                                   ->getProperty('AccordionContainer')
                                   ->writeElement();
    } 

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

    /**
     * put the butter
     * 
     * Поставить futter
     */
    new FutterDecorator();

    /**
     * Расстояние отступ блока футер footer от верха.
     * функция searchSection() проверяет сколько есть на станице
     * классов class="container-fluid". Один такой класс есть 
     * от навигационного меню, второй должен быть от контента.
     * Стиль для второго контейнера описан в css файле.
     * Внимание!!! Чтобы футер не прилипал вверх, на странице 
     * всегда должен быть контент, кроме навигационного меню, либо
     * просто пустой тег <section class="container-fluid"></section>
     * Именно второй <section> отталкивает футер вниз.
     * Так вот, если второго такого тега нет, то есть кроме навигации
     * на странице ничего нет, то функция searchSection() - это 
     * узнает, выбирает футтер по его ID и добавляет ему в свойства
     * margin-top.
     * данная функция находится тут:
     * src\lib\js\searchSection.js
     * подключается данная функция и запускается через событие
     * классом FutterDecorator, который находится тут:
     * src\lib\php\FutterDecorator.php
     */


