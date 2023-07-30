<?php
namespace src\lib\php;

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
                <div class="col-sm-12 col-md-6">
                  Technologies used on the page:<br>
                  -PHP<br>
                  -HTML5<br>
                  -CSS3<br>
                </div>
                <div class="col-sm-12 col-md-6">
                  Used Solutions on the page:<br>
                  -Pattern Composite<br>
                  -Pattern Decorator<br>
                  -Pattern Dependency Injection<br>
                </div>
              </div>
              </footer>
        ';
        parent::__construct();
    }
}
