<?php
namespace src\lib\php\games\survive\dialog;

class DialogAccordFacade 
{
    public function __construct()
    {
        /**
         * Создать контейнер аккордиона
         */
        $this->dialog = new \class\nonBD\accordionBootstrap\AccordionContainer();
        \src\lib\php\ContainerObject::getInstance()->setProperty('AccordionContainer',$this->dialog);

        /**
         * Создать конкретны пункт аккордиона
         */
        $this->dialog2 = new \class\nonBD\accordionBootstrap\PunktAccordion();
        $this->dialog2->setProperty('button','Заголовок пробный');
        $this->dialog2->setProperty('mesages','<a href="?survive&ttt">jrjrj</a>');
        $this->dialog2->setProperty('data-bs-parent',false);
        $this->dialog->addElement($this->dialog2);
        $this->dialog->addElement($this->dialog2);
    }
}
