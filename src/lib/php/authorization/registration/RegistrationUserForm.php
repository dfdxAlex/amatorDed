<?php
namespace src\lib\php\authorization\registration;

/**
 * Класс слушает адресную строку.
 * Если в адресной строке появляется гет параметр registration
 * то класс рисует форму для регистрации.
 */

class RegistrationUserForm
{
    static public function createFormRegistration()
    {
        if (isset($_GET['registration'])) {
            echo '
            <form method="post">
              <div class="input-group mb-3">
                <input name="username" type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
              </div>
              
              <div class="input-group mb-3">
                <input name="password1" type="password" class="form-control" placeholder="password" aria-label="password" aria-describedby="basic-addon2">
              </div>

              <div class="input-group mb-3">
                <input name="password1" type="password" class="form-control" placeholder="password" aria-label="password" aria-describedby="basic-addon2">
              </div>
              
              <div class="input-group mb-3">
                <input name="email" type="email" class="form-control" placeholder="email" aria-label="email">
              </div>

              <div class="col-auto">
                <button name="registration" type="submit" class="btn btn-primary mb-3">Registration</button>
              </div>
            </form>

            ';
        }
    }
}
