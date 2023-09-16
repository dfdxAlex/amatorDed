<?php
namespace src\lib\php\games\survive;

use \src\lib\php\ContainerObject;
use \src\lib\php\games\survive\state\ViewState;

class VievSurviveFacade extends SurviveFacade
{
    public function __construct()
    {
        if (!isset($_SESSION['loginAD'])) return ;

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
