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
            $this->setProperty('armor', $rez[0]['armor']);
            $this->setProperty('attack', $rez[0]['attack']);
            $this->setProperty('morality', $rez[0]['morality']);
            $this->setProperty('luck', $rez[0]['luck']);
            $this->setProperty('fatique', $rez[0]['fatique']);
            $this->setProperty('lawAbiding', $rez[0]['law_abiding']);
        } else {
            $query = "INSERT INTO survive_parametr_user
                      (id, wallet, armor, attack, morality, luck, fatique, law_abiding)
                      VALUES ($user_id,0,100,100,100,100,100,100)";
                      $this->setProperty('wallet', 0);
                      $this->setProperty('armor', 100);
                      $this->setProperty('attack', 100);
                      $this->setProperty('morality', 100);
                      $this->setProperty('luck', 100);
                      $this->setProperty('fatique', 100);
                      $this->setProperty('lawAbiding', 100);
            $this->query($query);
        }
    }
}
