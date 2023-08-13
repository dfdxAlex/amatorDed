<?php
namespace src\lib\php\content;

/**
 * Фасад для класса NewsPattern
 * Внимание, данный класс занимается заполнением объекта $obj = new pattern\NewsPattern();
 * а в конце метода заполнения, запускается метод $obj->news();, который и выводит 
 * нужную информацию на страницу.
 * 
 * в классе наполняется меню работы с паттернами контентом.
 * Методом addGet() добавляется информация о том, на какой Get запрос будет реагировать
 * данный контент, или, когда он будет появляться.
 * Метод addLinkGitHub() добавляет ссылку на Гитхаб
 * Метод >addLink() добавляет ссылку на видеоролик, полученную с помощью
 * кнопки "Поделиться", на ютуб канале
 * Метод addNews() вставляет текстовый контент.
 * 
 * Чтобы стилизовать заголовок статьи, необходимо его заключить
 * в теги span
 * Чтобы стилизовать основной текст, его необходимо поместить
 * в теги <p>
 */

class FacadeContentPattern
{
    static public function factoryContentPattern()
    {
        $obj = new pattern\NewsPattern();

        /**
         * Получить объект - переводчик из контейнера объектов
         */
        $translate = \src\lib\php\ContainerObject::getInstance()->getProperty('TranslateFacade');
        /**
         * если объекта нет в контейнере, то создать его
         */
        // if (!$translate) {
        //     $translate = new \class\translate\DelegatorLang();
        //     //$obj->setRedactorLang(true);
        //     $this->in->control();
        //     //$obj->echoDataMas(); //посмотреть или отредактировать базу переводов
        //     Для использования сервиса запустить метод:
        //     $translate->translator('На главную')
        // }

        $obj->addGet('patternFactoryMethod');
        $obj->addLinkGitHub('https://github.com/dfdxAlex/pattern/tree/main/PHP/CreationalPatterns/FactoryMethod');
        $obj->addLink('<iframe width="560" height="315" src="https://www.youtube.com/embed/KrXFk6KwGv8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>');
        $obj->addNews("
            <span>Factory Methode</span><p>
            This pattern allows you to create different implementations of the same interface. That is
             if you have an interface or an abstract class with some speedTest() method, then
             using this template, you can inherit the interface by several descendants and
             create, respectively, several implementations of the object. See the video for more details.<br><br>
            </p><p>
            Этот паттерн позволяет создавать различные реализации одного интерфейса. То есть
            если у Вас есть интерфейс или абстрактный класс с неким методом speedTest(), то 
            используя данный шаблон можно отнаследовать интерфейс несколькими потомками и 
            создать соответственно несколько реализаций объекта. Подробнее смотрите в видео.
            </p>");

        $obj->addGet('patternSipmpleFactory');
        $obj->addLinkGitHub('https://github.com/dfdxAlex/pattern/tree/main/PHP/CreationalPatterns/SimpleFactory');
        $obj->addLink('<iframe width="560" height="315" src="https://www.youtube.com/embed/A-V_uAMFDsk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>');
        $obj->addNews("
            <span>Symple Factory</span>
            <p>
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
            </p><p>
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
       </p>");

       $obj->addGet('patternAbstractFactory');
       $obj->addLinkGitHub('https://github.com/dfdxAlex/pattern/tree/main/PHP/CreationalPatterns/AbstractFactory');
       $obj->addLink('<iframe width="560" height="315" src="https://www.youtube.com/embed/sZt84zG8ILU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>');
       $obj->addNews("
           <span>Abstract Factory</span>
           <p>
           The Abstract Factory template is designed to create 
           a group of similar objects. For example, if a customer 
           selects furniture and checks the Scandinavian type, 
           then all objects must be created in the Scandinavian type. 
           The object names are preserved, but their properties and 
           appearance are changed.
           <br><br>
           </p><p>
           Шаблон Абстрактная Фабрика предназначен для создания 
           группы похожих объектов. На пример, если клиент выбирает 
           мебель и ставит галочку против скандинавского типа,
           то все объекты должны будут быть созданы скандинавского 
           типа. Имена объектов сохраняются, а их свойства и вид 
           меняются.
      </p>");

      /**
       * Дальше контент стал добавляться с использованием системы 
       * перевода на разные языки
       */
      $obj->addGet('patternSingleton');
      $obj->addLinkGitHub('https://github.com/dfdxAlex/pattern/tree/main/PHP/CreationalPatterns/Singleton');
      $obj->addLink('<iframe width="560" height="315" src="https://www.youtube.com/embed/Zq0f8lsDuF8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>');
      $name = "<span>Singleton</span>";
      $data = $translate->translator('Шаблон Singleton – или одиночка. Суть этого шаблона или решения в том, чтобы создать некий объект только один раз. Реализуется это с помощью создания объекта не оператором new, а с помощью статического метода, который конечно использует new, но внутри класса. Сам метод при первом создании объекта помещает ссылку на него в статическое свойство нового объекта и при повторном обращении к методу, создающему объект, он, метод, возвращает ссылку на созданный ранее объект. Все другие способы создания объекта заблокированы.');
      $obj->addNews("$name <p>$data</p>");


        /**
         * Здесь появится новый код. В коде будет новый объект
         * который подтянет из базы данных информацию и добавит
         * её в объект для вывода так-же, как и выше код это 
         * делает. Отличие в том, что выше код вводит 
         * информацию непосредственно в коде класса, а новый код
         * подтянет информацию из базы данных.
         */
        /**
         * Создается подключение к базе данных
         */
        $objContentPattern = new \src\lib\php\db\Db;
        /**
         * Запуск метода, который прочитает информацию из базы данных
         * и поместит ей в нужный массив класса NewsPattern()
         */
        // $objContentPattern->infoTab('bd2');
        /**
         * Создание объекта, который ответственнен за запись нового
         * контента в базу данных
         */
        $addContent = new pattern\AddContentForPattern();
        /**
         * конец нового кода, он работал используя принцип делегирования
         */

        $obj->news();
    }
}
