<?php
namespace src\lib\php\content;

use \src\lib\php\content\pattern\NewsPattern;
use \src\lib\php\ContainerObject;
use \src\lib\php\content\pattern\extension\NewsPatternOne;
use \src\lib\php\content\pattern\extension\NewsPatternTwo;
use \src\lib\php\content\pattern\extension\NewsPatternThree;
use \src\lib\php\content\pattern\extension\NewsAccordion;

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
    static public function factoryContentForPattern()
    {
        $obj = new NewsPattern();

        /**
         * В данном методе создается объект NewsPattern();
         * и наполняется контентом. Воспроизводится контент в другом
         * месте, для этого его и нужно зарегистрировать в котейнере
         * объектов.
         */
        ContainerObject::getInstance()->setProperty('NewsPattern',$obj);

        if (isset($_GET['survive'])) return;

        /**
         * Получить объект - переводчик из контейнера объектов
         */
        $translate = ContainerObject::getInstance()
                                    ->getProperty('TranslateFacade');

        /**
         * Данному объекту делегировано заполнение массива класса
         * NewsPattern информацией по первому варианту. То есть 
         * без перевода, только два вариата текста. Поэтому в 
         * объект передается только ссылка на объект NewsPattern
         */
        new NewsPatternOne($obj);
      
       /**
       * Дальше контент стал добавляться с использованием системы 
       * перевода на разные языки. 
       * Данный функционал перенесен в отдельный класс NewsPatternTwo.
       * Дальнейшее добавление контента в раздел Шаблонов проектирования
       * следует делать в том классе.
       */
        new NewsPatternTwo($obj, $translate);

       /**
       * Здесь создается статья для первой части по работе с 
       * навигационным меню.
       * Данный функционал перенесен в отдельный класс NewsPatternTwo.
       * Дальнейшее добавление контента в раздел Шаблонов проектирования
       * следует делать в том классе.
       */
        new NewsPatternThree($obj, $translate);
      
      /**
       * Здесь создается статья для первой части по работе с 
       * Аккордионом от Бутстрапа.
       * Данный функционал перенесен в отдельный класс NewsAccordion.
       * Дальнейшее добавление контента в раздел Шаблонов проектирования
       * следует делать в том классе.
       */
        new NewsAccordion($obj, $translate);
      

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
        //$objContentPattern = new \src\lib\php\db\Db;
        /**
         * Запуск метода, который прочитает информацию из базы данных
         * и поместит ей в нужный массив класса NewsPattern()
         */
        // $objContentPattern->infoTab('bd2');
        /**
         * Создание объекта, который ответственнен за запись нового
         * контента в базу данных
         */
        //$addContent = new pattern\AddContentForPattern();
        /**
         * конец нового кода, он работал используя принцип делегирования
         */
    }
}
