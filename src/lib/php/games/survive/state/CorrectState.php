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
use \src\lib\php\games\survive\location\ILocation;

class CorrectState
{
    private $state; // объект с исходными данными
    private $location; // объект локации
    private $hour;

    public function __construct(IState $state, ILocation $location)
    {
        $this->state = $state;
        $this->location = $location;

        /** Сколько часов находился игрок в текущей локации */
        $sec = $state->getProperty('milisecInput');
        if (!$sec) $sec=time()+10;
        $this->hour = (time() - $sec) / 3600;
        
        
        /** Возвращаем коэффициент усталости в локации */
        $koef = $location->returnKoefFatique();
        

        /**
         * Считаем усталость, реальное состояние игрока
         * усталость выражается от 0 до 1
         */
        $fReal = $state->getProperty('fatiqueReal') - $this->hour*$location->returnKoefFatique();
        $fReal = $fReal/100;
        $fReal = $this->normalizeParamrtr($fReal);
        $state->setProperty('fatiqueReal', $fReal*100);
        
        /**
         * подсчитать броню
         */
        $arReal = $state->getProperty('armorReal')*$fReal;
        $arReal = $this->normalizeParamrtr($arReal);
        $state->setProperty('armorReal', $arReal);
        

        /**
         * подсчитать атаку
         */
        $atReal = $state->getProperty('attackReal')*$fReal;
        $atReal = $this->normalizeParamrtr($atReal);
        $state->setProperty('attackReal', $atReal);
        
    }

    /** 
     * возвращает значения различных свойств через разыменовку 
     * то есть принимается имя свойства в виде строки
     */
    public function getPropertyCorrect($prop)
    {
        return $this->state->getProperty($prop);
    }

    private function normalizeParamrtr($param)
    {
        if ($param<0.01) return 0.01;
        return $param;
    }

}
