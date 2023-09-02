<?php
namespace src\lib\php\games\survive\state\bag\product;

/**
 * Абстрактный класс-интерфейм для продуктов и предметов.
 * Систему построить на шаблоне Composite
 */

 abstract class IProduct
 {
    protected $energy=0; // Енергетическая ценность продукта
    protected $massa=0;  // Масса продукта

    abstract public function getEnergy();
    abstract protected function setEnergy($energy);
    abstract public function getMassa();
    abstract protected function setMassa($massa);
 }
