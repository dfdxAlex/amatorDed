<?php
namespace src\lib\php;

use \src\lib\php\ContainerObject;
use \src\lib\php\home\HomeFacade;
use \src\lib\php\translate\TranslateFacade;

use \src\lib\php\games\survive\{SurviveFacade,
                                FirstStart};

use \src\lib\php\content\FacadeContentPattern;
use \src\lib\php\HeaderFacade;
use \src\lib\php\authorization\UserFacade;


/**
 * Класс содержит другие классы предварительной настройки сайта
 * Здесь классы, которые ничего не выводят и должны отработать
 * до начала вывода разметки на экран.
 */
class ContainerPre
{
    public function __construct()
    {

        new FirstStart;

        $this->createStatusAD();

        ContainerObject::setObject('HomeFacade',new HomeFacade());
        
        new TranslateFacade();

        new SurviveFacade();

        FacadeContentPattern::factoryContentForPattern();

        new HeaderFacade();

        ContainerObject::setObject('UserFacade', new UserFacade());
    }

    private function createStatusAD()
    {
        if (!isset($_SESSION['statusAD'])) 
            $_SESSION['statusAD']=0;
    }
}
