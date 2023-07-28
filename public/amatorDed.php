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
    $obj->addNews('
        The pattern allows you to create objects and return them to the client.
        Depending on the conditions, the object will be returned to the client,
        created from one of the available classes.
        See the video for more details. <br><br>
        Паттерн позволяет создавать объекты и возвращать их клиенту.
        В зависимости от условий, клиенту будет возвращен объект,
        созданный по одному из имеющихся классов.
        Подробнее смотрите видео.
    ');
    $obj->news();




    /**
     * Поставить futter
     */
    new \src\lib\php\Futter();


