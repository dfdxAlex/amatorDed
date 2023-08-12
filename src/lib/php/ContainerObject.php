<?php
namespace src\lib\php;

/**
 * Класс служит для регистрации в него ссылки на объекты.
 * Singleton плюс PropertyContainer
 * Для использования класса в него следует зарегистрировать ссылку
 * на объект методом:
 * \src\lib\php\ContainerObject::getInstance()->setProperty('property name',$obj);
 * для получения ссылки на объект из другого места программы:
 * $obj = \src\lib\php\ContainerObject::getInstance()->getProperty('property name');
 */

class ContainerObject extends \class\nonBD\propertyContainers\PropertyContainer
{
    private static $instancesContainerObjects = null;

    protected function __construct() { }

    protected function __clone() { }

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    public static function getInstance()
    {
        if (is_null(self::$instancesContainerObjects)) 
            self::$instancesContainerObjects = new self();
        return self::$instancesContainerObjects;
    }

}
