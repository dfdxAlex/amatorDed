<?php
namespace src\lib\php\authorization\login;

/**
 * Класс наблюдает за гет параметрами и если нажата кнопка
 * выхода из учётной записи, класс должен обнулить признак 
 * статуса $_SESSION['statusAD']=0
 */

class SignOut
{
    static public function signOut()
    {
        if (isset($_GET['signout']))
            $_SESSION['statusAD']=0;
    }
}
