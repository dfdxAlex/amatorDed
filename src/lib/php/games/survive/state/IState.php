<?php
namespace src\lib\php\games\survive\state;

use \src\lib\php\db\Db;

/**
 * интерфейс для передачи класса State другому классу
 * класс так-же содержит свойства и методы записи и чтения
 * На долю потомка остаётся loadData();, этот метод должен 
 * найти источник данных, на момент создания класса - это 
 * база данных и таблица survive_parametr_user
 */

abstract class IState extends Db
{
    /**
     * тратится и восстанавливается только усталость 
     * , остальное прокачивается.
     * усталость понижает все, кроме законопослушности
     * усталость упала до нуля, все значения упали до 30 процентов
     * усталость на уровне 100 процентов, никаких штрафов.
     * Разные локации по разному расходуют енергию игрока, или 
     * влияют на усталость
     */
    private $wallet; 
    private $armorMax;
    private $attackMax;
    private $moralityMax;
    private $luckMax;
    private $fatiqueMax;     // усталость
    private $lawAbidingMax;  //законопослушность

    private $armorReal;
    private $attackReal;
    private $moralityReal;
    private $luckReal;
    private $fatiqueReal;     // усталость
    private $lawAbidingReal;  //законопослушность

    private $milisecInput = false;

    abstract public function loadData();

    public function getProperty($prop)
    {
        return $this->$prop;
    }

    public function setProperty($prop, $data)
    {
        $this->$prop = $data;
    }

}
