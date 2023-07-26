<?php
    /**
     * подключить автозагрузчик классов
     */
    include_once "../src/autoloader.php";

    /**
     * Поставить header
     */
    new \src\lib\php\HeaderFacade();


   /**
    * создать объект navbar
    */
    $navbarMenuUp = new \class\nonBD\navBootstrap\NavMenu();
    $navbarMenuUp->setProperty('Navbar','MyProject');
    $navbarMenuUp->setProperty('button-Search',false);
    

    $navbarMenuUp->setProperty('Home','Кнопка 1');
    $navbarMenuUp->setProperty('link','?str1');
    $element1 = new \class\nonBD\navBootstrap\ElementNavBar($navbarMenuUp);
   
    $navbarMenuUp->setProperty('Home','Кнопка 2');
    $navbarMenuUp->setProperty('link','?str2');
    $navbarMenuUp->setProperty('work-box',true);
    $element2 = new \class\nonBD\navBootstrap\ElementNavBar($navbarMenuUp);
    
    $navbarMenuUp->setProperty('Home','Кнопка 3');
    $navbarMenuUp->setProperty('link','?str3');
    $navbarMenuUp->setProperty('work-box',true);
    $element3 = new \class\nonBD\navBootstrap\ElementNavBar($navbarMenuUp);
   
    $navbarMenuUp->setProperty('Home','Кнопка 4');
    $navbarMenuUp->setProperty('link','?str4');
    // $navbarMenuUp->setProperty('work-box',true);
    $element4 = new \class\nonBD\navBootstrap\ElementNavBar($navbarMenuUp);

    $dropdown1 = new \class\nonBD\navBootstrap\BoxNavMenu($navbarMenuUp);
    
    $dropdown1->addElement($element1);
    $dropdown1->addElement($element2);
    $dropdown1->addElement($element3);
    // $dropdown1->addElement($element4);

    $drop = new \class\nonBD\navBootstrap\BoxNavMenu($navbarMenuUp);

    $drop->addElement($element1);
    $drop->addElement($element2);
    $drop->addElement($dropdown1);

    $navbarMenuUp->addElement($element4);
    // $navbarMenuUp->addElement($element2);
    $navbarMenuUp->addElement($dropdown1);
    // $navbarMenuUp->addElement($element3);
    // $navbarMenuUp->addElement($drop);
    
    
    $navbarMenuUp->writeElement($navbarMenuUp);


    /**
     * Поставить futter
     */
    new \src\lib\php\Futter();


