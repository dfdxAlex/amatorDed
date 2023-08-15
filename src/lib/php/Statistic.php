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
    private $intObj=2;
    private $container;

    /**
     * Инфраструктура Singltona
     */
    private static $instances = null;
    protected function __construct() {
        /**
         * Композиция контейнера свойств.
         * Класс создается внутри автозагрузчика, поэтому
         * его файл подключаю вручную.
         */
        include '../modules/class/nonBD/propertyContainers/PropertyContainer.php';
        $this->container = new \class\nonBD\propertyContainers\PropertyContainer();
     }
    protected function __clone() { }
    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }
    public static function getLinkStatistic()
    {
        if (is_null(self::$instances)) {
            self::$instances = new self();
            
    }
        return self::$instances;
    }
    
    /**
     * Метод добавляет одну единицу к счётчику числа 
     * созданных объектов.
     * Плюс, если на вход приходит не пустой символ, то заносит в
     * пропертиконтайнер имя класса, который был загружен.
     */
    public function setPlusOneToIntObj($className='')
    {
        $this->intObj++;
        if ($className!='') {
            $this->container->setProperty($className,'');
        }
        return $this;
    }
    /**
     * Метод возвращает содержимое счётчика числа подключенных
     * классов.
     */
    public function getPlusOneToIntObj()
    {
        return $this->intObj;
    }

    /**
     * Метод возвращает содержимое массива подключенных
     * классов.
     */
    public function getListClass()
    {
        return $this->container->getPropertyMas();
    }
}
