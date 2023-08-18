<?php
namespace class\nonBD\accordionBootstrap;
/**
 * Главный класс, который принимает в себя все элементы
 * аккордиона и выводит их
 */

 /**
  * Класс аккордион будет очень похож на класс навбар. 
  * изменения свойств и добавления объектов будет аналогична.
  * Отличаться будут только объекты, помещаемые в данный контейнер
  * и возможно система вывода. 
  * Данный класс не наследует ничего, но объекты в него входящие 
  * наследуют объект NavBar
  */

class AccordionContainer
{
    private $masObject = [];

    /**
     * Метод добавляет объект пункта в контейнер
     */
    public function addElement(\class\nonBD\accordionBootstrap\IAccordionPunkt $in)
    {
        $this->masObject[] = $in;
    }

    public function __construct()
    {
        /**
         * Зарегистрировать объект в контейнере объектов при создании
         */
        \src\lib\php\ContainerObject::getInstance()->setProperty('AccordionContainer',$this);
    }

    /**
     * Метод выводит пункты меню аккордион
     */
    public function writePunkt()
    {
        echo '<section class="container-fluid">
               <div 
                 class="accordion  accordion-flush" 
                 id="accordionExample"
               >';
               $this->publicButton();
        echo '</div></section>';
    } 

    protected function publicButton()
    {
        /**
         * Перебираем массив всех объектов и запускаем 
         * метод каждого из них.
         * Метод writeElement() рисует либо простую кнопку
         * либо выпадающее меню
         */
        foreach ($this->masObject as $key=>$value) {
            echo $key;
          $value->setProperty('id',$key);
          $value->writeElement();
        }
    }
}
