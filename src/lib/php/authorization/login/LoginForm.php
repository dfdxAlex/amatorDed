<?php
namespace src\lib\php\authorization\login;

/**
 * класс должен вывести форму ввода логина и пароля в случае
 * если будет соответствующий гет параметр передан через
 * адресную строку (signin)
 */
class LoginForm
{
    static public function createFormLogin()
    {
        if (isset($_GET['signin'])) {
            echo '
            <form class="form-login" method="post">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Login</label>
                <input name="login" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1">
              </div>
              <button name="loginLevel2" type="submit" class="btn btn-primary">Submit</button>
            </form>
            ';
        }
    } 
}
