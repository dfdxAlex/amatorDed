<?php
namespace src\lib\php\games\survive\state\bag;

/**
 * Класс создает перевод на 4 языка различных заголовков 
 * сумки игрока, на пример Еда, Одежда, Броня ...
 * 
 * После перевода эти названия кодируются в строку из кодов
 * символов в Юникоде, так как куки не отправляются в кирилице.
 * 
 * После кодирования эти названия отправляются в куки с 
 * определенными названиями, на пример кук translate_food содержит
 * перевод слова Еда в текущие языковые настройки.
 * 
 * JavaScript функция bagTranslate(mas_coockie), которая запускается 
 * JavaScript функцией bagList(), принимает массив куков, перебирает 
 * все куки, находит куки с нужными именами и забирает их значения.
 * Эти значения и являются названиями различных пунктов сумки.
 * 
 * Функция создает из этих названий массив и возвращает его.
 * 
 * Пользуется работой данной функции другая JavaScript функция,
 * которая и выводит сумку на экран. bagList()
 */

use \src\lib\php\ContainerObject;
use \class\nonBD\cripto\CodingStr;
class TitleForBag
{
    public function __construct()
    {
        $translate = ContainerObject::getInstance()
        ->getProperty('TranslateFacade');

        $bag = $translate->translator('Сумка');
        $food = $translate->translator('Еда');
        $сloth = $translate->translator('Одежда');
        $weapon = $translate->translator('Оружие');
        $armor = $translate->translator('Броня');
        $other_items = $translate->translator('Остальные предметы');
        /** 
        * Отправить в куки категории сумки. 
        * Отправляются переводы категорий
        */
        $bag = CodingStr::coding($bag);
        setcookie('translate_bag','"'.$bag.'"',time()+65);
        $food = CodingStr::coding($food);
        setcookie('translate_food','"'.$food.'"',time()+65);
        $сloth = CodingStr::coding($сloth);
        setcookie('translate_сloth','"'.$сloth.'"',time()+65);
        $weapon = CodingStr::coding($weapon);
        setcookie('translate_weapon','"'.$weapon.'"',time()+65);
        $armor = CodingStr::coding($armor);
        setcookie('translate_armor','"'.$armor.'"',time()+65);
        $other_items = CodingStr::coding($other_items);
        setcookie('translate_other_items','"'.$other_items.'"',time()+65);
    }
}
