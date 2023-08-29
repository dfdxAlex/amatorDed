<?php
namespace src\lib\php\games\survive\state\bag;

/**
 * класс выводит сумку
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
       * Подробнее описание в самом классе.ё
       */
      new TitleForBag;

      //временные куки для проверки
      $name = 'user_bag_'.CodingStr::coding('банан');
      setcookie($name,0.6,time()+25);
      $name = 'user_bag_'.CodingStr::coding('бананчик');
      setcookie($name,0.6,time()+15);

      // setcookie('user_bag_Mars',0.6,time()+5);
      // setcookie('user_bag_Baunty',0.6,time()+5);

      

    }
}
