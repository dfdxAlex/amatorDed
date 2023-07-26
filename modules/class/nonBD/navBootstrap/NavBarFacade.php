<?php
namespace class\nonBD\navBootstrap;

class NavBarFacade
{
    public static function createNavBar()
    {
        /**
         * Создается главный класс
         */
        $obj = new NavMenu();
        $obj->setProperty('Navbar','AmatorDed');
        $obj->setProperty('button-search',false);

        /**
         * ---------Создается простая кнопка для выпадающего меню------
         * Выпадающее меню Library PHP
         */
         /**
         * Создание объектов кнопок
         */
        $obj->setProperty('Home','Library PHP');
        $obj->setProperty('work-box',true);
        $button1 = new ElementNavBar($obj);

        $obj->setProperty('Home','NavBar');
        $obj->setProperty('link','?NavBar');
        $obj->setProperty('work-box',true);
        $button2 = new ElementNavBar($obj);
        /**
         * Загрузка кнопок в класс-контейнер
         */
        $oblBox = new BoxNavMenu($obj);
        $oblBox->addElement($button1);
        $oblBox->addElement($button2);

        /**
         * --------------------Создание меню patterns-----------
         */
        /**
         * Создание объектов кнопок
         */
        $obj->setProperty('Home','Patterns');
        $obj->setProperty('work-box',true);
        $patterns1 = new ElementNavBar($obj);

        $obj->setProperty('Home','Simple Factory');
        $obj->setProperty('link','?patternSipmpleFactory');
        $obj->setProperty('work-box',true);
        $patterns2 = new ElementNavBar($obj);
        /**
         * Загрузка кнопок в класс-контейнер
         */
        $pattersObj = new BoxNavMenu($obj);
        $pattersObj->addElement($patterns1);
        $pattersObj->addElement($patterns2);



        /**
         * Поместить объекты в главный объект
         */
        $obj->addElement($pattersObj);
        $obj->addElement($oblBox);
        

        /**
         * Вывести меню на страницу
         */
        $obj->writeElement($obj);
    }
}
