<?php
namespace src\lib\php;

/**
 * Класс FutterDecorator расширяет старый класс Futter
 */

class FutterDecorator extends Futter
{
  use \class\nonBD\trait\DirectorySep;

    public function __construct()
    {
     $nameJs = "/src/lib/js/searchSection";
     $nameJs = \class\nonBD\trait\DirectorySep::insertDirectorySeparator($nameJs);
     $nameJs = "amatorDed".$nameJs.".js";
     //echo $_SERVER['DOCUMENT_ROOT'];
     echo '<script src="'.$nameJs.'"></script>';
     echo '<script>
             window.addEventListener("load",searchSection,false);
             
           </script>';
    /**
     * Класс для работы с переводом текста на разные языки
     * Класс из общей библиотеки, но немного переделанный
     * Класс DelegatorLang регистрируется в контейнере
     * Для использования из контейнера запустить метод ->translator()
     * Чтобы добавить перевод ->control(true);
     * Чтобы посмотреть или удалить перевод ->echoDataMas(); запустить
     * \src\lib\php\ContainerObject::getInstance()->getProperty('DelegatorLang');
     */
     $nomerToClass = \src\lib\php\ContainerObject::getInstance()
                                  ->getProperty('TranslateFacade')
                                  ->translator('Число подключенных классов');
     $goToYoutube = \src\lib\php\ContainerObject::getInstance()
                                  ->getProperty('TranslateFacade')
                                  ->translator('Перейти на Youtube канал');
     $goToGitHub = \src\lib\php\ContainerObject::getInstance()
                                  ->getProperty('TranslateFacade')
                                  ->translator('Перейти на GitHub');
     $technologies = \src\lib\php\ContainerObject::getInstance()
                                  ->getProperty('TranslateFacade')
                                  ->translator('Использованные технологии');
     $pattern = \src\lib\php\ContainerObject::getInstance()
                                  ->getProperty('TranslateFacade')
                                  ->translator('Применённые шаблоны');
           echo '
              <footer id="footer">
              <div class="row">
                <div class="col-sm-12 col-md-6">
                  <a 
                    href="https://www.youtube.com/channel/UCsIw_8Tx-R3ZKEcwvw5oGzA"
                    target="_blank"
                  >
                    '.$goToYoutube.'
                  </a>
                </div>
                <div class="col-sm-12 col-md-6">
                  <a 
                    href="https://github.com/dfdxAlex"
                    target="_blank"
                  >
                    '.$goToGitHub.'
                  </a>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-sm-12 col-md-4">
                  '.$technologies.':<br>
                  -MySql<br>
                  -PHP<br>
                  -HTML5<br>
                  -CSS3<br>
                </div>
                <div class="col-sm-12 col-md-4">
                  '.$pattern.':<br>
                  -Pattern Composite<br>
                  -Pattern Decorator<br>
                  -Pattern Dependency Injection<br>
                  -Property Container<br>
                  -Singleton<br>
                  -Facade<br>
                  -Service Locator<br>
                  -Simple Factory<br>
                </div>
                <div class="col-sm-12 col-md-4">
                  Frameworks:<br>
                  -BootStrap 5<br>
                </div>
              </div>
              <div class="row">
                 <div class="col-12">
                   '.$nomerToClass.': '.
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
