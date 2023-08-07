<?php
namespace class\nonBD\navBootstrap;

/**
 * Класс является фасадом при создании меню навигационного 
 * и может быть использован как образец для создания других меню.
 * Класс Фасад для проекта AmatorDed, для других проектов нужен
 * другой Фасад
 * Класс, непосредственно создающий меню построен по принципу Composite
 * то есть состоит из простых объектов-Листочков и сложных объектов-контейнеров,
 * которые в свою очередь состоят из листочком и инфраструктуры, по манипуляции
 * с этими листочками.
 */

class NavBarFacade
{
    public static function createNavBar()
    {

        ////////////////////////////////////////////////////
        /**
         * Создается главный класс
         */
        $obj = new NavMenu();
        $obj->setProperty('Navbar','AmatorDed');
        $obj->setProperty('button-search',false);
        $obj->setProperty('bg-light','blue-light');
        /////////////////////////////////////////////////////

        /**
         * Создается простой объект для одиночной кнопки 
         * Домой или переход на страницу без параметров GET
         * Так создается "Листочек", простой объект-кнопка.
         * Так как имя этой кнопки совпадает с именем по умолчанию,
         * то в первом методе нет смысла и поэтому он закомментирован.
         * Если необходимо создать другую одиночную кнопку, то данный
         * метод необходимо применить. $obj->setProperty('Home','Новое имя кнопки');
         * Все свойства берутся из главного объекта, в котором они соответственно
         * хранятся, поэтому в конструктор передается ссылка на главный объект.
         * $home = new ElementNavBar($obj - это главный объект, 
         *                                  по совместительству контейнер свойств);
         * Свойство link попадает в URL тега <a href=link>Home</a>из которого и сделаны кнопки.
         * В данном случае передается ссылка на текущую страницу с пустыми GET параметрами.
         * Внимание!! Все параметры необходимо изменить до создания объекта.
         */
        //$obj->setProperty('Home','Home');
        $obj->setProperty('link','?');
        $home = new ElementNavBar($obj);
        ////////////////////////////////////////////////////

         /**
         * Выпадающее меню Library PHP
         * Создание объектов кнопок
         */
        /**
         * Здесь создается выпадающее меню с названием Library PHP. 
         * Поэтому есть соответствующая строка: $obj->setProperty('Home','Library PHP');
         * Данная кнопка - объект, будет работать в выпадающем меню, то есть в другом
         * объекте. Поэтому есть строка: $obj->setProperty('work-box',true);
         * Оба параметра изменяются в главном классе, после этого, создается кнопка 
         * и в конструктор, при этом, передается ссылка на главный класс именно для того, 
         * чтобы конструктор подтянул нужные ему свойства для создания кнопки.
         * Так как первая кнопка не нуждается в передаче GET параметра, он не указан.
         */
        $obj->setProperty('Home','Library PHP');
        $obj->setProperty('work-box',true);
        $button1 = new ElementNavBar($obj);
        /**
         * Здесь создается вторая кнопка аналогично первой, только добавлено изменение
         * свойства link, так как по бизнес-логике данная кнопка должна в строку адреса
         * добавлять параметр для GET массива.
         */
        $obj->setProperty('Home','NavBar');
        $obj->setProperty('link','?NavBar');
        $obj->setProperty('work-box',true);
        $button2 = new ElementNavBar($obj);
        /**
         * Загрузка кнопок в класс-контейнер
         * После того, как все кнопки для определенного контейнера-выпадающего меню, 
         * были созданы, их можно загрузить в свой контейнер. 
         * Для создания объекта-контейнера так-же нужно в конструкторе указать ссылку
         * на главный объект.
         * После создания объекта-контейнера: $oblBox = new BoxNavMenu($obj);
         * его можно начать заполнять кнопками-объектами "листочками" $oblBox->addElement($button1);
         */
        $oblBox = new BoxNavMenu($obj);
        $oblBox->addElement($button1);
        $oblBox->addElement($button2);
        /////////////////////////////////////////////////////////

        /**
         * Выпадающее меню Pattern
         * Создание объектов кнопок
         * Правила создания объектов простых и контейнера описаны 
         * вверху. 
         */
        /**
         * Creational patterns
         */
        $obj->setProperty('Home','Patterns');
        $obj->setProperty('work-box',true);
        $patterns1 = new ElementNavBar($obj);

        $obj->setProperty('Home','Simple Factory');
        $obj->setProperty('link','?patternSipmpleFactory');
        $obj->setProperty('work-box',true);
        $patterns2 = new ElementNavBar($obj);

        $obj->setProperty('Home','Factory Method');
        $obj->setProperty('link','?patternFactoryMethod');
        $obj->setProperty('work-box',true);
        $patterns3 = new ElementNavBar($obj);

        $obj->setProperty('Home','Abstract Factory');
        $obj->setProperty('link','?patternAbstractFactory');
        $obj->setProperty('work-box',true);
        $patterns4 = new ElementNavBar($obj);

        $obj->setProperty('Home','Singleton');
        $obj->setProperty('link','?patternSingleton');
        $obj->setProperty('work-box',true);
        $patterns5 = new ElementNavBar($obj);

        $obj->setProperty('Home','Service Locator');
        $obj->setProperty('link','?patternServiceLocator');
        $obj->setProperty('work-box',true);
        $patterns6 = new ElementNavBar($obj);

        $obj->setProperty('Home','Dependency Injection');
        $obj->setProperty('link','?patternDependencyInjection');
        $obj->setProperty('work-box',true);
        $patterns7 = new ElementNavBar($obj);

        /**
        * Здесь совершенно не важны все параметра,
        * так как при создании объекта второй параметр true
        * означает, что объект будет разделительной чертой
        */
        $obj->setProperty('Home','Composite');
        $obj->setProperty('link','?patternComposite');
        $obj->setProperty('work-box',true);
        $patterns8 = new ElementNavBar($obj,true);

        /**
         * Structural patterns
         */
        $obj->setProperty('Home','Composite');
        $obj->setProperty('link','?patternAbstractComposite');
        $obj->setProperty('work-box',true);
        $patterns9 = new ElementNavBar($obj);

        /**
        * Здесь совершенно не важны все параметра,
        * так как при создании объекта второй параметр true
        * означает, что объект будет разделительной чертой
        */
        $obj->setProperty('Home','Add Content');
        $obj->setProperty('link','?addcontent');
        $obj->setProperty('work-box',true);
        $patterns10 = new ElementNavBar($obj,true);

        $obj->setProperty('Home','Add Content');
        $obj->setProperty('link','?addcontent');
        $obj->setProperty('work-box',true);
        $patterns11 = new ElementNavBar($obj);

        /**
         * Загрузка кнопок в класс-контейнер
         */
        $pattersObj = new BoxNavMenu($obj);
        $pattersObj->addElement($patterns1);
        $pattersObj->addElement($patterns2);
        $pattersObj->addElement($patterns3);
        $pattersObj->addElement($patterns4);
        $pattersObj->addElement($patterns5);
        $pattersObj->addElement($patterns6);
        $pattersObj->addElement($patterns7);
        $pattersObj->addElement($patterns8);
        $pattersObj->addElement($patterns9);
        $pattersObj->addElement($patterns10);
        $pattersObj->addElement($patterns11);
        ////////////////////////////////////////////

        /**
         * Добавляем новую кнопку входа на сайт
         */
        if ($_SESSION['statusAD']==0) {
            $obj->setProperty('Home','Sign in');
            $obj->setProperty('link','?signin');
        } else {
            $obj->setProperty('Home','Sign out');
            $obj->setProperty('link','?signout');
        }
        $signIn = new ElementNavBar($obj);

        /**
         * Поместить объекты в главный объект
         * После того, как все элементы, как простые-Листочки, так и сложные-контейнеры
         * созданы, их необходимо загрузить в главный объект.
         * $obj->addElement($home - простой или сложный объект);
         */
        $obj->addElement($home);
        $obj->addElement($pattersObj);
        $obj->addElement($oblBox);
        $obj->addElement($signIn);

        /**
         * Вывести меню на страницу
         * Данный метод компонует навигационное меню используя методы,
         * которые есть в переданных ранее объектах.
         */
        $obj->writeElement($obj);
    }
}
