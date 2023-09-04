<?php
namespace src\lib\php\games\survive\state\bag\product;

/**
 * Конкретный продукт Банан
 */

use src\lib\php\games\survive\state\bag\Energy;

class Banan extends IProduct
{
    public function __construct()
    {
        /**
         * Случайная масса банана
         */
        $massa = rand(80,300);
        $this->setPropertyProduct('massa',$massa);

        /**
         * композиция, класс с енергией продуктов
         */
        $energyObj = new Energy;

        /**
         * Подсчитать и запомнить енергетическую ценность
         */
        $energyRez = $energyObj->getProperty('banana')/100*$massa;
        $this->setPropertyProduct('energy',$energyRez);

        /**
         * Запомнить время жизни банана - 3 дня
         */
        $this->setPropertyProduct('life','259200');

        /**
         * Закодировать полученный объект в куки
         */
        //$this->codingProductToCoocie('banan');
    }


}
