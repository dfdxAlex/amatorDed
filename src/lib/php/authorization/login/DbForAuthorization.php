<?php
namespace src\lib\php\authorization\login;

/**
 * Класс для получения данных из базы данных, связанных с 
 * работой модуля авторизации пользователя
 */

class DbForAuthorization extends \src\lib\php\db\Db
                         implements \class\nonBD\interface\IErrorMas
{
    /**
     * Подключение старого трейта, входящего в старую библиотеку redaktor
     * Библиотека не написана по принципам SOLID!
     * Данный трейт является божественным, с множеством методов по 
     * работе с базой данных.
     * в этом классе используется метод 
     * $this->searcNameTablic('amator_ded_user'), метод проверяет 
     * существует ли таблица в базе данных.
     * 
     * У методов ниже, что из трейта TraitInterfaceWorkToBd
     * свое подключение к базе данных, по процедурному типу.
     * Подключение происходит автоматически, при запросе к базе
     * данных или при вызове одного из методов. Соединение создается
     * по шаблону Singleton.
     * $this->searcNameTablic('amator_ded_user') проверяет существует ли таблица
     * $this->kolVoZapisTablice('amator_ded_user') возвращает число записей в таблице
     *
     * Внимание!! Данный трейд подключается в суперкласс:
     * \src\lib\php\db\Db, поэтому здесь его можно отключить
     */
    // use \class\redaktor\interface\trait\TraitInterfaceWorkToBd;

    /**
     * В данном трейте содержится инструментарий для работы 
     * с ошибками, а именно с классом ErrorMas, главной библиотеки
     * redaktor.
     * Данный трейт имплементирует массив для хранения ошибок
     * и методы, для работы с этим массивом.
     */
    use \class\nonBD\error\TraitForError; 
    
    /**
     * метод работает если находимся в ссылке с Гетзапросом ?signin
     * и статус пользователя равен 0, то есть не вошедший на сайт
     *
     * Метод проверяет пароль и логин пользователя и возвращает
     * true или false.
     * В качестве входного параметра передается логин и пароль
     * функция сама знает из какой таблицы проверять данные
     */
    public function user()
    {
            /**
             * Данный класс проверяет существуют ли все таблицы
             * которые необходимы для логинирования.
             * Последняя модификация класса загружает данные игрока
             * при проверке логина и пароля, для оптимизации запроссов,
             * поэтому здесь и понадобилась предварительная проверка
             * наличия всех таблиц.
             */
            new \src\lib\php\games\survive\FirstStart;

            if (isset($_POST['login']))
                $login = $this->real_escape_string($_POST['login']);
            else return;
            if (isset($_POST['password']))
                $password = $_POST['password'];
            else return;
            
            /**
             * Джойн создан ради тренировки
             * 
             * В этом запроссе нужно достать пароль для верификации
             * пользователя, НО, чтобы потом снова не делать запрос,
             * вместе с паролем заказано из таблица статус, id игрока
             * id-локации. Если пароль не совпадёт, то эти данные 
             * просто не будут использованы, если пароль совпадает,
             * то эти данные передаются в массив SESSION для дальнейшего
             * использования в программе.
             */
            $query="SELECT 
                    amator_ded_user.status, 
                    amator_ded_user.password,
                    survive_user.location_id,
                    amator_ded_user.id
                    FROM amator_ded_user 
                    INNER JOIN survive_user
                    ON amator_ded_user.id = survive_user.id
                    WHERE login='$login'";

            /**
             * прочитать хеш пароля пользователя
             */
            $hashPassword = $this->queryAssoc($query);
            /**
             * Проверка удалось ли прочитать хеш пароля
             */
            if ($hashPassword) {
                /**
                 * получить сам хеш пароля в переменную $hash
                 */
                $hash = $hashPassword[0]['password'];
                /**
                 * Функция password_verify проверяет соответствие 
                 * хеша введенному паролю пользователя
                 */
                $rezPassword = password_verify($password, $hash);
                /**
                 * Если проверка пароля и его хеша прошли успешно
                 * то поместить некоторые данные пользователя
                 * в переменные сессий
                 */
                if ($rezPassword) {
                    $_SESSION['statusAD'] = $hashPassword[0]['status'];
                    $_SESSION['loginAD'] = $login;
                    $_SESSION['location_id'] = $hashPassword[0]['location_id'];
                    $_SESSION['user_ID'] = $hashPassword[0]['id'];
                }
            } else {
                $this->masError[] = 'Pair login or password is not correct';
            }
    }
}
