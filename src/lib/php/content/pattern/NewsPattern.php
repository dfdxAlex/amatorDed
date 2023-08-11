<?php
namespace src\lib\php\content\pattern;

/**
 *   Класс принимает 4 параметра и создает из них контент для Шаблонов
 *   private $masLink = []; - массив содержит ссылки youtoobe на видео
 *   private $masNews = []; - массив содержит контент текстовый, 
 *   который появится на странице
 *   private $linkGitHub = []; - массив содержит ссылку на Git
 *   private $masGet = []; - массив содержит параметр GET, 
 *   который и определяет выводимый конент
 * 
 *   Чтобы стилизовать заголовок статьи, он должен прийти обёрнутый
 *   в тег <span>Заголовок статьи</span>
 *   Метод класса принимающий заголовок статьи проверяет есть ли теги <span></span> и если 
 *   есть, то вставляет в 
 *   тег <span> class="mx-auto shadow-lg p-3 mb-5 bg-white rounded"
 * 
 *   Чтобы был стилизован текст статьи, он должен быть обёрнут в тег <p></p>
 *   Если разбить статью на абзацы, то будет стилизирован каждый абзац отдельно.
 *   Метод класса принимающий текст статьи проверяет есть ли теги <p></p> и если 
 *   есть, то вставляет в каждый найденный 
 *   тег <p> class="mx-auto shadow-lg p-3 mb-5 bg-white rounded"
 */

class NewsPattern
{
    private $masLink = [];
    private $masNews = [];
    private $linkGitHub = [];
    private $masGet = [];

    public function __construct()
    {
      \src\lib\php\Statistic::getLinkStatistic()->setPlusOneToIntObj();
    }
    
    public function news()
    {
      echo '<section class="container-fluid">';
        foreach($this->masGet as $key=>$val) {
            if (isset($_GET[$val])) {
                $linkVideo = $this->masLink[$key];

                if (isset($this->masNews[$key])) 
                    $news = $this->masNews[$key];
                else 
                    $news = 'At the link you will find a working prototype 
                             of the template, you can copy the code and 
                             experiment.<hr>
                             По ссылке Вы найдёте работающий прототип шаблона, 
                             сможете скопировать код и поэкспериментировать';

                if (isset($this->linkGitHub[$key])) 
                    $linkGit = $this->linkGitHub[$key];
                else 
                    $linkGit = '#';

                echo "
                    
                      <div class='row'>
                        <div class='col-sm-0 col-md-1 col-lg-2'>
                                
                        </div>
                        <div class='col-sm-12 col-md-10 col-lg-8'>
                          <div class='news-pattern-p'>
                              $news
                          </div>
                        </div>
                        <div class='col-sm-0 col-md-1 col-lg-2'>
                              
                        </div>
                      </div>

                      <div class='row'>
                        <div class='col-sm-0 col-md-1 col-lg-2'>
                            
                        </div>
                        <div class='
                             col-sm-12 
                             col-md-10 
                             col-lg-8 
                             mx-auto'
                             >
                            $linkVideo
                        </div>
                        <div class='col-sm-0 col-md-1 col-lg-2'>
                              
                        </div>
                      </div>

                        <div class='row'>
                        <div class='col-sm-0 col-md-1 col-lg-2'>
                            
                        </div>
                        <div class='
                          col-sm-12 
                          col-md-10 
                          col-lg-8 
                          mx-auto
                          link-futter-git 
                          '
                        >
                            <a  class='shadow-lg p-3 mb-5 bg-white rounded'
                              href='$linkGit' 
                              target='_blank'
                            >
                                Link to GitHub
                            </a>
                          </div>
                          <div class='col-sm-0 col-md-1 col-lg-2'>
                            
                          </div>
                        </div>
                    
                ";
            }
        }
        echo '</section>';
    } 

    public function addNews($news)
    {
      /**
       * str_replace() проверяет был ли передан тег span в контенте
       * если тег есть, то это означает, что это заголовок.
       * Стили заголовка описаны в стилевом файле style.css
       * Дополнительно нужно в span добавить класс для центрирования
       * class="mx-auto" от Bootstrap
       * 
       * Стилизуется заголовок с помощью селектора 
       * .news-pattern-p span
       * 
       * mx-auto - центрирование блока по горизонтали
       * shadow-lg p-3 mb-5 bg-white rounded - создание тени - 
       * эффекта парения
       */
        $news = str_replace(
          '<span>',
          '<span class="mx-auto shadow-lg p-3 mb-5 bg-white rounded">',
          $news
        );
        /**
         * Стилизация контента, если он обёрнут в тег <P>
         */
        $news = str_replace(
          '<p>',
          '<p class="mx-auto shadow-lg p-3 mb-5 bg-white rounded">',
          $news
        );

        $this->masNews[] = $news;
    }

    public function addLink($link)
    {
        $link = str_replace(
            '<iframe',
            '<div class="mx-auto"><iframe',
            $link
        );
        $this->masLink[] = $link;
    }

    public function addGet($get)
    {
        $this->masGet[] = $get;
    }

    public function addlinkGitHub($linkGitHub)
    {
        $this->linkGitHub[] = $linkGitHub;
    }
}
