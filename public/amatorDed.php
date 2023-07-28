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
    class\nonBD\navBootstrap\NavBarFacade::createNavBar();

    /**
     * Класс, который публикует информацию пока только о патернах
     */
    $obj = new src\lib\php\content\pattern\NewsPattern();
    $obj->addGet('patternSipmpleFactory');
    $obj->addLinkGitHub('https://github.com/dfdxAlex/pattern/tree/main/PHP/CreationalPatterns/SimpleFactory');
    $obj->addLink('<iframe width="560" height="315" src="https://www.youtube.com/embed/A-V_uAMFDsk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>');
    $obj->news();




    /**
     * Поставить futter
     */
    new \src\lib\php\Futter();


