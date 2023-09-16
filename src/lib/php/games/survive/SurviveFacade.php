<?php
namespace src\lib\php\games\survive;

/**
 * Фасад для управления игрой Выжить
 */

use \src\lib\php\games\survive\dialog\DialogAccordFacade;
use \src\lib\php\ContainerObject;
use \src\lib\php\games\survive\state\ViewState;

class SurviveFacade
{
    public function __construct()
    {
        if (!isset($_SESSION['loginAD'])) return ;

        if (isset($_GET['survive'])) {
            new GameSurvive();
            new DialogAccordFacade();
        }

    /**
     * Запуск отображения энергий
     * Запуск системы диалога если вошли в игру
     */
    if (isset($_GET['survive']) && isset($_SESSION['loginAD'])) {
        /** отображение енергий */
        $state = ContainerObject::getInstance()
                                  ->getProperty('State');
        // var_dump($state);
        $energi = new ViewState($state);
        
        echo $energi->viewParametr();
        
        /** диалоги */
        $accord = ContainerObject::getInstance()
                                   ->getProperty('AccordionContainer')
                                   ->writeElement();
    } 

    }
}
