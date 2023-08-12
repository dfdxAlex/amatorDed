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

    /**
     * Метод добавляет пользователя в таблицу amator_ded_user
     * если в метод приходят все входные параметры.
     * Если один из входных параметров пустой, то метод
     * возвращает статус пользователя
     */
    public function insertToBd($login, $password='', $mail='')
    {
        if ($login!='' && $password!='' && $mail!='') {
            $id = $this->kolVoZapisTablice('amator_ded_user')+1;
            $status = time();
            $query="INSERT INTO amator_ded_user (id, login, password, mail, status) VALUES ($id, '$login', '$password', '$mail', $status)";
            $this->query($query);
            /**
             * после записи пользователя в базу данных запомнить
             * его логин в переменную сессий
             */
            $_SESSION['loginAD'] = $login;
        }
        /**
         * Данный return запрашивает статус пользователя уже из базы
         * данных, можно использовать метод только для этих целей,
         * для этого из входных параметров следует указать только
         * логин.
         */
        $loginRez = $this->searchStatus($login);
        if ($loginRez) return $loginRez;
        return false;
    }
}
