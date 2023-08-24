<?php
namespace src\lib\php\translate;

/**
 * Фасад для системы перевода
 */

/**
 * Возможные ошибки:
 * Если возникает проблема с наличием $_GET['lang'], то вместо
 * использования данного элемента массива необходимо вставить
 * статический метод:
 * \class\translate\delegatorLang\toSolid\ReturnGetLang::returnGetLang()
 */
use \class\translate\DelegatorLang;
use \src\lib\php\ContainerObject;
class TranslateFacade
{
    private $in;
    public function __construct()
    {
        
       /**
        * Объект работает с переводами фраз на разные языки
        */
        $this->in = new DelegatorLang();
        
        // зарегистрировать объект - переводчик в контейнере объектов
        ContainerObject::getInstance()
                         ->setProperty('TranslateFacade',$this->in);
        
        // $this->in->setRedactorLang(true);
        /**
         * Чтобы воспользоватся переводчиком использовать метод
         * translator('Перейти на GitHub')
         */
        /**
         * Чтобы добавить слова в control() нужно передать true
         * $this->in->control(true);
         */
        $this->in->control();
        //$this->in->echoDataMas(); //посмотреть или отредактировать базу переводов
    }
}
