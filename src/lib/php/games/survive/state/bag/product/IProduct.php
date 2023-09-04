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
    protected $life=0;

    public function getPropertyProduct($property)
    {
        return $this->$property;
    }

    protected function setPropertyProduct($property, $energy)
    {
        $this->$property = $energy;
    }

    protected function codingProductToCoocie($product)
    {
      $i=0;
      /**
       * добавить суфикс для имени куков для предметов в
       * сумке
       */
      $product .= 'UserBag'; 

      if (isset($_COOKIE)) {
         foreach($_COOKIE as $key=>$val) {
            if (stripos($key, $product)!==false) $i++;
         }
      }

      $product .= '_'.$i;

      setcookie($product,time()+$this->getPropertyProduct('life'));

      echo 'число бананов '.$i;
    }
 }
