<?php
namespace src\lib\php\games\survive;

/**
 * Класс делает действия при первом запуске игры на сервере
 * то есть проверяет существует ли нужная таблица, если нет,
 * то создает её.
 */

use \class\redaktor\interface\trait\TraitInterfaceWorkToBd;

 class FirstStart
 {
    use TraitInterfaceWorkToBd;
    
    public function __construct()
    {
        /**
         * таблица содержит информацию о пользователе
         * и о его месте нахождения и времени там пребывания.
         * Время входа в локацию записывается в момент входа в
         * миллисекундах от 1970 года.
         * расшифровка таблицы survive_user
         * id - идентификационный номер пользователя
         * name - имя пользователя
         * location_id - номер локации нахождение игрока
         * entry_time - время входа игрока в локацию, в милисекундах 1970
         */
        $this->createTab(
          'name=survive_user',

          'poleN=id',
          'poleT=int',
          'poleS=0',

          'poleN=name',
          'poleT=varchar(50)',
          'poleS=',

          'poleN=location_id',
          'poleT=int',
          'poleS=1',

          'poleN=entry_time',
          'poleT=int',
          'poleS=1'
        );

        /**
         * таблица содержит информацию о локациях
         * id - номер локации
         * name - название локации
         */
       $this->createTab(
           'name=survive_location_name',
 
           'poleN=id',
           'poleT=int',
           'poleS=-1',
 
           'poleN=name',
           'poleT=varchar(50)',
           'poleS=Lost'
         );
         /**
          * Текущие параметры игрока
          * id - номер игрока
          * wallet - кошелек
          * armor - броня-защита
          * attack - атака-сила
          * morality - мораль
          * luck - удача
          * fatique - усталость
          * law_abiding - законопослушность
          */
         $this->createTab(
          'name=survive_parametr_user',

          'poleN=id',
          'poleT=int',
          'poleS=-1',

          'poleN=wallet',
          'poleT=int',
          'poleS=0',

          'poleN=armor_max',
          'poleT=int',
          'poleS=100',

          'poleN=attack_max',
          'poleT=int',
          'poleS=100',

          'poleN=morality_max',
          'poleT=int',
          'poleS=100',

          'poleN=luck_max',
          'poleT=int',
          'poleS=100',

          'poleN=fatique_max',
          'poleT=int',
          'poleS=100',

          'poleN=law_abiding_max',
          'poleT=int',
          'poleS=100',

          'poleN=armor_real',
          'poleT=int',
          'poleS=100',

          'poleN=attack_real',
          'poleT=int',
          'poleS=100',

          'poleN=morality_real',
          'poleT=int',
          'poleS=100',

          'poleN=luck_real',
          'poleT=int',
          'poleS=100',

          'poleN=fatique_real',
          'poleT=int',
          'poleS=10',

          'poleN=law_abiding_real',
          'poleT=int',
          'poleS=100',
        );
    }
 }
