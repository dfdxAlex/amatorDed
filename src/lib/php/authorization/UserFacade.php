<?php
namespace src\lib\php\authorization;

use \src\lib\php\ContainerObject;
use \class\nonBD\error\{ErrorMas,
                        ErrorMasPlus};
use \src\lib\php\authorization\login\{SignOut,
                                      DbForAuthorization,
                                      LoginForm};
use \src\lib\php\authorization\registration\{RegistrationUserForm,
                                             UserData,
                                             RegistratorUserToBd};


/**
 * Управление инфраструктурой входа-выхода-регистрации
 */
class UserFacade
{
    public function __construct()
    {
        $this->userFacadeLevelUp();
    }

    private function userFacadeLevelUp()
    {
         /**
          * Обработать кнопку входа на сайт
          */
         $this->signIn();

         /**
          * Обработать кнопку регистрации на сайте
          */
         $this->registration();

         /**
          * Обработать кнопку выхода
          */
         $this->signOut();
    }

    /**
     * Пулл методов запускаемых после начала вывода информации на страницу
     */
    public function userFacadeLevelLast()
    {
          $this->createFormRegistration();
          $this->createFormLogin();
    }

    private function createFormLogin()
    { 
        if (isset($_GET['signinAD']))
            if ((isset($_SESSION['statusAD'])
                 && $_SESSION['statusAD']==0)
                   || !isset($_SESSION['statusAD'])) {
            echo LoginForm::createFormLogin();
        }

        if (isset($_GET['signinAD'])) {
          /**
           * ErrorMas анализирует ошибки из массива, который находится
           * внутри объекта DbForAuthorization
           */
          $login = ContainerObject::getObject('DbForAuthorization');
          if ($login)
              echo new ErrorMas($login);
        }
    }

    private function createFormRegistration()
    {
        if (isset($_GET['registration'])) {
            if ($_SESSION['statusAD']==0) {
                echo RegistrationUserForm::createFormRegistration();
            }

            /**
             * Анализ ошибок работы класса UserData
             */
             $login = ContainerObject::getObject('UserData');
             if ($login) {
                 echo new ErrorMasPlus($login);
             }
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
            SignOut::signOut();
        }
    }

    private function registration()
    {
        if (isset($_POST['registration'])) {
            $registration = ContainerObject::setObject('UserData',new UserData());
            $rez = $registration->readDataFormRegistration();

            if (count($rez)==0)
                new RegistratorUserToBd($registration);
        }
    }

    private function signIn() 
    { 
        if (isset($_GET['signinAD']) 
            && isset($_POST['loginLevel2'])) {
            ContainerObject::setObject('DbForAuthorization',new DbForAuthorization())
                           ->user();
        }
    }
}
