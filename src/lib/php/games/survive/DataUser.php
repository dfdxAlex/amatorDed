<?php
namespace src\lib\php\games\survive;

/**
 * Класс обновляет данные о пользователе, если нет
 * нужных переменных сессий
 * Класс должен работать самостоятельно при входе игрока 
 * в игру
 */
class DataUser extends \src\lib\php\db\Db
{

    private $login;
    public function __construct()
    {
        $this->login = $_SESSION['loginAD'];
        parent::__construct();
        $this->updateUserId();
        $this->updateUserLocation();
    }
    /**
     * Функция обновляет данные пользователя, если их нет
     * в переменных сессий.
     * Если пользователя нет в базе данных, то создает его,
     * локация при этом становится -1
     */
    private function updateUserId()
    {
        if (!isset($_SESSION['user_ID'])) {
            /**
             * дополнительно запрашивается информация о локации location_id
             * для того, чтобы не делать отдельный запрос, если пользователь
             * уже есть в базе
             */
            $query = "SELECT id, location_id FROM survive_user WHERE name='$this->login'";
            $rez = $this->queryAssoc($query);
            if ($rez) {
                $_SESSION['user_ID'] = $rez[0]['id'];
                $_SESSION['location_id'] = $rez[0]['location_id'];
            }
            else {
               $query = "SELECT MAX(id) FROM survive_user WHERE 1";
               $rez = $this->queryAssoc($query);
               $id = $rez[0]['MAX(id)']+1;
               $name = $_SESSION['loginAD'];
               $tim = time();
               $query = "INSERT INTO survive_user (id, name, location_id, entry_time) VALUES ($id,'$name',-1,$tim)";
               $this->query($query);
               
               $query = "SELECT id FROM survive_user WHERE name='$this->login'";
               $rez = $this->queryAssoc($query);
               if ($rez) {
                   $_SESSION['user_ID'] = $rez[0]['id'];
               }
            }
        }
    }
    
    private function updateUserLocation()
    {
        if (!isset($_SESSION['location_id'])) {
            $query = "SELECT location_id FROM survive_user WHERE name='$this->login'";
            $rez = $this->queryAssoc($query);
            if ($rez) {
                $_SESSION['location_id'] = $rez[0]['location_id'];
            }
        }
    } 
}
