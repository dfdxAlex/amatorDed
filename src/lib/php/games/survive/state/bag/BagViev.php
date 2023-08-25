<?php
namespace src\lib\php\games\survive\state\bag;

/**
 * класс выводит сумку
 */

class BagViev
{
    public function __construct(IBag $link)
    {
        echo '
        <div class="bag">
        <button type="button" class="btn btn-success position-relative">
          $
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">
            '.$link->getProperty('mass').'
            <span class="visually-hidden">unread messages</span>
          </span>
        </button>
        </div>
        ';
    }
}
