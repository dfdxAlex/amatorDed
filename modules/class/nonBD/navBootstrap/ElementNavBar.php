<?php
namespace class\nonBD\navBootstrap;

/**
 * Класс должен создать объект, который будет содержать
 * информацию о простом элементе менюшки.
 * Должен быть метод, который возвращает готовый елемент.
 *  
 */

 class ElementNavBar extends INavMenu
 {
     public function __construct(INavMenu $in)
     {
         $this->in = $in;
        /**
         * Получение ссылки для пункта меню. Берется ссылка из
         * глобального свойства $link, по умолчанию #.
         * Для установки ссылки необходимо использовать 
         * метод setProperty($nameProperty, $dataProperty)
         * пример:
         *  $obj->setProperty('link', 'google.com')
         */
        $link = $this->in->getProperty('link');
        
        /**
         * Сбросс параметра ссылки сразу, после прочтения.
         */
        $this->in->setProperty('link', '#');

        $this->rez = '
        <li class="'.
        $this->in->getProperty('nav-item').'">
          <a class="'.
            $this->in->getProperty('nav-link').' '.
            $this->in->getProperty('active').'" 
            aria-current="page" 
            href="'.$link.'"
           >
           '.$this->in->getProperty('Home').'</a>
        </li>';
     }

     public function writeElement()
     {
         echo $this->rez;
     }
 }
