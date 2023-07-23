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

    abstract public function writeElement();

    /**
     * Данные свойства - это в основном классы стилизации навмгационного меню от бутстрапа
     * Свойствам заданы значения по умолчанию, которые доступны для потомков
     * Если будут изменения данных свойств, то они будут делаться через
     * контейнер свойств Синглтон.
     */
    private $navbar='navbar'; //
    private $navbarExpandLg='navbar-expand-lg';
    private $navbarLight='navbar-light';
    private $bgLight='bg-light';
    private $containerFluid='container-fluid';
    private $navbarBrand='navbar-brand';
    private $navbarBrandHref='#';//
    private $navbarBrandName='Navbar';//
    private $navbarToggler='navbar-toggler';
    private $navbarTogglerIcon='navbar-toggler-icon';
    private $navbarTogglerIconSpan=''; // span
    private $collapse='collapse'; //
    private $navbarCollapse='navbar-collapse';
    private $navbarNav='navbar-nav';
    private $meAuto='me-auto';
    private $mb2='mb-2';//
    private $mbLg0='mb-lg-0';
    private $navItem='nav-item';
    private $navLink='nav-link';
    private $active='active';//
    private $dropdown='dropdown';//
    private $dropdownToggle='dropdown-toggle';
    private $dropdownMenu='dropdown-menu';
    private $dropdownDivider='dropdown-divider';
    private $dFlex='d-flex';
    private $formControl='form-control';
    private $me2='me-2';//
    private $btn='btn';//
    private $btnOutlineSuccess='btn-outline-success';
    private $home='Home';

    /**
     * свойство определяет ставить ли из бутстрапа поле поиска и кнопку Search
     * по умолчанию ставить.
     */
    private $buttonSearch=true;

    /**
     * Свойство хранит в себе линк для очередного пункта меню
     * В конце обработки каждого пункта меню параметр должен
     * скидываться в решетку.
     */
    private $link = '#';

    public function setProperty($nameProperty, $dataProperty)
    {
        $realName = $this->valuePatternName($nameProperty);
        $this->$realName = $dataProperty;
    }

    protected function getProperty($name)
    {
        $realName = $this->valuePatternName($name);
        return $this->$realName;
    }

    /**
     * Для того, чтобы пользоваться параметрами такими, которые 
     * есть непосредственно в примере navbar, и нужна данная функция.
     * На вход функция принимает параметр, который нужно изменить 
     * в примере и преобразовывает его в имя переменной, которая и 
     * хранит в себе значение данного параметра.
     * Это относится к стилевым классам и возможности их изменения.
     */
    private function valuePatternName($name)
    {
        if ($name === 'Home') 
            return 'home';
        if ($name === '#') 
            return 'navbarBrandHref';
        if ($name === 'Navbar') 
            return 'navbarBrandName';
        if ($name === 'span') 
            return 'navbarTogglerIconSpan';

        $mas = explode('-', $name);
        $rez = $name;
        foreach ($mas as $key=>$value) {
            if ($key==0) 
                $rez=$value;
            else {
                $rez.=ucfirst($value);
            }
        }
        return $rez;
    } 
}
