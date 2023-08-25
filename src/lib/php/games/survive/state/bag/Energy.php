<?php
namespace src\lib\php\games\survive\state\bag;

/**
 * Класс хранит информацию об енергетичной ценности
 * пищевых продуктов
 */

  /**
  * Property Container Method
  *
  * getProperty($name)
  * setProperty($name, $value)
  * getPropertyMas()
  */

 use class\nonBD\propertyContainers\PropertyContainer;

class Energy extends PropertyContainer
{
    public function __construct()
    {
        /**
         * Вводятся данные енергетической ценности 
         * пищевых продуктов из расчёта на 100 грам
         */
        /**
         * придумать формулу восстановления усталости за еду
         * 2700 ккалорий в сутки норма
         */
        $this->setProperty('snickers',491);
        $this->setProperty('mars',455);
        $this->setProperty('bounty',484);

        $this->setProperty('banana',96);
        $this->setProperty('apple',75);

        $this->setProperty('bread',250);

        /**жаренная курица */
        $this->setProperty('roasted_chicken',210);
        /**жаренная свинина */
        $this->setProperty('fried_pork',489);
        /**жаренная говядина */
        $this->setProperty('fried_beef',389);

    }
}
