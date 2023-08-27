<?php
namespace src\lib\php\connectFunctionJs;

/**
 * Класс циклически подключает различные функции JS, которые
 * находятся в специальной папке JS
 * 
 * Если нужно подключить массив функция для с запуском по событию
 * load, при создании объекта в первый параметр идёт слово load,
 * остальные параметры - это список имём всех функций.
 * 
 * Если нужно подключить функции с событием click, при создании
 * объекта ставим первым параметром click, остальные параметра - 
 * это пары имя функции - имя ID, на клик которого функция
 * должна сработать.
 */

use \src\lib\php\connectFunctionJs\ConnectFunctionJsLoad;
use src\lib\php\connectFunctionJs\ConnectFunctionJsClick;
use src\lib\php\connectFunctionJs\ConnectFunctionJsNon;

class ImportFunctionsJs
{
    public function __construct($event, ...$param)
    {
        foreach ($param as $key=>$val) {
            if ($event=='non') {
                new ConnectFunctionJsNon($val);
            }
            if ($event=='load') {
                new ConnectFunctionJsLoad($val);
            }
            if ($event=='click') {
                if ($key%2==0 || $key==0) $nameFunc = $val;
                if ($key%2==1 || $key==1) $id = $val;
                if ($key==1 || $key%2==1) 
                    new ConnectFunctionJsClick($id, $nameFunc);
            }
        }
    }
}
