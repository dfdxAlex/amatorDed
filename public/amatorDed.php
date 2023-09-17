<?php
    session_start();

    use \src\lib\php\{ContainerPre,
                      ContainerViev};
    
    /**
     * Подключение класса, который работает внутри автозагрузчика
     */
    include_once "../src/lib/php/Statistic.php";

    include_once "../src/autoloader.php";

    /**
     * Класс является контейнером лля объектов, отрабатывающих перед
     * началом вывода разметки. Класс изменяет входящий параметр 
     * $user и помещает в него ссылку на объект класса UserFacade
     */
    new ContainerPre;

    /**
     * Контейнер с классами, которые что-либо выводят на страницу
     */
    new ContainerViev;
