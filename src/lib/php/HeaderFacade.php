<?php
namespace src\lib\php;

use \class\nonBD\jQuerry\ConnectJQuerry;

class HeaderFacade
{
    private $linkStyle = "amatorDed\src\css\style.css";
    
    public function __construct()
    {
        // подключение библиотеки jQuerry
        ConnectJQuerry::connectJQuerryFromNet();

        $classBody = 'non';
        /**
         * достаем ссылку на объект игры Выжить из контейнера объектов
         * для того, чтобы получить информацию о фоне, если она есть.
         * Информация о  фоне будет, если пользователь вошел в режим игры
         */
        $game = \src\lib\php\ContainerObject::getInstance()->getProperty('SurviveFacade');
        /**
         * Получить данные от игрового класса о нужном фоне.
         * В качестве информации приходит имя класса, который будет 
         * добавлен к тегу body объектом HtmlHead;
         * Данный функционал используется только тогда, когда
         * пользователь на странице игры survive
         * Имя стилевого класса сначала попадает в переменную
         * $classBody, а после этого передается в старый класс
         * \class\nonBD\HtmlHead.
         */
        if (isset($_GET['survive']) && isset($_SESSION['loginAD']))
            $classBody = $game->getBGI();

        /**
         * Получить ссылку на объект, публикующий статьи про паттерны или
         * апи библиотеки php
         */
        $pattern = \src\lib\php\ContainerObject::getInstance()->getProperty('NewsPattern');

        /**
         * Если данный класс зарегистрирован в контейнере, значит
         * статья была выведена, можно брать стили для боди
         * Этот блок срабатывает когда пользователь смотрит
         * разделы паттеронв и апи
         */
        if (!isset($_GET['survive']))
            if ($pattern)
                $classBody = $pattern->returnBGI();

        /**
         * Получить класс фона из главной страницы
         */
        if (isset($_GET['home'])) {
            $classBody = \src\lib\php\ContainerObject::getInstance()->getProperty('HomeFacade')->returnBGI();
        }
        /**
         * Создать старый класс - Header
         * Класс \class\nonBD\HtmlHead из старой библиотеки,
         * ставит начальную разметку, добавляет title и 
         * подключает стили.
         * Так-же класс умеет дописывать к боди стилевой класс
         * который приходит ему в параметре, в данном случае - 
         * это переменная $classBody. Если передать туда 
         * значение non, то аттрибут class к body привязан
         * не будет.
         */
        $headOld =  new \class\nonBD\HtmlHead($this->linkStyle,'MyProject',$classBody,$indexMin=0,$indexMax=0);
        /**
         * Создать новый класс-обёртку Header
         */
        $headNew = new \class\nonBD\HtmlHeadMod($headOld);
        /**
         * ввести нужные данные в проперти контейнер
         */
        $headNew->setProperty('BootStrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"');
        $headNew->setProperty('JSBootStrap', '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>');
        /**
         * вывести готовый header
         */
        $headNew->echoHead();
    }
}
