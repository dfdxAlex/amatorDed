<?php
namespace src\lib\php\games\survive\state\bag;

/**
 * Класс управляет содержимым сумки.
 * Содержимое хранится в контейнере свойст.
 */

 /**
  * Property Container Method
  *
  * getProperty($name)
  * setProperty($name, $value)
  * getPropertyMas()
  */

use \class\nonBD\propertyContainers\PropertyContainer;
use \src\lib\php\games\survive\state\bag\IBag;

class Bag extends PropertyContainer
          implements IBag
{
    public function __construct()
    {
        /**объект хранит енергетическую ценность продуктов
         * для получения информации запустить метод
         * getProperty('mars');
         */
        $energy = new Energy();

        foreach($_COOKIE as $key=>$val) {
            if (stripos($key,'user_bag')!==false) {
                $nameProperty = str_replace('user_bag_','',$key);
                $this->setProperty($nameProperty, $val);
            }
        }

        $this->setProperty('mass', 0);

        /** получить ссылку на массив из prooerty container */
        $masBag = $this->getPropertyMas();
        foreach($masBag as $key=>$val) {
            $this->setProperty('mass', $this->getProperty('mass')+$val);
        }
    }
}
