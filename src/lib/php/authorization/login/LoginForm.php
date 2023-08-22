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
            return '
            <section class="container-fluid">
              <div class="row">
                <div class="col-sm-12 col-md-8 col-lg-7">
                  <form class="form-login" method="post">
                    <div class="mb-3">
                      <label for="exampleInputlogin1" class="form-label"><h3>Login</h3></label>
                      <input name="login" type="text" class="form-control" id="exampleInputlogin1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                      <label for="inputPassword1" class="form-label"><h3>Password</h3></label>
                      <input name="password" type="password" class="form-control" id="inputPassword1">
                    </div>
                    <button name="loginLevel2" type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
                <div class="col-sm-0 col-md-4 col-lg-4">
                </div>
              </div>
            </section>
            ';
    } 
}
