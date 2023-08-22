<?php
namespace src\lib\php\games\survive;

/**
 * фабрика создает и возвращает класс, который зависит
 * от того, где находится игрок
 */

class BGIFactory 
{
    public function factoryReturnBGI($location)
    {
        if ($location==-1) return new bgi\BGILost();
        return new bgi\BGINon();
    }
}
