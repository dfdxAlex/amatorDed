<?php
namespace src\lib\php;

class Futter
{
    public function __construct()
    {
        \src\lib\php\Statistic::getLinkStatistic()->setPlusOneToIntObj();
        echo '</body></html>';
    }
}


