<?php
namespace class\nonBD\navBootstrap;

/**
 * второй абстрактный класс паттерна Composite
 * сигнатура предназначена для сложных классов
 * только в сложныз классах будет свойство-свойство nameButton, 
 * оно содержит имена пункта меню.
 * в сложных объектах - это свойство
 * является массивом и содержит имена разворачивающегося пункта
 * Метод addElement() добавляет переменную в массив сложного класса,
 * 
 */

abstract class INavMenuDiff extends INavMenu
{
    abstract public function addElement(INavMenu $element);

    abstract public function renameElement(INavMenu $element);
}
