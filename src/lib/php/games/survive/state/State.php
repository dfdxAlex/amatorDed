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

            $this->setProperty('armorReal', $rez[0]['armor_real']);
            $this->setProperty('attackReal', $rez[0]['attack_real']);
            $this->setProperty('moralityReal', $rez[0]['morality_real']);
            $this->setProperty('luckReal', $rez[0]['luck_real']);
            $this->setProperty('fatiqueReal', $rez[0]['fatique_real']);
            $this->setProperty('lawAbidingReal', $rez[0]['law_abiding_real']);


        } else {
            $query = "INSERT INTO survive_parametr_user
                      (id, wallet, armor_max, attack_max, morality_max, luck_max, 
                       fatique_max, law_abiding_max, armor_real, attack_real, 
                       morality_real, luck_real, fatique_real, law_abiding_real)
                      VALUES ($user_id,0,100,100,100,100,100,100,
                              10,10,10,10,10,10)";
                      $this->setProperty('wallet_max', 0);
                      $this->setProperty('armor_max', 100);
                      $this->setProperty('attack_max', 100);
                      $this->setProperty('morality_max', 100);
                      $this->setProperty('luck_max', 100);
                      $this->setProperty('fatique_max', 100);
                      $this->setProperty('lawAbiding_max', 100);

                      $this->setProperty('armor_real', 10);
                      $this->setProperty('attack_real', 10);
                      $this->setProperty('morality_real', 10);
                      $this->setProperty('luck_real', 10);
                      $this->setProperty('fatique_real', 10);
                      $this->setProperty('lawAbiding_real', 10);
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
