<?php
namespace class\nonBD\interface;

interface IErrorMas
{
    /**
     * Все классы, которые принимают объекты с интерфейсом
     * IErrorMas работают с методом getMassError(), поэтому
     * он должен быть имплементирован в любой класс, имплементи-
     * рующий данный интерфейс
     */
    public function getMassError();
}
