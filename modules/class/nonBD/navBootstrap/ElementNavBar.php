<?php
namespace class\nonBD\navBootstrap;

/**
 * Класс должен создать объект, который будет содержать
 * информацию о простом элементе менюшки.
 * Должен быть метод, который возвращает готовый елемент.
 * 
 * Строка с разметкой создается в конструкторе, поэтому свойства
 * каждой кнопки меню можно задать только перед созданием объекта.
 * Поэтому, перед созданием объекта следует настроить все необходимые 
 * свойства. Речь идёт об персональных свойствах, таких как имя кнопки
 * и ссылка. Стилевые настройки настраиваются один раз.
 * 
 * Перед созданием объекта необходимо задать персональные параметры
 * используя свойства супер-класса abstract class INavMenu.
 * 
 * Сеттер в суперклассе уже есть, а данный класс принимает в параметр
 * ссылку на любой ранее созданный объект сигнатуры INavMenu и в то же
 * время это должен быть тот объект, который будет передан в конструктор
 * этого объекта.
 * 
 * Допустим, главный объект был создан так:
 * $navbarMenuUp = new NavMenu();
 * 
 * тогда текущий объект, должен быть создан так:
 * $navbarMenuUp->setProperty('Home','Первая'); -- задать надпись на кнопке
 * $navbarMenuUp->setProperty('link','?1'); -- задать ссылку кнопки
 * $element1 = new ElementNavBar($navbarMenuUp); -- создать объект
 * 
 * После создания одного объекта, можно создать необходимое 
 * колличество объектов.
 * 
 * После создания всех нужных объектов, их нужно передать главному
 * объеку, который из них построит меню.
 * Поместить эти объекты в главный объект нцжно с помощью 
 * метода:
 * $navbarMenuUp->addElement($element1);
 * $navbarMenuUp->addElement($element2);
 * $navbarMenuUp->addElement($elementN);
 * 
 * После помещения всех необходимых объектов в главный объект
 * выводим меню используя метод главного объекта:
 * echo $navbarMenuUp->writeElement();
 * 
 * Метод writeElement() должен быть во всех объектах,наследующих
 * абстрактные классы INavMenu или INavMenuDiff, но в каждом 
 * классе они вывдят свою информацию.
 * В текущем классе - это одна кнопка, в классе BlockNavBar - это
 * выпадающее меню, а в классе главном NavMenu - это вывод всего 
 * меню.
 * 
 * Данная библиотека navBootstrap построена по правилам шаблона Composite
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
