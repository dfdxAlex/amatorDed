<?php
namespace class\nonBD\navBootstrap;

/**
 * класс должен нарисовать меню из разных объектов
 * реализовать шаблон Composite
 */

class NavMenu extends INavMenuDiff
{
    private $masObject = [];

    public function writeElement()
    {
        /**
         * функция выводит первую часть навбара, которая постоянна по разметке.
         * в первой части изменяются только css классы и они есть по умолчанию
         * в суперклассе INavMenu, там же есть два метода get и set свойств
         */
        $this->firstLevel();  
                
                /**
                 * Перебираем массив всех объектов и запускаем 
                 * метод каждого из них.
                 * Метод writeElement() рисует либо простую кнопку
                 * либо выпадающее меню
                 */
                foreach ($this->masObject as $value) {
                    $value->writeElement();
                }

                /**
                 * Конец формирования списка меню
                 */
                echo '</ul>';

                /**
                 * Функция выводит внопку Search и поле для ввода поиска, если свойство
                 * $buttonSearch = true, по умолчанию свойство равно true и устанавливается
                 * в абстрактном супер-классе
                 */
                if ($this->getProperty('buttonSearch'))
                    $this->lastLevel();
                
                /**
                 * Закрывание формирования всего меню
                 */
                echo '</div></div></nav>';

    }

    function firstLevel()
    {
        echo '
        <nav class="'.$this->getProperty('navbar').' '.
          $this->getProperty('navbarExpandLg').' '.
          $this->getProperty('navbarLight').' '.
          $this->getProperty('bgLight').'">
          <div class="'.
            $this->getProperty('containerFluid').'">
            <a class="'.
              $this->getProperty('navbarBrand').'" href="'.
              $this->getProperty('navbarBrandHref').'">'.
              $this->getProperty('navbarBrandName').'</a>
            <button class="'.
              $this->getProperty('navbarToggler').'" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="'.
              $this->getProperty('navbarTogglerIcon').'"></span>
            </button>

            <div class="'.
              $this->getProperty('collapse').' '.
              $this->getProperty('navbarCollapse').'" id="navbarSupportedContent">
              
              <ul class="'.
                $this->getProperty('navbarNav').' '.
                $this->getProperty('meAuto').' '.
                $this->getProperty('mb2').' '.
                $this->getProperty('mbLg0').'
              ">';
    }

    function lastLevel()
    {
        echo '
              </ul>

              <form class="'.
                $this->getProperty('dFlex').'
              ">
                <input class="'.
                  $this->getProperty('formControl').' '.
                  $this->getProperty('me2').'" 
                  type="search" 
                  placeholder="Search" 
                  aria-label="Search
                ">
                <button 
                  class="'.$this->getProperty('btn').' '.
                           $this->getProperty('btnOutlineSuccess').'" 
                  type="submit">
                  Search
                </button>
              </form>

        ';
    }

    public function addElement(INavMenu $element)
    {
        $this->masObject[] = $element;
    }
}
