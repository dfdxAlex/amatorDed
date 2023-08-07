<?php
namespace src\lib\php\db;


/**
 * Специализированный класс, упрощающий запроссы к базе данных
 * именно для данного проекта.
 * Методы в класс будут добавляться по мере необходимости.
 */

class Db extends \mysqli
{
    
    /**
     * При создании объекта происходит подключение к базе данных dfdx
     */
    public function __construct()
    {
        parent::__construct("localhost","root","","dfdx");

        // Check connection
        if ($this->connect_errno) {
            echo "Failed to connect to MySQL: " . $this->connect_errno;
            exit();
        }
    }

    /**
     * Метод обрабатывает запрос и возвращает результат
     * в качестве готового индекстного массива.
     * В качестве входного параметра указывается SELECT запрос
     * к базе данных
     */
    public function queryArray($query='')
    {
        if ($query==='') return false;
        $rezObj = $this->query($query);
        $rezReturn = $rezObj->fetch_all();
        return $rezReturn;
    }

    /**
     * Метод обрабатывает запрос и возвращает результат
     * в качестве готового ассоциативного массива.
     * В качестве входного параметра указывается SELECT запрос
     * к базе данных
     */
    public function queryAssoc($query='')
    {
        if ($query==='') return false;
        $rezObj = $this->query($query);
        $rezReturn = $rezObj->fetch_all(MYSQLI_ASSOC);
        return $rezReturn;
    }

    /**
     * Метод для отладки кода, выводит всё содержимое
     * введенной, в качестве параметра, таблицы.
     * Для использования метода достаточно ввести название
     * таблицы как строковый аргумент.
     * obj->infoTab('имя таблицы')
     */
    public function infoTab($tab)
    {
        if ($tab==='') return false;
        $mas = $this->queryAssoc('SELECT * FROM '.$tab.' WHERE 1');
        foreach($mas as $key=>$value) {
            foreach($value as $key2=>$value2) {
                echo "$key2=>$value2<br>";
            }
        }
    }
}
