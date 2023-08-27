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
      
      $translate = ContainerObject::getInstance()
                   ->getProperty('TranslateFacade');

      $bag = $translate->translator('Сумка');

      /** не все браузеры принимают куки в кирилице
       * поэтому переводы кодирую номерами.
       * Если отправить в значение кука translate_bag = 1
       * то функция JS должна вставить слово Сумка
       * 
       * По сути это дополнительная система кодирования,
       * 1-Сумка и дальше будет
       */
      // if ($bag == "Сумка") $bag=1;

      $bag = CodingStr::coding($bag);

      setcookie('translate_bag','"'.$bag.'"',time()+65);

    }
}
