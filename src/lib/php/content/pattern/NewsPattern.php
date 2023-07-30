<?php
namespace src\lib\php\content\pattern;

/**
 *   Класс принимает 4 параметра и создает из них контент для Шаблонов
 *   private $masLink = []; - массив содержит ссылки youtoobe на видео
 *   private $masNews = []; - массив содержит контент текстовый, который появится на странице
 *   private $linkGitHub = []; - массив содержит ссылку на Git
 *   private $masGet = []; - массив содержит параметр GET, который и определяет выводимый конент
 */

class NewsPattern
{
    private $masLink = [];
    private $masNews = [];
    private $linkGitHub = [];
    private $masGet = [];

    public function news()
    {
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
                    <section class='container-fluid newPat'>
                      <div class='row'>
                        <div class='col-12'>
                          <div class='news-pattern-p'>$news</div>
                        </div>
                      </div>
                      <dir class='row'>
                        <div class='col-12'>
                            $linkVideo
                        </div>
                      </div>
                      <div class='row'>
                        <div class='col-12'>
                            <a 
                              href='$linkGit' 
                              target='_blank'
                            >
                              <p>
                                Link to GitHub<br>
                                Ссылка на GitHub
                              </p>
                            </a>
                          </div>
                      </div>
                    </section>
                ";
            }
        }
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
        $link = str_replace(
          '/iframe>',
          '/iframe></div>',
          $link
        );
        $link = str_replace(
          '560',
          '100%',
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
