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
    protected $navbar='navbar';
    protected $navbarExpandLg='navbar-expand-lg';
    protected $navbarLight='navbar-light';
    protected $bgLight='bg-light';
    protected $containerFluid='container-fluid';
    protected $navbarBrand='navbar-brand';
    protected $navbarBrandHref='#';
    protected $navbarBrandName='Navbar';
    protected $navbarToggler='navbar-toggler';
    protected $navbarTogglerIcon='navbar-toggler-icon';
    protected $navbarTogglerIconSpan='';
    protected $collapse='collapse';
    protected $navbarCollapse='navbar-collapse';
    protected $navbarNav='navbar-nav';
    protected $meAuto='me-auto';
    protected $mb2='mb-2';
    protected $mbLg0='mb-lg-0';
    protected $navItem='nav-item';
    protected $navLink='nav-link';
    protected $active='active';
    protected $dropdown='dropdown';
    protected $dropdownToggle='dropdown-toggle';
    protected $dropdownMenu='dropdown-menu';
    protected $dropdownDivider='dropdown-divider';
    protected $dFlex='d-flex';
    protected $formControl='form-control';
    protected $me2='me-2';
    protected $btn='btn';
    protected $btnOutlineSuccess='btn-outline-success';


    abstract public function getNameButton();

}
