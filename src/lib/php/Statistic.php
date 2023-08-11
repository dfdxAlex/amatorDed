<?php
namespace src\lib\php;

/**
 * Класс содержит различные свойства, собирающие статистику
 * одного обновления страницы.
 * На момент создания класса он содержит одно свойство
 * которое призвано посчитать число созданных объектов
 * за одно обновление страницы.
 */

class Statistic
{
    /**
     * Свойство для бизнесс логики, содержит число созданных
     * за одно обновление страницы объектов.
     */
    private $intObj=1;

    /**
     * Инфраструктура Singltona
     */
    private static $instances = null;
    protected function __construct() { }
    protected function __clone() { }
    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }
    public static function getStatistic()
    {
        if (is_null(self::$instances)) 
            self::$instances = new self();
        return self::$instances;
    }
    
    /**
     * Метод добавляет одну единицу к счётчику числа 
     * созданных объектов.
     */
    public function setPlusOneToIntObj()
    {
        $this->intObj++;
        return $this;
    }
    /**
     * Метод возвращает содержимое счётчика числа созданных
     * объектов.
     */
    public function getPlusOneToIntObj()
    {
        return $this->intObj;
    }
}
