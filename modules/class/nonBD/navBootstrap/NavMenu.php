<?php
namespace class\nonBD\navBootstrap;

/**
 * класс должен нарисовать меню из разных объектов
 * реализовать шаблон Composite
 */

class NavMenu extends INavMenu
{
    public function addNavBar()
    {
        /**
         * функция выводит первую часть навбара, которая постоянна по разметке.
         * в первой части изменяются только css классы и они есть по умолчанию
         * в суперклассе INavMenu, там же есть два метода get и set свойств
         */
        $this->firstLevel();  
                
               echo '
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>';

                // <li class="nav-item">
                //   <a class="nav-link" href="#">Link</a>
                // </li>

                echo '
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>
                </li>';

                /**
                 * Конец формирования списка меню
                 */
                echo '</ul>';

                // <li class="nav-item">
                //   <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                // </li>

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
}
