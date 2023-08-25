<?php
namespace src\lib\php\games\survive\state\bag;

/**
 * класс выводит сумку
 */
use \src\lib\php\connectFunctionJs\ConnectFunctionJsClick;
class BagViev
{
    public function __construct(IBag $link)
    {
        echo '
        <div class="bag">
        <button id="button-bag" type="button" class="btn btn-success position-relative">
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
      new ConnectFunctionJsClick('button-bag','bagList');

    }
}
