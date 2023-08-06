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
     * Объект проверяет содержимое адрессной строки браузера и если 
     * был запрос с параметром signin, объект ставит форму ввода
     * логина и пароля, для авторизации на сайте
     */
    src\lib\php\authorization\login\LoginForm::createFormLogin();

    /**
     * Поставить futter
     */
    new \src\lib\php\FutterDecorator();


