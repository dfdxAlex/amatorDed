<?php
namespace src\lib\php\games\survive\bgi;

/**
 * Интерфейс для всех классов, которые возвращают имя 
 * стилевого класса для фона, в зависимости от того,
 * где находится пользователь
 */

interface IBGI 
{
    public function returnBGI();
}
