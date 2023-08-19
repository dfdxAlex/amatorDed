<?php
namespace src\lib\php\content\pattern\extension;

class NewsAccordion
{
    public function __construct($obj, $translate)
    {
     /**
      * Информация по использованию системы установки и 
      * управления Accordion от Bootstrap
      */
      $obj->addGet('accordion');
      $obj->addLinkGitHub('https://github.com/dfdxAlex/amatorDed/tree/main/modules/class/nonBD/accordionBootstrap');
      $obj->addLink('<iframe width="560" height="315" src="https://www.youtube.com/embed/bjDDQvG-1LQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>');
      $head = $translate->translator('Правила использования модуля Accordion');
      $name = "<span>$head</span>";
      $data = $translate->translator('В этом обзоре рассматривается инструкция использования модуля Accordion от Bootstrap, положенного на PHP код.');
      $data2 = $translate->translator('Внизу есть ссылка на гитхаб, однако, данный модуль использует частично экосистему навигационного меню NavBar, поэтому, если данный модуль будет использоваться отдельно от всей библиотеки, то следует скопировать его вместе с папкой NavBar.');
      $data3 = $translate->translator('Модуль создан по принципам шаблона проектирования Composite, очень уж он мне понравился. Только Composite облегченный вариант, так как в Accordion отсутствуют сложные элементы, остались только простые элементы, которые загружаются в главный класс, который, в свою очередь, выводит модуль на экран.');
      $data4 = $translate->translator('Итак, поехали!');
      $data5 = $translate->translator('Система состоит из простых объектов, которые содержат в себе информацию об одном пункте. Сколько нужно пунктов, столько нужно создать объектов. После создания этих объектов – они помещаются в главный контейнер, который их объединяет и выводит на страницу.');
      $data6 = $translate->translator('За основу была взята разметка первого примера со страницы Bootstrap 5. Все стилевые классы зашиты в конкретном элементе, если необходимо что-то изменить, то изменяется это с помощью метода <strong>setProperty()</strong>.');
      $data7 = $translate->translator('В этом есть небольшое отличие от организации экосистемы NavBar. Если там свойства хранились в главном контейнере и изменялись методами главного контейнера, то здесь система более гибкая, методы меняют свойства самого элемента. Поэтому изменять эти свойства можно после создания объекта в любой момент времени. В NavBar все свойства кнопки закладываются до её создания и их нельзя изменить.');
      $data8 = $translate->translator('<strong>Шаг первый</strong>. Создаем объект пункта Accordion.');
      $data85 = '$dialog1 = new \class\nonBD\accordionBootstrap\PunktAccordion();';
      $data9 = $translate->translator('Если необходимо изменить стилевые классы, то после создания объекта вызываем его метод <strong>setProperty()</strong> и меняются по схеме от NavBar, указывается два параметра, первый – это класс по умолчанию, второй – это новый класс, на замену старому классу. Кроме стилевых классов есть значения, которые следует заполнить для создания пункта accordion – это надпись на кнопке и текст в выпадающей части. Для этих целей используются два свойства: button и mesages соответственно.');
      $data95 = '$dialog1->setProperty("button","'.$translate->translator('Заголовок пробный').'");';
      $data96 = '$dialog1->setProperty("mesages","'.$translate->translator('Текст пробного заголовка').'");';
      $data10 = $translate->translator('Вот и всё, пункт создан, остается создать необходимое число пунктов-объектов и загрузить их в главный контейнер. ');
      $data11 = $translate->translator('Но вернёмся к главному контейнеру, у него есть своё стилевое свойство, которое определяет режим работы модуля accordion – это первый стиль в примере, если его нужно изменить, то делается это с помощью стандартного метода, но метод запускается от контейнера, не от конкретного элемента.');
      $data115 = '$dialog = new AccordionContainer();';
      $data116 = '$dialog->setProperty("accordion","accordion accordion-flush");';
      $data12 = $translate->translator('Теперь остается загрузить созданные ранее пункты-объекты в контейнер.');
      $data125 = '$dialog->addElement(dialog1);';
      $data13 = $translate->translator('Всё готово, для установки accordion необходимо запустить метод контейнера:');
      $data135 = '$dialog->writeElement();';
      $data14 = $translate->translator('Напоследок рассмотрим ещё один режим работы аккордеона – это когда открытие нового пункта не закрывает старые пункты. Чтобы запустить этот режим, при создании отдельных пунктов нужно устанавливать специальный флаг в false.');
      $data155 = '$dialog1->setProperty("data-bs-parent",false);';
      $data15 = $translate->translator('Вот и всё. В ролике будет показано на сколько быстро и просто создается Accordion.');
      
      $data3 = "
               $name
               <p>$data</p>
               <p>$data2</p>
               <p>$data3</p>
               <h2><p>$data4</p></h2>
               <p>$data5</p>
               <p>$data6</p>
               <p>$data7</p>
               <p>$data8</p>
               <strong><p>$data85</p></strong>
               <p>$data9</p>
               <strong><p>$data95</p></strong>
               <strong><p>$data96</p></strong>
               <p>$data10</p>
               <p>$data11</p>
               <p>$data12</p>
               <strong><p>$data125</p></strong>
               <p>$data13</p>
               <strong><p>$data135</p></strong>
               <p>$data14</p>
               <strong><p>$data145</p></strong>
               <p>$data15</p>
      ";

      $obj->addNews($data3);
    }
}
