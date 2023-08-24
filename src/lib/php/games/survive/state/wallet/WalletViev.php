<?php
namespace src\lib\php\games\survive\state\wallet;

use src\lib\php\games\survive\state\IState;
// use \src\lib\php\ContainerObject;

class WalletViev
{
    public function __construct(IState $link)
    {
        //$translate->translator('Кошелек')
        // $translate = ContainerObject::getInstance()
        //                               ->getProperty('TranslateFacade');
        echo '
        <div class="wallet">
        <button type="button" class="btn btn-success position-relative">
          $
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">
            '.$link->getProperty('wallet').'
            <span class="visually-hidden">unread messages</span>
          </span>
        </button>
        </div>
        ';
    }
}
