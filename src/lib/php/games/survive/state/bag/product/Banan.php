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
        $massa = rand(80,300);
        $this->setMassa($massa);
        $energyObj = new Energy;
        $energyRez = $energyObj->getProperty('banana')/100*$massa;
        $this->setEnergy($energyRez);
    }

    public function getEnergy()
    {
        return $this->energy;
    }
    protected function setEnergy($energy)
    {
        $this->energy = $energy;
    }
    public function getMassa()
    {
        return $this->massa;
    }
    protected function setMassa($massa)
    {
        $this->massa = $massa;
    }
}
