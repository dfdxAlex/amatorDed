<?php
namespace src\lib\php\games\survive\state;

/**
 * интерфейс для передачи класса State другому классу
 * класс так-же содержит свойства и методы записи и чтения
 * На долю потомка остаётся loadData();, этот метод должен 
 * найти источник данных, на момент создания класса - это 
 * база данных и таблица survive_parametr_user
 */

abstract class IState extends \src\lib\php\db\Db
{
    private $wallet;
    private $armor;
    private $attack;
    private $morality;
    private $luck;
    private $fatique;
    private $lawAbiding;

    abstract public function loadData();

    public function getProperty($prop)
    {
        return $$prop;
    }

    public function setProperty($prop, $data)
    {
        $this->$prop = $data;
    }

}
