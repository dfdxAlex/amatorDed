<?php
    session_start();
    if (!isset($_SESSION['statusAD'])) $_SESSION['statusAD']=0;
    
    /**
     * подключить автозагрузчик классов
     */
    include_once "../src/autoloader.php";


    /**
     * Поставить header
     */
    new \src\lib\php\HeaderFacade();

    /**
     * данный класс проверяет пользователя по базе данных при 
     * условии, что система перешла на второй шаг авторизации
     */
    $login = new src\lib\php\authorization\login\DbForAuthorization();
    $login->user();

    /**
     * Отслежваем пост запрос с параметром $_POST['registration']
     * Если такой элемент есть в пост массиве, то значит, была 
     * нажата кнопка регистрации.
     * Данный класс обрабатывает это нажатие кнопки
     */
        $registration = new src\lib\php\authorization\registration\UserData();
        $rez = $registration->readDataFormRegistration();
        foreach($rez as $value)
            echo $value;

    /**
     * Класс наблюдает за запросами и если в запросе будет элемент
     * гет-массива  signout, то есть isset($_GET['signout'])
     * то сбросить признак статуса к нулю.
     * Так как класс воздействует на навбар меню, то он должен
     * отработать раньше чем навигационное меню.
     */
    src\lib\php\authorization\login\SignOut::signOut();

    /**
    * создать объект navbar
    */
    class\nonBD\navBootstrap\NavBarFacade::createNavBar();

    /**
     * Если появился гет параметр registration, то поставить
     * форму регистрации
     */
    src\lib\php\authorization\registration\RegistrationUserForm::createFormRegistration();

    
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


