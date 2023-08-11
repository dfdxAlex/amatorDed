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
    public function __construct()
    {
        \src\lib\php\Statistic::getLinkStatistic()->setPlusOneToIntObj();
    }
    /**
     * Объект проверяет содержимое адрессной строки браузера и если 
     * был запрос с параметром signin, объект ставит форму ввода
     * логина и пароля, для авторизации на сайте
     */
    public function createFormLogin()
    {
        if (isset($_GET['signin'])) {
            login\LoginForm::createFormLogin();
        }
    }

    /**
     * Если появился гет параметр registration, то поставить
     * форму регистрации
     */
    public function createFormRegistration()
    {
        if (isset($_GET['registration'])) {
            registration\RegistrationUserForm::createFormRegistration();
        }
    }

    /**
     * Класс наблюдает за запросами и если в запросе будет элемент
     * гет-массива  signout, то есть isset($_GET['signout'])
     * то сбросить признак статуса к нулю.
     * Так как класс воздействует на навбар меню, то он должен
     * отработать раньше чем навигационное меню.
     */
    public function signOut()
    {
        if (isset($_GET['signout'])) {
            login\SignOut::signOut();
        }
    }

    public function registration()
    {
        /**
         * Отслежваем пост запрос с параметром $_POST['registration']
         * Если такой элемент есть в пост массиве, то значит, была 
         * нажата кнопка регистрации.
         * Данный класс обрабатывает это нажатие кнопки
         */
        if (isset($_POST['registration'])) {
            $registration = new registration\UserData();
            $rez = $registration->readDataFormRegistration();
        }
    }

    public function signIn() 
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
        }
    }
}
