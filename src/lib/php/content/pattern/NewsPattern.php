<?php
namespace src\lib\php\content\pattern;

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
                      <dir class='row'>
                        <div class='col-12 col-md-3 col-lg-4'>
                            <p>$news</p>
                            <a href='$linkGit' 
                               target='_blank'
                            >
                              Link to GitHub<br>
                              Ссылка на GitHub
                            </a>
                          </div>
                          <div class='col-12 col-md-9 col-lg-8'>
                            $linkVideo
                          </div>
                      </div>
                    </section>
                ";
            }
        }
    } 

    public function addNews($news)
    {
        $this->masNews[] = $news;
    }

    public function addLink($link)
    {
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