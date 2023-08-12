<?php
namespace src\lib\php\authorization\registration;

/**
 * Трейт исключительно для работы с системой регистрации
 * Трейт создает необходимые для классов RegistratorUserToBd
 * и UserData переменные.
 * Подключается трейт только к UserData, так как 
 * RegistratorUserToBd использует эти свойства уже взявши
 * их из класса UserData.
 * Плюс в трейте содержатся геттеры для этих свойств, которые
 * указаны в интерфейсе IRegistratorUser
 */

trait TraitForRegistrator
{
    /**
     * Свойства, которые будут в себе хранить готовые
     * для помещения в базу данных данные пользователя
     */
    private $login;
    private $password;
    private $email;
    /**
     * Геттеры для свойств выше.
     */
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
}
