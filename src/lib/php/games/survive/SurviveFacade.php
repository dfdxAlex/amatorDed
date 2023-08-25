<?php
namespace src\lib\php\games\survive;

/**
 * Фасад для управления игрой Выжить
 */

use \src\lib\php\games\survive\dialog\DialogAccordFacade;

class SurviveFacade
{
    public function __construct()
    {
        if (!isset($_SESSION['loginAD'])) return ;

        if (isset($_GET['survive'])) {
            new GameSurvive();
            new DialogAccordFacade();
        }
    }
}
