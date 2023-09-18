<?php
namespace src\lib\php\authorization\registration;

/**
 * Класс принимает параметры из формы ввода данных при регистрации
 * проверяет их, и помещает в свои свойства.
 * Кроме этого класс запоминает ошибки и помещает их в массив
 * $masError. 
 * 
 * Чтобы класс заработал, необходимо создать из него объект и 
 * запустить метод readDataFormRegistration();
 * Данный метод сам слушает адресную строку и активируется,
 * если пользователь нажмёт кнопку регистрации.
 * Возвращает данный метод массив с ошибками
 * 
 * Для чтения свойств сторонними объектами есть методы - геттеры.
 * 
 * Если необходимо получить ссылку на массив с ошибками, то 
 * для него тоже есть геттер.
 */

use \src\lib\php\db\Db;
use \class\nonBD\interface\IErrorMas;
use \src\lib\php\authorization\registration\{IRegistratorUser,
                                             TraitForRegistrator};
use \class\nonBD\error\TraitForError;
use \Exception;

class UserData extends Db implements IErrorMas, IRegistratorUser
{
    use TraitForError; 
    use TraitForRegistrator;

    private $password;

    private function setPassword()
    {
        if (!isset($_POST['password1'])) return;

        try {

            if ($_POST['password1'] == '') 
                throw new Exception("Password field 1 cannot be empty");
            if ($_POST['password2'] == '') 
                throw new Exception("Password field 2 cannot be empty");
            if ($_POST['password1']!=$_POST['password2'])
                throw new Exception("Password mismatch");

            $password = $this->real_escape_string($_POST['password1']);
            $this->password = password_hash($password, PASSWORD_DEFAULT);

            } catch (Exception $e) {
                $this->addError($e->getMessage());
                $this->password = false;
            }
    }

    /**
     * Метод принимает из пост-запросса логин, экранирует его
     * проверяет нет ли уже такого логина в базе данныз и если 
     * нет,то заносим логин в соответствующую переменную класса.
     * Если такой логин уже есть, то помещаем в переменную 
     * $login значение false
     */
    private function setLogin()
    {
        if (isset($_POST['username']) && $_POST['username']!='') {
            $login = $_POST['username'];
            $_SESSION['loginAD']=$login;
        } else {
            $this->masError[] = 'Name cannot be empty';
            $this->login=false;
            return;
        }
        $login = $this->real_escape_string($login);
        if (!$this->searchLogin($login)) {
            $this->login=false;
            $this->masError[] = 'This name is taken';
        } else {
            $this->login = $login;
        }
    }

    /**
     * Функция получает параметр почты из запроса пост.
     * Если почта не пустая, то она экранируется и отправляется
     * запрос в базу с проверкой, нет ли уже такой почтф.
     * Если почта свободна, то она записывается в переменную
     * email класса, иначе, в данную переменную пишется false.
     */
    private function setEmail()
    {
        // Если существует данный параметр, то забираем его в переменную
        if (isset($_POST['email']) && $_POST['email']!='')
            $email = $_POST['email'];
        else {
            $this->email=false;
            $this->masError[] = 'Mail must be completed';
            return;
        }
        // Экранируем служебные символы, если они были
        $email = $this->real_escape_string($email);
        // Проверяем существует ли такой пользователь 
        if (!$this->searchEmail($email)) {
            $this->email=false;
            $this->masError[] = 'This mail already exists.';
        } else {
            $this->email = $email;
        }
    }
    /**
     * метод читает данные из пост массива и помещает в 
     * свойства класса
     * также метод возвращает ссылку на массив с ошибками
     */
    public function readDataFormRegistration()
    {
            $this->setLogin();
            $this->setPassword();
            $this->setEmail();
            return $this->masError;
    }


}
