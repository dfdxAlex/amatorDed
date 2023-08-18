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
         * В данном методе создается объект pattern\NewsPattern();
         * и наполняется контентом. Воспроизводится контент в другом
         * месте, для этого его и нужно зарегистрировать в котейнере
         * объектов.
         */
        \src\lib\php\ContainerObject::getInstance()->setProperty('NewsPattern',$obj);

        /**
         * Получить объект - переводчик из контейнера объектов
         */
        $translate = \src\lib\php\ContainerObject::getInstance()->getProperty('TranslateFacade');

        /**
         * Данному объекту делегировано заполнение массива класса
         * NewsPattern информацией по первому варианту. То есть 
         * без перевода, только два вариата текста. Поэтому в 
         * объект передается только ссылка на объект NewsPattern
         */
        new \src\lib\php\content\pattern\extension\NewsPatternOne($obj);
      
       /**
       * Дальше контент стал добавляться с использованием системы 
       * перевода на разные языки. 
       * Данный функционал перенесен в отдельный класс NewsPatternTwo.
       * Дальнейшее добавление контента в раздел Шаблонов проектирования
       * следует делать в том классе.
       */
        new \src\lib\php\content\pattern\extension\NewsPatternTwo($obj, $translate);

      /**
       * Здесь создается статья для первой части по работе с 
       * навигационным меню.
       */
      $obj->addGet('NavBar');
      $obj->addLinkGitHub('https://github.com/dfdxAlex/amatorDed/tree/main/modules/class/nonBD/navBootstrap');
      $obj->addLink('<iframe width="560" height="315" src="https://www.youtube.com/embed/bjDDQvG-1LQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>');
      $head = $translate->translator('Правила использования меню NavBar');
      $name = "<span>$head</span>";
      $data = $translate->translator('В статье покажу как можно использовать меню от Bootstrap 5.x в PHP программе. Первое, что следует сделать – это получить данный проект. Скачать или посмотреть на него можно на гитхабе, ссылка на гитхаб внизу страницы.');
      $data2 = $translate->translator('После скачивания или копирования проект нужно присоединить к своему сайту. Это можно сделать разными способами. Проект располагается в пространстве имён согласно стандарту PSR, поэтому, если у Вас есть автозагрузчик по этому стандарту, останется только разметить проект в правильную папку. Если у Вас нет автозагрузчика, то можно все файлы подключить отдельно командами include или requery. Ещё есть проще вариант – это скинуть все классы в один файл и подключить его. То есть подключить проект можно любым удобным способом.');
      $data3 = $translate->translator('Итак, проект подключен, остается разобраться как его использовать. Помним, что для работы взят пример из сайта Bootstrap 5. Разметка, которая взята за образец находится в конце файла NavMenu.php.Там же, только в начале файла располагается краткая инструкция к использованию. Информация об этом важна, так как эта разметка зашита в класс по умолчанию.');
      $data4 = $translate->translator('Один вопрос разобрали. Дальше следует обратить внимание на class NavBarFacade – это шаблон Facade, то есть отдельный класс, упрощающий работу с данной системой или любой другой сложной системой. Этот класс используется на этом сайте, но в папке основной библиотеки он остался исключительно ради примера, по нему и будем рассматривать систему. При той организации, что есть в текущем Фасаде, для того, чтобы меню заработало необходимо просто создать объект в нужном файле. В случае с автозагрузчиком по PSR это выглядит так:');
      $data45 = 'class\nonBD\navBootstrap\NavBarFacade::createNavBar();';
      $data5 = $translate->translator('Далее переходим в статический метод <b>NavBarFacade::createNavBar()</b>. В зависимости от времени и дальнейших модификаций, код может отличаться. С помощью Фасада в навигационное меню встроен переводчик, что будет встроено туда ещё, на момент прочтения статьи, не знаю, может ничего, а может и многое, поэтому рассматриваем навигационное меню по командам, а не по номерам строк или порядку. На этом заканчиваю лирическое отступление и перехожу к конкретике.');
      $data6 = $translate->translator('Меню создано по шаблону Composite – это означает, что будут простые объекты и сложные объекты, состоящие из простых объектов. Также будет главный класс, который выводит меню и также служит контейнером свойств. Последнюю мысль запомнить очень важно. ');
      $data7 = $translate->translator('Всё меню NavBar состоит из HTML разметки и стилевых классов от Bootstrap. Разметку менять практически не будем, хотя я внес некоторые дополнительные возможности в проект. Однако с помощью стилевых классов можно менять свойства навигационного меню. А теперь внимание!! Все стилевые классы зашиты именно в главный класс, и если их нужно поменять, то изменение свойств производится с помощью специального метода в главном классе. Поэтому главный класс следует создавать в начале.');
      $data75 = '$obj = new NavMenu();';
      $data8 = $translate->translator('После того, как был создан главный объект, можно начинать пользоваться его ресурсами. Рассмотрим метод, который позволяет изменять свойства меню. Например хотим изменить цветовую схему навигационного меню. По умолчанию цветовая схема задана такими классами: ');
      $data85 = '&lt;nav class="navbar navbar-expand-lg navbar-light bg-light"&gt;';
      $data9 = $translate->translator('Чтобы изменить цветовую схему на чёрную, следует заменить соответствующие классы на:');
      $data95 = '&lt;nav class="navbar navbar-expand-lg navbar-dark bg-dark"&gt;';
      $data10 = $translate->translator('Чтобы - это сделать необходимо вызвать метод главного объекта <br><b>$obj->setProperty("класс по умолчанию","новый класс");</b><br>Если нужно менять несколько раз одно и то же свойство, то первым параметром задается всегда значение по умолчанию, а вторым параметром идёт название нового класса. Учитывая, всё выше написанное, следует, применить два раза данный метод.');
      $data105 = '$obj->setProperty("navbar-light","navbar-dark");<br>$obj->setProperty("bg-light","bg-dark");';
      $data11 = $translate->translator('Таким образом можно заменить все CSS классы в навигационном меню. Когда все настройки закончатся, можно переходить к следующему шагу. Кстати данные настройки можно и не использовать, тогда навигационная панель сформируется такой, как она есть в примере, на странице Bootstrap. ');
      $data12 = $translate->translator('Есть несколько специальных свойств, которые управляют выводом навигационного меню. Свойство <strong>Navbar</strong> определяет, что будет выведено в заголовке навигационного меню, с левой стороны.<br> Свойство <strong>button-search</strong> определяет, будет ли выводиться меню поиска. К сожалению, на данный момент, данная кнопка и поле для ввода могут использоваться только в том виде, в котором они есть в примере. Стилевые классы можно изменять, как обычно, а функционал нужно делать средствами JS, но вполне возможно, что в следующих модах я не забуду этот недостаток исправить.<br> Следующее специальное свойство определяет значение, которое будет отправлено в качестве GET параметра в адресную строку. Свойство <strong>link</strong> задаётся таким же самым образом, как и предыдущие свойства. Задавать его необходимо перед созданием каждого объекта - кнопки.');
      $data13 = $translate->translator('Немного теории. Навигационное меню управляет контентом на странице <strong>выкидывая</strong> в адресную строку различные элементы GET массива. Задавая нужные значения для кнопок - объектов параметра <strong>link</strong>, этим параметром можно управлять.<br> Ну а далее в код вставляете проверку и <strong>вуаля</strong>.');
      $data14 = $translate->translator('Ещё одним обязательным параметром является надпись на кнопке, она задаётся установкой свойства <strong>Home</strong>.');
      $data15 = $translate->translator('Теперь, допуская, что общие стилевые свойства заданы где-то выше, подготавливаем два обязательных свойства для создания кнопки. На кнопке должно быть написано "Перейти", а в адресной строке должен появиться элемент массива $_GET["goPageOne"].');
      $data154 = $translate->translator('Перейти');
      $data155 = '$obj->setProperty("Home","'.$data154.'");';
      $data156 = '$obj->setProperty("link","?goPageOne");';
      $data157 = '$buttonPageOne = new ElementNavBar($obj);';
      $data16 = $translate->translator('Таким образом непосредственно подошли к созданию объекта кнопки, который дальше будет помещен в контейнер и выведен на страницу уже как часть целого навигационного меню.');
      
      $data3 = "$name <p>$data</p> 
                      <p>$data2</p>
                      <p>$data3</p>
                      <p>$data4</p>
                      <strong><p>$data45</p></strong>
                      <p>$data5</p>
                      <p>$data6</p>
                      <p>$data7</p>
                      <strong><p>$data75</p></strong>
                      <p>$data8</p>
                      <strong><p>$data85</p></strong>
                      <p>$data9</p>
                      <strong><p>$data95</p></strong>
                      <p>$data10</p>
                      <strong><p>$data105</p></strong>
                      <p>$data11</p>
                      <p>$data12</p>
                      <p>$data13</p>
                      <p>$data14</p>
                      <p>$data15</p>
                      <strong><p>$data155</p></strong>
                      <strong><p>$data156</p></strong>
                      <strong><p>$data157</p></strong>
                      <p>$data16</p>
                      ";
      $obj->addNews($data3);

      /**
       * Здесь создается статья для второй части по работе с 
       * навигационным меню.
       */
      $obj->addGet('NavBarTwo');
      $obj->addLinkGitHub('https://github.com/dfdxAlex/amatorDed/tree/main/modules/class/nonBD/navBootstrap');
      $obj->addLink('<iframe width="560" height="315" src="https://www.youtube.com/embed/HLlBNDgyFsA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>');
      $head = $translate->translator('Создание простой кнопки.');
      $name = "<span>$head</span>";

      $data = $translate->translator('Меню NavBar состоит из одинарных простых кнопок и выпадающих меню. В этом обзоре создадим простую кнопку. Все кнопки, как простые, так и сложные, являются объектами, поэтому, создадим объект для простой кнопки. Собственно такой объект был создан в предыдущем обзоре, но там было много другой информации.');
      $data1 = $translate->translator('Чтобы создать простую кнопку, нужно задать ей два параметра, которые нужны для дальнейшей работы системы. Необходимо задать надпись на кнопке и ссылку, которая будет установлена в тег &lt;a&gt;. Для установки любых свойств есть универсальный метод, сделаем это:');
      $data15 = '$obj->setProperty("Home","Go");';
      $data16 = '$obj->setProperty("link","?go");';
      $data2 = $translate->translator('Таким образом в главном классе созданы все параметры, для создания объекта кнопки. Остается собственно создать кнопку.');
      $data26 = '$button = new ElementNavBar($obj);';
      $data3 = $translate->translator('Итак, последняя команда создает объект простой кнопки. Ссылка на этот объект помещается в переменную. То есть всё как обычно. Рассмотрим ближе. <br> Простая кнопка создается классом <strong>ElementNavBar()</strong>, а параметры для создания кнопки находятся в главном классе, который также является и контейнером свойств. Поэтому, при создании кнопки в класс следует передавать главный объект. До момента создания объекта методы изменения свойств были использованы именно из главного класса.');
      $data4 = $translate->translator('Таким образом, для создания простой кнопки необходимо использовать три строчки кода. Согласитесь, описание заняло намного больше времени, чем фактическое использование данной информации. В следующем обзоре создадим выпадающее меню.');
      
      $data3 = "$name <p>$data</p> 
                      <p>$data1</p> 
                      <strong><p>$data15</p></strong> 
                      <strong><p>$data16</p></strong>
                      <p>$data2</p> 
                      <strong><p>$data26</p></strong>
                      <p>$data3</p> 
                      <p>$data4</p> 
                      ";
      $obj->addNews($data3);

      /**
       * Здесь создается статья для третьей части по работе с 
       * навигационным меню.
       */
      $obj->addGet('NavBarThree');
      $obj->addLinkGitHub('https://github.com/dfdxAlex/amatorDed/tree/main/modules/class/nonBD/navBootstrap');
      $obj->addLink('<iframe width="560" height="315" src="https://www.youtube.com/embed/3n1NTcJH9oc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>');
      $head = $translate->translator('Создание выпадающего меню.');
      $name = "<span>$head</span>";

      $data = $translate->translator('В этом обзоре создадим выпадающее меню. Вспоминает то, что система построена по принципу шаблона проектирования Композит. Это значит, что сложные объекты – это частично или полностью контейнер для хранения простых и сложных объектов. Разумеется контейнер не просто хранит, но и использует ресурсы тех объектов, которые в нем хранятся.');
      $data1 = $translate->translator('Итак, разобрались, выпадающее меню – это объект – контейнер, который хранит и использует ресурсы простых объектов. Подходим к тому, что выпадающее меню будет состоять из простых кнопок, которые нужно поместить в некий объект-контейнер.');
      $data2 = $translate->translator('Идём по порядку и создаем простые объекты, а простые объекты мы создавали в предыдущем обзоре. Однако есть небольшой нюанс. Кнопки самостоятельные, в меню NavBar отличаются от кнопок, которые входят в выпадающее меню. Поэтому, при создании простых кнопок-объектов следует указать специальный признак. Данный признак позволит классу ElementNavBar() сознать кнопку специально для выпадающего меню. На практике – это делается также просто, как и сама кнопка: перед созданием объекта-кнопки нужно установить ещё одно свойство. Свойство называется <strong>work-box</strong> и устанавливается всё тем же универсальным методом <strong>setProperty()</strong>.');
      
      $data24 = '$obj->setProperty("Home","Go");';
      $data25 = '$obj->setProperty("link","?go");';
      $data26 = '$obj->setProperty("work-box",true);';
      $data27 = '$button = new ElementNavBar($obj);';
      
      $data3 = $translate->translator('Таким способом следует создать столько кнопок-объектов, сколько необходимо. Естественно, число и вид кнопок можно менять в зависимости от потребности.');
      $data4 = $translate->translator('После того, как все объекты кнопки будут созданы, их следует поместить в сложный объект контейнер, для которого они создавались. Создается данный объект таким образом:');
      $data47 = '$oblBox = new BoxNavMenu($obj);';
      
      $data5 = $translate->translator('Как видите объект создается обычным способом с помощью класса <strong>BoxNavMenu()</strong>, в конструктор так же следует передать главный объект.');
      $data6 = $translate->translator('После создания объекта-контейнера следует воспользоваться его методом, для загрузки в него всех объектов-кнопок. Порядок загрузки определит порядок расположения кнопок в выпадающем меню.');
      $data67 = '$oblBox->addElement($button);';
      $data7 = $translate->translator('Аналогично загружаются все остальные кнопки в выпадающее меню. После загрузки всех кнопок в контейнер, он, контейнер, готов к загрузке в главный класс. Этим займёмся в следующем обзоре.');
      
      $data3 = "$name <p>$data</p> 
                      <p>$data1</p> 
                      <p>$data2</p> 
                      <i><p>$data24</p></i> 
                      <i><p>$data25</p></i>
                      <strong><p>$data26</p></strong>
                      <i><p>$data27</p></i>
                      <p>$data3</p> 
                      <p>$data4</p> 
                      <strong><p>$data47</p></strong>
                      <p>$data5</p> 
                      <p>$data6</p> 
                      <strong><p>$data67</p></strong>
                      <p>$data7</p> 
                      ";
      $obj->addNews($data3);

      /**
       * Здесь создается статья для четвертой части по работе с 
       * навигационным меню.
       */
      $obj->addGet('NavBarFour');
      $obj->addLinkGitHub('https://github.com/dfdxAlex/amatorDed/tree/main/modules/class/nonBD/navBootstrap');
      $obj->addLink('<iframe width="560" height="315" src="https://www.youtube.com/embed/3n1NTcJH9oc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>');
      $head = $translate->translator('Установка меню на страницу.');
      $name = "<span>$head</span>";

      $data = $translate->translator('В предыдущих обзорах разобрались с настройкой свойств кнопок, с созданием простых кнопок и выпадающих меню внутри навигационного меню NavBar. Остался последний шаг, поместить все кнопки и выпадающие меню в один контейнер и вывести его на страницу сайта. И в этом вопросе нам поможет самый первый созданный объект, тот самый, который является одновременно контейнером свойств. Пока только другие классы пользовались ресурсами основного класса, пришло время запустить и основной класс.');
      $data1 = $translate->translator('Итак, главный объект контейнер создан. У данного объекта есть свой метод <strong>addElement()</strong>. Этот контейнер отличается от рассмотренного в предыдущем обзоре контейнера. Контейнер из этого класса умеет работать как с простыми кнопками-объектами, так и с контейнерами, из которых строятся выпадающие меню. Поэтому, на данный момент все кнопки и выпадающие меню должны быть созданы, мы помещаем в этот контейнер все ранее созданные отдельные кнопки и целые контейнеры.');
      $data2 = $translate->translator('Если вспомнить предыдущие обзоры, то в первом и во втором обзорах были созданы две простые кнопка, их и добавим в главный контейнер. Только кнопка button подходит только та, что с первой статьи. Кнопка из третьей статьи не подходит, так как она была специально сделана для выпадающего меню.');
      $data23 = '$obj->addElement($button);';
      $data24 = 'obj->addElement($buttonPageOne);';
      $data3 = $translate->translator('Таким же самым образом в главный контейнер добавляется выпадающее меню, которое, в свою очередь, также является контейнером, мы его сформировали в третьем обзоре. ');
      $data33 = '$obj->addElement($oblBox);';
      $data4 = $translate->translator('Как видите выпадающее меню добавляется также как и простая кнопка. Добавлять можно в любом порядке, в зависимости от требований по проекту. ');
      $data5 = $translate->translator('После того, как в основной класс будут загружены все необходимые объекты, можно поставить меню на страницу, делается это с помощью метода:');
      $data53 = '$obj->writeElement();';
      $data6 = $translate->translator('Ну вот и всё, описания много, но по факту всё происходит весьма быстро и главное, легко данным меню манипулировать. Создавая динамически разные объекты или контейнеры объектов просто изменять внешний вид меню и его функциональность.');
      
      $data3 = "$name <p>$data</p> 
                      <p>$data1</p> 
                      <p>$data2</p> 
                      <strong><p>$data23</p></strong> 
                      <strong><p>$data24</p></strong> 
                      <p>$data3</p> 
                      <strong><p>$data33</p></strong> 
                      <p>$data4</p> 
                      <p>$data5</p> 
                      <strong><p>$data53</p></strong> 
                      <p>$data6</p> 
                      ";
      $obj->addNews($data3);

      /**
       * Функционал ниже пока не работает!!!!!!!!1
       */
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
    }
}
