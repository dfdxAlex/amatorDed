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

class UserData extends \src\lib\php\db\Db
{
    private $login;
    private $password;
    private $email;
    private $masError = [];

    /**
     * Метод принимает из пост запроссов пароли.
     * Метод проверяет существует ли нужный пост параметр,
     * являются ли пароли не пустыми и одинаковыми.
     * Если всё с паролем нормально, он экранируктся, шифруется
     * и заносится в свою переменную.
     */
    private function setPassword()
    {
        /**
         *  Проверка форм паролей, если всё в порядке, то
         *  зашифровать пароль и поместить в переменную 
         */
        if (isset($_POST['password1']))
            if (isset($_POST['password2']))
                if ($_POST['password1']!='')
                    if ($_POST['password1'] == $_POST['password2']) {
                        $password = $this->real_escape_string($_POST['password1']);
                        $this->password = password_hash($password, PASSWORD_DEFAULT);
                    } else {
                        $password = false;
                    }
        /**
         * Работа с ошибками
         */
        if ($_POST['password1'] == '') 
            $this->masError[] = "Password field 1 cannot be empty";
        if ($_POST['password2'] == '') 
            $this->masError[] = "Password field 2 cannot be empty";
        if ($_POST['password1']!=$_POST['password2'])
            $this->masError[] = 'Password mismatch';

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
        // Если существует данный параметр, то забираем его в переменную
        if (isset($_POST['username']) && $_POST['username']!='')
            $login = $_POST['username'];
        else {
            $this->masError[] = 'Name cannot be empty';
            $this->login=false;
            return;
        }
        // Экранируем служебные символы, если они были
        $login = $this->real_escape_string($login);
        // Проверяем существует ли такой пользователь 
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

    public function readDataFormRegistration()
    {
        if (isset($_POST['registration'])) {
            $this->setLogin();
            $this->setPassword();
            $this->setEmail();
        }
        return $this->masError;
    }

    public function getLogin()
    {
        return $this->login;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getMassError()
    {
        return $this->masError;
    }
}
