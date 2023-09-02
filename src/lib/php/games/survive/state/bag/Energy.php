<?php
namespace src\lib\php\games\survive\state\bag;

/**
 * Класс хранит информацию об енергетичной ценности
 * пищевых продуктов

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
        $this->setProperty('snickers',491);        // перевод есть
        $this->setProperty('mars',455);            // перевод есть
        $this->setProperty('bounty',484);          // перевод есть

        $this->setProperty('banana',96);           // перевод есть
        $this->setProperty('apple',75);            // перевод есть

        $this->setProperty('bread',250);           // перевод есть

        /**жаренная курица */
        $this->setProperty('roasted_chicken',210); // перевод есть
        /**жаренная свинина */
        $this->setProperty('fried_pork',489);      // перевод есть
        /**жаренная говядина */
        $this->setProperty('fried_beef',389);      // перевод есть
    }

    public function returnEnergy($food)
    {
            return match(true) {
                $food == 'Snickers' => 491,
                $food == 'Сникерс'  => 491,
            };
    }
}


// en => Snickers
// pl => Snickers
// ua => Сникерс
//  => Сникерс

// en => Mars
// pl => Mars
// ua => Марс
//  => Марс

// en => Bounty
// pl => Bounty
// ua => Баунти
//  => Баунти

// en => Banana
// pl => Banan
// ua => Банан
//  => Банан

// en => Apple
// pl => Jabłko
// ua => Яблуко
//  => Яблоко

// en => Bread
// pl => Chleb
// ua => Хліб
//  => Хлеб

// en => Roasted chicken
// pl => Kurczak pieczony
// ua => Смажена курка
//  => Жаренная курица

// en => Fried pork
// pl => Smażona wieprzowina
// ua => Смажена свинина
//  => Жаренная свинина

// en => Fried beef
// pl => Smażona wołowina
// ua => Смажена яловичина
//  => Жаренная говядина
