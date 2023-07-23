<?php
namespace class\nonBD\navBootstrap;

/**
 * первый абстрактный класс паттерна Composite
 * сигнатура предназначена для простых и сложных классов
 * в обоих классах будет свойство nameButton, оно содержит
 * имя пункта меню.
 * В простых объектах данное свойство будет отвечать за 
 * название одиночной кнопки, в сложных объектах - это свойство
 * является массивом и содержит имена разворачивающегося пункта
 * Метод getNameButton() возвращает переменную в простых классах,
 * или ссылку на массив в сложных классах.
 */

abstract class INavMenu
{
    private $nameButton;

    /**
     * Данные свойства - это в основном классы стилизации навмгационного меню от бутстрапа
     * Свойствам заданы значения по умолчанию, которые доступны для потомков
     * Если будут изменения данных свойств, то они будут делаться через
     * контейнер свойств Синглтон.
     */
    private $navbar='navbar';
    private $navbarExpandLg='navbar-expand-lg';
    private $navbarLight='navbar-light';
    private $bgLight='bg-light';
    private $containerFluid='container-fluid';
    private $navbarBrand='navbar-brand';
    private $navbarBrandHref='#';
    private $navbarBrandName='Navbar';
    private $navbarToggler='navbar-toggler';
    private $navbarTogglerIcon='navbar-toggler-icon';
    private $navbarTogglerIconSpan='';
    private $collapse='collapse';
    private $navbarCollapse='navbar-collapse';
    private $navbarNav='navbar-nav';
    private $meAuto='me-auto';
    private $mb2='mb-2';
    private $mbLg0='mb-lg-0';
    private $navItem='nav-item';
    private $navLink='nav-link';
    private $active='active';
    private $dropdown='dropdown';
    private $dropdownToggle='dropdown-toggle';
    private $dropdownMenu='dropdown-menu';
    private $dropdownDivider='dropdown-divider';
    private $dFlex='d-flex';
    private $formControl='form-control';
    private $me2='me-2';
    private $btn='btn';
    private $btnOutlineSuccess='btn-outline-success';

    /**
     * свойство определяет ставить ли из бутстрапа поле поиска и кнопку Search
     * по умолчанию ставить.
     */
    private $buttonSearch=true;

    public function setProperty($nameProperty, $dataProperty)
    {
        $this->$nameProperty = $dataProperty;
    }

    protected function getProperty($name)
    {
        return $this->$name;
    }


    // abstract public function getNameButton();

}
