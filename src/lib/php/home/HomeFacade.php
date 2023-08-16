<?php
namespace src\lib\php\home;

/**
 * Фасад для главной страницы
 * Пока нет идей по поводу главной страницы
 */

 class HomeFacade implements \src\lib\php\games\survive\bgi\IBGI
 {
    public function __construct()
    {
        \src\lib\php\ContainerObject::getInstance()->setProperty('HomeFacade',$this);
    }
    
    public function outPage()
    {
        if (isset($_GET['home']))
            return '<section class="container-fluid"></section>';
        return '';
    }

    /**
     * Пока не понятно, что будет на главной странице
     * убрать с неё фон
     */
    public function returnBGI()
    {
        return 'non';
    }
 }
