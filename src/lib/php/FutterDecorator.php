<?php
namespace src\lib\php;

/**
 * Класс FutterDecorator расширяет старый класс Futter
 */

class FutterDecorator extends Futter
{
    public function __construct()
    {
        echo '
              <footer>
              <div class="row">
                <div class="col-sm-12 col-md-6">
                  <a 
                    href="https://www.youtube.com/channel/UCsIw_8Tx-R3ZKEcwvw5oGzA"
                    target="_blank"
                  >
                    Go to YouTube channel
                  </a>
                </div>
                <div class="col-sm-12 col-md-6">
                  <a 
                    href="https://github.com/dfdxAlex"
                    target="_blank"
                  >
                    Go to GitHub
                  </a>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-sm-12 col-md-4">
                  Technologies used on the page:<br>
                  -MySql<br>
                  -PHP<br>
                  -HTML5<br>
                  -CSS3<br>
                </div>
                <div class="col-sm-12 col-md-4">
                  Used Solutions on the page:<br>
                  -Pattern Composite<br>
                  -Pattern Decorator<br>
                  -Pattern Dependency Injection<br>
                  -Property Container<br>
                  -Singleton<br>
                  -Facade<br>
                </div>
                <div class="col-sm-12 col-md-4">
                  Frameworks:<br>
                  -BootStrap 5<br>
                </div>
              </div>
              <div class="row">
                 <div class="col-12">
                   Число подключенных классов: '.
                   Statistic::getLinkStatistic()->getPlusOneToIntObj()
                   .'
                 </div>
              </div>
              </footer>
        ';
        parent::__construct();
        
        /**
        * Смотрим проперти контейнер загруженных классов
        */
       // $rez = src\lib\php\Statistic::getLinkStatistic()->getListClass();
       // foreach($rez as $key=>$val) {
       //     echo "$key=>$val<br>";
       // }
    }
}
