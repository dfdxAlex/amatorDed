<?php
namespace src\lib\php\games\survive;

/**
 * Класс отвечает за хранение информации о расположении
 * игрока.
 */

 class LocationForUser extends \src\lib\php\db\Db implements ILocationForUser
 {
     private $location=-1;

     public function __construct()
     {
        parent::__construct();

        /**
         * При создании объекта следует проверить есть ли игрок
         * в базе данных локации, если его там нет, значит он на
         * улице, или если там значение локации равно нулю, тоже
         * игрок на улице
         */
        $login = $_SESSION['loginAD'];
        $query = "SELECT location_id FROM survive_user WHERE name='$login'";
        $location = $this->queryAssoc();
        if ($location) {
            $this->location = $location[0]['location_id'];
        }
     }

     public function getLocation()
     {
         return $this->location;
     }
     public function setLocation($location)
     {
         $this->location = $location;
     }
 }
