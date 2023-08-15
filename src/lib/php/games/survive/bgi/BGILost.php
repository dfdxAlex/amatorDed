<?php
namespace src\lib\php\games\survive\bgi;

/**
 * Класс возвращает имя стилевого класса на старте,
 * когда игрок впервые входит на страницу игры
 */

class BGILost implements IBGI
{
    public function returnBGI()
    {
        return "user-lost";
    }
}
