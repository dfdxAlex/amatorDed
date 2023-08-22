<?php
namespace src\lib\php\games\survive\state;

/**
 * Класс читает текущее состояние игрока и запоминает его в 
 * свойства. Свойства и методы работы с ними находятся
 * в суперклассе. Здесь обязательно к реализации получение
 * данных из базы данных и размещение их в суперклассе классе.
 */

class State extends IState
{
    public function loadData()
    {
        
        $login = $_SESSION['loginAD'];
        $user_id = $_SESSION['user_ID'];

        $query = "SELECT * FROM survive_parametr_user WHERE id='$user_id'";
        $rez = $this->queryAssoc($query);
        if ($rez) {
            $this->setProperty('wallet', $rez[0]['wallet']);
            $this->setProperty('armorMax', $rez[0]['armor_max']);
            $this->setProperty('attackMax', $rez[0]['attack_max']);
            $this->setProperty('moralityMax', $rez[0]['morality_max']);
            $this->setProperty('luckMax', $rez[0]['luck_max']);
            $this->setProperty('fatiqueMax', $rez[0]['fatique_max']);
            $this->setProperty('lawAbidingMax', $rez[0]['law_abiding_max']);


        } else {
            $query = "INSERT INTO survive_parametr_user
                      (id, wallet, armor_max, attack_max, morality_max, luck_max, fatique_max, law_abiding_max)
                      VALUES ($user_id,0,100,100,100,100,100,100)";
                      $this->setProperty('wallet_max', 0);
                      $this->setProperty('armor_max_max', 100);
                      $this->setProperty('attack_max_max', 100);
                      $this->setProperty('morality_max', 100);
                      $this->setProperty('luck_max', 100);
                      $this->setProperty('fatique_max', 100);
                      $this->setProperty('lawAbiding_max', 100);
            $this->query($query);
        }

        /**
         * получить входное значение милисекунд нахождения 
         * в локации
         */
        $query = "SELECT entry_time FROM survive_user WHERE id='$user_id'";
        $rez = $this->queryAssoc($query);
        $this->setProperty('milisecInput', $rez[0]['entry_time']);
    }
}
