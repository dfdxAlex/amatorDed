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

  /**
   * Управление сумкой.
   * Сумка работает на смешанных технологиях php и js.
   * Сумка получает данные из своих куков, следовательно, чтобы
   * в сумке что-то появилось необходимо отправить кукис.
   * 
   * Чтобы отправить в сумку еду, нужно сделать кукис с 
   * $name = 'user_bag_'.CodingStr::coding('банан');
   * setcookie($name,0.6,time()+25);
   * 
   * 'user_bag_ - это кук для еды.
   *  user_bagCloth  - это кук для  одежды
   *  user_bagWeapon - это кук для  оружия
   *  user_bagArmor - это кук для  брони
   *  user_bagOther - это кук для  остальных предметов
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
