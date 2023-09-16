<?php
namespace class\redaktor\interface\trait;

use class\redaktor\interface\trait\toHeader\HeadStart;
use class\redaktor\interface\trait\toHeader\HeadBootStrap5;
use class\redaktor\interface\trait\toHeader\FirstCreationSessionVariables;
use class\redaktor\interface\trait\toHeader\ShowSiteHeader;

trait TraitInterfaceWorkToHeader
{

    public function menuOfOurProjects(array $masBotton, $blockName='second-menu')
    {

        $mas = array();
        $blockName='second-menu';
        $mas[0]=$blockName;
        $mas[1]='dfdx.php';
        $i=2;

        foreach($masBotton as $key => $value) {
            $mas[$i++]='submit';
            $mas[$i++]=$blockName;
            $mas[$i++]=$key;
            $mas[$i++]=$value;
        }

        $this->formBlockMas($mas);
    }

    public function firstCreationSessionVariables()
    {
        new FirstCreationSessionVariables;
    }

    public function resetOperatingMode()
    {
        if ($_SESSION["status"]>99) $_SESSION["status"]=9;
        if (isset($_POST['redaktor_up'])) $_SESSION["regimRaboty"]=0;
    }

    public function showSiteHeader(string $url)
    {
        new ShowSiteHeader($url);
    }

    public function showNumberOfCoins(\class\redaktor\interface\interface\InterfaceWorkToModul $redaktor)
    {
        echo '<div class="col-xl-4 col-lg-4 col-md-3 col-sm-12 col-12">';
        if (isset($_SESSION["login"])) {
            /**  Объект по шаблону Singleton, ищет и хранит в себе путь к искомому файлу
             * Создать объект или вернуть ссылку на него.
             * Вторая строка запускает метод по поиску файла
            */
            $obj = \class\nonBD\SearchPathFromFile::createObj();
            echo '<div class="monetki"><img src="'.$obj->searchPath('image/pngwingmal.png').'" class="img-fluid" alt="монет"></div>';
            echo $redaktor->money('login='.$_SESSION["login"]);
        }
        echo '</div>';
    }

    public function topMenuProcessing()
    {
        echo '<div class="col-xl-8 col-lg-8 col-md-9 col-sm-12 col-12">';
        if ($_SESSION["status"]>99) $_SESSION["status"]=9;
        /**  Объект по шаблону Singleton, ищет и хранит в себе путь к искомому файлу
         * Создать объект или вернуть ссылку на него.
         * Вторая строка запускает метод по поиску файла
        */
        $obj = \class\nonBD\SearchPathFromFile::createObj();
        $this->__unserialize(array('menu9','menu_up_dfdx',$obj->searchPath('dfdx.php'),'Логин','Пароль'));
        echo '</div>';

    }

    public function showSiteSection(string $pathFileSection, string $functionAnalogSectionImages)
    {
         // Раздел сайта показать
         echo '<section class="container-fluid">
               <div class="row">
               <div class="col-12">
               <div class="logoHtml">';
        
        if (stripos($_SERVER['REQUEST_URI'],'news')===false) { 
            $alt=preg_replace('/\..+/','',$pathFileSection);
            $alt=preg_replace('/image\//','',$alt);
            if (file_exists($pathFileSection)) 
                echo '<img src="'.$pathFileSection.'" alt="'.$alt.'">';
            else 
                {
                    if (function_exists($functionAnalogSectionImages))
                        $functionAnalogSectionImages();
                    else
                        \class\classNew\SwapImages::swapImages()
                                        ->noImage($functionAnalogSectionImages);
                }
        }
        // Блок работает тогда, когда данный файл вызывается из персональных ссылок для статей
        if (stripos($_SERVER['REQUEST_URI'],'news')!==false) {
            $pathMas=preg_split('/news/',$_SERVER['REQUEST_URI']);
            $pathFile='news'.$pathMas[1];
            $zapros="SELECT bd2.name FROM bd2, url_po_id_bd2 WHERE bd2.id=url_po_id_bd2.id AND url_po_id_bd2.url='".$pathFile."'";
            $rez=$this->zaprosSQL($zapros);
            if ($this->notFalseAndNULL($rez)) {
                $stroka=mysqli_fetch_array($rez);
                zagolowkaBeg($stroka[0]);
            }
        }
        echo '<hr>
              </div>
              </div>
              </div>
              </section>';
    }

    public function headStart($title)
    {
        echo new HeadStart($title);
    }

    public function headBootStrap5(array $listFileStyle)
    {
        echo new HeadBootStrap5($listFileStyle);
    }

}
