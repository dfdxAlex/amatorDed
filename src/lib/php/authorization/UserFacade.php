<?php
namespace src\lib\php\authorization;

/**
 * Класс фасад для инфраструктуры регистрации и авторизации
 * В зависимости от имеющихся параметров данный класс 
 * создает и запускает другие объекты и методы, связанные с регистрацией
 * и входом.
 * Решается проблема загрязнения главной страницы и создания
 * ненужных объектов. 
 */
class UserFacade
{

    /**
     * Для разгрузки первой страницы часть методов системы
     * регистрации и входа попадут в данный метод.
     * Сюда попадают те методы, кторые должны быть запущены 
     * до запуска навигационного меню.
     */
    public function userFacadeLevelUp()
    {
        /**
         * метод проверяет существование пользователя в базе 
         * данных. Если пользователь там есть, значит регистра-
         * ционную форму можно удалить
         * Удаление происходит в другой части скрипта, здесь 
         * только меняется статус пользователя для того, чтобы
         * отобразить всё по новому, согласно статуса пользователя
         */
        $this->searchUser();

         /**
          * Данный метод фасада слушает систему в ожидании нажатия
          * кнопки входа на сайт. Если нажатие происходит, то создается
          * другой объект внутри фасада, который проверяет данный пользователя
          * по базе данных, если такой пользователь есть, то устанавливается
          * его статус так-же из базы данных
          */
         $this->signIn();

         /**
          * Отслежваем пост запрос с параметром $_POST['registration']
          * Если такой элемент есть в пост массиве, то значит, была 
          * нажата кнопка регистрации.
          * Данный класс обрабатывает это нажатие кнопки
          */
         $this->registration();

         /**
          * Класс наблюдает за запросами и если в запросе будет элемент
          * гет-массива  signout, то есть isset($_GET['signout'])
          * то сбросить признак статуса к нулю.
          * Так как класс воздействует на навбар меню, то он должен
          * отработать раньше чем навигационное меню.
          */
         $this->signOut();
    }

    /**
     * Для разгрузки первой страницы часть методов системы
     * регистрации и входа попадут в данный метод.
     * Сюда попадают те методы, кторые должны быть запущены 
     * после запуска навигационного меню.
     */
    public function userFacadeLevelLast()
    {
          /**
           * Если появился гет параметр registration, то поставить
           * форму регистрации
           */
          $this->createFormRegistration();

          /**
           * Объект проверяет содержимое адрессной строки браузера и если 
           * был запрос с параметром signin, объект ставит форму ввода
           * логина и пароля, для авторизации на сайте
           */
          $this->createFormLogin();
    }


    /**
     * Объект проверяет содержимое адрессной строки браузера и если 
     * был запрос с параметром signin, объект ставит форму ввода
     * логина и пароля, для авторизации на сайте
     */
    private function createFormLogin()
    { 
        if (isset($_GET['signin']) && $_SESSION['statusAD']==0) {
            echo login\LoginForm::createFormLogin();
        }

        /**
         * Если произошёл успешный вход в систему, то сообщаем 
         * об этом.
         * В момент успешного входа на сайт статус пользователя
         * изменился, но остался гет запрос в адресной строке 
         * соответствующий. Этой ситуацией воспользоваться 
         * для того, чтобы сообщить об успешном входе.
         */
        if (isset($_GET['signin'])) {
         /**
          * Чтобы вывести ошибки или сообщение об успешнов 
          * входе нужно передать класс, отвечающий за вход 
          * пользователя на сайт, классу, отвечающему за 
          * анализ массива с ошибками. Если ошибок в классе
          * входа нет, то класс анализа ошибок автоматически выдаст
          * сообщение об успешной операции
          */
          /**
           * Ссылка на класс, отвечающий за регистрацию получена
           * из контейнера объектов, в который ранее была помещена
           * эта ссылка.
           */
          $login = \src\lib\php\ContainerObject::getInstance()->getProperty('DbForAuthorization');
          if ($login)
              echo new \class\nonBD\error\ErrorMas($login);
        }
    }

    /**
     * Если появился гет параметр registration, то поставить
     * форму регистрации
     */
    private function createFormRegistration()
    {
        /**
         * Если произошёл успешный вход в систему, то сообщаем 
         * об этом.
         * В момент успешного входа на сайт статус пользователя
         * изменился, но остался гет запрос в адресной строке 
         * соответствующий. Этой ситуацией воспользоваться 
         * для того, чтобы сообщить об успешном входе.
         */
        if (isset($_GET['registration'])) {
            /** 
             * Если есть гет массив registration и статус 0
             * то поставить форму регистрации
             */
            if (isset($_GET['registration'])  && $_SESSION['statusAD']==0) {
                echo registration\RegistrationUserForm::createFormRegistration();
            }

            /**
             * Чтобы вывести ошибки или сообщение об успешнов 
             * входе нужно передать класс, отвечающий за вход 
             * пользователя на сайт, классу, отвечающему за 
             * анализ массива с ошибками. Если ошибок в классе
             * входа нет, то класс анализа ошибок автоматически выдаст
             * сообщение об успешной операции
             *
             * Ссылка на класс, отвечающий за регистрацию получена
             * из контейнера объектов, в который ранее была помещена
             * эта ссылка.
             */
             $login = \src\lib\php\ContainerObject::getInstance()->getProperty('UserData');
             if ($login) {
                 $err = new \class\nonBD\error\ErrorMasPlus($login);
                 echo $err;
             }
            //  $registrator = new 
            //  $_SESSION['statusAD']=$registrator->insertToBd($_SESSION['loginAD']);
            //  $this->searchUser();

        }

    }

    /**
     * Класс наблюдает за запросами и если в запросе будет элемент
     * гет-массива  signout, то есть isset($_GET['signout'])
     * то сбросить признак статуса к нулю.
     * Так как класс воздействует на навбар меню, то он должен
     * отработать раньше чем навигационное меню.
     */
    private function signOut()
    {
        if (isset($_GET['signout'])) {
            login\SignOut::signOut();
        }
    }

    /**
     * метод проверяет существование пользователя в базе 
     * данных. Если пользователь там есть, значит регистра-
     * ционную форму можно удалить
     * Удаление происходит в другой части скрипта, здесь 
     * только меняется статус пользователя для того, чтобы
     * отобразить всё по новому, согласно статуса пользователя
     */
    private function searchUser()
    {
        if (isset($_GET['registration'])) {
            $registrator = new \src\lib\php\db\Db;
            $_SESSION['statusAD']=$registrator->insertToBd($_SESSION['loginAD']);
        }
    }

    private function registration()
    {
        /**
         * Отслежваем пост запрос с параметром $_POST['registration']
         * Если такой элемент есть в пост массиве, то значит, была 
         * нажата кнопка регистрации.
         * Данный класс обрабатывает это нажатие кнопки
         */
        if (isset($_POST['registration'])) {
            /**
             * UserData собирает параметры из формы и нормализует их
             * так-же заполняет журнал ошибок, если они есть.
             */
            $registration = new registration\UserData();
            /**
             * метод забирает данные из пост массивов, обрабатывает 
             * их и помещает в переменные класса.
             */
            $rez = $registration->readDataFormRegistration();

            /**
             * передать класс с данными пользователя UserData
             * классу, который производит запись
             */
            if (count($rez)==0)
                $registrator = new registration\RegistratorUserToBd($registration);

            /**
             * Зарегистрировать ссылку на этот объект в контейнер
             * объектов. Ссылка понадобится в другом месте
             * программы.
             */
            \src\lib\php\ContainerObject::getInstance()->setProperty('UserData',$registration);


        }
    }

    private function signIn() 
    { 
        /**
         * Данный метод фасада срабатывает тогда, когда в 
         * адресной строке есть гет параметр signin, а в форме
         * ввода логина и пароля нажата кнопка входа loginLevel2
         */
        if (isset($_GET['signin']) && isset($_POST['loginLevel2'])) {
            /**
             * данный класс проверяет пользователя по базе данных при 
             * условии, что система перешла на второй шаг авторизации
             */
            $login = new login\DbForAuthorization();
            $login->user();
            /**
             * Зарегистрировать ссылку на этот объект в контейнер
             * объектов. Ссылка понадобится в другом месте
             * программы.
             */
            \src\lib\php\ContainerObject::getInstance()->setProperty('DbForAuthorization',$login);
        }
    }
}
