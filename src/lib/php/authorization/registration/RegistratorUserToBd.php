<?php
namespace src\lib\php\authorization\registration;

/**
 * Класс непосредственно регистрирует пользователя в базу
 * данных проекта amatorDed.
 * Пользователи проекта DFDX зарегистрированы отдельно
 */
class RegistratorUserToBd extends \src\lib\php\db\Db 
{
    public function __construct(\src\lib\php\authorization\registration\IRegistratorUser $obj)
    {
        parent::__construct();
        $this->insertToBd($obj->getLogin(), $obj->getPassword(), $obj->getEmail());

    }
}
