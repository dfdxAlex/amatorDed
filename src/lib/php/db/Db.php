<?php
namespace src\lib\php\db;

class Db extends \mysqli
{
    public function __construct()
    {
        parent::__construct("localhost","root","","dfdx");

        // Check connection
        if ($this->connect_errno) {
            echo "Failed to connect to MySQL: " . $this->connect_errno;
            exit();
        }
    }

    public function queryArray($query='')
    {
        if ($query==='') return false;
        $rezObj = $this->query($query);
        $rezReturn = $rezObj->fetch_all();
        return $rezReturn;
    }

    public function queryAssoc($query='')
    {
        if ($query==='') return false;
        $rezObj = $this->query($query);
        $rezReturn = $rezObj->fetch_all(MYSQLI_ASSOC);
        return $rezReturn;
    }

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
