<?php
namespace class\nonBD\navBootstrap;
// class\nonBD\navBootstrap\NavBarFacade::createNavBar();
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
         * Создается простая кнопка
         */


        /**
         * Создается простая кнопка для выпадающего меню
         */
        $obj->setProperty('Home','Library PHP');
        $obj->setProperty('work-box',true);
        $button1 = new ElementNavBar($obj);

        $obj->setProperty('Home','NavBar');
        $obj->setProperty('link','?NavBar');
        $obj->setProperty('work-box',true);
        $button2 = new ElementNavBar($obj);


        /**
         * создать объект контейнер для выпадающего меню
         */
        $oblBox = new BoxNavMenu($obj);
        $oblBox->addElement($button1);
        $oblBox->addElement($button2);

        $obj->addElement($oblBox);

        $obj->writeElement($obj);
    }
}
