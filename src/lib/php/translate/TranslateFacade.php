<?php
namespace src\lib\php\translate;
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
    public function __construct()
    {
        // зарегистрировать объект - переводчик в контейнере объектов
        $in = ContainerObject::setObject('TranslateFacade',new DelegatorLang());
        
        // $in->setRedactorLang(true);
        /**
         * Чтобы воспользоватся переводчиком использовать метод
         * translator('Перейти на GitHub')
         */
        /**
         * Чтобы добавить слова в control() нужно передать true
         * $in->control(true);
         */
        $in->control();
        //$in->echoDataMas(); //посмотреть или отредактировать базу переводов
    }
}
