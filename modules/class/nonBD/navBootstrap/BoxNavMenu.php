<?php
namespace class\nonBD\navBootstrap;

/**
 * Класс создает выпадающие меню из простых объектов
 * 
 * Для создания объекта из данного класса используем конструктор:
 * $boxMenu = new BoxNavMenu($navbarMenuUp);
 * параметр $navbarMenuUp - это главный объект, в который передаются все
 * объекты простые и сложные. 
 * 
 * После того, как создали объект из данного класса, в него следует 
 * добавить простых объектов, которые и будут создавать выпадающее
 * меню. Добавляются простые объекты с помощью метода addElement()
 * пример:
 * $boxMenu->addElement($element1);
 * $boxMenu->addElement($element2);
 * $boxMenu->addElement($element3);
 * $boxMenu->addElement($elementN);
 * 
 * После того, как данный контейнер будет заполнен простыми объектами,
 * данный объект контейнер следует передать главному объекту с помощью
 * такого же метода.addElement()
 * $navbarMenuUp->addElement($boxMenu);
 * 
 * Так-же в главный элемент можно передавать и простые объекты, 
 * смотри инфу по классу ElementNavBar.
 * 
 * Свойства простых объектов, из которых создается сложный объект,
 * задаются при создании простого объекта и дальше с ним 
 * сохраняются до уничтожения.
 * 
 * Чтобы сделать разделительную горизонтальную черту, следует 
 * создать простой объект с любыми параметрами, но в конструктор
 * передать вторым параметром true;
 * Такой объект самостоятельно установит кнопку со своими свойствами,
 * но если его передать в данный сложный объект, который создает
 * выпадающее меню, он установит горизонтальную разделительную линию.
 */

 class BoxNavMenu extends INavMenuDiff
 {
    private $masObject = [];
    private $in;

    public function __construct(INavMenu $in)
    {
        $this->in = $in;
    }

    public function addElement(INavMenu $element)
    {
        $this->masObject[] = $element;
    }

    public function writeElement()
    {
        $rez = '
        <li class="'.
        $this->in->getProperty('nav-item').' '.
        $this->in->getProperty('dropdown').'">
          <a class="'.
            $this->in->getProperty('nav-link').' '.
            $this->in->getProperty('dropdown-toggle').'" 
            href="'.$this->masObject[0]->getLink().'" 
            id="navbarDropdown" 
            role="button" 
            data-bs-toggle="dropdown" 
            aria-expanded="false"
          >
            '.$this->masObject[0]->getHome().'
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          ';

            foreach($this->masObject as $key=>$value) {
                if ($key!==0) {
                    if (!$value->getHr()) {
                        $rez.='<li><a class="'.
                        $this->in->getProperty('dropdown-item').'" href="'.
                        $value->getLink().'">'.
                        $value->getHome().'</a></li>';
                    } else {
                        $rez.='<li><hr class="'.
                        $this->in->getProperty('dropdown-divider').'"></li>';
                    }
                }
            }

            $rez.=
          '</ul>
        </li>';

        echo $rez;
    }
    
    public function renameElement(INavMenu $element)
    {
        foreach($this->masObject as $key=>$value) {
            if ($value === $element) {
                unset($this->masObject[$key]);
                return true;
            }
        }
    }
 }
