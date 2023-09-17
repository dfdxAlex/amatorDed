<?php
namespace src\lib\php;

use \class\nonBD\navBootstrap\NavBarFacade;
use \src\lib\php\ContainerObject;
use \src\lib\php\games\survive\VievSurviveFacade;
use \src\lib\php\FutterDecorator;

class ContainerViev
{
    public function __construct()
    {
        NavBarFacade::createNavBar();

        ContainerObject::getObject('UserFacade')->userFacadeLevelLast();

        new VievSurviveFacade;

        ContainerObject::getObject('NewsPattern')->news();

        new FutterDecorator();
    }
}
