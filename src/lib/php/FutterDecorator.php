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
     $arrayParametr = $this->returnArrayWithParametrForFooter();

     echo $this->returnFooterHtml($arrayParametr);

     $this->connectJsClasses();

     $this->printConnectingClasses(false);

     parent::__construct();
    }

    /**
     * 
     */
    private function connectJsClasses()
    {
      new ImportFunctionsJs('load',
                            'searchSection',
                            'bagList'
                           );

      new ImportFunctionsJs('non',
                            'bag\CoderDeCoder',
                            'bag\Cookies',
                            'bag\Bag',
                            'bag\VievBag'
                           );
    }
    /**
     * 
     */
    private function printConnectingClasses($noPrint)
    {
        if (!$noPrint) return;
        /**
        * Смотрим проперти контейнер загруженных классов
        */
        $rez = Statistic::getLinkStatistic()->getListClass();
        echo '<div class="print-connecting-classes">';
        foreach($rez as $key=>$val) {
            echo "$key=>$val<br>";
        }
        echo '</div>';
    }
    /**
     * 
     */
    private function returnArrayWithParametrForFooter()
    {
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
      $linkStatistic = Statistic::getLinkStatistic()
                      ->getPlusOneToIntObj();

      $arrayParametr = [
      $nomerToClass,
      $goToYoutube,
      $goToGitHub,
      $technologies,
      $pattern,
      $linkStatistic
      ];

      return $arrayParametr;
    }
    /**
     * 
     */
    private function returnFooterHtml($arrayParametr) 
    {
       [$nomerToClass,
        $goToYoutube,
        $goToGitHub,
        $technologies,
        $pattern,
        $linkStatistic] = $arrayParametr;

      return '
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
           $linkStatistic
           .'
         </div>
      </div>
      </footer>
     ';
    }
}
