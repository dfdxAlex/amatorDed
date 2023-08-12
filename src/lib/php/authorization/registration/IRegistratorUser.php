<?php
namespace src\lib\php\authorization\registration;

/**
 * интерфейс служит для передачи объектов с информацией
 * для регистрации пользователя в класс, который непосредственно 
 * производит запись в базу данных.
 * Методы, которые требудет данный интерфейс описаны в трейте:
 * \src\lib\php\authorization\registration\TraitForRegistrator;
 * В этом же трейте описаны свойства, в которых хранится 
 * информация. То есть при использовании данного интерфейса
 * необходимо подключать данный трейт.
 */
interface IRegistratorUser
{
    public function getLogin();
    public function getPassword();
    public function getEmail();
}
