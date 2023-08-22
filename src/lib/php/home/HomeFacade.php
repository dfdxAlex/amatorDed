<?php
namespace src\lib\php\home;

/**
 * Фасад для главной страницы
 * Пока нет идей по поводу главной страницы
 * 
 * При создании объект сразу регистрируется в контейнере
 */

 class HomeFacade implements \src\lib\php\games\survive\bgi\IBGI
 {
    /**
     * Пока не понятно, что будет на главной странице
     * убрать с неё фон
     */
    public function returnBGI()
    {
        return 'non';
    }
 }
