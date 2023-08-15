<?php
namespace src\lib\php\games\survive;

/**
 * интерфейс для класса, хранящего расположение игрока
 */

 interface ILocationForUser
 {
    public function getLocation();
    public function setLocation($location);
 }
