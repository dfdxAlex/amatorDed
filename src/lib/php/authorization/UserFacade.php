<?php
namespace src\lib\php\authorization;

/**
 * Управление инфраструктурой входа-выхода-регистрации
 */
class UserFacade extends UserFacadeImplementation
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
}
