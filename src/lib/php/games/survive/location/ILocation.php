<?php
namespace src\lib\php\games\survive\location;

/**
 * абстрактный класс выполняет роль интерфейса плюс содержит
 * свойства коэффициентов
 */
 /**
  * Метод возвращает коэффициент, влияющий на усталость.
  * Коеффициент менее 1 означает, что игрок теряет энергию
  * Коэффициент больше 1, означает, что игрок отдыхает
  * Коэффициент 1 нейтральный
  */
interface ILocation
{
    public function returnKoefFatique();
}
