<?php
namespace src\lib\php;

/**
 * Класс FutterDecorator расширяет старый класс Futter
 */
use \class\nonBD\trait\DirectorySep;
use \src\lib\php\ContainerObject;
use \src\lib\php\connectFunctionJs\ConnectFunctionJsLoad;
use src\lib\php\connectFunctionJs\ImportFunctionsJs;

class FutterDecorator extends Futter
{


    public function __construct()
    {

    // new ConnectFunctionJsLoad('searchSection');
    /**
     * Класс для работы с переводом текста на разные языки
     * Класс из общей библиотеки, но немного переделанный
     * Класс DelegatorLang регистрируется в контейнере
     * Для использования из контейнера запустить метод ->translator()
     * Чтобы добавить перевод ->control(true);
     * Чтобы посмотреть или удалить перевод ->echoDataMas(); запустить
     * \src\lib\php\ContainerObject::getInstance()->getProperty('DelegatorLang');
     */
     $nomerToClass = ContainerObject::getInstance()
                                  ->getProperty('TranslateFacade')
                                  ->translator('Число подключенных классов');
     $goToYoutube = ContainerObject::getInstance()
                                  ->getProperty('TranslateFacade')
                                  ->translator('Перейти на Youtube канал');
     $goToGitHub = ContainerObject::getInstance()
                                  ->getProperty('TranslateFacade')
                                  ->translator('Перейти на GitHub');
     $technologies = ContainerObject::getInstance()
                                  ->getProperty('TranslateFacade')
                                  ->translator('Использованные технологии');
     $pattern = ContainerObject::getInstance()
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
                  -JavaScript<br>
                  -jQuery<br>
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

       new ImportFunctionsJs('load',
                             'searchSection',
                             'bagList'
                            );

       new ImportFunctionsJs('non',
                             'bagTranslate',
                             'deCoderIntToUTF8',
                             'onBag',
                             'returnMasCuckies',
                             'bagListCreate',
                             'addButtonEat',
                             'searchCookies',
                             'createButtonEat',
                             'returnHtmlBag',
                             'translateTitleForBag',
                             'addClothOnBagStringHtml'
                            );
       

        /**
        * Смотрим проперти контейнер загруженных классов
        */
       // $rez = src\lib\php\Statistic::getLinkStatistic()->getListClass();
       // foreach($rez as $key=>$val) {
       //     echo "$key=>$val<br>";
       // }
       parent::__construct();
    }
}
