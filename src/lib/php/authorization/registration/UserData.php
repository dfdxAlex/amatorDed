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
               implements \class\nonBD\interface\IErrorMas,
                          \src\lib\php\authorization\registration\IRegistratorUser
{
    /**
     * В данном трейте содержится инструментарий для работы 
     * с ошибками, а именно с классом ErrorMas, главной библиотеки
     * redaktor.
     * Данный трейт имплементирует массив для хранения ошибок
     * и методы, для работы с этим массивом.
     */
    use \class\nonBD\error\TraitForError; 

    /**
     * Трейт хранит в себе свойства, в которые данный класс
     * помещает информацию о пользователе, готовую для записи
     * в базу данных при регистрации.
     * Так-же в трейте содержатся метода, для работы с данными
     * свойствами, которые требуются интерфейсу:
     * 
     */
    use \src\lib\php\authorization\registration\TraitForRegistrator;

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
            $this->addError("Password field 1 cannot be empty");
        if ($_POST['password2'] == '') 
            $this->addError("Password field 2 cannot be empty");
        if ($_POST['password1']!=$_POST['password2'])
            $this->addError('Password mismatch');
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
        if (isset($_POST['username']) && $_POST['username']!='') {
            $login = $_POST['username'];
            $_SESSION['loginAD']=$login;
        }
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