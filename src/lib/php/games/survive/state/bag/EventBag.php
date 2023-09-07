<?php
namespace src\lib\php\games\survive\state\bag;

/**
 * Класс слушает события Eat. Если пришел пост запрос
 * с задачей что-то скушать, то кушаем. 
 * Пост отправляется из сумки, кнопки в сумке рисуются
 * JS скриптами с параметром Name, равным имени продукта
 * который кушаем.
 */

use \src\lib\php\games\survive\state\IState;

class EventBag extends \src\lib\php\db\Db
{
    public function __construct(IState $link)
    {
        // $this->link = $link;

        parent::__construct();
        
        $nameCoocies = '';
        /** 
         * Если существует POST[Eat], значит есть попытка
         * что-то съесть.
         */
        if (isset($_POST['Eat'])) {
            /**
             * В пост передаётся имя и значение нажатого продукта
             * Строку разбиваю на массив, имя соответственно 
             * хранится в нулевом элементе, а значение в первом.
             */
            $masNameVal=explode("_", $_POST['Eat'], PHP_INT_MAX);
            /**
             * Перебрать все куки и найти тот кук, значение которого
             * совпадает с значением искомого кука. Если значение нашли,
             * то запомнили имя.
             */
            foreach($_COOKIE as $key=>$val) {
                if ($val == $masNameVal[1]) {
                    $nameCoocies = $key;
                }
            }
        
        $login = $_SESSION['loginAD'];
        $query = "SELECT fatique_max, survive_parametr_user.id 
                  FROM survive_parametr_user 
                  INNER JOIN amator_ded_user
                  ON survive_parametr_user.id = amator_ded_user.id
                  WHERE amator_ded_user.login = '$login'";

        /** запрашиваем из двух таблиц значение максимальное
         * для параметра усталости. Все остальные параметры считаются
         * онлайн.
         * Дополнительно запрашивается ID игрока, для дальнейшего 
         * использования
         */
        $rez = $this->queryAssoc($query);

        /**
         * ID для будущих использований
         */
        $id = $rez[0]['id'];

        /**
         * Получить текущее значение усталости. Оно считается 
         * онлайн.
         */
        $fatiqueRealForGame = $link->getProperty('fatiqueReal');
        
        /**
         * Добавить всю енергию съеденного продукта к локальной
         * усталости, пока внутренняя переменная.
         */
        $fatiqueRealForGame+=$_COOKIE[$nameCoocies];

        /**
         * Нормализировать число енергии, если оно больше
         * максимального. Для этой цели из базы читалось
         * максимальное значение усталости.
         */
        if ($fatiqueRealForGame>$rez[0]['fatique_max']) $fatiqueRealForGame=$rez[0]['fatique_max'];

        /**
         * Поместить новое значение усталости в базу.
         */
        $query = "UPDATE survive_parametr_user 
                  SET fatique_real=$fatiqueRealForGame
                  WHERE id=$id";
        
        $this->query($query);

        /**
         * Обнулить счётчик пребывания в локации, время пребывания
         * отсчитывается с момента как игрок покушал
         */
        $tim = time();
        $query = "UPDATE survive_user 
        SET entry_time=$tim
        WHERE id=$id";
        
        $this->query($query);



        // echo $fatiqueRealForGame.'--'.$rez[0]['fatique_max'];
        
        // echo $_COOKIE[$nameCoocies];
    }
}
}
