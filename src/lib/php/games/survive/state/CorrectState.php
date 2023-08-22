<?php
namespace src\lib\php\games\survive\state;

/**
 * Класс корректирует данные о состоянии игрока используя
 * информацию о времени проведения в определенной локации
 * и от коэффикиентов самой локации
 */
/**
 * класс получает параметр коэффициента усталости пребывания в локации.
 * то есть на сколько растёт усталость каждый час.
 * 
 * в зависимости от этого времени пересчитать усталость
 * 
 * В зависимости от усталости пересчитать остальные параметра.
 * 
 * Далее придумать зависимость остальных параметров друг от друга
 * например защита зависит от морали и удачи ...
 */

class CorrectState
{
    private $state; // объект с исходными данными
    private $location; // объект локации
    private $hour;

    public function __construct(IState $state, \src\lib\php\games\survive\location\ILocation $location)
    {
        $this->state = $state;
        $this->hour = (time() - $state->getProperty('milisecInput')) / 3600;
        $this->location = $location;
        $koef = $location->returnKoefFatique();

        /**
         * Считаем усталость, реальное состояние игрока
         */
        $this->hour*$location->returnKoefFatique();
    }

    public function getPropertyCorrect($prop)
    {
        return $this->$prop;
    }

}
