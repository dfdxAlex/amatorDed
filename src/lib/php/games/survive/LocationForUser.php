<?php
namespace src\lib\php\games\survive;

/**
 * Класс отвечает за хранение информации о расположении
 * игрока.
 */

 class LocationForUser extends \src\lib\php\db\Db implements ILocationForUser
 {
     private $login;

     public function getLocation()
     {
         
         return $_SESSION['location_id'];
     }
     public function setLocation($location)
     {
         /**
          * Если пришли данные, отличающиеся от текущих, то
          * пишем их в таблицу.
          */
         if ($_SESSION['location_id'] != $location) {
              $login = $_SESSION['loginAD'];
              $tim = time();
              $query = "UPDATE survive_user SET location_id=$location, entry_time=$tim WHERE name='$login'";
              $this->query($query);
              $_SESSION['location_id'] = $location;
         }
     }
 }
