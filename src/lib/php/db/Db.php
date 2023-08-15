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
     * Подключение старого трейта, входящего в старую библиотеку redaktor
     * Библиотека не написана по принципам SOLID!
     * Данный трейт является божественным, с множеством методов по 
     * работе с базой данных.
     * 
     * У методов ниже, что из трейта TraitInterfaceWorkToBd
     * свое подключение к базе данных, по процедурному типу.
     * Подключение происходит автоматически, при запросе к базе
     * данных или при вызове одного из методов. Соединение создается
     * по шаблону Singleton.
     * $this->searcNameTablic('amator_ded_user') проверяет существует ли таблица
     * $this->kolVoZapisTablice('amator_ded_user') возвращает число записей в таблице
     */
    use \class\redaktor\interface\trait\TraitInterfaceWorkToBd;
    
    /**
     * При создании объекта происходит подключение к базе данных dfdx
     */
    public function __construct()
    {
        $loadInit = \class\redaktor\DatabaseConn::dBConnection();

        
        parent::__construct($loadInit->initBdHost(),
                            $loadInit->initBdLogin(),
                            $loadInit->initBdParol(),
                            $loadInit->initBdNameBD());
        // parent::__construct("localhost","root","","dfdx");

        // Check connection
        if ($this->connect_errno) {
            echo "Failed to connect to MySQL: " . $this->connect_errno;
            exit();
        }

        /**
         * Проверить существует ли таблица, если нет, то 
         * создать её. Проверка производится методом из
         * трейта TraitInterfaceWorkToBd, который входит в 
         * библиотеку Redaktor
         */
        if (!$this->searcNameTablic('amator_ded_user')) {
            $query = "CREATE TABLE amator_ded_user(id INT, login VARCHAR(30), password VARCHAR(255), mail VARCHAR(50), status INT)";
            $this->query($query);
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
        if ($rezReturn) return $rezReturn;
        return false;
    }

    /**
     * Функция проверяет свободен ли логин
     * true - свободен.
     * Функция проверяет id запрашиваемого логина, если id существует
     * то логин занят.
     */
    public function searchLogin($login)
    {
        $mas = $this->queryAssoc('SELECT id FROM amator_ded_user WHERE login="'.$login.'"');
        if (isset($mas[0]['id'])) return false;
        return true;
    }

    /**
    * Функция проверяет свободен ли email
    * true - свободен.
    * Функция проверяет id запрашиваемого email, если id существует
    * то email занят.
    */
   public function searchEmail($email)
   {
       $mas = $this->queryAssoc('SELECT id FROM amator_ded_user WHERE mail="'.$email.'"');
       if (isset($mas[0]['id'])) return false;
       return true;
   }

   /**
    * метод возвращает статус пользователя из базы данных
    */
    public function searchStatus($login)
    {
        $mas = $this->queryAssoc('SELECT status FROM amator_ded_user WHERE login="'.$login.'"');
        if (isset($mas[0]['status'])) return $mas[0]['status'];
        return false;
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
