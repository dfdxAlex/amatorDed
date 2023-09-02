<?php
namespace src\lib\php\games\survive\state\bag;

/**
 * Класс слушает события Eat. Если пришел пост запрос
 * с задачей что-то скушать, то кушаем. 
 * Пост отправляется из сумки, кнопки в сумке рисуются
 * JS скриптами с параметром Name, равным имени продукта
 * который кушаем.
 */

class EventBag
{
    public function __construct()
    {
        if (isset($_POST['Eat'])) {
            echo 'Съели '.$_POST['Eat'];
        }
    }
}
