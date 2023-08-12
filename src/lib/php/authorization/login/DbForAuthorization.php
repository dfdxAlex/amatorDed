<?php
namespace src\lib\php\authorization\login;

/**
 * Класс для получения данных из базы данных, связанных с 
 * работой модуля авторизации пользователя
 */

class DbForAuthorization extends \src\lib\php\db\Db
                         implements \class\nonBD\interface\IErrorMas
{
    
    /**
     * Подключение старого трейта, входящего в старую библиотеку redaktor
     * Библиотека не написана по принципам SOLID!
     * Данный трейт является божественным, с множеством методов по 
     * работе с базой данных.
     * в этом классе используется метод 
     * $this->searcNameTablic('amator_ded_user'), метод проверяет 
     * существует ли таблица в базе данных.
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
     * В данном трейте содержится инструментарий для работы 
     * с ошибками, а именно с классом ErrorMas, главной библиотеки
     * redaktor.
     * Данный трейт имплементирует массив для хранения ошибок
     * и методы, для работы с этим массивом.
     */
    use \class\nonBD\error\TraitForError; 
    
    public function __construct()
    {
        /**
         * Подключить конструктор суперкласса
         */
        parent::__construct();
        /**
         * Проверить существует ли таблица, если нет, то 
         * создать её. Проверка производится методом из
         * трейта TraitInterfaceWorkToBd, который входит в 
         * библиотеку Redaktor
         */
        if (!$this->searcNameTablic('amator_ded_user')) {
            $query = "CREATE TABLE amator_ded_user(id INT, login VARCHAR(30), password VARCHAR(30), mail VARCHAR(50), status INT)";
            $this->query($query);
        }
        // echo '--'.$this->kolVoZapisTablice('bd2').'--';
    }

    /**
     * метод работает если находимся в ссылке с Гетзапросом ?signin
     * и статус пользователя равен 0, то есть не вошедший на сайт
     *
     * Метод проверяет пароль и логин пользователя и возвращает
     * true или false.
     * В качестве входного параметра передается логин и пароль
     * функция сама знает из какой таблицы проверять данные
     */
    public function user()
    {
            $login = $this->real_escape_string($_POST['login']);
            $password = $this->real_escape_string($_POST['password']);
            $query="SELECT status FROM amator_ded_user WHERE login='$login' AND password='$password'";
            $mas = $this->queryAssoc($query);
            if (isset($mas[0]['status']) && !is_null($mas[0]['status'])) {
                $_SESSION['statusAD']=$mas[0]['status'];
            } else {
                $_SESSION['statusAD']=0;
                $this->masError[] = 'Pair login or password is not correct';
            }
    }

}
