<?php
namespace class\translate\delegatorLang;

/**
 * Класс рисует кнопки для выбора языка сайта
 * Класс создан для стилизации кнопок выбора языка под стили Bootstrap
 * 
 */

class ButtonLangBootstrap extends ButtonLang
{
    /**
     * Так как переписывается конструктор, а конструктор суперкласса
     * не загружается, то необходимо принять переменную $in и в 
     * этом конструкторе тоже.
     */
    public function __construct($in)
    {
        $this->in = $in;

        /**
         * Данный блок операторов if нужен для того, чтобы 
         * вместо работы непосредственно с массивом $_GET(lang)
         * работать с переменной сессии, и обновлять её в случаях,
         * когда элемент массива присутствует в адресной строке.
         */
        if (!isset($_SESSION['get_lang'])) {
            $_SESSION['get_lang']='en';
        } elseif (isset($_GET['lang'])) {
            $_SESSION['get_lang'] = $_GET['lang'];
        }

        echo '<div class="list-group lang-menu">';

        foreach($this->masUrl as $key=>$value) {
            $active='';
            if ($_SESSION['get_lang'] == $key) $active = "active";
            echo "<a href='$value' class='list-group-item list-group-item-action $active'>$key</a>";
        }

        echo '</div>';
    }
}


//   <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
//     Текущий элемент ссылка
//   </a>
//   <a href="#" class="list-group-item list-group-item-action">Второй элемент ссылка</a>
//   <a href="#" class="list-group-item list-group-item-action">Третий элемент ссылка</a>
//   <a href="#" class="list-group-item list-group-item-action">Четвертый элемент ссылка</a>
//   <a href="#" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true">Отключенный элемент ссылка</a>

