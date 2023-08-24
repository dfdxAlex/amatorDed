<?php
namespace src\lib\php\games\survive\state;

/**
 * Класс рисует уровни энергий игрока
 */
use \class\nonBD\trait\DirectorySep;
use \src\lib\php\ContainerObject;
class ViewState
{
    private $link;
    private $translate;
    public function __construct(IState $link)
    {
        $this->link = $link;
        $this->translate = ContainerObject::getInstance()
                     ->getProperty('TranslateFacade');
    }
    public function viewParametr()
    {
        $rez = "
                <section class='container'>
                  <div class='row'>
                    <div class='col-sm-12 col-md-4 col-lg-2 view-state'>
                      <div id='armor-max'>
                        <div class='text-for-energy'>
                        ".$this->translate->translator('броня')."
                        </div>
                        <div id='armor-real'>
                        </div>
                      </div>
                    </div>
                    <div class='col-sm-12 col-md-4 col-lg-2 view-state'>
                      <div id='attack-max'>
                        <div class='text-for-energy'>
                        ".$this->translate->translator('сила')."
                        </div>
                        <div id='attack-real'>
                        </div>
                      </div>
                    </div>
                    <div class='col-sm-12 col-md-4 col-lg-2 view-state'>
                      <div id='morality-max'>
                        <div class='text-for-energy'>
                        ".$this->translate->translator('дух')."
                        </div>
                        <div id='morality-real'>
                        </div>
                      </div>
                    </div>
                    <div class='col-sm-12 col-md-4 col-lg-2 view-state'>
                      <div id='luck-max'>
                        <div class='text-for-energy'>
                        ".$this->translate->translator('удача')."
                        </div>
                        <div id='luck-real'>
                        </div>
                      </div>
                    </div>
                    <div class='col-sm-12 col-md-4 col-lg-2 view-state'>
                      <div id='fatique-max'>
                        <div class='text-for-fatique'>
                        ".$this->translate->translator('усталость')."
                        </div>
                        <div id='fatique-real'>
                        </div>
                      </div>
                    </div>
                    <div class='col-sm-12 col-md-4 col-lg-2 view-state'>
                      <div id='lawAbiding-max'>
                        <div class='text-for-lawAbiding'>
                        ".$this->translate->translator('криминальность')."
                        </div>
                        <div id='lawAbiding-real'>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
        ";

        $this->energi('armor',
                       $this->link->getProperty('armorReal'),
                       $this->link->getProperty('armorMax')
                      );
        $this->energi('attack',
                       $this->link->getProperty('attackReal'),
                       $this->link->getProperty('attackMax')
                      );
        $this->energi('morality',
                      $this->link->getProperty('moralityReal'),
                      $this->link->getProperty('moralityMax')
                     );
        $this->energi('luck',
                      $this->link->getProperty('luckReal'),
                      $this->link->getProperty('luckMax')
                      );
        $this->energi('fatique',
                      $this->link->getProperty('fatiqueReal'),
                      $this->link->getProperty('fatiqueMax')
                     );
        $this->energi('lawAbiding',
                      $this->link->getProperty('lawAbidingReal'),
                      $this->link->getProperty('lawAbidingMax')
                     );

        return $rez;

        
    }

    /**
     * Запуск функции из jQuery для рисования заполненных
     * банок енергии
     */
    private function energi($id, $real, $max)
    {
        $nameJs = "/src/lib/js/viewState";
        $nameJs = DirectorySep::insertDirectorySeparator($nameJs);
        $nameJs = "amatorDed".$nameJs.".js";
        echo '<script src="'.$nameJs.'"></script>';
        echo '<script>
                window.addEventListener("load",
                                        function(){
                                          viewState ("'.$id.'",'.$real.','.$max.')
                                        },
                                        false);
              </script>';
    }
}
