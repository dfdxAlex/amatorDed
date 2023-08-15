<?php
namespace src\lib\php;

class HeaderFacade
{
    private $linkStyle = "amatorDed\src\css\style.css";
    public function __construct()
    {
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
         */
        $classBody = $game->getBGI();
        /**
         * Создать старый класс - Header
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
