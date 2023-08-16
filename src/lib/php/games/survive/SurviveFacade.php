<?php
namespace src\lib\php\games\survive;

/**
 * Фасад для управления игрой Выжить
 */

class SurviveFacade
{
    public function __construct()
    {
        if (isset($_GET['survive'])) {
            new GameSurvive();
        }
    }
}
