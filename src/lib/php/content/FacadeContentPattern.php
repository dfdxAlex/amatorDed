<?php
namespace src\lib\php\content;

class FacadeContentPattern
{
    static public function factoryContentPattern()
    {
        $obj = new pattern\NewsPattern();

        $obj->addGet('patternSipmpleFactory');
        $obj->addLinkGitHub('https://github.com/dfdxAlex/pattern/tree/main/PHP/CreationalPatterns/SimpleFactory');
        $obj->addLink('<iframe width="560" height="315" src="https://www.youtube.com/embed/A-V_uAMFDsk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>');
        $obj->addNews("
            <h1>Symple Factory</h1>
            The pattern allows you to create objects and return them to the client.
            Depending on the conditions, the object will be returned to the client,
            created from one of the available classes.
            See the video for more details.
            Let's say there are several classes, but depending on the specific
            conditions, you need to choose from which class the object should be created. This
            and the factory of objects is engaged. Conditions are checked inside the factory
            and the desired object is created. After creating an object, a reference to it
            is returned to the client and the client uses the object. If all classes
            under a common interface, then the client does not need to know which
            class created an object, the client simply uses the necessary resources of the object. <br><br>
            Паттерн позволяет создавать объекты и возвращать их клиенту.
            В зависимости от условий, клиенту будет возвращен объект,
            созданный по одному из имеющихся классов.
            Подробнее смотрите видео.
            Допустим, есть несколько классов, но в зависимости от конкретных
            условий нужно выбрать из какого класса следует создать объект. Этим
            и занимается фабрика объектов. Внутри фабрики проверяются условия
            и создается нужный объект. После создания объекта, ссылка на него
            возвращается клиенту и клиент пользуется объектом. Если все классы
            под общим интерфейсом, то клиенту вообще нет надобности знать по какому
            классу создан объект, клиент просто использует нужные ресурсы объекта.
       ");

        $obj->news();
    }
}
