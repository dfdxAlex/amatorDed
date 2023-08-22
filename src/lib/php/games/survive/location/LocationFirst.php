<?php
namespace src\lib\php\games\survive\location;

/**
 * первая локация, игрок еще никуда не ходил
 */

 /**
  * Метод возвращает коэффициент, влияющий на усталость.
  * Коеффициент менее 1 означает, что игрок теряет энергию
  * Коэффициент больше 1, означает, что игрок отдыхает
  * Коэффициент 1 нейтральный
  */
 class LocationFirst implements ILocation
 {
    public function returnKoefFatique()
    {
        return 1;
    }
 }
