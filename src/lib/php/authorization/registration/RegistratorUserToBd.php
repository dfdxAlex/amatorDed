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
        $_SESSION['statusAD'] = $this->insertToBd($obj->getLogin(), $obj->getPassword(), $obj->getEmail());
    }


    /**
     * Метод добавляет пользователя в таблицу amator_ded_user
     * если в метод приходят все входные параметры.
     * Если один из входных параметров пустой, то метод
     * возвращает статус пользователя
     */
    public function insertToBd($login, $password='', $mail='')
    {
        /**
         * Проверка пустых параметров нужна для того,
         * чтобы можно было запускать данную функцию без
         * регистрации пользователя. В этом случае она просто
         * вернет статус пользователя.
         */
        if ($password!='' && $mail!='') {
            $id = $this->maxIdLubojTablicy('amator_ded_user');
            $status = time();
            $query="INSERT INTO amator_ded_user (id, login, password, mail, status) VALUES ($id, '$login', '$password', '$mail', $status)";
            $this->query($query);
            /**
             * после записи пользователя в базу данных запомнить
             * его логин в переменную сессий
             */
            $_SESSION['loginAD'] = $login;
        }
        /**
         * Данный return запрашивает статус пользователя уже из базы
         * данных, можно использовать метод только для этих целей,
         * для этого из входных параметров следует указать только
         * логин.
         */
        $loginRez = $this->searchStatus($login);
        if ($loginRez) return $loginRez;
        return false;
    }
}
