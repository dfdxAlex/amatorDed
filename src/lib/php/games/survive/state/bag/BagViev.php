<?php
namespace src\lib\php\games\survive\state\bag;

/**
 * класс выводит сумку, открывает сумку.
 */
/**
 * Слово Еда или его перевод хранится в куке translate_food
 * Слово Сумка или его перевод хранится в куке translate_bag
 * Слово Одежда или его перевод хранится в куке translate_сloth
 * Слово Оружие или его перевод хранится в куке translate_weapon
 * Слово Броня или его перевод хранится в куке translate_armor
 * Слово Другие или его перевод хранится в куке translate_other_items
 */

use \src\lib\php\ContainerObject;
use \class\nonBD\cripto\CodingStr;
class BagViev
{
    public function __construct(IBag $link)
    {
        echo '
        <div class="bag">
        <button id="button-bag" type="button" class="btn btn-success position-relative"  data-bs-toggle="modal" data-bs-target="#exampleModal">
          $
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">
            '.$link->getProperty('mass').'
            <span class="visually-hidden">unread messages</span>
          </span>
        </button>
        </div>
        <div id="for-bag">
        </div>
        ';
      

      /** Класс кодирует переводы различных пунктов сумки
       * игрока, такие как еда, одежда, оружие и отправляет 
       * в куки. Дальше JavaScript функции это забирают
       * из куков и используют.
       * Подробнее описание в самом классе.
       */
      new TitleForBag;

      /**
       * отправить служебные куки с переводами для действий
       * с предметами сумки, на пример Съесть
       * Ключи:
       * Кушать
       * Одеть
       * Достать (в смысле оружие из сумки)
       * Одеть
       * Применить
       */
      $name = 'user_bagEat'.CodingStr::coding('Кушать');
      setcookie($name,0.6,time()+25); 

      //временные куки для проверки
      $name = 'user_bag_'.CodingStr::coding('банан');
      setcookie($name,0.6,time()+25);
      $name = 'user_bagOther'.CodingStr::coding('бананчик');
      setcookie($name,0.6,time()+15);
      $name = 'user_bag_'.CodingStr::coding('ананас');
      setcookie($name,0.6,time()+25);

      // setcookie('user_bag_Mars',0.6,time()+5);
      // setcookie('user_bag_Baunty',0.6,time()+5);

    }
}
