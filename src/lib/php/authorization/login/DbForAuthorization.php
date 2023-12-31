<?php
namespace src\lib\php\authorization\login;

/**
 * Класс для получения данных из базы данных, связанных с 
 * работой модуля авторизации пользователя
 */

use \class\nonBD\error\TraitForError;
use \Exception;
use \src\lib\php\db\Db;
use \class\nonBD\interface\IErrorMas;

class DbForAuthorization extends Db
                         implements IErrorMas
{
    use TraitForError; 
    
    public function logIn()
    {
        try {
            [$login, $password] = $this->returnLoginAndPasswordOrExitClass();
         
            $userInfo = $this->returnInfoWithUserOrExitClass($login);

            $this->setDataForUserOrExitClass($userInfo, $login, $password);

        } catch (Exception $e) {
            $this->masError[] = $e->getMessage();
            return ;
        }
    }

    private function setDataForUserOrExitClass($userInfo, $login, $password)
    {
        $hash = $userInfo[0]['password'];

        $rezPassword = password_verify($password, $hash);

        if ($rezPassword) {
            $_SESSION['statusAD'] = $userInfo[0]['status'];
            $_SESSION['loginAD'] = $login;
            $_SESSION['location_id'] = $userInfo[0]['location_id'];
            $_SESSION['user_ID'] = $userInfo[0]['id'];
        } else {
            throw new Exception("Wrong login or password");
        }
    }

    private function returnInfoWithUserOrExitClass($login)
    {
        $query="SELECT 
                amator_ded_user.status, 
                amator_ded_user.password,
                survive_user.location_id,
                amator_ded_user.id
                FROM amator_ded_user 
                INNER JOIN survive_user
                ON amator_ded_user.id = survive_user.id
                WHERE login='$login'";

        $rez = $this->queryAssoc($query);

        if ($rez) 
            return $rez;
        else 
            throw new Exception("Unexpected response from the database. The user may not exist.");
    }

    private function returnLoginAndPasswordOrExitClass()
    {
        if (isset($_POST['login'])) {
            $login = $this->real_escape_string($_POST['login']);
            $password = $_POST['password'];
            return [$login,$password];
        } else {
            throw new Exception("Pair login or password is not correct");
        }
    }
}

