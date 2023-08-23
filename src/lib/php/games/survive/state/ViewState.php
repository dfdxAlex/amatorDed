<?php
namespace src\lib\php\games\survive\state;

/**
 * Класс рисует уровни энергий игрока
 */

class ViewState
{
    private $link;
    public function __construct(IState $link)
    {
        $this->link = $link;
    }
    public function viewParametr()
    {
        $rez = "
                <section class='container-fluid view-state'>
                </section>
        ";
    }
}
