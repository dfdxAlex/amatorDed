<?php
namespace src\lib\php\games\survive;

/**
 * Класс отвечает за хранение информации о расположении
 * игрока.
 */

 class LocationForUser extends \src\lib\php\db\Db implements ILocationForUser
 {
     private $location=-1;
     private $login;

     public function __construct()
     {
        parent::__construct();

        /**
         * При создании объекта следует проверить есть ли игрок
         * в базе данных локации, если его там нет, значит он на
         * улице, или если там значение локации равно нулю, тоже
         * игрок на улице
         */
        $this->login = $_SESSION['loginAD'];
        $query = "SELECT location_id FROM survive_user WHERE name='$this->login'";
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
         
         /**
          * Если пришли данные, отличающиеся от текущих, то
          * пишем их в таблицу.
          */
         if ($this->location != $location) {
             /**
              * если локация -1, то проверить есть ли игрок в таблице
              * локаций, если нет, то добавить его, если есть, то изменить
              * его локацию.
              */
             if ($this->location == -1) {
                 $query = "SELECT location_id FROM survive_user WHERE name='$this->login'";
                 $rez = $this->queryAssoc($query);
                 if ($rez) {
                    $query = "UPDATE survive_user SET location_id=$location, entry_time=time() WHERE name='$this->login'";
                }
                 else {
                    // $query = "INSERT INTO survive_user(id, name, location_id, entry_time) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]')";
                 }
             }
         }
        //  $query =

        $this->location = $location;
     }

     /**
      * Проверить есть ли пользователь в таблице локация, если нет
      * то вернуть false, если есть, то вернуть true
      */
 }
