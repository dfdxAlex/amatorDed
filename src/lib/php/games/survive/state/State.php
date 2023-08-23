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
        if ($_SESSION['statusAD']==0) {
            $this->setProperty('wallet', 0);
            $this->setProperty('armorMax', 100);
            $this->setProperty('attackMax', 100);
            $this->setProperty('moralityMax', 100);
            $this->setProperty('luckMax', 100);
            $this->setProperty('fatiqueMax', 100);
            $this->setProperty('lawAbidingMax', 100);

            $this->setProperty('armorReal', 100);
            $this->setProperty('attackReal', 100);
            $this->setProperty('moralityReal', 100);
            $this->setProperty('luckReal', 100);
            $this->setProperty('fatiqueReal', 100);
            $this->setProperty('lawAbidingReal', 100);

            return ;
        }

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
                              100,100,100,100,10,100)";
                      $this->setProperty('wallet', 0);
                      $this->setProperty('armor_max', 100);
                      $this->setProperty('attack_max', 100);
                      $this->setProperty('morality_max', 100);
                      $this->setProperty('luck_max', 100);
                      $this->setProperty('fatique_max', 100);
                      $this->setProperty('lawAbiding_max', 100);

                      $this->setProperty('armor_real', 100);
                      $this->setProperty('attack_real', 100);
                      $this->setProperty('morality_real', 100);
                      $this->setProperty('luck_real', 100);
                      $this->setProperty('fatique_real', 10);
                      $this->setProperty('lawAbiding_real', 100);
            $this->query($query);
        }

        /**
         * получить входное значение милисекунд нахождения 
         * в локации
         */
        $query = "SELECT entry_time FROM survive_user WHERE id='$user_id'";
        $rez = $this->queryAssoc($query);
        if ($rez)
            $this->setProperty('milisecInput', $rez[0]['entry_time']);
        else {
            echo 'нет информации';
            $timer = time();
            $query = "INSERT INTO survive_user
                      (id, name, location_id, entry_time)
                      VALUES ($user_id,'$login',-1,$timer)";
            $rez = $this->query($query);
            if ($rez) {
                $this->setProperty('milisecInput', $timer);
            }
        }
    }
}
