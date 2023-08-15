<?php
namespace src\lib\php\games\survive;

/**
 * Класс делает действия при первом запуске игры на сервере
 * то есть проверяет существует ли нужная таблица, если нет,
 * то создает её.
 */


 class FirstStart
 {
    use \class\redaktor\interface\trait\TraitInterfaceWorkToBd;
    public function __construct()
    {
        /**
         * проверка присутствия таблицы
         * таблица содержит информацию о пользователе
         * и о его месте нахождения и времени там пребывания.
         * Время входа в локацию записывается в момент входа в
         * миллисекундах от 1970 года.
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
         * проверка присутствия таблицы
         * таблица содержит информацию о локациях
         * и о воздействии локации на параметры игрока, 
         * если не произошло никаких событий или случаев
         */
       $this->createTab(
           'name=survive_location_name',
 
           'poleN=id',
           'poleT=int',
           'poleS=1',
 
           'poleN=name',
           'poleT=varchar(50)',
           'poleS=Home'
         );
    }
 }
