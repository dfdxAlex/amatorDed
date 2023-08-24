<?php
namespace src\lib\php\content\pattern\extension;

class NewsPatternTwo
{
    public function __construct($obj, $translate)
    {
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

      $obj->addGet('patternServiceLocator');
      $obj->addLinkGitHub('https://github.com/dfdxAlex/pattern/tree/main/PHP/CreationalPatterns/ServiceLocator');
      $obj->addLink('<iframe width="560" height="315" src="https://www.youtube.com/embed/UUt7hEcsJlw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>');
      $name = "<span>Service Locator</span>";
      $data = $translate->translator('Шаблон Service Locator является неким менеджером объектов. Представим ситуацию, когда клиенту – объекту, нужен другой объект. Можно создать этот объект на месте, указав к нему путь, а можно попросить этот объект у менеджера объектов. Во втором варианте клиенту совершенно не важно, откуда менеджер объектов возьмёт этот объект. К примеру менеджер объектов может создать этот объект в момент запроса, или создать его ранее, запомнив на него ссылку. Менеджер объектов может получать ссылки на уже созданные объекты с помощью своих или чужих методов добавления данных. Каким способом ссылка на объект попадёт в базу к менеджеру не важно, важно, что менеджер может отдать клиенту объект и клиенту не важно, откуда менеджер объектов возьмёт данный объект. Вот такой интересный шаблон, который некоторые считают плохим шаблоном.');
      $obj->addNews("$name <p>$data</p>");

      $obj->addGet('patternDependencyInjection');
      $obj->addLinkGitHub('https://github.com/dfdxAlex/pattern/tree/main/PHP/CreationalPatterns/DependencyInjection');
      $obj->addLink('<iframe width="560" height="315" src="https://www.youtube.com/embed/FJt9qmziIHI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>');
      $name = "<span>Dependency Injection</span>";
      $data = $translate->translator('Данный шаблон определяет способ передачи объекту зависимостей. Если вернуться к нормальному языку, то зависимость – это другой объект. То есть, если говорим, что некоему объекту передаем зависимость – это означает, что передаем ему ссылку на другой объект. Так как после этого, первый объект становится зависимым от второго, то и происходит передача зависимости. Программисты любят усложнять простые вещи. Ну а данный шаблон как раз и означает, что в некий объект будет передан другой объект. Зависимость лучше просматривается на уровне классов, когда один класс использует ресурсы другого, то он от него зависит.');
      $obj->addNews("$name <p>$data</p>");

      $obj->addGet('patternAbstractComposite');
      $obj->addLinkGitHub('https://github.com/dfdxAlex/pattern/tree/main/PHP/Structure/Composite');
      $obj->addLink('<iframe width="560" height="315" src="https://www.youtube.com/embed/QxaXCPdkWcM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>');
      $name = "<span>Composite</span>";
      $data = $translate->translator('Очень интересное решение. Применяется тогда, когда некий объект может или должен состоять из других, простых объектов. На пример навигационное меню этого сайта создано по шаблону Composite. Простые кнопки, на пример кнопка Home – это простой объект. Выпадающее меню, коим является меню Patterns – это сложный объект, который состоит, из простых объектов, таких как кнопка Home. Простые объекты – кнопки и составные объекты - выпадающие меню, имеют общий интерфейс. Для использования системы этих объектов используется третий класс - контейнер, который принимает к себе эти объекты и запускает их главный метод, решающий определенную задачу. ');
      $data2 = $translate->translator('Подводя итог, шаблон Composite – это на выходе объект, который может принимать в себя простые или сложные объекты и запускать некий их метод, который задан в интерфейсах. Описание упрощенное, подробнее с примером информация в ролике.');
      $data3 = "$name <p>$data</p> <p>$data2</p>";
      $obj->addNews($data3);

      $obj->addGet('propertycontainer');
      $obj->addLinkGitHub('https://github.com/dfdxAlex/pattern/tree/main/PHP/CreationalPatterns/PropertyContainer');
      $obj->addLink('<iframe width="560" height="315" src="https://www.youtube.com/embed/POHjZvWJAts?si=E5q6dGnCsnqYC6DM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>');
      $name = "<span>Property Container</span>";
      $data = $translate->translator('В статье рассмотрим паттерн проектирования Property Container. Суть паттерна в том, что создается дополнительный класс-контейнер, который в себе будет хранить массив ассоциативный. Элементы ассоциативного массива используются как свойства. Методы записи и чтения свойств настроены таким образом, что совершенно не понятно записывается свойство в отдельную переменную, либо в ячейку массива. Данный паттерн может использоваться как с самого начала проектирования класса, так и добавлен при расширении класса. Подробнее информация выложена в видео.');
      $data3 = "$name <p>$data</p>";
      $obj->addNews($data3);
    }
}
