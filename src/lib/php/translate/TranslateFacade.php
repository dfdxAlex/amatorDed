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

class TranslateFacade
{
    private $in;
    public function __construct()
    {
       /**
        * Объект работает с переводами фраз на разные языки
        */
        $this->in = new \class\translate\DelegatorLang();

        // $obj->setRedactorLang(true);
        $this->in->control();
        //  $obj->echoDataMas(); //посмотреть или отредактировать базу переводов
        
        echo $this->in->translator('Вперед');        
    }
}
